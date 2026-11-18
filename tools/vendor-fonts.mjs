// Explicit maintenance command; normal builds use committed font files offline.
import fs from 'node:fs';
import { createHash } from 'node:crypto';
const url = 'https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,400..700&family=Manrope:wght@400..700&display=swap';
const headers = { 'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36' };
async function download(url) {
  const r = await fetch(url, { headers, signal: AbortSignal.timeout(30000) });
  if (!r.ok) throw new Error(`${r.status}: ${url}`);
  return Buffer.from(await r.arrayBuffer());
}
let css = (await download(url)).toString();
if (!css.includes('woff2')) throw new Error('Expected WOFF2 response');
fs.mkdirSync('assets/fonts', { recursive: true });
for (const remote of new Set([...css.matchAll(/url\((https:[^)]+)\)/g)].map(m => m[1]))) {
  const bytes = await download(remote);
  if (bytes.subarray(0,4).toString() !== 'wOF2') throw new Error('Invalid WOFF2');
  const name = createHash('sha256').update(bytes).digest('hex').slice(0,16) + '.woff2';
  fs.writeFileSync('assets/fonts/' + name, bytes);
  css = css.replaceAll(remote, '../fonts/' + name);
}
for (const family of ['fraunces','manrope']) {
  fs.writeFileSync(`assets/fonts/${family}-OFL.txt`, await download(`https://raw.githubusercontent.com/google/fonts/main/ofl/${family}/OFL.txt`));
}
fs.writeFileSync('assets/css/fonts.css', '/* Vendored Google Fonts; licenses in assets/fonts/. Regenerate: node tools/vendor-fonts.mjs */\n' + css);
console.log('Saved local variable fonts, unicode subsets and OFL licenses.');
