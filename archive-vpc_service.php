<?php
/**
 * Service archive — Dịch vụ chăm sóc mẹ và bé.
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$asset_uri = get_template_directory_uri() . '/assets/images/bao-mau';

$featured_services = array(
	array( 'title' => 'Trung tâm ở cữ', 'tag' => 'Sau sinh', 'copy' => 'Không gian nghỉ dưỡng, chăm sóc trọn vẹn mẹ và bé sau sinh.', 'image' => 'o-cu/room-hero.png', 'href' => home_url( '/o-cu/' ) ),
	array( 'title' => 'Bảo mẫu tại nhà', 'tag' => 'Sau sinh', 'copy' => 'Người đồng hành chăm sóc mẹ và bé ngay tại nhà.', 'image' => 'bao-mau/service-6.jpg', 'href' => home_url( '/bao-mau-tai-nha/' ) ),
	array( 'title' => 'Lớp học tiền sản', 'tag' => 'Trước sinh', 'copy' => 'Chuẩn bị kiến thức và tâm thế cho hành trình trước sinh.', 'image' => 'lop-hoc-tien-san/hero-class-actual.png', 'href' => home_url( '/lop-hoc-tien-san/' ) ),
	array( 'title' => 'Khóa học trực tuyến', 'tag' => 'Mọi giai đoạn', 'copy' => 'Học kiến thức nuôi con mọi lúc, mọi nơi.', 'image' => 'easy/online.jpg', 'href' => home_url( '/kien-thuc/' ) ),
);

$other_services = array(
	array( 'title' => 'Tư vấn nuôi con EASY', 'tag' => 'Nuôi con', 'copy' => 'Đồng hành xây dựng nếp sinh hoạt khoa học cho bé.', 'image' => 'easy/hero.jpg', 'href' => home_url( '/tu-van-nuoi-con-easy/' ) ),
	array( 'title' => 'Tắm bé sơ sinh', 'tag' => 'Sau sinh', 'copy' => 'Tắm và vệ sinh sơ sinh đúng chuẩn tại nhà.', 'image' => 'bath/hero.jpg', 'href' => home_url( '/tam-be-tai-nha/' ) ),
	array( 'title' => 'Thông tắc tia sữa', 'tag' => 'Sau sinh', 'copy' => 'Hỗ trợ mẹ xử lý tắc tia sữa nhẹ nhàng, an toàn.', 'image' => 'milk/hero.png', 'href' => home_url( '/thong-tac-tia-sua/' ) ),
);

$features = array(
	array( 'icon' => 'professional.svg', 'title' => 'Đội ngũ chuyên nghiệp', 'copy' => 'Đội ngũ điều dưỡng được đào tạo bài bản, tận tâm và giàu kinh nghiệm.' ),
	array( 'icon' => 'health-safety.svg', 'title' => 'Chuẩn khoa học & kỹ thuật', 'copy' => 'Quy trình chăm sóc được xây dựng theo kiến thức y khoa và nhu cầu thực tế.' ),
	array( 'icon' => 'mother-companion.svg', 'title' => 'Chăm sóc tận tâm', 'copy' => 'Luôn lắng nghe, thấu hiểu và đồng hành cùng mẹ trong từng khoảnh khắc.' ),
	array( 'icon' => 'routine.svg', 'title' => 'Dịch vụ toàn diện', 'copy' => 'Đa dạng giải pháp chăm sóc mẹ và bé trước sinh, sau sinh và tại nhà.' ),
	array( 'icon' => 'vector52.svg', 'title' => 'Đồng hành sẻ chia', 'copy' => 'Mang đến sự an tâm để gia đình có thêm thời gian nghỉ ngơi và tận hưởng.' ),
	array( 'icon' => 'check-badge.svg', 'title' => 'Uy tín & minh bạch', 'copy' => 'Tư vấn rõ ràng, chi phí minh bạch và cam kết chất lượng trong mỗi dịch vụ.' ),
);

$steps = array(
	array( 'number' => '01', 'title' => 'Đăng ký dịch vụ', 'copy' => 'Cha mẹ liên hệ trực tiếp hoặc điền form đăng ký để được tiếp nhận nhu cầu.' ),
	array( 'number' => '02', 'title' => 'Tư vấn chuyên sâu', 'copy' => 'Tư vấn viên lắng nghe, giải đáp thắc mắc và đề xuất giải pháp phù hợp.' ),
	array( 'number' => '03', 'title' => 'Xác nhận dịch vụ', 'copy' => 'Hai bên thống nhất thông tin, quy trình làm việc và thời gian chăm sóc.' ),
);

$feedback = array(
	array( 'image' => 'feedback-1.png', 'name' => 'Mẹ bé Kami', 'copy' => 'Mình thực sự thấy quyết định chọn Vạn Phúc Care là sáng suốt nhất. Hai mẹ con được chăm sóc chu đáo mỗi ngày và luôn cảm thấy an tâm.' ),
	array( 'image' => 'feedback-2.png', 'name' => 'Mẹ bé Mandu', 'copy' => 'Cô chăm bé vô cùng cẩn thận và khéo léo. Bé nhà mình khỏe mạnh, ngủ ngoan hơn và có lịch trình sinh hoạt ổn định.' ),
	array( 'image' => 'feedback-3.png', 'name' => 'Mẹ bé Cát', 'copy' => 'Dịch vụ chăm sóc rất tỉ mỉ, tận tình. Các cô tư vấn dễ hiểu, hỗ trợ gia đình trong từng vấn đề nhỏ.' ),
	array( 'image' => 'feedback-4.png', 'name' => 'Mẹ Trà My – Bé Nghé', 'copy' => 'Cực kỳ hài lòng với dịch vụ. Cô chăm sóc bé rất kỹ, yêu trẻ và nhiệt tình tư vấn cho mẹ.' ),
	array( 'image' => 'feedback-5.png', 'name' => 'Nguyễn Thị Ngọc Trân', 'copy' => 'Các cô luôn tận tâm, nhiệt tình và có kinh nghiệm. Mình nhanh chóng xử lý được vấn đề và yên tâm chăm bé.' ),
	array( 'image' => 'feedback-6.png', 'name' => 'Mẹ Sấm Chớp', 'copy' => 'Gia đình mình rất yên tâm khi có điều dưỡng đồng hành. Mẹ có thời gian nghỉ ngơi mà bé vẫn được chăm sóc thật tốt.' ),
	array( 'image' => 'feedback-7.png', 'name' => 'Mẹ Cafe', 'copy' => 'Cô chăm sóc bé nhẹ nhàng, khéo léo, cẩn thận và hướng dẫn tận tình cho cả gia đình.' ),
	array( 'image' => 'feedback-8.png', 'name' => 'Mẹ Nghé Ọ', 'copy' => 'Đội ngũ điều dưỡng tận tâm, tư vấn rõ ràng và đồng hành rất sát trong những ngày đầu chăm con.' ),
);

get_header();
?>

<main class="vpc-services-page" data-figma-node="3126:39803" data-figma-mobile-node="3126:39866">
	<section class="vpc-services-banner" aria-label="Dịch vụ Vạn Phúc Care">
		<img src="<?php echo esc_url( vpc_image_url( 'home/hero-banner.png', 'full' ) ); ?>" width="1440" height="581" alt="Chăm sóc bé yêu khoa học cùng Vạn Phúc Care" fetchpriority="high">
	</section>

	<section id="services-list" class="vpc-services-list" aria-labelledby="services-list-title">
		<div class="vpc-services-container">
			<div class="vpc-services-heading">
				<span class="vpc-services-badge"><img src="<?php echo esc_url( $asset_uri . '/star.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true">TẤT CẢ DỊCH VỤ</span>
				<h1 id="services-list-title"><span>Dịch Vụ Của</span> <em>Vạn Phúc Care</em></h1>
			</div>

			<div class="vpc-services-featured">
				<?php foreach ( $featured_services as $service ) : ?>
					<article class="vpc-service-card vpc-service-card--featured">
						<a class="vpc-service-card__image" href="<?php echo esc_url( $service['href'] ); ?>"><img src="<?php echo esc_url( vpc_image_url( $service['image'], 'large' ) ); ?>" width="200" height="200" alt="<?php echo esc_attr( $service['title'] ); ?>" loading="lazy"></a>
						<div class="vpc-service-card__body">
							<span class="vpc-service-card__tag"><?php echo esc_html( $service['tag'] ); ?></span>
							<h2><a href="<?php echo esc_url( $service['href'] ); ?>"><?php echo esc_html( $service['title'] ); ?></a></h2>
							<p><?php echo esc_html( $service['copy'] ); ?></p>
							<a class="vpc-services-detail" href="<?php echo esc_url( $service['href'] ); ?>">Xem chi tiết <span aria-hidden="true">→</span></a>
						</div>
					</article>
				<?php endforeach; ?>
			</div>

			<h2 class="vpc-services-other-title">Khác</h2>
			<div class="vpc-services-other">
				<?php foreach ( $other_services as $service ) : ?>
					<article class="vpc-service-card vpc-service-card--other">
						<a class="vpc-service-card__image" href="<?php echo esc_url( $service['href'] ); ?>"><img src="<?php echo esc_url( vpc_image_url( $service['image'], 'large' ) ); ?>" width="92" height="92" alt="<?php echo esc_attr( $service['title'] ); ?>" loading="lazy"></a>
						<div class="vpc-service-card__body">
							<span class="vpc-service-card__tag"><?php echo esc_html( $service['tag'] ); ?></span>
							<h3><a href="<?php echo esc_url( $service['href'] ); ?>"><?php echo esc_html( $service['title'] ); ?></a></h3>
							<a class="vpc-services-detail" href="<?php echo esc_url( $service['href'] ); ?>">Xem chi tiết <span aria-hidden="true">→</span></a>
						</div>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="vpc-services-features" aria-labelledby="services-features-title">
		<div class="vpc-services-container">
			<div class="vpc-services-heading vpc-services-heading--center">
				<span class="vpc-services-badge"><img src="<?php echo esc_url( $asset_uri . '/star.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true">VÌ SAO CHỌN CHÚNG TÔI</span>
				<h2 id="services-features-title"><span>Vì Sao Bạn Nên Chọn</span> <em>Vạn Phúc Care?</em></h2>
			</div>
			<div class="vpc-services-feature-grid">
				<?php foreach ( $features as $feature ) : ?>
					<article class="vpc-services-feature-card">
						<span class="vpc-services-feature-card__icon"><img src="<?php echo esc_url( $asset_uri . '/' . $feature['icon'] ); ?>" width="28" height="28" alt="" aria-hidden="true"></span>
						<h3><?php echo esc_html( $feature['title'] ); ?></h3>
						<p><?php echo esc_html( $feature['copy'] ); ?></p>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="vpc-services-process" aria-labelledby="services-process-title">
		<div class="vpc-services-container vpc-services-process__grid">
			<div class="vpc-services-process__visual"><img src="<?php echo esc_url( vpc_image_url( 'bao-mau/service-3.jpg', 'large' ) ); ?>" width="575" height="626" alt="Điều dưỡng tư vấn chăm sóc mẹ và bé" loading="lazy"></div>
			<div class="vpc-services-process__content">
				<div class="vpc-services-heading">
					<span class="vpc-services-badge"><img src="<?php echo esc_url( $asset_uri . '/star.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true">QUY TRÌNH TIẾP NHẬN &amp; TƯ VẤN</span>
					<h2 id="services-process-title"><span>Quy Trình Tiếp Nhận</span> <em>&amp; Tư Vấn</em></h2>
				</div>
				<div class="vpc-services-steps">
					<?php foreach ( $steps as $step ) : ?>
						<article class="vpc-services-step"><strong><?php echo esc_html( $step['number'] ); ?></strong><div><h3><?php echo esc_html( $step['title'] ); ?></h3><p><?php echo esc_html( $step['copy'] ); ?></p></div></article>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</section>

	<section class="vpc-services-feedback" aria-labelledby="services-feedback-title">
		<div class="vpc-services-container">
			<div class="vpc-services-heading vpc-services-heading--center">
				<span class="vpc-services-badge"><img src="<?php echo esc_url( $asset_uri . '/star.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true">FEEDBACK</span>
				<h2 id="services-feedback-title"><span>Cảm Nhận</span> <em>Của Khách Hàng</em></h2>
				<p>Niềm tin của gia đình là động lực để Vạn Phúc Care không ngừng hoàn thiện chất lượng dịch vụ mỗi ngày.</p>
			</div>
		</div>
		<?php foreach ( array( array( array_slice( $feedback, 0, 4 ), false ), array( array_slice( $feedback, 4 ), true ) ) as $row ) : ?>
			<div class="vpc-services-feedback-row<?php echo $row[1] ? ' vpc-services-feedback-row--second' : ''; ?>">
				<div class="vpc-services-feedback-track">
					<?php foreach ( $row[0] as $item ) : ?>
						<article class="vpc-services-feedback-card">
							<div class="vpc-services-feedback-author"><img src="<?php echo esc_url( $asset_uri . '/' . $item['image'] ); ?>" width="40" height="40" alt="" loading="lazy"><div><strong><?php echo esc_html( $item['name'] ); ?></strong><span>★★★★★</span></div></div>
							<img class="vpc-services-feedback-quote" src="<?php echo esc_url( $asset_uri . '/quotation.svg' ); ?>" width="32" height="32" alt="" aria-hidden="true">
							<p><?php echo esc_html( $item['copy'] ); ?></p>
						</article>
					<?php endforeach; ?>
				</div>
			</div>
		<?php endforeach; ?>
	</section>
</main>

<?php get_footer(); ?>
