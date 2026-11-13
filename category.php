<?php
/**
 * Category archive template (Sub-Category knowledge page).
 *
 * Follows Figma Sub-Category reference layout.
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$current_cat  = get_queried_object();
$current_id   = $current_cat instanceof WP_Term ? (int) $current_cat->term_id : 0;
$current_slug = $current_cat instanceof WP_Term ? $current_cat->slug : '';

// 1. Guard clause: Ensure this template only renders for Knowledge categories.
$knowledge_slugs = function_exists( 'vpc_get_knowledge_category_slugs' )
	? vpc_get_knowledge_category_slugs()
	: array( 'kien-thuc', 'mang-thai', 'phuong-phap-easy', 'easy', 'an-dam', 'hoi-chung-bieng-an', 'cam-nang-cho-me' );

$kt_parent_term = get_category_by_slug( 'kien-thuc' );
$is_child_of_kt = false;
if ( $kt_parent_term instanceof WP_Term && $current_id ) {
	$is_child_of_kt = cat_is_ancestor_of( $kt_parent_term->term_id, $current_id )
		|| ( (int) $kt_parent_term->term_id === $current_id );
}

$is_knowledge = ! empty( get_query_var( 'vpc_is_all' ) )
	|| in_array( $current_slug, $knowledge_slugs, true )
	|| $is_child_of_kt;

if ( ! $is_knowledge ) {
	// Delegate to standard generic archive template for non-knowledge categories (e.g. tin-tuc, tuyen-dung).
	require get_template_directory() . '/archive.php';
	return;
}

get_header();

$current_name             = single_cat_title( '', false );
$current_desc             = $current_id ? category_description( $current_id ) : category_description();
$current_desc_mobile      = $current_desc;
$is_all_knowledge_archive = 'kien-thuc' === $current_slug || ! empty( get_query_var( 'vpc_is_all' ) );

$knowledge_uri = get_template_directory_uri() . '/assets/images/knowledge';
$asset = static function ( $name ) use ( $knowledge_uri ) {
	return esc_url( $knowledge_uri . '/' . $name );
};

// Category pills resolved dynamically from Single Source of Truth (DRY & 404 safe).
$categories = function_exists( 'vpc_get_knowledge_category_pills' )
	? vpc_get_knowledge_category_pills( $current_slug, $current_id )
	: array();

$is_all_archive = ( 'kien-thuc' === $current_slug || ! empty( get_query_var( 'vpc_is_all' ) ) );
$display_name   = 'mang-thai' === $current_slug ? __( 'Mang Thai', 'vanphuccare' ) : $current_name;
$hero_title     = $is_all_archive ? __( 'Tất Cả Kiến Thức', 'vanphuccare' ) : $display_name;
$main_title     = $is_all_archive ? __( 'Tất cả bài viết', 'vanphuccare' ) : sprintf( __( 'Bài viết %s', 'vanphuccare' ), $current_name );
?>

<div class="vpc-knowledge vpc-knowledge--subcategory">
	<!-- 1. Sub-Category Hero -->
	<section class="vpc-knowledge-subcat-hero">
		<div class="vpc-knowledge-container vpc-knowledge-subcat-hero__inner">
			<div class="vpc-knowledge-subcat-hero__copy">
				<nav class="vpc-knowledge-breadcrumbs" aria-label="<?php esc_attr_e( 'Đường dẫn trang', 'vanphuccare' ); ?>">
					<div class="vpc-knowledge-breadcrumbs__desktop">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Trang chủ', 'vanphuccare' ); ?></a>
						<span class="vpc-knowledge-breadcrumbs__sep" aria-hidden="true"><img src="<?php echo $asset( 'chevron-right.svg' ); ?>" alt="" width="16" height="16"></span>
						<a href="<?php echo esc_url( home_url( '/kien-thuc/' ) ); ?>"><?php esc_html_e( 'Kiến thức', 'vanphuccare' ); ?></a>
						<span class="vpc-knowledge-breadcrumbs__sep" aria-hidden="true"><img src="<?php echo $asset( 'chevron-right.svg' ); ?>" alt="" width="16" height="16"></span>
						<span class="vpc-knowledge-breadcrumbs__current"><?php echo esc_html( $is_all_archive ? __( 'Tất cả bài viết', 'vanphuccare' ) : $display_name ); ?></span>
					</div>
					<a class="vpc-knowledge-breadcrumbs__mobile" href="<?php echo esc_url( home_url( '/kien-thuc/' ) ); ?>"><span aria-hidden="true">‹</span> <?php esc_html_e( 'Kiến thức', 'vanphuccare' ); ?></a>
				</nav>
				<h1><?php echo esc_html( $hero_title ); ?></h1>
				<div class="vpc-knowledge-subcat-hero__desc vpc-knowledge-subcat-hero__desc--desktop">
					<?php echo wp_kses_post( $current_desc ); ?>
				</div>
				<div class="vpc-knowledge-subcat-hero__desc vpc-knowledge-subcat-hero__desc--mobile">
					<?php echo wp_kses_post( $current_desc_mobile ); ?>
				</div>
			</div>

			<div class="vpc-knowledge-subcat-hero__visual" aria-hidden="true">
				<img class="vpc-knowledge-subcat-hero__blob" src="<?php echo $asset( 'mang-thai-blob.svg' ); ?>" alt="" width="300" height="300">
				<div class="vpc-knowledge-subcat-hero__photo">
					<img src="<?php echo $asset( 'mang-thai-photo-2.png' ); ?>" alt="" width="230" height="301">
				</div>
				<img class="vpc-knowledge-subcat-hero__sticker" src="<?php echo $asset( 'mang-thai-sticker.svg' ); ?>" alt="" width="130" height="130">
				<img class="vpc-knowledge-subcat-hero__mascot" src="<?php echo $asset( 'hero-mascot.png' ); ?>" alt="" width="114" height="114">
				<span class="vpc-knowledge-subcat-hero__badge"><img src="<?php echo $asset( 'mang-thai-dot.svg' ); ?>" alt="" width="10" height="10"><span><?php esc_html_e( 'Thai kỳ khoẻ mạnh', 'vanphuccare' ); ?></span></span>
				<img class="vpc-knowledge-subcat-hero__heart" src="<?php echo $asset( 'mang-thai-heart.svg' ); ?>" alt="" width="26" height="26">
				<img class="vpc-knowledge-subcat-hero__heart-small" src="<?php echo $asset( 'mang-thai-heart-small.svg' ); ?>" alt="" width="16" height="16">
				<img class="vpc-knowledge-subcat-hero__sparkle" src="<?php echo $asset( 'mang-thai-sparkle.svg' ); ?>" alt="" width="20" height="20">
				<img class="vpc-knowledge-subcat-hero__dot-blue" src="<?php echo $asset( 'mang-thai-dot-blue.svg' ); ?>" alt="" width="8" height="8">
				<img class="vpc-knowledge-subcat-hero__dot-pink" src="<?php echo $asset( 'mang-thai-dot-pink.svg' ); ?>" alt="" width="8" height="8">
			</div>
		</div>
	</section>

	<!-- 2. Category Cards -->
	<section class="vpc-knowledge-subcat-pills-wrap">
		<div class="vpc-knowledge-container">
			<div class="vpc-knowledge-category-list" role="list">
				<?php foreach ( $categories as $category ) : ?>
					<a class="vpc-knowledge-category<?php echo ! empty( $category['active'] ) ? ' is-active' : ''; ?>" href="<?php echo esc_url( $category['url'] ); ?>" role="listitem">
						<span class="vpc-knowledge-category__icon"><img src="<?php echo $asset( $category['icon'] ); ?>" alt="" width="24" height="24" aria-hidden="true"></span>
						<span><?php echo esc_html( $category['label'] ); ?></span>
						<small><?php echo esc_html( $category['description'] ); ?></small>
					</a>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<!-- 4. Main 2-Column Content Layout (Articles + Sidebar) -->
	<section class="vpc-knowledge-content vpc-knowledge-content--subcat">
		<div class="vpc-knowledge-container vpc-knowledge-layout">
			<!-- Main Left Column -->
			<main class="vpc-knowledge-main" id="primary">
				<h2 class="vpc-knowledge-main__title">
					<?php echo esc_html( $main_title ); ?>
				</h2>

				<?php
				$per_page         = 8;
				$current_page     = max( 1, (int) get_query_var( 'paged' ) );
				$effective_cat_id = $current_id;
				if ( $is_all_archive && ! $effective_cat_id ) {
					$kt_term = get_category_by_slug( 'kien-thuc' );
					if ( $kt_term instanceof WP_Term ) {
						$effective_cat_id = (int) $kt_term->term_id;
					}
				}

				// 1. Resolve and validate curated pinned posts (0 to 5 posts) for this category across ALL pages.
				$pinned_post_ids = array();
				$pinned_posts    = array();
				if ( $effective_cat_id > 0 ) {
					$saved_pinned = get_term_meta( $effective_cat_id, 'vpc_featured_post_ids', true );
					if ( is_array( $saved_pinned ) ) {
						foreach ( $saved_pinned as $slot_id ) {
							$slot_id = absint( $slot_id );
							if ( $slot_id > 0 && ! in_array( $slot_id, $pinned_post_ids, true ) ) {
								$p_obj = get_post( $slot_id );
								$is_valid_pinned = function_exists( 'vpc_post_in_category_tree' )
									? vpc_post_in_category_tree( $p_obj, $effective_cat_id )
									: ( ( $p_obj instanceof WP_Post ) && 'publish' === $p_obj->post_status );

								if ( $is_valid_pinned ) {
									$pinned_post_ids[] = $slot_id;
									$pinned_posts[]    = $p_obj;
								}
							}
						}
					}
				}
				$pinned_count = count( $pinned_posts );

				// 2. Calculate pagination limits and mathematical offsets.
				// On Page 1, we show P pinned posts + up to (8 - P) regular posts = exactly 8 posts.
				// On Page 2+, we show 8 regular posts starting after the regular posts already consumed on Page 1.
				$page_1_regular_needed = max( 0, $per_page - $pinned_count );
				if ( 1 === $current_page ) {
					$regular_limit  = $page_1_regular_needed;
					$regular_offset = 0;
				} else {
					$regular_limit  = $per_page;
					$regular_offset = $page_1_regular_needed + ( $current_page - 2 ) * $per_page;
				}

				// 3. Query regular chronological posts with pinned IDs strictly excluded.
				$regular_posts       = array();
				$regular_total_count = 0;

				$regular_query_args = array(
					'post_type'           => 'post',
					'post_status'         => 'publish',
					'posts_per_page'      => $regular_limit > 0 ? $regular_limit : 1,
					'offset'              => $regular_offset,
					'orderby'             => 'date',
					'order'               => 'DESC',
					'ignore_sticky_posts' => true,
					'no_found_rows'       => false,
				);

				if ( ! empty( $pinned_post_ids ) ) {
					$regular_query_args['post__not_in'] = $pinned_post_ids;
				}

				if ( $is_all_archive ) {
					$kt_term = get_category_by_slug( 'kien-thuc' );
					if ( $kt_term instanceof WP_Term ) {
						$regular_query_args['cat'] = (int) $kt_term->term_id;
					}
				} elseif ( $current_id > 0 ) {
					$regular_query_args['cat'] = $current_id;
				}

				$regular_query       = new WP_Query( $regular_query_args );
				$regular_total_count = (int) $regular_query->found_posts;

				if ( $regular_limit > 0 ) {
					$regular_posts = $regular_query->posts;
				}

				// 4. Calculate accurate total pages across both pinned and regular pools.
				$total_items = $pinned_count + $regular_total_count;
				if ( $total_items <= $per_page ) {
					$total_pages = 1;
				} else {
					$remaining_after_page_1 = max( 0, $total_items - $per_page );
					$total_pages            = 1 + (int) ceil( $remaining_after_page_1 / $per_page );
				}

				// Synchronize global $wp_query max_num_pages so all core/plugin hooks stay aligned.
				global $wp_query;
				if ( $wp_query instanceof WP_Query ) {
					$wp_query->max_num_pages = $total_pages;
				}

				// 5. Build combined display posts list for current page.
				if ( 1 === $current_page ) {
					$display_posts = array_merge( $pinned_posts, $regular_posts );
				} else {
					$display_posts = $regular_posts;
				}
				?>

				<?php if ( ! empty( $display_posts ) ) : ?>
					<div class="vpc-knowledge-article-stack">
						<?php
						$card_context_name = ( ! $is_all_archive && ! empty( $current_name ) ) ? $current_name : '';

						foreach ( $display_posts as $article_post ) {
							$article_data = function_exists( 'vpc_format_knowledge_card' )
								? vpc_format_knowledge_card( $article_post, $asset( 'mother-baby.jpeg' ), 32, $card_context_name )
								: array();

							if ( ! empty( $article_data ) ) {
								get_template_part( 'template-parts/knowledge/card-horizontal', null, array( 'article' => $article_data ) );
							}
						}
						?>
					</div>

					<!-- WordPress Numeric Pagination matching Figma < 1 2 3 4 5 > -->
					<?php if ( $total_pages > 1 ) : ?>
						<div class="vpc-knowledge-pagination-wrap">
							<?php
							$page_links = paginate_links( array(
								'base'      => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
								'format'    => '?paged=%#%',
								'current'   => $current_page,
								'total'     => $total_pages,
								'mid_size'  => 2,
								'end_size'  => 1,
								'prev_next' => false,
								'type'      => 'array',
							) );
							?>
							<?php if ( $page_links ) : ?>
								<nav class="pagination" aria-label="<?php esc_attr_e( 'Phân trang bài viết', 'vanphuccare' ); ?>">
									<div class="nav-links">
										<?php if ( $current_page > 1 ) : ?>
											<a class="page-numbers prev" href="<?php echo esc_url( get_pagenum_link( $current_page - 1 ) ); ?>" aria-label="<?php esc_attr_e( 'Trang trước', 'vanphuccare' ); ?>"><img src="<?php echo $asset( 'chevron-prev.svg' ); ?>" alt="" width="24" height="24" aria-hidden="true"></a>
										<?php else : ?>
											<span class="page-numbers prev is-disabled" aria-disabled="true"><img src="<?php echo $asset( 'chevron-prev.svg' ); ?>" alt="" width="24" height="24" aria-hidden="true"><span class="screen-reader-text"><?php esc_html_e( 'Trang trước', 'vanphuccare' ); ?></span></span>
										<?php endif; ?>

										<?php foreach ( $page_links as $page_link ) : ?>
											<?php echo wp_kses_post( $page_link ); ?>
										<?php endforeach; ?>

										<?php if ( $current_page < $total_pages ) : ?>
											<a class="page-numbers next" href="<?php echo esc_url( get_pagenum_link( $current_page + 1 ) ); ?>" aria-label="<?php esc_attr_e( 'Trang sau', 'vanphuccare' ); ?>"><img src="<?php echo $asset( 'chevron-next.svg' ); ?>" alt="" width="24" height="24" aria-hidden="true"></a>
										<?php else : ?>
											<span class="page-numbers next is-disabled" aria-disabled="true"><img src="<?php echo $asset( 'chevron-next.svg' ); ?>" alt="" width="24" height="24" aria-hidden="true"><span class="screen-reader-text"><?php esc_html_e( 'Trang sau', 'vanphuccare' ); ?></span></span>
										<?php endif; ?>
									</div>
								</nav>
							<?php endif; ?>
						</div>
					<?php endif; ?>
				<?php else : ?>
					<div class="vpc-knowledge-empty">
						<p><?php esc_html_e( 'Hiện chưa có bài viết nào trong chuyên mục này. Mời bạn quay lại sau!', 'vanphuccare' ); ?></p>
						<a class="vpc-knowledge-empty__btn" href="<?php echo esc_url( home_url( '/kien-thuc/' ) ); ?>"><?php esc_html_e( 'Về trang Kiến Thức', 'vanphuccare' ); ?></a>
					</div>
				<?php endif; ?>
			</main>

			<!-- Right Sidebar Column -->
			<?php get_template_part( 'template-parts/knowledge/sidebar' ); ?>
		</div>
	</section>
</div>

<?php get_footer(); ?>
