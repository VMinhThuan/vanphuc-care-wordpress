<?php
/**
 * Component: Success Confirmation Modal Dialog
 * Displays after successful consultation form submission.
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<!-- Success Confirmation Modal -->
<div
	id="vpc-success-modal"
	class="vpc-consultation-modal fixed inset-0 z-50 hidden items-center justify-center p-4 sm:p-6 bg-surface-overlay backdrop-blur-sm transition-opacity duration-300 opacity-0 select-none"
	role="dialog"
	aria-modal="true"
	aria-labelledby="vpc-success-modal-title"
	data-modal
>
	<div class="vpc-modal-card relative w-full max-w-[624px] aspect-[624/570] transition-transform duration-300 transform scale-95" data-modal-card>
		<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/Trang chủ/success-consultation-modal.svg' ); ?>" width="624" height="570" class="h-full w-full select-none" alt="Đăng ký thành công" aria-hidden="true">

		<h3 id="vpc-success-modal-title" class="sr-only">Đăng ký thành công</h3>
		<p id="vpc-success-modal-message" class="sr-only">Cảm ơn Ba/Mẹ đã tin tưởng và đăng ký dịch vụ của Vạn Phúc Care. Bộ phận dịch vụ khách hàng sẽ liên hệ lại trong thời gian sớm nhất.</p>

		<button type="button" data-modal-close aria-label="Đóng thông báo" class="absolute left-[84%] top-[8%] h-[9%] w-[9%] rounded-full focus-visible:ring-2 focus-visible:ring-border-focus-default"></button>
		<button type="button" data-success-other class="absolute left-[22%] top-[78%] h-[10%] w-[24%] rounded-full focus-visible:ring-2 focus-visible:ring-border-focus-default"><span class="sr-only">Dịch vụ khác</span></button>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="absolute left-[49%] top-[78%] h-[10%] w-[24%] rounded-full focus-visible:ring-2 focus-visible:ring-border-focus-default"><span class="sr-only">Về trang chủ</span></a>
	</div>
</div>
