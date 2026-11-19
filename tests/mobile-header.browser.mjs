import fs from 'node:fs';
import assert from 'node:assert/strict';
import { chromium } from 'playwright';

const browser = await chromium.launch({ executablePath: process.env.VPC_BROWSER });
try {
  for (const width of [320, 393, 768, 1279, 1440]) {
    const page = await browser.newPage({ viewport: { width, height: 800 } });
    const errors = [];
    page.on('pageerror', e => errors.push(e.message));
    await page.route('https://header.test/', route => route.fulfill({ contentType: 'text/html', body: `
      <style>body{margin:0}.hidden{display:none!important}.overflow-hidden{overflow:hidden}
      #site-header{position:sticky;top:0;height:80px;background:white;z-index:50}
      #mobile-menu-drawer{position:fixed;inset:0;z-index:50}
      #mobile-sticky-cta{position:fixed;bottom:0;height:84px}
      main{height:4000px}footer{height:200px}</style>
      <header id="site-header"><button id="mobile-menu-toggle">Menu</button><a href="#target">Link</a></header>
      <div id="mobile-menu-drawer" class="hidden"><button id="mobile-menu-close">Close</button></div>
      <div id="mobile-sticky-cta">Consultation</div>
      <aside id="floating-contact" style="position:fixed;display:flex" class="flex-col right-3 bottom-24 xl:bottom-6 gap-2">
        ${['messenger','zalo','phone'].map((icon,i)=>`<a href="${['https://m.me/vanphuccare','https://zalo.me/0908093198','tel:0908093198'][i]}" class="contact-test-link"><img alt="${icon}" src="data:image/svg+xml;base64,${fs.readFileSync('assets/icons/'+icon+'.svg').toString('base64')}"></a>`).join('')}
      </aside>
      <main><h2 id="target" style="padding-top:1000px">Article</h2></main><footer class="site-footer"></footer>
      <script>${fs.readFileSync('assets/js/main.js','utf8')}</script>` }));
    await page.goto('https://header.test/');
    await page.addStyleTag({ content: fs.readFileSync('assets/css/mobile-menu.css','utf8') });
    await page.addStyleTag({ content: '.contact-test-link{width:44px;height:44px}.flex-col{flex-direction:column}@media(min-width:1280px){.right-3{right:12px}.bottom-24{bottom:24px}}' });
    const contactHidden=()=>page.locator('#floating-contact').evaluate(e=>e.inert && e.getAttribute('aria-hidden')==='true');
    await page.waitForTimeout(250); // Let the stylesheet's initial transform settle.
    assert.equal(await contactHidden(),false);
    assert.equal(await page.locator('#floating-contact a').count(),3);
    assert.equal(await page.locator('#floating-contact').evaluate(e=>getComputedStyle(e).flexDirection),width<1280?'row':'column');
    if(width<1280){
      const box=await page.locator('#floating-contact').boundingBox();
      const ctaBox=await page.locator('#mobile-sticky-cta').boundingBox();
      assert.equal(box.y+box.height,ctaBox.y);
      assert.equal(box.height,56);
      assert.equal(box.width,width);
      assert.equal(box.x,0);
      const cells=await page.locator('#floating-contact > a').evaluateAll(nodes=>nodes.map(e=>({width:e.getBoundingClientRect().width,height:e.getBoundingClientRect().height})));
      assert.ok(cells.every(cell=>cell.height===56 && Math.abs(cell.width-box.width/3)<2));
      if(width===393) {
        fs.mkdirSync('scratch',{recursive:true});
        await page.screenshot({path:'scratch/contact-bar-mobile.png',clip:{x:0,y:620,width,height:180}});
      }
    }
    const hidden = () => page.locator('#site-header').evaluate(e=>e.classList.contains('vpc-header-hidden'));
    const scroll = async y => { await page.evaluate(y=>window.scrollTo(0,y),y); await page.waitForTimeout(240); };
    const startHeight = await page.evaluate(()=>document.documentElement.scrollHeight);
    await scroll(400);
    assert.equal(await hidden(), width < 1280);
    assert.equal(await contactHidden(),width<1280);
    assert.equal(await page.evaluate(()=>document.documentElement.scrollHeight),startHeight);
    const cta = await page.locator('#mobile-sticky-cta').boundingBox();
    assert.equal(cta.y+cta.height,800);
    await scroll(395); // A tiny reverse movement must not flicker.
    assert.equal(await hidden(),width<1280);
    assert.equal(await contactHidden(),width<1280);
    await scroll(370);
    assert.equal(await hidden(),false);
    assert.equal(await contactHidden(),false);
    if (width<1280) {
      await page.locator('#mobile-menu-toggle').click();
      assert.equal(await contactHidden(),true);
      const drawer=await page.locator('#mobile-menu-drawer').boundingBox();
      assert.equal(drawer.y,0); assert.equal(drawer.height,800);
      await scroll(600); assert.equal(await hidden(),false);
      await page.keyboard.press('Escape');
      assert.equal(await page.locator('#mobile-menu-drawer').evaluate(e=>e.classList.contains('hidden')),true);
      await page.evaluate(()=>document.activeElement.blur());
      await scroll(800); assert.equal(await hidden(),true);
      await page.evaluate(()=>document.body.classList.add('overflow-hidden'));
      await page.waitForTimeout(50); assert.equal(await hidden(),false);
      assert.equal(await contactHidden(),true);
      await page.evaluate(()=>document.body.classList.remove('overflow-hidden'));
      await scroll(1000); assert.equal(await hidden(),true);
      await page.locator('#mobile-menu-toggle').focus();
      assert.equal(await hidden(),false);
      await page.evaluate(()=>document.activeElement.blur());
      await scroll(1200);
      await page.setViewportSize({width:1440,height:800});
      await page.waitForTimeout(250); assert.equal(await hidden(),false);
      assert.equal(await contactHidden(),false);
      await page.setViewportSize({width,height:800});
      await page.emulateMedia({reducedMotion:'reduce'});
      assert.equal(await page.locator('#site-header').evaluate(e=>getComputedStyle(e).transitionDuration),'0s');
      assert.equal(await page.locator('#floating-contact').evaluate(e=>getComputedStyle(e).transitionDuration),'0s');
    }
    await scroll(3400);
    await scroll(3380);
    assert.equal(await contactHidden(),width<1280); // Footer wins over upward direction.
    await scroll(0); assert.equal(await hidden(),false);
    assert.equal(await contactHidden(),false);
    assert.deepEqual(errors,[]);
    await page.close();
    console.log(`PASS header ${width}px: direction, layout, drawer, focus, lock, resize`);
  }
  const header=fs.readFileSync('header.php','utf8');
  assert.ok(header.indexOf('</header>') < header.indexOf('id="mobile-menu-drawer"'));
  assert.ok(header.indexOf('</header>') < header.indexOf('id="mobile-sticky-cta"'));
} finally { await browser.close(); }
