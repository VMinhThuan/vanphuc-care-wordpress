<?php
/**
 * Test Suite: WordPress Integration & Logic Validation
 * Tests functions, customizer, nonce, sanitization, recipient resolution, and AJAX handlers in inc/ajax.php & inc/helpers.php.
 */

// Define WordPress environment constants & mock minimal core functions
define( 'ABSPATH', __DIR__ . '/../' );
define( 'MINUTE_IN_SECONDS', 60 );

$wp_actions = array();
$wp_filters = array();
$wp_options = array();
$wp_theme_mods = array();
$wp_transients = array();
$wp_last_json_response = null;
$wp_remote_post_return = array(
	'response' => array( 'code' => 201 ),
	'body'     => json_encode( array(
		'status'  => true,
		'message' => 'Đã tiếp nhận yêu cầu.',
		'data'    => array(
			'leadId'  => '673f8e9102ab3c4d5e6f7a8b',
			'eventId' => 'website-lead-673f8e9102ab3c4d5e6f7a8b',
		),
	) ),
);
$wp_remote_post_log = array();

function add_action( $hook, $callback, $priority = 10, $accepted_args = 1 ) {
	global $wp_actions;
	$wp_actions[ $hook ][] = $callback;
}

function add_filter( $hook, $callback, $priority = 10, $accepted_args = 1 ) {
	global $wp_filters;
	$wp_filters[ $hook ][] = $callback;
}

function apply_filters( $hook, $value ) {
	global $wp_filters;
	if ( ! empty( $wp_filters[ $hook ] ) ) {
		foreach ( $wp_filters[ $hook ] as $cb ) {
			$value = call_user_func( $cb, $value );
		}
	}
	return $value;
}

function get_option( $name, $default = false ) {
	global $wp_options;
	return isset( $wp_options[ $name ] ) ? $wp_options[ $name ] : $default;
}

function get_theme_mod( $name, $default = false ) {
	global $wp_theme_mods;
	return isset( $wp_theme_mods[ $name ] ) ? $wp_theme_mods[ $name ] : $default;
}

function sanitize_text_field( $str ) {
	return trim( strip_tags( (string) $str ) );
}

function sanitize_textarea_field( $str ) {
	return trim( strip_tags( (string) $str ) );
}

function sanitize_email( $email ) {
	return filter_var( trim( (string) $email ), FILTER_VALIDATE_EMAIL ) ? trim( (string) $email ) : '';
}

function esc_url_raw( $url ) {
	return filter_var( trim( (string) $url ), FILTER_SANITIZE_URL );
}

function wp_parse_url( $url ) {
	return parse_url( $url );
}

function home_url( $path = '/' ) {
	return 'https://vanphuccare.test' . $path;
}

function wp_json_encode( $value ) {
	return json_encode( $value );
}

class WP_Error {}

function is_wp_error( $value ) {
	return $value instanceof WP_Error;
}

function wp_remote_post( $url, $args ) {
	global $wp_remote_post_return, $wp_remote_post_log;
	$wp_remote_post_log[] = compact( 'url', 'args' );
	return $wp_remote_post_return;
}

function wp_remote_retrieve_response_code( $response ) {
	return (int) ( $response['response']['code'] ?? 0 );
}

function wp_remote_retrieve_body( $response ) {
	return is_array( $response ) ? ( $response['body'] ?? '' ) : '';
}

function is_email( $email ) {
	return (bool) filter_var( $email, FILTER_VALIDATE_EMAIL );
}

function wp_unslash( $value ) {
	return is_string( $value ) ? stripslashes( $value ) : $value;
}

function wp_verify_nonce( $nonce, $action = -1 ) {
	return ( $nonce === 'valid_test_nonce' && $action === 'vpc_consultation_nonce' );
}

function get_transient( $key ) {
	global $wp_transients;
	return isset( $wp_transients[ $key ] ) ? $wp_transients[ $key ] : false;
}

function set_transient( $key, $value, $expiration = 0 ) {
	global $wp_transients;
	$wp_transients[ $key ] = $value;
	return true;
}

function delete_transient( $key ) {
	global $wp_transients;
	unset( $wp_transients[ $key ] );
	return true;
}

function current_time( $format ) {
	return date( $format );
}

function wp_generate_uuid4() {
	return 'c2a5e921-6677-4b44-9344-96696b996bb9';
}

