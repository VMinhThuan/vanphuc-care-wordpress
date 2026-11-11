<?php
/**
 * O Cu - Hero Banner Section.
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$asset_uri          = trailingslashit( get_template_directory_uri() ) . 'assets/images/o-cu';
$ocu_hero_video_url = apply_filters( 'vpc_o_cu_hero_video_url', get_theme_mod( 'vpc_o_cu_hero_video_url', '' ) );
$button_attrs       = 'data-open-modal="vpc-consultation-modal" data-service="trung-tam-o-cu"';
?>
<section class="ocu-hero" data-figma-node="3123:33010">
	<div class="ocu-hero__content">
		<span class="ocu-badge"><img src="<?php echo esc_url( $asset_uri . '/star.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true">Trung tâm ở cữ</span>
		<h1 class="ocu-hero__title"><span class="ocu-heading--blue">Gói Ở Cữ Sau Sinh</span><span class="ocu-heading--pink">Mẹ Khỏe - Con Ngoan</span></h1>
		<p class="ocu-hero__description">Trung tâm ở cữ Vạn Phúc Care đem đến dịch vụ chăm sóc sau sinh toàn diện, giúp Mẹ và Bé yêu được nghỉ dưỡng trọn vẹn và nhanh chóng phục hồi sức khỏe.</p>
		<div class="ocu-highlights" aria-label="Điểm nổi bật của trung tâm">
			<div class="ocu-highlight"><div class="ocu-highlight__heading"><img src="<?php echo esc_url( $asset_uri . '/amenities.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true"><h2>Không gian</h2></div><p>Tiện nghi nghỉ dưỡng cao cấp</p></div>
			<div class="ocu-highlight"><div class="ocu-highlight__heading"><img src="<?php echo esc_url( $asset_uri . '/dedicated.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true"><h2>Trải nghiệm</h2></div><p>Thoải mái như ở nhà</p></div>
			<div class="ocu-highlight"><div class="ocu-highlight__heading"><img src="<?php echo esc_url( $asset_uri . '/quality.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true"><h2>Hài lòng</h2></div><p>4.9/5 <span aria-label="5 sao">★★★★★</span></p></div>
		</div>
		<?php if ( $ocu_hero_video_url ) : ?>
			<video class="ocu-hero__image" width="800" height="450" controls playsinline preload="metadata" poster="<?php echo esc_url( $asset_uri . '/figma/hero.png' ); ?>" aria-label="Video giới thiệu trung tâm ở cữ" src="<?php echo esc_url( $ocu_hero_video_url ); ?>">
				<img src="<?php echo esc_url( $asset_uri . '/figma/hero.png' ); ?>" width="800" height="450" alt="Điều dưỡng Vạn Phúc Care chăm sóc em bé">
			</video>
		<?php else : ?>
			<img class="ocu-hero__image" src="<?php echo esc_url( $asset_uri . '/figma/hero.png' ); ?>" width="800" height="450" alt="Điều dưỡng Vạn Phúc Care chăm sóc em bé" fetchpriority="high">
		<?php endif; ?>
		<div class="ocu-actions"><button type="button" class="ocu-button ocu-button--primary" <?php echo $button_attrs; ?>>Đăng ký tư vấn</button><a class="ocu-button ocu-button--secondary" href="#khong-gian">Xem không gian</a></div>
	</div>
</section>

