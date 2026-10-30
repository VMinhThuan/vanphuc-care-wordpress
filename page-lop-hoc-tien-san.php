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
$map_url   = 'https://www.google.com/maps/place/V%E1%BA%A1n+Ph%C3%BAc+Care/@21.0741276,105.8221623,1041m/data=!3m2!1e3!4b1!4m6!3m5!1s0x3135ab83e4098b37:0xb1b8897775e1ce60!8m2!3d21.0741276!4d105.8221623!16s%2Fg%2F11q2y0_pyw?entry=ttu&g_ep=EgoyMDI2MTAyMC4wIKXMDSoASAFQAw%3D%3D';

// The supplied desktop and mobile Figma frames both include this section.
$show_prenatal_video = true;
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
				<em>Đọc Vị Nhu Cầu <span class="whitespace-nowrap">Của&nbsp;Trẻ</span></em>
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
		<div class="prenatal-badge">
			<img class="prenatal-badge__icon" src="<?php echo esc_url( $image . 'icons/star-light.svg' ); ?>" alt="" aria-hidden="true" width="24" height="24" />
			<span>MỘT GÓC LỚP HỌC TIỀN SẢN</span>
		</div>
		<h2 id="prenatal-video-title">Từ Bỡ Ngỡ Đến Tự Tin Chăm Con</h2>
		<p class="prenatal-lead">Bố mẹ cùng học, cùng thực hành — với sự hướng dẫn trực tiếp của điều dưỡng.</p>
		<a class="prenatal-video__frame" href="#prenatal-registration" aria-label="Đăng ký tư vấn lớp học">
			<img src="<?php echo esc_url( $image . 'class-video.png' ); ?>" alt="Không khí thực hành trong lớp học tiền sản" />
			<span class="prenatal-play" aria-hidden="true">
				<img class="prenatal-play__circle" src="<?php echo esc_url( $image . 'icons/video-play-circle.svg' ); ?>" alt="" width="86" height="86" />
				<img class="prenatal-play__triangle" src="<?php echo esc_url( $image . 'icons/video-play-triangle.svg' ); ?>" alt="" width="35.0565" height="26.3377" />
			</span>
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

<section class="vpc-section prenatal-teacher" aria-labelledby="prenatal-teacher-title">
	<div class="prenatal-container prenatal-teacher__layout">
		<div class="prenatal-teacher__photo">
			<img class="prenatal-teacher__card-img" src="<?php echo esc_url( $image . 'teacher-thanh-thuy-card.png' ); ?>" srcset="<?php echo esc_url( $image . 'teacher-thanh-thuy-card@2x.png' ); ?> 2x" alt="Điều dưỡng trưởng Thanh Thủy bế em bé" width="540" height="600" />
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
				<p class="prenatal-teacher__meta">@methuylamy · Trung tâm ở cữ Vạn Phúc Care</p>
				<p>Điều dưỡng trưởng Thanh Thủy trực tiếp thiết kế và giảng dạy chương trình, đưa những kiến thức y khoa trở nên gần gũi, dễ hiểu — để mỗi bố mẹ đều có thể tự tin áp dụng khi con chào đời.</p>
			</div>
			<ul class="prenatal-teacher__checklist">
				<li><img class="prenatal-check-icon" src="<?php echo esc_url( $image . 'icons/check-badge.svg' ); ?>" alt="" aria-hidden="true" width="24" height="24" /><span>Hướng dẫn thực hành trực tiếp, chỉnh sửa từng thao tác</span></li>
				<li><img class="prenatal-check-icon" src="<?php echo esc_url( $image . 'icons/check-badge.svg' ); ?>" alt="" aria-hidden="true" width="24" height="24" /><span>Giải đáp những lo lắng riêng của mỗi gia đình</span></li>
				<li><img class="prenatal-check-icon" src="<?php echo esc_url( $image . 'icons/check-badge.svg' ); ?>" alt="" aria-hidden="true" width="24" height="24" /><span>Đội ngũ điều dưỡng hỗ trợ 1:1 trong suốt buổi học</span></li>
			</ul>
			<a class="prenatal-button prenatal-button--primary" href="https://methuylamy.vn/" target="_blank" rel="noopener noreferrer">Giới thiệu giảng viên</a>
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
			<div class="prenatal-registration__copy">
				<h2 class="prenatal-registration__title">Cùng chuẩn bị cho<br>ngày con chào đời</h2>
				<p>Một buổi học dành riêng cho bố mẹ, với không gian gần gũi và sự đồng hành tận tâm từ đội ngũ điều dưỡng.</p>
			</div>
			<div class="prenatal-registration__info">
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
					<small>
						<span>35B ngõ 399 Âu Cơ, Tây Hồ, Hà Nội</span><br aria-hidden="true" />
						<a href="<?php echo esc_url( $map_url ); ?>" target="_blank" rel="noopener noreferrer" class="prenatal-info-card__map-link">Xem đường đi</a>
					</small>
				</div>
			</div>
			</div>
		</div>
		<div class="prenatal-form-wrap">
			<h2 id="prenatal-registration-title">Đăng Ký Tham Gia <span class="whitespace-nowrap">Lớp&nbsp;Học</span></h2>
			<form id="vpc-prenatal-form" class="prenatal-form" action="#" method="post">
				<input type="text" name="website" value="" tabindex="-1" autocomplete="off" aria-hidden="true" class="hidden" />
				<input type="hidden" name="service" value="lop-hoc-tien-san" />
				<div class="prenatal-form__row">
					<div class="prenatal-form__field">
						<label for="prenatal-name"><em>*</em> Họ và tên</label>
						<input id="prenatal-name" name="full_name" required placeholder="Nguyễn Như Linh" />
					</div>
					<div class="prenatal-form__field">
						<label for="prenatal-phone"><em>*</em> Số điện thoại</label>
						<input id="prenatal-phone" name="phone" required type="tel" placeholder="0345678***" />
					</div>
				</div>
				<div class="prenatal-form__field">
					<fieldset>
						<legend><em>*</em> Giai đoạn thai kỳ</legend>
						<div class="prenatal-chips">
							<label class="prenatal-chip is-active">
								<input type="radio" name="gestational_age" value="dang-mang-thai" checked class="sr-only" />
								<span>Đang mang thai</span>
							</label>
							<label class="prenatal-chip">
								<input type="radio" name="gestational_age" value="chuan-bi-mang-thai" class="sr-only" />
								<span>Chuẩn bị mang thai</span>
							</label>
						</div>
					</fieldset>
				</div>
				<div class="prenatal-form__field">
					<label for="prenatal-stage-select"><em>*</em> Tuần thai</label>
					<div class="prenatal-select-wrap">
						<select id="prenatal-stage-select" name="stage_choice" required>
							<option value="" disabled selected>Chọn giai đoạn</option>
							<option value="duoi-12-tuan">Dưới 12 tuần</option>
							<option value="13-27-tuan">13 - 27 tuần</option>
							<option value="tu-28-tuan">Từ 28 tuần trở lên</option>
						</select>
					</div>
				</div>
				<div class="prenatal-form__field">
					<label for="prenatal-note">Ghi chú</label>
					<textarea id="prenatal-note" name="question" rows="2" placeholder="Cho chúng tôi biết thêm về nhu cầu của bạn!"></textarea>
				</div>
				<button class="prenatal-button prenatal-button--primary" type="submit">Gửi yêu cầu tư vấn</button>
			</form>
		</div>
	</div>
