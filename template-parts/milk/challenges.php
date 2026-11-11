<?php
/**
 * Milk - Typical Symptoms / Challenges Section.
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$shared_uri = trailingslashit( get_template_directory_uri() ) . 'assets/images/easy';
?>
<section class="vpc-milk__challenges" aria-labelledby="milk-challenges-title">
	<div class="vpc-milk__container vpc-milk__split-grid">
		<div class="vpc-milk__split-image">
			<img src="<?php echo esc_url( $shared_uri . '/challenges.png' ); ?>" width="581" height="532" alt="Mẹ sau sinh chăm sóc em bé" loading="lazy">
		</div>
		<div class="vpc-milk__split-copy">
			<div class="vpc-milk__badge"><img src="<?php echo esc_url( $shared_uri . '/star.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true">BẰNG QUAN SÁT</div>
			<h2 id="milk-challenges-title"><span>Nhận Biết Dấu Hiệu</span><em>Tắc Tia Sữa Điển Hình</em></h2>
			<p>Một số dấu hiệu tắc tia sữa điển hình được nhận thấy thường xuyên tại trung tâm ở cữ Vạn Phúc Care:</p>
			<ul class="vpc-milk__icon-list vpc-milk__icon-list--negative">
				<li><img src="<?php echo esc_url( $shared_uri . '/x-circle.svg' ); ?>" width="24" height="24" alt="">Ngực sưng đỏ, đau tức nhẹ hoặc xuất hiện các nốt sần nhỏ nổi trên ngực.</li>
				<li><img src="<?php echo esc_url( $shared_uri . '/x-circle.svg' ); ?>" width="24" height="24" alt="">Sốt kéo dài, sữa không tiết ra hoặc tiết rất ít.</li>
				<li><img src="<?php echo esc_url( $shared_uri . '/x-circle.svg' ); ?>" width="24" height="24" alt="">Bầu sữa có cảm giác ấm nóng bất thường khi chạm vào, nổi cục cứng.</li>
			</ul>
		</div>
	</div>
</section>

