<?php
/**
 * Prenatal - Hero Banner Section.
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$theme_uri       = get_template_directory_uri();
$image           = $theme_uri . '/assets/images/lop-hoc-tien-san/';
$prenatal_image  = static function ( $filename, $size = 'full' ) {
	return vpc_image_url( 'lop-hoc-tien-san/' . ltrim( $filename, '/' ), $size );
};
?>
<section class="vpc-section prenatal-hero" aria-labelledby="prenatal-title">
	<div class="prenatal-container prenatal-hero__layout">
		<div class="prenatal-hero__copy">
			<div class="prenatal-badge">
				<img class="prenatal-badge__icon" src="<?php echo esc_url( $image . 'icons/star-light.svg' ); ?>" alt="" aria-hidden="true" width="24" height="24" />
				<span>LỚP HỌC TIỀN SẢN</span>
			</div>
			<h1 id="prenatal-title" class="prenatal-title">
				<span>Tự Tin Đón Con Yêu</span>
				<em>Đọc Vị Nhu Cầu <span class="whitespace-nowrap">Của&nbsp;Trẻ</span></em>
			</h1>
			<p>Chuẩn bị vững vàng cho hành trình làm cha mẹ. Với sự đồng hành cùng điều dưỡng trưởng Thanh Thuỷ, cùng cha mẹ biến kiến thức y khoa thành kỹ năng chăm con thực tế, thấu hiểu nhu cầu của con trẻ bằng tình yêu thương.</p>
			<div class="prenatal-actions">
				<a class="prenatal-button prenatal-button--primary" href="#prenatal-registration">Đăng ký giữ chỗ</a>
				<a class="prenatal-button prenatal-button--secondary" href="#prenatal-program">Khám phá chương trình</a>
			</div>
		</div>
		<div class="prenatal-hero__media">
			<?php $prenatal_hero_mobile_url = $prenatal_image( 'hero-class-actual.webp', 'full' ); ?>
			<?php $prenatal_hero_desktop_url = $prenatal_image( 'hero-mother-baby.webp', 'full' ); ?>
			<?php $prenatal_hero_image_url = $prenatal_hero_desktop_url ? $prenatal_hero_desktop_url : $prenatal_hero_mobile_url; ?>
			<?php if ( $prenatal_hero_image_url ) : ?>
				<picture>
					<?php if ( $prenatal_hero_mobile_url && $prenatal_hero_mobile_url !== $prenatal_hero_image_url ) : ?>
						<source media="(max-width: 639px)" srcset="<?php echo esc_url( $prenatal_hero_mobile_url ); ?>" />
					<?php endif; ?>
					<img class="prenatal-hero__image" src="<?php echo esc_url( $prenatal_hero_image_url ); ?>" alt="Lớp học tiền sản thực tế tại Vạn Phúc Care" width="454" height="444" />
				</picture>
			<?php endif; ?>
		</div>
		<div class="prenatal-quick-info" aria-label="Thông tin lớp học nhanh">
			<div class="prenatal-quick-info__item">
				<div class="prenatal-quick-info__header">
					<img src="<?php echo esc_url( $image . 'icons/duration.svg' ); ?>" alt="" aria-hidden="true" width="24" height="24" />
					<h3>Thời lượng</h3>
				</div>
				<p>01 buổi · 03 giờ (Offline)</p>
			</div>
			<div class="prenatal-quick-info__item">
				<div class="prenatal-quick-info__header">
					<img src="<?php echo esc_url( $image . 'icons/participants.svg' ); ?>" alt="" aria-hidden="true" width="22" height="16.5" />
					<h3>Số lượng tham gia</h3>
				</div>
				<p>Tối đa 05 cặp bố mẹ/ dưới 10 người</p>
			</div>
			<div class="prenatal-quick-info__item">
				<div class="prenatal-quick-info__header">
					<img src="<?php echo esc_url( $image . 'icons/schedule.svg' ); ?>" alt="" aria-hidden="true" width="22" height="21.9988" />
					<h3>Thời gian</h3>
				</div>
				<p>9h00 – 12h00 (Sáng thứ 7 hàng tuần)</p>
			</div>
			<div class="prenatal-quick-info__item">
				<div class="prenatal-quick-info__header">
					<img src="<?php echo esc_url( $image . 'icons/map.svg' ); ?>" alt="" aria-hidden="true" width="22" height="30.4051" />
					<h3>Địa điểm</h3>
				</div>
				<p>Trung tâm ở cữ -  Vạn Phúc Care</p>
			</div>
		</div>
	</div>
</section>

