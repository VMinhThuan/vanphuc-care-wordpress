<?php
/**
 * Bath - Electronic Health Book Section.
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$bath_uri   = trailingslashit( get_template_directory_uri() ) . 'assets/images/bath';
$shared_uri = trailingslashit( get_template_directory_uri() ) . 'assets/images/easy';
?>
<section class="vpc-bath__health" aria-labelledby="bath-health-title">
	<div class="vpc-bath__container vpc-bath__split-grid">
		<div class="vpc-bath__split-image">
			<picture>
				<source media="(max-width: 767px)" srcset="<?php echo esc_url( $bath_uri . '/health-book-mobile.svg' ); ?>">
				<img src="<?php echo esc_url( $bath_uri . '/health-book.svg' ); ?>" width="576" height="492" alt="Sổ sức khỏe điện tử" loading="lazy">
			</picture>
		</div>
		<div class="vpc-bath__split-copy">
			<div class="vpc-bath__badge"><img src="<?php echo esc_url( $shared_uri . '/star.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true">SỔ SỨC KHỎE ĐIỆN TỬ</div>
			<h2 id="bath-health-title"><span>Sổ Sức Khỏe Điện Tử - <span class="vpc-bath__health-title-assistant vpc-health-title-assistant">Trợ Lý</span></span><em>Giúp Mẹ Nuôi Con Easy</em></h2>
			<p>Vạn Phúc Care là đơn vị tiên phong triển khai Sổ sức khỏe điện tử dành cho trẻ sơ sinh</p>
			<ul class="vpc-bath__icon-list">
				<li><img src="<?php echo esc_url( $shared_uri . '/check-badge.svg' ); ?>" width="24" height="24" alt="">Giúp mẹ dễ dàng truy vấn lịch sử sức khỏe của con mọi lúc, mọi nơi</li>
				<li><img src="<?php echo esc_url( $shared_uri . '/check-badge.svg' ); ?>" width="24" height="24" alt="">Lưu trữ mọi thông tin về sức khỏe của bé</li>
				<li><img src="<?php echo esc_url( $shared_uri . '/check-badge.svg' ); ?>" width="24" height="24" alt="">Dễ dàng tạo ticket yêu cầu hỗ trợ đến đội ngũ chuyên gia của chúng tôi</li>
				<li><img src="<?php echo esc_url( $shared_uri . '/check-badge.svg' ); ?>" width="24" height="24" alt="">Liên kết với hệ thống khóa học trực tuyến, tiếp nhận kiến thức nuôi con chuẩn xác một cách đơn giản nhất</li>
			</ul>
		</div>
	</div>
</section>

