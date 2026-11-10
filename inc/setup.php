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
 * 301 Redirect for external courses route:
 * Redirects any direct requests for /khoa-hoc-truc-tuyen/ or /dich-vu/khoa-hoc-truc-tuyen/
 * to the dedicated e-learning platform https://edu.vanphuccare.vn.
 *
 * @return void
 */
function vanphuccare_redirect_online_courses() {
	if ( is_admin() || wp_doing_ajax() ) {
		return;
	}

	$request_uri = isset( $_SERVER['REQUEST_URI'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REQUEST_URI'] ) ) : '';
	$path        = trim( (string) wp_parse_url( $request_uri, PHP_URL_PATH ), '/' );

	if ( 'dich-vu/khoa-hoc-truc-tuyen' === $path || 'khoa-hoc-truc-tuyen' === $path || 'dich-vu/khoa-hoc' === $path ) {
		wp_redirect( 'https://edu.vanphuccare.vn', 301 );
		exit;
	}
}
add_action( 'template_redirect', 'vanphuccare_redirect_online_courses' );


