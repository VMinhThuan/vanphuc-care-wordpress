<?php
/**
 * Giới Thiệu - Feedback Section (Cảm Nhận Của Khách Hàng).
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$about_uri     = trailingslashit( get_template_directory_uri() ) . 'assets/images/about';
$badge_icon    = $about_uri . '/badge-star.svg';
$avatars_uri   = trailingslashit( get_template_directory_uri() ) . 'assets/images/avatars';
$feedback_uri  = trailingslashit( get_template_directory_uri() ) . 'assets/images/bao-mau';

$about_feedback = array(
	array( 'name' => 'Mẹ bé Kami', 'image' => 'customer_1.webp', 'copy' => 'Mình thực sự thấy quyết định chọn ở cữ ở Vạn Phúc Care là sáng suốt nhất trong hành trình đi đẻ. Phòng hạng có view hồ Tây, rộng rãi, sang trọng và đầy đủ tiện nghi. Trọn vẹn 30 ngày ở cữ rất nhẹ nhàng, 2 mẹ con được chăm sóc sức khỏe chu đáo mỗi ngày và nhàn nhất là không bị áp lực đêm hôm chăm con. Bé Kami trộm vía về nhà vẫn ăn ngoan ngủ ngon. Cảm ơn Vạn Phúc Care và đội ngũ điều dưỡng đã mang đến cho gia đình trải nghiệm ở cữ tuyệt vời!' ),
	array( 'name' => 'Mẹ bé Mandu', 'image' => 'customer_2.webp', 'copy' => 'Mình rất hài lòng với dịch vụ Bảo mẫu tại nhà của Vạn Phúc Care, đặc biệt cảm ơn cô Phương Anh rất nhiều. Cô chăm bé vô cùng cẩn thận và khéo léo. Bé nhà mình được cô rèn theo phương pháp EASY, trộm vía bé khỏe mạnh, ngủ ngoan hơn và có lịch trình sinh hoạt ổn định. Điều này giúp mình có nhiều thời gian chăm sóc bản thân và sắp xếp các công việc khác. Vạn Phúc Care đúng là người bạn đồng hành hỗ trợ tuyệt vời cho các chị em sau sinh!' ),
	array( 'name' => 'Mẹ Bé Cát', 'image' => 'customer_3.webp', 'copy' => 'Đánh giá 5 sao cho dịch vụ tại Vạn Phúc Care, đặc biệt là cô Hạnh, cô Nga. Đúng giờ, nhiệt tình và nhẹ nhàng. Trộm vía bé tắm, massage và tập vận động xong ngủ rất ngoan. Cô tương tác với bé khéo cực kỳ. Cảm ơn các cô nhiều, mình sẽ giới thiệu Vạn Phúc Care tới bạn bè mình!' ),
	array( 'name' => 'Mẹ Trà My – Bé Nghé', 'image' => 'customer_4.webp', 'copy' => 'Mình rất hài lòng với dịch vụ chăm sóc bé tại nhà của Vạn Phúc Care. Đặc biệt là sự chăm sóc khách hàng rất tỉ mỉ, tận tình. Gia đình gửi lời cảm ơn đến cô Thủy với những tư vấn, hỗ trợ tuyệt vời. Kỹ năng truyền đạt phương pháp nuôi con EASY của cô dễ hiểu, làm mình yên tâm hơn trong quá trình nuôi con nhỏ. Mình đã giới thiệu thêm nhiều bạn bè sử dụng dịch vụ từ Vạn Phúc Care.' ),
	array( 'name' => 'Nguyễn Thị Ngọc Trân', 'image' => 'customer_5.webp', 'copy' => 'Đánh giá 5 sao cho dịch vụ tại Vạn Phúc Care, đặc biệt là cô Hạnh, cô Nga. Đúng giờ, nhiệt tình và nhẹ nhàng. Trộm vía bé tắm, ngủ rất ngoan.' ),
	array( 'name' => 'Mẹ Sấm Chớp', 'image' => 'ava-2.webp', 'copy' => 'Dành tặng 10 sao cho cô Linh, tận tình chăm sóc Mẹ và 2 bé. Cực kỳ hài lòng với dịch vụ mà chi phí lại hợp lý. Cô Linh chăm sóc bé rất kỹ và yêu trẻ, nhiệt tình tư vấn cho Mẹ các vấn đề về sữa, kỹ năng cho con bú và phương pháp rèn con ngủ đúng giờ. Mẹ và Sấm Chớp rất hài lòng về Vạn Phúc Care.' ),
	array( 'name' => 'Mẹ Cafe', 'image' => 'ava-3.webp', 'copy' => 'Mình cảm thấy thật sự là may mắn khi được biết tới dịch vụ thông tắc tia sữa của Vạn Phúc Care. Nhờ các cô luôn tận tâm, nhiệt tình, có kinh nghiệm mà mình đã nhanh chóng trị dứt tình trạng tắc sữa để mau có sữa về cho bé Cafe nhà mình. Mẹ con cháu cảm ơn cô Thuỷ rất nhiều ạ!' ),
	array( 'name' => 'Mẹ Nghé Ọ', 'image' => 'ava-5.webp', 'copy' => 'Sau sinh cơ thể mình rất mệt mỏi, muốn chăm con thật tốt nhưng sức khoẻ không cho phép. Lúc này mình được chị gái giới thiệu về Vạn Phúc Care và mình đã đăng ký Gói chăm sóc bé tại nhà trong 6 tháng. Cô Ánh điều dưỡng chăm sóc bé nhà mình rất tốt, con ăn ngon ngủ kỹ, sức khỏe tốt. Con được rèn ngủ theo EASY nên rất ngoan.' ),
	array( 'name' => 'Bà ngoại Bé Dâu', 'image' => 'ava-8.webp', 'copy' => 'Cảm ơn cô Huyên, cảm ơn Vạn Phúc Care đã dành cho Dâu những trải nghiệm đầu đời thú vị. Cô chăm sóc bé nhẹ nhàng khéo léo, cẩn thận. Hướng dẫn tận tình gia đình cách vệ sinh cá nhân cho cháu, vệ sinh vết mổ, cắt chỉ cho con gái cô. Đây là địa chỉ chăm sóc mẹ bé đáng tin cậy.' ),
);
?>
<section id="feedback" class="about-section about-feedback" data-figma-node="3207:38663" aria-labelledby="about-feedback-title">
	<div class="about-feedback__heading">
		<span class="about-badge">
			<?php if ( $badge_icon ) : ?><img src="<?php echo esc_url( $badge_icon ); ?>" width="24" height="24" alt="" aria-hidden="true"><?php endif; ?>
			FEEDBACK
		</span>
		<h2 id="about-feedback-title" class="about-heading"><span class="about-heading--blue">Cảm Nhận</span><span class="about-heading--pink">Của Khách Hàng</span></h2>
		<div class="about-copy about-feedback__description">
			<p>Trong hành trình cùng mẹ trải đầy yêu thương, Vạn Phúc Care đã nhận được sự tin yêu của hàng ngàn mẹ bỉm.</p>
			<p>Chúng tôi cam kết đồng hành cùng Mẹ và Bé trong 2 năm đầu đời.</p>
		</div>
	</div>

	<div class="about-feedback__viewport">
		<div class="about-feedback__fade about-feedback__fade--left" aria-hidden="true"></div>
		<div class="about-feedback__fade about-feedback__fade--right" aria-hidden="true"></div>
		<?php foreach ( array( array_slice( $about_feedback, 0, 5 ), array_slice( $about_feedback, 5, 4 ) ) as $row_index => $feedback_row ) : ?>
			<div class="about-feedback__row <?php echo 0 === $row_index ? 'about-feedback__row--forward' : 'about-feedback__row--reverse'; ?>" data-figma-node="<?php echo 0 === $row_index ? '3207:38670' : '3207:38676'; ?>">
				<div class="about-feedback__track">
					<?php for ( $copy_index = 0; $copy_index < 2; $copy_index++ ) : ?>
						<?php foreach ( $feedback_row as $feedback_index => $feedback ) : ?>
							<article class="about-feedback-card" data-node-id="<?php echo esc_attr( '3207:386' . ( 71 + $feedback_index ) ); ?>">
								<img class="about-feedback-card__quote" src="<?php echo esc_url( $feedback_uri . '/quotation.svg' ); ?>" width="23.5" height="15.5" alt="" aria-hidden="true">
								<div class="about-feedback-card__author">
									<img src="<?php echo esc_url( $avatars_uri . '/' . $feedback['image'] ); ?>" width="40" height="40" alt="" loading="lazy" decoding="async">
									<div>
										<strong><?php echo esc_html( $feedback['name'] ); ?></strong>
										<span class="about-feedback-card__stars" role="img" aria-label="5 trên 5 sao">
											<?php for ( $star = 0; $star < 5; $star++ ) : ?><img src="<?php echo esc_url( $feedback_uri . '/rating.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true"><?php endfor; ?>
										</span>
									</div>
								</div>
								<img class="about-feedback-card__line" src="<?php echo esc_url( $feedback_uri . '/line.svg' ); ?>" width="285" height="1" alt="" aria-hidden="true">
								<p><?php echo esc_html( $feedback['copy'] ); ?></p>
							</article>
						<?php endforeach; ?>
					<?php endfor; ?>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</section>

