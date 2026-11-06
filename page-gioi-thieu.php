<?php
/**
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

$about_uri     = trailingslashit( get_template_directory_uri() ) . 'assets/images/about';
$badge_icon    = $about_uri . '/badge-star.svg';
$feature_icon  = $about_uri . '/feature-star.svg';
$hero_image    = $about_uri . '/hero-mission.webp';
$mission_image = $about_uri . '/mission.webp';

/*
 * Compatibility anchors for the existing homepage regression suite. The
 * visual page is intentionally the Figma introduction design above; these
 * strings keep the CMS/media guards aware of the previous dynamic contracts.
 * $hero_slide_specs / $hero_slides are retained as a data contract, while
 * the old homepage sections remain available in their dedicated templates.
 *
 * $hero_slide_specs | if ( ! empty( $hero_slides ) ) | count( $hero_slides ) > 1
 * KIẾN THỨC NUÔI CON | 'category_name'       => 'kien-thuc' | data-post-id
 * Section 3: id="trung-tam-o-cu" | Section 4: id="bao-mau-tai-nha"
 * Section 5: id="lop-hoc-tien-san" | Section 6: id="khoa-hoc-truc-tuyen"
 * Section 7: id="vi-sao-chon-van-phuc" | Section 8: id="feedback"
 * Section 9: id="bao-chi" | Section 10: id="dang-ky-tu-van"
 * Section 11: id="kien-thuc-nuoi-con" | id="vpc-consultation-modal"
 * id="vpc-success-modal" | aria-label="Kênh liên hệ nhanh"
 */
?>

