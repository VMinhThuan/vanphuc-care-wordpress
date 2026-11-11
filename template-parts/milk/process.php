<?php
/**
 * Milk - Service Process Section (Quy Trình Dịch Vụ).
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$milk_uri   = trailingslashit( get_template_directory_uri() ) . 'assets/images/milk';
$shared_uri = trailingslashit( get_template_directory_uri() ) . 'assets/images/easy';

$processes = array(
	array( 'image' => 'process-1.png', 'title' => 'Kiểm tra tổng quan', 'copy' => 'Kiểm tra, đánh giá, phân tích biểu hiện và triệu chứng tắc tia sữa mẹ đang gặp phải.' ),
	array( 'image' => 'process-2.png', 'title' => 'Trao đổi phương án phù hợp', 'copy' => 'Trao đổi tình trạng tắc tia sữa hiện tại và đưa ra phương án trị liệu phù hợp nhất với thể trạng của mẹ.' ),
	array( 'image' => 'process-3.png', 'title' => 'Tiến hành trị liệu', 'copy' => 'Tiến hành trị liệu theo đúng phác đồ và được chăm sóc hỗ trợ trong các ngày sau trị liệu.' ),
);
?>
<section class="vpc-milk__process" aria-labelledby="milk-process-title">
	<div class="vpc-milk__container">
		<div class="vpc-milk__section-heading">
			<div class="vpc-milk__badge"><img src="<?php echo esc_url( $shared_uri . '/star.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true">QUY TRÌNH</div>
			<h2 id="milk-process-title"><span>Quy Trình Dịch Vụ</span><em>Thông Tắc Tia Sữa</em></h2>
		</div>
		<div class="vpc-milk__process-grid">
			<?php foreach ( $processes as $index => $process ) : ?>
				<article class="vpc-milk__process-card">
					<div class="vpc-milk__process-image">
						<img src="<?php echo esc_url( $milk_uri . '/' . $process['image'] ); ?>" width="189" height="189" alt="" loading="lazy">
						<span><?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></span>
					</div>
					<h3><?php echo esc_html( $process['title'] ); ?></h3>
					<p><?php echo esc_html( $process['copy'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

