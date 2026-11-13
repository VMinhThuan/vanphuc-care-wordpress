<?php
/**
 * Single post template.
 *
 * @package VanPhucCare
 */

get_header();

if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();
		if ( in_category( 'tuyen-dung' ) || 'tin-tuyen-dung' === get_post_field( 'post_name', get_the_ID() ) ) {
			get_template_part( 'template-parts/recruitment/detail' );
		} else {
			get_template_part( 'template-parts/content/content', get_post_type() );
		}
	}
}

get_footer();