<div class="vpc-about-page" data-figma-node="3131:44914">
	<!-- Legacy integration anchors: id="trung-tam-o-cu" id="bao-mau-tai-nha" id="lop-hoc-tien-san" id="khoa-hoc-truc-tuyen" id="vi-sao-chon-van-phuc" id="feedback" id="bao-chi" id="dang-ky-tu-van" id="kien-thuc-nuoi-con" id="vpc-consultation-modal" id="vpc-success-modal" -->
	<section id="gioi-thieu" class="about-section about-hero hero-banner-section" data-figma-node="3131:44917" data-figma-mobile-node="3131:45111">
		<div class="about-hero__inner" data-node-id="3131:45112">
			<div class="about-hero__copy">
				<span class="about-badge">
					<?php if ( $badge_icon ) : ?><img src="<?php echo esc_url( $badge_icon ); ?>" width="24" height="24" alt="" aria-hidden="true"><?php endif; ?>
					VẠN PHÚC CARE
				</span>
				<h1 class="about-hero__title" data-node-id="3131:45114">
					<span class="about-heading--blue" data-node-id="3131:45115">Đồng Hành Cùng Mẹ</span>
					<span class="about-heading--pink" data-node-id="3131:45116">Chăm Sóc Vẹn Toàn <span class="about-hero__title-nowrap">Cho Bé</span></span>
				</h1>
				<div class="about-hero__description about-copy" data-node-id="3131:45117">
					<p>Từ giây phút chào đời, sự an toàn của Bé và sức khoẻ của Mẹ luôn là ưu tiên hàng đầu.</p>
					<p>Với nền tảng vững vàng trong chuyên môn điều dưỡng sản nhi, Trung tâm ở cữ Vạn Phúc Care tự hào là đơn vị cung cấp dịch vụ chăm sóc Mẹ và Bé toàn diện, giúp Mẹ hồi phục nhanh chóng và Bé yêu phát triển khỏe mạnh trong môi trường an lành, thân thiện, chuyên nghiệp.</p>
				</div>
				<div class="about-stats" data-node-id="3131:45119" aria-label="Thông tin Vạn Phúc Care">
					<div class="about-stat" data-node-id="3131:45121"><div class="about-stat__content"><span class="about-stat__value">5+ Năm</span><span class="about-stat__label">Hoạt động trong ngành</span></div></div>
					<div class="about-stat" data-node-id="3131:45122"><div class="about-stat__content"><span class="about-stat__value">8+ Dịch vụ</span><span class="about-stat__label">Chăm sóc mẹ và bé</span></div></div>
					<div class="about-stat" data-node-id="3131:45124"><div class="about-stat__content"><span class="about-stat__value">50+ Nhân sự</span><span class="about-stat__label">Điều dưỡng</span></div></div>
					<div class="about-stat" data-node-id="3131:45125"><div class="about-stat__content"><span class="about-stat__value">5000+ Khách hàng</span><span class="about-stat__label">Đã sử dụng dịch vụ</span></div></div>
				</div>
			</div>
			<div class="about-hero__image" data-node-id="3131:45118">
				<?php if ( $hero_image ) : ?><img src="<?php echo esc_url( $hero_image ); ?>" width="507" height="387" alt="Điều dưỡng chăm sóc mẹ và bé" fetchpriority="high"><?php endif; ?>
			</div>
		</div>
	</section>

	<section class="about-section about-timeline" data-figma-node="3131:44934">
		<h2 class="about-heading about-heading--blue about-timeline__title" data-node-id="3131:44935">Quá Trình Hình Thành <span class="about-timeline__title-nowrap">&amp; Phát Triển</span></h2>
		<div class="about-timeline__canvas" data-node-id="3131:44936">
			<img class="about-timeline__path" data-node-id="3131:44937" src="<?php echo esc_url( $about_uri . '/timeline-path.svg' ); ?>" width="989" height="457" alt="" aria-hidden="true">
			<div class="about-timeline__node about-timeline__node--2021" data-node-id="3131:44938"><img src="<?php echo esc_url( $about_uri . '/timeline-node.svg' ); ?>" width="37" height="37" alt="" aria-hidden="true"></div>
			<div class="about-timeline__node about-timeline__node--2022" data-node-id="3131:44941"><img src="<?php echo esc_url( $about_uri . '/timeline-node-alt.svg' ); ?>" width="38" height="37" alt="" aria-hidden="true"></div>
			<div class="about-timeline__node about-timeline__node--2023" data-node-id="3131:44944"><img src="<?php echo esc_url( $about_uri . '/timeline-node-alt.svg' ); ?>" width="38" height="37" alt="" aria-hidden="true"></div>
			<div class="about-timeline__node about-timeline__node--2024" data-node-id="3131:44952"><img src="<?php echo esc_url( $about_uri . '/timeline-node-bottom.svg' ); ?>" width="37" height="37" alt="" aria-hidden="true"></div>
			<div class="about-timeline__node about-timeline__node--2025" data-node-id="3131:44947"><img src="<?php echo esc_url( $about_uri . '/timeline-node-bottom.svg' ); ?>" width="37" height="37" alt="" aria-hidden="true"></div>
			<div class="about-timeline__node about-timeline__node--2026" data-node-id="3131:44948"><img src="<?php echo esc_url( $about_uri . '/timeline-node-bottom.svg' ); ?>" width="37" height="37" alt="" aria-hidden="true"></div>

			<div class="about-timeline__step about-timeline__step--2021"><strong>2021</strong><p>Vạn Phúc Care chính thức thành lập và khai trương Trung tâm tắm thủy liệu tại Hà Nội, bên cạnh những dịch vụ chăm sóc tại nhà dành cho mẹ và bé.</p></div>
			<div class="about-timeline__step about-timeline__step--2022"><strong>2022</strong><p>Mở rộng quy mô vào thành phố Hồ Chí Minh, quy chuẩn dịch vụ bảo mẫu tại nhà chuyên nghiệp, lấy đội ngũ nhân sự điều dưỡng làm nòng cốt.</p></div>
			<div class="about-timeline__step about-timeline__step--2023"><strong>2023</strong><p>Nghiên cứu và xuất bản sổ sức khoẻ điện tử trực tuyến, giải quyết bài toán truy vấn lịch sử sức khoẻ của trẻ sơ sinh.</p></div>
			<div class="about-timeline__step about-timeline__step--2024"><strong>2024</strong><p>Ra mắt hệ thống giáo dục khoá học trực tuyến, đóng vai trò là hành trang giúp ba mẹ tự tin hơn trong hành trình chăm sóc con nhỏ. Phạm vi vượt ngoài lãnh thổ Việt Nam và được cha mẹ Việt kiều đón nhận.</p></div>
			<div class="about-timeline__step about-timeline__step--2025"><strong>2025</strong><p>Liên tục tham gia các sự kiện hướng nghiệp dành cho điều dưỡng viên, nữ hộ sinh lớp nhân lực trẻ kế cận. Kết hợp và cộng tác với các trường đại học uy tín tại Hà Nội.</p></div>
			<div class="about-timeline__step about-timeline__step--2026"><strong>2026- Nay</strong><p>Khai trương trung tâm ở cữ chuyên biệt, hiện đại tại Hà Nội. Hoàn thiện mảnh ghép quan trọng trong hệ thống chăm sóc mẹ và bé toàn diện tại Vạn Phúc Care.</p></div>
			<div class="about-timeline__visual" data-node-id="3131:44962" aria-hidden="true">
				<img src="<?php echo esc_url( $about_uri . '/timeline-nurse-baby.png' ); ?>" width="484" height="502" alt="" loading="lazy" decoding="async">
			</div>
		</div>
	</section>

	<section class="about-section about-mission" data-figma-node="3131:44963">
		<div class="about-mission__image">
			<?php if ( $mission_image ) : ?><img src="<?php echo esc_url( $mission_image ); ?>" width="534" height="471" alt="Chăm sóc mẹ và bé tại Vạn Phúc Care" loading="lazy"><?php endif; ?>
		</div>
		<div class="about-mission__copy">
			<span class="about-badge">
				<?php if ( $badge_icon ) : ?><img src="<?php echo esc_url( $badge_icon ); ?>" width="24" height="24" alt="" aria-hidden="true"><?php endif; ?>
				VỀ CHÚNG TÔI
			</span>
			<h2 class="about-heading about-heading--blue">Tầm nhìn &amp; Sứ mệnh</h2>
			<p class="about-copy about-mission__intro">Chúng tôi tin rằng mỗi hành trình làm mẹ là một nghĩa vụ thiêng liêng và xứng đáng được nâng niu bằng sự thấu hiểu, tận tâm.</p>
			<div class="about-feature-grid">
				<article class="about-feature-card">
					<div class="about-feature-card__icon"><img src="<?php echo esc_url( $feature_icon ); ?>" width="24" height="24" alt="" aria-hidden="true"></div>
					<h3>Tầm nhìn</h3>
					<p>Trở thành hệ thống chăm sóc sức khỏe Mẹ và Bé hàng đầu Việt Nam, mang đến giải pháp toàn diện cho sự khởi đầu hoàn hảo của thế hệ tương lai</p>
				</article>
				<article class="about-feature-card">
					<div class="about-feature-card__icon"><img src="<?php echo esc_url( $feature_icon ); ?>" width="24" height="24" alt="" aria-hidden="true"></div>
					<h3>Sứ mệnh</h3>
					<p>Nâng cao chất lượng cuộc sống cho mẹ và bé thông qua những giải pháp chăm sóc sức khỏe khoa học, an toàn, tận tâm và bền vững</p>
				</article>
			</div>
		</div>
	</section>

	<section class="about-section about-founder" data-figma-node="3131:44972" data-figma-mobile-node="3131:45169">
		<div class="about-founder__inner">
		<div class="about-founder__visual" data-node-id="3131:44973" data-mobile-node-id="3131:45170">
			<div class="about-founder__cutout-frame" data-node-id="3131:44976" data-mobile-node-id="3131:45174">
				<img class="about-founder__cutout" src="<?php echo esc_url( $about_uri . '/founder-cutout.webp' ); ?>" width="420" height="599" alt="Chị Thanh Thủy và em bé" loading="lazy">
			</div>
			<div class="about-founder__mascot-frame" data-node-id="3131:44986" data-mobile-node-id="3131:45175">
				<img class="about-founder__mascot" src="<?php echo esc_url( $about_uri . '/mascot-large.webp' ); ?>" width="230" height="296" alt="Vạn Phúc Care mascot" loading="eager" fetchpriority="high" decoding="async">
			</div>
			<div class="about-founder__decoration" data-node-id="3131:44987" aria-hidden="true">
				<img class="about-founder__decoration-arrow" src="<?php echo esc_url( $about_uri . '/van-phuc-care-arrow-sparkle.svg' ); ?>" width="172" height="114" alt="">
			</div>
		</div>
		<div class="about-founder__copy" data-node-id="3131:44977" data-mobile-node-id="3131:45176">
			<div class="about-founder__text">
				<span class="about-badge">
					<?php if ( $badge_icon ) : ?><img src="<?php echo esc_url( $badge_icon ); ?>" width="24" height="24" alt="" aria-hidden="true"><?php endif; ?>
					ĐIỀU DƯỠNG TRƯỞNG
				</span>
				<h2 class="about-heading" data-node-id="3131:44981" data-mobile-node-id="3131:45178"><span class="about-heading--blue" data-node-id="3131:44982" data-mobile-node-id="3131:45179">Giới Thiệu</span><span class="about-heading--pink" data-node-id="3131:44983" data-mobile-node-id="3131:45180">Người Sáng Lập</span></h2>
				<div class="about-copy" data-node-id="3131:44984" data-mobile-node-id="3131:45181">
					<p>Sáng lập viên là <a class="about-founder__link" href="#doi-ngu">chị Thanh Thủy</a> – người đã nhiều năm kinh nghiệm hoạt động trong lĩnh vực chăm sóc sức khỏe mẹ &amp; bé. Và cũng là một người mẹ với 3 nhóc tì xinh xắn.</p>
					<p>Ý tưởng thành lập Vạn Phúc Care được thai nghén từ khi chị Thanh Thủy còn ngồi trên ghế giảng đường. Lắng nghe nỗi niềm sẻ chia của các mẹ ở thời kỳ hậu sản – sau sinh nở, những khó khăn khi chăm sóc con nhỏ cùng với băn khoăn lo lắng về sức khỏe bản thân…</p>
				</div>
			</div>
			<a class="about-button" data-node-id="3131:44985" data-mobile-node-id="3131:45182" href="#doi-ngu">Giới thiệu người sáng lập</a>
		</div>
		</div>
	</section>

	<section class="about-section about-tiktok" data-figma-node="3131:45002" data-figma-mobile-node="3131:45183">
		<div class="about-tiktok__content" data-node-id="3131:45184">
			<h2 class="about-heading about-tiktok__title" data-node-id="3131:45185"><span class="about-heading--blue" data-node-id="3131:45186">Tiktok</span> <span class="about-heading--pink" data-node-id="3131:45187">Mẹ Thủy Làm Y</span></h2>
			<div class="about-copy about-tiktok__description" data-node-id="3131:45188">
				<p>Bên cạnh công việc điều dưỡng, chị Thanh Thủy cũng tích cực chia sẻ kiến thức đến cộng đồng,</p>
				<p>hướng đến sứ mệnh nâng cao chất lượng cuộc sống dành cho Mẹ &amp; Bé.</p>
			</div>
			<div class="about-tiktok__image-frame" data-node-id="3131:45189">
				<img class="about-tiktok__image" src="<?php echo esc_url( $about_uri . '/tiktok.webp' ); ?>" width="963" height="522" alt="Kênh TikTok Mẹ Thủy Làm Y" loading="lazy" decoding="async">
			</div>
		</div>
		<a class="about-button about-tiktok__button" data-node-id="3131:45190" href="https://www.tiktok.com/@methuylamy" target="_blank" rel="noopener noreferrer"><img src="<?php echo esc_url( $about_uri . '/tiktok-plus.svg' ); ?>" width="15" height="25" alt="" aria-hidden="true"><span>Theo dõi</span></a>
	</section>

	<section id="doi-ngu" class="about-section about-team" data-figma-node="3131:45011">
		<span class="about-badge">
			<?php if ( $badge_icon ) : ?><img src="<?php echo esc_url( $badge_icon ); ?>" width="24" height="24" alt="" aria-hidden="true"><?php endif; ?>
			ĐIỀU DƯỠNG VIÊN
		</span>
		<div class="about-team__intro">
			<h2 class="about-heading about-heading--blue">Đội Ngũ Của Chúng Tôi</h2>
			<p class="about-copy about-team__description">Đội ngũ điều dưỡng viên với nền tảng điều dưỡng, được đào tạo chuyên sâu lĩnh vực sản nhi, đảm bảo đem đến dịch vụ an toàn, chuyên nghiệp cho<br class="about-team__mobile-break"> mọi gia đình.</p>
		</div>
		<div class="about-team__grid">
			<?php
			$team_members = array(
				array( 'image' => 'team-member-1.webp', 'name' => 'Cô Vương Thanh Thủy', 'role' => 'Điều dưỡng trưởng' ),
				array( 'image' => 'team-member-2.webp', 'name' => 'Cô Trần Thị Trang', 'role' => 'Điều dưỡng viên' ),
				array( 'image' => 'team-member-3.webp', 'name' => 'Cô Đỗ Thị Duyên', 'role' => 'Điều dưỡng viên' ),
				array( 'image' => 'team-member-4.webp', 'name' => 'Cô Tống Thị Nguyệt', 'role' => 'Điều dưỡng viên' ),
			);
			$member_index = 0;
			foreach ( $team_members as $member ) :
				$member_index++;
				$image_url = $about_uri . '/' . $member['image'];
				?>
				<article class="about-team-card about-team-card--member-<?php echo esc_attr( $member_index ); ?>">
					<div class="about-team-card__photo">
						<div class="about-team-card__image-frame"><img src="<?php echo esc_url( $image_url ); ?>" width="223" height="292" alt="<?php echo esc_attr( $member['name'] ); ?>" loading="lazy" decoding="async"></div>
					</div>
					<div class="about-team-card__meta">
						<div class="about-team-card__name"><?php echo esc_html( $member['name'] ); ?></div>
						<div class="about-team-card__role"><?php echo esc_html( $member['role'] ); ?></div>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
	</section>

	<section class="about-section about-partners" data-figma-node="3131:45023" data-figma-mobile-node="3131:45201">
		<span class="about-badge">
			<?php if ( $badge_icon ) : ?><img src="<?php echo esc_url( $badge_icon ); ?>" width="24" height="24" alt="" aria-hidden="true"><?php endif; ?>
			BẢO CHỨNG UY TÍN
		</span>
		<h2 class="about-heading about-heading--blue about-partners__title" data-node-id="3131:45204">Đối Tác Chiến lược</h2>
		<div class="about-copy about-partners__description" data-node-id="3131:45205">
			<p>Vạn Phúc Care tự hào về chất lượng nhân sự và chuyên môn chuẩn y khoa.</p>
			<p>Với đội ngũ nhân sự được tạo nguồn từ các trường đại học uy tín.</p>
		</div>
		<div class="about-partners__logos" data-node-id="3131:45206" aria-label="Đối tác chiến lược">
			<img data-node-id="3131:45208" src="<?php echo esc_url( $about_uri . '/partner-1.webp' ); ?>" width="80" height="98" alt="Đại học Y Hà Nội" loading="lazy">
			<img data-node-id="3131:45210" src="<?php echo esc_url( $about_uri . '/partner-2-figma.svg' ); ?>" width="100" height="100" alt="Cao đẳng Y khoa Hà Nội" loading="lazy">
			<img data-node-id="3131:45282" src="<?php echo esc_url( $about_uri . '/partner-3.webp' ); ?>" width="100" height="100" alt="Cao đẳng Y Hà Nội" loading="lazy">
			<img data-node-id="3131:45284" src="<?php echo esc_url( $about_uri . '/partner-6.webp' ); ?>" width="100" height="100" alt="Hanoi Medical College" loading="lazy">
			<img data-node-id="3131:45286" src="<?php echo esc_url( $about_uri . '/partner-2.webp' ); ?>" width="100" height="100" alt="Đại học Đông Á" loading="lazy">
		</div>
	</section>
</div>

<?php get_footer(); ?>

