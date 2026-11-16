<?php
/**
 * Single post routing:
 * - Recruitment posts ('tuyen-dung') -> template-parts/recruitment/detail
 * - All other standard editorial posts -> template-parts/knowledge/single (Unified Editorial Single)
 *
 * @package VanPhucCare
 */

get_header();

if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();
		$post_id = get_the_ID();

		if ( ( function_exists( 'vpc_is_recruitment_post' ) && vpc_is_recruitment_post( $post_id ) ) || in_category( 'tuyen-dung' ) || 'tin-tuyen-dung' === get_post_field( 'post_name', $post_id ) ) {
			get_template_part( 'template-parts/recruitment/detail' );
		} elseif ( is_singular( 'post' ) ) {
			$primary_cat      = function_exists( 'vanphuccare_get_primary_category' ) ? vanphuccare_get_primary_category( $post_id ) : null;
			$is_news_cat      = function_exists( 'vpc_is_news_category' ) && vpc_is_news_category( $primary_cat );
			$is_knowledge_cat = function_exists( 'vpc_is_knowledge_category' ) && vpc_is_knowledge_category( $primary_cat );

			if ( $is_news_cat ) {
				$section = 'news';
			} elseif ( $is_knowledge_cat ) {
				$section = 'knowledge';
			} elseif ( function_exists( 'vpc_is_news_post' ) && vpc_is_news_post( $post_id ) ) {
				$section = 'news';
			} else {
				$section = 'knowledge';
			}

			get_template_part( 'template-parts/knowledge/single', null, array( 'section' => $section ) );
		} else {
			get_template_part( 'template-parts/content/content', get_post_type() );
		}
	}
}

get_footer();
