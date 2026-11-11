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

	$wp_customize->add_setting( 'vpc_consultation_api_endpoint', array(
		'sanitize_callback' => 'vpc_sanitize_consultation_api_endpoint',
	) );
	$wp_customize->add_control( 'vpc_consultation_api_endpoint', array(
		'label'       => 'HTTPS REST API nhận lead tư vấn',
		'section'     => 'vpc_contact_settings',
		'type'        => 'url',
		'description' => 'Bắt buộc dùng HTTPS. Theme chỉ chuyển lead đến endpoint này; không lưu lead vào WordPress hoặc thay thế bằng email.',
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
	$version = defined( 'VANPHUCCARE_VERSION' ) ? VANPHUCCARE_VERSION : '1.0';
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
	if ( ! is_admin() && $query->is_main_query() && ! empty( $query->get( 'vpc_is_all' ) ) ) {
		$query->set( 'name', '' );
		$query->set( 'category_name', 'kien-thuc' );
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



