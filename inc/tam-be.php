<?php
/**
 * Route helpers for the standalone Tắm bé tại nhà page.
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function vanphuccare_is_tam_be_page() {
	if ( is_page_template( 'page-tam-be-tai-nha.php' ) || is_page( 'tam-be-tai-nha' ) || is_page( 'tam-tre-so-sinh' ) || vanphuccare_is_standalone_route_template( 'page-tam-be-tai-nha.php' ) ) {
		return true;
	}

	$path = function_exists( 'vanphuccare_request_path' ) ? vanphuccare_request_path() : '';

	return in_array( $path, array( 'tam-be-tai-nha', 'tam-tre-so-sinh', 'tam-be-so-sinh', 'dich-vu/tam-be-tai-nha' ), true );
}

function vanphuccare_tam_be_template( $template ) {
	if ( vanphuccare_is_tam_be_page() ) {
		return get_template_directory() . '/page-tam-be-tai-nha.php';
	}

	return $template;
}
add_filter( 'template_include', 'vanphuccare_tam_be_template' );

function vanphuccare_tam_be_status() {
	if ( ! is_admin() && is_404() && vanphuccare_is_tam_be_page() ) {
		status_header( 200 );
	}
}
add_action( 'template_redirect', 'vanphuccare_tam_be_status', 1 );
