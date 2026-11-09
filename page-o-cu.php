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
$ocu_hero_video_url = apply_filters( 'vpc_o_cu_hero_video_url', get_theme_mod( 'vpc_o_cu_hero_video_url', '' ) );
$consultation_services = vpc_get_consultation_services();
$gestational_age_options = vpc_get_gestational_age_options();

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
		'images'      => array( $asset_uri . '/figma/room-standard.png', $asset_uri . '/room-2.png', $asset_uri . '/room-3.png', $asset_uri . '/room-4.png' ),
		'mother'      => array( 'Bữa ăn dinh dưỡng: 3 chính + 1 phụ', 'Massage kích sữa: 15 phút', 'Hướng dẫn nuôi con: 3 ngày/lần', 'Massage đẩy sản dịch: 3 ngày/lần', 'Xông hơi thảo dược: tối đa 5 lần' ),
		'baby'        => array( 'Phòng dưỡng nhi trực 24/24', 'Tắm, massage & chăm sóc rốn', 'Quấn áo 1 bộ + 3 miếng bỉm' ),
		'amenities'   => array( 'Điều hòa, Smart TV, tủ lạnh, Wifi', 'Ban công thoáng sáng', 'Xe đưa đón 2 chiều (dưới 30km)' ),
	),
	'deluxe' => array(
		'level'       => 'Cao cấp',
		'title'       => 'Deluxe - 42m²',
		'description' => 'Rộng rãi để mẹ nghỉ ngơi thoải mái và gia đình đồng hành thân thiện',
		'tabs'        => array( 'Deluxe Premium', 'Deluxe Classic' ),
		'images'      => array( $asset_uri . '/figma/room-deluxe.png', $asset_uri . '/room-3.png', $asset_uri . '/room-4.png', $asset_uri . '/room-5.png' ),
		'mother'      => array( 'Bữa ăn dinh dưỡng: 3 chính + 1 phụ', 'Massage kích sữa: 15 phút', 'Hướng dẫn nuôi con: 3 ngày/lần', 'Massage đẩy sản dịch: 3 ngày/lần', 'Xông hơi thảo dược: tối đa 5 lần' ),
		'baby'        => array( 'Phòng dưỡng nhi trực 24/24', 'Tắm, massage & chăm sóc rốn', 'Quấn áo 1 bộ + 3 miếng bỉm' ),
		'amenities'   => array( 'Điều hòa, Smart TV, tủ lạnh, Wifi', 'Phòng vệ sinh riêng & khu tiếp khách', 'Xe đưa đón 2 chiều (dưới 30km)' ),
	),
	'suite' => array(
		'level'       => 'Sang trọng',
		'title'       => 'Suite - 76m²',
		'description' => 'Như 1 căn hộ thu nhỏ, tách biệt các khoảng nghỉ, làm việc và sum vầy',
		'images'      => array( $asset_uri . '/figma/room-suite.png', $asset_uri . '/room-4.png', $asset_uri . '/room-3.png', $asset_uri . '/room-hero.png' ),
		'mother'      => array( 'Bữa ăn dinh dưỡng: 3 chính + 2 phụ', 'Massage kích sữa: 30 phút', 'Hướng dẫn nuôi con: hàng ngày', 'Massage đẩy sản dịch: hàng ngày', 'Xông hơi thảo dược: tối đa 5 lần' ),
		'baby'        => array( 'Phòng dưỡng nhi trực 24/24', 'Tắm, massage & chăm sóc rốn', 'Quấn áo 1 bộ + 5 miếng bỉm' ),
		'amenities'   => array( 'Điều hòa, máy chiếu, tủ lạnh, Wifi', 'Phòng nghỉ riêng, sofa, ban công', 'Bếp riêng & bàn làm việc', 'Xe đưa đón 2 chiều (dưới 30km)' ),
	),
);
?>

