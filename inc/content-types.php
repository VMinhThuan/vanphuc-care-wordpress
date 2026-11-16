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

/**
 * Registers the Medical Reviewer meta box for posts (placed in the right sidebar).
 *
 * @return void
 */
function vpc_add_reviewer_meta_box() {
	add_meta_box(
		'vpc_post_reviewer_meta',
		'Kiểm duyệt nội dung y khoa',
		'vpc_render_reviewer_meta_box',
		'post',
		'side',
		'high'
	);
}
add_action( 'add_meta_boxes', 'vpc_add_reviewer_meta_box' );

/**
 * Enqueues WordPress media uploader scripts for the reviewer avatar picker.
 *
 * @param string $hook Current admin page hook.
 * @return void
 */
function vpc_admin_reviewer_scripts( $hook ) {
	if ( 'post.php' === $hook || 'post-new.php' === $hook ) {
		wp_enqueue_media();
	}
}
add_action( 'admin_enqueue_scripts', 'vpc_admin_reviewer_scripts' );

/**
 * Renders the Medical Reviewer meta box in the WordPress post editor sidebar.
 *
 * @param WP_Post $post Current post object.
 * @return void
 */
function vpc_render_reviewer_meta_box( $post ) {
	wp_nonce_field( 'vpc_save_reviewer_meta', 'vpc_reviewer_meta_nonce' );

	$reviewer_name   = get_post_meta( $post->ID, 'vpc_reviewer_name', true );
	$reviewer_title  = get_post_meta( $post->ID, 'vpc_reviewer_title', true );
	$reviewer_avatar = get_post_meta( $post->ID, 'vpc_reviewer_avatar', true );
	$reviewer_url    = get_post_meta( $post->ID, 'vpc_reviewer_url', true );
	?>
	<div class="vpc-reviewer-fields" style="font-size:13px;">
		<p style="margin:0 0 10px;color:#666;line-height:1.4;">
			Nhập Bác sĩ / Cố vấn kiểm định bài viết. Nếu để trống <em>Họ và tên</em>, thẻ sẽ tự động ẩn đi.
		</p>
		<p style="margin:0 0 10px;">
			<label for="vpc_reviewer_name" style="font-weight:600;display:block;margin-bottom:3px;">Họ và tên người kiểm duyệt:</label>
			<input type="text" id="vpc_reviewer_name" name="vpc_reviewer_name" value="<?php echo esc_attr( $reviewer_name ); ?>" style="width:100%;box-sizing:border-box;" placeholder="Ví dụ: BS. Nguyễn Văn A" />
		</p>
		<p style="margin:0 0 10px;">
			<label for="vpc_reviewer_title" style="font-weight:600;display:block;margin-bottom:3px;">Chức danh · Đơn vị công tác:</label>
			<input type="text" id="vpc_reviewer_title" name="vpc_reviewer_title" value="<?php echo esc_attr( $reviewer_title ); ?>" style="width:100%;box-sizing:border-box;" placeholder="Ví dụ: Bác sĩ CKI Nhi khoa" />
		</p>
		<div style="margin:0 0 10px;">
			<label style="font-weight:600;display:block;margin-bottom:3px;">Ảnh đại diện:</label>
			<div style="display:flex;align-items:center;gap:10px;margin-bottom:4px;">
				<img id="vpc_reviewer_avatar_preview" src="<?php echo esc_url( $reviewer_avatar ); ?>" style="width:48px;height:48px;border-radius:50%;object-fit:cover;border:1px solid #ddd;<?php echo empty( $reviewer_avatar ) ? 'display:none;' : ''; ?>" alt="Preview" />
				<input type="hidden" id="vpc_reviewer_avatar" name="vpc_reviewer_avatar" value="<?php echo esc_attr( $reviewer_avatar ); ?>" />
				<button type="button" class="button button-secondary" id="vpc_reviewer_upload_btn"><?php echo empty( $reviewer_avatar ) ? 'Chọn ảnh' : 'Đổi ảnh'; ?></button>
				<button type="button" class="button button-link-delete" id="vpc_reviewer_remove_btn" style="<?php echo empty( $reviewer_avatar ) ? 'display:none;' : ''; ?>">Xóa</button>
			</div>
			<span style="font-size:11px;color:#888;">Để trống sẽ dùng avatar mặc định chuẩn Figma.</span>
		</div>
		<p style="margin:0 0 6px;">
			<label for="vpc_reviewer_url" style="font-weight:600;display:block;margin-bottom:3px;">Link thông tin (URL):</label>
			<input type="url" id="vpc_reviewer_url" name="vpc_reviewer_url" value="<?php echo esc_attr( $reviewer_url ); ?>" style="width:100%;box-sizing:border-box;" placeholder="https://... (mặc định: Giới thiệu)" />
		</p>
	</div>
	<script>
	jQuery(document).ready(function($){
		$('#vpc_reviewer_upload_btn').on('click', function(e){
			e.preventDefault();
			var frame = wp.media({
				title: 'Chọn ảnh đại diện người kiểm duyệt',
				button: { text: 'Sử dụng ảnh này' },
				multiple: false
			});
			frame.on('select', function(){
				var attachment = frame.state().get('selection').first().toJSON();
				$('#vpc_reviewer_avatar').val(attachment.url);
				$('#vpc_reviewer_avatar_preview').attr('src', attachment.url).show();
				$('#vpc_reviewer_upload_btn').text('Đổi ảnh');
				$('#vpc_reviewer_remove_btn').show();
			});
			frame.open();
		});
		$('#vpc_reviewer_remove_btn').on('click', function(e){
			e.preventDefault();
			$('#vpc_reviewer_avatar').val('');
			$('#vpc_reviewer_avatar_preview').hide();
			$('#vpc_reviewer_upload_btn').text('Chọn ảnh');
			$(this).hide();
		});
	});
	</script>
	<?php
}

