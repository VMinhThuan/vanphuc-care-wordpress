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
			<div class="prenatal-badge"><span aria-hidden="true">✦</span>LỚP HỌC TIỀN SẢN</div>
			<h1 id="prenatal-title" class="prenatal-title"><span>Tự Tin Đón Con Yêu</span><em>Đọc Vị Nhu Cầu Của Trẻ</em></h1>
			<p>Chuẩn bị vững vàng cho hành trình làm cha mẹ. Với sự đồng hành cùng điều dưỡng trưởng Thanh Thuỷ, cùng cha mẹ biến kiến thức y khoa thành kỹ năng chăm con thực tế, thấu hiểu nhu cầu của con trẻ bằng tình yêu thương.</p>
			<div class="prenatal-actions">
				<a class="prenatal-button prenatal-button--primary" href="#prenatal-registration">Đăng ký giữ chỗ</a>
				<a class="prenatal-button prenatal-button--secondary" href="#prenatal-program">Khám phá chương trình</a>
			</div>
		</div>
		<img class="prenatal-hero__image" src="<?php echo esc_url( $image . 'hero-mother-baby.png' ); ?>" alt="Mẹ âu yếm chăm sóc bàn chân của em bé" />
		<div class="prenatal-quick-info" aria-label="Thông tin lớp học nhanh">
			<div><b>01 buổi học</b><span>03 giờ thực hành</span></div>
			<div><b>Tối đa 05 cặp</b><span>Hướng dẫn sát sao 1:1</span></div>
			<div><b>Sáng cuối tuần</b><span>09:00 – 12:00</span></div>
			<div><b>Tại Vạn Phúc Care</b><span>35B/399 Âu Cơ, Tây Hồ</span></div>
		</div>
	</div>
</section>

<section class="vpc-section prenatal-intro" aria-labelledby="prenatal-intro-title">
	<div class="prenatal-container">
		<div class="prenatal-intro__content">
			<div class="prenatal-intro__photo"><img src="<?php echo esc_url( $image . 'intro-family.png' ); ?>" alt="Bố mẹ tham gia lớp học cùng con" /></div>
			<div class="prenatal-intro__copy">
				<div class="prenatal-badge"><span aria-hidden="true">✦</span>MỘT KHỞI ĐẦU VỮNG VÀNG</div>
				<h2 id="prenatal-intro-title" class="prenatal-title"><span>Yêu Thương Là Bản Năng</span><em>Chăm Con Là Kỹ Năng</em></h2>
				<p>Ngày con chào đời là khởi đầu của một hành trình thiêng liêng. Bên cạnh tình yêu thương, cha mẹ còn cần những kiến thức đúng và kỹ năng thực tế để tự tin chăm sóc con yêu.</p>
				<p>Lớp học tiền sản tại trung tâm ở cữ Vạn Phúc Care được hình thành với sứ mệnh giúp cha mẹ thực sự thấu hiểu nhu cầu của trẻ, biết khi nào cần can thiệp, khi nào nên kiên nhẫn — và cùng nhau chuẩn bị cho những ngày đầu đón bé.</p>
			</div>
		</div>
		<div class="prenatal-feature-grid">
			<article><i>✦</i><h3>Chuyên môn vững vàng</h3><p>Đồng hành cùng điều dưỡng trưởng Thanh Thủy và đội ngũ giàu kinh nghiệm.</p></article>
			<article><i>✓</i><h3>Thực hành chuẩn y khoa</h3><p>Thực hành trên mô hình búp bê y tế, được hướng dẫn sát sao 1:1.</p></article>
			<article><i>♥</i><h3>Bố mẹ cùng đồng hành</h3><p>Bố tự tin chăm sóc con và san sẻ cùng mẹ từ những ngày đầu sau sinh.</p></article>
			<article><i>▤</i><h3>Tài liệu hữu ích</h3><p>Mang về kiến thức tinh gọn, dễ nhớ và áp dụng được mỗi ngày.</p></article>
		</div>
	</div>
</section>

