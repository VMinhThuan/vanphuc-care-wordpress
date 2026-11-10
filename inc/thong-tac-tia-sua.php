<?php
/**
 * Helpers for the Thông tắc tia sữa page.
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Whether the current request is the Thông tắc tia sữa landing page.
 *
 * @return bool
 */
function vanphuccare_is_thong_tac_page() {
	return is_page( 'thong-tac-tia-sua' ) || is_page_template( 'page-thong-tac-tia-sua.php' );
}
