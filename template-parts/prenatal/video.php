<?php
/**
 * Prenatal - Class Video Preview Section.
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

$raw_video_url            = apply_filters( 'vpc_prenatal_video_url', get_theme_mod( 'vpc_prenatal_video_url', '' ) );
$video_embed              = function_exists( 'vpc_parse_video_embed' ) ? vpc_parse_video_embed( $raw_video_url ) : null;
$prenatal_video_image_url = $prenatal_image( 'class-video.webp', 'large' );
?>
<section class="vpc-section prenatal-video" aria-labelledby="prenatal-video-title">
	<div class="prenatal-container prenatal-center">
		<div class="prenatal-badge">
			<img class="prenatal-badge__icon" src="<?php echo esc_url( $image . 'icons/star-light.svg' ); ?>" alt="" aria-hidden="true" width="24" height="24" />
			<span>MỘT GÓC LỚP HỌC TIỀN SẢN</span>
		</div>
		<h2 id="prenatal-video-title">Từ Bỡ Ngỡ Đến Tự Tin Chăm Con</h2>
		<p class="prenatal-lead">Bố mẹ cùng học, cùng thực hành — với sự hướng dẫn trực tiếp của điều dưỡng.</p>
		<?php if ( $prenatal_video_image_url ) : ?>
			<?php if ( ! empty( $video_embed['embed_url'] ) ) : ?>
				<button type="button" class="prenatal-video__frame js-prenatal-video-player" data-video-src="<?php echo esc_url( $video_embed['embed_url'] ); ?>" data-video-type="<?php echo esc_attr( $video_embed['type'] ); ?>" aria-label="<?php esc_attr_e( 'Phát video không khí lớp học tiền sản', 'vanphuccare' ); ?>">
					<img src="<?php echo esc_url( $prenatal_video_image_url ); ?>" alt="Không khí thực hành trong lớp học tiền sản" loading="lazy" width="998" height="542" />
					<span class="prenatal-play" aria-hidden="true">
						<img class="prenatal-play__circle" src="<?php echo esc_url( $image . 'icons/video-play-circle.svg' ); ?>" alt="" width="86" height="86" />
						<img class="prenatal-play__triangle" src="<?php echo esc_url( $image . 'icons/video-play-triangle.svg' ); ?>" alt="" width="35" height="26" />
					</span>
				</button>
			<?php else : ?>
				<a class="prenatal-video__frame" href="#prenatal-registration" aria-label="Đăng ký tư vấn lớp học">
					<img src="<?php echo esc_url( $prenatal_video_image_url ); ?>" alt="Không khí thực hành trong lớp học tiền sản" loading="lazy" width="998" height="542" />
					<span class="prenatal-play" aria-hidden="true">
						<img class="prenatal-play__circle" src="<?php echo esc_url( $image . 'icons/video-play-circle.svg' ); ?>" alt="" width="86" height="86" />
						<img class="prenatal-play__triangle" src="<?php echo esc_url( $image . 'icons/video-play-triangle.svg' ); ?>" alt="" width="35" height="26" />
					</span>
				</a>
			<?php endif; ?>
		<?php endif; ?>
		<div class="prenatal-video__cta">
			<h3>Sẵn sàng cùng nhau đón bé?</h3>
			<p>Để lại thông tin để được tư vấn buổi học phù hợp với gia đình.</p>
		</div>
		<a class="prenatal-button prenatal-button--primary" href="#prenatal-registration">Tư vấn lớp học</a>
	</div>
</section>

