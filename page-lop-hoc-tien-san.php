<?php
/**
 * Template Name: Lớp học tiền sản
 * Template Post Type: page
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$theme_uri = get_template_directory_uri();
$image     = $theme_uri . '/assets/images/lop-hoc-tien-san/';

// Keep the video section implemented but private until the final video is ready.
$show_prenatal_video = false;
?>

<section class="vpc-section prenatal-hero" aria-labelledby="prenatal-title">
	<div class="prenatal-container prenatal-hero__layout">
		<div class="prenatal-hero__copy">
			<div class="prenatal-badge">
				<img class="prenatal-badge__icon" src="<?php echo esc_url( $image . 'icons/star-light.svg' ); ?>" alt="" aria-hidden="true" width="24" height="24" />
				<span>LỚP HỌC TIỀN SẢN</span>
			</div>
			<h1 id="prenatal-title" class="prenatal-title">
				<span>Tự Tin Đón Con Yêu</span>
				<em>Đọc Vị Nhu Cầu</em>
				<em>Của Trẻ</em>
			</h1>
			<p>Chuẩn bị vững vàng cho hành trình làm cha mẹ. Với sự đồng hành cùng điều dưỡng trưởng Thanh Thuỷ, cùng cha mẹ biến kiến thức y khoa thành kỹ năng chăm con thực tế, thấu hiểu nhu cầu của con trẻ bằng tình yêu thương.</p>
			<div class="prenatal-actions">
				<a class="prenatal-button prenatal-button--primary" href="#prenatal-registration">Đăng ký giữ chỗ</a>
				<a class="prenatal-button prenatal-button--secondary" href="#prenatal-program">Khám phá chương trình</a>
			</div>
		</div>
		<div class="prenatal-hero__media">
			<picture>
				<source media="(max-width: 639px)" srcset="<?php echo esc_url( $image . 'hero-class-actual.png' ); ?>" />
				<img class="prenatal-hero__image" src="<?php echo esc_url( $image . 'hero-mother-baby.png' ); ?>" alt="Lớp học tiền sản thực tế tại Vạn Phúc Care" width="454" height="444" />
			</picture>
		</div>
		<div class="prenatal-quick-info" aria-label="Thông tin lớp học nhanh">
			<div class="prenatal-quick-info__item">
				<div class="prenatal-quick-info__header">
					<img src="<?php echo esc_url( $image . 'icons/duration.svg' ); ?>" alt="" aria-hidden="true" width="22" height="24" />
					<h3>Thời lượng</h3>
				</div>
				<p>01 buổi · 03 giờ (Offline)</p>
			</div>
			<div class="prenatal-quick-info__item">
				<div class="prenatal-quick-info__header">
					<img src="<?php echo esc_url( $image . 'icons/participants.svg' ); ?>" alt="" aria-hidden="true" width="22" height="24" />
					<h3>Số lượng tham gia</h3>
				</div>
				<p>Tối đa 05 cặp bố mẹ/ dưới 10 người</p>
			</div>
			<div class="prenatal-quick-info__item">
				<div class="prenatal-quick-info__header">
					<img src="<?php echo esc_url( $image . 'icons/schedule.svg' ); ?>" alt="" aria-hidden="true" width="22" height="24" />
					<h3>Thời gian</h3>
				</div>
				<p>9h00 – 12h00 (Sáng thứ 7 hàng tuần)</p>
			</div>
			<div class="prenatal-quick-info__item">
				<div class="prenatal-quick-info__header">
					<img src="<?php echo esc_url( $image . 'icons/map.svg' ); ?>" alt="" aria-hidden="true" width="22" height="24" />
					<h3>Địa điểm</h3>
				</div>
				<p>Trung tâm ở cữ -  Vạn Phúc Care</p>
			</div>
		</div>
	</div>
</section>

<section class="vpc-section prenatal-intro" aria-labelledby="prenatal-intro-title">
	<div class="prenatal-container">
		<div class="prenatal-intro__content">
			<div class="prenatal-intro__photo">
				<picture>
					<source media="(max-width: 639px)" srcset="<?php echo esc_url( $image . 'intro-class-actual.png' ); ?>" />
					<img src="<?php echo esc_url( $image . 'intro-family.png' ); ?>" alt="Bố mẹ tham gia lớp học cùng con" />
				</picture>
			</div>
			<div class="prenatal-intro__copy">
				<div class="prenatal-badge">
					<img class="prenatal-badge__icon" src="<?php echo esc_url( $image . 'icons/star-light.svg' ); ?>" alt="" aria-hidden="true" width="24" height="24" />
					<span>MỘT KHỞI ĐẦU VỮNG VÀNG</span>
				</div>
				<h2 id="prenatal-intro-title" class="prenatal-title">
					<span>Yêu Thương Là Bản Năng</span>
					<em>Chăm Con Là Kỹ Năng</em>
				</h2>
				<p>Ngày con chào đời là khởi đầu của một hành trình thiêng liêng. Bên cạnh tình yêu thương, cha mẹ còn cần những kiến thức đúng và kỹ năng thực tế để tự tin chăm sóc con yêu.</p>
				<p>Lớp học tiền sản tại trung tâm ở cữ Vạn Phúc Care được hình thành với sứ mệnh giúp cha mẹ thực sự thấu hiểu nhu cầu của trẻ, biết khi nào cần can thiệp, khi nào nên kiên nhẫn — và cùng nhau chuẩn bị cho những ngày đầu đón bé.</p>
			</div>
		</div>
		<div class="prenatal-feature-grid">
			<article>
				<div class="prenatal-feature-icon">
					<img src="<?php echo esc_url( $image . 'icons/professional.svg' ); ?>" alt="" aria-hidden="true" width="24" height="24" />
				</div>
				<h3>Chuyên môn vững vàng</h3>
				<p>Đồng hành cùng điều dưỡng trưởng Thanh Thủy và đội ngũ giàu kinh nghiệm</p>
			</article>
			<article>
				<div class="prenatal-feature-icon">
					<img src="<?php echo esc_url( $image . 'icons/monitoring.svg' ); ?>" alt="" aria-hidden="true" width="24" height="24" />
				</div>
				<h3>Thực hành chuẩn y khoa</h3>
				<p>Trực tiếp thực hành trên mô hình búp bê y tế, đồng thời được hướng dẫn sát sao 1:1</p>
			</article>
			<article>
				<div class="prenatal-feature-icon">
					<img src="<?php echo esc_url( $image . 'icons/companionship.svg' ); ?>" alt="" aria-hidden="true" width="24" height="24" />
				</div>
				<h3>Bố mẹ cùng đồng hành</h3>
				<p>Bố tự tin chăm sóc con và san sẻ cùng mẹ ngay từ những ngày đầu sau sinh</p>
			</article>
			<article>
				<div class="prenatal-feature-icon">
					<img src="<?php echo esc_url( $image . 'icons/materials.svg' ); ?>" alt="" aria-hidden="true" width="24" height="24" />
				</div>
				<h3>Dễ hiểu, dễ áp dụng</h3>
				<p>Kiến thức khoa học được chuyển thành những kỹ năng gần gũi và thực tế</p>
			</article>
		</div>
	</div>
</section>

<?php if ( $show_prenatal_video ) : ?>
<section class="vpc-section prenatal-video" aria-labelledby="prenatal-video-title">
	<div class="prenatal-container prenatal-center">
		<h2 id="prenatal-video-title">Từ Bỡ Ngỡ Đến Tự Tin Chăm Con</h2>
		<p class="prenatal-lead">Bố mẹ cùng học, cùng thực hành — với sự hướng dẫn trực tiếp của điều dưỡng.</p>
		<a class="prenatal-video__frame" href="#prenatal-registration" aria-label="Đăng ký tư vấn lớp học">
			<img src="<?php echo esc_url( $image . 'class-video.png' ); ?>" alt="Không khí thực hành trong lớp học tiền sản" />
			<span class="prenatal-play" aria-hidden="true">▶</span>
		</a>
		<div class="prenatal-video__cta">
			<h3>Sẵn sàng cùng nhau đón bé?</h3>
			<p>Để lại thông tin để được tư vấn buổi học phù hợp với gia đình.</p>
		</div>
		<a class="prenatal-button prenatal-button--primary prenatal-button--large" href="#prenatal-registration">Tư vấn lớp học</a>
	</div>
</section>
<?php endif; ?>

<section class="vpc-section prenatal-benefits" aria-label="Đối tượng và quyền lợi">
	<div class="prenatal-container">
		<div class="prenatal-benefit-group">
			<div class="prenatal-section-heading">
				<div class="prenatal-badge">
					<img class="prenatal-badge__icon" src="<?php echo esc_url( $image . 'icons/star-light.svg' ); ?>" alt="" aria-hidden="true" width="24" height="24" />
					<span>LỚP HỌC DÀNH CHO AI?</span>
				</div>
				<h2>Bố Mẹ Nào Nên <span class="whitespace-nowrap">Tham&nbsp;Gia?</span></h2>
			</div>
			<div class="prenatal-benefit-grid">
				<article>
					<div class="prenatal-benefit-icon">
						<img src="<?php echo esc_url( $image . 'icons/week-20.svg' ); ?>" alt="" aria-hidden="true" width="24" height="24" />
					</div>
					<h3>Mẹ từ tuần thai thứ 20</h3>
					<p>Giai đoạn sức khỏe mẹ đã ổn định, thuận tiện để học và thực hành các kỹ thuật</p>
				</article>
				<article>
					<div class="prenatal-benefit-icon">
						<img src="<?php echo esc_url( $image . 'icons/first-child.svg' ); ?>" alt="" aria-hidden="true" width="24" height="24" />
					</div>
					<h3>Gia đình đón con đầu lòng</h3>
					<p>Còn nhiều bỡ ngỡ, muốn được hướng dẫn từng bước dễ tự tin khi con chào đời.</p>
				</article>
				<article>
					<div class="prenatal-benefit-icon">
						<img src="<?php echo esc_url( $image . 'icons/new-knowledge.svg' ); ?>" alt="" aria-hidden="true" width="24" height="24" />
					</div>
					<h3>Mẹ bầu muốn tiếp cận kiến thức mới</h3>
					<p>Mẹ sinh bé thứ 2 hoặc 3, muốn cập nhật thêm kiến thức và kỹ năng chăm sóc bản thân và trẻ sơ sinh theo phương pháp hiện đại.</p>
				</article>
				<article>
					<div class="prenatal-benefit-icon">
						<img src="<?php echo esc_url( $image . 'icons/pregnancy-health.svg' ); ?>" alt="" aria-hidden="true" width="24" height="24" />
					</div>
					<h3>Mẹ quan tâm sức khỏe thai kỳ</h3>
					<p>Mong muốn lắng nghe những chia sẻ về tiền sản giật, dinh dưỡng thai kỳ và nuôi con bằng sữa mẹ.</p>
				</article>
			</div>
		</div>
		<div class="prenatal-benefit-group">
			<div class="prenatal-section-heading">
				<div class="prenatal-badge">
					<img class="prenatal-badge__icon" src="<?php echo esc_url( $image . 'icons/star-light.svg' ); ?>" alt="" aria-hidden="true" width="24" height="24" />
					<span>LỢI ÍCH &amp; GIÁ TRỊ THỰC TẾ</span>
				</div>
				<h2>Bố Mẹ Nhận Được Gì Sau <span class="whitespace-nowrap">Buổi&nbsp;Học?</span></h2>
			</div>
			<div class="prenatal-benefit-grid">
				<article>
					<div class="prenatal-benefit-icon">
						<img src="<?php echo esc_url( $image . 'icons/baby-signals.svg' ); ?>" alt="" aria-hidden="true" width="24" height="24" />
					</div>
					<h3>Đọc vị tín hiệu của con</h3>
					<p>Tự tin nhận biết nhu cầu của bé, biết khi nào cần can thiệp và khi nào nên kiên nhẫn.</p>
				</article>
				<article>
					<div class="prenatal-benefit-icon">
						<img src="<?php echo esc_url( $image . 'icons/dad-support.svg' ); ?>" alt="" aria-hidden="true" width="24" height="24" />
					</div>
					<h3>Bố biết chăm bé, đỡ đần mẹ</h3>
					<p>Bố tự tin, có khả năng trực tiếp thực hành các thao tác chăm sóc trẻ sơ sinh, san sẻ cùng mẹ ngay từ những ngày đầu.</p>
				</article>
				<article>
					<div class="prenatal-benefit-icon">
						<img src="<?php echo esc_url( $image . 'icons/materials-return.svg' ); ?>" alt="" aria-hidden="true" width="24" height="24" />
					</div>
					<h3>Tài liệu mang về</h3>
					<p>Tài liệu chuyên môn hoặc khóa học trực tuyến. Tổng hợp lại kiến thức giúp cha mẹ nhớ lâu, dễ dàng thực hành</p>
				</article>
				<article>
					<div class="prenatal-benefit-icon">
						<img src="<?php echo esc_url( $image . 'icons/personalized-qa.svg' ); ?>" alt="" aria-hidden="true" width="24" height="24" />
					</div>
					<h3>Giải đáp cá nhân hóa</h3>
					<p>Cha mẹ được chủ động đặt câu hỏi, giải đáp từng băn khoăn riêng và tháo gỡ các thói quen chăm con thiếu khoa học.</p>
				</article>
			</div>
		</div>
	</div>
</section>

<section id="prenatal-program" class="vpc-section prenatal-program" aria-labelledby="prenatal-program-title">
	<div class="prenatal-container prenatal-center">
		<div class="prenatal-badge">
			<img class="prenatal-badge__icon" src="<?php echo esc_url( $image . 'icons/star-light.svg' ); ?>" alt="" aria-hidden="true" width="24" height="24" />
			<span>01 BUỔI · 03 GIỜ · 08 NỘI DUNG</span>
		</div>
		<h2 id="prenatal-program-title">Nội Dung Lớp Học <span class="whitespace-nowrap">Tiền&nbsp;Sản</span></h2>
		<p class="prenatal-lead">Từ chăm sóc thai kỳ đến những thao tác chăm bé đầu tiên.<br>Lý thuyết tinh gọn kết hợp thực hành; đan xen các phiên Q&amp;A cá nhân hóa 1:1, thực hành trực tiếp, giải đáp đến từng băn khoăn.</p>
		<div class="prenatal-tabs" role="tablist" aria-label="Nội dung chương trình">
			<button class="is-active" type="button">Phần 1 - Sức khỏe thai kỳ</button>
			<button type="button">Phần 2 - Nuôi con bằng sữa mẹ</button>
			<button type="button">Phần 3 - Thực hành chăm sóc</button>
		</div>
		<div class="prenatal-step-grid">
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
		<p class="prenatal-note">Đan xen các phiên hỏi đáp cá nhân hóa cùng điều dưỡng, ngay tại lớp</p>
		<a class="prenatal-button prenatal-button--primary" href="#prenatal-registration">Đăng ký ngay</a>
	</div>
</section>

<section class="vpc-section prenatal-teacher" aria-labelledby="prenatal-teacher-title">
	<div class="prenatal-container prenatal-teacher__layout">
		<div class="prenatal-teacher__photo">
			<img class="prenatal-teacher__bg" src="<?php echo esc_url( $image . 'teacher-background.png' ); ?>" alt="" />
			<img class="prenatal-teacher__portrait" src="<?php echo esc_url( $image . 'teacher-thanh-thuy.png' ); ?>" alt="Điều dưỡng trưởng Thanh Thủy" />
		</div>
		<div class="prenatal-teacher__copy">
			<div class="prenatal-badge">
				<img class="prenatal-badge__icon" src="<?php echo esc_url( $image . 'icons/star-light.svg' ); ?>" alt="" aria-hidden="true" width="24" height="24" />
				<span>NGƯỜI BẠN ĐỒNG HÀNH CÙNG MỌI GIA ĐÌNH</span>
			</div>
			<h2 id="prenatal-teacher-title" class="prenatal-title">
				<span>Điều Dưỡng Trưởng</span>
				<em>Thanh Thủy</em>
			</h2>
			<div class="prenatal-teacher__intro">
				<p class="prenatal-teacher__handle">@methuylamy</p>
				<p class="prenatal-teacher__workplace">Trung tâm ở cữ Vạn Phúc Care</p>
				<p>Điều dưỡng trưởng Thanh Thủy trực tiếp thiết kế và giảng dạy chương trình, đưa những kiến thức y khoa trở nên gần gũi, dễ hiểu - để mỗi bố mẹ đều có thể tự tin áp dụng khi con chào đời.</p>
			</div>
			<ul class="prenatal-teacher__checklist">
				<li><span>Hướng dẫn thực hành trực tiếp, chỉnh sửa từng thao tác</span></li>
				<li><span>Giải đáp những lo lắng riêng của mỗi gia đình</span></li>
				<li><span>Đội ngũ điều dưỡng hỗ trợ 1:1 trong suốt buổi học</span></li>
			</ul>
			<a class="prenatal-button prenatal-button--primary" href="#prenatal-registration">Giới thiệu giảng viên</a>
		</div>
	</div>
</section>

<section id="prenatal-registration" class="vpc-section prenatal-registration" aria-labelledby="prenatal-registration-title">
	<div class="prenatal-container prenatal-registration__layout">
		<div class="prenatal-registration__intro">
			<div class="prenatal-badge">
				<img class="prenatal-badge__icon" src="<?php echo esc_url( $image . 'icons/star-light.svg' ); ?>" alt="" aria-hidden="true" width="24" height="24" />
				<span>HẸN GẶP BỐ MẸ TẠI LỚP</span>
			</div>
			<h2>Cùng chuẩn bị cho<br>ngày con chào đời</h2>
			<p>Một buổi học dành riêng cho bố mẹ, với không gian gần gũi và sự đồng hành tận tâm từ đội ngũ điều dưỡng.</p>
			<div class="prenatal-info-card">
				<div class="prenatal-info-card__icon">
					<img src="<?php echo esc_url( $image . 'icons/duration.svg' ); ?>" alt="" aria-hidden="true" width="24" height="24" />
				</div>
				<div class="prenatal-info-card__text">
					<b>Sáng cuối tuần · 09:00 – 12:00</b>
					<small>Liên hệ để xác nhận lịch học gần nhất</small>
				</div>
			</div>
			<div class="prenatal-info-card">
				<div class="prenatal-info-card__icon">
					<img src="<?php echo esc_url( $image . 'icons/participants.svg' ); ?>" alt="" aria-hidden="true" width="24" height="24" />
				</div>
				<div class="prenatal-info-card__text">
					<b>Tối đa 05 cặp cha mẹ/ buổi</b>
					<small>Bố tham gia cùng mẹ không phát sinh phụ phí</small>
				</div>
			</div>
			<div class="prenatal-info-card">
				<div class="prenatal-info-card__icon">
					<img src="<?php echo esc_url( $image . 'icons/map.svg' ); ?>" alt="" aria-hidden="true" width="24" height="24" />
				</div>
				<div class="prenatal-info-card__text">
					<b>Tầng 1 - Trung tâm ở cữ Vạn Phúc Care</b>
					<small>35B ngõ 399 Âu Cơ, Tây Hồ, Hà Nội <a href="https://maps.google.com/?q=35B+ngõ+399+Âu+Cơ+Tây+Hồ+Hà+Nội" target="_blank" rel="noopener noreferrer" class="text-primary-500 hover:underline">Xem đường đi</a></small>
				</div>
			</div>
		</div>
		<div class="prenatal-form-wrap">
			<h2 id="prenatal-registration-title">Đăng Ký Tham Gia <span class="whitespace-nowrap">Lớp&nbsp;Học</span></h2>
			<form id="vpc-prenatal-form" class="prenatal-form" action="#" method="post">
				<input type="text" name="website" value="" tabindex="-1" autocomplete="off" aria-hidden="true" class="hidden" />
				<input type="hidden" name="service" value="lop-hoc-tien-san" />
				<div class="prenatal-form__field">
					<label for="prenatal-name"><em>*</em> Họ và tên</label>
					<input id="prenatal-name" name="full_name" required placeholder="Nguyễn Như Linh" />
				</div>
				<div class="prenatal-form__field">
					<label for="prenatal-phone"><em>*</em> Số điện thoại</label>
					<input id="prenatal-phone" name="phone" required type="tel" placeholder="0345678***" />
				</div>
				<div class="prenatal-form__field">
					<fieldset>
						<legend><em>*</em> Giai đoạn thai kỳ</legend>
						<div class="prenatal-chips">
							<label class="prenatal-chip is-active">
								<input type="radio" name="gestational_age" value="13-27-tuan" checked class="sr-only" />
								<span>Đang mang thai</span>
							</label>
							<label class="prenatal-chip">
								<input type="radio" name="gestational_age" value="chua-mang-thai" class="sr-only" />
								<span>Chuẩn bị mang thai</span>
							</label>
							<label class="prenatal-chip">
								<input type="radio" name="gestational_age" value="da-sinh-be" class="sr-only" />
								<span>Đã sinh bé</span>
							</label>
						</div>
					</fieldset>
				</div>
				<div class="prenatal-form__field">
					<label for="prenatal-service-select"><em>*</em> Dịch vụ quan tâm</label>
					<div class="prenatal-select-wrap">
						<select id="prenatal-service-select" name="service_choice">
							<option value="lop-hoc-tien-san" selected>Lớp học tiền sản</option>
							<option value="trung-tam-o-cu">Trung tâm ở cữ</option>
							<option value="bao-mau-tai-nha">Bảo mẫu tại nhà</option>
							<option value="nuoi-con-easy">Tư vấn nuôi con EASY</option>
							<option value="khoa-hoc-truc-tuyen">Khóa học trực tuyến</option>
						</select>
					</div>
				</div>
				<div class="prenatal-form__field">
					<label for="prenatal-stage-select"><em>*</em> Tuần thai</label>
					<div class="prenatal-select-wrap">
						<select id="prenatal-stage-select" name="stage_choice">
							<option value="" disabled selected>Chọn giai đoạn</option>
							<option value="duoi-12-tuan">Dưới 12 tuần</option>
							<option value="13-27-tuan">13 - 27 tuần</option>
							<option value="tu-28-tuan">Từ 28 tuần trở lên</option>
						</select>
					</div>
				</div>
				<div class="prenatal-form__field">
					<label for="prenatal-note">Ghi chú</label>
					<textarea id="prenatal-note" name="question" rows="3" placeholder="Cho chúng tôi biết thêm về nhu cầu của bạn!"></textarea>
				</div>
				<button class="prenatal-button prenatal-button--primary" type="submit">Gửi yêu cầu tư vấn</button>
			</form>
		</div>
	</div>
</section>

<section class="vpc-section prenatal-faq" aria-labelledby="prenatal-faq-title">
	<div class="prenatal-container">
		<div class="prenatal-section-heading">
			<h2 id="prenatal-faq-title">Những Điều Bố Mẹ <span class="whitespace-nowrap">Muốn&nbsp;Biết</span></h2>
			<div class="prenatal-badge">
				<img class="prenatal-badge__icon" src="<?php echo esc_url( $image . 'icons/star-light.svg' ); ?>" alt="" aria-hidden="true" width="24" height="24" />
				<span>GIẢI ĐÁP CÙNG BỐ MẸ</span>
			</div>
		</div>
		<div class="prenatal-accordion">
			<details open>
				<summary>Bố có được đi học cùng mẹ không? Chi phí có tính thêm cho người đi cùng không?</summary>
				<p>Lớp học rất khuyến khích cả bố và mẹ cùng tham gia, hoặc người thân trực tiếp hỗ trợ chăm bé sau sinh. Cha mẹ tham gia cùng nhau không phát sinh thêm phụ phí.</p>
			</details>
			<details>
				<summary>Tham gia lớp học cần chuẩn bị trước những gì?</summary>
				<p>Bố mẹ chỉ cần chuẩn bị tâm thế thoải mái và sẵn sàng cùng nhau học hỏi. Mọi học liệu, tài liệu và mô hình thực hành đều đã được trung tâm chuẩn bị sẵn sàng.</p>
			</details>
			<details>
				<summary>Mẹ bầu ở tuần thai nào thì nên bắt đầu tham gia lớp học?</summary>
				<p>Lớp phù hợp nhất từ tuần thai thứ 20 trở đi, khi bố mẹ đã có thời gian chuẩn bị cho ngày đón bé.</p>
			</details>
			<details>
				<summary>Lớp học tổ chức vào thời gian nào và có giới hạn số lượng học viên không?</summary>
				<p>Lớp diễn ra vào sáng cuối tuần từ 09:00 đến 12:00, giới hạn tối đa 05 cặp bố mẹ mỗi buổi để đảm bảo hướng dẫn sát sao 1:1.</p>
			</details>
			<details>
				<summary>Sau khi học xong nếu về nhà quên thao tác hoặc gặp vấn đề khi sinh bé thì có được hỗ trợ không?</summary>
				<p>Đội ngũ điều dưỡng Vạn Phúc Care tiếp tục đồng hành và giải đáp thắc mắc của bố mẹ sau buổi học qua nhóm hỗ trợ riêng.</p>
			</details>
		</div>
	</div>
</section>

<section class="vpc-section prenatal-services" aria-labelledby="prenatal-services-title">
	<div class="prenatal-container prenatal-center">
		<h2 id="prenatal-services-title">Các Dịch Vụ Khác</h2>
		<div class="prenatal-services__grid">
			<a href="<?php echo esc_url( home_url( '/#bao-mau-tai-nha' ) ); ?>">
				<img src="<?php echo esc_url( $image . 'service-newborn.png' ); ?>" alt="Bảo mẫu tại nhà" />
				<span>Bảo Mẫu Tại Nhà</span>
			</a>
			<a href="<?php echo esc_url( home_url( '/#khoa-hoc-truc-tuyen' ) ); ?>">
				<img src="<?php echo esc_url( $image . 'service-massage.png' ); ?>" alt="Tư vấn nuôi con EASY" />
				<span>Tư Vấn Nuôi Con EASY</span>
			</a>
			<a href="<?php echo esc_url( home_url( '/#trung-tam-o-cu' ) ); ?>">
				<img src="<?php echo esc_url( $image . 'service-online-course.png' ); ?>" alt="Khóa học trực tuyến" />
				<span>Khóa Học Trực Tuyến</span>
			</a>
		</div>
	</div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function () {
	// Tabs switching for prenatal program
	const tabs = document.querySelectorAll('.prenatal-tabs button');
	if (tabs.length) {
		tabs.forEach(tab => {
			tab.addEventListener('click', function () {
				tabs.forEach(t => t.classList.remove('is-active'));
				this.classList.add('is-active');
			});
		});
	}

	// Radio chips selection for gestational age
	const chips = document.querySelectorAll('.prenatal-chip');
	if (chips.length) {
		chips.forEach(chip => {
			chip.addEventListener('click', function () {
				chips.forEach(c => c.classList.remove('is-active'));
				this.classList.add('is-active');
				const radio = this.querySelector('input[type="radio"]');
				if (radio) radio.checked = true;
			});
		});
	}
});
</script>

<?php get_footer(); ?>
