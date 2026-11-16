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
 * Returns the shared customer feedback avatar mapping.
 *
 * @return array<string, string>
 */
function vpc_get_feedback_avatar_map() {
	return array(
		'Mẹ bé Kami'             => 'Avatar-feedback/Me-be-Kami.png',
		'Mẹ bé Mandu'            => 'Avatar-feedback/Me-be-Mandu.jpg',
		'Mẹ Bé Cát'              => 'Avatar-feedback/Me-be-Cat.jpg',
		'Nguyễn Thị Ngọc Trân'   => 'Avatar-feedback/dd841f642ae3352ac94256b09e46c8c6b12453c2.jpg',
		'Mẹ Sấm Chớp'            => 'Avatar-feedback/Me-Sam-Chop.jpg',
		'Mẹ Cafe'                => 'Avatar-feedback/Me-Cafe.jpg',
		'Mẹ Nghé Ọ'              => 'Avatar-feedback/Me-Nghe-O.jpg',
		'Bà ngoại Bé Dâu'        => 'Avatar-feedback/Ba-Ngoai-Be-Dau.jpg',
	);
}

/**
 * Returns the real customer reviews used by the shared feedback sections.
 *
 * @return array<int, array<string, string>>
 */
function vpc_get_real_feedback_items() {
	$avatars = array(
		'Avatar-feedback/Ba-Ngoai-Be-Dau.jpg',
		'Avatar-feedback/dd841f642ae3352ac94256b09e46c8c6b12453c2.jpg',
		'Avatar-feedback/Me-be-Cat.jpg',
		'Avatar-feedback/Me-be-Kami.png',
		'Avatar-feedback/Me-be-Mandu.jpg',
		'Avatar-feedback/Me-Cafe.jpg',
		'Avatar-feedback/Me-Nghe-O.jpg',
		'Avatar-feedback/Me-Sam-Chop.jpg',
	);

	$reviews = array(
		array( 'name' => 'Tiến Nguyễn', 'copy' => 'Mình book cô 3 tháng đầu 24/24, sau chuyển sang cô làm ca ngày thôi, cả 2 cô đều ok, có cho đổi cô nếu k ưng, chăm sóc nhiệt tình, bé sau nếu có cơ hội sẽ book tiếp 🕊️💡🌈' ),
		array( 'name' => 'Quang Phưowce', 'copy' => 'Có điều kiện thì nên thuê bảo mẫu chuyên nghiệp cho yên tâm, mình thuê 24/24 đến 8 tháng, đổi 2 cô nhưng đều làm tốt 🍕📌🎉' ),
		array( 'name' => 'Trí Nguyễn', 'copy' => 'Bé nhà mình hay khóc đêm, cô bảo mẫu kiên nhẫn dỗ và luyện ngủ cho bé, mình thật sự biết ơn, cô còn giúp mình hướng dẫn vài mẹo trấn an bé rất hữu ích. Lúc mới trải nghiệm công ty đổi người chăm, mình hơi lo nhưng cô rất tốt nên theo cô luôn.' ),
		array( 'name' => 'dung nguyen', 'copy' => 'Mình có book 1 bên trước đấy mà toàn bán sản phẩm, bên này ok hơn, bảo mẫu làm đúng việc không up sale 🌙🕹️🕹️' ),
		array( 'name' => 'Thơ Trần', 'copy' => 'Mình đăng ký có 2 tháng thôi nhưng bảo mẫu vẫn làm rất nhiệt tình 🧩🎯🌈' ),
		array( 'name' => 'Vũ Thái Anh', 'copy' => 'Bé rất thích cô Trang, cô Trang rèn easy cho bé nhà mình đâu vào đấy, giờ con ăn dặm rồi nên mình cho đi lớp chứ vẫn rất thích bảo mẫu bên này, sau để nữa sẽ quay lại ạ 🎵🎵🍕' ),
		array( 'name' => 'Bảo Phan', 'copy' => 'Bảo mẫu chăm chỉ nhanh nhẹn, sẽ gia hạn thêm hợp đồng 🎯🔥📖' ),
		array( 'name' => 'Quân Phan', 'copy' => 'Cô bảo mẫu nhanh nhẹn, chủ động hỏi thói quen của bé trước khi bắt đầu chăm. Lần đầu mình thuê dịch vụ thế này nhưng tư vấn giải thích rõ, kèm theo hợp đồng nữa. Trộm vía bé nhà mình cũng hợp tác với cô ngay từ buổi đầu 🐶📌' ),
	);

	foreach ( $reviews as $index => &$review ) {
		$review['image'] = $avatars[ $index ];
	}
	unset( $review );

	return $reviews;
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
 * Resolve an image through the WordPress Media Library, then the theme asset
 * directory when the matching attachment is not available yet.
 *
 * The resolver deliberately matches the attachment's stored file basename,
 * not a guessed URL or a similar-looking image. Sites with duplicate media
 * basenames return an empty string until an explicit valid Attachment ID is
 * supplied through the `vpc_image_attachment_id` filter or the corresponding
 * theme mod (`vpc_image_<slug>_id`).
 *
 * @param string $path Theme-owned image key used only to match Media Library filenames.
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

	return vpc_theme_asset_url( $path );
}

