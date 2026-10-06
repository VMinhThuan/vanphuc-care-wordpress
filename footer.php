<?php
/**
 * Site footer.
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
</main>
<footer class="site-footer">
	<?php
	wp_nav_menu(
		array(
			'theme_location'      => 'footer',
			'container'           => 'nav',
			'container_class'     => 'footer-navigation',
			'container_aria_label' => esc_attr__( 'Footer navigation', 'vanphuccare' ),
			'fallback_cb'         => false,
		)
	);
	?>
</footer>
<?php wp_footer(); ?>
</body>
</html>
