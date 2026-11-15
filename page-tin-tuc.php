<?php
/**
 * Template Name: Trang chủ Tin tức (News Hub Overview)
 *
 * Mapped to /tin-tuc/ root route (Figma Screen 1 & 2).
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

// Query latest articles for "Sự kiện nổi bật"
$event_cat    = get_category_by_slug( 'su-kien-noi-bat' ) ?: get_category_by_slug( 'tin-tuc-su-kien' );
$event_cat_id = $event_cat instanceof WP_Term ? (int) $event_cat->term_id : 0;
$event_args   = array(
	'post_type'           => 'post',
	'post_status'         => 'publish',
	'posts_per_page'      => 4,
	'ignore_sticky_posts' => true,
);
if ( $event_cat_id > 0 ) {
	$event_args['cat'] = $event_cat_id;
} else {
	$event_args['category_name'] = 'su-kien-noi-bat';
}
$event_query = new WP_Query( $event_args );

// Query latest articles for "Tin mới"
$news_cat    = get_category_by_slug( 'tin-moi' ) ?: get_category_by_slug( 'me-va-be' );
$news_cat_id = $news_cat instanceof WP_Term ? (int) $news_cat->term_id : 0;
$news_args   = array(
	'post_type'           => 'post',
	'post_status'         => 'publish',
	'posts_per_page'      => 6,
	'ignore_sticky_posts' => true,
);
if ( $news_cat_id > 0 ) {
	$news_args['cat'] = $news_cat_id;
} else {
	$news_args['category_name'] = 'tin-moi';
}
$news_query = new WP_Query( $news_args );

$render_hub_card = static function ( $post, $badge = '', $variant = 'standard' ) use ( $asset ) {
	if ( ! $post instanceof WP_Post ) {
		return;
	}
	$url        = get_permalink( $post );
	$title      = get_the_title( $post );
	$excerpt    = wp_trim_words( get_the_excerpt( $post ), 22, '...' );
	$date       = get_the_date( 'd/m/Y', $post );
	$author     = get_the_author_meta( 'display_name', (int) $post->post_author ) ?: 'Content VPC';
	$thumb      = has_post_thumbnail( $post ) ? get_the_post_thumbnail_url( $post, 'medium_large' ) : $asset( 'news-nurse-baby.jpeg' );
	?>
	<article class="vpc-hub-card vpc-hub-card--<?php echo esc_attr( $variant ); ?>">
		<a href="<?php echo esc_url( $url ); ?>" class="vpc-hub-card__image">
			<img src="<?php echo esc_url( $thumb ); ?>" alt="<?php echo esc_attr( $title ); ?>" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300" loading="lazy">
		</a>
		<div class="vpc-hub-card__body">
			<?php if ( $badge ) : ?>
				<span class="vpc-hub-card__category">
					<?php echo esc_html( $badge ); ?>
				</span>
			<?php endif; ?>
			<h3>
				<a href="<?php echo esc_url( $url ); ?>">
					<?php echo esc_html( $title ); ?>
				</a>
			</h3>
			<p>
				<?php echo esc_html( $excerpt ); ?>
			</p>
			<div class="vpc-hub-card__footer">
				<span class="vpc-hub-card__author">
					<img src="<?php echo esc_url( $asset( 'author.jpeg' ) ); ?>" alt="" width="20" height="20" loading="lazy">
					<span><?php echo esc_html( $author ); ?></span>
				</span>
				<time datetime="<?php echo esc_attr( $date ); ?>"><?php echo esc_html( $date ); ?></time>
			</div>
		</div>
	</article>
	<?php
};
?>

<main id="primary" class="site-main vpc-news-hub-root">
	<section class="vpc-hub-hero" aria-labelledby="vpc-hub-title">
		<div class="vpc-hub-container vpc-hub-hero__inner">
			<div class="vpc-hub-hero__copy">
				<span class="vpc-hub-badge">
					<span class="vpc-hub-badge__icon" aria-hidden="true">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" focusable="false">
							<path d="M6.36875 16.6264C6.65647 16.3388 7.12278 16.3389 7.41055 16.6264C7.69831 16.9142 7.69835 17.3814 7.41055 17.6692L5.95332 19.1264C5.66552 19.4142 5.19836 19.4142 4.9106 19.1264C4.62304 18.8387 4.62322 18.3724 4.9106 18.0846L6.36875 16.6264ZM16.5887 16.6264C16.8764 16.3388 17.3427 16.3388 17.6305 16.6264L19.0886 18.0846C19.3761 18.3724 19.3763 18.8387 19.0886 19.1264C18.801 19.4141 18.3346 19.4139 18.0468 19.1264L16.5887 17.6692C16.3009 17.3814 16.3009 16.9142 16.5887 16.6264ZM4.9106 4.95021C5.19836 4.66245 5.66553 4.66246 5.95332 4.95021L7.41055 6.40836C7.69835 6.69612 7.69831 7.16236 7.41055 7.45016C7.12278 7.73782 6.6565 7.73787 6.36875 7.45016L4.9106 5.99293C4.62284 5.70517 4.62285 5.238 4.9106 4.95021ZM18.0468 4.95021C18.3346 4.66283 18.801 4.66264 19.0886 4.95021C19.3764 5.23801 19.3764 5.70517 19.0886 5.99293L17.6305 7.45016C17.3427 7.7379 16.8764 7.7379 16.5887 7.45016C16.3009 7.16238 16.301 6.69612 16.5887 6.40836L18.0468 4.95021Z" fill="#F48283"/>
							<path d="M20.7723 12.6551C20.3656 12.6604 20.0312 12.3353 20.0256 11.9286C20.02 11.5217 20.3458 11.1869 20.7528 11.1813L23.2525 11.1471C23.6595 11.1415 23.9944 11.4673 23.9999 11.8742C24.0054 12.2809 23.6801 12.615 23.2734 12.6208L20.7723 12.6551ZM11.8894 4.01346C11.4827 4.01885 11.1484 3.69366 11.1427 3.28701L11.1091 0.786923C11.1035 0.380017 11.4287 0.0458638 11.8356 0.0402885C12.2424 0.0348898 12.5768 0.35994 12.5824 0.766739L12.6166 3.26617C12.6222 3.67308 12.2964 4.00788 11.8894 4.01346ZM0.746805 12.9294C0.3399 12.935 0.00574938 12.6098 7.06232e-05 12.203C-0.00550406 11.7961 0.319653 11.4619 0.726624 11.4563L3.22639 11.4221C3.63336 11.4165 3.96755 11.7416 3.97313 12.1485C3.9786 12.5554 3.65348 12.8896 3.24657 12.8952L0.746805 12.9294ZM11.8552 23.9597C11.4485 23.9651 11.1142 23.6399 11.1085 23.2332L11.0749 20.7331C11.0693 20.3262 11.3944 19.9921 11.8014 19.9865C12.2082 19.9811 12.5426 20.3062 12.5481 20.713L12.5824 23.2124C12.588 23.6193 12.2622 23.9541 11.8552 23.9597Z" fill="#F48283"/>
							<path d="M11.2731 18.277C11.4714 18.7231 12.1037 18.7257 12.3056 18.2812L14.075 14.3852C14.1318 14.2601 14.2322 14.1599 14.3574 14.1034L18.2327 12.3541C18.6768 12.1536 18.6768 11.5229 18.2327 11.3225L14.3574 9.5732C14.2322 9.51667 14.1318 9.41651 14.075 9.2914L12.3056 5.39542C12.1037 4.95091 11.4714 4.95345 11.2731 5.39957L9.54503 9.28725C9.4883 9.41489 9.38637 9.51703 9.25886 9.57404L5.34973 11.3216C4.90311 11.5213 4.90311 12.1553 5.34973 12.355L9.25886 14.1025C9.38637 14.1596 9.4883 14.2617 9.54503 14.3893L11.2731 18.277Z" fill="#F48283"/>
						</svg>
					</span>
					<span>CẬP NHẬT</span>
				</span>
				<h1 id="vpc-hub-title"><span>Tin Tức Sự Kiện</span><span>Mới Nhất</span></h1>
				<p>Điểm tin xu hướng, góc nhìn chuyên môn cùng các chương trình, sự kiện đồng hành mới nhất dành cho cha mẹ.</p>
				<form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="vpc-hub-search vpc-news-search">
					<img class="vpc-hub-search__icon" src="<?php echo $asset( 'search.svg' ); ?>" alt="" width="24" height="24" aria-hidden="true">
					<input type="search" name="s" placeholder="Tìm tin tức, sự kiện..." data-mobile-placeholder="Tìm tin tức..." aria-label="Tìm kiếm tin tức">
					<button type="submit"><span class="vpc-hub-search__desktop-label">Tìm kiếm</span><span class="vpc-hub-search__mobile-label">Tìm</span></button>
				</form>
			</div>
			<div class="vpc-hub-hero__visual" aria-hidden="true">
				<div class="vpc-hub-hero__blob"></div>
				<img class="vpc-hub-hero__accent" src="<?php echo $asset( 'blob-accent.svg' ); ?>" alt="" width="116" height="116">
				<img src="<?php echo $asset( '21941b00-c6ab-4b41-b5e5-7f06439e556c.svg' ); ?>" alt="">
				<span class="vpc-hub-chip vpc-hub-chip--trend">Xu hướng</span>
				<span class="vpc-hub-chip vpc-hub-chip--event">Sự kiện</span>
				<span class="vpc-hub-chip vpc-hub-chip--news">Tin tức</span>
			</div>
		</div>
	</section>

	<div class="vpc-hub-body">
		<section class="vpc-hub-section vpc-hub-section--events" aria-labelledby="heading-su-kien-noi-bat">
			<div class="vpc-hub-section__header"><h2 id="heading-su-kien-noi-bat">Sự kiện nổi bật</h2></div>
			<?php if ( ! empty( $event_query->posts ) ) : ?>
				<?php $render_hub_card( $event_query->posts[0], 'Sự kiện nổi bật', 'lead' ); ?>
				<div class="vpc-hub-cards vpc-hub-cards--events">
					<?php foreach ( array_slice( $event_query->posts, 1, 3 ) as $post ) : ?>
						<?php $render_hub_card( $post, 'Sự kiện nổi bật', 'standard' ); ?>
					<?php endforeach; ?>
				</div>
				<a class="vpc-hub-more" href="<?php echo esc_url( home_url( '/tin-tuc/su-kien-noi-bat/' ) ); ?>">Xem thêm</a>
			<?php else : ?>
				<p class="vpc-hub-empty">Đang cập nhật các sự kiện nổi bật mới nhất...</p>
			<?php endif; ?>
		</section>

		<div class="vpc-hub-divider" aria-hidden="true"></div>

		<section class="vpc-hub-section vpc-hub-section--latest" aria-labelledby="heading-tin-moi">
			<div class="vpc-hub-section__header"><h2 id="heading-tin-moi">Tin mới</h2></div>
			<div class="vpc-hub-mobile-categories" aria-label="Danh mục tin mới">
				<a class="is-active" href="<?php echo esc_url( home_url( '/tin-tuc/' ) ); ?>"><span class="vpc-hub-mobile-categories__icon"><img src="<?php echo $asset( 'category-6.svg' ); ?>" alt="" width="20" height="20"></span><span>Tất cả</span></a>
				<a href="<?php echo esc_url( home_url( '/tin-tuc/tin-moi/' ) ); ?>"><span class="vpc-hub-mobile-categories__icon"><img src="<?php echo $asset( 'icon-me-va-be.svg' ); ?>" alt="" width="20" height="20"></span><span>Mẹ và bé</span></a>
				<a href="<?php echo esc_url( home_url( '/tin-tuc/su-kien-noi-bat/' ) ); ?>"><span class="vpc-hub-mobile-categories__icon"><img src="<?php echo $asset( 'icon-tin-tuc-su-kien.svg' ); ?>" alt="" width="20" height="20"></span><span>Tin tức &amp; sự kiện</span></a>
			</div>
			<?php if ( ! empty( $news_query->posts ) ) : ?>
				<?php $render_hub_card( $news_query->posts[0], 'Tin mới', 'lead' ); ?>
				<div class="vpc-hub-cards vpc-hub-cards--latest">
					<?php foreach ( array_slice( $news_query->posts, 1, 5 ) as $post ) : ?>
						<?php $render_hub_card( $post, 'Tin mới', 'standard' ); ?>
					<?php endforeach; ?>
				</div>
				<a class="vpc-hub-more" href="<?php echo esc_url( home_url( '/tin-tuc/tin-moi/' ) ); ?>">Xem thêm</a>
			<?php else : ?>
				<p class="vpc-hub-empty">Đang cập nhật các tin tức mới nhất...</p>
			<?php endif; ?>
		</section>
	</div>
</main>

<?php
get_footer();
