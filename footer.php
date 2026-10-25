<?php
/**
 * Site footer template for Vạn Phúc Care.
 * Matches exact Figma Footer specification:
 * - Column 1: Logo + Slogan + Company Name + Address + 2 Hotlines + 2 Emails
 * - Column 2: DỊCH VỤ CỦA CHÚNG TÔI (9 items)
 * - Column 3: KIẾN THỨC (5 items)
 * - Column 4: TIN TỨC & SỰ KIỆN (2 items)
 * - Middle Row: 3 Social Icons (Facebook, Instagram, TikTok) + 2 Certifications (DMCA, Bộ Công Thương)
 * - Bottom Row: Điều khoản sử dụng | Chính sách bảo mật | Tuyển dụng | Liên hệ
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$theme_uri     = get_template_directory_uri();
$instagram_url = get_theme_mod( 'vpc_instagram_url', '' );
?>
</main><!-- #primary -->

<footer class="site-footer relative w-full overflow-hidden pt-8 pb-28 xl:py-6 px-5 xl:px-20 text-text-body-default" style="background: linear-gradient(180.91deg, var(--color-neutral-100) 22.32%, var(--color-primary-200) 146.38%);">
	<!-- Decorative faint watermark emblem on bottom-right (Exact Figma: 471x360px, fill white, opacity 0.3) -->
	<div class="pointer-events-none absolute right-0 bottom-0 z-0 select-none overflow-hidden" aria-hidden="true">
		<img src="<?php echo esc_url( $theme_uri . '/assets/images/footer-watermark.svg' ); ?>" 
		     alt="" 
		     width="471" 
		     height="360" 
		     class="w-[280px] sm:w-[380px] xl:w-[471px] h-auto block select-none">
	</div>

	<div class="relative z-10 w-full max-w-[1280px] mx-auto">
		
		<!-- Head footer: py-6, rộng 1280 -->
		<div class="py-6 flex flex-col md:flex-row md:flex-wrap xl:flex-nowrap justify-between items-start gap-8 xl:gap-6">
			
			<!-- Column 1: Thông tin cty (Logo -> tagline gap 12px, còn lại gap 20px) -->
			<div class="w-full md:w-[381px] shrink-0 flex flex-col">
				<div class="footer-logo mb-3">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="inline-flex items-center shrink-0">
						<img src="<?php echo esc_url( $theme_uri . '/assets/images/logo.svg' ); ?>" 
						     alt="Vạn Phúc Care Logo" 
						     width="155" 
						     height="48" 
						     class="h-[48px] w-[155px] object-contain block">
					</a>
				</div>
				
				<div class="flex flex-col space-y-5">
					<p class="text-base font-medium text-text-body-default">
						Hành Trình Cùng Mẹ, Trải Đầy Yêu Thương
					</p>
					
					<h3 class="font-body text-2xl font-bold text-text-body-default uppercase">
						CÔNG TY TNHH VẠN PHÚC CARE
					</h3>
					
					<ul class="space-y-5 text-base font-medium text-text-body-default leading-relaxed">
						<li>
							<span>Trung tâm ở cữ: 35B/399 Âu Cơ, phường Tây Hồ, TP. Hà Nội</span>
						</li>
						<li>
							<span>Hotline tư vấn: <a href="tel:02463296698" class="hover:text-text-body-muted transition-colors">(024) 6329 6698</a></span>
						</li>
						<li>
							<span>Hotline hỗ trợ: <a href="tel:0376246673" class="hover:text-text-body-muted transition-colors">037 624 6673</a></span>
						</li>
						<li>
							<span>Email CSKH: <a href="mailto:cskh@vanphuccare.vn" class="hover:text-text-body-muted transition-colors">cskh@vanphuccare.vn</a></span>
						</li>
						<li>
							<span>Email liên hệ: <a href="mailto:info@vanphuccare.vn" class="hover:text-text-body-muted transition-colors">info@vanphuccare.vn</a></span>
						</li>
					</ul>
				</div>
			</div>

			<!-- Column 2: DỊCH VỤ CỦA CHÚNG TÔI -->
			<div class="w-full sm:w-auto flex flex-col space-y-3">
				<h3 class="font-body text-base font-bold text-text-body-default uppercase pb-1">
					DỊCH VỤ CỦA CHÚNG TÔI
				</h3>
				<ul class="space-y-2 text-base font-medium text-text-body-default">
					<li class="h-6 flex items-center"><a href="<?php echo esc_url( home_url( '/#trung-tam-o-cu' ) ); ?>" class="hover:text-text-body-muted transition-colors">Trung tâm ở cữ</a></li>
					<li class="h-6 flex items-center"><a href="<?php echo esc_url( home_url( '/#khoa-hoc-truc-tuyen' ) ); ?>" class="hover:text-text-body-muted transition-colors">Khóa học trực tuyến</a></li>
					<li class="h-6 flex items-center"><a href="<?php echo esc_url( home_url( '/#bao-mau-tai-nha' ) ); ?>" class="hover:text-text-body-muted transition-colors">Bảo mẫu tại nhà</a></li>
					<li class="h-6 flex items-center"><a href="<?php echo esc_url( home_url( '/#lop-hoc-tien-san' ) ); ?>" class="hover:text-text-body-muted transition-colors">Lớp học tiền sản</a></li>
					<li class="h-6 flex items-center"><a href="<?php echo esc_url( home_url( '/#khoa-hoc-truc-tuyen' ) ); ?>" class="hover:text-text-body-muted transition-colors">Tư vấn nuôi con EASY</a></li>
					<li class="h-6 flex items-center"><a href="<?php echo esc_url( home_url( '/#bao-mau-tai-nha' ) ); ?>" class="hover:text-text-body-muted transition-colors">Tắm trẻ sơ sinh</a></li>
					<li class="h-6 flex items-center"><a href="<?php echo esc_url( home_url( '/#bao-mau-tai-nha' ) ); ?>" class="hover:text-text-body-muted transition-colors">Thông tắc tia sữa</a></li>
					<li class="h-6 flex items-center"><a href="<?php echo esc_url( home_url( '/#bao-mau-tai-nha' ) ); ?>" class="hover:text-text-body-muted transition-colors">Chăm sóc bé tại nhà</a></li>
					<li class="h-6 flex items-center"><a href="<?php echo esc_url( home_url( '/#bao-mau-tai-nha' ) ); ?>" class="hover:text-text-body-muted transition-colors">Chăm sóc mẹ sau sinh</a></li>
				</ul>
			</div>

			<!-- Column 3: KIẾN THỨC -->
			<div class="w-full sm:w-auto flex flex-col space-y-3">
				<h3 class="font-body text-base font-bold text-text-body-default uppercase pb-1">
					KIẾN THỨC
				</h3>
				<ul class="space-y-2 text-base font-medium text-text-body-default">
					<li class="h-6 flex items-center"><a href="<?php echo esc_url( home_url( '/#khoa-hoc-truc-tuyen' ) ); ?>" class="hover:text-text-body-muted transition-colors">Phương pháp EASY</a></li>
					<li class="h-6 flex items-center"><a href="<?php echo esc_url( home_url( '/#kien-thuc-nuoi-con' ) ); ?>" class="hover:text-text-body-muted transition-colors">Cẩm nang làm mẹ</a></li>
					<li class="h-6 flex items-center"><a href="<?php echo esc_url( home_url( '/#kien-thuc-nuoi-con' ) ); ?>" class="hover:text-text-body-muted transition-colors">Hội chứng biếng ăn</a></li>
					<li class="h-6 flex items-center"><a href="<?php echo esc_url( home_url( '/#kien-thuc-nuoi-con' ) ); ?>" class="hover:text-text-body-muted transition-colors">Ăn dặm toàn tập</a></li>
					<li class="h-6 flex items-center"><a href="<?php echo esc_url( home_url( '/#kien-thuc-nuoi-con' ) ); ?>" class="hover:text-text-body-muted transition-colors">Mang thai</a></li>
				</ul>
			</div>

			<!-- Column 4: TIN TỨC & SỰ KIỆN -->
			<div class="w-full sm:w-auto flex flex-col space-y-3">
				<h3 class="font-body text-base font-bold text-text-body-default uppercase pb-1">
					TIN TỨC & SỰ KIỆN
				</h3>
				<ul class="space-y-2 text-base font-medium text-text-body-default">
					<li class="h-6 flex items-center"><a href="<?php echo esc_url( home_url( '/#kien-thuc-nuoi-con' ) ); ?>" class="hover:text-text-body-muted transition-colors">Mẹ và bé</a></li>
					<li class="h-6 flex items-center"><a href="<?php echo esc_url( home_url( '/#kien-thuc-nuoi-con' ) ); ?>" class="hover:text-text-body-muted transition-colors">Tin tức & sự kiện</a></li>
				</ul>
			</div>

		</div>

		<!-- Row: 3 social icons sized to the footer design + 2 certification badges -->
		<div class="py-6 border-b-0 sm:border-b sm:border-border-divider-default flex flex-col sm:flex-row items-start sm:items-center justify-between gap-10 sm:gap-6">
			<!-- Social icons: 36px mobile, matching the supplied mobile artwork -->
			<div class="flex items-center gap-6">
				<!-- Facebook -->
				<a href="https://facebook.com/vanphuccare" target="_blank" rel="noopener noreferrer" 
				   class="w-9 h-9 xl:w-12 xl:h-12 shrink-0 rounded-full overflow-hidden hover:scale-105 shadow-sm transition-transform flex items-center justify-center"
				   aria-label="Facebook">
					<img src="<?php echo esc_url( $theme_uri . '/assets/icons/facebook.svg' ); ?>" alt="Facebook" class="w-full h-full object-contain">
				</a>

				<!-- Instagram remains visible; it becomes a link only after PO configures its verified URL. -->
				<?php if ( ! empty( $instagram_url ) ) : ?>
					<a href="<?php echo esc_url( $instagram_url ); ?>" target="_blank" rel="noopener noreferrer" class="w-9 h-9 xl:w-12 xl:h-12 shrink-0 rounded-full overflow-hidden hover:scale-105 shadow-sm transition-transform flex items-center justify-center" aria-label="Instagram">
						<img src="<?php echo esc_url( $theme_uri . '/assets/icons/instagram.svg' ); ?>" alt="Instagram" class="w-full h-full object-contain">
					</a>
				<?php else : ?>
					<span class="w-9 h-9 xl:w-12 xl:h-12 shrink-0 rounded-full overflow-hidden flex items-center justify-center" aria-label="Instagram">
						<img src="<?php echo esc_url( $theme_uri . '/assets/icons/instagram.svg' ); ?>" alt="Instagram" class="w-full h-full object-contain">
					</span>
				<?php endif; ?>

				<!-- TikTok -->
				<a href="https://tiktok.com/@vanphuccare" target="_blank" rel="noopener noreferrer" 
				   class="w-9 h-9 xl:w-12 xl:h-12 shrink-0 rounded-full overflow-hidden hover:scale-105 shadow-sm transition-transform flex items-center justify-center"
				   aria-label="TikTok">
					<img src="<?php echo esc_url( $theme_uri . '/assets/icons/tiktok.svg' ); ?>" alt="TikTok" class="w-full h-full object-contain">
				</a>
			</div>

			<!-- Badges (DMCA + Bộ Công Thương) -->
			<div class="flex items-center gap-3.5">
				<!-- DMCA.com Protection Status Badge -->
				<a href="https://www.dmca.com/Protection/Status.aspx?ID=c7a60f67-9696-479d-baf5-2f48a09327be" 
				   title="DMCA.com Protection Status" 
				   class="dmca-badge inline-flex items-center hover:opacity-90 transition-opacity" 
				   target="_blank" 
				   rel="noopener noreferrer">
					<img src="https://images.dmca.com/Badges/dmca_protected_sml_120n.png?ID=c7a60f67-9696-479d-baf5-2f48a09327be" 
					     alt="DMCA.com Protection Status" 
					     class="h-7 sm:h-8 w-auto object-contain block"
					     loading="lazy">
				</a>
				<script src="https://images.dmca.com/Badges/DMCABadgeHelper.min.js"> </script>

				<!-- Bộ Công Thương -->
				<span class="inline-flex" aria-label="Đã Thông Báo Bộ Công Thương">
					<img src="<?php echo esc_url( $theme_uri . '/assets/icons/bo-cong-thuong.svg' ); ?>" 
					     alt="Đã Thông Báo Bộ Công Thương" 
					     width="145"
					     height="55" 
					     class="h-12 sm:h-[48px] md:h-[55px] w-auto object-contain block">
				</span>
			</div>
		</div>

		<!-- Bottom Row: Navigation Links (Mobile flex-col gap-2 no divider, Desktop flex-row with text-neutral-600 divider) -->
		<div class="pt-6 flex flex-col xl:flex-row items-start xl:items-center justify-start gap-2 xl:gap-3 text-base font-medium text-text-body-default">
			<a href="<?php echo esc_url( home_url( '/dieu-khoan-su-dung' ) ); ?>" class="order-3 xl:order-1 hover:text-text-body-muted transition-colors">Điều khoản sử dụng</a>
			<span class="order-4 hidden xl:inline text-neutral-600">|</span>
			<a href="<?php echo esc_url( home_url( '/chinh-sach-bao-mat' ) ); ?>" class="order-4 xl:order-3 hover:text-text-body-muted transition-colors">Chính sách bảo mật</a>
			<span class="order-5 hidden xl:inline text-neutral-600">|</span>
			<a href="<?php echo esc_url( home_url( '/tuyen-dung' ) ); ?>" class="order-2 xl:order-5 hover:text-text-body-muted transition-colors">Tuyển dụng</a>
			<span class="order-6 hidden xl:inline text-neutral-600">|</span>
			<a href="<?php echo esc_url( home_url( '/lien-he' ) ); ?>" class="order-1 xl:order-7 hover:text-text-body-muted transition-colors">Liên hệ</a>
		</div>

	</div>
</footer>

<!-- Floating Quick Contact Speed Dial (Hotline, Zalo, Messenger) -->
<?php get_template_part( 'template-parts/components/floating-contact' ); ?>

<!-- Consultation Modal Popup -->
<?php get_template_part( 'template-parts/components/consultation-modal' ); ?>

<!-- Success Confirmation Modal Popup -->
<?php get_template_part( 'template-parts/components/success-modal' ); ?>

<?php wp_footer(); ?>
</body>
</html>
