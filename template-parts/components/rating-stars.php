<?php
/**
 * Reusable five-star rating icon group.
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$rating = isset( $args['rating'] ) ? (int) $args['rating'] : 5;
$rating = max( 0, min( 5, $rating ) );
$label  = sprintf( '%d trên 5 sao', $rating );
?>
<span class="inline-flex items-center gap-1 text-primary-500" role="img" aria-label="<?php echo esc_attr( $label ); ?>">
	<?php for ( $star = 0; $star < 5; $star++ ) : ?>
		<svg width="15" height="15" viewBox="0 0 24 24" aria-hidden="true" class="w-3.5 h-3.5 shrink-0 fill-current"><path d="M14.916 9.6L12 0L9.084 9.6H0L7.416 14.892L4.596 24L12 18.372L19.416 24L16.596 14.892L24 9.6H14.916Z"/></svg>
	<?php endfor; ?>
</span>
