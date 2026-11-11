<?php
/**
 * EASY - Hero Banner Section.
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$asset_uri = trailingslashit( get_template_directory_uri() ) . 'assets/images/easy';
?>
<section class="vpc-easy__hero" aria-labelledby="easy-title">
	<div class="vpc-easy__container vpc-easy__hero-grid">
		<div class="vpc-easy__hero-copy">
			<div class="vpc-easy__badge"><img src="<?php echo esc_url( $asset_uri . '/star.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true">DÀNH CHO BÉ TỪ 0-12 THÁNG</div>
			<h1 id="easy-title">Tư Vấn Nuôi Con EASY</h1>
			<p>Đồng hành cùng cha mẹ trên chặng đường nuôi con theo phương pháp EASY. Xây dựng lộ trình cá nhân hoá theo đặc điểm, nhu cầu riêng biệt của trẻ.</p>
			<ul class="vpc-easy__hero-benefits">
				<li><img src="<?php echo esc_url( $asset_uri . '/check-badge.svg' ); ?>" width="24" height="24" alt="">Giúp mẹ giải quyết những vấn đề khó nhằn trên chặng đường nuôi con</li>
				<li><img src="<?php echo esc_url( $asset_uri . '/check-badge.svg' ); ?>" width="24" height="24" alt="">Giúp con hình thành nhịp sinh hoạt khoa học, mẹ có thêm thời gian cho bản thân</li>
			</ul>
			<div class="vpc-easy__actions"><a class="vpc-easy__button vpc-easy__button--primary" href="#easy-choices">Chọn hình thức</a><a class="vpc-easy__button vpc-easy__button--secondary" href="#easy-packages">Xem gói dịch vụ</a></div>
			<div class="vpc-easy__hero-highlights">
				<div><img src="<?php echo esc_url( $asset_uri . '/personalized.svg' ); ?>" width="24" height="24" alt=""><span>Cá nhân hóa theo từng bé</span></div>
				<div><img src="<?php echo esc_url( $asset_uri . '/pediatric-nursing.svg' ); ?>" width="24" height="24" alt=""><span>Điều dưỡng sản nhi</span></div>
				<div><img src="<?php echo esc_url( $asset_uri . '/service-signup.svg' ); ?>" width="24" height="24" alt=""><span>Theo dõi sát hành trình</span></div>
			</div>
		</div>
		<div class="vpc-easy__hero-image"><img src="<?php echo esc_url( $asset_uri . '/hero.jpg' ); ?>" width="590" height="565" alt="Điều dưỡng hướng dẫn mẹ chăm sóc em bé" fetchpriority="high"></div>
	</div>
</section>

