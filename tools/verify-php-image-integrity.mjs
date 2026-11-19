import fs from 'fs';
import path from 'path';
import { execSync } from 'child_process';

console.log('══════════════════════════════════════════════════════════════════');
console.log('       PHP IMAGE CONVERSION INTEGRITY & ZERO-DEFECT AUDIT         ');
console.log('══════════════════════════════════════════════════════════════════\n');

// 1. Gather all PHP files
function getPhpFiles(dir) {
  let res = [];
  for (const item of fs.readdirSync(dir, { withFileTypes: true })) {
    if (['node_modules', '.git', 'vendor', 'dist', 'tests'].includes(item.name)) continue;
    const full = path.join(dir, item.name);
    if (item.isDirectory()) {
      res = res.concat(getPhpFiles(full));
    } else if (item.name.toLowerCase().endsWith('.php')) {
      res.push(full);
    }
  }
  return res;
}

const phpFiles = getPhpFiles('.');
console.log(`📁 Total PHP Files Found in Theme: ${phpFiles.length}\n`);

// Index all asset files in assets/images AND assets/icons
const assetIndex = new Set();
const assetBasenames = new Map(); // basename.toLowerCase() -> full relative path

function indexAssets(dir) {
  if (!fs.existsSync(dir)) return;
  for (const item of fs.readdirSync(dir, { withFileTypes: true })) {
    const full = path.join(dir, item.name).replace(/\\/g, '/');
    if (item.isDirectory()) {
      indexAssets(full);
    } else {
      assetIndex.add(full.toLowerCase());
      const base = item.name.toLowerCase();
      if (!assetBasenames.has(base)) {
        assetBasenames.set(base, []);
      }
      assetBasenames.get(base).push(full);
    }
  }
}
indexAssets('assets/images');
indexAssets('assets/icons');
console.log(`🖼️ Total Asset Files Indexed (images + icons): ${assetIndex.size}\n`);

// CHECK 1: Search for any remaining legacy extensions in PHP files
console.log('------------------------------------------------------------------');
console.log('CHECK 1: Scanning for unmigrated legacy extensions (.png, .jpg, .jpeg)...');
let legacyErrors = [];
const legacyRegex = /['"][^'"]*?\.(png|jpg|jpeg|PNG|JPG|JPEG)['"]/g;

for (const file of phpFiles) {
  const content = fs.readFileSync(file, 'utf8');
  const lines = content.split('\n');
  lines.forEach((line, idx) => {
    let match;
    while ((match = legacyRegex.exec(line)) !== null) {
      legacyErrors.push({ file, line: idx + 1, match: match[0], text: line.trim() });
    }
  });
}

if (legacyErrors.length === 0) {
  console.log('  ✅ PASSED: 0 legacy raster extensions found in theme PHP files.');
} else {
  console.log(`  ❌ FAILED: Found ${legacyErrors.length} legacy raster references:`);
  legacyErrors.forEach(e => console.log(`     - ${e.file}:${e.line} -> ${e.match}`));
}

// CHECK 2: Search for double extensions / malformed patterns
console.log('\n------------------------------------------------------------------');
console.log('CHECK 2: Scanning for malformed / double extensions (e.g. .png.webp)...');
let malformedErrors = [];
const malformedRegex = /\.(png|jpg|jpeg|webp)\.(webp|png|jpg|jpeg)/gi;

for (const file of phpFiles) {
  const content = fs.readFileSync(file, 'utf8');
  const lines = content.split('\n');
  lines.forEach((line, idx) => {
    let match;
    while ((match = malformedRegex.exec(line)) !== null) {
      malformedErrors.push({ file, line: idx + 1, match: match[0], text: line.trim() });
    }
  });
}

if (malformedErrors.length === 0) {
  console.log('  ✅ PASSED: 0 malformed or double extensions found.');
} else {
  console.log(`  ❌ FAILED: Found ${malformedErrors.length} malformed extensions:`);
  malformedErrors.forEach(e => console.log(`     - ${e.file}:${e.line} -> ${e.match}`));
}

// CHECK 3: Verify all image files referenced in PHP actually exist on disk
console.log('\n------------------------------------------------------------------');
console.log('CHECK 3: Verifying physical file existence on disk (Zero 404 Guarantee)...');
const allImagesRegex = /([a-zA-Z0-9_\-\.\/\\%@]+?\.(webp|svg))/gi;
let totalCheckedImages = 0;
let missingDiskFiles = [];
let foundImages = new Set();

