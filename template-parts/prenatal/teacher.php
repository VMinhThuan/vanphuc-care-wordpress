<?php
/**
 * Prenatal - Head Nurse Thanh Thuy Introduction Section.
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$theme_uri       = get_template_directory_uri();
$image           = $theme_uri . '/assets/images/lop-hoc-tien-san/';
$prenatal_image  = static function ( $filename, $size = 'full' ) {
	return vpc_image_url( 'lop-hoc-tien-san/' . ltrim( $filename, '/' ), $size );
};
?>
<section class="vpc-section prenatal-teacher" aria-labelledby="prenatal-teacher-title">
	<div class="prenatal-container prenatal-teacher__layout">
		<div class="prenatal-teacher__photo">
			<?php $teacher_card_image_url = $prenatal_image( 'teacher-thanh-thuy-card.webp', 'large' ); ?>
			<?php $teacher_card_2x_image_url = $prenatal_image( 'teacher-thanh-thuy-card@2x.webp', 'full' ); ?>
			<?php if ( $teacher_card_image_url ) : ?>
				<img class="prenatal-teacher__card-img" src="<?php echo esc_url( $teacher_card_image_url ); ?>"<?php if ( $teacher_card_2x_image_url ) : ?> srcset="<?php echo esc_url( $teacher_card_2x_image_url ); ?> 2x"<?php endif; ?> alt="Điều dưỡng trưởng Thanh Thủy bế em bé" width="540" height="600" />
			<?php endif; ?>
		</div>
		<div class="prenatal-teacher__copy">
			<div class="prenatal-badge">
				<img class="prenatal-badge__icon" src="<?php echo esc_url( $image . 'icons/star-light.svg' ); ?>" alt="" aria-hidden="true" width="24" height="24" />
				<span>NGƯỜI BẠN ĐỒNG HÀNH CÙNG MỌI GIA ĐÌNH</span>
			</div>
			<h2 id="prenatal-teacher-title" class="prenatal-title">
				<span>Điều Dưỡng Trưởng</span>
				<em>Thanh Thủy</em>
			</h2>
			<div class="prenatal-teacher__intro">
				<p class="prenatal-teacher__meta">@methuylamy · Trung tâm ở cữ Vạn Phúc Care</p>
				<p>Điều dưỡng trưởng Thanh Thủy trực tiếp thiết kế và giảng dạy chương trình, đưa những kiến thức y khoa trở nên gần gũi, dễ hiểu — để mỗi bố mẹ đều có thể tự tin áp dụng khi con chào đời.</p>
			</div>
			<ul class="prenatal-teacher__checklist">
				<li><img class="prenatal-check-icon" src="<?php echo esc_url( $image . 'icons/check-badge.svg' ); ?>" alt="" aria-hidden="true" width="24" height="24" /><span>Hướng dẫn thực hành trực tiếp, chỉnh sửa từng thao tác</span></li>
				<li><img class="prenatal-check-icon" src="<?php echo esc_url( $image . 'icons/check-badge.svg' ); ?>" alt="" aria-hidden="true" width="24" height="24" /><span>Giải đáp những lo lắng riêng của mỗi gia đình</span></li>
				<li><img class="prenatal-check-icon" src="<?php echo esc_url( $image . 'icons/check-badge.svg' ); ?>" alt="" aria-hidden="true" width="24" height="24" /><span>Đội ngũ điều dưỡng hỗ trợ 1:1 trong suốt buổi học</span></li>
			</ul>
			<a class="prenatal-button prenatal-button--primary" href="https://methuylamy.vn/" target="_blank" rel="noopener noreferrer">Giới thiệu giảng viên</a>
		</div>
	</div>
</section>

