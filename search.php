<?php
/**
 * Search results template.
 *
 * @package VanPhucCare
 */

get_header();
?>
<main id="primary" class="site-main min-h-[60vh] py-10">
	<header class="page-header mb-8">
		<h1 class="page-title text-3xl md:text-4xl font-bold font-heading text-neutral-900 mb-3">
			<?php
			$search_cat_id       = (int) get_query_var( 'cat' );
			$kt_cat              = get_category_by_slug( 'kien-thuc' );
			$is_knowledge_search = ( $kt_cat instanceof WP_Term && $search_cat_id === (int) $kt_cat->term_id );

			if ( $is_knowledge_search ) {
				printf(
					/* translators: %s: search query. */
					esc_html__( 'Kết quả tìm kiếm kiến thức cho: "%s"', 'vanphuccare' ),
					esc_html( get_search_query() )
				);
			} else {
				printf(
					/* translators: %s: search query. */
					esc_html__( 'Kết quả tìm kiếm cho: "%s"', 'vanphuccare' ),
					esc_html( get_search_query() )
				);
			}
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
	?>
</main>
<?php
get_footer();
