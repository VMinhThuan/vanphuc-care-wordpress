<?php
/**
 * AJAX endpoints for form submissions.
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Handles AJAX consultation form submissions.
 *
 * @return void
 */
function vpc_handle_consultation_submission() {
	// Every public form must carry the localized nonce. Do not accept a lead
	// until WordPress has confirmed that it originated from this site.
	$nonce = isset( $_POST['nonce'] ) ? sanitize_text_field( wp_unslash( $_POST['nonce'] ) ) : '';
	if ( empty( $nonce ) || ! wp_verify_nonce( $nonce, 'vpc_consultation_nonce' ) ) {
		wp_send_json_error( array(
			'message' => 'Phiên làm việc đã hết hạn. Vui lòng tải lại trang và thử lại.',
		), 403 );
	}

	// Honeypot field: real visitors never see or complete this field.
	if ( ! empty( $_POST['website'] ) ) {
		wp_send_json_error( array(
			'message' => 'Không thể gửi thông tin. Vui lòng thử lại.',
		), 400 );
	}

	// Limit repeated submissions without relying on a third-party CAPTCHA.
	$remote_address = isset( $_SERVER['REMOTE_ADDR'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REMOTE_ADDR'] ) ) : '';
	$rate_key       = 'vpc_consultation_' . md5( $remote_address );
	if ( get_transient( $rate_key ) ) {
		wp_send_json_error( array(
			'message' => 'Bạn vừa gửi yêu cầu. Vui lòng chờ ít phút trước khi gửi lại.',
		), 429 );
	}

	$full_name = isset( $_POST['full_name'] ) ? sanitize_text_field( wp_unslash( $_POST['full_name'] ) ) : ( isset( $_POST['customer_name'] ) ? sanitize_text_field( wp_unslash( $_POST['customer_name'] ) ) : '' );
	$phone     = isset( $_POST['phone'] ) ? sanitize_text_field( wp_unslash( $_POST['phone'] ) ) : ( isset( $_POST['customer_phone'] ) ? sanitize_text_field( wp_unslash( $_POST['customer_phone'] ) ) : '' );
	$service   = isset( $_POST['service'] ) ? sanitize_text_field( wp_unslash( $_POST['service'] ) ) : '';
	$question  = isset( $_POST['question'] ) ? sanitize_textarea_field( wp_unslash( $_POST['question'] ) ) : ( isset( $_POST['customer_note'] ) ? sanitize_textarea_field( wp_unslash( $_POST['customer_note'] ) ) : '' );

	if ( empty( $full_name ) || empty( $phone ) ) {
		wp_send_json_error( array(
			'message' => 'Vui lòng nhập đầy đủ họ tên và số điện thoại liên hệ.',
		), 400 );
	}

	$services = vpc_get_consultation_services();
	if ( empty( $service ) || ! isset( $services[ $service ] ) ) {
		wp_send_json_error( array(
			'message' => 'Vui lòng chọn dịch vụ bạn quan tâm.',
		), 400 );
	}

	// Validate phone format (Vietnamese mobile 10 digits)
	$clean_phone = preg_replace( '/[^0-9]/', '', $phone );
	if ( strlen( $clean_phone ) < 9 || strlen( $clean_phone ) > 11 ) {
		wp_send_json_error( array(
			'message' => 'Số điện thoại không hợp lệ. Vui lòng kiểm tra lại.',
		), 400 );
	}

	// wp_mail is the configured lead delivery channel for this theme. Only
	// acknowledge the request after that delivery has been accepted by WP.
	$recipient = vpc_get_consultation_recipient();
	if ( empty( $recipient ) || ! is_email( $recipient ) ) {
		wp_send_json_error( array(
			'message' => 'Hệ thống tiếp nhận đang tạm thời chưa sẵn sàng. Vui lòng gọi hotline để được hỗ trợ.',
		), 503 );
	}

	if ( ! empty( $recipient ) ) {
		$subject = '[Vạn Phúc Care] Yêu cầu tư vấn mới từ ' . $full_name;
		$body    = "Yêu cầu tư vấn mới từ website:\n\n" .
		           "Họ và tên: " . $full_name . "\n" .
		           "Số điện thoại: " . $phone . "\n" .
		           "Dịch vụ quan tâm: " . $services[ $service ] . "\n" .
		           "Nội dung/Câu hỏi: " . ( $question ? $question : 'Không có' ) . "\n" .
		           "Thời gian gửi: " . current_time( 'd/m/Y H:i:s' ) . "\n";
		$sent = wp_mail( $recipient, $subject, $body );
		if ( ! $sent ) {
			wp_send_json_error( array(
				'message' => 'Chưa thể gửi thông tin đến bộ phận tư vấn. Vui lòng thử lại hoặc gọi hotline.',
			), 502 );
		}
		set_transient( $rate_key, 1, MINUTE_IN_SECONDS );
	}

	wp_send_json_success( array(
		'message' => 'Cảm ơn Ba/Mẹ đã gửi thông tin. Đội ngũ chuyên gia y tế của Vạn Phúc Care sẽ liên hệ tư vấn chi tiết trong thời gian sớm nhất.',
	) );
}

add_action( 'wp_ajax_vpc_submit_consultation', 'vpc_handle_consultation_submission' );
add_action( 'wp_ajax_nopriv_vpc_submit_consultation', 'vpc_handle_consultation_submission' );
