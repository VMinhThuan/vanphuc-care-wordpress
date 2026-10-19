<?php
/**
 * Component: Button & Text-Link
 * Fully conforms to VPC Design System (12.10.2026 / 16.10.2026 handoff).
 *
 * Quy ước:
 * - Desktop: size 'md'
 * - Mobile: size 'sm'
 * - lg: thiết kế tham khảo
 * - Trạng thái: default, hover, pressed (active), disabled, loading
 * - KHÔNG có Focus ring (dựa theo thiết kế)
 *
 * @package VanPhucCare
 *
 * Usage:
 * get_template_part('template-parts/components/button', null, [
 *   'text'        => 'Liên hệ ngay',
 *   'url'         => '#contact',
 *   'variant'     => 'primary', // primary | secondary | outline-primary | outline-secondary | ghost | text-link
 *   'size'        => 'md',      // sm | md | lg
 *   'icon_left'   => '',        // optional raw svg or icon path
 *   'icon_right'  => '',        // optional raw svg
 *   'is_loading'  => false,
 *   'is_disabled' => false,
 *   'class'       => '',
 *   'type'        => 'button',  // 'button' | 'submit' (only when url is empty)
 * ]);
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$text        = $args['text'] ?? 'Button';
$url         = $args['url'] ?? '';
$variant     = $args['variant'] ?? 'primary';
$size        = $args['size'] ?? 'md';
$icon_left   = $args['icon_left'] ?? '';
$icon_right  = $args['icon_right'] ?? '';
$is_loading  = ! empty( $args['is_loading'] );
$is_disabled = ! empty( $args['is_disabled'] );
$extra_class = $args['class'] ?? '';
$type        = $args['type'] ?? 'button';

// Base: Focus ring when tabbing
$base_classes = 'inline-flex items-center justify-center font-medium transition-all duration-200 focus-visible:ring-2 focus-visible:ring-border-focus-default select-none';

// Size styles (SM = 32px, MD = 48px, LG = 64px matching Figma)
$size_classes = [
	'sm' => 'h-8 px-4 text-sm gap-1.5 rounded-full',
	'md' => 'h-10 sm:h-12 px-5 sm:px-6 text-base gap-2 rounded-full',
	'lg' => 'h-14 sm:h-16 px-7 sm:px-8 text-base sm:text-lg gap-2.5 rounded-full',
];
$current_size = $size_classes[ $size ] ?? $size_classes['md'];

// Variant styles (Matching Figma 1:1)
$variant_classes = [
	'primary'           => 'bg-surface-button-primary-default text-text-inverse-default hover:bg-surface-button-primary-hover active:bg-surface-button-primary-pressed',
	'secondary'         => 'bg-surface-button-secondary-default text-text-inverse-default hover:bg-surface-button-secondary-hover active:bg-surface-button-secondary-pressed',
	'outline-primary'   => 'bg-transparent border border-primary-500 text-primary-500 hover:border-primary-600 hover:text-primary-600 hover:bg-primary-100/40 active:border-primary-700 active:text-primary-700',
	'outline-secondary' => 'bg-transparent border border-secondary-500 text-secondary-500 hover:border-secondary-600 hover:text-secondary-600 hover:bg-secondary-100/40 active:border-secondary-700 active:text-secondary-700',
	'filter-pill'        => 'bg-transparent border border-primary-500 text-neutral-900 hover:border-primary-600 hover:text-neutral-900',
	'filter-pill-active' => 'bg-primary-500 border border-primary-500 text-neutral-white',
	'ghost'             => 'bg-transparent text-neutral-900 hover:bg-neutral-200 active:bg-neutral-300',
	'text-link'         => 'p-0 text-text-link-default hover:text-text-link-hover active:text-text-link-pressed underline underline-offset-4',
];

if ( 'text-link' === $variant ) {
	$current_size = 'text-base gap-1.5';
}

$current_variant = $variant_classes[ $variant ] ?? $variant_classes['primary'];

// States: Disabled & Loading
$state_classes = '';
if ( $is_disabled ) {
	$state_classes = 'cursor-not-allowed pointer-events-none';
	if ( 'primary' === $variant ) {
		$current_variant = 'bg-surface-button-primary-disabled text-text-inverse-default cursor-not-allowed';
	} elseif ( 'secondary' === $variant ) {
		$current_variant = 'bg-surface-button-secondary-disabled text-text-inverse-default cursor-not-allowed';
	} elseif ( 'outline-primary' === $variant || 'outline-secondary' === $variant ) {
		$current_variant = 'bg-transparent border border-neutral-600 text-neutral-700 cursor-not-allowed';
	} elseif ( 'text-link' === $variant ) {
		$current_variant = 'p-0 text-text-link-disabled cursor-not-allowed no-underline';
	}
}

$raw_attrs = '';
if ( ! empty( $args['data_attrs'] ) ) {
	if ( is_array( $args['data_attrs'] ) ) {
		foreach ( $args['data_attrs'] as $k => $v ) {
			$raw_attrs .= ' ' . esc_attr( $k ) . '="' . esc_attr( $v ) . '"';
		}
	} else {
		$raw_attrs .= ' ' . $args['data_attrs'];
	}
}

$final_classes = trim( "{$base_classes} {$current_size} {$current_variant} {$state_classes} {$extra_class}" );
?>

<?php if ( ! empty( $url ) && ! $is_disabled ) : ?>
	<a href="<?php echo esc_url( $url ); ?>" class="<?php echo esc_attr( $final_classes ); ?>" <?php echo $is_loading ? 'aria-busy="true"' : ''; ?><?php echo $raw_attrs; // phpcs:ignore ?>>
		<?php if ( $is_loading ) : ?>
			<svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
				<circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
				<path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
			</svg>
		<?php elseif ( ! empty( $icon_left ) ) : ?>
			<span class="shrink-0"><?php echo $icon_left; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
		<?php endif; ?>

		<span><?php echo esc_html( $text ); ?></span>

		<?php if ( ! empty( $icon_right ) && ! $is_loading ) : ?>
			<span class="shrink-0"><?php echo $icon_right; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
		<?php endif; ?>
	</a>
<?php else : ?>
	<button type="<?php echo esc_attr( $type ); ?>" class="<?php echo esc_attr( $final_classes ); ?>" <?php echo $is_disabled ? 'disabled' : ''; ?> <?php echo $is_loading ? 'aria-busy="true"' : ''; ?><?php echo $raw_attrs; // phpcs:ignore ?>>
		<?php if ( $is_loading ) : ?>
			<svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
				<circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
				<path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
			</svg>
		<?php elseif ( ! empty( $icon_left ) ) : ?>
			<span class="shrink-0"><?php echo $icon_left; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
		<?php endif; ?>

		<span><?php echo esc_html( $text ); ?></span>

		<?php if ( ! empty( $icon_right ) && ! $is_loading ) : ?>
			<span class="shrink-0"><?php echo $icon_right; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
		<?php endif; ?>
	</button>
<?php endif; ?>
