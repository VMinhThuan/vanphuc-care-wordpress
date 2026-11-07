<?php
/**
 * Service archive — Dịch vụ chăm sóc mẹ và bé.
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$service_defaults = array(
	array(
		'slug'    => 'trung-tam-o-cu',
		'title'   => 'Trung tâm ở cữ',
		'copy'    => 'Không gian nghỉ dưỡng sau sinh, nơi mẹ và bé được chăm sóc trọn vẹn, an tâm phục hồi mỗi ngày.',
		'image'   => 'home/trung-tam-o-cu.webp',
		'href'    => home_url( '/o-cu/' ),
		'service' => 'trung-tam-o-cu',
	),
	array(
		'slug'    => 'bao-mau-tai-nha',
		'title'   => 'Bảo mẫu tại nhà',
		'copy'    => 'Điều dưỡng chăm bé tận tâm tại nhà, giúp mẹ có thêm thời gian nghỉ ngơi và chủ động sắp xếp cuộc sống.',
		'image'   => 'bao-mau/hero.jpg',
		'href'    => home_url( '/bao-mau-tai-nha/' ),
		'service' => 'bao-mau-tai-nha',
	),
	array(
		'slug'    => 'tu-van-nuoi-con-easy',
		'title'   => 'Tư vấn nuôi con EASY',
		'copy'    => 'Đồng hành cùng gia đình xây dựng nếp sinh hoạt khoa học, nhẹ nhàng và phù hợp với từng em bé.',
		'image'   => 'easy/hero.jpg',
		'href'    => home_url( '/tu-van-nuoi-con-easy/' ),
		'service' => 'tu-van-nuoi-con-easy',
	),
	array(
		'slug'    => 'tam-be-tai-nha',
		'title'   => 'Tắm bé tại nhà',
		'copy'    => 'Tắm, massage và vệ sinh sơ sinh đúng chuẩn, để những ngày đầu đời của bé luôn an toàn và êm dịu.',
		'image'   => 'bath/hero.jpg',
		'href'    => home_url( '/tam-be-tai-nha/' ),
		'service' => 'tam-be-sau-sinh',
	),
	array(
		'slug'    => 'thong-tac-tia-sua',
		'title'   => 'Thông tắc tia sữa',
		'copy'    => 'Hỗ trợ mẹ xử lý tắc tia sữa nhẹ nhàng, an toàn và được hướng dẫn chăm sóc sau buổi trị liệu.',
		'image'   => 'milk/hero.png',
		'href'    => home_url( '/thong-tac-tia-sua/' ),
		'service' => 'thong-tac-tia-sua',
	),
	array(
		'slug'    => 'lop-hoc-tien-san',
		'title'   => 'Lớp học tiền sản',
		'copy'    => 'Trang bị kiến thức và kỹ năng thiết thực để bố mẹ tự tin chào đón hành trình làm cha mẹ.',
		'image'   => 'home/lop-hoc-tien-san-1.webp',
		'href'    => home_url( '/lop-hoc-tien-san/' ),
		'service' => 'lop-hoc-tien-san',
	),
	array(
		'slug'    => 'khoa-hoc-truc-tuyen',
		'title'   => 'Khóa học trực tuyến',
		'copy'    => 'Kiến thức chăm sóc mẹ và bé chuẩn y khoa, học thuận tiện tại nhà và có đội ngũ đồng hành giải đáp.',
		'image'   => 'easy/online.jpg',
		'href'    => home_url( '/kien-thuc/' ),
		'service' => 'khoa-hoc-truc-tiep',
	),
	array(
		'slug'    => 'cham-me-sau-sinh',
		'title'   => 'Chăm mẹ sau sinh',
		'copy'    => 'Giải pháp chăm sóc hậu sản chuyên sâu, giúp mẹ phục hồi thể chất và tinh thần một cách trọn vẹn.',
		'image'   => 'home_care_bed.jpg',
		'href'    => home_url( '/lien-he/' ),
		'service' => 'cham-me-sau-sinh',
	),
);

$service_posts = get_posts(
	array(
		'post_type'      => 'vpc_service',
		'post_status'    => 'publish',
		'posts_per_page' => -1,
		'orderby'        => array( 'menu_order' => 'ASC', 'date' => 'DESC' ),
	)
);

$services = array();
if ( $service_posts ) {
	foreach ( $service_posts as $service_post ) {
		$service_slug = sanitize_title( $service_post->post_name );
		$default      = array();
		foreach ( $service_defaults as $candidate ) {
			if ( $candidate['slug'] === $service_slug ) {
				$default = $candidate;
				break;
			}
		}

		$summary = get_post_meta( $service_post->ID, 'vpc_service_summary', true );
		$image   = get_the_post_thumbnail_url( $service_post, 'large' );
		$href    = get_post_meta( $service_post->ID, 'vpc_service_cta_url', true );

		$services[] = array(
			'slug'    => $service_slug,
			'title'   => get_the_title( $service_post ),
			'copy'    => $summary ? $summary : wp_trim_words( wp_strip_all_tags( $service_post->post_excerpt ? $service_post->post_excerpt : $service_post->post_content ), 26 ),
			'image'   => $image ? $image : ( isset( $default['image'] ) ? vpc_image_url( $default['image'], 'large' ) : vpc_image_url( 'home/hero-section-image.webp', 'large' ) ),
			'href'    => $href ? $href : get_permalink( $service_post ),
			'service' => isset( $default['service'] ) ? $default['service'] : 'cham-me-sau-sinh',
		);
	}
} else {
	foreach ( $service_defaults as $service ) {
		$service['image'] = vpc_image_url( $service['image'], 'large' );
		$services[]       = $service;
	}
}
?>

<main class="vpc-services-page" data-figma-node="3126:39803" data-figma-mobile-node="3126:39866">
	<section class="vpc-services-hero" aria-labelledby="services-page-title">
		<div class="vpc-services-container vpc-services-hero__grid">
			<div class="vpc-services-hero__copy">
				<span class="vpc-services-badge"><img src="<?php echo esc_url( vpc_image_url( 'bao-mau/star.svg', 'full' ) ); ?>" width="24" height="24" alt="" aria-hidden="true">VẠN PHÚC CARE</span>
				<h1 id="services-page-title"><span>Dịch Vụ Chăm Sóc</span><em>Mẹ Khỏe - Bé Ngoan</em></h1>
				<p>Đồng hành cùng gia đình bằng những giải pháp chăm sóc mẹ và bé tận tâm, chuẩn y khoa và phù hợp với từng nhu cầu.</p>
				<div class="vpc-services-hero__actions">
					<a class="vpc-services-button vpc-services-button--primary" href="#services-list">Khám phá dịch vụ</a>
					<button type="button" class="vpc-services-button vpc-services-button--secondary" data-open-modal="vpc-consultation-modal" data-service="cham-me-sau-sinh">Tư vấn miễn phí</button>
				</div>
			</div>
			<div class="vpc-services-hero__visual">
				<img src="<?php echo esc_url( vpc_image_url( 'home/hero-section-image.webp', 'large' ) ); ?>" width="616" height="420" alt="Điều dưỡng Vạn Phúc Care chăm sóc mẹ và bé" fetchpriority="high">
				<div class="vpc-services-hero__note"><strong>5+ năm</strong><span>đồng hành cùng mẹ và bé</span></div>
			</div>
		</div>
	</section>

	<section class="vpc-services-stats" aria-label="Thông tin nổi bật">
		<div class="vpc-services-container vpc-services-stats__grid">
			<div><strong>8+</strong><span>Dịch vụ chăm sóc</span></div>
			<div><strong>5+</strong><span>Năm kinh nghiệm</span></div>
			<div><strong>5000+</strong><span>Gia đình đồng hành</span></div>
		</div>
	</section>

	<section id="services-list" class="vpc-services-catalog" aria-labelledby="services-catalog-title">
		<div class="vpc-services-container">
			<div class="vpc-services-section-heading">
				<span class="vpc-services-badge"><img src="<?php echo esc_url( vpc_image_url( 'bao-mau/star.svg', 'full' ) ); ?>" width="24" height="24" alt="" aria-hidden="true">DỊCH VỤ CỦA CHÚNG TÔI</span>
				<h2 id="services-catalog-title"><span>Giải Pháp Chăm Sóc</span><em>Toàn Diện Cho Gia Đình</em></h2>
				<p>Lựa chọn dịch vụ phù hợp với hành trình của gia đình. Đội ngũ Vạn Phúc Care luôn sẵn sàng lắng nghe và đồng hành.</p>
			</div>

			<div class="vpc-services-grid">
				<?php foreach ( $services as $service ) : ?>
					<article class="vpc-service-card">
						<a class="vpc-service-card__image" href="<?php echo esc_url( $service['href'] ); ?>"><img src="<?php echo esc_url( $service['image'] ); ?>" width="390" height="236" alt="<?php echo esc_attr( $service['title'] ); ?>" loading="lazy"><span aria-hidden="true">↗</span></a>
						<div class="vpc-service-card__body">
							<h3><a href="<?php echo esc_url( $service['href'] ); ?>"><?php echo esc_html( $service['title'] ); ?></a></h3>
							<p><?php echo esc_html( $service['copy'] ); ?></p>
							<div class="vpc-service-card__footer"><button type="button" class="vpc-services-link" data-open-modal="vpc-consultation-modal" data-service="<?php echo esc_attr( $service['service'] ); ?>">Nhận tư vấn <span aria-hidden="true">→</span></button><a class="vpc-services-link" href="<?php echo esc_url( $service['href'] ); ?>">Xem chi tiết <span aria-hidden="true">→</span></a></div>
						</div>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="vpc-services-cta" aria-labelledby="services-cta-title">
		<div class="vpc-services-container vpc-services-cta__inner">
			<div><span class="vpc-services-badge">ĐỒNG HÀNH CÙNG MẸ</span><h2 id="services-cta-title"><span>Sẵn Sàng Bắt Đầu</span><em>Hành Trình Làm Mẹ Hạnh Phúc?</em></h2><p>Để đội ngũ chuyên gia của Vạn Phúc Care tư vấn giải pháp phù hợp nhất với gia đình bạn.</p></div>
			<button type="button" class="vpc-services-button vpc-services-button--primary" data-open-modal="vpc-consultation-modal" data-service="cham-me-sau-sinh">Đăng ký tư vấn</button>
		</div>
	</section>
</main>

<?php get_footer(); ?>
