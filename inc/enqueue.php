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
	$about_path    = get_template_directory() . '/assets/css/about.css';
	$about_ver     = file_exists( $about_path ) ? (string) filemtime( $about_path ) : $theme_version;
	$is_about_page = is_page_template( 'page-gioi-thieu.php' ) || is_page( 'gioi-thieu' );

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

	if ( $is_about_page && file_exists( $about_path ) ) {
		wp_enqueue_style(
			'vanphuccare-about',
			get_template_directory_uri() . '/assets/css/about.css',
			array( 'vanphuccare-tailwind' ),
			$about_ver
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

/**
 * Preloads only the primary homepage hero image so the first viewport can
 * render sooner without making every page download homepage assets.
 *
 * @return void
 */
function vanphuccare_preload_homepage_hero() {
	if ( ! is_front_page() || ! function_exists( 'vpc_image_url' ) ) {
		return;
	}

	$hero_url = vpc_theme_asset_url( 'home/hero-banner.webp' );
	if ( ! $hero_url ) {
		$hero_url = vpc_image_url( 'home/hero-banner.webp', 'full' );
	}
	if ( ! $hero_url ) {
		return;
	}

	printf( '<link rel="preload" as="image" href="%s" fetchpriority="high">\n', esc_url( $hero_url ) );
}
add_action( 'wp_head', 'vanphuccare_preload_homepage_hero', 1 );
