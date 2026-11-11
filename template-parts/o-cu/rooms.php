<?php
/**
 * O Cu - Rooms & Spaces Section.
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$asset_uri = trailingslashit( get_template_directory_uri() ) . 'assets/images/o-cu';
$button_attrs = 'data-open-modal="vpc-consultation-modal" data-service="trung-tam-o-cu"';

if ( ! function_exists( 'vpc_o_cu_get_room_image_set' ) ) {
	/**
	 * Get the room images from one of the supplied room folders.
	 *
	 * @param string $folder Folder name inside assets/images/o-cu.
	 * @return array{paths: array<int, string>, urls: array<int, string>}
	 */
	function vpc_o_cu_get_room_image_set( $folder ) {
		$relative_directory = 'assets/images/o-cu/' . $folder;
		$directory          = trailingslashit( get_template_directory() ) . $relative_directory;
		$files              = array();

		if ( is_dir( $directory ) ) {
			$directory_files = glob( trailingslashit( $directory ) . '*' );
			foreach ( $directory_files ? $directory_files : array() as $file ) {
				if ( is_file( $file ) && preg_match( '/\.(?:jpe?g|png|webp|gif)$/i', $file ) ) {
					$files[] = $file;
				}
			}
		}

		usort(
			$files,
			function ( $left, $right ) {
				return strnatcasecmp( basename( $left ), basename( $right ) );
			}
		);

		$paths = array();
		$urls  = array();
		foreach ( $files as $file ) {
			$relative_file = str_replace( trailingslashit( get_template_directory() ), '', $file );
			$url_parts     = array_map( 'rawurlencode', explode( '/', $relative_file ) );

			$paths[] = substr( $relative_file, strlen( 'assets/images/o-cu/' ) );
			$urls[]  = trailingslashit( get_template_directory_uri() ) . implode( '/', $url_parts );
		}

		return array(
			'paths' => $paths,
			'urls'  => $urls,
		);
	}
}

$room_image_sets = array(
	'standard_balcony' => vpc_o_cu_get_room_image_set( 'Phòng Standard Balcony' ),
	'standard_cozy'    => vpc_o_cu_get_room_image_set( 'Phòng Standard Cozy' ),
	'deluxe_premium'   => vpc_o_cu_get_room_image_set( 'Phòng Deluxe Premium' ),
	'deluxe_classic'   => vpc_o_cu_get_room_image_set( 'Phòng Deluxe Classic' ),
	'suite'            => vpc_o_cu_get_room_image_set( 'Phòng Suite' ),
);

$standard_images       = ! empty( $room_image_sets['standard_balcony']['urls'] ) ? $room_image_sets['standard_balcony']['urls'] : array( $asset_uri . '/figma/room-standard.png' );
$standard_cozy_images  = ! empty( $room_image_sets['standard_cozy']['urls'] ) ? $room_image_sets['standard_cozy']['urls'] : $standard_images;
$deluxe_images         = ! empty( $room_image_sets['deluxe_premium']['urls'] ) ? $room_image_sets['deluxe_premium']['urls'] : array( $asset_uri . '/figma/room-deluxe.png' );
$deluxe_classic_images = ! empty( $room_image_sets['deluxe_classic']['urls'] ) ? $room_image_sets['deluxe_classic']['urls'] : $deluxe_images;
$suite_images          = ! empty( $room_image_sets['suite']['urls'] ) ? $room_image_sets['suite']['urls'] : array( $asset_uri . '/figma/room-suite.png' );

