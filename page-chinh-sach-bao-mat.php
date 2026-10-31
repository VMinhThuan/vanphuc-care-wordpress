<?php
/**
 * Template Name: Chính sách bảo mật
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
			$page_title = 'Chính sách bảo mật';
		}
		?>

		<!-- Hero Banner Section -->
		<section class="policy-hero-banner" style="background-image: linear-gradient(90.7deg, rgba(243, 128, 131, 0.81) -2.2%, rgba(26, 119, 186, 0.81) 99.39%), url('<?php echo esc_url( get_template_directory_uri() . '/assets/images/hero_bg.jpg' ); ?>');">
			<div class="vpc-container">
				<h1 class="policy-hero-title"><?php echo esc_html( $page_title ); ?></h1>
				<p class="policy-hero-desc">
					Vạn Phúc Care cam kết bảo mật tuyệt đối thông tin cá nhân của khách hàng. Chúng tôi tôn trọng quyền riêng tư và sử dụng các biện pháp an ninh nghiêm ngặt nhằm bảo vệ thông tin sức khỏe của mẹ và bé.
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

					<div class="policy-block">
						<h2 class="policy-section-title">1. Mục đích thu thập thông tin cá nhân</h2>
						<p>Vạn Phúc Care thu thập thông tin của khách hàng nhằm mục đích cung cấp dịch vụ chăm sóc y tế mẹ và bé tốt nhất, bao gồm:</p>
						<ul class="policy-list">
							<li>Tư vấn và thực hiện các gói dịch vụ ở cữ, bảo mẫu tại nhà, tắm bé, thông tắc tia sữa.</li>
							<li>Quản lý hồ sơ sức khỏe điện tử, theo dõi lịch tiêm chủng và sinh hoạt của mẹ và bé.</li>
							<li>Hỗ trợ giải đáp các thắc mắc y tế từ đội ngũ chuyên gia.</li>
						</ul>
					</div>

					<div class="policy-block">
						<h2 class="policy-section-title">2. Phạm vi sử dụng thông tin</h2>
						<p>Chúng tôi chỉ sử dụng thông tin trong nội bộ doanh nghiệp nhằm phục vụ việc chăm sóc và cải thiện chất lượng dịch vụ. Vạn Phúc Care cam kết không bán, chia sẻ hay tiết lộ thông tin cá nhân của khách hàng cho bất kỳ bên thứ ba nào nếu không có sự đồng ý của khách hàng, ngoại trừ trường hợp theo yêu cầu của cơ quan pháp luật có thẩm quyền.</p>
					</div>

					<div class="policy-block">
						<h2 class="policy-section-title">3. Bảo mật thông tin khách hàng</h2>
						<p>Mọi thông tin y tế và dữ liệu cá nhân của khách hàng được lưu trữ bảo mật trên hệ thống máy chủ an toàn với các lớp mã hóa tiêu chuẩn y khoa.</p>
					</div>

					<div class="policy-block">
						<h2 class="policy-section-title">4. Đơn vị thu thập và quản lý thông tin</h2>
						<p><strong>Công Ty TNHH Vạn Phúc Care</strong></p>
						<p>Địa chỉ: 35B ngõ 399 Âu Cơ, Tây Hồ, Hà Nội</p>
						<p>Hotline: <a href="tel:0908093198" class="policy-contact-highlight">090 809 3198</a> - Email: <a href="mailto:cskh@vanphuccare.vn" class="policy-contact-highlight">cskh@vanphuccare.vn</a></p>
					</div>

					<?php endif; ?>

					<!-- Related Terms & Policies Callout Box -->
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

