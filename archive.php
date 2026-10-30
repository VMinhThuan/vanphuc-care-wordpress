<?php
/**
 * Archive template.
 *
 * @package VanPhucCare
 */

get_header();
?>
<header class="page-header">
	<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
	<?php the_archive_description( '<div class="archive-description">', '</div>' ); ?>
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