$room_popup_details = array(
	'standard' => array(
		'level'       => 'Tiêu chuẩn',
		'title'       => 'Standard - 30m²',
		'description' => 'Gọn gàng và đầy đủ cho mẹ ưu tiên một hành trình hồi phục nhẹ nhàng',
		'tabs'        => array( 'Standard Balcony', 'Standard Cozy' ),
		'images'      => $standard_images,
		'variant_images' => array( $standard_images, $standard_cozy_images ),
		'mother'      => array( 'Bữa ăn dinh dưỡng: 3 chính + 1 phụ', 'Massage kích sữa: 15 phút', 'Hướng dẫn nuôi con: 3 ngày/lần', 'Massage đẩy sản dịch: 3 ngày/lần', 'Xông hơi thảo dược: tối đa 5 lần' ),
		'baby'        => array( 'Phòng dưỡng nhi trực 24/24', 'Tắm, massage & chăm sóc rốn', 'Quấn áo 1 bộ + 3 miếng bỉm' ),
		'amenities'   => array( 'Điều hòa, Smart TV, tủ lạnh, Wifi', 'Ban công thoáng sáng', 'Xe đưa đón 2 chiều (dưới 30km)' ),
	),
	'deluxe' => array(
		'level'       => 'Cao cấp',
		'title'       => 'Deluxe - 42m²',
		'description' => 'Rộng rãi để mẹ nghỉ ngơi thoải mái và gia đình đồng hành thân thiện',
		'tabs'        => array( 'Deluxe Premium', 'Deluxe Classic' ),
		'images'      => $deluxe_images,
		'variant_images' => array( $deluxe_images, $deluxe_classic_images ),
		'mother'      => array( 'Bữa ăn dinh dưỡng: 3 chính + 1 phụ', 'Massage kích sữa: 15 phút', 'Hướng dẫn nuôi con: 3 ngày/lần', 'Massage đẩy sản dịch: 3 ngày/lần', 'Xông hơi thảo dược: tối đa 5 lần' ),
		'baby'        => array( 'Phòng dưỡng nhi trực 24/24', 'Tắm, massage & chăm sóc rốn', 'Quấn áo 1 bộ + 3 miếng bỉm' ),
		'amenities'   => array( 'Điều hòa, Smart TV, tủ lạnh, Wifi', 'Phòng vệ sinh riêng & khu tiếp khách', 'Xe đưa đón 2 chiều (dưới 30km)' ),
	),
	'suite' => array(
		'level'       => 'Sang trọng',
		'title'       => 'Suite - 76m²',
		'description' => 'Như 1 căn hộ thu nhỏ, tách biệt các khoảng nghỉ, làm việc và sum vầy',
		'images'      => $suite_images,
		'mother'      => array( 'Bữa ăn dinh dưỡng: 3 chính + 2 phụ', 'Massage kích sữa: 30 phút', 'Hướng dẫn nuôi con: hàng ngày', 'Massage đẩy sản dịch: hàng ngày', 'Xông hơi thảo dược: tối đa 5 lần' ),
		'baby'        => array( 'Phòng dưỡng nhi trực 24/24', 'Tắm, massage & chăm sóc rốn', 'Quấn áo 1 bộ + 5 miếng bỉm' ),
		'amenities'   => array( 'Điều hòa, máy chiếu, tủ lạnh, Wifi', 'Phòng nghỉ riêng, sofa, ban công', 'Bếp riêng & bàn làm việc', 'Xe đưa đón 2 chiều (dưới 30km)' ),
	),
);

