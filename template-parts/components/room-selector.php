<?php
/**
 * Reusable room selector for the postpartum care pages.
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$rooms              = isset( $args['rooms'] ) ? $args['rooms'] : array();
$room_popup_details = isset( $args['room_popup_details'] ) ? $args['room_popup_details'] : array();
$asset_uri          = isset( $args['asset_uri'] ) ? $args['asset_uri'] : '';
$button_attrs       = isset( $args['button_attrs'] ) ? $args['button_attrs'] : '';

if ( empty( $rooms ) ) {
	return;
}
?>
<div class="ocu-room-selector" data-room-selector>
	<div class="ocu-room-tabs" role="tablist" aria-label="Chọn hạng phòng">
		<?php foreach ( $rooms as $room_key => $room ) : ?>
			<button type="button" class="<?php echo 'standard' === $room_key ? 'is-active' : ''; ?>" role="tab" aria-selected="<?php echo 'standard' === $room_key ? 'true' : 'false'; ?>" aria-controls="ocu-room-panel-<?php echo esc_attr( $room_key ); ?>" data-room-tab="<?php echo esc_attr( $room_key ); ?>"><?php echo esc_html( ucfirst( $room_key ) ); ?></button>
		<?php endforeach; ?>
	</div>

	<div class="ocu-room-panels">
		<?php foreach ( $rooms as $room_key => $room ) :
			$detail         = isset( $room_popup_details[ $room_key ] ) ? $room_popup_details[ $room_key ] : array();
			$gallery_images = isset( $detail['images'] ) ? $detail['images'] : array( $asset_uri . '/' . $room['image'] );
			$features       = isset( $room['items'] ) ? $room['items'] : array();
			$mother         = isset( $detail['mother'] ) ? $detail['mother'] : array();
			$baby           = isset( $detail['baby'] ) ? $detail['baby'] : array();
			$amenities      = isset( $detail['amenities'] ) ? $detail['amenities'] : array();
			?>
			<article id="ocu-room-panel-<?php echo esc_attr( $room_key ); ?>" class="ocu-room-panel<?php echo 'standard' === $room_key ? ' is-active' : ''; ?>" role="tabpanel" aria-hidden="<?php echo 'standard' === $room_key ? 'false' : 'true'; ?>" data-room-panel="<?php echo esc_attr( $room_key ); ?>">
				<div class="ocu-room-panel__header">
					<div>
						<span><?php echo esc_html( $detail['level'] ?? $room['level'] ); ?></span>
						<h3><?php echo esc_html( $detail['title'] ?? $room['title'] ); ?></h3>
					</div>
				</div>

				<?php if ( 'suite' !== $room_key ) : ?>
					<div class="ocu-room-panel__variants" role="group" aria-label="Kiểu phòng">
						<?php foreach ( ( isset( $detail['tabs'] ) ? $detail['tabs'] : array() ) as $variant_index => $variant ) : ?>
							<button type="button" class="<?php echo 0 === $variant_index ? 'is-active' : ''; ?>" data-room-panel-variant><?php echo esc_html( $variant ); ?></button>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>

				<div class="ocu-room-panel__gallery" data-room-gallery data-gallery-images="<?php echo esc_attr( wp_json_encode( $gallery_images ) ); ?>">
					<div class="ocu-room-panel__main-image">
						<img data-room-gallery-main src="<?php echo esc_url( $gallery_images[0] ?? $asset_uri . '/' . $room['image'] ); ?>" width="480" height="407" alt="<?php echo esc_attr( $room['title'] ); ?>">
						<span data-room-gallery-counter>1 / <?php echo count( $gallery_images ); ?></span>
					</div>
					<div class="ocu-room-panel__thumbs" role="list" aria-label="Ảnh <?php echo esc_attr( $room['title'] ); ?>">
						<?php foreach ( $gallery_images as $image_index => $image ) : ?>
							<button type="button" class="<?php echo 0 === $image_index ? 'is-active' : ''; ?>" data-room-gallery-thumb="<?php echo esc_attr( $image_index ); ?>" aria-label="Xem ảnh <?php echo esc_attr( $image_index + 1 ); ?>"><img src="<?php echo esc_url( $image ); ?>" width="96" height="60" alt=""></button>
						<?php endforeach; ?>
					</div>
				</div>

				<p class="ocu-room-panel__description"><?php echo esc_html( $detail['description'] ?? $room['copy'] ); ?></p>
				<ul class="ocu-room-panel__features">
					<?php foreach ( $features as $feature ) : ?>
						<li><?php echo esc_html( $feature ); ?></li>
					<?php endforeach; ?>
				</ul>

				<div class="ocu-room-panel__amenities">
					<?php
					$accordion_groups = array(
						array( 'label' => 'Dành cho mẹ', 'items' => $mother, 'open' => true ),
						array( 'label' => 'Dành cho bé', 'items' => $baby, 'open' => false ),
						array( 'label' => 'Phòng & tiện nghi', 'items' => $amenities, 'open' => false ),
					);
					foreach ( $accordion_groups as $accordion_index => $group ) :
						$region_id = 'ocu-room-' . $room_key . '-amenity-' . $accordion_index;
						?>
						<div class="ocu-room-accordion<?php echo $group['open'] ? ' is-open' : ''; ?>" data-room-accordion>
							<button type="button" data-room-accordion-toggle aria-expanded="<?php echo $group['open'] ? 'true' : 'false'; ?>" aria-controls="<?php echo esc_attr( $region_id ); ?>"><span><?php echo esc_html( $group['label'] ); ?></span><span aria-hidden="true"></span></button>
							<div id="<?php echo esc_attr( $region_id ); ?>" class="ocu-room-accordion__content" role="region"<?php echo $group['open'] ? '' : ' hidden'; ?>><ul><?php foreach ( $group['items'] as $item ) : ?><li><?php echo esc_html( $item ); ?></li><?php endforeach; ?></ul></div>
						</div>
					<?php endforeach; ?>
				</div>

				<button type="button" class="ocu-button ocu-button--primary ocu-room-panel__consult" <?php echo $button_attrs; ?>>Nhận tư vấn phòng này</button>
			</article>
		<?php endforeach; ?>
	</div>
</div>
