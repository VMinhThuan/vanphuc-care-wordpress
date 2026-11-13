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
			'primary'          => esc_html__( 'Primary Menu (Thanh điều hướng chính)', 'vanphuccare' ),
			'footer_services'  => esc_html__( 'Footer - Cột Dịch vụ', 'vanphuccare' ),
			'footer_knowledge' => esc_html__( 'Footer - Cột Kiến thức', 'vanphuccare' ),
			'footer_news'      => esc_html__( 'Footer - Cột Tin tức & Sự kiện', 'vanphuccare' ),
			'footer_legal'     => esc_html__( 'Footer - Liên kết Chân trang (Pháp lý)', 'vanphuccare' ),
			'footer'           => esc_html__( 'Footer Menu (Kế thừa)', 'vanphuccare' ),
		)
	);
}
add_action( 'after_setup_theme', 'vanphuccare_register_menus' );

// Menus are managed standardly via Appearance -> Menus in WP-Admin.
// The Kiến thức item is normalized below so an old custom-menu URL cannot
// prevent the primary navigation from opening the canonical hub page.

/**
 * Returns whether the current page belongs to the Dịch vụ content group.
 *
 * @return bool
 */
function vanphuccare_is_service_group_page() {
	return is_page( 'dich-vu' )
		|| is_page_template( 'page-dich-vu.php' )
		|| is_post_type_archive( 'vpc_service' )
		|| is_singular( 'vpc_service' )
		|| ( function_exists( 'vanphuccare_is_easy_page' ) && vanphuccare_is_easy_page() )
		|| ( function_exists( 'vanphuccare_is_tam_be_page' ) && vanphuccare_is_tam_be_page() )
		|| ( function_exists( 'vanphuccare_is_thong_tac_page' ) && vanphuccare_is_thong_tac_page() );
}

/**
 * Returns whether the current request belongs to the Kiến thức hub.
 *
 * This is intentionally shared by the fallback menu and assigned WordPress
 * menus so the active state stays consistent on the hub, category archives,
 * tags, and the clean "Tất cả bài viết" route.
 *
 * @return bool
 */
function vanphuccare_is_knowledge_group_page() {
	return is_page( 'kien-thuc' )
		|| is_page_template( 'page-kien-thuc.php' )
		|| is_category()
		|| is_tag()
		|| is_search()
		|| ! empty( get_query_var( 'vpc_is_all' ) );
}

/**
 * Identifies the Kiến thức item even when the administrator has assigned a
 * custom menu item with a stale URL.
 *
 * @param WP_Post $item Menu item.
 * @return bool
 */
function vanphuccare_is_knowledge_menu_item( $item ) {
	$menu_title = isset( $item->title ) ? trim( wp_strip_all_tags( $item->title ) ) : '';
	$menu_url   = isset( $item->url ) ? (string) $item->url : '';

	return 'Kiến thức' === $menu_title || false !== strpos( $menu_url, '/kien-thuc' );
}

/**
 * Keeps assigned primary/mobile menu items wired to the canonical hub URL.
 *
 * @param array   $atts Link attributes.
 * @param WP_Post $item Menu item.
 * @param object  $args Menu args.
 * @return array
 */
function vanphuccare_knowledge_menu_link_attributes( $atts, $item, $args ) {
	$theme_location = isset( $args->theme_location ) ? (string) $args->theme_location : '';

	if ( 0 === (int) ( $item->menu_item_parent ?? 0 )
		&& in_array( $theme_location, array( 'primary', '' ), true )
		&& vanphuccare_is_knowledge_menu_item( $item ) ) {
		$atts['href'] = home_url( '/kien-thuc/' );
	}

	return $atts;
}
add_filter( 'nav_menu_link_attributes', 'vanphuccare_knowledge_menu_link_attributes', 10, 3 );

/**
 * Adds the active class to assigned Kiến thức menu items.
 *
 * @param array   $classes Menu classes.
 * @param WP_Post $item Menu item.
 * @return array
 */
function vanphuccare_knowledge_menu_class( $classes, $item ) {
	if ( vanphuccare_is_knowledge_group_page() && vanphuccare_is_knowledge_menu_item( $item ) ) {
		$classes[] = 'current-menu-item';
	}

	return array_unique( $classes );
}
add_filter( 'nav_menu_css_class', 'vanphuccare_knowledge_menu_class', 10, 2 );

/**
 * Returns the service links shown in the Dịch vụ dropdown.
 *
 * @return array<int, array<string, string>>
 */
