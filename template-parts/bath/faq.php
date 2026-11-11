<?php
/**
 * Bath - FAQ Section (Câu Hỏi Thường Gặp).
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$shared_uri = trailingslashit( get_template_directory_uri() ) . 'assets/images/easy';
?>
<section class="vpc-bath__faq" aria-labelledby="bath-faq-title">
	<div class="vpc-bath__container">
		<div class="vpc-bath__section-heading">
			<div class="vpc-bath__badge"><img src="<?php echo esc_url( $shared_uri . '/star.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true">FAQ</div>
			<h2 id="bath-faq-title">Câu Hỏi Thường Gặp</h2>
			<p>Về dịch vụ tắm bé tại nhà được cung cấp bởi Trung tâm ở cữ Vạn Phúc Care</p>
		</div>
		<div class="vpc-bath__faq-list">
			<details open>
				<summary>
					Vì sao nhiều cha mẹ lựa chọn dịch vụ tắm bé tại nhà của chúng tôi?
					<span class="vpc-bath__faq-chevron">
						<img class="is-down" src="<?php echo esc_url( $shared_uri . '/chevron-down.svg' ); ?>" width="20" height="12" alt="">
						<img class="is-up" src="<?php echo esc_url( $shared_uri . '/chevron-up.svg' ); ?>" width="20" height="12" alt="">
					</span>
				</summary>
				<p>- Đội ngũ chuyên môn cao: 100% nhân sự thực hiện là chuyên viên có chuyên môn vững vàng, thao tác chuẩn kỹ thuật và thấu hiểu tâm lý trẻ sơ sinh.<br><br>- Quy trình chuẩn: Kết hợp đồng thời giữa chăm sóc vệ sinh an toàn (mắt, mũi, tai, rốn, bộ phận sinh dục) và các bài massage, vận động nhẹ.<br><br>- Đồng hành và hướng dẫn: Theo dõi sát dấu hiệu sinh lý của trẻ (vàng da, rốn rỉ dịch, nổi mẩn...), đồng thời trực tiếp hướng dẫn, giải tỏa âu lo cho ba mẹ trong những ngày đầu đón con về tổ ấm.</p>
			</details>
			<details>
				<summary>
					Điều gì làm nên sự đặc biệt của Vạn Phúc Care so với các đơn vị khác trong ngành?
					<span class="vpc-bath__faq-chevron">
						<img class="is-down" src="<?php echo esc_url( $shared_uri . '/chevron-down.svg' ); ?>" width="20" height="12" alt="">
						<img class="is-up" src="<?php echo esc_url( $shared_uri . '/chevron-up.svg' ); ?>" width="20" height="12" alt="">
					</span>
				</summary>
				<p>Đội ngũ chuyên viên được đào tạo bài bản, quy trình chăm sóc chuẩn hóa và luôn đồng hành, hướng dẫn gia đình trong từng buổi tắm bé.</p>
			</details>
			<details>
				<summary>
					Thời gian tắm bé trong gói dịch vụ tắm trẻ sơ sinh Vạn Phúc Care thế nào?
					<span class="vpc-bath__faq-chevron">
						<img class="is-down" src="<?php echo esc_url( $shared_uri . '/chevron-down.svg' ); ?>" width="20" height="12" alt="">
						<img class="is-up" src="<?php echo esc_url( $shared_uri . '/chevron-up.svg' ); ?>" width="20" height="12" alt="">
					</span>
				</summary>
				<p>Gia đình có thể chủ động lựa chọn lịch thực hiện phù hợp với nhịp sinh hoạt của mẹ và bé.</p>
			</details>
			<details>
				<summary>
					Khi nào cha mẹ nên sử dụng dịch vụ tắm trẻ sơ sinh tại nhà?
					<span class="vpc-bath__faq-chevron">
						<img class="is-down" src="<?php echo esc_url( $shared_uri . '/chevron-down.svg' ); ?>" width="20" height="12" alt="">
						<img class="is-up" src="<?php echo esc_url( $shared_uri . '/chevron-up.svg' ); ?>" width="20" height="12" alt="">
					</span>
				</summary>
				<p>Ngay từ những ngày đầu sau sinh, đặc biệt khi mẹ còn yếu hoặc gia đình chưa tự tin thực hiện đúng quy trình vệ sinh cho bé.</p>
			</details>
			<details>
				<summary>
					Thời gian thực hiện một buổi tắm bé kéo dài bao lâu?
					<span class="vpc-bath__faq-chevron">
						<img class="is-down" src="<?php echo esc_url( $shared_uri . '/chevron-down.svg' ); ?>" width="20" height="12" alt="">
						<img class="is-up" src="<?php echo esc_url( $shared_uri . '/chevron-up.svg' ); ?>" width="20" height="12" alt="">
					</span>
				</summary>
				<p>Mỗi buổi được sắp xếp đủ thời gian để kiểm tra tổng quan, massage, tắm và vệ sinh cho bé một cách nhẹ nhàng.</p>
			</details>
			<details>
				<summary>
					Gia đình cần chuẩn bị những gì để buổi tắm bé diễn ra thuận lợi?
					<span class="vpc-bath__faq-chevron">
						<img class="is-down" src="<?php echo esc_url( $shared_uri . '/chevron-down.svg' ); ?>" width="20" height="12" alt="">
						<img class="is-up" src="<?php echo esc_url( $shared_uri . '/chevron-up.svg' ); ?>" width="20" height="12" alt="">
					</span>
				</summary>
				<p>Gia đình chuẩn bị không gian sạch sẽ, thoáng mát và những vật dụng cá nhân cần thiết của bé. Chuyên viên sẽ hướng dẫn thêm trước buổi thực hiện.</p>
			</details>
		</div>
	</div>
</section>