<main class="vpc-o-cu vpc-bao-mau" data-figma-node="3123:33008">
	<section class="ocu-hero" data-figma-node="3123:33010">
		<div class="ocu-hero__content">
			<span class="ocu-badge"><img src="<?php echo esc_url( $asset_uri . '/star.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true">Trung tâm ở cữ</span>
			<h1 class="ocu-hero__title"><span class="ocu-heading--blue">Gói Ở Cữ Sau Sinh</span><span class="ocu-heading--pink">Mẹ Khỏe - Con Ngoan</span></h1>
			<p class="ocu-hero__description">Trung tâm ở cữ Vạn Phúc Care đem đến dịch vụ chăm sóc sau sinh toàn diện, giúp Mẹ và Bé yêu được nghỉ dưỡng trọn vẹn và nhanh chóng phục hồi sức khỏe.</p>
			<div class="ocu-highlights" aria-label="Điểm nổi bật của trung tâm">
				<div class="ocu-highlight"><div class="ocu-highlight__heading"><img src="<?php echo esc_url( $asset_uri . '/amenities.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true"><h2>Không gian</h2></div><p>Tiện nghi nghỉ dưỡng cao cấp</p></div>
				<div class="ocu-highlight"><div class="ocu-highlight__heading"><img src="<?php echo esc_url( $asset_uri . '/dedicated.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true"><h2>Trải nghiệm</h2></div><p>Thoải mái như ở nhà</p></div>
				<div class="ocu-highlight"><div class="ocu-highlight__heading"><img src="<?php echo esc_url( $asset_uri . '/quality.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true"><h2>Hài lòng</h2></div><p>4.9/5 <span aria-label="5 sao">★★★★★</span></p></div>
			</div>
			<?php if ( $ocu_hero_video_url ) : ?>
				<video class="ocu-hero__image" width="800" height="450" controls playsinline preload="metadata" poster="<?php echo esc_url( $asset_uri . '/figma/hero.png' ); ?>" aria-label="Video giới thiệu trung tâm ở cữ" src="<?php echo esc_url( $ocu_hero_video_url ); ?>">
					<img src="<?php echo esc_url( $asset_uri . '/figma/hero.png' ); ?>" width="800" height="450" alt="Điều dưỡng Vạn Phúc Care chăm sóc em bé">
				</video>
			<?php else : ?>
				<img class="ocu-hero__image" src="<?php echo esc_url( $asset_uri . '/figma/hero.png' ); ?>" width="800" height="450" alt="Điều dưỡng Vạn Phúc Care chăm sóc em bé" fetchpriority="high">
			<?php endif; ?>
			<div class="ocu-actions"><button type="button" class="ocu-button ocu-button--primary" <?php echo $button_attrs; ?>>Đăng ký tư vấn</button><a class="ocu-button ocu-button--secondary" href="#khong-gian">Xem không gian</a></div>
		</div>
	</section>

	<section class="ocu-benefits" data-figma-node="3123:33025">
		<div class="ocu-section-heading"><span class="ocu-badge"><img src="<?php echo esc_url( $asset_uri . '/star.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true">Tiện ích chung</span><h2><span class="ocu-heading--blue">Đặc Quyền</span> <span class="ocu-heading--pink">Dành Cho Mẹ</span></h2><p>Vượt qua những định kiến kiêng cữ khắt khe, mẹ được thư giãn tối đa để phục hồi sức khỏe,<br class="ocu-desktop-break"> và tận hưởng trọn vẹn hành trình đón thiên thần nhỏ.</p></div>
		<div class="ocu-benefit-grid">
			<div class="ocu-benefit-row ocu-benefit-row--two"><article class="ocu-benefit-card"><span class="ocu-benefit-card__icon"><img src="<?php echo esc_url( $asset_uri . '/monitoring.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true"></span><h3>Theo dõi sức khỏe 24/7</h3><p>Ekip điều dưỡng trực, giám sát sức khỏe của mẹ và bé liên tục bằng thiết bị tiên tiến. Mọi chỉ số sinh hiệu đều được ghi nhận và phản hồi tức thì.</p></article><article class="ocu-benefit-card"><span class="ocu-benefit-card__icon"><img src="<?php echo esc_url( $asset_uri . '/breast-milk.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true"></span><h3>Nuôi con bằng sữa mẹ</h3><p>Được điều dưỡng trưởng hỗ trợ 1:1, giúp mẹ xây dựng hành trình nuôi con bằng sữa mẹ tự tin, trọn vẹn, đong đầy yêu thương.</p></article></div>
			<div class="ocu-benefit-row ocu-benefit-row--three"><article class="ocu-benefit-card"><span class="ocu-benefit-card__icon"><img src="<?php echo esc_url( $asset_uri . '/premium-kitchen.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true"></span><h3>Chế độ dinh dưỡng</h3><p>Đảm bảo dinh dưỡng phù hợp với thể trạng người mẹ, để mẹ mau lại sức, về nhiều sữa. Đảm bảo cữ bú phù hợp cho trẻ sơ sinh, loại bỏ hiện tượng no giả, bỏ bữa, chán bú.</p></article><article class="ocu-benefit-card"><span class="ocu-benefit-card__icon"><img src="<?php echo esc_url( $asset_uri . '/spa.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true"></span><h3>Không gian hồi phục riêng tư</h3><p>Phòng nghỉ dưỡng của mẹ được đảm bảo yên tĩnh, mùi hương gỗ thoảng nhẹ và an lành. Tiện nghi đầy đủ, hiện đại, tuỳ biến theo hạng phòng.</p></article><article class="ocu-benefit-card"><span class="ocu-benefit-card__icon"><img src="<?php echo esc_url( $asset_uri . '/nursery-room.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true"></span><h3>Phòng dưỡng nhi</h3><p>Khu vực chăm sóc trẻ sơ sinh riêng biệt với công nghệ giám sát AI thời gian thực. Cho phép mẹ nghỉ ngơi trọn vẹn trong khi bé luôn được theo dõi an toàn.</p></article></div>
		</div>
	</section>

	<section id="khong-gian" class="ocu-nursery" data-figma-node="3123:33039">
		<div class="ocu-section-heading"><span class="ocu-badge"><img src="<?php echo esc_url( $asset_uri . '/star.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true">Phòng dưỡng nhi</span><h2><span class="ocu-heading--blue">Khu Vực Chăm Sóc</span><span class="ocu-heading--pink">Phòng Dưỡng Nhi <br class="ocu-nursery-mobile-break">Riêng Biệt</span></h2><p><span>Khu vực chăm sóc riêng biệt dành cho bé, tách biệt với phòng nghỉ của mẹ.</span><span>Điều dưỡng viên chăm bé suốt ngày đêm, mẹ an tâm nghỉ ngơi phục hồi.</span></p></div>
			<div class="ocu-room-bento"><div class="ocu-room-bento__hero"><img src="<?php echo esc_url( $asset_uri . '/figma/nursery-hero.png' ); ?>" width="616" height="480" alt="Phòng dưỡng nhi riêng tại Vạn Phúc Care" loading="lazy"><span><strong>30m²</strong> Phòng dưỡng nhi riêng</span></div><div class="ocu-room-bento__side"><article class="ocu-room-card ocu-room-card--feature"><div class="ocu-room-card__top"><span class="ocu-room-card__icon-box"><img src="<?php echo esc_url( $asset_uri . '/figma/shield-check.svg' ); ?>" width="59" height="59" alt="" aria-hidden="true"></span><div><span class="ocu-room-card__eyebrow">Môi trường vô khuẩn</span><h3>Kiểm soát nhiễm khuẩn</h3></div></div><p>Quy trình kiểm soát nhiễm khuẩn chéo được giám sát nghiêm ngặt.</p><div class="ocu-chip-list"><span class="ocu-chip--desktop">Phòng riêng, tách biệt</span><span class="ocu-chip--mobile">Máy lọc không khí</span><span>Đồ dùng cá nhân riêng</span><span>Thiết bị khử khuẩn hiện đại</span></div></article><div class="ocu-room-bento__stats"><article><img class="ocu-room-card__icon" src="<?php echo esc_url( $asset_uri . '/figma/ring.svg' ); ?>" width="56" height="56" alt="" aria-hidden="true"><div class="ocu-room-stat__value"><strong>24/24</strong><span>Chăm sóc, theo dõi bé</span></div></article><article><img class="ocu-room-card__icon" src="<?php echo esc_url( $asset_uri . '/figma/people.svg' ); ?>" width="57.8" height="56" alt="" aria-hidden="true"><div class="ocu-room-stat__value"><strong>2+</strong><span>Điều dưỡng viên trực tối thiểu</span></div></article></div></div></div>
			<div class="ocu-room-points"><article><img src="<?php echo esc_url( $asset_uri . '/figma/pillar-1.png' ); ?>" width="366" height="240" alt="Không gian phòng dưỡng nhi sáng và an lành" loading="lazy"><div class="ocu-room-point__heading"><strong>01</strong><h3>Không gian sáng, an lành</h3></div><p>Môi trường yên tĩnh, thoáng sáng giúp bé thích nghi nhẹ nhàng những ngày đầu đời.</p><ul><li>Cửa sổ lớn, ánh sáng tự nhiên</li><li>Cách Hồ Tây chưa tới 200m</li><li>Trang thiết bị hiện đại</li></ul></article><article><img src="<?php echo esc_url( $asset_uri . '/figma/pillar-2.png' ); ?>" width="366" height="240" alt="Điều dưỡng chăm sóc bé suốt ngày đêm" loading="lazy"><div class="ocu-room-point__heading"><strong>02</strong><h3>Điều dưỡng túc trực suốt ngày đêm</h3></div><p>Tối đa 10 nôi, tối thiểu 2 điều dưỡng viên trực.</p><ul><li>Mỗi bé một nôi riêng</li><li>Vệ sinh và massage cho bé mỗi ngày</li><li>Thiết lập lịch sinh hoạt chuẩn</li><li>Quy chuẩn chăm sóc chất lượng cao</li></ul></article><article><img src="<?php echo esc_url( $asset_uri . '/figma/pillar-3.png' ); ?>" width="366" height="240" alt="Không gian nghỉ dưỡng riêng cho mẹ" loading="lazy"><div class="ocu-room-point__heading"><strong>03</strong><h3>Không gian nghỉ dưỡng cho mẹ</h3></div><p>Mẹ được nghỉ ngơi trong không gian sang trọng và cao cấp. Nhưng vẫn đảm bảo theo sát được sự phát triển của con.</p><ul><li>Camera theo dõi 24/24</li><li>Sổ sức khoẻ điện tử cập nhật hằng ngày</li><li>Nhận biết sớm dấu hiệu bất thường, gia đình luôn được đồng hành kịp thời</li></ul></article></div>
			<div class="ocu-daily"><img src="<?php echo esc_url( $asset_uri . '/figma/daily.png' ); ?>" width="560" height="480" alt="Điều dưỡng chăm sóc em bé mỗi ngày" loading="lazy"><div><span class="ocu-badge"><img src="<?php echo esc_url( $asset_uri . '/star.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true">Mỗi ngày của bé</span><h2><span class="ocu-heading--blue">Mỗi Ngày Của Bé</span><span class="ocu-heading--pink">Tại Phòng Dưỡng Nhi</span></h2><p>Trẻ sơ sinh được chăm sóc theo quy trình tuần hoàn, khép kín. Giúp bé không chỉ ăn ngon, ngủ đủ mà còn phát triển đầy đủ kỹ năng vận động thô:</p><ul><li>Thiết lập nếp sinh hoạt EASY phù hợp với từng tuổi của bé</li><li>Vệ sinh và massage hằng ngày</li><li>Tập vận động thô cơ bản</li><li>Các hoạt động tương tác cùng bé</li><li>Sổ sức khỏe điện tử chi tiết giao khi về nhà</li></ul></div></div>
	</section>

	<section class="ocu-experience"><div class="ocu-experience__inner"><img src="<?php echo esc_url( $asset_uri . '/figma/experience.png' ); ?>" width="540" height="456" alt="Trải nghiệm ở cữ tại Vạn Phúc Care" loading="lazy"><div><span class="ocu-badge"><img src="<?php echo esc_url( $asset_uri . '/star.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true">Trải nghiệm</span><h2><span class="ocu-heading--blue">Trải Nghiệm Ở Cữ</span><span class="ocu-heading--pink">Thoải Mái Như Ở Nhà</span></h2><p>Trung tâm ở cữ toạ lạc trên cung đường ven Hồ Tây thơ mộng. Tiện nghi phòng nghỉ và phòng dưỡng nhi hiện đại, cùng đội ngũ điều dưỡng chăm sóc <br class="ocu-experience-mobile-break">mẹ và bé 24/7.</p><h3>Phù hợp với:</h3><ul><li>Mẹ: Cần nghỉ ngơi phục hồi toàn diện sau sinh.</li><li>Bé: Được điều dưỡng theo dõi và chăm sóc mỗi ngày.</li><li>Gia đình: Công việc bận rộn, muốn an tâm gửi gắm nơi có chuyên môn cao.</li></ul></div></div></section>

	<section id="ocu-rooms" class="ocu-spaces"><div class="ocu-section-heading"><span class="ocu-badge"><img src="<?php echo esc_url( $asset_uri . '/star.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true">Không gian cao cấp</span><h2><span class="ocu-heading--blue">Không Gian Nghỉ Dưỡng</span> <span class="ocu-heading--pink">Dành Cho Mẹ</span></h2><p>Không gian tĩnh dưỡng được thiết kế riêng cho mẹ sau sinh, với tiêu chuẩn tiện nghi và sự riêng tư cao nhất.</p></div>
	<?php
	$rooms = array(
			'standard' => array( 'image' => 'figma/room-standard.png', 'level' => 'Tiêu chuẩn', 'number' => '01', 'title' => 'Standard - 30m²', 'copy' => 'Gọn gàng và đầy đủ cho mẹ ưu tiên một hành trình hồi phục nhẹ nhàng.', 'items' => array( 'Chăm sóc mẹ và bé hằng ngày', 'Giường lớn và phòng dưỡng nhi', 'Ban công thoáng sáng' ), 'chips' => array( 'Điều dưỡng trực 24/7', 'Nuôi con bằng sữa mẹ', 'Smart TV · Wifi', 'Xe đưa đón 2 chiều' ) ),
			'deluxe' => array( 'image' => 'figma/room-deluxe.png', 'level' => 'Cao cấp', 'number' => '02', 'title' => 'Deluxe - 42m²', 'copy' => 'Rộng rãi để mẹ nghỉ ngơi thoải mái và gia đình đồng hành thân thiện.', 'items' => array( 'Phòng vệ sinh riêng', 'Khu tiếp khách thư thái', 'Chăm sóc mẹ và bé hằng ngày' ), 'chips' => array( 'Điều dưỡng trực 24/7', 'Nuôi con bằng sữa mẹ', 'Smart TV · Wifi', 'Xe đưa đón 2 chiều' ) ),
			'suite' => array( 'image' => 'figma/room-suite.png', 'level' => 'Sang trọng', 'number' => '03', 'title' => 'Suite - 76m²', 'copy' => 'Như một căn hộ thu nhỏ, tách biệt các khoảng nghỉ, làm việc và sum vầy.', 'items' => array( 'Bếp & bàn làm việc riêng', 'Sofa, phòng nghỉ & ban công', 'Chăm sóc chuyên sâu mỗi ngày' ), 'chips' => array( 'Điều dưỡng trực 24/7', 'Nuôi con bằng sữa mẹ', 'Máy chiếu 4k', 'Xe đưa đón 2 chiều' ) ),
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
	<div class="ocu-room-cards"><?php foreach ( $rooms as $room_key => $room ) : ?><article class="ocu-room-card-large" data-room-open="<?php echo esc_attr( $room_key ); ?>" tabindex="0" role="button"><img src="<?php echo esc_url( $asset_uri . '/' . $room['image'] ); ?>" width="366" height="288" alt="<?php echo esc_attr( $room['title'] ); ?>" loading="lazy"><div class="ocu-room-card-large__meta"><span><?php echo esc_html( $room['level'] ); ?></span><small><?php echo esc_html( $room['number'] ); ?></small></div><h3><?php echo esc_html( $room['title'] ); ?></h3><p><?php echo esc_html( $room['copy'] ); ?></p><ul><?php foreach ( $room['items'] as $item ) : ?><li><?php echo esc_html( $item ); ?></li><?php endforeach; ?></ul><div class="ocu-room-card-large__services"><span class="ocu-room-card-large__services-label">Dịch vụ &amp; tiện nghi</span><div class="ocu-chip-list"><?php foreach ( $room['chips'] as $chip ) : ?><span><?php echo esc_html( $chip ); ?></span><?php endforeach; ?></div></div><a href="#dang-ky-tu-van">Xem ảnh &amp; tiện ích phòng <span>›</span></a></article><?php endforeach; ?></div></section>

	<div class="ocu-room-modal" data-room-modal data-room-data="<?php echo esc_attr( wp_json_encode( $room_popup_details ) ); ?>" hidden aria-hidden="true">
		<div class="ocu-room-modal__backdrop" data-room-close></div>
		<div class="ocu-room-modal__dialog" role="dialog" aria-modal="true" aria-labelledby="ocu-room-modal-title">
			<header class="ocu-room-modal__header"><div><p data-room-level></p><h2 id="ocu-room-modal-title" data-room-title></h2></div><button type="button" class="ocu-room-modal__close" data-room-close aria-label="Đóng popup">×</button></header>
			<div class="ocu-room-modal__variants"><button type="button" class="is-active" data-room-variant="0"></button><button type="button" data-room-variant="1"></button></div>
			<div class="ocu-room-modal__body"><div class="ocu-room-modal__gallery"><div class="ocu-room-modal__main-image"><img data-room-main-image src="" width="480" height="407" alt=""><div class="ocu-room-modal__gallery-controls"><button type="button" data-room-prev aria-label="Ảnh trước">‹</button><button type="button" data-room-next aria-label="Ảnh tiếp theo">›</button></div><span class="ocu-room-modal__counter" data-room-counter></span></div><div class="ocu-room-modal__thumbs" data-room-thumbs></div></div><div class="ocu-room-modal__amenities"><div><p>Dành cho mẹ</p><ul data-room-mother></ul></div><div><p>Dành cho bé</p><ul data-room-baby></ul></div><div><p>Phòng &amp; tiện nghi</p><ul data-room-amenities></ul></div></div></div>
			<footer class="ocu-room-modal__footer"><p data-room-description></p><button type="button" class="ocu-button ocu-button--primary" data-open-modal="vpc-consultation-modal" data-service="trung-tam-o-cu">Nhận tư vấn phòng này</button></footer>
		</div>
	</div>

	<section class="vpc-bao-mau__team ocu-shared-section" aria-labelledby="ocu-team-title"><div class="vpc-bao-mau__container"><div class="vpc-bao-mau__section-heading"><div class="vpc-bao-mau__badge"><img src="<?php echo esc_url( $shared_asset_uri . '/star.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true">Điều dưỡng viên</div><h2 id="ocu-team-title"><span>Đội Ngũ Của Chúng Tôi</span></h2><p>100% điều dưỡng viên được đào tạo chuyên sâu lĩnh vực sản nhi, đảm bảo đem đến dịch vụ an toàn, chuyên nghiệp cho mọi gia đình.</p></div><div class="vpc-bao-mau__team-viewport"><div class="vpc-bao-mau__team-grid"><?php foreach ( $team as $index => $member ) : ?><article class="vpc-bao-mau__team-card"><div class="vpc-bao-mau__team-image"><img src="<?php echo esc_url( $asset_uri . '/figma/team-' . ( $index + 1 ) . '.png' ); ?>" width="223" height="292" alt="<?php echo esc_attr( $member['name'] ); ?>" loading="lazy"></div><div><h3><?php echo esc_html( $member['name'] ); ?></h3><p><?php echo esc_html( $member['role'] ); ?></p></div></article><?php endforeach; ?></div></div></div></section>

	<section class="vpc-bao-mau__faq ocu-shared-section" aria-labelledby="ocu-faq-title"><div class="vpc-bao-mau__container"><div class="vpc-bao-mau__section-heading"><div class="vpc-bao-mau__badge"><img src="<?php echo esc_url( $shared_asset_uri . '/star.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true">FAQ</div><h2 id="ocu-faq-title"><span>Câu Hỏi Thường Gặp</span></h2><p>Vượt qua những kiêng cữ khắt khe, mẹ được thư giãn tối đa để phục hồi sức khỏe, tận hưởng trọn vẹn hành trình đón thiên thần nhỏ cùng dịch vụ ở cữ.</p></div><div class="vpc-bao-mau__faq-list"><details class="is-open" open><summary>Thời điểm nào là thích hợp để đặt phòng ở cữ ?</summary><p>Do số lượng phòng tại trung tâm ở cữ Vạn Phúc Care có giới hạn, kèm nhu cầu đăng ký dài ngày của các mẹ. Chúng tôi khuyến khích khách hàng đặt lịch phòng sớm nhất có thể, nhằm đảm bảo ngày phòng còn trống và chất lượng phục vụ luôn được chu đáo nhất.</p></details><details><summary>Người thân có được ở lại cùng mẹ và bé không ?</summary><p>Người thân có thể ở lại cùng mẹ và bé theo chính sách của từng hạng phòng. Đội ngũ Vạn Phúc Care sẽ hướng dẫn gia đình để đảm bảo sự riêng tư và không gian nghỉ ngơi của mẹ.</p></details><details><summary>Sử dụng dịch vụ ở cữ bé sẽ được chăm sóc ở đâu ?</summary><p>Bé được chăm sóc tại phòng dưỡng nhi riêng biệt, có điều dưỡng theo dõi 24/24, đảm bảo an toàn và hỗ trợ mẹ nghỉ ngơi trọn vẹn.</p></details><details><summary>Các ngày lễ, ngày tết trung tâm ở cữ có phụ thu không?</summary><p>Trung tâm có chính sách phụ thu riêng cho các ngày lễ, ngày Tết. Nhân viên tư vấn sẽ thông tin chi tiết khi mẹ đăng ký phòng.</p></details><details><summary>Trong thời gian lưu trú tại trung tâm ở cữ, nếu mẹ và bé gặp vấn đề về sức khoẻ sẽ xử lí như thế nào ?</summary><p>Mẹ và bé được điều dưỡng theo dõi sát sao trong suốt thời gian lưu trú. Khi phát hiện vấn đề bất thường, trung tâm sẽ xử lý theo quy trình và phối hợp cơ sở y tế phù hợp.</p></details></div></div></section>

	<?php get_template_part( 'template-parts/sections/feedback', null, array( 'items' => $feedback, 'image_prefix' => 'bao-mau', 'badge' => 'Khách hàng', 'description' => array( 'Trong hành trình cùng mẹ trải đầy yêu thương, Trung tâm ở cữ Vạn Phúc Care đã nhận được sự tin yêu của hàng ngàn Mẹ bỉm.' ) ) ); ?>

	<section id="dang-ky-tu-van" class="vpc-section vpc-gradient-consultation relative overflow-hidden">
		<div class="consultation-section-inner vpc-home-container">
			<div class="vpc-consultation-heading">
				<h2>
					<span class="vpc-consultation-heading__blue">Sẵn Sàng Bắt Đầu</span>
					<span class="vpc-consultation-heading__pink">Hành Trình Làm Mẹ <span class="vpc-lead-title-happiness">Hạnh Phúc</span></span>
				</h2>
			</div>

			<div class="vpc-consultation-card">
				<form id="vpc-section-consultation-form" class="vpc-consultation-form">
					<?php wp_nonce_field( 'vpc_consultation_nonce', 'vpc_consultation_nonce' ); ?>
					<input type="text" name="website" value="" tabindex="-1" autocomplete="off" aria-hidden="true" class="hidden">

					<div class="vpc-consultation-form__identity">
						<div class="vpc-consultation-field">
							<label><span class="text-text-error-default">*</span> Họ và tên</label>
							<input type="text" name="customer_name" required placeholder="Nguyễn Như Linh" class="vpc-consultation-control">
						</div>
						<div class="vpc-consultation-field">
							<label><span class="text-text-error-default">*</span> Số điện thoại</label>
							<input type="tel" name="customer_phone" required placeholder="0345678***" class="vpc-consultation-control">
						</div>
					</div>

					<div class="vpc-consultation-field">
						<?php
						get_template_part( 'template-parts/components/custom-select', null, [
							'id'          => 'ocu-section-service',
							'name'        => 'service',
							'label'       => 'Dịch vụ quan tâm',
							'placeholder' => 'Chọn dịch vụ',
							'required'    => true,
							'value'       => 'trung-tam-o-cu',
							'options'     => $consultation_services,
						] );
						?>
					</div>

					<fieldset class="vpc-consultation-field vpc-consultation-stage">
						<legend><span class="text-text-error-default">*</span> Giai đoạn thai kỳ</legend>
						<div class="vpc-consultation-stage__options" role="radiogroup" aria-label="Giai đoạn thai kỳ">
							<label><input type="radio" name="pregnancy_stage" value="dang-mang-thai" checked required><span>Đang mang thai</span></label>
							<label><input type="radio" name="pregnancy_stage" value="chuan-bi-mang-thai" required><span>Chuẩn bị mang thai</span></label>
							<label><input type="radio" name="pregnancy_stage" value="da-sinh-be" required><span>Đã sinh bé</span></label>
						</div>
					</fieldset>

					<div class="vpc-consultation-field">
						<?php
						get_template_part( 'template-parts/components/custom-select', null, [
							'id'          => 'ocu-section-gestational-age',
							'name'        => 'gestational_age',
							'label'       => 'Tuần thai',
							'placeholder' => 'Chọn giai đoạn',
							'required'    => true,
							'options'     => $gestational_age_options,
						] );
						?>
					</div>

					<div class="vpc-consultation-field">
						<label>Ghi chú</label>
						<input type="text" name="customer_note" placeholder="Cho chúng tôi biết thêm về nhu cầu của bạn!" class="vpc-consultation-control">
					</div>

					<div class="vpc-consultation-submit"><button type="submit" class="vpc-button">Gửi yêu cầu tư vấn</button></div>
				</form>
			</div>
		</div>
	</section>

	<section class="vpc-bao-mau__services ocu-shared-section" aria-labelledby="ocu-services-title"><div class="vpc-bao-mau__container"><div class="vpc-bao-mau__section-heading"><h2 id="ocu-services-title"><span>Các Dịch Vụ Khác</span></h2></div><div class="vpc-bao-mau__services-carousel"><button class="vpc-bao-mau__services-arrow vpc-bao-mau__services-arrow--prev" type="button" aria-label="Dịch vụ trước" aria-controls="ocu-services-viewport"><img src="<?php echo esc_url( $shared_asset_uri . '/chevron-left.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true"></button><div id="ocu-services-viewport" class="vpc-bao-mau__services-viewport"><div class="vpc-bao-mau__services-track"><?php foreach ( $other_services as $service ) : ?><a class="vpc-bao-mau__service-card" href="<?php echo esc_url( $service['href'] ); ?>"><img src="<?php echo esc_url( $shared_asset_uri . '/' . $service['image'] ); ?>" width="300" height="240" alt="<?php echo esc_attr( $service['title'] ); ?>" loading="lazy"><h3><?php echo esc_html( $service['title'] ); ?></h3></a><?php endforeach; ?></div></div><button class="vpc-bao-mau__services-arrow vpc-bao-mau__services-arrow--next" type="button" aria-label="Dịch vụ tiếp theo" aria-controls="ocu-services-viewport"><img src="<?php echo esc_url( $shared_asset_uri . '/chevron-left.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true"></button></div></div></section>
</main>

<?php get_footer(); ?>
