<?php
/**
 * Shared theme helpers.
 *
 * Add helpers here only when they are used by more than one theme component.
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Returns the single source of truth for consultation service values.
 *
 * These values are shared by the inline form, the modal and the AJAX handler,
 * so a CTA can safely preselect the same service everywhere.
 *
 * @return array<string, string>
 */
function vpc_get_consultation_services() {
	return array(
		'trung-tam-o-cu'       => 'Trung tâm ở cữ',
		'bao-mau-tai-nha'      => 'Bảo mẫu tại nhà',
		'lop-hoc-tien-san'     => 'Lớp học tiền sản',
		'khoa-hoc-truc-tiep'   => 'Khóa học trực tiếp',
		'tu-van-nuoi-con-easy' => 'Tư vấn nuôi con EASY',
		'tam-be-sau-sinh'      => 'Tắm bé sau sinh',
		'thong-tac-tia-sua'    => 'Thông tắc tia sữa',
		'cham-me-sau-sinh'     => 'Chăm mẹ sau sinh',
	);
}

/**
 * Returns the single source of truth for gestational age options (Tuần 24 đến Tuần 40).
 *
 * @return array<string, string>
 */
function vpc_get_gestational_age_options() {
	return array(
		'tuan-24' => 'Tuần 24',
		'tuan-25' => 'Tuần 25',
		'tuan-26' => 'Tuần 26',
		'tuan-27' => 'Tuần 27',
		'tuan-28' => 'Tuần 28',
		'tuan-29' => 'Tuần 29',
		'tuan-30' => 'Tuần 30',
		'tuan-31' => 'Tuần 31',
		'tuan-32' => 'Tuần 32',
		'tuan-33' => 'Tuần 33',
		'tuan-34' => 'Tuần 34',
		'tuan-35' => 'Tuần 35',
		'tuan-36' => 'Tuần 36',
		'tuan-37' => 'Tuần 37',
		'tuan-38' => 'Tuần 38',
		'tuan-39' => 'Tuần 39',
		'tuan-40' => 'Tuần 40',
	);
}

/**
 * Validates the configured external lead receiver. Lead delivery must never
 * fall back to WordPress email or post meta: that risks creating a second,
 * unverified data store for sensitive customer information.
 *
 * @return string
 */
function vpc_sanitize_consultation_api_endpoint( $endpoint ) {
	$endpoint = esc_url_raw( trim( (string) $endpoint ) );
	$parts    = wp_parse_url( $endpoint );

	if ( empty( $parts['host'] ) || empty( $parts['scheme'] ) || 'https' !== strtolower( $parts['scheme'] ) ) {
		return '';
	}

	return $endpoint;
}

/**
 * Gets the configured external HTTPS endpoint for consultation leads.
 *
 * @return string
 */
function vpc_get_consultation_api_endpoint() {
	$endpoint = get_theme_mod( 'vpc_consultation_api_endpoint', get_option( 'vpc_consultation_api_endpoint', '' ) );

	return apply_filters( 'vpc_consultation_api_endpoint', vpc_sanitize_consultation_api_endpoint( $endpoint ) );
}

/**
 * Normalizes and validates Vietnamese 10-digit mobile numbers.
 *
 * @param string $phone Submitted phone number.
 * @return string Empty when invalid; normalized number otherwise.
 */
function vpc_normalize_vietnamese_phone( $phone ) {
	$phone = preg_replace( '/[^0-9+]/', '', (string) $phone );
	if ( 0 === strpos( $phone, '+84' ) ) {
		$phone = '0' . substr( $phone, 3 );
	} elseif ( 0 === strpos( $phone, '84' ) && 11 === strlen( $phone ) ) {
		$phone = '0' . substr( $phone, 2 );
	}

	return preg_match( '/^0[35789][0-9]{8}$/', $phone ) ? $phone : '';
}