<?php if ( $show_prenatal_video ) : ?>
<section class="vpc-section prenatal-video" aria-labelledby="prenatal-video-title">
	<div class="prenatal-container prenatal-center">
		<div class="prenatal-badge"><span aria-hidden="true">✦</span>MỘT GÓC LỚP HỌC TIỀN SẢN</div>
		<h2 id="prenatal-video-title">Từ Bỡ Ngỡ Đến Tự Tin Chăm Con</h2>
		<p class="prenatal-lead">Bố mẹ cùng học, cùng thực hành — với sự hướng dẫn trực tiếp của điều dưỡng.</p>
		<a class="prenatal-video__frame" href="#prenatal-registration" aria-label="Đăng ký tư vấn lớp học">
			<img src="<?php echo esc_url( $image . 'class-video.png' ); ?>" alt="Không khí thực hành trong lớp học tiền sản" />
			<span class="prenatal-play" aria-hidden="true">▶</span>
		</a>
		<div class="prenatal-video__cta"><h3>Sẵn sàng cùng nhau đón bé?</h3><p>Để lại thông tin để được tư vấn buổi học phù hợp với gia đình.</p></div>
		<a class="prenatal-button prenatal-button--primary prenatal-button--large" href="#prenatal-registration">Tư vấn lớp học</a>
	</div>
</section>
<?php endif; ?>

<section class="vpc-section prenatal-benefits" aria-label="Đối tượng và quyền lợi">
	<div class="prenatal-container">
		<div class="prenatal-benefit-group">
			<div class="prenatal-section-heading"><div class="prenatal-badge"><span aria-hidden="true">✦</span>LỚP HỌC DÀNH CHO AI?</div><h2>Bố Mẹ Nào Nên Tham Gia?</h2></div>
			<div class="prenatal-benefit-grid">
				<article><i>20</i><h3>Mẹ bầu từ tuần 20+</h3><p>Cần chuẩn bị kiến thức, kỹ năng trước khi bé yêu chào đời.</p></article>
				<article><i>1st</i><h3>Lần đầu làm cha mẹ</h3><p>Mong có người đồng hành để chăm bé đúng cách và bình tĩnh hơn.</p></article>
				<article><i>+</i><h3>Muốn cập nhật kiến thức</h3><p>Để chọn lọc thông tin, thực hành đúng và phù hợp với gia đình.</p></article>
				<article><i>♥</i><h3>Quan tâm sức khỏe thai kỳ</h3><p>Muốn hiểu những chuẩn bị cần thiết trước và sau khi sinh.</p></article>
			</div>
		</div>
		<div class="prenatal-benefit-group">
			<div class="prenatal-section-heading"><div class="prenatal-badge"><span aria-hidden="true">✦</span>GIÁ TRỊ NHẬN ĐƯỢC</div><h2>Bố Mẹ Nhận Được Gì Sau Buổi Học?</h2></div>
			<div class="prenatal-benefit-grid">
				<article><i>✓</i><h3>Hiểu tín hiệu của bé</h3><p>Nhận biết nhu cầu ăn, ngủ, khó chịu để phản hồi đúng lúc.</p></article>
				<article><i>☼</i><h3>Thực hành kỹ năng chăm bé</h3><p>Tắm bé, bế bé, quấn khăn và các thao tác căn bản.</p></article>
				<article><i>▤</i><h3>Tài liệu dễ áp dụng</h3><p>Tóm tắt rõ ràng để bố mẹ tự tin thực hành tại nhà.</p></article>
				<article><i>?</i><h3>Hỏi đáp cá nhân hóa</h3><p>Được giải đáp trực tiếp những băn khoăn của riêng gia đình.</p></article>
			</div>
		</div>
	</div>
</section>

