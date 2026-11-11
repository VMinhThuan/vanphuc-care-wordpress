<?php
/**
 * Bath - Hero Banner Section.
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$bath_uri   = trailingslashit( get_template_directory_uri() ) . 'assets/images/bath';
$shared_uri = trailingslashit( get_template_directory_uri() ) . 'assets/images/easy';
?>
<section class="vpc-bath__hero" aria-labelledby="bath-title">
	<div class="vpc-bath__container vpc-bath__hero-grid">
		<div class="vpc-bath__hero-copy">
			<div class="vpc-bath__badge"><img src="<?php echo esc_url( $shared_uri . '/star.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true"><span class="vpc-bath__badge-label--desktop">DÀNH CHO BÉ TỪ 0-6 THÁNG TUỔI</span><span class="vpc-bath__badge-label--mobile">DÀNH CHO BÉ TỪ 0-12 THÁNG</span></div>
			<h1 id="bath-title">Tắm Bé Sơ Sinh <span class="vpc-bath__hero-title-mobile-break">Tại Nhà</span></h1>
			<p>Tắm trẻ sơ sinh là một phần quan trọng của quy trình chăm sóc bé hằng ngày. Khi em bé mới chào đời, hệ miễn dịch còn non nớt. Vệ sinh đúng chuẩn là cách tốt nhất để bảo vệ sức khỏe.</p>
			<ul class="vpc-bath__hero-benefits">
				<li><img src="<?php echo esc_url( $shared_uri . '/check-badge.svg' ); ?>" width="24" height="24" alt="">Giúp con ngăn ngừa những bệnh lý do nhiễm khuẩn, ngăn ngừa nhiễm trùng cuống rốn.</li>
				<li><img src="<?php echo esc_url( $shared_uri . '/check-badge.svg' ); ?>" width="24" height="24" alt="">Giải tỏa căng thẳng, xoa dịu cảm giác lo âu của trẻ sơ sinh sau khi tách biệt khỏi cơ thể mẹ.</li>
			</ul>
			<a class="vpc-bath__button vpc-bath__button--primary" href="#bath-packages">Xem gói dịch vụ</a>
		</div>
		<div class="vpc-bath__hero-image"><img src="<?php echo esc_url( $bath_uri . '/hero.jpg' ); ?>" width="600" height="649" alt="Tắm bé sơ sinh tại nhà" fetchpriority="high"></div>
	</div>
</section>

