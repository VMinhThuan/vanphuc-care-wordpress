<?php
/**
 * Bath - Service Packages Section (Gói Dịch Vụ).
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$shared_uri   = trailingslashit( get_template_directory_uri() ) . 'assets/images/easy';
$button_attrs = 'data-open-modal="vpc-consultation-modal" data-service="tam-be-tai-nha"';

$packages = array(
	array( 'name' => 'Gói 10 buổi', 'price' => '1.000.000 VNĐ', 'gift' => false, 'featured' => false ),
	array( 'name' => 'Gói 20 buổi', 'price' => '1.900.000 VNĐ', 'gift' => true, 'featured' => true ),
	array( 'name' => 'Gói 30 buổi', 'price' => '2.700.000 VNĐ', 'gift' => true, 'featured' => false ),
);
?>
<section id="bath-packages" class="vpc-bath__packages" aria-labelledby="bath-packages-title">
	<div class="vpc-bath__container">
		<div class="vpc-bath__section-heading">
			<h2 id="bath-packages-title">Gói Dịch Vụ</h2>
			<p><span class="vpc-bath__package-description-first-line">Chăm con vẹn tròn khởi nguồn từ điều giản&nbsp;đơn,</span><span class="vpc-bath__package-description-line">Tắm bé và vệ sinh đúng chuẩn ngay từ những ngày đầu.</span></p>
		</div>
		<div class="vpc-bath__package-grid">
			<?php foreach ( $packages as $package ) : ?>
				<article class="vpc-bath__package-card<?php echo $package['featured'] ? ' is-featured' : ''; ?>">
					<?php if ( $package['featured'] ) : ?>
						<span class="vpc-bath__featured">★ Được lựa chọn nhiều</span>
					<?php endif; ?>
					<div class="vpc-bath__package-heading">
						<h3><?php echo esc_html( $package['name'] ); ?></h3>
						<strong><?php echo esc_html( $package['price'] ); ?></strong>
					</div>
					<p class="vpc-bath__package-copy">Linh hoạt thời gian cho mẹ nghỉ ngơi, bé được chăm sóc chuẩn y khoa</p>
					<h4>Quyền lợi</h4>
					<ul>
						<li><img src="<?php echo esc_url( $shared_uri . '/check-badge.svg' ); ?>" width="24" height="24" alt="">Tùy chọn thời gian thực hiện</li>
						<li><img src="<?php echo esc_url( $shared_uri . '/check-badge.svg' ); ?>" width="24" height="24" alt="">Đầy đủ liệu trình</li>
						<?php if ( $package['gift'] ) : ?>
							<li><img src="<?php echo esc_url( $shared_uri . '/check-badge.svg' ); ?>" width="24" height="24" alt="">Quà tặng: Khóa học các bệnh lý thường gặp ở trẻ sơ sinh</li>
						<?php endif; ?>
					</ul>
					<button type="button" class="vpc-bath__package-button" <?php echo $button_attrs; ?>>Tư vấn gói này</button>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