<section id="prenatal-program" class="vpc-section prenatal-program" aria-labelledby="prenatal-program-title">
	<div class="prenatal-container prenatal-center">
		<div class="prenatal-badge"><span aria-hidden="true">✦</span>01 BUỔI · 03 GIỜ · 08 NỘI DUNG</div>
		<h2 id="prenatal-program-title">Nội Dung Lớp Học Tiền Sản</h2>
		<p class="prenatal-lead">Từ chăm sóc thai kỳ đến những thao tác chăm bé đầu tiên.<br>Lý thuyết tinh gọn kết hợp thực hành; đan xen các phiên Q&amp;A cá nhân hóa 1:1, thực hành trực tiếp, giải đáp đến từng băn khoăn.</p>
		<div class="prenatal-tabs" role="tablist" aria-label="Nội dung chương trình"><button class="is-active" type="button">Phần 1 - Sức khỏe thai kỳ</button><button type="button">Phần 2 - Nuôi con bằng sữa mẹ</button><button type="button">Phần 3 - Chăm sóc bé sơ sinh</button></div>
		<div class="prenatal-step-grid">
			<article><b>01</b><h3>Chuẩn bị hành trang đón bé</h3><p>Những điều cần biết để mẹ an tâm trong những ngày cuối thai kỳ.</p></article>
			<article><b>02</b><h3>Thực hành chăm bé</h3><p>Làm quen các thao tác chăm sóc cơ bản bằng mô hình trực quan.</p></article>
			<article><b>03</b><h3>Nuôi con bằng yêu thương</h3><p>Đọc vị tín hiệu và xây nền nếp nhẹ nhàng cho bé ngay từ đầu.</p></article>
		</div>
		<p class="prenatal-note">Đan xen các phiên hỏi đáp cá nhân hóa cùng điều dưỡng, ngay tại lớp</p>
		<a class="prenatal-button prenatal-button--primary" href="#prenatal-registration">Đăng ký tư vấn</a>
	</div>
</section>

<section class="vpc-section prenatal-teacher" aria-labelledby="prenatal-teacher-title">
	<div class="prenatal-container prenatal-teacher__layout">
		<div class="prenatal-teacher__photo"><img class="prenatal-teacher__bg" src="<?php echo esc_url( $image . 'teacher-background.png' ); ?>" alt="" /><img class="prenatal-teacher__portrait" src="<?php echo esc_url( $image . 'teacher-thanh-thuy.png' ); ?>" alt="Điều dưỡng trưởng Thanh Thủy" /></div>
		<div class="prenatal-teacher__copy">
			<div class="prenatal-badge"><span aria-hidden="true">✦</span>NGƯỜI BẠN ĐỒNG HÀNH CỦA BỐ MẸ</div>
			<h2 id="prenatal-teacher-title" class="prenatal-title"><span>Điều Dưỡng Trưởng</span><em>Thanh Thủy</em></h2>
			<p><strong>@methuylamy</strong> · Trung tâm ở cữ Vạn Phúc Care<br>Điều dưỡng trưởng Thanh Thủy trực tiếp thiết kế và giảng dạy chương trình, đưa những kiến thức y khoa trở nên gần gũi, dễ hiểu — để mỗi bố mẹ đều có thể tự tin áp dụng khi con chào đời.</p>
			<ul><li>Trực tiếp hướng dẫn và giải đáp tại lớp</li><li>Theo sát từng thao tác thực hành của bố mẹ</li><li>Đồng hành cùng gia đình sau buổi học</li></ul>
			<a class="prenatal-button prenatal-button--primary" href="#prenatal-registration">Khám phá thêm</a>
		</div>
	</div>
</section>

<section id="prenatal-registration" class="vpc-section prenatal-registration" aria-labelledby="prenatal-registration-title">
	<div class="prenatal-container prenatal-registration__layout">
		<div class="prenatal-registration__intro">
			<div class="prenatal-badge"><span aria-hidden="true">✦</span>HẸN GẶP BỐ MẸ TẠI LỚP</div>
			<h2>Cùng chuẩn bị cho<br>ngày con chào đời</h2>
			<p>Một buổi học dành riêng cho bố mẹ, với không gian gần gũi và sự đồng hành tận tâm từ đội ngũ điều dưỡng.</p>
			<div class="prenatal-info-card"><i>◷</i><span><b>Sáng cuối tuần · 09:00 – 12:00</b><small>Liên hệ để xác nhận lịch học gần nhất</small></span></div>
			<div class="prenatal-info-card"><i>♙</i><span><b>Tối đa 05 cặp cha mẹ/ buổi</b><small>Bố tham gia cùng mẹ không phát sinh phụ phí</small></span></div>
			<div class="prenatal-info-card"><i>⌖</i><span><b>Trung tâm ở cữ Vạn Phúc Care</b><small>35B/399 Âu Cơ, phường Tây Hồ, Hà Nội</small></span></div>
		</div>
		<div class="prenatal-form-wrap"><h2 id="prenatal-registration-title">Đăng Ký Tham Gia Lớp Học</h2>
			<form id="vpc-prenatal-form" class="prenatal-form" action="#" method="post">
				<input type="text" name="website" value="" tabindex="-1" autocomplete="off" aria-hidden="true" class="hidden" />
				<input type="hidden" name="service" value="lop-hoc-tien-san" />
				<div><label for="prenatal-name">Họ và tên <em>*</em></label><input id="prenatal-name" name="full_name" required placeholder="Nhập họ và tên" /></div>
				<div><label for="prenatal-phone">Số điện thoại <em>*</em></label><input id="prenatal-phone" name="phone" required type="tel" placeholder="Nhập số điện thoại" /></div>
				<fieldset><legend>Giai đoạn thai kỳ <em>*</em></legend><label><input type="radio" name="gestational_age" value="13-27-tuan" checked /> Đang mang thai</label><label><input type="radio" name="gestational_age" value="chua-mang-thai" /> Chuẩn bị mang thai</label><label><input type="radio" name="gestational_age" value="da-sinh-be" /> Đã sinh bé</label></fieldset>
				<div><label for="prenatal-note">Điều bố mẹ quan tâm</label><textarea id="prenatal-note" name="question" rows="3" placeholder="Cho chúng tôi biết thêm về nhu cầu của bạn!"></textarea></div>
				<button class="prenatal-button prenatal-button--primary" type="submit">Đăng ký giữ chỗ</button>
			</form>
		</div>
	</div>
