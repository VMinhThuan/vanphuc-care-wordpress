<?php
/**
 * Route helpers for the standalone Bảo mẫu tại nhà page.
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Whether the current request is the Bảo mẫu tại nhà landing page.
 *
 * @return bool
 */
function vanphuccare_is_bao_mau_page() {
	if ( is_page_template( 'page-bao-mau.php' ) || is_page( 'bao-mau' ) || is_page( 'bao-mau-tai-nha' ) ) {
		return true;
	}

	$request_path = wp_parse_url( isset( $_SERVER['REQUEST_URI'] ) ? wp_unslash( $_SERVER['REQUEST_URI'] ) : '', PHP_URL_PATH );
	$path         = trim( (string) $request_path, '/' );

	return in_array( $path, array( 'bao-mau', 'bao-mau-tai-nha', 'dich-vu/bao-mau-tai-nha' ), true );
}

/**
 * Render the standalone route even before an admin page is created.
 *
 * @param string $template Selected WordPress template.
 * @return string
 */
function vanphuccare_bao_mau_template( $template ) {
	if ( vanphuccare_is_bao_mau_page() ) {
		return get_template_directory() . '/page-bao-mau.php';
	}

	return $template;
}
add_filter( 'template_include', 'vanphuccare_bao_mau_template' );

/**
 * Keep the standalone route from being canonicalized to the homepage
 * when no WordPress Page with this slug exists yet.
 *
 * @param string|false $redirect_url  Canonical redirect URL.
 * @param string       $requested_url Original requested URL.
 * @return string|false
 */
function vanphuccare_bao_mau_canonical_redirect( $redirect_url, $requested_url ) {
	if ( vanphuccare_is_bao_mau_page() ) {
		return false;
	}

	return $redirect_url;
}
add_filter( 'redirect_canonical', 'vanphuccare_bao_mau_canonical_redirect', 10, 2 );

/**
 * Make the fallback route return HTTP 200 instead of a soft 404.
 *
 * @return void
 */
function vanphuccare_bao_mau_status() {
	if ( ! is_admin() && is_404() && vanphuccare_is_bao_mau_page() ) {
		status_header( 200 );
	}
}
add_action( 'template_redirect', 'vanphuccare_bao_mau_status', 1 );
