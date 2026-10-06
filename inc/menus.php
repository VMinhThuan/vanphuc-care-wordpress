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
