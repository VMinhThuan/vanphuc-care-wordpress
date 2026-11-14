/**
 * Knowledge Editorial Automated Regression Test Suite
 * Zero-dependency Node.js test runner using node:test and node:assert.
 * Can run locally with: node --test tests/knowledge-regression.test.mjs
 */

import { test, describe } from 'node:test';
import assert from 'node:assert/strict';
import fs from 'node:fs';
import path from 'node:path';
import vm from 'node:vm';
import { fileURLToPath } from 'node:url';

const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);
const rootDir = path.resolve(__dirname, '..');

describe('Knowledge Editorial Regression Tests', () => {

  describe('1. Block Patterns Verification (17 Patterns)', () => {
    const patternsDir = path.join(rootDir, 'patterns');

    test('Directory patterns/ exists and contains exactly 17 pattern files', () => {
      assert.ok(fs.existsSync(patternsDir), 'patterns directory must exist');
      const files = fs.readdirSync(patternsDir).filter(f => f.endsWith('.php'));
      assert.strictEqual(files.length, 17, `Expected exactly 17 pattern files, found ${files.length}`);
    });

    const expectedPatterns = [
      'bang-du-lieu.php',
      'bang-so-sanh.php',
      'cac-buoc-thuc-hien.php',
      'canh-bao.php',
      'cau-hoi-thuong-gap.php',
      'danh-sach-chuan-bi.php',
      'doc-them.php',
      'luu-y.php',
      'meo-hay.php',
      'tai-lieu-tham-khao.php',
      'tep-tai-xuong.php',
      'tom-tat-nhanh.php',
      'trich-dan-chuyen-gia.php',
      'tu-van-trong-bai.php',
      'tu-van-truc-tiep.php',
      'uu-diem-nhuoc-diem.php',
      'video-minh-hoa.php',
    ];

    expectedPatterns.forEach(patternFile => {
      test(`Pattern ${patternFile} has valid WordPress header metadata`, () => {
        const fullPath = path.join(patternsDir, patternFile);
        assert.ok(fs.existsSync(fullPath), `Pattern file ${patternFile} must exist`);
        const content = fs.readFileSync(fullPath, 'utf8');

        // Verify WordPress pattern headers
        assert.match(content, /Title:\s*[\S]+/i, `${patternFile} must have a Title header`);
        assert.match(content, /Slug:\s*vanphuccare\/[\S]+/i, `${patternFile} must have a valid Slug starting with vanphuccare/`);
        assert.match(content, /Categories:\s*[\S]+/i, `${patternFile} must define Categories`);
      });
    });
  });

  describe('2. Custom Dynamic Blocks PHP Modules', () => {
    const customBlocks = [
      { name: 'checklist', php: 'inc/checklist.php', editor: 'assets/js/checklist-editor.js', blockName: 'vanphuccare/checklist' },
      { name: 'references', php: 'inc/references.php', editor: 'assets/js/references-editor.js', blockName: 'vanphuccare/references' },
      { name: 'download', php: 'inc/download.php', editor: 'assets/js/download-editor.js', blockName: 'vanphuccare/download' },
      { name: 'read-more', php: 'inc/read-more.php', editor: 'assets/js/read-more-editor.js', blockName: 'vanphuccare/read-more' },
    ];

    customBlocks.forEach(block => {
      test(`Block ${block.name} PHP registration and render callback exists`, () => {
        const phpPath = path.join(rootDir, block.php);
        assert.ok(fs.existsSync(phpPath), `${block.php} must exist`);
        const content = fs.readFileSync(phpPath, 'utf8');

        assert.ok(content.includes(block.blockName), `${block.php} must register block '${block.blockName}'`);
        assert.match(content, /'render_callback'\s*=>/i, `${block.php} must define a render_callback`);
      });

      test(`Block ${block.name} editor JS exists and has valid JavaScript syntax`, () => {
        const editorPath = path.join(rootDir, block.editor);
        assert.ok(fs.existsSync(editorPath), `${block.editor} must exist`);
        const code = fs.readFileSync(editorPath, 'utf8');

        // Compile script to check for syntax errors
        assert.doesNotThrow(() => {
          new vm.Script(code, { filename: block.editor });
        }, `Syntax error found in ${block.editor}`);

        // Verify save: () => null convention for dynamic blocks
        assert.match(code, /save:\s*(\(\s*\)\s*=>\s*null|function\s*\(\s*\)\s*\{\s*return null;\s*\})/i,
          `${block.editor} must have save: () => null for dynamic rendering`);
      });
    });
  });

  describe('3. Knowledge Single Article JavaScript (assets/js/knowledge-single.js)', () => {
    const jsPath = path.join(rootDir, 'assets/js/knowledge-single.js');

    test('knowledge-single.js has valid JavaScript syntax', () => {
      assert.ok(fs.existsSync(jsPath), 'assets/js/knowledge-single.js must exist');
      const code = fs.readFileSync(jsPath, 'utf8');
      assert.doesNotThrow(() => {
        new vm.Script(code, { filename: 'knowledge-single.js' });
      }, 'knowledge-single.js must have zero syntax errors');
    });

    test('Copy button listener queries document scope (No undefined reader bug)', () => {
      const code = fs.readFileSync(jsPath, 'utf8');
      
      // Ensure the bug 'reader.querySelectorAll' in the second IIFE is fixed
      assert.ok(
        !code.includes("reader.querySelectorAll('.vpc-reader__share-btn--copy"),
        'Bug P1: reader.querySelectorAll must not be used outside IIFE scope'
      );

      // Ensure document.querySelectorAll is used
      assert.ok(
        code.includes("document.querySelectorAll('.vpc-reader__share-btn--copy[data-copy-link]')"),
        'Must query copy buttons with document.querySelectorAll'
      );

      // Ensure fallback clipboard mechanism exists
      assert.ok(code.includes('execCommand'), 'Must have document.execCommand fallback for non-secure contexts');
      assert.ok(code.includes('is-copied'), 'Must toggle is-copied class for tooltip state');
    });

    test('Yoast FAQ accordion support exists', () => {
      const code = fs.readFileSync(jsPath, 'utf8');
      assert.ok(code.includes('schema-faq-section'), 'Must handle Yoast .schema-faq-section');
      assert.ok(code.includes('vpc-yoast-faq'), 'Must add vpc-yoast-faq class');
    });
  });

  describe('4. Reviewer & Author Meta Box in inc/content-types.php', () => {
    const contentTypesPath = path.join(rootDir, 'inc/content-types.php');

    test('Reviewer meta box is registered in sidebar with security nonce', () => {
      assert.ok(fs.existsSync(contentTypesPath), 'inc/content-types.php must exist');
      const content = fs.readFileSync(contentTypesPath, 'utf8');

      assert.ok(content.includes('vpc_add_reviewer_meta_box'), 'vpc_add_reviewer_meta_box must be defined');
      assert.ok(content.includes('vpc_save_reviewer_meta_box'), 'vpc_save_reviewer_meta_box must be defined');
      assert.ok(content.includes('vpc_register_reviewer_post_meta'), 'vpc_register_reviewer_post_meta must be defined');
      assert.ok(content.includes('vpc_reviewer_name'), 'vpc_reviewer_name meta field must be handled');
      assert.ok(content.includes('vpc_reviewer_title'), 'vpc_reviewer_title meta field must be handled');
      assert.ok(content.includes('vpc_reviewer_avatar'), 'vpc_reviewer_avatar meta field must be handled');
      assert.ok(content.includes('vpc_reviewer_url'), 'vpc_reviewer_url meta field must be handled');
      assert.ok(content.includes('wp_verify_nonce'), 'Must verify nonce when saving reviewer meta');
    });
  });

  describe('5. Template Contract in template-parts/knowledge/single.php', () => {
    const singlePath = path.join(rootDir, 'template-parts/knowledge/single.php');

    test('Template includes Author Card, Reviewer Card, Share Bar, and Disclaimer', () => {
      assert.ok(fs.existsSync(singlePath), 'single.php template part must exist');
      const content = fs.readFileSync(singlePath, 'utf8');

      // Share bar & copy button
      assert.ok(content.includes('vpc-reader__share-btn--copy'), 'Must contain copy button class');
      assert.ok(content.includes('data-copy-link'), 'Must contain data-copy-link attribute');
      assert.ok(content.includes('vpc-reader__share-tooltip'), 'Must contain share tooltip');

      // Author Card
      assert.ok(content.includes('vpc-reader__author-card'), 'Must contain author card markup');
      assert.ok(content.includes('get_author_posts_url'), 'Must link to author posts archive');

      // Reviewer Card
      assert.ok(content.includes('vpc-reader__reviewer-card'), 'Must contain reviewer card markup');
      assert.ok(content.includes('vpc_reviewer_name'), 'Must query reviewer name meta');

      // Medical Disclaimer
      assert.ok(content.includes('vpc-reader__disclaimer'), 'Must contain medical disclaimer section');
    });
  });

  describe('6. Defensive Rendering & Edge Cases in Dynamic Block Functions', () => {
    test('Checklist PHP module safely handles missing, null, or empty item attributes', () => {
      const code = fs.readFileSync(path.join(rootDir, 'inc/checklist.php'), 'utf8');
      assert.ok(code.includes("?? array()"), 'Must safely coalesce null or missing items');
      assert.ok(code.includes("'' === $name"), 'Must skip empty item names');
      assert.ok(code.includes("esc_html"), 'Must escape output strings for XSS protection');
    });

    test('References PHP module safely validates URLs and handles missing sources', () => {
      const code = fs.readFileSync(path.join(rootDir, 'inc/references.php'), 'utf8');
      assert.ok(code.includes("is_array"), 'Must validate sources is array');
      assert.ok(code.includes("preg_match( '~^https?://~i'"), 'Must restrict URLs to http/https protocols');
      assert.ok(code.includes("esc_url"), 'Must sanitize external URLs');
    });

    test('Download PHP module safely handles deleted or missing attachment IDs', () => {
      const code = fs.readFileSync(path.join(rootDir, 'inc/download.php'), 'utf8');
      assert.ok(code.includes("get_post"), 'Must retrieve attachment post');
      assert.ok(code.includes("if ( ! $data )") && code.includes("return '';"), 'Must return empty string when attachment data is null');
    });

    test('Read-more PHP module verifies post exists and is published', () => {
      const code = fs.readFileSync(path.join(rootDir, 'inc/read-more.php'), 'utf8');
      assert.ok(code.includes("publish' !== $target->post_status"), 'Must ensure post is published');
      assert.ok(code.includes("'' !== $target->post_password"), 'Must skip password-protected posts');
    });
  });
});
