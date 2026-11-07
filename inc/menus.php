<?php
/**
 * Theme menu registration.
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Registers theme navigation menu locations.
 *
 * @return void
 */
function vanphuccare_register_menus() {
	register_nav_menus(
		array(
			'primary' => esc_html__( 'Primary Menu', 'vanphuccare' ),
			'footer'  => esc_html__( 'Footer Menu', 'vanphuccare' ),
		)
	);
}
add_action( 'after_setup_theme', 'vanphuccare_register_menus' );

/**
 * Keeps an assigned WordPress menu in sync with the new Ở cữ landing page.
 *
 * @param array    $atts Link attributes.
 * @param WP_Post  $item Menu item.
 * @return array
 */
function vanphuccare_o_cu_menu_link( $atts, $item ) {
	if ( isset( $item->title ) && 'Ở cữ' === wp_strip_all_tags( $item->title ) ) {
		$atts['href'] = home_url( '/o-cu/' );
	}

	return $atts;
}
add_filter( 'nav_menu_link_attributes', 'vanphuccare_o_cu_menu_link', 10, 2 );

/**
 * Keeps the assigned WordPress menu's Bảo mẫu item on the standalone page.
 *
 * @param array    $atts Link attributes.
 * @param WP_Post  $item Menu item.
 * @return array
 */
function vanphuccare_bao_mau_menu_link( $atts, $item ) {
	$menu_title = isset( $item->title ) ? wp_strip_all_tags( $item->title ) : '';
	$menu_title = trim( $menu_title );
	$menu_href  = isset( $atts['href'] ) ? (string) $atts['href'] : '';

	if (
		in_array( $menu_title, array( 'Bảo mẫu', 'Bảo mẫu tại nhà' ), true )
		|| false !== strpos( $menu_href, '#bao-mau-tai-nha' )
		|| false !== strpos( $menu_href, '/bao-mau-tai-nha' )
	) {
		$atts['href'] = home_url( '/bao-mau-tai-nha/' );
	}

	return $atts;
}
add_filter( 'nav_menu_link_attributes', 'vanphuccare_bao_mau_menu_link', 10, 2 );

/**
 * Keeps the assigned WordPress menu's Dịch vụ item on the service archive.
 *
 * @param array   $atts Link attributes.
 * @param WP_Post $item Menu item.
 * @return array
 */
function vanphuccare_service_menu_link( $atts, $item ) {
	$menu_title = isset( $item->title ) ? trim( wp_strip_all_tags( $item->title ) ) : '';
	$menu_href  = isset( $atts['href'] ) ? (string) $atts['href'] : '';

	if ( 'Dịch vụ' === $menu_title || false !== strpos( $menu_href, '/dich-vu' ) ) {
		$atts['href'] = home_url( '/dich-vu/' );
	}

	return $atts;
}
add_filter( 'nav_menu_link_attributes', 'vanphuccare_service_menu_link', 10, 2 );

/**
 * Adds the active state to an assigned menu's Ở cữ item.
 *
 * @param array   $classes Menu classes.
 * @param WP_Post $item    Menu item.
 * @return array
 */
function vanphuccare_o_cu_menu_class( $classes, $item ) {
	if ( vanphuccare_is_o_cu_page() && isset( $item->title ) && 'Ở cữ' === wp_strip_all_tags( $item->title ) ) {
		$classes[] = 'current-menu-item';
	}

	return array_unique( $classes );
}
add_filter( 'nav_menu_css_class', 'vanphuccare_o_cu_menu_class', 10, 2 );

/**
 * Adds the active state to an assigned menu's Bảo mẫu item.
 *
 * @param array   $classes Menu classes.
 * @param WP_Post $item Menu item.
 * @return array
 */
function vanphuccare_bao_mau_menu_class( $classes, $item ) {
	$menu_title = isset( $item->title ) ? wp_strip_all_tags( $item->title ) : '';
	$menu_title = trim( $menu_title );

	if ( vanphuccare_is_bao_mau_page() && in_array( $menu_title, array( 'Bảo mẫu', 'Bảo mẫu tại nhà' ), true ) ) {
		$classes[] = 'current-menu-item';
	}

	return array_unique( $classes );
}
add_filter( 'nav_menu_css_class', 'vanphuccare_bao_mau_menu_class', 10, 2 );

/**
 * Adds the active state to the assigned menu's Dịch vụ item.
 *
 * @param array   $classes Menu classes.
 * @param WP_Post $item Menu item.
 * @return array
 */
function vanphuccare_service_menu_class( $classes, $item ) {
	$menu_title = isset( $item->title ) ? trim( wp_strip_all_tags( $item->title ) ) : '';

	if ( ( is_post_type_archive( 'vpc_service' ) || is_singular( 'vpc_service' ) ) && 'Dịch vụ' === $menu_title ) {
		$classes[] = 'current-menu-item';
	}

	return array_unique( $classes );
}
add_filter( 'nav_menu_css_class', 'vanphuccare_service_menu_class', 10, 2 );

