<?php
/**
 * Milk - Hero Banner Section.
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$milk_uri   = trailingslashit( get_template_directory_uri() ) . 'assets/images/milk';
$shared_uri = trailingslashit( get_template_directory_uri() ) . 'assets/images/easy';
?>
<section class="vpc-milk__hero" aria-labelledby="milk-title">
	<div class="vpc-milk__container vpc-milk__hero-grid">
		<div class="vpc-milk__hero-copy">
			<div class="vpc-milk__badge"><img src="<?php echo esc_url( $shared_uri . '/star.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true">DÀNH CHO MẸ</div>
			<h1 id="milk-title">Thông Tắc Tia Sữa</h1>
			<p>Dịch vụ thông tắc tia sữa mang đến giải pháp an toàn giúp mẹ cắt sốt, điều trị tắc tia sữa một cách nhanh chóng và hiệu quả.</p>
			<ul class="vpc-milk__hero-benefits">
				<li><img src="<?php echo esc_url( $shared_uri . '/check-badge.svg' ); ?>" width="24" height="24" alt="">Tiết kiệm thời gian, thuận tiện, không phải di chuyển.</li>
				<li><img src="<?php echo esc_url( $shared_uri . '/check-badge.svg' ); ?>" width="24" height="24" alt="">Giải quyết nhanh chóng hiện tượng sưng đau ngực, tắc tia sữa... trong thời gian ngắn.</li>
			</ul>
			<a class="vpc-milk__button vpc-milk__button--primary" href="#milk-packages">Xem gói dịch vụ</a>
		</div>
		<div class="vpc-milk__hero-image">
			<img src="<?php echo esc_url( $milk_uri . '/hero.png' ); ?>" width="567" height="506" alt="Chuyên viên tư vấn thông tắc tia sữa" fetchpriority="high">
		</div>
	</div>
</section>

