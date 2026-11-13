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
			'has_archive'        => false,
			'rewrite'            => false,
			'supports'           => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'page-attributes' ),
			'menu_position'      => 21,
			'publicly_queryable' => false,
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

/**
 * Renders custom term meta fields for the 'kien-thuc' category and its subcategories.
 *
 * For the main 'kien-thuc' category: provides 4 curated slots (Hero + 3 sub cards).
 * For knowledge sub-categories (Mang thai, EASY, Ăn dặm...): provides 2 to 5 pinned slots.
 *
 * @param WP_Term $term Current taxonomy term object.
 * @return void
 */
function vpc_category_featured_fields( $term ) {
	if ( ! ( $term instanceof WP_Term ) || ! function_exists( 'vpc_is_knowledge_category' ) || ! vpc_is_knowledge_category( $term ) ) {
		return;
	}

	$is_parent_kt = ( 'kien-thuc' === $term->slug );
	$saved_slots  = get_term_meta( $term->term_id, 'vpc_featured_post_ids', true );
	if ( ! is_array( $saved_slots ) ) {
		$saved_slots = array();
	}

	// Fetch up to 100 published posts in this category context for selection.
	$knowledge_posts = get_posts( array(
		'post_type'      => 'post',
		'post_status'    => 'publish',
		'cat'            => (int) $term->term_id,
		'posts_per_page' => 100,
		'orderby'        => 'date',
		'order'          => 'DESC',
	) );

	if ( $is_parent_kt ) {
		// Slot definitions matching Figma layout for main Knowledge page.
		$slots = array(
			1 => array(
				'label' => __( 'Vị trí 1 (Hero lớn)', 'vanphuccare' ),
				'desc'  => __( 'Hiển thị thẻ bài viết lớn nhất ở hàng trên cùng của mục Bài viết nổi bật.', 'vanphuccare' ),
			),
			2 => array(
				'label' => __( 'Vị trí 2', 'vanphuccare' ),
				'desc'  => __( 'Thẻ nhỏ bên trái ở hàng 3 bài bên dưới.', 'vanphuccare' ),
			),
			3 => array(
				'label' => __( 'Vị trí 3', 'vanphuccare' ),
				'desc'  => __( 'Thẻ nhỏ ở giữa ở hàng 3 bài bên dưới.', 'vanphuccare' ),
			),
			4 => array(
				'label' => __( 'Vị trí 4', 'vanphuccare' ),
				'desc'  => __( 'Thẻ nhỏ bên phải ở hàng 3 bài bên dưới.', 'vanphuccare' ),
			),
		);
		$banner_title = __( '⭐ Cấu hình 4 bài viết nổi bật trang chủ Kiến thức (Knowledge Featured Articles)', 'vanphuccare' );
		$banner_desc  = __( 'Chủ động chọn chính xác bài viết xuất hiện tại 4 vị trí Hero trang Kiến thức. Vị trí nào để trống sẽ tự động lấy bài mới nhất trong chuyên mục.', 'vanphuccare' );
		$empty_label  = __( '-- Tự động lấy bài mới nhất --', 'vanphuccare' );
	} else {
		// Sub-categories: 2 to 5 pinned slots matching client requirement.
		$slots = array(
			1 => array(
				'label' => __( 'Vị trí ghim 1', 'vanphuccare' ),
				'desc'  => __( 'Bài viết đứng đầu tiên trong danh sách chuyên mục.', 'vanphuccare' ),
			),
			2 => array(
				'label' => __( 'Vị trí ghim 2', 'vanphuccare' ),
				'desc'  => __( 'Bài viết đứng thứ hai trong danh sách chuyên mục.', 'vanphuccare' ),
			),
			3 => array(
				'label' => __( 'Vị trí ghim 3', 'vanphuccare' ),
				'desc'  => __( 'Bài viết đứng thứ ba.', 'vanphuccare' ),
			),
			4 => array(
				'label' => __( 'Vị trí ghim 4', 'vanphuccare' ),
				'desc'  => __( 'Bài viết đứng thứ tư.', 'vanphuccare' ),
			),
			5 => array(
				'label' => __( 'Vị trí ghim 5', 'vanphuccare' ),
				'desc'  => __( 'Bài viết đứng thứ năm.', 'vanphuccare' ),
			),
		);
		/* translators: %s: Category name */
		$banner_title = sprintf( __( '📌 Cấu hình bài viết ghim nổi bật chuyên mục: %s (Pinned Posts 2-5 bài)', 'vanphuccare' ), esc_html( $term->name ) );
		/* translators: %s: Category name */
		$banner_desc  = sprintf( __( 'Chọn từ 2 đến 5 bài viết để ghim lên đầu danh sách bài viết của chuyên mục "%s". Các bài ghim sẽ luôn đứng ở vị trí đầu tiên trên Trang 1, các bài viết mới hơn sẽ xuất hiện nối tiếp ngay phía dưới. Vị trí nào để trống sẽ không ghim.', 'vanphuccare' ), esc_html( $term->name ) );
		$empty_label  = __( '-- Không ghim (để trống) --', 'vanphuccare' );
	}

	wp_nonce_field( 'vpc_save_category_featured', 'vpc_category_featured_nonce' );
	?>
	<tr class="form-field">
		<th scope="row" colspan="2" style="padding-top: 24px; padding-bottom: 8px;">
			<div style="background: #eef6fb; border-left: 4px solid #1a77ba; padding: 12px 16px; border-radius: 4px;">
				<h3 style="margin: 0 0 6px 0; color: #1a77ba; font-size: 15px; font-weight: 700;">
					<?php echo esc_html( $banner_title ); ?>
				</h3>
				<p style="margin: 0; color: #444; font-size: 13px;">
					<?php echo esc_html( $banner_desc ); ?>
				</p>
			</div>
		</th>
	</tr>
	<?php
	foreach ( $slots as $slot_num => $slot_info ) :
		$field_name  = 'vpc_featured_slot_' . $slot_num;
		$custom_name = 'vpc_featured_custom_id_' . $slot_num;
		$selected_id = isset( $saved_slots[ $slot_num ] ) ? absint( $saved_slots[ $slot_num ] ) : 0;

		// Ensure currently selected post is in the dropdown even if older than 100 posts,
		// but only if it legitimately belongs to this category hierarchy.
		$options_posts = $knowledge_posts;
		if ( $selected_id > 0 && ! in_array( $selected_id, wp_list_pluck( $options_posts, 'ID' ), true ) ) {
			$custom_selected_post = get_post( $selected_id );
			$is_valid_category    = function_exists( 'vpc_post_in_category_tree' )
				? vpc_post_in_category_tree( $custom_selected_post, $term->term_id )
				: ( ( $custom_selected_post instanceof WP_Post ) && 'publish' === $custom_selected_post->post_status );

			if ( $custom_selected_post && $is_valid_category ) {
				array_unshift( $options_posts, $custom_selected_post );
			}
		}
		?>
		<tr class="form-field term-featured-slot-wrap">
			<th scope="row">
				<label for="<?php echo esc_attr( $field_name ); ?>">
					<strong><?php echo esc_html( $slot_info['label'] ); ?></strong>
				</label>
			</th>
			<td>
				<div style="display: flex; gap: 10px; align-items: center; max-width: 680px; flex-wrap: wrap;">
					<select id="<?php echo esc_attr( $field_name ); ?>" name="<?php echo esc_attr( $field_name ); ?>" style="flex: 1 1 360px; min-width: 280px;" onchange="var inp = document.getElementById('<?php echo esc_attr( $custom_name ); ?>'); if (inp) { inp.value = this.value > 0 ? this.value : ''; }">
						<option value="0"><?php echo esc_html( $empty_label ); ?></option>
						<?php foreach ( $options_posts as $p ) : ?>
							<option value="<?php echo esc_attr( $p->ID ); ?>" <?php selected( $selected_id, $p->ID ); ?>>
								[#<?php echo esc_html( $p->ID ); ?>] <?php echo esc_html( wp_trim_words( $p->post_title, 14, '...' ) ); ?> (<?php echo esc_html( get_the_date( 'd/m/Y', $p ) ); ?>)
							</option>
						<?php endforeach; ?>
					</select>
					<div style="display: flex; align-items: center; gap: 4px;">
						<span style="color: #666; font-size: 12px;"><?php esc_html_e( 'Hoặc ID:', 'vanphuccare' ); ?></span>
						<input type="number" id="<?php echo esc_attr( $custom_name ); ?>" name="<?php echo esc_attr( $custom_name ); ?>" value="<?php echo $selected_id > 0 ? esc_attr( $selected_id ) : ''; ?>" placeholder="<?php esc_attr_e( 'Post ID', 'vanphuccare' ); ?>" style="width: 100px;" min="1" oninput="var sel = document.getElementById('<?php echo esc_attr( $field_name ); ?>'); if (sel) { sel.value = this.value; }">
					</div>
				</div>
				<p class="description" style="margin-top: 4px;"><?php echo esc_html( $slot_info['desc'] ); ?></p>
			</td>
		</tr>
	<?php endforeach; ?>
	<?php
}
add_action( 'category_edit_form_fields', 'vpc_category_featured_fields', 10, 1 );

/**
 * Saves and validates custom term meta fields for knowledge categories.
 *
 * Enforces server-side validation:
 * 1. Post must exist and be in 'publish' status.
 * 2. Post must belong to knowledge hierarchy.
 * 3. Prevents duplicate posts across slots.
 *
 * @param int $term_id Current term ID.
 * @return void
 */
function vpc_save_category_featured_fields( $term_id ) {
	if ( ! isset( $_POST['vpc_category_featured_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['vpc_category_featured_nonce'] ) ), 'vpc_save_category_featured' ) ) {
		return;
	}

	if ( ! current_user_can( 'edit_term', $term_id ) ) {
		return;
	}

	$term = get_term( $term_id, 'category' );
	if ( ! ( $term instanceof WP_Term ) || ! function_exists( 'vpc_is_knowledge_category' ) || ! vpc_is_knowledge_category( $term ) ) {
		return;
	}

	$is_parent_kt = ( 'kien-thuc' === $term->slug );
	$max_slots    = $is_parent_kt ? 4 : 5;

	$featured_ids = array();
	$used_ids     = array();

	for ( $i = 1; $i <= $max_slots; $i++ ) {
		$select_key = 'vpc_featured_slot_' . $i;
		$custom_key = 'vpc_featured_custom_id_' . $i;

		$val = 0;
		// Prioritize custom ID input if explicitly provided, otherwise use select value.
		if ( isset( $_POST[ $custom_key ] ) && '' !== trim( (string) $_POST[ $custom_key ] ) ) {
			$val = absint( $_POST[ $custom_key ] );
		} elseif ( isset( $_POST[ $select_key ] ) ) {
			$val = absint( $_POST[ $select_key ] );
		}

		// Server-side validation: must belong to current category hierarchy, be published, and not duplicate.
		if ( $val > 0 ) {
			$post_obj = get_post( $val );
			$is_valid_cat = function_exists( 'vpc_post_in_category_tree' )
				? vpc_post_in_category_tree( $post_obj, $term_id )
				: ( ( $post_obj instanceof WP_Post )
					&& 'publish' === $post_obj->post_status
					&& ( function_exists( 'vanphuccare_is_knowledge_post' ) ? vanphuccare_is_knowledge_post( $post_obj ) : false ) );

			$is_valid = $is_valid_cat && ! in_array( $val, $used_ids, true );

			if ( $is_valid ) {
				$featured_ids[ $i ] = $val;
				$used_ids[]         = $val;
			} else {
				// Reset invalid or duplicate slot to 0.
				$featured_ids[ $i ] = 0;
			}
		} else {
			$featured_ids[ $i ] = 0;
		}
	}

	update_term_meta( $term_id, 'vpc_featured_post_ids', $featured_ids );
}
add_action( 'edited_category', 'vpc_save_category_featured_fields', 10, 1 );
