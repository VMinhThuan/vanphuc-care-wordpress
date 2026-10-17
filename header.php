<?php
/**
 * Site header template for Vạn Phúc Care.
 * Matches exact Figma Header specification:
 * - Logo (Left)
 * - Navigation Menu (Center): Trang chủ, Giới thiệu, Ở cữ, Bảo mẫu, Dịch vụ, Lớp học tiền sản, Kiến thức
 * - CTA Button (Right): Đăng Ký Tư Vấn (rounded-full, primary-500)
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

<!-- Main Header Bar (Sticky, Desktop 1440px / Mobile Drawer) - Exact Figma 112px, #FAFAFA -->
<header id="site-header" class="sticky top-0 z-50 w-full bg-[#FAFAFA] border-b border-neutral-200/60 shadow-xs transition-all duration-300">
	<div class="vpc-container flex h-20 xl:h-[112px] items-center justify-between">
		
		<!-- Site Logo (Left) - Exact Figma 116x36px -->
		<div class="site-logo flex shrink-0 items-center">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="inline-flex items-center shrink-0 transition-transform duration-200 hover:scale-102">
				<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/logo.svg' ); ?>" 
				     alt="<?php bloginfo( 'name' ); ?>" 
				     width="116" 
				     height="36" 
				     class="h-[36px] w-[116px] object-contain block">
			</a>
		</div>

		<!-- Navigation Menu (Center) - Matches Figma: 760px width, 32px gap, Manrope 600 16/24 -->
		<nav class="hidden xl:flex items-center justify-center flex-1 max-w-[760px] mx-auto" aria-label="<?php esc_attr_e( 'Primary navigation', 'vanphuccare' ); ?>">
			<ul class="vpc-nav-menu flex items-center justify-center gap-8 text-base font-semibold">
				<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="py-2 text-[#1A77BA] font-semibold transition-colors">Trang chủ</a></li>
				<li><a href="<?php echo esc_url( home_url( '/gioi-thieu' ) ); ?>" class="py-2 text-[#292929] hover:text-[#1A77BA] transition-colors">Giới thiệu</a></li>
				<li><a href="<?php echo esc_url( home_url( '/#trung-tam-o-cu' ) ); ?>" class="py-2 text-[#292929] hover:text-[#1A77BA] transition-colors">Ở cữ</a></li>
				<li><a href="<?php echo esc_url( home_url( '/#dich-vu-tai-nha' ) ); ?>" class="py-2 text-[#292929] hover:text-[#1A77BA] transition-colors">Bảo mẫu</a></li>
				<li><a href="<?php echo esc_url( home_url( '/#dich-vu-noi-bat' ) ); ?>" class="py-2 text-[#292929] hover:text-[#1A77BA] transition-colors">Dịch vụ</a></li>
				<li><a href="<?php echo esc_url( home_url( '/#dao-tao-easy' ) ); ?>" class="py-2 text-[#292929] hover:text-[#1A77BA] transition-colors">Lớp học tiền sản</a></li>
				<li><a href="<?php echo esc_url( home_url( '/#tin-tuc' ) ); ?>" class="py-2 text-[#292929] hover:text-[#1A77BA] transition-colors">Kiến thức</a></li>
			</ul>
		</nav>

		<!-- Right Action: CTA Button (Đăng Ký Tư Vấn: 164x48px, #1A77BA, rounded-full) & Mobile Toggle -->
		<div class="flex items-center gap-3 sm:gap-4 shrink-0">
			<button data-open-modal="vpc-consultation-modal" 
			        type="button"
			        class="hidden sm:inline-flex items-center justify-center w-[164px] h-[48px] px-6 py-3 rounded-full bg-[#1A77BA] hover:bg-[#155F95] text-[#FAFAFA] font-medium text-base shadow-sm hover:shadow-md transition-all duration-200">
				<span>Đăng Ký Tư Vấn</span>
			</button>

			<!-- Mobile Hamburger Toggle (< 1280px) -->
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
		<nav class="flex flex-col space-y-3 text-base font-semibold text-neutral-800">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="py-2 px-3 rounded-lg bg-primary-50 text-primary-600">Trang chủ</a>
			<a href="<?php echo esc_url( home_url( '/gioi-thieu' ) ); ?>" class="py-2 px-3 rounded-lg hover:bg-neutral-100 hover:text-primary-600 transition-colors">Giới thiệu</a>
			<a href="<?php echo esc_url( home_url( '/#trung-tam-o-cu' ) ); ?>" class="py-2 px-3 rounded-lg hover:bg-neutral-100 hover:text-primary-600 transition-colors">Ở cữ</a>
			<a href="<?php echo esc_url( home_url( '/#dich-vu-tai-nha' ) ); ?>" class="py-2 px-3 rounded-lg hover:bg-neutral-100 hover:text-primary-600 transition-colors">Bảo mẫu</a>
			<a href="<?php echo esc_url( home_url( '/#dich-vu-noi-bat' ) ); ?>" class="py-2 px-3 rounded-lg hover:bg-neutral-100 hover:text-primary-600 transition-colors">Dịch vụ</a>
			<a href="<?php echo esc_url( home_url( '/#dao-tao-easy' ) ); ?>" class="py-2 px-3 rounded-lg hover:bg-neutral-100 hover:text-primary-600 transition-colors">Lớp học tiền sản</a>
			<a href="<?php echo esc_url( home_url( '/#tin-tuc' ) ); ?>" class="py-2 px-3 rounded-lg hover:bg-neutral-100 hover:text-primary-600 transition-colors">Kiến thức</a>
		</nav>
		<div class="mt-5 pt-4 border-t border-neutral-200">
			<button data-open-modal="vpc-consultation-modal" class="w-full text-center py-3 rounded-full bg-[#1A77BA] text-white font-bold text-sm shadow-md">
				Đăng Ký Tư Vấn
			</button>
			<div class="flex items-center justify-between text-xs text-text-body-muted pt-3">
				<span>Hotline: (024) 6329 6698</span>
				<span>cskh@vanphuccare.vn</span>
			</div>
		</div>
	</div>
</header>

<main id="primary" class="site-main min-h-[60vh]">
