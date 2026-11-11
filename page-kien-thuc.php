<?php
/**
 * Knowledge hub page.
 *
 * @package VanPhucCare
 */

get_header();

$knowledge_uri = get_template_directory_uri() . '/assets/images/knowledge';

$fallback_articles = array(
	array(
		'title'    => 'Phương pháp 5s trong Easy: Bí quyết vỗ về trẻ sơ sinh hiệu quả',
		'excerpt'  => 'Những tuần đầu tiên của tam cá nguyệt thứ hai, nguy cơ sảy thai đã giảm đi đáng kể, và thai nhi đang phát triển với tốc độ vượt bậc. Thời gian đầu làm mẹ sẽ nhẹ nhàng hơn khi có kiến thức đúng.',
		'image'    => $knowledge_uri . '/featured-pump.png',
		'category' => 'Cẩm nang cho mẹ',
	),
	array(
		'title'   => 'Sữa Trưởng Thành: Giai đoạn hoàn thiện của sữa mẹ',
		'excerpt' => 'Khởi đầu từ khát vọng mang đến sự chăm sóc chuyên nghiệp và hoàn hảo nhất cho mẹ và bé, Vạn Phúc Care đã trải qua một hành trình đầy sáng tạo.',
		'image'   => $knowledge_uri . '/ultrasound.png',
	),
	array(
		'title'   => 'Sữa Trưởng Thành: Giai đoạn hoàn thiện của sữa mẹ',
		'excerpt' => 'Khởi đầu từ khát vọng mang đến sự chăm sóc chuyên nghiệp và hoàn hảo nhất cho mẹ và bé, Vạn Phúc Care đã trải qua một hành trình đầy sáng tạo.',
		'image'   => $knowledge_uri . '/nurse-baby.jpeg',
	),
	array(
		'title'   => 'Sữa Trưởng Thành: Giai đoạn hoàn thiện của sữa mẹ',
		'excerpt' => 'Khởi đầu từ khát vọng mang đến sự chăm sóc chuyên nghiệp và hoàn hảo nhất cho mẹ và bé, Vạn Phúc Care đã trải qua một hành trình đầy sáng tạo.',
		'image'   => $knowledge_uri . '/baby-bottle.jpeg',
	),
	array(
		'title'   => 'Sữa Trưởng Thành: Giai đoạn hoàn thiện của sữa mẹ',
		'excerpt' => 'Khởi đầu từ khát vọng mang đến sự chăm sóc chuyên nghiệp và hoàn hảo nhất cho mẹ và bé, Vạn Phúc Care đã trải qua một hành trình đầy sáng tạo.',
		'image'   => $knowledge_uri . '/ultrasound.png',
	),
	array(
		'title'   => 'Sữa Trưởng Thành: Giai đoạn hoàn thiện của sữa mẹ',
		'excerpt' => 'Khởi đầu từ khát vọng mang đến sự chăm sóc chuyên nghiệp và hoàn hảo nhất cho mẹ và bé, Vạn Phúc Care đã trải qua một hành trình đầy sáng tạo.',
		'image'   => $knowledge_uri . '/baby-care.png',
	),
	array(
		'title'   => 'Sữa Trưởng Thành: Giai đoạn hoàn thiện của sữa mẹ',
		'excerpt' => 'Khởi đầu từ khát vọng mang đến sự chăm sóc chuyên nghiệp và hoàn hảo nhất cho mẹ và bé, Vạn Phúc Care đã trải qua một hành trình đầy sáng tạo.',
		'image'   => $knowledge_uri . '/mother-baby.jpeg',
	),
	array(
		'title'   => 'Sữa Trưởng Thành: Giai đoạn hoàn thiện của sữa mẹ',
		'excerpt' => 'Khởi đầu từ khát vọng mang đến sự chăm sóc chuyên nghiệp và hoàn hảo nhất cho mẹ và bé, Vạn Phúc Care đã trải qua một hành trình đầy sáng tạo.',
		'image'   => $knowledge_uri . '/newborn.jpeg',
	),
	array(
		'title'   => 'Sữa Trưởng Thành: Giai đoạn hoàn thiện của sữa mẹ',
		'excerpt' => 'Khởi đầu từ khát vọng mang đến sự chăm sóc chuyên nghiệp và hoàn hảo nhất cho mẹ và bé, Vạn Phúc Care đã trải qua một hành trình đầy sáng tạo.',
		'image'   => $knowledge_uri . '/consultation.jpeg',
	),
	array(
		'title'   => 'Sữa Trưởng Thành: Giai đoạn hoàn thiện của sữa mẹ',
		'excerpt' => 'Khởi đầu từ khát vọng mang đến sự chăm sóc chuyên nghiệp và hoàn hảo nhất cho mẹ và bé, Vạn Phúc Care đã trải qua một hành trình đầy sáng tạo.',
		'image'   => $knowledge_uri . '/training.jpeg',
	),
);

