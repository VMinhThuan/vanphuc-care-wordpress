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
		'trung-tam-o-cu'       => 'Trung tâm Ở cữ',
		'bao-mau-tai-nha'      => 'Bảo mẫu tại nhà',
		'lop-hoc-tien-san'     => 'Lớp học tiền sản',
		'cham-soc-me-sau-sinh' => 'Chăm sóc mẹ sau sinh tại nhà',
		'tam-be-so-sinh'       => 'Tắm bé & massage sơ sinh',
		'thong-tac-tia-sua'    => 'Thông tắc tia sữa chuyên sâu',
		'dieu-duong-tai-nha'   => 'Điều dưỡng y tế tại nhà',
	);
}

/**
 * Resolves the consultation lead recipient from one configurable location.
 * Set the `vpc_consultation_recipient` option or filter this value when the
 * confirmed CRM/email destination is available; no recipient is hard-coded.
 *
 * @return string
 */
function vpc_get_consultation_recipient() {
	$recipient = get_theme_mod( 'vpc_consultation_recipient', get_option( 'vpc_consultation_recipient', get_option( 'admin_email' ) ) );

	return apply_filters( 'vpc_consultation_recipient', sanitize_email( $recipient ) );
}
