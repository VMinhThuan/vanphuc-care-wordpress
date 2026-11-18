import { test } from 'node:test';
import assert from 'node:assert/strict';
import fs from 'node:fs';
import os from 'node:os';
import path from 'node:path';
import { execFileSync } from 'node:child_process';
import { createHash } from 'node:crypto';

const root = path.resolve(import.meta.dirname, '..');
const manifest = JSON.parse(fs.readFileSync(path.join(root, 'assets/asset-manifest.json'))).assets;
const php = process.env.PHP_BINARY || 'php';
let hasPhp = false;
try {
  execFileSync(php, ['-v'], { stdio: 'ignore' });
  hasPhp = true;
} catch {
  hasPhp = false;
}
const phpTest = (title, fn) => test(title, { skip: !hasPhp ? 'PHP CLI binary not found in local PATH (exercised on CI/CD)' : false }, fn);
const run = (scenario, fixture) => JSON.parse(execFileSync(php, ['-n', path.join(root, 'tests/test-asset-routing.php'), scenario], {
  cwd: root, env: { ...process.env, ...(fixture ? { VPC_ASSET_FIXTURE: fixture } : {}) }, encoding: 'utf8',
}));
const urls = result => Object.values(result.styles).map(s => s.src).filter(Boolean);

test('every manifest output exists and hash matches its bytes; images stay beside original CSS', () => {
  for (const [key, asset] of Object.entries(manifest)) {
    const bytes = fs.readFileSync(path.join(root, asset.file));
    assert.equal(asset.version, createHash('sha256').update(bytes).digest('hex').slice(0, 16));
    assert.equal(path.dirname(asset.file), path.dirname(key));
  }
});
phpTest('page assets remain conditional and original override handles remain available', () => {
  const home = run('home');
  assert.equal(urls(home).filter(u => u.includes('/assets/css/')).length, 3);
  assert.ok(urls(home).some(u => u.endsWith('site-core.built.css')));
  assert.ok(!urls(home).some(u => u.includes('page-prenatal')));
  for (const name of ['footer','mobile-responsive','select-menu','mobile-menu']) assert.deepEqual(home.styles['vanphuccare-'+name].deps,['vanphuccare-site-overrides']);
  for (const [scenario, sheet] of [['prenatal','prenatal'],['contact','contact'],['policy','policy']]) assert.ok(urls(run(scenario)).some(u => u.endsWith('page-'+sheet+'.built.css')));
  assert.ok(urls(run('bath')).some(u => u.endsWith('shared-lead-form.built.css')));
});
phpTest('editorial routes keep related cards and news footer, without entire listing CSS', () => {
  const article = run('article'), news = run('news');
  assert.ok(urls(article).some(u => u.endsWith('knowledge-components.built.css')));
  assert.ok(!urls(article).some(u => u.endsWith('/knowledge.built.css')));
  assert.ok(urls(news).some(u => u.endsWith('news-shell.built.css')));
  assert.ok(!urls(news).some(u => u.endsWith('/news.built.css')));
  assert.ok(urls(run('hub')).some(u => u.endsWith('/knowledge.built.css')));
  assert.ok(urls(run('news-hub')).some(u => u.endsWith('/news.built.css')));
});
phpTest('patterns survive legacy HTML, custom blocks, reusable blocks and editor previews', () => {
  assert.ok(!urls(run('article')).some(u => u.includes('article-patterns')));
  assert.ok(!urls(run('recruitment')).some(u => u.includes('article-patterns')));
  for (const scenario of ['legacy','pattern','shortcode','reusable','editor']) assert.ok(urls(run(scenario)).some(u => u.includes('article-patterns')), scenario);
  assert.equal(run('legacy').legacy_detected,true);
  assert.equal(run('reusable').unknown_ref_kept,true);
  assert.equal(run('article').yoast_faq_kept,true);
  assert.ok(urls(run('shortcode')).some(u => u.endsWith('/theme.built.css')));
  assert.ok(urls(run('reusable')).some(u => u.endsWith('/knowledge.built.css')));
});
phpTest('debug/rollback keep original styles; missing build gracefully falls back', () => {
  const fixture = fs.mkdtempSync(path.join(os.tmpdir(),'vpc-assets-'));
  try {
    assert.ok(urls(run('debug')).some(u => u.endsWith('/theme.css')));
  assert.equal(urls(run('disabled')).filter(u => u.includes('/assets/css/')).length,6);
    fs.mkdirSync(path.join(fixture,'assets/css'),{recursive:true});
    for(const name of ['theme','footer','mobile-responsive','select-menu','mobile-menu']) fs.writeFileSync(path.join(fixture,'assets/css',name+'.css'),'/* fixture */');
    fs.writeFileSync(path.join(fixture,'style.css'),'/* fixture */');
    assert.equal(urls(run('home',fixture)).filter(u=>u.includes('/assets/css/')).length,5);
    fs.writeFileSync(path.join(fixture,'assets/asset-manifest.json'),'{invalid');
    assert.equal(urls(run('home',fixture)).filter(u=>u.includes('/assets/css/')).length,5);
    fs.writeFileSync(path.join(fixture,'assets/asset-manifest.json'),JSON.stringify({schema:1,assets:manifest}));
    assert.equal(urls(run('home',fixture)).filter(u=>u.includes('/assets/css/')).length,5);
  } finally {
    // Only the verified directory allocated by mkdtemp for this test is removed.
    assert.ok(fixture.startsWith(path.join(os.tmpdir(),'vpc-assets-')));
    fs.rmSync(fixture,{recursive:true,force:true});
  }
});
phpTest('unchanged JS uses a content hash independent of release identifiers', () => {
  assert.equal(run('home').version,manifest['assets/js/main.js'].version);
});

phpTest('native defer preserves dependencies, editor and older WordPress', () => {
  const scripts = run('recruitment').scripts;
  assert.deepEqual(scripts['vanphuccare-recruitment-application'].deps, ['vanphuccare-recruitment-detail']);
  for (const handle of ['vanphuccare-main','vanphuccare-recruitment-detail','vanphuccare-recruitment-application']) assert.deepEqual(scripts[handle].args,{in_footer:true,strategy:'defer'});
  assert.equal(run('editor').scripts['vanphuccare-main'].args,true);
  assert.equal(run('old-wp').scripts['vanphuccare-main'].args,true);
  assert.equal(scripts['cloudflare-turnstile'].args,true);
  for (const scenario of ['home','editor','debug']) assert.ok(run(scenario).styles['vanphuccare-fonts'].src.includes('/assets/css/fonts'));
});

test('local fonts include Vietnamese, WOFF2, swap and licenses', () => {
  const css=fs.readFileSync(path.join(root,'assets/css/fonts.css'),'utf8');
  assert.ok(!css.includes('https://'));
  assert.equal((css.match(/\/\* vietnamese \*\//g)||[]).length,2);
  for(const m of css.matchAll(/url\(\.\.\/fonts\/([^)]+)\)/g)) assert.equal(fs.readFileSync(path.join(root,'assets/fonts',m[1])).subarray(0,4).toString(),'wOF2');
  assert.equal((css.match(/font-display: swap/g)||[]).length,(css.match(/@font-face/g)||[]).length);
  for(const family of ['fraunces','manrope']) assert.ok(fs.readFileSync(path.join(root,'assets/fonts',family+'-OFL.txt'),'utf8').includes('SIL OPEN FONT LICENSE'));
});
