#!/usr/bin/env node
/**
 * Automated Image Optimization Pipeline (Sharp Engine)
 *
 * Scans image directories, recompresses images above a threshold (default 1MB)
 * using industry-standard Sharp codecs (MozJPEG / PNG crush), and generates
 * modern companion WebP files while strictly preserving original dimensions & resolution.
 *
 * Usage:
 *   node tools/optimize-images.mjs [options]
 *
 * Options:
 *   --dir=<path>         Directory to scan (default: assets/images)
 *   --threshold=<bytes>  Size threshold in bytes or shorthand (e.g. 1MB, 500KB, default: 1MB)
 *   --quality=<number>   Compression quality 1-100 (default: 85)
 *   --dry-run            Scan and display candidate files without writing
 *   --force              Re-optimize even if companion WebP already exists
 *   --concurrency=<num>  Concurrent processing limit (default: 2)
 */

import fs from 'fs';
import path from 'path';
import sharp from 'sharp';

// Parse command line arguments
function parseArgs() {
  const args = process.argv.slice(2);
  const options = {
    dir: 'assets/images',
    threshold: 1024 * 1024, // 1 MB
    quality: 85,
    dryRun: false,
    force: false,
    concurrency: 2
  };

  for (const arg of args) {
    if (arg === '--dry-run') {
      options.dryRun = true;
    } else if (arg === '--force') {
      options.force = true;
    } else if (arg.startsWith('--dir=')) {
      options.dir = arg.split('=')[1];
    } else if (arg.startsWith('--quality=')) {
      options.quality = parseInt(arg.split('=')[1], 10) || 85;
    } else if (arg.startsWith('--concurrency=')) {
      options.concurrency = parseInt(arg.split('=')[1], 10) || 2;
    } else if (arg.startsWith('--threshold=')) {
      const val = arg.split('=')[1].trim().toUpperCase();
      if (val.endsWith('MB')) {
        options.threshold = parseFloat(val) * 1024 * 1024;
      } else if (val.endsWith('KB')) {
        options.threshold = parseFloat(val) * 1024;
      } else {
        const parsed = parseInt(val, 10);
        options.threshold = Number.isNaN(parsed) ? 1024 * 1024 : parsed;
      }
    }
  }

  return options;
}

function formatBytes(bytes) {
  if (bytes === 0) return '0 B';
  if (bytes < 1024) return bytes + ' B';
  if (bytes < 1024 * 1024) return (bytes / 1024).toFixed(2) + ' KB';
  return (bytes / (1024 * 1024)).toFixed(2) + ' MB';
}

function scanImages(dir, threshold, ignoreDirs = ['node_modules', '.git', 'scratch']) {
  let results = [];
  if (!fs.existsSync(dir)) return results;

  const entries = fs.readdirSync(dir, { withFileTypes: true });
  for (const entry of entries) {
    if (ignoreDirs.includes(entry.name)) continue;
    const fullPath = path.join(dir, entry.name);

    if (entry.isDirectory()) {
      results = results.concat(scanImages(fullPath, threshold, ignoreDirs));
    } else {
      const ext = path.extname(entry.name).toLowerCase();
      if (['.jpg', '.jpeg', '.png'].includes(ext)) {
        const stat = fs.statSync(fullPath);
        if (stat.size >= threshold) {
          results.push({
            path: fullPath.replace(/\\/g, '/'),
            size: stat.size,
            ext
          });
        }
      }
    }
  }

  return results;
}

async function processImage(fileInfo, options) {
  const { path: filePath, size: originalSize, ext } = fileInfo;
  const webpPath = filePath.replace(/\.[^.]+$/, '.webp');
  const webpExists = fs.existsSync(webpPath);

  // If companion WebP exists and is newer than source, check if already optimized
  if (!options.force && webpExists) {
    const webpMtime = fs.statSync(webpPath).mtimeMs;
    const srcMtime = fs.statSync(filePath).mtimeMs;
    if (webpMtime >= srcMtime) {
      // Already optimized and WebP is up to date
      return {
        file: filePath,
        skipped: true,
        reason: 'Already optimized (WebP exists and up-to-date)',
        before: originalSize,
        after: originalSize,
        saved: 0
      };
    }
  }

  // Read entire file into buffer to avoid Windows file-lock issues
  const inputBuffer = fs.readFileSync(filePath);
  const metadata = await sharp(inputBuffer, { failOnError: false, failOn: 'none' }).metadata();

  let webpBuffer;
  let crushedBuffer;

  // 1. Generate WebP companion (Preserving 100% original dimensions)
  try {
    webpBuffer = await sharp(inputBuffer, { failOnError: false, failOn: 'none' })
      .webp({ quality: options.quality, effort: 4 })
      .toBuffer();
  } catch (err) {
    console.error(`  [ERROR] Generating WebP for ${filePath}: ${err.message}`);
  }

  // 2. Recompress original format in-place
  try {
    if (ext === '.jpg' || ext === '.jpeg') {
      crushedBuffer = await sharp(inputBuffer, { failOnError: false, failOn: 'none' })
        .jpeg({ quality: options.quality, mozjpeg: true })
        .toBuffer();
    } else if (ext === '.png') {
      crushedBuffer = await sharp(inputBuffer, { failOnError: false, failOn: 'none' })
        .png({ compressionLevel: 9, effort: 7, quality: options.quality })
        .toBuffer();
    }
  } catch (err) {
    console.error(`  [ERROR] Recompressing ${filePath}: ${err.message}`);
  }

  const finalSourceBytes = (crushedBuffer && crushedBuffer.length < originalSize)
    ? crushedBuffer.length
    : originalSize;

  const savedSource = originalSize - finalSourceBytes;
  const percentSaved = originalSize > 0 ? ((savedSource / originalSize) * 100).toFixed(1) : 0;

  if (!options.dryRun) {
    // Write WebP companion
    if (webpBuffer) {
      fs.writeFileSync(webpPath, webpBuffer);
    }
    // Overwrite original file if crushed buffer is smaller
    if (crushedBuffer && crushedBuffer.length < originalSize) {
      fs.writeFileSync(filePath, crushedBuffer);
    }
  }

  return {
    file: filePath,
    dimensions: `${metadata.width}x${metadata.height}`,
    skipped: false,
    before: originalSize,
    after: finalSourceBytes,
    saved: savedSource,
    percent: percentSaved,
    webpSize: webpBuffer ? webpBuffer.length : null,
    webpPath
  };
}

