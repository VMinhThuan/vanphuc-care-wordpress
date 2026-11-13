<?php
/**
 * Page template.
 *
 * @package VanPhucCare
 */

/*
 * Keep policy pages connected to their WordPress Page records even when an
 * administrator has not selected one of the dedicated page templates.
 */
$policy_page_keys = array(
	'dieu-khoan-su-dung'                          => 'terms',
	'chinh-sach-bao-mat'                          => 'privacy',
	'chinh-sach-bien-tap-va-chinh-sua'            => 'editorial',
	'quy-trinh-tiep-nhan-va-giai-quyet-khieu-nai' => 'complaints',
);
$current_page_slug = is_page() ? get_post_field( 'post_name', get_queried_object_id() ) : '';

if ( 'tin-tuyen-dung' === $current_page_slug ) {
	include get_template_directory() . '/page-tin-tuyen-dung.php';
	return;
}

if ( isset( $policy_page_keys[ $current_page_slug ] ) ) {
	get_template_part(
		'template-parts/policy-page',
		null,
		array( 'policy_key' => $policy_page_keys[ $current_page_slug ] )
	);
	return;
}

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
