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
 * Keeps navigation compliant with Figma design when a custom WordPress
 * menu has not yet been assigned to the primary theme location.
 *
 * @return void
 */
function vanphuccare_primary_menu_fallback() {
	$is_home     = is_front_page() || is_home();
	$is_prenatal = is_page( 'lop-hoc-tien-san' );
	$nav_active  = 'text-text-nav-active';
	$nav_default = 'text-text-nav-default hover:text-text-nav-hover';

	echo '<ul class="vpc-nav-menu">';
	printf( '<li class="%s"><a href="%s" class="%s">%s</a></li>', $is_home ? 'current-menu-item' : '', esc_url( home_url( '/' ) ), $is_home ? $nav_active : $nav_default, esc_html__( 'Trang chủ', 'vanphuccare' ) );
	printf( '<li><a href="%s" class="%s">%s</a></li>', esc_url( home_url( '/gioi-thieu' ) ), $nav_default, esc_html__( 'Giới thiệu', 'vanphuccare' ) );
	printf( '<li><a href="%s" class="%s">%s</a></li>', esc_url( home_url( '/dich-vu/trung-tam-o-cu/' ) ), $nav_default, esc_html__( 'Ở cữ', 'vanphuccare' ) );
	printf( '<li><a href="%s" class="%s">%s</a></li>', esc_url( home_url( '/dich-vu/bao-mau-tai-nha/' ) ), $nav_default, esc_html__( 'Bảo mẫu', 'vanphuccare' ) );
	printf( '<li><a href="%s" class="%s">%s</a></li>', esc_url( home_url( '/dich-vu/' ) ), $nav_default, esc_html__( 'Dịch vụ', 'vanphuccare' ) );
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
	$chevron     = '<svg class="w-6 h-6 text-neutral-400 shrink-0 stroke-current fill-none" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg>';

	$items = array(
		array( 'url' => home_url( '/' ), 'title' => 'Trang chủ', 'active' => $is_home ),
		array( 'url' => home_url( '/gioi-thieu' ), 'title' => 'Giới thiệu', 'active' => false ),
		array( 'url' => home_url( '/dich-vu/trung-tam-o-cu/' ), 'title' => 'Ở cữ', 'active' => false ),
		array( 'url' => home_url( '/dich-vu/bao-mau-tai-nha/' ), 'title' => 'Bảo mẫu', 'active' => false ),
		array( 'url' => home_url( '/dich-vu/' ), 'title' => 'Dịch vụ', 'active' => false ),
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