// Simple worker pool for controlled concurrency
async function poolAll(items, fn, concurrency = 2) {
  const results = [];
  let index = 0;

  async function worker() {
    while (index < items.length) {
      const current = items[index++];
      const res = await fn(current);
      results.push(res);
    }
  }

  const workers = Array.from({ length: Math.min(concurrency, items.length) }, () => worker());
  await Promise.all(workers);
  return results;
}

async function main() {
  const options = parseArgs();
  console.log('╔══════════════════════════════════════════════════════════════════╗');
  console.log('║       VẠN PHÚC CARE - AUTOMATED IMAGE OPTIMIZATION PIPELINE      ║');
  console.log('╚══════════════════════════════════════════════════════════════════╝');
  console.log(`• Scan Directory : ${options.dir}`);
  console.log(`• Size Threshold : >= ${formatBytes(options.threshold)}`);
  console.log(`• Target Quality : ${options.quality}% (Preserving original resolution)`);
  console.log(`• Concurrency    : ${options.concurrency}`);
  console.log(`• Mode           : ${options.dryRun ? 'DRY-RUN (Preview only)' : 'LIVE EXECUTION'}`);
  console.log('--------------------------------------------------------------------\n');

  const candidates = scanImages(options.dir, options.threshold);
  console.log(`🔍 Found ${candidates.length} images meeting criteria (>= ${formatBytes(options.threshold)}).\n`);

  if (candidates.length === 0) {
    console.log('✨ No images found that require optimization. All assets are optimal!');
    return;
  }

  if (options.dryRun) {
    console.log('📋 Candidate List for Optimization:');
    let totalCandidateBytes = 0;
    candidates.forEach((c, idx) => {
      totalCandidateBytes += c.size;
      console.log(`  ${(idx + 1).toString().padStart(2, ' ')}. ${c.path} (${formatBytes(c.size)})`);
    });
    console.log('\n--------------------------------------------------------------------');
    console.log(`Total candidate volume: ${formatBytes(totalCandidateBytes)} across ${candidates.length} files.`);
    console.log('Run without --dry-run to execute optimization.');
    return;
  }

  console.log('🚀 Processing images...\n');
  const startTime = Date.now();
  let completed = 0;

  const results = await poolAll(
    candidates,
    async (fileInfo) => {
      const res = await processImage(fileInfo, options);
      completed++;
      if (res.skipped) {
        console.log(`[SKIPPED] (${completed}/${candidates.length}) ${res.file} - ${res.reason}`);
      } else {
        const webpInfo = res.webpSize ? ` | WebP: ${formatBytes(res.webpSize)}` : '';
        console.log(
          `[✓ OPTIMIZED] (${completed}/${candidates.length}) ${res.file} [${res.dimensions}]` +
          `\n    ${formatBytes(res.before)} -> ${formatBytes(res.after)} (-${res.percent}%)${webpInfo}`
        );
      }
      return res;
    },
    options.concurrency
  );

  const duration = ((Date.now() - startTime) / 1000).toFixed(1);
  const activeResults = results.filter((r) => !r.skipped);
  const totalBefore = activeResults.reduce((acc, r) => acc + r.before, 0);
  const totalAfter = activeResults.reduce((acc, r) => acc + r.after, 0);
  const totalSaved = totalBefore - totalAfter;
  const overallPercent = totalBefore > 0 ? ((totalSaved / totalBefore) * 100).toFixed(1) : 0;
  const totalWebpBytes = activeResults.reduce((acc, r) => acc + (r.webpSize || 0), 0);

  console.log('\n====================================================================');
  console.log('                      OPTIMIZATION SUMMARY REPORT                   ');
  console.log('====================================================================');
  console.log(`• Total Images Processed : ${activeResults.length} (Skipped: ${results.length - activeResults.length})`);
  console.log(`• Time Elapsed           : ${duration}s`);
  console.log(`• Total Size Before      : ${formatBytes(totalBefore)}`);
  console.log(`• Total Size After (Src) : ${formatBytes(totalAfter)}`);
  console.log(`• Disk Space Reclaimed   : ${formatBytes(totalSaved)} (-${overallPercent}%)`);
  console.log(`• Total WebP Footprint   : ${formatBytes(totalWebpBytes)}`);
  console.log('====================================================================\n');
}

main().catch((err) => {
  console.error('[FATAL ERROR]', err);
  process.exit(1);
});
