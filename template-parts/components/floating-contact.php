<?php
/**
 * Component: Floating Contact Quick Actions (Hotline, Zalo, Messenger)
 * Standardized Speed Dial widget for Vạn Phúc Care.
 * Matches official Figma 80x80 vectors with responsive scaling & pulse micro-animations.
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$hotline   = $args['hotline'] ?? '0908093198';
$hotline_display = $args['hotline_display'] ?? '090 809 31 98';
$zalo_url  = $args['zalo_url'] ?? 'https://zalo.me/0908093198';
$mme_url   = $args['messenger_url'] ?? 'https://m.me/vanphuccare';
?>

<!-- Floating Quick Contact Speed Dial: 48px desktop icons follow the supplied CSS Layers. -->
<aside class="fixed bottom-24 xl:bottom-6 right-3 sm:right-4 z-40 flex flex-col items-end gap-2 sm:gap-2.5 pointer-events-none" aria-label="Kênh liên hệ nhanh">
	
	<!-- Messenger Button -->
	<a href="<?php echo esc_url( $mme_url ); ?>" target="_blank" rel="noopener noreferrer" 
	   class="group pointer-events-auto relative flex h-11 w-11 sm:h-12 sm:w-12 items-center justify-center rounded-full bg-neutral-white shadow-md shadow-neutral-900/10 ring-1 ring-neutral-200/60 transition-all duration-300 hover:scale-105 hover:shadow-lg active:scale-95"
	   aria-label="Chat qua Messenger">
		<span class="sr-only">Chat Facebook Messenger</span>
		<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/icons/messenger.svg' ); ?>" alt="Messenger" class="h-7 w-7 object-contain" width="48" height="48" loading="lazy">
		<!-- Tooltip on Desktop -->
		<span class="pointer-events-none absolute right-full mr-3 whitespace-nowrap rounded-lg bg-neutral-900 px-3 py-1.5 text-xs font-medium text-text-inverse-default opacity-0 shadow-md transition-opacity duration-200 group-hover:opacity-100 hidden xl:inline-block">
			Chat Messenger
		</span>
	</a>

	<!-- Zalo Button -->
	<a href="<?php echo esc_url( $zalo_url ); ?>" target="_blank" rel="noopener noreferrer" 
	   class="group pointer-events-auto relative flex h-11 w-11 sm:h-12 sm:w-12 items-center justify-center rounded-full bg-neutral-white shadow-md shadow-neutral-900/10 ring-1 ring-neutral-200/60 transition-all duration-300 hover:scale-105 hover:shadow-lg active:scale-95"
	   aria-label="Chat qua Zalo">
		<span class="sr-only">Chat Zalo</span>
		<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/icons/zalo.svg' ); ?>" alt="Zalo" class="h-7 w-7 object-contain" width="48" height="48" loading="lazy">
		<!-- Tooltip on Desktop -->
		<span class="pointer-events-none absolute right-full mr-3 whitespace-nowrap rounded-lg bg-neutral-900 px-3 py-1.5 text-xs font-medium text-text-inverse-default opacity-0 shadow-md transition-opacity duration-200 group-hover:opacity-100 hidden xl:inline-block">
			Chat Zalo
		</span>
	</a>

	<!-- Phone / Hotline Button with Radar Pulse Wave -->
	<a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9]/', '', $hotline ) ); ?>" 
	   class="group pointer-events-auto relative flex h-11 w-11 sm:h-12 sm:w-12 items-center justify-center rounded-full bg-success-500 text-text-inverse-default shadow-md shadow-success-500/30 transition-all duration-300 hover:scale-105 hover:shadow-lg hover:shadow-success-500/50 active:scale-95"
	   aria-label="Gọi hotline <?php echo esc_attr( $hotline_display ); ?>">
		<span class="sr-only">Gọi ngay <?php echo esc_html( $hotline_display ); ?></span>
		<!-- Radar Pulse Rings -->
		<span class="absolute inset-0 -z-10 rounded-full bg-success-500 opacity-75 animate-ping" aria-hidden="true"></span>
		<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/icons/phone.svg' ); ?>" alt="Hotline" class="h-7 w-7 object-contain" width="48" height="48" loading="lazy">
		<!-- Tooltip on Desktop -->
		<span class="pointer-events-none absolute right-full mr-3 whitespace-nowrap rounded-lg bg-neutral-900 px-3 py-1.5 text-xs font-semibold text-text-inverse-default opacity-0 shadow-md transition-opacity duration-200 group-hover:opacity-100 hidden xl:inline-block">
			Hotline: <?php echo esc_html( $hotline_display ); ?>
		</span>
	</a>

</aside>
