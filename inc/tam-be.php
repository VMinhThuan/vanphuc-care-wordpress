<?php
/**
 * Helpers for the Tắm bé sơ sinh page.
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Whether the current request is the Tắm bé sơ sinh landing page.
 *
 * @return bool
 */
function vanphuccare_is_tam_be_page() {
	return is_page( 'tam-tre-so-sinh' ) || is_page_template( 'page-tam-tre-so-sinh.php' );
}
