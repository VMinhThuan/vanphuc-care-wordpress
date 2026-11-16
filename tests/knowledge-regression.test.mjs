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

  describe('7. News Hub Routing & Subcategory Layout Alignment', () => {
    test('page-tin-tuc.php exists and renders Hub Landing with links to subcategories', () => {
      const filePath = path.join(rootDir, 'page-tin-tuc.php');
      assert.ok(fs.existsSync(filePath), 'page-tin-tuc.php must exist');
      const code = fs.readFileSync(filePath, 'utf8');
      assert.ok(code.includes('Template Name: Trang chủ Tin tức'), 'Must have template declaration');
      assert.ok(code.includes('/tin-tuc/su-kien-noi-bat/'), 'Must link to su-kien-noi-bat subcategory');
      assert.ok(code.includes('/tin-tuc/tin-moi/'), 'Must link to tin-moi subcategory');
      assert.ok(code.includes('get_header'), 'Must call get_header');
      assert.ok(code.includes('get_footer'), 'Must call get_footer');
    });

    test('category-tin-tuc.php bridges root news category archive to page-tin-tuc.php', () => {
      const filePath = path.join(rootDir, 'category-tin-tuc.php');
      assert.ok(fs.existsSync(filePath), 'category-tin-tuc.php must exist');
      const code = fs.readFileSync(filePath, 'utf8');
      assert.ok(code.includes("require get_template_directory() . '/page-tin-tuc.php'"), 'Must require page-tin-tuc.php');
    });

    test('category.php routes root tin-tuc to page-tin-tuc.php and subcategories to page-tin-tuc-su-kien.php', () => {
      const code = fs.readFileSync(path.join(rootDir, 'category.php'), 'utf8');
      assert.ok(code.includes("'tin-tuc' === $current_slug"), 'Must check for root tin-tuc');
      assert.ok(code.includes("require get_template_directory() . '/page-tin-tuc.php'"), 'Must route tin-tuc to page-tin-tuc.php');
      assert.ok(code.includes("array( 'tin-moi', 'su-kien-noi-bat'"), 'Must recognize tin-moi and su-kien-noi-bat sub-slugs');
      assert.ok(code.includes("require get_template_directory() . '/page-tin-tuc-su-kien.php'"), 'Must route subcategories to page-tin-tuc-su-kien.php');
    });

    test('page-tin-tuc-su-kien.php dynamically resolves current category and formats breadcrumb', () => {
      const code = fs.readFileSync(path.join(rootDir, 'page-tin-tuc-su-kien.php'), 'utf8');
      assert.ok(code.includes('get_queried_object()'), 'Must check get_queried_object for dynamic subcategory');
      assert.ok(code.includes('tin-moi'), 'Must handle tin-moi');
      assert.ok(code.includes('su-kien-noi-bat'), 'Must handle su-kien-noi-bat');
      assert.ok(code.includes('<a href="<?php echo esc_url( home_url( \'/tin-tuc/\' ) ); ?>">Tin tức</a>'), 'Breadcrumb must link to /tin-tuc/ with label Tin tức');
    });

    test('inc/setup.php template_include resolves /tin-tuc/ to page-tin-tuc.php', () => {
      const code = fs.readFileSync(path.join(rootDir, 'inc/setup.php'), 'utf8');
      assert.ok(code.includes("function vanphuccare_news_template_include"), 'Must declare news template include filter');
      assert.ok(code.includes("return get_template_directory() . '/page-tin-tuc.php';"), 'Must return page-tin-tuc.php');
    });

    test('footer.php links Tin mới and Sự kiện nổi bật to clean subcategory URLs', () => {
      const code = fs.readFileSync(path.join(rootDir, 'footer.php'), 'utf8');
      assert.ok(code.includes('/tin-tuc/tin-moi/'), 'Must link Tin mới to /tin-tuc/tin-moi/');
      assert.ok(code.includes('/tin-tuc/su-kien-noi-bat/'), 'Must link Sự kiện nổi bật to /tin-tuc/su-kien-noi-bat/');
    });

    test('inc/menus.php maps footer menu items to clean subcategory URLs', () => {
      const code = fs.readFileSync(path.join(rootDir, 'inc/menus.php'), 'utf8');
      assert.ok(code.includes("home_url( '/tin-tuc/tin-moi/' )"), 'Must set href to /tin-tuc/tin-moi/');
      assert.ok(code.includes("home_url( '/tin-tuc/su-kien-noi-bat/' )"), 'Must set href to /tin-tuc/su-kien-noi-bat/');
    });

    test('inc/setup.php is_news_page detects subcategories and inc/enqueue.php loads news.css', () => {
      const setupCode = fs.readFileSync(path.join(rootDir, 'inc/setup.php'), 'utf8');
      assert.ok(setupCode.includes("0 === strpos( $request_path, 'tin-tuc/' )"), 'Must detect subcategory paths like tin-tuc/tin-moi');
      assert.ok(setupCode.includes("'tin-moi', 'su-kien-noi-bat'"), 'Must match subcategory slugs');
      assert.ok(!setupCode.includes("'me-va-be'"), 'Must NOT contain ghost slug me-va-be in inc/setup.php');

      const enqueueCode = fs.readFileSync(path.join(rootDir, 'inc/enqueue.php'), 'utf8');
      assert.ok(enqueueCode.includes("vanphuccare_enqueue_theme_style( 'vanphuccare-news', 'assets/css/news.css'"), 'Must enqueue news.css');
      assert.ok(enqueueCode.includes("! $is_news_page"), 'Must prevent knowledge.css from overriding news.css');
    });

    test('single.php routes News and editorial posts to template-parts/knowledge/single with section context prioritizing Primary Category', () => {
      const code = fs.readFileSync(path.join(rootDir, 'single.php'), 'utf8');
      assert.ok(code.includes('vpc_is_news_post'), 'Must check for news post in single routing');
      assert.ok(code.includes('is_knowledge_cat'), 'Must check knowledge category before fallback');
      assert.ok(code.includes("'section' => $section"), 'Must pass section context to template part');
      assert.ok(code.includes("get_template_part( 'template-parts/knowledge/single'"), 'Must route editorial posts to shared article template');
    });

    test('inc/helpers.php declares vpc_is_news_post and vpc_is_editorial_post', () => {
      const code = fs.readFileSync(path.join(rootDir, 'inc/helpers.php'), 'utf8');
      assert.ok(code.includes('function vpc_is_news_post('), 'Must define vpc_is_news_post');
      assert.ok(code.includes('function vpc_is_news_category('), 'Must define vpc_is_news_category');
      assert.ok(code.includes('function vpc_is_editorial_post('), 'Must define vpc_is_editorial_post');
    });

    test('inc/enqueue.php and inc/download.php enable assets and download block universally for editorial posts', () => {
      const enqueueCode = fs.readFileSync(path.join(rootDir, 'inc/enqueue.php'), 'utf8');
      assert.ok(enqueueCode.includes('$is_editorial_single'), 'Must check editorial single in enqueue');
      assert.ok(enqueueCode.includes('$is_primary_news'), 'Must prioritize primary news category');
      assert.ok(enqueueCode.includes("! is_singular( 'post' )"), 'Must allow pattern styles on all single posts');

      const downloadCode = fs.readFileSync(path.join(rootDir, 'inc/download.php'), 'utf8');
      assert.ok(downloadCode.includes("! is_singular( 'post' )"), 'Must enable download block on single posts');
    });

    test('assets/css/knowledge.css sets excerpt line clamp to 3 lines for both standard and horizontal cards', () => {
      const code = fs.readFileSync(path.join(rootDir, 'assets/css/knowledge.css'), 'utf8');
      assert.ok(code.includes('.vpc-knowledge-card p'), 'Must have styles for .vpc-knowledge-card p');
      assert.ok(code.includes('.vpc-knowledge-card--horizontal p'), 'Must have styles for .vpc-knowledge-card--horizontal p');
      assert.ok(!code.includes('.vpc-knowledge-card--horizontal p {\n\tfont: 500 16px/24px var(--font-body, "Manrope", sans-serif);\n\t-webkit-line-clamp: 2;'), 'Must not clamp horizontal card excerpt to 2 lines');
    });

    test('assets/css/knowledge.css styles sidebar search pill and button with balanced vertical and right padding matching Figma', () => {
      const code = fs.readFileSync(path.join(rootDir, 'assets/css/knowledge.css'), 'utf8');
      assert.ok(code.includes('background: #ffffff;'), 'Sidebar search container must have white background');
      assert.ok(code.includes('border: 1px solid #a3c9e3;'), 'Sidebar search container must have #a3c9e3 border');
      assert.ok(code.includes('border-radius: 9999px;'), 'Sidebar search must be pill shaped');
      assert.ok(code.includes('padding: 4px 5px 4px 16px;'), 'Sidebar search container must have 4px top/bottom and 5px right padding');
      assert.ok(code.includes('height: 38px;'), 'Sidebar search button must fit inside container with vertical padding');
    });

    test('template-parts/knowledge/single.php prioritizes Primary Category over post categories and provides dynamic context', () => {
      const singleCode = fs.readFileSync(path.join(rootDir, 'template-parts/knowledge/single.php'), 'utf8');
      assert.ok(singleCode.includes('vpc_is_news_category( $category )'), 'Must prioritize primary news category');
      assert.ok(singleCode.includes('vpc_is_knowledge_category( $category )'), 'Must prioritize primary knowledge category');
      assert.ok(singleCode.includes('$section_url'), 'Must have dynamic section URL in breadcrumbs');
      assert.ok(singleCode.includes('$section_label'), 'Must have dynamic section label in breadcrumbs');
      assert.ok(singleCode.includes('$show_disclaimer'), 'Must conditionally render medical disclaimer');
      assert.ok(singleCode.includes('Ban biên tập Vạn Phúc Care'), 'Must provide neutral author title fallback');
      assert.ok(singleCode.includes('$related_cat_id'), 'Must query related posts dynamically based on category');
    });
  });

  describe('8. Recruitment 2-Level Architecture Alignment', () => {
    test('category.php routes root tuyen-dung to page-tuyen-dung.php', () => {
      const code = fs.readFileSync(path.join(rootDir, 'category.php'), 'utf8');
      assert.ok(code.includes("'tuyen-dung' === $current_slug"), 'Must check for root tuyen-dung');
      assert.ok(code.includes("require get_template_directory() . '/page-tuyen-dung.php'"), 'Must require page-tuyen-dung.php');
    });

    test('category.php redirects legacy child categories of tuyen-dung to /tuyen-dung/', () => {
      const code = fs.readFileSync(path.join(rootDir, 'category.php'), 'utf8');
      assert.ok(code.includes("wp_safe_redirect( home_url( '/tuyen-dung/' ), 301 )"), 'Must redirect child categories 301 to hub');
    });

    test('page-tuyen-dung.php queries dynamic recruitment posts and resolves permalinks', () => {
      const code = fs.readFileSync(path.join(rootDir, 'page-tuyen-dung.php'), 'utf8');
      assert.ok(code.includes("'category_name'       => 'tuyen-dung'"), 'Must query category tuyen-dung');
      assert.ok(code.includes("get_permalink( $post_id )"), 'Must use dynamic post permalink for job cards');
      assert.ok(code.includes("empty( $jobs )"), 'Must have fallback mock jobs for zero-post environments');
    });

    test('template-parts/recruitment/detail.php dynamicizes content, removes static FAQ, and supports dynamic tags and related jobs', () => {
      const code = fs.readFileSync(path.join(rootDir, 'template-parts/recruitment/detail.php'), 'utf8');
      assert.ok(!code.includes('[Cần client cung cấp'), 'Must NOT contain client placeholder draft text');
      assert.ok(!code.includes('vpc-recruitment-detail__faq'), 'Must remove hardcoded static FAQ from detail template');
      assert.ok(code.includes('get_the_tags'), 'Must use get_the_tags for dynamic tags');
      assert.ok(code.includes('category_name'), 'Must query related jobs dynamically');
      assert.ok(code.includes('$is_closed'), 'Must handle closed status in recruitment callout');
      assert.ok(code.includes('vpc_hotline_ho_tro'), 'Must resolve hotline from Customizer');
    });

    test('inc/setup.php recognizes category tuyen-dung as recruitment page', () => {
      const code = fs.readFileSync(path.join(rootDir, 'inc/setup.php'), 'utf8');
      assert.ok(code.includes("is_category( 'tuyen-dung' )"), 'Must include is_category( tuyen-dung ) in is_recruitment_page check');
    });

    test('inc/content-types.php formats legacy submit_deadline YYYYMMDD and provides vpc_get_recruitment_meta', () => {
      const code = fs.readFileSync(path.join(rootDir, 'inc/content-types.php'), 'utf8');
      assert.ok(code.includes('vpc_format_recruitment_deadline'), 'Must have deadline formatter');
      assert.ok(code.includes('submit_deadline'), 'Must check legacy submit_deadline key');
      assert.ok(code.includes('vpc_recruitment_deadline'), 'Must check new vpc_recruitment_deadline key');
      assert.ok(code.includes('vpc_get_recruitment_meta'), 'Must export vpc_get_recruitment_meta helper');
    });

    test('inc/content-types.php registers recruitment meta box with full fields and category-isolated visibility', () => {
      const code = fs.readFileSync(path.join(rootDir, 'inc/content-types.php'), 'utf8');
      assert.ok(code.includes('vpc_add_recruitment_meta_box'), 'Must register recruitment meta box');
      assert.ok(code.includes('vpc_render_recruitment_meta_box'), 'Must render recruitment meta box');
      assert.ok(code.includes('vpc_save_recruitment_meta_box'), 'Must save recruitment meta box');
      assert.ok(code.includes('vpc_recruitment_status'), 'Must have status field');
      assert.ok(code.includes('vpc_recruitment_location'), 'Must have location field');
      assert.ok(code.includes('vpc_get_recruitment_category_ids'), 'Must export recruitment category IDs helper');
      assert.ok(code.includes('vpc_is_recruitment_post'), 'Must export vpc_is_recruitment_post helper');
      assert.ok(code.includes('vpc-recruitment-meta-box-init-style'), 'Must include initial hide style for non-recruitment posts');
      assert.ok(code.includes('vpc-reviewer-meta-box-init-style'), 'Must include initial hide style for recruitment posts on reviewer metabox');
      assert.ok(code.includes('wp.data.subscribe'), 'Must include Gutenberg reactive subscriber');
      assert.ok(code.includes('categorychecklist'), 'Must include Classic editor checkbox listener');
    });

    test('inc/content-types.php excludes medical reviewer meta box from recruitment posts', () => {
      const code = fs.readFileSync(path.join(rootDir, 'inc/content-types.php'), 'utf8');
      assert.ok(code.includes('vpc_post_reviewer_meta'), 'Must reference reviewer meta box ID');
      assert.ok(code.includes('vpc-reviewer-meta-box-init-style'), 'Must have reviewer hide style');
      assert.ok(code.includes('vpc_is_recruitment_post( $post_id )'), 'Must guard reviewer meta save against recruitment posts');
    });
  });

  describe('9. Knowledge Search Results Alignment (Figma Spec)', () => {
    test('search.php implements streamlined hero, results title, search keyword highlighting, and empty state', () => {
      const code = fs.readFileSync(path.join(rootDir, 'search.php'), 'utf8');
      assert.ok(code.includes('vpc-knowledge-search-hero'), 'Must use dedicated search hero container');
      assert.ok(code.includes('vpc-knowledge-search-hero__form'), 'Must include hero search form');
      assert.ok(!code.includes('vpc-knowledge-subcat-hero__visual'), 'Must not render mascot/stickers on search hero');
      assert.ok(!code.includes('vpc-knowledge-subcat-pills-wrap'), 'Must not render category pill tabs on search hero');
      assert.ok(code.includes('Kết quả cho "%s"'), 'Must render results heading matching Figma');
      assert.ok(code.includes('vpc_highlight_search_keyword'), 'Must highlight search keyword in title and excerpt');
      assert.ok(code.includes('vpc-knowledge-search-empty'), 'Must render Figma empty state card');
      assert.ok(code.includes('Không tìm thấy bài viết phù hợp'), 'Must render exact Figma empty state heading');
      assert.ok(code.includes('Mẹ thử kiểm tra lại chính tả'), 'Must render maternal guidance text in empty state');
      assert.ok(code.includes('vpc-knowledge-search-empty__tags'), 'Must render suggested topic pills in empty state');
      assert.ok(code.includes('Xem tất cả bài viết'), 'Must render exact Figma CTA button in empty state');
    });

    test('template-parts/knowledge/sidebar.php adapts to search context by hiding search form and featuring suggested keywords', () => {
      const code = fs.readFileSync(path.join(rootDir, 'template-parts/knowledge/sidebar.php'), 'utf8');
      assert.ok(code.includes('$is_search_page'), 'Must detect search page context in sidebar');
      assert.ok(code.includes("! $is_search_page"), 'Must conditionally hide search widget and featured posts on search page');
      assert.ok(code.includes('Từ khóa gợi ý'), 'Must display "Từ khóa gợi ý" on search page');
    });

    test('template-parts/knowledge/contact-cards.php hides promo banner on search page', () => {
      const code = fs.readFileSync(path.join(rootDir, 'template-parts/knowledge/contact-cards.php'), 'utf8');
      assert.ok(code.includes('! is_search()'), 'Must hide promo banner on search results page');
    });

    test('inc/helpers.php declares vpc_highlight_search_keyword helper', () => {
      const code = fs.readFileSync(path.join(rootDir, 'inc/helpers.php'), 'utf8');
      assert.ok(code.includes('function vpc_highlight_search_keyword('), 'Must declare vpc_highlight_search_keyword');
      assert.ok(code.includes('vpc-search-highlight'), 'Must use vpc-search-highlight CSS class');
    });

    test('inc/setup.php scopes search query to published posts', () => {
      const code = fs.readFileSync(path.join(rootDir, 'inc/setup.php'), 'utf8');
      assert.ok(code.includes('$query->is_search()'), 'Must check is_search in pre_get_posts');
      assert.ok(code.includes("'post_type', 'post'"), 'Must scope search to post type');
      assert.ok(code.includes("'post_status', 'publish'"), 'Must scope search to publish status');
    });

    test('assets/css/knowledge.css contains dedicated search hero, empty state, and keyword highlight styles', () => {
      const code = fs.readFileSync(path.join(rootDir, 'assets/css/knowledge.css'), 'utf8');
      assert.ok(code.includes('.vpc-knowledge-search-hero'), 'Must style .vpc-knowledge-search-hero');
      assert.ok(code.includes('mark.vpc-search-highlight'), 'Must style mark.vpc-search-highlight');
      assert.ok(code.includes('.vpc-knowledge-search-empty'), 'Must style .vpc-knowledge-search-empty');
      assert.ok(code.includes('.vpc-knowledge--search .vpc-knowledge-widget--tags'), 'Must style suggested keywords widget');
    });
  });
});
