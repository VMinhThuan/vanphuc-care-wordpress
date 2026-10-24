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
	<div
		class="vpc-modal-card relative w-full max-w-[480px] bg-surface-card-default rounded-3xl shadow-2xl p-6 sm:p-8 text-center transition-transform duration-300 transform scale-95"
		data-modal-card
	>
		<!-- Close Button -->
		<button
			type="button"
			class="vpc-modal-close absolute top-5 right-5 p-2 rounded-full text-text-body-default hover:text-primary-500 hover:bg-neutral-200 transition-colors duration-150"
			aria-label="Đóng thông báo"
			data-modal-close
		>
			<svg class="w-4 h-4" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M2.5 13.5L13.5 2.5M13.5 13.5L2.5 2.5" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"/>
			</svg>
		</button>

		<!-- Checkmark Icon Graphic -->
		<div class="w-16 h-16 rounded-full bg-surface-success-default flex items-center justify-center mx-auto mb-4.5 shadow-xs text-text-success-default">
			<svg class="w-8 h-8 stroke-current fill-none" viewBox="0 0 24 24" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
				<polyline points="20 6 9 17 4 12"></polyline>
			</svg>
		</div>

		<!-- Title -->
		<h3 id="vpc-success-modal-title" class="font-heading text-2xl sm:text-[26px] font-bold text-text-heading-primary-default mb-2.5">
			Gửi tư vấn thành công!
		</h3>

		<!-- Body Message -->
		<p id="vpc-success-modal-message" class="font-body text-base text-text-body-muted leading-relaxed mb-6 max-w-sm mx-auto">
			Cảm ơn Ba/Mẹ đã tin tưởng Vạn Phúc Care. Đội ngũ chuyên gia y tế sẽ liên hệ tư vấn chi tiết trong thời gian sớm nhất.
		</p>

		<!-- Dismiss Button -->
		<button
			type="button"
			class="vpc-button w-full h-10 bg-surface-button-primary-default hover:bg-surface-button-primary-hover active:bg-surface-button-primary-pressed text-text-inverse-default rounded-full flex items-center justify-center transition-all cursor-pointer shadow-xs"
			data-modal-close
		>
			Hoàn tất
		</button>
	</div>
</div>
