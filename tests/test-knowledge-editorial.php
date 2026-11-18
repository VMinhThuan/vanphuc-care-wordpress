<?php
/**
 * Test Suite: Knowledge Editorial Dynamic Blocks & Reviewer Logic
 * Can be run via CLI: php tests/test-knowledge-editorial.php
 */

define( 'ABSPATH', __DIR__ . '/../' );

$registered_blocks   = array();
$registered_patterns = array();
$mock_post_meta      = array();
$mock_posts          = array();

function get_template_directory() {
	return dirname( __DIR__ );
}

function get_template_directory_uri() {
	return 'https://staging.vanphuccare.vn/wp-content/themes/vanphuccare';
}

function vanphuccare_get_asset_version( $path ) {
	return '1.0.0';
}

function wp_register_script( $handle, $src, $deps = array(), $ver = false, $in_footer = false ) {
	return true;
}

function register_block_type( $name, $args = array() ) {
	global $registered_blocks;
	$registered_blocks[ $name ] = $args;
	return true;
}

function register_block_pattern_category( $name, $args ) {
	return true;
}

function register_block_pattern( $name, $args ) {
	global $registered_patterns;
	$registered_patterns[ $name ] = $args;
	return true;
}

function register_post_meta( $post_type, $meta_key, $args = array() ) {
	global $mock_post_meta;
	$mock_post_meta['registered'][ $meta_key ] = $args;
	return true;
}

function add_action( $hook, $callback, $priority = 10, $accepted_args = 1 ) {}
function add_filter( $hook, $callback, $priority = 10, $accepted_args = 1 ) {}

function esc_html( $text ) {
	return htmlspecialchars( (string) $text, ENT_QUOTES, 'UTF-8' );
}

function esc_attr( $text ) {
	return htmlspecialchars( (string) $text, ENT_QUOTES, 'UTF-8' );
}

function esc_url( $url, $protocols = null ) {
	$url = (string) $url;
	if ( '' === trim( $url ) || preg_match( '/^javascript:/i', $url ) ) {
		return '';
	}
	return filter_var( $url, FILTER_SANITIZE_URL );
}

function esc_url_raw( $url, $protocols = null ) {
	return esc_url( $url, $protocols );
}

function esc_html__( $text, $domain = 'default' ) {
	return esc_html( $text );
}

function __( $text, $domain = 'default' ) {
	return (string) $text;
}

function absint( $maybeint ) {
	return abs( (int) $maybeint );
}

function wp_parse_url( $url, $component = -1 ) {
	return parse_url( $url, $component );
}

function wp_basename( $path ) {
	return basename( $path );
}

function size_format( $bytes, $decimals = 0 ) {
	return round( $bytes / 1024, $decimals ) . ' KB';
}

function wp_parse_list( $list ) {
	if ( ! is_array( $list ) ) {
		return preg_split( '/[\s,]+/', $list, -1, PREG_SPLIT_NO_EMPTY );
	}
	return $list;
}

function sanitize_text_field( $str ) {
	return trim( strip_tags( (string) $str ) );
}

function wp_unslash( $value ) {
	return is_array( $value ) ? array_map( 'wp_unslash', $value ) : stripslashes( (string) $value );
}

function current_user_can( $capability ) {
	return true;
}

function wp_verify_nonce( $nonce, $action = -1 ) {
	return ( 'valid_reviewer_nonce' === $nonce && 'vpc_save_reviewer_meta' === $action );
}

function update_post_meta( $post_id, $meta_key, $meta_value ) {
	global $mock_post_meta;
	$mock_post_meta['saved'][ $post_id ][ $meta_key ] = $meta_value;
	return true;
}

function delete_post_meta( $post_id, $meta_key ) {
	global $mock_post_meta;
	unset( $mock_post_meta['saved'][ $post_id ][ $meta_key ] );
	return true;
}

function get_post_meta( $post_id, $meta_key = '', $single = false ) {
	global $mock_post_meta;
	return $mock_post_meta['saved'][ $post_id ][ $meta_key ] ?? '';
}

function get_post( $id ) {
	global $mock_posts;
	return $mock_posts[ (int) $id ] ?? null;
}

function get_permalink( $post ) {
	$id = is_object( $post ) ? $post->ID : (int) $post;
	return 'https://staging.vanphuccare.vn/?p=' . $id;
}

function get_the_title( $post ) {
	$id = is_object( $post ) ? $post->ID : (int) $post;
	global $mock_posts;
	return $mock_posts[ $id ]->post_title ?? 'Sample Post';
}

