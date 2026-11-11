<?php
/**
 * EASY - 2 Ways of Support / Choices Section.
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$asset_uri = trailingslashit( get_template_directory_uri() ) . 'assets/images/easy';
?>
<section id="easy-choices" class="vpc-easy__choices" aria-labelledby="easy-choices-title">
	<div class="vpc-easy__container">
		<div class="vpc-easy__section-heading">
			<div class="vpc-easy__badge"><img src="<?php echo esc_url( $asset_uri . '/star.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true">HAI CÁCH ĐỒNG HÀNH</div>
			<h2 id="easy-choices-title">Mẹ Lựa Chọn Gói Dịch Vụ Phù Hợp</h2>
			<p>Đối với mỗi gói dịch vụ tư vấn nuôi con EASY, cha mẹ đều nhận được sự hỗ trợ sát sao nhất<br>Bảo chứng với kinh nghiệm hơn 5 năm huấn luyện và tổ chức các lớp học tiền sản, được nhiều cha mẹ tin yêu tại Trung tâm ở cữ Vạn Phúc Care.</p>
		</div>
		<div class="vpc-easy__choice-grid">
			<article class="vpc-easy__choice-card">
				<img class="vpc-easy__choice-image" src="<?php echo esc_url( $asset_uri . '/online.jpg' ); ?>" width="568" height="366" alt="Tư vấn nuôi con EASY trực tuyến" loading="lazy">
				<div class="vpc-easy__choice-title"><span>Linh hoạt mọi nơi</span><b>01</b></div>
				<h3>Tư vấn trực tuyến</h3>
				<p>Chuyên viên quan sát và hướng dẫn cha mẹ qua ứng dụng GG Meeting, kết hợp ứng dụng sổ sức khoẻ điện tử, ticketbox.</p>
				<img class="vpc-easy__line" src="<?php echo esc_url( $asset_uri . '/line.svg' ); ?>" width="568" height="1" alt="">
				<ul>
					<li><img class="vpc-easy__choice-check" src="<?php echo esc_url( $asset_uri . '/check-badge.svg' ); ?>" width="24" height="24" alt="">Không giới hạn vị trí địa lý</li>
					<li><img class="vpc-easy__choice-check" src="<?php echo esc_url( $asset_uri . '/check-badge.svg' ); ?>" width="24" height="24" alt="">Không cần di chuyển trong thời gian ở cữ</li>
					<li><img class="vpc-easy__choice-check" src="<?php echo esc_url( $asset_uri . '/check-badge.svg' ); ?>" width="24" height="24" alt="">Video call, chatbox và tài liệu thực hành</li>
				</ul>
				<a href="#easy-packages">Xem gói trực tuyến <img src="<?php echo esc_url( $asset_uri . '/chevron-right.svg' ); ?>" width="9" height="15" alt=""></a>
			</article>
			<article class="vpc-easy__choice-card">
				<img class="vpc-easy__choice-image" src="<?php echo esc_url( $asset_uri . '/direct.jpg' ); ?>" width="568" height="366" alt="Tư vấn nuôi con EASY trực tiếp" loading="lazy">
				<div class="vpc-easy__choice-title"><span>Trực quan tại nhà</span><b>02</b></div>
				<h3>Hướng dẫn trực tiếp</h3>
				<p>Điều dưỡng sản nhi đến tận nhà, quan sát thói quen của bé và trực tiếp hướng dẫn cha mẹ thực hành</p>
				<img class="vpc-easy__line" src="<?php echo esc_url( $asset_uri . '/line.svg' ); ?>" width="568" height="1" alt="">
				<ul>
					<li><img class="vpc-easy__choice-check" src="<?php echo esc_url( $asset_uri . '/check-badge.svg' ); ?>" width="24" height="24" alt="">Đánh giá thực tế môi trường sinh hoạt</li>
					<li><img class="vpc-easy__choice-check" src="<?php echo esc_url( $asset_uri . '/check-badge.svg' ); ?>" width="24" height="24" alt="">Điều chỉnh thao tác ngay tại chỗ</li>
					<li><img class="vpc-easy__choice-check" src="<?php echo esc_url( $asset_uri . '/check-badge.svg' ); ?>" width="24" height="24" alt="">Linh hoạt theo lịch trình riêng của bé</li>
				</ul>
				<a href="#easy-packages">Xem gói tại nhà <img src="<?php echo esc_url( $asset_uri . '/chevron-right.svg' ); ?>" width="9" height="15" alt=""></a>
			</article>
		</div>
	</div>
</section>

