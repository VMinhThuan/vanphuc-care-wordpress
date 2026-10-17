<?php
/**
 * Front page template for Vạn Phúc Care.
 * Standardized to VPC Design System (Figma 12.10.2026 / 16.10.2026 handoff).
 * Grid System: Desktop 1440px (12 columns, 24px gutter, 80px margin), Mobile 390px (4 columns, 16px gutter, 20px margin).
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="primary" class="site-main w-full overflow-hidden">

	<!-- =========================================================
	     SECTION 1: HERO SECTION (12 Columns Desktop, 4 Columns Mobile)
	     ========================================================= -->
	<section class="hero-section relative bg-linear-to-b from-white via-primary-50/40 to-white pt-10 sm:pt-16 pb-16 sm:pb-24 overflow-hidden">
		<!-- Decorative Soft Ambient Blurs -->
		<div class="pointer-events-none absolute -top-24 left-1/2 -translate-x-1/2 h-[500px] w-[900px] rounded-full bg-linear-to-r from-secondary-200/25 to-primary-200/30 blur-3xl" aria-hidden="true"></div>

		<div class="vpc-container relative z-10">
			<div class="vpc-grid items-center">
				<!-- Hero Left: Content (7 cols on desktop) -->
				<div class="col-span-4 xl:col-span-7 flex flex-col items-start space-y-6">
					
					<!-- Tagline Brand Pill (Figma Component Badge) -->
					<?php
					get_template_part(
						'template-parts/components/badge',
						null,
						array(
							'text'    => 'DỊCH VỤ CHĂM SÓC MẸ VÀ BÉ CHUẨN Y KHOA',
							'variant' => 'brand',
							'icon'    => '<svg class="w-4 h-4 text-primary-500 shrink-0" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2l2.4 7.4H22l-6.2 4.5 2.4 7.4L12 17l-6.2 4.3 2.4-7.4L2 9.4h7.6z"/></svg>',
						)
					);
					?>

					<!-- Hero Heading Fraunces -->
					<h1 class="font-heading text-3xl sm:text-4xl xl:text-5xl 2xl:text-6xl font-bold text-neutral-900 leading-[1.2] tracking-tight">
						Hành Trình Cùng Mẹ,<br>
						<span class="text-primary-600 italic">Trải Đầy Yêu Thương</span>
					</h1>

					<!-- Description Manrope -->
					<p class="text-base sm:text-lg xl:text-xl text-text-body-muted max-w-2xl leading-relaxed">
						Vạn Phúc Care tự hào là đơn vị tiên phong cung cấp dịch vụ chăm sóc mẹ và bé sau sinh toàn diện, tắm bé & thông tắc tia sữa với đội ngũ <strong class="text-neutral-900 font-semibold">100% điều dưỡng, nữ hộ sinh chính quy</strong> chuẩn Y khoa.
					</p>

					<!-- CTA Action Buttons -->
					<div class="flex flex-wrap items-center gap-3 sm:gap-4 pt-2 w-full sm:w-auto">
						<?php
						get_template_part(
							'template-parts/components/button',
							null,
							array(
								'text'         => 'Đăng ký tư vấn miễn phí',
								'variant'      => 'primary',
								'size'         => 'lg',
								'data_attrs'   => 'data-open-modal="vpc-consultation-modal"',
								'custom_class' => 'w-full sm:w-auto shadow-md hover:shadow-lg',
							)
						);

						get_template_part(
							'template-parts/components/button',
							null,
							array(
								'text'         => 'Khám phá dịch vụ',
								'variant'      => 'outline-primary',
								'size'         => 'lg',
								'href'         => '#dich-vu',
								'custom_class' => 'w-full sm:w-auto',
							)
						);
						?>
					</div>

					<!-- Social Proof: Avatar Stack + Rating Review -->
					<div class="flex flex-wrap items-center gap-4 pt-4 border-t border-neutral-200/80 w-full">
						<div class="flex -space-x-3">
							<?php
							for ( $i = 1; $i <= 5; $i++ ) {
								get_template_part(
									'template-parts/components/avatar',
									null,
									array(
										'size'   => 'md',
										'border' => true,
									)
								);
							}
							?>
						</div>
						<div class="flex flex-col text-sm">
							<div class="flex items-center gap-1 text-amber-400">
								<?php for ( $s = 0; $s < 5; $s++ ) : ?>
									<svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
										<path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
									</svg>
								<?php endfor; ?>
								<span class="font-bold text-neutral-900 ml-1">4.9/5</span>
							</div>
							<span class="text-text-body-muted text-xs sm:text-sm">Hơn <strong class="text-neutral-800 font-semibold">10.000+</strong> mẹ bầu & gia đình an tâm lựa chọn</span>
						</div>
					</div>

				</div>

				<!-- Hero Right: Featured Media Card (5 cols on desktop) -->
				<div class="col-span-4 xl:col-span-5 relative mt-8 xl:mt-0">
					<div class="relative mx-auto max-w-[480px] xl:max-w-none rounded-3xl overflow-hidden border border-neutral-200/80 bg-white p-3 sm:p-4 shadow-xl">
						<div class="relative h-80 sm:h-96 xl:h-[480px] w-full rounded-2xl overflow-hidden bg-linear-to-br from-primary-100 via-secondary-100 to-primary-200 flex items-center justify-center">
							
							<!-- Soft Illustrated Brand Visual -->
							<div class="text-center p-6 sm:p-8 flex flex-col items-center">
								<div class="w-20 h-20 sm:w-24 sm:h-24 rounded-full bg-white shadow-md flex items-center justify-center mb-4 text-primary-500">
									<svg class="w-10 h-10 sm:w-12 sm:h-12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75">
										<path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
									</svg>
								</div>
								<h3 class="font-heading text-xl sm:text-2xl font-bold text-neutral-900 mb-2">
									Chăm Sóc Chuẩn Y Khoa
								</h3>
								<p class="text-sm text-text-body-muted max-w-xs">
									Phục hồi sức khỏe sau sinh và chăm sóc bé sơ sinh tại nhà chuyên sâu, an toàn và tận tâm.
								</p>
							</div>

							<!-- Floating Highlight Badge 1 -->
							<div class="absolute top-4 left-4 bg-white/95 backdrop-blur-sm rounded-xl px-3.5 py-2 shadow-md border border-neutral-200 flex items-center gap-2">
								<span class="w-2.5 h-2.5 rounded-full bg-emerald-500 animate-pulse"></span>
								<span class="text-xs font-semibold text-neutral-800">100% Điều dưỡng Y khoa</span>
							</div>

							<!-- Floating Highlight Badge 2 -->
							<div class="absolute bottom-4 right-4 bg-white/95 backdrop-blur-sm rounded-xl px-3.5 py-2 shadow-md border border-neutral-200 flex items-center gap-2">
								<svg class="w-4 h-4 text-primary-500" fill="currentColor" viewBox="0 0 20 20">
									<path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
								</svg>
								<span class="text-xs font-semibold text-neutral-800">Chứng nhận Bộ Y Tế</span>
							</div>

						</div>
					</div>
				</div>

			</div>
		</div>
	</section>

	<!-- =========================================================
	     SECTION 2: CORE SERVICES (Figma 12-Column Grid Layout)
	     ========================================================= -->
	<section id="dich-vu" class="services-section py-16 sm:py-24 bg-[#FAFAFA] border-y border-neutral-200/80">
		<div class="vpc-container">
			
			<!-- Section Header -->
			<div class="text-center max-w-3xl mx-auto mb-12 sm:mb-16">
				<span class="inline-block text-xs sm:text-sm font-bold tracking-widest text-primary-600 uppercase mb-3">
					Dịch vụ tiêu biểu
				</span>
				<h2 class="font-heading text-2xl sm:text-3xl xl:text-4xl font-bold text-neutral-900 mb-4">
					Giải Pháp Chăm Sóc Toàn Diện Cho Mẹ & Bé
				</h2>
				<p class="text-base text-text-body-muted">
					Tất cả liệu trình tại Vạn Phúc Care đều được xây dựng trên nền tảng Y học hiện đại, kết hợp phương pháp phục hồi phương Đông an toàn, dịu nhẹ.
				</p>
			</div>

			<!-- Services 12-Col Grid (4 cols on Mobile, 3 cols each card on Desktop = 4 cards) -->
			<div class="vpc-grid">
				
				<!-- Service Card 1 -->
				<div class="col-span-4 md:col-span-2 xl:col-span-3 flex flex-col justify-between rounded-3xl bg-white border border-neutral-200 p-6 sm:p-7 shadow-xs hover:border-primary-400 hover:shadow-card transition-all duration-300 group">
					<div>
						<div class="w-12 h-12 rounded-2xl bg-primary-100 text-primary-600 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
							<svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
								<path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
							</svg>
						</div>
						<h3 class="font-heading text-xl font-bold text-neutral-900 mb-3 group-hover:text-primary-600 transition-colors">
							Chăm Sóc Mẹ Sau Sinh
						</h3>
						<p class="text-sm text-text-body-muted mb-6 leading-relaxed">
							Hồi phục tử cung, xông hơ thảo dược vùng kín, thông kinh lạc, giảm béo bụng và giải tỏa áp lực tâm lý sau sinh tại nhà.
						</p>
					</div>
					<div>
						<ul class="text-xs text-neutral-600 space-y-2 mb-6 border-t border-neutral-100 pt-4">
							<li class="flex items-center gap-2">✓ Thảo dược 100% thiên nhiên</li>
							<li class="flex items-center gap-2">✓ Liệu trình thiết kế riêng biệt</li>
						</ul>
						<button data-open-modal="vpc-consultation-modal" class="w-full text-center py-2.5 px-4 rounded-xl font-semibold text-sm bg-neutral-100 hover:bg-primary-500 hover:text-white transition-colors duration-200">
							Nhận tư vấn gói
						</button>
					</div>
				</div>

				<!-- Service Card 2 -->
				<div class="col-span-4 md:col-span-2 xl:col-span-3 flex flex-col justify-between rounded-3xl bg-white border border-neutral-200 p-6 sm:p-7 shadow-xs hover:border-primary-400 hover:shadow-card transition-all duration-300 group">
					<div>
						<div class="w-12 h-12 rounded-2xl bg-secondary-100 text-secondary-600 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
							<svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
								<path stroke-linecap="round" stroke-linejoin="round" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
							</svg>
						</div>
						<h3 class="font-heading text-xl font-bold text-neutral-900 mb-3 group-hover:text-primary-600 transition-colors">
							Tắm Bé & Massage Y Khoa
						</h3>
						<p class="text-sm text-text-body-muted mb-6 leading-relaxed">
							Quy trình tắm và chăm sóc rốn bé sơ sinh vô trùng, massage kích thích tuần hoàn máu và các bài tập vận động sớm.
						</p>
					</div>
					<div>
						<ul class="text-xs text-neutral-600 space-y-2 mb-6 border-t border-neutral-100 pt-4">
							<li class="flex items-center gap-2">✓ Chăm sóc rốn vô trùng chuẩn Y tế</li>
							<li class="flex items-center gap-2">✓ Phát hiện sớm vàng da sơ sinh</li>
						</ul>
						<button data-open-modal="vpc-consultation-modal" class="w-full text-center py-2.5 px-4 rounded-xl font-semibold text-sm bg-neutral-100 hover:bg-primary-500 hover:text-white transition-colors duration-200">
							Nhận tư vấn gói
						</button>
					</div>
				</div>

				<!-- Service Card 3 -->
				<div class="col-span-4 md:col-span-2 xl:col-span-3 flex flex-col justify-between rounded-3xl bg-white border border-neutral-200 p-6 sm:p-7 shadow-xs hover:border-primary-400 hover:shadow-card transition-all duration-300 group">
					<div>
						<div class="w-12 h-12 rounded-2xl bg-rose-100 text-rose-600 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
							<svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
								<path stroke-linecap="round" stroke-linejoin="round" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
							</svg>
						</div>
						<h3 class="font-heading text-xl font-bold text-neutral-900 mb-3 group-hover:text-primary-600 transition-colors">
							Thông Tắc Tia Sữa
						</h3>
						<p class="text-sm text-text-body-muted mb-6 leading-relaxed">
							Công nghệ sóng siêu âm kết hợp kỹ thuật nắn thông tắc chuyên sâu, êm ái, xử lý triệt để tia tắc không đau, sữa về tràn trề.
						</p>
					</div>
					<div>
						<ul class="text-xs text-neutral-600 space-y-2 mb-6 border-t border-neutral-100 pt-4">
							<li class="flex items-center gap-2">✓ Không đau, thông tia ngay buổi đầu</li>
							<li class="flex items-center gap-2">✓ Có mặt cấp tốc sau 30 phút</li>
						</ul>
						<button data-open-modal="vpc-consultation-modal" class="w-full text-center py-2.5 px-4 rounded-xl font-semibold text-sm bg-neutral-100 hover:bg-primary-500 hover:text-white transition-colors duration-200">
							Nhận tư vấn gói
						</button>
					</div>
				</div>

				<!-- Service Card 4 -->
				<div class="col-span-4 md:col-span-2 xl:col-span-3 flex flex-col justify-between rounded-3xl bg-white border border-neutral-200 p-6 sm:p-7 shadow-xs hover:border-primary-400 hover:shadow-card transition-all duration-300 group">
					<div>
						<div class="w-12 h-12 rounded-2xl bg-amber-100 text-amber-600 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
							<svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
								<path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
							</svg>
						</div>
						<h3 class="font-heading text-xl font-bold text-neutral-900 mb-3 group-hover:text-primary-600 transition-colors">
							Trung Tâm Ở Cữ Nghỉ Dưỡng
						</h3>
						<p class="text-sm text-text-body-muted mb-6 leading-relaxed">
							Không gian nghỉ dưỡng chuẩn 5 sao tại Tây Hồ, chế độ dinh dưỡng chuyên biệt theo tuần và dịch vụ phục hồi toàn diện 24/7.
						</p>
					</div>
					<div>
						<ul class="text-xs text-neutral-600 space-y-2 mb-6 border-t border-neutral-100 pt-4">
							<li class="flex items-center gap-2">✓ Bác sĩ sản nhi thăm khám định kỳ</li>
							<li class="flex items-center gap-2">✓ Thực đơn thiết kế theo thể trạng</li>
						</ul>
						<button data-open-modal="vpc-consultation-modal" class="w-full text-center py-2.5 px-4 rounded-xl font-semibold text-sm bg-neutral-100 hover:bg-primary-500 hover:text-white transition-colors duration-200">
							Nhận tư vấn gói
						</button>
					</div>
				</div>

			</div>
		</div>
	</section>

	<!-- =========================================================
	     SECTION 3: WHY CHOOSE US (6 Columns & Feature Matrix)
	     ========================================================= -->
	<section class="why-us-section py-16 sm:py-24 bg-white">
		<div class="vpc-container">
			<div class="vpc-grid items-center">
				
				<!-- Left Text (5 cols) -->
				<div class="col-span-4 xl:col-span-5 space-y-6">
					<span class="inline-block text-xs sm:text-sm font-bold tracking-widest text-primary-600 uppercase">
						Vì sao chọn Vạn Phúc Care
					</span>
					<h2 class="font-heading text-2xl sm:text-3xl xl:text-4xl font-bold text-neutral-900 leading-snug">
						Tiêu Chuẩn Chăm Sóc Y Khoa Hàng Đầu Tại Hà Nội
					</h2>
					<p class="text-base text-text-body-muted leading-relaxed">
						Chúng tôi hiểu rằng những ngày đầu sau sinh là khoảng thời gian nhạy cảm nhất của mẹ và bé. Vạn Phúc Care mang đến sự an tâm tuyệt đối nhờ chuẩn hóa chuyên môn khắt khe nhất.
					</p>

					<div class="space-y-4 pt-2">
						<div class="flex items-start gap-4">
							<div class="w-10 h-10 rounded-full bg-primary-100 text-primary-600 flex items-center justify-center shrink-0 mt-1">
								<svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
									<path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
								</svg>
							</div>
							<div>
								<h4 class="font-heading font-bold text-neutral-900 text-base">Đội Ngũ 100% Nhân Sự Chính Quy</h4>
								<p class="text-sm text-text-body-muted">Tất cả điều dưỡng và nữ hộ sinh đều có chứng chỉ hành nghề và được đào tạo kỹ năng giao tiếp tâm lý.</p>
							</div>
						</div>

						<div class="flex items-start gap-4">
							<div class="w-10 h-10 rounded-full bg-primary-100 text-primary-600 flex items-center justify-center shrink-0 mt-1">
								<svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
									<path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
								</svg>
							</div>
							<div>
								<h4 class="font-heading font-bold text-neutral-900 text-base">Trang Thiết Bị Khử Khuẩn Vô Trùng</h4>
								<p class="text-sm text-text-body-muted">Dụng cụ y tế, khăn tắm và thảo dược được đóng gói vô trùng riêng biệt cho từng buổi chăm sóc.</p>
							</div>
						</div>

						<div class="flex items-start gap-4">
							<div class="w-10 h-10 rounded-full bg-primary-100 text-primary-600 flex items-center justify-center shrink-0 mt-1">
								<svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
									<path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
								</svg>
							</div>
							<div>
								<h4 class="font-heading font-bold text-neutral-900 text-base">Hỗ Trợ 24/7 Cùng Bác Sĩ Chuyên Khoa</h4>
								<p class="text-sm text-text-body-muted">Hotline y khoa luôn sẵn sàng giải đáp và hướng dẫn xử lý các vấn đề khẩn cấp của mẹ và bé.</p>
							</div>
						</div>
					</div>
				</div>

				<!-- Right Visual Stats Grid (7 cols) -->
				<div class="col-span-4 xl:col-span-7 grid grid-cols-2 gap-4 sm:gap-6 mt-8 xl:mt-0">
					<div class="rounded-3xl bg-linear-to-br from-primary-50 to-primary-100/60 p-6 sm:p-8 border border-primary-200/50 flex flex-col justify-center">
						<span class="font-heading text-3xl sm:text-5xl font-extrabold text-primary-600 mb-2">10.000+</span>
						<p class="text-sm sm:text-base font-semibold text-neutral-800">Mẹ & Bé Đã Chăm Sóc</p>
						<p class="text-xs text-text-body-muted mt-1">Khách hàng tin tưởng và giới thiệu bạn bè trong suốt 8 năm hoạt động.</p>
					</div>

					<div class="rounded-3xl bg-linear-to-br from-secondary-50 to-secondary-100/60 p-6 sm:p-8 border border-secondary-200/50 flex flex-col justify-center">
						<span class="font-heading text-3xl sm:text-5xl font-extrabold text-secondary-600 mb-2">100%</span>
						<p class="text-sm sm:text-base font-semibold text-neutral-800">Điều Dưỡng Đạt Chuẩn</p>
						<p class="text-xs text-text-body-muted mt-1">Bằng cấp y khoa chính quy và được cập nhật kiến thức liên tục.</p>
					</div>

					<div class="rounded-3xl bg-linear-to-br from-amber-50 to-amber-100/60 p-6 sm:p-8 border border-amber-200/50 flex flex-col justify-center">
						<span class="font-heading text-3xl sm:text-5xl font-extrabold text-amber-600 mb-2">99.8%</span>
						<p class="text-sm sm:text-base font-semibold text-neutral-800">Hài Lòng Tuyệt Đối</p>
						<p class="text-xs text-text-body-muted mt-1">Đánh giá 5 sao từ các mẹ trên nền tảng Facebook, Google & diễn đàn.</p>
					</div>

					<div class="rounded-3xl bg-linear-to-br from-emerald-50 to-emerald-100/60 p-6 sm:p-8 border border-emerald-200/50 flex flex-col justify-center">
						<span class="font-heading text-3xl sm:text-5xl font-extrabold text-emerald-600 mb-2">24/7</span>
						<p class="text-sm sm:text-base font-semibold text-neutral-800">Đồng Hành Kịp Thời</p>
						<p class="text-xs text-text-body-muted mt-1">Luôn có mặt khi mẹ và bé cần, bất kể ngày nghỉ hay lễ Tết.</p>
					</div>
				</div>

			</div>
		</div>
	</section>

	<!-- =========================================================
	     SECTION 4: CONSULTATION FORM BLOCK (In-page Form Integration)
	     ========================================================= -->
	<section class="consultation-section py-16 sm:py-24 bg-linear-to-b from-[#FAFAFA] to-white border-t border-neutral-200/80">
		<div class="vpc-container">
			<div class="vpc-grid items-center">
				
				<!-- Left Text & Contact Info (5 cols) -->
				<div class="col-span-4 xl:col-span-5 space-y-6">
					<span class="inline-block text-xs sm:text-sm font-bold tracking-widest text-primary-600 uppercase">
						Liên hệ tư vấn
					</span>
					<h2 class="font-heading text-2xl sm:text-3xl xl:text-4xl font-bold text-neutral-900 leading-snug">
						Để Lại Thông Tin, Chuyên Gia Vạn Phúc Care Sẽ Gọi Lại Ngay!
					</h2>
					<p class="text-base text-text-body-muted">
						Mẹ hãy chia sẻ tuần thai hoặc tình trạng của bé, chuyên viên y tế sẽ tư vấn phác đồ chăm sóc phù hợp và tiết kiệm nhất cho gia đình.
					</p>

					<!-- Contact Direct Details -->
					<div class="space-y-3 pt-4 border-t border-neutral-200">
						<div class="flex items-center gap-3">
							<div class="w-10 h-10 rounded-full bg-primary-100 text-primary-600 flex items-center justify-center shrink-0">
								<svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
									<path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
								</svg>
							</div>
							<div>
								<span class="text-xs text-text-body-muted block">Tổng đài hỗ trợ 24/7</span>
								<a href="tel:0908093198" class="text-lg font-bold text-primary-600 hover:underline">090 809 31 98</a>
							</div>
						</div>

						<div class="flex items-center gap-3">
							<div class="w-10 h-10 rounded-full bg-secondary-100 text-secondary-600 flex items-center justify-center shrink-0">
								<svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
									<path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
									<path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
								</svg>
							</div>
							<div>
								<span class="text-xs text-text-body-muted block">Trung tâm ở cữ & Điều trị</span>
								<span class="text-sm font-semibold text-neutral-800">35B/399 Âu Cơ, P. Tây Hồ, Hà Nội</span>
							</div>
						</div>
					</div>
				</div>

				<!-- Right Consultation Form Card (7 cols) -->
				<div class="col-span-4 xl:col-span-7 mt-8 xl:mt-0">
					<?php get_template_part( 'template-parts/components/consultation-form' ); ?>
				</div>

			</div>
		</div>
	</section>

	<!-- =========================================================
	     SECTION 5: FAQ ACCORDION (Figma Board 7 Standardized)
	     ========================================================= -->
	<section class="faq-section py-16 sm:py-24 bg-white border-t border-neutral-200/80">
		<div class="vpc-container">
			
			<div class="text-center max-w-3xl mx-auto mb-12 sm:mb-16">
				<span class="inline-block text-xs sm:text-sm font-bold tracking-widest text-primary-600 uppercase mb-3">
					Hỏi đáp thường gặp
				</span>
				<h2 class="font-heading text-2xl sm:text-3xl xl:text-4xl font-bold text-neutral-900 mb-4">
					Giải Đáp Thắc Mắc Cho Mẹ
				</h2>
				<p class="text-base text-text-body-muted">
					Những câu hỏi phổ biến nhất mà các mẹ thường quan tâm khi đăng ký dịch vụ tại Vạn Phúc Care.
				</p>
			</div>

			<div class="max-w-4xl mx-auto">
				<?php
				$faq_items = array(
					array(
						'question' => 'Nhân viên đến chăm sóc bé và mẹ có phải là điều dưỡng không?',
						'answer'   => '100% nhân sự thực hiện dịch vụ tại Vạn Phúc Care đều tốt nghiệp chính quy ngành Điều dưỡng hoặc Nữ hộ sinh tại các trường Y uy tín, có chứng chỉ hành nghề và được đào tạo bài bản về kỹ năng giao tiếp, chăm sóc tâm lý mẹ và bé.',
						'open'     => true,
					),
					array(
						'question' => 'Dụng cụ và đồ dùng tắm bé gia đình cần chuẩn bị những gì?',
						'answer'   => 'Điều dưỡng Vạn Phúc Care sẽ mang đầy đủ bộ dụng cụ y tế chuyên dụng (gạc vô trùng, cồn sát khuẩn rốn, nhiệt kế đo nước, dầu massage organic...). Gia đình chỉ cần chuẩn bị sẵn chậu tắm, nước ấm và quần áo sạch cho bé.',
						'open'     => false,
					),
					array(
						'question' => 'Thông tắc tia sữa tại Vạn Phúc Care có gây đau đớn không?',
						'answer'   => 'Chúng tôi áp dụng kỹ thuật thông tắc tia sữa chuẩn Y khoa kết hợp sóng siêu âm đa tần, hoàn toàn không gây bầm dập hay đau đớn cho bầu ngực mẹ. Đa số các mẹ đều cảm thấy nhẹ nhõm và sữa lưu thông tốt ngay trong buổi đầu tiên.',
						'open'     => false,
					),
					array(
						'question' => 'Mẹ có thể đổi nhân viên chăm sóc nếu cảm thấy không hợp không?',
						'answer'   => 'Hoàn toàn được. Vạn Phúc Care luôn tôn trọng cảm xúc và mong muốn thoải mái nhất của mẹ. Bạn chỉ cần liên hệ hotline CSKH, chúng tôi sẽ hỗ trợ đổi điều dưỡng mới ngay lập tức mà không phát sinh thêm chi phí.',
						'open'     => false,
					),
					array(
						'question' => 'Quy trình đặt lịch và hình thức thanh toán như thế nào?',
						'answer'   => 'Mẹ có thể đăng ký trực tuyến qua website hoặc gọi hotline 090 809 31 98. Chuyên viên sẽ tư vấn và xếp lịch theo khung giờ mẹ mong muốn. Mẹ có thể thanh toán linh hoạt qua chuyển khoản hoặc sau khi hoàn thành buổi chăm sóc đầu tiên.',
						'open'     => false,
					),
				);

				get_template_part(
					'template-parts/components/accordion',
					null,
					array(
						'items' => $faq_items,
					)
				);
				?>
			</div>

		</div>
	</section>

</main>

<?php
get_footer();