function get_the_post_thumbnail( $post, $size = 'post-thumbnail', $attr = '' ) {
	return '<img src="https://staging.vanphuccare.vn/thumb.jpg" alt="" />';
}

function wp_get_attachment_url( $id ) {
	global $mock_posts;
	if ( isset( $mock_posts[ $id ] ) && 'attachment' === $mock_posts[ $id ]->post_type ) {
		return 'https://staging.vanphuccare.vn/wp-content/uploads/' . $mock_posts[ $id ]->guid;
	}
	return false;
}

function wp_get_attachment_metadata( $id ) {
	return array( 'filesize' => 1048576 ); // 1MB
}

// Load Block Modules
require_once dirname( __DIR__ ) . '/inc/checklist.php';
require_once dirname( __DIR__ ) . '/inc/references.php';
require_once dirname( __DIR__ ) . '/inc/download.php';
require_once dirname( __DIR__ ) . '/inc/read-more.php';
require_once dirname( __DIR__ ) . '/inc/content-types.php';

$tests_passed = 0;
$tests_failed = 0;

function assert_test( $condition, $message ) {
	global $tests_passed, $tests_failed;
	if ( $condition ) {
		$tests_passed++;
		echo "[PASS] $message\n";
	} else {
		$tests_failed++;
		echo "[FAIL] $message\n";
	}
}

echo "=== VẠN PHÚC CARE KNOWLEDGE EDITORIAL UNIT TESTS ===\n\n";

// 1. Checklist Block Dynamic Rendering
vanphuccare_register_checklist();
assert_test( isset( $registered_blocks['vanphuccare/checklist'] ), 'Block vanphuccare/checklist registered successfully' );

$valid_checklist = vanphuccare_render_checklist( array(
	'title' => 'Vật dụng cho mẹ sau sinh',
	'items' => array(
		array( 'name' => 'Bình sữa chống sặc', 'quantity' => '2' ),
		array( 'name' => 'Máy hút sữa điện đôi', 'quantity' => '1' ),
	),
) );
assert_test( strpos( $valid_checklist, 'Vật dụng cho mẹ sau sinh' ) !== false, 'Checklist renders title' );
assert_test( strpos( $valid_checklist, 'Bình sữa chống sặc' ) !== false && strpos( $valid_checklist, '× 2' ) !== false, 'Checklist renders items with quantity' );

// Invalid attributes fallback
assert_test( vanphuccare_render_checklist( array( 'items' => array() ) ) === '', 'Checklist returns empty string when items array is empty' );
assert_test( vanphuccare_render_checklist( array( 'items' => null ) ) === '', 'Checklist returns empty string when items is null' );
assert_test( vanphuccare_render_checklist( array( 'items' => array( array( 'name' => '   ' ) ) ) ) === '', 'Checklist skips items with whitespace-only names' );

// 2. References Block Dynamic Rendering
vanphuccare_register_references();
assert_test( isset( $registered_blocks['vanphuccare/references'] ), 'Block vanphuccare/references registered successfully' );

$valid_ref = vanphuccare_render_references( array(
	'title'   => 'Nghiên cứu y khoa',
	'sources' => array(
		array( 'text' => 'Tổ chức Y tế Thế giới (WHO)', 'url' => 'https://who.int/guideline' ),
		array( 'text' => 'Bộ Y tế Việt Nam', 'url' => '' ),
		array( 'text' => 'Tài liệu độc hại', 'url' => 'javascript:alert(1)' ),
	),
) );
assert_test( strpos( $valid_ref, 'Nghiên cứu y khoa' ) !== false, 'References renders title' );
assert_test( strpos( $valid_ref, 'href="https://who.int/guideline"' ) !== false && strpos( $valid_ref, '[1]' ) !== false, 'References renders linked source with [1]' );
assert_test( strpos( $valid_ref, '<span class="vpc-references__row"><span class="vpc-references__number">[2]</span><span class="vpc-references__text">Bộ Y tế Việt Nam</span></span>' ) !== false, 'References renders unlinked source with plain span [2]' );
assert_test( strpos( $valid_ref, 'javascript:' ) === false, 'References filters out javascript: pseudo-protocol' );
assert_test( vanphuccare_render_references( array( 'sources' => array() ) ) === '', 'References returns empty string when sources is empty' );

// 3. Download Block Dynamic Rendering
vanphuccare_register_download();
assert_test( isset( $registered_blocks['vanphuccare/download'] ), 'Block vanphuccare/download registered successfully' );

