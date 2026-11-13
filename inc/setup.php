<?php
/**
 * Theme setup.
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Configures theme defaults and WordPress feature support.
 *
 * @return void
 */
function vanphuccare_setup() {
	load_theme_textdomain( 'vanphuccare', get_template_directory() . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-logo' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'align-wide' );

	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);
}
add_action( 'after_setup_theme', 'vanphuccare_setup' );

/**
 * Removes an accidental duplicated "Cữ" token from document/SEO titles
 * without changing the stored post title.
 *
 * @param string $title Document title.
 * @return string
 */
function vanphuccare_normalize_title_text( $title ) {
	return preg_replace( '/(Ở\s+Cữ)\s+Cữ/ui', '$1', (string) $title );
}

/**
 * Applies the title normalization to core and common SEO plugin title hooks.
 *
 * @param array<string, string> $parts Document title parts.
 * @return array<string, string>
 */
function vanphuccare_normalize_document_title_parts( $parts ) {
	foreach ( $parts as $key => $part ) {
		$parts[ $key ] = vanphuccare_normalize_title_text( $part );
	}

	return $parts;
}
add_filter( 'document_title_parts', 'vanphuccare_normalize_document_title_parts' );
add_filter( 'wpseo_title', 'vanphuccare_normalize_title_text' );
add_filter( 'rank_math/frontend/title', 'vanphuccare_normalize_title_text' );

/**
 * Adds the verified external/contact destinations in one editable location.
 *
 * @param WP_Customize_Manager $wp_customize Customizer instance.
 * @return void
 */
