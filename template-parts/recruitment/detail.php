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

$post_id = get_the_ID();
$meta    = function_exists( 'vpc_get_recruitment_meta' )
	? vpc_get_recruitment_meta( $post_id )
	: array(
		'updated'  => '17/07/2025',
		'deadline' => '21/08/2025',
		'status'   => 'Đang tuyển',
		'location' => 'Tây Hồ - Hà Nội',
		'type'     => 'Toàn thời gian (T2 - T7)',
		'salary'   => 'Thỏa thuận theo năng lực',
		'quantity' => '02 - 05 nhân sự',
	);

$updated   = $meta['updated'];
$deadline  = $meta['deadline'];
$status    = $meta['status'] ?? 'Đang tuyển';
$is_closed = 'Đã đóng' === $status;

$content   = (string) get_the_content();
$has_body  = '' !== trim( wp_strip_all_tags( $content ) );
$excerpt   = trim( (string) get_post_field( 'post_excerpt', $post_id ) );

$hotline_display = (string) get_theme_mod( 'vpc_hotline_ho_tro', '037 624 6673' );
$hotline_tel     = preg_replace( '/[^0-9+]/', '', $hotline_display ) ?: '0376246673';

// Dynamic related jobs query
$related_posts = get_posts( array(
	'category_name'       => 'tuyen-dung',
	'post__not_in'        => array( $post_id ),
	'posts_per_page'      => 3,
	'post_status'         => 'publish',
	'ignore_sticky_posts' => true,
) );

$related_jobs = array();
if ( ! empty( $related_posts ) ) {
	foreach ( $related_posts as $rel_post ) {
		$rel_id    = $rel_post->ID;
		$rel_meta  = function_exists( 'vpc_get_recruitment_meta' ) ? vpc_get_recruitment_meta( $rel_id ) : array();
		$rel_image = has_post_thumbnail( $rel_id )
			? get_the_post_thumbnail_url( $rel_id, 'medium_large' )
			: ( $detail_uri . '/related-1.png' );
		$rel_excerpt = trim( (string) get_post_field( 'post_excerpt', $rel_id ) );
		if ( empty( $rel_excerpt ) ) {
			$rel_excerpt = wp_trim_words( wp_strip_all_tags( $rel_post->post_content ), 20, '...' );
		}
		if ( empty( $rel_excerpt ) ) {
			$rel_excerpt = 'Thông tin tuyển dụng vị trí ' . get_the_title( $rel_post ) . ' tại Vạn Phúc Care.';
		}

		$related_jobs[] = array(
			'title'    => get_the_title( $rel_post ),
			'url'      => get_permalink( $rel_id ),
			'image'    => $rel_image,
			'excerpt'  => $rel_excerpt,
			'deadline' => $rel_meta['deadline'] ?? 'Đang cập nhật',
		);
	}
} else {
	// Fallback mock jobs for preview environments with single post
	$related_jobs = array(
		array(
			'title'    => 'Vị trí chuyên viên tuyển dụng – Bộ phận HCNS',
			'url'      => home_url( '/tuyen-dung/' ),
			'image'    => $detail_uri . '/related-1.png',
			'excerpt'  => 'Tuyển dụng chuyên viên tuyển dụng nhân sự, phụ trách thu hút và phỏng vấn nhân tài.',
			'deadline' => 'Đang tuyển',
		),
		array(
			'title'    => 'Vị trí Media Planner – Bộ phận Marketing',
			'url'      => home_url( '/tuyen-dung/' ),
			'image'    => $detail_uri . '/hotline.jpg',
			'excerpt'  => 'Tuyển dụng nhân sự truyền thông và lập kế hoạch media cho các chiến dịch sức khỏe mẹ và bé.',
			'deadline' => 'Đang tuyển',
		),
		array(
			'title'    => 'Vị trí nhân sự bộ phận Điều Dưỡng – Trung tâm Ở cữ',
			'url'      => home_url( '/tuyen-dung/' ),
			'image'    => $detail_uri . '/related-2.jpg',
			'excerpt'  => 'Tuyển dụng ứng viên vị trí điều dưỡng viên, làm nhiệm vụ chăm sóc trẻ sơ sinh từ 0 đến 12 tháng tuổi.',
			'deadline' => 'Đang tuyển',
		),
	);
}

