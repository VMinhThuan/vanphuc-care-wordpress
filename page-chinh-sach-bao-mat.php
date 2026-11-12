<?php
/**
 * Template Name: Chính sách bảo mật
 * Template Post Type: page
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_template_part( 'template-parts/policy-page', null, array( 'policy_key' => 'privacy' ) );
