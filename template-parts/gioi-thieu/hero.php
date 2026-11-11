<?php
/**
 * Giới Thiệu - Hero Banner Section.
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$about_uri   = trailingslashit( get_template_directory_uri() ) . 'assets/images/about';
$badge_icon  = $about_uri . '/badge-star.svg';
$hero_image  = $about_uri . '/hero-mission.webp';
?>
<section id="gioi-thieu" class="about-section about-hero hero-banner-section" data-figma-node="3131:44917" data-figma-mobile-node="3131:45111">
	<div class="about-hero__inner" data-node-id="3131:45112">
		<div class="about-hero__copy">
			<span class="about-badge">
				<?php if ( $badge_icon ) : ?><img src="<?php echo esc_url( $badge_icon ); ?>" width="24" height="24" alt="" aria-hidden="true"><?php endif; ?>
				VẠN PHÚC CARE
			</span>
			<h1 class="about-hero__title" data-node-id="3131:45114">
				<span class="about-heading--blue" data-node-id="3131:45115">Đồng Hành Cùng Mẹ</span>
				<span class="about-heading--pink" data-node-id="3131:45116">Chăm Sóc Vẹn Toàn <span class="about-hero__title-nowrap">Cho Bé</span></span>
			</h1>
			<div class="about-hero__description about-copy" data-node-id="3131:45117">
				<p>Từ giây phút chào đời, sự an toàn của Bé và sức khoẻ của Mẹ luôn là ưu tiên hàng đầu.</p>
				<p>Với nền tảng vững vàng trong chuyên môn điều dưỡng sản nhi, Trung tâm ở cữ Vạn Phúc Care tự hào là đơn vị cung cấp dịch vụ chăm sóc Mẹ và Bé toàn diện, giúp Mẹ hồi phục nhanh chóng và Bé yêu phát triển khỏe mạnh trong môi trường an lành, thân thiện, chuyên nghiệp.</p>
			</div>
			<div class="about-stats" data-node-id="3131:45119" aria-label="Thông tin Vạn Phúc Care">
				<div class="about-stat" data-node-id="3131:45121"><div class="about-stat__content"><span class="about-stat__value">5+ Năm</span><span class="about-stat__label">Hoạt động trong ngành</span></div></div>
				<div class="about-stat" data-node-id="3131:45122"><div class="about-stat__content"><span class="about-stat__value">8+ Dịch vụ</span><span class="about-stat__label">Chăm sóc mẹ và bé</span></div></div>
				<div class="about-stat" data-node-id="3131:45124"><div class="about-stat__content"><span class="about-stat__value">50+ Nhân sự</span><span class="about-stat__label">Điều dưỡng</span></div></div>
				<div class="about-stat" data-node-id="3131:45125"><div class="about-stat__content"><span class="about-stat__value">5000+ Khách hàng</span><span class="about-stat__label">Đã sử dụng dịch vụ</span></div></div>
			</div>
		</div>
		<div class="about-hero__image" data-node-id="3131:45118">
			<?php if ( $hero_image ) : ?><img src="<?php echo esc_url( $hero_image ); ?>" width="507" height="387" alt="Điều dưỡng chăm sóc mẹ và bé" fetchpriority="high"><?php endif; ?>
		</div>
	</div>
</section>

