<?php
/**
 * Tin mới archive page.
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$news_uri = get_template_directory_uri() . '/assets/images/knowledge';
$asset    = static function ( $name ) use ( $news_uri ) {
	return esc_url( $news_uri . '/' . $name );
};

$queried_term = get_queried_object();
if ( $queried_term instanceof WP_Term && 'category' === $queried_term->taxonomy ) {
	$news_category = $queried_term;
} else {
	$news_category = get_category_by_slug( 'tin-moi' )
		?: get_category_by_slug( 'su-kien-noi-bat' )
		?: get_category_by_slug( 'tin-tuc' )
		?: get_category_by_slug( 'tin-tuc-su-kien-moi-nhat' );
}
$news_category_id = $news_category instanceof WP_Term ? (int) $news_category->term_id : 0;
$news_title       = $news_category instanceof WP_Term ? $news_category->name : 'Tin tức & Sự kiện';
$news_heading     = $news_title;
$is_latest_news   = $news_category instanceof WP_Term && 'tin-moi' === sanitize_title( $news_category->slug );
$is_featured_event = $news_category instanceof WP_Term && 'su-kien-noi-bat' === sanitize_title( $news_category->slug );
$is_news_category_page = $is_latest_news || $is_featured_event;

if ( $is_latest_news ) {
	$news_heading = 'Tin Mới';
}

$news_description = $news_category instanceof WP_Term
	? trim( wp_kses_post( term_description( $news_category_id, 'category' ) ) )
	: '';

if ( empty( $news_description ) ) {
	$cat_slug = $news_category instanceof WP_Term ? $news_category->slug : '';
	if ( 'tin-moi' === $cat_slug ) {
		$news_description = 'Góc tư vấn cho phụ huynh cùng hoạt động, sự kiện và cơ hội nghề nghiệp mới nhất tại Vạn Phúc Care.';
	} elseif ( 'su-kien-noi-bat' === $cat_slug ) {
		$news_description = 'Tin tức và sự kiện là nơi cập nhật liên tục những hoạt động mới nhất, hội thảo và dấu ấn của đại gia đình Vạn Phúc Care.';
	}
}

$fallback_articles = array(
	array(
		'category' => 'Mẹ và bé',
		'title'    => 'Để Tìm Người Giúp Việc Chăm Em Bé Thành Công',
		'excerpt'  => 'Những tiêu chí cần cân nhắc và các bước nên làm để chọn được người chăm bé phù hợp với gia đình bạn.',
		'image'    => $asset( 'ultrasound.png' ),
		'date'     => '20/10/2026',
	),
	array(
		'category' => 'Tin tức & Sự kiện',
		'title'    => 'Nghề Bảo Mẫu Là Gì? Từ Người Trông Trẻ Đến Chuyên Gia Chăm Sóc Em Bé',
		'excerpt'  => 'Không còn đơn thuần là công việc trông trẻ, nghề bảo mẫu trong kỷ nguyên mới là sự kết hợp giữa tri thức y khoa, kỹ năng sư phạm và tình yêu thương.',
		'image'    => $asset( 'news-thermometer.jpeg' ),
		'date'     => '26/11/2025',
	),
	array(
		'category' => 'Mẹ và bé',
		'title'    => 'Hướng Dẫn Nuôi Con EASY Cho Mẹ Hiện Đại, Đơn Giản Thôi Mà',
		'excerpt'  => 'Chu trình Ăn – Chơi – Ngủ – Thời gian cho mẹ, giải thích dễ hiểu và áp dụng được ngay tại nhà.',
		'image'    => $asset( 'news-nursery.jpeg' ),
		'date'     => '12/10/2026',
	),
	array(
		'category' => 'Tin tức & Sự kiện',
		'title'    => 'Tổng Hợp Cơ Hội Việc Làm Ngành Điều Dưỡng Năm 2025',
		'excerpt'  => 'Khi bạn đang ở những năm cuối trên ghế nhà trường, hay đã kết thúc kỳ thực tập cuối cùng, câu hỏi lớn nhất là bản thân nên bắt đầu sự nghiệp từ đâu.',
		'image'    => $asset( 'news-mother-baby.png' ),
		'date'     => '07/07/2025',
	),
	array(
		'category' => 'Mẹ và bé',
		'title'    => 'Phương Pháp 5S Trong EASY',
		'excerpt'  => 'Năm bước xoa dịu giúp bé dễ ngủ hơn, được áp dụng trong chu trình nuôi con EASY.',
		'image'    => $asset( 'news-bottle.jpeg' ),
		'date'     => '05/10/2026',
	),
	array(
		'category' => 'Tin tức & Sự kiện',
		'title'    => 'Tìm Việc Làm Điều Dưỡng Tại Hà Nội: Đừng Bỏ Lỡ Xu Hướng Chăm Sóc Mẹ & Bé Đầy Tiềm Năng',
		'excerpt'  => 'Thị trường tìm việc làm điều dưỡng tại Hà Nội vô cùng sôi động nhưng cũng đầy cạnh tranh giữa hàng trăm lựa chọn.',
		'image'    => $asset( 'news-nurse-baby.jpeg' ),
		'date'     => '09/07/2025',
	),
	array(
		'category' => 'Mẹ và bé',
		'title'    => 'Phương Pháp 5S Trong EASY',
		'excerpt'  => 'Năm bước xoa dịu giúp bé dễ ngủ hơn, được áp dụng trong chu trình nuôi con EASY.',
		'image'    => $asset( 'news-bottle.jpeg' ),
		'date'     => '05/10/2026',
	),
	array(
		'category' => 'Tin tức & Sự kiện',
		'title'    => 'Tìm Việc Làm Điều Dưỡng Tại Hà Nội: Đừng Bỏ Lỡ Xu Hướng Chăm Sóc Mẹ & Bé Đầy Tiềm Năng',
		'excerpt'  => 'Thị trường tìm việc làm điều dưỡng tại Hà Nội vô cùng sôi động nhưng cũng đầy cạnh tranh giữa hàng trăm lựa chọn.',
		'image'    => $asset( 'news-nurse-baby.jpeg' ),
		'date'     => '09/07/2025',
	),
);

$paged      = max( 1, absint( get_query_var( 'paged' ) ) );
$query_args = array(
	'post_type'           => 'post',
	'post_status'         => 'publish',
	'posts_per_page'      => 8,
	'paged'               => $paged,
	'ignore_sticky_posts' => true,
	'orderby'             => 'date',
	'order'               => 'DESC',
);

if ( $news_category_id ) {
	$query_args['cat'] = $news_category_id;
} else {
	$query_args['post__in'] = array( 0 );
}

$query    = new WP_Query( $query_args );
$articles = array();

foreach ( $fallback_articles as $index => $fallback ) {
	$post = $query->posts[ $index ] ?? null;

	if ( $post instanceof WP_Post ) {
		$categories = get_the_category( $post->ID );
		$category   = ! empty( $categories ) ? $categories[0]->name : $fallback['category'];

		$excerpt_source = preg_replace(
			'/\s*(?:\[\s*(?:…|\.\.\.)\s*\]|…|\.\.\.)\s*$/u',
			'',
			wp_strip_all_tags( get_the_excerpt( $post ) )
		);

		$articles[] = array(
			'id'       => $post->ID,
			'category' => $category,
			'title'    => get_the_title( $post ),
			'excerpt'  => wp_trim_words( (string) $excerpt_source, 55, '' ),
			'image'    => has_post_thumbnail( $post ) ? get_the_post_thumbnail_url( $post, 'large' ) : $fallback['image'],
			'url'      => get_permalink( $post ),
			'author'   => get_the_author_meta( 'display_name', (int) $post->post_author ) ?: 'Content VPC',
			'date'     => get_the_date( 'd/m/Y', $post ),
		);
	} else {
		$articles[] = array_merge(
			$fallback,
			array(
				'id'     => 0,
				'url'    => home_url( '/tin-tuc/' ),
				'author' => 'Content VPC',
			)
		);
	}
}

$total_pages = max( 1, (int) $query->max_num_pages );
if ( 0 === (int) $query->found_posts ) {
	$total_pages = 5;
}

$render_card = static function ( $article, $index ) use ( $asset ) {
	?>
	<article class="vpc-news-card">
		<a class="vpc-news-card__image" href="<?php echo esc_url( $article['url'] ); ?>">
			<img src="<?php echo esc_url( $article['image'] ); ?>" alt="<?php echo esc_attr( $article['title'] ); ?>" <?php echo 0 === $index ? 'loading="eager"' : 'loading="lazy"'; ?> width="430" height="211">
		</a>
		<div class="vpc-news-card__body">
			<span class="vpc-news-card__category"><?php echo esc_html( $article['category'] ); ?></span>
			<h3><a href="<?php echo esc_url( $article['url'] ); ?>"><?php echo esc_html( $article['title'] ); ?></a></h3>
			<p><?php echo esc_html( $article['excerpt'] ); ?></p>
			<div class="vpc-news-card__footer">
				<span class="vpc-news-card__author">
					<img src="<?php echo $asset( 'author.jpeg' ); ?>" alt="" width="20" height="20">
					<span><?php echo esc_html( $article['author'] ); ?></span>
				</span>
				<time datetime="<?php echo esc_attr( $article['date'] ); ?>"><?php echo esc_html( $article['date'] ); ?></time>
			</div>
		</div>
	</article>
	<?php
};
?>

<div class="vpc-news-page<?php echo $is_news_category_page ? ' vpc-news-page--category' : ''; ?><?php echo $is_latest_news ? ' vpc-news-page--tin-moi' : ''; ?>">
	<section class="vpc-news-hero" aria-labelledby="vpc-news-title">
		<div class="vpc-container vpc-news-hero__inner">
			<div class="vpc-news-hero__copy">
				<nav class="vpc-news-breadcrumb" aria-label="Breadcrumb">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Trang chủ</a>
					<span class="vpc-news-breadcrumb__separator" aria-hidden="true">›</span>
					<a href="<?php echo esc_url( home_url( '/tin-tuc/' ) ); ?>">Tin tức</a>
					<span class="vpc-news-breadcrumb__separator" aria-hidden="true">›</span>
					<span class="vpc-news-breadcrumb__current"><?php echo esc_html( $news_title ); ?></span>
				</nav>
				<h1 id="vpc-news-title"><?php echo esc_html( $news_heading ); ?></h1>
				<div class="vpc-news-hero__description">
					<?php echo $news_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Sanitized with wp_kses_post above. ?>
				</div>
			</div>
			<div class="vpc-news-hero__visual" aria-hidden="true">
				<img class="vpc-news-hero__blob" src="<?php echo $asset( 'mang-thai-blob.svg' ); ?>" alt="" width="300" height="300">
				<div class="vpc-news-hero__photo">
					<img src="<?php echo $asset( 'mang-thai-photo-2.png' ); ?>" alt="" width="230" height="301">
				</div>
				<img class="vpc-news-hero__sticker" src="<?php echo $asset( 'mang-thai-sticker.svg' ); ?>" alt="" width="130" height="130">
				<img class="vpc-news-hero__mascot" src="<?php echo $asset( '21941b00-c6ab-4b41-b5e5-7f06439e556c.svg' ); ?>" alt="" width="114" height="114">
				<img class="vpc-news-hero__heart" src="<?php echo $asset( 'mang-thai-heart.svg' ); ?>" alt="" width="34" height="34">
				<img class="vpc-news-hero__heart-small" src="<?php echo $asset( 'mang-thai-heart-small.svg' ); ?>" alt="" width="18" height="18">
				<img class="vpc-news-hero__sparkle" src="<?php echo $asset( 'mang-thai-sparkle.svg' ); ?>" alt="" width="22" height="22">
				<span class="vpc-news-hero__dot vpc-news-hero__dot--blue"></span>
				<span class="vpc-news-hero__dot vpc-news-hero__dot--pink"></span>
				<span class="vpc-news-hero__latest"><i></i>Tin mới nhất</span>
			</div>
		</div>
	</section>

	<section class="vpc-news-body" aria-labelledby="vpc-news-all-title">
		<div class="vpc-news-body__inner">
			<h2 id="vpc-news-all-title">Tất cả bài viết</h2>
			<div class="vpc-news-layout">
				<div class="vpc-news-list">
					<form class="vpc-news-mobile-search" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
						<img src="<?php echo $asset( 'search.svg' ); ?>" alt="" width="22" height="22" aria-hidden="true">
						<label class="screen-reader-text" for="vpc-news-mobile-search-input">Tìm tin tức</label>
						<input id="vpc-news-mobile-search-input" type="search" name="s" placeholder="Tìm tin tức...">
						<button type="submit">Tìm</button>
					</form>

					<div class="vpc-news-mobile-featured">
						<h3>Sự kiện nổi bật</h3>
						<div class="vpc-news-mobile-featured__list">
							<a href="<?php echo esc_url( $articles[0]['url'] ); ?>" class="vpc-news-mobile-featured__item">
								<img src="<?php echo esc_url( $articles[0]['image'] ); ?>" alt="" width="114" height="95">
								<span><time><?php echo esc_html( $articles[0]['date'] ); ?></time><strong><?php echo esc_html( $articles[0]['title'] ); ?></strong></span>
							</a>
							<a href="<?php echo esc_url( $articles[2]['url'] ); ?>" class="vpc-news-mobile-featured__item">
								<img src="<?php echo esc_url( $articles[2]['image'] ); ?>" alt="" width="114" height="95">
								<span><time>12/10/2026</time><strong><?php echo esc_html( $articles[2]['title'] ); ?></strong></span>
							</a>
							<a href="<?php echo esc_url( $articles[4]['url'] ); ?>" class="vpc-news-mobile-featured__item">
								<img src="<?php echo esc_url( $articles[4]['image'] ); ?>" alt="" width="114" height="95">
								<span><time>05/10/2026</time><strong><?php echo esc_html( $articles[4]['title'] ); ?></strong></span>
							</a>
						</div>
					</div>

					<div class="vpc-news-mobile-cards">
						<?php foreach ( $articles as $index => $article ) : ?>
							<?php $render_card( $article, $index ); ?>
						<?php endforeach; ?>
					</div>

					<nav class="vpc-news-pagination" aria-label="Phân trang tin tức">
						<?php if ( $paged > 1 ) : ?>
							<a class="vpc-news-pagination__arrow" href="<?php echo esc_url( get_pagenum_link( $paged - 1 ) ); ?>" aria-label="Trang trước"><img src="<?php echo $asset( 'chevron-prev.svg' ); ?>" alt="" width="24" height="24"></a>
						<?php else : ?>
							<span class="vpc-news-pagination__arrow is-disabled" aria-hidden="true"><img src="<?php echo $asset( 'chevron-prev.svg' ); ?>" alt="" width="24" height="24"></span>
						<?php endif; ?>
						<?php for ( $page = 1; $page <= $total_pages; $page++ ) : ?>
							<?php if ( $page === $paged ) : ?>
								<span class="is-current" aria-current="page"><?php echo esc_html( $page ); ?></span>
							<?php else : ?>
								<a href="<?php echo esc_url( get_pagenum_link( $page ) ); ?>"><?php echo esc_html( $page ); ?></a>
							<?php endif; ?>
						<?php endfor; ?>
						<?php if ( $paged < $total_pages ) : ?>
							<a class="vpc-news-pagination__arrow" href="<?php echo esc_url( get_pagenum_link( $paged + 1 ) ); ?>" aria-label="Trang sau"><img src="<?php echo $asset( 'chevron-next.svg' ); ?>" alt="" width="24" height="24"></a>
						<?php else : ?>
							<span class="vpc-news-pagination__arrow is-disabled" aria-hidden="true"><img src="<?php echo $asset( 'chevron-next.svg' ); ?>" alt="" width="24" height="24"></span>
						<?php endif; ?>
					</nav>
				</div>

				<aside class="vpc-news-sidebar" aria-label="Tiện ích tin tức">
					<form class="vpc-news-sidebar__search" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
						<img src="<?php echo $asset( 'search.svg' ); ?>" alt="" width="22" height="22" aria-hidden="true">
						<label class="screen-reader-text" for="vpc-news-sidebar-search">Tìm tin tức</label>
						<input id="vpc-news-sidebar-search" type="search" name="s" placeholder="Tìm tin tức...">
						<button type="submit">Tìm</button>
					</form>

					<div class="vpc-news-tags">
						<h3>Tags</h3>
						<div class="vpc-news-tags__list">
							<a href="<?php echo esc_url( home_url( '/tag/bao-mau/' ) ); ?>">Bảo mẫu</a>
							<a href="<?php echo esc_url( home_url( '/tag/tuyen-dung/' ) ); ?>">Tuyển dụng</a>
							<a href="<?php echo esc_url( home_url( '/tag/cham-soc-tre-so-sinh/' ) ); ?>">Chăm sóc trẻ sơ sinh</a>
							<a href="<?php echo esc_url( home_url( '/tag/easy-cho-be/' ) ); ?>">EASY cho bé</a>
							<a href="<?php echo esc_url( home_url( '/tag/tre-so-sinh/' ) ); ?>">Trẻ sơ sinh</a>
							<a href="<?php echo esc_url( home_url( '/tag/me-va-be/' ) ); ?>">Mẹ và Bé</a>
						</div>
					</div>

					<a class="vpc-news-sidebar__banner" href="<?php echo esc_url( home_url( '/kien-thuc/' ) ); ?>">
						<img src="<?php echo $asset( 'mang-thai-banner.png' ); ?>" alt="Bé ăn ngon ngủ yên mẹ nhàn tênh" loading="lazy" width="365" height="411">
					</a>

					<div class="vpc-news-hotline">
						<div class="vpc-news-hotline__image">
							<img src="<?php echo $asset( 'nurse-baby.jpeg' ); ?>" alt="Điều dưỡng chăm sóc em bé" loading="lazy" width="365" height="200">
						</div>
						<div class="vpc-news-hotline__body">
							<div class="vpc-news-hotline__contact">
								<img src="<?php echo $asset( 'mang-thai-hotline-icon.svg' ); ?>" alt="" width="24" height="24">
								<div>
									<span>Hotline</span>
									<a href="tel:0376246673" class="vpc-news-hotline__phone">037 624 6673</a>
								</div>
							</div>
							<p>Liên hệ ngay để được tư vấn trực tiếp cùng các cô Điều dưỡng của Vạn Phúc Care ba mẹ nhé!</p>
							<button type="button" data-open-modal>Đăng Ký Tư Vấn</button>
						</div>
					</div>
				</aside>
			</div>
		</div>
	</section>
</div>

<?php get_footer(); ?>
