<?php
/**
 * Giới Thiệu - Team Section (Đội Ngũ Điều Dưỡng Viên).
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$about_uri  = trailingslashit( get_template_directory_uri() ) . 'assets/images/about';
$badge_icon = $about_uri . '/badge-star.svg';

$team_members = array(
	array( 'image' => 'team-member-1.webp', 'name' => 'Cô Vương Thanh Thủy', 'role' => 'Điều dưỡng trưởng' ),
	array( 'image' => 'team-member-2.webp', 'name' => 'Cô Trần Thị Trang', 'role' => 'Điều dưỡng viên' ),
	array( 'image' => 'team-member-3.webp', 'name' => 'Cô Đỗ Thị Duyên', 'role' => 'Điều dưỡng viên' ),
	array( 'image' => 'team-member-4.webp', 'name' => 'Cô Tống Thị Nguyệt', 'role' => 'Điều dưỡng viên' ),
);
?>
<section id="doi-ngu" class="about-section about-team" data-figma-node="3131:45011">
	<span class="about-badge">
		<?php if ( $badge_icon ) : ?><img src="<?php echo esc_url( $badge_icon ); ?>" width="24" height="24" alt="" aria-hidden="true"><?php endif; ?>
		ĐIỀU DƯỠNG VIÊN
	</span>
	<div class="about-team__intro">
		<h2 class="about-heading about-heading--blue">Đội Ngũ Của Chúng&nbsp;Tôi</h2>
		<p class="about-copy about-team__description">Đội ngũ điều dưỡng viên với nền tảng điều dưỡng, được đào tạo chuyên sâu lĩnh vực sản nhi, đảm bảo đem đến dịch vụ an toàn, chuyên nghiệp cho<br class="about-team__mobile-break"> mọi gia đình.</p>
	</div>
	<div class="about-team__grid">
		<?php
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

