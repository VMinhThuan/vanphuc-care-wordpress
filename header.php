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
	<div class="vpc-container flex items-center justify-between">
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

			<!-- Social Icons (Standardized SVG Component) -->
			<?php get_template_part( 'template-parts/components/social-icons', null, array( 'size' => 'sm' ) ); ?>
		</div>
	</div>
</div>

<!-- Main Navigation Header (Sticky, Desktop 1280px+ & Mobile Drawer) -->
<header id="site-header" class="sticky top-0 z-50 w-full bg-[#FAFAFA]/98 backdrop-blur-md border-b border-neutral-200/80 shadow-xs transition-all duration-300">
	<div class="vpc-container flex h-20 xl:h-28 items-center justify-between">
		<!-- Site Logo (SVG vector scale by CSS with inline protection) -->
		<div class="site-logo flex shrink-0 items-center">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="inline-flex items-center shrink-0 max-w-[170px] transition-transform duration-200 hover:scale-102">
				<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/logo.svg' ); ?>" 
				     alt="<?php bloginfo( 'name' ); ?>" 
				     width="156" 
				     height="49" 
				     class="h-9 sm:h-11 xl:h-12 w-auto object-contain block" 
				     style="max-height: 48px; width: auto; height: auto;">
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
						'menu_class'     => 'vpc-nav-menu flex items-center gap-7 2xl:gap-9 text-base font-medium text-neutral-800',
						'fallback_cb'    => false,
					)
				);
			} else {
				?>
				<ul class="vpc-nav-menu flex items-center gap-7 2xl:gap-9 text-base font-medium text-neutral-800">
					<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="relative py-2 transition-colors duration-200 hover:text-primary-600 active:text-primary-500 after:absolute after:bottom-0 after:left-0 after:h-0.5 after:w-0 after:bg-linear-to-r after:from-secondary-400 after:to-primary-500 after:transition-all after:duration-300 hover:after:w-full">Trang chủ</a></li>
					<li><a href="<?php echo esc_url( home_url( '/gioi-thieu' ) ); ?>" class="relative py-2 transition-colors duration-200 hover:text-primary-600 active:text-primary-500 after:absolute after:bottom-0 after:left-0 after:h-0.5 after:w-0 after:bg-linear-to-r after:from-secondary-400 after:to-primary-500 after:transition-all after:duration-300 hover:after:w-full">Giới thiệu</a></li>
					<li><a href="<?php echo esc_url( home_url( '/tin-tuc' ) ); ?>" class="relative py-2 transition-colors duration-200 hover:text-primary-600 active:text-primary-500 after:absolute after:bottom-0 after:left-0 after:h-0.5 after:w-0 after:bg-linear-to-r after:from-secondary-400 after:to-primary-500 after:transition-all after:duration-300 hover:after:w-full">Tin tức</a></li>
					<li><a href="<?php echo esc_url( home_url( '/dich-vu' ) ); ?>" class="relative py-2 transition-colors duration-200 hover:text-primary-600 active:text-primary-500 after:absolute after:bottom-0 after:left-0 after:h-0.5 after:w-0 after:bg-linear-to-r after:from-secondary-400 after:to-primary-500 after:transition-all after:duration-300 hover:after:w-full">Dịch vụ</a></li>
					<li><a href="<?php echo esc_url( home_url( '/o-cu' ) ); ?>" class="relative py-2 transition-colors duration-200 hover:text-primary-600 active:text-primary-500 after:absolute after:bottom-0 after:left-0 after:h-0.5 after:w-0 after:bg-linear-to-r after:from-secondary-400 after:to-primary-500 after:transition-all after:duration-300 hover:after:w-full">Ở cữ</a></li>
					<li><a href="<?php echo esc_url( home_url( '/khoa-hoc' ) ); ?>" class="relative py-2 transition-colors duration-200 hover:text-primary-600 active:text-primary-500 after:absolute after:bottom-0 after:left-0 after:h-0.5 after:w-0 after:bg-linear-to-r after:from-secondary-400 after:to-primary-500 after:transition-all after:duration-300 hover:after:w-full">Khóa học</a></li>
				</ul>
				<?php
			}
			?>
		</nav>

		<!-- Right Actions: CTA Button & Mobile Toggle Button -->
		<div class="flex items-center gap-3 sm:gap-4">
			<?php
			get_template_part(
				'template-parts/components/button',
				null,
				array(
					'text'       => 'Đăng ký tư vấn',
					'url'        => '#consultation',
					'variant'    => 'primary',
					'size'       => 'md',
					'icon_right' => '<svg class="w-4 h-4 transition-transform duration-300 group-hover:translate-x-1" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9 1L13 5M13 5L9 9M13 5H1" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>',
					'class'      => 'group shadow-md shadow-primary-500/20 hover:shadow-lg hover:shadow-primary-500/35 active:translate-y-0 rounded-full!',
					'data_attrs' => array(
						'data-open-modal' => 'vpc-consultation-modal',
					),
				)
			);
			?>

			<!-- Mobile / Tablet Hamburger Toggle (Shown when < 1280px) -->
			<button id="mobile-menu-toggle" type="button" class="xl:hidden inline-flex items-center justify-center p-2 rounded-xl border border-neutral-300 text-neutral-800 hover:bg-neutral-100 hover:text-primary-600 transition-colors focus:outline-hidden" aria-controls="mobile-menu-drawer" aria-expanded="false" aria-label="Toggle navigation menu">
				<svg class="w-6 h-6 open-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
					<path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
				</svg>
				<svg class="w-6 h-6 close-icon hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
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
