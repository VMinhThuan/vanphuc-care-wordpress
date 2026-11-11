<?php
/**
 * Bao Mau - Difficulties / Challenges Section.
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$asset_uri = trailingslashit( get_template_directory_uri() ) . 'assets/images/bao-mau';
?>
<section class="vpc-bao-mau__intro vpc-bao-mau__intro--challenges">
	<div class="vpc-bao-mau__container vpc-bao-mau__intro-grid">
		<div class="vpc-bao-mau__intro-image-frame">
			<img class="vpc-bao-mau__intro-image" src="<?php echo esc_url( $asset_uri . '/challenges.png' ); ?>" width="540" height="456" alt="Mẹ chăm sóc em bé sau sinh" loading="lazy">
		</div>
		<div class="vpc-bao-mau__intro-copy">
			<div class="vpc-bao-mau__badge"><img src="<?php echo esc_url( $asset_uri . '/star.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true">KHÓ KHĂN</div>
			<h2><span>Những Điều Khó Khăn</span><em>Mẹ Thường Gặp</em></h2>
			<p>Hành trình nuôi con thiêng liêng và ý nghĩa biết bao, nhưng cũng đem đến cho cha mẹ nhiều thách thức, khó khăn:</p>
			<ul class="vpc-bao-mau__check-list">
				<li>Mẹ còn chưa biết xử lý sặc sữa, xử lý hóc, sơ cứu cơ bản cho con.</li>
				<li>Băn khoăn về cữ bú hoặc tư thế ti phù hợp.</li>
				<li>Bé gặp tình trạng khó vào giấc, không tự chuyển giấc, nối giấc được.</li>
				<li>Chưa có kinh nghiệm nhận biết những dấu hiệu bất thường của trẻ.</li>
			</ul>
		</div>
	</div>
</section>

