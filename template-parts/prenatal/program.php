<?php
/**
 * Prenatal - 3-Part Program & Modules Section.
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$theme_uri = get_template_directory_uri();
$image     = $theme_uri . '/assets/images/lop-hoc-tien-san/';
?>
<section id="prenatal-program" class="vpc-section prenatal-program" aria-labelledby="prenatal-program-title">
	<div class="prenatal-container prenatal-center">
		<div class="prenatal-badge">
			<img class="prenatal-badge__icon" src="<?php echo esc_url( $image . 'icons/star-light.svg' ); ?>" alt="" aria-hidden="true" width="24" height="24" />
			<span>01 BUỔI · 03 GIỜ · 08 NỘI DUNG</span>
		</div>
		<h2 id="prenatal-program-title">Nội Dung Lớp Học <span class="whitespace-nowrap">Tiền&nbsp;Sản</span></h2>
		<p class="prenatal-lead">Từ chăm sóc thai kỳ đến những thao tác chăm bé đầu tiên.<br>Lý thuyết tinh gọn kết hợp thực hành; đan xen các phiên Q&amp;A cá nhân hóa 1:1, thực hành trực tiếp, giải đáp đến từng băn khoăn.</p>
		<div class="prenatal-tabs" role="tablist" aria-label="Nội dung chương trình">
			<button class="is-active" type="button" data-target="prenatal-panel-1" id="tab-1" role="tab" aria-selected="true" aria-controls="prenatal-panel-1">Phần 1 - Sức khỏe thai kỳ</button>
			<button type="button" data-target="prenatal-panel-2" id="tab-2" role="tab" aria-selected="false" aria-controls="prenatal-panel-2">Phần 2 - Nuôi con bằng sữa mẹ</button>
			<button type="button" data-target="prenatal-panel-3" id="tab-3" role="tab" aria-selected="false" aria-controls="prenatal-panel-3">Phần 3 - Thực hành chăm sóc</button>
		</div>
		<div class="prenatal-step-grid is-active" id="prenatal-panel-1" role="tabpanel" aria-labelledby="tab-1">
			<article>
				<div class="prenatal-step-tag">Module 01</div>
				<h3>Nhận biết tiền sản giật</h3>
				<p>Nhận biết dấu hiệu và phòng ngừa tiền sản giật trong những tháng cuối thai kỳ</p>
			</article>
			<article>
				<div class="prenatal-step-tag">Module 02</div>
				<h3>Dinh dưỡng cho mẹ</h3>
				<p>Dinh dưỡng khoa học cuối thai kỳ và phục hồi thể trạng sau sinh</p>
			</article>
			<article>
				<div class="prenatal-step-tag">Module 03</div>
				<h3>Tập thở &amp; rặn sinh</h3>
				<p>Thực hành kỹ thuật thở và rặn sinh thường hiệu quả, giúp mẹ chủ động khi vượt cạn.</p>
			</article>
		</div>
		<div class="prenatal-step-grid" id="prenatal-panel-2" role="tabpanel" aria-labelledby="tab-2" hidden>
			<article>
				<div class="prenatal-step-tag">Module 04</div>
				<h3>Hiểu đúng về sữa mẹ</h3>
				<p>Hiểu cơ chế nuôi con bằng sữa mẹ và chuẩn bị nền tảng cho hành trình đầu đời của bé.</p>
			</article>
			<article>
				<div class="prenatal-step-tag">Module 05</div>
				<h3>Đọc vị tín hiệu của bé</h3>
				<p>Nhận biết tín hiệu đói, hướng dẫn cữ ăn đúng và đủ trong những ngày đầu sau sinh.</p>
			</article>
			<article>
				<div class="prenatal-step-tag">Module 06</div>
				<h3>Khớp ngậm chuẩn</h3>
				<p>Hướng dẫn và chỉnh sửa trực tiếp khớp ngậm khi bé ti mẹ cùng đội ngũ điều dưỡng.</p>
			</article>
		</div>
		<div class="prenatal-step-grid" id="prenatal-panel-3" role="tabpanel" aria-labelledby="tab-3" hidden>
			<article>
				<div class="prenatal-step-tag">Module 07</div>
				<h3>Xử lý sặc sữa</h3>
				<p>Thực hành kỹ thuật xử lý cấp cứu sặc sữa khẩn cấp trên mô hình búp bê y tế.</p>
			</article>
			<article>
				<div class="prenatal-step-tag">Module 08</div>
				<h3>Vỗ ợ hơi &amp; quấn chũn</h3>
				<p>Thực hành vỗ ợ hơi đa tư thế và quấn chũn giúp bé an tâm, ngủ sâu giấc. Kết thúc bằng hỏi đáp, gỡ các thói quen chăm con thiếu khoa học.</p>
			</article>
		</div>
		<p class="prenatal-note">Đan xen các phiên hỏi đáp cá nhân hóa cùng điều dưỡng, ngay tại lớp</p>
		<a class="prenatal-button prenatal-button--primary" href="#prenatal-registration">Đăng ký ngay</a>
	</div>
</section>

