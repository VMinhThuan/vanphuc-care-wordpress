<?php
/**
 * Template Name: Dịch vụ - Trung tâm Ở cữ
 * Template Post Type: page
 *
 * Page template — Trung tâm Ở cữ.
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$feedback = array(
	array( 'image' => 'feedback-1.png', 'name' => 'Mẹ bé Kami', 'copy' => 'Mình thực sự thấy quyết định chọn ở cữ ở Vạn Phúc Care là sáng suốt nhất trong hành trình đi đẻ. Phòng hạng có view hồ Tây, rộng rãi, sang trọng và đầy đủ tiện nghi. Trọn vẹn 30 ngày ở cữ rất nhẹ nhàng, 2 mẹ con được chăm sóc sức khỏe chu đáo mỗi ngày và nhàn nhất là không bị áp lực đêm hôm chăm con.' ),
	array( 'image' => 'feedback-2.png', 'name' => 'Mẹ bé Mandu', 'copy' => 'Mình rất hài lòng với dịch vụ ở cữ của Vạn Phúc Care. Mẹ được chăm sóc tận tình, phòng nghỉ sạch sẽ và bé được theo dõi theo quy trình khoa học nên cả gia đình đều an tâm.' ),
	array( 'image' => 'feedback-3.png', 'name' => 'Mẹ Bé Cát', 'copy' => 'Không gian nghỉ dưỡng rất thoải mái, các cô điều dưỡng nhẹ nhàng và chuyên môn tốt. Mình có thêm thời gian phục hồi sau sinh mà vẫn theo sát được từng cữ chăm sóc của con.' ),
	array( 'image' => 'feedback-4.png', 'name' => 'Mẹ Trà My – Bé Nghé', 'copy' => 'Dành tặng 10 sao cho Vạn Phúc Care. Gia đình được tư vấn kỹ, chăm sóc chu đáo và hỗ trợ rất nhanh trong suốt thời gian ở cữ.' ),
	array( 'image' => 'feedback-5.png', 'name' => 'Nguyễn Thị Ngọc Trân', 'copy' => 'Mình cảm thấy thật sự may mắn khi biết tới Trung tâm ở cữ Vạn Phúc Care. Mẹ và bé đều được quan tâm mỗi ngày, mọi thứ rất nhẹ nhàng và chỉn chu.' ),
	array( 'image' => 'feedback-6.png', 'name' => 'Mẹ Sấm Chớp', 'copy' => 'Sau sinh cơ thể mình rất mệt mỏi, nhưng nhờ có đội ngũ điều dưỡng đồng hành nên mình có thể nghỉ ngơi, phục hồi và tận hưởng những ngày đầu bên con.' ),
	array( 'image' => 'feedback-7.png', 'name' => 'Mẹ Cafe', 'copy' => 'Cảm ơn Vạn Phúc Care đã dành cho hai mẹ con những trải nghiệm đầu đời thật nhẹ nhàng. Các cô chăm sóc bé cẩn thận và hướng dẫn gia đình rất tận tình.' ),
	array( 'image' => 'feedback-8.png', 'name' => 'Mẹ Nghé Ọ', 'copy' => 'Đội ngũ điều dưỡng tận tâm, tư vấn rõ ràng và đồng hành rất sát. Gia đình mình hoàn toàn yên tâm khi lựa chọn ở cữ tại đây.' ),
);
?>

<main class="vpc-o-cu vpc-bao-mau" data-figma-node="3123:33008">
	<?php
	get_template_part( 'template-parts/o-cu/hero' );
	get_template_part( 'template-parts/o-cu/benefits' );
	get_template_part( 'template-parts/o-cu/nursery' );
	get_template_part( 'template-parts/o-cu/experience' );
	get_template_part( 'template-parts/o-cu/rooms' );
	get_template_part( 'template-parts/o-cu/team' );
	get_template_part( 'template-parts/o-cu/faq' );
	get_template_part( 'template-parts/sections/feedback', null, array(
		'items'        => $feedback,
		'image_prefix' => 'bao-mau',
		'badge'        => 'Khách hàng',
		'description'  => array( 'Trong hành trình cùng mẹ trải đầy yêu thương, Trung tâm ở cữ Vạn Phúc Care đã nhận được sự tin yêu của hàng ngàn Mẹ bỉm.' ),
	) );
	get_template_part( 'template-parts/o-cu/consultation' );
	get_template_part( 'template-parts/o-cu/services' );
	?>
</main>

<?php get_footer(); ?>
