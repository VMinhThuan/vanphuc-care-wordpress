<?php
/**
 * 404 template.
 *
 * @package VanPhucCare
 */

get_header();
?>
<section class="error-404 not-found">
	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e( 'Page not found', 'vanphuccare' ); ?></h1>
	</header>
	<div class="page-content">
		<p><?php esc_html_e( 'The page you requested could not be found.', 'vanphuccare' ); ?></p>
		<?php get_search_form(); ?>
	</div>
</section>
<?php
get_footer();
