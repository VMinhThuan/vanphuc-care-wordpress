<?php
/**
 * Prenatal - Frequently Asked Questions (FAQ) Accordion Section.
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$theme_uri = get_template_directory_uri();
$image     = $theme_uri . '/assets/images/lop-hoc-tien-san/';
?>
<section class="vpc-section prenatal-faq" aria-labelledby="prenatal-faq-title">
	<div class="prenatal-container">
		<div class="prenatal-section-heading">
			<div class="prenatal-badge">
				<img class="prenatal-badge__icon" src="<?php echo esc_url( $image . 'icons/star-light.svg' ); ?>" alt="" aria-hidden="true" width="24" height="24" />
				<span>GIẢI ĐÁP CÙNG BỐ MẸ</span>
			</div>
			<h2 id="prenatal-faq-title">Những Điều Bố Mẹ <span class="whitespace-nowrap">Muốn&nbsp;Biết</span></h2>
		</div>
		<div class="prenatal-accordion">
			<details open>
				<summary>Bố có được đi học cùng mẹ không? Chi phí có tính thêm cho người đi cùng không?</summary>
				<p>Lớp học rất khuyến khích cả bố và mẹ cùng tham gia, hoặc người thân trực tiếp hỗ trợ chăm bé sau sinh. Cha mẹ tham gia cùng nhau không phát sinh thêm phụ phí.</p>
			</details>
			<details>
				<summary>Tham gia lớp học cần chuẩn bị trước những gì?</summary>
				<p>Trung tâm ở cữ đã trang bị đầy đủ mô hình búp bê y tế, giáo cụ thực hành, tài liệu giáo trình, bàn trà. Mẹ bầu và gia đình chỉ cần mặc trang phục thoải mái, mang theo tâm lý cởi mở để thực hành.</p>
			</details>
			<details>
				<summary>Mẹ bầu ở tuần thai nào thì nên bắt đầu tham gia lớp học?</summary>
				<p>Giai đoạn lý tưởng nhất là từ tuần thứ 20 đến tuần thứ 34 của thai kỳ. Lúc này sức khỏe của mẹ đã ổn định, bụng chưa quá nặng nề, giúp mẹ và bố tiếp thu và thực hành các kỹ thuật thở, rặn sinh và chăm sóc bé một cách thoải mái nhất.</p>
			</details>
			<details>
				<summary>Lớp học tổ chức vào thời gian nào và có giới hạn số lượng học viên không?</summary>
				<p>Lớp học diễn ra định kỳ vào buổi sáng Thứ 7 hàng tuần (từ 9:00 đến 12:00) tại Tầng 1 Trung tâm ở cữ Vạn Phúc Care. Để đảm bảo chất lượng học tập, mỗi lớp chỉ nhận số lượng học viên dưới 10 người.</p>
			</details>
			<details>
				<summary>Sau khi học xong nếu về nhà quên thao tác hoặc gặp vấn đề khi sinh bé có được hỗ trợ không?</summary>
				<p>Sau buổi học, gia đình được tặng tài liệu tóm tắt mang về và tiếp tục được đội ngũ điều dưỡng của Vạn Phúc Care đồng hành giải đáp thắc mắc. Khi sinh bé xong, nếu gia đình cần hỗ trợ trực tiếp, đội ngũ có các dịch vụ chăm sóc hậu sản chuyên sâu tại trung tâm ở cữ hoặc tại nhà.</p>
			</details>
		</div>
	</div>
</section>

