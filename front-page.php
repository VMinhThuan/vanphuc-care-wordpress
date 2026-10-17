<?php
/**
 * Front page template for Vạn Phúc Care.
 * Standardized to VPC Design System (Figma ver3.0 / Hand-off Round 1).
 * Exactly matches Figma Homepage Structure:
 * - 1. Hero Promotional Banner (Khóa học chăm bé sơ sinh 100% miễn phí)
 * - 2. Dịch vụ nổi bật (Hành trình cùng mẹ, trải đầy yêu thương)
 * - 3. Không gian nghỉ dưỡng (Trung tâm ở cữ 35B/399 Âu Cơ, Tây Hồ)
 * - 4. Dịch vụ tại nhà (Giải pháp tại nhà, chăm sóc chuẩn y khoa)
 * - 5. Đào tạo & Hướng dẫn (Nuôi con không phải là cuộc chiến, đồng hành cùng chuyên gia)
 * - 6. Quy trình chăm sóc chuẩn Y khoa (4 bước)
 * - 7. Vì sao chọn Vạn Phúc Care (Lý do chọn)
 * - 8. Cảm nhận của khách hàng (8 Feedback cards)
 * - 9. Báo chí nói về chúng tôi (VTV, Dân Trí, VnExpress)
 * - 10. Đăng ký tư vấn (Form tư vấn trực tuyến)
 * - 11. Kiến thức & Tin tức mới nhất (3 Blog cards)
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
$theme_uri = get_template_directory_uri();
?>

<!-- =========================================================================
     1. HERO PROMOTIONAL BANNER (Khóa Học Chăm Bé Sơ Sinh Miễn Phí)
     ========================================================================= -->
<section class="hero-banner-section py-4 sm:py-6 bg-[#FAFAFA]">
	<div class="vpc-container">
		<div class="relative overflow-hidden rounded-3xl sm:rounded-4xl bg-linear-to-r from-[#D8F0FE] via-[#E8F6FE] to-[#FDF4E7] border border-primary-200/60 shadow-lg px-6 py-8 sm:px-10 sm:py-12 xl:px-14 xl:py-14">
			
			<!-- Decorative Background Ornaments -->
			<div class="pointer-events-none absolute -top-16 -right-16 w-64 h-64 rounded-full bg-secondary-300/20 blur-2xl" aria-hidden="true"></div>
			<div class="pointer-events-none absolute -bottom-16 -left-16 w-64 h-64 rounded-full bg-primary-300/25 blur-2xl" aria-hidden="true"></div>
			
			<div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center relative z-10">
				<!-- Left Content: Texts & CTA -->
				<div class="lg:col-span-7 flex flex-col items-start space-y-4 sm:space-y-5">
					<div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-white/90 border border-primary-300/50 shadow-xs text-xs sm:text-sm font-bold text-primary-600">
						<svg class="w-4 h-4 text-amber-500 fill-current" viewBox="0 0 20 20">
							<path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
						</svg>
						<span>ĐĂNG KÝ KHÓA HỌC</span>
					</div>

					<h1 class="font-heading text-2xl sm:text-4xl xl:text-5xl font-black text-neutral-900 leading-[1.2] tracking-tight">
						KHÓA HỌC CHĂM BÉ <br class="hidden sm:inline">
						<span class="inline-block mt-1 sm:mt-0 px-3 py-1 bg-secondary-400 text-white rounded-xl text-xl sm:text-3xl font-extrabold uppercase shadow-sm">
							MIỄN PHÍ 100%
						</span>
					</h1>

					<p class="text-sm sm:text-base xl:text-lg text-neutral-700 font-medium max-w-xl leading-relaxed">
						Chương trình đào tạo thực hành chuẩn Y khoa dành cho ba mẹ chuẩn bị hoặc vừa đón thiên thần nhỏ (0 - 12 tháng) chào đời.
					</p>

					<!-- Value highlights -->
					<div class="flex flex-wrap items-center gap-3 pt-1 text-xs sm:text-sm font-semibold text-neutral-800">
						<span class="inline-flex items-center gap-1.5 bg-white/80 px-3 py-1.5 rounded-lg shadow-xs">
							<svg class="w-4 h-4 text-primary-500 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
							Bác sĩ & Điều dưỡng trực tiếp
						</span>
						<span class="inline-flex items-center gap-1.5 bg-white/80 px-3 py-1.5 rounded-lg shadow-xs">
							<svg class="w-4 h-4 text-primary-500 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
							Cẩm nang rèn EASY độc quyền
						</span>
						<span class="inline-flex items-center gap-1.5 bg-white/80 px-3 py-1.5 rounded-lg shadow-xs">
							<svg class="w-4 h-4 text-primary-500 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
							Thực hành tắm & tự ngủ
						</span>
					</div>

					<div class="pt-2">
						<button data-open-modal="vpc-consultation-modal" class="inline-flex items-center gap-3 px-6 sm:px-8 py-3 sm:py-3.5 rounded-full bg-linear-to-r from-primary-500 to-primary-600 text-white font-bold text-sm sm:text-base shadow-md shadow-primary-500/30 hover:shadow-lg hover:shadow-primary-500/40 hover:-translate-y-0.5 active:translate-y-0 transition-all duration-200">
							<span>Đăng ký nhận vé ngay</span>
							<svg class="w-5 h-5 transition-transform duration-200 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
								<path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
							</svg>
						</button>
					</div>
				</div>

				<!-- Right Visual: Illustrated Banner Art -->
				<div class="lg:col-span-5 relative flex justify-center">
					<div class="relative w-full max-w-[420px] rounded-2xl overflow-hidden border-2 border-white/80 shadow-md">
						<img src="<?php echo esc_url( $theme_uri . '/assets/images/banner_khoahoc.png' ); ?>" 
						     alt="Khóa học chăm bé Vạn Phúc Care" 
						     class="w-full h-auto object-cover block" />
					</div>
				</div>
			</div>

		</div>
	</div>
</section>

<!-- =========================================================================
     2. DỊCH VỤ NỔI BẬT: HÀNH TRÌNH CÙNG MẸ - TRẢI ĐẦY YÊU THƯƠNG
     ========================================================================= -->
<section id="dich-vu-noi-bat" class="py-14 sm:py-20 bg-white">
	<div class="vpc-container">
		<div class="grid grid-cols-1 lg:grid-cols-12 gap-10 xl:gap-14 items-center">
			
			<!-- Left: Layered Photo Collage -->
			<div class="lg:col-span-5 relative">
				<div class="relative mx-auto max-w-[440px]">
					<div class="overflow-hidden rounded-3xl border-4 border-white shadow-xl bg-primary-50">
						<img src="<?php echo esc_url( $theme_uri . '/assets/images/sec2_photo.png' ); ?>" 
						     alt="Chăm sóc mẹ và bé chuẩn y khoa" 
						     class="w-full h-auto object-cover block" />
					</div>
					
					<!-- Floating Badge: 100% Điều dưỡng Y khoa -->
					<div class="absolute -top-4 -left-4 sm:top-4 sm:-left-6 bg-white/95 backdrop-blur-md px-4 py-2.5 rounded-2xl shadow-lg border border-neutral-200 flex items-center gap-2.5 animate-bounce-subtle">
						<span class="w-3 h-3 rounded-full bg-emerald-500 animate-pulse"></span>
						<div class="flex flex-col">
							<span class="text-xs font-bold text-neutral-900">100% Điều dưỡng</span>
							<span class="text-[11px] text-text-body-muted">Chính quy Y khoa</span>
						</div>
					</div>
				</div>
			</div>

			<!-- Right: Content & Value Props -->
			<div class="lg:col-span-7 flex flex-col space-y-5">
				<div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-secondary-100 text-secondary-600 font-bold text-xs uppercase tracking-wider w-fit">
					<span>DỊCH VỤ NỔI BẬT</span>
				</div>

				<h2 class="font-heading text-2xl sm:text-3xl xl:text-4xl font-bold leading-tight">
					<span class="text-primary-600">Hành Trình Cùng Mẹ</span><br>
					<span class="text-secondary-400">Trải Đầy Yêu Thương</span>
				</h2>

				<p class="text-text-body-muted text-sm sm:text-base leading-relaxed">
					Vạn Phúc Care tự hào là đơn vị tiên phong cung cấp giải pháp chăm sóc mẹ và bé sau sinh toàn diện, với quy trình chuẩn Y khoa và đội ngũ điều dưỡng giàu y đức.
				</p>

				<!-- Value checklist -->
				<ul class="space-y-3.5 pt-1 text-sm sm:text-base text-neutral-800">
					<li class="flex items-start gap-3">
						<div class="w-5 h-5 rounded-full bg-primary-100 text-primary-600 flex items-center justify-center shrink-0 mt-0.5">
							<svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
						</div>
						<span><strong>Đội ngũ 100% y tá, điều dưỡng, nữ hộ sinh</strong> có chứng chỉ hành nghề y tế chính quy.</span>
					</li>
					<li class="flex items-start gap-3">
						<div class="w-5 h-5 rounded-full bg-primary-100 text-primary-600 flex items-center justify-center shrink-0 mt-0.5">
							<svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
						</div>
						<span><strong>Quy trình vô trùng nghiêm ngặt</strong> kiểm soát nhiễm khuẩn theo tiêu chuẩn Bộ Y Tế.</span>
					</li>
					<li class="flex items-start gap-3">
						<div class="w-5 h-5 rounded-full bg-primary-100 text-primary-600 flex items-center justify-center shrink-0 mt-0.5">
							<svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
						</div>
						<span><strong>Phác đồ phục hồi cá nhân hóa</strong> kết hợp thảo dược thiên nhiên và massage trị liệu chuẩn Đông y.</span>
					</li>
				</ul>

				<!-- Stats Counter Boxes (3 items) -->
				<div class="grid grid-cols-3 gap-3 sm:gap-4 pt-2">
					<div class="rounded-2xl border border-neutral-200 bg-[#FAFAFA] p-3 sm:p-4 text-center">
						<div class="font-heading text-xl sm:text-2xl font-black text-primary-600">100%</div>
						<div class="text-[11px] sm:text-xs text-text-body-muted font-medium mt-1">Y tá chính quy</div>
					</div>
					<div class="rounded-2xl border border-neutral-200 bg-[#FAFAFA] p-3 sm:p-4 text-center">
						<div class="font-heading text-xl sm:text-2xl font-black text-secondary-500">10.000+</div>
						<div class="text-[11px] sm:text-xs text-text-body-muted font-medium mt-1">Mẹ tin dùng</div>
					</div>
					<div class="rounded-2xl border border-neutral-200 bg-[#FAFAFA] p-3 sm:p-4 text-center">
						<div class="font-heading text-xl sm:text-2xl font-black text-amber-500">4.9/5</div>
						<div class="text-[11px] sm:text-xs text-text-body-muted font-medium mt-1">Đánh giá cao</div>
					</div>
				</div>

				<div class="pt-2">
					<button data-open-modal="vpc-consultation-modal" class="inline-flex items-center gap-2 px-6 py-3 rounded-full bg-primary-500 hover:bg-primary-600 text-white font-bold text-sm shadow-md transition-all duration-200 hover:gap-3">
						<span>Xem chi tiết dịch vụ</span>
						<svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
					</button>
				</div>
			</div>

		</div>
	</div>
</section>

<!-- =========================================================================
     3. KHÔNG GIAN NGHỈ DƯỠNG (Trung Tâm Ở Cữ 35B/399 Âu Cơ, Tây Hồ)
     ========================================================================= -->
<section id="trung-tam-o-cu" class="py-14 sm:py-20 bg-linear-to-b from-primary-50/40 via-white to-primary-50/30 border-y border-neutral-200/80">
	<div class="vpc-container">
		
		<!-- Section Header -->
		<div class="text-center max-w-2xl mx-auto mb-10 sm:mb-12">
			<div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-primary-100 text-primary-600 font-bold text-xs uppercase tracking-wider mb-3">
				<span>KHÔNG GIAN NGHỈ DƯỠNG</span>
			</div>
			<h2 class="font-heading text-2xl sm:text-3xl xl:text-4xl font-bold leading-tight">
				<span class="text-primary-600">An Toàn Trọn Dưỡng, </span><br class="sm:hidden">
				<span class="text-secondary-400">Tiện Nghi Chuẩn Y Khoa</span>
			</h2>
			<p class="text-text-body-muted text-sm sm:text-base mt-3">
				Không gian nghỉ dưỡng đẳng cấp, yên tĩnh và vô trùng tuyệt đối cho mẹ và bé giữa lòng thủ đô.
			</p>
		</div>

		<!-- Big Feature Card: Luxury Room -->
		<div class="rounded-3xl sm:rounded-4xl bg-white border border-neutral-200/90 shadow-xl overflow-hidden">
			<!-- Room Photo Banner -->
			<div class="relative w-full overflow-hidden max-h-[460px] bg-neutral-100">
				<img src="<?php echo esc_url( $theme_uri . '/assets/images/auco_room.png' ); ?>" 
				     alt="Phòng nghỉ dưỡng Vạn Phúc Care Âu Cơ" 
				     class="w-full h-auto object-cover block" />
			</div>

			<!-- Room Specs Bar -->
			<div class="p-6 sm:p-8 xl:p-10 border-b border-neutral-200/80 bg-white">
				<div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-center">
					<!-- Left Info -->
					<div class="lg:col-span-7">
						<h3 class="font-heading text-xl sm:text-2xl font-bold text-neutral-900">
							Phòng Nghỉ Tiêu Chuẩn Tại 35B/399 Âu Cơ, Tây Hồ, Hà Nội
						</h3>
						<p class="text-sm sm:text-base text-text-body-muted mt-2 leading-relaxed">
							Hệ thống phòng nghỉ thiết kế theo tiêu chuẩn khách sạn cao cấp, khép kín hoàn toàn, đón trọn ánh sáng tự nhiên và gió mát Hồ Tây.
						</p>
					</div>
					<!-- Right Key Specs with Icons -->
					<div class="lg:col-span-5 flex flex-col gap-2.5 text-xs sm:text-sm font-medium text-neutral-800">
						<div class="flex items-center gap-2.5">
							<span class="w-7 h-7 rounded-lg bg-primary-100 text-primary-600 flex items-center justify-center shrink-0">📐</span>
							<span><strong>Diện tích:</strong> 35m² - 50m² khép kín tiện nghi</span>
						</div>
						<div class="flex items-center gap-2.5">
							<span class="w-7 h-7 rounded-lg bg-primary-100 text-primary-600 flex items-center justify-center shrink-0">🛋️</span>
							<span><strong>Tiện nghi:</strong> Full nội thất cao cấp, máy hút sữa Medela</span>
						</div>
						<div class="flex items-center gap-2.5">
							<span class="w-7 h-7 rounded-lg bg-primary-100 text-primary-600 flex items-center justify-center shrink-0">🌿</span>
							<span><strong>Không gian:</strong> View thoáng đãng, lọc khí vô trùng 24/7</span>
						</div>
					</div>
				</div>
			</div>

			<!-- 3 Highlights Badges + Buttons -->
			<div class="px-6 py-6 sm:px-8 sm:py-8 bg-[#FAFAFA] flex flex-col lg:flex-row items-center justify-between gap-6">
				<!-- 3 Highlights -->
				<div class="grid grid-cols-1 sm:grid-cols-3 gap-4 w-full lg:w-auto">
					<div class="flex items-center gap-2.5 text-xs sm:text-sm font-semibold text-neutral-800">
						<span class="w-8 h-8 rounded-full bg-secondary-100 text-secondary-500 flex items-center justify-center shrink-0">🌸</span>
						<span>Phòng nghỉ khép kín riêng tư</span>
					</div>
					<div class="flex items-center gap-2.5 text-xs sm:text-sm font-semibold text-neutral-800">
						<span class="w-8 h-8 rounded-full bg-primary-100 text-primary-600 flex items-center justify-center shrink-0">🍲</span>
						<span>Dinh dưỡng chuyên sâu 5-6 bữa</span>
					</div>
					<div class="flex items-center gap-2.5 text-xs sm:text-sm font-semibold text-neutral-800">
						<span class="w-8 h-8 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center shrink-0">🩺</span>
						<span>Y bác sĩ & Điều dưỡng 24/7</span>
					</div>
				</div>

				<!-- Action Buttons -->
				<div class="flex flex-wrap items-center gap-3 w-full sm:w-auto shrink-0">
					<button data-open-modal="vpc-consultation-modal" class="w-full sm:w-auto px-6 py-3 rounded-full bg-primary-500 hover:bg-primary-600 text-white font-bold text-sm shadow-md transition-colors">
						Xem chi tiết
					</button>
					<button data-open-modal="vpc-consultation-modal" class="w-full sm:w-auto px-6 py-3 rounded-full border border-secondary-400 text-secondary-600 hover:bg-secondary-50 font-bold text-sm transition-colors">
						Đặt lịch trải nghiệm
					</button>
				</div>
			</div>
		</div>

	</div>
</section>

<!-- =========================================================================
     4. DỊCH VỤ TẠI NHÀ (Chăm Sóc Sau Sinh & Tắm Bé Tại Nhà)
     ========================================================================= -->
<section id="dich-vu-tai-nha" class="py-14 sm:py-20 bg-white">
	<div class="vpc-container">
		<div class="grid grid-cols-1 lg:grid-cols-12 gap-10 xl:gap-14 items-center">
			
			<!-- Left Photo Collage -->
			<div class="lg:col-span-5 relative">
				<div class="relative mx-auto max-w-[440px] rounded-3xl overflow-hidden border-4 border-white shadow-xl bg-primary-50">
					<img src="<?php echo esc_url( $theme_uri . '/assets/images/home_care.png' ); ?>" 
					     alt="Dịch vụ chăm sóc mẹ và bé tại nhà" 
					     class="w-full h-auto object-cover block" />
				</div>
			</div>

			<!-- Right Content -->
			<div class="lg:col-span-7 flex flex-col space-y-5">
				<div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-secondary-100 text-secondary-600 font-bold text-xs uppercase tracking-wider w-fit">
					<span>DỊCH VỤ TẠI NHÀ</span>
				</div>

				<h2 class="font-heading text-2xl sm:text-3xl xl:text-4xl font-bold leading-tight">
					<span class="text-primary-600">Giải Pháp Tại Nhà, </span><br>
					<span class="text-secondary-400">Chăm Sóc Chuẩn Y Khoa</span>
				</h2>

				<p class="text-text-body-muted text-sm sm:text-base leading-relaxed">
					Dịch vụ chăm sóc tận nơi giúp mẹ an tâm kiêng cữ trong chính ngôi nhà thân quen mà vẫn được hưởng trọn tiêu chuẩn y tế cao cấp nhất từ đội ngũ điều dưỡng giàu kinh nghiệm.
				</p>

				<ul class="space-y-3.5 pt-1 text-sm sm:text-base text-neutral-800">
					<li class="flex items-start gap-3">
						<div class="w-5 h-5 rounded-full bg-primary-100 text-primary-600 flex items-center justify-center shrink-0 mt-0.5">
							<svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
						</div>
						<span><strong>Tắm bé & massage y khoa:</strong> Vệ sinh rốn vô trùng, massage kích thích tuần hoàn máu và các bài tập vận động sớm.</span>
					</li>
					<li class="flex items-start gap-3">
						<div class="w-5 h-5 rounded-full bg-primary-100 text-primary-600 flex items-center justify-center shrink-0 mt-0.5">
							<svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
						</div>
						<span><strong>Chăm sóc mẹ sau sinh toàn diện:</strong> Vệ sinh vết mổ/tầng sinh môn, xông hơ thảo dược vùng kín, thông kinh lạc giảm đau.</span>
					</li>
					<li class="flex items-start gap-3">
						<div class="w-5 h-5 rounded-full bg-primary-100 text-primary-600 flex items-center justify-center shrink-0 mt-0.5">
							<svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
						</div>
						<span><strong>Thông tắc tia sữa không đau:</strong> Công nghệ sóng siêu âm đa tần, giải tỏa tia tắc ngay buổi đầu tiên.</span>
					</li>
				</ul>

				<!-- Highlight badges -->
				<div class="flex flex-wrap items-center gap-3 pt-2 text-xs sm:text-sm font-semibold text-neutral-800">
					<div class="inline-flex items-center gap-2 px-3.5 py-2 rounded-xl bg-primary-50 border border-primary-200 text-primary-700">
						<span>⏱️ Có mặt cấp tốc sau 30-45 phút</span>
					</div>
					<div class="inline-flex items-center gap-2 px-3.5 py-2 rounded-xl bg-secondary-50 border border-secondary-200 text-secondary-700">
						<span>🌿 100% Thảo dược thiên nhiên an toàn</span>
					</div>
				</div>

				<div class="flex flex-wrap items-center gap-3 pt-2">
					<button data-open-modal="vpc-consultation-modal" class="px-6 py-3 rounded-full bg-primary-500 hover:bg-primary-600 text-white font-bold text-sm shadow-md transition-colors">
						Xem chi tiết
					</button>
					<button data-open-modal="vpc-consultation-modal" class="px-6 py-3 rounded-full border border-neutral-300 hover:border-primary-500 font-bold text-sm text-neutral-800 transition-colors">
						Đăng ký tư vấn
					</button>
				</div>
			</div>

		</div>
	</div>
</section>

<!-- =========================================================================
     5. ĐÀO TẠO & HƯỚNG DẪN: NUÔI CON KHÔNG PHẢI LÀ CUỘC CHIẾN (EASY)
     ========================================================================= -->
<section id="dao-tao-easy" class="py-14 sm:py-20 bg-[#FAFAFA] border-y border-neutral-200/80">
	<div class="vpc-container">
		<div class="grid grid-cols-1 lg:grid-cols-12 gap-10 xl:gap-14 items-center">
			
			<!-- Left Photo Collage -->
			<div class="lg:col-span-5 relative">
				<div class="relative mx-auto max-w-[440px] rounded-3xl overflow-hidden border-4 border-white shadow-xl bg-primary-50">
					<img src="<?php echo esc_url( $theme_uri . '/assets/images/easy_class.png' ); ?>" 
					     alt="Khóa học nuôi con EASY Vạn Phúc Care" 
					     class="w-full h-auto object-cover block" />
				</div>
			</div>

			<!-- Right Content -->
			<div class="lg:col-span-7 flex flex-col space-y-5">
				<div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-secondary-100 text-secondary-600 font-bold text-xs uppercase tracking-wider w-fit">
					<span>ĐÀO TẠO & HƯỚNG DẪN</span>
				</div>

				<h2 class="font-heading text-2xl sm:text-3xl xl:text-4xl font-bold leading-tight">
					<span class="text-primary-600">Nuôi Con Không Phải Là Cuộc Chiến, </span><br>
					<span class="text-secondary-400">Đồng Hành Cùng Chuyên Gia</span>
				</h2>

				<p class="text-text-body-muted text-sm sm:text-base leading-relaxed">
					Chương trình huấn luyện và đồng hành 1:1 cùng chuyên gia giúp ba mẹ thiết lập nếp sinh hoạt EASY chuẩn khoa học, hiểu rõ nhu cầu của bé và giúp con tự ngủ dễ dàng.
				</p>

				<ul class="space-y-3.5 pt-1 text-sm sm:text-base text-neutral-800">
					<li class="flex items-start gap-3">
						<div class="w-5 h-5 rounded-full bg-primary-100 text-primary-600 flex items-center justify-center shrink-0 mt-0.5">
							<svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
						</div>
						<span><strong>Thiết lập chu kỳ sinh hoạt EASY:</strong> Giúp bé ăn no, ngủ đẫy giấc, không bế ru xuyên đêm.</span>
					</li>
					<li class="flex items-start gap-3">
						<div class="w-5 h-5 rounded-full bg-primary-100 text-primary-600 flex items-center justify-center shrink-0 mt-0.5">
							<svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
						</div>
						<span><strong>Xử lý các tình huống biếng ăn, khóc dạ đề:</strong> Kỹ thuật vỗ ợ hơi, quấn chũn và tiếng ồn trắng chuẩn y tế.</span>
					</li>
					<li class="flex items-start gap-3">
						<div class="w-5 h-5 rounded-full bg-primary-100 text-primary-600 flex items-center justify-center shrink-0 mt-0.5">
							<svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
						</div>
						<span><strong>Huấn luyện trực tiếp 1:1:</strong> Chuyên gia đồng hành theo sát tiến độ hàng ngày cùng ba mẹ.</span>
					</li>
				</ul>

				<!-- Stats -->
				<div class="grid grid-cols-3 gap-3 sm:gap-4 pt-2">
					<div class="rounded-2xl border border-neutral-200 bg-white p-3 sm:p-4 text-center shadow-xs">
						<div class="font-heading text-xl sm:text-2xl font-black text-primary-600">500+</div>
						<div class="text-[11px] sm:text-xs text-text-body-muted font-medium mt-1">Lớp học tổ chức</div>
					</div>
					<div class="rounded-2xl border border-neutral-200 bg-white p-3 sm:p-4 text-center shadow-xs">
						<div class="font-heading text-xl sm:text-2xl font-black text-secondary-500">15.000+</div>
						<div class="text-[11px] sm:text-xs text-text-body-muted font-medium mt-1">Ba mẹ tham gia</div>
					</div>
					<div class="rounded-2xl border border-neutral-200 bg-white p-3 sm:p-4 text-center shadow-xs">
						<div class="font-heading text-xl sm:text-2xl font-black text-emerald-500">98%</div>
						<div class="text-[11px] sm:text-xs text-text-body-muted font-medium mt-1">Bé tự ngủ ngoan</div>
					</div>
				</div>

				<div class="pt-2">
					<button data-open-modal="vpc-consultation-modal" class="px-6 py-3 rounded-full bg-primary-500 hover:bg-primary-600 text-white font-bold text-sm shadow-md transition-colors">
						Tìm hiểu khóa học EASY
					</button>
				</div>
			</div>

		</div>
	</div>
</section>

<!-- =========================================================================
     6. QUY TRÌNH CHĂM SÓC CHUẨN Y KHOA (4 Bước)
     ========================================================================= -->
<section id="quy-trinh" class="py-14 sm:py-20 bg-white">
	<div class="vpc-container">
		
		<div class="text-center max-w-2xl mx-auto mb-12 sm:mb-16">
			<div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-primary-100 text-primary-600 font-bold text-xs uppercase tracking-wider mb-3">
				<span>QUY TRÌNH CHĂM SÓC</span>
			</div>
			<h2 class="font-heading text-2xl sm:text-3xl xl:text-4xl font-bold leading-tight">
				<span class="text-primary-600">Quy Trình Chuẩn Y Khoa</span><br>
				<span class="text-secondary-400">Nhanh Chóng & Tận Tâm</span>
			</h2>
			<p class="text-text-body-muted text-sm sm:text-base mt-3">
				4 bước phục vụ chuyên nghiệp từ khi tiếp nhận đến khi mẹ và bé khỏe mạnh trọn vẹn.
			</p>
		</div>

		<!-- 4 Cards Grid -->
		<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
			<!-- Step 1 -->
			<div class="rounded-3xl border border-neutral-200 bg-[#FAFAFA] p-6 flex flex-col items-center text-center shadow-xs hover:border-primary-400 hover:shadow-md transition-all duration-300">
				<div class="w-14 h-14 rounded-2xl bg-primary-100 text-primary-600 flex items-center justify-center font-bold text-xl mb-4">
					📞
				</div>
				<span class="text-xs font-bold text-primary-600 uppercase tracking-wider mb-1">Bước 1</span>
				<h3 class="font-heading text-lg font-bold text-neutral-900 mb-2">Tiếp Nhận & Lắng Nghe</h3>
				<p class="text-xs sm:text-sm text-text-body-muted leading-relaxed">
					Lắng nghe nhu cầu, tình trạng sức khỏe mẹ & bé để tư vấn giải pháp phù hợp nhất.
				</p>
			</div>

			<!-- Step 2 -->
			<div class="rounded-3xl border border-neutral-200 bg-[#FAFAFA] p-6 flex flex-col items-center text-center shadow-xs hover:border-primary-400 hover:shadow-md transition-all duration-300">
				<div class="w-14 h-14 rounded-2xl bg-secondary-100 text-secondary-600 flex items-center justify-center font-bold text-xl mb-4">
					📋
				</div>
				<span class="text-xs font-bold text-secondary-600 uppercase tracking-wider mb-1">Bước 2</span>
				<h3 class="font-heading text-lg font-bold text-neutral-900 mb-2">Lên Phác Đồ Riêng</h3>
				<p class="text-xs sm:text-sm text-text-body-muted leading-relaxed">
					Bác sĩ thiết kế lộ trình chăm sóc cá nhân hóa theo từng thể trạng sau sinh.
				</p>
			</div>

			<!-- Step 3 -->
			<div class="rounded-3xl border border-neutral-200 bg-[#FAFAFA] p-6 flex flex-col items-center text-center shadow-xs hover:border-primary-400 hover:shadow-md transition-all duration-300">
				<div class="w-14 h-14 rounded-2xl bg-primary-100 text-primary-600 flex items-center justify-center font-bold text-xl mb-4">
					👩‍⚕️
				</div>
				<span class="text-xs font-bold text-primary-600 uppercase tracking-wider mb-1">Bước 3</span>
				<h3 class="font-heading text-lg font-bold text-neutral-900 mb-2">Chăm Sóc Chuẩn Y Tế</h3>
				<p class="text-xs sm:text-sm text-text-body-muted leading-relaxed">
					Điều dưỡng chính quy trực tiếp thực hiện với dụng cụ vô khuẩn tuyệt đối.
				</p>
			</div>

			<!-- Step 4 -->
			<div class="rounded-3xl border border-neutral-200 bg-[#FAFAFA] p-6 flex flex-col items-center text-center shadow-xs hover:border-primary-400 hover:shadow-md transition-all duration-300">
				<div class="w-14 h-14 rounded-2xl bg-emerald-100 text-emerald-600 flex items-center justify-center font-bold text-xl mb-4">
					💖
				</div>
				<span class="text-xs font-bold text-emerald-600 uppercase tracking-wider mb-1">Bước 4</span>
				<h3 class="font-heading text-lg font-bold text-neutral-900 mb-2">Đồng Hành Trọn Đời</h3>
				<p class="text-xs sm:text-sm text-text-body-muted leading-relaxed">
					Theo dõi chỉ số sức khỏe hàng ngày và giải đáp thắc mắc của ba mẹ 24/7.
				</p>
			</div>
		</div>

		<div class="text-center mt-10">
			<button data-open-modal="vpc-consultation-modal" class="inline-flex items-center gap-2 px-8 py-3 rounded-full bg-primary-500 hover:bg-primary-600 text-white font-bold text-sm shadow-md transition-all">
				<span>Đăng ký nhận tư vấn quy trình</span>
				<svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
			</button>
		</div>

	</div>
</section>

<!-- =========================================================================
     7. VÌ SAO CHỌN VẠN PHÚC CARE (Lý Do Chọn)
     ========================================================================= -->
<section id="vi-sao-chon" class="py-14 sm:py-20 bg-linear-to-b from-primary-50/40 via-white to-primary-50/40 border-y border-neutral-200/80">
	<div class="vpc-container">
		
		<div class="text-center max-w-2xl mx-auto mb-12 sm:mb-16">
			<div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-primary-100 text-primary-600 font-bold text-xs uppercase tracking-wider mb-3">
				<span>VÌ SAO CHỌN CHÚNG TÔI</span>
			</div>
			<h2 class="font-heading text-2xl sm:text-3xl xl:text-4xl font-bold leading-tight">
				<span class="text-primary-600">Lý Do Hàng Ngàn Ba Mẹ</span><br>
				<span class="text-secondary-400">Tin Chọn Vạn Phúc Care</span>
			</h2>
		</div>

		<div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
			<!-- Left 2 Cards -->
			<div class="lg:col-span-4 flex flex-col space-y-6">
				<div class="rounded-3xl bg-white border border-neutral-200/90 p-6 shadow-xs hover:border-primary-400 transition-colors">
					<div class="w-10 h-10 rounded-xl bg-primary-100 text-primary-600 flex items-center justify-center font-bold text-lg mb-3">1</div>
					<h3 class="font-heading text-base sm:text-lg font-bold text-neutral-900 mb-2">100% Y Tế Chính Quy</h3>
					<p class="text-xs sm:text-sm text-text-body-muted leading-relaxed">
						Đội ngũ điều dưỡng, nữ hộ sinh tốt nghiệp các trường y dược danh tiếng, có chứng chỉ hành nghề và giàu y đức.
					</p>
				</div>
				<div class="rounded-3xl bg-white border border-neutral-200/90 p-6 shadow-xs hover:border-primary-400 transition-colors">
					<div class="w-10 h-10 rounded-xl bg-secondary-100 text-secondary-600 flex items-center justify-center font-bold text-lg mb-3">2</div>
					<h3 class="font-heading text-base sm:text-lg font-bold text-neutral-900 mb-2">Chuẩn Y Khoa & Thảo Dược</h3>
					<p class="text-xs sm:text-sm text-text-body-muted leading-relaxed">
						Quy trình kiểm soát nhiễm khuẩn của Bộ Y Tế kết hợp tinh chất thảo dược thiên nhiên phục hồi an toàn, dịu nhẹ.
					</p>
				</div>
			</div>

			<!-- Center Photo -->
			<div class="lg:col-span-4 flex justify-center">
				<div class="relative w-full max-w-[340px] rounded-3xl overflow-hidden border-4 border-white shadow-xl bg-white">
					<img src="<?php echo esc_url( $theme_uri . '/assets/images/family_center.png' ); ?>" 
					     alt="Gia đình hạnh phúc cùng Vạn Phúc Care" 
					     class="w-full h-auto object-cover block" />
				</div>
			</div>

			<!-- Right 2 Cards -->
			<div class="lg:col-span-4 flex flex-col space-y-6">
				<div class="rounded-3xl bg-white border border-neutral-200/90 p-6 shadow-xs hover:border-primary-400 transition-colors">
					<div class="w-10 h-10 rounded-xl bg-primary-100 text-primary-600 flex items-center justify-center font-bold text-lg mb-3">3</div>
					<h3 class="font-heading text-base sm:text-lg font-bold text-neutral-900 mb-2">Cơ Sở Vật Chất Hiện Đại</h3>
					<p class="text-xs sm:text-sm text-text-body-muted leading-relaxed">
						Phòng nghỉ trung tâm ở cữ 5 sao, máy móc lọc khí vô trùng và thiết bị chăm sóc chuyên dụng nhập khẩu.
					</p>
				</div>
				<div class="rounded-3xl bg-white border border-neutral-200/90 p-6 shadow-xs hover:border-primary-400 transition-colors">
					<div class="w-10 h-10 rounded-xl bg-secondary-100 text-secondary-600 flex items-center justify-center font-bold text-lg mb-3">4</div>
					<h3 class="font-heading text-base sm:text-lg font-bold text-neutral-900 mb-2">Minh Bạch & Tận Tâm</h3>
					<p class="text-xs sm:text-sm text-text-body-muted leading-relaxed">
						Báo giá trọn gói không phát sinh, dịch vụ tận tâm và hỗ trợ chuyên môn tư vấn trọn đời cho cả gia đình.
					</p>
				</div>
			</div>
		</div>

		<!-- 3 Bottom Pills -->
		<div class="flex flex-wrap items-center justify-center gap-3 sm:gap-6 mt-10 text-xs sm:text-sm font-bold text-neutral-800">
			<span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white border border-neutral-200 shadow-xs">
				<span class="text-primary-500">✔</span> An toàn tuyệt đối
			</span>
			<span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white border border-neutral-200 shadow-xs">
				<span class="text-secondary-500">✔</span> Chăm sóc bằng cả trái tim
			</span>
			<span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white border border-neutral-200 shadow-xs">
				<span class="text-emerald-500">✔</span> Uy tín hàng đầu tại Hà Nội
			</span>
		</div>

	</div>
</section>

<!-- =========================================================================
     8. CẢM NHẬN CỦA KHÁCH HÀNG (8 Feedback Cards)
     ========================================================================= -->
<section id="feedback" class="py-14 sm:py-20 bg-white">
	<div class="vpc-container">
		
		<div class="text-center max-w-2xl mx-auto mb-12 sm:mb-16">
			<div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-secondary-100 text-secondary-600 font-bold text-xs uppercase tracking-wider mb-3">
				<span>FEEDBACK KHÁCH HÀNG</span>
			</div>
			<h2 class="font-heading text-2xl sm:text-3xl xl:text-4xl font-bold leading-tight">
				<span class="text-primary-600">Cảm Nhận Của Khách Hàng, </span><br>
				<span class="text-secondary-400">Hạnh Phúc Của Mẹ Là Động Lực</span>
			</h2>
			<p class="text-text-body-muted text-sm sm:text-base mt-3">
				Lắng nghe chia sẻ thực tế từ các mẹ bầu và gia đình đã trải nghiệm dịch vụ tại Vạn Phúc Care.
			</p>
		</div>

		<!-- 8 Feedback Cards Grid (4 cols on desktop, 2 on tablet, 1 on mobile) -->
		<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
			
			<!-- Feedback 1 -->
			<div class="rounded-3xl border border-neutral-200 bg-[#FAFAFA] p-5 flex flex-col justify-between shadow-xs hover:border-primary-400 transition-all">
				<div>
					<div class="flex items-center justify-between mb-3">
						<div class="flex text-amber-400 text-sm">★★★★★</div>
						<span class="text-[11px] font-semibold text-primary-600 bg-primary-50 px-2 py-0.5 rounded-md">Tắm bé</span>
					</div>
					<p class="text-xs sm:text-sm text-neutral-700 leading-relaxed mb-4">
						"Các cô điều dưỡng tắm bé rất mát tay, vệ sinh rốn cực kỳ cẩn thận. Bé nhà mình tắm xong ngủ một mạch ngoan lắm!"
					</p>
				</div>
				<div class="flex items-center gap-3 pt-3 border-t border-neutral-200/80">
					<div class="w-9 h-9 rounded-full bg-primary-100 text-primary-600 font-bold flex items-center justify-center text-sm">LH</div>
					<div class="flex flex-col">
						<span class="text-xs font-bold text-neutral-900">Mẹ Lan Hương</span>
						<span class="text-[11px] text-text-body-muted">Bé Min (1 tháng)</span>
					</div>
				</div>
			</div>

			<!-- Feedback 2 -->
			<div class="rounded-3xl border border-neutral-200 bg-[#FAFAFA] p-5 flex flex-col justify-between shadow-xs hover:border-primary-400 transition-all">
				<div>
					<div class="flex items-center justify-between mb-3">
						<div class="flex text-amber-400 text-sm">★★★★★</div>
						<span class="text-[11px] font-semibold text-secondary-600 bg-secondary-50 px-2 py-0.5 rounded-md">Ở cữ Âu Cơ</span>
					</div>
					<p class="text-xs sm:text-sm text-neutral-700 leading-relaxed mb-4">
						"Phòng ở Âu Cơ đẹp mê ly, view Hồ Tây thoáng đãng. Đồ ăn 5 sao thơm ngon, bác sĩ thăm khám mỗi ngày rất an tâm."
					</p>
				</div>
				<div class="flex items-center gap-3 pt-3 border-t border-neutral-200/80">
					<div class="w-9 h-9 rounded-full bg-secondary-100 text-secondary-600 font-bold flex items-center justify-center text-sm">MA</div>
					<div class="flex flex-col">
						<span class="text-xs font-bold text-neutral-900">Mẹ Mai Anh</span>
						<span class="text-[11px] text-text-body-muted">Tây Hồ, Hà Nội</span>
					</div>
				</div>
			</div>

			<!-- Feedback 3 -->
			<div class="rounded-3xl border border-neutral-200 bg-[#FAFAFA] p-5 flex flex-col justify-between shadow-xs hover:border-primary-400 transition-all">
				<div>
					<div class="flex items-center justify-between mb-3">
						<div class="flex text-amber-400 text-sm">★★★★★</div>
						<span class="text-[11px] font-semibold text-rose-600 bg-rose-50 px-2 py-0.5 rounded-md">Thông tắc tia sữa</span>
					</div>
					<p class="text-xs sm:text-sm text-neutral-700 leading-relaxed mb-4">
						"Bị tắc tia sữa sốt cao đau điếng, gọi cô Vạn Phúc Care đến sau 30 phút làm sóng siêu âm êm ru, sữa về tràn trề ngay!"
					</p>
				</div>
				<div class="flex items-center gap-3 pt-3 border-t border-neutral-200/80">
					<div class="w-9 h-9 rounded-full bg-rose-100 text-rose-600 font-bold flex items-center justify-center text-sm">QN</div>
					<div class="flex flex-col">
						<span class="text-xs font-bold text-neutral-900">Mẹ Quỳnh Nga</span>
						<span class="text-[11px] text-text-body-muted">Cầu Giấy, Hà Nội</span>
					</div>
				</div>
			</div>

			<!-- Feedback 4 -->
			<div class="rounded-3xl border border-neutral-200 bg-[#FAFAFA] p-5 flex flex-col justify-between shadow-xs hover:border-primary-400 transition-all">
				<div>
					<div class="flex items-center justify-between mb-3">
						<div class="flex text-amber-400 text-sm">★★★★★</div>
						<span class="text-[11px] font-semibold text-primary-600 bg-primary-50 px-2 py-0.5 rounded-md">Khóa học EASY</span>
					</div>
					<p class="text-xs sm:text-sm text-neutral-700 leading-relaxed mb-4">
						"Sau khóa học EASY của trung tâm, hai vợ chồng nhàn tênh, con tự vào giấc mà không cần bế ru, trộm vía bé ăn no ngủ kỹ."
					</p>
				</div>
				<div class="flex items-center gap-3 pt-3 border-t border-neutral-200/80">
					<div class="w-9 h-9 rounded-full bg-primary-100 text-primary-600 font-bold flex items-center justify-center text-sm">TH</div>
					<div class="flex flex-col">
						<span class="text-xs font-bold text-neutral-900">Mẹ Thu Hà</span>
						<span class="text-[11px] text-text-body-muted">Đống Đa, Hà Nội</span>
					</div>
				</div>
			</div>

			<!-- Feedback 5 -->
			<div class="rounded-3xl border border-neutral-200 bg-[#FAFAFA] p-5 flex flex-col justify-between shadow-xs hover:border-primary-400 transition-all">
				<div>
					<div class="flex items-center justify-between mb-3">
						<div class="flex text-amber-400 text-sm">★★★★★</div>
						<span class="text-[11px] font-semibold text-primary-600 bg-primary-50 px-2 py-0.5 rounded-md">Chăm sóc mẹ</span>
					</div>
					<p class="text-xs sm:text-sm text-neutral-700 leading-relaxed mb-4">
						"Gói chăm sóc sau sinh tại nhà cực kỳ ưng ý. Massage giảm đau lưng rõ rệt, bụng săn lại nhanh chóng nhờ xông thảo dược."
					</p>
				</div>
				<div class="flex items-center gap-3 pt-3 border-t border-neutral-200/80">
					<div class="w-9 h-9 rounded-full bg-primary-100 text-primary-600 font-bold flex items-center justify-center text-sm">BN</div>
					<div class="flex flex-col">
						<span class="text-xs font-bold text-neutral-900">Mẹ Bích Ngọc</span>
						<span class="text-[11px] text-text-body-muted">Thanh Xuân, Hà Nội</span>
					</div>
				</div>
			</div>

			<!-- Feedback 6 -->
			<div class="rounded-3xl border border-neutral-200 bg-[#FAFAFA] p-5 flex flex-col justify-between shadow-xs hover:border-primary-400 transition-all">
				<div>
					<div class="flex items-center justify-between mb-3">
						<div class="flex text-amber-400 text-sm">★★★★★</div>
						<span class="text-[11px] font-semibold text-secondary-600 bg-secondary-50 px-2 py-0.5 rounded-md">Tắm bé</span>
					</div>
					<p class="text-xs sm:text-sm text-neutral-700 leading-relaxed mb-4">
						"Rất ấn tượng với sự sạch sẽ và chu đáo. Cô điều dưỡng mang đầy đủ đồ dùng vô khuẩn, massage cho bé rất bài bản."
					</p>
				</div>
				<div class="flex items-center gap-3 pt-3 border-t border-neutral-200/80">
					<div class="w-9 h-9 rounded-full bg-secondary-100 text-secondary-600 font-bold flex items-center justify-center text-sm">TV</div>
					<div class="flex flex-col">
						<span class="text-xs font-bold text-neutral-900">Mẹ Thanh Vân</span>
						<span class="text-[11px] text-text-body-muted">Bé Bơ (2 tháng)</span>
					</div>
				</div>
			</div>

			<!-- Feedback 7 -->
			<div class="rounded-3xl border border-neutral-200 bg-[#FAFAFA] p-5 flex flex-col justify-between shadow-xs hover:border-primary-400 transition-all">
				<div>
					<div class="flex items-center justify-between mb-3">
						<div class="flex text-amber-400 text-sm">★★★★★</div>
						<span class="text-[11px] font-semibold text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded-md">Bảo mẫu</span>
					</div>
					<p class="text-xs sm:text-sm text-neutral-700 leading-relaxed mb-4">
						"Bảo mẫu của Vạn Phúc Care vừa có chuyên môn y tế vừa rất yêu trẻ, gia đình mình hoàn toàn yên tâm khi trở lại công việc."
					</p>
				</div>
				<div class="flex items-center gap-3 pt-3 border-t border-neutral-200/80">
					<div class="w-9 h-9 rounded-full bg-emerald-100 text-emerald-600 font-bold flex items-center justify-center text-sm">TD</div>
					<div class="flex flex-col">
						<span class="text-xs font-bold text-neutral-900">Mẹ Thùy Dung</span>
						<span class="text-[11px] text-text-body-muted">Hai Bà Trưng, HN</span>
					</div>
				</div>
			</div>

			<!-- Feedback 8 -->
			<div class="rounded-3xl border border-neutral-200 bg-[#FAFAFA] p-5 flex flex-col justify-between shadow-xs hover:border-primary-400 transition-all">
				<div>
					<div class="flex items-center justify-between mb-3">
						<div class="flex text-amber-400 text-sm">★★★★★</div>
						<span class="text-[11px] font-semibold text-primary-600 bg-primary-50 px-2 py-0.5 rounded-md">Chăm sóc toàn diện</span>
					</div>
					<p class="text-xs sm:text-sm text-neutral-700 leading-relaxed mb-4">
						"Dịch vụ 10 điểm không có nhưng! Đã giới thiệu cho mấy chị cùng cơ quan ai cũng khen nức nở vì sự tận tâm của các cô."
					</p>
				</div>
				<div class="flex items-center gap-3 pt-3 border-t border-neutral-200/80">
					<div class="w-9 h-9 rounded-full bg-primary-100 text-primary-600 font-bold flex items-center justify-center text-sm">HH</div>
					<div class="flex flex-col">
						<span class="text-xs font-bold text-neutral-900">Mẹ Hồng Hạnh</span>
						<span class="text-[11px] text-text-body-muted">Ba Đình, Hà Nội</span>
					</div>
				</div>
			</div>

		</div>

	</div>
</section>

<!-- =========================================================================
     9. BÁO CHÍ NÓI VỀ CHÚNG TÔI (3 Press Cards)
     ========================================================================= -->
<section id="bao-chi" class="py-14 sm:py-20 bg-[#FAFAFA] border-y border-neutral-200/80">
	<div class="vpc-container">
		
		<div class="text-center max-w-2xl mx-auto mb-12 sm:mb-16">
			<div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-primary-100 text-primary-600 font-bold text-xs uppercase tracking-wider mb-3">
				<span>TRUYỀN THÔNG & BÁO CHÍ</span>
			</div>
			<h2 class="font-heading text-2xl sm:text-3xl xl:text-4xl font-bold leading-tight">
				<span class="text-primary-600">Báo Chí Nói Về </span>
				<span class="text-secondary-400">Vạn Phúc Care</span>
			</h2>
			<p class="text-text-body-muted text-sm sm:text-base mt-3">
				Sự ghi nhận từ các cơ quan báo chí uy tín hàng đầu về chất lượng dịch vụ y tế.
			</p>
		</div>

		<div class="grid grid-cols-1 md:grid-cols-3 gap-6 sm:gap-8">
			<!-- Press 1: VTV -->
			<div class="rounded-3xl bg-white border border-neutral-200 p-6 flex flex-col justify-between shadow-xs hover:border-primary-400 hover:shadow-md transition-all">
				<div>
					<div class="h-10 flex items-center mb-4">
						<span class="px-3 py-1 bg-red-600 text-white font-black text-sm rounded-md tracking-wider">VTV</span>
						<span class="ml-2 text-xs font-bold text-neutral-500 uppercase">Sức Khỏe & Đời Sống</span>
					</div>
					<h3 class="font-heading text-base sm:text-lg font-bold text-neutral-900 mb-2 leading-snug">
						Vạn Phúc Care - Tiên phong mô hình trung tâm ở cữ và chăm sóc mẹ bé chuẩn y khoa
					</h3>
					<p class="text-xs sm:text-sm text-text-body-muted leading-relaxed">
						Mô hình kết hợp giữa không gian nghỉ dưỡng hiện đại và quy trình kiểm soát nhiễm khuẩn y tế nghiêm ngặt giúp mẹ phục hồi toàn diện.
					</p>
				</div>
				<div class="pt-4 mt-4 border-t border-neutral-100">
					<a href="#" class="inline-flex items-center gap-1.5 text-xs font-bold text-primary-600 hover:text-primary-700">
						<span>Đọc bài viết trên báo</span>
						<svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
					</a>
				</div>
			</div>

			<!-- Press 2: Dân Trí -->
			<div class="rounded-3xl bg-white border border-neutral-200 p-6 flex flex-col justify-between shadow-xs hover:border-primary-400 hover:shadow-md transition-all">
				<div>
					<div class="h-10 flex items-center mb-4">
						<span class="px-3 py-1 bg-blue-700 text-white font-black text-sm rounded-md tracking-wider">DÂN TRÍ</span>
					</div>
					<h3 class="font-heading text-base sm:text-lg font-bold text-neutral-900 mb-2 leading-snug">
						Bí quyết giúp mẹ sau sinh hồi phục nhanh và nuôi con nhàn tênh cùng Vạn Phúc Care
					</h3>
					<p class="text-xs sm:text-sm text-text-body-muted leading-relaxed">
						Ứng dụng phương pháp EASY khoa học cùng đội ngũ điều dưỡng túc trực 24/7 mang lại sự an tâm tuyệt đối cho các gia đình trẻ.
					</p>
				</div>
				<div class="pt-4 mt-4 border-t border-neutral-100">
					<a href="#" class="inline-flex items-center gap-1.5 text-xs font-bold text-primary-600 hover:text-primary-700">
						<span>Đọc bài viết trên báo</span>
						<svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
					</a>
				</div>
			</div>

			<!-- Press 3: VnExpress -->
			<div class="rounded-3xl bg-white border border-neutral-200 p-6 flex flex-col justify-between shadow-xs hover:border-primary-400 hover:shadow-md transition-all">
				<div>
					<div class="h-10 flex items-center mb-4">
						<span class="px-3 py-1 bg-red-800 text-white font-serif font-black text-sm rounded-md tracking-wider">VnExpress</span>
					</div>
					<h3 class="font-heading text-base sm:text-lg font-bold text-neutral-900 mb-2 leading-snug">
						Xu hướng ở cữ chuẩn y khoa kết hợp nghỉ dưỡng cao cấp dành cho mẹ hiện đại
					</h3>
					<p class="text-xs sm:text-sm text-text-body-muted leading-relaxed">
						Trải nghiệm chăm sóc sau sinh tại trung tâm Âu Cơ với thực đơn dinh dưỡng riêng biệt và dịch vụ tận tâm chuẩn y tế.
					</p>
				</div>
				<div class="pt-4 mt-4 border-t border-neutral-100">
					<a href="#" class="inline-flex items-center gap-1.5 text-xs font-bold text-primary-600 hover:text-primary-700">
						<span>Đọc bài viết trên báo</span>
						<svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
					</a>
				</div>
			</div>
		</div>

	</div>
</section>

<!-- =========================================================================
     10. ĐĂNG KÝ TƯ VẤN (Consultation Form)
     ========================================================================= -->
<section id="dang-ky-tu-van" class="py-14 sm:py-20 bg-linear-to-b from-white via-primary-50/50 to-white">
	<div class="vpc-container max-w-3xl">
		<div class="rounded-3xl sm:rounded-4xl bg-white border border-neutral-200/90 p-8 sm:p-12 shadow-xl">
			
			<div class="text-center mb-8">
				<h2 class="font-heading text-2xl sm:text-3xl font-bold text-primary-600">
					Để Lại Thông Tin Tư Vấn
				</h2>
				<p class="text-secondary-500 font-semibold text-base sm:text-lg mt-1">
					Nhận Ngay Ưu Đãi & Phác Đồ Chăm Sóc Riêng Biệt
				</p>
				<p class="text-xs sm:text-sm text-text-body-muted mt-2">
					Đội ngũ chuyên gia y tế của Vạn Phúc Care sẽ liên hệ tư vấn chi tiết trong vòng 15 phút.
				</p>
			</div>

			<form class="space-y-4 sm:space-y-5" onsubmit="event.preventDefault(); alert('Cảm ơn bạn! Chuyên viên Vạn Phúc Care sẽ liên hệ hỗ trợ bạn ngay.');">
				<div>
					<label class="block text-xs sm:text-sm font-semibold text-neutral-800 mb-1.5">Họ và tên của ba/mẹ *</label>
					<input type="text" required placeholder="Ví dụ: Nguyễn Thị Lan Hương" 
					       class="w-full px-4 py-3 rounded-xl border border-neutral-300 focus:border-primary-500 focus:ring-2 focus:ring-primary-100 text-sm outline-hidden transition-all">
				</div>

				<div>
					<label class="block text-xs sm:text-sm font-semibold text-neutral-800 mb-1.5">Số điện thoại liên hệ *</label>
					<input type="tel" required placeholder="Ví dụ: 090 859 31 99" 
					       class="w-full px-4 py-3 rounded-xl border border-neutral-300 focus:border-primary-500 focus:ring-2 focus:ring-primary-100 text-sm outline-hidden transition-all">
				</div>

				<div>
					<label class="block text-xs sm:text-sm font-semibold text-neutral-800 mb-1.5">Dịch vụ quan tâm</label>
					<select class="w-full px-4 py-3 rounded-xl border border-neutral-300 focus:border-primary-500 focus:ring-2 focus:ring-primary-100 text-sm outline-hidden transition-all bg-white">
						<option value="o-cu">Trung tâm ở cữ 35B/399 Âu Cơ</option>
						<option value="tam-be">Tắm bé sơ sinh & Massage tại nhà</option>
						<option value="cham-soc-me">Chăm sóc mẹ sau sinh toàn diện</option>
						<option value="thong-tac">Thông tắc tia sữa sóng siêu âm</option>
						<option value="khoa-hoc-easy">Khóa học & Rèn tự ngủ EASY</option>
						<option value="bao-mau">Bảo mẫu y tế tại nhà</option>
					</select>
				</div>

				<div>
					<label class="block text-xs sm:text-sm font-semibold text-neutral-800 mb-1.5">Ghi chú hoặc tình trạng hiện tại</label>
					<textarea rows="3" placeholder="Ví dụ: Dự sinh tháng 11, cần tư vấn gói tắm bé 30 buổi..." 
					          class="w-full px-4 py-3 rounded-xl border border-neutral-300 focus:border-primary-500 focus:ring-2 focus:ring-primary-100 text-sm outline-hidden transition-all"></textarea>
				</div>

				<div class="pt-2">
					<button type="submit" class="w-full py-3.5 px-6 rounded-full bg-linear-to-r from-primary-500 to-primary-600 hover:from-primary-600 hover:to-primary-700 text-white font-bold text-sm sm:text-base shadow-md shadow-primary-500/25 hover:shadow-lg transition-all">
						Gửi thông tin đăng ký tư vấn
					</button>
				</div>

				<p class="text-center text-[11px] text-text-body-muted pt-1">
					🔒 Thông tin của bạn được cam kết bảo mật 100% theo tiêu chuẩn y khoa.
				</p>
			</form>

		</div>
	</div>
</section>

<!-- =========================================================================
     11. KIẾN THỨC & TIN TỨC MỚI NHẤT (3 Blog Cards)
     ========================================================================= -->
<section id="tin-tuc" class="py-14 sm:py-20 bg-white border-t border-neutral-200/80">
	<div class="vpc-container">
		
		<div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-10 sm:mb-14">
			<div>
				<div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-secondary-100 text-secondary-600 font-bold text-xs uppercase tracking-wider mb-2">
					<span>CẨM NANG LÀM MẸ</span>
				</div>
				<h2 class="font-heading text-2xl sm:text-3xl xl:text-4xl font-bold text-neutral-900">
					Kiến Thức Mới Nhất Dành Cho Mẹ
				</h2>
			</div>
			<div>
				<a href="<?php echo esc_url( home_url( '/tin-tuc' ) ); ?>" class="inline-flex items-center gap-1.5 text-sm font-bold text-primary-600 hover:text-primary-700 hover:gap-2.5 transition-all">
					<span>Xem tất cả bài viết</span>
					<svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
				</a>
			</div>
		</div>

		<div class="grid grid-cols-1 md:grid-cols-3 gap-6 sm:gap-8">
			<!-- Article 1 -->
			<article class="rounded-3xl border border-neutral-200 bg-[#FAFAFA] overflow-hidden flex flex-col justify-between shadow-xs hover:border-primary-400 hover:shadow-md transition-all group">
				<div class="p-6">
					<div class="flex items-center gap-2 text-xs text-text-body-muted mb-3">
						<span class="px-2.5 py-0.5 rounded-md bg-primary-100 text-primary-700 font-bold">Chăm sóc mẹ</span>
						<span>• 16/10/2026</span>
					</div>
					<h3 class="font-heading text-base sm:text-lg font-bold text-neutral-900 group-hover:text-primary-600 transition-colors mb-2 leading-snug">
						Chăm sóc vết mổ và vết khâu tầng sinh môn đúng cách giúp mẹ mau lành
					</h3>
					<p class="text-xs sm:text-sm text-text-body-muted leading-relaxed">
						Hướng dẫn chi tiết từ bác sĩ phụ sản về quy trình vệ sinh vô trùng, chế độ ăn kiêng và cách nhận biết sớm dấu hiệu nhiễm trùng sau sinh.
					</p>
				</div>
				<div class="px-6 pb-6 pt-2">
					<a href="#" class="inline-flex items-center gap-1 text-xs font-bold text-primary-600 hover:text-primary-700">
						<span>Đọc chi tiết</span>
						<svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
					</a>
				</div>
			</article>

			<!-- Article 2 -->
			<article class="rounded-3xl border border-neutral-200 bg-[#FAFAFA] overflow-hidden flex flex-col justify-between shadow-xs hover:border-primary-400 hover:shadow-md transition-all group">
				<div class="p-6">
					<div class="flex items-center gap-2 text-xs text-text-body-muted mb-3">
						<span class="px-2.5 py-0.5 rounded-md bg-secondary-100 text-secondary-700 font-bold">Phương pháp EASY</span>
						<span>• 14/10/2026</span>
					</div>
					<h3 class="font-heading text-base sm:text-lg font-bold text-neutral-900 group-hover:text-primary-600 transition-colors mb-2 leading-snug">
						Bí quyết rèn bé sơ sinh tự ngủ theo EASY thành công ngay từ tuần thứ 3
					</h3>
					<p class="text-xs sm:text-sm text-text-body-muted leading-relaxed">
						Cách phân biệt tiếng khóc của con, thiết lập chu kỳ Ăn - Chơi - Ngủ và sử dụng công cụ hỗ trợ như quấn chũn, tiếng ồn trắng hiệu quả.
					</p>
				</div>
				<div class="px-6 pb-6 pt-2">
					<a href="#" class="inline-flex items-center gap-1 text-xs font-bold text-primary-600 hover:text-primary-700">
						<span>Đọc chi tiết</span>
						<svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
					</a>
				</div>
			</article>

			<!-- Article 3 -->
			<article class="rounded-3xl border border-neutral-200 bg-[#FAFAFA] overflow-hidden flex flex-col justify-between shadow-xs hover:border-primary-400 hover:shadow-md transition-all group">
				<div class="p-6">
					<div class="flex items-center gap-2 text-xs text-text-body-muted mb-3">
						<span class="px-2.5 py-0.5 rounded-md bg-emerald-100 text-emerald-700 font-bold">Dinh dưỡng sau sinh</span>
						<span>• 12/10/2026</span>
					</div>
					<h3 class="font-heading text-base sm:text-lg font-bold text-neutral-900 group-hover:text-primary-600 transition-colors mb-2 leading-snug">
						Thực đơn 30 ngày lợi sữa, về dáng nhanh mà không lo béo cho mẹ ở cữ
					</h3>
					<p class="text-xs sm:text-sm text-text-body-muted leading-relaxed">
						Gợi ý các món ăn khoa học vừa kích thích sữa mẹ sánh đặc dạt dào, vừa bổ sung vi chất canxi, sắt giúp phục hồi thể lực nhanh chóng.
					</p>
				</div>
				<div class="px-6 pb-6 pt-2">
					<a href="#" class="inline-flex items-center gap-1 text-xs font-bold text-primary-600 hover:text-primary-700">
						<span>Đọc chi tiết</span>
						<svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
					</a>
				</div>
			</article>
		</div>

	</div>
</section>

<?php
get_footer();
