<?php
/**
 * Template Name: Dịch vụ - Tất cả dịch vụ
 * Template Post Type: page
 *
 * Page template for /dich-vu/ overview page.
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$asset_uri = get_template_directory_uri() . '/assets/images/services';

$featured_services = array(
	array( 'title' => 'Trung tâm ở cữ', 'tag' => 'Sau sinh', 'copy' => 'Không gian nghỉ dưỡng, chăm sóc trọn vẹn mẹ và bé sau sinh.', 'image' => 'featured-1.png', 'href' => home_url( '/dich-vu/trung-tam-o-cu/' ) ),
	array( 'title' => 'Bảo mẫu tại nhà', 'tag' => 'Sau sinh', 'copy' => 'Người đồng hành chăm sóc mẹ và bé ngay tại nhà.', 'image' => 'featured-2.png', 'href' => home_url( '/dich-vu/bao-mau-tai-nha/' ) ),
	array( 'title' => 'Lớp học tiền sản', 'tag' => 'Trước sinh', 'copy' => 'Chuẩn bị kiến thức và tâm thế cho hành trình trước sinh.', 'image' => 'featured-3.png', 'href' => home_url( '/dich-vu/lop-hoc-tien-san/' ) ),
	array( 'title' => 'Khóa học trực tuyến', 'tag' => 'Mọi giai đoạn', 'copy' => 'Học kiến thức nuôi con mọi lúc, mọi nơi.', 'image' => 'featured-4.png', 'href' => 'https://edu.vanphuccare.vn', 'target' => '_blank' ),
);

$other_services = array(
	array( 'title' => 'Tư vấn nuôi con EASY', 'tag' => 'Nuôi con', 'copy' => '', 'image' => 'other-1.png', 'href' => home_url( '/dich-vu/dich-vu-tu-van-nuoi-con-easy-truc-tuyen/' ) ),
	array( 'title' => 'Tắm bé sơ sinh', 'tag' => 'Sau sinh', 'copy' => '', 'image' => 'other-2.png', 'href' => home_url( '/dich-vu/tam-tre-so-sinh/' ) ),
	array( 'title' => 'Thông tắc tia sữa', 'tag' => 'Sau sinh', 'copy' => '', 'image' => 'other-3.png', 'href' => home_url( '/dich-vu/thong-tac-tia-sua/' ) ),
);

$features = array(
	array( 'icon' => 'feature-professional.svg', 'title' => 'Đội ngũ chuyên nghiệp', 'copy' => '100% điều dưỡng, hộ sinh có bằng cấp y khoa, giàu kinh nghiệm và am hiểu tâm lý mẹ bé.' ),
	array( 'icon' => 'feature-medical-science.svg', 'title' => 'Chuẩn khoa học & y khoa', 'copy' => 'Quy trình chăm sóc và liệu trình phục hồi được xây dựng chuẩn y tế, đảm bảo an toàn tuyệt đối.' ),
	array( 'icon' => 'feature-dedicated.svg', 'title' => 'Chăm sóc tận tâm', 'copy' => 'Luôn nhẹ nhàng, chu đáo và chăm chuốt từng giấc ngủ, bữa ăn cho mẹ và bé như người thân trong nhà.' ),
	array( 'icon' => 'feature-companionship.svg', 'title' => 'Dịch vụ toàn diện', 'copy' => 'Giải pháp trọn gói từ chăm sóc bầu, thông tắc tia sữa, tắm bé đến phục hồi vóc dáng sau sinh.' ),
	array( 'icon' => 'feature-empathy.svg', 'title' => 'Đồng hành sẻ chia', 'copy' => 'Sẵn sàng tư vấn, hướng dẫn ba mẹ kiến thức nuôi con khoa học để hành trình làm cha mẹ trở nên dễ dàng.' ),
	array( 'icon' => 'feature-trusted.svg', 'title' => 'Uy tín & minh bạch', 'copy' => 'Hợp đồng dịch vụ rõ ràng, chi phí minh bạch và cam kết chất lượng bằng văn bản' ),
);

$steps = array(
	array( 'number' => '01', 'label' => 'Bước 1', 'icon' => 'step-signup.svg', 'title' => 'Đăng ký dịch vụ', 'copy' => 'Cha mẹ có thể liên hệ trực tiếp hoặc điền form đăng ký, giúp chúng tôi nắm bắt nhu cầu chăm sóc sức khỏe hiện tại của gia đình.' ),
	array( 'number' => '02', 'label' => 'Bước 2', 'icon' => 'step-consultation.svg', 'title' => 'Tư vấn chuyên sâu', 'copy' => 'Tư vấn viên lắng nghe, giải đáp thắc mắc và đề xuất gói dịch vụ phù hợp, đáp ứng kỳ vọng cụ thể của từng gia đình.' ),
	array( 'number' => '03', 'label' => 'Bước 3', 'icon' => 'step-confirm.svg', 'title' => 'Xác nhận hợp đồng', 'copy' => 'Xác nhận thông tin, quy trình làm việc và ký kết hợp đồng dịch vụ.' ),
);

get_header();
?>

<main class="vpc-services-page" data-figma-node="3126:39803" data-figma-mobile-node="3126:39866">
	<section class="vpc-services-banner" aria-label="Dịch vụ Vạn Phúc Care">
		<img src="<?php echo esc_url( vpc_theme_asset_url( 'services/banner.png' ) ); ?>" width="1440" height="581" alt="Chăm sóc bé yêu khoa học cùng Vạn Phúc Care" fetchpriority="high">
	</section>

	<section id="services-list" class="vpc-services-list" aria-labelledby="services-list-title">
		<div class="vpc-services-container">
			<div class="vpc-services-heading">
				<span class="vpc-services-badge"><img src="<?php echo esc_url( $asset_uri . '/badge-star.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true">TẤT CẢ DỊCH VỤ</span>
				<h1 id="services-list-title"><span>Dịch Vụ Của</span> <em>Vạn Phúc Care</em></h1>
			</div>

			<div class="vpc-services-featured">
				<?php foreach ( $featured_services as $service ) : ?>
					<?php
					$is_external = ! empty( $service['target'] ) || ( isset( $service['href'] ) && strpos( $service['href'], 'http' ) === 0 && strpos( $service['href'], home_url() ) === false );
					$target_attr = $is_external ? ' target="_blank" rel="noopener noreferrer"' : '';
					?>
					<article class="vpc-service-card vpc-service-card--featured">
						<a class="vpc-service-card__image" href="<?php echo esc_url( $service['href'] ); ?>"<?php echo $target_attr; ?>><img src="<?php echo esc_url( vpc_theme_asset_url( 'services/' . $service['image'] ) ); ?>" width="200" height="200" alt="<?php echo esc_attr( $service['title'] ); ?>" loading="lazy"></a>
						<div class="vpc-service-card__body">
							<div class="vpc-service-card__meta">
								<span class="vpc-service-card__tag"><?php echo esc_html( $service['tag'] ); ?></span>
								<img class="vpc-service-card__service-icon" src="<?php echo esc_url( $asset_uri . '/feature-dedicated.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true">
							</div>
							<h2><a href="<?php echo esc_url( $service['href'] ); ?>"<?php echo $target_attr; ?>><?php echo esc_html( $service['title'] ); ?></a></h2>
							<p><?php echo esc_html( $service['copy'] ); ?></p>
							<a class="vpc-services-detail" href="<?php echo esc_url( $service['href'] ); ?>"<?php echo $target_attr; ?>>Xem chi tiết</a>
						</div>
					</article>
				<?php endforeach; ?>
			</div>

			<div class="vpc-services-other">
				<?php foreach ( $other_services as $service ) : ?>
					<article class="vpc-service-card vpc-service-card--other">
						<a class="vpc-service-card__image" href="<?php echo esc_url( $service['href'] ); ?>"><img src="<?php echo esc_url( vpc_theme_asset_url( 'services/' . $service['image'] ) ); ?>" width="92" height="92" alt="<?php echo esc_attr( $service['title'] ); ?>" loading="lazy"></a>
						<div class="vpc-service-card__body">
							<span class="vpc-service-card__tag"><?php echo esc_html( $service['tag'] ); ?></span>
							<h3><a href="<?php echo esc_url( $service['href'] ); ?>"><?php echo esc_html( $service['title'] ); ?></a></h3>
							<a class="vpc-services-detail" href="<?php echo esc_url( $service['href'] ); ?>">Xem chi tiết <img src="<?php echo esc_url( $asset_uri . '/chevron-right.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true"></a>
						</div>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="vpc-services-features" aria-labelledby="services-features-title">
		<div class="vpc-services-container">
			<div class="vpc-services-heading vpc-services-heading--center">
				<span class="vpc-services-badge vpc-services-features__badge"><img src="<?php echo esc_url( $asset_uri . '/badge-star.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true">BẠN ĐỒNG HÀNH CỦA BA MẸ</span>
				<h2 id="services-features-title"><span>Vì Sao Bạn Nên Chọn</span><em>Vạn Phúc Care?</em></h2>
			</div>
			<div class="vpc-services-feature-grid">
				<?php foreach ( $features as $feature ) : ?>
					<article class="vpc-services-feature-card">
						<span class="vpc-services-feature-card__icon"><img src="<?php echo esc_url( $asset_uri . '/' . $feature['icon'] ); ?>" width="24" height="24" alt="" aria-hidden="true"></span>
						<h3><?php echo esc_html( $feature['title'] ); ?></h3>
						<?php $feature_copy = esc_html( $feature['copy'] ); ?>
						<?php if ( 'Uy tín & minh bạch' === $feature['title'] ) : ?>
							<?php $feature_copy = str_replace( 'văn bản', 'văn&nbsp;bản', $feature_copy ); ?>
						<?php endif; ?>
						<p><?php echo wp_kses_post( $feature_copy ); ?></p>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="vpc-services-process" aria-labelledby="services-process-title">
		<div class="vpc-services-container vpc-services-process__grid">
			<div class="vpc-services-process__visual"><img src="<?php echo esc_url( vpc_theme_asset_url( 'services/process-visual.png' ) ); ?>" width="575" height="626" alt="Điều dưỡng tư vấn chăm sóc mẹ và bé" loading="lazy"></div>
			<div class="vpc-services-process__content">
				<div class="vpc-services-heading">
						<span class="vpc-services-badge"><img src="<?php echo esc_url( $asset_uri . '/badge-star.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true">QUY TRÌNH TIẾP NHẬN</span>
						<h2 id="services-process-title"><span>Quy Trình</span><em>Tiếp Nhận &amp; Tư Vấn</em></h2>
				</div>
				<div class="vpc-services-steps">
					<?php foreach ( $steps as $step ) : ?>
							<article class="vpc-services-step"><div class="vpc-services-step__meta"><span><?php echo esc_html( $step['label'] ); ?></span><i><img src="<?php echo esc_url( $asset_uri . '/' . $step['icon'] ); ?>" width="24" height="24" alt="" aria-hidden="true"></i></div><div class="vpc-services-step__content"><h3><?php echo esc_html( $step['title'] ); ?></h3><p><?php echo esc_html( $step['copy'] ); ?></p></div></article>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</section>

	<?php get_template_part( 'template-parts/sections/feedback' ); ?>
</main>

<?php get_footer(); ?>