/**
 * Keeps navigation compliant with Figma design when a custom WordPress
 * menu has not yet been assigned to the primary theme location.
 *
 * @return void
 */
function vanphuccare_primary_menu_fallback() {
	$is_home     = is_front_page() || is_home();
	$is_prenatal = is_page( 'lop-hoc-tien-san' );
	$is_about    = is_page_template( 'page-gioi-thieu.php' ) || is_page( 'gioi-thieu' );
	$is_o_cu     = vanphuccare_is_o_cu_page();
	$is_bao_mau  = vanphuccare_is_bao_mau_page();
	$is_service  = is_post_type_archive( 'vpc_service' ) || is_singular( 'vpc_service' );
	$nav_active  = 'text-text-nav-active';
	$nav_default = 'text-text-nav-default hover:text-text-nav-hover';

	echo '<ul class="vpc-nav-menu">';
	printf( '<li class="%s"><a href="%s" class="%s">%s</a></li>', $is_home ? 'current-menu-item' : '', esc_url( home_url( '/' ) ), $is_home ? $nav_active : $nav_default, esc_html__( 'Trang chủ', 'vanphuccare' ) );
	printf( '<li class="%s"><a href="%s" class="%s">%s</a></li>', $is_about ? 'current-menu-item' : '', esc_url( home_url( '/gioi-thieu' ) ), $is_about ? $nav_active : $nav_default, esc_html__( 'Giới thiệu', 'vanphuccare' ) );
	printf( '<li class="%s"><a href="%s" class="%s">%s</a></li>', $is_o_cu ? 'current-menu-item' : '', esc_url( home_url( '/o-cu/' ) ), $is_o_cu ? $nav_active : $nav_default, esc_html__( 'Ở cữ', 'vanphuccare' ) );
	printf( '<li class="%s"><a href="%s" class="%s">%s</a></li>', $is_bao_mau ? 'current-menu-item' : '', esc_url( home_url( '/bao-mau-tai-nha/' ) ), $is_bao_mau ? $nav_active : $nav_default, esc_html__( 'Bảo mẫu', 'vanphuccare' ) );
	printf( '<li class="%s"><a href="%s" class="%s">%s</a></li>', $is_service ? 'current-menu-item' : '', esc_url( home_url( '/dich-vu/' ) ), $is_service ? $nav_active : $nav_default, esc_html__( 'Dịch vụ', 'vanphuccare' ) );
	printf( '<li class="%s"><a href="%s" class="%s">%s</a></li>', $is_prenatal ? 'current-menu-item' : '', esc_url( home_url( '/lop-hoc-tien-san/' ) ), $is_prenatal ? $nav_active : $nav_default, esc_html__( 'Lớp học tiền sản', 'vanphuccare' ) );
	printf( '<li><a href="%s" class="%s">%s</a></li>', esc_url( home_url( '/kien-thuc/' ) ), $nav_default, esc_html__( 'Kiến thức', 'vanphuccare' ) );
	echo '</ul>';
}

/**
 * Mobile counterpart to the primary navigation fallback.
 *
 * @return void
 */
function vanphuccare_mobile_menu_fallback() {
	$is_home     = is_front_page() || is_home();
	$is_prenatal = is_page( 'lop-hoc-tien-san' );
	$is_about    = is_page_template( 'page-gioi-thieu.php' ) || is_page( 'gioi-thieu' );
	$is_o_cu     = vanphuccare_is_o_cu_page();
	$is_bao_mau  = vanphuccare_is_bao_mau_page();
	$is_service  = is_post_type_archive( 'vpc_service' ) || is_singular( 'vpc_service' );
	$chevron     = '<svg class="w-4 h-4 text-neutral-400 shrink-0 stroke-current fill-none" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg>';

	$items = array(
		array( 'url' => home_url( '/' ), 'title' => 'Trang chủ', 'active' => $is_home ),
		array( 'url' => home_url( '/gioi-thieu' ), 'title' => 'Giới thiệu', 'active' => $is_about ),
		array( 'url' => home_url( '/o-cu/' ), 'title' => 'Ở cữ', 'active' => $is_o_cu ),
		array( 'url' => home_url( '/bao-mau-tai-nha/' ), 'title' => 'Bảo mẫu', 'active' => $is_bao_mau ),
		array( 'url' => home_url( '/dich-vu/' ), 'title' => 'Dịch vụ', 'active' => $is_service ),
		array( 'url' => home_url( '/lop-hoc-tien-san/' ), 'title' => 'Lớp học tiền sản', 'active' => $is_prenatal ),
		array( 'url' => home_url( '/kien-thuc/' ), 'title' => 'Kiến thức', 'active' => false ),
	);

	echo '<ul class="vpc-mobile-nav">';
	foreach ( $items as $item ) {
		$cls = $item['active'] ? 'current-menu-item' : '';
		printf(
			'<li class="%s"><a href="%s"><span>%s</span>%s</a></li>',
			esc_attr( $cls ),
			esc_url( $item['url'] ),
			esc_html( $item['title'] ),
			$chevron
		);
	}
	echo '</ul>';
}
