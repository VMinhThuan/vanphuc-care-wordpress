<?php
/**
 * Template part: Homepage Section 7 - Vì sao cha mẹ chọn Vạn Phúc Care.
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$theme_uri = get_template_directory_uri();
?>

	<!-- =========================================================================
	     7. VÌ SAO CHA MẸ CHỌN VẠN PHÚC CARE (Desktop - 24)
	     ========================================================================= -->
	<section id="vi-sao-chon-van-phuc" class="vpc-section vpc-gradient-neutral-primary relative overflow-hidden py-12 xl:pt-[61px] xl:pb-[46px]">
		<div class="vpc-home-container flex flex-col items-center gap-6 xl:gap-6">

			<!-- Top Section Header -->
			<div class="flex flex-col items-center text-center max-w-[860px] mx-auto gap-3">
				<!-- Badge -->
				<div class="inline-flex items-center justify-center gap-2 px-3.5 py-1.5 bg-surface-badge-secondary border border-border-secondary-default rounded-full">
					<img src="<?php echo esc_url( $theme_uri . '/assets/images/icons/sparkle-pink.svg' ); ?>" width="24" height="24" class="w-4 h-4 shrink-0" alt="" aria-hidden="true" />
					<span class="font-body font-medium text-xs sm:text-sm text-text-link-hover tracking-wider uppercase">BẠN ĐỒNG HÀNH CỦA BA MẸ</span>
				</div>

				<!-- Main Heading -->
				<h2 class="font-heading font-semibold text-h1-mobile xl:text-h1 text-center">
					<span class="text-text-heading-primary-default">Vì Sao Cha Mẹ Chọn </span><br class="sm:hidden"><span class="text-text-heading-secondary-default whitespace-nowrap">Vạn Phúc Care</span>
				</h2>

				<!-- Subtitle -->
				<p class="font-body font-normal sm:font-medium text-sm sm:text-base text-text-body-default leading-6 max-w-[540px]">
					Người bạn đồng hành đáng tin cậy, cam kết mang đến<br class="hidden sm:inline"> sự an toàn, chuyên nghiệp và an tâm trọn vẹn cho mọi gia đình.
				</p>
			</div>

			<!-- Middle Content Block: Center Image first on mobile, then 4 Features -->
			<div class="w-full flex flex-col lg:flex-row items-center justify-between gap-6 xl:gap-8">

				<!-- Center Image (Mobile order: 1, Desktop order: 2) -->
				<div class="w-full max-w-[350px] sm:max-w-[479px] shrink-0 mx-auto flex justify-center items-center order-1 lg:order-2">
					<?php $why_vpc_webp_url = vpc_image_url( 'home/vi-sao-chon-VPC.webp', 'large' ); ?>
					<?php $why_vpc_jpg_url = vpc_image_url( 'home/vi-sao-chon-VPC.jpg', 'large' ); ?>
					<?php $why_vpc_image_url = $why_vpc_jpg_url ? $why_vpc_jpg_url : $why_vpc_webp_url; ?>
					<?php if ( $why_vpc_image_url ) : ?>
						<picture>
							<?php if ( $why_vpc_webp_url && $why_vpc_jpg_url ) : ?>
								<source srcset="<?php echo esc_url( $why_vpc_webp_url ); ?>" type="image/webp">
							<?php endif; ?>
							<img src="<?php echo esc_url( $why_vpc_image_url ); ?>"
							     alt="Vì sao cha mẹ chọn Vạn Phúc Care"
							     width="479"
							     height="276"
							     class="w-full h-auto aspect-[479/276] object-cover rounded-[24px] sm:rounded-[32px] shadow-[0px_4px_30px_rgba(0,0,0,0.08)] block"
							     loading="lazy" />
						</picture>
					<?php endif; ?>
				</div>

				<!-- Left 2 Features (Mobile order: 2, Desktop order: 1) -->
				<div class="w-full lg:w-[320px] xl:w-[335px] shrink-0 flex flex-col gap-5 sm:gap-8 order-2 lg:order-1">
					<!-- Feature 1: Đồng hành -->
					<div class="flex flex-col gap-2">
						<div class="flex items-center gap-2.5">
							<svg class="w-5 h-5 shrink-0" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M23.7581 12.21C24.0806 11.8392 24.0806 11.2874 23.7581 10.9166L21.8639 8.7382C21.6875 8.53535 21.6016 8.26925 21.6261 8.00154L21.8898 5.12294C21.9349 4.63126 21.6092 4.18212 21.1279 4.07217L18.3402 3.43534C18.0754 3.37485 17.8473 3.20779 17.7098 2.9736L16.2496 0.487107C15.9977 0.0581615 15.4656 -0.115834 15.0089 0.0813893L12.3913 1.21186C12.1419 1.31956 11.8591 1.31956 11.6097 1.21186L8.99098 0.0809135C8.53478 -0.116106 8.00325 0.0573117 7.75102 0.48547L6.29208 2.96198C6.154 3.19637 5.92519 3.36326 5.65983 3.42314L2.8757 4.0514C2.3932 4.16028 2.06613 4.60993 2.11114 5.10251L2.3751 7.99144C2.3995 8.25846 2.31405 8.5239 2.13846 8.72654L0.240724 10.9167C-0.0806752 11.2876 -0.0801875 11.8385 0.241868 12.2089L2.13723 14.3885C2.31357 14.5913 2.39946 14.8573 2.375 15.1249L2.11093 18.0151C2.06601 18.5067 2.3917 18.9557 2.87294 19.0656L5.6616 19.7027C5.92591 19.7631 6.15368 19.9297 6.29129 20.1633L7.74991 22.6392C8.00262 23.0682 8.53555 23.2413 8.99213 23.0428L11.6088 21.905C11.8587 21.7964 12.1424 21.796 12.3926 21.904L15.01 23.0344C15.4662 23.2314 15.9978 23.058 16.25 22.6299L17.7097 20.152C17.8473 19.9184 18.0751 19.7518 18.3394 19.6914L21.1279 19.0544C21.6092 18.9445 21.9349 18.4953 21.8898 18.0037L21.6261 15.125C21.6016 14.8573 21.6875 14.5912 21.8639 14.3884L23.7581 12.21ZM10.1697 16.5689C9.99977 16.7403 9.72282 16.7403 9.55293 16.569L6.42685 13.4167C5.97218 12.9583 5.97267 12.2188 6.42793 11.761C6.88801 11.2983 7.63697 11.2991 8.09604 11.7628L9.6754 13.358C9.77778 13.4614 9.94485 13.4614 10.0473 13.3581L15.5799 7.77477C16.0392 7.31132 16.7881 7.31068 17.2481 7.77335C17.7035 8.23131 17.704 8.9709 17.2492 9.42949L10.1697 16.5689Z" fill="var(--color-secondary-500)"/>
							</svg>
							<h3 class="font-body font-semibold text-lg text-text-body-default">Đồng hành</h3>
						</div>
						<p class="font-body font-medium text-sm sm:text-base text-text-body-muted leading-relaxed">
							Đồng hành chăm sóc mẹ và bé từ thai kỳ đến 24 tháng đầu đời, lưu giữ mọi kỷ niệm và cột mốc quan trọng trong sổ sức khỏe điện tử chuyên nghiệp.
						</p>
					</div>

					<!-- Feature 2: An toàn -->
					<div class="flex flex-col gap-2">
						<div class="flex items-center gap-2.5">
							<svg class="w-5 h-5 shrink-0" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M23.7581 12.21C24.0806 11.8392 24.0806 11.2874 23.7581 10.9166L21.8639 8.7382C21.6875 8.53535 21.6016 8.26925 21.6261 8.00154L21.8898 5.12294C21.9349 4.63126 21.6092 4.18212 21.1279 4.07217L18.3402 3.43534C18.0754 3.37485 17.8473 3.20779 17.7098 2.9736L16.2496 0.487107C15.9977 0.0581615 15.4656 -0.115834 15.0089 0.0813893L12.3913 1.21186C12.1419 1.31956 11.8591 1.31956 11.6097 1.21186L8.99098 0.0809135C8.53478 -0.116106 8.00325 0.0573117 7.75102 0.48547L6.29208 2.96198C6.154 3.19637 5.92519 3.36326 5.65983 3.42314L2.8757 4.0514C2.3932 4.16028 2.06613 4.60993 2.11114 5.10251L2.3751 7.99144C2.3995 8.25846 2.31405 8.5239 2.13846 8.72654L0.240724 10.9167C-0.0806752 11.2876 -0.0801875 11.8385 0.241868 12.2089L2.13723 14.3885C2.31357 14.5913 2.39946 14.8573 2.375 15.1249L2.11093 18.0151C2.06601 18.5067 2.3917 18.9557 2.87294 19.0656L5.6616 19.7027C5.92591 19.7631 6.15368 19.9297 6.29129 20.1633L7.74991 22.6392C8.00262 23.0682 8.53555 23.2413 8.99213 23.0428L11.6088 21.905C11.8587 21.7964 12.1424 21.796 12.3926 21.904L15.01 23.0344C15.4662 23.2314 15.9978 23.058 16.25 22.6299L17.7097 20.152C17.8473 19.9184 18.0751 19.7518 18.3394 19.6914L21.1279 19.0544C21.6092 18.9445 21.9349 18.4953 21.8898 18.0037L21.6261 15.125C21.6016 14.8573 21.6875 14.5912 21.8639 14.3884L23.7581 12.21ZM10.1697 16.5689C9.99977 16.7403 9.72282 16.7403 9.55293 16.569L6.42685 13.4167C5.97218 12.9583 5.97267 12.2188 6.42793 11.761C6.88801 11.2983 7.63697 11.2991 8.09604 11.7628L9.6754 13.358C9.77778 13.4614 9.94485 13.4614 10.0473 13.3581L15.5799 7.77477C16.0392 7.31132 16.7881 7.31068 17.2481 7.77335C17.7035 8.23131 17.704 8.9709 17.2492 9.42949L10.1697 16.5689Z" fill="var(--color-secondary-500)"/>
							</svg>
							<h3 class="font-body font-semibold text-lg text-text-body-default">An toàn</h3>
						</div>
						<p class="font-body font-medium text-sm sm:text-base text-text-body-muted leading-relaxed">
							Cam kết dịch vụ chăm sóc hoàn hảo, ứng dụng phương pháp khoa học hiện đại, đảm bảo sự an toàn và chăm sóc tốt nhất cho bé yêu của bạn.
						</p>
					</div>
				</div>

				<!-- Right 2 Features (Mobile order: 3, Desktop order: 3) -->
				<div class="w-full lg:w-[320px] xl:w-[335px] shrink-0 flex flex-col gap-5 sm:gap-8 order-3 lg:order-3">
					<!-- Feature 3: Tin cậy -->
					<div class="flex flex-col gap-2">
						<div class="flex items-center gap-2.5">
							<svg class="w-5 h-5 shrink-0" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M23.7581 12.21C24.0806 11.8392 24.0806 11.2874 23.7581 10.9166L21.8639 8.7382C21.6875 8.53535 21.6016 8.26925 21.6261 8.00154L21.8898 5.12294C21.9349 4.63126 21.6092 4.18212 21.1279 4.07217L18.3402 3.43534C18.0754 3.37485 17.8473 3.20779 17.7098 2.9736L16.2496 0.487107C15.9977 0.0581615 15.4656 -0.115834 15.0089 0.0813893L12.3913 1.21186C12.1419 1.31956 11.8591 1.31956 11.6097 1.21186L8.99098 0.0809135C8.53478 -0.116106 8.00325 0.0573117 7.75102 0.48547L6.29208 2.96198C6.154 3.19637 5.92519 3.36326 5.65983 3.42314L2.8757 4.0514C2.3932 4.16028 2.06613 4.60993 2.11114 5.10251L2.3751 7.99144C2.3995 8.25846 2.31405 8.5239 2.13846 8.72654L0.240724 10.9167C-0.0806752 11.2876 -0.0801875 11.8385 0.241868 12.2089L2.13723 14.3885C2.31357 14.5913 2.39946 14.8573 2.375 15.1249L2.11093 18.0151C2.06601 18.5067 2.3917 18.9557 2.87294 19.0656L5.6616 19.7027C5.92591 19.7631 6.15368 19.9297 6.29129 20.1633L7.74991 22.6392C8.00262 23.0682 8.53555 23.2413 8.99213 23.0428L11.6088 21.905C11.8587 21.7964 12.1424 21.796 12.3926 21.904L15.01 23.0344C15.4662 23.2314 15.9978 23.058 16.25 22.6299L17.7097 20.152C17.8473 19.9184 18.0751 19.7518 18.3394 19.6914L21.1279 19.0544C21.6092 18.9445 21.9349 18.4953 21.8898 18.0037L21.6261 15.125C21.6016 14.8573 21.6875 14.5912 21.8639 14.3884L23.7581 12.21ZM10.1697 16.5689C9.99977 16.7403 9.72282 16.7403 9.55293 16.569L6.42685 13.4167C5.97218 12.9583 5.97267 12.2188 6.42793 11.761C6.88801 11.2983 7.63697 11.2991 8.09604 11.7628L9.6754 13.358C9.77778 13.4614 9.94485 13.4614 10.0473 13.3581L15.5799 7.77477C16.0392 7.31132 16.7881 7.31068 17.2481 7.77335C17.7035 8.23131 17.704 8.9709 17.2492 9.42949L10.1697 16.5689Z" fill="var(--color-secondary-500)"/>
							</svg>
							<h3 class="font-body font-semibold text-lg text-text-body-default">Tin cậy</h3>
						</div>
						<p class="font-body font-medium text-sm sm:text-base text-text-body-muted leading-relaxed">
							Vạn Phúc Care tự hào là thương hiệu uy tín, sở hữu đội ngũ điều dưỡng chuyên môn cao, cùng các liệu trình chăm sóc khoa học, mang lại sự yên tâm tuyệt đối.
						</p>
					</div>

					<!-- Feature 4: Chuyên nghiệp -->
					<div class="flex flex-col gap-2">
						<div class="flex items-center gap-2.5">
							<svg class="w-5 h-5 shrink-0" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M23.7581 12.21C24.0806 11.8392 24.0806 11.2874 23.7581 10.9166L21.8639 8.7382C21.6875 8.53535 21.6016 8.26925 21.6261 8.00154L21.8898 5.12294C21.9349 4.63126 21.6092 4.18212 21.1279 4.07217L18.3402 3.43534C18.0754 3.37485 17.8473 3.20779 17.7098 2.9736L16.2496 0.487107C15.9977 0.0581615 15.4656 -0.115834 15.0089 0.0813893L12.3913 1.21186C12.1419 1.31956 11.8591 1.31956 11.6097 1.21186L8.99098 0.0809135C8.53478 -0.116106 8.00325 0.0573117 7.75102 0.48547L6.29208 2.96198C6.154 3.19637 5.92519 3.36326 5.65983 3.42314L2.8757 4.0514C2.3932 4.16028 2.06613 4.60993 2.11114 5.10251L2.3751 7.99144C2.3995 8.25846 2.31405 8.5239 2.13846 8.72654L0.240724 10.9167C-0.0806752 11.2876 -0.0801875 11.8385 0.241868 12.2089L2.13723 14.3885C2.31357 14.5913 2.39946 14.8573 2.375 15.1249L2.11093 18.0151C2.06601 18.5067 2.3917 18.9557 2.87294 19.0656L5.6616 19.7027C5.92591 19.7631 6.15368 19.9297 6.29129 20.1633L7.74991 22.6392C8.00262 23.0682 8.53555 23.2413 8.99213 23.0428L11.6088 21.905C11.8587 21.7964 12.1424 21.796 12.3926 21.904L15.01 23.0344C15.4662 23.2314 15.9978 23.058 16.25 22.6299L17.7097 20.152C17.8473 19.9184 18.0751 19.7518 18.3394 19.6914L21.1279 19.0544C21.6092 18.9445 21.9349 18.4953 21.8898 18.0037L21.6261 15.125C21.6016 14.8573 21.6875 14.5912 21.8639 14.3884L23.7581 12.21ZM10.1697 16.5689C9.99977 16.7403 9.72282 16.7403 9.55293 16.569L6.42685 13.4167C5.97218 12.9583 5.97267 12.2188 6.42793 11.761C6.88801 11.2983 7.63697 11.2991 8.09604 11.7628L9.6754 13.358C9.77778 13.4614 9.94485 13.4614 10.0473 13.3581L15.5799 7.77477C16.0392 7.31132 16.7881 7.31068 17.2481 7.77335C17.7035 8.23131 17.704 8.9709 17.2492 9.42949L10.1697 16.5689Z" fill="var(--color-secondary-500)"/>
							</svg>
							<h3 class="font-body font-semibold text-lg text-text-body-default">Chuyên nghiệp</h3>
						</div>
						<p class="font-body font-medium text-sm sm:text-base text-text-body-muted leading-relaxed">
							Dịch vụ cao cấp, hỗ trợ tận tâm rộng khắp Hà Nội và TP.HCM, đảm bảo mang đến sự hài lòng tuyệt đối về chất lượng dịch vụ bằng sự trân trọng và thấu hiểu.
						</p>
					</div>
				</div>

			</div>

			<!-- Bottom 3 Step Cards -->
			<div class="w-full grid grid-cols-1 md:grid-cols-3 gap-6 sm:gap-6 lg:gap-7">
				<!-- Step 1 -->
				<div class="bg-surface-card-default rounded-2xl p-6 sm:p-7 shadow-card flex flex-col justify-between gap-5 border border-border-divider-default transition-transform duration-200 hover:-translate-y-1">
					<div class="flex items-center justify-between">
						<span class="inline-flex items-center justify-center px-3.5 py-1 bg-surface-card-primary border border-border-primary-default rounded-full text-xs sm:text-sm font-medium text-text-body-default">Bước 1</span>
						<div class="w-[50px] h-[50px] shrink-0">
							<svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M0 25C0 11.1929 11.1929 0 25 0C38.8071 0 50 11.1929 50 25C50 38.8071 38.8071 50 25 50C11.1929 50 0 38.8071 0 25Z" fill="var(--color-secondary-100)"/>
								<path d="M24.2505 14H23.1505C22.8205 12.85 21.7605 12 20.5005 12C19.2405 12 18.1805 12.85 17.8505 14H16.7505C16.3405 14 16.0005 14.34 16.0005 14.75V16.25C16.0005 17.21 16.7905 18 17.7505 18H23.2505C24.2105 18 25.0005 17.21 25.0005 16.25V14.75C25.0005 14.34 24.6605 14 24.2505 14Z" fill="var(--color-secondary-500)"/>
								<path d="M26.2505 15H26.0005V16.25C26.0005 17.77 24.7705 19 23.2505 19H17.7505C16.2305 19 15.0005 17.77 15.0005 16.25V15H14.7505C13.2305 15 12.0005 16.23 12.0005 17.75V30.25C12.0005 31.77 13.2305 33 14.7505 33H22.1305L22.3505 31.77C22.4505 31.21 22.7105 30.71 23.1105 30.3L23.9105 29.5H15.7505C15.3405 29.5 15.0005 29.16 15.0005 28.75C15.0005 28.34 15.3405 28 15.7505 28H25.2505C25.3005 28 25.3405 28 25.3905 28.02H25.4005L29.0005 24.42V17.75C29.0005 16.23 27.7705 15 26.2505 15ZM25.2505 26.25H15.7505C15.3405 26.25 15.0005 25.91 15.0005 25.5C15.0005 25.09 15.3405 24.75 15.7505 24.75H25.2505C25.6605 24.75 26.0005 25.09 26.0005 25.5C26.0005 25.91 25.6605 26.25 25.2505 26.25ZM25.2505 23H15.7505C15.3405 23 15.0005 22.66 15.0005 22.25C15.0005 21.84 15.3405 21.5 15.7505 21.5H25.2505C25.6605 21.5 26.0005 21.84 26.0005 22.25C26.0005 22.66 25.6605 23 25.2505 23Z" fill="var(--color-secondary-500)"/>
								<path d="M24.5274 36.0001C24.3304 36.0001 24.1384 35.9221 23.9974 35.7801C23.8244 35.6071 23.7464 35.3611 23.7894 35.1191L24.3194 32.1141C24.3454 31.9631 24.4194 31.8231 24.5274 31.7141L31.9524 24.2901C32.8644 23.3761 33.7604 23.6231 34.2504 24.1131L35.4874 25.3501C36.1704 26.0321 36.1704 27.1421 35.4874 27.8251L28.0624 35.2501C27.9544 35.3591 27.8144 35.4321 27.6624 35.4581L24.6574 35.9881C24.6144 35.9961 24.5704 36.0001 24.5274 36.0001Z" fill="var(--color-secondary-500)"/>
							</svg>
						</div>
					</div>
					<div class="flex flex-col gap-2">
						<h4 class="font-body font-medium text-lg sm:text-[20px] text-text-heading-primary-default leading-snug">Đăng ký dịch vụ</h4>
						<p class="font-body font-normal sm:font-medium text-sm sm:text-base text-text-body-default leading-relaxed text-left">
							Liên hệ trực tiếp hoặc điền form đăng ký, giúp chúng tôi nắm bắt nhu cầu chăm sóc sức khỏe mẹ và bé ngay từ giai đoạn thai kỳ
						</p>
					</div>
				</div>

				<!-- Step 2 -->
				<div class="bg-surface-card-default rounded-2xl p-6 sm:p-7 shadow-card flex flex-col justify-between gap-5 border border-border-divider-default transition-transform duration-200 hover:-translate-y-1">
					<div class="flex items-center justify-between">
						<span class="inline-flex items-center justify-center px-3.5 py-1 bg-surface-card-primary border border-border-primary-default rounded-full text-xs sm:text-sm font-medium text-text-body-default">Bước 2</span>
						<div class="w-[50px] h-[50px] shrink-0">
							<svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M0 25C0 11.1929 11.1929 0 25 0C38.8071 0 50 11.1929 50 25C50 38.8071 38.8071 50 25 50C11.1929 50 0 38.8071 0 25Z" fill="var(--color-secondary-100)"/>
								<path d="M31.0312 13.3335H25.4062C22.6926 13.3335 20.4844 15.5668 20.4844 18.3113C20.4844 20.8148 22.3212 22.8925 24.7031 23.2384V25.4224C24.7031 25.7099 24.8741 25.9696 25.1371 26.0793C25.3965 26.1888 25.7007 26.1301 25.9034 25.9251L28.5099 23.2891H31.0312C33.7449 23.2891 36 21.0557 36 18.3113C36 15.5668 33.7449 13.3335 31.0312 13.3335ZM25.4062 19.0223C25.0178 19.0223 24.7031 18.7039 24.7031 18.3112C24.7031 17.9185 25.0178 17.6001 25.4062 17.6001C25.7946 17.6001 26.1094 17.9185 26.1094 18.3112C26.1094 18.7039 25.7946 19.0223 25.4062 19.0223ZM28.2188 19.0223C27.8303 19.0223 27.5156 18.7039 27.5156 18.3112C27.5156 17.9185 27.8303 17.6001 28.2188 17.6001C28.6071 17.6001 28.9219 17.9185 28.9219 18.3112C28.9219 18.7039 28.6071 19.0223 28.2188 19.0223ZM31.0312 19.0223C30.6428 19.0223 30.3281 18.7039 30.3281 18.3112C30.3281 17.9185 30.6428 17.6001 31.0312 17.6001C31.4196 17.6001 31.7344 17.9185 31.7344 18.3112C31.7344 18.7039 31.4196 19.0223 31.0312 19.0223Z" fill="var(--color-secondary-500)"/>
								<path d="M27.7969 34.6668C28.96 34.6668 29.9062 33.7099 29.9062 32.5335V29.6891C29.9062 29.3828 29.7126 29.1112 29.4256 29.0147L25.2167 27.5925C25.0107 27.5224 24.7855 27.5543 24.6043 27.6751L22.8149 28.8814C20.9197 27.9675 18.671 25.6932 17.7673 23.7765L18.96 21.9668C19.0801 21.7841 19.1104 21.5556 19.0417 21.3473L17.6355 17.0907C17.5401 16.8004 17.2716 16.6046 16.9688 16.6046H14.1094C12.9462 16.6046 12 17.5516 12 18.7279C12 26.921 19.6958 34.6668 27.7969 34.6668Z" fill="var(--color-secondary-500)"/>
							</svg>
						</div>
					</div>
					<div class="flex flex-col gap-2">
						<h4 class="font-body font-medium text-lg sm:text-[20px] text-text-heading-primary-default leading-snug">Tư vấn chuyên sâu</h4>
						<p class="font-body font-normal sm:font-medium text-sm sm:text-base text-text-body-default leading-relaxed text-left">
							Đội ngũ chuyên viên lắng nghe, giải đáp thắc mắc và đề xuất gói dịch vụ phù hợp nhất với nhu cầu cụ thể của từng gia đình
						</p>
					</div>
				</div>

				<!-- Step 3 -->
				<div class="bg-surface-card-default rounded-2xl p-6 sm:p-7 shadow-card flex flex-col justify-between gap-5 border border-border-divider-default transition-transform duration-200 hover:-translate-y-1">
					<div class="flex items-center justify-between">
						<span class="inline-flex items-center justify-center px-3.5 py-1 bg-surface-card-primary border border-border-primary-default rounded-full text-xs sm:text-sm font-medium text-text-body-default">Bước 3</span>
						<div class="w-[50px] h-[50px] shrink-0">
							<svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M0 25C0 11.1929 11.1929 0 25 0C38.8071 0 50 11.1929 50 25C50 38.8071 38.8071 50 25 50C11.1929 50 0 38.8071 0 25Z" fill="var(--color-secondary-100)"/>
								<path d="M27.6195 17.7989C27.2319 17.7989 26.9169 17.4839 26.9169 17.0958V12H15.9913C15.6036 12 15.2891 12.315 15.2891 12.7031V22.4241L22.6039 22.4147C23.4205 21.5308 24.4862 20.9589 25.7084 20.9752C26.7861 20.9752 27.8352 21.4088 28.5875 22.1648C28.8139 22.3898 29.1148 22.5141 29.4355 22.5141H29.4383L32.7106 22.508V17.7989H27.6195ZM21.9997 19.0312H18.8014C18.4138 19.0312 18.0988 18.7162 18.0988 18.3281C18.0988 17.94 18.4138 17.625 18.8014 17.625H21.9997C22.3873 17.625 22.7019 17.94 22.7019 18.3281C22.7019 18.7162 22.3873 19.0312 21.9997 19.0312ZM21.9997 16.2188H18.8014C18.4138 16.2188 18.0988 15.9037 18.0988 15.5156C18.0988 15.1275 18.4138 14.8125 18.8014 14.8125H21.9997C22.3873 14.8125 22.7019 15.1275 22.7019 15.5156C22.7019 15.9037 22.3873 16.2188 21.9997 16.2188Z" fill="var(--color-secondary-500)"/>
								<path d="M28.5074 29.6631L26.0078 27.1885C25.9168 27.0984 25.7702 27.0986 25.6798 27.1894C25.36 27.51 24.6812 28.1903 24.6812 28.1903C23.725 29.0519 22.6554 29.507 21.5872 29.507C20.9932 29.52 20.3445 29.3507 19.8013 29.0547C18.9609 28.6084 18.5259 27.6484 18.742 26.7184C18.8809 26.0795 19.2686 25.7315 19.7423 25.2634C20.1421 24.8608 20.6591 24.3405 21.1794 23.8206L12.6905 23.8342C12.3024 23.8347 12.0008 24.1502 12.0013 24.5388L12 30.2134C12.0005 30.6016 12.3159 30.9156 12.7045 30.9152L15.923 30.9091L20.6736 35.6439C21.1451 36.1141 21.9054 36.1178 22.3821 35.658C22.8676 35.1888 22.8615 34.4003 22.3961 33.9147L23.3655 34.8803C23.829 35.3477 24.6132 35.3603 25.0908 34.877C25.5666 34.3994 25.5652 33.6269 25.0875 33.1516C25.5656 33.632 26.3531 33.617 26.8134 33.1478C27.2807 32.6847 27.2924 31.8991 26.8101 31.4219C27.273 31.8873 28.0238 31.8892 28.49 31.4622C28.6286 31.3419 28.7308 31.1935 28.7966 31.0281C28.9868 30.5656 28.8748 30.0075 28.5074 29.6631Z" fill="var(--color-secondary-500)"/>
								<path d="M35.2599 23.9088L29.4411 23.92C28.7484 23.9214 28.0837 23.6481 27.5934 23.1592C26.5983 22.1561 24.9404 22.1167 23.9448 23.0786C23.029 23.9378 20.9351 26.0599 20.2986 26.6983C20.2021 26.7958 20.1402 26.9125 20.1121 27.0353C20.0427 27.3306 20.1678 27.6574 20.4608 27.813C21.5825 28.4083 22.7594 28.0291 23.74 27.1455L24.7773 26.1006C25.3126 25.4947 26.2553 25.4513 26.8308 26.0247L29.4763 28.6445C30.5843 29.6382 30.552 31.5983 29.3943 32.5399C29.2124 32.6974 29.0122 32.8281 28.7985 32.9299L30.2408 32.9275C32.1063 32.9238 32.5048 31.1313 32.5048 31.1313L35.274 31.1252C35.6621 31.1247 36.0005 30.8092 36.0001 30.4206V24.6105C35.9991 24.2224 35.648 23.9083 35.2599 23.9088Z" fill="var(--color-secondary-500)"/>
							</svg>
						</div>
					</div>
					<div class="flex flex-col gap-2">
						<h4 class="font-body font-medium text-lg sm:text-[20px] text-text-heading-primary-default leading-snug">Xác nhận hợp đồng</h4>
						<p class="font-body font-normal sm:font-medium text-sm sm:text-base text-text-body-default leading-relaxed text-left">
							Xác nhận thông tin, ký hợp đồng dịch vụ để bắt đầu hành trình chăm sóc mẹ và bé trong suốt giai đoạn đầu đời.
						</p>
					</div>
				</div>
			</div>

		</div>
	</section>

