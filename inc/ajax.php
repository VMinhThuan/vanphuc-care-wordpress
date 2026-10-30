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
	$email     = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
	$service   = isset( $_POST['service'] ) ? sanitize_text_field( wp_unslash( $_POST['service'] ) ) : '';
	$gestational_age = isset( $_POST['gestational_age'] ) ? sanitize_text_field( wp_unslash( $_POST['gestational_age'] ) ) : '';
	$question  = isset( $_POST['question'] ) ? sanitize_textarea_field( wp_unslash( $_POST['question'] ) ) : ( isset( $_POST['customer_note'] ) ? sanitize_textarea_field( wp_unslash( $_POST['customer_note'] ) ) : '' );

	if ( empty( $full_name ) || empty( $phone ) || empty( $email ) ) {
		wp_send_json_error( array(
			'message' => 'Vui lòng nhập đầy đủ họ tên, email và số điện thoại liên hệ.',
		), 400 );
	}
	if ( ! is_email( $email ) ) {
		wp_send_json_error( array( 'message' => 'Email không hợp lệ. Vui lòng kiểm tra lại.' ), 400 );
	}

	$services = vpc_get_consultation_services() + array(
		'tam-be-so-sinh'       => 'Tắm bé sau sinh',
		'cham-soc-me-sau-sinh' => 'Chăm mẹ sau sinh',
		'dieu-duong-tai-nha'   => 'Điều dưỡng y tế tại nhà',
	);
	$gestational_age_options = vpc_get_gestational_age_options() + array(
		'chua-mang-thai' => 'Chưa mang thai / Đang chuẩn bị',
		'1-12-tuan'      => 'Mang thai 1 - 12 tuần',
		'13-27-tuan'     => 'Mang thai 13 - 27 tuần',
		'28-40-tuan'     => 'Mang thai 28 - 40 tuần',
		'da-sinh-be'     => 'Đã sinh bé',
	);
	$gestational_age_label = $gestational_age_options[ $gestational_age ] ?? 'Chưa cung cấp';
	if ( empty( $service ) || ! isset( $services[ $service ] ) ) {
		wp_send_json_error( array(
			'message' => 'Vui lòng chọn dịch vụ bạn quan tâm.',
		), 400 );
	}
	if ( empty( $gestational_age ) || ! isset( $gestational_age_options[ $gestational_age ] ) ) {
		wp_send_json_error( array(
			'message' => 'Vui lòng chọn giai đoạn hoặc tuần thai phù hợp.',
		), 400 );
	}

	$clean_phone = vpc_normalize_vietnamese_phone( $phone );
	if ( empty( $clean_phone ) ) {
		wp_send_json_error( array(
			'message' => 'Vui lòng nhập số điện thoại di động Việt Nam gồm 10 chữ số.',
		), 400 );
	}

	$endpoint = vpc_get_consultation_api_endpoint();
	if ( empty( $endpoint ) ) {
		wp_send_json_error( array(
			'message' => 'Hệ thống tiếp nhận đang chờ cấu hình. Vui lòng gọi hotline để được hỗ trợ.',
		), 503 );
	}

	$pregnancy_stage = isset( $_POST['pregnancy_stage'] ) ? sanitize_text_field( wp_unslash( $_POST['pregnancy_stage'] ) ) : '';
	$pregnancy_stages = array(
		'dang-mang-thai'     => 'Đang mang thai',
		'chuan-bi-mang-thai' => 'Chuẩn bị mang thai',
		'da-sinh-be'         => 'Đã sinh bé',
	);
	$payload = array(
		'full_name'          => $full_name,
		'email'              => $email,
		'phone'              => $clean_phone,
		'service'            => $service,
		'service_label'      => $services[ $service ],
		'pregnancy_stage'    => $pregnancy_stage,
		'pregnancy_stage_label' => $pregnancy_stages[ $pregnancy_stage ] ?? '',
		'gestational_age'    => $gestational_age,
		'gestational_age_label' => $gestational_age_label,
		'question'           => $question,
		'source'             => home_url( '/' ),
		'submitted_at'       => current_time( 'c' ),
	);
	$response = wp_remote_post( $endpoint, array(
		'timeout' => 12,
		'headers' => apply_filters( 'vpc_consultation_api_headers', array( 'Content-Type' => 'application/json', 'Accept' => 'application/json' ) ),
		'body'    => wp_json_encode( $payload ),
	) );
	if ( is_wp_error( $response ) || wp_remote_retrieve_response_code( $response ) < 200 || wp_remote_retrieve_response_code( $response ) >= 300 ) {
		error_log( 'VPC consultation lead API delivery failed.' ); // No personally identifiable data in logs.
		wp_send_json_error( array( 'message' => 'Chưa thể gửi thông tin đến bộ phận tư vấn. Vui lòng thử lại hoặc gọi hotline.' ), 502 );
	}
	set_transient( $rate_key, 1, MINUTE_IN_SECONDS );

	wp_send_json_success( array(
		'message' => 'Cảm ơn Ba/Mẹ đã gửi thông tin. Đội ngũ chuyên gia y tế của Vạn Phúc Care sẽ liên hệ tư vấn chi tiết trong thời gian sớm nhất.',
	) );
}

add_action( 'wp_ajax_vpc_submit_consultation', 'vpc_handle_consultation_submission' );
add_action( 'wp_ajax_nopriv_vpc_submit_consultation', 'vpc_handle_consultation_submission' );
