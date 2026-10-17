<?php
/**
 * Component: Custom Checkbox
 * Fully conforms to VPC Design System (Figma Board 8: Checkbox & Select States).
 *
 * Quy chuẩn thiết kế VPC Checkbox:
 * - Kích thước & hình dáng:
 *   + Hộp checkbox: 24x24px (w-6 h-6), bo góc 4px (rounded-md/rounded-[4px])
 *   + Border width: 2px (stroke-width 2)
 * - 4 Trạng thái (States):
 *   + Default (Unchecked): bg-[#FAFAFA], border-[#A5A5A5] (border-neutral-600)
 *   + Hover (Unchecked): border-[#1A77BA] (border-primary-500)
 *   + Checked: bg-[#1A77BA] (bg-primary-500), border-[#1A77BA] với icon checkmark ✓ màu trắng
 *   + Disabled: bg-[#CECECE] (bg-neutral-500), border-[#D8D8D8] (border-neutral-400), cursor-not-allowed
 * - Label & Links:
 *   + Font chữ: Manrope, font-normal / font-medium, màu #292929 (text-neutral-900)
 *   + Hỗ trợ inline text link (ví dụ: "điều khoản sử dụng" màu #1A77BA underline hover:text-primary-600)
 *   + Disabled label: text-[#A5A5A5] (text-neutral-600)
 * - Không outline / focus ring (tuân thủ VPC no-focus-ring)
 *
 * @package VanPhucCare
 *
 * Usage:
 * get_template_part('template-parts/components/checkbox', null, [
 *   'id'          => 'agree_terms',
 *   'name'        => 'agree_terms',
 *   'label'       => 'Tôi đồng ý với <a href="/dieu-khoan">điều khoản sử dụng</a>',
 *   'checked'     => false,
 *   'is_disabled' => false,
 *   'required'    => true,
 *   'error'       => '',
 *   'class'       => '',
 * ]);
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$id          = $args['id'] ?? ( 'vpc-checkbox-' . wp_unique_id() );
$name        = $args['name'] ?? $id;
$label       = $args['label'] ?? '';
$checked     = ! empty( $args['checked'] );
$is_disabled = ! empty( $args['is_disabled'] );
$required    = ! empty( $args['required'] );
$error       = $args['error'] ?? '';
$extra_class = $args['class'] ?? '';
$value       = $args['value'] ?? '1';

$has_error = ! empty( $error );
?>

<div class="vpc-checkbox-wrapper flex flex-col <?php echo esc_attr( $extra_class ); ?>">
	<label for="<?php echo esc_attr( $id ); ?>" class="group inline-flex items-center gap-3 cursor-pointer select-none <?php echo $is_disabled ? 'cursor-not-allowed opacity-70' : ''; ?>">
		<!-- Hidden native input -->
		<input
			type="checkbox"
			id="<?php echo esc_attr( $id ); ?>"
			name="<?php echo esc_attr( $name ); ?>"
			value="<?php echo esc_attr( $value ); ?>"
			class="peer sr-only"
			<?php checked( $checked, true ); ?>
			<?php echo $is_disabled ? 'disabled' : ''; ?>
			<?php echo $required ? 'required' : ''; ?>
			<?php echo $has_error ? 'aria-invalid="true"' : ''; ?>
		/>

		<!-- Custom Checkbox Box (24x24px, 4px radius) -->
		<span
			class="relative flex items-center justify-center w-6 h-6 shrink-0 rounded-[4px] border-2 transition-all duration-200 outline-none
			<?php if ( $is_disabled ) : ?>
				bg-[#CECECE] border-[#D8D8D8] cursor-not-allowed
			<?php elseif ( $has_error ) : ?>
				bg-[#FAFAFA] border-error-500 peer-checked:bg-primary-500 peer-checked:border-primary-500
			<?php else : ?>
				bg-[#FAFAFA] border-[#A5A5A5] group-hover:border-primary-500 peer-checked:bg-primary-500 peer-checked:border-primary-500
			<?php endif; ?>"
			aria-hidden="true"
		>
			<!-- Checkmark SVG icon (Figma 1:1) -->
			<svg
				class="w-3.5 h-3.5 text-white stroke-current fill-none opacity-0 transition-opacity duration-150 peer-checked:opacity-100"
				viewBox="0 0 14 14"
				stroke-width="2.5"
				stroke-linecap="round"
				stroke-linejoin="round"
			>
				<polyline points="2.5 7.5 5.5 10.5 11.5 3.5"></polyline>
			</svg>
		</span>

		<!-- Checkbox Label Text -->
		<?php if ( ! empty( $label ) ) : ?>
			<span class="font-body text-sm sm:text-base leading-snug <?php echo $is_disabled ? 'text-neutral-600' : 'text-neutral-900'; ?> [&_a]:text-primary-500 [&_a]:underline [&_a]:font-medium hover:[&_a]:text-primary-600 transition-colors">
				<?php echo wp_kses_post( $label ); ?>
				<?php if ( $required ) : ?>
					<span class="text-error-500 font-bold ml-0.5">*</span>
				<?php endif; ?>
			</span>
		<?php endif; ?>
	</label>

	<?php if ( $has_error ) : ?>
		<p class="mt-1 text-xs text-error-600 select-none pl-9" id="<?php echo esc_attr( $id ); ?>-error">
			<span><?php echo esc_html( $error ); ?></span>
		</p>
	<?php endif; ?>
</div>
