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

$theme_uri = get_template_directory_uri();
?>
</main><!-- #primary -->

<footer class="site-footer relative w-full overflow-hidden bg-linear-to-b from-white via-[#EBF5FB]/70 to-[#D5EBF9]/80 pt-14 sm:pt-16 pb-10 text-neutral-800">
	<!-- Decorative faint watermark logo on bottom-right -->
	<div class="pointer-events-none absolute right-0 bottom-0 z-0 opacity-10 overflow-hidden translate-x-10 translate-y-10" aria-hidden="true">
		<img src="<?php echo esc_url( $theme_uri . '/assets/images/logo.svg' ); ?>" alt="" class="w-[420px] h-auto object-contain select-none">
	</div>

	<div class="relative z-10 vpc-container">
		
		<!-- 4 Columns Grid -->
		<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-12 gap-8 xl:gap-10 pb-10">
			
			<!-- Column 1: Company Info (4 cols) -->
			<div class="xl:col-span-4 flex flex-col space-y-3">
				<div class="footer-logo mb-1">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="inline-flex items-center shrink-0 max-w-[175px]">
						<img src="<?php echo esc_url( $theme_uri . '/assets/images/logo.svg' ); ?>" 
						     alt="Vạn Phúc Care Logo" 
						     width="168" 
						     height="52" 
						     class="h-10 sm:h-11 w-auto object-contain block" 
						     style="max-height: 48px; width: auto; height: auto;">
					</a>
				</div>
				
				<p class="text-sm font-medium text-neutral-700">
					Hành Trình Cùng Mẹ, Trải Đầy Yêu Thương
				</p>
				
				<h3 class="font-heading text-base font-bold text-neutral-900 uppercase tracking-wide pt-1">
					CÔNG TY TNHH VẠN PHÚC CARE
				</h3>
				
				<ul class="space-y-2 text-xs sm:text-sm text-neutral-700 leading-relaxed">
					<li>
						<span>Trung tâm ở cữ: 35B/399 Âu Cơ, phường Tây Hồ, TP. Hà Nội</span>
					</li>
					<li>
						<span>Hotline tư vấn: <a href="tel:02463296698" class="hover:text-primary-600 font-medium">(024) 6329 6698</a></span>
					</li>
					<li>
						<span>Hotline hỗ trợ: <a href="tel:0376246673" class="hover:text-primary-600 font-medium">037 624 6673</a></span>
					</li>
					<li>
						<span>Email CSKH: <a href="mailto:cskh@vanphuccare.vn" class="hover:text-primary-600 font-medium">cskh@vanphuccare.vn</a></span>
					</li>
					<li>
						<span>Email liên hệ: <a href="mailto:info@vanphuccare.vn" class="hover:text-primary-600 font-medium">info@vanphuccare.vn</a></span>
					</li>
				</ul>
			</div>

			<!-- Column 2: DỊCH VỤ CỦA CHÚNG TÔI (3 cols) -->
			<div class="xl:col-span-3 flex flex-col space-y-3">
				<h3 class="font-heading text-xs sm:text-sm font-bold text-neutral-900 uppercase tracking-wider pb-1">
					DỊCH VỤ CỦA CHÚNG TÔI
				</h3>
				<ul class="space-y-2 text-xs sm:text-sm text-neutral-700">
					<li><a href="<?php echo esc_url( home_url( '/#trung-tam-o-cu' ) ); ?>" class="hover:text-primary-600 transition-colors">Trung tâm ở cữ</a></li>
					<li><a href="<?php echo esc_url( home_url( '/#dao-tao-easy' ) ); ?>" class="hover:text-primary-600 transition-colors">Khóa học trực tuyến</a></li>
					<li><a href="<?php echo esc_url( home_url( '/#dich-vu-tai-nha' ) ); ?>" class="hover:text-primary-600 transition-colors">Bảo mẫu tại nhà</a></li>
					<li><a href="<?php echo esc_url( home_url( '/#dao-tao-easy' ) ); ?>" class="hover:text-primary-600 transition-colors">Lớp học tiền sản</a></li>
					<li><a href="<?php echo esc_url( home_url( '/#dao-tao-easy' ) ); ?>" class="hover:text-primary-600 transition-colors">Tư vấn nuôi con EASY</a></li>
					<li><a href="<?php echo esc_url( home_url( '/#dich-vu-tai-nha' ) ); ?>" class="hover:text-primary-600 transition-colors">Tắm trẻ sơ sinh</a></li>
					<li><a href="<?php echo esc_url( home_url( '/#dich-vu-tai-nha' ) ); ?>" class="hover:text-primary-600 transition-colors">Thông tắc tia sữa</a></li>
					<li><a href="<?php echo esc_url( home_url( '/#dich-vu-tai-nha' ) ); ?>" class="hover:text-primary-600 transition-colors">Chăm sóc bé tại nhà</a></li>
					<li><a href="<?php echo esc_url( home_url( '/#dich-vu-tai-nha' ) ); ?>" class="hover:text-primary-600 transition-colors">Chăm sóc mẹ sau sinh</a></li>
				</ul>
			</div>

			<!-- Column 3: KIẾN THỨC (3 cols) -->
			<div class="xl:col-span-3 flex flex-col space-y-3">
				<h3 class="font-heading text-xs sm:text-sm font-bold text-neutral-900 uppercase tracking-wider pb-1">
					KIẾN THỨC
				</h3>
				<ul class="space-y-2 text-xs sm:text-sm text-neutral-700">
					<li><a href="<?php echo esc_url( home_url( '/#dao-tao-easy' ) ); ?>" class="hover:text-primary-600 transition-colors">Phương pháp EASY</a></li>
					<li><a href="<?php echo esc_url( home_url( '/#tin-tuc' ) ); ?>" class="hover:text-primary-600 transition-colors">Cẩm nang làm mẹ</a></li>
					<li><a href="<?php echo esc_url( home_url( '/#tin-tuc' ) ); ?>" class="hover:text-primary-600 transition-colors">Hội chứng biếng ăn</a></li>
					<li><a href="<?php echo esc_url( home_url( '/#tin-tuc' ) ); ?>" class="hover:text-primary-600 transition-colors">Ăn dặm toàn tập</a></li>
					<li><a href="<?php echo esc_url( home_url( '/#tin-tuc' ) ); ?>" class="hover:text-primary-600 transition-colors">Mang thai</a></li>
				</ul>
			</div>

			<!-- Column 4: TIN TỨC & SỰ KIỆN (2 cols) -->
			<div class="xl:col-span-2 flex flex-col space-y-3">
				<h3 class="font-heading text-xs sm:text-sm font-bold text-neutral-900 uppercase tracking-wider pb-1">
					TIN TỨC & SỰ KIỆN
				</h3>
				<ul class="space-y-2 text-xs sm:text-sm text-neutral-700">
					<li><a href="<?php echo esc_url( home_url( '/#tin-tuc' ) ); ?>" class="hover:text-primary-600 transition-colors">Mẹ và bé</a></li>
					<li><a href="<?php echo esc_url( home_url( '/#tin-tuc' ) ); ?>" class="hover:text-primary-600 transition-colors">Tin tức & sự kiện</a></li>
				</ul>
			</div>

		</div>

		<!-- Middle Row: 3 Social Icons (Left) + 2 Badges (Right) -->
		<div class="py-6 border-y border-neutral-300/60 flex flex-col sm:flex-row items-center justify-between gap-4">
			<!-- Social Icons (Facebook, Instagram, TikTok) -->
			<div class="flex items-center gap-3">
				<!-- Facebook -->
				<a href="https://facebook.com/vanphuccare" target="_blank" rel="noopener noreferrer" 
				   class="w-10 h-10 rounded-full overflow-hidden hover:scale-110 shadow-sm transition-transform" 
				   aria-label="Facebook">
					<img src="<?php echo esc_url( $theme_uri . '/assets/icons/facebook.svg' ); ?>" alt="Facebook" class="w-full h-full object-contain">
				</a>

				<!-- Instagram -->
				<a href="https://instagram.com/vanphuccare" target="_blank" rel="noopener noreferrer" 
				   class="w-10 h-10 rounded-xl overflow-hidden hover:scale-110 shadow-sm transition-transform" 
				   aria-label="Instagram">
					<img src="<?php echo esc_url( $theme_uri . '/assets/icons/instagram.svg' ); ?>" alt="Instagram" class="w-full h-full object-cover">
				</a>

				<!-- TikTok -->
				<a href="https://tiktok.com/@vanphuccare" target="_blank" rel="noopener noreferrer" 
				   class="w-10 h-10 rounded-full overflow-hidden hover:scale-110 shadow-sm transition-transform" 
				   aria-label="TikTok">
					<img src="<?php echo esc_url( $theme_uri . '/assets/icons/tiktok.svg' ); ?>" alt="TikTok" class="w-full h-full object-contain">
				</a>
			</div>

			<!-- Badges (DMCA + Bộ Công Thương) -->
			<div class="flex items-center gap-3">
				<!-- DMCA Protected -->
				<a href="#" target="_blank" rel="nofollow noopener" class="hover:opacity-90 transition-opacity">
					<img src="<?php echo esc_url( $theme_uri . '/assets/icons/dmca.svg' ); ?>" 
					     alt="DMCA Protected" 
					     class="h-9 w-auto object-contain block">
				</a>

				<!-- Bộ Công Thương -->
				<a href="#" target="_blank" rel="nofollow noopener" class="hover:opacity-90 transition-opacity">
					<img src="<?php echo esc_url( $theme_uri . '/assets/icons/bo-cong-thuong.svg' ); ?>" 
					     alt="Đã Thông Báo Bộ Công Thương" 
					     class="h-9 w-auto object-contain block">
				</a>
			</div>
		</div>

		<!-- Bottom Row: Navigation Links -->
		<div class="pt-5 flex flex-wrap items-center justify-start gap-2 sm:gap-3 text-xs sm:text-sm text-neutral-700">
			<a href="<?php echo esc_url( home_url( '/dieu-khoan-su-dung' ) ); ?>" class="hover:text-primary-600 transition-colors">Điều khoản sử dụng</a>
			<span class="text-neutral-400">|</span>
			<a href="<?php echo esc_url( home_url( '/chinh-sach-bao-mat' ) ); ?>" class="hover:text-primary-600 transition-colors">Chính sách bảo mật</a>
			<span class="text-neutral-400">|</span>
			<a href="<?php echo esc_url( home_url( '/tuyen-dung' ) ); ?>" class="hover:text-primary-600 transition-colors">Tuyển dụng</a>
			<span class="text-neutral-400">|</span>
			<a href="<?php echo esc_url( home_url( '/lien-he' ) ); ?>" class="hover:text-primary-600 transition-colors">Liên hệ</a>
		</div>

	</div>
</footer>

<!-- Floating Quick Contact Speed Dial (Hotline, Zalo, Messenger) -->
<?php get_template_part( 'template-parts/components/floating-contact' ); ?>

<!-- Consultation Modal Popup -->
<?php get_template_part( 'template-parts/components/consultation-modal' ); ?>

<?php wp_footer(); ?>
</body>
</html>
