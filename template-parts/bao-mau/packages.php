<?php
/**
 * Bao Mau - Service Packages Section (Gói Dịch Vụ).
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$button_attrs = 'data-open-modal="vpc-consultation-modal" data-service="bao-mau-tai-nha"';

$packages = array(
	array( 'name' => 'Gói Linh Hoạt', 'price' => '80.000 VNĐ/h', 'copy' => 'Phù hợp với gia đình cần hỗ trợ chăm sóc bé ban ngày.' ),
	array( 'name' => 'Gói Thảnh Thơi', 'price' => '90.000VNĐ/h', 'copy' => 'Phù hợp với gia đình cần hỗ trợ chăm sóc bé vào buổi tối và đêm muộn.' ),
	array( 'name' => 'Gói An Tâm', 'price' => '70.000 VNĐ/h', 'copy' => 'Phù hợp với gia đình bận rộn, cần giải pháp chăm sóc bé toàn thời gian.' ),
);

$package_benefits = array(
	'Đầy đủ quy trình chăm sóc bé',
	'Đồng hành giải đáp thắc mắc cho mẹ',
	'Quyền sử dụng sổ sức khỏe điện tử',
	'Kênh hỗ trợ khách hàng riêng',
);
?>
<section id="bao-mau-packages" class="vpc-bao-mau__packages">
	<div class="vpc-bao-mau__container">
		<div class="vpc-bao-mau__section-heading vpc-bao-mau__section-heading--packages">
			<h2><span>Gói Dịch Vụ</span></h2>
			<p>Đa dạng thời gian giúp cha mẹ dễ dàng tìm kiếm giải pháp phù hợp với gia đình mình.<br>Chúng tôi cam kết đem đến niềm an tâm và chất lượng dịch vụ hoàn hảo.</p>
		</div>
		<div class="vpc-bao-mau__package-grid">
			<?php foreach ( $packages as $package_index => $package ) : ?>
				<article class="vpc-bao-mau__package-card">
					<div class="vpc-bao-mau__package-top"><h3><?php echo esc_html( $package['name'] ); ?></h3><strong><?php echo esc_html( $package['price'] ); ?></strong><p><?php echo esc_html( $package['copy'] ); ?></p></div>
					<h4>Quyền lợi:</h4>
					<ul class="vpc-bao-mau__package-benefits">
						<li><?php echo 2 === $package_index ? '24/24' : '10 - 12 tiếng/ ngày'; ?></li>
						<?php foreach ( $package_benefits as $benefit ) : ?><li><?php echo esc_html( $benefit ); ?></li><?php endforeach; ?>
					</ul>
					<button type="button" class="vpc-bao-mau__button vpc-bao-mau__button--primary" <?php echo $button_attrs; ?>>Tư vấn gói này</button>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