</section>

<section class="vpc-section prenatal-faq" aria-labelledby="prenatal-faq-title">
	<div class="prenatal-container">
		<div class="prenatal-section-heading"><h2 id="prenatal-faq-title">Những Điều Bố Mẹ Muốn Biết</h2><div class="prenatal-badge"><span aria-hidden="true">✦</span>GIẢI ĐÁP CÙNG BỐ MẸ</div></div>
		<div class="prenatal-accordion">
			<details open><summary>Bố có được đi học cùng mẹ không? Chi phí có tính thêm cho người đi cùng không?</summary><p>Lớp học rất khuyến khích cả bố và mẹ cùng tham gia, hoặc người thân trực tiếp hỗ trợ chăm bé sau sinh. Cha mẹ tham gia cùng nhau không phát sinh thêm phụ phí.</p></details>
			<details><summary>Lớp học phù hợp với mẹ bầu từ tuần bao nhiêu?</summary><p>Lớp phù hợp nhất từ tuần thai thứ 20 trở đi, khi bố mẹ đã có thời gian chuẩn bị cho ngày đón bé.</p></details>
			<details><summary>Buổi học có thực hành trực tiếp không?</summary><p>Có. Bố mẹ sẽ được thực hành những thao tác chăm sóc bé căn bản trên mô hình y tế.</p></details>
			<details><summary>Nếu có băn khoăn riêng thì có được hỏi không?</summary><p>Điều dưỡng dành thời gian hỏi đáp để giải đáp các nhu cầu riêng của từng gia đình.</p></details>
			<details><summary>Học xong có tài liệu để xem lại không?</summary><p>Bố mẹ nhận được tài liệu tóm tắt để dễ dàng thực hành lại tại nhà.</p></details>
		</div>
	</div>
</section>

<section class="vpc-section prenatal-services" aria-labelledby="prenatal-services-title">
	<div class="prenatal-container prenatal-center"><h2 id="prenatal-services-title">Các Dịch Vụ Khác</h2>
		<div class="prenatal-services__grid">
			<a href="<?php echo esc_url( home_url( '/#bao-mau-tai-nha' ) ); ?>"><img src="<?php echo esc_url( $image . 'service-newborn.png' ); ?>" alt="Bảo mẫu tại nhà" /><span>Bảo Mẫu Tại Nhà</span></a>
			<a href="<?php echo esc_url( home_url( '/#khoa-hoc-truc-tuyen' ) ); ?>"><img src="<?php echo esc_url( $image . 'service-massage.png' ); ?>" alt="Tư vấn nuôi con EASY" /><span>Tư Vấn Nuôi Con EASY</span></a>
			<a href="<?php echo esc_url( home_url( '/#trung-tam-o-cu' ) ); ?>"><img src="<?php echo esc_url( $image . 'service-homecare.png' ); ?>" alt="Trung tâm ở cữ" /><span>Trung Tâm Ở Cữ</span></a>
		</div>
	</div>
</section>

<?php get_footer(); ?>
