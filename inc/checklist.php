<?php
/**
 * Preparation checklist for Knowledge articles.
 *
 * @package VanPhucCare
 */

defined( 'ABSPATH' ) || exit;

function vanphuccare_register_checklist() {
	$file = '/assets/js/checklist-editor.js';
	wp_register_script( 'vanphuccare-checklist-editor', get_template_directory_uri() . $file,
		array( 'wp-blocks', 'wp-block-editor', 'wp-element', 'wp-components' ),
		vanphuccare_get_asset_version( get_template_directory() . $file ), true
	);
	register_block_type( 'vanphuccare/checklist', array(
		'api_version' => 3,
		'title' => 'Checklist chuẩn bị',
		'category' => 'widgets',
		'attributes' => array(
			'title' => array( 'type' => 'string', 'default' => 'Danh sách chuẩn bị' ),
			'items' => array( 'type' => 'array', 'default' => array() ),
		),
		'editor_script' => 'vanphuccare-checklist-editor',
		'render_callback' => 'vanphuccare_render_checklist',
	) );
}
add_action( 'init', 'vanphuccare_register_checklist' );

function vanphuccare_render_checklist( $attributes ) {
	$rows = '';
	foreach ( $attributes['items'] ?? array() as $item ) {
		$name = trim( (string) ( $item['name'] ?? '' ) );
		if ( '' === $name ) {
			continue;
		}
		$quantity = trim( (string) ( $item['quantity'] ?? '' ) );
		$rows .= '<li><span class="vpc-kit__name">' . esc_html( $name ) . '</span>';
		if ( '' !== $quantity ) {
			$rows .= '<span class="vpc-kit__qty">× ' . esc_html( $quantity ) . '</span>';
		}
		$rows .= '</li>';
	}
	if ( '' === $rows ) {
		return '';
	}
	return '<section class="vpc-checklist"><div class="vpc-kit__header"><p class="vpc-pattern-title">' .
		esc_html( $attributes['title'] ?? 'Danh sách chuẩn bị' ) . '</p></div><ul class="vpc-kit__items">' . $rows . '</ul></section>';
}
