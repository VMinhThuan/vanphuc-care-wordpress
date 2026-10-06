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

	wp_enqueue_style(
		'vanphuccare-main',
		get_template_directory_uri() . '/assets/css/main.css',
		array(),
		$css_version
	);

	wp_enqueue_script(
		'vanphuccare-main',
		get_template_directory_uri() . '/assets/js/main.js',
		array(),
		$js_version,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'vanphuccare_enqueue_assets' );
