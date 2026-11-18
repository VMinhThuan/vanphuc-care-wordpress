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
	'chinh-sach-bien-tap'                         => 'editorial',
	'chinh-sach-bien-tap-va-chinh-sua'            => 'editorial',
	'quy-trinh-khieu-nai'                         => 'complaints',
	'quy-trinh-tiep-nhan-va-giai-quyet-khieu-nai' => 'complaints',
	'chinh-sach-hoan-tien-va-huy-dich-vu'         => 'refund',
	'chinh-sach-thanh-toan'                       => 'payment',
);
$current_page_id   = is_page() ? get_queried_object_id() : 0;
$current_page_slug = $current_page_id ? get_post_field( 'post_name', $current_page_id ) : '';
$policy_group_meta = $current_page_id ? get_post_meta( $current_page_id, 'vpc_policy_group', true ) : '';

if ( 'tin-tuyen-dung' === $current_page_slug ) {
	include get_template_directory() . '/page-tin-tuyen-dung.php';
	return;
}

if ( isset( $policy_page_keys[ $current_page_slug ] ) || ! empty( $policy_group_meta ) ) {
	get_template_part(
		'template-parts/policy-page',
		null,
		array( 'policy_key' => isset( $policy_page_keys[ $current_page_slug ] ) ? $policy_page_keys[ $current_page_slug ] : $current_page_slug )
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