function vanphuccare_service_dropdown_items() {
	return array(
		array(
			'slug'   => 'khoa-hoc-truc-tuyen',
			'title'  => 'Khóa học trực tuyến',
			'url'    => 'https://edu.vanphuccare.vn',
			'target' => '_blank',
		),
		array(
			'slug'  => 'tu-van-nuoi-con',
			'title' => 'Tư vấn nuôi con',
			'url'   => home_url( '/dich-vu/dich-vu-tu-van-nuoi-con-easy-truc-tuyen/' ),
		),
		array(
			'slug'  => 'tam-be-sau-sinh',
			'title' => 'Tắm bé sau sinh',
			'url'   => home_url( '/dich-vu/tam-tre-so-sinh/' ),
		),
		array(
			'slug'  => 'thong-tac-tia-sua',
			'title' => 'Thông tắc tia sữa',
			'url'   => home_url( '/dich-vu/thong-tac-tia-sua/' ),
		),
	);
}

/**
 * Returns the active state for a service dropdown item.
 *
 * @param string $slug Dropdown service slug.
 * @return bool
 */
function vanphuccare_is_active_service_dropdown_item( $slug ) {
	if ( 'tu-van-nuoi-con' === $slug ) {
		return function_exists( 'vanphuccare_is_easy_page' ) && vanphuccare_is_easy_page();
	}

	if ( 'tam-be-sau-sinh' === $slug ) {
		return function_exists( 'vanphuccare_is_tam_be_page' ) && vanphuccare_is_tam_be_page();
	}

	if ( 'thong-tac-tia-sua' === $slug ) {
		return function_exists( 'vanphuccare_is_thong_tac_page' ) && vanphuccare_is_thong_tac_page();
	}

	return false;
}

/**
 * Builds the shared dropdown markup for the primary and mobile menus.
 *
 * @param string $dropdown_id Unique ID for the dropdown element.
 * @return string
 */
function vanphuccare_service_dropdown_markup( $dropdown_id ) {
	$items = vanphuccare_service_dropdown_items();
	$markup = '<div id="' . esc_attr( $dropdown_id ) . '" class="vpc-service-dropdown" hidden>';

	foreach ( $items as $item ) {
		$is_active = vanphuccare_is_active_service_dropdown_item( $item['slug'] );
		$classes   = 'vpc-service-dropdown-link' . ( $is_active ? ' is-active' : '' );
		$target    = ! empty( $item['target'] ) ? ' target="' . esc_attr( $item['target'] ) . '" rel="noopener noreferrer"' : '';
		$markup   .= sprintf(
			'<a class="%1$s" href="%2$s"%3$s%4$s><span>%5$s</span><svg class="vpc-service-dropdown-chevron" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="m9 6 6 6-6 6" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" /></svg></a>',
			esc_attr( $classes ),
			esc_url( $item['url'] ),
			$is_active ? ' aria-current="page"' : '',
			$target,
			esc_html( $item['title'] )
		);
	}

	$markup .= sprintf(
		'<a class="vpc-service-dropdown-link vpc-service-dropdown-link--all" href="%1$s"><span>%2$s</span><svg class="vpc-service-dropdown-chevron" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="m9 6 6 6-6 6" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" /></svg></a></div>',
		esc_url( home_url( '/dich-vu/' ) ),
		esc_html__( 'Xem tất cả dịch vụ', 'vanphuccare' )
	);

	return $markup;
}

/**
 * Checks whether a WordPress menu item is the Dịch vụ parent item.
 *
 * @param WP_Post $item Menu item.
 * @return bool
 */
function vanphuccare_is_service_menu_item( $item ) {
	$menu_title = isset( $item->title ) ? trim( wp_strip_all_tags( $item->title ) ) : '';
	$menu_url   = isset( $item->url ) ? (string) $item->url : '';

	if ( 'Dịch vụ' === $menu_title ) {
		return true;
	}

	$path = trim( (string) wp_parse_url( $menu_url, PHP_URL_PATH ), '/' );
	return 'dich-vu' === $path;
}

/**
 * Adds the separate chevron control and service dropdown to an assigned menu.
 * The text link remains a normal link to the service overview page.
 *
 * @param string  $item_output Menu item HTML.
 * @param WP_Post $item        Menu item.
 * @param int     $depth       Menu depth.
 * @param object  $args        wp_nav_menu arguments.
 * @return string
 */
