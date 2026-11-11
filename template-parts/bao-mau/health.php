<?php
/**
 * Bao Mau - Electronic Health Book Section.
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$asset_uri       = trailingslashit( get_template_directory_uri() ) . 'assets/images/bao-mau';
$health_book_uri = trailingslashit( get_template_directory_uri() ) . 'assets/images/easy/health-book.png';
?>
<section class="vpc-bao-mau__intro vpc-bao-mau__intro--health">
	<div class="vpc-bao-mau__container vpc-bao-mau__intro-grid">
		<div class="vpc-bao-mau__intro-image-frame vpc-bao-mau__intro-image-frame--health">
			<img class="vpc-bao-mau__intro-image" src="<?php echo esc_url( $health_book_uri ); ?>" width="540" height="456" alt="Sổ sức khỏe điện tử cho trẻ sơ sinh" loading="lazy">
		</div>
		<div class="vpc-bao-mau__intro-copy">
			<div class="vpc-bao-mau__badge"><img src="<?php echo esc_url( $asset_uri . '/star.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true">SỔ SỨC KHỎE ĐIỆN TỬ</div>
			<h2><span>Sổ Sức Khỏe Điện Tử - <span class="vpc-health-title-assistant">Trợ Lý</span></span><em>Giúp Mẹ Nuôi Con Easy</em></h2>
			<p>Vạn Phúc Care là đơn vị tiên phong ứng dụng số hoá dữ liệu sức khoẻ, triển khai sổ sức khỏe điện tử dành cho trẻ sơ sinh:</p>
			<ul class="vpc-bao-mau__check-list">
				<li>Giúp mẹ dễ dàng truy vấn lịch sử sức khỏe của con mọi lúc, mọi nơi.</li>
				<li>Lưu trữ mọi thông tin về sức khỏe của bé.</li>
				<li>Dễ dàng tạo ticket yêu cầu hỗ trợ.</li>
				<li>Liên kết với hệ thống khóa học trực tuyến, tiếp nhận kiến thức nuôi con chuẩn xác một cách đơn giản nhất.</li>
			</ul>
		</div>
	</div>
</section>

