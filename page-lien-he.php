<?php
/**
 * Template Name: Trang Liên Hệ
 * Template Post Type: page
 *
 * Contact page template for Vạn Phúc Care.
 * Designed exactly matching the Figma specification & homepage typography rules:
 * - Hero Banner: 1440x458 with linear gradient (#F8F8F8 to #FDE6E6), rounded badge,
 *   2-line heading (Fraunces 600, primary #1A77BA and secondary #F48283), subtitle.
 * - Contact Body: 2-column layout (Consultation Form on left, Center Info Card & Map on right).
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$theme_uri               = get_template_directory_uri();
$map_url                 = 'https://www.google.com/maps/place/V%E1%BA%A1n+Ph%C3%BAc+Care/@21.0741276,105.8221623,1041m/data=!3m2!1e3!4b1!4m6!3m5!1s0x3135ab83e4098b37:0xb1b8897775e1ce60!8m2!3d21.0741276!4d105.8221623!16s%2Fg%2F11q2y0_pyw?entry=ttu&g_ep=EgoyMDI2MTAyMC4wIKXMDSoASAFQAw%3D%3D';
$consultation_services   = vpc_get_consultation_services();
$gestational_age_options = vpc_get_gestational_age_options();
?>

	<!-- =========================================================================
	     1. CONTACT HERO BANNER (FIGMA: MOBILE 390x306 / DESKTOP 1440x458)
	     ========================================================================= -->
	<section class="vpc-contact-hero min-h-[306px] xl:min-h-[458px] w-full flex flex-col items-center justify-center px-4 sm:px-10 xl:px-20 py-10 xl:py-24 text-center relative border-b border-border-divider-default/30">
		<div class="w-full max-w-5xl mx-auto flex flex-col items-center gap-5 sm:gap-6">
			
			<!-- Badge: Rounded pill matching Figma SVG (Mobile 317x34px, Desktop 416x42px) -->
			<div class="vpc-contact-badge shadow-xs">
				<img src="<?php echo esc_url( $theme_uri . '/assets/images/icons/contact-sparkle.svg' ); ?>" 
				     class="w-6 h-6 shrink-0" 
				     alt="" 
				     aria-hidden="true" />
				<span class="vpc-contact-badge-text">
					HÀNH TRÌNH CÙNG MẸ - TRẢI ĐẦY YÊU THƯƠNG
				</span>
			</div>

			<!-- Heading: Follows homepage title typography rules (Fraunces 600, 2 contrasting lines) -->
			<h1 class="vpc-contact-hero-h1">
				<span class="text-text-heading-primary-default block">Liên Hệ Với Chúng Tôi</span>
				<span class="text-text-heading-secondary-default block mt-0 xl:mt-1">Vạn Phúc Care</span>
			</h1>

			<!-- Subtitle: Manrope 16px/24px mobile, 16px/24px desktop matching Figma -->
			<p class="vpc-contact-hero-desc">
				Mỗi hành trình làm mẹ đều cần một người đồng hành.<br class="vpc-contact-hero-desc-break" aria-hidden="true">
				Chúng tôi luôn sẵn sàng lắng nghe và sẻ chia cùng bạn.
			</p>

		</div>
	</section>

	<!-- =========================================================================
	     2. CONTACT CONTENT SECTION (FORM & LOCATION INFO)
	     ========================================================================= -->
	<section class="vpc-section bg-surface-background-default py-10 sm:py-12 lg:py-16 xl:py-24">
		<div class="vpc-home-container max-w-[1280px] mx-auto px-5 sm:px-6 lg:px-8">
			<div class="grid grid-cols-1 xl:grid-cols-[minmax(0,658px)_minmax(0,550px)] gap-8 xl:gap-[72px] items-start">
				
				<!-- LEFT COLUMN: Consultation Form (7 columns on Desktop) -->
				<div class="flex flex-col space-y-6">
					
					<!-- Form Header & Badge -->
					<div class="space-y-6">
						<div class="flex items-center justify-center xl:justify-start gap-1 text-text-caption-dark">
							<img src="<?php echo esc_url( $theme_uri . '/assets/images/icons/heart-solid.svg' ); ?>" width="24" height="24" class="w-6 h-6 shrink-0" alt="" aria-hidden="true">
							<span class="font-body font-medium text-base text-text-caption-dark">
								Chúng tôi luôn lắng nghe
							</span>
						</div>
						
						<h2 class="font-heading font-semibold text-h1-mobile xl:text-h1 xl:leading-[64px] text-text-heading-primary-default text-center xl:text-left tracking-tight">
							Vạn Phúc Care Đồng<br class="sm:hidden"> Hành Cùng Bạn
						</h2>
						
						<p class="font-body font-medium text-base text-text-body-default text-center xl:text-left leading-6 max-w-[350px] sm:max-w-none mx-auto xl:mx-0">
							Để lại lời nhắn, đội ngũ Vạn Phúc Care sẽ tư vấn dịch vụ phù hợp với nhu cầu của mẹ và bé.
						</p>
					</div>

					<!-- Form Card Container -->
					<div class="w-full max-w-[350px] sm:max-w-none mx-auto bg-surface-background-default border border-border-disabled-default rounded-3xl px-4 py-6 sm:p-6 xl:p-8">
						<form id="vpc-contact-page-form" class="flex flex-col gap-5">
							<?php wp_nonce_field( 'vpc_consultation_nonce', 'vpc_consultation_nonce' ); ?>
							<input type="text" name="website" value="" tabindex="-1" autocomplete="off" aria-hidden="true" class="hidden">
							
							<!-- Row 1: Họ và tên & Số điện thoại (2 columns on sm+ matching Figma) -->
							<div class="grid grid-cols-1 sm:grid-cols-2 gap-5 sm:gap-4">
								<!-- Họ và tên -->
								<div class="flex flex-col gap-3">
									<label class="font-body font-medium text-xl leading-7 text-text-body-default flex items-center gap-1">
										<span class="text-text-error-default">*</span> Họ và tên
									</label>
									<input type="text" 
									       name="customer_name" 
									       required 
									       placeholder="Nguyễn Như Linh"
									       class="w-full h-12 px-3 sm:px-4 rounded-xl border border-border-disabled-default bg-surface-background-default text-text-body-default placeholder:text-text-disabled-light font-body font-medium text-base focus:border-border-primary-default focus:ring-1 focus:ring-border-primary-default focus:outline-none transition-all">
								</div>

								<!-- Số điện thoại -->
								<div class="flex flex-col gap-3">
									<label class="font-body font-medium text-xl leading-7 text-text-body-default flex items-center gap-1">
										<span class="text-text-error-default">*</span> Số điện thoại
									</label>
									<input type="tel" 
									       name="customer_phone" 
									       required 
									       placeholder="0345678***"
									       class="w-full h-12 px-3 sm:px-4 rounded-xl border border-border-disabled-default bg-surface-background-default text-text-body-default placeholder:text-text-disabled-light font-body font-medium text-base focus:border-border-primary-default focus:ring-1 focus:ring-border-primary-default focus:outline-none transition-all">
								</div>
							</div>

							<!-- Giai đoạn thai kỳ -->
							<fieldset class="block border-0 p-0 m-0">
								<legend class="mb-3 font-body font-medium text-xl leading-7 text-text-body-default flex items-center gap-1">
									<span class="text-text-error-default">*</span> Giai đoạn thai kỳ
								</legend>
								<div class="flex flex-nowrap items-center gap-2 sm:gap-2.5 xl:gap-3 overflow-x-auto sm:overflow-visible scrollbar-none pb-1 sm:pb-0" role="radiogroup" aria-label="Giai đoạn thai kỳ">
									<label class="cursor-pointer shrink-0"><input class="peer sr-only" type="radio" name="pregnancy_stage" value="dang-mang-thai" checked required><span class="inline-flex items-center justify-center rounded-full border border-border-primary-default bg-transparent px-4 sm:px-5 xl:px-6 h-11 sm:h-12 font-body text-sm sm:text-base font-medium text-text-body-default cursor-pointer whitespace-nowrap transition-colors peer-focus-visible:ring-2 peer-focus-visible:ring-border-focus-default peer-checked:border-border-primary-default peer-checked:bg-surface-button-primary-default peer-checked:text-text-inverse-default">Đang mang thai</span></label>
									<label class="cursor-pointer shrink-0"><input class="peer sr-only" type="radio" name="pregnancy_stage" value="chuan-bi-mang-thai" required><span class="inline-flex items-center justify-center rounded-full border border-border-primary-default bg-transparent px-4 sm:px-5 xl:px-6 h-11 sm:h-12 font-body text-sm sm:text-base font-medium text-text-body-default cursor-pointer whitespace-nowrap transition-colors peer-focus-visible:ring-2 peer-focus-visible:ring-border-focus-default peer-checked:border-border-primary-default peer-checked:bg-surface-button-primary-default peer-checked:text-text-inverse-default">Chuẩn bị mang thai</span></label>
									<label class="cursor-pointer shrink-0"><input class="peer sr-only" type="radio" name="pregnancy_stage" value="da-sinh-be" required><span class="inline-flex items-center justify-center rounded-full border border-border-primary-default bg-transparent px-4 sm:px-5 xl:px-6 h-11 sm:h-12 font-body text-sm sm:text-base font-medium text-text-body-default cursor-pointer whitespace-nowrap transition-colors peer-focus-visible:ring-2 peer-focus-visible:ring-border-focus-default peer-checked:border-border-primary-default peer-checked:bg-surface-button-primary-default peer-checked:text-text-inverse-default">Đã sinh bé</span></label>
								</div>
							</fieldset>

							<!-- Dịch vụ quan tâm -->
							<div class="flex flex-col gap-3">
								<label class="font-body font-medium text-xl leading-7 text-text-body-default flex items-center gap-1">
									<span class="text-text-error-default">*</span> Dịch vụ quan tâm
								</label>
								<div class="relative">
									<select name="service" required class="w-full h-12 px-3 sm:px-4 rounded-xl border border-border-disabled-default bg-surface-background-default text-text-body-default font-body font-medium text-base focus:border-border-primary-default focus:ring-1 focus:ring-border-primary-default focus:outline-none transition-all appearance-none pr-10">
										<option value="trung-tam-o-cu" selected>Trung tâm ở cữ</option>
										<?php foreach ( $consultation_services as $service_value => $service_label ) : ?>
											<?php if ( $service_value !== 'trung-tam-o-cu' ) : ?>
												<option value="<?php echo esc_attr( $service_value ); ?>"><?php echo esc_html( $service_label ); ?></option>
											<?php endif; ?>
										<?php endforeach; ?>
									</select>
									<div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3.5">
										<img src="<?php echo esc_url( $theme_uri . '/assets/images/icons/contact-chevron-down.svg' ); ?>" alt="" aria-hidden="true" width="20" height="12">
									</div>
								</div>
							</div>

							<!-- Tuần thai -->
							<div class="flex flex-col gap-3">
								<label class="font-body font-medium text-xl leading-7 text-text-body-default flex items-center gap-1">
									<span class="text-text-error-default">*</span> Tuần thai
								</label>
								<div class="relative">
									<select name="gestational_age" required class="w-full h-12 px-3 sm:px-4 rounded-xl border border-border-disabled-default bg-surface-background-default text-text-body-default font-body font-medium text-base focus:border-border-primary-default focus:ring-1 focus:ring-border-primary-default focus:outline-none transition-all appearance-none pr-10">
										<option value="" disabled selected>Chọn giai đoạn</option>
										<?php foreach ( $gestational_age_options as $age_value => $age_label ) : ?>
											<option value="<?php echo esc_attr( $age_value ); ?>"><?php echo esc_html( $age_label ); ?></option>
										<?php endforeach; ?>
									</select>
									<div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3.5">
										<img src="<?php echo esc_url( $theme_uri . '/assets/images/icons/contact-chevron-down.svg' ); ?>" alt="" aria-hidden="true" width="20" height="12">
									</div>
								</div>
							</div>

							<!-- Ghi chú (No asterisk matching Figma) -->
							<div class="flex flex-col gap-3">
								<label class="font-body font-medium text-xl leading-7 text-text-body-default">
									Ghi chú
								</label>
								<textarea name="customer_note" 
								          rows="2" 
								          placeholder="Cho chúng tôi biết thêm về nhu cầu của bạn!"
								          class="w-full min-h-[58px] sm:min-h-[64px] px-3 sm:px-4 py-3 rounded-xl border border-border-disabled-default bg-surface-background-default text-text-body-default placeholder:text-text-disabled-light font-body font-medium text-base focus:border-border-primary-default focus:ring-1 focus:ring-border-primary-default focus:outline-none transition-all resize-none leading-relaxed"></textarea>
							</div>

							<!-- Submit Button: Pill button matching Figma -->
							<div class="pt-0">
								<button type="submit" class="vpc-button w-full xl:w-auto px-6 h-10 sm:h-12 bg-surface-button-primary-default hover:bg-surface-button-primary-hover active:bg-surface-button-primary-pressed text-text-inverse-default rounded-full flex items-center justify-center transition-all cursor-pointer font-body font-medium text-base">
									Gửi yêu cầu tư vấn
								</button>
							</div>
						</form>
					</div>

				</div>

				<!-- RIGHT COLUMN: Center Info Card (5 columns on Desktop) -->
				<div class="flex flex-col">
					<div class="w-full max-w-[350px] sm:max-w-none mx-auto bg-neutral-white border border-border-disabled-default/60 sm:border-border-divider-default/70 rounded-2xl sm:rounded-3xl p-4 sm:p-5 xl:p-6 space-y-6">
						
						<!-- Intro Text: Centered on mobile matching Figma -->
						<p class="font-body text-base text-text-body-default text-center sm:text-left leading-6 font-medium max-w-[318px] sm:max-w-none mx-auto sm:mx-0">
							Chào đón mẹ và gia đình đến thăm trung tâm, cảm nhận sự chăm sóc tận tâm dành cho mẹ và bé.
						</p>

						<!-- Center Photo with Rounded Corners matching Figma (8px on mobile) -->
						<div class="w-full h-[194px] sm:h-auto sm:aspect-[510/318] rounded-[8px] sm:rounded-2xl overflow-hidden relative shadow-xs bg-neutral-100">
							<img src="<?php echo esc_url( $theme_uri . '/assets/images/contact-center-figma.png' ); ?>" 
							     alt="Trung Tâm Ở Cữ Vạn Phúc Care" 
							     class="w-full h-full object-cover block transition-transform duration-500 hover:scale-[1.02] rounded-[8px] sm:rounded-2xl" 
							     loading="lazy">
						</div>

						<!-- Center Name: Manrope Medium 20px matching Figma -->
						<h3 class="font-body font-medium text-xl leading-7 text-text-body-default tracking-tight pt-1">
							Trung Tâm Ở Cữ Vạn Phúc Care
						</h3>

						<!-- Contact Details -->
						<div class="space-y-3 pt-0">
							
							<!-- Address -->
							<div class="flex items-start gap-3">
								<span class="w-[17px] h-6 shrink-0 mt-0.5 flex items-center justify-center"><img src="<?php echo esc_url( $theme_uri . '/assets/images/icons/contact-map.svg' ); ?>" alt="" aria-hidden="true" width="17" height="24"></span>
								<div>
									<p class="font-body text-base font-medium text-text-body-muted leading-6">
										35B ngõ 399 Âu Cơ, Tây Hồ, Hà Nội
									</p>
					<a href="<?php echo esc_url( $map_url ); ?>"
									   target="_blank" 
									   rel="noopener noreferrer" 
									   class="font-body text-base font-medium text-text-body-muted hover:text-text-link-hover hover:underline inline-block">
										Xem đường đi
									</a>
								</div>
							</div>

							<!-- Opening Hours -->
							<div class="flex items-center gap-3">
								<span class="w-6 h-6 shrink-0 flex items-center justify-center"><img src="<?php echo esc_url( $theme_uri . '/assets/images/icons/contact-duration.svg' ); ?>" alt="" aria-hidden="true" width="24" height="24"></span>
								<p class="font-body text-base font-medium text-text-body-muted leading-6">
									Thời gian mở cửa: 08h30 – 17h30 (hàng ngày)
								</p>
							</div>

							<!-- Email -->
							<div class="flex items-center gap-3">
								<span class="w-6 h-6 shrink-0 flex items-center justify-center"><img src="<?php echo esc_url( $theme_uri . '/assets/images/icons/contact-email.svg' ); ?>" alt="" aria-hidden="true" width="24" height="24"></span>
								<a href="mailto:info@vanphuccare.vn" class="font-body text-base font-medium text-text-body-muted hover:text-text-link-hover transition-colors leading-6">
									Email: info@vanphuccare.vn
								</a>
							</div>
						</div>

						<!-- Map Embed Container with Google Map Preview -->
						<div class="bg-surface-background-default rounded-xl p-4 w-full flex flex-col gap-3 items-center">
							<a href="<?php echo esc_url( $map_url ); ?>" target="_blank" rel="noopener noreferrer" aria-label="Mở bản đồ Vạn Phúc Care trên Google Maps" class="block w-full h-[150px] sm:h-auto sm:aspect-[478/258] overflow-hidden rounded-xl">
								<img src="<?php echo esc_url( $theme_uri . '/assets/images/contact-map-figma.png' ); ?>" alt="Bản đồ chỉ đường Trung Tâm Ở Cữ Vạn Phúc Care" class="w-full h-full object-cover rounded-xl" loading="lazy">
							</a>
							
							<div class="text-center w-full">
								<a href="<?php echo esc_url( $map_url ); ?>"
								   target="_blank" 
								   rel="noopener noreferrer" 
								   class="font-body text-xs font-normal text-text-body-muted hover:text-text-link-hover transition-colors leading-4 block">
									Xem đường đi trên Google Map
								</a>
							</div>
						</div>

					</div>
				</div>

			</div>
		</div>
	</section>

<?php
get_footer();
