<?php
/**
 * 404 template.
 *
 * @package VanPhucCare
 */

get_header();
?>
<main id="primary" class="site-main min-h-[60vh] py-10">
	<section class="error-404 not-found text-center max-w-xl mx-auto px-4 py-16">
		<header class="page-header mb-6">
			<h1 class="page-title text-4xl font-bold font-heading text-neutral-900"><?php esc_html_e( 'Page not found', 'vanphuccare' ); ?></h1>
		</header>
		<div class="page-content space-y-6">
			<p class="text-text-body-muted text-base"><?php esc_html_e( 'The page you requested could not be found.', 'vanphuccare' ); ?></p>
			<?php get_search_form(); ?>
		</div>
	</section>
</main>
<?php
get_footer();
