import fs from 'fs';
import path from 'path';
import sharp from 'sharp';

const BACKUP_DIR = 'scratch/stage1-backup';

async function ensureDir(dir) {
  if (!fs.existsSync(dir)) {
    fs.mkdirSync(dir, { recursive: true });
  }
}

function backupFile(src) {
  const dest = path.join(BACKUP_DIR, path.basename(src));
  fs.copyFileSync(src, dest);
  console.log(`[BACKUP] ${src} -> ${dest}`);
}

function formatBytes(bytes) {
  if (bytes < 1024) return bytes + ' B';
  if (bytes < 1024 * 1024) return (bytes / 1024).toFixed(2) + ' KB';
  return (bytes / (1024 * 1024)).toFixed(2) + ' MB';
}

async function optimizeSvgInlineBase64(svgPath, replacements) {
  const originalBytes = fs.statSync(svgPath).size;
  backupFile(svgPath);

  let svgContent = fs.readFileSync(svgPath, 'utf8');

  for (const rep of replacements) {
    const { id, targetWidth, quality = 85 } = rep;
    const regex = new RegExp(`(<image id="${id}"[^>]+xlink:href=")(data:image/[^;]+;base64,)([^"]+)(")`);
    const match = regex.exec(svgContent);

    if (!match) {
      console.warn(`[WARN] Pattern not found for id="${id}" in ${svgPath}`);
      continue;
    }

    const rawBuf = Buffer.from(match[3], 'base64');
    let sharpInstance = sharp(rawBuf);

    if (targetWidth) {
      const meta = await sharpInstance.metadata();
      if (meta.width > targetWidth) {
        sharpInstance = sharpInstance.resize({ width: targetWidth });
      }
    }

    const webpBuf = await sharpInstance.webp({ quality }).toBuffer();
    const newBase64 = webpBuf.toString('base64');

    svgContent = svgContent.replace(
      regex,
      `$1data:image/webp;base64,${newBase64}$4`
    );

    console.log(`  - Sub-image #${id}: ${formatBytes(rawBuf.length)} -> ${formatBytes(webpBuf.length)} (WebP)`);
  }

  fs.writeFileSync(svgPath, svgContent, 'utf8');
  const newBytes = fs.statSync(svgPath).size;
  const saved = originalBytes - newBytes;
  const percent = ((saved / originalBytes) * 100).toFixed(2);

  return {
    file: svgPath,
    before: originalBytes,
    after: newBytes,
    saved,
    percent
  };
}

async function optimizeImage(srcPath, { maxWidth = 1920, quality = 85, makeWebp = true }) {
  const originalBytes = fs.statSync(srcPath).size;
  backupFile(srcPath);

  // Read entire file into buffer to avoid Windows file locks
  const inputBuffer = fs.readFileSync(srcPath);

  const ext = path.extname(srcPath);
  const dir = path.dirname(srcPath);
  const baseName = path.basename(srcPath, ext);
  const webpPath = path.join(dir, `${baseName}.webp`);

  const meta = await sharp(inputBuffer).metadata();
  const shouldResize = meta.width && meta.width > maxWidth;

  let webpResult = null;
  if (makeWebp) {
    let pipeline = sharp(inputBuffer);
    if (shouldResize) {
      pipeline = pipeline.resize({ width: maxWidth });
    }
    const webpBuf = await pipeline.webp({ quality }).toBuffer();
    fs.writeFileSync(webpPath, webpBuf);
    webpResult = {
      path: webpPath,
      size: webpBuf.length
    };
  }

  // Recompress original format in-place
  let crushedBuf;
  if (ext.toLowerCase() === '.png') {
    let pipeline = sharp(inputBuffer);
    if (shouldResize) {
      pipeline = pipeline.resize({ width: maxWidth });
    }
    crushedBuf = await pipeline.png({ compressionLevel: 9, effort: 7, quality: 85 }).toBuffer();
  } else if (ext.toLowerCase() === '.jpg' || ext.toLowerCase() === '.jpeg') {
    let pipeline = sharp(inputBuffer);
    if (shouldResize) {
      pipeline = pipeline.resize({ width: maxWidth });
    }
    crushedBuf = await pipeline.jpeg({ quality, mozjpeg: true }).toBuffer();
  }

  if (crushedBuf && crushedBuf.length < originalBytes) {
    fs.writeFileSync(srcPath, crushedBuf);
  }

  const finalBytes = fs.statSync(srcPath).size;
  const saved = originalBytes - finalBytes;
  const percent = ((saved / originalBytes) * 100).toFixed(2);

  return {
    file: srcPath,
    before: originalBytes,
    after: finalBytes,
    saved,
    percent,
    webp: webpResult
  };
}

