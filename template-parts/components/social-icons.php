<?php
/**
 * Social Icons Component for Van Phuc Care.
 * Renders verified SVG icons (Facebook, TikTok, YouTube, Zalo, Messenger, Hotline).
 *
 * @package VanPhucCare
 */

$icons_dir  = get_template_directory_uri() . '/assets/icons';
$size       = $args['size'] ?? 'md'; // sm: 28px, md: 36px, lg: 44px
$class      = $args['class'] ?? '';
$show_label = ! empty( $args['show_label'] );

$dim_classes = array(
	'sm' => 'w-7 h-7 min-w-7 min-h-7',
	'md' => 'w-9 h-9 min-w-9 min-h-9',
	'lg' => 'w-11 h-11 min-w-11 min-h-11',
);
$dim = $dim_classes[ $size ] ?? $dim_classes['md'];

$channels = array(
	array(
		'name'  => 'Hotline',
		'url'   => 'tel:0908093198',
		'file'  => 'phone.svg',
		'color' => '#20DF40',
	),
	array(
		'name'  => 'Zalo',
		'url'   => 'https://zalo.me/0908093198',
		'file'  => 'zalo.svg',
		'color' => '#0068FF',
	),
	array(
		'name'  => 'Messenger',
		'url'   => 'https://m.me/vanphuccare',
		'file'  => 'messenger.svg',
		'color' => '#007FFF',
	),
	array(
		'name'  => 'Facebook',
		'url'   => 'https://facebook.com/vanphuccare',
		'file'  => 'facebook.svg',
		'color' => '#1877F2',
	),
	array(
		'name'  => 'TikTok',
		'url'   => 'https://tiktok.com/@vanphuccare',
		'file'  => 'tiktok.svg',
		'color' => '#000000',
	),
	array(
		'name'  => 'YouTube',
		'url'   => 'https://youtube.com/@vanphuccare',
		'file'  => 'youtube.svg',
		'color' => '#FF0000',
	),
);
?>

<div class="flex items-center gap-2 sm:gap-2.5 <?php echo esc_attr( $class ); ?>">
	<?php foreach ( $channels as $ch ) : ?>
		<a href="<?php echo esc_url( $ch['url'] ); ?>" 
		   target="_blank" 
		   rel="noopener noreferrer" 
		   class="group relative inline-flex items-center justify-center rounded-full transition-transform duration-200 hover:-translate-y-0.5 hover:shadow-md active:translate-y-0 <?php echo esc_attr( $dim ); ?>" 
		   title="<?php echo esc_attr( $ch['name'] ); ?>" 
		   aria-label="<?php echo esc_attr( $ch['name'] ); ?>">
			<img src="<?php echo esc_url( "{$icons_dir}/{$ch['file']}" ); ?>" 
			     alt="<?php echo esc_attr( $ch['name'] ); ?>" 
			     class="w-full h-full object-contain rounded-full">
		</a>
	<?php endforeach; ?>
</div>
