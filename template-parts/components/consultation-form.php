<?php
/**
 * Component: Consultation Form Card (Form Đăng ký tư vấn)
 * Matches Figma Form Board 1:1.
 *
 * @package VanPhucCare
 *
 * Usage:
 * get_template_part('template-parts/components/consultation-form', null, [
 *   'title'       => 'Đăng ký nhận tư vấn',
 *   'subtitle'    => 'Để lại thông tin để chuyên gia y tế liên hệ ngay',
 *   'action_url'  => '', // Form submit endpoint
 *   'class'       => '',
 * ]);
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$title       = $args['title'] ?? '';
$subtitle    = $args['subtitle'] ?? '';
$action_url  = $args['action_url'] ?? '';
$extra_class = $args['class'] ?? '';
$services    = vpc_get_consultation_services();
$gestational_age_options = vpc_get_gestational_age_options();
?>

<div class="vpc-consultation-card bg-surface-background-default rounded-[24px] p-6 sm:p-8 md:p-9 border border-neutral-300 shadow-sm max-w-2xl mx-auto <?php echo esc_attr( $extra_class ); ?>">
	<?php if ( ! empty( $title ) ) : ?>
		<div class="mb-6 text-center">
			<h3 class="font-heading text-xl sm:text-2xl text-neutral-900 font-semibold mb-2">
				<?php echo esc_html( $title ); ?>
			</h3>
			<?php if ( ! empty( $subtitle ) ) : ?>
				<p class="text-sm text-neutral-700">
					<?php echo esc_html( $subtitle ); ?>
				</p>
			<?php endif; ?>
		</div>
	<?php endif; ?>

	<form method="post" action="<?php echo esc_url( $action_url ); ?>" class="space-y-4 sm:space-y-5">
		<?php wp_nonce_field( 'vpc_consultation_nonce', 'vpc_consultation_nonce' ); ?>
		<input type="text" name="website" value="" tabindex="-1" autocomplete="off" aria-hidden="true" class="hidden">

		<!-- Row 1: Họ tên + Số điện thoại -->
		<div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-5">
			<?php
			get_template_part( 'template-parts/components/form-input', null, [
				'id'          => 'vpc_full_name',
				'name'        => 'full_name',
				'label'       => 'Họ và tên',
				'type'        => 'text',
				'placeholder' => 'Nguyễn Như Linh',
				'required'    => true,
			] );
			?>

			<?php
			get_template_part( 'template-parts/components/form-input', null, [
				'id'          => 'vpc_phone',
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
				'id'          => 'vpc_email',
				'name'        => 'email',
				'label'       => 'Email',
				'type'        => 'email',
				'placeholder' => 'email@example.com',
				'required'    => true,
			] );
			?>
		</div>

		<!-- Row 2: Dịch vụ quan tâm -->
		<div>
			<?php
			get_template_part( 'template-parts/components/form-input', null, [
				'id'          => 'vpc_service',
				'name'        => 'service',
				'label'       => 'Dịch vụ quan tâm',
				'type'        => 'select',
				'placeholder' => 'Chọn dịch vụ bạn quan tâm',
				'required'    => true,
				'options'     => $services,
			] );
			?>
		</div>

		<!-- Row 3: Giai đoạn thai kỳ (cập nhật theo comment Figma) -->
		<fieldset class="border-0 p-0 m-0">
			<legend class="block text-base sm:text-xl leading-7 font-medium text-text-body-default mb-3 select-none">
				<span class="text-error-500 font-bold mr-0.5">*</span> Giai đoạn thai kỳ
			</legend>
			<div class="flex flex-wrap items-center gap-2" role="radiogroup" aria-label="Giai đoạn thai kỳ">
				<label class="cursor-pointer shrink-0"><input class="peer sr-only" type="radio" name="pregnancy_stage" value="dang-mang-thai" checked required><span class="inline-flex items-center justify-center rounded-full border border-border-primary-default bg-transparent px-4 h-10 font-body text-sm font-medium text-text-body-default cursor-pointer whitespace-nowrap transition-colors peer-focus-visible:ring-2 peer-focus-visible:ring-border-focus-default peer-checked:border-border-primary-default peer-checked:bg-surface-button-primary-default peer-checked:text-text-inverse-default">Đang mang thai</span></label>
				<label class="cursor-pointer shrink-0"><input class="peer sr-only" type="radio" name="pregnancy_stage" value="chuan-bi-mang-thai" required><span class="inline-flex items-center justify-center rounded-full border border-border-primary-default bg-transparent px-4 h-10 font-body text-sm font-medium text-text-body-default cursor-pointer whitespace-nowrap transition-colors peer-focus-visible:ring-2 peer-focus-visible:ring-border-focus-default peer-checked:border-border-primary-default peer-checked:bg-surface-button-primary-default peer-checked:text-text-inverse-default">Chuẩn bị mang thai</span></label>
				<label class="cursor-pointer shrink-0"><input class="peer sr-only" type="radio" name="pregnancy_stage" value="da-sinh-be" required><span class="inline-flex items-center justify-center rounded-full border border-border-primary-default bg-transparent px-4 h-10 font-body text-sm font-medium text-text-body-default cursor-pointer whitespace-nowrap transition-colors peer-focus-visible:ring-2 peer-focus-visible:ring-border-focus-default peer-checked:border-border-primary-default peer-checked:bg-surface-button-primary-default peer-checked:text-text-inverse-default">Đã sinh bé</span></label>
			</div>
		</fieldset>

		<!-- Row 4: Tuần thai; placeholder mới theo Figma là "Chọn giai đoạn". -->
		<div>
			<?php
			get_template_part( 'template-parts/components/form-input', null, [
				'id'          => 'vpc_gestational_age',
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
				'id'          => 'vpc_question',
				'name'        => 'question',
				'label'       => 'Ghi chú',
				'type'        => 'textarea',
				'placeholder' => 'Nhập ghi chú hoặc yêu cầu cần tư vấn thêm...',
				'required'    => false,
				'rows'        => 3,
			] );
			?>
		</div>

		<!-- Row 5: Điều khoản sử dụng (Figma Board 8) -->
		<div>
			<?php
			get_template_part( 'template-parts/components/checkbox', null, [
				'id'       => 'vpc_terms_agree',
				'name'     => 'terms_agree',
				'label'    => 'Tôi đồng ý với <a href="' . esc_url( home_url( '/chinh-sach-bao-mat/' ) ) . '" target="_blank">điều khoản sử dụng</a>',
				'checked'  => true,
				'required' => true,
			] );
			?>
		</div>

		<!-- Submit Button -->
		<div class="pt-2">
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
</div>