function vanphuccare_service_menu_start_el( $item_output, $item, $depth, $args ) {
	$theme_location = isset( $args->theme_location ) ? (string) $args->theme_location : '';

	// Ensure the chevron toggle and dropdown are strictly applied ONLY to the primary header menu.
	if ( ! in_array( $theme_location, array( 'primary', '' ), true ) || 0 !== (int) $depth || ! vanphuccare_is_service_menu_item( $item ) ) {
		return $item_output;
	}

	$menu_class = isset( $args->menu_class ) ? (string) $args->menu_class : 'vpc-nav-menu';
	$is_mobile  = false !== strpos( $menu_class, 'vpc-mobile-nav' );
	$context    = $is_mobile ? 'mobile' : 'desktop';
	$item_id    = absint( $item->ID );
	$dropdown_id = 'vpc-service-dropdown-' . $context . '-' . ( $item_id ? $item_id : 'fallback' );
	$button_label = $is_mobile ? 'Mở danh sách dịch vụ' : 'Mở menu dịch vụ';
	$button = sprintf(
		'<button type="button" class="vpc-service-menu-toggle" aria-expanded="false" aria-controls="%1$s" aria-label="%2$s"><svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="m6 9 6 6 6-6" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" /></svg></button>',
		esc_attr( $dropdown_id ),
		esc_attr( $button_label )
	);

	$item_output = preg_replace(
		'/(<a\b[^>]*>.*?<\/a>)/s',
		'<div class="vpc-service-menu-control">$1' . $button . '</div>',
		$item_output,
		1
	);

	return $item_output . vanphuccare_service_dropdown_markup( $dropdown_id );
}
add_filter( 'walker_nav_menu_start_el', 'vanphuccare_service_menu_start_el', 10, 4 );

/**
 * Marks the Dịch vụ parent item active on every page in the service group.
 *
 * @param array    $classes Menu classes.
 * @param WP_Post  $item    Menu item.
 * @param stdClass $args    wp_nav_menu args.
 * @return array
 */
function vanphuccare_service_menu_group_class( $classes, $item, $args = null ) {
	$theme_location = ( isset( $args ) && is_object( $args ) && isset( $args->theme_location ) ) ? (string) $args->theme_location : '';
	if ( ! in_array( $theme_location, array( 'primary', '' ), true ) ) {
		return $classes;
	}

	if ( vanphuccare_is_service_group_page() && vanphuccare_is_service_menu_item( $item ) ) {
		$classes[] = 'current-menu-item';
	}

	if ( vanphuccare_is_service_menu_item( $item ) ) {
		$classes[] = 'vpc-service-menu-item';
	}

	return array_unique( $classes );
}
add_filter( 'nav_menu_css_class', 'vanphuccare_service_menu_group_class', 10, 3 );

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

	if ( vanphuccare_is_service_group_page() && 'Dịch vụ' === $menu_title ) {
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
	$is_prenatal = is_page( 'lop-hoc-tien-san' ) || is_page_template( 'page-lop-hoc-tien-san.php' );
	$is_about    = is_page_template( 'page-gioi-thieu.php' ) || is_page( 'gioi-thieu' );
	$is_o_cu     = vanphuccare_is_o_cu_page();
	$is_bao_mau  = vanphuccare_is_bao_mau_page();
	$is_service  = vanphuccare_is_service_group_page();
	$is_knowledge = vanphuccare_is_knowledge_group_page();
	$nav_active  = 'text-text-nav-active';
	$nav_default = 'text-text-nav-default hover:text-text-nav-hover';

	echo '<ul class="vpc-nav-menu">';
	printf( '<li class="%s"><a href="%s" class="%s">%s</a></li>', $is_home ? 'current-menu-item' : '', esc_url( home_url( '/' ) ), $is_home ? $nav_active : $nav_default, esc_html__( 'Trang chủ', 'vanphuccare' ) );
	printf( '<li class="%s"><a href="%s" class="%s">%s</a></li>', $is_about ? 'current-menu-item' : '', esc_url( home_url( '/gioi-thieu' ) ), $is_about ? $nav_active : $nav_default, esc_html__( 'Giới thiệu', 'vanphuccare' ) );
	printf( '<li class="%s"><a href="%s" class="%s">%s</a></li>', $is_o_cu ? 'current-menu-item' : '', esc_url( home_url( '/dich-vu/trung-tam-o-cu/' ) ), $is_o_cu ? $nav_active : $nav_default, esc_html__( 'Ở cữ', 'vanphuccare' ) );
	printf( '<li class="%s"><a href="%s" class="%s">%s</a></li>', $is_bao_mau ? 'current-menu-item' : '', esc_url( home_url( '/dich-vu/bao-mau-tai-nha/' ) ), $is_bao_mau ? $nav_active : $nav_default, esc_html__( 'Bảo mẫu', 'vanphuccare' ) );
	vanphuccare_primary_service_fallback_item( $is_service, 'desktop' );
	printf( '<li class="%s"><a href="%s" class="%s">%s</a></li>', $is_prenatal ? 'current-menu-item' : '', esc_url( home_url( '/dich-vu/lop-hoc-tien-san/' ) ), $is_prenatal ? $nav_active : $nav_default, esc_html__( 'Lớp học tiền sản', 'vanphuccare' ) );
	printf( '<li class="%s"><a href="%s" class="%s">%s</a></li>', $is_knowledge ? 'current-menu-item' : '', esc_url( home_url( '/kien-thuc/' ) ), $is_knowledge ? $nav_active : $nav_default, esc_html__( 'Kiến thức', 'vanphuccare' ) );
	echo '</ul>';
}

