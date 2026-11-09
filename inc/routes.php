<?php
/**
 * Fallback routes for standalone service landing pages.
 *
 * These pages are theme templates rather than content stored in a WordPress
 * Page. Keep the route table here so navigation links work on a fresh install
 * and do not depend on a matching Page/slug being created in wp-admin.
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Returns the normalized path relative to the WordPress home URL.
 *
 * @param string|null $url URL or request URI. Null uses the current request.
 * @return string
 */
function vanphuccare_request_path( $url = null ) {
	if ( null === $url ) {
		$url = isset( $_SERVER['REQUEST_URI'] ) ? wp_unslash( $_SERVER['REQUEST_URI'] ) : '';
	}

	$path      = wp_parse_url( (string) $url, PHP_URL_PATH );
	$home_path = wp_parse_url( home_url( '/' ), PHP_URL_PATH );
	$path      = trim( rawurldecode( (string) $path ), '/' );
	$home_path = trim( rawurldecode( (string) $home_path ), '/' );

	if ( '' !== $home_path && ( $path === $home_path || 0 === strpos( $path, $home_path . '/' ) ) ) {
		$path = ltrim( substr( $path, strlen( $home_path ) ), '/' );
	}

	return trim( $path, '/' );
}

/**
 * Maps standalone public paths to their theme templates.
 *
 * @return array<string, string>
 */
function vanphuccare_standalone_routes() {
	return array(
		'o-cu'                                      => 'page-o-cu.php',
		'dich-vu/trung-tam-o-cu'                    => 'page-o-cu.php',
		'bao-mau'                                   => 'page-bao-mau.php',
		'bao-mau-tai-nha'                           => 'page-bao-mau.php',
		'dich-vu/bao-mau-tai-nha'                   => 'page-bao-mau.php',
		'tu-van-nuoi-con-easy'                     => 'page-tu-van-nuoi-con-easy.php',
		'tu-van-easy'                               => 'page-tu-van-nuoi-con-easy.php',
		'kien-thuc/tu-van-nuoi-con-easy'            => 'page-tu-van-nuoi-con-easy.php',
		'dich-vu/tu-van-nuoi-con-easy'              => 'page-tu-van-nuoi-con-easy.php',
		'tam-be-tai-nha'                            => 'page-tam-be-tai-nha.php',
		'tam-tre-so-sinh'                           => 'page-tam-be-tai-nha.php',
		'tam-be-so-sinh'                            => 'page-tam-be-tai-nha.php',
		'dich-vu/tam-be-tai-nha'                    => 'page-tam-be-tai-nha.php',
		'dich-vu/tam-tre-so-sinh'                   => 'page-tam-be-tai-nha.php',
		'thong-tac-tia-sua'                         => 'page-thong-tac-tia-sua.php',
		'thong-tac-sua'                             => 'page-thong-tac-tia-sua.php',
		'dich-vu/thong-tac-tia-sua'                 => 'page-thong-tac-tia-sua.php',
		'dich-vu/thong-tac-sua'                     => 'page-thong-tac-tia-sua.php',
	);
}

/**
 * Gets the template for the current standalone route.
 *
 * @return string|false
 */
function vanphuccare_standalone_route_template() {
	$routes = vanphuccare_standalone_routes();
	$path   = vanphuccare_request_path();

	if ( ! isset( $routes[ $path ] ) ) {
		return false;
	}

	$template = trailingslashit( get_template_directory() ) . $routes[ $path ];

	return is_file( $template ) ? $template : false;
}

/**
 * Checks whether the current request resolves to a specific page template.
 *
 * @param string $template_filename Theme page template filename.
 * @return bool
 */
function vanphuccare_is_standalone_route_template( $template_filename ) {
	$route_template = vanphuccare_standalone_route_template();

	return $route_template && basename( $route_template ) === basename( (string) $template_filename );
}

/**
 * Selects the theme template before WordPress falls back to 404.php.
 *
 * @param string $template Selected WordPress template.
 * @return string
 */
function vanphuccare_standalone_route_template_include( $template ) {
	if ( is_admin() ) {
		return $template;
	}

	$route_template = vanphuccare_standalone_route_template();

	return $route_template ? $route_template : $template;
}
add_filter( 'template_include', 'vanphuccare_standalone_route_template_include', 1 );

/**
 * Marks a fallback route as a successful page request and prevents a
 * canonical redirect from replacing it with the homepage or another post.
 *
 * @return void
 */
function vanphuccare_prepare_standalone_route() {
	if ( is_admin() || ! vanphuccare_standalone_route_template() ) {
		return;
	}

	remove_action( 'template_redirect', 'redirect_canonical' );
	status_header( 200 );

	global $wp_query;
	if ( is_object( $wp_query ) ) {
		$wp_query->is_404      = false;
		$wp_query->is_page     = true;
		$wp_query->is_singular = true;
	}
}
add_action( 'template_redirect', 'vanphuccare_prepare_standalone_route', 1 );

/**
 * Prevents canonical redirects for standalone routes.
 *
 * @param string|false $redirect_url  Canonical redirect URL.
 * @param string       $requested_url Original requested URL.
 * @return string|false
 */
function vanphuccare_standalone_route_canonical_redirect( $redirect_url, $requested_url ) {
	$routes = vanphuccare_standalone_routes();
	$path   = vanphuccare_request_path( $requested_url );

	return isset( $routes[ $path ] ) ? false : $redirect_url;
}
add_filter( 'redirect_canonical', 'vanphuccare_standalone_route_canonical_redirect', 1, 2 );