$mock_posts[101] = (object) array(
	'ID'          => 101,
	'post_type'   => 'attachment',
	'post_status' => 'inherit',
	'post_title'  => 'Cam-nang-o-cu.pdf',
	'guid'        => '2026/11/Cam-nang-o-cu.pdf',
);

$valid_download = vanphuccare_render_download( array(
	'attachmentId' => 101,
	'label'        => 'Cẩm nang ở cữ trọn gói (PDF)',
) );
assert_test( strpos( $valid_download, 'Cẩm nang ở cữ trọn gói (PDF)' ) !== false, 'Download block renders custom label' );
assert_test( strpos( $valid_download, 'href="https://staging.vanphuccare.vn/wp-content/uploads/2026/11/Cam-nang-o-cu.pdf"' ) !== false, 'Download block renders file URL' );

// Deleted attachment edge case
assert_test( vanphuccare_render_download( array( 'attachmentId' => 9999 ) ) === '', 'Download block safely returns empty string when attachment is deleted/not found' );
assert_test( vanphuccare_render_download( array( 'attachmentId' => 0 ) ) === '', 'Download block safely returns empty string when attachmentId is 0' );

// 4. Read More Block Dynamic Rendering
vanphuccare_register_read_more();
assert_test( isset( $registered_blocks['vanphuccare/read-more'] ), 'Block vanphuccare/read-more registered successfully' );

$mock_posts[202] = (object) array(
	'ID'            => 202,
	'post_type'     => 'post',
	'post_status'   => 'publish',
	'post_password' => '',
	'post_title'    => 'Hướng dẫn tắm bé sơ sinh đúng chuẩn',
);
$mock_posts[203] = (object) array(
	'ID'            => 203,
	'post_type'     => 'post',
	'post_status'   => 'draft',
	'post_password' => '',
	'post_title'    => 'Bài nháp chưa xuất bản',
);

$valid_read_more = vanphuccare_render_read_more( array( 'postId' => 202 ) );
assert_test( strpos( $valid_read_more, 'Hướng dẫn tắm bé sơ sinh đúng chuẩn' ) !== false, 'Read more renders title of published post' );
assert_test( strpos( $valid_read_more, 'vpc-related-link' ) !== false, 'Read more renders vpc-related-link container' );

// Non-published or password protected post
assert_test( vanphuccare_render_read_more( array( 'postId' => 203 ) ) === '', 'Read more returns empty string for draft posts' );
assert_test( vanphuccare_render_read_more( array( 'postId' => 9999 ) ) === '', 'Read more returns empty string for non-existent posts' );

// 5. Reviewer Meta Box Save and Post Meta Registration
vpc_register_reviewer_post_meta();
assert_test( isset( $mock_post_meta['registered']['vpc_reviewer_name'] ), 'vpc_reviewer_name registered in post meta' );
assert_test( isset( $mock_post_meta['registered']['vpc_reviewer_title'] ), 'vpc_reviewer_title registered in post meta' );

// Saving reviewer meta with invalid nonce
$_POST = array(
	'vpc_reviewer_meta_nonce' => 'invalid_nonce',
	'vpc_reviewer_name'       => 'Hacker Name',
);
vpc_save_reviewer_meta_box( 555 );
assert_test( empty( $mock_post_meta['saved'][555] ), 'vpc_save_reviewer_meta_box rejects invalid nonce' );

// Saving reviewer meta with valid nonce and sanitization
$_POST = array(
	'vpc_reviewer_meta_nonce' => 'valid_reviewer_nonce',
	'vpc_reviewer_name'       => '<b>BS. CKI Nguyễn Văn A</b>',
	'vpc_reviewer_title'      => 'Khoa Nhi BV Phụ Sản',
	'vpc_reviewer_avatar'     => 'https://staging.vanphuccare.vn/avatar.jpg',
	'vpc_reviewer_url'        => 'https://staging.vanphuccare.vn/gioi-thieu/',
);
vpc_save_reviewer_meta_box( 555 );
assert_test( $mock_post_meta['saved'][555]['vpc_reviewer_name'] === 'BS. CKI Nguyễn Văn A', 'HTML tags stripped from vpc_reviewer_name' );
assert_test( $mock_post_meta['saved'][555]['vpc_reviewer_title'] === 'Khoa Nhi BV Phụ Sản', 'vpc_reviewer_title saved correctly' );
assert_test( $mock_post_meta['saved'][555]['vpc_reviewer_avatar'] === 'https://staging.vanphuccare.vn/avatar.jpg', 'vpc_reviewer_avatar URL sanitized and saved' );

echo "\nSummary: $tests_passed passed, $tests_failed failed.\n";
exit( $tests_failed > 0 ? 1 : 0 );
