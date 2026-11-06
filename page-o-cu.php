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

$asset_uri = trailingslashit( get_template_directory_uri() ) . 'assets/images/o-cu';
?>

<main class="vpc-o-cu" data-figma-node="3123:33008">
	<section class="ocu-hero" data-figma-node="3123:33010">
		<div class="ocu-hero__content">
			<span class="ocu-badge">
				<img src="<?php echo esc_url( $asset_uri . '/star.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true">
				TRUNG TÂM Ở CỮ
			</span>

			<h1 class="ocu-hero__title">
				<span class="ocu-heading--blue">Tĩnh Dưỡng Thảnh Thơi</span>
				<span class="ocu-heading--pink">Mẹ Khỏe Mạnh - Con Vững Vàng</span>
			</h1>
			<p class="ocu-hero__description">Trung tâm ở cữ Vạn Phúc Care đem đến dịch vụ chăm sóc sau sinh toàn diện, giúp Mẹ và Bé yêu được nghỉ dưỡng trọn vẹn và nhanh chóng phục hồi sức khỏe.</p>

			<div class="ocu-highlights" aria-label="Điểm nổi bật của trung tâm">
				<div class="ocu-highlight">
					<div class="ocu-highlight__heading"><img src="<?php echo esc_url( $asset_uri . '/amenities.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true"><h2>Không gian</h2></div>
					<p>Tiện nghi nghỉ dưỡng cao cấp</p>
				</div>
				<div class="ocu-highlight">
					<div class="ocu-highlight__heading"><img src="<?php echo esc_url( $asset_uri . '/dedicated.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true"><h2>Trải nghiệm</h2></div>
					<p>Thoải mái như ở nhà</p>
				</div>
				<div class="ocu-highlight">
					<div class="ocu-highlight__heading"><img src="<?php echo esc_url( $asset_uri . '/quality.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true"><h2>Hài lòng</h2></div>
					<p>4.9/5 <span aria-label="5 sao">★★★★★</span></p>
				</div>
			</div>

			<img class="ocu-hero__image" src="<?php echo esc_url( $asset_uri . '/hero-nurses-babies.png' ); ?>" width="800" height="450" alt="Điều dưỡng Vạn Phúc Care chăm sóc em bé" fetchpriority="high">

			<div class="ocu-actions">
				<a class="ocu-button ocu-button--primary" href="#dang-ky-tu-van">Đăng ký tư vấn</a>
				<a class="ocu-button ocu-button--secondary" href="#khong-gian">Xem Không Gian</a>
			</div>
		</div>
	</section>

	<section class="ocu-benefits" data-figma-node="3123:33025">
		<div class="ocu-section-heading">
			<span class="ocu-badge"><img src="<?php echo esc_url( $asset_uri . '/star.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true">TIỆN ÍCH CHUNG</span>
			<h2><span class="ocu-heading--blue">Đặc Quyền</span> <span class="ocu-heading--pink">Dành Cho Mẹ</span></h2>
			<p>Vượt qua những định kiến kiêng cữ khắt khe, mẹ được thư giãn tối đa để phục hồi sức khỏe,<br class="ocu-desktop-break"> và tận hưởng trọn vẹn hành trình đón thiên thần nhỏ.</p>
		</div>
		<div class="ocu-benefit-grid">
			<div class="ocu-benefit-row ocu-benefit-row--two">
				<article class="ocu-benefit-card"><span class="ocu-benefit-card__icon"><img src="<?php echo esc_url( $asset_uri . '/monitoring.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true"></span><h3>Theo dõi sức khỏe 24/7</h3><p>Ekip điều dưỡng trực, giám sát sức khỏe của mẹ và bé liên tục bằng thiết bị tiên tiến. Mọi chỉ số sinh hiệu đều được ghi nhận và phản hồi tức thì.</p></article>
				<article class="ocu-benefit-card"><span class="ocu-benefit-card__icon"><img src="<?php echo esc_url( $asset_uri . '/breast-milk.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true"></span><h3>Nuôi con bằng sữa mẹ</h3><p>Được điều dưỡng trưởng hỗ trợ 1:1, giúp mẹ xây dựng hành trình nuôi con bằng sữa mẹ tự tin, trọn vẹn, đong đầy yêu thương.</p></article>
			</div>
			<div class="ocu-benefit-row ocu-benefit-row--three">
				<article class="ocu-benefit-card"><span class="ocu-benefit-card__icon"><img src="<?php echo esc_url( $asset_uri . '/premium-kitchen.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true"></span><h3>Chế độ dinh dưỡng</h3><p>Đảm bảo dinh dưỡng phù hợp với thể trạng người mẹ, để mẹ mau lại sức, về nhiều sữa. Đảm bảo cữ bú phù hợp cho trẻ sơ sinh, loại bỏ hiện tượng no giả, bỏ bữa, chán bú.</p></article>
				<article class="ocu-benefit-card"><span class="ocu-benefit-card__icon"><img src="<?php echo esc_url( $asset_uri . '/spa.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true"></span><h3>Không gian hồi phục riêng tư</h3><p>Phòng nghỉ dưỡng của mẹ được đảm bảo yên tĩnh, mùi hương gỗ thoảng nhẹ và an lành. Tiện nghi đầy đủ, hiện đại, tuỳ biến theo hạng phòng.</p></article>
				<article class="ocu-benefit-card"><span class="ocu-benefit-card__icon"><img src="<?php echo esc_url( $asset_uri . '/nursery-room.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true"></span><h3>Phòng dưỡng nhi</h3><p>Khu vực chăm sóc trẻ sơ sinh riêng biệt với công nghệ giám sát AI thời gian thực. Cho phép mẹ nghỉ ngơi trọn vẹn trong khi bé luôn được theo dõi an toàn.</p></article>
			</div>
		</div>
	</section>

	<section id="khong-gian" class="ocu-nursery" data-figma-node="3123:33039">
		<div class="ocu-section-heading">
			<span class="ocu-badge"><img src="<?php echo esc_url( $asset_uri . '/star.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true">PHÒNG DƯỠNG NHI</span>
			<h2><span class="ocu-heading--blue">Khu Vực Chăm Sóc</span><span class="ocu-heading--pink">Phòng Dưỡng Nhi Riêng Biệt</span></h2>
			<p>Khu vực chăm sóc riêng biệt dành cho bé, tách biệt với phòng nghỉ của mẹ.<br class="ocu-desktop-break"> Điều dưỡng viên chăm bé suốt ngày đêm, mẹ an tâm nghỉ ngơi phục hồi.</p>
		</div>
		<div class="ocu-room-bento">
			<div class="ocu-room-bento__hero"><img src="<?php echo esc_url( $asset_uri . '/room-hero.png' ); ?>" width="616" height="480" alt="Phòng dưỡng nhi riêng tại Vạn Phúc Care" loading="lazy"><span><strong>30m²</strong> Phòng dưỡng nhi riêng</span></div>
			<div class="ocu-room-bento__side">
				<article class="ocu-room-card ocu-room-card--feature"><div><span class="ocu-room-card__eyebrow">MÔI TRƯỜNG VÔ KHUẨN</span><h3>Kiểm soát nhiễm khuẩn</h3></div><p>Quy trình kiểm soát nhiễm khuẩn chéo được giám sát nghiêm ngặt.</p><div class="ocu-chip-list"><span>Phòng riêng, tách biệt</span><span>Mỗi bé một nôi riêng</span><span>Thiết bị khử khuẩn hiện đại</span></div></article>
				<div class="ocu-room-bento__thumbs"><img src="<?php echo esc_url( $asset_uri . '/room-2.png' ); ?>" width="300" height="180" alt="Không gian phòng dưỡng nhi" loading="lazy"><img src="<?php echo esc_url( $asset_uri . '/room-3.png' ); ?>" width="300" height="180" alt="Tiện nghi tại phòng dưỡng nhi" loading="lazy"></div>
			</div>
		</div>
		<div class="ocu-room-points">
			<article><strong>01</strong><h3>Không gian sáng, an lành</h3><p>Môi trường yên tĩnh, thoáng sáng giúp bé thích nghi nhẹ nhàng những ngày đầu đời.</p></article>
			<article><strong>02</strong><h3>Điều dưỡng túc trực suốt ngày đêm</h3><p>Tối đa 10 nôi, tối thiểu 2 điều dưỡng viên trực.</p></article>
			<article><strong>03</strong><h3>Không gian nghỉ dưỡng cho mẹ</h3><p>Mẹ được nghỉ ngơi trong không gian sang trọng và cao cấp nhưng vẫn theo sát sự phát triển của con.</p></article>
		</div>
	</section>

	<section id="dang-ky-tu-van" class="ocu-cta">
		<div>
			<h2><span class="ocu-heading--blue">Sẵn sàng cho</span> <span class="ocu-heading--pink">kỳ nghỉ hồi phục?</span></h2>
			<p>Để đội ngũ Vạn Phúc Care tư vấn gói ở cữ phù hợp nhất với gia đình bạn.</p>
		</div>
		<a class="ocu-button ocu-button--primary" href="<?php echo esc_url( home_url( '/lien-he/' ) ); ?>">Tư vấn miễn phí</a>
	</section>
</main>

<?php get_footer(); ?>
