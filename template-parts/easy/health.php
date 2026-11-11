<?php
/**
 * EASY - Electronic Health Book Section.
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$asset_uri = trailingslashit( get_template_directory_uri() ) . 'assets/images/easy';
?>
<section class="vpc-easy__health" aria-labelledby="easy-health-title">
	<div class="vpc-easy__container vpc-easy__split-grid">
		<div class="vpc-easy__split-image">
			<img src="<?php echo esc_url( $asset_uri . '/health-book.png' ); ?>" width="540" height="456" alt="Sổ sức khỏe điện tử" loading="lazy">
		</div>
		<div class="vpc-easy__split-copy">
			<div class="vpc-easy__badge"><img src="<?php echo esc_url( $asset_uri . '/star.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true">SỔ SỨC KHỎE ĐIỆN TỬ</div>
			<h2 id="easy-health-title"><span>Sổ Sức Khỏe Điện Tử - <span class="vpc-easy__mobile-title-break vpc-health-title-assistant">Trợ Lý</span></span><em>Giúp Mẹ Nuôi Con Easy</em></h2>
			<p>Tích hợp ứng dụng theo dõi sức khoẻ của bé ngay trên điện thoại cha mẹ:</p>
			<ul class="vpc-easy__icon-list">
				<li><img src="<?php echo esc_url( $asset_uri . '/check-badge.svg' ); ?>" width="24" height="24" alt="">Dễ dàng truy vấn lịch sử sức khỏe của con mọi lúc, mọi nơi</li>
				<li><img src="<?php echo esc_url( $asset_uri . '/check-badge.svg' ); ?>" width="24" height="24" alt="">Lưu trữ mọi thông tin về sức khỏe của bé</li>
				<li><img src="<?php echo esc_url( $asset_uri . '/check-badge.svg' ); ?>" width="24" height="24" alt="">Tạo ticket yêu cầu hỗ trợ ngay khi cha mẹ cần sự trợ giúp.</li>
				<li><img src="<?php echo esc_url( $asset_uri . '/check-badge.svg' ); ?>" width="24" height="24" alt="">Liên kết khóa học trực tuyến, dễ tiếp nhận kiến thức nuôi con chuẩn xác.</li>
			</ul>
		</div>
	</div>
</section>

