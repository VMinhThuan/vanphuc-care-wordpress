<?php
/**
 * Front page template for Vạn Phúc Care.
 * Synchronized with standard Figma Mobile & Desktop specification.
 *
 * Decomposed into modular template parts under template-parts/home/
 * for high maintainability, clean architecture, and performance.
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

// Section 1: Hero Promotional Banner Slider.
get_template_part( 'template-parts/home/hero' );

// Section 2: Giới thiệu / Hành trình cùng mẹ.
get_template_part( 'template-parts/home/intro' );

// Section 3: Trung tâm ở cữ chuẩn y khoa.
get_template_part( 'template-parts/home/o-cu' );

// Section 4: Dịch vụ bảo mẫu tại nhà.
get_template_part( 'template-parts/home/bao-mau' );

// Section 5: Lớp học tiền sản.
get_template_part( 'template-parts/home/prenatal' );

// Section 6: Khóa học trực tuyến (edu.vanphuccare.vn).
get_template_part( 'template-parts/home/online-course' );

// Section 7: Vì sao cha mẹ chọn Vạn Phúc Care.
get_template_part( 'template-parts/home/why-us' );

// Section 8: Cảm nhận khách hàng (Feedback carousel).
get_template_part( 'template-parts/sections/feedback' );

// Section 9: Báo chí nói về chúng tôi.
get_template_part( 'template-parts/home/press' );

// Section 10: Đăng ký tư vấn trực tiếp.
get_template_part( 'template-parts/home/consultation' );

// Section 11: Cẩm nang kiến thức nuôi con.
get_template_part( 'template-parts/home/blog' );

get_footer();
