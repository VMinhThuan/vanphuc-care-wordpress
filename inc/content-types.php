<?php
/**
 * Service and prenatal-class content types.
 *
 * The fields below use WordPress post meta rather than an ACF dependency, so
 * they remain available when the theme is installed on a clean WordPress site.
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Returns field definitions shared by the REST registration and the edit UI.
 *
 * @return array<string, array<string, array<string, mixed>>>
 */
function vpc_get_content_meta_fields() {
	return array(
		'vpc_service'       => array(
			'vpc_service_subtitle'          => array( 'label' => 'Tiêu đề phụ', 'type' => 'text', 'sanitize_callback' => 'sanitize_text_field' ),
			'vpc_service_summary'           => array( 'label' => 'Mô tả ngắn', 'type' => 'textarea', 'sanitize_callback' => 'sanitize_textarea_field' ),
			'vpc_service_price_label'       => array( 'label' => 'Giá / nhãn giá', 'type' => 'text', 'placeholder' => 'Ví dụ: Từ 2.500.000đ', 'sanitize_callback' => 'sanitize_text_field' ),
			'vpc_service_duration'          => array( 'label' => 'Thời lượng', 'type' => 'text', 'placeholder' => 'Ví dụ: 90 phút / buổi', 'sanitize_callback' => 'sanitize_text_field' ),
			'vpc_service_location'          => array( 'label' => 'Khu vực phục vụ', 'type' => 'text', 'placeholder' => 'Ví dụ: Hà Nội & TP.HCM', 'sanitize_callback' => 'sanitize_text_field' ),
			'vpc_service_cta_label'         => array( 'label' => 'Nhãn nút đăng ký', 'type' => 'text', 'placeholder' => 'Ví dụ: Đăng ký tư vấn', 'sanitize_callback' => 'sanitize_text_field' ),
			'vpc_service_cta_url'           => array( 'label' => 'Link nút đăng ký', 'type' => 'url', 'placeholder' => 'https://…', 'sanitize_callback' => 'esc_url_raw' ),
			'vpc_service_featured'          => array( 'label' => 'Dịch vụ nổi bật', 'type' => 'checkbox', 'sanitize_callback' => 'absint' ),
		),
		'vpc_prenatal_class' => array(
			'vpc_class_start_at'            => array( 'label' => 'Thời gian bắt đầu', 'type' => 'datetime-local', 'sanitize_callback' => 'vpc_sanitize_datetime_local' ),
			'vpc_class_end_at'              => array( 'label' => 'Thời gian kết thúc', 'type' => 'datetime-local', 'sanitize_callback' => 'vpc_sanitize_datetime_local' ),
			'vpc_class_venue'               => array( 'label' => 'Địa điểm', 'type' => 'text', 'sanitize_callback' => 'sanitize_text_field' ),
			'vpc_class_instructor'          => array( 'label' => 'Giảng viên / hộ sinh', 'type' => 'text', 'sanitize_callback' => 'sanitize_text_field' ),
			'vpc_class_capacity'            => array( 'label' => 'Số chỗ tối đa', 'type' => 'number', 'min' => 1, 'sanitize_callback' => 'absint' ),
			'vpc_class_fee_label'           => array( 'label' => 'Học phí / nhãn học phí', 'type' => 'text', 'placeholder' => 'Ví dụ: Miễn phí', 'sanitize_callback' => 'sanitize_text_field' ),
			'vpc_class_registration_url'    => array( 'label' => 'Link đăng ký', 'type' => 'url', 'placeholder' => 'https://…', 'sanitize_callback' => 'esc_url_raw' ),
			'vpc_class_registration_status' => array(
				'label'             => 'Trạng thái đăng ký',
				'type'              => 'select',
				'options'           => array(
					'open'   => 'Đang nhận đăng ký',
					'full'   => 'Đã đủ chỗ',
					'closed' => 'Đã kết thúc',
				),
				'sanitize_callback' => 'vpc_sanitize_class_registration_status',
			),
		),
	);
}

/**
 * Validates a datetime-local control value before it is saved as post meta.
 *
 * @param mixed $value Submitted value.
 * @return string
 */
