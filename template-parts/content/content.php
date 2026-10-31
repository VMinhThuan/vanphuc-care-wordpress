<?php
/**
 * Default content template part.
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_singular() ) {
			the_title( '<h1 class="entry-title">', '</h1>' );
		} else {
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		}
		?>
	</header>

	<?php if ( has_post_thumbnail() ) : ?>
		<div class="entry-thumbnail">
			<?php
			if ( is_singular() ) {
				the_post_thumbnail( 'large', array( 'loading' => 'eager' ) );
			} else {
				printf( '<a href="%s" rel="bookmark">', esc_url( get_permalink() ) );
				the_post_thumbnail( 'medium_large' );
				echo '</a>';
			}
			?>
		</div>
	<?php endif; ?>

	<div class="entry-content">
		<?php
		if ( is_singular() ) {
			the_content();
		} else {
			the_excerpt();
		}
		?>
	</div>

	<?php if ( is_singular() ) : ?>
		<?php wp_link_pages( array( 'before' => '<nav class="page-links">' . esc_html__( 'Trang:', 'vanphuccare' ), 'after' => '</nav>' ) ); ?>
	<?php endif; ?>
</article>
