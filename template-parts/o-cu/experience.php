<?php
/**
 * O Cu - Experience Section (Trải Nghiệm Ở Cữ Thoải Mái Như Ở Nhà).
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$asset_uri = trailingslashit( get_template_directory_uri() ) . 'assets/images/o-cu';
?>
<section class="ocu-experience"><div class="ocu-experience__inner"><img src="<?php echo esc_url( $asset_uri . '/figma/experience.png' ); ?>" width="540" height="456" alt="Trải nghiệm ở cữ tại Vạn Phúc Care" loading="lazy"><div><span class="ocu-badge"><img src="<?php echo esc_url( $asset_uri . '/star.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true">Trải nghiệm</span><h2><span class="ocu-heading--blue">Trải Nghiệm Ở Cữ</span><span class="ocu-heading--pink">Thoải Mái Như Ở Nhà</span></h2><p>Trung tâm ở cữ toạ lạc trên cung đường ven Hồ Tây thơ mộng. Tiện nghi phòng nghỉ và phòng dưỡng nhi hiện đại, cùng đội ngũ điều dưỡng chăm sóc <br class="ocu-experience-mobile-break">mẹ và bé 24/7.</p><h3>Phù hợp với:</h3><ul><li>Mẹ: Cần nghỉ ngơi phục hồi toàn diện sau sinh.</li><li>Bé: Được điều dưỡng theo dõi và chăm sóc mỗi ngày.</li><li>Gia đình: Công việc bận rộn, muốn an tâm gửi gắm nơi có chuyên môn cao.</li></ul></div></div></section>