</section>

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
	const panels = document.querySelectorAll('.prenatal-step-grid');
	if (tabs.length && panels.length) {
		tabs.forEach(tab => {
			tab.addEventListener('click', function () {
				const targetId = this.getAttribute('data-target');
				tabs.forEach(t => {
					t.classList.remove('is-active');
					t.setAttribute('aria-selected', 'false');
				});
				this.classList.add('is-active');
				this.setAttribute('aria-selected', 'true');

				panels.forEach(panel => {
					if (panel.id === targetId) {
						panel.classList.add('is-active');
						panel.removeAttribute('hidden');
					} else {
						panel.classList.remove('is-active');
						panel.setAttribute('hidden', '');
					}
				});
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

	// Custom dropdowns retain their native selects for form submission.
	const selectWraps = document.querySelectorAll('.prenatal-select-wrap');
	const closeSelects = () => selectWraps.forEach(wrap => {
		wrap.classList.remove('is-open');
		const trigger = wrap.querySelector('.prenatal-select__trigger');
		if (trigger) trigger.setAttribute('aria-expanded', 'false');
		const menu = wrap.querySelector('.prenatal-select__menu');
		if (menu) menu.hidden = true;
	});
	selectWraps.forEach(wrap => {
		const select = wrap.querySelector('select');
		if (!select) return;

		wrap.classList.add('is-enhanced');
		select.classList.add('prenatal-select__native');
		const trigger = document.createElement('button');
		trigger.type = 'button';
		trigger.className = 'prenatal-select__trigger';
		trigger.setAttribute('aria-haspopup', 'listbox');
		trigger.setAttribute('aria-expanded', 'false');
		const menu = document.createElement('div');
		menu.className = 'prenatal-select__menu';
		menu.setAttribute('role', 'listbox');
		menu.hidden = true;
		const menuId = `${select.id}-options`;
		menu.id = menuId;
		trigger.setAttribute('aria-controls', menuId);

		const sync = () => {
			const option = select.options[select.selectedIndex];
			trigger.textContent = option ? option.text : '';
			trigger.classList.toggle('is-placeholder', !select.value);
			menu.querySelectorAll('.prenatal-select__option').forEach(button => {
				button.classList.toggle('is-selected', button.value === select.value);
				button.setAttribute('aria-selected', button.value === select.value ? 'true' : 'false');
			});
		};

		Array.from(select.options).forEach(option => {
			if (option.disabled) return;
			const button = document.createElement('button');
			button.type = 'button';
			button.className = 'prenatal-select__option';
			button.value = option.value;
			button.setAttribute('role', 'option');
			button.textContent = option.text;
			button.addEventListener('click', () => {
				select.value = option.value;
				select.dispatchEvent(new Event('change', { bubbles: true }));
				sync();
				menu.hidden = true;
				closeSelects();
				trigger.focus();
			});
			menu.appendChild(button);
		});

		trigger.addEventListener('click', () => {
			const willOpen = !wrap.classList.contains('is-open');
			closeSelects();
			wrap.classList.toggle('is-open', willOpen);
			menu.hidden = !willOpen;
			trigger.setAttribute('aria-expanded', willOpen ? 'true' : 'false');
		});
		trigger.addEventListener('keydown', event => {
			if (event.key === 'ArrowDown' || event.key === 'ArrowUp') {
				event.preventDefault();
				trigger.click();
				menu.querySelector('.prenatal-select__option')?.focus();
			}
			if (event.key === 'Escape') closeSelects();
		});
		select.addEventListener('change', sync);
		wrap.append(trigger, menu);
		sync();
	});
	document.addEventListener('click', event => {
		if (!event.target.closest('.prenatal-select-wrap')) closeSelects();
	});
});
</script>

<?php get_footer(); ?>
