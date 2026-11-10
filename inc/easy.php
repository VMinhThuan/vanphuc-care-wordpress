<?php
/**
 * Helpers for the Tư vấn nuôi con EASY page.
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Whether the current request is the EASY consultation landing page.
 *
 * @return bool
 */
function vanphuccare_is_easy_page() {
	return is_page( 'dich-vu-tu-van-nuoi-con-easy-truc-tuyen' ) || is_page_template( 'page-dich-vu-tu-van-nuoi-con-easy-truc-tuyen.php' );
}
