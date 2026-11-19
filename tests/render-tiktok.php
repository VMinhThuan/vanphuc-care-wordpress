<?php
/** Execute the real filter with minimal WordPress adapters; JSON on stdin. */
define( 'ABSPATH', dirname( __DIR__ ) );
function add_action( ...$args ) {}
function add_filter( ...$args ) {}
function is_admin() { return ! empty( $GLOBALS['fixture']['admin'] ); }
function esc_attr( $s ) { return htmlspecialchars( $s, ENT_QUOTES, 'UTF-8' ); }
function esc_url( $s ) { return htmlspecialchars( $s, ENT_QUOTES, 'UTF-8' ); }
require dirname( __DIR__ ) . '/inc/helpers.php';
$fixture = json_decode( stream_get_contents( STDIN ), true );
echo vpc_transform_tiktok_embeds( $fixture['content'] );
