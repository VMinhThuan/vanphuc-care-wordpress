<?php
/** Production asset manifest; raw theme files remain a complete fallback. */
defined( 'ABSPATH' ) || exit;

function vanphuccare_asset_manifest() {
	static $assets = null;
	if ( null !== $assets ) {
		return $assets;
	}
	$assets = array();
	$file = get_template_directory() . '/assets/asset-manifest.json';
	if ( is_file( $file ) ) {
		$data = json_decode( (string) @file_get_contents( $file ), true );
		if ( is_array( $data ) && 1 === ( $data['schema'] ?? null ) && is_array( $data['assets'] ?? null ) ) {
			$assets = $data['assets'];
		}
	}
	return $assets;
}

function vanphuccare_built_asset( $key ) {
	if ( ( defined( 'WP_DEBUG' ) && WP_DEBUG ) || ! apply_filters( 'vanphuccare_use_optimized_assets', true ) ) {
		return null;
	}
	$entry = vanphuccare_asset_manifest()[ $key ] ?? null;
	if ( ! is_array( $entry ) || ! is_string( $entry['file'] ?? null ) || ! is_string( $entry['version'] ?? null )
		|| ! preg_match( '~^assets/(css|js)/[a-zA-Z0-9_-]+(?:\.built)?\.(css|js)$~', $entry['file'] )
		|| ! preg_match( '/^[a-f0-9]{16}$/', $entry['version'] )
		|| ! is_file( get_template_directory() . '/' . $entry['file'] ) ) {
		return null;
	}
	return $entry;
}

function vanphuccare_has_optimized_assets() {
	foreach ( array( 'site-core', 'page-prenatal', 'page-contact', 'page-policy', 'knowledge-components', 'news-shell', 'site-overrides' ) as $name ) {
		if ( ! vanphuccare_built_asset( 'assets/css/' . $name . '.css' ) ) {
			return false;
		}
	}
	return true;
}

/** Conservative content check: retain CSS for dynamic/legacy/reusable content. */
function vanphuccare_content_uses_article_patterns( $content, $seen = array() ) {
	if ( preg_match( '~(?:vpc-|vanphuccare/|is-style-vpc|yoast/faq-block|schema-faq-section|<!--\s*wp:lazyblock/|\[[a-zA-Z][^\]]*\])~', $content ) ) {
		return true;
	}
	if ( ! str_contains( $content, 'wp:block' ) ) {
		return false;
	}
	// Resolve reusable blocks recursively. Unknown or cyclic references keep styles.
	if ( count( $seen ) >= 10 || ! preg_match_all( '~<!--\s*wp:block\s+(\{.*?\})\s*/?-->~s', $content, $matches ) ) {
		return true;
	}
	foreach ( $matches[1] as $json ) {
		$attrs = json_decode( $json, true );
		$id = absint( $attrs['ref'] ?? 0 );
		if ( ! $id || in_array( $id, $seen, true ) ) {
			return true;
		}
		$block = get_post( $id );
		if ( ! $block || vanphuccare_content_uses_article_patterns( (string) $block->post_content, array_merge( $seen, array( $id ) ) ) ) {
			return true;
		}
	}
	return false;
}
