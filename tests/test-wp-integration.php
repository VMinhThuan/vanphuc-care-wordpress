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
$wp_options = array(
	'admin_email' => 'admin@vanphuccare.vn',
);
$wp_theme_mods = array();
$wp_transients = array();
$wp_last_json_response = null;
$wp_mail_return_value = true;
$wp_mail_log = array();

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

function wp_mail( $to, $subject, $message, $headers = '', $attachments = array() ) {
	global $wp_mail_return_value, $wp_mail_log;
	$wp_mail_log[] = compact( 'to', 'subject', 'message' );
	return $wp_mail_return_value;
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

// 2. Test Recipient Resolution & Fallback
assert_test( vpc_get_consultation_recipient() === 'admin@vanphuccare.vn', 'Default recipient falls back to admin_email' );

$wp_theme_mods['vpc_consultation_recipient'] = 'lead@vanphuccare.vn';
assert_test( vpc_get_consultation_recipient() === 'lead@vanphuccare.vn', 'Customizer mod overrides admin_email' );

add_filter( 'vpc_consultation_recipient', function( $email ) {
	return 'crm-filtered@vanphuccare.vn';
} );
assert_test( vpc_get_consultation_recipient() === 'crm-filtered@vanphuccare.vn', 'vpc_consultation_recipient filter properly overrides email' );

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
	'service'   => 'trung-tam-o-cu',
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
	'service'   => 'trung-tam-o-cu',
	'question'  => 'Tư vấn gói ở cữ cao cấp',
);
$_SERVER['REMOTE_ADDR'] = '127.0.0.1';
$wp_mail_return_value = true;
try {
	vpc_handle_consultation_submission();
	assert_test( false, 'Successful submission throws JsonResponseException' );
} catch ( JsonResponseException $e ) {
	assert_test( $e->response['success'] === true, 'Valid submission returns success: true' );
	assert_test( count( $wp_mail_log ) > 0, 'wp_mail was called with email notification' );
	assert_test( strpos( $wp_mail_log[0]['subject'], 'Nguyễn Như Linh' ) !== false, 'Email subject contains submitter name' );
	assert_test( strpos( $wp_mail_log[0]['message'], 'Trung tâm Ở cữ' ) !== false, 'Email body contains correct service label' );
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