function vpc_sanitize_datetime_local( $value ) {
	$value = sanitize_text_field( (string) $value );
	$date  = DateTime::createFromFormat( 'Y-m-d\\TH:i', $value );

	return $date && $date->format( 'Y-m-d\\TH:i' ) === $value ? $value : '';
}

/**
 * Restricts the registration state to the supported labels.
 *
 * @param mixed $value Submitted value.
 * @return string
 */
function vpc_sanitize_class_registration_status( $value ) {
	$allowed = array( 'open', 'full', 'closed' );
	$value   = sanitize_key( (string) $value );

	return in_array( $value, $allowed, true ) ? $value : 'open';
}

/**
 * Registers the content types used for services and prenatal classes.
 *
 * @return void
 */
function vpc_register_content_types() {
	register_post_type(
		'vpc_service',
		array(
			'labels'             => array(
				'name'               => 'Dịch vụ',
				'singular_name'      => 'Dịch vụ',
				'add_new'            => 'Thêm dịch vụ',
				'add_new_item'       => 'Thêm dịch vụ mới',
				'edit_item'          => 'Sửa dịch vụ',
				'new_item'           => 'Dịch vụ mới',
				'view_item'          => 'Xem dịch vụ',
				'search_items'       => 'Tìm dịch vụ',
				'not_found'          => 'Không tìm thấy dịch vụ nào.',
				'not_found_in_trash' => 'Không có dịch vụ trong thùng rác.',
				'menu_name'          => 'Dịch vụ',
			),
			'public'             => true,
			'show_in_rest'       => true,
			'menu_icon'          => 'dashicons-heart',
			'has_archive'        => true,
			'rewrite'            => array( 'slug' => 'dich-vu', 'with_front' => false ),
			'supports'           => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'page-attributes' ),
			'menu_position'      => 21,
			'publicly_queryable' => true,
		)
	);

	register_post_type(
		'vpc_prenatal_class',
		array(
			'labels'             => array(
				'name'               => 'Lớp học tiền sản',
				'singular_name'      => 'Lớp học tiền sản',
				'add_new'            => 'Thêm lớp học',
				'add_new_item'       => 'Thêm lớp học tiền sản',
				'edit_item'          => 'Sửa lớp học tiền sản',
				'new_item'           => 'Lớp học tiền sản mới',
				'view_item'          => 'Xem lớp học tiền sản',
				'search_items'       => 'Tìm lớp học tiền sản',
				'not_found'          => 'Không tìm thấy lớp học nào.',
				'not_found_in_trash' => 'Không có lớp học trong thùng rác.',
				'menu_name'          => 'Lớp tiền sản',
			),
			'public'             => true,
			'show_in_rest'       => true,
			'menu_icon'          => 'dashicons-welcome-learn-more',
			'has_archive'        => false,
			'rewrite'            => array( 'slug' => 'lop-tien-san', 'with_front' => false ),
			'supports'           => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'page-attributes' ),
			'menu_position'      => 22,
			'publicly_queryable' => true,
		)
	);
}
add_action( 'init', 'vpc_register_content_types' );

/**
 * Registers each field for WordPress REST API and meta handling.
 *
 * @return void
 */
function vpc_register_content_meta() {
	foreach ( vpc_get_content_meta_fields() as $post_type => $fields ) {
		foreach ( $fields as $meta_key => $field ) {
			register_post_meta(
				$post_type,
				$meta_key,
				array(
					'type'              => in_array( $field['type'], array( 'checkbox', 'number' ), true ) ? 'integer' : 'string',
					'single'            => true,
					'show_in_rest'      => true,
					'sanitize_callback' => $field['sanitize_callback'],
					'auth_callback'     => function() {
						return current_user_can( 'edit_posts' );
					},
				)
			);
		}
	}
}
add_action( 'init', 'vpc_register_content_meta', 11 );

/**
 * Adds native, labelled fields to the post editor.
 *
 * @return void
 */
