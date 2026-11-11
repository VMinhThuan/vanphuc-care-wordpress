<?php
/**
 * Bao Mau - Team / Nurses Section (Đội Ngũ Của Chúng Tôi).
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$asset_uri = trailingslashit( get_template_directory_uri() ) . 'assets/images/bao-mau';

$team = array(
	array( 'image' => 'team-1.png', 'name' => 'Cô Vương Thanh Thủy', 'role' => 'Điều dưỡng trưởng' ),
	array( 'image' => 'team-2.png', 'name' => 'Cô Trần Thị Trang', 'role' => 'Điều dưỡng chăm bé' ),
	array( 'image' => 'team-3.png', 'name' => 'Cô Đỗ Thị Duyên', 'role' => 'Điều dưỡng chăm bé' ),
	array( 'image' => 'team-4.png', 'name' => 'Cô Tống Thị Nguyệt', 'role' => 'Điều dưỡng chăm bé' ),
);
?>
<section class="vpc-bao-mau__team" aria-labelledby="bao-mau-team-title">
	<div class="vpc-bao-mau__container">
		<div class="vpc-bao-mau__section-heading">
			<div class="vpc-bao-mau__badge"><img src="<?php echo esc_url( $asset_uri . '/star.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true">ĐIỀU DƯỠNG VIÊN</div>
			<h2 id="bao-mau-team-title"><span>Đội Ngũ Của Chúng Tôi</span></h2>
			<p>Đội ngũ điều dưỡng viên với nền tảng y tế, được đào tạo chuyên môn về chăm sóc sức khỏe Mẹ&amp;Bé, đảm bảo đem đến dịch vụ an toàn, chuyên nghiệp cho các gia đình.</p>
		</div>
		<div class="vpc-bao-mau__team-viewport"><div class="vpc-bao-mau__team-grid">
			<?php foreach ( $team as $member ) : ?>
				<article class="vpc-bao-mau__team-card"><div class="vpc-bao-mau__team-image"><img src="<?php echo esc_url( $asset_uri . '/' . $member['image'] ); ?>" width="223" height="292" alt="<?php echo esc_attr( $member['name'] ); ?>" loading="lazy"></div><div><h3><?php echo esc_html( $member['name'] ); ?></h3><p><?php echo esc_html( $member['role'] ); ?></p></div></article>
			<?php endforeach; ?>
		</div></div>
	</div>
</section>