$quick_rows = array(
	'Địa điểm làm việc' => $meta['location'],
	'Hình thức'         => $meta['type'],
	'Thu nhập'          => $meta['salary'],
	'Số lượng tuyển'    => $meta['quantity'],
	'Hạn nộp hồ sơ'     => $deadline,
);
if ( $is_closed ) {
	$quick_rows['Trạng thái'] = 'Đã dừng nhận hồ sơ';
}
?>

<div class="vpc-recruitment-detail" data-figma-node="3387:48947">
	<div class="vpc-recruitment-detail__content">
		<nav class="vpc-recruitment-detail__breadcrumb" aria-label="Đường dẫn trang">
			<div class="vpc-recruitment-detail__breadcrumb-desktop">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Trang chủ</a>
				<img src="<?php echo esc_url( $detail_uri . '/chevron-right.svg' ); ?>" width="16" height="16" alt="" aria-hidden="true">
				<a href="<?php echo esc_url( home_url( '/tuyen-dung/' ) ); ?>">Tuyển dụng</a>
				<img src="<?php echo esc_url( $detail_uri . '/chevron-right.svg' ); ?>" width="16" height="16" alt="" aria-hidden="true">
				<strong><?php echo esc_html( $title ); ?></strong>
			</div>
			<div class="vpc-recruitment-detail__breadcrumb-mobile">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Trang chủ</a>
				<img src="<?php echo esc_url( $detail_uri . '/chevron-right.svg' ); ?>" width="16" height="16" alt="" aria-hidden="true">
				<a href="<?php echo esc_url( home_url( '/tuyen-dung/' ) ); ?>">Tuyển dụng</a>
			</div>
		</nav>

		<div class="vpc-recruitment-detail__main">
			<article class="vpc-recruitment-detail__article" id="post-<?php the_ID(); ?>">
				<header class="vpc-recruitment-detail__article-header">
					<span class="vpc-recruitment-detail__category">Tin tuyển dụng</span>
					<h1><?php echo esc_html( $title ); ?></h1>
					<p class="vpc-recruitment-detail__meta">Cập nhật: <?php echo esc_html( $updated ); ?> <span aria-hidden="true">·</span> <strong>Hạn nộp: <?php echo esc_html( $deadline ); ?></strong></p>
				</header>

				<?php if ( ! empty( $excerpt ) ) : ?>
					<div class="vpc-recruitment-detail__lead">
						<span aria-hidden="true"></span>
						<p><?php echo esc_html( $excerpt ); ?></p>
					</div>
				<?php elseif ( ! $has_body ) : ?>
					<div class="vpc-recruitment-detail__lead">
						<span aria-hidden="true"></span>
						<p>Vạn Phúc Care đang tìm kiếm nhân sự tận tâm, có chuyên môn để đồng hành cùng mẹ và bé. Ứng viên được làm việc trong môi trường chuyên nghiệp, nhân văn và có cơ hội thăng tiến lâu dài.</p>
					</div>
				<?php endif; ?>

				<?php if ( has_post_thumbnail( $post_id ) ) : ?>
					<figure class="vpc-recruitment-detail__article-image">
						<?php echo get_the_post_thumbnail( $post_id, 'large', array( 'width' => 800, 'height' => 450, 'alt' => esc_attr( $title ), 'fetchpriority' => 'high' ) ); ?>
						<?php
						$caption = get_the_post_thumbnail_caption( $post_id );
						if ( ! empty( $caption ) ) :
						?>
							<figcaption><?php echo esc_html( $caption ); ?></figcaption>
						<?php endif; ?>
					</figure>
				<?php elseif ( ! $has_body ) : ?>
					<figure class="vpc-recruitment-detail__article-image">
						<img src="<?php echo esc_url( $detail_uri . '/article-main.png' ); ?>" width="800" height="450" alt="<?php echo esc_attr( $title ); ?>" fetchpriority="high">
						<figcaption>Đội ngũ Vạn Phúc Care</figcaption>
					</figure>
				<?php endif; ?>

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

				<div class="vpc-recruitment-detail__callout<?php echo $is_closed ? ' is-closed' : ''; ?>">
					<img src="<?php echo esc_url( $detail_uri . '/info.svg' ); ?>" width="28" height="28" alt="" aria-hidden="true">
					<div>
						<h2>Hạn nộp hồ sơ: <?php echo esc_html( $deadline ); ?><?php echo $is_closed ? ' <span class="vpc-recruitment-detail__status-badge">(Đã dừng nhận hồ sơ)</span>' : ''; ?></h2>
						<?php if ( $is_closed ) : ?>
							<p>Vị trí này hiện đã dừng nhận hồ sơ hoặc đủ chỉ tiêu đợt tuyển dụng. Ứng viên có thể tham khảo các vị trí khác bên dưới hoặc liên hệ hotline <?php echo esc_html( $hotline_display ); ?> để được hỗ trợ.</p>
						<?php else : ?>
							<p>Ứng viên gửi hồ sơ trước hạn hoặc liên hệ hotline <?php echo esc_html( $hotline_display ); ?> để được hướng dẫn.</p>
						<?php endif; ?>
					</div>
				</div>

				<div class="vpc-recruitment-detail__cta" id="recruitment-apply">
					<div>
						<h2>Sẵn sàng gia nhập Vạn Phúc Care?</h2>
						<p><?php echo $is_closed ? 'Gửi hồ sơ dự tuyển cho các đợt tiếp theo, đội ngũ nhân sự sẽ lưu thông tin và liên hệ khi có vị trí phù hợp.' : 'Gửi hồ sơ ngay hôm nay, đội ngũ sẽ liên hệ lịch phỏng vấn với bạn.'; ?></p>
					</div>
					<button type="button" data-recruitment-open="apply">Ứng tuyển ngay</button>
				</div>

				<?php
				$post_tags = get_the_tags( $post_id );
				$has_tags  = ! empty( $post_tags ) && ! is_wp_error( $post_tags );
				?>
				<div class="vpc-recruitment-detail__tags-share">
					<?php if ( $has_tags ) : ?>
						<div class="vpc-recruitment-detail__tags">
							<span>Tags:</span>
							<?php foreach ( $post_tags as $tag ) : ?>
								<a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>"><?php echo esc_html( $tag->name ); ?></a>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>
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
					<div class="vpc-recruitment-detail__hotline-heading">
						<img src="<?php echo esc_url( $detail_uri . '/hotline.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true">
						<div><span>Hotline</span><strong><?php echo esc_html( $hotline_display ); ?></strong></div>
					</div>
					<p>Liên hệ ngay để được giải đáp về vị trí tuyển dụng</p>
					<a class="vpc-recruitment-detail__primary-button" href="tel:<?php echo esc_attr( $hotline_tel ); ?>">Liên hệ ngay</a>
				</section>
			</aside>
		</div>

		<section class="vpc-recruitment-detail__related" aria-labelledby="related-recruitment-title">
			<h2 id="related-recruitment-title">Tin tuyển dụng khác</h2>
			<div class="vpc-recruitment-detail__related-grid">
				<?php foreach ( $related_jobs as $job ) : ?>
					<article class="vpc-recruitment-detail__related-card">
						<a class="vpc-recruitment-detail__related-image" href="<?php echo esc_url( $job['url'] ); ?>">
							<img src="<?php echo esc_url( $job['image'] ); ?>" width="404" height="219" alt="<?php echo esc_attr( $job['title'] ); ?>" loading="lazy">
						</a>
						<div>
							<a class="vpc-recruitment-detail__related-category" href="<?php echo esc_url( home_url( '/tuyen-dung/' ) ); ?>">Tuyển dụng</a>
							<h3><a href="<?php echo esc_url( $job['url'] ); ?>"><?php echo esc_html( $job['title'] ); ?></a></h3>
							<p><?php echo esc_html( $job['excerpt'] ); ?></p>
							<span>Hạn nộp: <?php echo esc_html( $job['deadline'] ); ?></span>
						</div>
					</article>
				<?php endforeach; ?>
			</div>
		</section>
	</div>
</div>

<?php get_template_part( 'template-parts/recruitment/application-modal' ); ?>
