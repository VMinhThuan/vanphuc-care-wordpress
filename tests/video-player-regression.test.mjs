import { test } from 'node:test';
import assert from 'node:assert/strict';
import fs from 'node:fs';
import path from 'node:path';

const root = path.resolve(import.meta.dirname, '..');

test('CSS Regression: .prenatal-video__frame::before does NOT hide thumbnail behind solid white background', () => {
  const themeCss = fs.readFileSync(path.join(root, 'src/theme.css'), 'utf8');

  // Verify solid white overlay is removed
  assert.ok(
    !themeCss.includes('.prenatal-video__frame::before {\n    content: "";\n    position: absolute;\n    inset: 0;\n    z-index: 1;\n    border-radius: inherit;\n    background: var(--color-surface-background-default);'),
    '.prenatal-video__frame::before must not have solid white background'
  );

  // Verify translucent gradient overlay is present
  assert.ok(
    themeCss.includes('.prenatal-video__frame::before'),
    '.prenatal-video__frame::before selector must exist'
  );
  assert.ok(
    themeCss.includes('rgba(15, 23, 42,'),
    '.prenatal-video__frame::before must use translucent dark gradient overlay'
  );

  // Verify responsive media and playing state classes
  assert.ok(
    themeCss.includes('.prenatal-video__media'),
    '.prenatal-video__media style must exist for inline player iframe/video'
  );
  assert.ok(
    themeCss.includes('.prenatal-video__frame.is-playing'),
    '.prenatal-video__frame.is-playing must hide overlay and play button'
  );
});

test('Backend Helpers: vpc_parse_video_embed and vpc_sanitize_video_url are declared in inc/helpers.php', () => {
  const helpersPhp = fs.readFileSync(path.join(root, 'inc/helpers.php'), 'utf8');

  assert.ok(
    helpersPhp.includes('function vpc_parse_video_embed('),
    'inc/helpers.php must declare vpc_parse_video_embed'
  );
  assert.ok(
    helpersPhp.includes('function vpc_sanitize_video_url('),
    'inc/helpers.php must declare vpc_sanitize_video_url'
  );
  assert.ok(
    helpersPhp.includes('iframe.videodelivery.net'),
    'vpc_parse_video_embed must support Cloudflare Stream videodelivery.net embeds'
  );
});

test('Customizer Registration: vpc_landing_video_settings is registered in inc/setup.php', () => {
  const setupPhp = fs.readFileSync(path.join(root, 'inc/setup.php'), 'utf8');

  assert.ok(
    setupPhp.includes('vpc_landing_video_settings'),
    'Customizer section vpc_landing_video_settings must be registered'
  );
  assert.ok(
    setupPhp.includes('vpc_prenatal_video_enable'),
    'Customizer setting vpc_prenatal_video_enable must be registered'
  );
  assert.ok(
    setupPhp.includes('vpc_prenatal_video_url'),
    'Customizer setting vpc_prenatal_video_url must be registered'
  );
  assert.ok(
    setupPhp.includes('vpc_o_cu_hero_video_url'),
    'Customizer setting vpc_o_cu_hero_video_url must be registered'
  );
  assert.ok(
    setupPhp.includes('vpc_bao_mau_hero_video_url'),
    'Customizer setting vpc_bao_mau_hero_video_url must be registered'
  );
  assert.ok(
    setupPhp.includes('vpc_bao_mau_hero_video_poster'),
    'Customizer setting vpc_bao_mau_hero_video_poster must be registered'
  );
});

test('Template: template-parts/bao-mau/hero.php supports video embed, poster and fallback', () => {
  const baomauPhp = fs.readFileSync(path.join(root, 'template-parts/bao-mau/hero.php'), 'utf8');

  assert.ok(
    baomauPhp.includes("apply_filters( 'vpc_bao_mau_hero_video_url'"),
    'template-parts/bao-mau/hero.php must check vpc_bao_mau_hero_video_url'
  );
  assert.ok(
    baomauPhp.includes('<video class="vpc-bao-mau__hero-image"'),
    'template-parts/bao-mau/hero.php must support direct <video> tag'
  );
  assert.ok(
    baomauPhp.includes('<iframe class="vpc-bao-mau__hero-image"'),
    'template-parts/bao-mau/hero.php must support Cloudflare Stream <iframe> tag'
  );
});

test('Template: template-parts/prenatal/video.php supports dynamic video and fallback', () => {
  const templatePhp = fs.readFileSync(path.join(root, 'template-parts/prenatal/video.php'), 'utf8');

  assert.ok(
    templatePhp.includes("apply_filters( 'vpc_prenatal_video_url', get_theme_mod( 'vpc_prenatal_video_url'"),
    'template-parts/prenatal/video.php must check vpc_prenatal_video_url'
  );
  assert.ok(
    templatePhp.includes('js-prenatal-video-player'),
    'template-parts/prenatal/video.php must render button.js-prenatal-video-player when video is present'
  );
  assert.ok(
    templatePhp.includes('href="#prenatal-registration"'),
    'template-parts/prenatal/video.php must keep registration fallback when no video is configured'
  );
});

test('Client Script: page-lop-hoc-tien-san.php implements interactive inline video playback', () => {
  const pagePhp = fs.readFileSync(path.join(root, 'page-lop-hoc-tien-san.php'), 'utf8');

  assert.ok(
    pagePhp.includes('.js-prenatal-video-player'),
    'page-lop-hoc-tien-san.php must query .js-prenatal-video-player'
  );
  assert.ok(
    pagePhp.includes('prenatal-video__media'),
    'page-lop-hoc-tien-san.php must create player element with prenatal-video__media class'
  );
  assert.ok(
    pagePhp.includes('is-playing'),
    'page-lop-hoc-tien-san.php must add is-playing class to hide thumbnail and play button'
  );
});

test('Domain Portability: vpc_parse_video_embed normalizes relative URLs and staging domains to current site', () => {
  const helpersPhp = fs.readFileSync(path.join(root, 'inc/helpers.php'), 'utf8');

  assert.ok(
    helpersPhp.includes("0 === strpos( $raw_url, '/' )"),
    'vpc_parse_video_embed must support root-relative upload URLs'
  );
  assert.ok(
    helpersPhp.includes('staging\\.vanphuccare\\.vn'),
    'vpc_parse_video_embed must automatically adapt staging.vanphuccare.vn links'
  );
  assert.ok(
    helpersPhp.includes('home_url'),
    'vpc_parse_video_embed must use home_url() for domain-agnostic links'
  );
});

