<?php
/**
 * O Cu - FAQ Section (Câu Hỏi Thường Gặp).
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$shared_asset_uri = trailingslashit( get_template_directory_uri() ) . 'assets/images/bao-mau';
?>
<section class="vpc-bao-mau__faq ocu-shared-section" aria-labelledby="ocu-faq-title">
	<div class="vpc-bao-mau__container">
		<div class="vpc-bao-mau__section-heading">
			<div class="vpc-bao-mau__badge"><img src="<?php echo esc_url( $shared_asset_uri . '/star.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true">FAQ</div>
			<h2 id="ocu-faq-title"><span>Câu Hỏi Thường Gặp</span></h2>
			<p>Vượt qua những kiêng cữ khắt khe, mẹ được thư giãn tối đa để phục hồi sức khỏe, tận hưởng trọn vẹn hành trình đón thiên thần nhỏ cùng dịch vụ ở cữ.</p>
		</div>
		<div class="vpc-bao-mau__faq-list">
			<details class="is-open" open>
				<summary>Thời điểm nào là thích hợp để đặt phòng ở cữ ?</summary>
				<p>Do số lượng phòng tại trung tâm ở cữ Vạn Phúc Care có giới hạn, kèm nhu cầu đăng ký dài ngày của các mẹ. Chúng tôi khuyến khích khách hàng đặt lịch phòng sớm nhất có thể, nhằm đảm bảo ngày phòng còn trống và chất lượng phục vụ luôn được chu đáo nhất.</p>
			</details>
			<details>
				<summary>Người thân có được ở lại cùng mẹ và bé không ?</summary>
				<p>Người thân có thể ở lại cùng mẹ và bé theo chính sách của từng hạng phòng. Đội ngũ Vạn Phúc Care sẽ hướng dẫn gia đình để đảm bảo sự riêng tư và không gian nghỉ ngơi của mẹ.</p>
			</details>
			<details>
				<summary>Sử dụng dịch vụ ở cữ bé sẽ được chăm sóc ở đâu ?</summary>
				<p>Bé được chăm sóc tại phòng dưỡng nhi riêng biệt, có điều dưỡng theo dõi 24/24, đảm bảo an toàn và hỗ trợ mẹ nghỉ ngơi trọn vẹn.</p>
			</details>
			<details>
				<summary>Các ngày lễ, ngày tết trung tâm ở cữ có phụ thu không?</summary>
				<p>Trung tâm có chính sách phụ thu riêng cho các ngày lễ, ngày Tết. Nhân viên tư vấn sẽ thông tin chi tiết khi mẹ đăng ký phòng.</p>
			</details>
			<details>
				<summary>Trong thời gian lưu trú tại trung tâm ở cữ, nếu mẹ và bé gặp vấn đề về sức khoẻ sẽ xử lí như thế nào ?</summary>
				<p>Mẹ và bé được điều dưỡng theo dõi sát sao trong suốt thời gian lưu trú. Khi phát hiện vấn đề bất thường, trung tâm sẽ xử lý theo quy trình và phối hợp cơ sở y tế phù hợp.</p>
			</details>
		</div>
	</div>
</section>

