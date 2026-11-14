<?php
/** Reference sources for Knowledge articles. @package VanPhucCare */
defined( 'ABSPATH' ) || exit;

function vanphuccare_register_references() {
	$file = '/assets/js/references-editor.js';
	wp_register_script( 'vanphuccare-references-editor', get_template_directory_uri() . $file,
		array( 'wp-blocks', 'wp-block-editor', 'wp-element', 'wp-components' ),
		vanphuccare_get_asset_version( get_template_directory() . $file ), true
	);
	register_block_type( 'vanphuccare/references', array(
		'api_version' => 3, 'title' => 'Tài liệu tham khảo', 'category' => 'widgets',
		'attributes' => array(
			'title' => array( 'type' => 'string', 'default' => 'Tài liệu tham khảo' ),
			'sources' => array( 'type' => 'array', 'default' => array() ),
		),
		'supports' => array( 'html' => false, 'customClassName' => false ),
		'editor_script' => 'vanphuccare-references-editor',
		'render_callback' => 'vanphuccare_render_references',
	) );
}
add_action( 'init', 'vanphuccare_register_references' );

function vanphuccare_render_references( $attributes ) {
	$rows = '';
	$index = 0;
	foreach ( is_array( $attributes['sources'] ?? null ) ? $attributes['sources'] : array() as $source ) {
		if ( ! is_array( $source ) || ! is_string( $source['text'] ?? null ) || '' === trim( $source['text'] ) ) {
			continue;
		}
		$url = is_string( $source['url'] ?? null ) ? trim( $source['url'] ) : '';
		$url = preg_match( '~^https?://~i', $url ) && wp_parse_url( $url, PHP_URL_HOST ) ? esc_url( $url, array( 'http', 'https' ) ) : '';
		$index++;
		$row = '<span class="vpc-references__number">[' . $index . ']</span><span class="vpc-references__text">' . esc_html( $source['text'] ) . '</span>';
		if ( $url ) {
			$row .= '<span class="vpc-references__external" aria-hidden="true"></span>';
			$row = '<a class="vpc-references__row" href="' . $url . '" target="_blank" rel="noopener noreferrer" aria-label="' . esc_attr( $source['text'] . ' (mở trong tab mới)' ) . '">' . $row . '</a>';
		} else {
			$row = '<span class="vpc-references__row">' . $row . '</span>';
		}
		$rows .= '<li>' . $row . '</li>';
	}
	if ( ! $rows ) {
		return '';
	}
	$title = is_string( $attributes['title'] ?? null ) ? $attributes['title'] : 'Tài liệu tham khảo';
	return '<section class="vpc-references"><h2>' . esc_html( $title ) . '</h2><ol class="vpc-references__list" role="list">' . $rows . '</ol></section>';
}
