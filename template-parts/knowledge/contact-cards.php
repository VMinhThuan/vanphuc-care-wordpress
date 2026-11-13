<?php
/**
 * Shared Knowledge contact cards.
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$knowledge_uri = get_template_directory_uri() . '/assets/images/knowledge';
$asset = static function ( $name ) use ( $knowledge_uri ) {
	return esc_url( $knowledge_uri . '/' . $name );
};

// 3. Promo banner settings from Customizer.
$banner_enabled = (bool) get_theme_mod( 'vpc_kb_banner_enable', true );
$banner_image   = (string) get_theme_mod( 'vpc_kb_banner_image', '' );
$banner_url     = (string) get_theme_mod( 'vpc_kb_banner_url', 'https://edu.vanphuccare.vn' );
$banner_alt     = (string) get_theme_mod( 'vpc_kb_banner_alt', 'Bé ăn ngon - ngủ xuyên đêm' );
$banner_new_tab = (bool) get_theme_mod( 'vpc_kb_banner_new_tab', true );

if ( empty( $banner_image ) ) {
	$banner_image = $asset( 'mang-thai-banner.png' );
}
if ( empty( $banner_url ) ) {
	$banner_url = 'https://edu.vanphuccare.vn';
}
if ( empty( $banner_alt ) ) {
	$banner_alt = 'Bé ăn ngon - ngủ xuyên đêm';
}

// 4. Hotline number from Customizer.
$hotline_display = (string) get_theme_mod( 'vpc_hotline_ho_tro', '037 624 6673' );
$hotline_tel     = preg_replace( '/[^0-9+]/', '', $hotline_display );
if ( empty( $hotline_tel ) ) {
	$hotline_tel = '0376246673';
}
?>
<!-- 4. Promo Banner Widget -->
<?php if ( $banner_enabled ) : ?>
	<div class="vpc-knowledge-widget vpc-knowledge-widget--banner">
		<a class="vpc-knowledge-banner-card" href="<?php echo esc_url( $banner_url ); ?>"<?php echo $banner_new_tab ? ' target="_blank" rel="noopener noreferrer"' : ''; ?>>
			<img src="<?php echo esc_url( $banner_image ); ?>" alt="<?php echo esc_attr( $banner_alt ); ?>" width="365" height="411" loading="lazy">
		</a>
	</div>
<?php endif; ?>

<!-- 5. Hotline Widget -->
<div class="vpc-knowledge-widget vpc-knowledge-widget--hotline">
	<div class="vpc-knowledge-hotline-card">
		<div class="vpc-knowledge-hotline-image">
			<img src="<?php echo $asset( 'mang-thai-hotline.png' ); ?>" alt="<?php esc_attr_e( 'Tư vấn Vạn Phúc Care', 'vanphuccare' ); ?>" width="341" height="200" loading="lazy">
		</div>
		<div class="vpc-knowledge-hotline-body">
			<div class="vpc-knowledge-hotline-heading">
				<img src="<?php echo $asset( 'mang-thai-hotline-icon.svg' ); ?>" alt="" width="24" height="24" aria-hidden="true">
				<div><span class="vpc-knowledge-hotline-label"><?php esc_html_e( 'Hotline', 'vanphuccare' ); ?></span><a class="vpc-knowledge-hotline-number" href="tel:<?php echo esc_attr( $hotline_tel ); ?>"><?php echo esc_html( $hotline_display ); ?></a></div>
			</div>
			<p><?php esc_html_e( 'Liên hệ ngay để được tư vấn trực tiếp cùng các cô Điều dưỡng của Vạn Phúc Care ba mẹ nhé!', 'vanphuccare' ); ?></p>
			<a class="vpc-knowledge-hotline-btn" href="<?php echo esc_url( home_url( '/lien-he/' ) ); ?>"><?php esc_html_e( 'Đăng Ký Tư Vấn', 'vanphuccare' ); ?></a>
		</div>
	</div>
</div>
