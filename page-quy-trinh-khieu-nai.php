<?php
/**
 * Template Name: Quy trình tiếp nhận & giải quyết khiếu nại
 * Template Post Type: page
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		$page_title = get_the_title();
		if ( empty( $page_title ) || strtolower( trim( $page_title ) ) === 'auto draft' ) {
			$page_title = 'Quy trình tiếp nhận & giải quyết khiếu nại';
		}
		?>

		<!-- Hero Banner Section -->
		<section class="policy-hero-banner" style="background-image: linear-gradient(90.7deg, rgba(243, 128, 131, 0.81) -2.2%, rgba(26, 119, 186, 0.81) 99.39%), url('<?php echo esc_url( get_template_directory_uri() . '/assets/images/hero_bg.jpg' ); ?>');">
			<div class="vpc-container">
				<h1 class="policy-hero-title"><?php echo esc_html( $page_title ); ?></h1>
				<p class="policy-hero-desc">
					Vạn Phúc Care luôn trân trọng mọi khách hàng. Chúng tôi luôn chú trọng việc tiếp nhận và xử lý khiếu nại của khách hàng. Do đó, khi có phát sinh bất cứ vấn đề gì liên quan đến việc khiếu nại, tranh chấp chúng tôi luôn đề cao giải pháp thỏa thuận và sẵn lòng hỗ trợ mọi khách hàng khi sử dụng dịch vụ của Vạn Phúc Care.
				</p>
			</div>
		</section>

		<!-- Policy Content Section -->
		<section class="policy-content-section">
			<div class="vpc-container">
				<div class="policy-main-content">

					<?php
					$has_custom_content = trim( get_the_content() );
					if ( ! empty( $has_custom_content ) ) :
						the_content();
					else :
					?>

					<!-- Nội dung chuẩn 100% theo bản thiết kế Figma -->
					<div class="policy-block">
						<h2 class="policy-section-title">Đối tượng khiếu nại</h2>
						<p>Là khách hàng sử dụng dịch vụ chăm sóc Mẹ và Bé của Vạn Phúc Care.</p>
					</div>

					<div class="policy-block">
						<h2 class="policy-section-title">Hình thức khiếu nại</h2>
						<p>
							Khách hàng khiếu nại về dịch vụ có thể liên hệ trực tiếp đến Hotline tư vấn viên 
							<a href="tel:0908093198" class="policy-contact-highlight"><strong>090 809 3198</strong></a> 
							trong giờ làm việc để được giải đáp. Hoặc gửi thông tin khiếu nại qua email: 
							<a href="mailto:cskh@vanphuccare.vn" class="policy-contact-highlight"><strong>cskh@vanphuccare.vn</strong></a> 
							của chúng tôi.
						</p>
					</div>

					<div class="policy-block">
						<h2 class="policy-section-title">Quy trình xử lý khiếu nại</h2>
						<p>Quá trình xử lý khiếu nại của khách hàng sẽ được thực hiện theo quy trình gồm 5 bước sau:</p>
					</div>

					<!-- Bước 1 -->
					<div class="policy-step-item">
						<div class="policy-step-header">
							<span class="policy-step-badge">Bước 1</span>
							<h3 class="policy-subsection-title">Tiếp nhận khiếu nại khách hàng</h3>
						</div>
						<p>
							Bộ phận tiếp nhận khiếu nại của Vạn Phúc Care có trách nhiệm tiếp nhận thông tin khiếu nại, phản hồi của khách hàng liên quan đến quá trình sử dụng dịch vụ. Tuy nhiên, khi khiếu nại, khách hàng vui lòng cung cấp video, hình ảnh, văn bản liên quan đến sự việc khiếu nại để đối chiếu với các bộ phận liên quan. Sau khi tiếp nhận thông tin, bộ phận tiếp nhận của chúng tôi sẽ gửi thư đến khách hàng và hẹn thời gian phản hồi kết quả của việc khiếu nại.
						</p>
					</div>

					<!-- Bước 2 -->
					<div class="policy-step-item">
						<div class="policy-step-header">
							<span class="policy-step-badge">Bước 2</span>
							<h3 class="policy-subsection-title">Phân tích khiếu nại</h3>
						</div>
						<p>Quá trình xác minh, xử lý khiếu nại sẽ được chia ra làm ba trường hợp:</p>
						<ul class="policy-subcase-list">
							<li class="policy-subcase-item">
								<strong>Đối với khách hàng khiếu nại có đầy đủ thông tin, bằng chứng kèm theo (Video, hình ảnh, văn bản):</strong> 
								Bộ phận tiếp nhận khiếu nại tiến hành xác minh theo thông tin khách hàng cung cấp và làm việc với các phòng ban, bộ phận có liên quan để xử lý nhanh nhất trong vòng 24h-72h.
							</li>
							<li class="policy-subcase-item">
								<strong>Đối với khách hàng khiếu nại nhưng chưa có đủ thông tin, bằng chứng đi kèm:</strong> 
								Bộ phận tiếp nhận sẽ tiến hành hồi âm khiếu nại trong vòng 02 ngày kể từ ngày nhận được khiếu nại để khách hàng bổ sung các thông tin cần thiết liên quan đến việc khiếu nại.
							</li>
							<li class="policy-subcase-item">
								<strong>Trường hợp khách hàng khiếu nại sự việc quá nghiêm trọng,</strong> 
								nằm ngoài phạm vi có thể giải quyết được ngay thì bộ phận tiếp nhận sẽ thông báo đến các cấp cao hơn để giải quyết.
							</li>
						</ul>
					</div>

					<!-- Bước 3 -->
					<div class="policy-step-item">
						<div class="policy-step-header">
							<span class="policy-step-badge">Bước 3</span>
							<h3 class="policy-subsection-title">Xác định nguyên nhân, tiến hành giải quyết khiếu nại</h3>
						</div>
						<p>
							Bộ phận giải quyết khiếu nại phối hợp với các bộ phận, phòng ban và đơn vị liên quan xác định nguyên nhân phát sinh khiếu nại. Đề xuất các cấp có thẩm quyền đưa ra phương án giải quyết phù hợp cho khách hàng.
						</p>
					</div>

					<!-- Bước 4 -->
					<div class="policy-step-item">
						<div class="policy-step-header">
							<span class="policy-step-badge">Bước 4</span>
							<h3 class="policy-subsection-title">Trả lời và Giải quyết khiếu nại của khách hàng</h3>
						</div>
						<p>
							Khi có kết quả cuối cùng, bộ phận tiếp nhận khiếu nại Vạn Phúc Care sẽ phản hồi đến khách hàng thông qua các hình thức gọi điện trực tiếp hoặc gửi email đến khách hàng. Đồng thời, gửi các bộ phận có liên quan khắc phục sự cố phát sinh khiếu nại nếu nguyên nhân do lỗi của đơn vị cung cấp dịch vụ.
						</p>
						<p>
							Trong trường hợp khách hàng không hài lòng hoặc chưa thỏa mãn với kết quả khiếu nại, Bộ phận tiếp nhận khiếu nại của Vạn Phúc Care tiếp nhận và kiểm tra lại thông tin hoặc trình lên cấp trên để tiếp tục phúc đáp khách hàng.
						</p>
					</div>

					<!-- Bước 5 -->
					<div class="policy-step-item">
						<div class="policy-step-header">
							<span class="policy-step-badge">Bước 5</span>
							<h3 class="policy-subsection-title">Kết thúc khiếu nại</h3>
						</div>
						<p>
							Chúng tôi sẽ lưu hồ sơ khiếu nại của khách hàng và tiến hành đóng, kết thúc quá trình khiếu nại. Đồng thời tiến hành tổng kết, rút kinh nghiệm giữa các phòng ban.
						</p>
					</div>

					<!-- Thời hạn giải quyết khiếu nại -->
					<div class="policy-block">
						<h2 class="policy-section-title">Thời hạn giải quyết khiếu nại</h2>
						<p>
							Thời hạn giải quyết khiếu nại không vượt quá 30 ngày làm việc (không tính ngày nghỉ và ngày lễ) kể từ khi nhận được yêu cầu khiếu nại của khách hàng.
						</p>
						<p class="policy-date-update">
							<strong>Cập nhật ngày: 09/11/2023.</strong>
						</p>
					</div>

					<?php endif; ?>

					<!-- Related Terms & Policies Callout Box (Group 1000005850) -->
					<div class="related-policies-box">
						<h3 class="related-box-title">Điều khoản &amp; Chính sách liên quan</h3>
						<div class="related-box-line"></div>
						<ul class="related-box-links">
							<li><a href="<?php echo esc_url( home_url( '/dieu-khoan-su-dung' ) ); ?>">&bull; Điều khoản sử dụng</a></li>
							<li><a href="<?php echo esc_url( home_url( '/chinh-sach-bao-mat' ) ); ?>">&bull; Chính sách bảo mật</a></li>
							<li><a href="<?php echo esc_url( home_url( '/chinh-sach-bien-tap' ) ); ?>">&bull; Chính sách biên tập &amp; chỉnh sửa</a></li>
						</ul>
					</div>

				</div>
			</div>
		</section>

		<?php
	endwhile;
endif;

get_footer();
