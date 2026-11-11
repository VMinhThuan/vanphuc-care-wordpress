<?php
/**
 * Prenatal - Other Services Carousel Section.
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$theme_uri         = get_template_directory_uri();
$service_asset_uri = trailingslashit( $theme_uri ) . 'assets/images/bao-mau';
?>
<section class="vpc-section vpc-bao-mau vpc-bao-mau__services" aria-labelledby="prenatal-services-title">
	<div class="vpc-bao-mau__container">
		<div class="vpc-bao-mau__section-heading">
			<h2 id="prenatal-services-title"><span>Các Dịch Vụ Khác</span></h2>
		</div>
		<div class="vpc-bao-mau__services-carousel">
			<button class="vpc-bao-mau__services-arrow vpc-bao-mau__services-arrow--prev" type="button" aria-label="Dịch vụ trước" aria-controls="prenatal-services-viewport"><img src="<?php echo esc_url( $service_asset_uri . '/chevron-left.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true"></button>
			<div id="prenatal-services-viewport" class="vpc-bao-mau__services-viewport" data-services-viewport>
			<div class="vpc-bao-mau__services-track">
				<a class="vpc-bao-mau__service-card" href="<?php echo esc_url( home_url( '/dich-vu/trung-tam-o-cu/' ) ); ?>">
					<img src="<?php echo esc_url( $service_asset_uri . '/service-1.jpg' ); ?>" width="300" height="240" alt="Trung tâm ở cữ" loading="lazy">
					<h3>Trung tâm ở cữ</h3>
				</a>
				<a class="vpc-bao-mau__service-card" href="https://edu.vanphuccare.vn" target="_blank" rel="noopener noreferrer">
					<img src="<?php echo esc_url( $service_asset_uri . '/service-2.jpg' ); ?>" width="300" height="240" alt="Khóa học trực tuyến" loading="lazy">
					<h3>Khóa học trực tuyến</h3>
				</a>
				<a class="vpc-bao-mau__service-card" href="<?php echo esc_url( home_url( '/dich-vu/bao-mau-tai-nha/' ) ); ?>">
					<img src="<?php echo esc_url( $service_asset_uri . '/service-3.jpg' ); ?>" width="300" height="240" alt="Bảo mẫu tại nhà" loading="lazy">
					<h3>Bảo mẫu tại nhà</h3>
				</a>
				<a class="vpc-bao-mau__service-card" href="<?php echo esc_url( home_url( '/dich-vu/dich-vu-tu-van-nuoi-con-easy-truc-tuyen/' ) ); ?>">
					<img src="<?php echo esc_url( $service_asset_uri . '/service-4.jpg' ); ?>" width="300" height="240" alt="Tư vấn nuôi con Easy" loading="lazy">
					<h3>Tư vấn nuôi con Easy</h3>
				</a>
				<a class="vpc-bao-mau__service-card" href="<?php echo esc_url( home_url( '/dich-vu/tam-tre-so-sinh/' ) ); ?>">
					<img src="<?php echo esc_url( $service_asset_uri . '/service-5.jpg' ); ?>" width="300" height="240" alt="Tắm bé sơ sinh" loading="lazy">
					<h3>Tắm bé sơ sinh</h3>
				</a>
				<a class="vpc-bao-mau__service-card" href="<?php echo esc_url( home_url( '/dich-vu/thong-tac-tia-sua/' ) ); ?>">
					<img src="<?php echo esc_url( $service_asset_uri . '/service-6.jpg' ); ?>" width="300" height="240" alt="Thông tắc tia sữa" loading="lazy">
					<h3>Thông tắc tia sữa</h3>
				</a>
			</div>
			</div>
			<button class="vpc-bao-mau__services-arrow vpc-bao-mau__services-arrow--next" type="button" aria-label="Dịch vụ tiếp theo" aria-controls="prenatal-services-viewport"><img src="<?php echo esc_url( $service_asset_uri . '/chevron-left.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true"></button>
		</div>
	</div>
</section>