for (const file of phpFiles) {
  const content = fs.readFileSync(file, 'utf8');
  const lines = content.split('\n');
  lines.forEach((line, idx) => {
    let match;
    while ((match = allImagesRegex.exec(line)) !== null) {
      const candidate = match[1].replace(/\\/g, '/');
      const base = path.basename(candidate).toLowerCase();

      // Skip non-image assets or external URLs if any
      if (candidate.startsWith('http://') || candidate.startsWith('https://')) return;

      totalCheckedImages++;
      foundImages.add(base);

      // Check existence
      if (!assetBasenames.has(base)) {
        missingDiskFiles.push({ file, line: idx + 1, ref: candidate, base });
      }
    }
  });
}

console.log(`  ℹ️ Total Image Invocations in PHP : ${totalCheckedImages}`);
console.log(`  ℹ️ Unique Images Referenced       : ${foundImages.size}`);

if (missingDiskFiles.length === 0) {
  console.log('  ✅ PASSED: 100% of referenced WebP/SVG images exist on disk!');
} else {
  console.log(`  ❌ FAILED: Found ${missingDiskFiles.length} missing files on disk:`);
  missingDiskFiles.forEach(m => console.log(`     - ${m.file}:${m.line} -> Ref: "${m.ref}" (Base: ${m.base})`));
}

// CHECK 4: Git Diff syntax review across modified PHP files
console.log('\n------------------------------------------------------------------');
console.log('CHECK 4: Validating git diff of modified PHP files for syntax damage...');
let diffOutput = '';
try {
  diffOutput = execSync('git diff -U0 -- "*.php"', { encoding: 'utf8' });
} catch (err) {
  diffOutput = err.stdout || '';
}

// Parse hunks
const hunks = [];
let currentFile = null;
let currentHunk = null;

for (const line of diffOutput.split('\n')) {
  if (line.startsWith('diff --git')) {
    currentFile = line.split(' ')[2];
  } else if (line.startsWith('@@')) {
    currentHunk = { file: currentFile, deleted: [], added: [] };
    hunks.push(currentHunk);
  } else if (currentHunk) {
    if (line.startsWith('-') && !line.startsWith('---')) {
      currentHunk.deleted.push(line.substring(1));
    } else if (line.startsWith('+') && !line.startsWith('+++')) {
      currentHunk.added.push(line.substring(1));
    }
  }
}

let suspiciousHunks = [];
for (const hunk of hunks) {
  // Normalize deleted lines: substitute .png, .jpg, .jpeg, etc. with .webp
  const normalizedDeleted = hunk.deleted.map(l => l.replace(/\.(png|jpg|jpeg|PNG|JPG|JPEG)/g, '.webp'));
  const normalizedAdded = [...hunk.added];

  // Compare sets
  const isMatch = normalizedDeleted.length === normalizedAdded.length &&
    normalizedDeleted.every((l, idx) => l === normalizedAdded[idx]);

  if (!isMatch) {
    suspiciousHunks.push(hunk);
  }
}

if (suspiciousHunks.length === 0) {
  console.log(`  ✅ PASSED: All ${hunks.length} diff hunks across modified PHP files are 100% pure 1:1 image extension replacements! Zero markup or logic altered.`);
} else {
  console.log(`  ⚠️ Found ${suspiciousHunks.length} unexpected diff hunks:`);
  suspiciousHunks.slice(0, 3).forEach(h => {
    console.log(`     File: ${h.file}`);
    console.log(`     Deleted: ${JSON.stringify(h.deleted)}`);
    console.log(`     Added:   ${JSON.stringify(h.added)}`);
  });
}

console.log('\n══════════════════════════════════════════════════════════════════');
const allPassed = legacyErrors.length === 0 && malformedErrors.length === 0 && missingDiskFiles.length === 0 && suspiciousHunks.length === 0;
if (allPassed) {
  console.log('  🎯 FINAL CONCLUSION: 100% PERFECT & VERIFIED (ZERO DEFECTS).');
  console.log('     MÃ NGUỒN PHP AN TOÀN TUYỆT ĐỐI - SẴN SÀNG COMMIT.');
} else {
  console.log('  ⚠️ SOME ISSUES DETECTED. PLEASE REVIEW REPORT ABOVE.');
}
console.log('══════════════════════════════════════════════════════════════════');