/**
 * Prints the Dịch vụ item for the primary-menu fallback.
 *
 * @param bool   $is_active Whether the service group is active.
 * @param string $context   Menu context used to keep element IDs unique.
 * @return void
 */
function vanphuccare_primary_service_fallback_item( $is_active, $context ) {
	$classes    = 'vpc-service-menu-item' . ( $is_active ? ' current-menu-item' : '' );
	$link_class = $is_active ? 'text-text-nav-active' : 'text-text-nav-default hover:text-text-nav-hover';
	$dropdown_id = 'vpc-service-dropdown-' . sanitize_html_class( $context ) . '-fallback';

	echo '<li class="' . esc_attr( $classes ) . '">';
	echo '<div class="vpc-service-menu-control">';
	printf(
		'<a href="%1$s" class="%2$s">%3$s</a>',
		esc_url( home_url( '/dich-vu/' ) ),
		esc_attr( $link_class ),
		esc_html__( 'Dịch vụ', 'vanphuccare' )
	);
	printf(
		'<button type="button" class="vpc-service-menu-toggle" aria-expanded="false" aria-controls="%1$s" aria-label="%2$s"><svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="m6 9 6 6 6-6" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" /></svg></button>',
		esc_attr( $dropdown_id ),
		esc_attr__( 'Mở menu dịch vụ', 'vanphuccare' )
	);
	echo '</div>' . vanphuccare_service_dropdown_markup( $dropdown_id ) . '</li>';
}

/**
 * Mobile counterpart to the primary navigation fallback.
 *
 * @return void
 */
