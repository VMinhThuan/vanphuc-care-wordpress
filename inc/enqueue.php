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
	$footer_path   = get_template_directory() . '/assets/css/footer.css';
	$footer_ver    = file_exists( $footer_path ) ? (string) filemtime( $footer_path ) : $theme_version;
	$mobile_path   = get_template_directory() . '/assets/css/mobile-responsive.css';
	$mobile_ver    = file_exists( $mobile_path ) ? (string) filemtime( $mobile_path ) : $theme_version;
	$about_path    = get_template_directory() . '/assets/css/about.css';
	$about_ver     = file_exists( $about_path ) ? (string) filemtime( $about_path ) : $theme_version;
	$o_cu_path     = get_template_directory() . '/assets/css/o-cu.css';
	$o_cu_ver      = file_exists( $o_cu_path ) ? (string) filemtime( $o_cu_path ) : $theme_version;
	$o_cu_js       = get_template_directory() . '/assets/js/o-cu.js';
	$o_cu_js_ver   = file_exists( $o_cu_js ) ? (string) filemtime( $o_cu_js ) : $theme_version;
	$bao_mau_path  = get_template_directory() . '/assets/css/bao-mau.css';
	$bao_mau_ver   = file_exists( $bao_mau_path ) ? (string) filemtime( $bao_mau_path ) : $theme_version;
	$bao_mau_js    = get_template_directory() . '/assets/js/bao-mau.js';
	$bao_mau_js_ver = file_exists( $bao_mau_js ) ? (string) filemtime( $bao_mau_js ) : $theme_version;
	$easy_path     = get_template_directory() . '/assets/css/easy.css';
	$easy_ver      = file_exists( $easy_path ) ? (string) filemtime( $easy_path ) : $theme_version;
	$easy_js       = get_template_directory() . '/assets/js/easy.js';
	$easy_js_ver   = file_exists( $easy_js ) ? (string) filemtime( $easy_js ) : $theme_version;
	$bath_path     = get_template_directory() . '/assets/css/bath.css';
	$bath_ver      = file_exists( $bath_path ) ? (string) filemtime( $bath_path ) : $theme_version;
	$bath_js       = get_template_directory() . '/assets/js/bath.js';
	$bath_js_ver   = file_exists( $bath_js ) ? (string) filemtime( $bath_js ) : $theme_version;
	$milk_path     = get_template_directory() . '/assets/css/milk.css';
	$milk_ver      = file_exists( $milk_path ) ? (string) filemtime( $milk_path ) : $theme_version;
	$services_path = get_template_directory() . '/assets/css/services.css';
	$services_ver  = file_exists( $services_path ) ? (string) filemtime( $services_path ) : $theme_version;
	$milk_js       = get_template_directory() . '/assets/js/milk.js';
	$milk_js_ver   = file_exists( $milk_js ) ? (string) filemtime( $milk_js ) : $theme_version;
	$about_js      = get_template_directory() . '/assets/js/about.js';
	$about_js_ver  = file_exists( $about_js ) ? (string) filemtime( $about_js ) : $theme_version;
	$is_about_page = is_page_template( 'page-gioi-thieu.php' ) || is_page( 'gioi-thieu' );
	$is_o_cu_page  = vanphuccare_is_o_cu_page();
	$is_bao_mau_page = vanphuccare_is_bao_mau_page();
	$is_easy_page    = vanphuccare_is_easy_page();
	$is_bath_page   = vanphuccare_is_tam_be_page();
	$is_milk_page   = vanphuccare_is_thong_tac_page();
	$is_services_page = is_post_type_archive( 'vpc_service' ) || is_singular( 'vpc_service' );

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

	if ( $is_o_cu_page && file_exists( $o_cu_path ) ) {
		if ( file_exists( $bao_mau_path ) ) {
			wp_enqueue_style(
				'vanphuccare-bao-mau-shared',
				get_template_directory_uri() . '/assets/css/bao-mau.css',
				array( 'vanphuccare-tailwind' ),
				$bao_mau_ver
			);
		}
		wp_enqueue_style(
			'vanphuccare-o-cu',
			get_template_directory_uri() . '/assets/css/o-cu.css',
			array( 'vanphuccare-tailwind', 'vanphuccare-bao-mau-shared' ),
			$o_cu_ver
		);
	}

	if ( $is_bao_mau_page && file_exists( $bao_mau_path ) ) {
		wp_enqueue_style(
			'vanphuccare-bao-mau',
			get_template_directory_uri() . '/assets/css/bao-mau.css',
			array( 'vanphuccare-tailwind' ),
			$bao_mau_ver
		);
	}

	if ( $is_easy_page && file_exists( $easy_path ) ) {
		wp_enqueue_style(
			'vanphuccare-easy',
			get_template_directory_uri() . '/assets/css/easy.css',
			array( 'vanphuccare-tailwind' ),
			$easy_ver
		);
	}

	if ( ( $is_bath_page || $is_easy_page || $is_milk_page ) && file_exists( $bath_path ) ) {
		wp_enqueue_style(
			'vanphuccare-bath',
			get_template_directory_uri() . '/assets/css/bath.css',
			array( 'vanphuccare-tailwind' ),
			$bath_ver
		);
	}

	if ( $is_milk_page && file_exists( $milk_path ) ) {
		wp_enqueue_style(
			'vanphuccare-milk',
			get_template_directory_uri() . '/assets/css/milk.css',
			array( 'vanphuccare-tailwind' ),
			$milk_ver
		);
	}

	if ( $is_services_page && file_exists( $services_path ) ) {
		wp_enqueue_style(
			'vanphuccare-services',
			get_template_directory_uri() . '/assets/css/services.css',
			array( 'vanphuccare-tailwind' ),
			$services_ver
		);
	}

	/* Shared footer overrides must load after page-specific styles. */
	if ( file_exists( $footer_path ) ) {
		wp_enqueue_style(
			'vanphuccare-footer',
			get_template_directory_uri() . '/assets/css/footer.css',
			array( 'vanphuccare-tailwind' ),
			$footer_ver
		);
	}

	/* Keep mobile pages content-driven after all page-specific CSS is loaded. */
	if ( file_exists( $mobile_path ) ) {
		wp_enqueue_style(
			'vanphuccare-mobile-responsive',
			get_template_directory_uri() . '/assets/css/mobile-responsive.css',
			array( 'vanphuccare-footer' ),
			$mobile_ver
		);
	}

	wp_enqueue_script(
		'vanphuccare-main',
		get_template_directory_uri() . '/assets/js/main.js',
		array(),
		$js_version,
		true
	);

	if ( $is_bao_mau_page && file_exists( $bao_mau_js ) ) {
		wp_enqueue_script(
			'vanphuccare-bao-mau',
			get_template_directory_uri() . '/assets/js/bao-mau.js',
			array(),
			$bao_mau_js_ver,
			true
		);
	}

	if ( $is_o_cu_page && file_exists( $o_cu_js ) ) {
		wp_enqueue_script(
			'vanphuccare-o-cu',
			get_template_directory_uri() . '/assets/js/o-cu.js',
			array(),
			$o_cu_js_ver,
			true
		);
	}

	if ( $is_about_page && file_exists( $about_js ) ) {
		wp_enqueue_script(
			'vanphuccare-about',
			get_template_directory_uri() . '/assets/js/about.js',
			array(),
			$about_js_ver,
			true
		);
	}

	if ( $is_easy_page && file_exists( $easy_js ) ) {
		wp_enqueue_script(
			'vanphuccare-easy',
			get_template_directory_uri() . '/assets/js/easy.js',
			array(),
			$easy_js_ver,
			true
		);
	}

	if ( ( $is_bath_page || $is_easy_page || $is_milk_page ) && file_exists( $bath_js ) ) {
		wp_enqueue_script(
			'vanphuccare-bath',
			get_template_directory_uri() . '/assets/js/bath.js',
			array(),
			$bath_js_ver,
			true
		);
	}

	if ( $is_milk_page && file_exists( $milk_js ) ) {
		wp_enqueue_script(
			'vanphuccare-milk',
			get_template_directory_uri() . '/assets/js/milk.js',
			array(),
			$milk_js_ver,
			true
		);
	}

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

	printf( "<link rel=\"preload\" as=\"image\" href=\"%s\" fetchpriority=\"high\">\n", esc_url( $hero_url ) );
}
add_action( 'wp_head', 'vanphuccare_preload_homepage_hero', 1 );
