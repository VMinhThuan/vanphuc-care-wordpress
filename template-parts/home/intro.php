<?php
/**
 * Template part: Homepage Section 2 - Giới thiệu (Hành trình cùng mẹ - trải đầy yêu thương).
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$theme_uri = get_template_directory_uri();
?>

<!-- =========================================================================
     2. GIỚI THIỆU: HÀNH TRÌNH CÙNG MẸ - TRẢI ĐẦY YÊU THƯƠNG
     ========================================================================= -->
<section id="gioi-thieu" class="vpc-section bg-surface-background-default relative overflow-hidden">
	<div class="vpc-home-container">
		<div class="grid grid-cols-1 lg:grid-cols-12 gap-6 lg:gap-12 xl:gap-16 items-center">

			<!-- Visual Asset (Nurse, Mother, Baby in Crib + 2 Floating Badges) (Left on Desktop: order-1 lg:order-1) -->
			<div class="intro-visual lg:col-span-6 relative flex justify-center lg:justify-start lg:order-1 pt-0">
				<div class="relative w-full max-w-[350px] sm:max-w-[500px] lg:max-w-[517px] mx-auto lg:ml-20">
					<!-- Main Photo with Rounded Corners matching Figma (border-radius: 50px) -->
					<div class="relative w-full aspect-[4/3] sm:aspect-[517/591] rounded-[32px] sm:rounded-[50px] overflow-hidden shadow-[0px_4px_30px_rgba(0,0,0,0.08)] bg-neutral-100">
						<?php $intro_image_url = vpc_image_url( 'home/hero-section-image.webp', 'large' ); ?>
						<?php if ( $intro_image_url ) : ?>
							<picture>
								<img src="<?php echo esc_url( $intro_image_url ); ?>"
								     alt="Hành trình cùng mẹ trải đầy yêu thương - Vạn Phúc Care"
								     class="w-full h-full object-cover block transition-transform duration-500 hover:scale-[1.02]"
								     loading="lazy" />
							</picture>
						<?php endif; ?>
					</div>

					<!-- Floating Badge 1 (Top Left) -->
					<div class="absolute top-3 -left-3 sm:top-[7%] sm:-left-[13%] bg-surface-card-default rounded-xl p-2.5 sm:p-3 shadow-card border border-surface-background-default flex items-center gap-2.5 sm:gap-3 z-10 animate-fade-in">
						<svg class="w-9 h-9 sm:w-[50px] sm:h-[50px] shrink-0" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M0 25C0 11.1929 11.1929 0 25 0C38.8071 0 50 11.1929 50 25C50 38.8071 38.8071 50 25 50C11.1929 50 0 38.8071 0 25Z" fill="var(--color-surface-badge-secondary)"/>
							<path d="M23.988 12C17.364 12 12 17.376 12 24C12 30.624 17.364 36 23.988 36C30.624 36 36 30.624 36 24C36 17.376 30.624 12 23.988 12ZM29.076 31.2L24 28.14L18.924 31.2L20.268 25.428L15.792 21.552L21.696 21.048L24 15.6L26.304 21.036L32.208 21.54L27.732 25.416L29.076 31.2Z" fill="var(--color-icon-secondary-default)"/>
						</svg>
						<div>
							<div class="font-body font-medium text-lg sm:text-2xl text-text-heading-primary-default leading-tight">98%</div>
							<div class="text-xs sm:text-base text-text-body-muted font-medium font-body">Khách hàng hài lòng</div>
						</div>
					</div>

					<!-- Floating Badge 2 (Bottom Right) -->
					<div class="absolute bottom-3 -right-3 sm:bottom-[8%] sm:-right-[14%] bg-surface-card-default rounded-xl p-2.5 sm:p-3 shadow-card border border-surface-background-default flex items-center gap-2.5 sm:gap-3 z-10 animate-fade-in">
						<svg class="w-9 h-9 sm:w-[50px] sm:h-[50px] shrink-0" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M0 25C0 11.1929 11.1929 0 25 0C38.8071 0 50 11.1929 50 25C50 38.8071 38.8071 50 25 50C11.1929 50 0 38.8071 0 25Z" fill="var(--color-surface-badge-secondary)"/>
							<path d="M23.988 12C17.364 12 12 17.376 12 24C12 30.624 17.364 36 23.988 36C30.624 36 36 30.624 36 24C36 17.376 30.624 12 23.988 12ZM29.076 31.2L24 28.14L18.924 31.2L20.268 25.428L15.792 21.552L21.696 21.048L24 15.6L26.304 21.036L32.208 21.54L27.732 25.416L29.076 31.2Z" fill="var(--color-icon-secondary-default)"/>
						</svg>
						<div>
							<div class="font-body font-medium text-lg sm:text-2xl text-text-heading-primary-default leading-tight">4,9/5</div>
							<div class="text-xs sm:text-base text-text-body-muted font-medium font-body">800+ Đánh giá</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Content & Value Props matching Figma (Right on Desktop: order-2 lg:order-2) -->
			<div class="intro-content lg:col-span-6 lg:flex lg:flex-col lg:space-y-5 lg:pl-4 lg:order-2">
				<div class="intro-badge flex justify-center lg:justify-start">
					<span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full border border-border-secondary-default text-text-link-hover bg-surface-badge-secondary font-body font-medium text-xs tracking-wider uppercase">
						<img src="<?php echo esc_url( $theme_uri . '/assets/images/icons/sparkle-pink.svg' ); ?>" width="24" height="24" class="w-4 h-4 shrink-0" alt="" aria-hidden="true" />
						VẠN PHÚC CARE
					</span>
				</div>

				<h2 class="intro-heading font-heading font-semibold text-center lg:text-left text-h1-mobile xl:text-h1 tracking-tight">
					<span class="text-text-heading-primary-default font-semibold">Hành Trình Cùng Mẹ</span><br>
					<span class="text-text-heading-secondary-default font-semibold">Trải Đầy Yêu Thương</span>
				</h2>

				<p class="intro-description font-body text-text-body-default text-center lg:text-left text-base sm:text-xl lg:text-2xl font-medium leading-relaxed lg:leading-[32px]">
					Được thành lập từ năm 2021, Vạn Phúc Care là hệ sinh thái chăm sóc Mẹ và Bé toàn diện, tận tâm và đáng tin cậy cho mọi gia đình.
				</p>

				<!-- Checklist points matching Figma with blue check badge -->
				<ul class="intro-checklist space-y-3 pt-1 text-sm sm:text-base font-body font-medium text-text-body-default">
					<li class="flex items-start gap-2">
						<svg class="w-5 h-5 shrink-0 mt-0.5" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M23.7581 12.6477C24.0806 12.2768 24.0806 11.725 23.7581 11.3542L21.8639 9.17583C21.6875 8.97297 21.6016 8.70687 21.6261 8.43917L21.8898 5.56056C21.9349 5.06888 21.6092 4.61975 21.1279 4.50979L18.3402 3.87296C18.0754 3.81247 17.8473 3.64541 17.7098 3.41122L16.2496 0.924729C15.9977 0.495784 15.4656 0.321788 15.0089 0.519011L12.3913 1.64949C12.1419 1.75718 11.8591 1.75718 11.6097 1.64949L8.99098 0.518536C8.53478 0.321516 8.00325 0.494934 7.75102 0.923092L6.29208 3.39961C6.154 3.63399 5.92519 3.80088 5.65983 3.86076L2.8757 4.48903C2.3932 4.59791 2.06613 5.04755 2.11114 5.54013L2.3751 8.42906C2.3995 8.69608 2.31405 8.96152 2.13846 9.16416L0.240724 11.3543C-0.0806752 11.7253 -0.0801875 12.2761 0.241868 12.6465L2.13723 14.8261C2.31357 15.0289 2.39946 15.2949 2.375 15.5625L2.11093 18.4527C2.06601 18.9443 2.3917 19.3933 2.87294 19.5033L5.6616 20.1403C5.92591 20.2007 6.15368 20.3673 6.29129 20.6009L7.74991 23.0769C8.00262 23.5058 8.53555 23.679 8.99213 23.4804L11.6088 22.3426C11.8587 22.234 12.1424 22.2336 12.3926 22.3417L15.01 23.472C15.4662 23.6691 15.9978 23.4956 16.25 23.0675L17.7097 20.5896C17.8473 20.356 18.0751 20.1894 18.3394 20.1291L21.1279 19.492C21.6092 19.3821 21.9349 18.933 21.8898 18.4413L21.6261 15.5627C21.6016 15.295 21.6875 15.0289 21.8639 14.826L23.7581 12.6477ZM10.1697 17.0066C9.99977 17.1779 9.72282 17.1779 9.55293 17.0066L6.42685 13.8544C5.97218 13.3959 5.97267 12.6565 6.42793 12.1986C6.88801 11.7359 7.63697 11.7367 8.09604 12.2004L9.6754 13.7956C9.77778 13.899 9.94485 13.8991 10.0473 13.7957L15.5799 8.21239C16.0392 7.74894 16.7881 7.7483 17.2481 8.21097C17.7035 8.66893 17.704 9.40853 17.2492 9.86711L10.1697 17.0066Z" fill="var(--color-icon-primary-default)"/>
						</svg>
						<span>Liệu trình chuẩn y khoa, cá nhân hóa theo nhu cầu</span>
					</li>
					<li class="flex items-start gap-2">
						<svg class="w-5 h-5 shrink-0 mt-0.5" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M23.7581 12.6477C24.0806 12.2768 24.0806 11.725 23.7581 11.3542L21.8639 9.17583C21.6875 8.97297 21.6016 8.70687 21.6261 8.43917L21.8898 5.56056C21.9349 5.06888 21.6092 4.61975 21.1279 4.50979L18.3402 3.87296C18.0754 3.81247 17.8473 3.64541 17.7098 3.41122L16.2496 0.924729C15.9977 0.495784 15.4656 0.321788 15.0089 0.519011L12.3913 1.64949C12.1419 1.75718 11.8591 1.75718 11.6097 1.64949L8.99098 0.518536C8.53478 0.321516 8.00325 0.494934 7.75102 0.923092L6.29208 3.39961C6.154 3.63399 5.92519 3.80088 5.65983 3.86076L2.8757 4.48903C2.3932 4.59791 2.06613 5.04755 2.11114 5.54013L2.3751 8.42906C2.3995 8.69608 2.31405 8.96152 2.13846 9.16416L0.240724 11.3543C-0.0806752 11.7253 -0.0801875 12.2761 0.241868 12.6465L2.13723 14.8261C2.31357 15.0289 2.39946 15.2949 2.375 15.5625L2.11093 18.4527C2.06601 18.9443 2.3917 19.3933 2.87294 19.5033L5.6616 20.1403C5.92591 20.2007 6.15368 20.3673 6.29129 20.6009L7.74991 23.0769C8.00262 23.5058 8.53555 23.679 8.99213 23.4804L11.6088 22.3426C11.8587 22.234 12.1424 22.2336 12.3926 22.3417L15.01 23.472C15.4662 23.6691 15.9978 23.4956 16.25 23.0675L17.7097 20.5896C17.8473 20.356 18.0751 20.1894 18.3394 20.1291L21.1279 19.492C21.6092 19.3821 21.9349 18.933 21.8898 18.4413L21.6261 15.5627C21.6016 15.295 21.6875 15.0289 21.8639 14.826L23.7581 12.6477ZM10.1697 17.0066C9.99977 17.1779 9.72282 17.1779 9.55293 17.0066L6.42685 13.8544C5.97218 13.3959 5.97267 12.6565 6.42793 12.1986C6.88801 11.7359 7.63697 11.7367 8.09604 12.2004L9.6754 13.7956C9.77778 13.899 9.94485 13.8991 10.0473 13.7957L15.5799 8.21239C16.0392 7.74894 16.7881 7.7483 17.2481 8.21097C17.7035 8.66893 17.704 9.40853 17.2492 9.86711L10.1697 17.0066Z" fill="var(--color-icon-primary-default)"/>
						</svg>
						<span>100% đội ngũ điều dưỡng, hộ sinh chuyên môn cao, giàu kinh nghiệm</span>
					</li>
					<li class="flex items-start gap-2">
						<svg class="w-5 h-5 shrink-0 mt-0.5" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M23.7581 12.6477C24.0806 12.2768 24.0806 11.725 23.7581 11.3542L21.8639 9.17583C21.6875 8.97297 21.6016 8.70687 21.6261 8.43917L21.8898 5.56056C21.9349 5.06888 21.6092 4.61975 21.1279 4.50979L18.3402 3.87296C18.0754 3.81247 17.8473 3.64541 17.7098 3.41122L16.2496 0.924729C15.9977 0.495784 15.4656 0.321788 15.0089 0.519011L12.3913 1.64949C12.1419 1.75718 11.8591 1.75718 11.6097 1.64949L8.99098 0.518536C8.53478 0.321516 8.00325 0.494934 7.75102 0.923092L6.29208 3.39961C6.154 3.63399 5.92519 3.80088 5.65983 3.86076L2.8757 4.48903C2.3932 4.59791 2.06613 5.04755 2.11114 5.54013L2.3751 8.42906C2.3995 8.69608 2.31405 8.96152 2.13846 9.16416L0.240724 11.3543C-0.0806752 11.7253 -0.0801875 12.2761 0.241868 12.6465L2.13723 14.8261C2.31357 15.0289 2.39946 15.2949 2.375 15.5625L2.11093 18.4527C2.06601 18.9443 2.3917 19.3933 2.87294 19.5033L5.6616 20.1403C5.92591 20.2007 6.15368 20.3673 6.29129 20.6009L7.74991 23.0769C8.00262 23.5058 8.53555 23.679 8.99213 23.4804L11.6088 22.3426C11.8587 22.234 12.1424 22.2336 12.3926 22.3417L15.01 23.472C15.4662 23.6691 15.9978 23.4956 16.25 23.0675L17.7097 20.5896C17.8473 20.356 18.0751 20.1894 18.3394 20.1291L21.1279 19.492C21.6092 19.3821 21.9349 18.933 21.8898 18.4413L21.6261 15.5627C21.6016 15.295 21.6875 15.0289 21.8639 14.826L23.7581 12.6477ZM10.1697 17.0066C9.99977 17.1779 9.72282 17.1779 9.55293 17.0066L6.42685 13.8544C5.97218 13.3959 5.97267 12.6565 6.42793 12.1986C6.88801 11.7359 7.63697 11.7367 8.09604 12.2004L9.6754 13.7956C9.77778 13.899 9.94485 13.8991 10.0473 13.7957L15.5799 8.21239C16.0392 7.74894 16.7881 7.7483 17.2481 8.21097C17.7035 8.66893 17.704 9.40853 17.2492 9.86711L10.1697 17.0066Z" fill="var(--color-icon-primary-default)"/>
						</svg>
						<span>Đồng hành cùng mẹ và bé trong năm đầu đời</span>
					</li>
				</ul>

				<!-- 3 Stats Counter Single Card matching Figma -->
				<div class="intro-stats rounded-xl border border-surface-background-default bg-surface-card-default p-3 sm:py-3 sm:px-4 shadow-card">
					<div class="grid grid-cols-3 divide-x divide-border-divider-default text-left">
						<div class="px-1.5 sm:px-3">
							<div class="font-body font-medium text-lg sm:text-2xl text-text-body-default leading-snug">5+ Năm</div>
							<div class="text-xs sm:text-base text-text-body-muted mt-1 font-body font-medium">Kinh nghiệm</div>
						</div>
						<div class="px-1.5 sm:px-3">
							<div class="font-body font-medium text-lg sm:text-2xl text-text-body-default leading-snug">8+ Dịch vụ</div>
							<div class="text-xs sm:text-base text-text-body-muted mt-1 font-body font-medium">Chăm sóc toàn diện</div>
						</div>
						<div class="px-1.5 sm:px-3">
							<div class="font-body font-medium text-lg sm:text-2xl text-text-body-default leading-snug">5000+ Khách</div>
							<div class="text-xs sm:text-base text-text-body-muted mt-1 font-body font-medium">Sử dụng dịch vụ</div>
						</div>
					</div>
				</div>

				<div class="intro-action pt-2 w-full lg:w-auto flex justify-center lg:justify-start">
					<a href="<?php echo esc_url( home_url( '/lien-he/' ) ); ?>" class="vpc-button w-full sm:w-auto h-10 xl:h-12 px-4 xl:px-6 rounded-full border border-border-secondary-default text-text-heading-secondary-default hover:bg-surface-badge-secondary/60 flex items-center justify-center transition-colors">
						<span>Tìm Hiểu Thêm</span>
					</a>
				</div>
			</div>

		</div>
	</div>
</section>

