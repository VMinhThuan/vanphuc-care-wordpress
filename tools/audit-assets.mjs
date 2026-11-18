/** Read-only public staging snapshots. Run after build; never submits forms. */
import fs from 'node:fs';
import path from 'node:path';
import { chromium } from 'playwright';
import { gzipSync } from 'node:zlib';
const root = process.cwd(), out = path.join(root, 'scratch/assets-qa');
fs.mkdirSync(out, { recursive: true });
fs.mkdirSync(path.join(out, 'before'), { recursive: true });
const origin = process.env.VPC_AUDIT_ORIGIN || 'https://staging.vanphuccare.vn';
const manifest = JSON.parse(fs.readFileSync('assets/asset-manifest.json')).assets;
const pages = [
  ['home','/'], ['bath','/dich-vu/tam-tre-so-sinh/'], ['article','/?p=11051'],
  ['news-hub','/tin-tuc/'], ['prenatal','/dich-vu/lop-hoc-tien-san/'], ['contact','/lien-he/'],
  ['policy','/chinh-sach-bao-mat/'], ['knowledge','/kien-thuc/'], ['recruitment','/tuyen-dung/'],
];
const cache = new Map(), reports = [];
const browser = await chromium.launch({ headless: true, ...(process.env.VPC_BROWSER ? { executablePath: process.env.VPC_BROWSER } : {}) });
const cssPrefix = '/wp-content/themes/vanphuccare/assets/css/';
function optimizedHtml(html, kind) {
  let combined = false;
  return html.replace(/<link\b[^>]*>/gi, tag => {
    const match = tag.match(/href=['"]([^'"]+)['"]/i);
    if (!match || !match[1].includes(cssPrefix)) return tag;
    let name = new URL(match[1], origin).pathname.split('/').pop();
    if (['footer.css','mobile-responsive.css','select-menu.css','mobile-menu.css'].includes(name)) {
      if (combined) return '';
      combined = true; name = 'site-overrides.css';
    } else if (name === 'theme.css') name = 'site-core.css';
    else if (name === 'knowledge.css' && ['article','news-article'].includes(kind)) name = 'knowledge-components.css';
    else if (name === 'news.css' && kind === 'news-article') name = 'news-shell.css';
    const entry = manifest['assets/css/'+name];
    let result = tag.replace(match[1], origin + '/wp-content/themes/vanphuccare/' + entry.file + '?ver=' + entry.version);
    if (name === 'site-core.css' && ['prenatal','contact','policy'].includes(kind)) {
      const extra = manifest['assets/css/page-'+kind+'.css'];
      result += `<link rel="stylesheet" href="${origin}/wp-content/themes/vanphuccare/${extra.file}">`;
    }
    return result;
  });
}
async function snapshot(html, kind, width, mode) {
  const page = await browser.newPage({ viewport: { width, height: 900 }, reducedMotion: 'reduce' });
  const css = [], failures = [];
  await page.route('**/*', async route => {
    const request = route.request(), url = request.url();
    if (request.isNavigationRequest() && request.frame() === page.mainFrame()) {
      // Stabilize dynamic content. Compare identical DOM and assets, only CSS changes.
      let body = mode === 'after' ? optimizedHtml(html, kind) : html;
      body = body.replace(/<script\b[^>]*>[\s\S]*?<\/script>/gi, '').replace(/loading=["']lazy["']/g, 'loading="eager"');
      await route.fulfill({ contentType: 'text/html', body }); return;
    }
    if (url.includes(cssPrefix)) {
      const name = new URL(url).pathname.split('/').pop();
      const file = mode === 'before' ? path.join(out,'before',name) : path.join(root,'assets/css',name);
      if (!fs.existsSync(file)) { failures.push('Missing '+name); await route.abort(); return; }
      const body = fs.readFileSync(file);
      css.push({ name, bytes: body.length, gzip: gzipSync(body).length });
      await route.fulfill({ contentType: 'text/css', body }); return;
    }
    if (['script','media'].includes(request.resourceType())) { await route.abort(); return; }
    try {
      if (!cache.has(url)) {
        cache.set(url, (async()=>{const response=await route.fetch({timeout:20000});return {status:response.status(),headers:response.headers(),body:await response.body()};})());
      }
      await route.fulfill(await cache.get(url));
    } catch { await route.abort(); }
  });
  await page.coverage.startCSSCoverage();
  await page.goto(origin+'/', { waitUntil: 'load', timeout: 60000 });
  await page.evaluate(() => document.fonts.ready);
  await page.addStyleTag({ content: '*,*::before,*::after{animation:none!important;transition:none!important;caret-color:transparent!important}' });
  const metrics = await page.evaluate(() => {
    const properties = ['display','position','color','backgroundColor','fontFamily','fontSize','fontWeight','lineHeight','paddingTop','paddingRight','paddingBottom','paddingLeft','marginTop','marginBottom','gap','borderRadius','boxShadow','transform'];
    return Array.from(document.querySelectorAll('header *,main *,footer *')).filter(e => !['SCRIPT','STYLE','PATH','BR','SOURCE'].includes(e.tagName)).map((e,index)=>{
      const s=getComputedStyle(e),r=e.getBoundingClientRect();
      return {index,tag:e.tagName,cls:e.className?.baseVal??e.className,rect:[r.x,r.y,r.width,r.height].map(n=>Math.round(n*10)/10),style:Object.fromEntries(properties.map(p=>[p,s[p]]))};
    });
  });
  const coverage = await page.coverage.stopCSSCoverage();
  const totals = coverage.filter(entry=>entry.url.includes(cssPrefix)).reduce((sum,e)=>{
    sum.total+=Buffer.byteLength(e.text);sum.used+=e.ranges.reduce((n,r)=>n+Buffer.byteLength(e.text.slice(r.start,r.end)),0);return sum;
  },{total:0,used:0});
  if (width === 390) await page.screenshot({ path: path.join(out,kind+'-'+mode+'.png'), fullPage: true });
  await page.close();
  return {metrics,css,coverage:totals,failures};
}
try {
  // Capture a single public DOM for each comparison; reuse on subsequent QA runs.
  for (const [kind,url] of pages) {
    const file = path.join(out,kind+'.html');
    if (!fs.existsSync(file) || process.env.VPC_AUDIT_REFRESH === '1') {
      const response = await fetch(origin+url);
      if (!response.ok) throw new Error(kind+' returned '+response.status);
      fs.writeFileSync(file,await response.text());
    }
  }
  // Use deployed CSS, not the tracked Tailwind artifact (CI rebuilds it).
  const baselineUrls = new Map();
  for (const [kind] of pages) {
    const html = fs.readFileSync(path.join(out,kind+'.html'),'utf8');
    for (const match of html.matchAll(/<link\b[^>]*href=['"]([^'"]+)['"][^>]*>/gi)) {
      if (match[1].includes(cssPrefix)) baselineUrls.set(new URL(match[1],origin).pathname.split('/').pop(),match[1]);
    }
  }
  for (const [name,url] of baselineUrls) {
    const file = path.join(out,'before',name);
    if (!fs.existsSync(file) || process.env.VPC_AUDIT_REFRESH === '1') {
      const response = await fetch(url, { signal: AbortSignal.timeout(30000) });
      if (!response.ok) throw new Error('Baseline '+name+' returned '+response.status);
      fs.writeFileSync(file,Buffer.from(await response.arrayBuffer()));
    }
  }
  const newsHtml=fs.readFileSync(path.join(out,'news-hub.html'),'utf8');
  const articleUrl=newsHtml.match(/<a[^>]+(?:class="[^"]*vpc-hub-card[^\"]*"[^>]+href="([^"]+)"|href="([^"]+)"[^>]+class="[^"]*vpc-hub-card)/)?.slice(1).find(Boolean);
  if(articleUrl){
    const file=path.join(out,'news-article.html');
    if(!fs.existsSync(file)) {const response=await fetch(new URL(articleUrl,origin));fs.writeFileSync(file,await response.text());}
    pages.push(['news-article',articleUrl]);
  }
  for (const [kind] of pages.filter(([name])=>!process.env.VPC_AUDIT_PAGE || name===process.env.VPC_AUDIT_PAGE)) {
    const html=fs.readFileSync(path.join(out,kind+'.html'),'utf8');
    if(!html.includes(cssPrefix))throw new Error(kind+' snapshot has no theme CSS');
    for (const width of [390,1440]) {
      const before=await snapshot(html,kind,width,'before'),after=await snapshot(html,kind,width,'after');
      const differences=[];
      before.metrics.forEach((old,i)=>{
        const current=after.metrics[i];
        if(!current||JSON.stringify(old)!==JSON.stringify(current)) differences.push({before:old,after:current});
      });
      const report={kind,width,differences:differences.length,before:{css:before.css,coverage:before.coverage},after:{css:after.css,coverage:after.coverage},failures:[...before.failures,...after.failures]};
      reports.push(report);
      if(differences.length)fs.writeFileSync(path.join(out,kind+'-'+width+'-diff.json'),JSON.stringify(differences,null,2));
      fs.writeFileSync(path.join(out,'report.json'),JSON.stringify(reports,null,2));
      console.log(JSON.stringify({kind,width,differences:differences.length,beforeBytes:before.css.reduce((s,c)=>s+c.bytes,0),afterBytes:after.css.reduce((s,c)=>s+c.bytes,0),failures:report.failures}));
    }
  }
} finally {await browser.close();}
if(reports.some(r=>r.differences||r.failures.length))process.exitCode=1;
