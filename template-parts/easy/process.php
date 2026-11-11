<?php
/**
 * EASY - Service Process Section (Quy Trình Dịch Vụ).
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$asset_uri = trailingslashit( get_template_directory_uri() ) . 'assets/images/easy';

$processes = array(
	array( 'image' => 'process-1.png', 'title' => 'Tiếp nhận & đánh giá', 'copy' => 'Tư vấn viên lập bảng đánh giá tình trạng sức khỏe hiện tại của bé, nhập liệu lịch sử bệnh lý nếu có.' ),
	array( 'image' => 'process-2.png', 'title' => 'Sổ sức khỏe điện tử', 'copy' => 'Bàn giao sổ sức khỏe điện tử, hướng dẫn cha mẹ sử dụng.' ),
	array( 'image' => 'process-3.png', 'title' => 'Tư vấn 1:1', 'copy' => 'Hướng dẫn trực tuyến hoặc trực tiếp theo gói dịch vụ tư vấn nuôi con EASY cha mẹ đã lựa chọn.' ),
	array( 'image' => 'process-4.png', 'title' => 'Cá nhân hóa lịch trình sinh hoạt của bé', 'copy' => 'Thiết lập và hướng dẫn cha mẹ thực hành lịch sinh hoạt phù hợp với đặc điểm riêng của con.' ),
	array( 'image' => 'process-5.png', 'title' => 'Xử lý các vấn đề của trẻ theo tuần tuổi', 'copy' => 'Đồng hành và hỗ trợ mẹ, bám sát sự phát triển, thay đổi theo từng tuần tuổi của con.' ),
	array( 'image' => 'process-6.png', 'title' => 'Đánh giá tổng kết', 'copy' => 'Đánh giá kết thúc dịch vụ tư vấn nuôi con EASY.' ),
);
?>
<section class="vpc-easy__process" aria-labelledby="easy-process-title">
	<div class="vpc-easy__container">
		<div class="vpc-easy__section-heading">
			<div class="vpc-easy__badge"><img src="<?php echo esc_url( $asset_uri . '/star.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true">QUY TRÌNH</div>
			<h2 id="easy-process-title"><span>Quy Trình Dịch Vụ</span><em>Tư Vấn Nuôi Con EASY</em></h2>
		</div>
		<div class="vpc-easy__process-grid">
			<?php foreach ( $processes as $index => $process ) : ?>
				<article class="vpc-easy__process-card">
					<div class="vpc-easy__process-image">
						<img src="<?php echo esc_url( $asset_uri . '/' . $process['image'] ); ?>" width="189" height="189" alt="" loading="lazy">
						<span><?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></span>
					</div>
					<h3><?php echo esc_html( $process['title'] ); ?></h3>
					<p><?php echo esc_html( $process['copy'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

