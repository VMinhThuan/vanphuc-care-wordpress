<?php
/**
 * EASY - Mother's Challenges Section.
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$asset_uri = trailingslashit( get_template_directory_uri() ) . 'assets/images/easy';
?>
<section class="vpc-easy__challenges" aria-labelledby="easy-challenges-title">
	<div class="vpc-easy__container vpc-easy__split-grid">
		<div class="vpc-easy__split-image"><img src="<?php echo esc_url( $asset_uri . '/challenges.png' ); ?>" width="581" height="532" alt="Mẹ chăm sóc em bé" loading="lazy"></div>
		<div class="vpc-easy__split-copy">
			<div class="vpc-easy__badge"><img src="<?php echo esc_url( $asset_uri . '/star.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true">NỖI LO CỦA MẸ</div>
			<h2 id="easy-challenges-title"><span>Những Điều Khó Khăn</span><em>Mẹ Thường Gặp</em></h2>
			<p>Nuôi con theo phương pháp EASY đem lại nhiều lợi ích thiết thực cho cả bé cùng gia đình, tuy nhiên không tránh khỏi những khó khăn ban đầu khiến cha mẹ dễ nản lòng.</p>
			<ul class="vpc-easy__icon-list vpc-easy__icon-list--negative">
				<li><img src="<?php echo esc_url( $asset_uri . '/x-circle.svg' ); ?>" width="24" height="24" alt="">Lịch sinh hoạt của con thiếu ổn định, ngủ ngày cày đêm.</li>
				<li><img src="<?php echo esc_url( $asset_uri . '/x-circle.svg' ); ?>" width="24" height="24" alt="">Không quản lý được cữ ăn, cữ bú, cữ ngủ của con.</li>
				<li><img src="<?php echo esc_url( $asset_uri . '/x-circle.svg' ); ?>" width="24" height="24" alt="">Bé gặp tình trạng khó vào giấc, không tự chuyển giấc, nối giấc được.</li>
				<li><img src="<?php echo esc_url( $asset_uri . '/x-circle.svg' ); ?>" width="24" height="24" alt="">Không nhận biết được dấu hiệu đói no của trẻ.</li>
			</ul>
		</div>
	</div>
</section>