function vanphuccare_mobile_menu_fallback() {
	$is_home     = is_front_page() || is_home();
	$is_prenatal = is_page( 'lop-hoc-tien-san' ) || is_page_template( 'page-lop-hoc-tien-san.php' );
	$is_about    = is_page_template( 'page-gioi-thieu.php' ) || is_page( 'gioi-thieu' );
	$is_o_cu     = vanphuccare_is_o_cu_page();
	$is_bao_mau  = vanphuccare_is_bao_mau_page();
	$is_service  = vanphuccare_is_service_group_page();
	$is_knowledge = vanphuccare_is_knowledge_group_page();
	$chevron     = '<svg class="w-4 h-4 text-neutral-400 shrink-0 stroke-current fill-none" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg>';

	$items = array(
		array( 'url' => home_url( '/' ), 'title' => 'Trang chủ', 'active' => $is_home ),
		array( 'url' => home_url( '/gioi-thieu' ), 'title' => 'Giới thiệu', 'active' => $is_about ),
		array( 'url' => home_url( '/dich-vu/trung-tam-o-cu/' ), 'title' => 'Ở cữ', 'active' => $is_o_cu ),
		array( 'url' => home_url( '/dich-vu/bao-mau-tai-nha/' ), 'title' => 'Bảo mẫu', 'active' => $is_bao_mau ),
		array( 'url' => home_url( '/dich-vu/' ), 'title' => 'Dịch vụ', 'active' => $is_service ),
		array( 'url' => home_url( '/dich-vu/lop-hoc-tien-san/' ), 'title' => 'Lớp học tiền sản', 'active' => $is_prenatal ),
		array( 'url' => home_url( '/kien-thuc/' ), 'title' => 'Kiến thức', 'active' => $is_knowledge ),
	);

	echo '<ul class="vpc-mobile-nav">';
	foreach ( $items as $item ) {
		if ( 'Dịch vụ' === $item['title'] ) {
			vanphuccare_primary_service_fallback_item( $item['active'], 'mobile' );
			continue;
		}

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

/**
 * Filters CSS classes for footer menu items to maintain identical Tailwind styling.
 *
 * @param array    $classes Array of the CSS classes that are applied to the menu item's `<li>` element.
 * @param WP_Post  $item    The current menu item.
 * @param stdClass $args    An object of wp_nav_menu() arguments.
 * @return array
 */
function vanphuccare_footer_nav_menu_css_class( $classes, $item, $args ) {
	$location = isset( $args->theme_location ) ? (string) $args->theme_location : '';

	if ( in_array( $location, array( 'footer_services', 'footer_knowledge', 'footer_news', 'footer' ), true ) ) {
		$classes[] = 'h-6';
		$classes[] = 'flex';
		$classes[] = 'items-center';

		if ( 'footer_news' === $location ) {
			$title = isset( $item->title ) ? trim( wp_strip_all_tags( $item->title ) ) : '';
			if ( 'Mẹ và bé' === $title ) {
				$classes[] = 'footer-news-mother-baby';
			}
		}
	} elseif ( 'footer_legal' === $location ) {
		$url   = isset( $item->url ) ? (string) $item->url : '';
		$title = isset( $item->title ) ? trim( wp_strip_all_tags( $item->title ) ) : '';

		if ( false !== strpos( $url, 'dieu-khoan' ) || false !== strpos( $title, 'Điều khoản' ) ) {
			$classes[] = 'vpc-footer-legal-terms';
			$classes[] = 'order-1';
			$classes[] = 'xl:order-none';
		} elseif ( false !== strpos( $url, 'chinh-sach' ) || false !== strpos( $title, 'Chính sách' ) || false !== strpos( $title, 'Bảo mật' ) ) {
			$classes[] = 'vpc-footer-legal-privacy';
			$classes[] = 'order-2';
			$classes[] = 'xl:order-none';
		} elseif ( false !== strpos( $url, 'tuyen-dung' ) || false !== strpos( $title, 'Tuyển dụng' ) ) {
			$classes[] = 'vpc-footer-legal-careers';
			$classes[] = 'order-3';
			$classes[] = 'xl:order-none';
		} elseif ( false !== strpos( $url, 'lien-he' ) || false !== strpos( $title, 'Liên hệ' ) ) {
			$classes[] = 'vpc-footer-legal-contact';
			$classes[] = 'order-4';
			$classes[] = 'xl:order-none';
		}
	}

	return array_unique( $classes );
}
add_filter( 'nav_menu_css_class', 'vanphuccare_footer_nav_menu_css_class', 10, 3 );

/**
 * Adds hover and transition classes to links in footer menus.
 *
 * @param array    $atts Link attributes.
 * @param WP_Post  $item Menu item.
 * @param stdClass $args wp_nav_menu arguments.
 * @return array
 */
function vanphuccare_footer_nav_menu_link_attributes( $atts, $item, $args ) {
	$location = isset( $args->theme_location ) ? (string) $args->theme_location : '';

	if ( in_array( $location, array( 'footer_services', 'footer_knowledge', 'footer_news', 'footer', 'footer_legal' ), true ) ) {
		$existing_class = isset( $atts['class'] ) ? trim( $atts['class'] ) : '';
		$atts['class']   = $existing_class ? $existing_class . ' hover:text-text-body-muted transition-colors' : 'hover:text-text-body-muted transition-colors';
	}

	return $atts;
}
add_filter( 'nav_menu_link_attributes', 'vanphuccare_footer_nav_menu_link_attributes', 10, 3 );

/**
 * Normalizes title for footer news items to support Figma desktop/mobile label switching.
 *
 * @param string   $title The menu item's title.
 * @param WP_Post  $item  The current menu item.
 * @param stdClass $args  An object of wp_nav_menu() arguments.
 * @return string
 */
function vanphuccare_footer_news_menu_title( $title, $item, $args ) {
	if ( isset( $args->theme_location ) && 'footer_news' === $args->theme_location ) {
		$clean_title = trim( wp_strip_all_tags( $title ) );
		if ( 'Tin tức & sự kiện' === $clean_title || 'Tin mới & sự kiện nổi bật' === $clean_title ) {
			return '<span class="footer-news-label-desktop">Tin tức & sự kiện</span><span class="footer-news-label-mobile">Tin mới & sự kiện nổi bật</span>';
		}
	}
	return $title;
}
add_filter( 'nav_menu_item_title', 'vanphuccare_footer_news_menu_title', 10, 3 );

