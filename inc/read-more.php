<?php
/**
 * Inline article recommendations for the Knowledge editor.
 *
 * @package VanPhucCare
 */

defined( 'ABSPATH' ) || exit;

function vanphuccare_render_read_more( $attributes ) {
	$target = get_post( absint( $attributes['postId'] ?? 0 ) );
	if ( empty( $attributes['postId'] ) || ! $target || 'post' !== $target->post_type || 'publish' !== $target->post_status || '' !== $target->post_password ) {
		return '';
	}

	$image = get_the_post_thumbnail( $target, 'medium', array( 'alt' => '', 'loading' => 'lazy' ) );
	return sprintf(
		'<a class="vpc-related-link" href="%1$s"><span class="vpc-related-link__thumb">%2$s</span><span class="vpc-related-link__copy"><span class="vpc-related-link__label">%3$s</span><span>%4$s</span></span><span class="vpc-related-link__arrow" aria-hidden="true">→</span></a>',
		esc_url( get_permalink( $target ) ),
		$image,
		esc_html__( 'Đọc thêm', 'vanphuccare' ),
		esc_html( get_the_title( $target ) )
	);
}

function vanphuccare_register_read_more() {
	$file = '/assets/js/read-more-editor.js';
	wp_register_script( 'vanphuccare-read-more-editor', get_template_directory_uri() . $file,
		array( 'wp-blocks', 'wp-block-editor', 'wp-components', 'wp-core-data', 'wp-data', 'wp-element', 'wp-html-entities' ),
		vanphuccare_get_asset_version( get_template_directory() . $file ), true
	);
	register_block_type( 'vanphuccare/read-more', array(
		'api_version'     => 3,
		'title'           => __( 'Đọc thêm', 'vanphuccare' ),
		'category'        => 'widgets',
		'attributes'      => array( 'postId' => array( 'type' => 'integer', 'default' => 0 ) ),
		'editor_script'   => 'vanphuccare-read-more-editor',
		'render_callback' => 'vanphuccare_render_read_more',
	) );
}
add_action( 'init', 'vanphuccare_register_read_more' );

// Upgrade a previously inserted text pattern at render time only when its sole
// link resolves to a published post. Preserve external links and custom content.
function vanphuccare_render_legacy_read_more( $content, $block ) {
	$classes = explode( ' ', $block['attrs']['className'] ?? '' );
	if ( ! in_array( 'vpc-read-more', $classes, true ) || ! class_exists( 'WP_HTML_Tag_Processor' ) ) {
		return $content;
	}
	$children = $block['innerBlocks'] ?? array();
	if ( 2 !== count( $children ) || 'core/paragraph' !== $children[1]['blockName'] || 'Đọc thêm' !== trim( wp_strip_all_tags( $children[0]['innerHTML'] ) ) ) {
		return $content;
	}
	$links = new WP_HTML_Tag_Processor( $children[1]['innerHTML'] );
	if ( ! $links->next_tag( 'a' ) ) {
		return $content;
	}
	$url = $links->get_attribute( 'href' );
	if ( ! is_string( $url ) || $links->next_tag( 'a' ) ) {
		return $content;
	}
	$id = url_to_postid( $url );
	return $id ? ( vanphuccare_render_read_more( array( 'postId' => $id ) ) ?: $content ) : $content;
}
add_filter( 'render_block_core/group', 'vanphuccare_render_legacy_read_more', 10, 2 );
