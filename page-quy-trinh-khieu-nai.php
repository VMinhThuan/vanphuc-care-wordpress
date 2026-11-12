<?php
/**
 * Template Name: Quy trình tiếp nhận & giải quyết khiếu nại
 * Template Post Type: page
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_template_part( 'template-parts/policy-page', null, array( 'policy_key' => 'complaints' ) );
