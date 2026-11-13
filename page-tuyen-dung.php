<?php
/**
 * Template Name: Tuyển dụng
 * Template Post Type: page
 *
 * Recruitment landing page matching Figma node 3481:27647.
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$asset_uri = get_template_directory_uri() . '/assets/images/recruitment';

$jobs = array(
	array(
		'title'    => 'Tuyển Dụng Điều Dưỡng | Nữ Hộ Sinh Làm Việc Tại Trung Tâm Ở Cữ',
		'updated'  => '28/09/2026',
		'deadline' => '31/10/2026',
		'href'     => home_url( '/tuyen-dung/tin-tuyen-dung/' ),
		'status'   => 'Đang tuyển',
	),
	array(
		'title'    => 'Tuyển Dụng Chuyên Viên Phát Triển Cộng Đồng (FB Group)',
		'updated'  => '23/09/2026',
		'deadline' => '11/10/2026',
		'href'     => home_url( '/tuyen-dung/tin-tuyen-dung/' ),
		'status'   => 'Đang tuyển',
	),
	array(
		'title'    => 'Tuyển Dụng Chuyên Viên Sáng Tạo Nội Dung (Tiktok Content Creator)',
		'updated'  => '23/09/2026',
		'deadline' => '11/10/2026',
		'href'     => home_url( '/tuyen-dung/tin-tuyen-dung/' ),
		'status'   => 'Đang tuyển',
	),
	array(
		'title'    => 'Thông báo mở ứng tuyển công việc bảo mẫu',
		'updated'  => '26/11/2025',
		'deadline' => '31/12/2025',
		'href'     => home_url( '/tuyen-dung/tin-tuyen-dung/' ),
		'status'   => 'Đã đóng',
	),
	array(
		'title'    => 'Thông tin tuyển dụng Điều Dưỡng 2025',
		'updated'  => '04/10/2025',
		'deadline' => '28/10/2025',
		'href'     => home_url( '/tuyen-dung/tin-tuyen-dung/' ),
		'status'   => 'Đã đóng',
	),
	array(
		'title'    => 'Tuyển dụng Designer 2D – nhân viên thiết kế đồ họa',
		'updated'  => '03/03/2025',
		'deadline' => '15/03/2025',
		'href'     => home_url( '/tuyen-dung/tin-tuyen-dung/' ),
		'status'   => 'Đã đóng',
	),
);

$steps = array(
	array( 'number' => '01', 'title' => 'Ứng tuyển', 'copy' => 'Ứng tuyển và nhận được nhiều hơn cả một cơ hội việc làm', 'icon' => 'process-signup.svg' ),
	array( 'number' => '02', 'title' => 'Phỏng vấn', 'copy' => 'Trao đổi và tìm hiểu thêm về vị trí đã ứng tuyển và cách làm việc', 'icon' => 'process-interview.svg' ),
	array( 'number' => '03', 'title' => 'Thông báo', 'copy' => 'Ban tuyển dụng sẽ thông báo cho bạn nếu bạn được chọn cho vị trí', 'icon' => 'process-announce.svg' ),
	array( 'number' => '04', 'title' => 'Gia nhập', 'copy' => 'Chào mừng bạn đến với Vạn Phúc Care', 'icon' => 'process-join.svg' ),
);

get_header();
?>

<div class="vpc-recruitment-page" data-figma-node="3481:27647">
	<section class="vpc-recruitment-hero" aria-labelledby="recruitment-hero-title">
		<div class="vpc-recruitment-hero__copy">
			<div class="vpc-recruitment-badge">
				<img src="<?php echo esc_url( $asset_uri . '/star.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true">
				<span class="vpc-recruitment-badge__desktop">Trang Tin Tuyển Dụng</span>
				<span class="vpc-recruitment-badge__mobile">BỆ PHÓNG PHÁT TRIỂN</span>
			</div>
			<h1 id="recruitment-hero-title">
				<span>Môi Trường Yêu Thương</span>
				<strong>Sự Nghiệp Thăng Tiến</strong>
			</h1>
			<p>Tại Vạn Phúc Care, chúng tôi luôn đem lại cơ hội đào tạo và phát triển nghề nghiệp, đặc biệt dành cho điều dưỡng.</p>
			<form class="vpc-recruitment-search" role="search">
				<label class="screen-reader-text" for="recruitment-search">Tìm vị trí tuyển dụng</label>
				<picture class="vpc-recruitment-search__icon"><source media="(max-width: 767px)" srcset="<?php echo esc_url( $asset_uri . '/search-mobile.svg' ); ?>"><img src="<?php echo esc_url( $asset_uri . '/search.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true"></picture>
				<input id="recruitment-search" type="search" placeholder="Tìm vị trí tuyển dụng..." autocomplete="off">
				<button type="submit"><span class="vpc-recruitment-search__desktop">Tìm kiếm</span><span class="vpc-recruitment-search__mobile">Tìm</span></button>
			</form>
		</div>

		<div class="vpc-recruitment-hero__visual" aria-hidden="true">
			<span class="vpc-recruitment-hero__blob"></span>
			<span class="vpc-recruitment-hero__accent"></span>
			<img class="vpc-recruitment-hero__mascot" src="<?php echo esc_url( $asset_uri . '/mascot.png' ); ?>" width="500" height="500" alt="">
			<span class="vpc-recruitment-chip vpc-recruitment-chip--nurse">Điều dưỡng</span>
			<span class="vpc-recruitment-chip vpc-recruitment-chip--midwife">Nữ hộ sinh</span>
			<span class="vpc-recruitment-chip vpc-recruitment-chip--technician">Kỹ thuật viên</span>
		</div>
	</section>

	<section class="vpc-recruitment-jobs" aria-labelledby="recruitment-jobs-title">
		<div class="vpc-recruitment-jobs__inner">
			<h2 id="recruitment-jobs-title">Vị trí tuyển dụng</h2>
			<div class="vpc-recruitment-categories" role="tablist" aria-label="Lọc vị trí tuyển dụng">
				<button class="is-active" type="button" data-recruitment-filter="all" role="tab" aria-selected="true">
					<span class="vpc-recruitment-category__icon vpc-recruitment-category__icon--active"><img src="<?php echo esc_url( $asset_uri . '/job-icon-active.svg' ); ?>" width="20" height="20" alt="" aria-hidden="true"></span>
					Tất cả
				</button>
				<button type="button" data-recruitment-filter="Đang tuyển" role="tab" aria-selected="false">
					<span class="vpc-recruitment-category__icon"><img src="<?php echo esc_url( $asset_uri . '/job-icon-pending.svg' ); ?>" width="20" height="20" alt="" aria-hidden="true"></span>
					Đang tuyển
				</button>
			</div>

			<div class="vpc-recruitment-job-grid" data-recruitment-list>
				<?php foreach ( $jobs as $job ) : ?>
					<article class="vpc-recruitment-job-card" data-recruitment-card data-status="<?php echo esc_attr( $job['status'] ); ?>" data-title="<?php echo esc_attr( $job['title'] ); ?>">
						<div class="vpc-recruitment-job-card__content">
							<h3><a href="<?php echo esc_url( $job['href'] ); ?>"><?php echo esc_html( $job['title'] ); ?></a></h3>
							<div class="vpc-recruitment-job-card__footer">
								<div class="vpc-recruitment-job-card__meta">
									<span><img src="<?php echo esc_url( $asset_uri . '/updated.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true">Cập nhật: <?php echo esc_html( $job['updated'] ); ?></span>
									<span><img src="<?php echo esc_url( $asset_uri . '/deadline.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true">Hạn nộp: <?php echo esc_html( $job['deadline'] ); ?></span>
								</div>
								<a class="vpc-recruitment-job-card__detail" href="<?php echo esc_url( $job['href'] ); ?>">Xem Chi Tiết <img src="<?php echo esc_url( $asset_uri . '/chevron.svg' ); ?>" width="17.5" height="15.5" alt="" aria-hidden="true"></a>
							</div>
						</div>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="vpc-recruitment-process" aria-labelledby="recruitment-process-title">
		<div class="vpc-recruitment-process__intro">
			<h2 id="recruitment-process-title">Quy Trình Tuyển Dụng</h2>
			<p>Tại Vạn Phúc Care, chúng tôi tin rằng những con người tâm huyết chính là cốt lõi của dịch vụ; vì vậy, quy trình tuyển dụng của chúng tôi được thiết kế khắt khe nhằm tìm kiếm những trái tim tận tâm và đôi bàn tay chuyên nghiệp nhất.</p>
		</div>
		<div class="vpc-recruitment-process__steps">
			<?php foreach ( $steps as $index => $step ) : ?>
				<div class="vpc-recruitment-step">
					<div class="vpc-recruitment-step__marker"><span><?php echo esc_html( $step['number'] ); ?></span><img src="<?php echo esc_url( $asset_uri . '/' . $step['icon'] ); ?>" width="24" height="24" alt="" aria-hidden="true"></div>
					<div class="vpc-recruitment-step__text"><h3><?php echo esc_html( $step['title'] ); ?></h3><p><?php echo esc_html( $step['copy'] ); ?></p></div>
				</div>
				<?php if ( $index < count( $steps ) - 1 ) : ?><img class="vpc-recruitment-process__arrow" src="<?php echo esc_url( $asset_uri . '/process-arrow.svg' ); ?>" width="78" height="7.36396" alt="" aria-hidden="true"><?php endif; ?>
			<?php endforeach; ?>
		</div>
	</section>

	<section class="vpc-recruitment-team" aria-label="Đội ngũ Vạn Phúc Care">
		<img src="<?php echo esc_url( $asset_uri . '/team.png' ); ?>" width="4096" height="2731" alt="Đội ngũ Vạn Phúc Care nhận chứng nhận chuyên môn" loading="lazy">
	</section>
</div>

<?php get_footer(); ?>
