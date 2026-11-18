import { chromium } from 'playwright';
import fs from 'node:fs';
import path from 'node:path';
import assert from 'node:assert/strict';
const browser=await chromium.launch({executablePath:process.env.VPC_BROWSER});
try {
  const page=await browser.newPage();
  await page.route('**/*',async route=>{
    const url=new URL(route.request().url());
    assert.equal(url.hostname,'fonts.test');
    if(url.pathname==='/')return route.fulfill({contentType:'text/html',body:'<link rel="stylesheet" href="/assets/css/fonts.built.css"><p>Font test</p>'});
    const file=path.join(process.cwd(),url.pathname);
    return route.fulfill({body:fs.readFileSync(file),contentType:file.endsWith('.woff2')?'font/woff2':'text/css'});
  });
  await page.goto('https://fonts.test/');
  const result=await page.evaluate(async()=>{
    const loaded=[];
    for(const family of ['Fraunces','Manrope'])for(const weight of [400,500,600,700]){
      const faces=await document.fonts.load(`${weight} 24px ${family}`,'Chăm sóc mẹ và bé — Vạn Phúc Care');
      loaded.push({family,weight,faces:faces.length,ok:faces.every(f=>f.status==='loaded')});
    }
    return loaded;
  });
  assert.ok(result.every(r=>r.ok&&r.faces>=2));
  console.log(JSON.stringify(result));
}finally{await browser.close();}
