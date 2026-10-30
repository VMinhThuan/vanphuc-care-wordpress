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
$wp_remote_post_return = array( 'response' => array( 'code' => 201 ) );
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

function current_time( $format ) {
	return date( $format );
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
	assert_test( $payload['email'] === 'linh@example.test' && $payload['phone'] === '0345678999', 'Lead API receives normalized contact data' );
}

// 10. Test Rate Limiting (Transient set after first submission)
try {
	vpc_handle_consultation_submission();
	assert_test( false, 'Submitting immediately again should be rate limited' );
} catch ( JsonResponseException $e ) {
	assert_test( $e->response['success'] === false && $e->response['status_code'] === 429, 'Rate limiting transient rejected with 429 status' );
}

echo "\nSummary: $tests_passed passed, $tests_failed failed.\n";
exit( $tests_failed > 0 ? 1 : 0 );
