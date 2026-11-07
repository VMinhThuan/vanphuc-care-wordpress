<?php
/**
 * Route helpers for the standalone Ở cữ page.
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Whether the current request is the Ở cữ landing page.
 *
 * The URI fallback lets the new navigation link work immediately even when
 * the WordPress page has not been created in the admin yet.
 *
 * @return bool
 */
function vanphuccare_is_o_cu_page() {
	if ( is_page_template( 'page-o-cu.php' ) || is_page( 'o-cu' ) ) {
		return true;
	}

	return 'o-cu' === vanphuccare_o_cu_request_path();
}

/**
 * Returns the normalized request path used by the standalone Ở cữ route.
 *
 * @return string
 */
function vanphuccare_o_cu_request_path() {
	$request_path = wp_parse_url( isset( $_SERVER['REQUEST_URI'] ) ? wp_unslash( $_SERVER['REQUEST_URI'] ) : '', PHP_URL_PATH );

	return trim( (string) $request_path, '/' );
}

/**
 * Render the standalone page template for /o-cu/.
 *
 * @param string $template Selected WordPress template.
 * @return string
 */
function vanphuccare_o_cu_template( $template ) {
	if ( ! is_admin() && 'o-cu' === vanphuccare_o_cu_request_path() ) {
		return get_template_directory() . '/page-o-cu.php';
	}

	if ( is_404() && vanphuccare_is_o_cu_page() ) {
		return get_template_directory() . '/page-o-cu.php';
	}

	return $template;
}
add_filter( 'template_include', 'vanphuccare_o_cu_template' );

/**
 * Return a normal success response for the standalone route.
 *
 * @return void
 */
function vanphuccare_o_cu_status() {
	if ( ! is_admin() && 'o-cu' === vanphuccare_o_cu_request_path() ) {
		// WordPress can otherwise canonical-redirect the missing /o-cu/ page to
		// an unrelated post with a similar slug before template_include runs.
		remove_action( 'template_redirect', 'redirect_canonical' );
		status_header( 200 );
	}
}
add_action( 'template_redirect', 'vanphuccare_o_cu_status', 1 );

/**
 * Prevents canonical redirects from replacing the standalone landing route.
 *
 * @param string $redirect_url  Redirect URL calculated by WordPress.
 * @param string $requested_url Original requested URL.
 * @return string|false
 */
function vanphuccare_o_cu_canonical_redirect( $redirect_url, $requested_url ) {
	$requested_path = wp_parse_url( $requested_url, PHP_URL_PATH );

	if ( 'o-cu' === trim( (string) $requested_path, '/' ) ) {
		return false;
	}

	return $redirect_url;
}
add_filter( 'redirect_canonical', 'vanphuccare_o_cu_canonical_redirect', 10, 2 );
