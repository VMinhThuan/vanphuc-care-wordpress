<?php
/**
 * Bao Mau - Service Process Section (Quy Trình Dịch Vụ).
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$asset_uri = trailingslashit( get_template_directory_uri() ) . 'assets/images/bao-mau';

$processes = array(
	array( 'image' => 'process-1.png', 'title' => 'Kiểm tra toàn trạng', 'copy' => 'Vệ sinh phòng, kiểm tra tổng quan sức khỏe của bé. Trường hợp phát hiện vấn đề bất thường, điều dưỡng viên sẽ trao đổi lại với mẹ.' ),
	array( 'image' => 'process-2.png', 'title' => 'Tập vận động', 'copy' => 'Bé được tập vận động vào mỗi buổi sáng trong ngày theo bài tập phù hợp với thể trạng.' ),
	array( 'image' => 'process-3.png', 'title' => 'Tắm & Massage', 'copy' => 'Trẻ được massage body theo chuẩn IAIM giúp bé thư giãn, thoải mái. Vệ sinh vùng da nhạy cảm và tắm rửa sạch sẽ.' ),
	array( 'image' => 'process-4.png', 'title' => 'Kiểm soát cữ bú', 'copy' => 'Từ cho ăn theo nhu cầu đến thiết lập cữ bú phù hợp với nhu cầu sinh lý riêng của từng bé.' ),
	array( 'image' => 'process-5.png', 'title' => 'Thiết lập cữ ngủ', 'copy' => 'Bé sẽ được rèn nề nếp ngủ đúng giờ, hạn chế thức đêm giúp mẹ và gia đình đỡ mệt mỏi.' ),
	array( 'image' => 'process-6.png', 'title' => 'Luyện tập kỹ năng cơ bản', 'copy' => 'Con được luyện tập các kỹ năng cơ bản đầu đời như: Lật, lẫy, ngồi, trườn, bò…. theo sự phát triển cá nhân của bé.' ),
);
?>
<section class="vpc-bao-mau__process" aria-labelledby="bao-mau-process-title">
	<div class="vpc-bao-mau__container">
		<div class="vpc-bao-mau__section-heading">
			<div class="vpc-bao-mau__badge"><img src="<?php echo esc_url( $asset_uri . '/star.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true">QUY TRÌNH</div>
			<h2 id="bao-mau-process-title"><span>Quy Trình Dịch Vụ</span><em>Bảo Mẫu Tại Nhà</em></h2>
		</div>
		<div class="vpc-bao-mau__process-grid">
			<?php foreach ( $processes as $index => $process ) : ?>
				<article class="vpc-bao-mau__process-card">
					<div class="vpc-bao-mau__process-image"><img src="<?php echo esc_url( $asset_uri . '/' . $process['image'] ); ?>" width="293" height="176" alt="" loading="lazy"><span><?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></span></div>
					<h3><?php echo esc_html( $process['title'] ); ?></h3>
					<p><?php echo esc_html( $process['copy'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