function untrailingslashit( $string ) {
	return rtrim( (string) $string, '/\\' );
}

class JsonResponseException extends Exception {
	public $response;
	public function __construct( $response ) {
		$this->response = $response;
		parent::__construct( json_encode( $response ) );
	}
}

function wp_send_json_error( $data = null, $status_code = null ) {
	global $wp_last_json_response;
	$wp_last_json_response = array(
		'success'     => false,
		'data'        => $data,
		'status_code' => $status_code,
	);
	throw new JsonResponseException( $wp_last_json_response );
}

function wp_send_json_success( $data = null, $status_code = null ) {
	global $wp_last_json_response;
	$wp_last_json_response = array(
		'success'     => true,
		'data'        => $data,
		'status_code' => $status_code,
	);
	throw new JsonResponseException( $wp_last_json_response );
}

// Load Theme Files
require_once __DIR__ . '/../inc/helpers.php';
require_once __DIR__ . '/../inc/ajax.php';

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

echo "=== VẠN PHÚC CARE PHP / WORDPRESS INTEGRATION TESTS ===\n\n";

// 1. Test Service Dictionary
$services = vpc_get_consultation_services();
assert_test( is_array( $services ) && count( $services ) >= 7, 'vpc_get_consultation_services returns all 7 standard services' );
assert_test( isset( $services['trung-tam-o-cu'] ), 'Service trung-tam-o-cu exists' );
assert_test( isset( $services['bao-mau-tai-nha'] ), 'Service bao-mau-tai-nha exists' );
assert_test( isset( $services['lop-hoc-tien-san'] ), 'Service lop-hoc-tien-san exists' );

// 2. Test external API endpoint validation and no-email fallback.
assert_test( vpc_get_consultation_api_endpoint() === '', 'Lead API defaults to empty rather than falling back to email' );
$wp_theme_mods['vpc_consultation_api_endpoint'] = 'https://crm.example.test/leads';
assert_test( vpc_get_consultation_api_endpoint() === 'https://crm.example.test/leads', 'HTTPS lead API endpoint is accepted' );
assert_test( vpc_sanitize_consultation_api_endpoint( 'http://crm.example.test/leads' ) === '', 'HTTP lead API endpoint is rejected' );
assert_test( vpc_normalize_vietnamese_phone( '+84 345 678 999' ) === '0345678999', 'Vietnamese phone is normalized to ten digits' );

// 3. Test AJAX Actions Registration
assert_test( in_array( 'vpc_handle_consultation_submission', $wp_actions['wp_ajax_vpc_submit_consultation'] ?? array() ), 'wp_ajax_vpc_submit_consultation is registered' );
assert_test( in_array( 'vpc_handle_consultation_submission', $wp_actions['wp_ajax_nopriv_vpc_submit_consultation'] ?? array() ), 'wp_ajax_nopriv_vpc_submit_consultation is registered' );

// 4. Test Nonce Verification
$_POST = array(
	'nonce' => 'invalid_nonce',
);
try {
	vpc_handle_consultation_submission();
	assert_test( false, 'Invalid nonce should reject request' );
} catch ( JsonResponseException $e ) {
	assert_test( $e->response['success'] === false && $e->response['status_code'] === 403, 'Invalid nonce rejected with 403 status' );
}

// 5. Test Honeypot
$_POST = array(
	'nonce'   => 'valid_test_nonce',
	'website' => 'http://spam-bot.com',
);
try {
	vpc_handle_consultation_submission();
	assert_test( false, 'Honeypot should reject request' );
} catch ( JsonResponseException $e ) {
	assert_test( $e->response['success'] === false && $e->response['status_code'] === 400, 'Honeypot rejected with 400 status' );
}

// 6. Test Empty Required Fields
$_POST = array(
	'nonce'     => 'valid_test_nonce',
	'full_name' => '',
	'phone'     => '',
);
try {
	vpc_handle_consultation_submission();
	assert_test( false, 'Empty full name should be rejected' );
} catch ( JsonResponseException $e ) {
	assert_test( $e->response['success'] === false && $e->response['status_code'] === 400, 'Empty required fields rejected with 400' );
}

