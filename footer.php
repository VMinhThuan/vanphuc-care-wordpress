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
if ( empty( $instagram_url ) ) {
	$instagram_url = 'https://www.instagram.com/vanphuccare?utm_source=ig_web_button_share_sheet&exln=ZDNlZDc0MzIxNw==';
}
?>
</main><!-- #primary -->

<footer class="site-footer <?php echo ( is_page_template( 'page-gioi-thieu.php' ) || is_page( 'gioi-thieu' ) ) ? 'site-footer--about' : ''; ?> relative w-full overflow-hidden pt-8 pb-8 xl:py-6 text-text-body-default" style="--footer-background: linear-gradient(180deg, var(--color-neutral-100) 38.823%, var(--color-primary-100) 99.976%);">
	<!-- Decorative watermark: centered and intentionally wider than the mobile viewport, as in Figma. -->
	<div class="pointer-events-none absolute bottom-0 left-1/2 z-0 w-[464px] -translate-x-1/2 select-none overflow-hidden sm:right-0 sm:left-auto sm:w-[380px] sm:translate-x-0 xl:w-[471px]" aria-hidden="true">
		<?php $footer_watermark_url = vpc_image_url( 'footer-watermark.svg', 'full' ); ?>
		<?php if ( $footer_watermark_url ) : ?>
			<img src="<?php echo esc_url( $footer_watermark_url ); ?>"
			     alt=""
			     width="471"
			     height="360"
			     class="w-full h-auto block select-none">
		<?php endif; ?>
	</div>

	<!-- Keep this exactly aligned with the header's logo / navigation / CTA container. -->
	<div class="vpc-container relative z-10 px-4 xl:px-20">
		
		<!-- Footer content: 32px top spacing on mobile, 24px on desktop. -->
		<div class="vpc-footer-main pt-0 pb-0 xl:py-6 flex flex-col md:flex-row md:flex-wrap xl:flex-nowrap justify-between items-start gap-8 xl:gap-6">
			
			<!-- Column 1: Thông tin cty (Logo -> tagline gap 12px, còn lại gap 20px) -->
			<div class="vpc-footer-about-company hidden md:flex w-full md:w-[381px] shrink-0 flex-col">
				<div class="footer-logo mb-3">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="inline-flex items-center shrink-0">
						<?php $footer_logo_url = vpc_image_url( 'logo.svg', 'full' ); ?>
						<?php if ( $footer_logo_url ) : ?>
							<img src="<?php echo esc_url( $footer_logo_url ); ?>"
							     alt="Vạn Phúc Care Logo"
							     width="155"
							     height="48"
							     class="h-[48px] w-[155px] object-contain block">
						<?php endif; ?>
					</a>
				</div>
				
				<div class="flex flex-col space-y-3 xl:space-y-5">
					<p class="text-base font-medium text-text-body-default">
						Hành Trình Cùng Mẹ, Trải Đầy Yêu Thương
					</p>
					
					<h3 class="vpc-footer-company-name font-body text-2xl font-bold text-text-body-default uppercase">
						CÔNG TY TNHH VẠN PHÚC CARE
					</h3>
					
					<ul class="space-y-3 xl:space-y-5 text-base font-medium text-text-body-default leading-6 xl:leading-relaxed">
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
			<div class="vpc-footer-about-services hidden md:flex w-full sm:w-auto flex-col space-y-2 xl:space-y-3">
				<h3 class="font-body text-base font-bold text-text-body-default uppercase xl:pb-1">
					DỊCH VỤ CỦA CHÚNG TÔI
				</h3>
				<ul class="space-y-2 text-base font-medium text-text-body-default">
					<li class="h-6 flex items-center"><a href="<?php echo esc_url( home_url( '/#trung-tam-o-cu' ) ); ?>" class="hover:text-text-body-muted transition-colors">Trung tâm ở cữ</a></li>
					<li class="h-6 flex items-center"><a href="<?php echo esc_url( home_url( '/#khoa-hoc-truc-tuyen' ) ); ?>" class="hover:text-text-body-muted transition-colors">Khóa học trực tuyến</a></li>
					<li class="h-6 flex items-center"><a href="<?php echo esc_url( home_url( '/#bao-mau-tai-nha' ) ); ?>" class="hover:text-text-body-muted transition-colors">Bảo mẫu tại nhà</a></li>
					<li class="h-6 flex items-center"><a href="<?php echo esc_url( home_url( '/lop-hoc-tien-san/' ) ); ?>" class="hover:text-text-body-muted transition-colors">Lớp học tiền sản</a></li>
					<li class="h-6 flex items-center"><a href="<?php echo esc_url( home_url( '/#khoa-hoc-truc-tuyen' ) ); ?>" class="hover:text-text-body-muted transition-colors">Tư vấn nuôi con EASY</a></li>
					<li class="h-6 flex items-center"><a href="<?php echo esc_url( home_url( '/#bao-mau-tai-nha' ) ); ?>" class="hover:text-text-body-muted transition-colors">Tắm trẻ sơ sinh</a></li>
					<li class="h-6 flex items-center"><a href="<?php echo esc_url( home_url( '/#bao-mau-tai-nha' ) ); ?>" class="hover:text-text-body-muted transition-colors">Thông tắc tia sữa</a></li>
					<li class="h-6 flex items-center"><a href="<?php echo esc_url( home_url( '/#bao-mau-tai-nha' ) ); ?>" class="hover:text-text-body-muted transition-colors">Chăm sóc bé tại nhà</a></li>
					<li class="h-6 flex items-center"><a href="<?php echo esc_url( home_url( '/#bao-mau-tai-nha' ) ); ?>" class="hover:text-text-body-muted transition-colors">Chăm sóc mẹ sau sinh</a></li>
				</ul>
			</div>

			<!-- Column 3: KIẾN THỨC -->
			<div class="footer-link-column w-full sm:w-auto flex flex-col space-y-2 xl:space-y-3">
				<h3 class="font-body text-sm md:text-base font-bold text-text-body-default uppercase xl:pb-1">
					KIẾN THỨC
				</h3>
				<ul class="space-y-2 text-sm md:text-base font-medium text-text-body-default">
					<li class="h-6 flex items-center"><a href="<?php echo esc_url( home_url( '/#khoa-hoc-truc-tuyen' ) ); ?>" class="hover:text-text-body-muted transition-colors">Phương pháp EASY</a></li>
					<li class="h-6 flex items-center"><a href="<?php echo esc_url( home_url( '/#kien-thuc-nuoi-con' ) ); ?>" class="hover:text-text-body-muted transition-colors">Cẩm nang làm mẹ</a></li>
					<li class="h-6 flex items-center"><a href="<?php echo esc_url( home_url( '/#kien-thuc-nuoi-con' ) ); ?>" class="hover:text-text-body-muted transition-colors">Hội chứng biếng ăn</a></li>
					<li class="h-6 flex items-center"><a href="<?php echo esc_url( home_url( '/#kien-thuc-nuoi-con' ) ); ?>" class="hover:text-text-body-muted transition-colors">Ăn dặm toàn tập</a></li>
					<li class="h-6 flex items-center"><a href="<?php echo esc_url( home_url( '/#kien-thuc-nuoi-con' ) ); ?>" class="hover:text-text-body-muted transition-colors">Mang thai</a></li>
				</ul>
			</div>

			<!-- Column 4: TIN TỨC & SỰ KIỆN -->
			<div class="footer-link-column w-full sm:w-auto flex flex-col space-y-2 xl:space-y-3">
				<h3 class="font-body text-sm md:text-base font-bold text-text-body-default uppercase xl:pb-1">
					TIN TỨC & SỰ KIỆN
				</h3>
				<ul class="space-y-2 text-sm md:text-base font-medium text-text-body-default">
					<li class="h-6 flex items-center"><a href="<?php echo esc_url( home_url( '/#kien-thuc-nuoi-con' ) ); ?>" class="hover:text-text-body-muted transition-colors">Mẹ và bé</a></li>
					<li class="h-6 flex items-center"><a href="<?php echo esc_url( home_url( '/#kien-thuc-nuoi-con' ) ); ?>" class="hover:text-text-body-muted transition-colors">Tin tức & sự kiện</a></li>
				</ul>
			</div>

		</div>

		<!-- Row: 3 social icons sized to the footer design + 2 certification badges -->
		<div class="vpc-footer-social pt-8 pb-0 sm:py-6 border-b-0 sm:border-b sm:border-border-divider-default flex flex-col sm:flex-row items-start sm:items-center justify-between gap-8 sm:gap-6">
			<!-- Social icon slots are 52x44 on mobile; the artwork itself stays 40px. -->
			<div class="flex items-center gap-4">
				<!-- Facebook -->
				<a href="https://facebook.com/vanphuccare" target="_blank" rel="noopener noreferrer" 
				   class="w-8 h-8 xl:w-12 xl:h-12 shrink-0 rounded-full overflow-hidden hover:scale-105 shadow-sm transition-transform flex items-center justify-center"
				   aria-label="Facebook">
					<img src="<?php echo esc_url( $theme_uri . '/assets/icons/facebook.svg' ); ?>" alt="Facebook" class="w-8 h-8 xl:w-full xl:h-full object-contain">
				</a>

				<!-- Instagram -->
				<a href="<?php echo esc_url( $instagram_url ); ?>" target="_blank" rel="noopener noreferrer" class="w-8 h-8 xl:w-12 xl:h-12 shrink-0 rounded-full overflow-hidden hover:scale-105 shadow-sm transition-transform flex items-center justify-center" aria-label="Instagram">
					<img src="<?php echo esc_url( $theme_uri . '/assets/icons/instagram.svg' ); ?>" alt="Instagram" class="w-8 h-8 xl:w-full xl:h-full object-contain">
				</a>

				<!-- TikTok -->
				<a href="https://tiktok.com/@vanphuccare" target="_blank" rel="noopener noreferrer" 
				   class="w-8 h-8 xl:w-12 xl:h-12 shrink-0 rounded-full overflow-hidden hover:scale-105 shadow-sm transition-transform flex items-center justify-center"
				   aria-label="TikTok">
					<img src="<?php echo esc_url( $theme_uri . '/assets/icons/tiktok.svg' ); ?>" alt="TikTok" class="w-8 h-8 xl:w-full xl:h-full object-contain">
				</a>
			</div>

			<!-- Badges (DMCA + Bộ Công Thương) -->
			<div class="flex items-center gap-3 xl:gap-3.5">
				<!-- DMCA.com Protection Status Badge: use the local Figma asset to preserve the designed colors. -->
				<a href="https://www.dmca.com/Protection/Status.aspx?ID=c7a60f67-9696-479d-baf5-2f48a09327be" 
				   title="DMCA.com Protection Status" 
				   class="dmca-badge inline-flex items-center hover:opacity-90 transition-opacity" 
				   target="_blank" 
				   rel="noopener noreferrer">
					<img src="<?php echo esc_url( $theme_uri . '/assets/icons/dmca.svg' ); ?>"
					     alt="DMCA.com Protection Status" 
					     width="120"
					     height="55"
					     class="w-[120px] h-[55px] object-contain block"
					     loading="lazy">
				</a>

				<!-- Bộ Công Thương -->
				<span class="inline-flex" aria-label="Đã Thông Báo Bộ Công Thương">
					<img src="<?php echo esc_url( $theme_uri . '/assets/icons/bo-cong-thuong.svg' ); ?>" 
					     alt="Đã Thông Báo Bộ Công Thương" 
					     width="145"
					     height="55" 
						     class="h-[55px] w-auto object-contain block">
				</span>
			</div>
		</div>

		<!-- Bottom Row: divider and navigation links on mobile; inline links on desktop. -->
		<div class="vpc-footer-legal mt-8 border-t border-border-divider-default pt-8 flex flex-col xl:flex-row items-start xl:items-center justify-start gap-1 md:gap-2 xl:gap-3 text-sm md:text-base font-medium text-text-body-default xl:mt-0 xl:border-t-0 xl:pt-6">
			<a href="<?php echo esc_url( home_url( '/dieu-khoan-su-dung' ) ); ?>" class="vpc-footer-legal-terms order-1 xl:order-none hover:text-text-body-muted transition-colors">Điều khoản sử dụng</a>
			<span class="hidden xl:inline text-neutral-600 select-none" aria-hidden="true">|</span>
			<a href="<?php echo esc_url( home_url( '/chinh-sach-bao-mat' ) ); ?>" class="vpc-footer-legal-privacy order-2 xl:order-none hover:text-text-body-muted transition-colors">Chính sách bảo mật</a>
			<span class="hidden xl:inline text-neutral-600 select-none" aria-hidden="true">|</span>
			<a href="<?php echo esc_url( home_url( '/tuyen-dung' ) ); ?>" class="vpc-footer-legal-careers order-3 xl:order-none hover:text-text-body-muted transition-colors">Tuyển dụng</a>
			<span class="hidden xl:inline text-neutral-600 select-none" aria-hidden="true">|</span>
			<a href="<?php echo esc_url( home_url( '/lien-he' ) ); ?>" class="vpc-footer-legal-contact order-4 xl:order-none hover:text-text-body-muted transition-colors">Liên hệ</a>
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
