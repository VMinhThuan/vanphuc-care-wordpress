<?php
/**
 * Component: Filter Pill / Tab Pill / Filter Chip
 * Fully conforms to VPC Design System (Figma Component Board handoff).
 *
 * Quy ước:
 * - Trạng thái:
 *   + Default: border-primary-500, bg-transparent (hoặc bg-white/neutral-white), text-neutral-900 (#292929)
 *   + Hover: border-primary-600 (#155F95), text-neutral-900
 *   + Active: bg-primary-500 (#1A77BA), border-primary-500, text-neutral-white (#FAFAFA)
 * - Kích thước:
 *   + 'sm': height 42px, px-4.5 (18px), text-sm (14px), rounded-full
 *   + 'md': height 50px, px-6 (24px), text-base (16px), rounded-full
 * - KHÔNG có Focus ring (dựa theo quy ước thiết kế VPC)
 *
 * @package VanPhucCare
 *
 * Usage:
 * get_template_part('template-parts/components/filter-pill', null, [
 *   'text'        => 'Tại nhà',
 *   'is_active'   => false,
 *   'size'        => 'sm', // sm (42px) | md (50px)
 *   'url'         => '',   // If provided, renders <a>, otherwise <button type="button">
 *   'value'       => '',   // data-value / data-filter attribute
 *   'icon'        => '',   // optional SVG
 *   'class'       => '',
 * ]);
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$text        = $args['text'] ?? '';
$is_active   = ! empty( $args['is_active'] );
$size        = $args['size'] ?? 'sm';
$url         = $args['url'] ?? '';
$value       = $args['value'] ?? '';
$icon        = $args['icon'] ?? '';
$extra_class = $args['class'] ?? '';
$name        = $args['name'] ?? '';

// Base classes: Full pill rounded, no focus ring
$base_classes = 'inline-flex items-center justify-center font-medium rounded-full cursor-pointer transition-colors duration-200 outline-none focus:outline-none focus:ring-0 select-none whitespace-nowrap';

// Size specifications:
// SM: height 42px (Figma row 1: 42px h, 21px radius, ~18px px)
// MD: height 50px (Figma row 2: 50px h, 25px radius, ~24px px)
$size_classes = [
	'sm' => 'h-[42px] px-[18px] text-sm gap-1.5',
	'md' => 'h-[50px] px-6 text-base gap-2',
];
$current_size = $size_classes[ $size ] ?? $size_classes['sm'];

// State classes (Default vs Active)
if ( $is_active ) {
	$state_classes = 'bg-primary-500 border border-primary-500 text-neutral-white shadow-xs';
} else {
	$state_classes = 'bg-transparent border border-primary-500 text-neutral-900 hover:border-primary-600 hover:text-neutral-900';
}

$final_classes = trim( "{$base_classes} {$current_size} {$state_classes} {$extra_class}" );

// Build attributes
$attrs = [];
if ( ! empty( $value ) ) {
	$attrs[] = 'data-value="' . esc_attr( $value ) . '"';
	$attrs[] = 'data-filter="' . esc_attr( $value ) . '"';
}
if ( ! empty( $name ) ) {
	$attrs[] = 'name="' . esc_attr( $name ) . '"';
}
$attrs[] = 'aria-pressed="' . ( $is_active ? 'true' : 'false' ) . '"';
$attr_string = implode( ' ', $attrs );
?>

<?php if ( ! empty( $url ) ) : ?>
	<a href="<?php echo esc_url( $url ); ?>" class="<?php echo esc_attr( $final_classes ); ?>" <?php echo $attr_string; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
		<?php if ( ! empty( $icon ) ) : ?>
			<span class="shrink-0"><?php echo $icon; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
		<?php endif; ?>
		<span><?php echo esc_html( $text ); ?></span>
	</a>
<?php else : ?>
	<button type="button" class="<?php echo esc_attr( $final_classes ); ?>" <?php echo $attr_string; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
		<?php if ( ! empty( $icon ) ) : ?>
			<span class="shrink-0"><?php echo $icon; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
		<?php endif; ?>
		<span><?php echo esc_html( $text ); ?></span>
	</button>
<?php endif; ?>
