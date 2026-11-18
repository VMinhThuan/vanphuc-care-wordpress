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

	// Backward compatibility: If recruitment application is submitted to consultation endpoint, route to recruitment handler.
	if ( isset( $_POST['recruitment_consent'] ) || ( isset( $_POST['question'] ) && false !== strpos( (string) $_POST['question'], 'Ứng tuyển' ) ) ) {
		vpc_handle_recruitment_submission();
		return;
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
	$service   = isset( $_POST['service'] ) ? sanitize_text_field( wp_unslash( $_POST['service'] ) ) : ( isset( $_POST['service_interest'] ) ? sanitize_text_field( wp_unslash( $_POST['service_interest'] ) ) : '' );
	$service_package   = isset( $_POST['service_package'] ) ? sanitize_text_field( wp_unslash( $_POST['service_package'] ) ) : ( isset( $_POST['package'] ) ? sanitize_text_field( wp_unslash( $_POST['package'] ) ) : '' );
	$room_tier         = isset( $_POST['room_tier'] ) ? sanitize_text_field( wp_unslash( $_POST['room_tier'] ) ) : ( isset( $_POST['room'] ) ? sanitize_text_field( wp_unslash( $_POST['room'] ) ) : '' );
	$pregnancy_stage   = isset( $_POST['pregnancy_stage'] ) ? sanitize_text_field( wp_unslash( $_POST['pregnancy_stage'] ) ) : '';
	$gestational_age   = isset( $_POST['gestational_age'] ) ? sanitize_text_field( wp_unslash( $_POST['gestational_age'] ) ) : ( isset( $_POST['stage_choice'] ) ? sanitize_text_field( wp_unslash( $_POST['stage_choice'] ) ) : ( isset( $_POST['pregnancy_week'] ) ? sanitize_text_field( wp_unslash( $_POST['pregnancy_week'] ) ) : '' ) );
	$expected_due_date = isset( $_POST['expected_due_date'] ) ? sanitize_text_field( wp_unslash( $_POST['expected_due_date'] ) ) : ( isset( $_POST['due_date'] ) ? sanitize_text_field( wp_unslash( $_POST['due_date'] ) ) : '' );
	$address           = isset( $_POST['address'] ) ? sanitize_text_field( wp_unslash( $_POST['address'] ) ) : '';
	$question  = isset( $_POST['question'] ) ? sanitize_textarea_field( wp_unslash( $_POST['question'] ) ) : ( isset( $_POST['customer_note'] ) ? sanitize_textarea_field( wp_unslash( $_POST['customer_note'] ) ) : ( isset( $_POST['note'] ) ? sanitize_textarea_field( wp_unslash( $_POST['note'] ) ) : '' ) );
	$captcha_token     = isset( $_POST['captcha_token'] ) ? sanitize_text_field( wp_unslash( $_POST['captcha_token'] ) ) : ( isset( $_POST['cf-turnstile-response'] ) ? sanitize_text_field( wp_unslash( $_POST['cf-turnstile-response'] ) ) : ( isset( $_POST['captchaToken'] ) ? sanitize_text_field( wp_unslash( $_POST['captchaToken'] ) ) : '' ) );
	$client_submission_id = isset( $_POST['submission_id'] ) ? sanitize_text_field( wp_unslash( $_POST['submission_id'] ) ) : ( isset( $_POST['idempotency_key'] ) ? sanitize_text_field( wp_unslash( $_POST['idempotency_key'] ) ) : '' );

	if ( empty( $full_name ) || empty( $phone ) ) {
		wp_send_json_error( array(
			'message' => 'Vui lòng nhập đầy đủ họ tên và số điện thoại liên hệ.',
		), 400 );
	}
	if ( ! empty( $email ) && ! is_email( $email ) ) {
		wp_send_json_error( array( 'message' => 'Email không hợp lệ. Vui lòng kiểm tra lại.' ), 400 );
	}

	$services = vpc_get_consultation_services() + array(
		'tam-be-so-sinh'       => 'Tắm bé sau sinh',
		'tam-be-tai-nha'       => 'Tắm bé sau sinh',
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
	$pregnancy_stages = array(
		'dang-mang-thai'     => 'Đang mang thai',
		'chuan-bi-mang-thai' => 'Chuẩn bị mang thai',
		'da-sinh-be'         => 'Đã sinh bé',
	);

	if ( ! empty( $service ) && ! isset( $services[ $service ] ) ) {
		wp_send_json_error( array(
			'message' => 'Vui lòng chọn dịch vụ bạn quan tâm.',
		), 400 );
	}
	$service_label = ! empty( $service ) ? ( $services[ $service ] ?? $service ) : '';

	if ( ! empty( $pregnancy_stage ) && ! isset( $pregnancy_stages[ $pregnancy_stage ] ) ) {
		wp_send_json_error( array(
			'message' => 'Vui lòng chọn đúng giai đoạn thai kỳ.',
		), 400 );
	}
	$pregnancy_stage_label = ! empty( $pregnancy_stage ) ? ( $pregnancy_stages[ $pregnancy_stage ] ?? $pregnancy_stage ) : '';

	if ( ! empty( $gestational_age ) && ! isset( $gestational_age_options[ $gestational_age ] ) ) {
		wp_send_json_error( array(
			'message' => 'Vui lòng chọn giai đoạn hoặc tuần thai phù hợp.',
		), 400 );
	}
	$gestational_age_label = ! empty( $gestational_age ) ? ( $gestational_age_options[ $gestational_age ] ?? $gestational_age ) : '';

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

	$payload = array(
		'fullName' => $full_name,
		'phone'    => $clean_phone,
	);
	if ( ! empty( $service_label ) ) {
		$payload['serviceInterest'] = $service_label;
	}
	if ( ! empty( $service_package ) ) {
		$payload['servicePackage'] = $service_package;
	}
	if ( ! empty( $room_tier ) ) {
		$payload['roomTier'] = $room_tier;
	}
	if ( ! empty( $pregnancy_stage_label ) ) {
		$payload['pregnancyStage'] = $pregnancy_stage_label;
	}
	if ( ! empty( $gestational_age_label ) ) {
		$payload['pregnancyWeek'] = $gestational_age_label;
	}
	if ( ! empty( $expected_due_date ) ) {
		$payload['expectedDueDate'] = $expected_due_date;
	}
	if ( ! empty( $email ) ) {
		$payload['email'] = $email;
	}
	if ( ! empty( $address ) ) {
		$payload['address'] = $address;
	}
	if ( ! empty( $question ) ) {
		$payload['note'] = $question;
	}
	if ( ! empty( $captcha_token ) ) {
		$payload['captchaToken'] = $captcha_token;
	}

	$uuid_v4_regex = '/^[0-9a-f]{8}-[0-9a-f]{4}-4[0-9a-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12}$/i';
	if ( ! empty( $client_submission_id ) && preg_match( $uuid_v4_regex, $client_submission_id ) ) {
		$submission_id = strtolower( $client_submission_id );
	} else {
		$submission_id = function_exists( 'wp_generate_uuid4' ) ? wp_generate_uuid4() : sprintf( '%04x%04x-%04x-4%03x-%04x-%04x%04x%04x', mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0x0fff ), mt_rand( 0, 0x8000, 0xbfff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ) );
	}
	$origin = function_exists( 'untrailingslashit' ) ? untrailingslashit( home_url() ) : rtrim( home_url(), '/' );

	$default_headers = array(
		'Content-Type'    => 'application/json',
		'Accept'          => 'application/json',
		'Idempotency-Key' => $submission_id,
		'Origin'          => $origin,
	);

	$response = wp_remote_post( $endpoint, array(
		'timeout' => 12,
		'headers' => apply_filters( 'vpc_consultation_api_headers', $default_headers ),
		'body'    => wp_json_encode( apply_filters( 'vpc_consultation_api_payload', $payload, compact( 'full_name', 'clean_phone', 'email', 'service', 'pregnancy_stage', 'gestational_age', 'question' ) ) ),
	) );

	$response_code = wp_remote_retrieve_response_code( $response );
	$response_body = wp_remote_retrieve_body( $response );
	$decoded_res   = is_string( $response_body ) ? json_decode( $response_body, true ) : null;

	$lead_id  = ( isset( $decoded_res['data']['leadId'] ) && is_string( $decoded_res['data']['leadId'] ) ) ? trim( $decoded_res['data']['leadId'] ) : '';
	$event_id = ( isset( $decoded_res['data']['eventId'] ) && is_string( $decoded_res['data']['eventId'] ) ) ? trim( $decoded_res['data']['eventId'] ) : '';
	$is_business_success = ( is_array( $decoded_res ) && ! empty( $decoded_res['status'] ) && true === $decoded_res['status'] && ! empty( $lead_id ) );

	if ( is_wp_error( $response ) || $response_code < 200 || $response_code >= 300 || ! $is_business_success ) {
		error_log( 'VPC consultation lead API delivery failed. HTTP: ' . $response_code ); // No personally identifiable data in logs.
		$error_message = ( is_array( $decoded_res ) && ! empty( $decoded_res['message'] ) ) ? $decoded_res['message'] : ( ( is_array( $decoded_res ) && ! empty( $decoded_res['error']['message'] ) ) ? $decoded_res['error']['message'] : 'Chưa thể gửi thông tin đến bộ phận tư vấn. Vui lòng thử lại hoặc gọi hotline.' );
		$error_code    = ( is_array( $decoded_res ) && ! empty( $decoded_res['error']['code'] ) ) ? $decoded_res['error']['code'] : ( ( $response_code < 200 || $response_code >= 300 ) ? 'API_DELIVERY_FAILED' : 'BUSINESS_REJECTED' );
		wp_send_json_error( array(
			'message' => $error_message,
			'code'    => $error_code,
		), ( $response_code >= 400 && $response_code < 600 ) ? $response_code : 502 );
	}
	set_transient( $rate_key, 1, MINUTE_IN_SECONDS );

	wp_send_json_success( array(
		'message' => 'Cảm ơn Ba/Mẹ đã gửi thông tin. Đội ngũ chuyên gia y tế của Vạn Phúc Care sẽ liên hệ tư vấn chi tiết trong thời gian sớm nhất.',
		'leadId'  => $lead_id,
		'eventId' => $event_id,
	) );
}

