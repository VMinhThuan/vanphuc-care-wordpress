<?php
/**
 * Giới Thiệu - Founder Section (Giới Thiệu Người Sáng Lập).
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$about_uri  = trailingslashit( get_template_directory_uri() ) . 'assets/images/about';
$badge_icon = $about_uri . '/badge-star.svg';
?>
<section class="about-section about-founder" data-figma-node="3131:44972" data-figma-mobile-node="3131:45169">
	<div class="about-founder__inner">
		<div class="about-founder__visual" data-node-id="3131:44973" data-mobile-node-id="3131:45170">
			<div class="about-founder__cutout-frame" data-node-id="3131:44976" data-mobile-node-id="3131:45174">
				<img class="about-founder__cutout" src="<?php echo esc_url( $about_uri . '/founder-cutout.webp' ); ?>" width="420" height="599" alt="Chị Thanh Thủy và em bé" loading="lazy">
			</div>
			<div class="about-founder__mascot-frame" data-node-id="3131:44986" data-mobile-node-id="3131:45175">
				<img class="about-founder__mascot" src="<?php echo esc_url( $about_uri . '/mascot-large.webp' ); ?>" width="230" height="296" alt="Vạn Phúc Care mascot" loading="eager" fetchpriority="high" decoding="async">
			</div>
			<div class="about-founder__decoration" data-node-id="3131:44987" aria-hidden="true">
				<img class="about-founder__decoration-arrow" src="<?php echo esc_url( $about_uri . '/van-phuc-care-arrow-sparkle.svg' ); ?>" width="172" height="114" alt="">
			</div>
		</div>
		<div class="about-founder__copy" data-node-id="3131:44977" data-mobile-node-id="3131:45176">
			<div class="about-founder__text">
				<span class="about-badge">
					<?php if ( $badge_icon ) : ?><img src="<?php echo esc_url( $badge_icon ); ?>" width="24" height="24" alt="" aria-hidden="true"><?php endif; ?>
					ĐIỀU DƯỠNG TRƯỞNG
				</span>
				<h2 class="about-heading" data-node-id="3131:44981" data-mobile-node-id="3131:45178"><span class="about-heading--blue" data-node-id="3131:44982" data-mobile-node-id="3131:45179">Giới Thiệu</span><span class="about-heading--pink" data-node-id="3131:44983" data-mobile-node-id="3131:45180">Người Sáng Lập</span></h2>
				<div class="about-copy" data-node-id="3131:44984" data-mobile-node-id="3131:45181">
					<p>Sáng lập viên là <a class="about-founder__link" href="#doi-ngu">chị Thanh Thủy</a> – người đã nhiều năm kinh nghiệm hoạt động trong lĩnh vực chăm sóc sức khỏe mẹ &amp; bé. Và cũng là một người mẹ với 3 nhóc tì xinh xắn.</p>
					<p>Ý tưởng thành lập Vạn Phúc Care được thai nghén từ khi chị Thanh Thủy còn ngồi trên ghế giảng đường. Lắng nghe nỗi niềm sẻ chia của các mẹ ở thời kỳ hậu sản – sau sinh nở, những khó khăn khi chăm sóc con nhỏ cùng với băn khoăn lo lắng về sức khỏe bản thân…</p>
				</div>
			</div>
			<a class="about-button" data-node-id="3131:44985" data-mobile-node-id="3131:45182" href="https://methuylamy.vn/" target="_blank" rel="noopener noreferrer">Giới thiệu người sáng lập</a>
		</div>
	</div>
</section>

