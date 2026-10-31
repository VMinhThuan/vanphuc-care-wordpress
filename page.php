<?php
/**
 * Page template.
 *
 * @package VanPhucCare
 */

get_header();
?>
<main id="primary" class="site-main min-h-[60vh] py-10">
	<?php
	if ( have_posts() ) {
		while ( have_posts() ) {
			the_post();
			get_template_part( 'template-parts/content/content', get_post_type() );
		}
	}
	?>
</main>
<?php
get_footer();
