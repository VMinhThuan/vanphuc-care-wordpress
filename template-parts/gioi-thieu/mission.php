<?php
/**
 * Giới Thiệu - Mission & Vision Section (Tầm nhìn & Sứ mệnh).
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$about_uri     = trailingslashit( get_template_directory_uri() ) . 'assets/images/about';
$badge_icon    = $about_uri . '/badge-star.svg';
$feature_icon  = $about_uri . '/feature-star.svg';
$mission_image = $about_uri . '/mission.webp';
?>
<section class="about-section about-mission" data-figma-node="3131:44963">
	<div class="about-mission__image">
		<?php if ( $mission_image ) : ?><img src="<?php echo esc_url( $mission_image ); ?>" width="534" height="471" alt="Chăm sóc mẹ và bé tại Vạn Phúc Care" loading="lazy"><?php endif; ?>
	</div>
	<div class="about-mission__copy">
		<span class="about-badge">
			<?php if ( $badge_icon ) : ?><img src="<?php echo esc_url( $badge_icon ); ?>" width="24" height="24" alt="" aria-hidden="true"><?php endif; ?>
			VỀ CHÚNG TÔI
		</span>
		<h2 class="about-heading about-heading--blue">Tầm nhìn &amp; Sứ mệnh</h2>
		<p class="about-copy about-mission__intro">Chúng tôi tin rằng mỗi hành trình làm mẹ là một nghĩa vụ thiêng liêng và xứng đáng được nâng niu bằng sự thấu hiểu, tận tâm.</p>
		<div class="about-feature-grid">
			<article class="about-feature-card">
				<div class="about-feature-card__icon"><img src="<?php echo esc_url( $feature_icon ); ?>" width="24" height="24" alt="" aria-hidden="true"></div>
				<h3>Tầm nhìn</h3>
				<p>Trở thành hệ thống chăm sóc sức khỏe Mẹ và Bé hàng đầu Việt Nam, mang đến giải pháp toàn diện cho sự khởi đầu hoàn hảo của thế hệ tương lai</p>
			</article>
			<article class="about-feature-card">
				<div class="about-feature-card__icon"><img src="<?php echo esc_url( $feature_icon ); ?>" width="24" height="24" alt="" aria-hidden="true"></div>
				<h3>Sứ mệnh</h3>
				<p>Nâng cao chất lượng cuộc sống cho mẹ và bé thông qua những giải pháp chăm sóc sức khỏe khoa học, an toàn, tận tâm và bền vững</p>
			</article>
		</div>
	</div>
</section>

