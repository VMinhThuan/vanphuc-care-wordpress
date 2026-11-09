<?php
/**
 * Component: Form Input, Select & Textarea
 * Fully conforms to VPC Design System (Figma Form & Input Field Board).
 *
 * Quy chuẩn thiết kế VPC:
 * - Kích thước & bo góc:
 *   + Chiều cao: 50px (h-[50px])
 *   + Bo góc: 12px (rounded-xl)
 *   + Padding: px-4.5 (18px)
 *   + Cỡ chữ: 14px (text-sm) đến 16px (text-base)
 * - 5 Trạng thái (States):
 *   + Default: bg-[#FAFAFA], viền #CECECE (border-neutral-500), placeholder #CECECE
 *   + Hover: viền #1A77BA (border-primary-500)
 *   + Focus: viền #4892C8 (border-primary-400), caret #1A77BA, không outline
 *   + Disabled: bg #CECECE, viền #D8D8D8, chữ/placeholder #A5A5A5, cursor-not-allowed
 *   + Error: viền #FF0000 (border-error-500), thông báo lỗi chữ #CC0000 (text-error-600)
 * - Label:
 *   + Text: Manrope, font-medium, màu #292929 (text-neutral-900)
 *   + Ký hiệu bắt buộc (*): màu #FF0000 (text-error-500) đặt đầu label
 *
 * @package VanPhucCare
 *
 * Usage:
 * get_template_part('template-parts/components/form-input', null, [
 *   'id'          => 'full_name',
 *   'name'        => 'full_name',
 *   'label'       => 'Họ và tên',
 *   'type'        => 'text', // text | tel | email | select | textarea
 *   'placeholder' => 'Nguyễn Như Linh',
 *   'required'    => true,
 *   'error'       => '',     // 'Vui lòng điền họ và tên!'
 *   'is_disabled' => false,
 *   'options'     => [],     // if type === 'select'
 *   'value'       => '',
 *   'class'       => '',
 * ]);
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$id          = $args['id'] ?? ( 'vpc-field-' . wp_unique_id() );
$name        = $args['name'] ?? $id;
$label       = $args['label'] ?? '';
$type        = $args['type'] ?? 'text';
$placeholder = $args['placeholder'] ?? '';
$required    = ! empty( $args['required'] );
$error       = $args['error'] ?? '';
$is_disabled = ! empty( $args['is_disabled'] );
$options     = $args['options'] ?? [];
$value       = $args['value'] ?? '';
$extra_class = $args['class'] ?? '';
$rows        = $args['rows'] ?? 3;

$has_error = ! empty( $error );

// Select fields use the shared Figma select-item component so every form
// exposes the same trigger, dropdown, keyboard behavior and hidden value.
if ( 'select' === $type ) {
	get_template_part( 'template-parts/components/custom-select', null, [
		'id'          => $id,
		'name'        => $name,
		'label'       => $label,
		'placeholder' => $placeholder,
		'required'    => $required,
		'error'       => $error,
		'is_disabled' => $is_disabled,
		'value'       => $value,
		'options'     => $options,
		'class'       => $extra_class,
	] );
	return;
}

// Base input styling
$base_input_classes = 'w-full transition-colors duration-200 focus-visible:ring-2 focus-visible:ring-border-focus-default font-body text-base font-medium text-text-body-default select-none';

// Dimension & shape styling (height 50px, radius 12px)
$box_shape_classes = 'px-4.5 rounded-xl';

// State-dependent border and background
if ( $is_disabled ) {
	$state_input_classes = 'bg-neutral-500 border border-neutral-400 text-neutral-600 placeholder-neutral-600 cursor-not-allowed';
} elseif ( $has_error ) {
	$state_input_classes = 'bg-surface-background-default border border-error-500 text-text-body-default placeholder-neutral-500 focus:border-error-500 caret-primary-500';
} else {
	$state_input_classes = 'bg-surface-background-default border border-neutral-500 text-text-body-default placeholder-neutral-500 hover:border-primary-500 focus:border-primary-400 caret-primary-500';
}

$input_classes = trim( "{$base_input_classes} {$box_shape_classes} {$state_input_classes}" );
?>

<div class="vpc-form-field flex flex-col <?php echo esc_attr( $extra_class ); ?>">
	<?php if ( ! empty( $label ) ) : ?>
		<label for="<?php echo esc_attr( $id ); ?>" class="block text-base sm:text-xl leading-7 font-medium text-text-body-default mb-3 select-none">
			<?php if ( $required ) : ?>
				<span class="text-error-500 font-bold mr-0.5">*</span>
			<?php endif; ?>
			<span><?php echo esc_html( $label ); ?></span>
		</label>
	<?php endif; ?>

	<div class="relative w-full">
		<?php if ( 'textarea' === $type ) : ?>
			<textarea
				id="<?php echo esc_attr( $id ); ?>"
				name="<?php echo esc_attr( $name ); ?>"
				rows="<?php echo esc_attr( $rows ); ?>"
				placeholder="<?php echo esc_attr( $placeholder ); ?>"
				class="<?php echo esc_attr( $input_classes ); ?> py-3 resize-y"
				<?php echo $required ? 'required' : ''; ?>
				<?php echo $is_disabled ? 'disabled' : ''; ?>
				<?php echo $has_error ? 'aria-invalid="true"' : ''; ?>
			><?php echo esc_textarea( $value ); ?></textarea>

		<?php else : ?>
			<input
				type="<?php echo esc_attr( $type ); ?>"
				id="<?php echo esc_attr( $id ); ?>"
				name="<?php echo esc_attr( $name ); ?>"
				value="<?php echo esc_attr( $value ); ?>"
				placeholder="<?php echo esc_attr( $placeholder ); ?>"
				class="<?php echo esc_attr( $input_classes ); ?> h-[50px]"
				<?php echo $required ? 'required' : ''; ?>
				<?php echo $is_disabled ? 'disabled' : ''; ?>
				<?php echo $has_error ? 'aria-invalid="true"' : ''; ?>
			/>
		<?php endif; ?>
	</div>

	<?php if ( $has_error ) : ?>
		<p class="mt-1.5 text-xs text-error-600 flex items-center gap-1 select-none" id="<?php echo esc_attr( $id ); ?>-error">
			<span><?php echo esc_html( $error ); ?></span>
		</p>
	<?php endif; ?>
</div>
