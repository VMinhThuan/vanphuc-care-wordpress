<?php
/**
 * Site header template for Vạn Phúc Care.
 * Fully built with Tailwind CSS v4 design system tokens.
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<!doctype html>
<html <?php language_attributes(); ?> class="scroll-smooth">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,400..700;1,9..144,400..700&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
	<?php wp_head(); ?>
</head>
<body <?php body_class( 'font-body bg-white text-text-body-default antialiased selection:bg-primary-100 selection:text-primary-800' ); ?>>
<?php wp_body_open(); ?>

<!-- Top Info Bar (Desktop xl:flex, Mobile hidden/compact) -->
<div class="site-topbar w-full border-b border-neutral-200 bg-white py-2.5 text-sm">
	<div class="mx-auto flex max-w-[1240px] items-center justify-between px-4 sm:px-6 xl:px-8">
		<!-- Contact Items -->
		<div class="flex flex-wrap items-center gap-4 sm:gap-6 text-text-body-muted font-medium">
			<a href="tel:0908093198" class="inline-flex items-center gap-2 hover:text-primary-500 transition-colors duration-200">
				<svg class="w-4 h-4 text-primary-500 shrink-0" viewBox="0 0 24 24" fill="currentColor">
					<path d="M6.62 10.79a15.053 15.053 0 006.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
				</svg>
				<span class="tracking-wide">090 809 31 98</span>
			</a>
			<a href="mailto:cskh@vanphuccare.vn" class="hidden sm:inline-flex items-center gap-2 hover:text-primary-500 transition-colors duration-200">
				<svg class="w-4 h-4 text-primary-500 shrink-0" viewBox="0 0 24 24" fill="currentColor">
					<path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
				</svg>
				<span class="tracking-wide">cskh@vanphuccare.vn</span>
			</a>
		</div>

		<!-- Meta: Language & Social Icons -->
		<div class="flex items-center gap-3 sm:gap-4">
			<!-- Language -->
			<div class="flex items-center gap-1.5 cursor-pointer text-text-body-muted hover:text-primary-600 transition-colors">
				<span class="inline-flex rounded-sm overflow-hidden shadow-xs">
					<svg class="w-5 h-3.5 object-cover" viewBox="0 0 512 512">
						<rect width="512" height="512" fill="#d80027"/>
						<polygon points="256,128 293,242 413,242 316,313 353,427 256,356 159,427 196,313 99,242 219,242" fill="#ffda44"/>
					</svg>
				</span>
				<span class="text-xs font-semibold uppercase tracking-wider">VIE</span>
			</div>

			<span class="h-4 w-px bg-neutral-300"></span>

			<!-- Social Icons (Figma round outline style) -->
			<div class="flex items-center gap-1.5 sm:gap-2">
				<a href="https://facebook.com" target="_blank" rel="noopener noreferrer" class="group flex h-7 w-7 items-center justify-center rounded-full border border-neutral-300 bg-white transition-all duration-200 hover:-translate-y-0.5 hover:border-primary-500 hover:bg-primary-100" title="Facebook" aria-label="Facebook">
					<svg class="h-3.5 w-3.5 text-neutral-700 transition-colors group-hover:text-primary-600" viewBox="0 0 24 24" fill="currentColor">
						<path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
					</svg>
				</a>
				<a href="https://instagram.com" target="_blank" rel="noopener noreferrer" class="group flex h-7 w-7 items-center justify-center rounded-full border border-neutral-300 bg-white transition-all duration-200 hover:-translate-y-0.5 hover:border-primary-500 hover:bg-primary-100" title="Instagram" aria-label="Instagram">
					<svg class="h-3.5 w-3.5 text-neutral-700 transition-colors group-hover:text-primary-600" viewBox="0 0 24 24" fill="currentColor">
						<path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
					</svg>
				</a>
				<a href="https://youtube.com" target="_blank" rel="noopener noreferrer" class="group flex h-7 w-7 items-center justify-center rounded-full border border-neutral-300 bg-white transition-all duration-200 hover:-translate-y-0.5 hover:border-primary-500 hover:bg-primary-100" title="YouTube" aria-label="YouTube">
					<svg class="h-3.5 w-3.5 text-neutral-700 transition-colors group-hover:text-primary-600" viewBox="0 0 24 24" fill="currentColor">
						<path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/>
					</svg>
				</a>
				<a href="https://tiktok.com" target="_blank" rel="noopener noreferrer" class="group flex h-7 w-7 items-center justify-center rounded-full border border-neutral-300 bg-white transition-all duration-200 hover:-translate-y-0.5 hover:border-primary-500 hover:bg-primary-100" title="TikTok" aria-label="TikTok">
					<svg class="h-3.5 w-3.5 text-neutral-700 transition-colors group-hover:text-primary-600" viewBox="0 0 24 24" fill="currentColor">
						<path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.99v7.02c0 1.93-.45 3.88-1.57 5.4-1.51 2.06-4.04 3.25-6.57 3.03-2.73-.24-5.17-1.89-6.3-4.38-1.14-2.52-.77-5.59.93-7.72 1.7-2.14 4.51-3.13 7.18-2.56.12.03.24.07.36.1v4.06c-.84-.25-1.78-.28-2.61-.03-1.07.33-1.93 1.15-2.3 2.19-.37 1.04-.18 2.22.49 3.09.67.87 1.78 1.34 2.87 1.23 1.18-.11 2.22-.89 2.62-2 .24-.66.33-1.37.32-2.07V.02z"/>
					</svg>
				</a>
			</div>
		</div>
	</div>
</div>

<!-- Main Navigation Header (Sticky, Desktop 1280px+ & Mobile Drawer) -->
<header id="site-header" class="sticky top-0 z-50 w-full bg-white/95 backdrop-blur-md shadow-xs transition-all duration-300">
	<div class="mx-auto flex h-18 sm:h-20 max-w-[1240px] items-center justify-between px-4 sm:px-6 xl:px-8">
		<!-- Site Logo -->
		<div class="site-logo flex shrink-0 items-center">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="inline-block transition-transform duration-200 hover:scale-102">
				<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/logo.png' ); ?>" alt="<?php bloginfo( 'name' ); ?>" class="h-10 sm:h-12 w-auto object-contain">
			</a>
		</div>

		<!-- Desktop Navigation Menu (xl:flex = 1280px+, under 1280px use mobile menu) -->
		<nav class="hidden xl:flex items-center" aria-label="<?php esc_attr_e( 'Primary navigation', 'vanphuccare' ); ?>">
			<?php
			if ( has_nav_menu( 'primary' ) ) {
				wp_nav_menu(
					array(
						'theme_location' => 'primary',
						'container'      => false,
						'menu_class'     => 'flex items-center gap-8 2xl:gap-10 text-base font-medium text-text-nav-default',
						'fallback_cb'    => false,
					)
				);
			} else {
				?>
				<ul class="flex items-center gap-8 2xl:gap-10 text-base font-medium text-text-nav-default">
					<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="relative py-2 transition-colors duration-200 hover:text-primary-500 after:absolute after:bottom-0 after:left-0 after:h-0.5 after:w-0 after:bg-linear-to-r after:from-secondary-400 after:to-primary-500 after:transition-all after:duration-300 hover:after:w-full">Trang chủ</a></li>
					<li><a href="#" class="relative py-2 transition-colors duration-200 hover:text-primary-500 after:absolute after:bottom-0 after:left-0 after:h-0.5 after:w-0 after:bg-linear-to-r after:from-secondary-400 after:to-primary-500 after:transition-all after:duration-300 hover:after:w-full">Giới thiệu</a></li>
					<li><a href="#" class="relative py-2 transition-colors duration-200 hover:text-primary-500 after:absolute after:bottom-0 after:left-0 after:h-0.5 after:w-0 after:bg-linear-to-r after:from-secondary-400 after:to-primary-500 after:transition-all after:duration-300 hover:after:w-full">Tin tức</a></li>
					<li><a href="#" class="relative py-2 transition-colors duration-200 hover:text-primary-500 after:absolute after:bottom-0 after:left-0 after:h-0.5 after:w-0 after:bg-linear-to-r after:from-secondary-400 after:to-primary-500 after:transition-all after:duration-300 hover:after:w-full">Dịch vụ</a></li>
					<li><a href="#" class="relative py-2 transition-colors duration-200 hover:text-primary-500 after:absolute after:bottom-0 after:left-0 after:h-0.5 after:w-0 after:bg-linear-to-r after:from-secondary-400 after:to-primary-500 after:transition-all after:duration-300 hover:after:w-full">Ở cữ</a></li>
					<li><a href="#" class="relative py-2 transition-colors duration-200 hover:text-primary-500 after:absolute after:bottom-0 after:left-0 after:h-0.5 after:w-0 after:bg-linear-to-r after:from-secondary-400 after:to-primary-500 after:transition-all after:duration-300 hover:after:w-full">Khóa học</a></li>
				</ul>
				<?php
			}
			?>
		</nav>

		<!-- Right Actions: CTA Button & Mobile Toggle Button -->
		<div class="flex items-center gap-3 sm:gap-4">
			<a href="#contact" class="group inline-flex items-center justify-center gap-2.5 rounded-full bg-linear-to-r from-secondary-400 to-primary-500 px-5 sm:px-6 py-2.5 text-sm sm:text-base font-bold text-white shadow-md shadow-primary-500/20 transition-all duration-300 hover:-translate-y-0.5 hover:shadow-lg hover:shadow-primary-500/35 active:translate-y-0">
				<span>Liên hệ ngay</span>
				<svg class="w-4 h-4 transition-transform duration-300 group-hover:translate-x-1" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M9 1L13 5M13 5L9 9M13 5H1" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
				</svg>
			</a>

			<!-- Mobile / Tablet Hamburger Toggle (Shown when < 1280px) -->
			<button id="mobile-menu-toggle" type="button" class="xl:hidden inline-flex items-center justify-center p-2 rounded-xl border border-neutral-300 text-neutral-800 hover:bg-neutral-100 hover:text-primary-600 transition-colors focus:outline-hidden" aria-controls="mobile-menu-drawer" aria-expanded="false" aria-label="Toggle navigation menu">
				<svg class="w-6 h-6 open-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
					<path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
				</svg>
				<svg class="w-6 h-6 close-icon hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
					<path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
				</svg>
			</button>
		</div>
	</div>

	<!-- Mobile / Tablet Drawer Menu (< 1280px) -->
	<div id="mobile-menu-drawer" class="xl:hidden hidden border-t border-neutral-200 bg-white/98 px-5 py-6 shadow-xl backdrop-blur-lg">
		<nav class="flex flex-col space-y-4 text-base font-semibold text-text-body-default">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="py-2 px-3 rounded-lg hover:bg-primary-100 hover:text-primary-600 transition-colors">Trang chủ</a>
			<a href="#" class="py-2 px-3 rounded-lg hover:bg-primary-100 hover:text-primary-600 transition-colors">Giới thiệu</a>
			<a href="#" class="py-2 px-3 rounded-lg hover:bg-primary-100 hover:text-primary-600 transition-colors">Tin tức</a>
			<a href="#" class="py-2 px-3 rounded-lg hover:bg-primary-100 hover:text-primary-600 transition-colors">Dịch vụ</a>
			<a href="#" class="py-2 px-3 rounded-lg hover:bg-primary-100 hover:text-primary-600 transition-colors">Ở cữ</a>
			<a href="#" class="py-2 px-3 rounded-lg hover:bg-primary-100 hover:text-primary-600 transition-colors">Khóa học</a>
		</nav>
		<div class="mt-6 pt-4 border-t border-neutral-200 flex flex-col gap-3 text-sm text-text-body-muted">
			<div class="flex items-center gap-2">
				<svg class="w-4 h-4 text-primary-500" viewBox="0 0 24 24" fill="currentColor"><path d="M6.62 10.79a15.053 15.053 0 006.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/></svg>
				<span>090 809 31 98</span>
			</div>
			<div class="flex items-center gap-2">
				<svg class="w-4 h-4 text-primary-500" viewBox="0 0 24 24" fill="currentColor"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
				<span>cskh@vanphuccare.vn</span>
			</div>
		</div>
	</div>
</header>

<main id="primary" class="site-main min-h-[60vh]">
