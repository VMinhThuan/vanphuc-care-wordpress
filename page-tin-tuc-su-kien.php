<?php
/**
 * News and events hub.
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

$fallback_articles = array(
	array(
		'title'   => 'Phương pháp 5s trong Easy: Bí quyết vỗ về trẻ sơ sinh hiệu quả',
		'excerpt' => 'Những tuần đầu tiên của tam cá nguyệt thứ hai, nguy cơ sảy thai đã giảm đi đáng kể, và thai nhi đang phát triển với tốc độ vượt bậc. Những kiến thức thực tế giúp cha mẹ chăm sóc con tốt hơn.',
		'image'   => $asset( 'featured-pump.png' ),
	),
	array(
		'title'   => 'Sữa Trưởng Thành: Giai đoạn hoàn thiện của sữa mẹ',
		'excerpt' => 'Khởi đầu từ khát vọng mang đến sự chăm sóc chuyên nghiệp và hoàn hảo nhất cho mẹ và bé, Vạn Phúc Care đã trải qua một hành trình đầy sáng tạo.',
		'image'   => $asset( 'ultrasound.png' ),
	),
	array(
		'title'   => 'Sữa Trưởng Thành: Giai đoạn hoàn thiện của sữa mẹ',
		'excerpt' => 'Khởi đầu từ khát vọng mang đến sự chăm sóc chuyên nghiệp và hoàn hảo nhất cho mẹ và bé, Vạn Phúc Care đã trải qua một hành trình đầy sáng tạo.',
		'image'   => $asset( 'nurse-baby.jpeg' ),
	),
	array(
		'title'   => 'Sữa Trưởng Thành: Giai đoạn hoàn thiện của sữa mẹ',
		'excerpt' => 'Khởi đầu từ khát vọng mang đến sự chăm sóc chuyên nghiệp và hoàn hảo nhất cho mẹ và bé, Vạn Phúc Care đã trải qua một hành trình đầy sáng tạo.',
		'image'   => $asset( 'baby-bottle.jpeg' ),
	),
	array(
		'title'   => 'Phương Pháp 5S Trong EASY',
		'excerpt' => 'Năm bước xoá dịu giúp bé dễ ngủ hơn, được áp dụng trong chu trình nuôi con EASY.',
		'image'   => $asset( 'baby-bottle.jpeg' ),
	),
	array(
		'title'   => 'Tổng Hợp Cơ Hội Việc Làm Ngành Điều Dưỡng Năm 2025',
		'excerpt' => 'Khi bạn đang ở những năm cuối trên ghế nhà trường, câu hỏi lớn nhất là bắt đầu sự nghiệp từ đâu.',
		'image'   => $asset( 'baby-bottle.jpeg' ),
	),
);

$query_args = array(
	'post_type'           => 'post',
	'post_status'         => 'publish',
	'posts_per_page'      => 6,
	'ignore_sticky_posts' => true,
	'orderby'             => 'date',
	'order'               => 'DESC',
);
$news_category = get_category_by_slug( 'tin-tuc' ) ?: get_category_by_slug( 'su-kien' );
if ( $news_category instanceof WP_Term ) {
	$query_args['cat'] = (int) $news_category->term_id;
}
$query = new WP_Query( $query_args );

$articles = array();
foreach ( $fallback_articles as $index => $fallback ) {
	$post = $query->posts[ $index ] ?? null;

	if ( $post instanceof WP_Post ) {
		$articles[] = array(
			'id'      => $post->ID,
			'title'   => get_the_title( $post ),
			'excerpt' => wp_trim_words( get_the_excerpt( $post ), 34, '...' ),
			'image'   => has_post_thumbnail( $post ) ? get_the_post_thumbnail_url( $post, 'large' ) : $fallback['image'],
			'url'     => get_permalink( $post ),
			'author'  => get_the_author_meta( 'display_name', (int) $post->post_author ) ?: 'Vạn Phúc Care',
			'date'    => get_the_date( 'd/m/Y', $post ),
		);
	} else {
		$articles[] = array_merge(
			$fallback,
			array(
				'id'      => 0,
				'url'     => home_url( '/kien-thuc/' ),
				'author'  => 'Tên tác giả',
				'date'    => '12/09/2024',
			)
		);
	}
}

$render_card_meta = static function ( $article, $label ) use ( $asset ) {
	?>
	<span class="vpc-news-card__category"><?php echo esc_html( ! empty( $article['category'] ) ? $article['category'] : $label ); ?></span>
	<h3><a href="<?php echo esc_url( $article['url'] ); ?>"><?php echo esc_html( $article['title'] ); ?></a></h3>
	<p><?php echo esc_html( $article['excerpt'] ); ?></p>
	<div class="vpc-news-card__footer">
		<span class="vpc-news-card__author">
			<img src="<?php echo $asset( 'author.jpeg' ); ?>" alt="" width="20" height="20">
			<span><?php echo esc_html( $article['author'] ); ?></span>
		</span>
		<time><?php echo esc_html( $article['date'] ); ?></time>
	</div>
	<?php
};

$render_section = static function ( $title, $label, $items ) use ( $render_card_meta ) {
	$is_latest = 'Tin mới' === $title;
	?>
	<section class="vpc-news-section <?php echo $is_latest ? 'vpc-news-section--latest' : 'vpc-news-section--featured'; ?>" aria-labelledby="<?php echo esc_attr( sanitize_title( $title ) ); ?>">
		<h2 id="<?php echo esc_attr( sanitize_title( $title ) ); ?>"><?php echo esc_html( $title ); ?></h2>
		<?php if ( $is_latest ) : ?>
			<div class="vpc-news-categories" role="list" aria-label="Danh mục tin tức">
				<button class="vpc-news-category-card is-active" type="button" role="listitem">
					<span class="vpc-news-category-card__icon"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/knowledge/category-1.svg' ); ?>" alt="" width="20" height="20"></span>
					<span>Tất cả</span>
				</button>
				<button class="vpc-news-category-card" type="button" role="listitem">
					<span class="vpc-news-category-card__icon"><img class="vpc-news-category-card__glyph" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/knowledge/icon-me-va-be.svg' ); ?>" alt=""></span>
					<span>Mẹ và bé</span>
				</button>
				<button class="vpc-news-category-card" type="button" role="listitem">
					<span class="vpc-news-category-card__icon"><img class="vpc-news-category-card__glyph" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/knowledge/icon-tin-tuc-su-kien.svg' ); ?>" alt=""></span>
					<span>Tin tức &amp; sự kiện</span>
				</button>
			</div>
		<?php endif; ?>
		<div class="vpc-news-featured-card">
			<a class="vpc-news-featured-card__image" href="<?php echo esc_url( $items[0]['url'] ); ?>">
				<img src="<?php echo esc_url( $items[0]['image'] ); ?>" alt="<?php echo esc_attr( $items[0]['title'] ); ?>" loading="eager">
			</a>
			<div class="vpc-news-featured-card__body">
				<?php $render_card_meta( $items[0], $label ); ?>
			</div>
		</div>
		<div class="vpc-news-grid">
			<?php foreach ( array_slice( $items, 1, 5 ) as $article ) : ?>
				<article class="vpc-news-card">
					<a class="vpc-news-card__image" href="<?php echo esc_url( $article['url'] ); ?>">
						<img src="<?php echo esc_url( $article['image'] ); ?>" alt="<?php echo esc_attr( $article['title'] ); ?>" loading="lazy">
					</a>
					<div class="vpc-news-card__body">
						<?php $render_card_meta( $article, $label ); ?>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
		<a class="vpc-news-more" href="<?php echo esc_url( home_url( '/kien-thuc/' ) ); ?>"><?php esc_html_e( 'Xem thêm', 'vanphuccare' ); ?></a>
	</section>
	<?php
};
?>

<div class="vpc-news-page">
	<section class="vpc-news-hero" aria-labelledby="vpc-news-title">
		<div class="vpc-container vpc-news-hero__inner">
			<div class="vpc-news-hero__copy">
				<div class="vpc-news-badge"><img src="<?php echo $asset( 'star-light.svg' ); ?>" alt="" width="24" height="24" aria-hidden="true"><span><?php esc_html_e( 'CẬP NHẬT', 'vanphuccare' ); ?></span></div>
				<h1 id="vpc-news-title"><span><?php esc_html_e( 'Tin Tức Sự Kiện', 'vanphuccare' ); ?></span><em><?php esc_html_e( 'Mới Nhất', 'vanphuccare' ); ?></em></h1>
				<p><?php esc_html_e( 'Điểm tin xu hướng, góc nhìn chuyên môn cùng các chương trình, sự kiện đồng hành mới nhất dành cho cha mẹ.', 'vanphuccare' ); ?></p>
				<form class="vpc-news-search" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
					<img src="<?php echo $asset( 'search.svg' ); ?>" alt="" width="24" height="24" aria-hidden="true">
					<label class="screen-reader-text" for="vpc-news-search-input"><?php esc_html_e( 'Tìm tin tức, sự kiện', 'vanphuccare' ); ?></label>
					<input id="vpc-news-search-input" type="search" name="s" placeholder="Tìm tin tức, sự kiện..." data-mobile-placeholder="Tìm tin tức...">
					<button type="submit"><span class="vpc-news-search-button-label--desktop">Tìm kiếm</span><span class="vpc-news-search-button-label--mobile">Tìm</span></button>
				</form>
			</div>
			<div class="vpc-news-hero__visual" aria-hidden="true">
				<img class="vpc-news-hero__blob" src="<?php echo $asset( 'blob.svg' ); ?>" alt="" width="340" height="340">
				<img class="vpc-news-hero__accent" src="<?php echo $asset( 'blob-accent.svg' ); ?>" alt="" width="116" height="116">
				<img class="vpc-news-hero__mascot" src="<?php echo $asset( '21941b00-c6ab-4b41-b5e5-7f06439e556c.svg' ); ?>" alt="" width="290" height="290">
				<span class="vpc-news-chip vpc-news-chip--left"><?php esc_html_e( 'Xu hướng', 'vanphuccare' ); ?></span>
				<span class="vpc-news-chip vpc-news-chip--top"><?php esc_html_e( 'Sự kiện', 'vanphuccare' ); ?></span>
				<span class="vpc-news-chip vpc-news-chip--bottom"><?php esc_html_e( 'Tin tức', 'vanphuccare' ); ?></span>
			</div>
		</div>
	</section>

	<div class="vpc-news-content" aria-label="<?php esc_attr_e( 'Tin tức và sự kiện', 'vanphuccare' ); ?>">
		<?php $render_section( 'Sự kiện nổi bật', 'Sự kiện nổi bật', $articles ); ?>
		<div class="vpc-news-divider" aria-hidden="true"></div>
		<?php $render_section( 'Tin mới', 'Tin mới', $articles ); ?>
	</div>
</div>

<?php get_footer(); ?>
