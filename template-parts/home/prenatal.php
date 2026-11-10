<?php
/**
 * Template part: Homepage Section 5 - Lớp học tiền sản (Chưa Sẵn Sàng Làm Mẹ ? Hãy Bắt Đầu Từ Lớp Tiền Sản).
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$theme_uri = get_template_directory_uri();
?>

	<!-- =========================================================================
	     5. LỚP HỌC TIỀN SẢN (Chưa Sẵn Sàng Làm Mẹ ? Hãy Bắt Đầu Từ Lớp Tiền Sản)
	     ========================================================================= -->
	<section id="lop-hoc-tien-san" class="vpc-section vpc-gradient-blue-reverse homepage-prenatal-section relative overflow-hidden">
		<div class="vpc-home-container">
			<div class="homepage-prenatal-grid grid grid-cols-1 items-start">

				<!-- Left 2-Photo Composition (50% width, staggered 2-column layout matching Figma) -->
				<div class="homepage-prenatal-visual relative flex items-center justify-center w-full">
					<div class="homepage-prenatal-gallery grid grid-cols-2 gap-4 sm:gap-5 items-start w-full max-w-[350px] sm:max-w-[540px] mx-auto lg:max-w-none">
						<!-- Left Photo (Top-aligned) -->
						<?php $prenatal_home_image_url = vpc_image_url( 'home/lop-hoc-tien-san-1.webp', 'large' ); ?>
						<?php if ( $prenatal_home_image_url ) : ?>
							<div class="homepage-prenatal-gallery__item homepage-prenatal-gallery__item--primary relative w-full aspect-[316/388] overflow-hidden rounded-xl bg-neutral-100">
								<picture class="block w-full h-full">
									<img src="<?php echo esc_url( $prenatal_home_image_url ); ?>"
									     alt="Chăm sóc bé sơ sinh tại lớp học tiền sản Vạn Phúc Care"
									     class="w-full h-full object-cover block"
									     loading="lazy" />
								</picture>
							</div>
						<?php endif; ?>
						<!-- Right Photo (Staggered down) -->
						<?php $prenatal_home_second_image_url = vpc_image_url( 'home/lop-hoc-tien-san-2.webp', 'large' ); ?>
						<?php if ( $prenatal_home_second_image_url ) : ?>
							<div class="homepage-prenatal-gallery__item homepage-prenatal-gallery__item--secondary relative w-full pt-8 sm:pt-12 lg:pt-20">
								<div class="homepage-prenatal-gallery__image-frame w-full aspect-[314/504] overflow-hidden rounded-xl bg-neutral-100">
									<picture class="block w-full h-full">
									<img src="<?php echo esc_url( $prenatal_home_second_image_url ); ?>"
									     alt="Tư vấn và giải đáp thắc mắc cùng điều dưỡng Vạn Phúc Care"
									     class="w-full h-full object-cover block"
									     loading="lazy" />
									</picture>
								</div>
							</div>
						<?php endif; ?>
					</div>
				</div>

				<!-- Right Content (50% width) -->
				<div class="homepage-prenatal-copy flex flex-col items-center lg:items-start text-center lg:text-left w-full">
					<!-- Section badge -->
					<div class="homepage-prenatal-badge mb-6">
						<img src="<?php echo esc_url( $theme_uri . '/assets/images/lop-hoc-tien-san/icons/star-light.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true" />
						<span>LỚP HỌC TIỀN SẢN</span>
					</div>

					<!-- Heading -->
					<div class="flex flex-col mb-3">
						<h2 class="font-heading font-semibold text-h1-mobile xl:text-h1 text-text-heading-primary-default">
							Chưa Sẵn Sàng Làm Mẹ ?
						</h2>
						<h3 class="font-heading font-semibold text-h1-mobile lg:text-[38px] lg:leading-[48px] text-text-heading-secondary-default whitespace-normal lg:whitespace-nowrap">
							Hãy Bắt Đầu Từ Lớp Tiền Sản
						</h3>
					</div>

					<!-- Subtitle (Style chữ base 16/24) -->
					<p class="font-body font-normal sm:font-medium text-base text-text-body-default leading-6 max-w-[580px] text-left w-full mb-4">
						Lộ trình học tập đi qua 8 Module chuyên sâu trong 01 buổi học, giúp cha mẹ tự tin trên hành trình mang thai và sau sinh hiểu rõ hành trình sau sinh.
					</p>

					<!-- Checklist (Style chữ base 16/24) -->
					<div class="w-full max-w-[540px] flex flex-col gap-3 mb-5 lg:mb-6 text-left items-start">
						<p class="font-body font-normal sm:font-medium text-base text-text-body-default text-left w-full leading-6">
							Cha mẹ học được những gì:
						</p>
						<div class="w-full flex flex-col gap-3.5 sm:gap-4 lg:gap-6 items-start">
							<div class="flex items-center gap-2 text-left w-full">
								<img src="<?php echo esc_url( $theme_uri . '/assets/images/icons/course-check.svg' ); ?>" width="25" height="24" class="w-[25px] h-6 shrink-0" alt="" aria-hidden="true" />
								<svg class="hidden" viewBox="0 0 24 24" fill="currentColor">
									<path d="M12 1L9.27 2.94 6 2.67l-.78 3.24L2.27 7.7l.88 3.19L1 13.56l2.39 2.33-.27 3.32 3.24.78 1.79 2.95 3.19-.88 2.66 2.15 2.33-2.39 3.32.27.78-3.24 2.95-1.79-.88-3.19L23 10.44l-2.39-2.33.27-3.32-3.24-.78L15.85 1.06 12.66 1.94 12 1z"/>
									<path d="M8.5 12.2l2.2 2.2 4.8-4.8" stroke="var(--color-neutral-white)" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
								</svg>
								<span class="font-body font-normal sm:font-medium text-base text-text-body-default leading-6">Phần 1: Thai kỳ an toàn &amp; Vượt cạn chủ động</span>
							</div>
							<div class="flex items-center gap-2 text-left w-full">
								<img src="<?php echo esc_url( $theme_uri . '/assets/images/icons/course-check.svg' ); ?>" width="25" height="24" class="w-[25px] h-6 shrink-0" alt="" aria-hidden="true" />
								<svg class="hidden" viewBox="0 0 24 24" fill="currentColor">
									<path d="M12 1L9.27 2.94 6 2.67l-.78 3.24L2.27 7.7l.88 3.19L1 13.56l2.39 2.33-.27 3.32 3.24.78 1.79 2.95 3.19-.88 2.66 2.15 2.33-2.39 3.32.27.78-3.24 2.95-1.79-.88-3.19L23 10.44l-2.39-2.33.27-3.32-3.24-.78L15.85 1.06 12.66 1.94 12 1z"/>
									<path d="M8.5 12.2l2.2 2.2 4.8-4.8" stroke="var(--color-neutral-white)" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
								</svg>
								<span class="font-body font-normal sm:font-medium text-base text-text-body-default leading-6">Phần 2: Nền tảng sữa mẹ &amp; Đọc vị nhu cầu của bé</span>
							</div>
							<div class="flex items-center gap-2 text-left w-full">
								<img src="<?php echo esc_url( $theme_uri . '/assets/images/icons/course-check.svg' ); ?>" width="25" height="24" class="w-[25px] h-6 shrink-0" alt="" aria-hidden="true" />
								<svg class="hidden" viewBox="0 0 24 24" fill="currentColor">
									<path d="M12 1L9.27 2.94 6 2.67l-.78 3.24L2.27 7.7l.88 3.19L1 13.56l2.39 2.33-.27 3.32 3.24.78 1.79 2.95 3.19-.88 2.66 2.15 2.33-2.39 3.32.27.78-3.24 2.95-1.79-.88-3.19L23 10.44l-2.39-2.33.27-3.32-3.24-.78L15.85 1.06 12.66 1.94 12 1z"/>
									<path d="M8.5 12.2l2.2 2.2 4.8-4.8" stroke="var(--color-neutral-white)" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
								</svg>
								<span class="font-body font-normal sm:font-medium text-base text-text-body-default leading-6">Phần 3: Thực hành kỹ năng thiết yếu &amp; Chăm sóc trẻ sơ sinh</span>
							</div>
						</div>
					</div>

					<!-- 4 Info Cards -->
					<div class="w-full flex flex-col gap-2.5 sm:gap-3 lg:gap-5 mb-5 lg:mb-8 text-left">
						<!-- Row 1: 2 cols -->
						<div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5 sm:gap-3 lg:gap-5">
							<!-- Card 1 -->
							<div class="bg-surface-card-default rounded-xl border border-border-divider-default shadow-card p-3 sm:px-3.5 sm:py-2.5 sm:min-h-[73px] flex items-center gap-3">
								<div class="w-[50px] h-[50px] rounded-full bg-surface-badge-secondary flex items-center justify-center shrink-0">
									<img src="<?php echo esc_url( $theme_uri . '/assets/images/lop-hoc-tien-san/icons/duration.svg' ); ?>" width="24" height="24" class="shrink-0" alt="" aria-hidden="true" />
								</div>
								<div>
									<h4 class="font-body font-medium text-base sm:text-lg text-text-heading-primary-default leading-snug">Thời gian</h4>
									<p class="font-body font-medium text-xs sm:text-base text-text-body-muted leading-snug">Khung giờ từ 9:00 - 12:00</p>
								</div>
							</div>

							<!-- Card 2 -->
							<div class="bg-surface-card-default rounded-xl border border-border-divider-default shadow-card p-3 sm:px-3.5 sm:py-2.5 sm:min-h-[73px] flex items-center gap-3">
								<div class="w-[50px] h-[50px] rounded-full bg-surface-badge-secondary flex items-center justify-center shrink-0">
									<img src="<?php echo esc_url( $theme_uri . '/assets/images/lop-hoc-tien-san/icons/schedule.svg' ); ?>" width="22" height="22" class="shrink-0" alt="" aria-hidden="true" />
								</div>
								<div>
									<h4 class="font-body font-medium text-base sm:text-lg text-text-heading-primary-default leading-snug">Thời lượng</h4>
									<p class="font-body font-medium text-xs sm:text-base text-text-body-muted leading-snug">3 giờ/ 1 buổi</p>
								</div>
							</div>
						</div>

						<!-- Card 3 -->
						<div class="bg-surface-card-default rounded-xl border border-border-divider-default shadow-card p-3 sm:px-3.5 sm:py-2.5 sm:min-h-[73px] flex items-center gap-3 w-full">
							<div class="w-[50px] h-[50px] rounded-full bg-surface-badge-secondary flex items-center justify-center shrink-0">
									<img src="<?php echo esc_url( $theme_uri . '/assets/images/lop-hoc-tien-san/icons/map.svg' ); ?>" width="22" height="30.4051" class="shrink-0" alt="" aria-hidden="true" />
							</div>
							<div>
								<h4 class="font-body font-medium text-base sm:text-lg text-text-heading-primary-default leading-snug">Hình thức</h4>
								<p class="font-body font-medium text-xs sm:text-base text-text-body-muted leading-snug">Workshop thực hành trực tiếp tại tầng 1 - Trung tâm ở cữ Vạn Phúc Care</p>
							</div>
						</div>

						<!-- Card 4 -->
						<div class="bg-surface-card-default rounded-xl border border-border-divider-default shadow-card p-3 sm:px-3.5 sm:py-2.5 sm:min-h-[73px] flex items-center gap-3 w-full">
							<div class="w-[50px] h-[50px] rounded-full bg-surface-badge-secondary flex items-center justify-center shrink-0">
								<svg class="w-6 h-[18px] text-text-heading-secondary-default shrink-0" viewBox="0 0 24 18" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
									<path d="M10.5 18C10.5 18 9 18 9 16.5C9 15 10.5 10.5 16.5 10.5C22.5 10.5 24 15 24 16.5C24 18 22.5 18 22.5 18H10.5ZM16.5 9C17.6935 9 18.8381 8.52589 19.682 7.68198C20.5259 6.83807 21 5.69347 21 4.5C21 3.30653 20.5259 2.16193 19.682 1.31802C18.8381 0.474106 17.6935 0 16.5 0C15.3065 0 14.1619 0.474106 13.318 1.31802C12.4741 2.16193 12 3.30653 12 4.5C12 5.69347 12.4741 6.83807 13.318 7.68198C14.1619 8.52589 15.3065 9 16.5 9Z" fill="var(--color-secondary-500)"/>
									<path d="M7.824 18C7.60163 17.5317 7.49074 17.0183 7.5 16.5C7.5 14.4675 8.52 12.375 10.404 10.92C9.46364 10.6303 8.48392 10.4886 7.5 10.5C1.5 10.5 0 15 0 16.5C0 18 1.5 18 1.5 18H7.824Z" fill-rule="evenodd" clip-rule="evenodd" fill="var(--color-secondary-500)"/>
									<path d="M6.75 9C7.74456 9 8.69839 8.60491 9.40165 7.90165C10.1049 7.19839 10.5 6.24456 10.5 5.25C10.5 4.25544 10.1049 3.30161 9.40165 2.59835C8.69839 1.89509 7.74456 1.5 6.75 1.5C5.75544 1.5 4.80161 1.89509 4.09835 2.59835C3.39509 3.30161 3 4.25544 3 5.25C3 6.24456 3.39509 7.19839 4.09835 7.90165C4.80161 8.60491 5.75544 9 6.75 9Z" fill="var(--color-secondary-500)"/>
								</svg>
							</div>
							<div>
								<h4 class="font-body font-medium text-base sm:text-lg text-text-heading-primary-default leading-snug">Số lượng tham gia</h4>
								<p class="font-body font-medium text-xs sm:text-base text-text-body-muted leading-snug">Tối đa 05 cặp bố mẹ (hoặc dưới 10 người) /buổi</p>
							</div>
						</div>
					</div>

					<!-- Buttons (Size md) -->
					<div class="flex flex-col sm:flex-row justify-center lg:justify-start items-center gap-3 w-full sm:w-auto pt-2 lg:pt-6">
						<button data-open-modal="vpc-consultation-modal" data-service="lop-hoc-tien-san" class="vpc-button w-full sm:w-auto h-10 xl:h-12 px-4 xl:px-6 bg-surface-button-primary-default hover:bg-surface-button-primary-hover active:bg-surface-button-primary-pressed text-text-inverse-default rounded-full shadow-xs transition-colors flex items-center justify-center cursor-pointer">
							Đăng ký tư vấn
						</button>
						<button data-open-modal="vpc-consultation-modal" data-service="lop-hoc-tien-san" class="vpc-button w-full sm:w-auto h-10 xl:h-12 px-4 xl:px-6 border border-border-secondary-default hover:bg-surface-badge-secondary/40 active:border-border-secondary-dark text-text-heading-secondary-default rounded-full transition-colors flex items-center justify-center cursor-pointer">
							Xem chi tiết
						</button>
					</div>

				</div>

			</div>
		</div>
	</section>

