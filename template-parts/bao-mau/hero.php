<?php
/**
 * Bao Mau - Hero Banner Section.
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$asset_uri     = trailingslashit( get_template_directory_uri() ) . 'assets/images/bao-mau';
$hero_uri      = trailingslashit( get_template_directory_uri() ) . 'assets/images/bao-mau/hero-figma-3126-39939.webp';
$button_attrs  = 'data-open-modal="vpc-consultation-modal" data-service="bao-mau-tai-nha"';

$raw_video_url = apply_filters( 'vpc_bao_mau_hero_video_url', get_theme_mod( 'vpc_bao_mau_hero_video_url', '' ) );
$video_embed   = function_exists( 'vpc_parse_video_embed' ) ? vpc_parse_video_embed( $raw_video_url ) : null;
$custom_poster = get_theme_mod( 'vpc_bao_mau_hero_video_poster', '' );
$poster_url    = ! empty( $custom_poster ) ? $custom_poster : $hero_uri;
?>
<section class="vpc-bao-mau__hero" aria-labelledby="bao-mau-title">
	<div class="vpc-bao-mau__container vpc-bao-mau__hero-grid">
		<div class="vpc-bao-mau__hero-copy">
			<div class="vpc-bao-mau__badge"><img src="<?php echo esc_url( $asset_uri . '/star.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true">HÀNH TRÌNH CÙNG MẸ, TRẢI ĐẦY YÊU THƯƠNG</div>
			<h1 id="bao-mau-title"><span>Dịch Vụ Bảo Mẫu</span><em>Chăm Sóc Bé Tại Nhà</em></h1>
			<p>Bé được chăm sóc tận tâm, mẹ có thêm thời gian nghỉ ngơi. Vạn Phúc Care đồng hành cùng gia đình bằng chuyên môn,sự thấu hiểu và yêu thương.</p>
			<div class="vpc-bao-mau__actions">
				<button type="button" class="vpc-bao-mau__button vpc-bao-mau__button--primary" <?php echo $button_attrs; ?>>Đăng ký tư vấn</button>
				<a class="vpc-bao-mau__button vpc-bao-mau__button--secondary" href="#bao-mau-packages">Xem gói dịch vụ</a>
			</div>
		</div>
		<?php if ( ! empty( $video_embed['embed_url'] ) ) : ?>
			<?php if ( 'video' === $video_embed['type'] ) : ?>
				<video class="vpc-bao-mau__hero-image" width="650" height="366" controls playsinline preload="metadata" poster="<?php echo esc_url( $poster_url ); ?>" aria-label="<?php esc_attr_e( 'Video giới thiệu dịch vụ bảo mẫu chăm sóc bé tại nhà', 'vanphuccare' ); ?>" src="<?php echo esc_url( $video_embed['embed_url'] ); ?>">
					<img src="<?php echo esc_url( $poster_url ); ?>" width="650" height="366" alt="Điều dưỡng chăm sóc em bé tại nhà">
				</video>
			<?php else : ?>
				<iframe class="vpc-bao-mau__hero-image" width="650" height="366" src="<?php echo esc_url( $video_embed['embed_url'] ); ?>" title="<?php esc_attr_e( 'Video giới thiệu dịch vụ bảo mẫu chăm sóc bé tại nhà', 'vanphuccare' ); ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; fullscreen" allowfullscreen referrerpolicy="strict-origin-when-cross-origin"></iframe>
			<?php endif; ?>
		<?php else : ?>
			<img class="vpc-bao-mau__hero-image" src="<?php echo esc_url( $poster_url ); ?>" width="650" height="366" alt="Điều dưỡng chăm sóc em bé tại nhà" fetchpriority="high">
		<?php endif; ?>
	</div>
</section>

