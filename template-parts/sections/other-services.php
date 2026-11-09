<?php
/**
 * Shared "Các Dịch Vụ Khác" carousel.
 *
 * @package VanPhucCare
 *
 * @var array<string, mixed> $args Template-part arguments.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$services    = isset( $args['services'] ) && is_array( $args['services'] ) ? $args['services'] : array();
$asset_uri   = isset( $args['asset_uri'] ) ? trailingslashit( (string) $args['asset_uri'] ) : '';
$section_id  = isset( $args['section_id'] ) ? sanitize_html_class( (string) $args['section_id'] ) : 'other-services-title';
$viewport_id = isset( $args['viewport_id'] ) ? sanitize_html_class( (string) $args['viewport_id'] ) : 'other-services-viewport';

if ( '' === $asset_uri || empty( $services ) ) {
	return;
}
?>
<section class="vpc-bao-mau__services" aria-labelledby="<?php echo esc_attr( $section_id ); ?>">
	<div class="vpc-bao-mau__container">
		<div class="vpc-bao-mau__section-heading">
			<h2 id="<?php echo esc_attr( $section_id ); ?>"><span><?php esc_html_e( 'Các Dịch Vụ Khác', 'vanphuccare' ); ?></span></h2>
		</div>
		<div class="vpc-bao-mau__services-carousel">
			<button class="vpc-bao-mau__services-arrow vpc-bao-mau__services-arrow--prev" type="button" aria-label="<?php esc_attr_e( 'Dịch vụ trước', 'vanphuccare' ); ?>" aria-controls="<?php echo esc_attr( $viewport_id ); ?>">
				<img src="<?php echo esc_url( $asset_uri . 'chevron-left.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true">
			</button>
			<div id="<?php echo esc_attr( $viewport_id ); ?>" class="vpc-bao-mau__services-viewport">
				<div class="vpc-bao-mau__services-track">
					<?php foreach ( $services as $service ) : ?>
						<?php
						$service_image = isset( $service['image'] ) ? (string) $service['image'] : '';
						$service_title = isset( $service['title'] ) ? (string) $service['title'] : '';
						$service_href  = isset( $service['href'] ) ? (string) $service['href'] : '';

						if ( '' === $service_image || '' === $service_title || '' === $service_href ) {
							continue;
						}
						?>
						<a class="vpc-bao-mau__service-card" href="<?php echo esc_url( $service_href ); ?>">
							<img src="<?php echo esc_url( $asset_uri . $service_image ); ?>" width="300" height="240" alt="<?php echo esc_attr( $service_title ); ?>" loading="lazy">
							<h3><?php echo esc_html( $service_title ); ?></h3>
						</a>
					<?php endforeach; ?>
				</div>
			</div>
			<button class="vpc-bao-mau__services-arrow vpc-bao-mau__services-arrow--next" type="button" aria-label="<?php esc_attr_e( 'Dịch vụ tiếp theo', 'vanphuccare' ); ?>" aria-controls="<?php echo esc_attr( $viewport_id ); ?>">
				<img src="<?php echo esc_url( $asset_uri . 'chevron-left.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true">
			</button>
		</div>
	</div>
</section>
