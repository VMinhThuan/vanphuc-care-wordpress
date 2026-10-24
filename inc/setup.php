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
