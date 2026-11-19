import fs from 'node:fs';
import assert from 'node:assert/strict';
import {execFileSync} from 'node:child_process';
import {chromium} from 'playwright';
const content=['7440311961700650247','7485964405767785735'].map(id=>`<blockquote class="tiktok-embed" cite="https://www.tiktok.com/@methuylamy/video/${id}" data-video-id="${id}"></blockquote>`).join('');
const html=execFileSync(process.env.PHP_BINARY||'php',['-n','tests/render-tiktok.php'],{input:JSON.stringify({content}),encoding:'utf8'});
const browser=await chromium.launch({executablePath:process.env.VPC_BROWSER});
try{
 const page=await browser.newPage();
 const errors=[];page.on('pageerror',e=>errors.push(e.message));
 await page.route('**/*',route=>{
  if(new URL(route.request().url()).hostname==='tiktok.test')return route.fulfill({contentType:'text/html; charset=UTF-8',body:html+`<script>${fs.readFileSync('assets/js/main.js','utf8')}</script>`});
  return route.fulfill({contentType:'text/html',body:'<p>Mock TikTok player</p>'});
 });
 await page.goto('https://tiktok.test');
 const frames=page.locator('[data-vpc-tiktok] iframe');
 for(const frame of await frames.all())await frame.evaluate(e=>e.loading='eager');
 await page.waitForFunction(()=>document.querySelectorAll('iframe').length===2);
 await page.waitForTimeout(250);
 const send=async(index,type,value)=>{
  const frame=await (await frames.nth(index).elementHandle()).contentFrame();
  await frame.evaluate(({type,value})=>parent.postMessage({type,value,'x-tiktok-player':true},'https://tiktok.test'),{type,value});
  await page.waitForTimeout(50);
 };
 const statuses=page.locator('.vpc-tiktok-status');
 await send(0,'onPlayerError',{errorCode:2001,errorType:'<script>evil</script>'});
 assert.equal(await statuses.nth(0).evaluate(e=>e.hidden),false);
 assert.equal(await statuses.nth(1).evaluate(e=>e.hidden),true);
 assert.ok(!(await statuses.nth(0).textContent()).includes('evil'));
 await send(0,'onPlayerReady');
 assert.equal(await statuses.nth(0).evaluate(e=>e.hidden),false);
 await send(0,'onStateChange',1);
 assert.equal(await statuses.nth(0).evaluate(e=>e.hidden),true);
 await page.evaluate(()=>{
  const source=document.querySelector('iframe').contentWindow;
  const data={type:'onPlayerError',value:{errorCode:2001},'x-tiktok-player':true};
  window.dispatchEvent(new MessageEvent('message',{origin:'https://evil.test',source,data}));
  window.dispatchEvent(new MessageEvent('message',{origin:'https://www.tiktok.com',source:window,data}));
 });
 assert.equal(await statuses.nth(0).evaluate(e=>e.hidden),true);
 await send(1,'onPlayerError',{errorCode:3002});
 assert.ok((await statuses.nth(1).textContent()).includes('bấm Play'));
 assert.equal(await page.locator('.vpc-tiktok-watch').count(),2);
 assert.deepEqual(errors,[]);
 console.log('PASS: per-player errors, recovery, origin/source validation, safe messages and persistent links');
}finally{await browser.close();}
