<?php
/**
 * Giới Thiệu - TikTok Section (Mẹ Thủy Làm Y).
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$about_uri = trailingslashit( get_template_directory_uri() ) . 'assets/images/about';
?>
<section class="about-section about-tiktok" data-figma-node="3131:45002" data-figma-mobile-node="3131:45183">
	<div class="about-tiktok__content" data-node-id="3131:45184">
		<h2 class="about-heading about-tiktok__title" data-node-id="3131:45185"><span class="about-heading--blue" data-node-id="3131:45186">Tiktok</span> <span class="about-heading--pink" data-node-id="3131:45187">Mẹ Thủy Làm Y</span></h2>
		<div class="about-copy about-tiktok__description" data-node-id="3131:45188">
			<p>Bên cạnh công việc điều dưỡng, chị Thanh Thủy cũng tích cực chia sẻ kiến thức đến cộng&nbsp;đồng, hướng đến sứ mệnh nâng cao chất lượng cuộc sống dành cho Mẹ &amp; Bé.</p>
		</div>
		<div class="about-tiktok__image-frame" data-node-id="3131:45189">
			<img class="about-tiktok__image" src="<?php echo esc_url( $about_uri . '/tiktok.webp' ); ?>" width="963" height="522" alt="Kênh TikTok Mẹ Thủy Làm Y" loading="lazy" decoding="async">
		</div>
	</div>
	<a class="about-button about-tiktok__button" data-node-id="3131:45190" href="https://www.tiktok.com/@methuylamy" target="_blank" rel="noopener noreferrer"><img src="<?php echo esc_url( $about_uri . '/tiktok-plus.svg' ); ?>" width="15" height="25" alt="" aria-hidden="true"><span>Theo dõi</span></a>
</section>

