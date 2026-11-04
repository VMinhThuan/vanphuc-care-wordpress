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

					<?php the_content(); ?>

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
