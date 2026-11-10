<?php
/**
 * Helpers for the Ở cữ page.
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Whether the current request is the Ở cữ landing page.
 *
 * @return bool
 */
function vanphuccare_is_o_cu_page() {
	return is_page( 'trung-tam-o-cu' ) || is_page_template( 'page-trung-tam-o-cu.php' );
}
