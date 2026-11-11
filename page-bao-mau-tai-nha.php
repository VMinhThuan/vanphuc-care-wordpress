<?php
/**
 * Template Name: Dịch vụ - Bảo mẫu tại nhà
 * Template Post Type: page
 *
 * Page template — Bảo mẫu tại nhà.
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$asset_uri = trailingslashit( get_template_directory_uri() ) . 'assets/images/bao-mau';

$other_services = array(
	array( 'image' => 'service-1.jpg', 'title' => 'Trung tâm ở cữ', 'href' => home_url( '/dich-vu/trung-tam-o-cu/' ) ),
	array( 'image' => 'service-2.jpg', 'title' => 'Khóa học trực tuyến', 'href' => 'https://edu.vanphuccare.vn' ),
	array( 'image' => 'service-3.jpg', 'title' => 'Lớp học tiền sản', 'href' => home_url( '/dich-vu/lop-hoc-tien-san/' ) ),
	array( 'image' => 'service-4.jpg', 'title' => 'Tư vấn nuôi con Easy', 'href' => home_url( '/dich-vu/dich-vu-tu-van-nuoi-con-easy-truc-tuyen/' ) ),
	array( 'image' => 'service-5.jpg', 'title' => 'Tắm bé sơ sinh', 'href' => home_url( '/dich-vu/tam-tre-so-sinh/' ) ),
	array( 'image' => 'service-6.jpg', 'title' => 'Thông tắc tia sữa', 'href' => home_url( '/dich-vu/thong-tac-tia-sua/' ) ),
);
?>

<div class="vpc-bao-mau" data-figma-node="3126:39925" data-figma-frame-node="3126:39926" data-figma-mobile-node="3126:40060">
	<?php
	get_template_part( 'template-parts/bao-mau/hero' );
	get_template_part( 'template-parts/bao-mau/stats' );
	get_template_part( 'template-parts/bao-mau/challenges' );
	get_template_part( 'template-parts/bao-mau/health' );
	get_template_part( 'template-parts/bao-mau/process' );
	get_template_part( 'template-parts/bao-mau/packages' );
	get_template_part( 'template-parts/bao-mau/team' );
	get_template_part( 'template-parts/bao-mau/faq' );
	get_template_part( 'template-parts/sections/feedback' );
	get_template_part( 'template-parts/bao-mau/consultation' );
	get_template_part(
		'template-parts/sections/other-services',
		null,
		array(
			'services'    => $other_services,
			'asset_uri'   => $asset_uri,
			'section_id'  => 'bao-mau-services-title',
			'viewport_id' => 'bao-mau-services-viewport',
		)
	);
	?>
</div>

<?php get_footer(); ?>