$posts = get_posts(
	array(
		'post_type'           => 'post',
		'posts_per_page'      => 10,
		'ignore_sticky_posts' => true,
		'category_name'       => 'kien-thuc',
		'orderby'             => 'date',
		'order'               => 'DESC',
	)
);

$articles = array();
foreach ( $fallback_articles as $index => $fallback ) {
	$post = $posts[ $index ] ?? null;
	if ( ! $post ) {
		$fallback['url']      = home_url( '/kien-thuc/' );
		$fallback['author']   = 'Tên tác giả';
		$fallback['date']     = '12/09/2024';
		$fallback['category'] = $fallback['category'] ?? 'Cẩm nang cho mẹ';
		$articles[]           = $fallback;
		continue;
	}

	$categories          = get_the_category( $post->ID );
	$fallback['title']   = get_the_title( $post );
	$fallback['excerpt'] = wp_trim_words( get_the_excerpt( $post ), 32 );
	$fallback['url']     = get_permalink( $post );
	$fallback['author']  = get_the_author_meta( 'display_name', (int) $post->post_author ) ?: 'Tên tác giả';
	$fallback['date']    = get_the_date( 'd/m/Y', $post );
	$fallback['category'] = ! empty( $categories ) ? $categories[0]->name : 'Cẩm nang cho mẹ';
	if ( has_post_thumbnail( $post ) ) {
		$fallback['image'] = get_the_post_thumbnail_url( $post, 'large' );
	}
	$articles[] = $fallback;
}

$asset = static function ( $name ) use ( $knowledge_uri ) {
	return esc_url( $knowledge_uri . '/' . $name );
};

$categories = array(
	array( 'label' => 'Tất cả', 'icon' => 'category-1.svg', 'active' => true ),
	array( 'label' => 'Mang thai', 'icon' => 'category-2.svg' ),
	array( 'label' => 'Phương pháp EASY', 'icon' => 'category-3.svg' ),
	array( 'label' => 'Ăn dặm', 'icon' => 'category-4.svg' ),
	array( 'label' => 'Hội chứng biếng ăn', 'icon' => 'category-5.svg' ),
	array( 'label' => 'Cẩm nang cho mẹ', 'icon' => 'category-6.svg' ),
);
?>

