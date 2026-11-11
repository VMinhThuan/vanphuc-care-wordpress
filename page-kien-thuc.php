<?php
/**
 * Knowledge hub page template.
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$knowledge_uri = get_template_directory_uri() . '/assets/images/knowledge';
$asset = static function ( $name ) use ( $knowledge_uri ) {
	return esc_url( $knowledge_uri . '/' . $name );
};

if ( ! function_exists( 'vpc_format_knowledge_card' ) ) {
	/**
	 * Normalizes a WP_Post object into structured article data for knowledge cards.
	 *
	 * @param WP_Post|int|null $post_obj Post object or ID.
	 * @param string           $default_image Fallback image URL.
	 * @return array<string, mixed> Structured article data.
	 */
	function vpc_format_knowledge_card( $post_obj, $default_image = '' ) {
		$post = get_post( $post_obj );
		if ( ! $post ) {
			return array();
		}

		$primary_term  = function_exists( 'vanphuccare_get_primary_category' )
			? vanphuccare_get_primary_category( $post )
			: null;
		$category_name = $primary_term ? $primary_term->name : __( 'Cẩm nang cho mẹ', 'vanphuccare' );

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
			'excerpt'  => wp_trim_words( get_the_excerpt( $post ), 28, '...' ),
			'url'      => get_permalink( $post ),
			'image'    => $image_url,
			'category' => $category_name,
			'author'   => get_the_author_meta( 'display_name', (int) $post->post_author ) ?: 'Vạn Phúc Care',
			'date'     => get_the_date( 'd/m/Y', $post ),
		);
	}
}

// 1. Resolve knowledge category and defensively isolate queries.
$kt_cat         = get_category_by_slug( 'kien-thuc' );
$featured_posts = array();
$category_posts = array();

if ( $kt_cat instanceof WP_Term ) {
	$kt_cat_id = (int) $kt_cat->term_id;

	// Read sticky post IDs from WordPress Core.
	$sticky_ids = array_filter( array_map( 'absint', (array) get_option( 'sticky_posts', array() ) ) );

	// Step 1: Query sticky posts that belong strictly to 'kien-thuc' category (up to 4).
	if ( ! empty( $sticky_ids ) ) {
		$sticky_query = new WP_Query( array(
			'post_type'           => 'post',
			'post_status'         => 'publish',
			'cat'                 => $kt_cat_id,
			'post__in'            => $sticky_ids,
			'posts_per_page'      => 4,
			'ignore_sticky_posts' => true,
			'orderby'             => 'date',
			'order'               => 'DESC',
		) );
		$featured_posts = $sticky_query->posts;
	}

	// Step 2: If fewer than 4 sticky posts, fill remaining slots with the latest posts in 'kien-thuc'.
	$needed = 4 - count( $featured_posts );
	if ( $needed > 0 ) {
		$exclude_ids = wp_list_pluck( $featured_posts, 'ID' );
		$fill_args   = array(
			'post_type'           => 'post',
			'post_status'         => 'publish',
			'cat'                 => $kt_cat_id,
			'posts_per_page'      => $needed,
			'ignore_sticky_posts' => true,
			'orderby'             => 'date',
			'order'               => 'DESC',
		);
		if ( ! empty( $exclude_ids ) ) {
			$fill_args['post__not_in'] = $exclude_ids;
		}
		$fill_query = new WP_Query( $fill_args );
		if ( ! empty( $fill_query->posts ) ) {
			$featured_posts = array_merge( $featured_posts, $fill_query->posts );
		}
	}

	// 2. Query Category Preview Articles (6 horizontal cards, strictly excluding featured posts).
	$featured_ids  = wp_list_pluck( $featured_posts, 'ID' );
	$category_args = array(
		'post_type'           => 'post',
		'post_status'         => 'publish',
		'cat'                 => $kt_cat_id,
		'posts_per_page'      => 6,
		'ignore_sticky_posts' => true,
		'orderby'             => 'date',
		'order'               => 'DESC',
	);
	if ( ! empty( $featured_ids ) ) {
		$category_args['post__not_in'] = $featured_ids;
	}
	$category_query = new WP_Query( $category_args );
	$category_posts = $category_query->posts;

	// If total posts is small, allow previewing available posts.
	if ( empty( $category_posts ) && ! empty( $featured_posts ) ) {
		$category_posts = $featured_posts;
	}
}

// Format articles into card data arrays.
$sample_images = array(
	$asset( 'featured-pump.png' ),
	$asset( 'ultrasound.png' ),
	$asset( 'nurse-baby.jpeg' ),
	$asset( 'baby-bottle.jpeg' ),
	$asset( 'baby-care.png' ),
	$asset( 'mother-baby.jpeg' ),
	$asset( 'newborn.jpeg' ),
	$asset( 'consultation.jpeg' ),
	$asset( 'training.jpeg' ),
);

$featured_articles = array();
foreach ( $featured_posts as $idx => $p ) {
	$fallback_img = $sample_images[ $idx % count( $sample_images ) ];
	$featured_articles[] = vpc_format_knowledge_card( $p, $fallback_img );
}

