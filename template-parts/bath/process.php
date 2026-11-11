<?php
/**
 * Bath - Service Process Section (Quy Trình Dịch Vụ).
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$bath_uri   = trailingslashit( get_template_directory_uri() ) . 'assets/images/bath';
$shared_uri = trailingslashit( get_template_directory_uri() ) . 'assets/images/easy';

$processes = array(
	array( 'image' => 'process-1.png', 'title' => 'Kiểm tra tổng quan', 'copy' => 'Kiểm tra nhiệt độ, tình trạng cuống rốn, tình trạng da, kẽ tay, kẽ chân, phần phụ.' ),
	array( 'image' => 'process-2.png', 'title' => 'Massage vận động nhẹ', 'copy' => 'Massage body giúp bé thoải mái, xoa dịu căng thẳng. Kết hợp các bài tập vận động, hỗ trợ khả năng phát triển.' ),
	array( 'image' => 'process-3.png', 'title' => 'Tắm bé', 'copy' => 'Kiểm tra nhiệt độ nước, vệ sinh cơ thể bé từ đầu, mặt, cổ, tay chân cho tới cuống rốn và bộ phận sinh dục của bé.' ),
	array( 'image' => 'process-4.png', 'title' => 'Vệ sinh', 'copy' => 'Phần vệ sinh cá nhân cho bé gồm những vùng như tai, mũi, lưỡi. Nhỏ mắt và bôi dầu chàm giữ ấm cơ thể.' ),
	array( 'image' => 'process-5.png', 'title' => 'Vệ sinh vết khâu hoặc vết mổ cho mẹ', 'copy' => 'Kiểm tra tình trạng vết khâu, vết mổ, dây chỉ khi mẹ có nhu cầu cần hỗ trợ.' ),
);
?>
<section class="vpc-bath__process" aria-labelledby="bath-process-title">
	<div class="vpc-bath__container">
		<div class="vpc-bath__section-heading">
			<div class="vpc-bath__badge"><img src="<?php echo esc_url( $shared_uri . '/star.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true">QUY TRÌNH</div>
			<h2 id="bath-process-title"><span>Quy Trình Dịch Vụ</span><em>Tắm Bé Tại Nhà</em></h2>
		</div>
		<div class="vpc-bath__process-grid">
			<?php foreach ( $processes as $index => $process ) : ?>
				<article class="vpc-bath__process-card">
					<div class="vpc-bath__process-image">
						<img src="<?php echo esc_url( $bath_uri . '/' . $process['image'] ); ?>" width="189" height="189" alt="" loading="lazy">
						<span><?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></span>
					</div>
					<h3><?php echo esc_html( $process['title'] ); ?></h3>
					<p><?php echo esc_html( $process['copy'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