/**
 * Resolve a theme-owned image when it has not been imported into the Media Library.
 *
 * @param string $path Relative path inside assets/images.
 * @return string
 */
function vpc_theme_asset_url( $path ) {
	$path = ltrim( wp_normalize_path( rawurldecode( (string) $path ) ), '/' );
	if ( '' === $path || false !== strpos( $path, '..' ) ) {
		return '';
	}

	$relative_path = 'assets/images/' . $path;
	$absolute_path = trailingslashit( get_template_directory() ) . $relative_path;
	if ( ! is_file( $absolute_path ) ) {
		return '';
	}

	$url_path = implode( '/', array_map( 'rawurlencode', explode( '/', $relative_path ) ) );
	return trailingslashit( get_template_directory_uri() ) . $url_path;
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

/**
 * Whether the current request is the Ở cữ landing page.
 *
 * @return bool
 */
function vanphuccare_is_o_cu_page() {
	return is_page( 'trung-tam-o-cu' ) || is_page_template( 'page-trung-tam-o-cu.php' );
}

/**
 * Whether the current request is the Bảo mẫu tại nhà landing page.
 *
 * @return bool
 */
function vanphuccare_is_bao_mau_page() {
	return is_page( 'bao-mau-tai-nha' ) || is_page_template( 'page-bao-mau-tai-nha.php' );
}

/**
 * Whether the current request is the Tư vấn nuôi con EASY landing page.
 *
 * @return bool
 */
function vanphuccare_is_easy_page() {
	return is_page( 'dich-vu-tu-van-nuoi-con-easy-truc-tuyen' ) || is_page_template( 'page-dich-vu-tu-van-nuoi-con-easy-truc-tuyen.php' );
}

/**
 * Whether the current request is the Tắm bé sơ sinh landing page.
 *
 * @return bool
 */
function vanphuccare_is_tam_be_page() {
	return is_page( 'tam-tre-so-sinh' ) || is_page_template( 'page-tam-tre-so-sinh.php' );
}

/**
 * Whether the current request is the Thông tắc tia sữa landing page.
 *
 * @return bool
 */
function vanphuccare_is_thong_tac_page() {
	return is_page( 'thong-tac-tia-sua' ) || is_page_template( 'page-thong-tac-tia-sua.php' );
}

/**
 * Retrieves the primary category for a post.
 *
 * Resolves the primary category selected by editor via Yoast SEO or Rank Math.
 * Fallbacks gracefully to the first specific child category (skipping 'kien-thuc').
 *
 * @param WP_Post|int|null $post_obj Post object or ID.
 * @return WP_Term|null Primary category term object or null.
 */
function vanphuccare_get_primary_category( $post_obj = null ) {
	$post = get_post( $post_obj );
	if ( ! $post ) {
		return null;
	}

	// 1. Check Yoast SEO primary category meta
	$yoast_primary_id = get_post_meta( $post->ID, '_yoast_wpseo_primary_category', true );
	if ( ! empty( $yoast_primary_id ) ) {
		$term = get_term( (int) $yoast_primary_id, 'category' );
		if ( $term instanceof WP_Term && ! is_wp_error( $term ) ) {
			return $term;
		}
	}

	// 2. Check Rank Math primary category meta
	$rank_math_primary_id = get_post_meta( $post->ID, 'rank_math_primary_category', true );
	if ( ! empty( $rank_math_primary_id ) ) {
		$term = get_term( (int) $rank_math_primary_id, 'category' );
		if ( $term instanceof WP_Term && ! is_wp_error( $term ) ) {
			return $term;
		}
	}

	// 3. Fallback: First child category, skipping generic parent 'kien-thuc'
	$categories = get_the_category( $post->ID );
	if ( ! empty( $categories ) ) {
		foreach ( $categories as $cat ) {
			if ( 'kien-thuc' !== $cat->slug && ! empty( $cat->name ) ) {
				return $cat;
			}
		}
		return $categories[0];
	}

	return null;
}

/**
 * Checks whether a post belongs to the Knowledge category hierarchy (parent 'kien-thuc' or any descendant).
 *
 * Resolves the discrepancy where WP_Query includes child categories by default,
 * but core has_category() only checks directly assigned terms unless provided
 * with an array of all descendant category IDs.
 *
 * @param int|WP_Post|null $post_obj Post object or ID.
 * @return bool
 */
function vanphuccare_is_knowledge_post( $post_obj = null ) {
	$kt_cat = get_category_by_slug( 'kien-thuc' );
	if ( ! ( $kt_cat instanceof WP_Term ) ) {
		return false;
	}

	$kt_cat_id   = (int) $kt_cat->term_id;
	$allowed_ids = array( $kt_cat_id );

	$child_ids = get_term_children( $kt_cat_id, 'category' );
	if ( ! is_wp_error( $child_ids ) && ! empty( $child_ids ) ) {
		$allowed_ids = array_merge( $allowed_ids, array_map( 'intval', $child_ids ) );
	}

	return has_category( $allowed_ids, $post_obj );
}

/**
 * Checks whether a given post belongs to a specified category or any of its descendant subcategories.
 *
 * Ensures:
 * 1. Post exists, is a standard 'post', and has 'publish' status.
 * 2. Post has either the term itself or any of its children assigned.
 *
 * When $term_id is 'kien-thuc', this validates against the entire Knowledge tree.
 * When $term_id is a subcategory (e.g. 'mang-thai'), this strictly validates against 'mang-thai' and its descendants.
 *
 * @param int|WP_Post|null $post Post object or ID.
 * @param int|WP_Term|null $term_id Target category ID or WP_Term object.
 * @return bool True if post is published and belongs to the term or its descendants.
 */
function vpc_post_in_category_tree( $post, $term_id ) {
	if ( ! ( $post instanceof WP_Post ) ) {
		$post = get_post( $post );
	}

	if (
		! ( $post instanceof WP_Post ) ||
		'post' !== $post->post_type ||
		'publish' !== $post->post_status
	) {
		return false;
	}

	$target_id = 0;
	if ( $term_id instanceof WP_Term ) {
		$target_id = (int) $term_id->term_id;
	} elseif ( is_numeric( $term_id ) ) {
		$target_id = absint( $term_id );
	}

	if ( $target_id <= 0 ) {
		return false;
	}

	$children = get_term_children( $target_id, 'category' );
	if ( is_wp_error( $children ) || ! is_array( $children ) ) {
		$children = array();
	}

	$allowed_ids = array_merge(
		array( $target_id ),
		array_map( 'intval', $children )
	);

	return has_category( $allowed_ids, $post );
}

/**
 * Checks whether a given term is the 'kien-thuc' category or one of its descendant subcategories.
 *
 * @param WP_Term|int|string|null $term Term object, ID, or slug.
 * @return bool True if term belongs to knowledge hierarchy.
 */
function vpc_is_knowledge_category( $term = null ) {
	if ( empty( $term ) ) {
		return false;
	}

	$term_obj = null;
	if ( $term instanceof WP_Term ) {
		$term_obj = $term;
	} elseif ( is_numeric( $term ) ) {
		$term_obj = get_term( (int) $term, 'category' );
	} elseif ( is_string( $term ) ) {
		$term_obj = get_category_by_slug( $term );
	}

	if ( ! ( $term_obj instanceof WP_Term ) ) {
		return false;
	}

	$slugs = function_exists( 'vpc_get_knowledge_category_slugs' )
		? vpc_get_knowledge_category_slugs()
		: array( 'kien-thuc' );

	if ( in_array( $term_obj->slug, $slugs, true ) ) {
		return true;
	}

	$kt_parent = get_category_by_slug( 'kien-thuc' );
	if ( $kt_parent instanceof WP_Term && cat_is_ancestor_of( $kt_parent->term_id, $term_obj->term_id ) ) {
		return true;
	}

	return false;
}

/**
 * Returns supported category slugs for the News section.
 *
 * @return array<int, string>
 */
function vpc_get_news_category_slugs() {
	return array(
		'tin-tuc',
		'tin-moi',
		'su-kien-noi-bat',
		'tin-tuc-su-kien',
		'tin-tuc-su-kien-moi-nhat',
	);
}

/**
 * Checks whether a given term is the 'tin-tuc' category or one of its descendant subcategories.
 *
 * @param WP_Term|int|string|null $term Term object, ID, or slug.
 * @return bool True if term belongs to news hierarchy.
 */
function vpc_is_news_category( $term = null ) {
	if ( empty( $term ) ) {
		return false;
	}

	$term_obj = null;
	if ( $term instanceof WP_Term ) {
		$term_obj = $term;
	} elseif ( is_numeric( $term ) ) {
		$term_obj = get_term( (int) $term, 'category' );
	} elseif ( is_string( $term ) ) {
		$term_obj = get_category_by_slug( $term );
	}

	if ( ! ( $term_obj instanceof WP_Term ) ) {
		return false;
	}

	$slugs = vpc_get_news_category_slugs();
	if ( in_array( $term_obj->slug, $slugs, true ) ) {
		return true;
	}

	$news_parent = get_category_by_slug( 'tin-tuc' );
	if ( $news_parent instanceof WP_Term && cat_is_ancestor_of( $news_parent->term_id, $term_obj->term_id ) ) {
		return true;
	}

	return false;
}

/**
 * Checks whether a post belongs to the News category hierarchy (parent 'tin-tuc' or any descendant/alias).
 *
 * @param int|WP_Post|null $post_obj Post object or ID.
 * @return bool
 */
function vpc_is_news_post( $post_obj = null ) {
	$allowed_ids = array();

	$news_cat = get_category_by_slug( 'tin-tuc' );
	if ( $news_cat instanceof WP_Term ) {
		$allowed_ids[] = (int) $news_cat->term_id;
		$child_ids     = get_term_children( (int) $news_cat->term_id, 'category' );
		if ( ! is_wp_error( $child_ids ) && ! empty( $child_ids ) ) {
			$allowed_ids = array_merge( $allowed_ids, array_map( 'intval', $child_ids ) );
		}
	}

	foreach ( vpc_get_news_category_slugs() as $slug ) {
		$sub = get_category_by_slug( $slug );
		if ( $sub instanceof WP_Term ) {
			$allowed_ids[] = (int) $sub->term_id;
		}
	}

	$allowed_ids = array_values( array_unique( $allowed_ids ) );
	if ( empty( $allowed_ids ) ) {
		return false;
	}

	return has_category( $allowed_ids, $post_obj );
}

/**
 * Checks whether a post belongs to either Knowledge or News editorial hierarchies.
 *
 * @param int|WP_Post|null $post_obj Post object or ID.
 * @return bool
 */
function vpc_is_editorial_post( $post_obj = null ) {
	return vanphuccare_is_knowledge_post( $post_obj ) || vpc_is_news_post( $post_obj );
}

/**
 * Normalizes a WP_Post object into structured article data for knowledge cards.
 *
 * @param WP_Post|int|null $post_obj Post object or ID.
 * @param string           $default_image Fallback image URL.
 * @param int              $excerpt_words Number of words to trim excerpt.
 * @param string           $custom_category_name Optional category name override.
 * @return array<string, mixed> Structured article data.
 */
function vpc_format_knowledge_card( $post_obj, $default_image = '', $excerpt_words = 32, $custom_category_name = '' ) {
	$post = get_post( $post_obj );
	if ( ! $post ) {
		return array();
	}

	if ( ! empty( $custom_category_name ) ) {
		$category_name = $custom_category_name;
	} else {
		$primary_term = function_exists( 'vanphuccare_get_primary_category' )
			? vanphuccare_get_primary_category( $post )
			: null;
		if ( $primary_term ) {
			$category_name = $primary_term->name;
		} elseif ( function_exists( 'vpc_is_news_post' ) && vpc_is_news_post( $post ) ) {
			$category_name = __( 'Tin tức', 'vanphuccare' );
		} else {
			$category_name = __( 'Kiến thức', 'vanphuccare' );
		}
	}

	$image_url = '';
	if ( has_post_thumbnail( $post ) ) {
		$image_url = get_the_post_thumbnail_url( $post, 'large' );
	} elseif ( $default_image ) {
		$image_url = $default_image;
	} else {
		$image_url = get_template_directory_uri() . '/assets/images/knowledge/featured-pump.png';
	}

	return array(
		'id'       => $post->ID,
		'title'    => get_the_title( $post ),
		'excerpt'  => wp_trim_words( get_the_excerpt( $post ), $excerpt_words, '...' ),
		'url'      => get_permalink( $post ),
		'image'    => $image_url,
		'category' => $category_name,
		'author'   => get_the_author_meta( 'display_name', (int) $post->post_author ) ?: 'Vạn Phúc Care',
		'date'     => get_the_date( 'd/m/Y', $post ),
	);
}

/**
 * Returns canonical definitions of knowledge sub-categories.
 *
 * Single Source of Truth for icons, labels, descriptions, and alias slugs.
 *
 * @return array<int, array<string, mixed>>
 */
function vpc_get_knowledge_category_definitions() {
	return array(
		array(
			'slug'        => '',
			'aliases'     => array( 'tat-ca' ),
			'label'       => __( 'Tất cả', 'vanphuccare' ),
			'description' => __( 'Toàn bộ bài viết', 'vanphuccare' ),
			'badge'       => __( 'Kiến thức - Chuẩn y khoa', 'vanphuccare' ),
			'photo'       => 'mang-thai-photo-2.png',
			'icon'        => 'category-1.svg',
		),
		array(
			'slug'        => 'mang-thai',
			'aliases'     => array(),
			'label'       => __( 'Mang thai', 'vanphuccare' ),
			'description' => __( 'Thai kỳ từng tuần', 'vanphuccare' ),
			'badge'       => __( 'Thai kỳ khoẻ mạnh', 'vanphuccare' ),
			'photo'       => 'mang-thai-photo-2.png',
			'icon'        => 'category-2.svg',
		),
		array(
			'slug'        => 'phuong-phap-easy',
			'aliases'     => array( 'easy' ),
			'label'       => __( 'Phương pháp EASY', 'vanphuccare' ),
			'description' => __( 'Nuôi con khoa học', 'vanphuccare' ),
			'badge'       => __( 'Nuôi con khoa học', 'vanphuccare' ),
			'photo'       => 'phuong-phap-easy.png',
			'icon'        => 'category-3.svg',
		),
		array(
			'slug'        => 'an-dam',
			'aliases'     => array(),
			'label'       => __( 'Ăn dặm', 'vanphuccare' ),
			'description' => __( 'Ăn dặm vui khỏe', 'vanphuccare' ),
			'badge'       => __( 'Ăn dặm vui khỏe', 'vanphuccare' ),
			'photo'       => 'An-dam-toan-tap.jpg',
			'icon'        => 'category-4.svg',
		),
		array(
			'slug'        => 'hoi-chung-bieng-an',
			'aliases'     => array( 'tre-so-sinh-bieng-an-toan-tap', 'bieng-an' ),
			'label'       => __( 'Hội chứng biếng ăn', 'vanphuccare' ),
			'description' => __( 'Bữa ăn nhẹ nhàng', 'vanphuccare' ),
			'badge'       => __( 'Bữa ăn nhẹ nhàng', 'vanphuccare' ),
			'photo'       => 'Hoi-chung-bieng-an.jpg',
			'icon'        => 'category-5.svg',
		),
		array(
			'slug'        => 'cam-nang-cho-me',
			'aliases'     => array( 'cam-nang' ),
			'label'       => __( 'Cẩm nang cho mẹ', 'vanphuccare' ),
			'description' => __( 'Mẹ tự tin, bé hạnh phúc', 'vanphuccare' ),
			'badge'       => __( 'Mẹ tự tin, bé hạnh phúc', 'vanphuccare' ),
			'photo'       => 'Cam-nang-cho-me.JPG',
			'icon'        => 'category-6.svg',
		),
	);
}

/**
 * Returns a flat array of all recognized knowledge slugs (including aliases).
 *
 * @return array<int, string>
 */
function vpc_get_knowledge_category_slugs() {
	$slugs = array( 'kien-thuc' );
	foreach ( vpc_get_knowledge_category_definitions() as $def ) {
		if ( ! empty( $def['slug'] ) ) {
			$slugs[] = $def['slug'];
		}
		if ( ! empty( $def['aliases'] ) ) {
			foreach ( $def['aliases'] as $alias ) {
				$slugs[] = $alias;
			}
		}
	}
	return array_values( array_unique( $slugs ) );
}

/**
 * Resolves knowledge category navigation pills with live URLs and active states.
 *
 * Defensively prevents generating broken 404 links if a category has not yet
 * been created in the database.
 *
 * @param string $current_slug Current active slug.
 * @param int    $current_id   Current category term ID.
 * @return array<int, array<string, mixed>>
 */
function vpc_get_knowledge_category_pills( $current_slug = '', $current_id = 0 ) {
	$definitions = vpc_get_knowledge_category_definitions();
	$pills       = array();

	foreach ( $definitions as $cat_def ) {
		$is_all = empty( $cat_def['slug'] );

		if ( $is_all ) {
			$url    = home_url( '/kien-thuc/tat-ca/' );
			$active = ( 'kien-thuc' === $current_slug || ! empty( get_query_var( 'vpc_is_all' ) ) || empty( $current_slug ) );

			$pills[] = array(
				'slug'        => '',
				'label'       => $cat_def['label'],
				'description' => $cat_def['description'],
				'badge'       => ! empty( $cat_def['badge'] ) ? $cat_def['badge'] : $cat_def['description'],
				'photo'       => ! empty( $cat_def['photo'] ) ? $cat_def['photo'] : 'mang-thai-photo-2.png',
				'icon'        => $cat_def['icon'],
				'url'         => $url,
				'active'      => $active,
			);
			continue;
		}

		// Try resolving the category object (checking primary slug first, then aliases).
		$cat_obj = get_category_by_slug( $cat_def['slug'] );
		if ( ! ( $cat_obj instanceof WP_Term ) && ! empty( $cat_def['aliases'] ) ) {
			foreach ( $cat_def['aliases'] as $alias ) {
				$cat_obj = get_category_by_slug( $alias );
				if ( $cat_obj instanceof WP_Term ) {
					break;
				}
			}
		}

		// 404 prevention: If category does not exist in DB, fallback safely to knowledge hub instead of a dead /category/.../ link.
		if ( $cat_obj instanceof WP_Term ) {
			$url    = get_category_link( $cat_obj->term_id );
			$active = ( (int) $cat_obj->term_id === (int) $current_id )
				|| ( $cat_def['slug'] === $current_slug )
				|| in_array( $current_slug, $cat_def['aliases'], true );
		} else {
			$url    = home_url( '/kien-thuc/' );
			$active = false;
		}

		$pills[] = array(
			'slug'        => $cat_def['slug'],
			'label'       => $cat_def['label'],
			'description' => $cat_def['description'],
			'badge'       => ! empty( $cat_def['badge'] ) ? $cat_def['badge'] : $cat_def['description'],
			'photo'       => ! empty( $cat_def['photo'] ) ? $cat_def['photo'] : 'mang-thai-photo-2.png',
			'icon'        => $cat_def['icon'],
			'url'         => $url,
			'active'      => $active,
		);
	}

	return $pills;
}

/**
 * Adds custom profile field (Chức danh / Nghề nghiệp) to WordPress user profile.
 *
 * @param WP_User $user Current user object.
 * @return void
 */
function vpc_add_user_profile_fields( $user ) {
	$job_title = get_user_meta( $user->ID, 'vpc_job_title', true );
	?>
	<h3>Thông tin chuyên môn (Vạn Phúc Care)</h3>
	<table class="form-table" role="presentation">
		<tr>
			<th><label for="vpc_job_title">Chức danh / Nghề nghiệp</label></th>
			<td>
				<input type="text" name="vpc_job_title" id="vpc_job_title" value="<?php echo esc_attr( $job_title ); ?>" class="regular-text" placeholder="Ví dụ: Bác sĩ CKI Nhi khoa, Điều dưỡng trưởng..." />
				<p class="description">Chức danh này sẽ hiển thị bên dưới tên tác giả trong thẻ Tác giả ở chân bài viết.</p>
			</td>
		</tr>
	</table>
	<?php
}
add_action( 'show_user_profile', 'vpc_add_user_profile_fields' );
add_action( 'edit_user_profile', 'vpc_add_user_profile_fields' );

/**
 * Saves custom user profile fields.
 *
 * @param int $user_id User ID.
 * @return void
 */
function vpc_save_user_profile_fields( $user_id ) {
	if ( ! current_user_can( 'edit_user', $user_id ) ) {
		return;
	}
	if ( isset( $_POST['vpc_job_title'] ) ) {
		update_user_meta( $user_id, 'vpc_job_title', sanitize_text_field( wp_unslash( $_POST['vpc_job_title'] ) ) );
	}
}
add_action( 'personal_options_update', 'vpc_save_user_profile_fields' );
add_action( 'edit_user_profile_update', 'vpc_save_user_profile_fields' );

/**
 * Returns author avatar HTML or clean SVG silhouette placeholder matching Figma.
 *
 * @param int $author_id Author user ID.
 * @param int $size Avatar size in pixels.
 * @return string HTML avatar markup.
 */
function vpc_get_author_avatar_html( $author_id, $size = 80 ) {
	$avatar = get_avatar( $author_id, $size, '', '', array( 'class' => 'vpc-reader__author-img' ) );
	if ( $avatar && ! str_contains( $avatar, 'mystery' ) && ! str_contains( $avatar, 'blank' ) && ! str_contains( $avatar, 'mysteryman' ) ) {
		return $avatar;
	}

	return '<svg class="vpc-reader__author-placeholder" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
		<circle cx="40" cy="40" r="40" fill="#BAE6FD"/>
		<path d="M40 40C45.5228 40 50 35.5228 50 30C50 24.4772 45.5228 20 40 20C34.4772 20 30 24.4772 30 30C30 35.5228 34.4772 40 40 40Z" stroke="#0284C7" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
		<path d="M22 62C22 52.0589 30.0589 44 40 44C49.9411 44 58 52.0589 58 62" stroke="#0284C7" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
	</svg>';
}


