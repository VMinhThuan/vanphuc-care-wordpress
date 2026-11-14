<?php
/**
 * Download cards shared by the Knowledge editor and article renderer.
 *
 * @package VanPhucCare
 */

defined( 'ABSPATH' ) || exit;

function vanphuccare_get_download_data( $id ) {
	$attachment = get_post( absint( $id ) );
	if ( ! $id || ! $attachment || 'attachment' !== $attachment->post_type || ! in_array( $attachment->post_status, array( 'inherit', 'publish' ), true ) ) {
		return null;
	}
	$url = esc_url_raw( wp_get_attachment_url( $attachment->ID ), array( 'http', 'https' ) );
	if ( ! $url ) {
		return null;
	}
	$name = wp_basename( rawurldecode( (string) wp_parse_url( $url, PHP_URL_PATH ) ) );
	$extension = strtoupper( pathinfo( $name, PATHINFO_EXTENSION ) );
	$metadata = wp_get_attachment_metadata( $attachment->ID );
	$bytes = isset( $metadata['filesize'] ) ? absint( $metadata['filesize'] ) : 0;
	if ( ! $bytes ) {
		// Older documents may lack size metadata. Never request a remote URL for size.
		$path = get_attached_file( $attachment->ID );
		if ( $path && ! wp_is_stream( $path ) && is_file( $path ) ) {
			$bytes = wp_filesize( $path );
		}
	}
	return array(
		'url'       => $url,
		'name'      => $name ?: get_the_title( $attachment ),
		'extension' => $extension ?: 'FILE',
		'size'      => $bytes > 0 ? size_format( $bytes, 1 ) : '',
	);
}

function vanphuccare_render_download( $attributes ) {
	$data = vanphuccare_get_download_data( $attributes['attachmentId'] ?? 0 );
	if ( ! $data ) {
		return '';
	}
	$name = trim( (string) ( $attributes['label'] ?? '' ) ) ?: $data['name'];
	$meta = $data['extension'] . ( $data['size'] ? ' · ' . $data['size'] : '' );
	return '<div class="vpc-file-card"><span class="vpc-file-card__badge" aria-hidden="true">' . esc_html( $data['extension'] ) . '</span>' .
		'<span class="vpc-file-card__copy"><span class="vpc-file-card__name">' . esc_html( $name ) . '</span>' .
		'<span class="vpc-file-card__meta">' . esc_html( $meta ) . '</span></span>' .
		'<a class="vpc-file-card__button" href="' . esc_url( $data['url'] ) . '" download aria-label="' . esc_attr( 'Tải về: ' . $name ) . '">' .
		'<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M12 3v12m-5-5 5 5 5-5M5 17v4h14v-4"/></svg>Tải về</a></div>';
}

function vanphuccare_register_download() {
	$file = '/assets/js/download-editor.js';
	wp_register_script( 'vanphuccare-download-editor', get_template_directory_uri() . $file,
		array( 'wp-blocks', 'wp-block-editor', 'wp-element', 'wp-components', 'wp-api-fetch' ),
		vanphuccare_get_asset_version( get_template_directory() . $file ), true
	);
	register_block_type( 'vanphuccare/download', array(
		'api_version' => 3,
		'title' => 'Tệp tải xuống',
		'category' => 'widgets',
		'attributes' => array(
			'attachmentId' => array( 'type' => 'integer', 'default' => 0 ),
			'label' => array( 'type' => 'string', 'default' => '' ),
		),
		'supports' => array( 'html' => false, 'customClassName' => false ),
		'editor_script' => 'vanphuccare-download-editor',
		'render_callback' => 'vanphuccare_render_download',
	) );
}
add_action( 'init', 'vanphuccare_register_download' );

function vanphuccare_register_download_media_field() {
	// Reuse the Media endpoint's read permission checks, including shared media.
	register_rest_field( 'attachment', 'vpc_download', array(
		'get_callback' => function ( $attachment ) {
			return vanphuccare_get_download_data( $attachment['id'] );
		},
		'schema' => array( 'type' => array( 'object', 'null' ), 'context' => array( 'view', 'edit' ), 'readonly' => true ),
	) );
}
add_action( 'rest_api_init', 'vanphuccare_register_download_media_field' );

function vanphuccare_render_legacy_download( $content, $block ) {
	if ( ! is_singular( 'post' ) || ! vanphuccare_is_knowledge_post( get_queried_object_id() ) ) {
		return $content;
	}
	$classes = preg_split( '/\s+/', $block['attrs']['className'] ?? '' );
	$children = $block['innerBlocks'] ?? array();
	if ( ! in_array( 'vpc-download', $classes, true ) || 1 !== count( $children ) || 'core/file' !== $children[0]['blockName'] ) {
		return $content;
	}
	$file = $children[0];
	if ( empty( $file['attrs']['id'] ) || false === ( $file['attrs']['showDownloadButton'] ?? true ) || ! class_exists( 'WP_HTML_Tag_Processor' ) ) {
		return $content;
	}
	$data = vanphuccare_get_download_data( $file['attrs']['id'] );
	$links = new WP_HTML_Tag_Processor( $file['innerHTML'] ?? '' );
	if ( ! $data || ! $links->next_tag( 'a' ) || $links->get_attribute( 'href' ) !== $data['url'] ) {
		return $content;
	}
	// Preserve the name entered in the old File block, without changing stored content.
	$label = '';
	if ( preg_match( '/<a\b[^>]*>(.*?)<\/a>/is', $file['innerHTML'] ?? '', $match ) ) {
		$label = html_entity_decode( wp_strip_all_tags( $match[1] ), ENT_QUOTES, 'UTF-8' );
	}
	return vanphuccare_render_download( array( 'attachmentId' => $file['attrs']['id'], 'label' => $label ) ) ?: $content;
}
add_filter( 'render_block_core/group', 'vanphuccare_render_legacy_download', 10, 2 );
