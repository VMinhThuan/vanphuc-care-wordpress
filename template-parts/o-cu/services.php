<?php
/**
 * O Cu - Other Services Section (Các Dịch Vụ Khác).
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$shared_asset_uri = trailingslashit( get_template_directory_uri() ) . 'assets/images/bao-mau';

$other_services = array(
	array( 'image' => 'service-1.jpg', 'title' => 'Bảo mẫu tại nhà', 'href' => home_url( '/dich-vu/bao-mau-tai-nha/' ) ),
	array( 'image' => 'service-2.jpg', 'title' => 'Khóa học trực tuyến', 'href' => 'https://edu.vanphuccare.vn' ),
	array( 'image' => 'service-3.jpg', 'title' => 'Lớp học tiền sản', 'href' => home_url( '/dich-vu/lop-hoc-tien-san/' ) ),
	array( 'image' => 'service-4.jpg', 'title' => 'Tư vấn nuôi con Easy', 'href' => home_url( '/dich-vu/dich-vu-tu-van-nuoi-con-easy-truc-tuyen/' ) ),
	array( 'image' => 'service-5.jpg', 'title' => 'Tắm bé sơ sinh', 'href' => home_url( '/dich-vu/tam-tre-so-sinh/' ) ),
	array( 'image' => 'service-6.jpg', 'title' => 'Thông tắc tia sữa', 'href' => home_url( '/dich-vu/thong-tac-tia-sua/' ) ),
);
?>
<section class="vpc-bao-mau__services ocu-shared-section" aria-labelledby="ocu-services-title">
	<div class="vpc-bao-mau__container">
		<div class="vpc-bao-mau__section-heading">
			<h2 id="ocu-services-title"><span>Các Dịch Vụ Khác</span></h2>
		</div>
		<div class="vpc-bao-mau__services-carousel">
			<button class="vpc-bao-mau__services-arrow vpc-bao-mau__services-arrow--prev" type="button" aria-label="Dịch vụ trước" aria-controls="ocu-services-viewport">
				<img src="<?php echo esc_url( $shared_asset_uri . '/chevron-left.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true">
			</button>
			<div id="ocu-services-viewport" class="vpc-bao-mau__services-viewport">
				<div class="vpc-bao-mau__services-track">
					<?php foreach ( $other_services as $service ) : ?>
						<a class="vpc-bao-mau__service-card" href="<?php echo esc_url( $service['href'] ); ?>">
							<img src="<?php echo esc_url( $shared_asset_uri . '/' . $service['image'] ); ?>" width="300" height="240" alt="<?php echo esc_attr( $service['title'] ); ?>" loading="lazy">
							<h3><?php echo esc_html( $service['title'] ); ?></h3>
						</a>
					<?php endforeach; ?>
				</div>
			</div>
			<button class="vpc-bao-mau__services-arrow vpc-bao-mau__services-arrow--next" type="button" aria-label="Dịch vụ tiếp theo" aria-controls="ocu-services-viewport">
				<img src="<?php echo esc_url( $shared_asset_uri . '/chevron-left.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true">
			</button>
		</div>
	</div>
</section>

