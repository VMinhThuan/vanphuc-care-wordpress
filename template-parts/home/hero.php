<?php
/**
 * Template part: Homepage Hero Promotional Banner Slider.
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$hero_slide_specs = array(
	array(
		'image'    => 'home/hero-banner.webp',
		'href'     => 'https://edu.vanphuccare.vn',
		'target'   => true,
		'title'    => 'Khóa học Chăm sóc bé yêu KHOA HỌC từ con số 0 - Vạn Phúc Care',
		'alt'      => 'Chăm sóc bé yêu KHOA HỌC từ con số 0 - Hệ thống khóa học online chuẩn y khoa dành cho cha mẹ hiện đại - Vạn Phúc Care',
		'heading'  => 'Chăm sóc bé yêu KHOA HỌC từ con số 0 - Hệ thống khóa học online chuẩn y khoa dành cho cha mẹ hiện đại',
		'hotspot'  => true,
	),
	array(
		'image'   => 'home/hero-banner-2.webp',
		'href'    => '#trung-tam-o-cu',
		'title'   => 'Trung tâm ở cữ Vạn Phúc Care - Mẹ thảnh thơi nghỉ dưỡng, Bé phát triển toàn diện',
		'alt'     => 'Trung tâm ở cữ Vạn Phúc Care - Mẹ thảnh thơi nghỉ dưỡng, Bé phát triển toàn diện',
	),
	array(
		'image'   => 'home/hero-banner-3.webp',
		'href'    => '/dich-vu/trung-tam-o-cu/',
		'title'   => 'Trung tâm ở cữ Vạn Phúc Care',
		'alt'     => 'Trung tâm ở cữ Vạn Phúc Care - Không gian nghỉ dưỡng và chăm sóc mẹ bé chuẩn y khoa',
	),
);

$hero_slides = array();
foreach ( $hero_slide_specs as $slide_spec ) {
	$slide_src = vpc_theme_asset_url( $slide_spec['image'] );
	if ( '' === $slide_src ) {
		$slide_src = vpc_image_url( $slide_spec['image'], 'full' );
	}
	if ( '' === $slide_src ) {
		continue;
	}

	$slide_spec['src'] = $slide_src;
	$hero_slides[]     = $slide_spec;
}

if ( empty( $hero_slides ) ) {
	return;
}
?>

<section class="vpc-section hero-banner-section w-full p-0 m-0 bg-primary-200 relative">
	<div id="vpc-hero-slider" class="w-full relative overflow-hidden group select-none">
		<!-- Slides wrapper -->
		<div id="vpc-hero-slides" class="flex transition-transform duration-700 ease-in-out w-full">
			<?php foreach ( $hero_slides as $slide_index => $slide ) : ?>
				<div class="vpc-hero-slide w-full shrink-0 relative">
					<a href="<?php echo esc_url( $slide['href'] ); ?>" <?php echo ! empty( $slide['target'] ) ? 'target="_blank" rel="noopener noreferrer"' : ''; ?> class="block w-full relative group/item" title="<?php echo esc_attr( $slide['title'] ); ?>">
						<picture>
							<img src="<?php echo esc_url( $slide['src'] ); ?>"
							     alt="<?php echo esc_attr( $slide['alt'] ); ?>"
							     width="1440"
							     height="581"
							     class="w-full h-auto <?php echo 0 === $slide_index ? 'object-cover' : 'aspect-[1440/581] object-cover'; ?> block"
							     loading="<?php echo 0 === $slide_index ? 'eager' : 'lazy'; ?>"
							     decoding="async"
							     <?php echo 0 === $slide_index ? 'fetchpriority="high"' : ''; ?> />
						</picture>

						<?php if ( ! empty( $slide['heading'] ) ) : ?>
							<h1 class="sr-only"><?php echo esc_html( $slide['heading'] ); ?></h1>
						<?php endif; ?>

						<?php if ( ! empty( $slide['hotspot'] ) ) : ?>
							<span class="absolute right-[21%] sm:right-[22%] lg:right-[23%] bottom-[16%] sm:bottom-[17%] lg:bottom-[19%] w-[44%] sm:w-[39%] lg:w-[35%] h-[12%] sm:h-[13%] rounded-full cursor-pointer transition-all duration-200 hover:ring-4 hover:ring-primary-400/40 hover:bg-neutral-white/10" aria-label="Truy cập ngay www.edu.vanphuccare.vn"></span>
						<?php endif; ?>
					</a>
				</div>
			<?php endforeach; ?>
		</div>

		<!-- Navigation Controls (Prev / Next Buttons) -->
		<?php if ( count( $hero_slides ) > 1 ) : ?>
		<button type="button" id="vpc-hero-prev" class="absolute left-2.5 sm:left-6 top-1/2 -translate-y-1/2 w-8 h-8 sm:w-11 sm:h-11 rounded-full bg-neutral-white/80 hover:bg-neutral-white text-neutral-800 shadow-md flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-300 z-20 cursor-pointer backdrop-blur-xs focus:opacity-100" aria-label="Slide trước">
			<svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
		</button>
		<button type="button" id="vpc-hero-next" class="absolute right-2.5 sm:right-6 top-1/2 -translate-y-1/2 w-8 h-8 sm:w-11 sm:h-11 rounded-full bg-neutral-white/80 hover:bg-neutral-white text-neutral-800 shadow-md flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-300 z-20 cursor-pointer backdrop-blur-xs focus:opacity-100" aria-label="Slide tiếp theo">
			<svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
		</button>
		<?php endif; ?>

		<!-- Dots pagination -->
		<?php if ( count( $hero_slides ) > 1 ) : ?>
		<div class="absolute bottom-2.5 sm:bottom-4 left-1/2 -translate-x-1/2 flex items-center gap-2 z-20">
			<?php foreach ( $hero_slides as $slide_index => $slide ) : ?>
				<button type="button" data-hero-dot="<?php echo esc_attr( $slide_index ); ?>" class="h-2.5 <?php echo 0 === $slide_index ? 'w-8 bg-surface-button-primary-default' : 'w-2.5 bg-neutral-white/70'; ?> rounded-full hover:bg-neutral-white transition-all duration-300 cursor-pointer shadow-xs" aria-label="Chuyển đến banner <?php echo esc_attr( $slide_index + 1 ); ?>"></button>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>
	</div>
</section>