/**
 * Saves Medical Reviewer meta fields securely on post save.
 *
 * @param int $post_id Saved post ID.
 * @return void
 */
function vpc_save_reviewer_meta_box( $post_id ) {
	if ( ! isset( $_POST['vpc_reviewer_meta_nonce'] ) || ! wp_verify_nonce( $_POST['vpc_reviewer_meta_nonce'], 'vpc_save_reviewer_meta' ) ) {
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	$fields = array(
		'vpc_reviewer_name'   => 'sanitize_text_field',
		'vpc_reviewer_title'  => 'sanitize_text_field',
		'vpc_reviewer_avatar' => 'esc_url_raw',
		'vpc_reviewer_url'    => 'esc_url_raw',
	);

	foreach ( $fields as $field => $sanitizer ) {
		if ( isset( $_POST[ $field ] ) ) {
			$val = call_user_func( $sanitizer, wp_unslash( $_POST[ $field ] ) );
			if ( '' !== $val ) {
				update_post_meta( $post_id, $field, $val );
			} else {
				delete_post_meta( $post_id, $field );
			}
		}
	}
}
add_action( 'save_post_post', 'vpc_save_reviewer_meta_box' );

/**
 * Registers Reviewer post meta for REST API and Gutenberg compatibility.
 *
 * @return void
 */
function vpc_register_reviewer_post_meta() {
	$fields = array(
		'vpc_reviewer_name'   => 'string',
		'vpc_reviewer_title'  => 'string',
		'vpc_reviewer_avatar' => 'string',
		'vpc_reviewer_url'    => 'string',
	);

	foreach ( $fields as $key => $type ) {
		register_post_meta(
			'post',
			$key,
			array(
				'show_in_rest'      => true,
				'single'            => true,
				'type'              => $type,
				'sanitize_callback' => in_array( $key, array( 'vpc_reviewer_avatar', 'vpc_reviewer_url' ), true ) ? 'esc_url_raw' : 'sanitize_text_field',
				'auth_callback'     => function() {
					return current_user_can( 'edit_posts' );
				},
			)
		);
	}
}
add_action( 'init', 'vpc_register_reviewer_post_meta' );

/**
 * Normalizes and formats recruitment deadline string (e.g. 20261031 -> 31/10/2026).
 *
 * @param mixed $raw Raw date string or int.
 * @return array{formatted: string, timestamp: int|null}
 */
function vpc_format_recruitment_deadline( $raw ) {
	if ( empty( $raw ) ) {
		return array(
			'formatted' => 'Đang cập nhật',
			'timestamp' => null,
		);
	}

	$cleaned = trim( (string) $raw );

	// Case 1: YYYYMMDD (e.g. 20261031 from legacy ACF submit_deadline).
	if ( preg_match( '/^(\d{4})(\d{2})(\d{2})$/', $cleaned, $matches ) ) {
		$year  = (int) $matches[1];
		$month = (int) $matches[2];
		$day   = (int) $matches[3];
		if ( checkdate( $month, $day, $year ) ) {
			return array(
				'formatted' => sprintf( '%02d/%02d/%04d', $day, $month, $year ),
				'timestamp' => (int) mktime( 23, 59, 59, $month, $day, $year ),
			);
		}
	}

	// Case 2: DD/MM/YYYY (e.g. 31/10/2026).
	if ( preg_match( '/^(\d{1,2})[\/\-\.](\d{1,2})[\/\-\.](\d{4})$/', $cleaned, $matches ) ) {
		$day   = (int) $matches[1];
		$month = (int) $matches[2];
		$year  = (int) $matches[3];
		if ( checkdate( $month, $day, $year ) ) {
			return array(
				'formatted' => sprintf( '%02d/%02d/%04d', $day, $month, $year ),
				'timestamp' => (int) mktime( 23, 59, 59, $month, $day, $year ),
			);
		}
	}

	// Case 3: YYYY-MM-DD.
	if ( preg_match( '/^(\d{4})[\/\-\.](\d{1,2})[\/\-\.](\d{1,2})$/', $cleaned, $matches ) ) {
		$year  = (int) $matches[1];
		$month = (int) $matches[2];
		$day   = (int) $matches[3];
		if ( checkdate( $month, $day, $year ) ) {
			return array(
				'formatted' => sprintf( '%02d/%02d/%04d', $day, $month, $year ),
				'timestamp' => (int) mktime( 23, 59, 59, $month, $day, $year ),
			);
		}
	}

	return array(
		'formatted' => $cleaned,
		'timestamp' => null,
	);
}

/**
 * Retrieves normalized recruitment meta for a post with backward compatibility.
 *
 * @param int $post_id Post ID.
 * @return array<string, string>
 */
function vpc_get_recruitment_meta( $post_id ) {
	$updated = get_post_meta( $post_id, 'vpc_recruitment_updated', true ) ?: get_the_date( 'd/m/Y', $post_id );

	// Deadline: Priority 1 = vpc_recruitment_deadline, Priority 2 = legacy submit_deadline.
	$deadline_raw = get_post_meta( $post_id, 'vpc_recruitment_deadline', true );
	if ( '' === $deadline_raw || false === $deadline_raw ) {
		$legacy = get_post_meta( $post_id, 'submit_deadline', true );
		if ( ! empty( $legacy ) ) {
			$deadline_raw = $legacy;
		}
	}

	$parsed_deadline = vpc_format_recruitment_deadline( $deadline_raw );
	$deadline        = $parsed_deadline['formatted'];

	// Status determination.
	$status_setting = get_post_meta( $post_id, 'vpc_recruitment_status', true );
	if ( 'Đang tuyển' === $status_setting || 'open' === $status_setting ) {
		$status = 'Đang tuyển';
	} elseif ( 'Đã đóng' === $status_setting || 'closed' === $status_setting ) {
		$status = 'Đã đóng';
	} else {
		// Auto mode: So sánh chuẩn xác với hạn nộp.
		if ( null !== $parsed_deadline['timestamp'] ) {
			// Nếu hạn nộp đã qua so với thời điểm hiện tại thì tự động đóng tuyển.
			$status = ( $parsed_deadline['timestamp'] >= time() ) ? 'Đang tuyển' : 'Đã đóng';
		} else {
			// Nếu chưa có hạn nộp, các bài đăng từ những năm trước (2024, 2025) mặc định đóng.
			$post_year = (int) get_the_date( 'Y', $post_id );
			$status    = ( $post_year > 0 && $post_year < 2026 ) ? 'Đã đóng' : 'Đang tuyển';
		}
	}

	$location = get_post_meta( $post_id, 'vpc_recruitment_location', true ) ?: 'Tây Hồ - Hà Nội';
	$type     = get_post_meta( $post_id, 'vpc_recruitment_type', true ) ?: 'Toàn thời gian (T2 - T7)';
	$salary   = get_post_meta( $post_id, 'vpc_recruitment_salary', true ) ?: 'Thỏa thuận theo năng lực';
	$quantity = get_post_meta( $post_id, 'vpc_recruitment_quantity', true ) ?: '02 - 05 nhân sự';

	return array(
		'updated'  => $updated,
		'deadline' => $deadline,
		'status'   => $status,
		'location' => $location,
		'type'     => $type,
		'salary'   => $salary,
		'quantity' => $quantity,
	);
}

/**
 * Registers Recruitment Meta Box for Posts in WordPress Admin.
 *
 * @return void
 */
function vpc_add_recruitment_meta_box() {
	add_meta_box(
		'vpc_post_recruitment_meta',
		'Thông tin tuyển dụng (Hạn nộp & Vị trí)',
		'vpc_render_recruitment_meta_box',
		'post',
		'normal',
		'high'
	);
}
add_action( 'add_meta_boxes', 'vpc_add_recruitment_meta_box' );

/**
 * Renders the Recruitment Meta Box in the WordPress post editor.
 *
 * @param WP_Post $post Current post object.
 * @return void
 */
function vpc_render_recruitment_meta_box( $post ) {
	wp_nonce_field( 'vpc_save_recruitment_meta', 'vpc_recruitment_meta_nonce' );

	$meta             = vpc_get_recruitment_meta( $post->ID );
	$current_status   = get_post_meta( $post->ID, 'vpc_recruitment_status', true ) ?: 'auto';
	$saved_deadline   = get_post_meta( $post->ID, 'vpc_recruitment_deadline', true );
	$display_deadline = '' !== $saved_deadline ? $saved_deadline : ( 'Đang cập nhật' !== $meta['deadline'] ? $meta['deadline'] : '' );
	?>
	<div class="vpc-recruitment-fields" style="font-size:13px;line-height:1.5;">
		<p style="margin:0 0 12px;color:#666;">
			Các thông tin này hiển thị trên thẻ tuyển dụng và thanh <strong>Ứng tuyển nhanh</strong>. (Áp dụng cho bài viết thuộc chuyên mục Tuyển dụng).
		</p>
		<table class="form-table" role="presentation" style="margin-top:0;">
			<tbody>
				<tr>
					<th scope="row"><label for="vpc_recruitment_deadline">Hạn nộp hồ sơ</label></th>
					<td>
						<input class="regular-text" type="text" id="vpc_recruitment_deadline" name="vpc_recruitment_deadline" value="<?php echo esc_attr( $display_deadline ); ?>" placeholder="Ví dụ: 31/10/2026">
						<p class="description">Định dạng khuyến nghị: <code>DD/MM/YYYY</code> (ví dụ: <code>31/10/2026</code>).</p>
					</td>
				</tr>
				<tr>
					<th scope="row"><label for="vpc_recruitment_status">Trạng thái tuyển dụng</label></th>
					<td>
						<select id="vpc_recruitment_status" name="vpc_recruitment_status">
							<option value="auto" <?php selected( $current_status, 'auto' ); ?>>Tự động (Theo đợt tuyển &amp; hạn nộp - Khuyên dùng)</option>
							<option value="Đang tuyển" <?php selected( $current_status, 'Đang tuyển' ); ?>>Đang tuyển (Luôn hiển thị ở tab Đang tuyển)</option>
							<option value="Đã đóng" <?php selected( $current_status, 'Đã đóng' ); ?>>Đã đóng (Ẩn khỏi tab Đang tuyển)</option>
						</select>
						<p class="description">Quyết định hiển thị trên bộ lọc tab "Tất cả" và "Đang tuyển".</p>
					</td>
				</tr>
				<tr>
					<th scope="row"><label for="vpc_recruitment_location">Địa điểm làm việc</label></th>
					<td>
						<input class="large-text" type="text" id="vpc_recruitment_location" name="vpc_recruitment_location" value="<?php echo esc_attr( get_post_meta( $post->ID, 'vpc_recruitment_location', true ) ); ?>" placeholder="Ví dụ: Tây Hồ - Hà Nội">
					</td>
				</tr>
				<tr>
					<th scope="row"><label for="vpc_recruitment_type">Hình thức làm việc</label></th>
					<td>
						<input class="large-text" type="text" id="vpc_recruitment_type" name="vpc_recruitment_type" value="<?php echo esc_attr( get_post_meta( $post->ID, 'vpc_recruitment_type', true ) ); ?>" placeholder="Ví dụ: Toàn thời gian (T2 - T7)">
					</td>
				</tr>
				<tr>
					<th scope="row"><label for="vpc_recruitment_salary">Mức thu nhập</label></th>
					<td>
						<input class="large-text" type="text" id="vpc_recruitment_salary" name="vpc_recruitment_salary" value="<?php echo esc_attr( get_post_meta( $post->ID, 'vpc_recruitment_salary', true ) ); ?>" placeholder="Ví dụ: 12.000.000đ - 18.000.000đ hoặc Thỏa thuận">
					</td>
				</tr>
				<tr>
					<th scope="row"><label for="vpc_recruitment_quantity">Số lượng tuyển</label></th>
					<td>
						<input class="regular-text" type="text" id="vpc_recruitment_quantity" name="vpc_recruitment_quantity" value="<?php echo esc_attr( get_post_meta( $post->ID, 'vpc_recruitment_quantity', true ) ); ?>" placeholder="Ví dụ: 03 người">
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	<?php
}

/**
 * Saves Recruitment Meta Box data securely.
 *
 * @param int $post_id Current post ID.
 * @return void
 */
function vpc_save_recruitment_meta_box( $post_id ) {
	if ( ! isset( $_POST['vpc_recruitment_meta_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['vpc_recruitment_meta_nonce'] ) ), 'vpc_save_recruitment_meta' ) ) {
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	$text_fields = array(
		'vpc_recruitment_deadline',
		'vpc_recruitment_location',
		'vpc_recruitment_type',
		'vpc_recruitment_salary',
		'vpc_recruitment_quantity',
	);

	foreach ( $text_fields as $field ) {
		if ( isset( $_POST[ $field ] ) ) {
			$val = sanitize_text_field( wp_unslash( $_POST[ $field ] ) );
			if ( '' !== $val ) {
				update_post_meta( $post_id, $field, $val );
			} else {
				delete_post_meta( $post_id, $field );
			}
		}
	}

	if ( isset( $_POST['vpc_recruitment_status'] ) ) {
		$status = sanitize_text_field( wp_unslash( $_POST['vpc_recruitment_status'] ) );
		if ( in_array( $status, array( 'auto', 'Đang tuyển', 'Đã đóng' ), true ) ) {
			update_post_meta( $post_id, 'vpc_recruitment_status', $status );
		}
	}
}
add_action( 'save_post_post', 'vpc_save_recruitment_meta_box' );

/**
 * Registers Recruitment post meta for REST API and Gutenberg compatibility.
 *
 * @return void
 */
function vpc_register_recruitment_post_meta() {
	$fields = array(
		'vpc_recruitment_deadline' => 'string',
		'vpc_recruitment_status'   => 'string',
		'vpc_recruitment_location' => 'string',
		'vpc_recruitment_type'     => 'string',
		'vpc_recruitment_salary'   => 'string',
		'vpc_recruitment_quantity' => 'string',
	);

	foreach ( $fields as $key => $type ) {
		register_post_meta(
			'post',
			$key,
			array(
				'show_in_rest'      => true,
				'single'            => true,
				'type'              => $type,
				'sanitize_callback' => 'sanitize_text_field',
				'auth_callback'     => function() {
					return current_user_can( 'edit_posts' );
				},
			)
		);
	}
}
add_action( 'init', 'vpc_register_recruitment_post_meta' );


