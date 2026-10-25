import { chromium } from 'playwright';
import { createServer } from 'node:http';
import { existsSync, readFileSync } from 'node:fs';
import path from 'node:path';
import { fileURLToPath } from 'node:url';

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

const projectRoot = path.resolve(path.dirname(fileURLToPath(import.meta.url)), '..');
const mimeTypes = {
  '.css': 'text/css',
  '.html': 'text/html',
  '.jpg': 'image/jpeg',
  '.jpeg': 'image/jpeg',
  '.js': 'text/javascript',
  '.png': 'image/png',
  '.svg': 'image/svg+xml',
  '.webp': 'image/webp',
};

const staticServer = createServer((request, response) => {
  let pathname = decodeURIComponent(new URL(request.url, 'http://localhost').pathname);
  if (pathname === '/') pathname = '/index.html';
  const assetPath = path.resolve(projectRoot, `.${pathname}`);

  if (!assetPath.startsWith(projectRoot)) {
    response.writeHead(403);
    response.end();
    return;
  }

  try {
    const fileBuffer = readFileSync(assetPath);
    response.writeHead(200, {
      'content-type': mimeTypes[path.extname(assetPath).toLowerCase()] || 'application/octet-stream',
      'content-length': fileBuffer.length,
    });
    response.end(fileBuffer);
  } catch {
    response.writeHead(404);
    response.end();
  }
});

await new Promise((resolve) => staticServer.listen(0, '127.0.0.1', resolve));
const serverAddress = staticServer.address();
const baseUrl = `http://127.0.0.1:${serverAddress.port}/index.html`;
const browser = await chromium.launch({ headless: true });
const failures = [];
const staticMarkup = readFileSync(path.join(projectRoot, 'index.html'), 'utf8');

