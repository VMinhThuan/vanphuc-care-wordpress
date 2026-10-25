<?php
/**
 * Component: Custom Select Dropdown & Popover Menu
 * Fully conforms to VPC Design System (Figma Board 8: Select Field & Menu Dropdown).
 *
 * Quy chuẩn thiết kế VPC Select & Dropdown Menu:
 * - Kích thước & hình dáng Trigger:
 *   + Chiều cao: 50px (h-[50px])
 *   + Bo góc: 12px (rounded-xl)
 *   + Padding: px-4.5 (18px)
 *   + Chevron: SVG icon vector nhọn, xoay 180 độ khi mở
 * - 5 Trạng thái Trigger:
 *   + Default: bg-[#FAFAFA], viền #CECECE, placeholder #CECECE
 *   + Hover: viền #1A77BA (border-primary-500)
 *   + Open / Active: viền #4892C8 (border-primary-400), chevron xoay ngược lên
 *   + Disabled: bg #CECECE, viền #D8D8D8, chữ/placeholder #A5A5A5, cursor-not-allowed
 *   + Error: viền #FF0000 (border-error-500)
 * - Dropdown Popover Menu (Menu xổ xuống):
 *   + Nền: #FAFAFA, viền: 1px #D8D8D8, bo góc: 12px (rounded-xl), shadow: shadow-lg
 *   + Khoảng cách options: p-2 (padding 8px)
 *   + Option Item:
 *     * Chiều cao: ~40px (py-2 px-3.5), bo góc: 8px (rounded-lg)
 *     * Default: text #292929, bg-transparent
 *     * Hover: bg-[#EBEBEB], text #292929
 *     * Selected (Active): bg-[#A3C9E3] (bg-primary-200), text #292929 kèm icon checkmark ✓ màu #1A77BA bên phải
 *     * Disabled option: text #A5A5A5, cursor-not-allowed
 * - Không outline / focus ring (tuân thủ VPC no-focus-ring)
 *
 * @package VanPhucCare
 *
 * Usage:
 * get_template_part('template-parts/components/custom-select', null, [
 *   'id'          => 'service_select',
 *   'name'        => 'service',
 *   'label'       => 'Dịch vụ quan tâm',
 *   'placeholder' => 'Chọn dịch vụ',
 *   'required'    => true,
 *   'error'       => '',
 *   'is_disabled' => false,
 *   'value'       => 'tam-be',
 *   'options'     => [
 *       ['value' => 'o-cu', 'label' => 'Trung tâm ở cữ'],
 *       ['value' => 'bao-mau', 'label' => 'Bảo mẫu tại nhà'],
 *       ['value' => 'tam-be', 'label' => 'Tắm bé tại nhà'],
 *       ['value' => 'easy', 'label' => 'Tư vấn EASY (hết chỗ)', 'disabled' => true],
 *   ],
 *   'class'       => '',
 * ]);
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$id          = $args['id'] ?? ( 'vpc-select-' . wp_unique_id() );
$name        = $args['name'] ?? $id;
$label       = $args['label'] ?? '';
$placeholder = $args['placeholder'] ?? 'Chọn dịch vụ';
$required    = ! empty( $args['required'] );
$error       = $args['error'] ?? '';
$is_disabled = ! empty( $args['is_disabled'] );
$raw_options = $args['options'] ?? [];
$value       = $args['value'] ?? '';
$extra_class = $args['class'] ?? '';

$has_error = ! empty( $error );

// Normalize options to array of ['value', 'label', 'disabled']
$options = [];
$selected_label = '';

foreach ( $raw_options as $key => $opt ) {
	if ( is_array( $opt ) ) {
		$opt_val = (string) ( $opt['value'] ?? $key );
		$opt_lbl = (string) ( $opt['label'] ?? $opt_val );
		$opt_dis = ! empty( $opt['disabled'] );
	} else {
		$opt_val = is_numeric( $key ) ? (string) $opt : (string) $key;
		$opt_lbl = (string) $opt;
		$opt_dis = false;
	}

	$is_selected = ( (string) $value === $opt_val );
	if ( $is_selected ) {
		$selected_label = $opt_lbl;
	}

	$options[] = [
		'value'    => $opt_val,
		'label'    => $opt_lbl,
		'disabled' => $opt_dis,
		'selected' => $is_selected,
	];
}

// Trigger state classes
if ( $is_disabled ) {
	$trigger_state_classes = 'bg-neutral-500 border-neutral-400 text-neutral-600 cursor-not-allowed';
	$chevron_color = 'text-neutral-600';
} elseif ( $has_error ) {
	$trigger_state_classes = 'bg-surface-background-default border-error-500 text-text-body-default cursor-pointer';
	$chevron_color = 'text-text-body-default';
} else {
	$trigger_state_classes = 'bg-surface-background-default border-neutral-500 hover:border-primary-500 text-text-body-default cursor-pointer group-aria-expanded:border-primary-400';
	$chevron_color = 'text-text-body-default';
}
?>

<div class="vpc-custom-select-component flex flex-col <?php echo esc_attr( $extra_class ); ?>" data-custom-select>
	<?php if ( ! empty( $label ) ) : ?>
		<label for="<?php echo esc_attr( $id ); ?>-trigger" class="block text-base sm:text-xl leading-7 font-medium text-text-body-default mb-3 select-none">
			<?php if ( $required ) : ?>
				<span class="text-error-500 font-bold mr-0.5">*</span>
			<?php endif; ?>
			<span><?php echo esc_html( $label ); ?></span>
		</label>
	<?php endif; ?>

	<!-- Hidden input for standard form submission -->
	<input
		type="hidden"
		id="<?php echo esc_attr( $id ); ?>"
		name="<?php echo esc_attr( $name ); ?>"
		value="<?php echo esc_attr( $value ); ?>"
		data-select-input
		<?php echo $required ? 'required' : ''; ?>
	/>

	<!-- Custom Dropdown Wrapper -->
	<div class="relative w-full">
		<!-- Dropdown Trigger Button (50px, rounded-xl) -->
		<button
			type="button"
			id="<?php echo esc_attr( $id ); ?>-trigger"
			class="vpc-select-trigger group w-full h-[50px] px-4.5 rounded-xl border flex items-center justify-between text-left transition-colors duration-200 focus-visible:ring-2 focus-visible:ring-border-focus-default select-none <?php echo esc_attr( $trigger_state_classes ); ?>"
			aria-haspopup="listbox"
			aria-expanded="false"
			<?php echo $is_disabled ? 'disabled' : ''; ?>
			<?php echo $has_error ? 'aria-invalid="true"' : ''; ?>
		>
			<span class="truncate text-base font-medium font-body <?php echo empty( $selected_label ) ? 'text-neutral-500' : 'text-text-body-default'; ?>" data-select-label>
				<?php echo esc_html( ! empty( $selected_label ) ? $selected_label : $placeholder ); ?>
			</span>

			<!-- Chevron icon matching Figma Board 8 exactly -->
			<span class="shrink-0 ml-2 transition-transform duration-200 ease-out group-aria-expanded:rotate-180 <?php echo esc_attr( $chevron_color ); ?>">
				<svg class="w-4 h-4 shrink-0 stroke-current fill-none" viewBox="0 0 20 20">
					<path d="M5 7.5L10 12.5L15 7.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
				</svg>
			</span>
		</button>

		<!-- Dropdown Menu Popover (Figma 1:1) -->
		<div
			class="vpc-select-dropdown absolute left-0 right-0 top-[calc(100%+6px)] z-50 hidden bg-surface-background-default border border-neutral-400 rounded-xl shadow-lg p-2 transition-all duration-150 origin-top select-none"
			role="listbox"
			tabindex="-1"
		>
			<div class="space-y-1 max-h-60 overflow-y-auto overscroll-contain">
				<?php foreach ( $options as $option ) : ?>
					<div
						role="option"
						aria-selected="<?php echo $option['selected'] ? 'true' : 'false'; ?>"
						data-value="<?php echo esc_attr( $option['value'] ); ?>"
						class="vpc-select-option flex items-center justify-between px-3.5 py-2.5 rounded-lg text-base font-medium transition-colors duration-150
						<?php if ( $option['disabled'] ) : ?>
							text-neutral-600 cursor-not-allowed
						<?php elseif ( $option['selected'] ) : ?>
							bg-primary-200 text-text-body-default font-medium cursor-pointer
						<?php else : ?>
							text-text-body-default hover:bg-surface-field-hover cursor-pointer
						<?php endif; ?>"
						<?php echo $option['disabled'] ? 'aria-disabled="true"' : ''; ?>
					>
						<span class="truncate"><?php echo esc_html( $option['label'] ); ?></span>

						<!-- Vector Checkmark on Selected (Figma Board 8: #1A77BA) -->
						<?php if ( $option['selected'] ) : ?>
							<svg class="w-4 h-4 text-primary-500 shrink-0 ml-2 stroke-current fill-none" viewBox="0 0 16 16" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
								<polyline points="3 8.5 6.5 12 13 4"></polyline>
							</svg>
						<?php endif; ?>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>

	<?php if ( $has_error ) : ?>
		<p class="mt-1.5 text-xs text-error-600 flex items-center gap-1 select-none" id="<?php echo esc_attr( $id ); ?>-error">
			<span><?php echo esc_html( $error ); ?></span>
		</p>
	<?php endif; ?>
</div>
