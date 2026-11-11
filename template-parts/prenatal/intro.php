<?php
/**
 * Prenatal - Introduction & Feature Cards Section.
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
<section class="vpc-section prenatal-intro" aria-labelledby="prenatal-intro-title">
	<div class="prenatal-container">
		<div class="prenatal-intro__content">
			<div class="prenatal-intro__photo">
				<?php $prenatal_intro_mobile_url = $prenatal_image( 'intro-class-actual.webp', 'full' ); ?>
				<?php $prenatal_intro_desktop_url = $prenatal_image( 'intro-family.webp', 'full' ); ?>
				<?php $prenatal_intro_image_url = $prenatal_intro_desktop_url ? $prenatal_intro_desktop_url : $prenatal_intro_mobile_url; ?>
				<?php if ( $prenatal_intro_image_url ) : ?>
					<picture>
						<?php if ( $prenatal_intro_mobile_url && $prenatal_intro_mobile_url !== $prenatal_intro_image_url ) : ?>
							<source media="(max-width: 639px)" srcset="<?php echo esc_url( $prenatal_intro_mobile_url ); ?>" />
						<?php endif; ?>
						<img src="<?php echo esc_url( $prenatal_intro_image_url ); ?>" alt="Bố mẹ tham gia lớp học cùng con" />
					</picture>
				<?php endif; ?>
			</div>
			<div class="prenatal-intro__copy">
				<div class="prenatal-badge">
					<img class="prenatal-badge__icon" src="<?php echo esc_url( $image . 'icons/star-light.svg' ); ?>" alt="" aria-hidden="true" width="24" height="24" />
					<span>MỘT KHỞI ĐẦU VỮNG VÀNG</span>
				</div>
				<h2 id="prenatal-intro-title" class="prenatal-title">
					<span>Yêu Thương Là Bản Năng</span>
					<em>Chăm Con Là Kỹ Năng</em>
				</h2>
				<p>Ngày con chào đời là khởi đầu của một hành trình thiêng liêng. Bên cạnh tình yêu thương, cha mẹ còn cần những kiến thức đúng và kỹ năng thực tế để tự tin chăm sóc con yêu.</p>
				<p>Lớp học tiền sản tại trung tâm ở cữ Vạn Phúc Care được hình thành với sứ mệnh giúp cha mẹ thực sự thấu hiểu nhu cầu của trẻ, biết khi nào cần can thiệp, khi nào nên kiên nhẫn — và cùng nhau chuẩn bị cho những ngày đầu đón bé.</p>
			</div>
		</div>
		<div class="prenatal-feature-grid">
			<article>
				<div class="prenatal-feature-icon">
					<img src="<?php echo esc_url( $image . 'icons/professional.svg' ); ?>" alt="" aria-hidden="true" width="24" height="24" />
				</div>
				<h3>Chuyên môn vững vàng</h3>
				<p>Đồng hành cùng điều dưỡng trưởng Thanh Thủy và đội ngũ giàu kinh nghiệm</p>
			</article>
			<article>
				<div class="prenatal-feature-icon">
					<img src="<?php echo esc_url( $image . 'icons/monitoring.svg' ); ?>" alt="" aria-hidden="true" width="24" height="24" />
				</div>
				<h3>Thực hành chuẩn y khoa</h3>
				<p>Trực tiếp thực hành trên mô hình búp bê y tế, đồng thời được hướng dẫn sát sao 1:1</p>
			</article>
			<article>
				<div class="prenatal-feature-icon">
					<img src="<?php echo esc_url( $image . 'icons/companionship.svg' ); ?>" alt="" aria-hidden="true" width="24" height="24" />
				</div>
				<h3>Bố mẹ cùng đồng hành</h3>
				<p>Bố tự tin chăm sóc con và san sẻ cùng mẹ ngay từ những ngày đầu sau sinh</p>
			</article>
			<article>
				<div class="prenatal-feature-icon">
					<img src="<?php echo esc_url( $image . 'icons/materials.svg' ); ?>" alt="" aria-hidden="true" width="24" height="24" />
				</div>
				<h3>Dễ hiểu, dễ áp dụng</h3>
				<p>Kiến thức khoa học được chuyển thành những kỹ năng gần gũi và thực tế</p>
			</article>
		</div>
	</div>
</section>