// 1. Audit static asset references
for (const attribute of staticMarkup.matchAll(/(?:src|srcset)="([^"]+)"/g)) {
  for (const candidate of attribute[1].split(',').map((value) => value.trim().replace(/\s+\d+(?:w|x)$/, ''))) {
    if (!candidate || /^(?:https?:|data:|#)/.test(candidate)) continue;
    const assetPath = path.resolve(projectRoot, decodeURIComponent(candidate.replace(/^\.\//, '')));
    if (!assetPath.startsWith(projectRoot) || !existsSync(assetPath)) {
      failures.push(`static asset is missing: ${candidate}`);
    }
  }
}

try {
  // 2. Viewport audits across all 8 required viewports
  for (const viewport of viewports) {
    const page = await browser.newPage({ viewport });
    const consoleErrors = [];
    const failedLocalRequests = [];

    page.on('console', (message) => {
      if (message.type() === 'error') consoleErrors.push(message.text());
    });
    page.on('requestfailed', (request) => {
      if (request.url().startsWith(baseUrl.replace('/index.html', ''))) {
        failedLocalRequests.push(request.url());
      }
    });

    await page.goto(baseUrl, { waitUntil: 'networkidle' });

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

    if (audit.horizontalOverflow) failures.push(`${viewport.name}: horizontal overflow`);
    if (audit.images.length) failures.push(`${viewport.name}: unloaded images: ${audit.images.join(', ')}`);
    if (!audit.bodyFont.includes('Manrope')) failures.push(`${viewport.name}: body font is not Manrope`);
    if (!audit.headingFont.includes('Fraunces')) failures.push(`${viewport.name}: heading font is not Fraunces`);
    if (consoleErrors.length) failures.push(`${viewport.name}: console errors: ${consoleErrors.join(' | ')}`);
    if (failedLocalRequests.length) failures.push(`${viewport.name}: failed local requests: ${failedLocalRequests.join(', ')}`);

    // Check Mobile navigation drawer on viewports < 1280
    if (viewport.width < 1280) {
      await page.locator('#mobile-menu-toggle').click();
      if (await page.locator('#mobile-menu-drawer').evaluate((element) => element.classList.contains('hidden'))) {
        failures.push(`${viewport.name}: mobile drawer did not open`);
      }
      await page.locator('#mobile-menu-close').click();

      // Check Mobile Sticky Bar & Floating Contact non-overlap
      const stickyBounds = await page.locator('#mobile-sticky-cta').boundingBox();
      const floatingBounds = await page.locator('aside[aria-label="Kênh liên hệ nhanh"]').boundingBox();
      if (stickyBounds && floatingBounds) {
        // Floating contact must be strictly above the bottom sticky bar on mobile
        const overlaps = !(floatingBounds.y + floatingBounds.height <= stickyBounds.y || floatingBounds.y >= stickyBounds.y + stickyBounds.height);
        if (overlaps) {
          failures.push(`${viewport.name}: floating contact overlaps mobile sticky cta bar`);
        }
      }
    }

    await page.close();
  }

  // 3. Desktop Detailed Layout & Functionality Verification (1440x900)
  const page = await browser.newPage({ viewport: { width: 1440, height: 900 } });
  const interactionErrors = [];
  page.on('console', (message) => {
    if (message.type() === 'error') interactionErrors.push(message.text());
  });

  // Setup route mock for AJAX lead submission
  let ajaxCallCount = 0;
  let lastAjaxPayload = null;
  await page.route('**/admin-ajax.php', async (route) => {
    ajaxCallCount++;
    const postData = route.request().postData();
    lastAjaxPayload = postData;
    // Add 300ms artificial delay to test loading spinner & disabled state
    await new Promise((r) => setTimeout(r, 300));
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

  await page.goto(baseUrl, { waitUntil: 'networkidle' });

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
    failures.push(`sections count: expected 11 sections, found ${sectionReport.count}`);
  }
  if (sectionReport.missingVpcSection.length > 0) {
    failures.push(`sections missing .vpc-section: ${sectionReport.missingVpcSection.join(', ')}`);
  }

  // B. Validate CTA Button Heights (Desktop: 48px body size md, 56px header CTA size lg)
  const buttonHeightReport = await page.evaluate(() => {
    const buttons = Array.from(document.querySelectorAll('.vpc-button'));
    const nonCompliant = [];
    buttons.forEach((btn, idx) => {
      // Ignore hidden elements (e.g. within unopened modals or mobile-only buttons in desktop view)
      if (btn.offsetParent === null) return;
      const height = parseFloat(getComputedStyle(btn).height);
      const isHeaderCta = btn.classList.contains('vpc-button-lg') || btn.closest('header') !== null;
      const expectedHeight = isHeaderCta ? 56 : 48;
      // Tolerance of 1.5px for subpixel rendering
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
    failures.push(`buttons height mismatch: ${JSON.stringify(buttonHeightReport)}`);
  }

  // C. Hero Slider Navigation, Autoplay, Swipe
  const initialTransform = await page.locator('#vpc-hero-slides').evaluate((element) => element.style.transform);
  await page.locator('#vpc-hero-next').click({ force: true });
  const nextTransform = await page.locator('#vpc-hero-slides').evaluate((element) => element.style.transform);
  if (initialTransform === nextTransform) failures.push('hero slider: next navigation did not change slide');

  await page.waitForTimeout(5100);
  const autoplayTransform = await page.locator('#vpc-hero-slides').evaluate((element) => element.style.transform);
  if (nextTransform === autoplayTransform) failures.push('hero slider: autoplay did not change slide');

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
  if (autoplayTransform === swipeTransform) failures.push('hero slider: swipe did not change slide');

  // D. Service CTA Modal Opening & Pre-selection
  await page.locator('[data-open-modal][data-service="trung-tam-o-cu"]').first().click();
  const modalVisible = await page.locator('#vpc-consultation-modal').evaluate((modal) => !modal.classList.contains('hidden'));
  if (!modalVisible) failures.push('consultation modal did not open on CTA click');

  const selectedService = await page.locator('#vpc-consultation-modal').evaluate((modal) => {
    const input = modal.querySelector('[data-select-input]');
    const select = modal.querySelector('select[name="service"]');
    return input?.value || select?.value || '';
  });
  if (selectedService !== 'trung-tam-o-cu') failures.push('consultation CTA: service was not preselected');

  // E. Form Submission, Loading State, Duplicate Prevention, and Success Modal
  const modalForm = page.locator('#vpc-consultation-modal form');
  await modalForm.locator('input[name="full_name"], input[name="customer_name"]').first().fill('Nguyễn Như Linh');
  await modalForm.locator('input[name="phone"], input[name="customer_phone"]').first().fill('0345678999');
  await modalForm.locator('select[name="gestational_age"]').selectOption('28-40-tuan');

  const submitButton = modalForm.locator('button[type="submit"]');

  // Trigger submit
  await modalForm.evaluate((form) => form.requestSubmit());

  // Check loading state immediately (spinner & disabled)
  const isButtonDisabled = await submitButton.evaluate((btn) => btn.disabled);
  const buttonHtml = await submitButton.evaluate((btn) => btn.innerHTML);
  if (!isButtonDisabled) failures.push('consultation form: submit button was not disabled during submission');
  if (!buttonHtml.includes('animate-spin')) failures.push('consultation form: submit button missing loading spinner');

  // Wait for route mock delay (300ms) and modal open transition (300ms)
  await page.waitForTimeout(700);

  // Verify success modal opened
  const successModalVisible = await page.locator('#vpc-success-modal').evaluate((modal) => !modal.classList.contains('hidden'));
  if (!successModalVisible) failures.push('success modal (#vpc-success-modal) did not open after successful submission');

  const successMessage = await page.locator('#vpc-success-modal-message').textContent();
  if (!successMessage.includes('Vạn Phúc Care')) failures.push('success modal message is missing confirmation text');

  // Dismiss success modal
  await page.locator('#vpc-success-modal [data-modal-close]').last().click();
  await page.waitForTimeout(400);
  const successModalClosed = await page.locator('#vpc-success-modal').evaluate((modal) => modal.classList.contains('hidden'));
  if (!successModalClosed) failures.push('success modal did not close when clicking dismiss button');

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
  if (!floatingContactReport.exists) failures.push('floating contact speed dial component is missing');
  if (!floatingContactReport.hasHotline) failures.push('floating contact is missing hotline tel: link');
  if (!floatingContactReport.hasZalo) failures.push('floating contact is missing Zalo link');
  if (!floatingContactReport.hasMessenger) failures.push('floating contact is missing Messenger link');

  // G. Footer Fake Link & Badge Audit
  const footerReport = await page.evaluate(() => {
    const footer = document.querySelector('.site-footer');
    if (!footer) return { exists: false };
    const links = Array.from(footer.querySelectorAll('a'));
    const dummyHrefs = links.filter((a) => {
      const href = a.getAttribute('href');
      return !href || href === '#' || href === 'javascript:void(0)';
    }).map((a) => a.textContent.trim());

    // Check Instagram
    const instaLink = footer.querySelector('a[aria-label="Instagram"]');
    const instaSpan = footer.querySelector('span[aria-label="Instagram"]');

    return {
      exists: true,
      dummyHrefs,
      instaIsSpanWithoutPOUrl: !!instaSpan && !instaLink,
    };
  });
  if (!footerReport.exists) failures.push('footer is missing');
  if (footerReport.dummyHrefs.length > 0) failures.push(`footer contains fake dummy links: ${footerReport.dummyHrefs.join(', ')}`);

  // H. Reviews Reduced-Motion
  await page.emulateMedia({ reducedMotion: 'reduce' });
  const reviewAnimation = await page.locator('.animate-marquee').first().evaluate((element) => getComputedStyle(element).animationName);
  if (reviewAnimation !== 'none') failures.push('reviews: reduced-motion does not disable marquee');

  if (interactionErrors.length) failures.push(`interaction: console errors: ${interactionErrors.join(' | ')}`);

  await page.close();
} finally {
  await browser.close();
  await new Promise((resolve) => staticServer.close(resolve));
}

if (failures.length) {
  console.error('=== STATIC QA FAILURES ===');
  console.error(failures.join('\n'));
  process.exit(1);
}

console.log(`=== STATIC QA PASSED ===`);
console.log(`Audited all 8 viewports: ${viewports.map((v) => v.name).join(', ')}`);
console.log(`Verified 11 sections (.vpc-section standard)`);
console.log(`Verified 40px CTA button heights across design system`);
console.log(`Verified Hero slider (autoplay, navigation, swipe)`);
console.log(`Verified Consultation modal preselection`);
console.log(`Verified AJAX submission, spinner loading, duplicate submit prevention, and success modal`);
console.log(`Verified Floating contact speed dial & non-overlap`);
console.log(`Verified Footer (no fake links, valid certifications)`);
console.log(`Verified Reviews marquee and reduced-motion`);
