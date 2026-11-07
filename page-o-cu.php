<?php
/**
 * Page template — Trung tâm Ở cữ.
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$asset_uri        = trailingslashit( get_template_directory_uri() ) . 'assets/images/o-cu';
$shared_asset_uri = trailingslashit( get_template_directory_uri() ) . 'assets/images/bao-mau';

$team = array(
	array( 'image' => 'team-1.png', 'name' => 'Cô Vương Thanh Thủy', 'role' => 'Điều dưỡng trưởng' ),
	array( 'image' => 'team-2.png', 'name' => 'Cô Trần Thị Trang', 'role' => 'Điều dưỡng chăm bé' ),
	array( 'image' => 'team-3.png', 'name' => 'Cô Đỗ Thị Duyên', 'role' => 'Điều dưỡng chăm bé' ),
	array( 'image' => 'team-4.png', 'name' => 'Cô Tống Thị Nguyệt', 'role' => 'Điều dưỡng chăm bé' ),
);

$feedback = array(
	array( 'image' => 'feedback-1.png', 'name' => 'Mẹ bé Kami', 'copy' => 'Mình thực sự thấy quyết định chọn ở cữ ở Vạn Phúc Care là sáng suốt nhất trong hành trình đi đẻ. Phòng hạng có view hồ Tây, rộng rãi, sang trọng và đầy đủ tiện nghi. Trọn vẹn 30 ngày ở cữ rất nhẹ nhàng, 2 mẹ con được chăm sóc sức khỏe chu đáo mỗi ngày và nhàn nhất là không bị áp lực đêm hôm chăm con.' ),
	array( 'image' => 'feedback-2.png', 'name' => 'Mẹ bé Mandu', 'copy' => 'Mình rất hài lòng với dịch vụ ở cữ của Vạn Phúc Care. Mẹ được chăm sóc tận tình, phòng nghỉ sạch sẽ và bé được theo dõi theo quy trình khoa học nên cả gia đình đều an tâm.' ),
	array( 'image' => 'feedback-3.png', 'name' => 'Mẹ Bé Cát', 'copy' => 'Không gian nghỉ dưỡng rất thoải mái, các cô điều dưỡng nhẹ nhàng và chuyên môn tốt. Mình có thêm thời gian phục hồi sau sinh mà vẫn theo sát được từng cữ chăm sóc của con.' ),
	array( 'image' => 'feedback-4.png', 'name' => 'Mẹ Trà My – Bé Nghé', 'copy' => 'Dành tặng 10 sao cho Vạn Phúc Care. Gia đình được tư vấn kỹ, chăm sóc chu đáo và hỗ trợ rất nhanh trong suốt thời gian ở cữ.' ),
	array( 'image' => 'feedback-5.png', 'name' => 'Nguyễn Thị Ngọc Trân', 'copy' => 'Mình cảm thấy thật sự may mắn khi biết tới Trung tâm ở cữ Vạn Phúc Care. Mẹ và bé đều được quan tâm mỗi ngày, mọi thứ rất nhẹ nhàng và chỉn chu.' ),
	array( 'image' => 'feedback-6.png', 'name' => 'Mẹ Sấm Chớp', 'copy' => 'Sau sinh cơ thể mình rất mệt mỏi, nhưng nhờ có đội ngũ điều dưỡng đồng hành nên mình có thể nghỉ ngơi, phục hồi và tận hưởng những ngày đầu bên con.' ),
	array( 'image' => 'feedback-7.png', 'name' => 'Mẹ Cafe', 'copy' => 'Cảm ơn Vạn Phúc Care đã dành cho hai mẹ con những trải nghiệm đầu đời thật nhẹ nhàng. Các cô chăm sóc bé cẩn thận và hướng dẫn gia đình rất tận tình.' ),
	array( 'image' => 'feedback-8.png', 'name' => 'Mẹ Nghé Ọ', 'copy' => 'Đội ngũ điều dưỡng tận tâm, tư vấn rõ ràng và đồng hành rất sát. Gia đình mình hoàn toàn yên tâm khi lựa chọn ở cữ tại đây.' ),
);

$other_services = array(
	array( 'image' => 'service-1.jpg', 'title' => 'Bảo mẫu tại nhà', 'href' => home_url( '/bao-mau-tai-nha/' ) ),
	array( 'image' => 'service-2.jpg', 'title' => 'Khóa học trực tuyến', 'href' => home_url( '/kien-thuc/' ) ),
	array( 'image' => 'service-3.jpg', 'title' => 'Lớp học tiền sản', 'href' => home_url( '/lop-hoc-tien-san/' ) ),
	array( 'image' => 'service-4.jpg', 'title' => 'Tư vấn nuôi con Easy', 'href' => home_url( '/tu-van-nuoi-con-easy/' ) ),
	array( 'image' => 'service-5.jpg', 'title' => 'Tắm bé sơ sinh', 'href' => home_url( '/tam-be-tai-nha/' ) ),
	array( 'image' => 'service-6.jpg', 'title' => 'Thông tắc tia sữa', 'href' => home_url( '/thong-tac-tia-sua/' ) ),
);

$button_attrs = 'data-open-modal="vpc-consultation-modal" data-service="trung-tam-o-cu"';

$room_popup_details = array(
	'standard' => array(
		'level'       => 'Tiêu chuẩn',
		'title'       => 'Standard - 30m²',
		'description' => 'Gọn gàng và đầy đủ cho mẹ ưu tiên một hành trình hồi phục nhẹ nhàng',
		'tabs'        => array( 'Standard Balcony', 'Standard Cozy' ),
		'images'      => array( $asset_uri . '/room-hero.png', $asset_uri . '/room-2.png', $asset_uri . '/room-3.png', $asset_uri . '/room-4.png' ),
		'mother'      => array( 'Bữa ăn dinh dưỡng: 3 chính + 1 phụ', 'Massage kích sữa: 15 phút', 'Hướng dẫn nuôi con: 3 ngày/lần', 'Massage đẩy sản dịch: 3 ngày/lần', 'Xông hơi thảo dược: tối đa 5 lần' ),
		'baby'        => array( 'Phòng dưỡng nhi trực 24/24', 'Tắm, massage & chăm sóc rốn', 'Quấn áo 1 bộ + 3 miếng bỉm' ),
		'amenities'   => array( 'Điều hòa, Smart TV, tủ lạnh, Wifi', 'Ban công thoáng sáng', 'Xe đưa đón 2 chiều (dưới 30km)' ),
	),
	'deluxe' => array(
		'level'       => 'Cao cấp',
		'title'       => 'Deluxe - 42m²',
		'description' => 'Rộng rãi để mẹ nghỉ ngơi thoải mái và gia đình đồng hành thân thiện',
		'tabs'        => array( 'Deluxe Premium', 'Deluxe Classic' ),
		'images'      => array( $asset_uri . '/room-2.png', $asset_uri . '/room-3.png', $asset_uri . '/room-4.png', $asset_uri . '/room-5.png' ),
		'mother'      => array( 'Bữa ăn dinh dưỡng: 3 chính + 1 phụ', 'Massage kích sữa: 15 phút', 'Hướng dẫn nuôi con: 3 ngày/lần', 'Massage đẩy sản dịch: 3 ngày/lần', 'Xông hơi thảo dược: tối đa 5 lần' ),
		'baby'        => array( 'Phòng dưỡng nhi trực 24/24', 'Tắm, massage & chăm sóc rốn', 'Quấn áo 1 bộ + 3 miếng bỉm' ),
		'amenities'   => array( 'Điều hòa, Smart TV, tủ lạnh, Wifi', 'Phòng vệ sinh riêng & khu tiếp khách', 'Xe đưa đón 2 chiều (dưới 30km)' ),
	),
	'suite' => array(
		'level'       => 'Sang trọng',
		'title'       => 'Suite - 76m²',
		'description' => 'Như 1 căn hộ thu nhỏ, tách biệt các khoảng nghỉ, làm việc và sum vầy',
		'tabs'        => array( 'Suite Premium', 'Suite Classic' ),
		'images'      => array( $asset_uri . '/room-5.png', $asset_uri . '/room-4.png', $asset_uri . '/room-3.png', $asset_uri . '/room-hero.png' ),
		'mother'      => array( 'Bữa ăn dinh dưỡng: 3 chính + 2 phụ', 'Massage kích sữa: 30 phút', 'Hướng dẫn nuôi con: hàng ngày', 'Massage đẩy sản dịch: hàng ngày', 'Xông hơi thảo dược: tối đa 5 lần' ),
		'baby'        => array( 'Phòng dưỡng nhi trực 24/24', 'Tắm, massage & chăm sóc rốn', 'Quấn áo 1 bộ + 5 miếng bỉm' ),
		'amenities'   => array( 'Điều hòa, máy chiếu, tủ lạnh, Wifi', 'Phòng nghỉ riêng, sofa, ban công', 'Bếp riêng & bàn làm việc', 'Xe đưa đón 2 chiều (dưới 30km)' ),
	),
);
?>

<main class="vpc-o-cu vpc-bao-mau" data-figma-node="3123:33008">
	<section class="ocu-hero" data-figma-node="3123:33010">
		<div class="ocu-hero__content">
			<span class="ocu-badge"><img src="<?php echo esc_url( $asset_uri . '/star.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true">TRUNG TÂM Ở CỮ</span>
			<h1 class="ocu-hero__title"><span class="ocu-heading--blue">Gói Ở Cữ Sau Sinh</span><span class="ocu-heading--pink">Mẹ Khỏe - Con Ngoan</span></h1>
			<p class="ocu-hero__description">Trung tâm ở cữ Vạn Phúc Care đem đến dịch vụ chăm sóc sau sinh toàn diện, giúp Mẹ và Bé yêu được nghỉ dưỡng trọn vẹn và nhanh chóng phục hồi sức khỏe.</p>
			<div class="ocu-highlights" aria-label="Điểm nổi bật của trung tâm">
				<div class="ocu-highlight"><div class="ocu-highlight__heading"><img src="<?php echo esc_url( $asset_uri . '/amenities.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true"><h2>Không gian</h2></div><p>Tiện nghi nghỉ dưỡng cao cấp</p></div>
				<div class="ocu-highlight"><div class="ocu-highlight__heading"><img src="<?php echo esc_url( $asset_uri . '/dedicated.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true"><h2>Trải nghiệm</h2></div><p>Thoải mái như ở nhà</p></div>
				<div class="ocu-highlight"><div class="ocu-highlight__heading"><img src="<?php echo esc_url( $asset_uri . '/quality.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true"><h2>Hài lòng</h2></div><p>4.9/5 <span aria-label="5 sao">★★★★★</span></p></div>
			</div>
			<img class="ocu-hero__image" src="<?php echo esc_url( $asset_uri . '/hero-nurses-babies.png' ); ?>" width="800" height="450" alt="Điều dưỡng Vạn Phúc Care chăm sóc em bé" fetchpriority="high">
			<div class="ocu-actions"><button type="button" class="ocu-button ocu-button--primary" <?php echo $button_attrs; ?>>Đăng ký tư vấn</button><a class="ocu-button ocu-button--secondary" href="#khong-gian">Xem Không Gian</a></div>
		</div>
	</section>

	<section class="ocu-benefits" data-figma-node="3123:33025">
		<div class="ocu-section-heading"><span class="ocu-badge"><img src="<?php echo esc_url( $asset_uri . '/star.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true">TIỆN ÍCH CHUNG</span><h2><span class="ocu-heading--blue">Đặc Quyền</span> <span class="ocu-heading--pink">Dành Cho Mẹ</span></h2><p>Vượt qua những định kiến kiêng cữ khắt khe, mẹ được thư giãn tối đa để phục hồi sức khỏe,<br class="ocu-desktop-break"> và tận hưởng trọn vẹn hành trình đón thiên thần nhỏ.</p></div>
		<div class="ocu-benefit-grid">
			<div class="ocu-benefit-row ocu-benefit-row--two"><article class="ocu-benefit-card"><span class="ocu-benefit-card__icon"><img src="<?php echo esc_url( $asset_uri . '/monitoring.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true"></span><h3>Theo dõi sức khỏe 24/7</h3><p>Ekip điều dưỡng trực, giám sát sức khỏe của mẹ và bé liên tục bằng thiết bị tiên tiến. Mọi chỉ số sinh hiệu đều được ghi nhận và phản hồi tức thì.</p></article><article class="ocu-benefit-card"><span class="ocu-benefit-card__icon"><img src="<?php echo esc_url( $asset_uri . '/breast-milk.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true"></span><h3>Nuôi con bằng sữa mẹ</h3><p>Được điều dưỡng trưởng hỗ trợ 1:1, giúp mẹ xây dựng hành trình nuôi con bằng sữa mẹ tự tin, trọn vẹn, đong đầy yêu thương.</p></article></div>
			<div class="ocu-benefit-row ocu-benefit-row--three"><article class="ocu-benefit-card"><span class="ocu-benefit-card__icon"><img src="<?php echo esc_url( $asset_uri . '/premium-kitchen.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true"></span><h3>Chế độ dinh dưỡng</h3><p>Đảm bảo dinh dưỡng phù hợp với thể trạng người mẹ, để mẹ mau lại sức, về nhiều sữa.</p></article><article class="ocu-benefit-card"><span class="ocu-benefit-card__icon"><img src="<?php echo esc_url( $asset_uri . '/spa.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true"></span><h3>Không gian hồi phục riêng tư</h3><p>Phòng nghỉ dưỡng yên tĩnh, an lành, đầy đủ tiện nghi hiện đại và tuỳ biến theo hạng phòng.</p></article><article class="ocu-benefit-card"><span class="ocu-benefit-card__icon"><img src="<?php echo esc_url( $asset_uri . '/nursery-room.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true"></span><h3>Phòng dưỡng nhi</h3><p>Khu vực chăm sóc trẻ sơ sinh riêng biệt, để mẹ nghỉ ngơi trọn vẹn trong khi bé luôn được theo dõi an toàn.</p></article></div>
		</div>
	</section>

	<section id="khong-gian" class="ocu-nursery" data-figma-node="3123:33039">
		<div class="ocu-section-heading"><span class="ocu-badge"><img src="<?php echo esc_url( $asset_uri . '/star.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true">PHÒNG DƯỠNG NHI</span><h2><span class="ocu-heading--blue">Khu Vực Chăm Sóc</span><span class="ocu-heading--pink">Phòng Dưỡng Nhi Riêng Biệt</span></h2><p>Khu vực chăm sóc riêng biệt dành cho bé, tách biệt với phòng nghỉ của mẹ.<br class="ocu-desktop-break"> Điều dưỡng viên chăm bé suốt ngày đêm, mẹ an tâm nghỉ ngơi phục hồi.</p></div>
		<div class="ocu-room-bento"><div class="ocu-room-bento__hero"><img src="<?php echo esc_url( $asset_uri . '/room-hero.png' ); ?>" width="616" height="480" alt="Phòng dưỡng nhi riêng tại Vạn Phúc Care" loading="lazy"><span><strong>30m²</strong> Phòng dưỡng nhi riêng</span></div><div class="ocu-room-bento__side"><article class="ocu-room-card ocu-room-card--feature"><div><span class="ocu-room-card__eyebrow">MÔI TRƯỜNG VÔ KHUẨN</span><h3>Kiểm soát nhiễm khuẩn</h3></div><p>Quy trình kiểm soát nhiễm khuẩn chéo được giám sát nghiêm ngặt.</p><div class="ocu-chip-list"><span>Phòng riêng, tách biệt</span><span>Mỗi bé một nôi riêng</span><span>Đồ dùng cá nhân riêng</span><span>Thiết bị khử khuẩn hiện đại</span></div></article><div class="ocu-room-bento__stats"><article><strong>24/24</strong><span>Chăm sóc, theo dõi bé</span></article><article><strong>2+</strong><span>Điều dưỡng viên trực tối thiểu</span></article></div></div></div>
		<div class="ocu-room-points"><article><strong>01</strong><h3>Không gian sáng, an lành</h3><p>Môi trường yên tĩnh, thoáng sáng giúp bé thích nghi nhẹ nhàng những ngày đầu đời.</p><ul><li>Phòng dưỡng nhi riêng biệt</li><li>Mỗi bé một nôi riêng</li></ul></article><article><strong>02</strong><h3>Điều dưỡng túc trực suốt ngày đêm</h3><p>Đội ngũ điều dưỡng chăm sóc bé theo quy trình chuẩn, luôn sẵn sàng hỗ trợ mẹ.</p><ul><li>Điều dưỡng trực 24/24</li><li>Theo dõi lịch ăn, ngủ của bé</li></ul></article><article><strong>03</strong><h3>Không gian nghỉ dưỡng cho mẹ</h3><p>Mẹ được nghỉ ngơi trong không gian sang trọng và cao cấp nhưng vẫn theo sát sự phát triển của con.</p><ul><li>Phục hồi nhẹ nhàng, riêng tư</li><li>An tâm tận hưởng thời gian bên con</li></ul></article></div>
		<div class="ocu-daily"><img src="<?php echo esc_url( $asset_uri . '/room-4.png' ); ?>" width="560" height="480" alt="Điều dưỡng chăm sóc em bé mỗi ngày" loading="lazy"><div><span class="ocu-badge"><img src="<?php echo esc_url( $asset_uri . '/star.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true">MỖI NGÀY CỦA BÉ</span><h2><span class="ocu-heading--blue">Mỗi Ngày Của Bé</span><span class="ocu-heading--pink">Tại Phòng Dưỡng Nhi</span></h2><p>Bé không chỉ được trông nom, mà còn được chăm sóc theo quy trình:</p><ul><li>Vệ sinh, tắm và massage nhẹ nhàng.</li><li>Đảm bảo cữ bú và giấc ngủ khoa học.</li><li>Theo dõi sức khỏe và các chỉ số quan trọng.</li><li>Vận động phù hợp theo từng giai đoạn.</li><li>Cập nhật tình hình của bé cho mẹ mỗi ngày.</li></ul></div></div>
	</section>

	<section class="ocu-experience"><div class="ocu-experience__inner"><img src="<?php echo esc_url( $asset_uri . '/room-5.png' ); ?>" width="540" height="456" alt="Trải nghiệm ở cữ tại Vạn Phúc Care" loading="lazy"><div><span class="ocu-badge"><img src="<?php echo esc_url( $asset_uri . '/star.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true">TRẢI NGHIỆM Ở CỮ</span><h2><span class="ocu-heading--blue">Trải Nghiệm Ở Cữ</span><span class="ocu-heading--pink">Thoải Mái Như Ở Nhà</span></h2><p>Ở cữ tại Vạn Phúc Care là hành trình nghỉ dưỡng trọn vẹn, nơi mẹ được chăm sóc chu đáo và có thêm thời gian kết nối cùng em bé.</p><h3>Phù hợp với:</h3><ul><li>Mẹ cần phục hồi sức khỏe sau sinh.</li><li>Gia đình muốn được hỗ trợ chăm bé chuyên nghiệp.</li><li>Mẹ muốn tận hưởng không gian nghỉ dưỡng riêng tư.</li></ul></div></div></section>

	<section id="ocu-rooms" class="ocu-spaces"><div class="ocu-section-heading"><span class="ocu-badge"><img src="<?php echo esc_url( $asset_uri . '/star.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true">KHÔNG GIAN NGHỈ DƯỠNG</span><h2><span class="ocu-heading--blue">Không Gian Nghỉ Dưỡng</span> <span class="ocu-heading--pink">Dành Cho Mẹ</span></h2><p>Mỗi căn phòng là một khoảng trời riêng để mẹ hồi phục nhẹ nhàng.</p></div>
	<?php
	$rooms = array(
		'standard' => array( 'image' => 'room-hero.png', 'level' => 'Tiêu chuẩn', 'number' => '01', 'title' => 'Standard - 30m²', 'copy' => 'Gọn gàng và đầy đủ cho mẹ ưu tiên một hành trình hồi phục nhẹ nhàng.', 'items' => array( 'Chăm sóc mẹ và bé hằng ngày', 'Giường lớn và phòng dưỡng nhi', 'Ban công thoáng sáng' ), 'chips' => array( 'Điều dưỡng trực 24/7', 'Nuôi con bằng sữa mẹ', 'Smart TV · Wifi' ) ),
		'deluxe' => array( 'image' => 'room-2.png', 'level' => 'Cao cấp', 'number' => '02', 'title' => 'Deluxe - 42m²', 'copy' => 'Rộng rãi để mẹ nghỉ ngơi thoải mái và gia đình đồng hành thân thiện.', 'items' => array( 'Phòng vệ sinh riêng', 'Khu tiếp khách thư thái', 'Chăm sóc mẹ và bé hằng ngày' ), 'chips' => array( 'Điều dưỡng trực 24/7', 'Nuôi con bằng sữa mẹ', 'Xe đưa đón 2 chiều' ) ),
		'suite' => array( 'image' => 'room-5.png', 'level' => 'Sang trọng', 'number' => '03', 'title' => 'Suite - 76m²', 'copy' => 'Như một căn hộ thu nhỏ, tách biệt các khoảng nghỉ, làm việc và sum vầy.', 'items' => array( 'Bếp & bàn làm việc riêng', 'Sofa, phòng nghỉ & ban công', 'Chăm sóc chuyên sâu mỗi ngày' ), 'chips' => array( 'Điều dưỡng trực 24/7', 'Nuôi con bằng sữa mẹ', 'Xe đưa đón 2 chiều' ) ),
	);
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
	<div class="ocu-room-cards"><?php foreach ( $rooms as $room_key => $room ) : ?><article class="ocu-room-card-large" data-room-open="<?php echo esc_attr( $room_key ); ?>" tabindex="0" role="button"><img src="<?php echo esc_url( $asset_uri . '/' . $room['image'] ); ?>" width="366" height="288" alt="<?php echo esc_attr( $room['title'] ); ?>" loading="lazy"><div class="ocu-room-card-large__meta"><span><?php echo esc_html( $room['level'] ); ?></span><small><?php echo esc_html( $room['number'] ); ?></small></div><h3><?php echo esc_html( $room['title'] ); ?></h3><p><?php echo esc_html( $room['copy'] ); ?></p><ul><?php foreach ( $room['items'] as $item ) : ?><li><?php echo esc_html( $item ); ?></li><?php endforeach; ?></ul><div class="ocu-chip-list"><?php foreach ( $room['chips'] as $chip ) : ?><span><?php echo esc_html( $chip ); ?></span><?php endforeach; ?></div><a href="#dang-ky-tu-van">Xem ảnh &amp; tiện ích phòng <span>›</span></a></article><?php endforeach; ?></div></section>

	<div class="ocu-room-modal" data-room-modal data-room-data="<?php echo esc_attr( wp_json_encode( $room_popup_details ) ); ?>" hidden aria-hidden="true">
		<div class="ocu-room-modal__backdrop" data-room-close></div>
		<div class="ocu-room-modal__dialog" role="dialog" aria-modal="true" aria-labelledby="ocu-room-modal-title">
			<header class="ocu-room-modal__header"><div><p data-room-level></p><h2 id="ocu-room-modal-title" data-room-title></h2></div><button type="button" class="ocu-room-modal__close" data-room-close aria-label="Đóng popup">×</button></header>
			<div class="ocu-room-modal__variants"><button type="button" class="is-active" data-room-variant="0"></button><button type="button" data-room-variant="1"></button></div>
			<div class="ocu-room-modal__body"><div class="ocu-room-modal__gallery"><div class="ocu-room-modal__main-image"><img data-room-main-image src="" width="480" height="407" alt=""><div class="ocu-room-modal__gallery-controls"><button type="button" data-room-prev aria-label="Ảnh trước">‹</button><button type="button" data-room-next aria-label="Ảnh tiếp theo">›</button></div><span class="ocu-room-modal__counter" data-room-counter></span></div><div class="ocu-room-modal__thumbs" data-room-thumbs></div></div><div class="ocu-room-modal__amenities"><div><p>Dành cho mẹ</p><ul data-room-mother></ul></div><div><p>Dành cho bé</p><ul data-room-baby></ul></div><div><p>Phòng &amp; tiện nghi</p><ul data-room-amenities></ul></div></div></div>
			<footer class="ocu-room-modal__footer"><p data-room-description></p><button type="button" class="ocu-button ocu-button--primary" data-open-modal="vpc-consultation-modal" data-service="trung-tam-o-cu">Nhận tư vấn phòng này</button></footer>
		</div>
	</div>

	<section class="vpc-bao-mau__team ocu-shared-section" aria-labelledby="ocu-team-title"><div class="vpc-bao-mau__container"><div class="vpc-bao-mau__section-heading"><div class="vpc-bao-mau__badge"><img src="<?php echo esc_url( $shared_asset_uri . '/star.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true">ĐỘI NGŨ</div><h2 id="ocu-team-title"><span>Đội Ngũ Của Chúng Tôi</span></h2><p>Đội ngũ điều dưỡng viên với nền tảng y tế, được đào tạo chuyên môn về chăm sóc sức khỏe Mẹ&amp;Bé, đảm bảo đem đến dịch vụ an toàn, chuyên nghiệp cho các gia đình.</p></div><div class="vpc-bao-mau__team-viewport"><div class="vpc-bao-mau__team-grid"><?php foreach ( $team as $member ) : ?><article class="vpc-bao-mau__team-card"><div class="vpc-bao-mau__team-image"><img src="<?php echo esc_url( $shared_asset_uri . '/' . $member['image'] ); ?>" width="223" height="292" alt="<?php echo esc_attr( $member['name'] ); ?>" loading="lazy"></div><div><h3><?php echo esc_html( $member['name'] ); ?></h3><p><?php echo esc_html( $member['role'] ); ?></p></div></article><?php endforeach; ?></div></div></div></section>

	<section class="vpc-bao-mau__faq ocu-shared-section" aria-labelledby="ocu-faq-title"><div class="vpc-bao-mau__container"><div class="vpc-bao-mau__section-heading"><div class="vpc-bao-mau__badge"><img src="<?php echo esc_url( $shared_asset_uri . '/star.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true">HỎI ĐÁP</div><h2 id="ocu-faq-title"><span>Câu Hỏi Thường Gặp</span></h2><p>Những băn khoăn thường gặp của mẹ trước khi lựa chọn Trung tâm ở cữ Vạn Phúc Care.</p></div><div class="vpc-bao-mau__faq-list"><details class="is-open" open><summary>Ở cữ tại Vạn Phúc Care có những dịch vụ gì?</summary><p>Mẹ được chăm sóc sau sinh, hỗ trợ nuôi con bằng sữa mẹ, nghỉ dưỡng trong phòng riêng và bé được chăm sóc tại phòng dưỡng nhi theo quy trình khoa học.</p></details><details><summary>Bé được chăm sóc như thế nào tại phòng dưỡng nhi?</summary><p>Bé được theo dõi sức khỏe, ăn ngủ, vệ sinh và vận động phù hợp; điều dưỡng viên trực và cập nhật tình hình cho mẹ mỗi ngày.</p></details><details><summary>Mẹ có thể lựa chọn hạng phòng không?</summary><p>Vạn Phúc Care có các hạng Standard, Deluxe và Suite để gia đình lựa chọn theo nhu cầu nghỉ dưỡng.</p></details><details><summary>Gia đình có thể đồng hành cùng mẹ không?</summary><p>Gia đình có thể đồng hành theo chính sách của từng hạng phòng và được đội ngũ hướng dẫn để hỗ trợ mẹ và bé đúng cách.</p></details><details><summary>Đăng ký tư vấn gói ở cữ bằng cách nào?</summary><p>Mẹ chỉ cần để lại thông tin trong form tư vấn hoặc liên hệ trực tiếp, đội ngũ Vạn Phúc Care sẽ gọi lại để tư vấn lộ trình phù hợp.</p></details></div></div></section>

	<section class="vpc-bao-mau__feedback ocu-shared-section" aria-labelledby="ocu-feedback-title"><div class="vpc-bao-mau__container"><div class="vpc-bao-mau__section-heading"><div class="vpc-bao-mau__badge"><img src="<?php echo esc_url( $shared_asset_uri . '/star.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true">KHÁCH HÀNG</div><h2 id="ocu-feedback-title"><span>Cảm Nhận</span><em>Của Khách Hàng</em></h2><p>Trong hành trình cùng mẹ trải đầy yêu thương, Trung tâm ở cữ Vạn Phúc Care đã nhận được sự tin yêu của hàng ngàn Mẹ bỉm.</p></div><div class="vpc-bao-mau__feedback-row"><div class="vpc-bao-mau__feedback-track"><?php foreach ( array_slice( $feedback, 0, 4 ) as $item ) : ?><article class="vpc-bao-mau__feedback-card"><div class="vpc-bao-mau__feedback-author"><img src="<?php echo esc_url( $shared_asset_uri . '/' . $item['image'] ); ?>" width="40" height="40" alt="" loading="lazy"><div><strong><?php echo esc_html( $item['name'] ); ?></strong><span>★★★★★</span></div></div><img class="vpc-bao-mau__quote" src="<?php echo esc_url( $shared_asset_uri . '/quotation.svg' ); ?>" width="32" height="32" alt="" aria-hidden="true"><p><?php echo esc_html( $item['copy'] ); ?></p></article><?php endforeach; ?></div></div><div class="vpc-bao-mau__feedback-row vpc-bao-mau__feedback-row--second"><div class="vpc-bao-mau__feedback-track"><?php foreach ( array_slice( $feedback, 4 ) as $item ) : ?><article class="vpc-bao-mau__feedback-card"><div class="vpc-bao-mau__feedback-author"><img src="<?php echo esc_url( $shared_asset_uri . '/' . $item['image'] ); ?>" width="40" height="40" alt="" loading="lazy"><div><strong><?php echo esc_html( $item['name'] ); ?></strong><span>★★★★★</span></div></div><img class="vpc-bao-mau__quote" src="<?php echo esc_url( $shared_asset_uri . '/quotation.svg' ); ?>" width="32" height="32" alt="" aria-hidden="true"><p><?php echo esc_html( $item['copy'] ); ?></p></article><?php endforeach; ?></div></div></div></section>

	<section id="dang-ky-tu-van" class="vpc-bao-mau__lead ocu-shared-section" aria-labelledby="ocu-lead-title"><div class="vpc-bao-mau__container"><div class="vpc-bao-mau__section-heading"><h2 id="ocu-lead-title"><span>Sẵn Sàng Bắt Đầu</span><em>Hành Trình Làm Mẹ Hạnh Phúc</em></h2></div><div class="vpc-bao-mau__lead-card"><div class="vpc-bao-mau__lead-row"><label><span class="vpc-bao-mau__label-text"><b>*</b>Họ và tên</span><input type="text" placeholder="Nguyễn Như Linh" aria-label="Họ và tên"></label><label><span class="vpc-bao-mau__label-text"><b>*</b>Số điện thoại</span><input type="tel" placeholder="0345678***" aria-label="Số điện thoại"></label></div><label><span class="vpc-bao-mau__label-text"><b>*</b>Gói dịch vụ quan tâm</span><select aria-label="Gói dịch vụ quan tâm"><option>Gói ở cữ Standard</option><option>Gói ở cữ Deluxe</option><option>Gói ở cữ Suite</option></select></label><label><span class="vpc-bao-mau__label-text">Ghi chú</span><input type="text" placeholder="Cho chúng tôi biết thêm về nhu cầu của bạn!" aria-label="Ghi chú"></label><button type="button" class="vpc-bao-mau__button vpc-bao-mau__button--primary" <?php echo $button_attrs; ?>>Gửi yêu cầu tư vấn</button></div></div></section>

	<section class="vpc-bao-mau__services ocu-shared-section" aria-labelledby="ocu-services-title"><div class="vpc-bao-mau__container"><div class="vpc-bao-mau__section-heading"><h2 id="ocu-services-title"><span>Các Dịch Vụ Khác</span></h2></div><div class="vpc-bao-mau__services-viewport"><div class="vpc-bao-mau__services-track"><?php foreach ( $other_services as $service ) : ?><a class="vpc-bao-mau__service-card" href="<?php echo esc_url( $service['href'] ); ?>"><img src="<?php echo esc_url( $shared_asset_uri . '/' . $service['image'] ); ?>" width="300" height="240" alt="<?php echo esc_attr( $service['title'] ); ?>" loading="lazy"><h3><?php echo esc_html( $service['title'] ); ?></h3></a><?php endforeach; ?></div></div></div></section>
</main>

<?php get_footer(); ?>
