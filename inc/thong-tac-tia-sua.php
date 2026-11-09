<?php
/**
 * Route helpers for the standalone Thông tắc tia sữa page.
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function vanphuccare_is_thong_tac_page() {
	if ( is_page_template( 'page-thong-tac-tia-sua.php' ) || is_page( 'thong-tac-tia-sua' ) || is_page( 'thong-tac-sua' ) || vanphuccare_is_standalone_route_template( 'page-thong-tac-tia-sua.php' ) ) {
		return true;
	}

	$path = function_exists( 'vanphuccare_request_path' ) ? vanphuccare_request_path() : '';

	return in_array( $path, array( 'thong-tac-tia-sua', 'thong-tac-sua', 'dich-vu/thong-tac-tia-sua' ), true );
}

function vanphuccare_thong_tac_template( $template ) {
	if ( vanphuccare_is_thong_tac_page() ) {
		return get_template_directory() . '/page-thong-tac-tia-sua.php';
	}

	return $template;
}
add_filter( 'template_include', 'vanphuccare_thong_tac_template' );

/**
 * Keep the standalone service route from being canonicalized to the homepage
 * when no WordPress Page with this slug exists yet.
 *
 * @param string|false $redirect_url  Canonical redirect URL.
 * @param string       $requested_url Original requested URL.
 * @return string|false
 */
function vanphuccare_thong_tac_canonical_redirect( $redirect_url, $requested_url ) {
	if ( vanphuccare_is_thong_tac_page() ) {
		return false;
	}

	return $redirect_url;
}
add_filter( 'redirect_canonical', 'vanphuccare_thong_tac_canonical_redirect', 10, 2 );

function vanphuccare_thong_tac_status() {
	if ( ! is_admin() && is_404() && vanphuccare_is_thong_tac_page() ) {
		status_header( 200 );
	}
}
add_action( 'template_redirect', 'vanphuccare_thong_tac_status', 1 );
