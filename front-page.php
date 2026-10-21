<?php
/**
 * Front page template for Vạn Phúc Care.
 * Synchronized with standard Figma Mobile & Desktop specification.
 * Exactly matches Figma Homepage Structure:
 * - 1. Hero Promotional Banner (Khóa học Chăm sóc bé yêu khoa học)
 * - 2. Giới thiệu / Dịch vụ nổi bật (Hành trình cùng mẹ, trải đầy yêu thương)
 * - 3. Không gian nghỉ dưỡng (Trung tâm ở cữ 35B/399 Âu Cơ, Tây Hồ)
 * - 4. Dịch vụ bảo mẫu tại nhà (Bảo mẫu tại nhà, Chăm bé chuẩn y khoa)
 * - 5. Lớp học tiền sản (Chưa sẵn sàng làm mẹ, Hãy bắt đầu từ lớp tiền sản)
 * - 6. Khóa học làm mẹ trực tuyến (Nuôi con không còn áp lực)
 * - 7. Vì sao chọn Vạn Phúc Care (4 lý do + 3 bước chăm sóc)
 * - 8. Cảm nhận của khách hàng (Feedback carousel)
 * - 9. Báo chí nói về chúng tôi (Featured Press / Articles)
 * - 10. Đăng ký tư vấn (Sẵn sàng bắt đầu - Hành trình làm mẹ hạnh phúc)
 * - 11. Kiến thức nuôi con (Cẩm nang kiến thức chuyên sâu)
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
 = get_template_directory_uri();
?>

<!-- =========================================================================
	     1. HERO PROMOTIONAL BANNER (Khóa Học Chăm Bé Khoa Học từ con số 0)
	     ========================================================================= -->
	<section class="hero-banner-section w-full p-0 m-0 bg-[#A6DDFB]">
		<div class="w-full relative">
			<a href="https://www.edu.vanphuccare.vn" target="_blank" rel="noopener noreferrer" class="block w-full relative group" title="Khóa học Chăm sóc bé yêu KHOA HỌC từ con số 0 - Vạn Phúc Care">
				<picture>
					<source srcset="<?php echo esc_url( $theme_uri . '/assets/images/banner_khoahoc_1440x581.webp?v=2' ); ?>" type="image/webp">
					<img src="<?php echo esc_url( $theme_uri . '/assets/images/banner_khoahoc_1440x581.png?v=2' ); ?>" 
					     alt="Chăm sóc bé yêu KHOA HỌC từ con số 0 - Hệ thống khóa học online chuẩn y khoa dành cho cha mẹ hiện đại - Vạn Phúc Care" 
 					     width="1440" 
					     height="581" 
					     class="w-full h-auto object-cover block" 
					     loading="eager" 
					     fetchpriority="high" />
				</picture>

				<!-- Screen-reader accessible semantic text -->
				<h1 class="sr-only">Chăm sóc bé yêu KHOA HỌC từ con số 0 - Hệ thống khóa học online chuẩn y khoa dành cho cha mẹ hiện đại</h1>

				<!-- Clickable interactive CTA hotspot on 'Truy cập ngay' pill button -->
				<span class="absolute right-[21%] sm:right-[22%] lg:right-[23%] bottom-[16%] sm:bottom-[17%] lg:bottom-[19%] w-[44%] sm:w-[39%] lg:w-[35%] h-[12%] sm:h-[13%] rounded-full cursor-pointer transition-all duration-200 hover:ring-4 hover:ring-primary-400/40 hover:bg-white/10" aria-label="Truy cập ngay www.edu.vanphuccare.vn"></span>
			</a>
		</div>
	</section>

	<!-- =========================================================================
	     2. GIỚI THIỆU: HÀNH TRÌNH CÙNG MẸ - TRẢI ĐẦY YÊU THƯƠNG
	     ========================================================================= -->
	<section id="gioi-thieu" class="py-12 sm:py-20 lg:py-24 bg-[#F8F8F8] px-5 sm:px-6 lg:px-8">
		<div class="vpc-container max-w-[1280px] mx-auto p-0">
			<div class="grid grid-cols-1 lg:grid-cols-12 gap-6 lg:gap-12 xl:gap-16 items-center">
				
				<!-- Content & Value Props matching Figma (Mobile order: 1, Desktop order: 2) -->
				<div class="lg:col-span-6 flex flex-col space-y-5 lg:pl-2 order-1 lg:order-2">
					<div class="hidden lg:block">
						<span class="inline-flex items-center gap-1.5 px-4 py-1.5 rounded-full border border-[#FDA4AF] text-[#1A77BA] bg-[#FFF1F2] font-semibold text-xs tracking-wider uppercase">
							<svg class="w-3.5 h-3.5 text-[#F48283]" viewBox="0 0 24 24" fill="currentColor">
								<path d="M12 0l2.5 8.5L23 11l-8.5 2.5L12 22l-2.5-8.5L1 11l8.5-2.5L12 0z"/>
							</svg>
							VAN PHÚC CARE
						</span>
					</div>

					<h2 class="font-heading text-center lg:text-left text-[32px] sm:text-4xl lg:text-[44px] xl:text-[46px] leading-[36px] sm:leading-tight tracking-tight">
						<span class="text-[#1A77BA] font-semibold">Hành Trình Cùng Mẹ</span><br>
						<span class="text-[#F48283] font-semibold">Trải Đầy Yêu Thương</span>
					</h2>

					<p class="text-[#292929] text-center lg:text-left text-sm sm:text-base font-normal leading-6">
						Được thành lập từ năm 2021, Vạn Phúc Care là hệ sinh thái chăm sóc Mẹ và Bé toàn diện, tận tâm và đáng tin cậy cho mọi gia đình.
					</p>

					<!-- Checklist points matching Figma with blue check badge -->
					<ul class="space-y-3 pt-1 text-sm sm:text-base font-normal text-[#292929]">
						<li class="flex items-center gap-3">
							<svg class="w-5 h-5 text-[#1A77BA] shrink-0 fill-current" viewBox="0 0 24 24">
								<path d="M10.23 2.14a1.5 1.5 0 0 1 1.54 0l1.35.87c.36.23.8.32 1.23.25l1.58-.26a1.5 1.5 0 0 1 1.7 1.23l.36 1.57c.1.42.36.78.73 1.01l1.37.84a1.5 1.5 0 0 1 .6 2.02l-.76 1.43c-.2.38-.25.83-.14 1.26l.4 1.55a1.5 1.5 0 0 1-.95 1.79l-1.52.54c-.41.15-.74.45-.92.85l-.67 1.46a1.5 1.5 0 0 1-1.87.8l-1.55-.45a1.8 1.8 0 0 0-1.02 0l-1.55.45a1.5 1.5 0 0 1-1.87-.8l-.67-1.46a1.8 1.8 0 0 0-.92-.85l-1.52-.54a1.5 1.5 0 0 1-.95-1.79l.4-1.55c.11-.43.06-.88-.14-1.26l-.76-1.43a1.5 1.5 0 0 1 .6-2.02l1.37-.84c.37-.23.63-.59.73-1.01l.36-1.57a1.5 1.5 0 0 1 1.7-1.23l1.58.26c.43.07.87-.02 1.23-.25l1.35-.87zm-1.03 12.36l5.5-5.5-1.4-1.4-4.1 4.1-1.9-1.9-1.4 1.4 3.3 3.3z"/>
							</svg>
							<span>Liệu trình chuẩn y khoa, cá nhân hóa theo từng bé</span>
						</li>
						<li class="flex items-center gap-3">
							<svg class="w-5 h-5 text-[#1A77BA] shrink-0 fill-current" viewBox="0 0 24 24">
								<path d="M10.23 2.14a1.5 1.5 0 0 1 1.54 0l1.35.87c.36.23.8.32 1.23.25l1.58-.26a1.5 1.5 0 0 1 1.7 1.23l.36 1.57c.1.42.36.78.73 1.01l1.37.84a1.5 1.5 0 0 1 .6 2.02l-.76 1.43c-.2.38-.25.83-.14 1.26l.4 1.55a1.5 1.5 0 0 1-.95 1.79l-1.52.54c-.41.15-.74.45-.92.85l-.67 1.46a1.5 1.5 0 0 1-1.87.8l-1.55-.45a1.8 1.8 0 0 0-1.02 0l-1.55.45a1.5 1.5 0 0 1-1.87-.8l-.67-1.46a1.8 1.8 0 0 0-.92-.85l-1.52-.54a1.5 1.5 0 0 1-.95-1.79l.4-1.55c.11-.43.06-.88-.14-1.26l-.76-1.43a1.5 1.5 0 0 1 .6-2.02l1.37-.84c.37-.23.63-.59.73-1.01l.36-1.57a1.5 1.5 0 0 1 1.7-1.23l1.58.26c.43.07.87-.02 1.23-.25l1.35-.87zm-1.03 12.36l5.5-5.5-1.4-1.4-4.1 4.1-1.9-1.9-1.4 1.4 3.3 3.3z"/>
							</svg>
							<span>100% đội ngũ điều dưỡng, hộ sinh chuyên môn cao, giàu kinh nghiệm</span>
						</li>
						<li class="flex items-center gap-3">
							<svg class="w-5 h-5 text-[#1A77BA] shrink-0 fill-current" viewBox="0 0 24 24">
								<path d="M10.23 2.14a1.5 1.5 0 0 1 1.54 0l1.35.87c.36.23.8.32 1.23.25l1.58-.26a1.5 1.5 0 0 1 1.7 1.23l.36 1.57c.1.42.36.78.73 1.01l1.37.84a1.5 1.5 0 0 1 .6 2.02l-.76 1.43c-.2.38-.25.83-.14 1.26l.4 1.55a1.5 1.5 0 0 1-.95 1.79l-1.52.54c-.41.15-.74.45-.92.85l-.67 1.46a1.5 1.5 0 0 1-1.87.8l-1.55-.45a1.8 1.8 0 0 0-1.02 0l-1.55.45a1.5 1.5 0 0 1-1.87-.8l-.67-1.46a1.8 1.8 0 0 0-.92-.85l-1.52-.54a1.5 1.5 0 0 1-.95-1.79l.4-1.55c.11-.43.06-.88-.14-1.26l-.76-1.43a1.5 1.5 0 0 1 .6-2.02l1.37-.84c.37-.23.63-.59.73-1.01l.36-1.57a1.5 1.5 0 0 1 1.7-1.23l1.58.26c.43.07.87-.02 1.23-.25l1.35-.87zm-1.03 12.36l5.5-5.5-1.4-1.4-4.1 4.1-1.9-1.9-1.4 1.4 3.3 3.3z"/>
							</svg>
							<span>Đồng hành toàn diện cùng bé những năm đầu đời</span>
						</li>
					</ul>

					<!-- 3 Stats Counter Single Card matching Figma -->
					<div class="rounded-xl border border-[#F8F8F8] bg-white p-3 sm:p-5 shadow-[0px_1px_5px_rgba(0,0,0,0.15)]">
						<div class="grid grid-cols-3 divide-x divide-[#CECECE] text-center">
							<div class="px-1.5 sm:px-4">
								<div class="font-bold text-base sm:text-xl text-[#292929] leading-snug">5+ Năm</div>
								<div class="text-[11px] sm:text-[13px] text-[#525252] mt-1">Kinh nghiệm</div>
							</div>
							<div class="px-1.5 sm:px-4">
								<div class="font-bold text-base sm:text-xl text-[#292929] leading-snug">8+ Dịch vụ</div>
								<div class="text-[11px] sm:text-[13px] text-[#525252] mt-1">Chăm sóc toàn diện</div>
							</div>
							<div class="px-1.5 sm:px-4">
								<div class="font-bold text-base sm:text-xl text-[#292929] leading-snug">5000+ Khách</div>
								<div class="text-[11px] sm:text-[13px] text-[#525252] mt-1">Sử dụng dịch vụ</div>
							</div>
						</div>
					</div>

					<!-- Button 'Tìm Hiểu Thêm' matching Figma (full-width on mobile) -->
					<div class="pt-2 w-full lg:w-auto flex justify-center lg:justify-start">
						<a href="#gioi-thieu" class="w-full sm:w-auto h-10 px-8 rounded-full border border-[#F48283] text-[#F48283] hover:bg-[#FDE6E6]/60 font-medium text-xs sm:text-base flex items-center justify-center transition-colors">
							<span>Tìm Hiểu Thêm</span>
						</a>
					</div>
				</div>

				<!-- Visual Asset (Nurse, Mother, Baby in Crib + 2 Floating Badges) (Mobile order: 2, Desktop order: 1) -->
				<div class="lg:col-span-6 relative flex justify-center lg:justify-start order-2 lg:order-1 pt-4 lg:pt-0">
					<div class="relative w-full max-w-[350px] sm:max-w-[540px] mx-auto">
						<picture>
							<source srcset="<?php echo esc_url( $theme_uri . '/assets/images/sec2_visual_card.webp?v=3' ); ?>" type="image/webp">
							<img src="<?php echo esc_url( $theme_uri . '/assets/images/sec2_visual_card.png?v=3' ); ?>" 
							     alt="Hành trình cùng mẹ trải đầy yêu thương - Vạn Phúc Care" 
							     width="896" 
							     height="812" 
							     class="w-full h-auto object-contain block transition-transform duration-300 hover:scale-[1.01]" 
							     loading="lazy" />
						</picture>
					</div>
				</div>

			</div>
		</div>
	</section>

	<!-- =========================================================================
	     3. DỊCH VỤ Ở CỮ (An Tâm Nghỉ Dưỡng, Ở Cữ Chuẩn Y Khoa)
	     ========================================================================= -->
	<section id="trung-tam-o-cu" class="relative py-12 lg:py-24 px-5 sm:px-8 xl:px-20 overflow-hidden" style="background: linear-gradient(100.79deg, #F8F8F8 41.11%, #D1E4F1 152.08%);">
		<div class="max-w-[1280px] mx-auto flex flex-col items-center gap-6 sm:gap-10">
			
			<!-- Section Header Badge & Titles (Frame 2147224020) -->
			<div class="flex flex-col items-center gap-3 sm:gap-5 text-center w-full max-w-[1000px]">
				<!-- Badge -->
				<div class="inline-flex items-center justify-center gap-2 px-3.5 py-1.5 bg-[#FDE6E6] border border-[#F48283] rounded-full">
					<svg width="20" height="20" viewBox="0 0 24 24" fill="none" class="w-4 h-4 text-[#F48283] shrink-0">
						<path d="M12 2L13.8 8.6L20.4 10.4L13.8 12.2L12 18.8L10.2 12.2L3.6 10.4L10.2 8.6L12 2Z" fill="currentColor"/>
					</svg>
					<span class="font-sans font-medium text-xs sm:text-sm text-[#155F95] tracking-wider uppercase">DỊCH VỤ Ở CỮ</span>
				</div>

				<!-- Main Heading -->
				<h2 class="font-heading font-semibold text-[32px] sm:text-4xl lg:text-[48px] leading-[36px] sm:leading-tight">
					<span class="text-[#1A77BA]">An Tâm Nghỉ Dưỡng, </span><br class="sm:hidden"><span class="text-[#F48283]">Ở Cữ Chuẩn Y Khoa</span>
				</h2>

				<!-- Subtitle -->
				<p class="font-sans font-medium text-sm sm:text-base text-[#292929] leading-6 max-w-3xl">
					Vượt qua những định kiến kiêng cữ khắt khe, mẹ được nâng niu chăm sóc và tận hưởng trọn vẹn hành trình làm mẹ thiêng liêng.
				</p>
			</div>

			<!-- Room Visual Showcase (Rectangle 34624347) -->
			<div class="w-full max-w-[1240px] rounded-[24px] overflow-hidden border border-[#E7E9EC] shadow-[0px_4px_47px_rgba(0,0,0,0.01)] bg-neutral-100">
				<img src="<?php echo esc_url( $theme_uri . '/assets/images/auco_room_1240x670.jpg' ); ?>" 
				     alt="Không gian phòng nghỉ dưỡng Vạn Phúc Care" 
				     class="w-full h-auto aspect-[350/220] sm:aspect-[1240/670] object-cover block"
				     loading="lazy" />
			</div>

			<!-- Middle 2-Column Info Row (Frame 2147224019) -->
			<div class="w-full max-w-[1230px] flex flex-col lg:flex-row justify-between items-center lg:items-start gap-6 lg:gap-12 xl:gap-[120px] pt-2">
				<!-- Left Column -->
				<div class="max-w-[685px] flex flex-col gap-3 sm:gap-6 text-center lg:text-left">
					<h3 class="font-heading font-normal text-2xl sm:text-3xl lg:text-[40px] leading-snug lg:leading-[52px] text-[#292929]">
						Tĩnh dưỡng thảnh thơi<br>Mẹ khỏe mạnh - Con vững vàng
					</h3>
					<p class="font-sans font-medium text-sm sm:text-base text-[#292929] leading-6 text-center lg:text-justify">
						Gạt bỏ mọi áp lực và nỗi lo làm mẹ, tận hưởng không gian nghỉ dưỡng cao cấp cùng dịch vụ chăm sóc chuẩn y khoa, giúp mẹ hồi phục sức khỏe nhanh chóng và an tâm bên bé yêu.
					</p>
				</div>

				<!-- Right Column (3 checklist items) -->
				<div class="flex flex-col gap-4 sm:gap-6 shrink-0 w-full lg:w-auto pt-1 lg:pt-3">
					<div class="flex items-center gap-3">
						<svg class="w-5 h-5 text-[#F48283] shrink-0" viewBox="0 0 24 24" fill="currentColor">
							<path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
						</svg>
						<span class="font-sans font-medium text-base text-[#292929]">An toàn và theo dõi sức khỏe</span>
					</div>

					<div class="flex items-center gap-3">
						<svg class="w-5 h-5 text-[#F48283] shrink-0" viewBox="0 0 24 24" fill="currentColor">
							<path d="M12 2L4 5v6.09c0 5.05 3.41 9.76 8 10.91 4.59-1.15 8-5.86 8-10.91V5l-8-3z"/>
							<path d="M9.5 12l2 2 4.5-4.5" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
						</svg>
						<span class="font-sans font-medium text-base text-[#292929]">An toàn cho sức khỏe</span>
					</div>

					<div class="flex items-center gap-3">
						<svg class="w-5 h-5 text-[#F48283] shrink-0" viewBox="0 0 24 24" fill="currentColor">
							<path d="M12 3L2 12h3v8h14v-8h3L12 3z"/>
							<path d="M12 15.5l-.6-.55C9.8 13.5 8.5 12.3 8.5 10.8c0-1.1.9-2 2-2 .7 0 1.3.3 1.5.8.2-.5.8-.8 1.5-.8 1.1 0 2 .9 2 2 0 1.5-1.3 2.7-2.9 4.15l-.6.55z" fill="#FFFFFF"/>
						</svg>
						<span class="font-sans font-medium text-base text-[#292929]">Tiện nghi đẳng cấp</span>
					</div>
				</div>
			</div>

			<!-- White Highlights Card (Frame 2147224015) -->
			<div class="w-full max-w-[1280px] bg-[#FAFAFA] sm:bg-white rounded-xl shadow-[0px_1px_5px_rgba(0,0,0,0.15)] p-4 sm:py-6 sm:px-6 lg:px-10">
				<div class="grid grid-cols-1 sm:grid-cols-3 divide-y sm:divide-y-0 sm:divide-x divide-[#E1E1E1] gap-3 sm:gap-0">
					<!-- Card 1 -->
					<div class="flex items-center gap-4 py-2 sm:py-0 sm:px-6 first:sm:pl-0 bg-white sm:bg-transparent rounded-lg sm:rounded-none p-3 sm:p-0 shadow-[0_1px_4px_rgba(0,0,0,0.08)] sm:shadow-none">
						<div class="w-[50px] h-[50px] rounded-full bg-[#FDE6E6] flex items-center justify-center shrink-0">
							<svg class="w-6 h-6 text-[#F48283]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
								<circle cx="12" cy="12" r="9"/>
								<path d="M12 7v10"/>
								<path d="M7 12h10"/>
								<circle cx="12" cy="12" r="3" fill="currentColor"/>
							</svg>
						</div>
						<div>
							<h4 class="font-heading font-semibold text-lg sm:text-[20px] text-[#1A77BA] leading-snug mb-0.5">Phục hồi chuyên sâu</h4>
							<p class="font-sans font-normal text-xs sm:text-base text-[#525252]">Tận hưởng hành trình làm mẹ</p>
						</div>
					</div>

					<!-- Card 2 -->
					<div class="flex items-center gap-4 py-2 sm:py-0 sm:px-6 bg-white sm:bg-transparent rounded-lg sm:rounded-none p-3 sm:p-0 shadow-[0_1px_4px_rgba(0,0,0,0.08)] sm:shadow-none">
						<div class="w-[50px] h-[50px] rounded-full bg-[#FDE6E6] flex items-center justify-center shrink-0">
							<svg class="w-6 h-6 text-[#F48283]" viewBox="0 0 24 24" fill="currentColor">
								<path d="M12 2l2.9 6.26L21.8 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.9-1.01L12 2z"/>
							</svg>
						</div>
						<div>
							<h4 class="font-heading font-semibold text-lg sm:text-[20px] text-[#1A77BA] leading-snug mb-0.5">Không gian tiện nghi</h4>
							<p class="font-sans font-normal text-xs sm:text-base text-[#525252]">View hồ Tây đẳng cấp</p>
						</div>
					</div>

					<!-- Card 3 -->
					<div class="flex items-center gap-4 py-2 sm:py-0 sm:px-6 last:sm:pr-0 bg-white sm:bg-transparent rounded-lg sm:rounded-none p-3 sm:p-0 shadow-[0_1px_4px_rgba(0,0,0,0.08)] sm:shadow-none">
						<div class="w-[50px] h-[50px] rounded-full bg-[#FDE6E6] flex items-center justify-center shrink-0">
							<svg class="w-6 h-6 text-[#F48283]" viewBox="0 0 24 24" fill="currentColor">
								<path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
								<path d="M12 7v4l2.5 1.5" stroke="#FFFFFF" stroke-width="1.8" stroke-linecap="round" fill="none"/>
							</svg>
						</div>
						<div>
							<h4 class="font-heading font-semibold text-lg sm:text-[20px] text-[#1A77BA] leading-snug mb-0.5">Phòng dưỡng nhi 24/7</h4>
							<p class="font-sans font-normal text-xs sm:text-base text-[#525252]">Môi trường chăm sóc riêng biệt</p>
						</div>
					</div>
				</div>
			</div>

			<!-- Action Buttons (Frame 2147224016) -->
			<div class="flex flex-col sm:flex-row justify-center items-center gap-3 w-full sm:w-auto mt-1">
				<button data-open-modal="vpc-consultation-modal" class="w-full sm:w-auto h-10 px-8 bg-[#1A77BA] hover:bg-[#155F95] text-[#FAFAFA] font-sans font-medium text-xs sm:text-base rounded-full shadow-xs transition-colors flex items-center justify-center cursor-pointer">
					Đăng ký tư vấn
				</button>
				<button data-open-modal="vpc-consultation-modal" class="w-full sm:w-auto h-10 px-8 border border-[#F48283] hover:bg-[#FDE6E6]/40 text-[#F48283] font-sans font-medium text-xs sm:text-base rounded-full transition-colors flex items-center justify-center cursor-pointer">
					Xem chi tiết
				</button>
			</div>

		</div>
	</section>

	<!-- =========================================================================
	     4. DỊCH VỤ BẢO MẪU TẠI NHÀ (Bảo Mẫu Tại Nhà, Chăm Bé Chuẩn Y Khoa)
	     ========================================================================= -->
	<section id="bao-mau-tai-nha" class="relative py-12 lg:py-24 px-5 sm:px-8 xl:px-20 overflow-hidden" style="background: linear-gradient(248.77deg, #F8F8F8 48.06%, #FDE6E6 129.02%);">
		<div class="max-w-[1240px] mx-auto">
			<div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 xl:gap-16 items-center">
				
				<!-- Images: 2 overlapping photos matching Figma -->
				<div class="relative flex items-center justify-center w-full order-1">
					<div class="relative w-full max-w-[350px] sm:max-w-[420px] lg:max-w-[480px] h-[342px] sm:h-[400px] lg:h-[460px] mx-auto">
						<!-- Left Photo -->
						<div class="absolute left-0 top-0 w-[170px] sm:w-[200px] lg:w-[230px] h-[210px] sm:h-[250px] lg:h-[290px] rounded-xl overflow-hidden shadow-[0_2.3px_10.2px_rgba(0,0,0,0.09)]">
							<img src="<?php echo esc_url( $theme_uri . '/assets/images/home_care_feed.jpg' ); ?>" 
							     alt="Bảo mẫu chăm sóc bé tại nhà - Vạn Phúc Care" 
							     class="w-full h-full object-cover block" 
							     loading="lazy" />
						</div>
						<!-- Right Photo (Staggered down) -->
						<div class="absolute right-0 top-[38px] sm:top-[45px] lg:top-[50px] w-[170px] sm:w-[200px] lg:w-[230px] h-[273px] sm:h-[320px] lg:h-[370px] rounded-xl overflow-hidden shadow-[0_2.3px_10.2px_rgba(0,0,0,0.09)]">
							<img src="<?php echo esc_url( $theme_uri . '/assets/images/home_care_bed.jpg' ); ?>" 
							     alt="Bảo mẫu tận tâm chăm sóc giấc ngủ của bé" 
							     class="w-full h-full object-cover block" 
							     loading="lazy" />
						</div>
					</div>
				</div>

				<!-- Content -->
				<div class="flex flex-col items-center lg:items-start text-center lg:text-left w-full order-2 gap-5 sm:gap-6">
					<!-- Badge -->
					<div class="inline-flex items-center justify-center gap-2 px-3.5 py-1.5 bg-[#FDE6E6] border border-[#F48283] rounded-full">
						<svg width="20" height="20" viewBox="0 0 24 24" fill="none" class="w-4 h-4 text-[#F48283] shrink-0">
							<path d="M12 2L13.8 8.6L20.4 10.4L13.8 12.2L12 18.8L10.2 12.2L3.6 10.4L10.2 8.6L12 2Z" fill="currentColor"/>
						</svg>
						<span class="font-sans font-medium text-xs sm:text-sm text-[#155F95] tracking-wider uppercase">DỊCH VỤ BẢO MẪU</span>
					</div>

					<!-- Heading -->
					<div class="flex flex-col">
						<h2 class="font-heading font-semibold text-[32px] sm:text-4xl lg:text-[44px] leading-[36px] sm:leading-tight text-[#1A77BA]">
							Bảo Mẫu Tại Nhà,
						</h2>
						<h3 class="font-heading font-semibold text-[32px] sm:text-4xl lg:text-[44px] leading-[36px] sm:leading-tight text-[#F48283]">
							Chăm Bé Chuẩn Y Khoa
						</h3>
					</div>

					<!-- Subtitle -->
					<p class="font-sans font-medium text-sm sm:text-base text-[#292929] leading-6 max-w-[540px]">
						Sau sinh mẹ cần thời gian để nghỉ ngơi, hồi phục sức khỏe. Sử dụng dịch vụ bảo mẫu tại nhà là giải pháp tối ưu, giúp mẹ giải quyết những nỗi lo về công việc chăm sóc trẻ sơ sinh.
					</p>

					<!-- 2 Feature Cards -->
					<div class="w-full flex flex-col gap-3 max-w-[540px]">
						<!-- Card 1 -->
						<div class="bg-white rounded-xl shadow-[0px_1px_5px_rgba(0,0,0,0.15)] p-3 sm:p-4 flex items-center gap-3.5 text-left">
							<div class="w-[50px] h-[50px] rounded-full bg-[#FDE6E6] flex items-center justify-center shrink-0">
								<svg class="w-6 h-6 text-[#F48283]" viewBox="0 0 24 24" fill="currentColor">
									<!-- Left foot -->
									<g transform="translate(0, 2) rotate(-10 7.5 13)">
										<path d="M8.2 11.5c-.8-.8-2-.9-3-.4-1.3.7-1.8 2.2-1.4 3.7.4 1.7 1.5 2.8 2.8 2.5 1.2-.2 1.8-1.2 2-2.3.2-1.3.1-2.6-.4-3.5z"/>
										<circle cx="8.6" cy="9.5" r="1.15"/>
										<circle cx="7.0" cy="8.9" r="0.9"/>
										<circle cx="5.4" cy="9.0" r="0.8"/>
										<circle cx="4.0" cy="9.6" r="0.7"/>
										<circle cx="2.9" cy="10.6" r="0.6"/>
									</g>
									<!-- Right foot -->
									<g transform="translate(2, -1.5) rotate(12 16 11)">
										<path d="M15.8 9.5c.8-.8 2-.9 3-.4 1.3.7 1.8 2.2 1.4 3.7-.4 1.7-1.5 2.8-2.8 2.5-1.2-.2-1.8-1.2-2-2.3-.2-1.3-.1-2.6.4-3.5z"/>
										<circle cx="15.4" cy="7.5" r="1.15"/>
										<circle cx="17.0" cy="6.9" r="0.9"/>
										<circle cx="18.6" cy="7.0" r="0.8"/>
										<circle cx="20.0" cy="7.6" r="0.7"/>
										<circle cx="21.1" cy="8.6" r="0.6"/>
									</g>
								</svg>
							</div>
							<div>
								<h4 class="font-sans font-semibold text-base sm:text-[18px] text-[#1A77BA] leading-snug">Đa dạng gói chăm sóc trẻ sơ sinh</h4>
								<p class="font-sans font-normal text-xs sm:text-[14px] text-[#525252] leading-relaxed">Thoải mái lựa chọn phù hợp với nhu cầu từng gia đình</p>
							</div>
						</div>

						<!-- Card 2 -->
						<div class="bg-white rounded-xl shadow-[0px_1px_5px_rgba(0,0,0,0.15)] p-3 sm:p-4 flex items-center gap-3.5 text-left">
							<div class="w-[50px] h-[50px] rounded-full bg-[#FDE6E6] flex items-center justify-center shrink-0">
								<svg class="w-6 h-6 text-[#F48283]" viewBox="0 0 24 24" fill="currentColor">
									<path d="M4 9C7.5 7.2 16.5 7.2 20 9L18.4 14.5H5.6L4 9Z" />
									<rect x="5" y="16" width="14" height="2.2" rx="1.1" fill="currentColor" />
									<path d="M11 9.8H13V11.2H14.4V12.8H13V14.2H11V12.8H9.6V11.2H11V9.8Z" fill="white" />
								</svg>
							</div>
							<div>
								<h4 class="font-sans font-semibold text-base sm:text-[18px] text-[#1A77BA] leading-snug">Bảo mẫu/ điều dưỡng chuyên môn cao</h4>
								<p class="font-sans font-normal text-xs sm:text-[14px] text-[#525252] leading-relaxed">Bé được chăm sóc tận tình, cá nhân hóa chuẩn y khoa</p>
							</div>
						</div>
					</div>

					<!-- Action Buttons -->
					<div class="flex flex-col sm:flex-row justify-center lg:justify-start items-center gap-3 w-full sm:w-auto pt-1">
						<button data-open-modal="vpc-consultation-modal" class="w-full sm:w-auto h-10 px-8 bg-[#1A77BA] hover:bg-[#155F95] text-[#FAFAFA] font-sans font-medium text-xs sm:text-base rounded-full shadow-xs transition-colors flex items-center justify-center cursor-pointer">
							Đăng Ký Tư Vấn
						</button>
						<button data-open-modal="vpc-consultation-modal" class="w-full sm:w-auto h-10 px-8 border border-[#F48283] hover:bg-[#FDE6E6]/40 text-[#F48283] font-sans font-medium text-xs sm:text-base rounded-full transition-colors flex items-center justify-center cursor-pointer">
							Xem Chi Tiết
						</button>
					</div>

				</div>

			</div>
		</div>
	</section>

	<!-- =========================================================================
	     5. LỚP HỌC TIỀN SẢN (Chưa Sẵn Sàng Làm Mẹ ? Hãy Bắt Đầu Từ Lớp Tiền Sản)
	     ========================================================================= -->
	<section id="lop-hoc-tien-san" class="relative py-12 lg:py-24 px-5 sm:px-8 xl:px-12 bg-white overflow-hidden" style="background: linear-gradient(244.09deg, #F8F8F8 58.32%, #D1E4F1 145.78%);">
		<div class="max-w-[1240px] mx-auto">
			<div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 xl:gap-16 items-center">
				
				<!-- Left 2-Photo Composition (50% width, staggered 2-column layout matching Figma) -->
				<div class="relative flex items-center justify-center w-full">
					<div class="grid grid-cols-2 gap-4 sm:gap-5 items-start w-full max-w-[350px] sm:max-w-[540px] mx-auto lg:max-w-none">
						<!-- Left Photo (Top-aligned) -->
						<div class="relative w-full">
							<img src="<?php echo esc_url( $theme_uri . '/assets/images/easy_class_1.webp' ); ?>" 
							     alt="Chăm sóc bé sơ sinh tại lớp học tiền sản Vạn Phúc Care" 
							     class="w-full h-auto aspect-[316/388] object-cover rounded-[20px] shadow-[0_10px_30px_rgba(0,0,0,0.06)] block" 
							     loading="lazy" />
						</div>
						<!-- Right Photo (Staggered down) -->
						<div class="relative w-full pt-8 sm:pt-12 lg:pt-14">
							<img src="<?php echo esc_url( $theme_uri . '/assets/images/easy_class_2.webp' ); ?>" 
							     alt="Tư vấn và giải đáp thắc mắc cùng điều dưỡng Vạn Phúc Care" 
							     class="w-full h-auto aspect-[314/521] object-cover rounded-[20px] shadow-[0_10px_30px_rgba(0,0,0,0.06)] block" 
							     loading="lazy" />
						</div>
					</div>
				</div>

				<!-- Right Content (50% width) -->
				<div class="flex flex-col items-center lg:items-start text-center lg:text-left w-full">
					<!-- Badge -->
					<div class="inline-flex items-center gap-2 px-3.5 py-1.5 bg-[#FDE6E6] border border-[#F48283] rounded-full mb-2.5 sm:mb-3">
						<svg width="18" height="18" viewBox="0 0 24 24" fill="none" class="w-4 h-4 text-[#F48283] shrink-0">
							<path d="M12 2L13.8 8.6L20.4 10.4L13.8 12.2L12 18.8L10.2 12.2L3.6 10.4L10.2 8.6L12 2Z" fill="currentColor"/>
						</svg>
						<span class="font-sans font-medium text-xs sm:text-sm text-[#155F95] tracking-wider uppercase">LỚP HỌC TIỀN SẢN</span>
					</div>

					<!-- Heading -->
					<div class="flex flex-col mb-3">
						<h2 class="font-heading font-semibold text-[32px] sm:text-4xl lg:text-[44px] leading-[36px] sm:leading-tight text-[#1A77BA]">
							Chưa Sẵn Sàng Làm Mẹ ?
						</h2>
						<h3 class="font-heading font-semibold text-[32px] sm:text-4xl lg:text-[44px] leading-[36px] sm:leading-tight text-[#F48283]">
							Hãy Bắt Đầu Từ Lớp Tiền Sản
						</h3>
					</div>

					<!-- Subtitle -->
					<p class="font-sans font-normal text-sm sm:text-base text-[#292929] leading-relaxed max-w-[540px] text-left w-full mb-4">
						Lộ trình học tập đi qua 8 Module chuyên sâu trong 01 buổi học, giúp cha mẹ tự tin trên hành trình mang thai và sau sinh hiểu rõ hành trình sau sinh.
					</p>

					<!-- Checklist -->
					<div class="w-full max-w-[540px] flex flex-col gap-3 mb-5 text-left items-start">
						<p class="font-sans font-medium text-base sm:text-lg text-[#292929] text-left w-full">
							Cha mẹ học được những gì:
						</p>
						<div class="w-full flex flex-col gap-3.5 sm:gap-4 items-start">
							<div class="flex items-center gap-3.5 text-left w-full">
								<svg class="w-6 h-6 shrink-0 text-[#1A77BA]" viewBox="0 0 24 24" fill="currentColor">
									<path d="M12 1L9.27 2.94 6 2.67l-.78 3.24L2.27 7.7l.88 3.19L1 13.56l2.39 2.33-.27 3.32 3.24.78 1.79 2.95 3.19-.88 2.66 2.15 2.33-2.39 3.32.27.78-3.24 2.95-1.79-.88-3.19L23 10.44l-2.39-2.33.27-3.32-3.24-.78L15.85 1.06 12.66 1.94 12 1z"/>
									<path d="M8.5 12.2l2.2 2.2 4.8-4.8" stroke="#FFFFFF" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
								</svg>
								<span class="font-sans font-medium text-base text-[#292929] leading-snug">Phần 1: Thai kỳ an toàn &amp; Vượt cạn chủ động</span>
							</div>
							<div class="flex items-center gap-3.5 text-left w-full">
								<svg class="w-6 h-6 shrink-0 text-[#1A77BA]" viewBox="0 0 24 24" fill="currentColor">
									<path d="M12 1L9.27 2.94 6 2.67l-.78 3.24L2.27 7.7l.88 3.19L1 13.56l2.39 2.33-.27 3.32 3.24.78 1.79 2.95 3.19-.88 2.66 2.15 2.33-2.39 3.32.27.78-3.24 2.95-1.79-.88-3.19L23 10.44l-2.39-2.33.27-3.32-3.24-.78L15.85 1.06 12.66 1.94 12 1z"/>
									<path d="M8.5 12.2l2.2 2.2 4.8-4.8" stroke="#FFFFFF" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
								</svg>
								<span class="font-sans font-medium text-base text-[#292929] leading-snug">Phần 2: Nền tảng sữa mẹ &amp; Đọc vị nhu cầu của bé</span>
							</div>
							<div class="flex items-center gap-3.5 text-left w-full">
								<svg class="w-6 h-6 shrink-0 text-[#1A77BA]" viewBox="0 0 24 24" fill="currentColor">
									<path d="M12 1L9.27 2.94 6 2.67l-.78 3.24L2.27 7.7l.88 3.19L1 13.56l2.39 2.33-.27 3.32 3.24.78 1.79 2.95 3.19-.88 2.66 2.15 2.33-2.39 3.32.27.78-3.24 2.95-1.79-.88-3.19L23 10.44l-2.39-2.33.27-3.32-3.24-.78L15.85 1.06 12.66 1.94 12 1z"/>
									<path d="M8.5 12.2l2.2 2.2 4.8-4.8" stroke="#FFFFFF" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
								</svg>
								<span class="font-sans font-medium text-base text-[#292929] leading-snug">Phần 3: Thực hành kỹ năng thiết yếu &amp; Chăm sóc trẻ sơ sinh</span>
							</div>
						</div>
					</div>

					<!-- 4 Info Cards -->
					<div class="w-full flex flex-col gap-2.5 sm:gap-3 mb-5 text-left">
						<!-- Row 1: 2 cols -->
						<div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5 sm:gap-3">
							<!-- Card 1 -->
							<div class="bg-white rounded-xl border border-[#EBEBEB] shadow-[0px_1px_5px_rgba(0,0,0,0.15)] p-3 sm:px-3.5 sm:py-2.5 flex items-center gap-3">
								<div class="w-[50px] h-[50px] rounded-full bg-[#FDE6E6] flex items-center justify-center shrink-0">
									<svg class="w-6 h-6 text-[#F48283]" viewBox="0 0 24 24" fill="none">
										<path d="M12 3a9 9 0 0 0-7.7 4.3L3 6v4h4L5.6 8.6A7.2 7.2 0 1 1 4.8 12h-1.8A9 9 0 1 0 12 3z" fill="#F48283"/>
										<circle cx="12" cy="12" r="5" fill="#F48283"/>
										<path d="M12 9.5V12l1.8 1.1" stroke="#FFFFFF" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
									</svg>
								</div>
								<div>
									<h4 class="font-sans font-semibold text-lg text-[#1A77BA] leading-snug">Thời gian</h4>
									<p class="font-sans font-normal text-xs sm:text-[13px] text-[#525252] leading-snug">Khung giờ từ 9:00 - 12:00</p>
								</div>
							</div>

							<!-- Card 2 -->
							<div class="bg-white rounded-xl border border-[#EBEBEB] shadow-[0px_1px_5px_rgba(0,0,0,0.15)] p-3 sm:px-3.5 sm:py-2.5 flex items-center gap-3">
								<div class="w-[50px] h-[50px] rounded-full bg-[#FDE6E6] flex items-center justify-center shrink-0">
									<svg class="w-6 h-6 text-[#F48283]" viewBox="0 0 24 24" fill="currentColor">
										<path d="M19 4h-1V2h-2v2H8V2H6v2H5c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h7.1c-.1-.3-.1-.7-.1-1 0-3.3 2.7-6 6-6 .3 0 .7 0 1 .1V6c0-1.1-.9-2-2-2zm0 6H5V7h14v3z"/>
										<path d="M18 13c-2.8 0-5 2.2-5 5s2.2 5 5 5 5-2.2 5-5-2.2-5-5-5zm1.5 6.5l-2-1.5V15h1v2.5l1.5 1.1-.5.9z"/>
									</svg>
								</div>
								<div>
									<h4 class="font-sans font-semibold text-lg text-[#1A77BA] leading-snug">Thời lượng</h4>
									<p class="font-sans font-normal text-xs sm:text-[13px] text-[#525252] leading-snug">3 giờ/ 1 buổi</p>
								</div>
							</div>
						</div>

						<!-- Card 3 -->
						<div class="bg-white rounded-xl border border-[#EBEBEB] shadow-[0px_1px_5px_rgba(0,0,0,0.15)] p-3 sm:px-3.5 sm:py-2.5 flex items-center gap-3 w-full">
							<div class="w-[50px] h-[50px] rounded-full bg-[#FDE6E6] flex items-center justify-center shrink-0">
								<svg class="w-6 h-6 text-[#F48283]" viewBox="0 0 24 24" fill="currentColor">
									<path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
								</svg>
							</div>
							<div>
								<h4 class="font-sans font-semibold text-lg text-[#1A77BA] leading-snug">Hình thức</h4>
								<p class="font-sans font-normal text-xs sm:text-[13px] text-[#525252] leading-snug">Workshop thực hành trực tiếp offline tại tầng 1- Vạn Phúc Care</p>
							</div>
						</div>

						<!-- Card 4 -->
						<div class="bg-white rounded-xl border border-[#EBEBEB] shadow-[0px_1px_5px_rgba(0,0,0,0.15)] p-3 sm:px-3.5 sm:py-2.5 flex items-center gap-3 w-full">
							<div class="w-[50px] h-[50px] rounded-full bg-[#FDE6E6] flex items-center justify-center shrink-0">
								<svg class="w-6 h-[18px]" viewBox="0 0 24 18" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M10.5 18C10.5 18 9 18 9 16.5C9 15 10.5 10.5 16.5 10.5C22.5 10.5 24 15 24 16.5C24 18 22.5 18 22.5 18H10.5ZM16.5 9C17.6935 9 18.8381 8.52589 19.682 7.68198C20.5259 6.83807 21 5.69347 21 4.5C21 3.30653 20.5259 2.16193 19.682 1.31802C18.8381 0.474106 17.6935 0 16.5 0C15.3065 0 14.1619 0.474106 13.318 1.31802C12.4741 2.16193 12 3.30653 12 4.5C12 5.69347 12.4741 6.83807 13.318 7.68198C14.1619 8.52589 15.3065 9 16.5 9Z" fill="#F48283"/>
									<path d="M7.824 18C7.60163 17.5317 7.49074 17.0183 7.5 16.5C7.5 14.4675 8.52 12.375 10.404 10.92C9.46364 10.6303 8.48392 10.4886 7.5 10.5C1.5 10.5 0 15 0 16.5C0 18 1.5 18 1.5 18H7.824Z" fill-rule="evenodd" clip-rule="evenodd" fill="#F48283"/>
									<path d="M6.75 9C7.74456 9 8.69839 8.60491 9.40165 7.90165C10.1049 7.19839 10.5 6.24456 10.5 5.25C10.5 4.25544 10.1049 3.30161 9.40165 2.59835C8.69839 1.89509 7.74456 1.5 6.75 1.5C5.75544 1.5 4.80161 1.89509 4.09835 2.59835C3.39509 3.30161 3 4.25544 3 5.25C3 6.24456 3.39509 7.19839 4.09835 7.90165C4.80161 8.60491 5.75544 9 6.75 9Z" fill="#F48283"/>
								</svg>
							</div>
							<div>
								<h4 class="font-sans font-semibold text-lg text-[#1A77BA] leading-snug">Số lượng tham gia</h4>
								<p class="font-sans font-normal text-xs sm:text-[13px] text-[#525252] leading-snug">Tối đa 05 cặp bố mẹ (hoặc dưới 10 người) /buổi</p>
							</div>
						</div>
					</div>

					<!-- Buttons -->
					<div class="flex flex-col sm:flex-row items-center gap-3 w-full sm:w-auto pt-1">
						<button data-open-modal="vpc-consultation-modal" class="w-full sm:w-auto h-10 px-8 bg-[#1A77BA] hover:bg-[#155F95] text-white font-sans font-medium text-xs sm:text-base rounded-full shadow-xs transition-colors flex items-center justify-center cursor-pointer">
							Đăng Ký Tư Vấn
						</button>
						<button data-open-modal="vpc-consultation-modal" class="w-full sm:w-auto h-10 px-8 border border-[#F48283] hover:bg-[#FDE6E6]/40 text-[#F48283] font-sans font-medium text-xs sm:text-base rounded-full transition-colors flex items-center justify-center cursor-pointer">
							Xem Chi Tiết
						</button>
					</div>

				</div>

			</div>
		</div>
	</section>

	<!-- =========================================================================
	     5. KHÓA HỌC TRỰC TUYẾN (Khoá Học Làm Mẹ, Nuôi con không áp lực)
	     ========================================================================= -->
	<section id="khoa-hoc-truc-tuyen" class="relative py-16 sm:py-20 lg:py-24 px-4 sm:px-6 lg:px-8 bg-[#F8F8F8]">
		<div id="dao-tao-easy" class="absolute -top-24"></div>
		<div class="max-w-[1280px] mx-auto flex flex-col items-center">
			
			<!-- Badge -->
			<div class="inline-flex items-center gap-2 px-4 py-2 bg-[#FDE6E6] border border-[#F48283] rounded-full mb-4">
				<svg width="20" height="20" viewBox="614 105 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 sm:w-5 sm:h-5 text-[#F48283] shrink-0">
					<path d="M620.369 121.626C620.656 121.339 621.123 121.339 621.411 121.626C621.698 121.914 621.698 122.381 621.411 122.669L619.953 124.126C619.666 124.414 619.198 124.414 618.911 124.126C618.623 123.839 618.623 123.372 618.911 123.084L620.369 121.626ZM630.589 121.626C630.876 121.339 631.343 121.339 631.63 121.626L633.089 123.084C633.376 123.372 633.376 123.839 633.089 124.126C632.801 124.414 632.335 124.414 632.047 124.126L630.589 122.669C630.301 122.381 630.301 121.914 630.589 121.626ZM618.911 109.95C619.198 109.662 619.666 109.662 619.953 109.95L621.411 111.408C621.698 111.696 621.698 112.162 621.411 112.45C621.123 112.738 620.657 112.738 620.369 112.45L618.911 110.993C618.623 110.705 618.623 110.238 618.911 109.95ZM632.047 109.95C632.335 109.663 632.801 109.662 633.089 109.95C633.376 110.238 633.376 110.705 633.089 110.993L631.63 112.45C631.343 112.738 630.876 112.738 630.589 112.45C630.301 112.162 630.301 111.696 630.589 111.408L632.047 109.95Z" fill="currentColor"/>
					<path d="M634.772 117.655C634.366 117.66 634.031 117.335 634.026 116.928C634.02 116.522 634.346 116.187 634.753 116.181L637.253 116.147C637.66 116.141 637.994 116.467 638 116.874C638.005 117.281 637.68 117.615 637.273 117.621L634.772 117.655ZM625.889 109.013C625.483 109.019 625.148 108.693 625.143 108.287L625.109 105.787C625.104 105.38 625.429 105.046 625.836 105.04C626.242 105.035 626.577 105.36 626.582 105.767L626.617 108.266C626.622 108.673 626.296 109.008 625.889 109.013ZM614.747 117.929C614.34 117.935 614.006 117.61 614 117.203C613.994 116.796 614.32 116.462 614.727 116.456L617.226 116.422C617.633 116.416 617.968 116.741 617.973 117.148C617.979 117.555 617.653 117.889 617.247 117.895L614.747 117.929ZM625.855 128.96C625.448 128.965 625.114 128.64 625.108 128.233L625.075 125.733C625.069 125.326 625.394 124.992 625.801 124.986C626.208 124.981 626.543 125.306 626.548 125.713L626.582 128.212C626.588 128.619 626.262 128.954 625.855 128.96Z" fill="currentColor"/>
					<path d="M625.273 123.277C625.471 123.723 626.104 123.725 626.306 123.281L628.075 119.385C628.132 119.26 628.232 119.16 628.357 119.103L632.233 117.354C632.677 117.153 632.677 116.523 632.233 116.322L628.357 114.573C628.232 114.516 628.132 114.416 628.075 114.291L626.306 110.395C626.104 109.951 625.471 109.953 625.273 110.399L623.545 114.287C623.488 114.415 623.386 114.517 623.259 114.574L619.35 116.321C618.903 116.521 618.903 117.155 619.35 117.355L623.259 119.102C623.386 119.159 623.488 119.262 623.545 119.389L625.273 123.277Z" fill="currentColor"/>
				</svg>
				<span class="font-sans font-medium text-xs sm:text-sm text-[#155F95] tracking-wider uppercase">KHÓA HỌC TRỰC TUYẾN</span>
			</div>

			<!-- Heading -->
			<h2 class="font-heading text-[32px] sm:text-4xl lg:text-[44px] leading-[36px] sm:leading-[1.25] text-center mb-8 sm:mb-12">
				<span class="text-[#1A77BA] block font-semibold">Khoá Học Làm Mẹ,</span>
				<span class="text-[#F48283] block font-semibold mt-1">Nuôi con không còn áp lực</span>
			</h2>

			<!-- 4 Cards Grid -->
			<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 w-full mb-8 sm:mb-12">
				
				<!-- Card 1 -->
				<div class="bg-white rounded-xl sm:rounded-[20px] p-4 sm:p-7 shadow-[0px_1px_5px_rgba(0,0,0,0.15)] border border-[#EDEDED] flex flex-col items-center text-center transition-all duration-300 hover:shadow-[0_12px_32px_rgba(26,119,186,0.08)] hover:-translate-y-1">
					<div class="w-12 h-12 rounded-full bg-[#FDE6E6] flex items-center justify-center shrink-0 mb-3 sm:mb-5">
						<svg class="w-6 h-6 text-[#F48283]" viewBox="216 334 26 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M239.534 335.333H218.489C217.673 335.333 217 336.001 217 336.811V340.244V355.189C217 355.999 217.673 356.667 218.489 356.667H239.51C240.327 356.667 240.999 355.999 240.999 355.189V338.742V336.811C241.023 336.001 240.351 335.333 239.534 335.333ZM226.225 338.075C226.225 338.408 225.961 338.671 225.624 338.671H225C224.663 338.671 224.399 338.408 224.399 338.075C224.399 337.741 224.663 337.479 225 337.479H225.624C225.961 337.479 226.225 337.741 226.225 338.075ZM223.582 338.075C223.582 338.408 223.318 338.671 222.982 338.671H222.357C222.021 338.671 221.757 338.408 221.757 338.075C221.757 337.741 222.021 337.479 222.357 337.479H222.982C223.318 337.479 223.582 337.741 223.582 338.075ZM220.94 338.075C220.94 338.408 220.676 338.671 220.339 338.671H219.715C219.378 338.671 219.114 338.408 219.114 338.075C219.114 337.741 219.378 337.479 219.715 337.479H220.339C220.676 337.479 220.94 337.741 220.94 338.075ZM239.534 355.475H218.489C218.321 355.475 218.201 355.332 218.201 355.189V340.84H226.297C226.681 340.84 227.066 340.697 227.33 340.434L228.483 339.409C228.555 339.362 228.627 339.314 228.723 339.314H239.822V355.165C239.822 355.356 239.678 355.475 239.534 355.475ZM237.084 346.56C237.084 346.87 236.891 347.132 236.603 347.252L229.252 349.731C229.18 349.754 229.084 349.778 229.012 349.778C228.94 349.778 228.844 349.778 228.771 349.731L221.444 347.252C221.156 347.156 220.964 346.87 220.964 346.56C220.964 346.25 221.156 345.988 221.444 345.869L228.771 343.414C228.916 343.366 229.084 343.366 229.228 343.414L236.579 345.893C236.867 345.988 237.084 346.25 237.084 346.56ZM229.612 350.851L235.378 348.92V351.161C235.378 352.615 231.919 352.925 229.012 352.925C227.642 352.948 226.273 352.829 224.928 352.639C223.847 352.448 222.621 352.114 222.621 351.185V348.92L228.387 350.875C228.579 350.946 228.771 350.97 228.988 350.97C229.204 350.97 229.42 350.922 229.612 350.851Z" fill="currentColor"/>
						</svg>
					</div>
					<h3 class="font-sans font-bold text-lg sm:text-[19px] text-[#1A77BA] mb-2">
						Học mọi lúc, mọi nơi
					</h3>
					<p class="font-sans text-xs sm:text-sm text-[#525252] leading-relaxed">
						Chủ động học trực tuyến trên mọi thiết bị, linh hoạt theo thời gian biểu của ba mẹ
					</p>
				</div>

				<!-- Card 2 -->
				<div class="bg-white rounded-xl sm:rounded-[20px] p-4 sm:p-7 shadow-[0px_1px_5px_rgba(0,0,0,0.15)] border border-[#EDEDED] flex flex-col items-center text-center transition-all duration-300 hover:shadow-[0_12px_32px_rgba(26,119,186,0.08)] hover:-translate-y-1">
					<div class="w-12 h-12 rounded-full bg-[#FDE6E6] flex items-center justify-center shrink-0 mb-3 sm:mb-5">
						<svg class="w-6 h-6 text-[#F48283]" viewBox="543 336 26 21" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M544.876 351.444V339.625C544.465 339.735 544.054 339.87 543.667 339.992V354.913C546.914 354.004 550.364 354.184 553.501 355.428C551.369 353.243 548.465 352.012 545.433 352.008C545.128 352.001 544.883 351.752 544.876 351.444Z" fill="currentColor"/>
							<path d="M546.014 336.4L545.977 350.941C549.538 351.128 552.859 352.817 555.135 355.6V341.733C553.057 338.637 549.698 336.673 546.014 336.4Z" fill="currentColor"/>
							<path d="M566.457 339.649V351.456C566.451 351.765 566.205 352.013 565.901 352.02C562.876 352.023 559.978 353.255 557.856 355.441V355.453C560.983 354.205 564.425 354.015 567.667 354.913V340.017C567.28 339.882 566.88 339.747 566.457 339.649Z" fill="currentColor"/>
							<path d="M565.368 336.4C561.669 336.646 558.292 338.615 556.223 341.733V355.6C558.496 352.82 561.812 351.131 565.368 350.941V336.4Z" fill="currentColor"/>
						</svg>
					</div>
					<h3 class="font-sans font-bold text-lg sm:text-[19px] text-[#1A77BA] mb-2">
						Tài liệu học trọn đời
					</h3>
					<p class="font-sans text-xs sm:text-sm text-[#525252] leading-relaxed">
						Sở hữu cẩm nang chăm sóc chuẩn y khoa được cập nhật liên tục và lưu trữ vĩnh viễn
					</p>
				</div>

				<!-- Card 3 -->
				<div class="bg-white rounded-xl sm:rounded-[20px] p-4 sm:p-7 shadow-[0px_1px_5px_rgba(0,0,0,0.15)] border border-[#EDEDED] flex flex-col items-center text-center transition-all duration-300 hover:shadow-[0_12px_32px_rgba(26,119,186,0.08)] hover:-translate-y-1">
					<div class="w-12 h-12 rounded-full bg-[#FDE6E6] flex items-center justify-center shrink-0 mb-3 sm:mb-5">
						<svg class="w-6 h-6 text-[#F48283]" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
							<path d="M12 1.5a.9.9 0 0 1 .9.9v1.2a.9.9 0 1 1-1.8 0V2.4a.9.9 0 0 1 .9-.9zm-6.2 3.8a.9.9 0 0 1 1.27 0l.85.85a.9.9 0 1 1-1.27 1.27l-.85-.85a.9.9 0 0 1 0-1.27zm12.4 0a.9.9 0 0 1 0 1.27l-.85.85a.9.9 0 1 1-1.27-1.27l.85-.85a.9.9 0 0 1 1.27 0zM3 11a.9.9 0 0 1 .9-.9h1.2a.9.9 0 1 1 0 1.8H3.9A.9.9 0 0 1 3 11zm15 0a.9.9 0 0 1 .9-.9h1.2a.9.9 0 1 1 0 1.8h-1.2a.9.9 0 0 1-.9-.9z"/>
							<path d="M12 4.5a4.2 4.2 0 0 0-3.08 7.07c.45.48.75 1.08.75 1.83h4.66c0-.75.3-1.35.75-1.83A4.2 4.2 0 0 0 12 4.5zm-1.4 10.4h2.8v.9h-2.8v-.9z"/>
							<path d="M5.5 14h2v7.5h-2zm3 4h3.2c.8 0 1.4.6 1.4 1.4s-.6 1.4-1.4 1.4H8.5V18zm0-2h3.8c1 0 1.9.8 1.9 1.8 0 .34-.1.66-.27.93l2.4-1.2c.43-.22.95-.04 1.17.39.22.43.04.95-.39 1.17l-3.7 1.85c-.47.24-1 .36-1.54.36H8.5V16z"/>
						</svg>
					</div>
					<h3 class="font-sans font-bold text-lg sm:text-[19px] text-[#1A77BA] mb-2">
						Kiến thức thực chiến
					</h3>
					<p class="font-sans text-xs sm:text-sm text-[#525252] leading-relaxed">
						Video hướng dẫn trực quan từng bước dễ dàng thực hành và áp dụng ngay tại nhà
					</p>
				</div>

				<!-- Card 4 -->
				<div class="bg-white rounded-xl sm:rounded-[20px] p-4 sm:p-7 shadow-[0px_1px_5px_rgba(0,0,0,0.15)] border border-[#EDEDED] flex flex-col items-center text-center transition-all duration-300 hover:shadow-[0_12px_32px_rgba(26,119,186,0.08)] hover:-translate-y-1">
					<div class="w-12 h-12 rounded-full bg-[#FDE6E6] flex items-center justify-center shrink-0 mb-3 sm:mb-5">
						<svg class="w-6 h-6 text-[#F48283]" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
							<path d="M9.5 3h12a1 1 0 0 1 1 1v9.5a1 1 0 0 1-1 1h-12a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1zm1.5 2.5h8v1.5h-8V5.5zm0 3h5.5V10H11V8.5z"/>
							<circle cx="5.5" cy="6" r="2.5"/>
							<path d="M5.5 10c-2.2 0-4 1.8-4 4v5.5h7.5v-4.8l3.3-2.2c.38-.25.48-.76.23-1.14-.25-.38-.76-.48-1.14-.23L9 12.8A3.98 3.98 0 0 0 5.5 10z"/>
						</svg>
					</div>
					<h3 class="font-sans font-bold text-lg sm:text-[19px] text-[#1A77BA] mb-2">
						Giảng viên tận tâm
					</h3>
					<p class="font-sans text-xs sm:text-sm text-[#525252] leading-relaxed">
						Đội ngũ chuyên gia và điều dưỡng giàu kinh nghiệm, đồng hành giải đáp mọi thắc mắc
					</p>
				</div>

			</div>

			<!-- CTA Button -->
			<div class="w-full sm:w-auto flex justify-center">
				<button data-open-modal="vpc-consultation-modal" 
				        class="w-full sm:w-auto h-10 px-8 sm:px-10 bg-[#1A77BA] hover:bg-[#155F95] active:bg-[#124b77] text-white font-sans font-medium text-xs sm:text-base rounded-full shadow-xs transition-all duration-200 flex items-center justify-center cursor-pointer">
					Học Thử Miễn Phí
				</button>
			</div>

		</div>
	</section>

	<!-- =========================================================================
	     7. VÌ SAO BẠN NÊN CHỌN VẠN PHÚC CARE (Desktop - 24)
	     ========================================================================= -->
	<section id="vi-sao-chon-van-phuc" class="relative py-12 sm:py-16 lg:py-20 px-5 sm:px-6 lg:px-8 xl:px-16 overflow-hidden" style="background: linear-gradient(59.1deg, #F8F8F8 66.82%, #D1E4F1 146.55%);">
		<div class="max-w-[1280px] mx-auto flex flex-col items-center gap-8 sm:gap-12 lg:gap-14">
			
			<!-- Top Section Header -->
			<div class="flex flex-col items-center text-center max-w-[860px] mx-auto gap-3 sm:gap-4">
				<!-- Badge -->
				<div class="inline-flex items-center justify-center gap-2 px-3.5 py-1.5 bg-[#FDE6E6] border border-[#F48283] rounded-full">
					<svg width="20" height="20" viewBox="0 0 24 24" fill="none" class="w-4 h-4 text-[#F48283] shrink-0">
						<path d="M12 2L13.8 8.6L20.4 10.4L13.8 12.2L12 18.8L10.2 12.2L3.6 10.4L10.2 8.6L12 2Z" fill="currentColor"/>
					</svg>
					<span class="font-sans font-medium text-xs sm:text-sm text-[#155F95] tracking-wider uppercase">BẠN ĐỒNG HÀNH CỦA BA MẸ</span>
				</div>

				<!-- Main Heading -->
				<h2 class="font-heading font-semibold text-[32px] sm:text-4xl lg:text-[48px] leading-[36px] sm:leading-[1.25] text-center">
					<span class="text-[#1A77BA]">Vì sao bạn nên chọn </span><br class="sm:hidden"><span class="text-[#F48283] whitespace-nowrap">Vạn Phúc Care</span>
				</h2>

				<!-- Subtitle -->
				<p class="font-sans font-medium text-sm sm:text-base text-[#292929] leading-6 max-w-[540px]">
					Không chỉ đơn thuần là dịch vụ chăm sóc sức khỏe, Vạn Phúc Care là người bạn đồng hành đáng tin cậy, cam kết mang đến sự an toàn, chuyên nghiệp và an tâm trọn vẹn cho mọi gia đình.
				</p>
			</div>

			<!-- Middle Content Block: Center Image first on mobile, then 4 Features -->
			<div class="w-full flex flex-col lg:flex-row items-center justify-between gap-6 lg:gap-6 xl:gap-12">
				
				<!-- Center Image (Mobile order: 1, Desktop order: 2) -->
				<div class="w-full max-w-[350px] sm:max-w-[480px] shrink-0 mx-auto flex justify-center items-center order-1 lg:order-2">
					<img src="<?php echo esc_url( $theme_uri . '/assets/images/image copy 2.png' ); ?>" 
					     alt="Vì sao bạn nên chọn Vạn Phúc Care" 
					     class="w-full h-auto object-contain block" 
					     loading="lazy" />
				</div>

				<!-- Left 2 Features (Mobile order: 2, Desktop order: 1) -->
				<div class="w-full lg:w-[320px] xl:w-[335px] shrink-0 flex flex-col gap-5 sm:gap-8 order-2 lg:order-1">
					<!-- Feature 1: Đồng hành -->
					<div class="flex flex-col gap-2">
						<div class="flex items-center gap-2.5">
							<svg class="w-5 h-5 shrink-0" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M23.7581 12.21C24.0806 11.8392 24.0806 11.2874 23.7581 10.9166L21.8639 8.7382C21.6875 8.53535 21.6016 8.26925 21.6261 8.00154L21.8898 5.12294C21.9349 4.63126 21.6092 4.18212 21.1279 4.07217L18.3402 3.43534C18.0754 3.37485 17.8473 3.20779 17.7098 2.9736L16.2496 0.487107C15.9977 0.0581615 15.4656 -0.115834 15.0089 0.0813893L12.3913 1.21186C12.1419 1.31956 11.8591 1.31956 11.6097 1.21186L8.99098 0.0809135C8.53478 -0.116106 8.00325 0.0573117 7.75102 0.48547L6.29208 2.96198C6.154 3.19637 5.92519 3.36326 5.65983 3.42314L2.8757 4.0514C2.3932 4.16028 2.06613 4.60993 2.11114 5.10251L2.3751 7.99144C2.3995 8.25846 2.31405 8.5239 2.13846 8.72654L0.240724 10.9167C-0.0806752 11.2876 -0.0801875 11.8385 0.241868 12.2089L2.13723 14.3885C2.31357 14.5913 2.39946 14.8573 2.375 15.1249L2.11093 18.0151C2.06601 18.5067 2.3917 18.9557 2.87294 19.0656L5.6616 19.7027C5.92591 19.7631 6.15368 19.9297 6.29129 20.1633L7.74991 22.6392C8.00262 23.0682 8.53555 23.2413 8.99213 23.0428L11.6088 21.905C11.8587 21.7964 12.1424 21.796 12.3926 21.904L15.01 23.0344C15.4662 23.2314 15.9978 23.058 16.25 22.6299L17.7097 20.152C17.8473 19.9184 18.0751 19.7518 18.3394 19.6914L21.1279 19.0544C21.6092 18.9445 21.9349 18.4953 21.8898 18.0037L21.6261 15.125C21.6016 14.8573 21.6875 14.5912 21.8639 14.3884L23.7581 12.21ZM10.1697 16.5689C9.99977 16.7403 9.72282 16.7403 9.55293 16.569L6.42685 13.4167C5.97218 12.9583 5.97267 12.2188 6.42793 11.761C6.88801 11.2983 7.63697 11.2991 8.09604 11.7628L9.6754 13.358C9.77778 13.4614 9.94485 13.4614 10.0473 13.3581L15.5799 7.77477C16.0392 7.31132 16.7881 7.31068 17.2481 7.77335C17.7035 8.23131 17.704 8.9709 17.2492 9.42949L10.1697 16.5689Z" fill="#F48283"/>
							</svg>
							<h3 class="font-sans font-semibold text-lg text-[#292929]">Đồng hành</h3>
						</div>
						<p class="font-sans font-normal text-xs sm:text-[13.5px] text-[#525252] leading-relaxed">
							Đồng hành chăm sóc mẹ và bé từ thai kỳ đến 24 tháng đầu đời, lưu giữ mọi kỷ niệm và cột mốc quan trọng trong sổ sức khỏe điện tử chuyên nghiệp.
						</p>
					</div>

					<!-- Feature 2: An toàn -->
					<div class="flex flex-col gap-2">
						<div class="flex items-center gap-2.5">
							<svg class="w-5 h-5 shrink-0" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M23.7581 12.21C24.0806 11.8392 24.0806 11.2874 23.7581 10.9166L21.8639 8.7382C21.6875 8.53535 21.6016 8.26925 21.6261 8.00154L21.8898 5.12294C21.9349 4.63126 21.6092 4.18212 21.1279 4.07217L18.3402 3.43534C18.0754 3.37485 17.8473 3.20779 17.7098 2.9736L16.2496 0.487107C15.9977 0.0581615 15.4656 -0.115834 15.0089 0.0813893L12.3913 1.21186C12.1419 1.31956 11.8591 1.31956 11.6097 1.21186L8.99098 0.0809135C8.53478 -0.116106 8.00325 0.0573117 7.75102 0.48547L6.29208 2.96198C6.154 3.19637 5.92519 3.36326 5.65983 3.42314L2.8757 4.0514C2.3932 4.16028 2.06613 4.60993 2.11114 5.10251L2.3751 7.99144C2.3995 8.25846 2.31405 8.5239 2.13846 8.72654L0.240724 10.9167C-0.0806752 11.2876 -0.0801875 11.8385 0.241868 12.2089L2.13723 14.3885C2.31357 14.5913 2.39946 14.8573 2.375 15.1249L2.11093 18.0151C2.06601 18.5067 2.3917 18.9557 2.87294 19.0656L5.6616 19.7027C5.92591 19.7631 6.15368 19.9297 6.29129 20.1633L7.74991 22.6392C8.00262 23.0682 8.53555 23.2413 8.99213 23.0428L11.6088 21.905C11.8587 21.7964 12.1424 21.796 12.3926 21.904L15.01 23.0344C15.4662 23.2314 15.9978 23.058 16.25 22.6299L17.7097 20.152C17.8473 19.9184 18.0751 19.7518 18.3394 19.6914L21.1279 19.0544C21.6092 18.9445 21.9349 18.4953 21.8898 18.0037L21.6261 15.125C21.6016 14.8573 21.6875 14.5912 21.8639 14.3884L23.7581 12.21ZM10.1697 16.5689C9.99977 16.7403 9.72282 16.7403 9.55293 16.569L6.42685 13.4167C5.97218 12.9583 5.97267 12.2188 6.42793 11.761C6.88801 11.2983 7.63697 11.2991 8.09604 11.7628L9.6754 13.358C9.77778 13.4614 9.94485 13.4614 10.0473 13.3581L15.5799 7.77477C16.0392 7.31132 16.7881 7.31068 17.2481 7.77335C17.7035 8.23131 17.704 8.9709 17.2492 9.42949L10.1697 16.5689Z" fill="#F48283"/>
							</svg>
							<h3 class="font-sans font-semibold text-lg text-[#292929]">An toàn</h3>
						</div>
						<p class="font-sans font-normal text-xs sm:text-[13.5px] text-[#525252] leading-relaxed">
							Cam kết dịch vụ chăm sóc hoàn hảo, ứng dụng phương pháp khoa học hiện đại, đảm bảo sự an toàn và chăm sóc tốt nhất cho bé yêu của bạn.
						</p>
					</div>
				</div>

				<!-- Right 2 Features (Mobile order: 3, Desktop order: 3) -->
				<div class="w-full lg:w-[320px] xl:w-[335px] shrink-0 flex flex-col gap-5 sm:gap-8 order-3 lg:order-3">
					<!-- Feature 3: Tin cậy -->
					<div class="flex flex-col gap-2">
						<div class="flex items-center gap-2.5">
							<svg class="w-5 h-5 shrink-0" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M23.7581 12.21C24.0806 11.8392 24.0806 11.2874 23.7581 10.9166L21.8639 8.7382C21.6875 8.53535 21.6016 8.26925 21.6261 8.00154L21.8898 5.12294C21.9349 4.63126 21.6092 4.18212 21.1279 4.07217L18.3402 3.43534C18.0754 3.37485 17.8473 3.20779 17.7098 2.9736L16.2496 0.487107C15.9977 0.0581615 15.4656 -0.115834 15.0089 0.0813893L12.3913 1.21186C12.1419 1.31956 11.8591 1.31956 11.6097 1.21186L8.99098 0.0809135C8.53478 -0.116106 8.00325 0.0573117 7.75102 0.48547L6.29208 2.96198C6.154 3.19637 5.92519 3.36326 5.65983 3.42314L2.8757 4.0514C2.3932 4.16028 2.06613 4.60993 2.11114 5.10251L2.3751 7.99144C2.3995 8.25846 2.31405 8.5239 2.13846 8.72654L0.240724 10.9167C-0.0806752 11.2876 -0.0801875 11.8385 0.241868 12.2089L2.13723 14.3885C2.31357 14.5913 2.39946 14.8573 2.375 15.1249L2.11093 18.0151C2.06601 18.5067 2.3917 18.9557 2.87294 19.0656L5.6616 19.7027C5.92591 19.7631 6.15368 19.9297 6.29129 20.1633L7.74991 22.6392C8.00262 23.0682 8.53555 23.2413 8.99213 23.0428L11.6088 21.905C11.8587 21.7964 12.1424 21.796 12.3926 21.904L15.01 23.0344C15.4662 23.2314 15.9978 23.058 16.25 22.6299L17.7097 20.152C17.8473 19.9184 18.0751 19.7518 18.3394 19.6914L21.1279 19.0544C21.6092 18.9445 21.9349 18.4953 21.8898 18.0037L21.6261 15.125C21.6016 14.8573 21.6875 14.5912 21.8639 14.3884L23.7581 12.21ZM10.1697 16.5689C9.99977 16.7403 9.72282 16.7403 9.55293 16.569L6.42685 13.4167C5.97218 12.9583 5.97267 12.2188 6.42793 11.761C6.88801 11.2983 7.63697 11.2991 8.09604 11.7628L9.6754 13.358C9.77778 13.4614 9.94485 13.4614 10.0473 13.3581L15.5799 7.77477C16.0392 7.31132 16.7881 7.31068 17.2481 7.77335C17.7035 8.23131 17.704 8.9709 17.2492 9.42949L10.1697 16.5689Z" fill="#F48283"/>
							</svg>
							<h3 class="font-sans font-semibold text-lg text-[#292929]">Tin cậy</h3>
						</div>
						<p class="font-sans font-normal text-xs sm:text-[13.5px] text-[#525252] leading-relaxed">
							Vạn Phúc Care tự hào là thương hiệu uy tín, sở hữu đội ngũ điều dưỡng chuyên môn cao, cùng các liệu trình chăm sóc khoa học, mang lại sự yên tâm tuyệt đối.
						</p>
					</div>

					<!-- Feature 4: Chuyên nghiệp -->
					<div class="flex flex-col gap-2">
						<div class="flex items-center gap-2.5">
							<svg class="w-5 h-5 shrink-0" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M23.7581 12.21C24.0806 11.8392 24.0806 11.2874 23.7581 10.9166L21.8639 8.7382C21.6875 8.53535 21.6016 8.26925 21.6261 8.00154L21.8898 5.12294C21.9349 4.63126 21.6092 4.18212 21.1279 4.07217L18.3402 3.43534C18.0754 3.37485 17.8473 3.20779 17.7098 2.9736L16.2496 0.487107C15.9977 0.0581615 15.4656 -0.115834 15.0089 0.0813893L12.3913 1.21186C12.1419 1.31956 11.8591 1.31956 11.6097 1.21186L8.99098 0.0809135C8.53478 -0.116106 8.00325 0.0573117 7.75102 0.48547L6.29208 2.96198C6.154 3.19637 5.92519 3.36326 5.65983 3.42314L2.8757 4.0514C2.3932 4.16028 2.06613 4.60993 2.11114 5.10251L2.3751 7.99144C2.3995 8.25846 2.31405 8.5239 2.13846 8.72654L0.240724 10.9167C-0.0806752 11.2876 -0.0801875 11.8385 0.241868 12.2089L2.13723 14.3885C2.31357 14.5913 2.39946 14.8573 2.375 15.1249L2.11093 18.0151C2.06601 18.5067 2.3917 18.9557 2.87294 19.0656L5.6616 19.7027C5.92591 19.7631 6.15368 19.9297 6.29129 20.1633L7.74991 22.6392C8.00262 23.0682 8.53555 23.2413 8.99213 23.0428L11.6088 21.905C11.8587 21.7964 12.1424 21.796 12.3926 21.904L15.01 23.0344C15.4662 23.2314 15.9978 23.058 16.25 22.6299L17.7097 20.152C17.8473 19.9184 18.0751 19.7518 18.3394 19.6914L21.1279 19.0544C21.6092 18.9445 21.9349 18.4953 21.8898 18.0037L21.6261 15.125C21.6016 14.8573 21.6875 14.5912 21.8639 14.3884L23.7581 12.21ZM10.1697 16.5689C9.99977 16.7403 9.72282 16.7403 9.55293 16.569L6.42685 13.4167C5.97218 12.9583 5.97267 12.2188 6.42793 11.761C6.88801 11.2983 7.63697 11.2991 8.09604 11.7628L9.6754 13.358C9.77778 13.4614 9.94485 13.4614 10.0473 13.3581L15.5799 7.77477C16.0392 7.31132 16.7881 7.31068 17.2481 7.77335C17.7035 8.23131 17.704 8.9709 17.2492 9.42949L10.1697 16.5689Z" fill="#F48283"/>
							</svg>
							<h3 class="font-sans font-semibold text-lg text-[#292929]">Chuyên nghiệp</h3>
						</div>
						<p class="font-sans font-normal text-xs sm:text-[13.5px] text-[#525252] leading-relaxed">
							Dịch vụ cao cấp, hỗ trợ tận tâm rộng khắp Hà Nội và TP.HCM, đảm bảo mang đến sự hài lòng tuyệt đối về chất lượng dịch vụ bằng sự trân trọng và thấu hiểu.
						</p>
					</div>
				</div>

			</div>

			<!-- Bottom 3 Step Cards -->
			<div class="w-full grid grid-cols-1 md:grid-cols-3 gap-6 sm:gap-6 lg:gap-7">
				<!-- Step 1 -->
				<div class="bg-white rounded-2xl p-6 sm:p-7 shadow-[0px_1px_5px_rgba(0,0,0,0.15)] flex flex-col justify-between gap-5 border border-[#F0F0F0] transition-transform duration-200 hover:-translate-y-1">
					<div class="flex items-center justify-between">
						<span class="inline-flex items-center justify-center px-3.5 py-1 bg-[#A3C9E3] border border-[#1A77BA] rounded-full text-xs sm:text-sm font-medium text-[#292929]">Bước 1</span>
						<div class="w-[50px] h-[50px] shrink-0">
							<svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M0 25C0 11.1929 11.1929 0 25 0C38.8071 0 50 11.1929 50 25C50 38.8071 38.8071 50 25 50C11.1929 50 0 38.8071 0 25Z" fill="#FDE6E6"/>
								<path d="M24.2505 14H23.1505C22.8205 12.85 21.7605 12 20.5005 12C19.2405 12 18.1805 12.85 17.8505 14H16.7505C16.3405 14 16.0005 14.34 16.0005 14.75V16.25C16.0005 17.21 16.7905 18 17.7505 18H23.2505C24.2105 18 25.0005 17.21 25.0005 16.25V14.75C25.0005 14.34 24.6605 14 24.2505 14Z" fill="#F48283"/>
								<path d="M26.2505 15H26.0005V16.25C26.0005 17.77 24.7705 19 23.2505 19H17.7505C16.2305 19 15.0005 17.77 15.0005 16.25V15H14.7505C13.2305 15 12.0005 16.23 12.0005 17.75V30.25C12.0005 31.77 13.2305 33 14.7505 33H22.1305L22.3505 31.77C22.4505 31.21 22.7105 30.71 23.1105 30.3L23.9105 29.5H15.7505C15.3405 29.5 15.0005 29.16 15.0005 28.75C15.0005 28.34 15.3405 28 15.7505 28H25.2505C25.3005 28 25.3405 28 25.3905 28.02H25.4005L29.0005 24.42V17.75C29.0005 16.23 27.7705 15 26.2505 15ZM25.2505 26.25H15.7505C15.3405 26.25 15.0005 25.91 15.0005 25.5C15.0005 25.09 15.3405 24.75 15.7505 24.75H25.2505C25.6605 24.75 26.0005 25.09 26.0005 25.5C26.0005 25.91 25.6605 26.25 25.2505 26.25ZM25.2505 23H15.7505C15.3405 23 15.0005 22.66 15.0005 22.25C15.0005 21.84 15.3405 21.5 15.7505 21.5H25.2505C25.6605 21.5 26.0005 21.84 26.0005 22.25C26.0005 22.66 25.6605 23 25.2505 23Z" fill="#F48283"/>
								<path d="M24.5274 36.0001C24.3304 36.0001 24.1384 35.9221 23.9974 35.7801C23.8244 35.6071 23.7464 35.3611 23.7894 35.1191L24.3194 32.1141C24.3454 31.9631 24.4194 31.8231 24.5274 31.7141L31.9524 24.2901C32.8644 23.3761 33.7604 23.6231 34.2504 24.1131L35.4874 25.3501C36.1704 26.0321 36.1704 27.1421 35.4874 27.8251L28.0624 35.2501C27.9544 35.3591 27.8144 35.4321 27.6624 35.4581L24.6574 35.9881C24.6144 35.9961 24.5704 36.0001 24.5274 36.0001Z" fill="#F48283"/>
							</svg>
						</div>
					</div>
					<div class="flex flex-col gap-2">
						<h4 class="font-sans font-medium text-lg sm:text-[20px] text-[#1A77BA] leading-snug">Đăng ký dịch vụ</h4>
						<p class="font-sans font-normal text-xs sm:text-[13.5px] text-[#292929] leading-relaxed text-left">
							Liên hệ trực tiếp hoặc điền form đăng ký, giúp chúng tôi nắm bắt nhu cầu chăm sóc sức khỏe mẹ và bé ngay từ giai đoạn thai kỳ
						</p>
					</div>
				</div>

				<!-- Step 2 -->
				<div class="bg-white rounded-2xl p-6 sm:p-7 shadow-[0px_1px_5px_rgba(0,0,0,0.15)] flex flex-col justify-between gap-5 border border-[#F0F0F0] transition-transform duration-200 hover:-translate-y-1">
					<div class="flex items-center justify-between">
						<span class="inline-flex items-center justify-center px-3.5 py-1 bg-[#A3C9E3] border border-[#1A77BA] rounded-full text-xs sm:text-sm font-medium text-[#292929]">Bước 2</span>
						<div class="w-[50px] h-[50px] shrink-0">
							<svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M0 25C0 11.1929 11.1929 0 25 0C38.8071 0 50 11.1929 50 25C50 38.8071 38.8071 50 25 50C11.1929 50 0 38.8071 0 25Z" fill="#FDE6E6"/>
								<path d="M31.0312 13.3335H25.4062C22.6926 13.3335 20.4844 15.5668 20.4844 18.3113C20.4844 20.8148 22.3212 22.8925 24.7031 23.2384V25.4224C24.7031 25.7099 24.8741 25.9696 25.1371 26.0793C25.3965 26.1888 25.7007 26.1301 25.9034 25.9251L28.5099 23.2891H31.0312C33.7449 23.2891 36 21.0557 36 18.3113C36 15.5668 33.7449 13.3335 31.0312 13.3335ZM25.4062 19.0223C25.0178 19.0223 24.7031 18.7039 24.7031 18.3112C24.7031 17.9185 25.0178 17.6001 25.4062 17.6001C25.7946 17.6001 26.1094 17.9185 26.1094 18.3112C26.1094 18.7039 25.7946 19.0223 25.4062 19.0223ZM28.2188 19.0223C27.8303 19.0223 27.5156 18.7039 27.5156 18.3112C27.5156 17.9185 27.8303 17.6001 28.2188 17.6001C28.6071 17.6001 28.9219 17.9185 28.9219 18.3112C28.9219 18.7039 28.6071 19.0223 28.2188 19.0223ZM31.0312 19.0223C30.6428 19.0223 30.3281 18.7039 30.3281 18.3112C30.3281 17.9185 30.6428 17.6001 31.0312 17.6001C31.4196 17.6001 31.7344 17.9185 31.7344 18.3112C31.7344 18.7039 31.4196 19.0223 31.0312 19.0223Z" fill="#F48283"/>
								<path d="M27.7969 34.6668C28.96 34.6668 29.9062 33.7099 29.9062 32.5335V29.6891C29.9062 29.3828 29.7126 29.1112 29.4256 29.0147L25.2167 27.5925C25.0107 27.5224 24.7855 27.5543 24.6043 27.6751L22.8149 28.8814C20.9197 27.9675 18.671 25.6932 17.7673 23.7765L18.96 21.9668C19.0801 21.7841 19.1104 21.5556 19.0417 21.3473L17.6355 17.0907C17.5401 16.8004 17.2716 16.6046 16.9688 16.6046H14.1094C12.9462 16.6046 12 17.5516 12 18.7279C12 26.921 19.6958 34.6668 27.7969 34.6668Z" fill="#F48283"/>
							</svg>
						</div>
					</div>
					<div class="flex flex-col gap-2">
						<h4 class="font-sans font-medium text-lg sm:text-[20px] text-[#1A77BA] leading-snug">Tư vấn chuyên sâu</h4>
						<p class="font-sans font-normal text-xs sm:text-[13.5px] text-[#292929] leading-relaxed text-left">
							Đội ngũ chuyên viên lắng nghe, giải đáp thắc mắc và đề xuất gói dịch vụ phù hợp nhất với nhu cầu cụ thể của từng gia đình
						</p>
					</div>
				</div>

				<!-- Step 3 -->
				<div class="bg-white rounded-2xl p-6 sm:p-7 shadow-[0px_1px_5px_rgba(0,0,0,0.15)] flex flex-col justify-between gap-5 border border-[#F0F0F0] transition-transform duration-200 hover:-translate-y-1">
					<div class="flex items-center justify-between">
						<span class="inline-flex items-center justify-center px-3.5 py-1 bg-[#A3C9E3] border border-[#1A77BA] rounded-full text-xs sm:text-sm font-medium text-[#292929]">Bước 3</span>
						<div class="w-[50px] h-[50px] shrink-0">
							<svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M0 25C0 11.1929 11.1929 0 25 0C38.8071 0 50 11.1929 50 25C50 38.8071 38.8071 50 25 50C11.1929 50 0 38.8071 0 25Z" fill="#FDE6E6"/>
								<path d="M27.6195 17.7989C27.2319 17.7989 26.9169 17.4839 26.9169 17.0958V12H15.9913C15.6036 12 15.2891 12.315 15.2891 12.7031V22.4241L22.6039 22.4147C23.4205 21.5308 24.4862 20.9589 25.7084 20.9752C26.7861 20.9752 27.8352 21.4088 28.5875 22.1648C28.8139 22.3898 29.1148 22.5141 29.4355 22.5141H29.4383L32.7106 22.508V17.7989H27.6195ZM21.9997 19.0312H18.8014C18.4138 19.0312 18.0988 18.7162 18.0988 18.3281C18.0988 17.94 18.4138 17.625 18.8014 17.625H21.9997C22.3873 17.625 22.7019 17.94 22.7019 18.3281C22.7019 18.7162 22.3873 19.0312 21.9997 19.0312ZM21.9997 16.2188H18.8014C18.4138 16.2188 18.0988 15.9037 18.0988 15.5156C18.0988 15.1275 18.4138 14.8125 18.8014 14.8125H21.9997C22.3873 14.8125 22.7019 15.1275 22.7019 15.5156C22.7019 15.9037 22.3873 16.2188 21.9997 16.2188Z" fill="#F48283"/>
								<path d="M28.5074 29.6631L26.0078 27.1885C25.9168 27.0984 25.7702 27.0986 25.6798 27.1894C25.36 27.51 24.6812 28.1903 24.6812 28.1903C23.725 29.0519 22.6554 29.507 21.5872 29.507C20.9932 29.52 20.3445 29.3507 19.8013 29.0547C18.9609 28.6084 18.5259 27.6484 18.742 26.7184C18.8809 26.0795 19.2686 25.7315 19.7423 25.2634C20.1421 24.8608 20.6591 24.3405 21.1794 23.8206L12.6905 23.8342C12.3024 23.8347 12.0008 24.1502 12.0013 24.5388L12 30.2134C12.0005 30.6016 12.3159 30.9156 12.7045 30.9152L15.923 30.9091L20.6736 35.6439C21.1451 36.1141 21.9054 36.1178 22.3821 35.658C22.8676 35.1888 22.8615 34.4003 22.3961 33.9147L23.3655 34.8803C23.829 35.3477 24.6132 35.3603 25.0908 34.877C25.5666 34.3994 25.5652 33.6269 25.0875 33.1516C25.5656 33.632 26.3531 33.617 26.8134 33.1478C27.2807 32.6847 27.2924 31.8991 26.8101 31.4219C27.273 31.8873 28.0238 31.8892 28.49 31.4622C28.6286 31.3419 28.7308 31.1935 28.7966 31.0281C28.9868 30.5656 28.8748 30.0075 28.5074 29.6631Z" fill="#F48283"/>
								<path d="M35.2599 23.9088L29.4411 23.92C28.7484 23.9214 28.0837 23.6481 27.5934 23.1592C26.5983 22.1561 24.9404 22.1167 23.9448 23.0786C23.029 23.9378 20.9351 26.0599 20.2986 26.6983C20.2021 26.7958 20.1402 26.9125 20.1121 27.0353C20.0427 27.3306 20.1678 27.6574 20.4608 27.813C21.5825 28.4083 22.7594 28.0291 23.74 27.1455L24.7773 26.1006C25.3126 25.4947 26.2553 25.4513 26.8308 26.0247L29.4763 28.6445C30.5843 29.6382 30.552 31.5983 29.3943 32.5399C29.2124 32.6974 29.0122 32.8281 28.7985 32.9299L30.2408 32.9275C32.1063 32.9238 32.5048 31.1313 32.5048 31.1313L35.274 31.1252C35.6621 31.1247 36.0005 30.8092 36.0001 30.4206V24.6105C35.9991 24.2224 35.648 23.9083 35.2599 23.9088Z" fill="#F48283"/>
							</svg>
						</div>
					</div>
					<div class="flex flex-col gap-2">
						<h4 class="font-sans font-medium text-lg sm:text-[20px] text-[#1A77BA] leading-snug">Xác nhận hợp đồng</h4>
						<p class="font-sans font-normal text-xs sm:text-[13.5px] text-[#292929] leading-relaxed text-left">
							Xác nhận thông tin, ký hợp đồng dịch vụ để bắt đầu hành trình chăm sóc mẹ và bé trong suốt giai đoạn đầu đời.
						</p>
					</div>
				</div>
			</div>

		</div>
	</section>

	<!-- =========================================================================
	     8. CẢM NHẬN CỦA KHÁCH HÀNG (Feedback Section)
	     ========================================================================= -->
	<section id="feedback" class="py-14 sm:py-20 bg-[#F8F8F8] overflow-hidden relative">
		<!-- Section Header -->
		<div class="vpc-container text-center mb-10 sm:mb-14">
			<!-- Badge -->
			<div class="inline-flex items-center justify-center gap-2 px-3.5 py-1 bg-[#FDE6E6] border border-[#F48283] rounded-full mb-3 shadow-xs">
				<svg width="20" height="20" viewBox="0 0 24 24" fill="none" class="w-4 h-4 text-[#F48283] shrink-0">
					<path d="M12 2L13.8 8.6L20.4 10.4L13.8 12.2L12 18.8L10.2 12.2L3.6 10.4L10.2 8.6L12 2Z" fill="currentColor"/>
				</svg>
				<span class="font-sans font-medium text-xs sm:text-sm text-[#155F95] tracking-wider uppercase">FEEDBACK</span>
			</div>
			<!-- Title -->
			<h2 class="font-heading font-semibold text-[32px] sm:text-4xl lg:text-[44px] leading-[36px] sm:leading-tight text-center">
				<span class="text-[#1A77BA]">Cảm Nhận </span><br class="sm:hidden">
				<span class="text-[#F48283]">Của Khách Hàng</span>
			</h2>
			<!-- Subtitle -->
			<p class="font-sans font-medium text-sm sm:text-base text-[#292929] leading-6 max-w-3xl mx-auto mt-3">
				Trong hành trình cùng mẹ trải đầy yêu thương, Vạn Phúc Care đã nhận được sự tin yêu của hàng ngàn Mẹ bỉm. Chúng tôi cam kết đồng hành cùng Mẹ và Bé trong 2 năm đầu đời.
			</p>
		</div>

		<!-- Continuous Marquee Testimonials -->
		<div class="relative w-full space-y-5">
			<!-- Subtle fade edge mask on left & right -->
			<div class="pointer-events-none absolute inset-y-0 left-0 w-8 sm:w-20 bg-gradient-to-r from-[#F8F8F8] to-transparent z-10"></div>
			<div class="pointer-events-none absolute inset-y-0 right-0 w-8 sm:w-20 bg-gradient-to-l from-[#F8F8F8] to-transparent z-10"></div>

			<!-- Row 1: Marquee Left -->
			<div class="overflow-hidden w-full py-1">
				<div class="animate-marquee flex gap-5 w-max">
					<!-- Set 1 -->
					<!-- Card 1: Nguyễn Thị Ngọc Trân -->
					<div class="w-[290px] sm:w-[350px] shrink-0 bg-white rounded-2xl p-6 shadow-sm border border-neutral-100 flex flex-col justify-between">
						<div>
							<div class="flex items-start justify-between gap-3">
								<div class="flex items-center gap-3">
									<img src="<?php echo esc_url( $theme_uri . '/assets/images/avatars/customer_1.png' ); ?>" alt="Nguyễn Thị Ngọc Trân" class="w-10 h-10 rounded-full object-cover shrink-0">
									<div>
										<h4 class="font-body font-semibold text-sm text-[#292929] leading-tight">Nguyễn Thị Ngọc Trân</h4>
										<div class="flex items-center gap-1 mt-1.5">
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
										</div>
									</div>
								</div>
								<svg width="23" height="15" viewBox="0 0 23 15" fill="none" class="shrink-0 opacity-80 mt-1">
									<path d="M22.991 5.1184C22.993 5.0591 23 5.0011 23 4.941C23 4.9208 22.997 4.9015 22.997 4.8817C22.997 4.8422 23 4.8031 23 4.7636L22.991 4.7696C22.9 2.1208 20.735 0 18.07 0C15.348 0 13.141 2.2119 13.141 4.941C13.141 7.4308 14.98 9.4847 17.371 9.8262C16.776 11.8001 14.951 13.2362 12.787 13.2362V15C18.313 14.9996 22.804 10.6106 22.991 5.1184Z" fill="#292929"/>
									<path d="M10.204 5.1184C10.206 5.0591 10.213 5.0011 10.213 4.941C10.213 4.9208 10.21 4.9015 10.21 4.8817C10.21 4.8422 10.213 4.8031 10.213 4.7636L10.204 4.7696C10.113 2.1208 7.947 0 5.283 0C2.56 0 0.354 2.2119 0.354 4.941C0.354 7.4308 2.193 9.4847 4.583 9.8262C3.989 11.8001 2.164 13.2362 0 13.2362V15C5.526 14.9996 10.016 10.6106 10.204 5.1184Z" fill="#292929"/>
								</svg>
							</div>
							<div class="w-full h-[1px] bg-[#D8D8D8]/70 my-3.5"></div>
							<p class="font-body text-[13.5px] leading-relaxed text-[#292929] font-normal">
								Đánh giá 5 sao cho dịch vụ tại Vạn Phúc Care, đặc biệt là cô Hạnh, cô Nga. Đúng giờ, nhiệt tình và nhẹ nhàng. Trộm vía bé tắm, ngủ rất ngoan.
							</p>
						</div>
					</div>

					<!-- Card 2: Phạm Thị Thanh Lý -->
					<div class="w-[290px] sm:w-[350px] shrink-0 bg-white rounded-2xl p-6 shadow-sm border border-neutral-100 flex flex-col justify-between">
						<div>
							<div class="flex items-start justify-between gap-3">
								<div class="flex items-center gap-3">
									<img src="<?php echo esc_url( $theme_uri . '/assets/images/avatars/customer_2.png' ); ?>" alt="Phạm Thị Thanh Lý" class="w-10 h-10 rounded-full object-cover shrink-0">
									<div>
										<h4 class="font-body font-semibold text-sm text-[#292929] leading-tight">Phạm Thị Thanh Lý</h4>
										<div class="flex items-center gap-1 mt-1.5">
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
										</div>
									</div>
								</div>
								<svg width="23" height="15" viewBox="0 0 23 15" fill="none" class="shrink-0 opacity-80 mt-1">
									<path d="M22.991 5.1184C22.993 5.0591 23 5.0011 23 4.941C23 4.9208 22.997 4.9015 22.997 4.8817C22.997 4.8422 23 4.8031 23 4.7636L22.991 4.7696C22.9 2.1208 20.735 0 18.07 0C15.348 0 13.141 2.2119 13.141 4.941C13.141 7.4308 14.98 9.4847 17.371 9.8262C16.776 11.8001 14.951 13.2362 12.787 13.2362V15C18.313 14.9996 22.804 10.6106 22.991 5.1184Z" fill="#292929"/>
									<path d="M10.204 5.1184C10.206 5.0591 10.213 5.0011 10.213 4.941C10.213 4.9208 10.21 4.9015 10.21 4.8817C10.21 4.8422 10.213 4.8031 10.213 4.7636L10.204 4.7696C10.113 2.1208 7.947 0 5.283 0C2.56 0 0.354 2.2119 0.354 4.941C0.354 7.4308 2.193 9.4847 4.583 9.8262C3.989 11.8001 2.164 13.2362 0 13.2362V15C5.526 14.9996 10.016 10.6106 10.204 5.1184Z" fill="#292929"/>
								</svg>
							</div>
							<div class="w-full h-[1px] bg-[#D8D8D8]/70 my-3.5"></div>
							<p class="font-body text-[13.5px] leading-relaxed text-[#292929] font-normal">
								Đánh giá 5 sao cho dịch vụ tại Vạn Phúc Care, đặc biệt là cô Hạnh, cô Nga. Đúng giờ, nhiệt tình và nhẹ nhàng. Trộm vía bé tắm, ngủ rất ngoan.
							</p>
						</div>
					</div>

					<!-- Card 3: Nguyễn Như Ân -->
					<div class="w-[290px] sm:w-[350px] shrink-0 bg-white rounded-2xl p-6 shadow-sm border border-neutral-100 flex flex-col justify-between">
						<div>
							<div class="flex items-start justify-between gap-3">
								<div class="flex items-center gap-3">
									<img src="<?php echo esc_url( $theme_uri . '/assets/images/avatars/customer_3.png' ); ?>" alt="Nguyễn Như Ân" class="w-10 h-10 rounded-full object-cover shrink-0">
									<div>
										<h4 class="font-body font-semibold text-sm text-[#292929] leading-tight">Nguyễn Như Ân</h4>
										<div class="flex items-center gap-1 mt-1.5">
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
										</div>
									</div>
								</div>
								<svg width="23" height="15" viewBox="0 0 23 15" fill="none" class="shrink-0 opacity-80 mt-1">
									<path d="M22.991 5.1184C22.993 5.0591 23 5.0011 23 4.941C23 4.9208 22.997 4.9015 22.997 4.8817C22.997 4.8422 23 4.8031 23 4.7636L22.991 4.7696C22.9 2.1208 20.735 0 18.07 0C15.348 0 13.141 2.2119 13.141 4.941C13.141 7.4308 14.98 9.4847 17.371 9.8262C16.776 11.8001 14.951 13.2362 12.787 13.2362V15C18.313 14.9996 22.804 10.6106 22.991 5.1184Z" fill="#292929"/>
									<path d="M10.204 5.1184C10.206 5.0591 10.213 5.0011 10.213 4.941C10.213 4.9208 10.21 4.9015 10.21 4.8817C10.21 4.8422 10.213 4.8031 10.213 4.7636L10.204 4.7696C10.113 2.1208 7.947 0 5.283 0C2.56 0 0.354 2.2119 0.354 4.941C0.354 7.4308 2.193 9.4847 4.583 9.8262C3.989 11.8001 2.164 13.2362 0 13.2362V15C5.526 14.9996 10.016 10.6106 10.204 5.1184Z" fill="#292929"/>
								</svg>
							</div>
							<div class="w-full h-[1px] bg-[#D8D8D8]/70 my-3.5"></div>
							<p class="font-body text-[13.5px] leading-relaxed text-[#292929] font-normal">
								Đánh giá 5 sao cho dịch vụ tại Vạn Phúc Care, đặc biệt là cô Hạnh, cô Nga. Đúng giờ, nhiệt tình và nhẹ nhàng. Trộm vía bé tắm, ngủ rất ngoan.
							</p>
						</div>
					</div>

					<!-- Card 4: La Thanh Nhàn -->
					<div class="w-[290px] sm:w-[350px] shrink-0 bg-white rounded-2xl p-6 shadow-sm border border-neutral-100 flex flex-col justify-between">
						<div>
							<div class="flex items-start justify-between gap-3">
								<div class="flex items-center gap-3">
									<img src="<?php echo esc_url( $theme_uri . '/assets/images/avatars/customer_4.png' ); ?>" alt="La Thanh Nhàn" class="w-10 h-10 rounded-full object-cover shrink-0">
									<div>
										<h4 class="font-body font-semibold text-sm text-[#292929] leading-tight">La Thanh Nhàn</h4>
										<div class="flex items-center gap-1 mt-1.5">
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
										</div>
									</div>
								</div>
								<svg width="23" height="15" viewBox="0 0 23 15" fill="none" class="shrink-0 opacity-80 mt-1">
									<path d="M22.991 5.1184C22.993 5.0591 23 5.0011 23 4.941C23 4.9208 22.997 4.9015 22.997 4.8817C22.997 4.8422 23 4.8031 23 4.7636L22.991 4.7696C22.9 2.1208 20.735 0 18.07 0C15.348 0 13.141 2.2119 13.141 4.941C13.141 7.4308 14.98 9.4847 17.371 9.8262C16.776 11.8001 14.951 13.2362 12.787 13.2362V15C18.313 14.9996 22.804 10.6106 22.991 5.1184Z" fill="#292929"/>
									<path d="M10.204 5.1184C10.206 5.0591 10.213 5.0011 10.213 4.941C10.213 4.9208 10.21 4.9015 10.21 4.8817C10.21 4.8422 10.213 4.8031 10.213 4.7636L10.204 4.7696C10.113 2.1208 7.947 0 5.283 0C2.56 0 0.354 2.2119 0.354 4.941C0.354 7.4308 2.193 9.4847 4.583 9.8262C3.989 11.8001 2.164 13.2362 0 13.2362V15C5.526 14.9996 10.016 10.6106 10.204 5.1184Z" fill="#292929"/>
								</svg>
							</div>
							<div class="w-full h-[1px] bg-[#D8D8D8]/70 my-3.5"></div>
							<p class="font-body text-[13.5px] leading-relaxed text-[#292929] font-normal">
								Đánh giá 5 sao cho dịch vụ tại Vạn Phúc Care, đặc biệt là cô Hạnh, cô Nga. Đúng giờ, nhiệt tình và nhẹ nhàng. Trộm vía bé tắm, ngủ rất ngoan.
							</p>
						</div>
					</div>

					<!-- Card 5: Nguyễn Thị Ngọc Trân (Mẹ & Bé) -->
					<div class="w-[290px] sm:w-[350px] shrink-0 bg-white rounded-2xl p-6 shadow-sm border border-neutral-100 flex flex-col justify-between">
						<div>
							<div class="flex items-start justify-between gap-3">
								<div class="flex items-center gap-3">
									<img src="<?php echo esc_url( $theme_uri . '/assets/images/avatars/customer_5.png' ); ?>" alt="Nguyễn Thị Ngọc Trân" class="w-10 h-10 rounded-full object-cover shrink-0">
									<div>
										<h4 class="font-body font-semibold text-sm text-[#292929] leading-tight">Nguyễn Thị Ngọc Trân</h4>
										<div class="flex items-center gap-1 mt-1.5">
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
										</div>
									</div>
								</div>
								<svg width="23" height="15" viewBox="0 0 23 15" fill="none" class="shrink-0 opacity-80 mt-1">
									<path d="M22.991 5.1184C22.993 5.0591 23 5.0011 23 4.941C23 4.9208 22.997 4.9015 22.997 4.8817C22.997 4.8422 23 4.8031 23 4.7636L22.991 4.7696C22.9 2.1208 20.735 0 18.07 0C15.348 0 13.141 2.2119 13.141 4.941C13.141 7.4308 14.98 9.4847 17.371 9.8262C16.776 11.8001 14.951 13.2362 12.787 13.2362V15C18.313 14.9996 22.804 10.6106 22.991 5.1184Z" fill="#292929"/>
									<path d="M10.204 5.1184C10.206 5.0591 10.213 5.0011 10.213 4.941C10.213 4.9208 10.21 4.9015 10.21 4.8817C10.21 4.8422 10.213 4.8031 10.213 4.7636L10.204 4.7696C10.113 2.1208 7.947 0 5.283 0C2.56 0 0.354 2.2119 0.354 4.941C0.354 7.4308 2.193 9.4847 4.583 9.8262C3.989 11.8001 2.164 13.2362 0 13.2362V15C5.526 14.9996 10.016 10.6106 10.204 5.1184Z" fill="#292929"/>
								</svg>
							</div>
							<div class="w-full h-[1px] bg-[#D8D8D8]/70 my-3.5"></div>
							<p class="font-body text-[13.5px] leading-relaxed text-[#292929] font-normal">
								Đánh giá 5 sao cho dịch vụ tại Vạn Phúc Care, đặc biệt là cô Hạnh, cô Nga. Đúng giờ, nhiệt tình và nhẹ nhàng. Trộm vía bé tắm, ngủ rất ngoan.
							</p>
						</div>
					</div>

					<!-- Set 1 Duplicate for Infinite Loop -->
					<!-- Card 1 Duplicate -->
					<div class="w-[290px] sm:w-[350px] shrink-0 bg-white rounded-2xl p-6 shadow-sm border border-neutral-100 flex flex-col justify-between">
						<div>
							<div class="flex items-start justify-between gap-3">
								<div class="flex items-center gap-3">
									<img src="<?php echo esc_url( $theme_uri . '/assets/images/avatars/customer_1.png' ); ?>" alt="Nguyễn Thị Ngọc Trân" class="w-10 h-10 rounded-full object-cover shrink-0">
									<div>
										<h4 class="font-body font-semibold text-sm text-[#292929] leading-tight">Nguyễn Thị Ngọc Trân</h4>
										<div class="flex items-center gap-1 mt-1.5">
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
										</div>
									</div>
								</div>
								<svg width="23" height="15" viewBox="0 0 23 15" fill="none" class="shrink-0 opacity-80 mt-1">
									<path d="M22.991 5.1184C22.993 5.0591 23 5.0011 23 4.941C23 4.9208 22.997 4.9015 22.997 4.8817C22.997 4.8422 23 4.8031 23 4.7636L22.991 4.7696C22.9 2.1208 20.735 0 18.07 0C15.348 0 13.141 2.2119 13.141 4.941C13.141 7.4308 14.98 9.4847 17.371 9.8262C16.776 11.8001 14.951 13.2362 12.787 13.2362V15C18.313 14.9996 22.804 10.6106 22.991 5.1184Z" fill="#292929"/>
									<path d="M10.204 5.1184C10.206 5.0591 10.213 5.0011 10.213 4.941C10.213 4.9208 10.21 4.9015 10.21 4.8817C10.21 4.8422 10.213 4.8031 10.213 4.7636L10.204 4.7696C10.113 2.1208 7.947 0 5.283 0C2.56 0 0.354 2.2119 0.354 4.941C0.354 7.4308 2.193 9.4847 4.583 9.8262C3.989 11.8001 2.164 13.2362 0 13.2362V15C5.526 14.9996 10.016 10.6106 10.204 5.1184Z" fill="#292929"/>
								</svg>
							</div>
							<div class="w-full h-[1px] bg-[#D8D8D8]/70 my-3.5"></div>
							<p class="font-body text-[13.5px] leading-relaxed text-[#292929] font-normal">
								Đánh giá 5 sao cho dịch vụ tại Vạn Phúc Care, đặc biệt là cô Hạnh, cô Nga. Đúng giờ, nhiệt tình và nhẹ nhàng. Trộm vía bé tắm, ngủ rất ngoan.
							</p>
						</div>
					</div>

					<!-- Card 2 Duplicate -->
					<div class="w-[290px] sm:w-[350px] shrink-0 bg-white rounded-2xl p-6 shadow-sm border border-neutral-100 flex flex-col justify-between">
						<div>
							<div class="flex items-start justify-between gap-3">
								<div class="flex items-center gap-3">
									<img src="<?php echo esc_url( $theme_uri . '/assets/images/avatars/customer_2.png' ); ?>" alt="Phạm Thị Thanh Lý" class="w-10 h-10 rounded-full object-cover shrink-0">
									<div>
										<h4 class="font-body font-semibold text-sm text-[#292929] leading-tight">Phạm Thị Thanh Lý</h4>
										<div class="flex items-center gap-1 mt-1.5">
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
										</div>
									</div>
								</div>
								<svg width="23" height="15" viewBox="0 0 23 15" fill="none" class="shrink-0 opacity-80 mt-1">
									<path d="M22.991 5.1184C22.993 5.0591 23 5.0011 23 4.941C23 4.9208 22.997 4.9015 22.997 4.8817C22.997 4.8422 23 4.8031 23 4.7636L22.991 4.7696C22.9 2.1208 20.735 0 18.07 0C15.348 0 13.141 2.2119 13.141 4.941C13.141 7.4308 14.98 9.4847 17.371 9.8262C16.776 11.8001 14.951 13.2362 12.787 13.2362V15C18.313 14.9996 22.804 10.6106 22.991 5.1184Z" fill="#292929"/>
									<path d="M10.204 5.1184C10.206 5.0591 10.213 5.0011 10.213 4.941C10.213 4.9208 10.21 4.9015 10.21 4.8817C10.21 4.8422 10.213 4.8031 10.213 4.7636L10.204 4.7696C10.113 2.1208 7.947 0 5.283 0C2.56 0 0.354 2.2119 0.354 4.941C0.354 7.4308 2.193 9.4847 4.583 9.8262C3.989 11.8001 2.164 13.2362 0 13.2362V15C5.526 14.9996 10.016 10.6106 10.204 5.1184Z" fill="#292929"/>
								</svg>
							</div>
							<div class="w-full h-[1px] bg-[#D8D8D8]/70 my-3.5"></div>
							<p class="font-body text-[13.5px] leading-relaxed text-[#292929] font-normal">
								Đánh giá 5 sao cho dịch vụ tại Vạn Phúc Care, đặc biệt là cô Hạnh, cô Nga. Đúng giờ, nhiệt tình và nhẹ nhàng. Trộm vía bé tắm, ngủ rất ngoan.
							</p>
						</div>
					</div>

					<!-- Card 3 Duplicate -->
					<div class="w-[290px] sm:w-[350px] shrink-0 bg-white rounded-2xl p-6 shadow-sm border border-neutral-100 flex flex-col justify-between">
						<div>
							<div class="flex items-start justify-between gap-3">
								<div class="flex items-center gap-3">
									<img src="<?php echo esc_url( $theme_uri . '/assets/images/avatars/customer_3.png' ); ?>" alt="Nguyễn Như Ân" class="w-10 h-10 rounded-full object-cover shrink-0">
									<div>
										<h4 class="font-body font-semibold text-sm text-[#292929] leading-tight">Nguyễn Như Ân</h4>
										<div class="flex items-center gap-1 mt-1.5">
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
										</div>
									</div>
								</div>
								<svg width="23" height="15" viewBox="0 0 23 15" fill="none" class="shrink-0 opacity-80 mt-1">
									<path d="M22.991 5.1184C22.993 5.0591 23 5.0011 23 4.941C23 4.9208 22.997 4.9015 22.997 4.8817C22.997 4.8422 23 4.8031 23 4.7636L22.991 4.7696C22.9 2.1208 20.735 0 18.07 0C15.348 0 13.141 2.2119 13.141 4.941C13.141 7.4308 14.98 9.4847 17.371 9.8262C16.776 11.8001 14.951 13.2362 12.787 13.2362V15C18.313 14.9996 22.804 10.6106 22.991 5.1184Z" fill="#292929"/>
									<path d="M10.204 5.1184C10.206 5.0591 10.213 5.0011 10.213 4.941C10.213 4.9208 10.21 4.9015 10.21 4.8817C10.21 4.8422 10.213 4.8031 10.213 4.7636L10.204 4.7696C10.113 2.1208 7.947 0 5.283 0C2.56 0 0.354 2.2119 0.354 4.941C0.354 7.4308 2.193 9.4847 4.583 9.8262C3.989 11.8001 2.164 13.2362 0 13.2362V15C5.526 14.9996 10.016 10.6106 10.204 5.1184Z" fill="#292929"/>
								</svg>
							</div>
							<div class="w-full h-[1px] bg-[#D8D8D8]/70 my-3.5"></div>
							<p class="font-body text-[13.5px] leading-relaxed text-[#292929] font-normal">
								Đánh giá 5 sao cho dịch vụ tại Vạn Phúc Care, đặc biệt là cô Hạnh, cô Nga. Đúng giờ, nhiệt tình và nhẹ nhàng. Trộm vía bé tắm, ngủ rất ngoan.
							</p>
						</div>
					</div>

					<!-- Card 4 Duplicate -->
					<div class="w-[290px] sm:w-[350px] shrink-0 bg-white rounded-2xl p-6 shadow-sm border border-neutral-100 flex flex-col justify-between">
						<div>
							<div class="flex items-start justify-between gap-3">
								<div class="flex items-center gap-3">
									<img src="<?php echo esc_url( $theme_uri . '/assets/images/avatars/customer_4.png' ); ?>" alt="La Thanh Nhàn" class="w-10 h-10 rounded-full object-cover shrink-0">
									<div>
										<h4 class="font-body font-semibold text-sm text-[#292929] leading-tight">La Thanh Nhàn</h4>
										<div class="flex items-center gap-1 mt-1.5">
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
										</div>
									</div>
								</div>
								<svg width="23" height="15" viewBox="0 0 23 15" fill="none" class="shrink-0 opacity-80 mt-1">
									<path d="M22.991 5.1184C22.993 5.0591 23 5.0011 23 4.941C23 4.9208 22.997 4.9015 22.997 4.8817C22.997 4.8422 23 4.8031 23 4.7636L22.991 4.7696C22.9 2.1208 20.735 0 18.07 0C15.348 0 13.141 2.2119 13.141 4.941C13.141 7.4308 14.98 9.4847 17.371 9.8262C16.776 11.8001 14.951 13.2362 12.787 13.2362V15C18.313 14.9996 22.804 10.6106 22.991 5.1184Z" fill="#292929"/>
									<path d="M10.204 5.1184C10.206 5.0591 10.213 5.0011 10.213 4.941C10.213 4.9208 10.21 4.9015 10.21 4.8817C10.21 4.8422 10.213 4.8031 10.213 4.7636L10.204 4.7696C10.113 2.1208 7.947 0 5.283 0C2.56 0 0.354 2.2119 0.354 4.941C0.354 7.4308 2.193 9.4847 4.583 9.8262C3.989 11.8001 2.164 13.2362 0 13.2362V15C5.526 14.9996 10.016 10.6106 10.204 5.1184Z" fill="#292929"/>
								</svg>
							</div>
							<div class="w-full h-[1px] bg-[#D8D8D8]/70 my-3.5"></div>
							<p class="font-body text-[13.5px] leading-relaxed text-[#292929] font-normal">
								Đánh giá 5 sao cho dịch vụ tại Vạn Phúc Care, đặc biệt là cô Hạnh, cô Nga. Đúng giờ, nhiệt tình và nhẹ nhàng. Trộm vía bé tắm, ngủ rất ngoan.
							</p>
						</div>
					</div>

					<!-- Card 5 Duplicate -->
					<div class="w-[290px] sm:w-[350px] shrink-0 bg-white rounded-2xl p-6 shadow-sm border border-neutral-100 flex flex-col justify-between">
						<div>
							<div class="flex items-start justify-between gap-3">
								<div class="flex items-center gap-3">
									<img src="<?php echo esc_url( $theme_uri . '/assets/images/avatars/customer_5.png' ); ?>" alt="Nguyễn Thị Ngọc Trân" class="w-10 h-10 rounded-full object-cover shrink-0">
									<div>
										<h4 class="font-body font-semibold text-sm text-[#292929] leading-tight">Nguyễn Thị Ngọc Trân</h4>
										<div class="flex items-center gap-1 mt-1.5">
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
										</div>
									</div>
								</div>
								<svg width="23" height="15" viewBox="0 0 23 15" fill="none" class="shrink-0 opacity-80 mt-1">
									<path d="M22.991 5.1184C22.993 5.0591 23 5.0011 23 4.941C23 4.9208 22.997 4.9015 22.997 4.8817C22.997 4.8422 23 4.8031 23 4.7636L22.991 4.7696C22.9 2.1208 20.735 0 18.07 0C15.348 0 13.141 2.2119 13.141 4.941C13.141 7.4308 14.98 9.4847 17.371 9.8262C16.776 11.8001 14.951 13.2362 12.787 13.2362V15C18.313 14.9996 22.804 10.6106 22.991 5.1184Z" fill="#292929"/>
									<path d="M10.204 5.1184C10.206 5.0591 10.213 5.0011 10.213 4.941C10.213 4.9208 10.21 4.9015 10.21 4.8817C10.21 4.8422 10.213 4.8031 10.213 4.7636L10.204 4.7696C10.113 2.1208 7.947 0 5.283 0C2.56 0 0.354 2.2119 0.354 4.941C0.354 7.4308 2.193 9.4847 4.583 9.8262C3.989 11.8001 2.164 13.2362 0 13.2362V15C5.526 14.9996 10.016 10.6106 10.204 5.1184Z" fill="#292929"/>
								</svg>
							</div>
							<div class="w-full h-[1px] bg-[#D8D8D8]/70 my-3.5"></div>
							<p class="font-body text-[13.5px] leading-relaxed text-[#292929] font-normal">
								Đánh giá 5 sao cho dịch vụ tại Vạn Phúc Care, đặc biệt là cô Hạnh, cô Nga. Đúng giờ, nhiệt tình và nhẹ nhàng. Trộm vía bé tắm, ngủ rất ngoan.
							</p>
						</div>
					</div>
				</div>
			</div>

			<!-- Row 2: Marquee Left (Staggered order & timing) -->
			<div class="overflow-hidden w-full py-1">
				<div class="animate-marquee-slow flex gap-5 w-max">
					<!-- Set 1 (Staggered: Card 2, Card 3, Card 4, Card 5, Card 1) -->
					<!-- Card 2: Phạm Thị Thanh Lý -->
					<div class="w-[290px] sm:w-[350px] shrink-0 bg-white rounded-2xl p-6 shadow-sm border border-neutral-100 flex flex-col justify-between">
						<div>
							<div class="flex items-start justify-between gap-3">
								<div class="flex items-center gap-3">
									<img src="<?php echo esc_url( $theme_uri . '/assets/images/avatars/customer_2.png' ); ?>" alt="Phạm Thị Thanh Lý" class="w-10 h-10 rounded-full object-cover shrink-0">
									<div>
										<h4 class="font-body font-semibold text-sm text-[#292929] leading-tight">Phạm Thị Thanh Lý</h4>
										<div class="flex items-center gap-1 mt-1.5">
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
										</div>
									</div>
								</div>
								<svg width="23" height="15" viewBox="0 0 23 15" fill="none" class="shrink-0 opacity-80 mt-1">
									<path d="M22.991 5.1184C22.993 5.0591 23 5.0011 23 4.941C23 4.9208 22.997 4.9015 22.997 4.8817C22.997 4.8422 23 4.8031 23 4.7636L22.991 4.7696C22.9 2.1208 20.735 0 18.07 0C15.348 0 13.141 2.2119 13.141 4.941C13.141 7.4308 14.98 9.4847 17.371 9.8262C16.776 11.8001 14.951 13.2362 12.787 13.2362V15C18.313 14.9996 22.804 10.6106 22.991 5.1184Z" fill="#292929"/>
									<path d="M10.204 5.1184C10.206 5.0591 10.213 5.0011 10.213 4.941C10.213 4.9208 10.21 4.9015 10.21 4.8817C10.21 4.8422 10.213 4.8031 10.213 4.7636L10.204 4.7696C10.113 2.1208 7.947 0 5.283 0C2.56 0 0.354 2.2119 0.354 4.941C0.354 7.4308 2.193 9.4847 4.583 9.8262C3.989 11.8001 2.164 13.2362 0 13.2362V15C5.526 14.9996 10.016 10.6106 10.204 5.1184Z" fill="#292929"/>
								</svg>
							</div>
							<div class="w-full h-[1px] bg-[#D8D8D8]/70 my-3.5"></div>
							<p class="font-body text-[13.5px] leading-relaxed text-[#292929] font-normal">
								Đánh giá 5 sao cho dịch vụ tại Vạn Phúc Care, đặc biệt là cô Hạnh, cô Nga. Đúng giờ, nhiệt tình và nhẹ nhàng. Trộm vía bé tắm, ngủ rất ngoan.
							</p>
						</div>
					</div>

					<!-- Card 3: Nguyễn Như Ân -->
					<div class="w-[290px] sm:w-[350px] shrink-0 bg-white rounded-2xl p-6 shadow-sm border border-neutral-100 flex flex-col justify-between">
						<div>
							<div class="flex items-start justify-between gap-3">
								<div class="flex items-center gap-3">
									<img src="<?php echo esc_url( $theme_uri . '/assets/images/avatars/customer_3.png' ); ?>" alt="Nguyễn Như Ân" class="w-10 h-10 rounded-full object-cover shrink-0">
									<div>
										<h4 class="font-body font-semibold text-sm text-[#292929] leading-tight">Nguyễn Như Ân</h4>
										<div class="flex items-center gap-1 mt-1.5">
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
										</div>
									</div>
								</div>
								<svg width="23" height="15" viewBox="0 0 23 15" fill="none" class="shrink-0 opacity-80 mt-1">
									<path d="M22.991 5.1184C22.993 5.0591 23 5.0011 23 4.941C23 4.9208 22.997 4.9015 22.997 4.8817C22.997 4.8422 23 4.8031 23 4.7636L22.991 4.7696C22.9 2.1208 20.735 0 18.07 0C15.348 0 13.141 2.2119 13.141 4.941C13.141 7.4308 14.98 9.4847 17.371 9.8262C16.776 11.8001 14.951 13.2362 12.787 13.2362V15C18.313 14.9996 22.804 10.6106 22.991 5.1184Z" fill="#292929"/>
									<path d="M10.204 5.1184C10.206 5.0591 10.213 5.0011 10.213 4.941C10.213 4.9208 10.21 4.9015 10.21 4.8817C10.21 4.8422 10.213 4.8031 10.213 4.7636L10.204 4.7696C10.113 2.1208 7.947 0 5.283 0C2.56 0 0.354 2.2119 0.354 4.941C0.354 7.4308 2.193 9.4847 4.583 9.8262C3.989 11.8001 2.164 13.2362 0 13.2362V15C5.526 14.9996 10.016 10.6106 10.204 5.1184Z" fill="#292929"/>
								</svg>
							</div>
							<div class="w-full h-[1px] bg-[#D8D8D8]/70 my-3.5"></div>
							<p class="font-body text-[13.5px] leading-relaxed text-[#292929] font-normal">
								Đánh giá 5 sao cho dịch vụ tại Vạn Phúc Care, đặc biệt là cô Hạnh, cô Nga. Đúng giờ, nhiệt tình và nhẹ nhàng. Trộm vía bé tắm, ngủ rất ngoan.
							</p>
						</div>
					</div>

					<!-- Card 4: La Thanh Nhàn -->
					<div class="w-[290px] sm:w-[350px] shrink-0 bg-white rounded-2xl p-6 shadow-sm border border-neutral-100 flex flex-col justify-between">
						<div>
							<div class="flex items-start justify-between gap-3">
								<div class="flex items-center gap-3">
									<img src="<?php echo esc_url( $theme_uri . '/assets/images/avatars/customer_4.png' ); ?>" alt="La Thanh Nhàn" class="w-10 h-10 rounded-full object-cover shrink-0">
									<div>
										<h4 class="font-body font-semibold text-sm text-[#292929] leading-tight">La Thanh Nhàn</h4>
										<div class="flex items-center gap-1 mt-1.5">
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
										</div>
									</div>
								</div>
								<svg width="23" height="15" viewBox="0 0 23 15" fill="none" class="shrink-0 opacity-80 mt-1">
									<path d="M22.991 5.1184C22.993 5.0591 23 5.0011 23 4.941C23 4.9208 22.997 4.9015 22.997 4.8817C22.997 4.8422 23 4.8031 23 4.7636L22.991 4.7696C22.9 2.1208 20.735 0 18.07 0C15.348 0 13.141 2.2119 13.141 4.941C13.141 7.4308 14.98 9.4847 17.371 9.8262C16.776 11.8001 14.951 13.2362 12.787 13.2362V15C18.313 14.9996 22.804 10.6106 22.991 5.1184Z" fill="#292929"/>
									<path d="M10.204 5.1184C10.206 5.0591 10.213 5.0011 10.213 4.941C10.213 4.9208 10.21 4.9015 10.21 4.8817C10.21 4.8422 10.213 4.8031 10.213 4.7636L10.204 4.7696C10.113 2.1208 7.947 0 5.283 0C2.56 0 0.354 2.2119 0.354 4.941C0.354 7.4308 2.193 9.4847 4.583 9.8262C3.989 11.8001 2.164 13.2362 0 13.2362V15C5.526 14.9996 10.016 10.6106 10.204 5.1184Z" fill="#292929"/>
								</svg>
							</div>
							<div class="w-full h-[1px] bg-[#D8D8D8]/70 my-3.5"></div>
							<p class="font-body text-[13.5px] leading-relaxed text-[#292929] font-normal">
								Đánh giá 5 sao cho dịch vụ tại Vạn Phúc Care, đặc biệt là cô Hạnh, cô Nga. Đúng giờ, nhiệt tình và nhẹ nhàng. Trộm vía bé tắm, ngủ rất ngoan.
							</p>
						</div>
					</div>

					<!-- Card 5: Nguyễn Thị Ngọc Trân (Mẹ & Bé) -->
					<div class="w-[290px] sm:w-[350px] shrink-0 bg-white rounded-2xl p-6 shadow-sm border border-neutral-100 flex flex-col justify-between">
						<div>
							<div class="flex items-start justify-between gap-3">
								<div class="flex items-center gap-3">
									<img src="<?php echo esc_url( $theme_uri . '/assets/images/avatars/customer_5.png' ); ?>" alt="Nguyễn Thị Ngọc Trân" class="w-10 h-10 rounded-full object-cover shrink-0">
									<div>
										<h4 class="font-body font-semibold text-sm text-[#292929] leading-tight">Nguyễn Thị Ngọc Trân</h4>
										<div class="flex items-center gap-1 mt-1.5">
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
										</div>
									</div>
								</div>
								<svg width="23" height="15" viewBox="0 0 23 15" fill="none" class="shrink-0 opacity-80 mt-1">
									<path d="M22.991 5.1184C22.993 5.0591 23 5.0011 23 4.941C23 4.9208 22.997 4.9015 22.997 4.8817C22.997 4.8422 23 4.8031 23 4.7636L22.991 4.7696C22.9 2.1208 20.735 0 18.07 0C15.348 0 13.141 2.2119 13.141 4.941C13.141 7.4308 14.98 9.4847 17.371 9.8262C16.776 11.8001 14.951 13.2362 12.787 13.2362V15C18.313 14.9996 22.804 10.6106 22.991 5.1184Z" fill="#292929"/>
									<path d="M10.204 5.1184C10.206 5.0591 10.213 5.0011 10.213 4.941C10.213 4.9208 10.21 4.9015 10.21 4.8817C10.21 4.8422 10.213 4.8031 10.213 4.7636L10.204 4.7696C10.113 2.1208 7.947 0 5.283 0C2.56 0 0.354 2.2119 0.354 4.941C0.354 7.4308 2.193 9.4847 4.583 9.8262C3.989 11.8001 2.164 13.2362 0 13.2362V15C5.526 14.9996 10.016 10.6106 10.204 5.1184Z" fill="#292929"/>
								</svg>
							</div>
							<div class="w-full h-[1px] bg-[#D8D8D8]/70 my-3.5"></div>
							<p class="font-body text-[13.5px] leading-relaxed text-[#292929] font-normal">
								Đánh giá 5 sao cho dịch vụ tại Vạn Phúc Care, đặc biệt là cô Hạnh, cô Nga. Đúng giờ, nhiệt tình và nhẹ nhàng. Trộm vía bé tắm, ngủ rất ngoan.
							</p>
						</div>
					</div>

					<!-- Card 1: Nguyễn Thị Ngọc Trân -->
					<div class="w-[290px] sm:w-[350px] shrink-0 bg-white rounded-2xl p-6 shadow-sm border border-neutral-100 flex flex-col justify-between">
						<div>
							<div class="flex items-start justify-between gap-3">
								<div class="flex items-center gap-3">
									<img src="<?php echo esc_url( $theme_uri . '/assets/images/avatars/customer_1.png' ); ?>" alt="Nguyễn Thị Ngọc Trân" class="w-10 h-10 rounded-full object-cover shrink-0">
									<div>
										<h4 class="font-body font-semibold text-sm text-[#292929] leading-tight">Nguyễn Thị Ngọc Trân</h4>
										<div class="flex items-center gap-1 mt-1.5">
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
										</div>
									</div>
								</div>
								<svg width="23" height="15" viewBox="0 0 23 15" fill="none" class="shrink-0 opacity-80 mt-1">
									<path d="M22.991 5.1184C22.993 5.0591 23 5.0011 23 4.941C23 4.9208 22.997 4.9015 22.997 4.8817C22.997 4.8422 23 4.8031 23 4.7636L22.991 4.7696C22.9 2.1208 20.735 0 18.07 0C15.348 0 13.141 2.2119 13.141 4.941C13.141 7.4308 14.98 9.4847 17.371 9.8262C16.776 11.8001 14.951 13.2362 12.787 13.2362V15C18.313 14.9996 22.804 10.6106 22.991 5.1184Z" fill="#292929"/>
									<path d="M10.204 5.1184C10.206 5.0591 10.213 5.0011 10.213 4.941C10.213 4.9208 10.21 4.9015 10.21 4.8817C10.21 4.8422 10.213 4.8031 10.213 4.7636L10.204 4.7696C10.113 2.1208 7.947 0 5.283 0C2.56 0 0.354 2.2119 0.354 4.941C0.354 7.4308 2.193 9.4847 4.583 9.8262C3.989 11.8001 2.164 13.2362 0 13.2362V15C5.526 14.9996 10.016 10.6106 10.204 5.1184Z" fill="#292929"/>
								</svg>
							</div>
							<div class="w-full h-[1px] bg-[#D8D8D8]/70 my-3.5"></div>
							<p class="font-body text-[13.5px] leading-relaxed text-[#292929] font-normal">
								Đánh giá 5 sao cho dịch vụ tại Vạn Phúc Care, đặc biệt là cô Hạnh, cô Nga. Đúng giờ, nhiệt tình và nhẹ nhàng. Trộm vía bé tắm, ngủ rất ngoan.
							</p>
						</div>
					</div>

					<!-- Set 2 Duplicate (Cards 2, 3, 4, 5, 1) for Infinite Loop -->
					<!-- Card 2 Duplicate -->
					<div class="w-[290px] sm:w-[350px] shrink-0 bg-white rounded-2xl p-6 shadow-sm border border-neutral-100 flex flex-col justify-between">
						<div>
							<div class="flex items-start justify-between gap-3">
								<div class="flex items-center gap-3">
									<img src="<?php echo esc_url( $theme_uri . '/assets/images/avatars/customer_2.png' ); ?>" alt="Phạm Thị Thanh Lý" class="w-10 h-10 rounded-full object-cover shrink-0">
									<div>
										<h4 class="font-body font-semibold text-sm text-[#292929] leading-tight">Phạm Thị Thanh Lý</h4>
										<div class="flex items-center gap-1 mt-1.5">
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
										</div>
									</div>
								</div>
								<svg width="23" height="15" viewBox="0 0 23 15" fill="none" class="shrink-0 opacity-80 mt-1">
									<path d="M22.991 5.1184C22.993 5.0591 23 5.0011 23 4.941C23 4.9208 22.997 4.9015 22.997 4.8817C22.997 4.8422 23 4.8031 23 4.7636L22.991 4.7696C22.9 2.1208 20.735 0 18.07 0C15.348 0 13.141 2.2119 13.141 4.941C13.141 7.4308 14.98 9.4847 17.371 9.8262C16.776 11.8001 14.951 13.2362 12.787 13.2362V15C18.313 14.9996 22.804 10.6106 22.991 5.1184Z" fill="#292929"/>
									<path d="M10.204 5.1184C10.206 5.0591 10.213 5.0011 10.213 4.941C10.213 4.9208 10.21 4.9015 10.21 4.8817C10.21 4.8422 10.213 4.8031 10.213 4.7636L10.204 4.7696C10.113 2.1208 7.947 0 5.283 0C2.56 0 0.354 2.2119 0.354 4.941C0.354 7.4308 2.193 9.4847 4.583 9.8262C3.989 11.8001 2.164 13.2362 0 13.2362V15C5.526 14.9996 10.016 10.6106 10.204 5.1184Z" fill="#292929"/>
								</svg>
							</div>
							<div class="w-full h-[1px] bg-[#D8D8D8]/70 my-3.5"></div>
							<p class="font-body text-[13.5px] leading-relaxed text-[#292929] font-normal">
								Đánh giá 5 sao cho dịch vụ tại Vạn Phúc Care, đặc biệt là cô Hạnh, cô Nga. Đúng giờ, nhiệt tình và nhẹ nhàng. Trộm vía bé tắm, ngủ rất ngoan.
							</p>
						</div>
					</div>

					<!-- Card 3 Duplicate -->
					<div class="w-[290px] sm:w-[350px] shrink-0 bg-white rounded-2xl p-6 shadow-sm border border-neutral-100 flex flex-col justify-between">
						<div>
							<div class="flex items-start justify-between gap-3">
								<div class="flex items-center gap-3">
									<img src="<?php echo esc_url( $theme_uri . '/assets/images/avatars/customer_3.png' ); ?>" alt="Nguyễn Như Ân" class="w-10 h-10 rounded-full object-cover shrink-0">
									<div>
										<h4 class="font-body font-semibold text-sm text-[#292929] leading-tight">Nguyễn Như Ân</h4>
										<div class="flex items-center gap-1 mt-1.5">
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
										</div>
									</div>
								</div>
								<svg width="23" height="15" viewBox="0 0 23 15" fill="none" class="shrink-0 opacity-80 mt-1">
									<path d="M22.991 5.1184C22.993 5.0591 23 5.0011 23 4.941C23 4.9208 22.997 4.9015 22.997 4.8817C22.997 4.8422 23 4.8031 23 4.7636L22.991 4.7696C22.9 2.1208 20.735 0 18.07 0C15.348 0 13.141 2.2119 13.141 4.941C13.141 7.4308 14.98 9.4847 17.371 9.8262C16.776 11.8001 14.951 13.2362 12.787 13.2362V15C18.313 14.9996 22.804 10.6106 22.991 5.1184Z" fill="#292929"/>
									<path d="M10.204 5.1184C10.206 5.0591 10.213 5.0011 10.213 4.941C10.213 4.9208 10.21 4.9015 10.21 4.8817C10.21 4.8422 10.213 4.8031 10.213 4.7636L10.204 4.7696C10.113 2.1208 7.947 0 5.283 0C2.56 0 0.354 2.2119 0.354 4.941C0.354 7.4308 2.193 9.4847 4.583 9.8262C3.989 11.8001 2.164 13.2362 0 13.2362V15C5.526 14.9996 10.016 10.6106 10.204 5.1184Z" fill="#292929"/>
								</svg>
							</div>
							<div class="w-full h-[1px] bg-[#D8D8D8]/70 my-3.5"></div>
							<p class="font-body text-[13.5px] leading-relaxed text-[#292929] font-normal">
								Đánh giá 5 sao cho dịch vụ tại Vạn Phúc Care, đặc biệt là cô Hạnh, cô Nga. Đúng giờ, nhiệt tình và nhẹ nhàng. Trộm vía bé tắm, ngủ rất ngoan.
							</p>
						</div>
					</div>

					<!-- Card 4 Duplicate -->
					<div class="w-[290px] sm:w-[350px] shrink-0 bg-white rounded-2xl p-6 shadow-sm border border-neutral-100 flex flex-col justify-between">
						<div>
							<div class="flex items-start justify-between gap-3">
								<div class="flex items-center gap-3">
									<img src="<?php echo esc_url( $theme_uri . '/assets/images/avatars/customer_4.png' ); ?>" alt="La Thanh Nhàn" class="w-10 h-10 rounded-full object-cover shrink-0">
									<div>
										<h4 class="font-body font-semibold text-sm text-[#292929] leading-tight">La Thanh Nhàn</h4>
										<div class="flex items-center gap-1 mt-1.5">
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
										</div>
									</div>
								</div>
								<svg width="23" height="15" viewBox="0 0 23 15" fill="none" class="shrink-0 opacity-80 mt-1">
									<path d="M22.991 5.1184C22.993 5.0591 23 5.0011 23 4.941C23 4.9208 22.997 4.9015 22.997 4.8817C22.997 4.8422 23 4.8031 23 4.7636L22.991 4.7696C22.9 2.1208 20.735 0 18.07 0C15.348 0 13.141 2.2119 13.141 4.941C13.141 7.4308 14.98 9.4847 17.371 9.8262C16.776 11.8001 14.951 13.2362 12.787 13.2362V15C18.313 14.9996 22.804 10.6106 22.991 5.1184Z" fill="#292929"/>
									<path d="M10.204 5.1184C10.206 5.0591 10.213 5.0011 10.213 4.941C10.213 4.9208 10.21 4.9015 10.21 4.8817C10.21 4.8422 10.213 4.8031 10.213 4.7636L10.204 4.7696C10.113 2.1208 7.947 0 5.283 0C2.56 0 0.354 2.2119 0.354 4.941C0.354 7.4308 2.193 9.4847 4.583 9.8262C3.989 11.8001 2.164 13.2362 0 13.2362V15C5.526 14.9996 10.016 10.6106 10.204 5.1184Z" fill="#292929"/>
								</svg>
							</div>
							<div class="w-full h-[1px] bg-[#D8D8D8]/70 my-3.5"></div>
							<p class="font-body text-[13.5px] leading-relaxed text-[#292929] font-normal">
								Đánh giá 5 sao cho dịch vụ tại Vạn Phúc Care, đặc biệt là cô Hạnh, cô Nga. Đúng giờ, nhiệt tình và nhẹ nhàng. Trộm vía bé tắm, ngủ rất ngoan.
							</p>
						</div>
					</div>

					<!-- Card 5 Duplicate -->
					<div class="w-[290px] sm:w-[350px] shrink-0 bg-white rounded-2xl p-6 shadow-sm border border-neutral-100 flex flex-col justify-between">
						<div>
							<div class="flex items-start justify-between gap-3">
								<div class="flex items-center gap-3">
									<img src="<?php echo esc_url( $theme_uri . '/assets/images/avatars/customer_5.png' ); ?>" alt="Nguyễn Thị Ngọc Trân" class="w-10 h-10 rounded-full object-cover shrink-0">
									<div>
										<h4 class="font-body font-semibold text-sm text-[#292929] leading-tight">Nguyễn Thị Ngọc Trân</h4>
										<div class="flex items-center gap-1 mt-1.5">
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
											<svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="w-3.5 h-3.5 shrink-0"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z" fill="#1A77BA"/></svg>
										</div>
									</div>
								</div>
								<svg width="23" height="15" viewBox="0 0 23 15" fill="none" class="shrink-0 opacity-80 mt-1">
									<path d="M22.991 5.1184C22.993 5.0591 23 5.0011 23 4.941C23 4.9208 22.997 4.9015 22.997 4.8817C22.997 4.8422 23 4.8031 23 4.7636L22.991 4.7696C22.9 2.1208 20.735 0 18.07 0C15.348 0 13.141 2.2119 13.141 4.941C13.141 7.4308 14.98 9.4847 17.371 9.8262C16.776 11.8001 14.951 13.2362 12.787 13.2362V15C18.313 14.9996 22.804 10.6106 22.991 5.1184Z" fill="#292929"/>
									<path d="M10.204 5.1184C10.206 5.0591 10.213 5.0011 10.213 4.941C10.213 4.9208 10.21 4.9015 10.21 4.8817C10.21 4.8422 10.213 4.8031 10.213 4.7636L10.204 4.7696C10.113 2.1208 7.947 0 5.283 0C2.56 0 0.354 2.2119 0.354 4.941C0.354 7.4308 2.193 9.4847 4.583 9.8262C3.989 11.8001 2.164 13.2362 0 13.2362V15C5.526 14.9996 10.016 10.6106 10.204 5.1184Z" fill="#292929"/>
								</svg>
							</div>
							<div class="w-full h-[1px] bg-[#D8D8D8]/70 my-3.5"></div>
							<p class="font-body text-[13.5px] leading-relaxed text-[#292929] font-normal">
								Đánh giá 5 sao cho dịch vụ tại Vạn Phúc Care, đặc biệt là cô Hạnh, cô Nga. Đúng giờ, nhiệt tình và nhẹ nhàng. Trộm vía bé tắm, ngủ rất ngoan.
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>	<!-- =========================================================================
	     9. BÁO CHÍ NÓI VỀ CHÚNG TÔI (Featured Press / Articles)
	     ========================================================================= -->
	<section id="bao-chi" class="py-12 sm:py-20 lg:py-24 bg-gradient-to-b from-[#FFF8F8] via-[#FDF1F1] to-[#FAF0F0] relative overflow-hidden">
		<div class="vpc-container">
			<!-- Section Header -->
			<div class="text-center max-w-3xl mx-auto mb-8 sm:mb-14">
				<!-- Badge -->
				<div class="inline-flex items-center justify-center gap-2 px-3.5 py-1 bg-[#FDE6E6] border border-[#F48283] rounded-full mb-3 shadow-xs">
					<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-[#F48283] shrink-0">
						<path d="M12 2L13.8 8.6L20.4 10.4L13.8 12.2L12 18.8L10.2 12.2L3.6 10.4L10.2 8.6L12 2Z" fill="currentColor"/>
					</svg>
					<span class="font-sans font-medium text-xs sm:text-sm tracking-wider uppercase text-[#155F95]">VẠN PHÚC CARE</span>
				</div>

				<!-- Title -->
				<h2 class="font-heading font-semibold text-[32px] sm:text-4xl lg:text-[44px] leading-[36px] sm:leading-tight text-center">
					<span class="text-[#1A77BA]">Báo Chí Nói </span><br class="sm:hidden">
					<span class="text-[#F48283]">Về Chúng Tôi</span>
				</h2>

				<!-- Subtitle -->
				<p class="font-sans font-medium text-sm sm:text-base text-[#292929] leading-6 max-w-3xl mx-auto mt-3">
					Vạn Phúc Care tự hào khi nhận được sự quan tâm, ghi nhận từ các cơ quan báo chí và giới chuyên môn về những nỗ lực mang đến dịch vụ chăm sóc sức khỏe mẹ và bé chất lượng nhất.
				</p>
			</div>

			<!-- 3 Press Cards (Mobile horizontal scroll snap, Desktop grid) -->
			<div class="flex flex-row overflow-x-auto scrollbar-none gap-4 px-5 -mx-5 pb-2 snap-x snap-mandatory md:grid md:grid-cols-2 lg:grid-cols-3 md:mx-0 md:px-0 md:pb-0">
				
				<!-- Card 1 -->
				<article class="min-w-[300px] w-[300px] md:min-w-0 md:w-auto snap-start bg-white rounded-2xl p-4 sm:p-5 border border-neutral-100 shadow-[0px_1px_5px_rgba(0,0,0,0.15)] hover:shadow-md transition-all duration-300 flex flex-col group shrink-0 md:shrink">
					<!-- Thumbnail Image -->
					<div class="relative w-full aspect-[268/208] rounded-xl overflow-hidden bg-neutral-200">
						<img src="<?php echo esc_url( $theme_uri . '/assets/images/press_event_1.jpg' ); ?>" alt="Vạn Phúc Care - Báo chí đưa tin" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" loading="lazy">
					</div>
					
					<!-- Content -->
					<div class="flex flex-col flex-grow pt-4">
						<h3 class="font-body font-semibold text-base sm:text-lg text-neutral-900 group-hover:text-[#1A77BA] transition-colors leading-snug line-clamp-3 mb-2">
							<a href="#">Vạn Phúc Care - Hành trình chăm sóc yêu thương và những dấu ấn tiên phong dịch vụ mẹ và bé</a>
						</h3>
						<p class="font-body text-xs sm:text-[13.5px] text-[#525252] leading-relaxed line-clamp-3 mb-4 flex-grow">
							Khởi đầu từ khát vọng mang đến sự chăm sóc chuyên nghiệp và hoàn hảo nhất cho mẹ và bé, Vạn Phúc Care đã trải qua một hành trình đầy tự hào.
						</p>
						
						<!-- Footer info -->
						<div class="flex items-center justify-between pt-3.5 border-t border-neutral-200/70 mt-auto">
							<div class="flex items-center gap-2">
								<div class="w-5 h-5 rounded-full bg-[#183059] flex items-center justify-center text-[7.5px] font-extrabold text-white tracking-tight shrink-0 shadow-xs">
									<span class="text-[#E53935] font-black mr-px">C</span>F
								</div>
								<span class="text-xs font-semibold text-neutral-800">CafeF</span>
							</div>
							<span class="text-xs text-neutral-400 font-medium">12/09/2024</span>
						</div>
					</div>
				</article>

				<!-- Card 2 -->
				<article class="min-w-[300px] w-[300px] md:min-w-0 md:w-auto snap-start bg-white rounded-2xl p-4 sm:p-5 border border-neutral-100 shadow-[0px_1px_5px_rgba(0,0,0,0.15)] hover:shadow-md transition-all duration-300 flex flex-col group shrink-0 md:shrink">
					<!-- Thumbnail Image -->
					<div class="relative w-full aspect-[268/208] rounded-xl overflow-hidden bg-neutral-200">
						<img src="<?php echo esc_url( $theme_uri . '/assets/images/press_event_2.jpg' ); ?>" alt="Vạn Phúc Care - Báo chí đưa tin" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" loading="lazy">
					</div>
					
					<!-- Content -->
					<div class="flex flex-col flex-grow pt-4">
						<h3 class="font-body font-semibold text-base sm:text-lg text-neutral-900 group-hover:text-[#1A77BA] transition-colors leading-snug line-clamp-3 mb-2">
							<a href="#">Vạn Phúc Care - Hành trình chăm sóc yêu thương và những dấu ấn tiên phong dịch vụ mẹ và bé</a>
						</h3>
						<p class="font-body text-xs sm:text-[13.5px] text-[#525252] leading-relaxed line-clamp-3 mb-4 flex-grow">
							Khởi đầu từ khát vọng mang đến sự chăm sóc chuyên nghiệp và hoàn hảo nhất cho mẹ và bé, Vạn Phúc Care đã trải qua một hành trình đầy tự hào.
						</p>
						
						<!-- Footer info -->
						<div class="flex items-center justify-between pt-3.5 border-t border-neutral-200/70 mt-auto">
							<div class="flex items-center gap-2">
								<div class="w-5 h-5 rounded-full bg-[#183059] flex items-center justify-center text-[7.5px] font-extrabold text-white tracking-tight shrink-0 shadow-xs">
									<span class="text-[#E53935] font-black mr-px">C</span>F
								</div>
								<span class="text-xs font-semibold text-neutral-800">CafeF</span>
							</div>
							<span class="text-xs text-neutral-400 font-medium">12/09/2024</span>
						</div>
					</div>
				</article>

				<!-- Card 3 -->
				<article class="min-w-[300px] w-[300px] md:min-w-0 md:w-auto snap-start bg-white rounded-2xl p-4 sm:p-5 border border-neutral-100 shadow-[0px_1px_5px_rgba(0,0,0,0.15)] hover:shadow-md transition-all duration-300 flex flex-col group shrink-0 md:shrink">
					<!-- Thumbnail Image -->
					<div class="relative w-full aspect-[268/208] rounded-xl overflow-hidden bg-neutral-200">
						<img src="<?php echo esc_url( $theme_uri . '/assets/images/press_event_3.jpg' ); ?>" alt="Vạn Phúc Care - Báo chí đưa tin" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" loading="lazy">
					</div>
					
					<!-- Content -->
					<div class="flex flex-col flex-grow pt-4">
						<h3 class="font-body font-semibold text-base sm:text-lg text-neutral-900 group-hover:text-[#1A77BA] transition-colors leading-snug line-clamp-3 mb-2">
							<a href="#">Vạn Phúc Care - Hành trình chăm sóc yêu thương và những dấu ấn tiên phong dịch vụ mẹ và bé</a>
						</h3>
						<p class="font-body text-xs sm:text-[13.5px] text-[#525252] leading-relaxed line-clamp-3 mb-4 flex-grow">
							Khởi đầu từ khát vọng mang đến sự chăm sóc chuyên nghiệp và hoàn hảo nhất cho mẹ và bé, Vạn Phúc Care đã trải qua một hành trình đầy tự hào.
						</p>
						
						<!-- Footer info -->
						<div class="flex items-center justify-between pt-3.5 border-t border-neutral-200/70 mt-auto">
							<div class="flex items-center gap-2">
								<div class="w-5 h-5 rounded-full bg-[#183059] flex items-center justify-center text-[7.5px] font-extrabold text-white tracking-tight shrink-0 shadow-xs">
									<span class="text-[#E53935] font-black mr-px">C</span>F
								</div>
								<span class="text-xs font-semibold text-neutral-800">CafeF</span>
							</div>
							<span class="text-xs text-neutral-400 font-medium">12/09/2024</span>
						</div>
					</div>
				</article>

			</div>

			<!-- Bottom CTA Button -->
			<div class="w-full flex justify-center mt-8 sm:mt-12">
				<a href="#" class="w-full sm:w-auto max-w-[350px] h-8 sm:h-10 px-8 rounded-full border border-[#F48283] text-[#F48283] font-sans font-normal text-xs sm:text-sm flex items-center justify-center hover:bg-[#FDE6E6]/60 transition-all shadow-xs hover:shadow-sm">
					Xem Tất Cả
				</a>
			</div>
		</div>
	</section>

	<!-- =========================================================================
	     10. ĐĂNG KÝ TƯ VẤN (SẴN SÀNG BẮT ĐẦU - HÀNH TRÌNH LÀM MẸ HẠNH PHÚC)
	     ========================================================================= -->
	<section id="dang-ky-tu-van" class="py-12 sm:py-20 relative overflow-hidden" style="background: linear-gradient(359.7deg, #D1E4F1 -14.05%, #F8F8F8 63.47%);">
		<div class="vpc-container max-w-4xl mx-auto flex flex-col items-center gap-6 sm:gap-10">
			
			<div class="text-center">
				<h2 class="font-heading font-semibold text-[32px] sm:text-4xl lg:text-[44px] leading-[36px] sm:leading-tight text-center">
					<span class="text-[#1A77BA] block uppercase">SẴN SÀNG BẮT ĐẦU</span>
					<span class="text-[#F48283] block uppercase mt-1">
						HÀNH TRÌNH LÀM <br class="sm:hidden">MẸ HẠNH PHÚC
					</span>
				</h2>
			</div>

			<div class="w-full max-w-[350px] sm:max-w-2xl bg-[#FAFAFA] border border-[#CECECE]/60 rounded-[24px] p-5 sm:p-8 md:p-10 shadow-[0px_1px_5px_rgba(0,0,0,0.15)]">
				<form class="space-y-4 sm:space-y-5" onsubmit="event.preventDefault(); alert('Cảm ơn bạn! Đội ngũ chuyên gia y tế của Vạn Phúc Care sẽ liên hệ tư vấn chi tiết trong vòng 15 phút.');">
					
					<!-- Họ và tên -->
					<div class="flex flex-col gap-2">
						<label class="font-sans font-medium text-base sm:text-lg text-[#292929]">
							<span class="text-[#FF0000]">*</span> Họ và tên
						</label>
						<input type="text" required placeholder="Nguyễn Như Linh" 
						       class="w-full h-[50px] px-4 rounded-xl border border-[#CECECE] bg-[#FAFAFA] text-[#292929] placeholder-[#CECECE] font-sans text-base focus:border-[#1A77BA] focus:outline-none transition-all">
					</div>

					<!-- Số điện thoại -->
					<div class="flex flex-col gap-2">
						<label class="font-sans font-medium text-base sm:text-lg text-[#292929]">
							<span class="text-[#FF0000]">*</span> Số điện thoại
						</label>
						<input type="tel" required placeholder="0345678***" 
						       class="w-full h-[50px] px-4 rounded-xl border border-[#CECECE] bg-[#FAFAFA] text-[#292929] placeholder-[#CECECE] font-sans text-base focus:border-[#1A77BA] focus:outline-none transition-all">
					</div>

					<!-- Dịch vụ quan tâm -->
					<div class="flex flex-col gap-2">
						<label class="font-sans font-medium text-base sm:text-lg text-[#292929]">
							<span class="text-[#FF0000]">*</span> Dịch vụ quan tâm
						</label>
						<div class="relative">
							<select class="w-full h-[50px] px-4 rounded-xl border border-[#CECECE] bg-[#FAFAFA] text-[#292929] font-sans text-base focus:border-[#1A77BA] focus:outline-none transition-all appearance-none pr-10">
								<option value="" disabled selected class="text-[#CECECE]">Chọn dịch vụ</option>
								<option value="o-cu">Trung tâm ở cữ 35B/399 Âu Cơ, Tây Hồ</option>
								<option value="tam-be">Tắm bé sơ sinh & Massage tại nhà</option>
								<option value="cham-soc-me">Chăm sóc mẹ sau sinh toàn diện</option>
								<option value="thong-tac">Thông tắc tia sữa sóng siêu âm không đau</option>
								<option value="khoa-hoc-easy">Khóa học & Rèn tự ngủ EASY chuẩn y khoa</option>
								<option value="bao-mau">Bảo mẫu y tế tại nhà</option>
							</select>
							<div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-[#292929]">
								<svg class="w-5 h-5 text-[#292929]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/></svg>
							</div>
						</div>
					</div>

					<!-- Câu hỏi -->
					<div class="flex flex-col gap-2">
						<label class="font-sans font-medium text-base sm:text-lg text-[#292929]">
							Câu hỏi
						</label>
						<input type="text" placeholder="Cho chúng tôi biết thêm về nhu cầu." 
						       class="w-full h-[50px] px-4 rounded-xl border border-[#CECECE] bg-[#FAFAFA] text-[#292929] placeholder-[#CECECE] font-sans text-base focus:border-[#1A77BA] focus:outline-none transition-all">
					</div>

					<!-- Submit Button -->
					<div class="pt-2">
						<button type="submit" class="w-full h-11 sm:h-12 bg-[#1A77BA] hover:bg-[#155F95] active:bg-[#104770] text-[#FAFAFA] rounded-full font-sans font-medium text-sm sm:text-base flex items-center justify-center transition-all cursor-pointer shadow-xs">
							Gửi Tư Vấn Ngay
						</button>
					</div>
				</form>
			</div>

		</div>
	</section>

	<!-- =========================================================================
	     11. KIẾN THỨC NUÔI CON (Blog / Knowledge Section)
	     ========================================================================= -->
	<section id="kien-thuc-nuoi-con" class="py-12 sm:py-20 lg:py-24 bg-[#F8F8F8] relative overflow-hidden">
		<div class="vpc-container">
			<!-- Section Header -->
			<div class="text-center max-w-3xl mx-auto mb-8 sm:mb-12">
				<!-- Badge -->
				<div class="inline-flex items-center justify-center gap-2 px-3.5 py-1 bg-[#FDE6E6] border border-[#F48283] rounded-full mb-3 shadow-xs">
					<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-[#F48283] shrink-0">
						<path d="M12 2L13.8 8.6L20.4 10.4L13.8 12.2L12 18.8L10.2 12.2L3.6 10.4L10.2 8.6L12 2Z" fill="currentColor"/>
					</svg>
					<span class="font-sans font-medium text-xs sm:text-sm tracking-wider uppercase text-[#155F95]">BÀI VIẾT NỔI BẬT</span>
				</div>

				<!-- Title -->
				<h2 class="font-heading font-semibold text-[32px] sm:text-4xl lg:text-[44px] leading-[36px] sm:leading-tight text-center text-[#1A77BA]">
					Kiến Thức Nuôi Con
				</h2>
			</div>

			<!-- 3 Blog Cards (Mobile horizontal scroll snap, Desktop grid) -->
			<div class="flex flex-row overflow-x-auto scrollbar-none gap-4 px-5 -mx-5 pb-2 snap-x snap-mandatory md:grid md:grid-cols-2 lg:grid-cols-3 md:mx-0 md:px-0 md:pb-0">
				
				<!-- Card 1 -->
				<article class="min-w-[290px] w-[290px] md:min-w-0 md:w-auto snap-start bg-white rounded-xl p-3 sm:p-5 border border-neutral-100 shadow-[0px_4px_19px_rgba(0,0,0,0.08)] hover:shadow-md transition-all duration-300 flex flex-col group shrink-0 md:shrink">
					<!-- Thumbnail Image -->
					<div class="relative w-full aspect-[266/219] rounded-lg overflow-hidden bg-neutral-100 mb-3">
						<img src="<?php echo esc_url( $theme_uri . '/assets/images/blog_post_ultrasound.jpg' ); ?>" alt="Sữa Trưởng Thành: Giai đoạn hoàn thiện của sữa mẹ" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" loading="lazy">
					</div>
					
					<!-- Content -->
					<div class="flex flex-col flex-grow">
						<span class="text-[#1A77BA] font-semibold text-xs sm:text-sm mb-1.5 block">Cẩm nang cho mẹ</span>
						<h3 class="font-body font-bold text-base sm:text-lg text-neutral-900 group-hover:text-[#1A77BA] transition-colors leading-snug line-clamp-2 mb-2">
							<a href="#">Sữa Trưởng Thành: Giai đoạn hòa thiện của sữa mẹ</a>
						</h3>
						<p class="font-body text-xs sm:text-[13.5px] text-[#525252] leading-relaxed line-clamp-3 mb-4 flex-grow">
							Khởi đầu từ khát vọng mang đến sự chăm sóc chuyên nghiệp và hoàn hảo nhất cho mẹ và bé, Vạn Phúc Care đã trải qua một hành trình đầy tự hào.
						</p>
						
						<!-- Footer info -->
						<div class="flex items-center justify-between pt-3 border-t border-neutral-100 mt-auto">
							<div class="flex items-center gap-2">
								<img src="<?php echo esc_url( $theme_uri . '/assets/images/avatars/avatar_1.jpg' ); ?>" alt="Tác giả" class="w-5 h-5 rounded-full object-cover shrink-0">
								<span class="text-xs font-medium text-neutral-700">Tên tác giả</span>
							</div>
							<span class="text-xs text-neutral-400 font-medium">12/09/2024</span>
						</div>
					</div>
				</article>

				<!-- Card 2 -->
				<article class="min-w-[290px] w-[290px] md:min-w-0 md:w-auto snap-start bg-white rounded-xl p-3 sm:p-5 border border-neutral-100 shadow-[0px_4px_19px_rgba(0,0,0,0.08)] hover:shadow-md transition-all duration-300 flex flex-col group shrink-0 md:shrink">
					<!-- Thumbnail Image -->
					<div class="relative w-full aspect-[266/219] rounded-lg overflow-hidden bg-neutral-100 mb-3">
						<img src="<?php echo esc_url( $theme_uri . '/assets/images/blog_post_ultrasound.jpg' ); ?>" alt="Sữa Trưởng Thành: Giai đoạn hoàn thiện của sữa mẹ" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" loading="lazy">
					</div>
					
					<!-- Content -->
					<div class="flex flex-col flex-grow">
						<span class="text-[#1A77BA] font-semibold text-xs sm:text-sm mb-1.5 block">Cẩm nang cho mẹ</span>
						<h3 class="font-body font-bold text-base sm:text-lg text-neutral-900 group-hover:text-[#1A77BA] transition-colors leading-snug line-clamp-2 mb-2">
							<a href="#">Sữa Trưởng Thành: Giai đoạn hòa thiện của sữa mẹ</a>
						</h3>
						<p class="font-body text-xs sm:text-[13.5px] text-[#525252] leading-relaxed line-clamp-3 mb-4 flex-grow">
							Khởi đầu từ khát vọng mang đến sự chăm sóc chuyên nghiệp và hoàn hảo nhất cho mẹ và bé, Vạn Phúc Care đã trải qua một hành trình đầy sáng tạo.
						</p>
						
						<!-- Footer info -->
						<div class="flex items-center justify-between pt-3 border-t border-neutral-100 mt-auto">
							<div class="flex items-center gap-2">
								<img src="<?php echo esc_url( $theme_uri . '/assets/images/avatars/avatar_1.jpg' ); ?>" alt="Tác giả" class="w-5 h-5 rounded-full object-cover shrink-0">
								<span class="text-xs font-medium text-neutral-700">Tên tác giả</span>
							</div>
							<span class="text-xs text-neutral-400 font-medium">12/09/2024</span>
						</div>
					</div>
				</article>

				<!-- Card 3 -->
				<article class="min-w-[290px] w-[290px] md:min-w-0 md:w-auto snap-start bg-white rounded-xl p-3 sm:p-5 border border-neutral-100 shadow-[0px_4px_19px_rgba(0,0,0,0.08)] hover:shadow-md transition-all duration-300 flex flex-col group shrink-0 md:shrink">
					<!-- Thumbnail Image -->
					<div class="relative w-full aspect-[266/219] rounded-lg overflow-hidden bg-neutral-100 mb-3">
						<img src="<?php echo esc_url( $theme_uri . '/assets/images/blog_post_ultrasound.jpg' ); ?>" alt="Sữa Trưởng Thành: Giai đoạn hoàn thiện của sữa mẹ" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" loading="lazy">
					</div>
					
					<!-- Content -->
					<div class="flex flex-col flex-grow">
						<span class="text-[#1A77BA] font-semibold text-xs sm:text-sm mb-1.5 block">Cẩm nang cho mẹ</span>
						<h3 class="font-body font-bold text-base sm:text-lg text-neutral-900 group-hover:text-[#1A77BA] transition-colors leading-snug line-clamp-2 mb-2">
							<a href="#">Sữa Trưởng Thành: Giai đoạn hòa thiện của sữa mẹ</a>
						</h3>
						<p class="font-body text-xs sm:text-[13.5px] text-[#525252] leading-relaxed line-clamp-3 mb-4 flex-grow">
							Khởi đầu từ khát vọng mang đến sự chăm sóc chuyên nghiệp và hoàn hảo nhất cho mẹ và bé, Vạn Phúc Care đã trải qua một hành trình đầy sáng tạo.
						</p>
						
						<!-- Footer info -->
						<div class="flex items-center justify-between pt-3 border-t border-neutral-100 mt-auto">
							<div class="flex items-center gap-2">
								<img src="<?php echo esc_url( $theme_uri . '/assets/images/avatars/avatar_1.jpg' ); ?>" alt="Tác giả" class="w-5 h-5 rounded-full object-cover shrink-0">
								<span class="text-xs font-medium text-neutral-700">Tên tác giả</span>
							</div>
							<span class="text-xs text-neutral-400 font-medium">12/09/2024</span>
						</div>
					</div>
				</article>

			</div>

			<!-- Bottom CTA Button -->
			<div class="text-center mt-8 sm:mt-12 flex justify-center">
				<a href="#" class="w-full max-w-[350px] sm:w-auto inline-flex items-center justify-center px-8 py-2 sm:py-3 rounded-full bg-transparent border border-[#F48283] text-[#F48283] font-medium text-xs sm:text-base hover:bg-[#FDE6E6]/60 transition-all">
					Xem Tất Cả
				</a>
			</div>
		</div>
	</section>

<?php
get_footer();
