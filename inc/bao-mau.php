<?php
/**
 * Helpers for the Bảo mẫu tại nhà page.
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Whether the current request is the Bảo mẫu tại nhà landing page.
 *
 * @return bool
 */
function vanphuccare_is_bao_mau_page() {
	return is_page( 'bao-mau-tai-nha' ) || is_page_template( 'page-bao-mau-tai-nha.php' );
}
