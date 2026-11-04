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
 * Resolve a theme image through WordPress Media Library when the match is
 * unambiguous, while retaining the checked theme asset as a safe fallback.
 *
 * The resolver deliberately matches the attachment's stored file basename,
 * not a guessed URL or a similar-looking image. Sites with duplicate media
 * basenames are left on the theme fallback until an explicit Attachment ID is
 * supplied through the `vpc_image_attachment_id` filter or the corresponding
 * theme mod (`vpc_image_<slug>_id`).
 *
 * @param string $path Relative path below assets/images/.
 * @param string $size WordPress image size to request for a resolved media item.
 * @return string
 */
function vpc_image_url( $path, $size = 'full' ) {
	$path = ltrim( wp_normalize_path( rawurldecode( (string) $path ) ), '/' );
	if ( '' === $path || false !== strpos( $path, '..' ) ) {
		return '';
	}

	$slug = sanitize_key( preg_replace( '/[^a-z0-9]+/i', '_', $path ) );
	$attachment_id = absint( get_theme_mod( 'vpc_image_' . $slug . '_id', 0 ) );

	if ( ! $attachment_id ) {
		$attachment_id = vpc_find_attachment_id_by_filename( $path );
	}

	$attachment_id = absint( apply_filters( 'vpc_image_attachment_id', $attachment_id, $path ) );
	if ( $attachment_id && wp_attachment_is_image( $attachment_id ) ) {
		$media_url = wp_get_attachment_image_url( $attachment_id, $size );
		if ( $media_url ) {
			return $media_url;
		}
	}

	$theme_file = get_theme_file_path( 'assets/images/' . $path );
	return file_exists( $theme_file ) ? get_theme_file_uri( 'assets/images/' . $path ) : '';
}

/**
 * Find a Media Library image only when its stored filename is unique.
 *
 * @param string $path Relative image path or filename.
 * @return int
 */
function vpc_find_attachment_id_by_filename( $path ) {
	static $cache = array();
	static $basename_index = null;

	$path_key = strtolower( wp_normalize_path( (string) $path ) );
	if ( array_key_exists( $path_key, $cache ) ) {
		return $cache[ $path_key ];
	}

	$filename = strtolower( wp_basename( $path_key ) );
	if ( null === $basename_index ) {
		$basename_index = array();
		$attachments     = get_posts(
			array(
				'post_type'      => 'attachment',
				'post_status'    => 'inherit',
				'posts_per_page' => -1,
				'fields'         => 'ids',
				'no_found_rows'  => true,
				'meta_key'       => '_wp_attached_file',
			)
		);

		foreach ( $attachments as $attachment_id ) {
			if ( ! wp_attachment_is_image( $attachment_id ) ) {
				continue;
			}

			$attached_file = strtolower( wp_normalize_path( (string) get_post_meta( $attachment_id, '_wp_attached_file', true ) ) );
			$basename      = strtolower( wp_basename( $attached_file ) );
			if ( '' !== $basename ) {
				$basename_index[ $basename ][] = absint( $attachment_id );
			}
		}
	}

	$matches             = $basename_index[ $filename ] ?? array();
	$cache[ $path_key ] = 1 === count( $matches ) ? $matches[0] : 0;
	return $cache[ $path_key ];
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
