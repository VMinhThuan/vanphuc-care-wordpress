<?php
/**
 * Template Name: Điều khoản sử dụng & Chính sách
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
		?>

		<!-- Hero Banner Section -->
		<section class="policy-hero-banner" style="background-image: linear-gradient(90.7deg, rgba(243, 128, 131, 0.81) -2.2%, rgba(26, 119, 186, 0.81) 99.39%), url('<?php echo esc_url( get_template_directory_uri() . '/assets/images/hero_bg.jpg' ); ?>');">
			<div class="vpc-container">
				<h1 class="policy-hero-title"><?php the_title(); ?></h1>
				<p class="policy-hero-desc">
					Vạn Phúc Care được xây dựng với mục tiêu mang đến cho người đọc những thông tin về sức khỏe của mẹ và trẻ sơ sinh một cách khách quan, đáng tin cậy và chính xác. Sứ mệnh của chúng tôi là đảm bảo Vạn Phúc Care sẽ là địa chỉ đáng tin cậy, giúp khách hàng giải đáp mọi thắc mắc liên quan đến sức khỏe và y tế.
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

					<!-- Nội dung giao diện chuẩn đầy đủ 100% theo Figma -->
					<p class="policy-lead-text">
						<strong>Chào mừng quý khách đến với website của Công Ty TNHH Vạn Phúc Care.</strong> Khi truy cập và sử dụng dịch vụ trên website của chúng tôi, quý khách đồng ý tuân thủ các điều khoản và điều kiện được nêu dưới đây. Vui lòng đọc kỹ trước khi sử dụng các dịch vụ chăm sóc mẹ và bé của chúng tôi.
					</p>

					<div class="policy-block">
						<h2 class="policy-section-title">1. Chấp thuận các điều khoản</h2>
						<p>Bằng việc truy cập, đăng ký tư vấn hoặc sử dụng bất kỳ dịch vụ nào do Vạn Phúc Care cung cấp, quý khách xác nhận đã đọc, hiểu và đồng ý chịu sự ràng buộc bởi các điều khoản sử dụng này.</p>
					</div>

					<div class="policy-block">
						<h2 class="policy-section-title">2. Dịch vụ chăm sóc mẹ và bé</h2>
						<p>Vạn Phúc Care cung cấp các dịch vụ chăm sóc sức khỏe chuyên nghiệp bao gồm: Trung tâm ở cữ, Bảo mẫu tại nhà, Chăm sóc mẹ sau sinh, Tắm bé sơ sinh, Thông tắc tia sữa và các lớp học tiền sản. Các dịch vụ được thực hiện bởi đội ngũ y tá, điều dưỡng viên và chuyên gia được đào tạo chuyên môn.</p>
					</div>

					<div class="policy-block">
						<h2 class="policy-section-title">3. Quyền và trách nhiệm của khách hàng</h2>
						<p>Khách hàng có trách nhiệm cung cấp thông tin chính xác về tình trạng sức khỏe của mẹ và bé nhằm phục vụ việc chăm sóc y tế an toàn. Khách hàng cam kết tuân thủ các hướng dẫn chuyên môn từ điều dưỡng viên và thanh toán phí dịch vụ theo thỏa thuận hợp đồng.</p>
					</div>

					<div class="policy-block">
						<h2 class="policy-section-title">4. Quyền sở hữu trí tuệ</h2>
						<p>Toàn bộ nội dung, hình ảnh, bài viết kiến thức, nhãn hiệu và tài liệu trên website đều thuộc quyền sở hữu trí tuệ của Công Ty TNHH Vạn Phúc Care. Mọi hành vi sao chép, trích dẫn cần ghi rõ nguồn và được sự đồng ý bằng văn bản của Vạn Phúc Care.</p>
					</div>

					<?php endif; ?>

					<!-- Related Terms & Policies Callout Box (Group 1000005850) -->
					<div class="related-policies-box">
						<h3 class="related-box-title">Điều khoản & Chính sách liên quan</h3>
						<div class="related-box-line"></div>
						<ul class="related-box-links">
							<li><a href="<?php echo esc_url( home_url( '/dieu-khoan-su-dung' ) ); ?>">&bull; Điều khoản sử dụng</a></li>
							<li><a href="<?php echo esc_url( home_url( '/chinh-sach-bao-mat' ) ); ?>">&bull; Chính sách bảo mật</a></li>
							<li><a href="<?php echo esc_url( home_url( '/chinh-sach-bien-tap-va-chinh-sua' ) ); ?>">&bull; Chính sách biên tập &amp; chỉnh sửa</a></li>
							<li><a href="<?php echo esc_url( home_url( '/quy-trinh-tiep-nhan-va-giai-quyet-khieu-nai' ) ); ?>">&bull; Quy trình tiếp nhận &amp; giải quyết khiếu nại</a></li>
						</ul>
					</div>

				</div>
			</div>
		</section>

		<?php
	endwhile;
endif;

get_footer();
