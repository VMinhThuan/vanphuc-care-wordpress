<?php
/**
 * Recruitment article detail page.
 *
 * Matches Figma node 3387:48947 and is shared by the recruitment detail page
 * and recruitment posts so the public URL can remain flexible.
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$detail_uri = get_template_directory_uri() . '/assets/images/recruitment-detail';
$detail_url = get_permalink();
$title      = get_the_title();

if ( empty( $title ) || 'tin tuyển dụng' === strtolower( trim( $title ) ) ) {
	$title = 'Tuyển dụng Điều dưỡng, Nữ hộ sinh làm việc tại Trung tâm Ở cữ';
}

$updated  = get_post_meta( get_the_ID(), 'vpc_recruitment_updated', true ) ?: '17/07/2025';
$deadline = get_post_meta( get_the_ID(), 'vpc_recruitment_deadline', true ) ?: '21/08/2025';
$content  = (string) get_the_content();
$has_body = '' !== trim( wp_strip_all_tags( $content ) );

$related_jobs = array(
	array(
		'title' => 'Vị trí chuyên viên tuyển dụng – Bộ phận HCNS',
		'image' => $detail_uri . '/related-1.png',
	),
	array(
		'title' => 'Vị trí Media Planer – Bộ phận Marketing',
		'image' => $detail_uri . '/hotline.jpg',
	),
	array(
		'title' => 'Vị trí nhân sự bộ phận Điều Dưỡng – Trung tâm Ở cữ',
		'image' => $detail_uri . '/related-2.jpg',
	),
);

$quick_rows = array(
	'Địa điểm làm việc' => '[Cần client cung cấp]',
	'Hình thức'         => '[Cần client cung cấp]',
	'Thu nhập'          => '[Cần client cung cấp]',
	'Số lượng tuyển'    => '[Cần client cung cấp]',
	'Hạn nộp hồ sơ'     => $deadline,
);
?>

<div class="vpc-recruitment-detail" data-figma-node="3387:48947">
	<div class="vpc-recruitment-detail__content">
		<nav class="vpc-recruitment-detail__breadcrumb" aria-label="Đường dẫn trang">
			<div class="vpc-recruitment-detail__breadcrumb-desktop">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Trang chủ</a>
				<img src="<?php echo esc_url( $detail_uri . '/chevron-right.svg' ); ?>" width="16" height="16" alt="" aria-hidden="true">
				<a href="<?php echo esc_url( home_url( '/tuyen-dung/' ) ); ?>">Tuyển dụng</a>
				<img src="<?php echo esc_url( $detail_uri . '/chevron-right.svg' ); ?>" width="16" height="16" alt="" aria-hidden="true">
				<span>Tin tuyển dụng</span>
				<img src="<?php echo esc_url( $detail_uri . '/chevron-right.svg' ); ?>" width="16" height="16" alt="" aria-hidden="true">
				<strong><?php echo esc_html( $title ); ?></strong>
			</div>
			<div class="vpc-recruitment-detail__breadcrumb-mobile">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Trang chủ</a>
				<img src="<?php echo esc_url( $detail_uri . '/chevron-right.svg' ); ?>" width="16" height="16" alt="" aria-hidden="true">
				<a href="<?php echo esc_url( home_url( '/tuyen-dung/' ) ); ?>">Tuyển dụng</a>
				<img src="<?php echo esc_url( $detail_uri . '/chevron-right.svg' ); ?>" width="16" height="16" alt="" aria-hidden="true">
				<span>Tin tuyển dụng</span>
			</div>
		</nav>

		<div class="vpc-recruitment-detail__main">
			<article class="vpc-recruitment-detail__article" id="post-<?php the_ID(); ?>">
				<header class="vpc-recruitment-detail__article-header">
					<span class="vpc-recruitment-detail__category">Tin tuyển dụng</span>
					<h1><?php echo esc_html( $title ); ?></h1>
					<p class="vpc-recruitment-detail__meta">Cập nhật: <?php echo esc_html( $updated ); ?> <span aria-hidden="true">·</span> <strong>Hạn nộp: <?php echo esc_html( $deadline ); ?></strong></p>
				</header>

				<div class="vpc-recruitment-detail__lead">
					<span aria-hidden="true"></span>
					<p>Vạn Phúc Care đang tìm kiếm Điều dưỡng viên và Nữ hộ sinh tận tâm, có chuyên môn để đồng hành cùng mẹ và bé tại Trung tâm Ở cữ. Ứng viên được đào tạo kỹ năng nghiệp vụ căn bản, cấp chứng nhận bồi dưỡng nghiệp vụ và làm việc trong môi trường chuyên nghiệp, nhân văn.</p>
				</div>

				<figure class="vpc-recruitment-detail__article-image">
					<img src="<?php echo esc_url( $detail_uri . '/article-main.png' ); ?>" width="800" height="450" alt="Điều dưỡng và nữ hộ sinh tại Trung tâm Ở cữ" fetchpriority="high">
					<figcaption>Chú thích ảnh</figcaption>
				</figure>

				<section class="vpc-recruitment-detail__apply-card vpc-recruitment-detail__apply-card--mobile" aria-labelledby="recruitment-mobile-apply-title">
					<h2 id="recruitment-mobile-apply-title">Ứng tuyển nhanh</h2>
					<div class="vpc-recruitment-detail__quick-info">
						<?php foreach ( $quick_rows as $label => $value ) : ?>
							<div><span><?php echo esc_html( $label ); ?></span><strong class="<?php echo 'Hạn nộp hồ sơ' === $label ? 'is-blue' : ''; ?>"><?php echo esc_html( $value ); ?></strong></div>
						<?php endforeach; ?>
					</div>
					<button class="vpc-recruitment-detail__primary-button" type="button" data-recruitment-open="apply">Ứng tuyển ngay</button>
				</section>

				<?php if ( $has_body ) : ?>
					<div class="vpc-recruitment-detail__body entry-content">
						<?php echo apply_filters( 'the_content', $content ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					</div>
				<?php else : ?>
					<div class="vpc-recruitment-detail__body">
						<section>
							<h2>Mô tả công việc</h2>
							<ul>
								<li>Chăm sóc, theo dõi sức khỏe mẹ sau sinh và trẻ sơ sinh theo quy trình chuyên môn của trung tâm.</li>
								<li>Hướng dẫn mẹ kỹ năng chăm sóc bé, nuôi con bằng sữa mẹ và phục hồi sau sinh.</li>
								<li>Phối hợp cùng đội ngũ y bác sĩ, chuyên viên dinh dưỡng và bộ phận chăm sóc khách hàng.</li>
								<li>Thực hiện các nhiệm vụ khác theo phân công của quản lý trực tiếp.</li>
							</ul>
						</section>
						<section>
							<h2>Yêu cầu ứng viên</h2>
							<ul>
								<li>Tốt nghiệp Trung cấp, Cao đẳng hoặc Đại học chuyên ngành Điều dưỡng, Hộ sinh.</li>
								<li>Ưu tiên ứng viên có kinh nghiệm tại khoa Sản, Nhi hoặc trung tâm chăm sóc sau sinh.</li>
								<li>Yêu thương trẻ nhỏ, tận tâm, trung thực, có tinh thần học hỏi và làm việc nhóm.</li>
							</ul>
						</section>
						<section>
							<h2>Quyền lợi</h2>
							<ul>
								<li>Thu nhập cạnh tranh, thưởng theo hiệu quả công việc.</li>
								<li>Được đào tạo bài bản và cấp chứng nhận bồi dưỡng nghiệp vụ.</li>
								<li>Tham gia đầy đủ các chế độ bảo hiểm theo quy định.</li>
								<li>Môi trường làm việc chuyên nghiệp, cơ hội phát triển nghề nghiệp lâu dài.</li>
							</ul>
						</section>
						<section>
							<h2>Hồ sơ và cách thức ứng tuyển</h2>
							<ul>
								<li>Hồ sơ gồm CV, bằng cấp và chứng chỉ liên quan.</li>
								<li>Ứng viên bấm “Đăng ký ngay” bên dưới hoặc liên hệ hotline để được hướng dẫn.</li>
							</ul>
						</section>
					</div>
				<?php endif; ?>

				<div class="vpc-recruitment-detail__callout">
					<img src="<?php echo esc_url( $detail_uri . '/info.svg' ); ?>" width="28" height="28" alt="" aria-hidden="true">
					<div><h2>Hạn nộp hồ sơ: <?php echo esc_html( $deadline ); ?></h2><p>Ứng viên gửi hồ sơ trước hạn hoặc liên hệ hotline 037 624 6673 để được hướng dẫn.</p></div>
				</div>

				<div class="vpc-recruitment-detail__cta" id="recruitment-apply">
					<div><h2>Sẵn sàng gia nhập Vạn Phúc Care?</h2><p>Gửi hồ sơ ngay hôm nay, đội ngũ sẽ liên hệ lịch phỏng vấn với bạn.</p></div>
					<button type="button" data-recruitment-open="apply">Ứng tuyển ngay</button>
				</div>

				<section class="vpc-recruitment-detail__faq" aria-labelledby="recruitment-faq-title">
					<h2 id="recruitment-faq-title">Câu hỏi thường gặp</h2>
					<div class="vpc-recruitment-detail__accordion">
						<details open>
							<summary>Quy trình ứng tuyển gồm những bước nào?<img src="<?php echo esc_url( $detail_uri . '/chevron-up.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true"></summary>
							<p>[Cần client cung cấp: các bước nhận hồ sơ, phỏng vấn và nhận việc.]</p>
						</details>
						<details><summary>Lịch phỏng vấn được thông báo như thế nào?<img src="<?php echo esc_url( $detail_uri . '/chevron-down.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true"></summary></details>
						<details><summary>Chưa có kinh nghiệm có thể ứng tuyển không?<img src="<?php echo esc_url( $detail_uri . '/chevron-down.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true"></summary></details>
						<details><summary>Hồ sơ cần chuẩn bị những gì?<img src="<?php echo esc_url( $detail_uri . '/chevron-down.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true"></summary></details>
					</div>
				</section>

				<div class="vpc-recruitment-detail__tags-share">
					<div class="vpc-recruitment-detail__tags"><span>Tags:</span><a href="#tag-dieu-duong">Điều dưỡng</a><a href="#tag-nu-ho-sinh">Nữ hộ sinh</a><a href="#tag-o-cu">Trung tâm ở cữ</a></div>
					<div class="vpc-recruitment-detail__share" aria-label="Chia sẻ bài viết">
						<span>Chia sẻ:</span>
						<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo rawurlencode( $detail_url ); ?>" target="_blank" rel="noopener noreferrer" aria-label="Chia sẻ Facebook"><img src="<?php echo esc_url( $detail_uri . '/facebook.svg' ); ?>" width="20" height="20" alt=""></a>
						<a href="https://zalo.me/share?url=<?php echo rawurlencode( $detail_url ); ?>" target="_blank" rel="noopener noreferrer" aria-label="Chia sẻ Zalo"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/icons/zalo.svg' ); ?>" width="20" height="20" alt=""></a>
						<button type="button" data-copy-link="<?php echo esc_attr( $detail_url ); ?>" aria-label="Sao chép liên kết"><img src="<?php echo esc_url( $detail_uri . '/copy-link.svg' ); ?>" width="20" height="20" alt=""></button>
					</div>
				</div>
			</article>

			<aside class="vpc-recruitment-detail__sidebar" aria-label="Thông tin tuyển dụng">
				<section class="vpc-recruitment-detail__apply-card">
					<h2>Ứng tuyển nhanh</h2>
					<div class="vpc-recruitment-detail__quick-info">
						<?php foreach ( $quick_rows as $label => $value ) : ?>
							<div><span><?php echo esc_html( $label ); ?></span><strong class="<?php echo 'Hạn nộp hồ sơ' === $label ? 'is-blue' : ''; ?>"><?php echo esc_html( $value ); ?></strong></div>
						<?php endforeach; ?>
					</div>
					<button class="vpc-recruitment-detail__primary-button" type="button" data-recruitment-open="apply">Ứng tuyển ngay</button>
				</section>

				<section class="vpc-recruitment-detail__hotline-card">
					<img class="vpc-recruitment-detail__hotline-image" src="<?php echo esc_url( $detail_uri . '/hotline.jpg' ); ?>" width="4096" height="2731" alt="Đội ngũ Vạn Phúc Care" loading="lazy">
					<div class="vpc-recruitment-detail__hotline-heading"><img src="<?php echo esc_url( $detail_uri . '/hotline.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true"><div><span>Hotline</span><strong>037 624 6673</strong></div></div>
					<p>Liên hệ ngay để được giải đáp về vị trí tuyển dụng</p>
					<a class="vpc-recruitment-detail__primary-button" href="tel:0376246673">Liên hệ ngay</a>
				</section>
			</aside>
		</div>

		<section class="vpc-recruitment-detail__related" aria-labelledby="related-recruitment-title">
			<h2 id="related-recruitment-title">Tin tuyển dụng khác</h2>
			<div class="vpc-recruitment-detail__related-grid">
				<?php foreach ( $related_jobs as $job ) : ?>
					<article class="vpc-recruitment-detail__related-card">
						<a class="vpc-recruitment-detail__related-image" href="<?php echo esc_url( $detail_url ); ?>"><img src="<?php echo esc_url( $job['image'] ); ?>" width="404" height="219" alt="" loading="lazy"></a>
						<div><a class="vpc-recruitment-detail__related-category" href="<?php echo esc_url( home_url( '/tuyen-dung/' ) ); ?>">Tuyển dụng</a><h3><a href="<?php echo esc_url( $detail_url ); ?>"><?php echo esc_html( $job['title'] ); ?></a></h3><p>Tuyển dụng ứng viên vị trí điều dưỡng viên, làm nhiệm vụ chăm sóc trẻ sơ sinh từ 0 đến 12 tháng tuổi.</p><span>Hạn nộp: 31/07/2024</span></div>
					</article>
				<?php endforeach; ?>
			</div>
		</section>
	</div>
</div>

<?php get_template_part( 'template-parts/recruitment/application-modal' ); ?>