$category_articles = array();
foreach ( $category_posts as $idx => $p ) {
	$fallback_img = $sample_images[ ( $idx + 4 ) % count( $sample_images ) ];
	$category_articles[] = vpc_format_knowledge_card( $p, $fallback_img );
}

// 3. Categories definition matching Figma icons & slugs.
$categories_defs = array(
	array( 'slug' => '', 'label' => __( 'Tất cả', 'vanphuccare' ), 'icon' => 'category-1.svg' ),
	array( 'slug' => 'mang-thai', 'label' => __( 'Mang thai', 'vanphuccare' ), 'icon' => 'category-2.svg' ),
	array( 'slug' => 'phuong-phap-easy', 'label' => __( 'Phương pháp EASY', 'vanphuccare' ), 'icon' => 'category-3.svg' ),
	array( 'slug' => 'an-dam', 'label' => __( 'Ăn dặm', 'vanphuccare' ), 'icon' => 'category-4.svg' ),
	array( 'slug' => 'hoi-chung-bieng-an', 'label' => __( 'Hội chứng biếng ăn', 'vanphuccare' ), 'icon' => 'category-5.svg' ),
	array( 'slug' => 'cam-nang-cho-me', 'label' => __( 'Cẩm nang cho mẹ', 'vanphuccare' ), 'icon' => 'category-6.svg' ),
);

$categories = array();
foreach ( $categories_defs as $cat_def ) {
	$is_all = empty( $cat_def['slug'] );
	$url    = home_url( '/kien-thuc/' );

	if ( ! $is_all ) {
		$cat_obj = get_category_by_slug( $cat_def['slug'] );
		if ( ! $cat_obj && 'phuong-phap-easy' === $cat_def['slug'] ) {
			$cat_obj = get_category_by_slug( 'easy' );
		} elseif ( ! $cat_obj && 'hoi-chung-bieng-an' === $cat_def['slug'] ) {
			$cat_obj = get_category_by_slug( 'tre-so-sinh-bieng-an-toan-tap' ) ?: get_category_by_slug( 'bieng-an' );
		} elseif ( ! $cat_obj && 'cam-nang-cho-me' === $cat_def['slug'] ) {
			$cat_obj = get_category_by_slug( 'cam-nang' );
		}

		if ( $cat_obj ) {
			$url = get_category_link( $cat_obj->term_id );
		} else {
			$url = home_url( '/category/' . $cat_def['slug'] . '/' );
		}
	}

	$categories[] = array(
		'slug'   => $cat_def['slug'],
		'label'  => $cat_def['label'],
		'icon'   => $cat_def['icon'],
		'url'    => $url,
		'active' => $is_all,
	);
}

// "Xem tất cả" button target URL: leads to full clean archive listing of all posts (Figma Image 2).
$view_all_url = home_url( '/kien-thuc/tat-ca/' );
?>

