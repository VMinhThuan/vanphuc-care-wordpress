<?php
/**
 * Route helpers for the standalone Tư vấn nuôi con EASY page.
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Whether the current request is the EASY consultation landing page.
 *
 * @return bool
 */
function vanphuccare_is_easy_page() {
	if ( is_page_template( 'page-tu-van-nuoi-con-easy.php' ) || is_page( 'tu-van-nuoi-con-easy' ) || is_page( 'tu-van-easy' ) ) {
		return true;
	}

	$request_path = wp_parse_url( isset( $_SERVER['REQUEST_URI'] ) ? wp_unslash( $_SERVER['REQUEST_URI'] ) : '', PHP_URL_PATH );
	$path         = trim( (string) $request_path, '/' );

	return in_array( $path, array( 'tu-van-nuoi-con-easy', 'tu-van-easy', 'kien-thuc/tu-van-nuoi-con-easy' ), true );
}

/**
 * Render the standalone route with the dedicated page template.
 *
 * @param string $template Selected WordPress template.
 * @return string
 */
function vanphuccare_easy_template( $template ) {
	if ( vanphuccare_is_easy_page() ) {
		return get_template_directory() . '/page-tu-van-nuoi-con-easy.php';
	}

	return $template;
}
add_filter( 'template_include', 'vanphuccare_easy_template' );

/**
 * Make the fallback route return HTTP 200 instead of a soft 404.
 *
 * @return void
 */
function vanphuccare_easy_status() {
	if ( ! is_admin() && is_404() && vanphuccare_is_easy_page() ) {
		status_header( 200 );
	}
}
add_action( 'template_redirect', 'vanphuccare_easy_status', 1 );
