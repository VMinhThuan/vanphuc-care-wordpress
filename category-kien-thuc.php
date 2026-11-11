<?php
/**
 * Category template for "Kiến thức" (Knowledge Hub).
 *
 * Mapped to /kien-thuc/ category archive via WordPress Template Hierarchy.
 *
 * Smart View Switcher:
 * - Default root request (/kien-thuc/): Renders Figma 1 (Knowledge Hub overview showcase).
 * - When /kien-thuc/tat-ca/ (vpc_is_all): Renders Figma 2 (Sub-Category listing with 2-column + sidebar + pagination for all posts).
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$is_all_clean = ! empty( get_query_var( 'vpc_is_all' ) );

if ( $is_all_clean ) {
	require get_template_directory() . '/category.php';
} else {
	require get_template_directory() . '/page-kien-thuc.php';
}
