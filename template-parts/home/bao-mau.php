<?php
/**
 * Template part: Homepage Section 4 - Dịch vụ Bảo mẫu tại nhà (Bảo Mẫu Tại Nhà, Chăm Bé Chuẩn Y Khoa).
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$theme_uri = get_template_directory_uri();
?>

	<!-- =========================================================================
	     4. DỊCH VỤ BẢO MẪU TẠI NHÀ (Bảo Mẫu Tại Nhà, Chăm Bé Chuẩn Y Khoa)
	     ========================================================================= -->
	<section id="bao-mau-tai-nha" class="vpc-section vpc-gradient-pink relative overflow-hidden">
		<div class="vpc-home-container">
			<div class="grid grid-cols-1 lg:grid-cols-[minmax(0,1.07fr)_minmax(0,1fr)] gap-8 lg:gap-12 xl:gap-[112px] items-center">

				<!-- Images: 2 overlapping photos matching Figma -->
				<div class="relative flex items-center justify-center w-full order-1">
					<div class="relative w-full max-w-[350px] sm:max-w-[420px] lg:max-w-[668px] h-[342px] sm:h-[400px] lg:h-[500px] xl:h-[570px] mx-auto">
						<!-- Left Photo -->
						<?php $homecare_image_url = vpc_image_url( 'home/ba-mau-tai-nha-2.webp', 'large' ); ?>
						<?php if ( $homecare_image_url ) : ?>
							<div class="absolute left-0 top-0 w-[170px] sm:w-[200px] lg:w-[47%] h-[210px] sm:h-[250px] lg:h-auto aspect-[325/402] rounded-xl overflow-hidden shadow-[0_4px_18px_rgba(0,0,0,0.09)]">
								<picture>
									<img src="<?php echo esc_url( $homecare_image_url ); ?>"
									     alt="Bảo mẫu chăm sóc bé tại nhà - Vạn Phúc Care"
									     class="w-full h-full object-cover block"
									     loading="lazy" />
								</picture>
							</div>
						<?php endif; ?>
						<!-- Right Photo (Staggered down) -->
						<?php $homecare_night_image_url = vpc_image_url( 'home/bao-mau-tai-nha-1.webp', 'large' ); ?>
						<?php if ( $homecare_night_image_url ) : ?>
							<div class="absolute right-0 top-[38px] sm:top-[45px] lg:top-[56px] xl:top-[62px] w-[170px] sm:w-[200px] lg:w-[47%] h-[273px] sm:h-[320px] lg:h-auto aspect-[324/521] rounded-xl overflow-hidden shadow-[0_4px_18px_rgba(0,0,0,0.09)]">
								<picture>
									<img src="<?php echo esc_url( $homecare_night_image_url ); ?>"
									     alt="Bảo mẫu tận tâm chăm sóc giấc ngủ của bé"
									     class="w-full h-full object-cover block"
									     loading="lazy" />
								</picture>
							</div>
						<?php endif; ?>
					</div>
				</div>

				<!-- Content -->
				<div class="flex flex-col items-center lg:items-start text-center lg:text-left w-full order-2 gap-5 sm:gap-6">
					<!-- Badge -->
					<div class="inline-flex items-center justify-center gap-2 px-3.5 py-1.5 bg-surface-badge-secondary border border-border-secondary-default rounded-full">
						<img src="<?php echo esc_url( $theme_uri . '/assets/images/icons/sparkle-pink.svg' ); ?>" width="24" height="24" class="w-4 h-4 shrink-0" alt="" aria-hidden="true" />
						<span class="font-body font-medium text-xs sm:text-sm text-text-link-hover tracking-wider uppercase">DỊCH VỤ BẢO MẪU</span>
					</div>

					<!-- Heading -->
					<div class="flex flex-col">
						<h2 class="font-heading font-semibold text-h1-mobile xl:text-h1 text-text-heading-primary-default">
							Bảo Mẫu Tại Nhà,
						</h2>
						<h3 class="font-heading font-semibold text-h1-mobile xl:text-h1 text-text-heading-secondary-default">
							Chăm Bé Chuẩn Y Khoa
						</h3>
					</div>

					<!-- Subtitle -->
					<p class="font-body font-normal sm:font-medium text-base text-text-body-default leading-6 max-w-[612px]">
						Sau sinh mẹ cần thời gian để nghỉ ngơi, hồi phục sức khỏe. Sử dụng dịch vụ bảo mẫu tại nhà là giải pháp tối ưu, giúp gia đình giải quyết những nỗi lo về công việc cá nhân cũng như khả năng chăm sóc trẻ sơ sinh ngay tại tư gia.
					</p>

					<!-- 2 Feature Cards -->
					<div class="w-full flex flex-col gap-5 sm:gap-6 max-w-[612px]">
						<!-- Card 1 -->
						<div class="bg-surface-card-default rounded-xl shadow-card p-3 sm:p-4 flex items-center gap-3.5 text-left">
							<?php $newborn_care_icon_url = vpc_image_url( 'icons/newborn-care.svg', 'full' ); ?>
							<?php if ( $newborn_care_icon_url ) : ?>
								<img src="<?php echo esc_url( $newborn_care_icon_url ); ?>" alt="" width="50" height="50" class="w-[50px] h-[50px] shrink-0" aria-hidden="true">
							<?php endif; ?>
							<div>
								<h4 class="font-body font-medium text-base sm:text-[20px] text-text-heading-primary-default leading-snug">Đa dạng gói chăm sóc trẻ sơ sinh</h4>
							<p class="font-body font-medium text-xs sm:text-base text-text-body-muted leading-relaxed">Thoải mái lựa chọn phù hợp với nhu cầu từng gia đình</p>
							</div>
						</div>

						<!-- Card 2 -->
						<div class="bg-surface-card-default rounded-xl shadow-card p-3 sm:p-4 flex items-center gap-3.5 text-left">
							<img src="<?php echo esc_url( $theme_uri . '/assets/images/icons/pediatric-nurse.svg' ); ?>" width="50" height="50" class="w-[50px] h-[50px] shrink-0" alt="" aria-hidden="true" />
							<div>
								<h4 class="font-body font-medium text-base sm:text-[20px] text-text-heading-primary-default leading-snug">Bảo mẫu là điều dưỡng chuyên môn sản nhi</h4>
							<p class="font-body font-medium text-xs sm:text-base text-text-body-muted leading-relaxed">Bé được chăm sóc tận tình, cá nhân hóa chuẩn y khoa</p>
							</div>
						</div>
					</div>

					<!-- Action Buttons (Size md) -->
					<div class="flex flex-col sm:flex-row justify-center lg:justify-start items-center gap-3 w-full sm:w-auto pt-1">
						<button data-open-modal="vpc-consultation-modal" data-service="bao-mau-tai-nha" class="vpc-button w-full sm:w-auto h-10 xl:h-12 px-4 xl:px-6 bg-surface-button-primary-default hover:bg-surface-button-primary-hover active:bg-surface-button-primary-pressed text-text-inverse-default rounded-full shadow-xs transition-colors flex items-center justify-center cursor-pointer">
							Đăng ký tư vấn
						</button>
						<a href="<?php echo esc_url( home_url( '/dich-vu/bao-mau-tai-nha/' ) ); ?>" class="vpc-button w-full sm:w-auto h-10 xl:h-12 px-4 xl:px-6 border border-border-secondary-default hover:bg-surface-badge-secondary/40 active:border-border-secondary-dark text-text-heading-secondary-default rounded-full transition-colors flex items-center justify-center cursor-pointer">
							Xem chi tiết
						</a>
					</div>

				</div>

			</div>
		</div>
	</section>

