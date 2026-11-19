import fs from 'fs';
import path from 'path';

const isDryRun = process.argv.includes('--dry-run');

function walk(dir) {
  let res = [];
  for (const item of fs.readdirSync(dir, { withFileTypes: true })) {
    const full = path.join(dir, item.name);
    if (item.isDirectory()) {
      res = res.concat(walk(full));
    } else if (/\.(png|jpg|jpeg)$/i.test(item.name)) {
      res.push(full);
    }
  }
  return res;
}

const dir = 'assets/images';
const rasterFiles = walk(dir);

let totalBytes = 0;
let eligibleFiles = [];
let skippedFiles = [];

for (const file of rasterFiles) {
  const stat = fs.statSync(file);
  const ext = path.extname(file);
  const webpPath = file.slice(0, -ext.length) + '.webp';

  // Strict safety check: Must have an existing .webp companion
  if (fs.existsSync(webpPath)) {
    eligibleFiles.push({ file, webpPath, size: stat.size });
    totalBytes += stat.size;
  } else {
    skippedFiles.push({ file, reason: 'Missing .webp companion' });
  }
}

console.log('══════════════════════════════════════════════════════════════════');
console.log(`  LEGACY RASTER IMAGES CLEANUP PIPELINE ${isDryRun ? '(DRY RUN PREVIEW)' : '(LIVE DELETION)'}`);
console.log('══════════════════════════════════════════════════════════════════');
console.log(`• Scan Directory              : ${dir}`);
console.log(`• Total Raster Files Found    : ${rasterFiles.length}`);
console.log(`• Eligible for Deletion       : ${eligibleFiles.length} (Has verified WebP)`);
console.log(`• Skipped (Safety Barrier)   : ${skippedFiles.length}`);
console.log(`• Total Disk Space to Reclaim : ${(totalBytes / (1024 * 1024)).toFixed(2)} MB (${totalBytes.toLocaleString()} bytes)`);
console.log('------------------------------------------------------------------');

if (skippedFiles.length > 0) {
  console.log('⚠️ SKIPPED FILES (NO WEBP FOUND):');
  for (const s of skippedFiles) {
    console.log(`  - ${s.file} (${s.reason})`);
  }
  console.log('------------------------------------------------------------------');
}

if (!isDryRun) {
  let deletedCount = 0;
  for (const item of eligibleFiles) {
    fs.unlinkSync(item.file);
    deletedCount++;
  }
  console.log(`🎉 Successfully deleted ${deletedCount} legacy image files.`);
  console.log(`💾 Reclaimed ${(totalBytes / (1024 * 1024)).toFixed(2)} MB of disk space!`);
} else {
  console.log('ℹ️ Run without --dry-run to permanently delete these files.');
}
console.log('══════════════════════════════════════════════════════════════════');
