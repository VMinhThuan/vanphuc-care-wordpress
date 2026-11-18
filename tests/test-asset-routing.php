<?php
/** Isolated WordPress enqueue contract harness; no database or network access. */
define( 'ABSPATH', dirname( __DIR__ ) );
$scenario = $argv[1] ?? 'home';
$wp_version = 'old-wp' === $scenario ? '6.2' : '6.8';
define( 'WP_DEBUG', 'debug' === $scenario );
$styles = array();
$scripts = array();
$fake_root = getenv( 'VPC_ASSET_FIXTURE' );
function get_template_directory() { return $GLOBALS['fake_root'] ?: dirname( __DIR__ ); }
function get_template_directory_uri() { return 'https://example.test/theme'; }
function add_action( ...$args ) {}
function add_filter( ...$args ) {}
function apply_filters( $name, $value ) { return 'disabled' === $GLOBALS['scenario'] ? false : $value; }
function wp_enqueue_style( $handle, $src = '', $deps = array(), $ver = null, $media = 'all' ) {
	if ( '' === $src && isset( $GLOBALS['styles'][ $handle ] ) ) return;
	$GLOBALS['styles'][ $handle ] = compact( 'src', 'deps', 'ver', 'media' );
}
function wp_register_style( ...$args ) { wp_enqueue_style( ...$args ); }
function wp_enqueue_script( $handle, $src, $deps = array(), $ver = null, $args = false ) { $GLOBALS['scripts'][ $handle ] = compact( 'src', 'deps', 'ver', 'args' ); }
function wp_localize_script( ...$args ) {}
function admin_url( $path ) { return 'https://example.test/' . $path; }
function wp_create_nonce( $action ) { return 'fixture'; }
function get_theme_mod( $key, $default = '' ) { return $default; }
function is_page_template( $name ) { return false; }
function is_page( $name = null ) {
	$slug = array( 'prenatal' => 'lop-hoc-tien-san', 'contact' => 'lien-he', 'policy' => 'chinh-sach-bao-mat', 'hub' => 'kien-thuc' )[ $GLOBALS['scenario'] ] ?? '';
	return null === $name ? '' !== $slug : $name === $slug;
}
function is_singular( $type = null ) { return is_page() || in_array( $GLOBALS['scenario'], array( 'article', 'news', 'legacy', 'recruitment', 'pattern', 'shortcode', 'reusable' ), true ) ? ( null === $type || ( 'post' === $type && ! is_page() ) ) : false; }
function is_post_type_archive( $type ) { return false; }
function is_category() { return false; }
function is_tag() { return false; }
function is_search() { return false; }
function get_query_var( $key ) { return ''; }
function get_queried_object_id() { return 10; }
function get_post_meta( ...$args ) { return ''; }
function get_post_field( $field, $id ) {
	if ( 'post_name' === $field ) return 'fixture-post';
	return array(
		'legacy' => '<div class="vpc-callout">Old HTML</div>',
		'pattern' => '<!-- wp:vanphuccare/references {"sources":[]} /-->',
		'shortcode' => '[custom_content]',
		'reusable' => '<!-- wp:block {"ref":12} /-->',
	)[ $GLOBALS['scenario'] ] ?? '<!-- wp:paragraph --><p>Plain article</p><!-- /wp:paragraph -->';
}
function absint( $value ) { return abs( (int) $value ); }
function get_post( $id ) { return 12 === $id ? (object) array( 'post_content' => '<!-- wp:vanphuccare/checklist /-->' ) : null; }
function is_admin() { return 'editor' === $GLOBALS['scenario']; }
function get_current_screen() { return new class { public $post_type = 'post'; function is_block_editor() { return true; } }; }
function in_category( $slug ) { return false; }
function vanphuccare_is_o_cu_page() { return false; }
function vanphuccare_is_bao_mau_page() { return false; }
function vanphuccare_is_easy_page() { return false; }
function vanphuccare_is_tam_be_page() { return 'bath' === $GLOBALS['scenario']; }
function vanphuccare_is_thong_tac_page() { return false; }
function vanphuccare_is_news_page() { return 'news-hub' === $GLOBALS['scenario']; }
function vanphuccare_is_recruitment_page() { return false; }
function vpc_is_recruitment_post( $id ) { return 'recruitment' === $GLOBALS['scenario']; }
function vanphuccare_get_primary_category( $id ) { return $GLOBALS['scenario']; }
function vpc_is_news_category( $cat ) { return 'news' === $cat; }
function vpc_is_knowledge_category( $cat ) { return 'article' === $cat; }
function vpc_is_news_post( $id ) { return false; }
function wp_get_theme() { return new class { function get( $name ) { return '1.0'; } }; }

require dirname( __DIR__ ) . '/inc/enqueue.php';
vanphuccare_enqueue_assets();
vanphuccare_enqueue_knowledge_pattern_styles();
echo json_encode( array( 'styles' => $styles, 'scripts' => $scripts, 'version' => vanphuccare_get_asset_version( get_template_directory() . '/assets/js/main.js' ),
	'legacy_detected' => vanphuccare_content_uses_article_patterns( '<!-- wp:group --><div class="vpc-checklist">Old</div><!-- /wp:group -->' ),
	'unknown_ref_kept' => vanphuccare_content_uses_article_patterns( '<!-- wp:block {"ref":99} /-->' ),
	'yoast_faq_kept' => vanphuccare_content_uses_article_patterns( '<!-- wp:yoast/faq-block {"questions":[]} /-->' ),
) );
