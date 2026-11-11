<?php
/**
 * EASY - FAQ Section (Câu Hỏi Thường Gặp).
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$asset_uri = trailingslashit( get_template_directory_uri() ) . 'assets/images/easy';
?>
<section class="vpc-easy__faq" aria-labelledby="easy-faq-title">
	<div class="vpc-easy__container">
		<div class="vpc-easy__section-heading">
			<div class="vpc-easy__badge"><img src="<?php echo esc_url( $asset_uri . '/star.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true">FAQ</div>
			<h2 id="easy-faq-title">Câu Hỏi Thường Gặp</h2>
			<p>Chặng đường nuôi con trong lần đầu làm mẹ không tránh khỏi những nỗi niềm băn khoăn, lo lắng riêng của mẹ.<br>Với kênh hỗ trợ hoạt động 24/7, chúng tôi luôn sẵn sàng đồng hành cùng gia đình mọi lúc.</p>
		</div>
		<div class="vpc-easy__faq-list">
			<details open>
				<summary>
					Vì sao nhiều cha mẹ lựa chọn sử dụng dịch vụ của Vạn Phúc Care?
					<span class="vpc-easy__faq-chevron">
						<img class="is-down" src="<?php echo esc_url( $asset_uri . '/chevron-down.svg' ); ?>" width="20" height="12" alt="">
						<img class="is-up" src="<?php echo esc_url( $asset_uri . '/chevron-up.svg' ); ?>" width="20" height="12" alt="">
					</span>
				</summary>
				<p>– Vạn Phúc Care là đơn vị đầu tiên hệ thống hóa thông tin sức khỏe của trẻ qua Sổ sức khỏe điện tử và phổ cập phương pháp chăm sóc sức khỏe trẻ sơ sinh từ 0 – 12 tháng tuổi khoa học nhất.<br><br>– Đội ngũ điều dưỡng viên tận tâm, tay nghề cao, cam kết 100% được đào tạo có bằng cấp chính quy với các chuyên ngành: Điều dưỡng, hộ sinh, giáo viên mầm non,….<br><br>– Các dịch vụ đa dạng phù hợp với từng đặc điểm và nhu cầu của mọi gia đình với các gói ca ngày, ca đêm hoặc ca 24/24 giúp cha mẹ giảm bớt gánh nặng công việc chăm sóc con, có thể dành thời gian nghỉ ngơi hoặc tập trung vào công việc khác.<br><br>Vạn Phúc Care mang lại sự yên tâm và tiện lợi cho cha mẹ bất kể thời gian nào, vì sức khỏe, hạnh phúc của mẹ và bé yêu!</p>
			</details>
			<details>
				<summary>
					Điều gì làm nên sự đặc biệt của Vạn Phúc Care so với các đơn vị khác cùng ngành?
					<span class="vpc-easy__faq-chevron">
						<img class="is-down" src="<?php echo esc_url( $asset_uri . '/chevron-down.svg' ); ?>" width="20" height="12" alt="">
						<img class="is-up" src="<?php echo esc_url( $asset_uri . '/chevron-up.svg' ); ?>" width="20" height="12" alt="">
					</span>
				</summary>
				<p>Đội ngũ điều dưỡng chuyên môn cao, quy trình chăm sóc chuẩn hóa và hệ thống hỗ trợ gia đình xuyên suốt hành trình nuôi con.</p>
			</details>
			<details>
				<summary>
					Sổ sức khỏe điện tử của Vạn Phúc Care là gì?
					<span class="vpc-easy__faq-chevron">
						<img class="is-down" src="<?php echo esc_url( $asset_uri . '/chevron-down.svg' ); ?>" width="20" height="12" alt="">
						<img class="is-up" src="<?php echo esc_url( $asset_uri . '/chevron-up.svg' ); ?>" width="20" height="12" alt="">
					</span>
				</summary>
				<p>Là nơi lưu trữ và theo dõi các thông tin sức khỏe, lịch chăm sóc và hỗ trợ của bé một cách thuận tiện.</p>
			</details>
			<details>
				<summary>
					Một ngày chăm bé của các bảo mẫu ở Vạn Phúc Care làm những công việc gì?
					<span class="vpc-easy__faq-chevron">
						<img class="is-down" src="<?php echo esc_url( $asset_uri . '/chevron-down.svg' ); ?>" width="20" height="12" alt="">
						<img class="is-up" src="<?php echo esc_url( $asset_uri . '/chevron-up.svg' ); ?>" width="20" height="12" alt="">
					</span>
				</summary>
				<p>Điều dưỡng vệ sinh, theo dõi sức khỏe, tắm massage, hỗ trợ cữ bú, giấc ngủ và các kỹ năng phát triển của bé.</p>
			</details>
			<details>
				<summary>
					Buổi trải nghiệm bảo mẫu tại nhà có được miễn phí không?
					<span class="vpc-easy__faq-chevron">
						<img class="is-down" src="<?php echo esc_url( $asset_uri . '/chevron-down.svg' ); ?>" width="20" height="12" alt="">
						<img class="is-up" src="<?php echo esc_url( $asset_uri . '/chevron-up.svg' ); ?>" width="20" height="12" alt="">
					</span>
				</summary>
				<p>Vui lòng để lại thông tin để đội ngũ tư vấn gói phù hợp nhất với gia đình.</p>
			</details>
		</div>
	</div>
</section>
