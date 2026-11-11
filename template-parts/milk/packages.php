<?php
/**
 * Milk - Service Packages Section (Gói Dịch Vụ).
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$shared_uri   = trailingslashit( get_template_directory_uri() ) . 'assets/images/easy';
$button_attrs = 'data-open-modal="vpc-consultation-modal" data-service="thong-tac-tia-sua"';

$packages = array(
	array( 'name' => 'Gói buổi lẻ', 'price' => '450.000 VNĐ', 'featured' => false, 'benefits' => array( '60 phút/buổi', 'Đầy đủ liệu trình', 'Nhân sự: Điều dưỡng viên' ) ),
	array( 'name' => 'Gói 3 buổi', 'price' => '1.200.000 VNĐ', 'featured' => true, 'benefits' => array( '60 phút/ buổi', 'Đầy đủ liệu trình', 'Quà tặng: khóa học nuôi con bằng sữa mẹ' ) ),
	array( 'name' => 'Gói 5 buổi', 'price' => '1.750.000 VNĐ', 'featured' => false, 'benefits' => array( '60 phút/buổi', 'Đầy đủ liệu trình', 'Quà tặng: khóa học nuôi con bằng sữa mẹ' ) ),
);
?>
<section id="milk-packages" class="vpc-milk__packages" aria-labelledby="milk-packages-title">
	<div class="vpc-milk__container">
		<div class="vpc-milk__section-heading">
			<h2 id="milk-packages-title">Gói Dịch Vụ</h2>
			<p class="vpc-milk__responsive-copy vpc-milk__responsive-copy--desktop">Gỡ bỏ âu lo, dịu lành từng cơn đau tức,<br>Thông tia tia sữa cho dòng sữa ngọt lành.</p>
			<p class="vpc-milk__responsive-copy vpc-milk__responsive-copy--mobile">Trong hành trình cùng mẹ trải đầy yêu thương, Vạn Phúc Care đã nhận được sự tin yêu của hàng ngàn Mẹ&nbsp;bỉm.</p>
		</div>
		<div class="vpc-milk__package-grid">
			<?php foreach ( $packages as $package ) : ?>
				<article class="vpc-milk__package-card<?php echo $package['featured'] ? ' is-featured' : ''; ?>">
					<?php if ( $package['featured'] ) : ?>
						<span class="vpc-milk__featured">★ Được lựa chọn nhiều</span>
					<?php endif; ?>
					<div class="vpc-milk__package-heading">
						<h3><?php echo esc_html( $package['name'] ); ?></h3>
						<strong><?php echo esc_html( $package['price'] ); ?></strong>
					</div>
					<div class="vpc-milk__package-content">
						<p class="vpc-milk__package-copy">Linh hoạt thời gian cho mẹ nghỉ ngơi, bé được chăm sóc chuẩn y khoa</p>
						<h4>Quyền lợi</h4>
						<ul>
							<?php foreach ( $package['benefits'] as $benefit ) : ?>
								<li><img src="<?php echo esc_url( $shared_uri . '/check-badge.svg' ); ?>" width="24" height="24" alt=""><?php echo esc_html( $benefit ); ?></li>
							<?php endforeach; ?>
						</ul>
					</div>
					<button type="button" class="vpc-milk__package-button" <?php echo $button_attrs; ?>>Tư vấn gói này</button>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

