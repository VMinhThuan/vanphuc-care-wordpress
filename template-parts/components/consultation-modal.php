<?php
/**
 * Component: Consultation Modal Dialog (Popup Đăng ký nhận tư vấn)
 * Fully conforms to VPC Design System (Figma Board 9: Consultation Modal).
 * Dynamically renders specialized form fields when on dedicated service pages.
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$modal_id    = $args['modal_id'] ?? 'vpc-consultation-modal';
$title       = $args['title'] ?? 'Đăng ký tư vấn';
$subtitle    = $args['subtitle'] ?? 'Để lại thông tin, Vạn Phúc Care sẽ liên hệ tư vấn cho Ba/Mẹ trong thời gian sớm nhất.';
$action_url  = $args['action_url'] ?? '';
$extra_class = $args['class'] ?? '';
$services    = vpc_get_consultation_services();
$gestational_age_options = vpc_get_gestational_age_options();

$current_service = '';
// Keep the modal aligned with the page-specific consultation form. The page
// helpers also cover routes where WordPress does not expose the template name
// consistently (for example, a page using a custom permalink).
if ( function_exists( 'vanphuccare_is_bao_mau_page' ) && vanphuccare_is_bao_mau_page() ) {
	$current_service = 'bao-mau-tai-nha';
} elseif ( function_exists( 'vanphuccare_is_o_cu_page' ) && vanphuccare_is_o_cu_page() ) {
	$current_service = 'trung-tam-o-cu';
} elseif ( function_exists( 'vanphuccare_is_tam_be_page' ) && vanphuccare_is_tam_be_page() ) {
	$current_service = 'tam-be-tai-nha';
} elseif ( function_exists( 'vanphuccare_is_thong_tac_page' ) && vanphuccare_is_thong_tac_page() ) {
	$current_service = 'thong-tac-tia-sua';
} elseif ( function_exists( 'vanphuccare_is_easy_page' ) && vanphuccare_is_easy_page() ) {
	$current_service = 'tu-van-nuoi-con-easy';
}
?>

<!-- Consultation Modal Backdrop & Container -->
<div
	id="<?php echo esc_attr( $modal_id ); ?>"
	class="vpc-consultation-modal fixed inset-0 z-50 hidden items-center justify-center p-4 sm:p-6 bg-surface-overlay backdrop-blur-sm transition-opacity duration-300 opacity-0 select-none <?php echo esc_attr( $extra_class ); ?>"
	role="dialog"
	aria-modal="true"
	aria-labelledby="<?php echo esc_attr( $modal_id ); ?>-title"
	data-modal
>
	<!-- Modal Card (Max-width 560px, Radius 24px, BG bg-surface-background-default, Figma 1:1) -->
	<div
		class="vpc-modal-card relative w-full max-w-[560px] <?php echo ! empty( $current_service ) ? 'min-h-auto' : 'sm:min-h-[668px]'; ?> bg-surface-background-default rounded-[24px] shadow-2xl p-5 sm:p-8 transition-transform duration-300 transform scale-95 select-text"
		data-modal-card
	>
		<!-- Close Button (X icon 1:1 Figma) -->
		<button
			type="button"
			class="vpc-modal-close absolute top-5 right-5 sm:top-8 sm:right-8 h-6 w-6 p-0 inline-flex items-center justify-center rounded-full text-text-body-default hover:text-primary-500 hover:bg-neutral-300 transition-colors duration-150 focus-visible:ring-2 focus-visible:ring-border-focus-default"
			aria-label="Đóng cửa sổ"
			data-modal-close
		>
			<svg class="w-3 h-3" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M2.5 13.5L13.5 2.5M13.5 13.5L2.5 2.5" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"/>
			</svg>
		</button>

		<!-- Header -->
		<div class="mb-6 pr-8">
			<h3
				id="<?php echo esc_attr( $modal_id ); ?>-title"
				class="font-heading text-2xl sm:text-[28px] sm:leading-8 font-medium text-text-heading-primary-default mb-2"
			>
				<?php echo esc_html( $title ); ?>
			</h3>
			<?php if ( ! empty( $subtitle ) ) : ?>
				<p class="font-body text-base font-medium text-text-body-muted leading-6">
					<?php echo esc_html( $subtitle ); ?>
				</p>
			<?php endif; ?>
		</div>

		<!-- Form Content -->
		<?php if ( 'bao-mau-tai-nha' === $current_service ) : ?>
			<form id="vpc-modal-consultation-form" class="vpc-consultation-form" method="post" action="<?php echo esc_url( $action_url ); ?>">
				<?php
				get_template_part( 'template-parts/bao-mau/form-fields', null, array(
					'prefix' => 'modal-bao-mau',
				) );
				?>
			</form>
		<?php elseif ( 'trung-tam-o-cu' === $current_service ) : ?>
			<form id="vpc-modal-consultation-form" class="vpc-consultation-form" method="post" action="<?php echo esc_url( $action_url ); ?>">
				<?php
				get_template_part( 'template-parts/o-cu/form-fields', null, array(
					'prefix' => 'modal-ocu',
				) );
				?>
			</form>
		<?php elseif ( 'tam-be-tai-nha' === $current_service ) : ?>
			<form id="vpc-modal-consultation-form" class="vpc-consultation-form" method="post" action="<?php echo esc_url( $action_url ); ?>">
				<?php
				get_template_part( 'template-parts/bath/form-fields', null, array(
					'prefix' => 'modal-bath',
				) );
				?>
			</form>
		<?php elseif ( 'thong-tac-tia-sua' === $current_service ) : ?>
			<form id="vpc-modal-consultation-form" class="vpc-consultation-form" method="post" action="<?php echo esc_url( $action_url ); ?>">
				<?php
				get_template_part( 'template-parts/milk/form-fields', null, array(
					'prefix' => 'modal-milk',
				) );
				?>
			</form>
		<?php elseif ( 'tu-van-nuoi-con-easy' === $current_service ) : ?>
			<form id="vpc-modal-consultation-form" class="vpc-consultation-form" method="post" action="<?php echo esc_url( $action_url ); ?>">
				<?php
				get_template_part( 'template-parts/easy/form-fields', null, array(
					'prefix' => 'modal-easy',
				) );
				?>
			</form>
		<?php else : ?>
			<form method="post" action="<?php echo esc_url( $action_url ); ?>" class="space-y-5">
				<?php wp_nonce_field( 'vpc_consultation_nonce', 'vpc_consultation_nonce' ); ?>
				<input type="text" name="website" value="" tabindex="-1" autocomplete="off" aria-hidden="true" class="hidden">

				<!-- Row 1: Họ tên + Số điện thoại (2 columns) -->
				<div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5">
					<?php
					get_template_part( 'template-parts/components/form-input', null, [
						'id'          => $modal_id . '-fullname',
						'name'        => 'full_name',
						'label'       => 'Họ và tên',
						'type'        => 'text',
						'placeholder' => 'Nguyễn Như Linh',
						'required'    => true,
					] );
					?>

					<?php
					get_template_part( 'template-parts/components/form-input', null, [
						'id'          => $modal_id . '-phone',
						'name'        => 'phone',
						'label'       => 'Số điện thoại',
						'type'        => 'tel',
						'placeholder' => '0345678***',
						'required'    => true,
					] );
					?>
				</div>

				<div>
					<?php
					get_template_part( 'template-parts/components/form-input', null, [
						'id'          => $modal_id . '-email',
						'name'        => 'email',
						'label'       => 'Email',
						'type'        => 'email',
						'placeholder' => 'email@example.com',
						'required'    => true,
					] );
					?>
				</div>

				<!-- Row 2: Dịch vụ quan tâm (Custom Select Dropdown Figma Board 8/9) -->
				<div>
					<?php
					get_template_part( 'template-parts/components/custom-select', null, [
						'id'          => $modal_id . '-service',
						'name'        => 'service',
						'label'       => 'Dịch vụ quan tâm',
						'placeholder' => 'Chọn dịch vụ',
						'required'    => true,
						'options'     => $services,
					] );
					?>
				</div>

				<!-- Row 3: Giai đoạn thai kỳ (cập nhật theo comment Figma) -->
				<fieldset class="vpc-consultation-field vpc-consultation-stage border-0 p-0 m-0 !mb-5">
					<legend class="block text-base sm:text-xl leading-7 font-medium text-text-body-default mb-3 select-none">
						<span class="text-error-500 font-bold mr-0.5">*</span> Giai đoạn thai kỳ
					</legend>
					<div class="vpc-consultation-stage__options flex flex-wrap items-center gap-2" role="radiogroup" aria-label="Giai đoạn thai kỳ">
						<label class="cursor-pointer shrink-0"><input class="peer sr-only" type="radio" name="pregnancy_stage" value="dang-mang-thai" checked required><span class="inline-flex items-center justify-center rounded-full border border-border-primary-default bg-transparent px-4 h-10 font-body text-sm font-medium text-text-body-default cursor-pointer whitespace-nowrap transition-colors peer-focus-visible:ring-2 peer-focus-visible:ring-border-focus-default peer-checked:border-border-primary-default peer-checked:bg-surface-button-primary-default peer-checked:text-text-inverse-default">Đang mang thai</span></label>
						<label class="cursor-pointer shrink-0"><input class="peer sr-only" type="radio" name="pregnancy_stage" value="chuan-bi-mang-thai" required><span class="inline-flex items-center justify-center rounded-full border border-border-primary-default bg-transparent px-4 h-10 font-body text-sm font-medium text-text-body-default cursor-pointer whitespace-nowrap transition-colors peer-focus-visible:ring-2 peer-focus-visible:ring-border-focus-default peer-checked:border-border-primary-default peer-checked:bg-surface-button-primary-default peer-checked:text-text-inverse-default">Chuẩn bị mang thai</span></label>
						<label class="cursor-pointer shrink-0"><input class="peer sr-only" type="radio" name="pregnancy_stage" value="da-sinh-be" required><span class="inline-flex items-center justify-center rounded-full border border-border-primary-default bg-transparent px-4 h-10 font-body text-sm font-medium text-text-body-default cursor-pointer whitespace-nowrap transition-colors peer-focus-visible:ring-2 peer-focus-visible:ring-border-focus-default peer-checked:border-border-primary-default peer-checked:bg-surface-button-primary-default peer-checked:text-text-inverse-default">Đã sinh bé</span></label>
					</div>
				</fieldset>

				<!-- Row 4: Tuần thai; placeholder mới theo Figma là "Chọn giai đoạn". -->
				<div>
					<?php
					get_template_part( 'template-parts/components/form-input', null, [
						'id'          => $modal_id . '-gestational-age',
						'name'        => 'gestational_age',
						'label'       => 'Tuần thai',
						'type'        => 'select',
						'placeholder' => 'Chọn giai đoạn',
						'required'    => true,
						'options'     => $gestational_age_options,
					] );
					?>
				</div>

				<!-- Row 4: Ghi chú -->
				<div>
					<?php
					get_template_part( 'template-parts/components/form-input', null, [
						'id'          => $modal_id . '-question',
						'name'        => 'question',
						'label'       => 'Ghi chú',
						'type'        => 'text',
						'placeholder' => 'Cho chúng tôi biết thêm về nhu cầu của bạn!',
						'required'    => false,
					] );
					?>
				</div>

				<!-- Cloudflare Turnstile CAPTCHA -->
				<?php get_template_part( 'template-parts/components/turnstile' ); ?>

				<!-- Row 5: Submit Button (40px mobile, 48px desktop) -->
				<div>
					<?php
					get_template_part( 'template-parts/components/button', null, [
						'text'    => 'Gửi yêu cầu tư vấn',
						'variant' => 'primary',
						'size'    => 'body',
						'type'    => 'submit',
						'class'   => 'w-full justify-center',
					] );
					?>
				</div>
			</form>
		<?php endif; ?>
	</div>
</div>
