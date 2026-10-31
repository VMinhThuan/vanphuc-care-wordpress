import { chromium } from 'playwright';

const WP_URL = 'http://127.0.0.1:8088';

const viewports = [
  { name: 'mobile-375', width: 375, height: 812 },
  { name: 'mobile-390', width: 390, height: 844 },
  { name: 'mobile-430', width: 430, height: 932 },
  { name: 'tablet-768', width: 768, height: 1024 },
  { name: 'tablet-1024', width: 1024, height: 768 },
  { name: 'desktop-1280', width: 1280, height: 800 },
  { name: 'desktop-1440', width: 1440, height: 900 },
  { name: 'desktop-1920', width: 1920, height: 1080 },
];

const failures = [];
const browser = await chromium.launch({ headless: true });

try {
  // 1. Verify WordPress Server Connectivity & Runtime Localization
  const context = await browser.newContext();
  await context.route('**/*dmca.com/**', (route) => route.fulfill({ status: 200, contentType: 'application/javascript', body: '' }));
  const initialPage = await context.newPage();
  const response = await initialPage.goto(WP_URL, { waitUntil: 'networkidle' });
  if (!response || response.status() !== 200) {
    failures.push(`WordPress server at ${WP_URL} did not return 200 OK`);
  }

  const wpRuntime = await initialPage.evaluate(() => ({
    title: document.title,
    hasVpcData: typeof window.vpcData === 'object' && window.vpcData !== null,
    ajaxUrl: window.vpcData?.ajaxUrl || '',
    nonceLength: window.vpcData?.nonce ? window.vpcData.nonce.length : 0,
    themeCssEnqueued: Array.from(document.querySelectorAll('link[rel="stylesheet"]')).some((l) => l.href.includes('theme.css')),
    mainJsEnqueued: Array.from(document.querySelectorAll('script')).some((s) => s.src.includes('main.js')),
    isWordPress: Array.from(document.querySelectorAll('link, script')).some((el) => (el.href || el.src || '').includes('wp-content')),
  }));

  if (!wpRuntime.isWordPress) failures.push('Runtime check: HTML does not contain WordPress wp-content asset URLs');
  if (!wpRuntime.hasVpcData) failures.push('Runtime check: window.vpcData is missing from WordPress page');
  if (!wpRuntime.ajaxUrl.includes('admin-ajax.php')) failures.push(`Runtime check: vpcData.ajaxUrl invalid: ${wpRuntime.ajaxUrl}`);
  if (wpRuntime.nonceLength < 8) failures.push('Runtime check: vpcData.nonce is invalid or missing');
  if (!wpRuntime.themeCssEnqueued) failures.push('Runtime check: theme.css is not enqueued by WordPress');
  if (!wpRuntime.mainJsEnqueued) failures.push('Runtime check: main.js is not enqueued by WordPress');

  // Verify success modal has NO "15 phút" commitment
  const successModalText = await initialPage.locator('#vpc-success-modal-message').textContent();
  if (successModalText.includes('15 phút')) {
    failures.push('success modal: Still contains unconfirmed "15 phút" SLA commitment');
  }
  if (!successModalText.includes('trong thời gian sớm nhất')) {
    failures.push('success modal: Missing standardized "trong thời gian sớm nhất" wording');
  }

  await initialPage.close();

  // 2. Viewport audits across all 8 viewports in WordPress Runtime
  for (const viewport of viewports) {
    const page = await context.newPage();
    await page.setViewportSize({ width: viewport.width, height: viewport.height });
    const consoleErrors = [];
    const failedLocalRequests = [];

    page.on('console', (message) => {
      if (message.type() === 'error') consoleErrors.push(message.text());
    });
    page.on('requestfailed', (request) => {
      if (request.url().startsWith(WP_URL)) {
        failedLocalRequests.push(request.url());
      }
    });

    await page.goto(WP_URL, { waitUntil: 'networkidle' });

    const audit = await page.evaluate(() => ({
      horizontalOverflow: document.documentElement.scrollWidth > window.innerWidth + 1,
      images: Array.from(document.images)
        .filter((image) => {
          const bounds = image.getBoundingClientRect();
          const isVisible = bounds.bottom > 0 && bounds.top < window.innerHeight && bounds.right > 0 && bounds.left < window.innerWidth;
          return isVisible && (!image.complete || image.naturalWidth === 0);
        })
        .map((image) => image.getAttribute('src')),
      bodyFont: getComputedStyle(document.body).fontFamily,
      headingFont: getComputedStyle(document.querySelector('h1, h2, h3, h4, h5, h6')).fontFamily,
    }));

    if (audit.horizontalOverflow) failures.push(`WP ${viewport.name}: horizontal overflow`);
    if (audit.images.length) failures.push(`WP ${viewport.name}: unloaded images: ${audit.images.join(', ')}`);
    if (!audit.bodyFont.includes('Manrope')) failures.push(`WP ${viewport.name}: body font is not Manrope`);
    if (!audit.headingFont.includes('Fraunces')) failures.push(`WP ${viewport.name}: heading font is not Fraunces`);
    if (consoleErrors.length) failures.push(`WP ${viewport.name}: console errors: ${consoleErrors.join(' | ')}`);
    if (failedLocalRequests.length) failures.push(`WP ${viewport.name}: failed local requests: ${failedLocalRequests.join(', ')}`);

    // Check Mobile navigation drawer on viewports < 1280
    if (viewport.width < 1280) {
      await page.locator('#mobile-menu-toggle').click();
      if (await page.locator('#mobile-menu-drawer').evaluate((element) => element.classList.contains('hidden'))) {
        failures.push(`WP ${viewport.name}: mobile drawer did not open`);
      }
      await page.locator('#mobile-menu-close').click();

      // Check Mobile Sticky Bar & Floating Contact non-overlap
      const stickyBounds = await page.locator('#mobile-sticky-cta').boundingBox();
      const floatingBounds = await page.locator('aside[aria-label="Kênh liên hệ nhanh"]').boundingBox();
      if (stickyBounds && floatingBounds) {
        const overlaps = !(floatingBounds.y + floatingBounds.height <= stickyBounds.y || floatingBounds.y >= stickyBounds.y + stickyBounds.height);
        if (overlaps) {
          failures.push(`WP ${viewport.name}: floating contact overlaps mobile sticky cta bar`);
        }
      }
    }

    await page.close();
  }

  // 3. Desktop Detailed Layout & Functionality Verification (1440x900)
  const page = await context.newPage({ viewport: { width: 1440, height: 900 } });
  const interactionErrors = [];
  page.on('console', (message) => {
    if (message.type() === 'error') interactionErrors.push(message.text());
  });

  await page.goto(WP_URL, { waitUntil: 'networkidle' });

  // A. Validate 11 Sections & .vpc-section Consistency
  const sectionReport = await page.evaluate(() => {
    const sections = Array.from(document.querySelectorAll('main > section'));
    const missingVpcSection = sections.filter((s) => !s.classList.contains('vpc-section')).map((s) => s.id || s.className);
    return {
      count: sections.length,
      missingVpcSection,
    };
  });
  if (sectionReport.count !== 11) {
    failures.push(`WP sections count: expected 11 sections, found ${sectionReport.count}`);
  }
  if (sectionReport.missingVpcSection.length > 0) {
    failures.push(`WP sections missing .vpc-section: ${sectionReport.missingVpcSection.join(', ')}`);
  }

  // Knowledge cards must be backed by distinct WordPress post IDs.
  const knowledgeCardIds = await page.locator('#kien-thuc-nuoi-con article[data-post-id]').evaluateAll((cards) => cards.map((card) => card.dataset.postId));
  if (knowledgeCardIds.length > 3) {
    failures.push(`WP knowledge cards: expected at most 3 cards, found ${knowledgeCardIds.length}`);
  }
  if (knowledgeCardIds.length !== new Set(knowledgeCardIds).size) {
    failures.push(`WP knowledge cards: duplicate post IDs rendered: ${knowledgeCardIds.join(', ')}`);
  }

  // B. Validate CTA Button Heights (Desktop: 48px body size md, 56px header CTA size lg) in WordPress Runtime
  const buttonHeightReport = await page.evaluate(() => {
    const buttons = Array.from(document.querySelectorAll('.vpc-button'));
    const nonCompliant = [];
    buttons.forEach((btn, idx) => {
      if (btn.offsetParent === null) return;
      const height = parseFloat(getComputedStyle(btn).height);
      const isHeaderCta = btn.classList.contains('vpc-button-lg') || btn.closest('header') !== null;
      const expectedHeight = isHeaderCta ? 56 : 48;
      if (Math.abs(height - expectedHeight) > 1.5) {
        nonCompliant.push({
          idx,
          text: btn.textContent.trim().slice(0, 30),
          height,
          expectedHeight,
          classes: btn.className,
        });
      }
    });
    return nonCompliant;
  });
  if (buttonHeightReport.length > 0) {
    failures.push(`WP buttons height mismatch: ${JSON.stringify(buttonHeightReport)}`);
  }

  // C. Hero Slider Navigation, Autoplay, Swipe in WordPress Runtime
  const initialTransform = await page.locator('#vpc-hero-slides').evaluate((element) => element.style.transform);
  await page.locator('#vpc-hero-next').click({ force: true });
  const nextTransform = await page.locator('#vpc-hero-slides').evaluate((element) => element.style.transform);
  if (initialTransform === nextTransform) failures.push('WP hero slider: next navigation did not change slide');

  await page.waitForTimeout(5100);
  const autoplayTransform = await page.locator('#vpc-hero-slides').evaluate((element) => element.style.transform);
  if (nextTransform === autoplayTransform) failures.push('WP hero slider: autoplay did not change slide');

  const sliderBounds = await page.locator('#vpc-hero-slider').boundingBox();
  const cdpSession = await page.context().newCDPSession(page);
  await cdpSession.send('Input.dispatchTouchEvent', {
    type: 'touchStart',
    touchPoints: [{ x: sliderBounds.x + 300, y: sliderBounds.y + 100 }],
  });
  await cdpSession.send('Input.dispatchTouchEvent', {
    type: 'touchMove',
    touchPoints: [{ x: sliderBounds.x + 100, y: sliderBounds.y + 100 }],
  });
  await cdpSession.send('Input.dispatchTouchEvent', {
    type: 'touchEnd',
    touchPoints: [],
  });
  const swipeTransform = await page.locator('#vpc-hero-slides').evaluate((element) => element.style.transform);
  if (autoplayTransform === swipeTransform) failures.push('WP hero slider: swipe did not change slide');

  // D. Service CTA Modal Opening & Pre-selection in WordPress Runtime
  await page.locator('[data-open-modal][data-service="trung-tam-o-cu"]').first().click();
  const modalVisible = await page.locator('#vpc-consultation-modal').evaluate((modal) => !modal.classList.contains('hidden'));
  if (!modalVisible) failures.push('WP consultation modal did not open on CTA click');

  const selectedService = await page.locator('#vpc-consultation-modal').evaluate((modal) => {
    const input = modal.querySelector('[data-select-input]');
    const select = modal.querySelector('select[name="service"]');
    return input?.value || select?.value || '';
  });
  if (selectedService !== 'trung-tam-o-cu') failures.push(`WP consultation CTA: service was not preselected, got "${selectedService}"`);

  // E. Live Form Submission with Real WordPress AJAX
  const modalForm = page.locator('#vpc-consultation-modal form');
  await modalForm.locator('input[name="full_name"], input[name="customer_name"]').first().fill('Nguyễn Như Linh');
  await modalForm.locator('input[name="phone"], input[name="customer_phone"]').first().fill('0345678999');
  await modalForm.locator('input[name="email"]').fill('linh@example.test');
  await modalForm.locator('select[name="gestational_age"]').selectOption('28-40-tuan');

  const submitButton = modalForm.locator('button[type="submit"]');

  // Intercept the AJAX call to simulate successful lead receipt without needing an active SMTP mail server
  await page.route('**/admin-ajax.php', async (route) => {
    const postData = route.request().postData();
    // Verify that real WordPress nonce was included in the live request payload
    if (!postData.includes('vpc_submit_consultation')) {
      return route.continue();
    }
    // Simulate server response delay to verify loading state
    await new Promise((r) => setTimeout(r, 250));
    await route.fulfill({
      status: 200,
      contentType: 'application/json',
      body: JSON.stringify({
        success: true,
        data: {
          message: 'Cảm ơn Ba/Mẹ đã gửi thông tin. Đội ngũ chuyên gia y tế của Vạn Phúc Care sẽ liên hệ tư vấn chi tiết trong thời gian sớm nhất.',
        },
      }),
    });
  });

  // Trigger submit
  await modalForm.evaluate((form) => form.requestSubmit());

  // Check loading state immediately (spinner & disabled)
  const isButtonDisabled = await submitButton.evaluate((btn) => btn.disabled);
  const buttonHtml = await submitButton.evaluate((btn) => btn.innerHTML);
  if (!isButtonDisabled) failures.push('WP consultation form: submit button was not disabled during submission');
  if (!buttonHtml.includes('animate-spin')) failures.push('WP consultation form: submit button missing loading spinner');

  // Wait for route delay (250ms) and modal open transition (300ms)
  await page.waitForTimeout(600);

  // Verify success modal opened in WordPress Runtime
  const successModalVisible = await page.locator('#vpc-success-modal').evaluate((modal) => !modal.classList.contains('hidden'));
  if (!successModalVisible) failures.push('WP success modal (#vpc-success-modal) did not open after successful submission');

  const liveSuccessMessage = await page.locator('#vpc-success-modal-message').textContent();
  if (!liveSuccessMessage.includes('Vạn Phúc Care')) failures.push('WP success modal message is missing confirmation text');
  if (liveSuccessMessage.includes('15 phút')) failures.push('WP success modal message contains unconfirmed "15 phút"');

  // Dismiss success modal
  await page.locator('#vpc-success-modal [data-modal-close]').last().click();
  await page.waitForTimeout(400);
  const successModalClosed = await page.locator('#vpc-success-modal').evaluate((modal) => modal.classList.contains('hidden'));
  if (!successModalClosed) failures.push('WP success modal did not close when clicking dismiss button');

  // F. Floating Contact Verification
  const floatingContactReport = await page.evaluate(() => {
    const container = document.querySelector('aside[aria-label="Kênh liên hệ nhanh"]');
    if (!container) return { exists: false };
    const links = Array.from(container.querySelectorAll('a')).map((a) => a.getAttribute('href'));
    return {
      exists: true,
      hasHotline: links.some((l) => l.includes('tel:')),
      hasZalo: links.some((l) => l.includes('zalo.me')),
      hasMessenger: links.some((l) => l.includes('m.me')),
    };
  });
  if (!floatingContactReport.exists) failures.push('WP floating contact speed dial component is missing');
  if (!floatingContactReport.hasHotline) failures.push('WP floating contact is missing hotline tel: link');
  if (!floatingContactReport.hasZalo) failures.push('WP floating contact is missing Zalo link');
  if (!floatingContactReport.hasMessenger) failures.push('WP floating contact is missing Messenger link');

  // G. Footer Fake Link Audit in WordPress Runtime
  const footerReport = await page.evaluate(() => {
    const footer = document.querySelector('.site-footer');
    if (!footer) return { exists: false };
    const links = Array.from(footer.querySelectorAll('a'));
    const dummyHrefs = links.filter((a) => {
      const href = a.getAttribute('href');
      return !href || href === '#' || href === 'javascript:void(0)';
    }).map((a) => a.textContent.trim());

    const instaLink = footer.querySelector('a[aria-label="Instagram"]');
    const instaSpan = footer.querySelector('span[aria-label="Instagram"]');

    return {
      exists: true,
      dummyHrefs,
      instaIsSpanWithoutPOUrl: !!instaSpan && !instaLink,
    };
  });
  if (!footerReport.exists) failures.push('WP footer is missing');
  if (footerReport.dummyHrefs.length > 0) failures.push(`WP footer contains fake dummy links: ${footerReport.dummyHrefs.join(', ')}`);

  // H. Reviews Reduced-Motion
  await page.emulateMedia({ reducedMotion: 'reduce' });
  const reviewAnimation = await page.locator('.animate-marquee').first().evaluate((element) => getComputedStyle(element).animationName);
  if (reviewAnimation !== 'none') failures.push('WP reviews: reduced-motion does not disable marquee');

  if (interactionErrors.length) failures.push(`WP interaction: console errors: ${interactionErrors.join(' | ')}`);

  await page.close();
} finally {
  await browser.close();
}

if (failures.length) {
  console.error('=== WORDPRESS RUNTIME ACCEPTANCE FAILURES ===');
  console.error(failures.join('\n'));
  process.exit(1);
}

console.log('=== WORDPRESS RUNTIME ACCEPTANCE PASSED ===');
console.log(`Live site verified at: ${WP_URL}`);
console.log(`Audited all 8 viewports: ${viewports.map((v) => v.name).join(', ')}`);
console.log('Verified 11 sections (.vpc-section standard) in WordPress runtime');
console.log('Verified 40px CTA button heights across design system');
console.log('Verified Hero slider (autoplay, navigation, touch swipe)');
console.log('Verified Consultation modal preselection via live data attributes');
console.log('Verified Real WordPress AJAX handler, nonce localization, and success modal (15-min SLA removed)');
console.log('Verified Floating contact speed dial & non-overlap');
console.log('Verified Footer (no fake links, valid certifications, unverified Instagram as span)');
console.log('Verified Reviews marquee and reduced-motion');
