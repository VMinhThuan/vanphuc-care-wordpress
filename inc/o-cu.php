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

	$request_path = wp_parse_url( isset( $_SERVER['REQUEST_URI'] ) ? wp_unslash( $_SERVER['REQUEST_URI'] ) : '', PHP_URL_PATH );

	return 'o-cu' === trim( (string) $request_path, '/' );
}

/**
 * Render the page template for /o-cu/ when no matching WP Page exists.
 *
 * @param string $template Selected WordPress template.
 * @return string
 */
function vanphuccare_o_cu_template( $template ) {
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
	if ( ! is_admin() && is_404() && vanphuccare_is_o_cu_page() ) {
		status_header( 200 );
	}
}
add_action( 'template_redirect', 'vanphuccare_o_cu_status', 1 );
