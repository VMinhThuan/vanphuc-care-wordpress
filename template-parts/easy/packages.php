<?php
/**
 * EASY - Service Packages Section (Gói Dịch Vụ).
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$asset_uri    = trailingslashit( get_template_directory_uri() ) . 'assets/images/easy';
$button_attrs = 'data-open-modal="vpc-consultation-modal" data-service="tu-van-nuoi-con-easy"';
?>
<section id="easy-packages" class="vpc-easy__packages" aria-labelledby="easy-packages-title">
	<div class="vpc-easy__container">
		<div class="vpc-easy__section-heading">
			<h2 id="easy-packages-title">Gói Dịch Vụ</h2>
			<p>Giải pháp linh hoạt giúp cha mẹ loại bỏ những khúc mắc trong hành trình chăm sóc con nhỏ,<br>Để mỗi giờ bên con đều trở thành trải nghiệm tuyệt vời nhất!</p>
		</div>
		<div class="vpc-easy__package-grid">
			<article class="vpc-easy__package-card">
				<div class="vpc-easy__package-heading">
					<h3>Tư vấn trực tuyến</h3>
					<strong>500.000 VNĐ</strong>
				</div>
				<div class="vpc-easy__facts">
					<div><span>Thời lượng</span><b>30 phút/buổi</b></div>
					<div><span>Hình thức</span><b>1:1 qua Google Meet</b></div>
					<div><span>Theo dõi</span><b>07 ngày</b></div>
				</div>
				<h4>Quyền lợi</h4>
				<ul>
					<?php foreach ( array( 'Tiếp nhận & đánh giá tình trạng ban đầu của trẻ', 'Lộ trình lịch sinh hoạt mẫu thiết lập riêng theo đặc điểm của trẻ', 'Thiết lập sổ sức khỏe điện tử cho bé', 'Tài liệu & quà tặng' ) as $benefit ) : ?>
						<li><img src="<?php echo esc_url( $asset_uri . '/check-badge.svg' ); ?>" width="24" height="24" alt=""><?php echo esc_html( $benefit ); ?></li>
					<?php endforeach; ?>
				</ul>
				<button type="button" class="vpc-easy__package-button" <?php echo $button_attrs; ?>>Tư vấn gói này</button>
			</article>
			<article class="vpc-easy__package-card is-featured">
				<span class="vpc-easy__featured">★ Được lựa chọn nhiều</span>
				<div class="vpc-easy__package-heading">
					<h3>Tư vấn trực tiếp</h3>
					<strong>800.000 VNĐ</strong>
				</div>
				<div class="vpc-easy__facts">
					<div><span>Thời lượng</span><b>30 phút/buổi</b></div>
					<div><span>Hình thức</span><b>Tại nhà khách hàng hoặc tại trung tâm ở cữ</b></div>
					<div><span>Theo dõi</span><b>10 ngày</b></div>
				</div>
				<h4>Quyền lợi</h4>
				<ul>
					<?php foreach ( array( 'Quan sát và đánh giá thói quen sinh hoạt của bé trực tiếp', 'Lộ trình lịch sinh hoạt mẫu thiết lập riêng theo đặc điểm của trẻ', 'Thiết lập sổ sức khỏe điện tử cho bé', 'Tài liệu & quà tặng' ) as $benefit ) : ?>
						<li><img src="<?php echo esc_url( $asset_uri . '/check-badge.svg' ); ?>" width="24" height="24" alt=""><?php echo esc_html( $benefit ); ?></li>
					<?php endforeach; ?>
				</ul>
				<button type="button" class="vpc-easy__package-button" <?php echo $button_attrs; ?>>Tư vấn gói này</button>
			</article>
		</div>
	</div>
</section>