function vanphuccare_customize_contact_settings( $wp_customize ) {
	$wp_customize->add_section( 'vpc_contact_settings', array(
		'title'    => 'Vạn Phúc Care – Liên hệ & lead',
		'priority' => 160,
	) );

	$wp_customize->add_setting( 'vpc_instagram_url', array(
		'default'           => 'https://www.instagram.com/vanphuccare?utm_source=ig_web_button_share_sheet&exln=ZDNlZDc0MzIxNw==',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'vpc_instagram_url', array(
		'label'       => 'Instagram URL đã xác nhận',
		'section'     => 'vpc_contact_settings',
		'type'        => 'url',
		'description' => 'URL Instagram của Vạn Phúc Care.',
	) );

	// Facebook URL
	$wp_customize->add_setting( 'vpc_facebook_url', array(
		'default'           => 'https://facebook.com/vanphuccare',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'vpc_facebook_url', array(
		'label'       => 'Facebook URL',
		'section'     => 'vpc_contact_settings',
		'type'        => 'url',
		'description' => 'URL fanpage Facebook của Vạn Phúc Care.',
	) );

	// TikTok URL
	$wp_customize->add_setting( 'vpc_tiktok_url', array(
		'default'           => 'https://tiktok.com/@vanphuccare',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'vpc_tiktok_url', array(
		'label'       => 'TikTok URL',
		'section'     => 'vpc_contact_settings',
		'type'        => 'url',
		'description' => 'URL kênh TikTok của Vạn Phúc Care.',
	) );

	// Hotline tư vấn
	$wp_customize->add_setting( 'vpc_hotline_tu_van', array(
		'default'           => '(024) 6329 6698',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'vpc_hotline_tu_van', array(
		'label'       => 'Hotline tư vấn',
		'section'     => 'vpc_contact_settings',
		'type'        => 'text',
	) );

	// Hotline hỗ trợ
	$wp_customize->add_setting( 'vpc_hotline_ho_tro', array(
		'default'           => '037 624 6673',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'vpc_hotline_ho_tro', array(
		'label'       => 'Hotline hỗ trợ',
		'section'     => 'vpc_contact_settings',
		'type'        => 'text',
	) );

	// Email CSKH
	$wp_customize->add_setting( 'vpc_email_cskh', array(
		'default'           => 'cskh@vanphuccare.vn',
		'sanitize_callback' => 'sanitize_email',
	) );
	$wp_customize->add_control( 'vpc_email_cskh', array(
		'label'       => 'Email CSKH',
		'section'     => 'vpc_contact_settings',
		'type'        => 'email',
	) );

	// Email liên hệ
	$wp_customize->add_setting( 'vpc_email_info', array(
		'default'           => 'info@vanphuccare.vn',
		'sanitize_callback' => 'sanitize_email',
	) );
	$wp_customize->add_control( 'vpc_email_info', array(
		'label'       => 'Email liên hệ',
		'section'     => 'vpc_contact_settings',
		'type'        => 'email',
	) );

	// Địa chỉ công ty
	$wp_customize->add_setting( 'vpc_company_address', array(
		'default'           => '35B/399 Âu Cơ, phường Tây Hồ, TP. Hà Nội',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'vpc_company_address', array(
		'label'       => 'Địa chỉ công ty (Trung tâm ở cữ)',
		'section'     => 'vpc_contact_settings',
		'type'        => 'text',
	) );

	$wp_customize->add_setting( 'vpc_consultation_api_endpoint', array(
		'sanitize_callback' => 'vpc_sanitize_consultation_api_endpoint',
	) );
	$wp_customize->add_control( 'vpc_consultation_api_endpoint', array(
		'label'       => 'HTTPS REST API nhận lead tư vấn',
		'section'     => 'vpc_contact_settings',
		'type'        => 'url',
		'description' => 'Bắt buộc dùng HTTPS. Theme chỉ chuyển lead đến endpoint này; không lưu lead vào WordPress hoặc thay thế bằng email.',
	) );

	$wp_customize->add_setting( 'vpc_turnstile_site_key', array(
		'default'           => '0x4AAAAAAFfV0g-yO07UT7yb',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'vpc_turnstile_site_key', array(
		'label'       => 'Cloudflare Turnstile Site Key',
		'section'     => 'vpc_contact_settings',
		'type'        => 'text',
		'description' => 'Khóa công khai Cloudflare Turnstile để xác minh chống spam bot.',
	) );
}
add_action( 'customize_register', 'vanphuccare_customize_contact_settings' );

/**
 * 301 Redirects for external and deprecated legacy routes:
 * 1. Online courses: redirects direct requests for /khoa-hoc-truc-tuyen/ to https://edu.vanphuccare.vn.
 * 2. Deprecated legacy services (from old database) redirected safely to relevant Figma active services.
 *
 * @return void
 */
function vanphuccare_redirect_legacy_and_external_routes() {
	if ( is_admin() || wp_doing_ajax() ) {
		return;
	}

	$request_uri = isset( $_SERVER['REQUEST_URI'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REQUEST_URI'] ) ) : '';
	$path        = trim( (string) wp_parse_url( $request_uri, PHP_URL_PATH ), '/' );

	// 1. External Courses to E-learning platform.
	if ( 'dich-vu/khoa-hoc-truc-tuyen' === $path || 'khoa-hoc-truc-tuyen' === $path || 'dich-vu/khoa-hoc' === $path ) {
		wp_redirect( 'https://edu.vanphuccare.vn', 301 );
		exit;
	}

	// 2. Deprecated "Chăm sóc mẹ sau sinh" -> redirect to Postnatal Care Center (Ở cữ).
	if ( 'dich-vu/cham-soc-me-sau-sinh' === $path || 'cham-soc-me-sau-sinh' === $path ) {
		wp_redirect( home_url( '/dich-vu/trung-tam-o-cu/' ), 301 );
		exit;
	}

	// 3. Deprecated "Hướng dẫn nuôi con EASY tại nhà" -> redirect to canonical online EASY consultation.
	if ( 'dich-vu/huong-dan-nuoi-con-easy-truc-tiep-tai-nha' === $path || 'huong-dan-nuoi-con-easy-truc-tiep-tai-nha' === $path ) {
		wp_redirect( home_url( '/dich-vu/dich-vu-tu-van-nuoi-con-easy-truc-tuyen/' ), 301 );
		exit;
	}

	// 4. Legacy query string /kien-thuc/?view=all -> 301 redirect to clean URL /kien-thuc/tat-ca/.
	if ( 'kien-thuc' === $path && isset( $_GET['view'] ) && 'all' === sanitize_key( $_GET['view'] ) ) {
		wp_safe_redirect( home_url( '/kien-thuc/tat-ca/' ), 301 );
		exit;
	}

	// 5. Redirect legacy production pagination /kien-thuc/page/{n}/ -> /kien-thuc/tat-ca/page/{n}/
	if ( preg_match( '#^kien-thuc/page/([0-9]+)$#', $path, $matches ) ) {
		wp_safe_redirect( home_url( '/kien-thuc/tat-ca/page/' . $matches[1] . '/' ), 301 );
		exit;
	}
}
add_action( 'template_redirect', 'vanphuccare_redirect_legacy_and_external_routes' );

/**
 * Custom rewrite rules for Knowledge base "All articles" clean URL:
 * - /kien-thuc/tat-ca/ -> full archive listing of all posts (Figma Image 2 layout).
 * - /kien-thuc/tat-ca/page/{n}/ -> paginated archive listing.
 *
 * @return void
 */
function vanphuccare_knowledge_rewrite_rules() {
	add_rewrite_rule(
		'^kien-thuc/tat-ca/page/([0-9]+)/?$',
		'index.php?category_name=kien-thuc&paged=$matches[1]&vpc_is_all=1',
		'top'
	);
	add_rewrite_rule(
		'^kien-thuc/tat-ca/?$',
		'index.php?category_name=kien-thuc&vpc_is_all=1',
		'top'
	);
}
add_action( 'init', 'vanphuccare_knowledge_rewrite_rules' );

/**
 * Adds the clean route for the news and events hub.
 *
 * @return void
 */
function vanphuccare_news_rewrite_rules() {
	add_rewrite_rule(
		'^tin-tuc-su-kien/?$',
		'index.php?vpc_is_news=1',
		'top'
	);
}
add_action( 'init', 'vanphuccare_news_rewrite_rules' );

/**
 * Registers the news hub query variable.
 *
 * @param array<string> $vars Public query variables.
 * @return array<string>
 */
function vanphuccare_news_query_vars( $vars ) {
	$vars[] = 'vpc_is_news';
	return $vars;
}
add_filter( 'query_vars', 'vanphuccare_news_query_vars' );

/**
 * Identifies the news hub in both the normal Page and clean-route variants.
 *
 * @return bool
 */
function vanphuccare_is_news_page() {
	$request_path = isset( $_SERVER['REQUEST_URI'] )
		? trim( (string) wp_parse_url( sanitize_text_field( wp_unslash( $_SERVER['REQUEST_URI'] ) ), PHP_URL_PATH ), '/' )
		: '';

	return is_page( 'tin-tuc-su-kien' )
		|| is_page_template( 'page-tin-tuc-su-kien.php' )
		|| ! empty( get_query_var( 'vpc_is_news' ) )
		|| 'tin-tuc-su-kien' === $request_path;
}

/**
 * Adds a page-scoped body class for the Figma news hub refinements.
 *
 * @param array<string> $classes Existing body classes.
 * @return array<string>
 */
function vanphuccare_news_body_class( $classes ) {
	if ( vanphuccare_is_news_page() ) {
		$classes[] = 'vpc-news-page-shell';
	}

	return array_unique( $classes );
}
add_filter( 'body_class', 'vanphuccare_news_body_class' );

/**
 * Uses the news hub template for the clean route even before rewrite rules are flushed.
 *
 * @param string $template Current template path.
 * @return string
 */
function vanphuccare_news_template_include( $template ) {
	if ( ! vanphuccare_is_news_page() ) {
		return $template;
	}

	global $wp_query;
	if ( ! empty( get_query_var( 'vpc_is_news' ) ) || ( isset( $_SERVER['REQUEST_URI'] ) && 'tin-tuc-su-kien' === trim( (string) wp_parse_url( sanitize_text_field( wp_unslash( $_SERVER['REQUEST_URI'] ) ), PHP_URL_PATH ), '/' ) ) ) {
		$wp_query->is_404 = false;
		status_header( 200 );
	}

	return get_template_directory() . '/page-tin-tuc-su-kien.php';
}
add_filter( 'template_include', 'vanphuccare_news_template_include' );

/**
 * Registers custom query var for the clean all-articles knowledge route.
 *
 * @param array<string> $vars Public query variables.
 * @return array<string>
 */
function vanphuccare_knowledge_query_vars( $vars ) {
	$vars[] = 'vpc_is_all';
	return $vars;
}
add_filter( 'query_vars', 'vanphuccare_knowledge_query_vars' );

/**
 * Automatically flushes rewrite rules safely once per release
 * when a new Git commit SHA is deployed via CI/CD.
 *
 * @return void
 */
function vanphuccare_maybe_flush_rewrite_rules() {
	$version = defined( 'VANPHUCCARE_VERSION' ) ? (string) VANPHUCCARE_VERSION : '';

	// Fallback to local Git commit hash if version.php is not present (e.g. local dev).
	if ( empty( $version ) ) {
		$git_head = get_template_directory() . '/.git/HEAD';
		if ( file_exists( $git_head ) && is_readable( $git_head ) ) {
			$head_content = trim( (string) @file_get_contents( $git_head ) );
			if ( strpos( $head_content, 'ref: ' ) === 0 ) {
				$ref_file = get_template_directory() . '/.git/' . substr( $head_content, 5 );
				if ( file_exists( $ref_file ) && is_readable( $ref_file ) ) {
					$version = substr( trim( (string) @file_get_contents( $ref_file ) ), 0, 7 );
				}
			} elseif ( ! empty( $head_content ) ) {
				$version = substr( $head_content, 0, 7 );
			}
		}
	}

	if ( empty( $version ) ) {
		$version = '1.0';
	}

	if ( get_option( 'vpc_rewrite_version' ) !== $version ) {
		flush_rewrite_rules( false );
		update_option( 'vpc_rewrite_version', $version );
	}
}
add_action( 'init', 'vanphuccare_maybe_flush_rewrite_rules', 99 );

/**
 * Intercepts query vars on request filter to prevent WordPress from misinterpreting
 * /kien-thuc/tat-ca/ as a single post with post_name='tat-ca' (which causes 404).
 *
 * @param array<string, mixed> $query_vars Query variables.
 * @return array<string, mixed>
 */
function vanphuccare_knowledge_request_filter( $query_vars ) {
	$request = isset( $_SERVER['REQUEST_URI'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REQUEST_URI'] ) ) : '';
	$path    = trim( (string) wp_parse_url( $request, PHP_URL_PATH ), '/' );

	if ( preg_match( '#^kien-thuc/tat-ca(?:/page/([0-9]+))?/?$#', $path, $matches ) ) {
		$query_vars['category_name'] = 'kien-thuc';
		$query_vars['vpc_is_all']    = 1;
		unset( $query_vars['name'] );
		unset( $query_vars['pagename'] );
		unset( $query_vars['error'] );
		if ( ! empty( $matches[1] ) ) {
			$query_vars['paged'] = (int) $matches[1];
		}
	}
	return $query_vars;
}
add_filter( 'request', 'vanphuccare_knowledge_request_filter' );

/**
 * Fallback request parser for /kien-thuc/tat-ca/ to function immediately
 * upon deploy without requiring manual rewrite flush in WP Admin.
 *
 * @param WP $wp Current WordPress environment instance.
 * @return void
 */
function vanphuccare_knowledge_parse_request( $wp ) {
	if ( empty( $wp->request ) ) {
		return;
	}

	if ( preg_match( '#^kien-thuc/tat-ca(?:/page/([0-9]+))?/?$#', (string) $wp->request, $matches ) ) {
		$wp->query_vars['category_name'] = 'kien-thuc';
		$wp->query_vars['vpc_is_all']    = 1;
		unset( $wp->query_vars['name'] );
		unset( $wp->query_vars['pagename'] );
		unset( $wp->query_vars['error'] );
		if ( ! empty( $matches[1] ) ) {
			$wp->query_vars['paged'] = (int) $matches[1];
		}
	}
}
add_action( 'parse_request', 'vanphuccare_knowledge_parse_request' );

/**
 * Ensures WP_Query recognizes /kien-thuc/tat-ca/ as a category archive
 * and resets any single post flags.
 *
 * @param WP_Query $query Current WP_Query instance.
 * @return void
 */
function vanphuccare_knowledge_pre_get_posts( $query ) {
	if ( is_admin() || ! $query->is_main_query() ) {
		return;
	}

	$knowledge_category_slugs = function_exists( 'vpc_get_knowledge_category_slugs' )
		? vpc_get_knowledge_category_slugs()
		: array( 'kien-thuc', 'mang-thai', 'phuong-phap-easy', 'an-dam', 'hoi-chung-bieng-an', 'cam-nang-cho-me' );

	$raw_cat_slug = (string) $query->get( 'category_name' );
	$leaf_slug    = $raw_cat_slug;
	if ( strpos( $leaf_slug, '/' ) !== false ) {
		$slug_parts = explode( '/', trim( $leaf_slug, '/' ) );
		$leaf_slug  = end( $slug_parts );
	}

	$is_knowledge_category = in_array( $raw_cat_slug, $knowledge_category_slugs, true )
		|| in_array( $leaf_slug, $knowledge_category_slugs, true );

	if ( $query->is_category() && $is_knowledge_category ) {
		$query->set( 'posts_per_page', 8 );
	}

	if ( ! empty( $query->get( 'vpc_is_all' ) ) ) {
		$query->set( 'name', '' );
		$query->set( 'category_name', 'kien-thuc' );
		$query->set( 'posts_per_page', 8 );
		$query->is_single   = false;
		$query->is_page     = false;
		$query->is_singular = false;
		$query->is_category = true;
		$query->is_archive  = true;
	}
}
add_action( 'pre_get_posts', 'vanphuccare_knowledge_pre_get_posts' );

/**
 * Normalizes SEO canonical URL for /kien-thuc/tat-ca/ across Yoast & Rank Math.
 *
 * @param string $canonical Canonical URL.
 * @return string
 */
function vanphuccare_knowledge_canonical_url( $canonical ) {
	if ( ! empty( get_query_var( 'vpc_is_all' ) ) ) {
		$paged = (int) get_query_var( 'paged' );
		if ( $paged > 1 ) {
			return home_url( '/kien-thuc/tat-ca/page/' . $paged . '/' );
		}
		return home_url( '/kien-thuc/tat-ca/' );
	}
	return $canonical;
}
add_filter( 'wpseo_canonical', 'vanphuccare_knowledge_canonical_url' );
add_filter( 'rank_math/frontend/canonical', 'vanphuccare_knowledge_canonical_url' );