// 7. Test Invalid Service
$_POST = array(
	'nonce'     => 'valid_test_nonce',
	'full_name' => 'Nguyễn Thị A',
	'phone'     => '0901234567',
	'email'     => 'a@example.test',
	'service'   => 'invalid-service-key',
);
try {
	vpc_handle_consultation_submission();
	assert_test( false, 'Invalid service should be rejected' );
} catch ( JsonResponseException $e ) {
	assert_test( $e->response['success'] === false && $e->response['status_code'] === 400, 'Invalid service rejected with 400' );
}

// 8. Test Invalid Phone Format
$_POST = array(
	'nonce'     => 'valid_test_nonce',
	'full_name' => 'Nguyễn Thị A',
	'phone'     => '12345',
	'email'     => 'a@example.test',
	'service'   => 'trung-tam-o-cu',
	'gestational_age' => '28-40-tuan',
);
try {
	vpc_handle_consultation_submission();
	assert_test( false, 'Short invalid phone should be rejected' );
} catch ( JsonResponseException $e ) {
	assert_test( $e->response['success'] === false && $e->response['status_code'] === 400, 'Invalid phone number rejected with 400' );
}

// 9. Test Successful Submission
$_POST = array(
	'nonce'     => 'valid_test_nonce',
	'full_name' => 'Nguyễn Như Linh',
	'phone'     => '0345678999',
	'email'     => 'linh@example.test',
	'service'   => 'trung-tam-o-cu',
	'gestational_age' => '28-40-tuan',
	'question'  => 'Tư vấn gói ở cữ cao cấp',
);
$_SERVER['REMOTE_ADDR'] = '127.0.0.1';
try {
	vpc_handle_consultation_submission();
	assert_test( false, 'Successful submission throws JsonResponseException' );
} catch ( JsonResponseException $e ) {
	assert_test( $e->response['success'] === true, 'Valid submission returns success: true' );
	assert_test( count( $wp_remote_post_log ) > 0, 'External lead API was called' );
	$payload = json_decode( $wp_remote_post_log[0]['args']['body'], true );
	assert_test( $wp_remote_post_log[0]['url'] === 'https://crm.example.test/leads', 'Lead API uses configured endpoint' );
	assert_test( $payload['email'] === 'linh@example.test' && $payload['phone'] === '0345678999' && $payload['fullName'] === 'Nguyễn Như Linh', 'Lead API receives normalized contact data' );
	assert_test( isset( $wp_remote_post_log[0]['args']['headers']['Idempotency-Key'] ), 'Lead API request includes Idempotency-Key header' );
	assert_test( isset( $wp_remote_post_log[0]['args']['headers']['Origin'] ), 'Lead API request includes Origin header' );
	assert_test( ( $e->response['data']['leadId'] ?? '' ) === '673f8e9102ab3c4d5e6f7a8b', 'Response forwards leadId to client' );
	assert_test( ( $e->response['data']['eventId'] ?? '' ) === 'website-lead-673f8e9102ab3c4d5e6f7a8b', 'Response forwards eventId for Meta CAPI tracking' );
}

// 10. Test Rate Limiting (Transient set after first submission)
try {
	vpc_handle_consultation_submission();
	assert_test( false, 'Submitting immediately again should be rate limited' );
} catch ( JsonResponseException $e ) {
	assert_test( $e->response['success'] === false && $e->response['status_code'] === 429, 'Rate limiting transient rejected with 429 status' );
}

// 11. Test Form Bảo Mẫu (Figma Hình 1: Có servicePackage, Không Thai Kỳ, Không Email)
delete_transient( 'vpc_consultation_' . md5( '127.0.0.2' ) );
$_POST = array(
	'nonce'           => 'valid_test_nonce',
	'customer_name'   => 'Trần Thu Hà',
	'customer_phone'  => '0988776655',
	'service'         => 'bao-mau-tai-nha',
	'service_package' => 'Gói Thảnh Thơi',
	'customer_note'   => 'Cần tìm bảo mẫu chăm sóc bé ban đêm',
);
$_SERVER['REMOTE_ADDR'] = '127.0.0.2';
try {
	vpc_handle_consultation_submission();
	assert_test( false, 'Bảo mẫu submission should succeed' );
} catch ( JsonResponseException $e ) {
	assert_test( $e->response['success'] === true, 'Bảo mẫu form (Hình 1) succeeds' );
	$last_call = end( $wp_remote_post_log );
	$payload   = json_decode( $last_call['args']['body'], true );
	assert_test( $payload['serviceInterest'] === 'Bảo mẫu tại nhà', 'Bảo mẫu serviceInterest mapped correctly' );
	assert_test( $payload['servicePackage'] === 'Gói Thảnh Thơi', 'Bảo mẫu servicePackage forwarded correctly' );
	assert_test( ! isset( $payload['pregnancyWeek'] ), 'pregnancyWeek omitted when not provided' );
	assert_test( ! isset( $payload['email'] ), 'email omitted when not in form' );
	assert_test( ( $e->response['data']['eventId'] ?? '' ) === 'website-lead-673f8e9102ab3c4d5e6f7a8b', 'EventId returned for tracking' );
}

