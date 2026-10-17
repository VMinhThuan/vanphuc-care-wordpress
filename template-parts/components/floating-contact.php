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

<!-- Floating Quick Contact Speed Dial (Fixed Bottom-Right) -->
<aside class="fixed bottom-6 right-5 z-40 flex flex-col items-end gap-3 pointer-events-none" aria-label="Kênh liên hệ nhanh">
	
	<!-- Messenger Button -->
	<a href="<?php echo esc_url( $mme_url ); ?>" target="_blank" rel="noopener noreferrer" 
	   class="group pointer-events-auto relative flex h-12 w-12 sm:h-14 sm:w-14 items-center justify-center rounded-2xl bg-white shadow-lg shadow-neutral-900/15 ring-1 ring-neutral-200/60 transition-all duration-300 hover:scale-110 hover:shadow-xl active:scale-95" 
	   aria-label="Chat qua Messenger">
		<span class="sr-only">Chat Facebook Messenger</span>
		<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/icons/messenger.svg' ); ?>" alt="Messenger" class="h-8 w-8 sm:h-9 sm:w-9 object-contain" width="36" height="36" loading="lazy">
		<!-- Tooltip on Desktop -->
		<span class="pointer-events-none absolute right-full mr-3 whitespace-nowrap rounded-lg bg-neutral-900 px-3 py-1.5 text-xs font-medium text-white opacity-0 shadow-md transition-opacity duration-200 group-hover:opacity-100 hidden sm:inline-block">
			Chat Messenger
		</span>
	</a>

	<!-- Zalo Button -->
	<a href="<?php echo esc_url( $zalo_url ); ?>" target="_blank" rel="noopener noreferrer" 
	   class="group pointer-events-auto relative flex h-12 w-12 sm:h-14 sm:w-14 items-center justify-center rounded-2xl bg-white shadow-lg shadow-neutral-900/15 ring-1 ring-neutral-200/60 transition-all duration-300 hover:scale-110 hover:shadow-xl active:scale-95" 
	   aria-label="Chat qua Zalo">
		<span class="sr-only">Chat Zalo</span>
		<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/icons/zalo.svg' ); ?>" alt="Zalo" class="h-8 w-8 sm:h-9 sm:w-9 object-contain" width="36" height="36" loading="lazy">
		<!-- Tooltip on Desktop -->
		<span class="pointer-events-none absolute right-full mr-3 whitespace-nowrap rounded-lg bg-neutral-900 px-3 py-1.5 text-xs font-medium text-white opacity-0 shadow-md transition-opacity duration-200 group-hover:opacity-100 hidden sm:inline-block">
			Chat Zalo
		</span>
	</a>

	<!-- Phone / Hotline Button with Radar Pulse Wave -->
	<a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9]/', '', $hotline ) ); ?>" 
	   class="group pointer-events-auto relative flex h-12 w-12 sm:h-14 sm:w-14 items-center justify-center rounded-2xl bg-[#20DF40] text-white shadow-lg shadow-[#20DF40]/30 transition-all duration-300 hover:scale-110 hover:shadow-xl hover:shadow-[#20DF40]/50 active:scale-95" 
	   aria-label="Gọi hotline <?php echo esc_attr( $hotline_display ); ?>">
		<span class="sr-only">Gọi ngay <?php echo esc_html( $hotline_display ); ?></span>
		<!-- Radar Pulse Rings -->
		<span class="absolute inset-0 -z-10 rounded-2xl bg-[#20DF40] opacity-75 animate-ping" aria-hidden="true"></span>
		<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/icons/phone.svg' ); ?>" alt="Hotline" class="h-8 w-8 sm:h-9 sm:w-9 object-contain" width="36" height="36" loading="lazy">
		<!-- Tooltip on Desktop -->
		<span class="pointer-events-none absolute right-full mr-3 whitespace-nowrap rounded-lg bg-neutral-900 px-3 py-1.5 text-xs font-semibold text-white opacity-0 shadow-md transition-opacity duration-200 group-hover:opacity-100 hidden sm:inline-block">
			Hotline: <?php echo esc_html( $hotline_display ); ?>
		</span>
	</a>

</aside>