add_action( 'wp_ajax_vpc_submit_consultation', 'vpc_handle_consultation_submission' );
add_action( 'wp_ajax_nopriv_vpc_submit_consultation', 'vpc_handle_consultation_submission' );

/**
 * Handles AJAX recruitment application submissions and synchronizes with Getfly CRM.
 *
 * @return void
 */
function vpc_handle_recruitment_submission() {
	// Verify nonce
	$nonce = isset( $_POST['nonce'] ) ? sanitize_text_field( wp_unslash( $_POST['nonce'] ) ) : '';
	if ( empty( $nonce ) || ! wp_verify_nonce( $nonce, 'vpc_consultation_nonce' ) ) {
		wp_send_json_error( array(
			'message' => 'Phiên làm việc đã hết hạn. Vui lòng tải lại trang và thử lại.',
		), 403 );
	}

	// Honeypot field
	if ( ! empty( $_POST['website'] ) ) {
		wp_send_json_error( array(
			'message' => 'Không thể gửi thông tin. Vui lòng thử lại.',
		), 400 );
	}

	// Rate limiting: 1 submission per 20 seconds per IP
	$remote_address = isset( $_SERVER['REMOTE_ADDR'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REMOTE_ADDR'] ) ) : '';
	$rate_key       = 'vpc_recruitment_' . md5( $remote_address );
	if ( get_transient( $rate_key ) ) {
		wp_send_json_error( array(
			'message' => 'Bạn vừa gửi hồ sơ. Vui lòng chờ ít phút trước khi gửi lại.',
		), 429 );
	}

	$full_name = isset( $_POST['full_name'] ) ? sanitize_text_field( wp_unslash( $_POST['full_name'] ) ) : '';
	$phone     = isset( $_POST['phone'] ) ? sanitize_text_field( wp_unslash( $_POST['phone'] ) ) : '';
	$email     = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
	$question  = isset( $_POST['question'] ) ? sanitize_textarea_field( wp_unslash( $_POST['question'] ) ) : 'Ứng tuyển trực tuyến';
	$role      = isset( $_POST['recruitment_role'] ) ? sanitize_text_field( wp_unslash( $_POST['recruitment_role'] ) ) : '';

	if ( empty( $full_name ) || empty( $phone ) ) {
		wp_send_json_error( array(
			'message' => 'Vui lòng nhập đầy đủ họ tên và số điện thoại liên hệ.',
		), 400 );
	}

	$clean_phone = vpc_normalize_vietnamese_phone( $phone );
	if ( empty( $clean_phone ) ) {
		wp_send_json_error( array(
			'message' => 'Vui lòng nhập số điện thoại di động Việt Nam gồm 10 chữ số.',
		), 400 );
	}

	if ( ! empty( $email ) && ! is_email( $email ) ) {
		wp_send_json_error( array(
			'message' => 'Email không hợp lệ. Vui lòng kiểm tra lại.',
		), 400 );
	}

	// Validate attached CV file if present
	$has_file = ( isset( $_FILES['cv'] ) && ! empty( $_FILES['cv']['name'] ) && ! empty( $_FILES['cv']['tmp_name'] ) && is_uploaded_file( $_FILES['cv']['tmp_name'] ) );
	$file_orig_name = '';
	$file_mime      = '';

	if ( $has_file ) {
		if ( UPLOAD_ERR_OK !== $_FILES['cv']['error'] ) {
			wp_send_json_error( array(
				'message' => 'Có lỗi khi tải tệp CV. Vui lòng kiểm tra lại tệp tin.',
			), 400 );
		}

		if ( $_FILES['cv']['size'] > 5 * 1024 * 1024 ) {
			wp_send_json_error( array(
				'message' => 'Kích thước tệp CV vượt quá giới hạn cho phép (tối đa 5 MB).',
			), 400 );
		}

		$file_ext = strtolower( pathinfo( $_FILES['cv']['name'], PATHINFO_EXTENSION ) );
		$allowed_exts = array( 'pdf', 'doc', 'docx' );
		if ( ! in_array( $file_ext, $allowed_exts, true ) ) {
			wp_send_json_error( array(
				'message' => 'Định dạng tệp không được hỗ trợ. Vui lòng chọn tệp PDF, DOC hoặc DOCX.',
			), 400 );
		}

		$file_orig_name = sanitize_file_name( $_FILES['cv']['name'] );
		$file_mime      = ! empty( $_FILES['cv']['type'] ) ? sanitize_mime_type( $_FILES['cv']['type'] ) : 'application/pdf';
	}

	// Prepare Getfly CRM payload
	$getfly_endpoint = apply_filters( 'vpc_getfly_recruitment_endpoint', 'https://vanphuccare.getflycrm.com/api/opp/regis' );
	$getfly_key      = apply_filters( 'vpc_getfly_recruitment_key', '0QT45oRxVq5c2fvoYv45b0QR5SodQ2oeUrIj11AqLY4knjKDl1' );
	$token_api       = apply_filters( 'vpc_getfly_token_api', 'l4Mg51cEF1' );
	$referer         = ! empty( $_SERVER['HTTP_REFERER'] ) ? esc_url_raw( wp_unslash( $_SERVER['HTTP_REFERER'] ) ) : home_url( '/tuyen-dung/' );

	$description = $question;
	if ( ! empty( $role ) ) {
		$role_labels = array(
			'dieu-duong-ho-sinh' => 'Điều dưỡng / Hộ sinh',
			'cham-soc-me-be'     => 'Chăm sóc mẹ và bé',
			'khac'               => 'Khác',
		);
		$description .= ' · Nhóm nghề: ' . ( isset( $role_labels[ $role ] ) ? $role_labels[ $role ] : $role );
	}

	$data_form = array(
		'user_id'              => '1',
		'recipient'            => '',
		'token_api'            => $token_api,
		'opportunity_status'   => '49',
		'opp_type_source'      => 'Website Tuyển dụng',
		'opp_source_content'   => 'vanphuccare.vn',
		'account_type'         => '11',
		'key'                  => $getfly_key,
		'opp_url_source'       => $referer,
		'contact_name'         => $full_name,
		'account_email'        => $email,
		'account_phone'        => $clean_phone,
		'account_description'  => $description,
		'custom_fields'        => new stdClass(),
		'utm_params'           => new stdClass(),
	);

	$response_code = 0;
	$response_body = '';

	if ( function_exists( 'curl_init' ) ) {
		$ch = curl_init();
		$post_fields = array(
			'data_form' => wp_json_encode( $data_form ),
		);
		if ( $has_file ) {
			$post_fields['userfile[]'] = new CURLFile( $_FILES['cv']['tmp_name'], $file_mime, $file_orig_name );
		}
		curl_setopt_array( $ch, array(
			CURLOPT_URL            => $getfly_endpoint,
			CURLOPT_POST           => true,
			CURLOPT_POSTFIELDS     => $post_fields,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_TIMEOUT        => 25,
			CURLOPT_SSL_VERIFYPEER => true,
			CURLOPT_HTTPHEADER     => array(
				'Origin: https://vanphuccare.getflycrm.com',
				'Referer: https://vanphuccare.getflycrm.com/api/forms/viewform/?key=' . $getfly_key,
			),
		) );
		$response_body = curl_exec( $ch );
		$response_code = (int) curl_getinfo( $ch, CURLINFO_HTTP_CODE );
		curl_close( $ch );
	} else {
		$boundary = wp_generate_password( 24, false );
		$headers  = array(
			'content-type' => 'multipart/form-data; boundary=' . $boundary,
			'Origin'       => 'https://vanphuccare.getflycrm.com',
			'Referer'      => 'https://vanphuccare.getflycrm.com/api/forms/viewform/?key=' . $getfly_key,
		);
		$body = "--{$boundary}\r\n";
		$body .= "Content-Disposition: form-data; name=\"data_form\"\r\n\r\n";
		$body .= wp_json_encode( $data_form ) . "\r\n";

		if ( $has_file ) {
			$file_contents = file_get_contents( $_FILES['cv']['tmp_name'] );
			$body .= "--{$boundary}\r\n";
			$body .= "Content-Disposition: form-data; name=\"userfile[]\"; filename=\"" . esc_attr( $file_orig_name ) . "\"\r\n";
			$body .= "Content-Type: {$file_mime}\r\n\r\n";
			$body .= $file_contents . "\r\n";
		}
		$body .= "--{$boundary}--\r\n";

		$response = wp_remote_post( $getfly_endpoint, array(
			'timeout' => 25,
			'headers' => $headers,
			'body'    => $body,
		) );
		$response_code = (int) wp_remote_retrieve_response_code( $response );
		$response_body = wp_remote_retrieve_body( $response );
	}

	$decoded = is_string( $response_body ) ? json_decode( $response_body, true ) : null;
	$is_success = ( 200 === $response_code && is_array( $decoded ) && ! empty( $decoded['status'] ) && true === $decoded['status'] );

	if ( $is_success ) {
		set_transient( $rate_key, 1, 20 );
		wp_send_json_success( array(
			'message' => 'Chúc mừng! Bạn đã ứng tuyển thành công. Bộ phận tuyển dụng sẽ liên hệ lại với bạn trong vòng 24h.',
		) );
	}

	$error_msg = 'Chưa thể gửi hồ sơ đến hệ thống tuyển dụng. Vui lòng thử lại sau hoặc liên hệ hotline.';
	if ( is_array( $decoded ) && ! empty( $decoded['message'] ) ) {
		$error_msg = $decoded['message'];
	} elseif ( is_array( $decoded ) && ! empty( $decoded['errors'] ) ) {
		$error_msg = wp_strip_all_tags( $decoded['errors'] );
	}

	wp_send_json_error( array(
		'message' => $error_msg,
	), 400 );
}
add_action( 'wp_ajax_vpc_submit_recruitment', 'vpc_handle_recruitment_submission' );
add_action( 'wp_ajax_nopriv_vpc_submit_recruitment', 'vpc_handle_recruitment_submission' );