function vpc_add_content_meta_boxes() {
	add_meta_box( 'vpc_service_details', 'Thông tin dịch vụ', 'vpc_render_content_meta_box', 'vpc_service', 'normal', 'high' );
	add_meta_box( 'vpc_prenatal_class_details', 'Thông tin lớp học', 'vpc_render_content_meta_box', 'vpc_prenatal_class', 'normal', 'high' );
}
add_action( 'add_meta_boxes', 'vpc_add_content_meta_boxes' );

/**
 * Renders the custom field controls in the WordPress editor.
 *
 * @param WP_Post $post Current post.
 * @return void
 */
function vpc_render_content_meta_box( $post ) {
	$fields = vpc_get_content_meta_fields();
	$fields = $fields[ $post->post_type ] ?? array();

	wp_nonce_field( 'vpc_save_content_meta', 'vpc_content_meta_nonce' );
	echo '<p>Các thông tin này hiển thị cùng dịch vụ/lớp học. Nội dung chi tiết dùng phần trình soạn thảo bên trên.</p>';
	echo '<table class="form-table" role="presentation"><tbody>';

	foreach ( $fields as $meta_key => $field ) {
		$value = get_post_meta( $post->ID, $meta_key, true );
		echo '<tr><th scope="row"><label for="' . esc_attr( $meta_key ) . '">' . esc_html( $field['label'] ) . '</label></th><td>';

		if ( 'textarea' === $field['type'] ) {
			echo '<textarea class="large-text" rows="4" id="' . esc_attr( $meta_key ) . '" name="' . esc_attr( $meta_key ) . '">' . esc_textarea( $value ) . '</textarea>';
		} elseif ( 'select' === $field['type'] ) {
			echo '<select id="' . esc_attr( $meta_key ) . '" name="' . esc_attr( $meta_key ) . '">';
			foreach ( $field['options'] as $option_value => $option_label ) {
				echo '<option value="' . esc_attr( $option_value ) . '" ' . selected( $value, $option_value, false ) . '>' . esc_html( $option_label ) . '</option>';
			}
			echo '</select>';
		} elseif ( 'checkbox' === $field['type'] ) {
			echo '<label><input type="checkbox" id="' . esc_attr( $meta_key ) . '" name="' . esc_attr( $meta_key ) . '" value="1" ' . checked( (int) $value, 1, false ) . '> Hiển thị tại khu vực dịch vụ nổi bật</label>';
		} else {
			$min         = isset( $field['min'] ) ? ' min="' . esc_attr( (string) $field['min'] ) . '"' : '';
			$placeholder = isset( $field['placeholder'] ) ? ' placeholder="' . esc_attr( $field['placeholder'] ) . '"' : '';
			echo '<input class="regular-text" type="' . esc_attr( $field['type'] ) . '" id="' . esc_attr( $meta_key ) . '" name="' . esc_attr( $meta_key ) . '" value="' . esc_attr( $value ) . '"' . $min . $placeholder . '>';
		}

		echo '</td></tr>';
	}

	echo '</tbody></table>';
}

/**
 * Saves service and prenatal-class post meta securely.
 *
 * @param int $post_id Current post ID.
 * @return void
 */
function vpc_save_content_meta( $post_id ) {
	if ( ! isset( $_POST['vpc_content_meta_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['vpc_content_meta_nonce'] ) ), 'vpc_save_content_meta' ) ) {
		return;
	}

	if ( ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) || wp_is_post_revision( $post_id ) || ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	$post_type = get_post_type( $post_id );
	$all_fields = vpc_get_content_meta_fields();
	if ( ! isset( $all_fields[ $post_type ] ) ) {
		return;
	}

	foreach ( $all_fields[ $post_type ] as $meta_key => $field ) {
		if ( 'checkbox' === $field['type'] ) {
			update_post_meta( $post_id, $meta_key, isset( $_POST[ $meta_key ] ) ? 1 : 0 );
			continue;
		}

		if ( ! isset( $_POST[ $meta_key ] ) ) {
			continue;
		}

		$value = call_user_func( $field['sanitize_callback'], wp_unslash( $_POST[ $meta_key ] ) );
		update_post_meta( $post_id, $meta_key, $value );
	}
}
add_action( 'save_post', 'vpc_save_content_meta' );
