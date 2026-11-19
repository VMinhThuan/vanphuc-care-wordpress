import fs from 'fs';
import path from 'path';

const isDryRun = process.argv.includes('--dry-run');

const exts = ['.php', '.css'];
function walk(dir) {
  let res = [];
  for (const item of fs.readdirSync(dir, { withFileTypes: true })) {
    if (['node_modules', '.git', 'vendor', 'dist', 'tests', 'tools'].includes(item.name)) continue;
    const full = path.join(dir, item.name);
    if (item.isDirectory()) {
      res = res.concat(walk(full));
    } else if (exts.includes(path.extname(item.name).toLowerCase())) {
      res.push(full);
    }
  }
  return res;
}

const files = walk('.');

// Find all raster files in assets/images
const availableWebp = new Set();
function indexWebp(dir) {
  for (const item of fs.readdirSync(dir, { withFileTypes: true })) {
    const full = path.join(dir, item.name);
    if (item.isDirectory()) {
      indexWebp(full);
    } else if (item.name.toLowerCase().endsWith('.webp')) {
      availableWebp.add(path.basename(item.name, '.webp').toLowerCase());
      availableWebp.add(item.name.toLowerCase());
    }
  }
}
indexWebp('assets/images');

let totalReplaced = 0;
let modifiedFiles = 0;
const report = [];

// Match strings like 'image.png', "image.jpg", url('image.png'), /image.jpeg
// Group 1: prefix/boundary, Group 2: base filename, Group 3: extension, Group 4: suffix/quote
const targetRegex = /([a-zA-Z0-9_\-\.\/\\%]+?)\.(png|jpg|jpeg|PNG|JPG|JPEG)/g;

for (const file of files) {
  const content = fs.readFileSync(file, 'utf8');
  let fileReplacements = 0;

  const newContent = content.replace(targetRegex, (match, prefix, ext) => {
    // Check if filename without ext has WebP
    const baseName = path.basename(prefix.replace(/\\/g, '/'));
    if (availableWebp.has(baseName.toLowerCase()) || availableWebp.has((baseName + '.webp').toLowerCase())) {
      fileReplacements++;
      return `${prefix}.webp`;
    }
    return match;
  });

  if (fileReplacements > 0) {
    modifiedFiles++;
    totalReplaced += fileReplacements;
    report.push({ file, count: fileReplacements });

    if (!isDryRun) {
      fs.writeFileSync(file, newContent, 'utf8');
    }
  }
}

console.log('══════════════════════════════════════════════════════════════════');
console.log(`  WEBP CODEBASE TRANSITION REPORT ${isDryRun ? '(DRY RUN)' : '(LIVE)'}`);
console.log('══════════════════════════════════════════════════════════════════');
console.log(`• Total Image References Replaced : ${totalReplaced}`);
console.log(`• Total Files Updated             : ${modifiedFiles}`);
console.log('------------------------------------------------------------------');
for (const item of report) {
  console.log(`  ✓ ${item.file}: ${item.count} replacement(s)`);
}
console.log('══════════════════════════════════════════════════════════════════');
