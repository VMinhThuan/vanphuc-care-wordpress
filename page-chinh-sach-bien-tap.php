<?php
/**
 * Template Name: Chính sách biên tập & chỉnh sửa
 * Template Post Type: page
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_template_part( 'template-parts/policy-page', null, array( 'policy_key' => 'editorial' ) );
