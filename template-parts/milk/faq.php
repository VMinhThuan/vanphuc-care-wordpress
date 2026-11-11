<?php
/**
 * Milk - FAQ Section (Câu Hỏi Thường Gặp).
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$shared_uri = trailingslashit( get_template_directory_uri() ) . 'assets/images/easy';
?>
<section class="vpc-milk__faq" aria-labelledby="milk-faq-title">
	<div class="vpc-milk__container">
		<div class="vpc-milk__section-heading">
			<div class="vpc-milk__badge"><img src="<?php echo esc_url( $shared_uri . '/star.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true">FAQ</div>
			<h2 id="milk-faq-title">Câu Hỏi Thường Gặp</h2>
			<p class="vpc-milk__responsive-copy vpc-milk__responsive-copy--desktop">Về dịch vụ thông tắc tia sữa được cung cấp bởi Trung tâm ở cữ Vạn Phúc Care</p>
			<p class="vpc-milk__responsive-copy vpc-milk__responsive-copy--mobile">Vượt qua những kiêng cữ khắt khe, mẹ được thư giãn tối đa để phục hồi sức khỏe, và tận hưởng trọn vẹn hành trình đón thiên thần nhỏ.</p>
		</div>
		<div class="vpc-milk__faq-list">
			<details open>
				<summary>
					Vì sao nhiều mẹ sau sinh tin tưởng lựa chọn dịch vụ thông tắc tia sữa tại nhà của chúng tôi?
					<span class="vpc-milk__faq-chevron">
						<img class="is-down" src="<?php echo esc_url( $shared_uri . '/chevron-down.svg' ); ?>" width="20" height="12" alt="">
						<img class="is-up" src="<?php echo esc_url( $shared_uri . '/chevron-up.svg' ); ?>" width="20" height="12" alt="">
					</span>
				</summary>
				<p>- Kỹ thuật chuẩn, giảm đau êm dịu: Áp dụng phương pháp giải phóng tắc tia sữa nhẹ nhàng, tuyệt đối không dùng lực bóp nghẹt gây tổn thương mô tuyến vú hay làm vỡ nang sữa.<br><br>- Xử lý tận gốc và duy trì dòng sữa: Không chỉ giải tỏa khối tắc tức thì, chuyên viên còn tìm đúng nguyên nhân (khớp ngậm sai, cặn canxi, lịch hút sữa chưa phù hợp...) để phòng ngừa tái phát, giữ nguồn sữa quý giá dài lâu.<br><br>- Phục vụ tận nơi, hỗ trợ nhanh chóng: Thấu hiểu nỗi đau và cơn sốt của mẹ, chúng tôi luôn nỗ lực triển khai dịch vụ nhanh nhất để mẹ mau chóng được an tâm nghỉ ngơi.</p>
			</details>
			<details>
				<summary>
					Điều gì làm nên sự đặc biệt của Vạn Phúc Care so với các đơn vị khác trong ngành?
					<span class="vpc-milk__faq-chevron">
						<img class="is-down" src="<?php echo esc_url( $shared_uri . '/chevron-down.svg' ); ?>" width="20" height="12" alt="">
						<img class="is-up" src="<?php echo esc_url( $shared_uri . '/chevron-up.svg' ); ?>" width="20" height="12" alt="">
					</span>
				</summary>
				<p>Đội ngũ chuyên viên giàu kinh nghiệm, kỹ thuật nhẹ nhàng và quy trình chăm sóc được chuẩn hóa theo từng tình trạng của mẹ.</p>
			</details>
			<details>
				<summary>
					Khi nào mẹ cần sử dụng dịch vụ thông tắc tia sữa ngay?
					<span class="vpc-milk__faq-chevron">
						<img class="is-down" src="<?php echo esc_url( $shared_uri . '/chevron-down.svg' ); ?>" width="20" height="12" alt="">
						<img class="is-up" src="<?php echo esc_url( $shared_uri . '/chevron-up.svg' ); ?>" width="20" height="12" alt="">
					</span>
				</summary>
				<p>Khi mẹ thấy ngực sưng đau, nổi cục cứng, sốt kéo dài hoặc sữa tiết ra ít bất thường.</p>
			</details>
			<details>
				<summary>
					Thời gian thực hiện một buổi thông tắc tia sữa kéo dài bao lâu?
					<span class="vpc-milk__faq-chevron">
						<img class="is-down" src="<?php echo esc_url( $shared_uri . '/chevron-down.svg' ); ?>" width="20" height="12" alt="">
						<img class="is-up" src="<?php echo esc_url( $shared_uri . '/chevron-up.svg' ); ?>" width="20" height="12" alt="">
					</span>
				</summary>
				<p>Thời lượng được sắp xếp phù hợp với tình trạng thực tế và phác đồ trị liệu của từng mẹ.</p>
			</details>
			<details>
				<summary>
					Sau buổi thông tắc tia sữa, tình trạng đau tức có thuyên giảm ngay không?
					<span class="vpc-milk__faq-chevron">
						<img class="is-down" src="<?php echo esc_url( $shared_uri . '/chevron-down.svg' ); ?>" width="20" height="12" alt="">
						<img class="is-up" src="<?php echo esc_url( $shared_uri . '/chevron-up.svg' ); ?>" width="20" height="12" alt="">
					</span>
				</summary>
				<p>Chuyên viên sẽ hướng dẫn mẹ theo dõi và chăm sóc sau trị liệu để duy trì dòng sữa và hạn chế tái phát.</p>
			</details>
		</div>
	</div>
</section>
