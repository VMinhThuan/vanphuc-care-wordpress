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
 * Resolves the cache-busting version for a theme asset.
 *
 * When WP_DEBUG is enabled (development), returns the file's modification timestamp
 * so local edits reflect immediately without manual cache flushing.
 * In production/staging (WP_DEBUG disabled), returns the static theme release version,
 * avoiding expensive disk I/O stat() calls on high-concurrency requests.
 *
 * @param string $full_path Absolute path to the asset file.
 * @return string Asset version.
 */
function vanphuccare_get_asset_version( $full_path ) {
	static $theme_version = null;

	if ( null === $theme_version ) {
		$theme_version = wp_get_theme()->get( 'Version' ) ?: '1.0.0';
	}

	if ( defined( 'WP_DEBUG' ) && WP_DEBUG && file_exists( $full_path ) ) {
		return (string) filemtime( $full_path );
	}

	return $theme_version;
}

/**
 * Enqueues a theme style safely with lazy version resolution.
 *
 * @param string   $handle        Style handle.
 * @param string   $relative_path Path relative to theme root.
 * @param string[] $deps          Dependencies.
 * @param string   $media         Media.
 * @return bool Whether the style was enqueued.
 */
function vanphuccare_enqueue_theme_style( $handle, $relative_path, $deps = array(), $media = 'all' ) {
	$full_path = get_template_directory() . '/' . ltrim( $relative_path, '/' );
	if ( ! file_exists( $full_path ) ) {
		return false;
	}

	$version = vanphuccare_get_asset_version( $full_path );
	wp_enqueue_style( $handle, get_template_directory_uri() . '/' . ltrim( $relative_path, '/' ), $deps, $version, $media );

	return true;
}

/**
 * Enqueues a theme script safely with lazy version resolution.
 *
 * @param string   $handle        Script handle.
 * @param string   $relative_path Path relative to theme root.
 * @param string[] $deps          Dependencies.
 * @param bool     $in_footer     Whether to enqueue in footer.
 * @return bool Whether the script was enqueued.
 */
function vanphuccare_enqueue_theme_script( $handle, $relative_path, $deps = array(), $in_footer = true ) {
	$full_path = get_template_directory() . '/' . ltrim( $relative_path, '/' );
	if ( ! file_exists( $full_path ) ) {
		return false;
	}

	$version = vanphuccare_get_asset_version( $full_path );
	wp_enqueue_script( $handle, get_template_directory_uri() . '/' . ltrim( $relative_path, '/' ), $deps, $version, $in_footer );

	return true;
}

/**
 * Enqueues theme styles and scripts.
 *
 * @return void
 */
