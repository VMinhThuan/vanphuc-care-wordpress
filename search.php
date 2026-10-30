<?php
/**
 * Search results template.
 *
 * @package VanPhucCare
 */

get_header();
?>
<header class="page-header">
	<h1 class="page-title">
		<?php
		printf(
			/* translators: %s: search query. */
			esc_html__( 'Search results for: %s', 'vanphuccare' ),
			esc_html( get_search_query() )
		);
		?>
	</h1>
</header>
<?php
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content/content', get_post_type() );
	}
	the_posts_navigation();
	} else {
		get_template_part( 'template-parts/content/content', 'none' );
}

get_footer();
