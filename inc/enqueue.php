<?php
/**
 * Theme asset loading.
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueues theme styles and scripts.
 *
 * @return void
 */
function vanphuccare_enqueue_assets() {
	$theme_version = wp_get_theme()->get( 'Version' );
	$css_path      = get_template_directory() . '/assets/css/main.css';
	$js_path       = get_template_directory() . '/assets/js/main.js';
	$css_version   = file_exists( $css_path ) ? (string) filemtime( $css_path ) : $theme_version;
	$js_version    = file_exists( $js_path ) ? (string) filemtime( $js_path ) : $theme_version;

	$tailwind_path = get_template_directory() . '/assets/css/theme.css';
	$tailwind_ver  = file_exists( $tailwind_path ) ? (string) filemtime( $tailwind_path ) : $theme_version;

	// Enqueue Google Fonts: Fraunces (Heading) & Manrope (Body) - optimized weights, no italic
	wp_enqueue_style(
		'vanphuccare-fonts',
		'https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,400..700&family=Manrope:wght@400;500;600;700&display=swap',
		array(),
		null
	);

	// Enqueue Tailwind CSS v4 Theme
	if ( file_exists( $tailwind_path ) ) {
		wp_enqueue_style(
			'vanphuccare-tailwind',
			get_template_directory_uri() . '/assets/css/theme.css',
			array( 'vanphuccare-fonts' ),
			$tailwind_ver
		);
	}

	wp_enqueue_script(
		'vanphuccare-main',
		get_template_directory_uri() . '/assets/js/main.js',
		array(),
		$js_version,
		true
	);

	wp_localize_script(
		'vanphuccare-main',
		'vpcData',
		array(
			'ajaxUrl' => admin_url( 'admin-ajax.php' ),
			'nonce'   => wp_create_nonce( 'vpc_consultation_nonce' ),
		)
	);
}
add_action( 'wp_enqueue_scripts', 'vanphuccare_enqueue_assets' );
