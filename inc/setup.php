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
 * Adds the verified external/contact destinations in one editable location.
 * Empty values deliberately render as non-links instead of placeholder URLs.
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
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'vpc_instagram_url', array(
		'label'       => 'Instagram URL đã xác nhận',
		'section'     => 'vpc_contact_settings',
		'type'        => 'url',
		'description' => 'Để trống nếu PO chưa xác nhận. Icon sẽ không điều hướng.',
	) );

	$wp_customize->add_setting( 'vpc_consultation_recipient', array(
		'sanitize_callback' => 'sanitize_email',
	) );
	$wp_customize->add_control( 'vpc_consultation_recipient', array(
		'label'       => 'Email nhận lead tư vấn đã xác nhận',
		'section'     => 'vpc_contact_settings',
		'type'        => 'email',
		'description' => 'Để trống để dùng email quản trị WordPress hiện tại.',
	) );
}
add_action( 'customize_register', 'vanphuccare_customize_contact_settings' );

/**
 * Ensures standard theme pages exist in WordPress (e.g. Lớp học tiền sản).
 * Runs once upon theme update/init.
 *
 * @return void
 */
function vanphuccare_ensure_default_pages() {
	if ( get_option( 'vpc_pages_initialized_v2' ) ) {
		return;
	}

	$prenatal_page = get_page_by_path( 'lop-hoc-tien-san' );
	if ( ! $prenatal_page ) {
		$page_id = wp_insert_post(
			array(
				'post_title'     => 'Lớp học tiền sản',
				'post_name'      => 'lop-hoc-tien-san',
				'post_status'    => 'publish',
				'post_type'      => 'page',
				'page_template'  => 'page-lop-hoc-tien-san.php',
				'comment_status' => 'closed',
				'ping_status'    => 'closed',
			)
		);
		if ( ! is_wp_error( $page_id ) && $page_id > 0 ) {
			update_post_meta( $page_id, '_wp_page_template', 'page-lop-hoc-tien-san.php' );
		}
	}

	update_option( 'vpc_pages_initialized_v2', 1 );
	flush_rewrite_rules( false );
}
add_action( 'init', 'vanphuccare_ensure_default_pages' );

/**
 * Fallback route handler to ensure /lop-hoc-tien-san/ always loads the prenatal class template
 * even if the database page has not been published yet or rewrite rules are pending.
 *
 * @param string $template Matched template file.
 * @return string
 */
function vanphuccare_prenatal_template_fallback( $template ) {
	$request_uri = trim( parse_url( $_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH ), '/' );

	if ( $request_uri === 'lop-hoc-tien-san' ) {
		$prenatal_template = get_template_directory() . '/page-lop-hoc-tien-san.php';
		if ( file_exists( $prenatal_template ) ) {
			status_header( 200 );
			global $wp_query;
			if ( $wp_query ) {
				$wp_query->is_404  = false;
				$wp_query->is_page = true;
			}
			return $prenatal_template;
		}
	}

	return $template;
}
add_filter( 'template_include', 'vanphuccare_prenatal_template_fallback', 99 );

