<?php
/**
 * Empty query state.
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="no-results not-found">
	<h2><?php esc_html_e( 'Không tìm thấy nội dung phù hợp', 'vanphuccare' ); ?></h2>
	<p><?php esc_html_e( 'Hãy thử tìm kiếm với từ khóa khác.', 'vanphuccare' ); ?></p>
	<?php get_search_form(); ?>
</section>
