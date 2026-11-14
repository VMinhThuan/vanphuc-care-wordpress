<?php
/**
 * Theme bootstrap file.
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// 0. Auto-load release version early so VANPHUCCARE_VERSION is available from init hook.
$version_file = get_template_directory() . '/version.php';
if ( file_exists( $version_file ) ) {
	require_once $version_file;
}

require_once get_template_directory() . '/inc/setup.php';
require_once get_template_directory() . '/inc/helpers.php';
require_once get_template_directory() . '/inc/content-types.php';
require_once get_template_directory() . '/inc/enqueue.php';
require_once get_template_directory() . '/inc/menus.php';
require_once get_template_directory() . '/inc/ajax.php';

require_once get_template_directory() . '/inc/read-more.php';
require_once get_template_directory() . '/inc/checklist.php';
require_once get_template_directory() . '/inc/download.php';
require_once get_template_directory() . '/inc/references.php';
