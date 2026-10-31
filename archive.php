<?php
/**
 * Archive template.
 *
 * @package VanPhucCare
 */

get_header();
?>
<main id="primary" class="site-main min-h-[60vh] py-10">
	<header class="page-header mb-8">
		<?php the_archive_title( '<h1 class="page-title text-3xl md:text-4xl font-bold font-heading text-neutral-900 mb-3">', '</h1>' ); ?>
		<?php the_archive_description( '<div class="archive-description text-base text-text-body-muted max-w-2xl">', '</div>' ); ?>
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