function vanphuccare_enqueue_assets() {
	$is_about_page    = is_page_template( 'page-gioi-thieu.php' ) || is_page( 'gioi-thieu' );
	$is_o_cu_page     = vanphuccare_is_o_cu_page();
	$is_bao_mau_page  = vanphuccare_is_bao_mau_page();
	$is_easy_page     = vanphuccare_is_easy_page();
	$is_bath_page     = vanphuccare_is_tam_be_page();
	$is_milk_page     = vanphuccare_is_thong_tac_page();
	$is_prenatal_page = is_page_template( 'page-lop-hoc-tien-san.php' ) || is_page( 'lop-hoc-tien-san' ) || is_post_type_archive( 'vpc_prenatal_class' );
	$is_services_page = is_page( 'dich-vu' ) || is_page_template( 'page-dich-vu.php' ) || is_post_type_archive( 'vpc_service' ) || is_singular( 'vpc_service' );

	// Enqueue Google Fonts: Fraunces (Heading) & Manrope (Body) - optimized weights, no italic.
	wp_enqueue_style(
		'vanphuccare-fonts',
		'https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,400..700&family=Manrope:wght@400;500;600;700&display=swap',
		array(),
		null
	);

	// Enqueue Tailwind CSS v4 Theme.
	vanphuccare_enqueue_theme_style( 'vanphuccare-tailwind', 'assets/css/theme.css', array( 'vanphuccare-fonts' ) );

	if ( $is_about_page ) {
		vanphuccare_enqueue_theme_style( 'vanphuccare-about', 'assets/css/about.css', array( 'vanphuccare-tailwind' ) );
	}

	if ( $is_o_cu_page ) {
		vanphuccare_enqueue_theme_style( 'vanphuccare-bao-mau-shared', 'assets/css/bao-mau.css', array( 'vanphuccare-tailwind' ) );
		vanphuccare_enqueue_theme_style( 'vanphuccare-o-cu', 'assets/css/o-cu.css', array( 'vanphuccare-tailwind', 'vanphuccare-bao-mau-shared' ) );
	}

	if ( $is_bao_mau_page || $is_easy_page || $is_bath_page || $is_milk_page || $is_prenatal_page ) {
		vanphuccare_enqueue_theme_style( 'vanphuccare-bao-mau', 'assets/css/bao-mau.css', array( 'vanphuccare-tailwind' ) );
	}

	if ( $is_easy_page ) {
		vanphuccare_enqueue_theme_style( 'vanphuccare-easy', 'assets/css/easy.css', array( 'vanphuccare-tailwind' ) );
	}

	if ( $is_bath_page || $is_easy_page || $is_milk_page ) {
		vanphuccare_enqueue_theme_style( 'vanphuccare-bath', 'assets/css/bath.css', array( 'vanphuccare-tailwind' ) );
	}

	if ( $is_milk_page ) {
		vanphuccare_enqueue_theme_style( 'vanphuccare-milk', 'assets/css/milk.css', array( 'vanphuccare-tailwind' ) );
	}

	if ( $is_services_page ) {
		vanphuccare_enqueue_theme_style( 'vanphuccare-services', 'assets/css/services.css', array( 'vanphuccare-tailwind' ) );
	}

	/* Shared footer overrides must load after page-specific styles. */
	vanphuccare_enqueue_theme_style( 'vanphuccare-footer', 'assets/css/footer.css', array( 'vanphuccare-tailwind' ) );

	/* Keep mobile pages content-driven after all page-specific CSS is loaded. */
	vanphuccare_enqueue_theme_style( 'vanphuccare-mobile-responsive', 'assets/css/mobile-responsive.css', array( 'vanphuccare-footer' ) );
	vanphuccare_enqueue_theme_style( 'vanphuccare-select-menu', 'assets/css/select-menu.css', array( 'vanphuccare-mobile-responsive' ) );
	vanphuccare_enqueue_theme_style( 'vanphuccare-mobile-menu', 'assets/css/mobile-menu.css', array( 'vanphuccare-select-menu' ) );

	// Enqueue main JavaScript.
	vanphuccare_enqueue_theme_script( 'vanphuccare-main', 'assets/js/main.js', array(), true );

	if ( $is_bao_mau_page ) {
		vanphuccare_enqueue_theme_script( 'vanphuccare-bao-mau', 'assets/js/bao-mau.js', array(), true );
	}

	if ( $is_o_cu_page ) {
		vanphuccare_enqueue_theme_script( 'vanphuccare-o-cu', 'assets/js/o-cu.js', array(), true );
	}

	if ( $is_about_page ) {
		vanphuccare_enqueue_theme_script( 'vanphuccare-about', 'assets/js/about.js', array(), true );
	}

	if ( $is_easy_page ) {
		vanphuccare_enqueue_theme_script( 'vanphuccare-easy', 'assets/js/easy.js', array(), true );
	}

	if ( $is_bath_page || $is_easy_page || $is_milk_page ) {
		vanphuccare_enqueue_theme_script( 'vanphuccare-bath', 'assets/js/bath.js', array(), true );
	}

	if ( $is_milk_page ) {
		vanphuccare_enqueue_theme_script( 'vanphuccare-milk', 'assets/js/milk.js', array(), true );
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