$rooms = array(
	'standard' => array( 'image' => $room_image_sets['standard_balcony']['paths'][0] ?? 'figma/room-standard.png', 'level' => 'Tiêu chuẩn', 'number' => '01', 'title' => 'Standard - 30m²', 'copy' => 'Gọn gàng và đầy đủ cho mẹ ưu tiên một hành trình hồi phục nhẹ nhàng.', 'items' => array( 'Chăm sóc mẹ và bé hằng ngày', 'Giường lớn và phòng dưỡng nhi', 'Ban công thoáng sáng' ), 'chips' => array( 'Điều dưỡng trực 24/7', 'Nuôi con bằng sữa mẹ', 'Smart TV · Wifi', 'Xe đưa đón 2 chiều' ) ),
	'deluxe'   => array( 'image' => $room_image_sets['deluxe_premium']['paths'][0] ?? 'figma/room-deluxe.png', 'level' => 'Cao cấp', 'number' => '02', 'title' => 'Deluxe - 42m²', 'copy' => 'Rộng rãi để mẹ nghỉ ngơi thoải mái và gia đình đồng hành thân thiện.', 'items' => array( 'Phòng vệ sinh riêng', 'Khu tiếp khách thư thái', 'Chăm sóc mẹ và bé hằng ngày' ), 'chips' => array( 'Điều dưỡng trực 24/7', 'Nuôi con bằng sữa mẹ', 'Smart TV · Wifi', 'Xe đưa đón 2 chiều' ) ),
	'suite'    => array( 'image' => $room_image_sets['suite']['paths'][0] ?? 'figma/room-suite.png', 'level' => 'Sang trọng', 'number' => '03', 'title' => 'Suite - 76m²', 'copy' => 'Như một căn hộ thu nhỏ, tách biệt các khoảng nghỉ, làm việc và sum vầy.', 'items' => array( 'Bếp & bàn làm việc riêng', 'Sofa, phòng nghỉ & ban công', 'Chăm sóc chuyên sâu mỗi ngày' ), 'chips' => array( 'Điều dưỡng trực 24/7', 'Nuôi con bằng sữa mẹ', 'Máy chiếu 4k', 'Xe đưa đón 2 chiều' ) ),
);
?>
<section id="ocu-rooms" class="ocu-spaces">
	<div class="ocu-section-heading">
		<span class="ocu-badge"><img src="<?php echo esc_url( $asset_uri . '/star.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true">Không gian cao cấp</span>
		<h2><span class="ocu-heading--blue">Không Gian Nghỉ Dưỡng</span> <span class="ocu-heading--pink">Dành Cho Mẹ</span></h2>
		<p>Không gian tĩnh dưỡng được thiết kế riêng cho mẹ sau sinh, với tiêu chuẩn tiện nghi và sự riêng tư cao nhất.</p>
	</div>

	<?php
	get_template_part(
		'template-parts/components/room-selector',
		null,
		array(
			'rooms'              => $rooms,
			'room_popup_details' => $room_popup_details,
			'asset_uri'          => $asset_uri,
			'button_attrs'       => $button_attrs,
		)
	);
	?>

	<div class="ocu-room-cards">
		<?php foreach ( $rooms as $room_key => $room ) : ?>
			<article class="ocu-room-card-large" data-room-open="<?php echo esc_attr( $room_key ); ?>" tabindex="0" role="button">
				<img src="<?php echo esc_url( $asset_uri . '/' . $room['image'] ); ?>" width="366" height="288" alt="<?php echo esc_attr( $room['title'] ); ?>" loading="lazy">
				<div class="ocu-room-card-large__meta">
					<span><?php echo esc_html( $room['level'] ); ?></span>
					<small><?php echo esc_html( $room['number'] ); ?></small>
				</div>
				<h3><?php echo esc_html( $room['title'] ); ?></h3>
				<p><?php echo esc_html( $room['copy'] ); ?></p>
				<ul>
					<?php foreach ( $room['items'] as $item ) : ?>
						<li><?php echo esc_html( $item ); ?></li>
					<?php endforeach; ?>
				</ul>
				<div class="ocu-room-card-large__services">
					<span class="ocu-room-card-large__services-label">Dịch vụ &amp; tiện nghi</span>
					<div class="ocu-chip-list">
						<?php foreach ( $room['chips'] as $chip ) : ?>
							<span><?php echo esc_html( $chip ); ?></span>
						<?php endforeach; ?>
					</div>
				</div>
				<a href="#dang-ky-tu-van">Xem ảnh &amp; tiện ích phòng <span>›</span></a>
			</article>
		<?php endforeach; ?>
	</div>
</section>

<div class="ocu-room-modal" data-room-modal data-room-data="<?php echo esc_attr( wp_json_encode( $room_popup_details ) ); ?>" hidden aria-hidden="true">
	<div class="ocu-room-modal__backdrop" data-room-close></div>
	<div class="ocu-room-modal__dialog" role="dialog" aria-modal="true" aria-labelledby="ocu-room-modal-title">
		<header class="ocu-room-modal__header"><div><p data-room-level></p><h2 id="ocu-room-modal-title" data-room-title></h2></div><button type="button" class="ocu-room-modal__close" data-room-close aria-label="Đóng popup">×</button></header>
		<div class="ocu-room-modal__variants"><button type="button" class="is-active" data-room-variant="0"></button><button type="button" data-room-variant="1"></button></div>
		<div class="ocu-room-modal__body"><div class="ocu-room-modal__gallery"><div class="ocu-room-modal__main-image"><img data-room-main-image src="" width="480" height="407" alt=""><div class="ocu-room-modal__gallery-controls"><button type="button" data-room-prev aria-label="Ảnh trước">‹</button><button type="button" data-room-next aria-label="Ảnh tiếp theo">›</button></div><span class="ocu-room-modal__counter" data-room-counter></span></div><div class="ocu-room-modal__thumbs" data-room-thumbs></div></div><div class="ocu-room-modal__amenities"><div><p>Dành cho mẹ</p><ul data-room-mother></ul></div><div><p>Dành cho bé</p><ul data-room-baby></ul></div><div><p>Phòng &amp; tiện nghi</p><ul data-room-amenities></ul></div></div></div>
		<footer class="ocu-room-modal__footer"><p data-room-description></p><button type="button" class="ocu-button ocu-button--primary" data-open-modal="vpc-consultation-modal" data-service="trung-tam-o-cu">Nhận tư vấn phòng này</button></footer>
	</div>
</div>

