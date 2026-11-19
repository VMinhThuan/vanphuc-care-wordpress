import fs from 'fs';
import path from 'path';

const exts = ['.php', '.css'];
function walk(dir) {
  let res = [];
  for (const item of fs.readdirSync(dir, { withFileTypes: true })) {
    if (['node_modules', '.git', 'vendor', 'dist', 'tests'].includes(item.name)) continue;
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
const imageRegex = /([a-zA-Z0-9_\-\.\/\\% ]+?\.(png|jpg|jpeg|JPG|PNG))/g;

let totalRefs = 0;
let missingWebp = [];
let validWebp = 0;

// Helper to find file in assets/images
function findWebpCandidate(refPath) {
  // Extract basename without ext
  const cleanRef = refPath.replace(/\\/g, '/');
  const baseName = path.basename(cleanRef, path.extname(cleanRef));
  const targetWebpName = baseName + '.webp';

  // Check if direct relative path from assets exists
  const directPath = path.join('assets/images', cleanRef.replace(/^\/?assets\/images\//, '').replace(/\.(png|jpg|jpeg|JPG|PNG)$/, '.webp'));
  if (fs.existsSync(directPath)) return directPath;

  // Search recursively in assets/images for matching targetWebpName
  function search(d) {
    for (const f of fs.readdirSync(d, { withFileTypes: true })) {
      const p = path.join(d, f.name);
      if (f.isDirectory()) {
        const found = search(p);
        if (found) return found;
      } else if (f.name.toLowerCase() === targetWebpName.toLowerCase()) {
        return p;
      }
    }
    return null;
  }

  return search('assets/images');
}

for (const file of files) {
  const content = fs.readFileSync(file, 'utf8');
  let match;
  while ((match = imageRegex.exec(content)) !== null) {
    const ref = match[1];
    totalRefs++;
    const foundWebp = findWebpCandidate(ref);
    if (!foundWebp) {
      missingWebp.push({ file, ref });
    } else {
      validWebp++;
    }
  }
}

console.log(`Total References Checked: ${totalRefs}`);
console.log(`Valid WebP Candidates Found: ${validWebp}`);
console.log(`Missing WebP: ${missingWebp.length}`);
if (missingWebp.length > 0) {
  console.log('Missing items:');
  console.log(missingWebp);
}
