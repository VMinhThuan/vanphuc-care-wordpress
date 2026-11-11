<?php
/**
 * Template Name: Dịch vụ - Tắm bé sơ sinh
 * Template Post Type: page
 *
 * Page template — Tắm bé sơ sinh tại nhà.
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$feedback = array(
	array( 'image' => 'feedback-1.png', 'name' => 'Mẹ bé Kami', 'copy' => 'Mình thực sự thấy quyết định chọn ở cữ ở Vạn Phúc Care là sáng suốt nhất trong hành trình đi đẻ. Phòng hạng có view hồ Tây, rộng rãi, sang trọng và đầy đủ tiện nghi. Trọn vẹn 30 ngày ở cữ rất nhẹ nhàng, 2 mẹ con được chăm sóc sức khỏe chu đáo mỗi ngày và nhàn nhất là không bị áp lực đêm hôm chăm con. Bé Kami trộm vía về nhà vẫn ăn ngoan ngủ ngon.' ),
	array( 'image' => 'feedback-2.png', 'name' => 'Mẹ bé Mandu', 'copy' => 'Mình rất hài lòng với dịch vụ Bảo mẫu tại nhà của Vạn Phúc Care, đặc biệt cảm ơn cô Phương Anh rất nhiều. Cô chăm bé vô cùng cẩn thận và khéo léo. Bé nhà mình được cô rèn theo phương pháp EASY, trộm vía bé khỏe mạnh, ngủ ngoan hơn và có lịch trình sinh hoạt ổn định.' ),
	array( 'image' => 'feedback-3.png', 'name' => 'Mẹ Bé Cát', 'copy' => 'Đánh giá 5 sao cho dịch vụ tại Vạn Phúc Care, đặc biệt là cô Hạnh, cô Nga. Đúng giờ, nhiệt tình và nhẹ nhàng. Trộm vía bé tắm, massage và tập vận động xong ngủ rất ngoan. Cô tương tác với bé khéo cực kỳ.' ),
	array( 'image' => 'feedback-4.png', 'name' => 'Mẹ Trà My – Bé Nghé', 'copy' => 'Mình rất hài lòng với dịch vụ chăm sóc bé tại nhà của Vạn Phúc Care. Đặc biệt là sự chăm sóc khách hàng rất tỉ mỉ, tận tình. Gia đình gửi lời cảm ơn đến cô Thủy với những tư vấn, hỗ trợ tuyệt vời.' ),
	array( 'image' => 'feedback-5.png', 'name' => 'Nguyễn Thị Ngọc Trân', 'copy' => 'Mình cảm thấy thật sự là may mắn khi được biết tới dịch vụ của Vạn Phúc Care. Các cô luôn tận tâm, nhiệt tình, có kinh nghiệm và đồng hành sát sao trong những ngày đầu chăm con.' ),
	array( 'image' => 'feedback-6.png', 'name' => 'Mẹ Sấm Chớp', 'copy' => 'Dành tặng 10 sao cho cô Linh, tận tình chăm sóc Mẹ và 2 bé. Cực kỳ hài lòng với dịch vụ mà chi phí lại hợp lý. Cô Linh chăm sóc bé rất kỹ và yêu trẻ.' ),
	array( 'image' => 'feedback-7.png', 'name' => 'Mẹ Cafe', 'copy' => 'Mình cảm thấy thật sự là may mắn khi được biết tới dịch vụ của Vạn Phúc Care. Nhờ các cô luôn tận tâm, nhiệt tình, có kinh nghiệm mà mình đã nhanh chóng giải quyết được những băn khoăn trong hành trình nuôi con.' ),
	array( 'image' => 'feedback-8.png', 'name' => 'Mẹ Nghé Ọ', 'copy' => 'Sau sinh cơ thể mình rất mệt mỏi, muốn chăm con thật tốt nhưng sức khoẻ không cho phép. Cô Ánh điều dưỡng chăm sóc bé nhà mình rất tốt, con ăn ngon ngủ kỹ, sức khỏe tốt.' ),
);

$other_services = array(
	array( 'image' => 'service-1.jpg', 'title' => 'Trung tâm ở cữ', 'href' => home_url( '/dich-vu/trung-tam-o-cu/' ) ),
	array( 'image' => 'service-2.jpg', 'title' => 'Bảo mẫu tại nhà', 'href' => home_url( '/dich-vu/bao-mau-tai-nha/' ) ),
	array( 'image' => 'service-3.jpg', 'title' => 'Khóa học trực tuyến', 'href' => 'https://edu.vanphuccare.vn' ),
	array( 'image' => 'service-4.jpg', 'title' => 'Lớp học tiền sản', 'href' => home_url( '/dich-vu/lop-hoc-tien-san/' ) ),
	array( 'image' => 'service-5.jpg', 'title' => 'Tư vấn nuôi con Easy', 'href' => home_url( '/dich-vu/dich-vu-tu-van-nuoi-con-easy-truc-tuyen/' ) ),
	array( 'image' => 'service-6.jpg', 'title' => 'Thông tắc tia sữa', 'href' => home_url( '/dich-vu/thong-tac-tia-sua/' ) ),
);
?>

<div class="vpc-bath" data-figma-node="3207:38571">
	<?php
	get_template_part( 'template-parts/bath/hero' );
	get_template_part( 'template-parts/bath/challenges' );
	get_template_part( 'template-parts/bath/health' );
	get_template_part( 'template-parts/bath/process' );
	get_template_part( 'template-parts/bath/packages' );
	get_template_part( 'template-parts/bath/faq' );
	get_template_part( 'template-parts/sections/feedback', null, array(
		'items'        => $feedback,
		'image_prefix' => 'easy',
	) );
	get_template_part( 'template-parts/bath/consultation' );
	get_template_part(
		'template-parts/sections/other-services',
		null,
		array(
			'services'    => $other_services,
			'asset_uri'   => trailingslashit( get_template_directory_uri() ) . 'assets/images/bao-mau',
			'section_id'  => 'bath-services-title',
			'viewport_id' => 'bath-services-viewport',
		)
	);
	?>
</div>

<?php get_footer(); ?>
