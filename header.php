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
	<link rel="icon" type="image/png" sizes="300x300" href="<?php echo esc_url( get_template_directory_uri() . '/assets/images/Logo-van-phuc-care-300x300.png' ); ?>">
	<link rel="icon" type="image/png" sizes="180x180" href="<?php echo esc_url( get_template_directory_uri() . '/assets/images/Logo-van-phuc-care-180x180.png' ); ?>">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo esc_url( get_template_directory_uri() . '/assets/images/Logo-van-phuc-care-180x180.png' ); ?>">
	<?php wp_head(); ?>
</head>
<body <?php body_class( 'font-body bg-neutral-white text-text-body-default antialiased selection:bg-primary-100 selection:text-primary-800' ); ?>>
<?php wp_body_open(); ?>

<!-- Main Header Bar (Desktop >= 1280px: 96px, Mobile: 80px) -->
<header id="site-header" class="sticky top-0 z-50 w-full bg-surface-background-default transition-all duration-300">
	<div class="vpc-container flex h-20 xl:h-24 items-center justify-between">
		
		<!-- Site Logo (Left) - Mobile: 103x32px, Desktop: 116x36px -->
		<div class="site-logo flex shrink-0 items-center">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="inline-flex items-center shrink-0 transition-transform duration-200 hover:scale-102">
				<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/logo.svg' ); ?>" 
				     alt="<?php bloginfo( 'name' ); ?>" 
				     width="116" 
				     height="36" 
				     class="h-8 w-[103px] xl:h-9 xl:w-[116px] object-contain block">
			</a>
		</div>

		<!-- Navigation Menu (Center) - Matches Figma: 760px width, font-medium 500, py-0 px-1 -->
		<nav class="hidden xl:flex items-center justify-center flex-1 max-w-[760px] mx-auto" aria-label="<?php esc_attr_e( 'Primary navigation', 'vanphuccare' ); ?>">
			<ul class="vpc-nav-menu flex items-center justify-center gap-8 text-base font-semibold">
				<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="py-0 px-1 text-text-nav-active transition-colors">Trang chủ</a></li>
				<li><a href="<?php echo esc_url( home_url( '/gioi-thieu' ) ); ?>" class="py-0 px-1 text-text-nav-default hover:text-text-nav-hover transition-colors">Giới thiệu</a></li>
				<li><a href="<?php echo esc_url( home_url( '/#trung-tam-o-cu' ) ); ?>" class="py-0 px-1 text-text-nav-default hover:text-text-nav-hover transition-colors">Ở cữ</a></li>
				<li><a href="<?php echo esc_url( home_url( '/#bao-mau-tai-nha' ) ); ?>" class="py-0 px-1 text-text-nav-default hover:text-text-nav-hover transition-colors">Bảo mẫu</a></li>
				<li><a href="<?php echo esc_url( home_url( '/#bao-mau-tai-nha' ) ); ?>" class="py-0 px-1 text-text-nav-default hover:text-text-nav-hover transition-colors">Dịch vụ</a></li>
				<li><a href="<?php echo esc_url( home_url( '/#lop-hoc-tien-san' ) ); ?>" class="py-0 px-1 text-text-nav-default hover:text-text-nav-hover transition-colors">Lớp học tiền sản</a></li>
				<li><a href="<?php echo esc_url( home_url( '/#kien-thuc-nuoi-con' ) ); ?>" class="py-0 px-1 text-text-nav-default hover:text-text-nav-hover transition-colors">Kiến thức</a></li>
			</ul>
		</nav>

		<!-- Right Action: Desktop CTA Button & Mobile Hamburger Toggle -->
		<div class="flex items-center gap-3 sm:gap-4 shrink-0">
			<!-- CTA Header: hidden on mobile, display on desktop >= 1280px -->
			<button data-open-modal="vpc-consultation-modal" 
			        type="button"
				class="vpc-button hidden xl:inline-flex items-center justify-center h-10 rounded-full bg-surface-button-primary-default hover:bg-surface-button-primary-hover active:bg-surface-button-primary-pressed text-text-inverse-default transition-colors duration-200 focus-visible:ring-2 focus-visible:ring-border-focus-default">
				<span>Tư vấn miễn phí</span>
			</button>

			<!-- Mobile Hamburger Toggle (< 1280px) - Chỉ icon menu 24px, bỏ viền, bo góc, nền hover -->
			<button id="mobile-menu-toggle" type="button" class="xl:hidden inline-flex items-center justify-center w-6 h-6 text-text-body-default focus:outline-hidden" aria-controls="mobile-menu-drawer" aria-expanded="false" aria-label="Toggle navigation menu">
				<svg class="w-6 h-6 open-icon stroke-current fill-none" viewBox="0 0 24 24" stroke-width="2">
					<path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
				</svg>
			</button>
		</div>
	</div>

	<!-- Mobile Drawer Menu: full mobile canvas matching the Figma artwork -->
	<div id="mobile-menu-drawer" class="fixed inset-0 z-50 xl:hidden hidden bg-surface-background-default flex flex-col justify-between overflow-y-auto">
		<div>
			<!-- Top Bar: Cao 72px (h-[72px] px-5 py-3): logo 116x36 bên trái, nút đóng 48x48 bên phải -->
			<div class="h-[72px] px-5 py-3 flex items-center justify-between border-b border-border-divider-default/40">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="inline-flex items-center shrink-0">
					<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/logo.svg' ); ?>" 
					     alt="<?php bloginfo( 'name' ); ?>" 
					     width="116" 
					     height="36" 
					     class="h-9 w-[116px] object-contain block">
				</a>
				<button id="mobile-menu-close" type="button" class="w-12 h-12 flex items-center justify-center text-text-body-default focus:outline-hidden cursor-pointer" aria-label="Close navigation menu">
					<svg class="w-6 h-6 stroke-current fill-none" viewBox="0 0 24 24" stroke-width="2">
						<path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
					</svg>
				</button>
			</div>

			<!-- Danh sách mục: pt-2 px-5 pb-0, mỗi mục cao 64px (h-16 py-4), text-xl font-medium text-text-nav-default có border-b và chevron phải 24px -->
			<nav class="pt-2 px-5 pb-0 flex flex-col" aria-label="<?php esc_attr_e( 'Mobile navigation', 'vanphuccare' ); ?>">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="h-16 py-4 flex items-center justify-between border-b border-border-divider-default text-xl font-medium text-text-nav-active">
					<span>Trang chủ</span>
					<svg class="w-6 h-6 text-neutral-400 shrink-0 stroke-current fill-none" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg>
				</a>
				<a href="<?php echo esc_url( home_url( '/gioi-thieu' ) ); ?>" class="h-16 py-4 flex items-center justify-between border-b border-border-divider-default text-xl font-medium text-text-nav-default hover:text-text-nav-hover">
					<span>Giới thiệu</span>
					<svg class="w-6 h-6 text-neutral-400 shrink-0 stroke-current fill-none" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg>
				</a>
				<a href="<?php echo esc_url( home_url( '/#trung-tam-o-cu' ) ); ?>" class="h-16 py-4 flex items-center justify-between border-b border-border-divider-default text-xl font-medium text-text-nav-default hover:text-text-nav-hover">
					<span>Ở cữ</span>
					<svg class="w-6 h-6 text-neutral-400 shrink-0 stroke-current fill-none" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg>
				</a>
				<a href="<?php echo esc_url( home_url( '/#bao-mau-tai-nha' ) ); ?>" class="h-16 py-4 flex items-center justify-between border-b border-border-divider-default text-xl font-medium text-text-nav-default hover:text-text-nav-hover">
					<span>Bảo mẫu</span>
					<svg class="w-6 h-6 text-neutral-400 shrink-0 stroke-current fill-none" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg>
				</a>
				<a href="<?php echo esc_url( home_url( '/#bao-mau-tai-nha' ) ); ?>" class="h-16 py-4 flex items-center justify-between border-b border-border-divider-default text-xl font-medium text-text-nav-default hover:text-text-nav-hover">
					<span>Dịch vụ</span>
					<svg class="w-6 h-6 text-neutral-400 shrink-0 stroke-current fill-none" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg>
				</a>
				<a href="<?php echo esc_url( home_url( '/#lop-hoc-tien-san' ) ); ?>" class="h-16 py-4 flex items-center justify-between border-b border-border-divider-default text-xl font-medium text-text-nav-default hover:text-text-nav-hover">
					<span>Lớp học tiền sản</span>
					<svg class="w-6 h-6 text-neutral-400 shrink-0 stroke-current fill-none" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg>
				</a>
				<a href="<?php echo esc_url( home_url( '/#kien-thuc-nuoi-con' ) ); ?>" class="h-16 py-4 flex items-center justify-between border-b border-border-divider-default text-xl font-medium text-text-nav-default hover:text-text-nav-hover">
					<span>Kiến thức</span>
					<svg class="w-6 h-6 text-neutral-400 shrink-0 stroke-current fill-none" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg>
				</a>
			</nav>
		</div>

		<!-- Vùng nút đúng Figma: CTA y=702, hotline y=762 trên artboard 390×844 -->
		<div class="pt-0 px-5 pb-8 flex flex-col gap-3">
			<button data-open-modal="vpc-consultation-modal" type="button" class="vpc-button w-full h-10 rounded-full bg-surface-button-primary-default hover:bg-surface-button-primary-hover active:bg-surface-button-primary-pressed text-text-inverse-default flex items-center justify-center transition-colors">
				<span>Tư vấn miễn phí</span>
			</button>
		<a href="tel:02463296698" class="vpc-button w-full h-10 border border-border-primary-default rounded-full flex items-center justify-center gap-2 text-text-link-default hover:bg-primary-100/50 transition-colors">
				<svg class="w-6 h-6 stroke-current fill-none" viewBox="0 0 24 24" stroke-width="2">
					<path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
				</svg>
				<span>Hotline</span>
			</a>
		</div>
	</div>

	<!-- Sticky CTA bar Mobile (< 1280px) - Cao 84px, bóng 0 -4px 16px rgb(0 0 0 / 0.12), gồm nút gọi và nút Đăng Ký Tư Vấn -->
	<div id="mobile-sticky-cta" class="fixed bottom-0 left-0 right-0 z-40 h-[84px] bg-surface-background-default shadow-cta flex items-center justify-between px-5 py-3 gap-3 xl:hidden transition-[transform,opacity] duration-300 ease-out">
		<a href="tel:02463296698" class="vpc-button flex-1 h-10 flex items-center justify-center gap-2 rounded-full border border-border-primary-default text-text-link-default transition-colors">
			<svg class="w-6 h-6 stroke-current fill-none shrink-0" viewBox="0 0 24 24" stroke-width="2">
				<path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
			</svg>
			<span>Gọi ngay</span>
		</a>
		<button data-open-modal="vpc-consultation-modal" type="button" class="vpc-button flex-1 h-10 flex items-center justify-center rounded-full bg-surface-button-primary-default hover:bg-surface-button-primary-hover active:bg-surface-button-primary-pressed text-text-inverse-default transition-colors">
			<span>Tư vấn miễn phí</span>
		</button>
	</div>
</header>

<main id="primary" class="site-main min-h-[60vh]">
