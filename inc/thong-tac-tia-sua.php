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
	if ( is_page_template( 'page-thong-tac-tia-sua.php' ) || is_page( 'thong-tac-tia-sua' ) || is_page( 'thong-tac-sua' ) ) {
		return true;
	}

	$request_path = wp_parse_url( isset( $_SERVER['REQUEST_URI'] ) ? wp_unslash( $_SERVER['REQUEST_URI'] ) : '', PHP_URL_PATH );
	$path         = trim( (string) $request_path, '/' );

	return in_array( $path, array( 'thong-tac-tia-sua', 'thong-tac-sua', 'dich-vu/thong-tac-tia-sua' ), true );
}

function vanphuccare_thong_tac_template( $template ) {
	if ( vanphuccare_is_thong_tac_page() ) {
		return get_template_directory() . '/page-thong-tac-tia-sua.php';
	}

	return $template;
}
add_filter( 'template_include', 'vanphuccare_thong_tac_template' );

function vanphuccare_thong_tac_status() {
	if ( ! is_admin() && is_404() && vanphuccare_is_thong_tac_page() ) {
		status_header( 200 );
	}
}
add_action( 'template_redirect', 'vanphuccare_thong_tac_status', 1 );
