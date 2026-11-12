<?php
/**
 * Knowledge sub-category sidebar widget area.
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$knowledge_uri = get_template_directory_uri() . '/assets/images/knowledge';
$asset = static function ( $name ) use ( $knowledge_uri ) {
	return esc_url( $knowledge_uri . '/' . $name );
};

// 1. Featured sidebar articles (up to 3 posts, scoped strictly to knowledge categories).
$kt_cat = get_category_by_slug( 'kien-thuc' );
if ( $kt_cat instanceof WP_Term ) {
	$sidebar_args = array(
		'post_type'           => 'post',
		'post_status'         => 'publish',
		'cat'                 => (int) $kt_cat->term_id,
		'posts_per_page'      => 3,
		'ignore_sticky_posts' => true,
		'orderby'             => 'comment_count date',
		'order'               => 'DESC',
	);
	$sidebar_featured = new WP_Query( $sidebar_args );
} else {
	// Defensive guard: prevent leaking recruitment/news posts if category is missing.
	$sidebar_featured = new WP_Query();
}

// 2. Popular tags.
$popular_tags = get_tags( array(
	'number'  => 8,
	'orderby' => 'count',
	'order'   => 'DESC',
) );
if ( empty( $popular_tags ) ) {
	$fallback_tag_names = array( 'Thai giáo', 'Nuôi con EASY', 'Kiến thức thường gặp', 'Thai kỳ', 'Dinh dưỡng' );
}
?>

<aside class="vpc-knowledge-sidebar" aria-label="<?php esc_attr_e( 'Thanh bên kiến thức', 'vanphuccare' ); ?>">
	<!-- 1. Search Widget -->
	<div class="vpc-knowledge-widget vpc-knowledge-widget--search">
		<form class="vpc-knowledge-sidebar-search" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
			<img src="<?php echo $asset( 'search.svg' ); ?>" alt="" width="20" height="20" aria-hidden="true">
			<label class="screen-reader-text" for="sidebar-search-input"><?php esc_html_e( 'Tìm bài viết', 'vanphuccare' ); ?></label>
			<input id="sidebar-search-input" type="search" name="s" placeholder="<?php esc_attr_e( 'Tìm bài viết...', 'vanphuccare' ); ?>">
			<?php if ( $kt_cat instanceof WP_Term ) : ?>
				<input type="hidden" name="cat" value="<?php echo esc_attr( $kt_cat->term_id ); ?>">
			<?php endif; ?>
			<button type="submit"><?php esc_html_e( 'Tìm', 'vanphuccare' ); ?></button>
		</form>
	</div>

	<!-- 2. Featured Posts Widget -->
	<div class="vpc-knowledge-widget vpc-knowledge-widget--featured">
		<h3 class="vpc-knowledge-widget__title"><span class="vpc-knowledge-widget__title-desktop"><?php esc_html_e( 'Bài viết nổi bật', 'vanphuccare' ); ?></span><span class="vpc-knowledge-widget__title-mobile"><?php esc_html_e( 'Bài nổi bật', 'vanphuccare' ); ?></span></h3>
		<div class="vpc-knowledge-sidebar-featured-list">
			<?php if ( $sidebar_featured->have_posts() ) : ?>
				<?php while ( $sidebar_featured->have_posts() ) : $sidebar_featured->the_post(); ?>
					<?php
					$thumb_url = has_post_thumbnail()
						? get_the_post_thumbnail_url( get_the_ID(), 'thumbnail' )
						: $asset( 'ultrasound.png' );
					?>
					<a class="vpc-knowledge-sidebar-post" href="<?php the_permalink(); ?>">
						<div class="vpc-knowledge-sidebar-post__thumb">
							<img src="<?php echo esc_url( $thumb_url ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" width="72" height="72" loading="lazy">
						</div>
						<div class="vpc-knowledge-sidebar-post__info">
							<time datetime="<?php echo esc_attr( get_the_date( 'Y-m-d' ) ); ?>"><?php echo esc_html( get_the_date( 'd/m/Y' ) ); ?></time>
							<h4><?php echo esc_html( wp_trim_words( get_the_title(), 12, '...' ) ); ?></h4>
						</div>
					</a>
				<?php endwhile; wp_reset_postdata(); ?>
			<?php else : ?>
				<p class="text-sm text-neutral-400"><?php esc_html_e( 'Đang cập nhật bài viết...', 'vanphuccare' ); ?></p>
			<?php endif; ?>
		</div>
	</div>

	<!-- 3. Tags Widget -->
	<div class="vpc-knowledge-widget vpc-knowledge-widget--tags">
		<h3 class="vpc-knowledge-widget__title"><?php esc_html_e( 'Tags', 'vanphuccare' ); ?></h3>
		<div class="vpc-knowledge-tag-cloud">
			<?php if ( ! empty( $popular_tags ) && ! is_wp_error( $popular_tags ) ) : ?>
				<?php foreach ( $popular_tags as $tag ) : ?>
					<a class="vpc-knowledge-tag" href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>"><?php echo esc_html( $tag->name ); ?></a>
				<?php endforeach; ?>
			<?php elseif ( ! empty( $fallback_tag_names ) ) : ?>
				<?php foreach ( $fallback_tag_names as $tag_name ) : ?>
					<span class="vpc-knowledge-tag"><?php echo esc_html( $tag_name ); ?></span>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</div>

	<!-- 4. Promo Banner Widget -->
	<div class="vpc-knowledge-widget vpc-knowledge-widget--banner">
		<a class="vpc-knowledge-banner-card" href="https://edu.vanphuccare.vn" target="_blank" rel="noopener noreferrer">
			<img src="<?php echo $asset( 'mang-thai-banner.png' ); ?>" alt="<?php esc_attr_e( 'Bé ăn ngon - ngủ xuyên đêm', 'vanphuccare' ); ?>" width="365" height="411" loading="lazy">
		</a>
	</div>

	<!-- 5. Hotline Widget -->
	<div class="vpc-knowledge-widget vpc-knowledge-widget--hotline">
		<div class="vpc-knowledge-hotline-card">
			<div class="vpc-knowledge-hotline-image">
				<img src="<?php echo $asset( 'mang-thai-hotline.png' ); ?>" alt="<?php esc_attr_e( 'Tư vấn Vạn Phúc Care', 'vanphuccare' ); ?>" width="341" height="200" loading="lazy">
			</div>
			<div class="vpc-knowledge-hotline-body">
				<div class="vpc-knowledge-hotline-heading">
					<img src="<?php echo $asset( 'mang-thai-hotline-icon.svg' ); ?>" alt="" width="24" height="24" aria-hidden="true">
					<div><span class="vpc-knowledge-hotline-label"><?php esc_html_e( 'Hotline', 'vanphuccare' ); ?></span><a class="vpc-knowledge-hotline-number" href="tel:0376246673">037 624 6673</a></div>
				</div>
				<p><?php esc_html_e( 'Liên hệ ngay để được tư vấn trực tiếp cùng các cô Điều dưỡng của Vạn Phúc Care ba mẹ nhé!', 'vanphuccare' ); ?></p>
				<a class="vpc-knowledge-hotline-btn" href="<?php echo esc_url( home_url( '/lien-he/' ) ); ?>"><?php esc_html_e( 'Đăng Ký Tư Vấn', 'vanphuccare' ); ?></a>
			</div>
		</div>
	</div>
</aside>
