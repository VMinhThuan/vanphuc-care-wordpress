<?php
/**
 * Template Name: Chi tiết tin tuyển dụng
 * Template Post Type: page
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/recruitment/detail' );
	}
}

get_footer();
