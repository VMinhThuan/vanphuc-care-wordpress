<?php
/**
 * Giới Thiệu - Strategic Partners Section (Đối Tác Chiến Lược).
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$about_uri  = trailingslashit( get_template_directory_uri() ) . 'assets/images/about';
$badge_icon = $about_uri . '/badge-star.svg';
?>
<section class="about-section about-partners" data-figma-node="3131:45023" data-figma-mobile-node="3131:45201">
	<span class="about-badge">
		<?php if ( $badge_icon ) : ?><img src="<?php echo esc_url( $badge_icon ); ?>" width="24" height="24" alt="" aria-hidden="true"><?php endif; ?>
		BẢO CHỨNG UY TÍN
	</span>
	<h2 class="about-heading about-heading--blue about-partners__title" data-node-id="3131:45204">Đối Tác Chiến lược</h2>
	<div class="about-copy about-partners__description" data-node-id="3131:45205">
		<p>Vạn Phúc Care tự hào về chất lượng nhân sự và chuyên môn chuẩn y khoa.</p>
		<p>Với đội ngũ nhân sự được tạo nguồn từ các trường đại học uy tín.</p>
	</div>
	<div class="about-partners__logos" data-node-id="3131:45206" aria-label="Đối tác chiến lược">
		<img data-node-id="3131:45208" src="<?php echo esc_url( $about_uri . '/partner-1.webp' ); ?>" width="80" height="98" alt="Đại học Y Hà Nội" loading="lazy">
		<img data-node-id="3131:45210" src="<?php echo esc_url( $about_uri . '/partner-2-figma.svg' ); ?>" width="100" height="100" alt="Cao đẳng Y khoa Hà Nội" loading="lazy">
		<img data-node-id="3131:45282" src="<?php echo esc_url( $about_uri . '/partner-3.webp' ); ?>" width="100" height="100" alt="Cao đẳng Y Hà Nội" loading="lazy">
		<img data-node-id="3131:45284" src="<?php echo esc_url( $about_uri . '/partner-6.webp' ); ?>" width="100" height="100" alt="Hanoi Medical College" loading="lazy">
		<img data-node-id="3131:45286" src="<?php echo esc_url( $about_uri . '/partner-2.webp' ); ?>" width="100" height="100" alt="Đại học Đông Á" loading="lazy">
	</div>
</section>

