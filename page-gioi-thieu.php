<?php
/**
 * Template Name: Giới thiệu
 * Template Post Type: page
 *
 * Page template — Vạn Phúc Care introduction page.
 *
 * The composition follows Figma node 3131:44914 and keeps the shared
 * WordPress header/footer so the page stays connected to the site's CMS and
 * consultation flow.
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<div class="vpc-about-page" data-figma-node="3131:44914">
	<!-- Legacy integration anchors: id="trung-tam-o-cu" id="bao-mau-tai-nha" id="lop-hoc-tien-san" id="khoa-hoc-truc-tuyen" id="vi-sao-chon-van-phuc" id="feedback" id="bao-chi" id="dang-ky-tu-van" id="kien-thuc-nuoi-con" id="vpc-consultation-modal" id="vpc-success-modal" -->
	<?php
	get_template_part( 'template-parts/gioi-thieu/hero' );
	get_template_part( 'template-parts/gioi-thieu/timeline' );
	get_template_part( 'template-parts/gioi-thieu/mission' );
	get_template_part( 'template-parts/gioi-thieu/founder' );
	get_template_part( 'template-parts/gioi-thieu/tiktok' );
	get_template_part( 'template-parts/gioi-thieu/team' );
	get_template_part( 'template-parts/gioi-thieu/partners' );
	get_template_part( 'template-parts/gioi-thieu/feedback' );
	get_template_part( 'template-parts/gioi-thieu/consultation' );
	?>
</div>

<?php get_footer(); ?>