<div class="vpc-knowledge" id="kien-thuc">
	<section class="vpc-knowledge-hero" aria-labelledby="knowledge-title">
		<div class="vpc-knowledge-hero__copy">
			<div class="vpc-knowledge-badge">
				<img src="<?php echo $asset( 'star-light.svg' ); ?>" alt="" width="24" height="24" aria-hidden="true">
				<span><?php esc_html_e( 'KIẾN THỨC', 'vanphuccare' ); ?></span>
			</div>
			<h1 id="knowledge-title"><span><?php esc_html_e( 'Kinh Nghiệm Thực Chiến', 'vanphuccare' ); ?></span><em><?php esc_html_e( 'Để Sẵn Sàng Làm Mẹ', 'vanphuccare' ); ?></em></h1>
			<p><?php esc_html_e( 'Trang tổng hợp bài viết, kiến thức chăm sóc mẹ và bé. Được biên tập dựa trên kinh nghiệm thực chiến, dưới góc nhìn điều dưỡng sản nhi. Trực quan, dễ đọc, dễ hiểu, có thể thực hành ngay.', 'vanphuccare' ); ?></p>
			<form class="vpc-knowledge-search" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
				<img src="<?php echo $asset( 'search.svg' ); ?>" alt="" width="24" height="24" aria-hidden="true">
				<label class="screen-reader-text" for="knowledge-search-input"><?php esc_html_e( 'Tìm bài viết', 'vanphuccare' ); ?></label>
				<input id="knowledge-search-input" type="search" name="s" placeholder="<?php esc_attr_e( 'Tìm bài viết: ăn dặm, EASY, thai giáo...', 'vanphuccare' ); ?>" data-mobile-placeholder="<?php esc_attr_e( 'Tìm bài viết...', 'vanphuccare' ); ?>">
				<button type="submit">
					<span class="vpc-knowledge-search-label-desktop"><?php esc_html_e( 'Tìm kiếm', 'vanphuccare' ); ?></span>
					<span class="vpc-knowledge-search-label-mobile"><?php esc_html_e( 'Tìm', 'vanphuccare' ); ?></span>
				</button>
			</form>
			<script>
				(function () {
					var input = document.getElementById('knowledge-search-input');
					if (!input || !window.matchMedia) return;
					var mobileQuery = window.matchMedia('(max-width: 767px)');
					var syncPlaceholder = function () {
						input.placeholder = mobileQuery.matches ? input.dataset.mobilePlaceholder : input.getAttribute('data-desktop-placeholder') || input.defaultValue;
					};
					input.setAttribute('data-desktop-placeholder', input.placeholder);
					syncPlaceholder();
					if (mobileQuery.addEventListener) mobileQuery.addEventListener('change', syncPlaceholder);
					else if (mobileQuery.addListener) mobileQuery.addListener(syncPlaceholder);
				})();
			</script>
		</div>

		<div class="vpc-knowledge-hero__visual" aria-hidden="true">
			<img class="vpc-knowledge-hero__blob" src="<?php echo $asset( 'blob.svg' ); ?>" alt="" width="340" height="340">
			<img class="vpc-knowledge-hero__accent" src="<?php echo $asset( 'blob-accent.svg' ); ?>" alt="" width="116" height="116">
			<img class="vpc-knowledge-hero__mascot" src="<?php echo esc_url( $knowledge_uri . '/hero-mascot.png' ); ?>" alt="" width="290" height="290">
			<span class="vpc-knowledge-chip vpc-knowledge-chip--left"><?php esc_html_e( 'Mang thai', 'vanphuccare' ); ?></span>
			<span class="vpc-knowledge-chip vpc-knowledge-chip--top"><?php esc_html_e( 'Phương pháp EASY', 'vanphuccare' ); ?></span>
			<span class="vpc-knowledge-chip vpc-knowledge-chip--bottom"><?php esc_html_e( 'Ăn dặm', 'vanphuccare' ); ?></span>
		</div>
	</section>

	<section class="vpc-knowledge-content" aria-label="<?php esc_attr_e( 'Bài viết kiến thức', 'vanphuccare' ); ?>">
		<?php if ( ! empty( $featured_articles ) ) : ?>
			<div class="vpc-knowledge-section vpc-knowledge-featured">
				<h2><?php esc_html_e( 'Bài viết nổi bật', 'vanphuccare' ); ?></h2>
				<article class="vpc-knowledge-featured-card">
					<a class="vpc-knowledge-featured-card__image" href="<?php echo esc_url( $featured_articles[0]['url'] ); ?>">
						<img src="<?php echo esc_url( $featured_articles[0]['image'] ); ?>" alt="<?php echo esc_attr( $featured_articles[0]['title'] ); ?>" loading="eager">
					</a>
					<div class="vpc-knowledge-featured-card__body">
						<?php get_template_part( 'template-parts/knowledge/card-meta', null, array( 'article' => $featured_articles[0] ) ); ?>
					</div>
				</article>

				<?php if ( count( $featured_articles ) > 1 ) : ?>
					<div class="vpc-knowledge-top-grid">
						<?php foreach ( array_slice( $featured_articles, 1, 3 ) as $article ) : ?>
							<?php get_template_part( 'template-parts/knowledge/card', null, array( 'article' => $article ) ); ?>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
			</div>

			<div class="vpc-knowledge-divider" aria-hidden="true"></div>
		<?php endif; ?>

		<div class="vpc-knowledge-section vpc-knowledge-categories">
			<h2><?php esc_html_e( 'Chuyên mục', 'vanphuccare' ); ?></h2>
			<div class="vpc-knowledge-category-list" role="list">
				<?php foreach ( $categories as $category ) : ?>
					<a class="vpc-knowledge-category<?php echo ! empty( $category['active'] ) ? ' is-active' : ''; ?>" href="<?php echo esc_url( $category['url'] ); ?>" role="listitem">
						<span class="vpc-knowledge-category__icon"><img src="<?php echo $asset( $category['icon'] ); ?>" alt="" width="24" height="24" aria-hidden="true"></span>
						<span><?php echo esc_html( $category['label'] ); ?></span>
					</a>
				<?php endforeach; ?>
			</div>

			<?php if ( ! empty( $category_articles ) ) : ?>
				<div class="vpc-knowledge-category-grid">
					<?php foreach ( $category_articles as $article ) : ?>
						<?php get_template_part( 'template-parts/knowledge/card-horizontal', null, array( 'article' => $article ) ); ?>
					<?php endforeach; ?>
				</div>

				<a class="vpc-knowledge-view-all" href="<?php echo esc_url( $view_all_url ); ?>"><?php esc_html_e( 'Xem tất cả', 'vanphuccare' ); ?></a>
			<?php else : ?>
				<div class="vpc-knowledge-empty text-center py-12 text-neutral-500">
					<p><?php esc_html_e( 'Nội dung đang được cập nhật. Vui lòng quay lại sau.', 'vanphuccare' ); ?></p>
				</div>
			<?php endif; ?>
		</div>
	</section>
</div>

<?php get_footer(); ?>
