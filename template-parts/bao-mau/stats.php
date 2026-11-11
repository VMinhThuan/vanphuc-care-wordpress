<?php
/**
 * Bao Mau - Highlights / Stats Section.
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$asset_uri = trailingslashit( get_template_directory_uri() ) . 'assets/images/bao-mau';

$stats = array(
	array( 'icon' => 'health-safety.svg', 'title' => 'An tâm', 'copy' => 'Ứng dụng công nghệ với sổ sức khoẻ điện tử, theo dõi tình trạng sức khỏe bé thường xuyên.' ),
	array( 'icon' => 'professional-expertise.svg', 'title' => 'Chuyên môn', 'copy' => 'Các hoạt động chăm sóc được thực hiện hoặc giám sát từ xa bởi bộ phận điều dưỡng.' ),
	array( 'icon' => 'professional.svg', 'title' => 'Rèn nếp sinh hoạt', 'copy' => 'Hỗ trợ bé ăn, ngủ, thiết lập nếp sinh hoạt theo lịch trình EASY. Cá nhân hoá phù hợp với mỗi trẻ.' ),
	array( 'icon' => 'mother-companion.svg', 'title' => 'Đồng hành cùng mẹ', 'copy' => 'Chia sẻ kinh nghiệm, hỗ trợ giải đáp những băn khoăn, lo lắng để mẹ có thêm thời gian nghỉ ngơi.' ),
);
?>
<section class="vpc-bao-mau__stats" aria-label="Điểm nổi bật">
	<div class="vpc-bao-mau__container vpc-bao-mau__stats-grid">
		<?php foreach ( $stats as $stat ) : ?>
			<div class="vpc-bao-mau__stat">
				<div class="vpc-bao-mau__stat-heading"><img src="<?php echo esc_url( $asset_uri . '/' . $stat['icon'] ); ?>" width="24" height="24" alt="" aria-hidden="true"><h2><?php echo esc_html( $stat['title'] ); ?></h2></div>
				<p><?php echo esc_html( $stat['copy'] ); ?></p>
			</div>
		<?php endforeach; ?>
	</div>
</section>