<div class="vpc-knowledge" id="kien-thuc">
	<section class="vpc-knowledge-hero" aria-labelledby="knowledge-title">
		<div class="vpc-knowledge-hero__copy">
			<div class="vpc-knowledge-badge">
				<img src="<?php echo $asset( 'star-light.svg' ); ?>" alt="" width="24" height="24" aria-hidden="true">
				<span>KIẾN THỨC</span>
			</div>
			<h1 id="knowledge-title"><span>Kinh Nghiệm Thực Chiến</span><em>Để Sẵn Sàng Làm Mẹ</em></h1>
			<p>Trang tổng hợp bài viết, kiến thức chăm sóc mẹ và bé. Được biên tập dựa trên kinh nghiệm thực chiến, dưới góc nhìn điều dưỡng sản nhi. Trực quan, dễ đọc, dễ hiểu, có thể thực hành ngay.</p>
			<form class="vpc-knowledge-search" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
				<img src="<?php echo $asset( 'search.svg' ); ?>" alt="" width="24" height="24" aria-hidden="true">
				<label class="screen-reader-text" for="knowledge-search-input">Tìm bài viết</label>
				<input id="knowledge-search-input" type="search" name="s" placeholder="Tìm bài viết: ăn dặm, EASY, thai giáo...">
				<button type="submit">Tìm kiếm</button>
			</form>
		</div>

		<div class="vpc-knowledge-hero__visual" aria-hidden="true">
			<img class="vpc-knowledge-hero__blob" src="<?php echo $asset( 'blob.svg' ); ?>" alt="" width="340" height="340">
			<img class="vpc-knowledge-hero__accent" src="<?php echo $asset( 'blob-accent.svg' ); ?>" alt="" width="116" height="116">
			<img class="vpc-knowledge-hero__mascot" src="<?php echo esc_url( $knowledge_uri . '/hero-mascot.png' ); ?>" alt="" width="290" height="290">
			<span class="vpc-knowledge-chip vpc-knowledge-chip--left">Mang thai</span>
			<span class="vpc-knowledge-chip vpc-knowledge-chip--top">Phương pháp EASY</span>
			<span class="vpc-knowledge-chip vpc-knowledge-chip--bottom">Ăn dặm</span>
		</div>
	</section>

	<section class="vpc-knowledge-content" aria-label="Bài viết kiến thức">
		<div class="vpc-knowledge-section vpc-knowledge-featured">
			<h2>Bài viết nổi bật</h2>
			<article class="vpc-knowledge-featured-card">
				<a class="vpc-knowledge-featured-card__image" href="<?php echo esc_url( $articles[0]['url'] ); ?>">
					<img src="<?php echo esc_url( $articles[0]['image'] ); ?>" alt="" loading="eager">
				</a>
				<div class="vpc-knowledge-featured-card__body">
					<?php get_template_part( 'template-parts/knowledge/card-meta', null, array( 'article' => $articles[0] ) ); ?>
				</div>
			</article>

			<div class="vpc-knowledge-top-grid">
				<?php foreach ( array_slice( $articles, 1, 3 ) as $article ) : ?>
					<?php get_template_part( 'template-parts/knowledge/card', null, array( 'article' => $article ) ); ?>
				<?php endforeach; ?>
			</div>
		</div>

		<div class="vpc-knowledge-divider" aria-hidden="true"></div>

		<div class="vpc-knowledge-section vpc-knowledge-categories">
			<h2>Chuyên mục</h2>
			<div class="vpc-knowledge-category-list" role="list">
				<?php foreach ( $categories as $category ) : ?>
					<button class="vpc-knowledge-category<?php echo ! empty( $category['active'] ) ? ' is-active' : ''; ?>" type="button" role="listitem">
						<span class="vpc-knowledge-category__icon"><img src="<?php echo $asset( $category['icon'] ); ?>" alt="" width="24" height="24" aria-hidden="true"></span>
						<span><?php echo esc_html( $category['label'] ); ?></span>
					</button>
				<?php endforeach; ?>
			</div>

			<div class="vpc-knowledge-category-grid">
				<?php foreach ( array_slice( $articles, 4, 6 ) as $article ) : ?>
					<?php get_template_part( 'template-parts/knowledge/card-horizontal', null, array( 'article' => $article ) ); ?>
				<?php endforeach; ?>
			</div>

			<a class="vpc-knowledge-view-all" href="<?php echo esc_url( home_url( '/kien-thuc/' ) ); ?>">Xem tất cả</a>
		</div>
	</section>
</div>

<?php get_footer(); ?>
