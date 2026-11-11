<?php
/**
 * Bath - Mother's Challenges Section.
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$bath_uri   = trailingslashit( get_template_directory_uri() ) . 'assets/images/bath';
$shared_uri = trailingslashit( get_template_directory_uri() ) . 'assets/images/easy';
?>
<section class="vpc-bath__challenges" aria-labelledby="bath-challenges-title">
	<div class="vpc-bath__container vpc-bath__split-grid">
		<div class="vpc-bath__split-image"><img src="<?php echo esc_url( $bath_uri . '/challenges.png' ); ?>" width="581" height="532" alt="Mẹ chăm sóc em bé sơ sinh" loading="lazy"></div>
		<div class="vpc-bath__split-copy">
			<div class="vpc-bath__badge"><img src="<?php echo esc_url( $shared_uri . '/star.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true">NỖI LO CỦA MẸ</div>
			<h2 id="bath-challenges-title"><span>Những Điều Khó Khăn</span><em>Mẹ Thường Gặp</em></h2>
			<p>Việc tắm bé tưởng như đơn giản cũng có thể đem đến những khó khăn cho mẹ trong những tuần đầu sau sinh:</p>
			<ul class="vpc-bath__icon-list vpc-bath__icon-list--negative">
				<li><img src="<?php echo esc_url( $shared_uri . '/x-circle.svg' ); ?>" width="24" height="24" alt="">Mẹ sinh mổ, vết thương chưa lành, chưa thể bế ẵm hay tắm cho bé.</li>
				<li><img src="<?php echo esc_url( $shared_uri . '/x-circle.svg' ); ?>" width="24" height="24" alt="">Trẻ sơ sinh chưa rụng rốn, dễ nhiễm trùng nếu không tắm đúng quy trình.</li>
				<li><img src="<?php echo esc_url( $shared_uri . '/x-circle.svg' ); ?>" width="24" height="24" alt="">Ngồi xổm tắm bé gây áp lực lên khoang chậu và vết mổ chưa phục hồi.</li>
				<li><img src="<?php echo esc_url( $shared_uri . '/x-circle.svg' ); ?>" width="24" height="24" alt=""><span class="vpc-bath__challenge-last-copy">Chưa có kinh nghiệm massage giải toả lo âu cho bé.</span></li>
			</ul>
		</div>
	</div>
</section>

