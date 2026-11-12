<?php
/**
 * Template Name: Điều khoản sử dụng
 * Template Post Type: page
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_template_part( 'template-parts/policy-page', null, array( 'policy_key' => 'terms' ) );