async function run() {
  await ensureDir(BACKUP_DIR);
  console.log('=== STARTING STAGE 1 IMAGE OPTIMIZATION ===\n');

  const results = [];

  // 1. health-book.svg (Desktop)
  console.log('1. Optimizing assets/images/bath/health-book.svg...');
  results.push(await optimizeSvgInlineBase64('assets/images/bath/health-book.svg', [
    { id: 'image0_3207_38598', quality: 85 }, // 4096x2731 -> Keep dims for exact matrix mapping
    { id: 'image1_3207_38598', quality: 85 }, // 800x533
    { id: 'image2_3207_38598', quality: 85 }  // 1920x1920
  ]));

  // 2. health-book-mobile.svg
  console.log('\n2. Optimizing assets/images/bath/health-book-mobile.svg...');
  results.push(await optimizeSvgInlineBase64('assets/images/bath/health-book-mobile.svg', [
    { id: 'image0_3207_38727', quality: 85 }  // 1920x1920
  ]));

  // 3. team.png
  console.log('\n3. Optimizing assets/images/recruitment/team.png...');
  results.push(await optimizeImage('assets/images/recruitment/team.png', {
    maxWidth: 1920,
    quality: 85,
    makeWebp: true
  }));

  // 4. room-standard.png
  console.log('\n4. Optimizing assets/images/o-cu/figma/room-standard.png...');
  results.push(await optimizeImage('assets/images/o-cu/figma/room-standard.png', {
    maxWidth: 1200,
    quality: 85,
    makeWebp: true
  }));

  // 5. room-deluxe.png
  console.log('\n5. Optimizing assets/images/o-cu/figma/room-deluxe.png...');
  results.push(await optimizeImage('assets/images/o-cu/figma/room-deluxe.png', {
    maxWidth: 1200,
    quality: 85,
    makeWebp: true
  }));

  // 6. room-suite.png
  console.log('\n6. Optimizing assets/images/o-cu/figma/room-suite.png...');
  results.push(await optimizeImage('assets/images/o-cu/figma/room-suite.png', {
    maxWidth: 1200,
    quality: 85,
    makeWebp: true
  }));

  // 7. health-book.png (Easy / Bao mau)
  console.log('\n7. Optimizing assets/images/easy/health-book.png...');
  results.push(await optimizeImage('assets/images/easy/health-book.png', {
    maxWidth: 1080,
    quality: 85,
    makeWebp: true
  }));

  console.log('\n=== SUMMARY OF OPTIMIZATION RESULTS ===');
  let totalBefore = 0;
  let totalAfter = 0;
  for (const r of results) {
    totalBefore += r.before;
    totalAfter += r.after;
    console.log(
      `${r.file}: ${formatBytes(r.before)} -> ${formatBytes(r.after)} (Reduced: ${r.percent}%, Saved: ${formatBytes(r.saved)})`
    );
    if (r.webp) {
      console.log(`  + Generated WebP: ${r.webp.path} (${formatBytes(r.webp.size)})`);
    }
  }

  const totalSaved = totalBefore - totalAfter;
  const totalPercent = ((totalSaved / totalBefore) * 100).toFixed(2);
  console.log('----------------------------------------------------');
  console.log(`TOTAL BEFORE: ${formatBytes(totalBefore)}`);
  console.log(`TOTAL AFTER:  ${formatBytes(totalAfter)}`);
  console.log(`TOTAL SAVED:  ${formatBytes(totalSaved)} (-${totalPercent}%)`);
}

run().catch(console.error);
