<?php
/**
 * Template part: Homepage Section 9 - Báo chí nói về chúng tôi.
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$theme_uri = get_template_directory_uri();
?>

	<!-- =========================================================================
	     9. BÁO CHÍ NÓI VỀ CHÚNG TÔI
	     ========================================================================= -->
	<section id="bao-chi" class="vpc-section vpc-gradient-press relative overflow-hidden">
		<div class="vpc-home-container">
			<!-- Section Header -->
			<div class="text-center max-w-3xl mx-auto mb-8 sm:mb-14">
				<!-- Badge -->
				<div class="inline-flex items-center justify-center gap-2 px-3.5 py-1 bg-surface-badge-secondary border border-border-secondary-default rounded-full mb-3 shadow-xs">
					<img src="<?php echo esc_url( $theme_uri . '/assets/images/icons/sparkle-pink.svg' ); ?>" width="24" height="24" class="w-4 h-4 shrink-0" alt="" aria-hidden="true" />
					<span class="font-body font-medium text-xs sm:text-sm tracking-wider uppercase text-text-link-hover">BÀI BÁO NỔI BẬT</span>
				</div>

				<!-- Title -->
				<h2 class="font-heading font-semibold text-h1-mobile xl:text-h1 text-center">
					<span class="text-text-heading-primary-default">Báo Chí Nói </span><br class="sm:hidden">
					<span class="text-text-heading-secondary-default">Về Chúng Tôi</span>
				</h2>

				<!-- Subtitle -->
				<p class="font-body font-medium text-sm sm:text-base text-text-body-default leading-6 max-w-3xl mx-auto mt-3">
					Vạn Phúc Care tự hào khi nhận được sự quan tâm, ghi nhận từ các cơ quan báo chí và giới chuyên môn về những nỗ lực mang đến dịch vụ chăm sóc sức khỏe mẹ và bé chất lượng nhất.
				</p>
			</div>

			<!-- 3 Press Cards (Mobile horizontal scroll snap, Desktop grid) -->
			<div class="press-cards-track flex flex-row overflow-x-auto scrollbar-none gap-6 md:gap-4 px-5 -mx-5 snap-x snap-mandatory md:grid md:grid-cols-2 lg:grid-cols-3 md:mx-0 md:px-0">

				<!-- Card 1 -->
				<article class="press-card min-w-[300px] w-[300px] md:min-w-0 md:w-auto snap-start bg-surface-card-default rounded-2xl p-4 sm:p-5 border border-neutral-100 hover:shadow-md transition-all duration-300 flex flex-col group shrink-0 md:shrink">
					<!-- Thumbnail Image -->
					<div class="relative w-full aspect-[268/208] rounded-xl overflow-hidden bg-neutral-200">
							<?php $press_featured_image_url = vpc_image_url( 'home/Bai-bao-noi-bat.webp', 'large' ); ?>
							<?php if ( $press_featured_image_url ) : ?>
								<picture>
									<img src="<?php echo esc_url( $press_featured_image_url ); ?>" alt="Vạn Phúc Care - Báo chí đưa tin" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" loading="lazy">
								</picture>
							<?php endif; ?>
					</div>

					<!-- Content -->
					<div class="flex flex-col flex-grow pt-4">
						<h3 class="font-body font-semibold text-base sm:text-lg text-neutral-900 group-hover:text-text-heading-primary-default transition-colors leading-snug line-clamp-3 mb-2">
							<span>Vạn Phúc Care - Hành trình chăm sóc yêu thương và những dấu ấn tiên phong dịch vụ mẹ và bé</span>
						</h3>
						<p class="font-body text-sm sm:text-base text-text-body-muted leading-relaxed line-clamp-3 mb-4 flex-grow">
							Khởi đầu từ khát vọng mang đến sự chăm sóc chuyên nghiệp và hoàn hảo nhất cho mẹ và bé, Vạn Phúc Care đã trải qua một hành trình đầy tự hào.
						</p>

						<!-- Footer info -->
						<div class="flex items-center justify-between pt-3.5 border-t border-neutral-200/70 mt-auto">
							<div class="flex items-center gap-2">
								<span class="text-xs font-semibold text-neutral-800">CafeF</span>
							</div>
							<span class="text-xs text-neutral-400 font-medium">12/09/2024</span>
						</div>
					</div>
				</article>

				<!-- Card 2 -->
				<article class="press-card min-w-[300px] w-[300px] md:min-w-0 md:w-auto snap-start bg-surface-card-default rounded-2xl p-4 sm:p-5 border border-neutral-100 hover:shadow-md transition-all duration-300 flex flex-col group shrink-0 md:shrink">
					<!-- Thumbnail Image -->
					<div class="relative w-full aspect-[268/208] rounded-xl overflow-hidden bg-neutral-200">
							<?php $press_event_two_image_url = vpc_image_url( 'press_event_2.webp', 'large' ); ?>
							<?php if ( $press_event_two_image_url ) : ?>
								<img src="<?php echo esc_url( $press_event_two_image_url ); ?>" alt="Vạn Phúc Care - Báo chí đưa tin" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" loading="lazy">
							<?php endif; ?>
					</div>

					<!-- Content -->
					<div class="flex flex-col flex-grow pt-4">
						<h3 class="font-body font-semibold text-base sm:text-lg text-neutral-900 group-hover:text-text-heading-primary-default transition-colors leading-snug line-clamp-3 mb-2">
							<span>Vạn Phúc Care - Hành trình chăm sóc yêu thương và những dấu ấn tiên phong dịch vụ mẹ và bé</span>
						</h3>
						<p class="font-body text-sm sm:text-base text-text-body-muted leading-relaxed line-clamp-3 mb-4 flex-grow">
							Khởi đầu từ khát vọng mang đến sự chăm sóc chuyên nghiệp và hoàn hảo nhất cho mẹ và bé, Vạn Phúc Care đã trải qua một hành trình đầy tự hào.
						</p>

						<!-- Footer info -->
						<div class="flex items-center justify-between pt-3.5 border-t border-neutral-200/70 mt-auto">
							<div class="flex items-center gap-2">
								<span class="text-xs font-semibold text-neutral-800">CafeF</span>
							</div>
							<span class="text-xs text-neutral-400 font-medium">12/09/2024</span>
						</div>
					</div>
				</article>

				<!-- Card 3 -->
				<article class="press-card min-w-[300px] w-[300px] md:min-w-0 md:w-auto snap-start bg-surface-card-default rounded-2xl p-4 sm:p-5 border border-neutral-100 hover:shadow-md transition-all duration-300 flex flex-col group shrink-0 md:shrink">
					<!-- Thumbnail Image -->
					<div class="relative w-full aspect-[268/208] rounded-xl overflow-hidden bg-neutral-200">
							<?php $press_event_three_image_url = vpc_image_url( 'press_event_3.webp', 'large' ); ?>
							<?php if ( $press_event_three_image_url ) : ?>
								<img src="<?php echo esc_url( $press_event_three_image_url ); ?>" alt="Vạn Phúc Care - Báo chí đưa tin" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" loading="lazy">
							<?php endif; ?>
					</div>

					<!-- Content -->
					<div class="flex flex-col flex-grow pt-4">
						<h3 class="font-body font-semibold text-base sm:text-lg text-neutral-900 group-hover:text-text-heading-primary-default transition-colors leading-snug line-clamp-3 mb-2">
							<span>Vạn Phúc Care - Hành trình chăm sóc yêu thương và những dấu ấn tiên phong dịch vụ mẹ và bé</span>
						</h3>
						<p class="font-body text-sm sm:text-base text-text-body-muted leading-relaxed line-clamp-3 mb-4 flex-grow">
							Khởi đầu từ khát vọng mang đến sự chăm sóc chuyên nghiệp và hoàn hảo nhất cho mẹ và bé, Vạn Phúc Care đã trải qua một hành trình đầy tự hào.
						</p>

						<!-- Footer info -->
						<div class="flex items-center justify-between pt-3.5 border-t border-neutral-200/70 mt-auto">
							<div class="flex items-center gap-2">
								<span class="text-xs font-semibold text-neutral-800">CafeF</span>
							</div>
							<span class="text-xs text-neutral-400 font-medium">12/09/2024</span>
						</div>
					</div>
				</article>

			</div>

			<!-- Bottom CTA Button -->
			<div class="w-full flex justify-center mt-8 sm:mt-12">
				<span class="vpc-button w-full sm:w-auto max-w-[350px] h-10 xl:h-12 px-4 xl:px-6 rounded-full border border-border-secondary-default bg-transparent text-text-heading-secondary-default hover:bg-surface-badge-secondary transition-colors flex items-center justify-center" aria-disabled="true">
					Xem tất cả
				</span>
			</div>
		</div>
	</section>

