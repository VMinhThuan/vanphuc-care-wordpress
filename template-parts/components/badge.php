<?php
/**
 * Component: Badge
 * Fully conforms to VPC Design System (12.10.2026 / 16.10.2026 handoff).
 *
 * @package VanPhucCare
 *
 * Usage:
 * get_template_part('template-parts/components/badge', null, [
 *   'text'      => 'Đang hoạt động',
 *   'variant'   => 'success', // success | warning | error | info | secondary | neutral | primary
 *   'size'      => 'sm',      // xs | sm | md
 *   'icon'      => '',        // optional raw svg
 *   'class'     => '',
 * ]);
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$text        = $args['text'] ?? '';
$variant     = $args['variant'] ?? 'neutral';
$size        = $args['size'] ?? 'sm';
$icon        = $args['icon'] ?? '';
$extra_class = $args['class'] ?? '';

$base_classes = 'inline-flex items-center font-medium rounded-full select-none';

$size_classes = [
	'xs'    => 'text-xs px-2 py-0.5 gap-1',
	'sm'    => 'text-xs sm:text-sm px-2.5 py-1 gap-1.5',
	'md'    => 'text-sm px-3.5 py-1.5 gap-2',
	'brand' => 'text-xs sm:text-sm font-semibold tracking-wider px-4 sm:px-5 py-2 sm:py-2.5 gap-2 uppercase',
];
$current_size = $size_classes[ $size ] ?? ( 'brand' === $variant ? $size_classes['brand'] : $size_classes['sm'] );

$variant_classes = [
	'success'   => 'bg-surface-success-default text-text-success-default border border-border-success-light/40',
	'warning'   => 'bg-surface-warning-default text-text-warning-default border border-border-warning-light/40',
	'error'     => 'bg-surface-error-default text-text-error-default border border-border-error-light/40',
	'info'      => 'bg-surface-info-default text-text-info-default border border-border-info-light/40',
	'secondary' => 'bg-surface-badge-secondary text-text-caption-default border border-border-secondary-light/40',
	'primary'   => 'bg-primary-100 text-primary-700 border border-primary-200',
	'neutral'   => 'bg-neutral-200 text-neutral-800 border border-neutral-300',
	'brand'     => 'bg-secondary-100 text-primary-700 border border-secondary-400 shadow-xs',
];
$current_variant = $variant_classes[ $variant ] ?? $variant_classes['neutral'];

if ( empty( $icon ) && 'brand' === $variant ) {
	$icon = '<svg class="w-5 h-5 text-secondary-400 shrink-0" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g transform="translate(-133, -121)"><path d="M139.369 137.626C139.656 137.339 140.123 137.339 140.411 137.626C140.698 137.914 140.698 138.381 140.411 138.669L138.953 140.126C138.666 140.414 138.198 140.414 137.911 140.126C137.623 139.839 137.623 139.372 137.911 139.084L139.369 137.626ZM149.589 137.626C149.876 137.339 150.343 137.339 150.63 137.626L152.089 139.084C152.376 139.372 152.376 139.839 152.089 140.126C151.801 140.414 151.335 140.414 151.047 140.126L149.589 138.669C149.301 138.381 149.301 137.914 149.589 137.626ZM137.911 125.95C138.198 125.662 138.666 125.662 138.953 125.95L140.411 127.408C140.698 127.696 140.698 128.162 140.411 128.45C140.123 128.738 139.657 128.738 139.369 128.45L137.911 126.993C137.623 126.705 137.623 126.238 137.911 125.95ZM151.047 125.95C151.335 125.663 151.801 125.662 152.089 125.95C152.376 126.238 152.376 126.705 152.089 126.993L150.63 128.45C150.343 128.738 149.876 128.738 149.589 128.45C149.301 128.162 149.301 127.696 149.589 127.408L151.047 125.95Z" fill="currentColor"/><path d="M153.772 133.655C153.366 133.66 153.031 133.335 153.026 132.928C153.02 132.522 153.346 132.187 153.753 132.181L156.253 132.147C156.66 132.141 156.994 132.467 157 132.874C157.005 133.281 156.68 133.615 156.273 133.621L153.772 133.655ZM144.889 125.013C144.483 125.019 144.148 124.693 144.143 124.287L144.109 121.787C144.104 121.38 144.429 121.046 144.836 121.04C145.242 121.035 145.577 121.36 145.582 121.767L145.617 124.266C145.622 124.673 145.296 125.008 144.889 125.013ZM133.747 133.929C133.34 133.935 133.006 133.61 133 133.203C132.994 132.796 133.32 132.462 133.727 132.456L136.226 132.422C136.633 132.416 136.968 132.741 136.973 133.148C136.979 133.555 136.653 133.889 136.247 133.895L133.747 133.929ZM144.855 144.96C144.448 144.965 144.114 144.64 144.108 144.233L144.075 141.733C144.069 141.326 144.394 140.992 144.801 140.986C145.208 140.981 145.543 141.306 145.548 141.713L145.582 144.212C145.588 144.619 145.262 144.954 144.855 144.96Z" fill="currentColor"/><path d="M144.273 139.277C144.471 139.723 145.104 139.725 145.306 139.281L147.075 135.385C147.132 135.26 147.232 135.16 147.357 135.103L151.233 133.354C151.677 133.153 151.677 132.523 151.233 132.322L147.357 130.573C147.232 130.516 147.132 130.416 147.075 130.291L145.306 126.395C145.104 125.951 144.471 125.953 144.273 126.399L142.545 130.287C142.488 130.415 142.386 130.517 142.259 130.574L138.35 132.321C137.903 132.521 137.903 133.155 138.35 133.355L142.259 135.102C142.386 135.159 142.488 135.262 142.545 135.389L144.273 139.277Z" fill="currentColor"/></g></svg>';
}

$final_classes = trim( "{$base_classes} {$current_size} {$current_variant} {$extra_class}" );
?>

<span class="<?php echo esc_attr( $final_classes ); ?>">
	<?php if ( ! empty( $icon ) ) : ?>
		<span class="shrink-0"><?php echo $icon; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
	<?php endif; ?>
	<span><?php echo esc_html( $text ); ?></span>
</span>
