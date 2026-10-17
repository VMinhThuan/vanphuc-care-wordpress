<?php
/**
 * Avatar Component for Van Phuc Care.
 * Standardized sizes:
 * - sm / xs: 20px - 24px (w-5 h-5 / w-6 h-6)
 * - md: 40px (w-10 h-10) - Default Figma standard
 * - lg: 48px - 56px (w-12 h-12 / w-14 h-14)
 *
 * @package VanPhucCare
 */

$src    = $args['src'] ?? '';
$alt    = $args['alt'] ?? 'Avatar';
$size   = $args['size'] ?? 'md';
$class  = $args['class'] ?? '';
$border = ! empty( $args['border'] );

$size_classes = array(
	'xs' => 'w-5 h-5 min-w-5 min-h-5 text-xs',
	'sm' => 'w-6 h-6 min-w-6 min-h-6 text-xs',
	'md' => 'w-10 h-10 min-w-10 min-h-10 text-sm',
	'lg' => 'w-12 h-12 min-w-12 min-h-12 text-base',
	'xl' => 'w-14 h-14 min-w-14 min-h-14 text-lg',
);

$size_class   = $size_classes[ $size ] ?? $size_classes['md'];
$border_class = $border ? 'ring-2 ring-white shadow-xs' : '';
?>

<div class="relative inline-flex shrink-0 items-center justify-center rounded-full overflow-hidden bg-neutral-200 <?php echo esc_attr( "{$size_class} {$border_class} {$class}" ); ?>">
	<?php if ( ! empty( $src ) ) : ?>
		<img src="<?php echo esc_url( $src ); ?>" alt="<?php echo esc_attr( $alt ); ?>" class="h-full w-full object-cover rounded-full" loading="lazy">
	<?php else : ?>
		<!-- Default Placeholder Icon when no photo -->
		<svg class="h-3/5 w-3/5 text-neutral-500" fill="currentColor" viewBox="0 0 24 24">
			<path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
		</svg>
	<?php endif; ?>
</div>
