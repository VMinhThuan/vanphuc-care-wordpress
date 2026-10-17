<?php
/**
 * Site footer template for Vạn Phúc Care.
 * Fully built with Tailwind CSS v4 design system tokens.
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
</main><!-- #primary -->

<footer class="site-footer relative w-full overflow-hidden bg-linear-to-b from-white via-primary-100/50 to-primary-200/70 pt-16 sm:pt-20 pb-8 text-neutral-900">
	<!-- Decorative soft gradient waterdrop / orb vectors matching Figma aesthetic -->
	<div class="pointer-events-none absolute inset-0 z-0 overflow-hidden" aria-hidden="true">
		<div class="absolute -right-20 -bottom-20 h-96 w-96 rounded-full bg-primary-300/20 blur-3xl"></div>
		<div class="absolute right-40 -bottom-40 h-[450px] w-[450px] rounded-full bg-secondary-300/15 blur-3xl"></div>
	</div>

	<div class="relative z-10 vpc-container">
		<!-- Main Footer Grid (3 Columns Desktop, 2 Tablet, 1 Mobile) -->
		<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-12 gap-10 xl:gap-12 pb-12">
			
			<!-- Column 1: Company Info (5 cols on desktop) -->
			<div class="xl:col-span-5 flex flex-col space-y-4">
				<div class="footer-logo mb-2">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="inline-flex items-center shrink-0 max-w-[190px] transition-transform duration-200 hover:scale-102">
						<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/logo.svg' ); ?>" 
						     alt="Vạn Phúc Care Logo" 
						     width="168" 
						     height="52" 
						     class="h-11 sm:h-13 w-auto object-contain block" 
						     style="max-height: 52px; width: auto; height: auto;">
					</a>
				</div>
				
				<p class="font-heading text-lg sm:text-xl font-semibold text-primary-600 italic tracking-wide">
					"Hành Trình Cùng Mẹ, Trải Đầy Yêu Thương"
				</p>
				
				<h3 class="font-heading text-base sm:text-lg font-bold text-neutral-900 uppercase tracking-wider pt-2">
					CÔNG TY TNHH VẠN PHÚC CARE
				</h3>
				
				<ul class="space-y-3 text-sm sm:text-base text-text-body-muted">
					<li class="flex items-start gap-2.5">
						<svg class="w-5 h-5 text-primary-500 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
							<path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
							<path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
						</svg>
						<span><strong class="font-semibold text-neutral-800">Trung tâm ở cữ:</strong> 35B/399 Âu Cơ, phường Tây Hồ, TP. Hà Nội</span>
					</li>
					<li class="flex items-center gap-2.5">
						<svg class="w-5 h-5 text-primary-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
							<path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
						</svg>
						<span><strong class="font-semibold text-neutral-800">Hotline và CSKH:</strong> (024) 6329 6698</span>
					</li>
					<li class="flex items-center gap-2.5">
						<svg class="w-5 h-5 text-primary-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
							<path stroke-linecap="round" stroke-linejoin="round" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
						</svg>
						<span><strong class="font-semibold text-neutral-800">Hotline hỗ trợ:</strong> 037 624 6673</span>
					</li>
					<li class="flex items-center gap-2.5">
						<svg class="w-5 h-5 text-primary-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
							<path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
						</svg>
						<span><strong class="font-semibold text-neutral-800">Email:</strong> cskh@vanphuccare.vn</span>
					</li>
					<li class="flex items-center gap-2.5">
						<svg class="w-5 h-5 text-primary-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
							<path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
						</svg>
						<span><strong class="font-semibold text-neutral-800">Website:</strong> vanphuccare.vn</span>
					</li>
				</ul>

				<!-- Social Channels -->
				<div class="pt-2">
					<span class="block text-xs font-bold text-neutral-600 uppercase tracking-wider mb-2.5">Kênh mạng xã hội</span>
					<?php get_template_part( 'template-parts/components/social-icons', null, array( 'size' => 'md' ) ); ?>
				</div>
			</div>

			<!-- Column 2: Services (4 cols on desktop) -->
			<div class="xl:col-span-4 flex flex-col space-y-4">
				<h3 class="font-heading text-base sm:text-lg font-bold text-neutral-900 uppercase tracking-wider pb-2 border-b-2 border-primary-500/30 inline-block w-fit">
					DỊCH VỤ CỦA CHÚNG TÔI
				</h3>
				<ul class="space-y-2.5 text-sm sm:text-base">
					<li><a href="#" class="inline-block text-text-body-muted transition-all duration-200 hover:text-primary-600 hover:translate-x-1">Trung tâm ở cữ</a></li>
					<li><a href="#" class="inline-block text-text-body-muted transition-all duration-200 hover:text-primary-600 hover:translate-x-1">Khóa học chăm bé</a></li>
					<li><a href="#" class="inline-block text-text-body-muted transition-all duration-200 hover:text-primary-600 hover:translate-x-1">Bảo mẫu tại nhà</a></li>
					<li><a href="#" class="inline-block text-text-body-muted transition-all duration-200 hover:text-primary-600 hover:translate-x-1">Hướng dẫn nuôi con EASY trực tuyến 1:1</a></li>
					<li><a href="#" class="inline-block text-text-body-muted transition-all duration-200 hover:text-primary-600 hover:translate-x-1">Hướng dẫn nuôi con EASY</a></li>
					<li><a href="#" class="inline-block text-text-body-muted transition-all duration-200 hover:text-primary-600 hover:translate-x-1">Tắm trẻ sơ sinh</a></li>
					<li><a href="#" class="inline-block text-text-body-muted transition-all duration-200 hover:text-primary-600 hover:translate-x-1">Thông tắc tia sữa</a></li>
					<li><a href="#" class="inline-block text-text-body-muted transition-all duration-200 hover:text-primary-600 hover:translate-x-1">Chăm sóc mẹ sau sinh</a></li>
				</ul>
			</div>

			<!-- Column 3: News & Knowledge (3 cols on desktop) -->
			<div class="xl:col-span-3 flex flex-col space-y-4">
				<h3 class="font-heading text-base sm:text-lg font-bold text-neutral-900 uppercase tracking-wider pb-2 border-b-2 border-secondary-400/50 inline-block w-fit">
					KIẾN THỨC & TIN TÚC
				</h3>
				<ul class="space-y-2.5 text-sm sm:text-base">
					<li><a href="#" class="inline-block text-text-body-muted transition-all duration-200 hover:text-primary-600 hover:translate-x-1">Phương pháp EASY</a></li>
					<li><a href="#" class="inline-block text-text-body-muted transition-all duration-200 hover:text-primary-600 hover:translate-x-1">Cẩm nang làm mẹ</a></li>
					<li><a href="#" class="inline-block text-text-body-muted transition-all duration-200 hover:text-primary-600 hover:translate-x-1">Hội chứng biếng ăn</a></li>
					<li><a href="#" class="inline-block text-text-body-muted transition-all duration-200 hover:text-primary-600 hover:translate-x-1">Ăn dặm toàn tập</a></li>
					<li><a href="#" class="inline-block text-text-body-muted transition-all duration-200 hover:text-primary-600 hover:translate-x-1">Mang thai</a></li>
					<li><a href="#" class="inline-block text-text-body-muted transition-all duration-200 hover:text-primary-600 hover:translate-x-1">Mẹ và bé</a></li>
					<li><a href="#" class="inline-block text-text-body-muted transition-all duration-200 hover:text-primary-600 hover:translate-x-1">Tin tức & sự kiện</a></li>
				</ul>
			</div>
		</div>

		<!-- Footer Bottom: Legal Links & Copyright -->
		<div class="mt-8 border-t border-neutral-300/80 pt-6 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs sm:text-sm text-text-body-muted">
			<div class="flex flex-wrap items-center justify-center gap-3 font-medium">
				<a href="<?php echo esc_url( home_url( '/dieu-khoan-su-dung' ) ); ?>" class="hover:text-primary-600 transition-colors">Điều khoản sử dụng</a>
				<span class="text-neutral-400">|</span>
				<a href="<?php echo esc_url( home_url( '/chinh-sach-bao-mat' ) ); ?>" class="hover:text-primary-600 transition-colors">Chính sách bảo mật</a>
				<span class="text-neutral-400">|</span>
				<a href="<?php echo esc_url( home_url( '/chinh-sach-bien-tap' ) ); ?>" class="hover:text-primary-600 transition-colors">Chính sách biên tập</a>
				<span class="text-neutral-400">|</span>
				<a href="<?php echo esc_url( home_url( '/quy-trinh-khieu-nai' ) ); ?>" class="hover:text-primary-600 transition-colors">Quy trình khiếu nại</a>
				<span class="text-neutral-400">|</span>
				<a href="#" class="hover:text-primary-600 transition-colors">Tuyển dụng</a>
			</div>
			
			<div class="text-neutral-600 text-center sm:text-right">
				&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> Vạn Phúc Care. Toàn bộ bản quyền được bảo lưu.
			</div>
		</div>
	</div>
</footer>

<!-- Floating Quick Contact Speed Dial (Hotline, Zalo, Messenger) -->
<?php get_template_part( 'template-parts/components/floating-contact' ); ?>

<!-- Consultation Modal Popup (Figma Board 9) -->
<?php get_template_part( 'template-parts/components/consultation-modal' ); ?>

<?php wp_footer(); ?>
</body>
</html>