// 12. Test Form Ở Cữ (Figma Hình 2: Có roomTier, expectedDueDate, Không Email, Không Thai Kỳ)
delete_transient( 'vpc_consultation_' . md5( '127.0.0.3' ) );
$_POST = array(
	'nonce'              => 'valid_test_nonce',
	'customer_name'      => 'Lê Mỹ Duyên',
	'customer_phone'     => '0912345678',
	'service'            => 'trung-tam-o-cu',
	'room_tier'          => 'Standard Balcony',
	'expected_due_date'  => '2026-12-12',
	'customer_note'      => 'Tư vấn phòng Standard Balcony và dịch vụ chăm sóc mẹ',
);
$_SERVER['REMOTE_ADDR'] = '127.0.0.3';
try {
	vpc_handle_consultation_submission();
	assert_test( false, 'Ở Cữ submission should succeed' );
} catch ( JsonResponseException $e ) {
	assert_test( $e->response['success'] === true, 'Ở Cữ form (Hình 2) succeeds' );
	$last_call = end( $wp_remote_post_log );
	$payload   = json_decode( $last_call['args']['body'], true );
	assert_test( $payload['serviceInterest'] === 'Trung tâm ở cữ', 'Ở Cữ serviceInterest mapped correctly' );
	assert_test( $payload['roomTier'] === 'Standard Balcony', 'roomTier forwarded correctly' );
	assert_test( $payload['expectedDueDate'] === '2026-12-12', 'expectedDueDate sent correctly' );
	assert_test( ! isset( $payload['email'] ), 'email omitted when not in form' );
	assert_test( ( $e->response['data']['eventId'] ?? '' ) === 'website-lead-673f8e9102ab3c4d5e6f7a8b', 'EventId returned for tracking' );
}

// 13. Test Form Lớp Tiền Sản (Figma Hình 4: 2 pills thai kỳ, stage_choice, Không Email)
delete_transient( 'vpc_consultation_' . md5( '127.0.0.4' ) );
$_POST = array(
	'nonce'           => 'valid_test_nonce',
	'full_name'       => 'Nguyễn Ngọc Anh',
	'phone'           => '0977112233',
	'service'         => 'lop-hoc-tien-san',
	'pregnancy_stage' => 'dang-mang-thai',
	'stage_choice'    => '13-27-tuan',
	'question'        => 'Đăng ký 2 vợ chồng cùng tham gia',
);
$_SERVER['REMOTE_ADDR'] = '127.0.0.4';
try {
	vpc_handle_consultation_submission();
	assert_test( false, 'Lớp tiền sản submission should succeed' );
} catch ( JsonResponseException $e ) {
	assert_test( $e->response['success'] === true, 'Lớp tiền sản form (Hình 4) succeeds without email' );
	$last_call = end( $wp_remote_post_log );
	$payload   = json_decode( $last_call['args']['body'], true );
	assert_test( $payload['serviceInterest'] === 'Lớp học tiền sản', 'Tiền sản serviceInterest mapped correctly' );
	assert_test( $payload['pregnancyStage'] === 'Đang mang thai', 'pregnancyStage mapped correctly' );
	assert_test( $payload['pregnancyWeek'] === 'Mang thai 13 - 27 tuần', 'stage_choice mapped to pregnancyWeek' );
	assert_test( ! isset( $payload['email'] ), 'email omitted when not in form' );
	assert_test( ( $e->response['data']['eventId'] ?? '' ) === 'website-lead-673f8e9102ab3c4d5e6f7a8b', 'EventId returned for tracking' );
}

echo "\nSummary: $tests_passed passed, $tests_failed failed.\n";
exit( $tests_failed > 0 ? 1 : 0 );
