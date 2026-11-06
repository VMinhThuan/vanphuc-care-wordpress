<?php
/**
 * Page template — Tắm bé sơ sinh tại nhà.
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$bath_uri   = trailingslashit( get_template_directory_uri() ) . 'assets/images/bath';
$shared_uri = trailingslashit( get_template_directory_uri() ) . 'assets/images/easy';

$processes = array(
	array( 'image' => 'process-1.png', 'title' => 'Kiểm tra tổng quan', 'copy' => 'Kiểm tra nhiệt độ, tình trạng cuống rốn, tình trạng da, kẽ tay, kẽ chân, phần phụ.' ),
	array( 'image' => 'process-2.png', 'title' => 'Massage vận động nhẹ', 'copy' => 'Massage body giúp bé thoải mái, xoa dịu căng thẳng. Kết hợp các bài tập vận động, hỗ trợ khả năng phát triển.' ),
	array( 'image' => 'process-3.png', 'title' => 'Tắm bé', 'copy' => 'Kiểm tra nhiệt độ nước, vệ sinh cơ thể bé từ đầu, mặt, cổ, tay chân cho tới cuống rốn và bộ phận sinh dục của bé.' ),
	array( 'image' => 'process-4.png', 'title' => 'Vệ sinh', 'copy' => 'Phần vệ sinh cá nhân cho bé gồm những vùng như tai, mũi, lưỡi. Nhỏ mắt và bôi dầu chàm giữ ấm cơ thể.' ),
	array( 'image' => 'process-5.png', 'title' => 'Vệ sinh vết khâu hoặc vết mổ cho mẹ', 'copy' => 'Kiểm tra tình trạng vết khâu, vết mổ, dây chỉ khi mẹ có nhu cầu cần hỗ trợ.' ),
);

$feedback = array(
	array( 'image' => 'feedback-1.png', 'name' => 'Mẹ bé Kami', 'copy' => 'Mình thực sự thấy quyết định chọn ở cữ ở Vạn Phúc Care là sáng suốt nhất trong hành trình đi đẻ. Phòng hạng có view hồ Tây, rộng rãi, sang trọng và đầy đủ tiện nghi. Trọn vẹn 30 ngày ở cữ rất nhẹ nhàng, 2 mẹ con được chăm sóc sức khỏe chu đáo mỗi ngày và nhàn nhất là không bị áp lực đêm hôm chăm con. Bé Kami trộm vía về nhà vẫn ăn ngoan ngủ ngon.' ),
	array( 'image' => 'feedback-2.png', 'name' => 'Mẹ bé Mandu', 'copy' => 'Mình rất hài lòng với dịch vụ Bảo mẫu tại nhà của Vạn Phúc Care, đặc biệt cảm ơn cô Phương Anh rất nhiều. Cô chăm bé vô cùng cẩn thận và khéo léo. Bé nhà mình được cô rèn theo phương pháp EASY, trộm vía bé khỏe mạnh, ngủ ngoan hơn và có lịch trình sinh hoạt ổn định.' ),
	array( 'image' => 'feedback-3.png', 'name' => 'Mẹ Bé Cát', 'copy' => 'Đánh giá 5 sao cho dịch vụ tại Vạn Phúc Care, đặc biệt là cô Hạnh, cô Nga. Đúng giờ, nhiệt tình và nhẹ nhàng. Trộm vía bé tắm, massage và tập vận động xong ngủ rất ngoan. Cô tương tác với bé khéo cực kỳ.' ),
	array( 'image' => 'feedback-4.png', 'name' => 'Mẹ Trà My – Bé Nghé', 'copy' => 'Mình rất hài lòng với dịch vụ chăm sóc bé tại nhà của Vạn Phúc Care. Đặc biệt là sự chăm sóc khách hàng rất tỉ mỉ, tận tình. Gia đình gửi lời cảm ơn đến cô Thủy với những tư vấn, hỗ trợ tuyệt vời.' ),
	array( 'image' => 'feedback-5.png', 'name' => 'Nguyễn Thị Ngọc Trân', 'copy' => 'Mình cảm thấy thật sự là may mắn khi được biết tới dịch vụ của Vạn Phúc Care. Các cô luôn tận tâm, nhiệt tình, có kinh nghiệm và đồng hành sát sao trong những ngày đầu chăm con.' ),
	array( 'image' => 'feedback-6.png', 'name' => 'Mẹ Sấm Chớp', 'copy' => 'Dành tặng 10 sao cho cô Linh, tận tình chăm sóc Mẹ và 2 bé. Cực kỳ hài lòng với dịch vụ mà chi phí lại hợp lý. Cô Linh chăm sóc bé rất kỹ và yêu trẻ.' ),
	array( 'image' => 'feedback-7.png', 'name' => 'Mẹ Cafe', 'copy' => 'Mình cảm thấy thật sự là may mắn khi được biết tới dịch vụ của Vạn Phúc Care. Nhờ các cô luôn tận tâm, nhiệt tình, có kinh nghiệm mà mình đã nhanh chóng giải quyết được những băn khoăn trong hành trình nuôi con.' ),
	array( 'image' => 'feedback-8.png', 'name' => 'Mẹ Nghé Ọ', 'copy' => 'Sau sinh cơ thể mình rất mệt mỏi, muốn chăm con thật tốt nhưng sức khoẻ không cho phép. Cô Ánh điều dưỡng chăm sóc bé nhà mình rất tốt, con ăn ngon ngủ kỹ, sức khỏe tốt.' ),
);

$other_services = array(
	array( 'image' => 'service-1.jpg', 'title' => 'Trung tâm ở cữ', 'href' => home_url( '/o-cu/' ) ),
	array( 'image' => 'service-2.jpg', 'title' => 'Bảo mẫu tại nhà', 'href' => home_url( '/bao-mau-tai-nha/' ) ),
	array( 'image' => 'service-3.jpg', 'title' => 'Khóa học trực tuyến', 'href' => home_url( '/kien-thuc/' ) ),
	array( 'image' => 'service-4.jpg', 'title' => 'Lớp học tiền sản', 'href' => home_url( '/lop-hoc-tien-san/' ) ),
	array( 'image' => 'service-5.jpg', 'title' => 'Tư vấn nuôi con Easy', 'href' => home_url( '/tu-van-nuoi-con-easy/' ) ),
	array( 'image' => 'service-6.jpg', 'title' => 'Thông tắc tia sữa', 'href' => home_url( '/thong-tac-tia-sua/' ) ),
);

$button_attrs = 'data-open-modal="vpc-consultation-modal" data-service="tam-be-tai-nha"';
?>

<div class="vpc-bath" data-figma-node="3207:38571">
	<section class="vpc-bath__hero" aria-labelledby="bath-title">
		<div class="vpc-bath__container vpc-bath__hero-grid">
			<div class="vpc-bath__hero-copy">
				<div class="vpc-bath__badge"><img src="<?php echo esc_url( $shared_uri . '/star.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true"><span class="vpc-bath__badge-label--desktop">DÀNH CHO BÉ TỪ 0-6 THÁNG TUỔI</span><span class="vpc-bath__badge-label--mobile">DÀNH CHO BÉ TỪ 0-12 THÁNG</span></div>
				<h1 id="bath-title">Tắm Bé Sơ Sinh <span class="vpc-bath__hero-title-mobile-break">Tại Nhà</span></h1>
				<p>Tắm trẻ sơ sinh là một phần quan trọng của quy trình chăm sóc bé hằng ngày. Khi em bé mới chào đời, hệ miễn dịch còn non nớt. Vệ sinh đúng chuẩn là cách tốt nhất để bảo vệ sức khỏe.</p>
				<ul class="vpc-bath__hero-benefits">
					<li><img src="<?php echo esc_url( $shared_uri . '/check-badge.svg' ); ?>" width="24" height="24" alt="">Giúp con ngăn ngừa những bệnh lý do nhiễm khuẩn, ngăn ngừa nhiễm trùng cuống rốn.</li>
					<li><img src="<?php echo esc_url( $shared_uri . '/check-badge.svg' ); ?>" width="24" height="24" alt="">Giải tỏa căng thẳng, xoa dịu cảm giác lo âu của trẻ sơ sinh sau khi tách biệt khỏi cơ thể mẹ.</li>
				</ul>
				<a class="vpc-bath__button vpc-bath__button--primary" href="#bath-packages">Xem gói dịch vụ</a>
			</div>
			<div class="vpc-bath__hero-image"><img src="<?php echo esc_url( $bath_uri . '/hero.jpg' ); ?>" width="600" height="649" alt="Tắm bé sơ sinh tại nhà" fetchpriority="high"></div>
		</div>
	</section>

	<section class="vpc-bath__challenges" aria-labelledby="bath-challenges-title">
		<div class="vpc-bath__container vpc-bath__split-grid">
			<div class="vpc-bath__split-image"><img src="<?php echo esc_url( $bath_uri . '/challenges.png' ); ?>" width="581" height="532" alt="Mẹ chăm sóc em bé sơ sinh" loading="lazy"></div>
			<div class="vpc-bath__split-copy"><div class="vpc-bath__badge"><img src="<?php echo esc_url( $shared_uri . '/star.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true">NỖI LO CỦA MẸ</div><h2 id="bath-challenges-title"><span>Những Điều Khó Khăn</span><em>Mẹ Thường Gặp</em></h2><p>Việc tắm bé tưởng như đơn giản cũng có thể đem đến những khó khăn cho mẹ trong những tuần đầu sau sinh:</p><ul class="vpc-bath__icon-list vpc-bath__icon-list--negative"><li><img src="<?php echo esc_url( $shared_uri . '/x-circle.svg' ); ?>" width="24" height="24" alt="">Mẹ sinh mổ, vết thương chưa lành, chưa thể bế ẵm hay tắm cho bé.</li><li><img src="<?php echo esc_url( $shared_uri . '/x-circle.svg' ); ?>" width="24" height="24" alt="">Trẻ sơ sinh chưa rụng rốn, dễ nhiễm trùng nếu không tắm đúng quy trình.</li><li><img src="<?php echo esc_url( $shared_uri . '/x-circle.svg' ); ?>" width="24" height="24" alt="">Ngồi xổm tắm bé gây áp lực lên khoang chậu và vết mổ chưa phục hồi.</li><li><img src="<?php echo esc_url( $shared_uri . '/x-circle.svg' ); ?>" width="24" height="24" alt=""><span class="vpc-bath__challenge-last-copy">Chưa có kinh nghiệm massage giải toả lo âu cho<br class="vpc-bath__mobile-break">bé.</span></li></ul></div>
		</div>
	</section>

	<section class="vpc-bath__health" aria-labelledby="bath-health-title"><div class="vpc-bath__container vpc-bath__split-grid"><div class="vpc-bath__split-image"><img src="<?php echo esc_url( $bath_uri . '/health-book.jpg' ); ?>" width="540" height="456" alt="Sổ sức khỏe điện tử" loading="lazy"></div><div class="vpc-bath__split-copy"><div class="vpc-bath__badge"><img src="<?php echo esc_url( $shared_uri . '/star.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true">SỔ SỨC KHỎE ĐIỆN TỬ</div><h2 id="bath-health-title"><span>Sổ Sức Khỏe Điện Tử - <span class="vpc-bath__health-title-assistant">Trợ Lý</span></span><em>Giúp Mẹ Nuôi Con Easy</em></h2><p>Vạn Phúc Care là đơn vị tiên phong triển khai Sổ sức khỏe điện tử dành cho trẻ sơ sinh</p><ul class="vpc-bath__icon-list"><li><img src="<?php echo esc_url( $shared_uri . '/check-badge.svg' ); ?>" width="24" height="24" alt="">Giúp mẹ dễ dàng truy vấn lịch sử sức khỏe của con mọi lúc, mọi nơi</li><li><img src="<?php echo esc_url( $shared_uri . '/check-badge.svg' ); ?>" width="24" height="24" alt="">Lưu trữ mọi thông tin về sức khỏe của bé</li><li><img src="<?php echo esc_url( $shared_uri . '/check-badge.svg' ); ?>" width="24" height="24" alt="">Dễ dàng tạo ticket yêu cầu hỗ trợ đến đội ngũ chuyên gia của chúng tôi</li><li><img src="<?php echo esc_url( $shared_uri . '/check-badge.svg' ); ?>" width="24" height="24" alt="">Liên kết với hệ thống khóa học trực tuyến, tiếp nhận kiến thức nuôi con chuẩn xác một cách đơn giản nhất</li></ul></div></div></section>

	<section class="vpc-bath__process" aria-labelledby="bath-process-title"><div class="vpc-bath__container"><div class="vpc-bath__section-heading"><div class="vpc-bath__badge"><img src="<?php echo esc_url( $shared_uri . '/star.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true">QUY TRÌNH</div><h2 id="bath-process-title"><span>Quy Trình Dịch Vụ</span><em>Tắm Bé Tại Nhà</em></h2></div><div class="vpc-bath__process-grid"><?php foreach ( $processes as $index => $process ) : ?><article class="vpc-bath__process-card"><div class="vpc-bath__process-image"><img src="<?php echo esc_url( $bath_uri . '/' . $process['image'] ); ?>" width="189" height="189" alt="" loading="lazy"><span><?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></span></div><h3><?php echo esc_html( $process['title'] ); ?></h3><p><?php echo esc_html( $process['copy'] ); ?></p></article><?php endforeach; ?></div></div></section>

	<section id="bath-packages" class="vpc-bath__packages" aria-labelledby="bath-packages-title"><div class="vpc-bath__container"><div class="vpc-bath__section-heading"><h2 id="bath-packages-title">Gói Dịch Vụ</h2><p><span>Chăm con vẹn tròn khởi nguồn từ điều giản đơn,</span><span>Tắm bé và vệ sinh đúng chuẩn ngay từ những <span class="vpc-bath__days">ngày đầu.</span></span></p></div><div class="vpc-bath__package-grid">
		<?php
		$packages = array(
			array( 'name' => 'Gói 10 buổi', 'price' => '1.000.000 VNĐ', 'gift' => false ),
			array( 'name' => 'Gói 20 buổi', 'price' => '1.900.000 VNĐ', 'gift' => true ),
			array( 'name' => 'Gói 30 buổi', 'price' => '2.700.000 VNĐ', 'gift' => true ),
		);
		foreach ( $packages as $package ) :
			?>
			<article class="vpc-bath__package-card<?php echo $package['gift'] ? ' is-featured' : ''; ?>"><?php if ( $package['gift'] ) : ?><span class="vpc-bath__featured">★ Được lựa chọn nhiều</span><?php endif; ?><div class="vpc-bath__package-heading"><h3><?php echo esc_html( $package['name'] ); ?></h3><strong><?php echo esc_html( $package['price'] ); ?></strong></div><p class="vpc-bath__package-copy">Linh hoạt thời gian cho mẹ nghỉ ngơi, bé được chăm sóc chuẩn y khoa</p><h4>Quyền lợi</h4><ul><li><img src="<?php echo esc_url( $shared_uri . '/check-badge.svg' ); ?>" width="24" height="24" alt="">Tùy chọn thời gian thực hiện</li><li><img src="<?php echo esc_url( $shared_uri . '/check-badge.svg' ); ?>" width="24" height="24" alt="">Đầy đủ liệu trình</li><?php if ( $package['gift'] ) : ?><li><img src="<?php echo esc_url( $shared_uri . '/check-badge.svg' ); ?>" width="24" height="24" alt="">Quà tặng: Khóa học các bệnh lý thường gặp ở trẻ sơ sinh</li><?php endif; ?></ul><button type="button" class="vpc-bath__package-button" <?php echo $button_attrs; ?>>Tư vấn gói này</button></article>
		<?php endforeach; ?>
	</div></div></section>

	<section class="vpc-bath__faq" aria-labelledby="bath-faq-title"><div class="vpc-bath__container"><div class="vpc-bath__section-heading"><div class="vpc-bath__badge"><img src="<?php echo esc_url( $shared_uri . '/star.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true">FAQ</div><h2 id="bath-faq-title">Câu Hỏi Thường Gặp</h2><p>Về dịch vụ tắm bé tại nhà được cung cấp bởi Trung tâm ở cữ Vạn Phúc Care</p></div><div class="vpc-bath__faq-list">
		<details open><summary>Vì sao nhiều cha mẹ lựa chọn dịch vụ tắm bé tại nhà của chúng tôi?<span class="vpc-bath__faq-chevron"><img class="is-down" src="<?php echo esc_url( $shared_uri . '/chevron-down.svg' ); ?>" width="20" height="12" alt=""><img class="is-up" src="<?php echo esc_url( $shared_uri . '/chevron-up.svg' ); ?>" width="20" height="12" alt=""></span></summary><p>- Đội ngũ chuyên môn cao: 100% nhân sự thực hiện là chuyên viên có chuyên môn vững vàng, thao tác chuẩn kỹ thuật và thấu hiểu tâm lý trẻ sơ sinh.<br><br>- Quy trình chuẩn: Kết hợp đồng thời giữa chăm sóc vệ sinh an toàn (mắt, mũi, tai, rốn, bộ phận sinh dục) và các bài massage, vận động nhẹ.<br><br>- Đồng hành và hướng dẫn: Theo dõi sát dấu hiệu sinh lý của trẻ (vàng da, rốn rỉ dịch, nổi mẩn...), đồng thời trực tiếp hướng dẫn, giải tỏa âu lo cho ba mẹ trong những ngày đầu đón con về tổ ấm.</p></details>
		<details><summary>Điều gì làm nên sự đặc biệt của Vạn Phúc Care so với các đơn vị khác trong ngành?<span class="vpc-bath__faq-chevron"><img class="is-down" src="<?php echo esc_url( $shared_uri . '/chevron-down.svg' ); ?>" width="20" height="12" alt=""><img class="is-up" src="<?php echo esc_url( $shared_uri . '/chevron-up.svg' ); ?>" width="20" height="12" alt=""></span></summary><p>Đội ngũ chuyên viên được đào tạo bài bản, quy trình chăm sóc chuẩn hóa và luôn đồng hành, hướng dẫn gia đình trong từng buổi tắm bé.</p></details>
		<details><summary>Thời gian tắm bé trong gói dịch vụ tắm trẻ sơ sinh Vạn Phúc Care thế nào?<span class="vpc-bath__faq-chevron"><img class="is-down" src="<?php echo esc_url( $shared_uri . '/chevron-down.svg' ); ?>" width="20" height="12" alt=""><img class="is-up" src="<?php echo esc_url( $shared_uri . '/chevron-up.svg' ); ?>" width="20" height="12" alt=""></span></summary><p>Gia đình có thể chủ động lựa chọn lịch thực hiện phù hợp với nhịp sinh hoạt của mẹ và bé.</p></details>
		<details><summary>Khi nào cha mẹ nên sử dụng dịch vụ tắm trẻ sơ sinh tại nhà?<span class="vpc-bath__faq-chevron"><img class="is-down" src="<?php echo esc_url( $shared_uri . '/chevron-down.svg' ); ?>" width="20" height="12" alt=""><img class="is-up" src="<?php echo esc_url( $shared_uri . '/chevron-up.svg' ); ?>" width="20" height="12" alt=""></span></summary><p>Ngay từ những ngày đầu sau sinh, đặc biệt khi mẹ còn yếu hoặc gia đình chưa tự tin thực hiện đúng quy trình vệ sinh cho bé.</p></details>
		<details><summary>Thời gian thực hiện một buổi tắm bé kéo dài bao lâu?<span class="vpc-bath__faq-chevron"><img class="is-down" src="<?php echo esc_url( $shared_uri . '/chevron-down.svg' ); ?>" width="20" height="12" alt=""><img class="is-up" src="<?php echo esc_url( $shared_uri . '/chevron-up.svg' ); ?>" width="20" height="12" alt=""></span></summary><p>Mỗi buổi được sắp xếp đủ thời gian để kiểm tra tổng quan, massage, tắm và vệ sinh cho bé một cách nhẹ nhàng.</p></details>
		<details><summary>Gia đình cần chuẩn bị những gì để buổi tắm bé diễn ra thuận lợi?<span class="vpc-bath__faq-chevron"><img class="is-down" src="<?php echo esc_url( $shared_uri . '/chevron-down.svg' ); ?>" width="20" height="12" alt=""><img class="is-up" src="<?php echo esc_url( $shared_uri . '/chevron-up.svg' ); ?>" width="20" height="12" alt=""></span></summary><p>Gia đình chuẩn bị không gian sạch sẽ, thoáng mát và những vật dụng cá nhân cần thiết của bé. Chuyên viên sẽ hướng dẫn thêm trước buổi thực hiện.</p></details>
	</div></div></section>

	<?php get_template_part( 'template-parts/sections/feedback', null, array( 'items' => $feedback, 'image_prefix' => 'easy' ) ); ?>

	<section class="vpc-bath__lead" aria-labelledby="bath-lead-title"><div class="vpc-bath__container"><div class="vpc-bath__section-heading"><h2 id="bath-lead-title"><span>Sẵn Sàng Bắt Đầu</span><em>Hành Trình Làm Mẹ Hạnh Phúc</em></h2></div><div class="vpc-bath__lead-card"><div class="vpc-bath__lead-row"><label><span><b>*</b>Họ và tên</span><input type="text" placeholder="Nguyễn Như Linh" aria-label="Họ và tên"></label><label><span><b>*</b>Số điện thoại</span><input type="tel" placeholder="0345678***" aria-label="Số điện thoại"></label></div><label><span><b>*</b>Gói dịch vụ quan tâm</span><select aria-label="Gói dịch vụ quan tâm"><option>Gói 20 buổi</option><option>Gói 10 buổi</option><option>Gói 30 buổi</option></select></label><label><span>Ghi chú</span><input type="text" placeholder="Cho chúng tôi biết thêm về nhu cầu của bạn!" aria-label="Ghi chú"></label><button type="button" class="vpc-bath__button vpc-bath__button--primary" <?php echo $button_attrs; ?>>Gửi yêu cầu tư vấn</button></div></div></section>

	<section class="vpc-bath__services" aria-labelledby="bath-services-title"><div class="vpc-bath__container"><div class="vpc-bath__section-heading"><h2 id="bath-services-title">Các Dịch Vụ Khác</h2></div><div class="vpc-bath__services-carousel"><button class="vpc-bath__services-arrow vpc-bath__services-arrow--prev" type="button" aria-label="Dịch vụ trước" aria-controls="bath-services-viewport"><img src="<?php echo esc_url( trailingslashit( get_template_directory_uri() ) . 'assets/images/bao-mau/chevron-left.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true"></button><div id="bath-services-viewport" class="vpc-bath__services-viewport"><div class="vpc-bath__services-track"><?php foreach ( $other_services as $service ) : ?><a class="vpc-bath__service-card" href="<?php echo esc_url( $service['href'] ); ?>"><img src="<?php echo esc_url( $shared_uri . '/' . $service['image'] ); ?>" width="216" height="160" alt="<?php echo esc_attr( $service['title'] ); ?>" loading="lazy"><h3><?php echo esc_html( $service['title'] ); ?></h3></a><?php endforeach; ?></div></div><button class="vpc-bath__services-arrow vpc-bath__services-arrow--next" type="button" aria-label="Dịch vụ tiếp theo" aria-controls="bath-services-viewport"><img src="<?php echo esc_url( $shared_uri . '/chevron-right.svg' ); ?>" width="17.5" height="15.5" alt="" aria-hidden="true"></button></div></div></section>
</div>

<?php get_footer(); ?>
