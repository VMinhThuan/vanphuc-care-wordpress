<?php
/**
 * Legacy compatibility wrapper for News & Events archive.
 *
 * Directs to template-parts/news/archive-listing.php.
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require get_template_directory() . '/template-parts/news/archive-listing.php';
