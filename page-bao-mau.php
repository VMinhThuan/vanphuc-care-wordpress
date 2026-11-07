<?php
/**
 * Page template — Bảo mẫu tại nhà.
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$asset_uri = trailingslashit( get_template_directory_uri() ) . 'assets/images/bao-mau';
$hero_uri = trailingslashit( get_template_directory_uri() ) . 'assets/images/home/bao-mau-tai-nha-1.jpg';
$health_book_uri = trailingslashit( get_template_directory_uri() ) . 'assets/images/easy/health-book.png';

$processes = array(
	array( 'image' => 'process-1.png', 'title' => 'Kiểm tra toàn trạng', 'copy' => 'Vệ sinh phòng, kiểm tra tổng quan sức khỏe của bé. Trường hợp phát hiện vấn đề bất thường, điều dưỡng viên sẽ trao đổi lại với mẹ.' ),
	array( 'image' => 'process-2.png', 'title' => 'Tập vận động', 'copy' => 'Bé được tập vận động vào mỗi buổi sáng trong ngày theo bài tập phù hợp với thể trạng.' ),
	array( 'image' => 'process-3.png', 'title' => 'Tắm & Massage', 'copy' => 'Trẻ được massage body theo chuẩn IAIM giúp bé thư giãn, thoải mái. Vệ sinh vùng da nhạy cảm và tắm rửa sạch sẽ.' ),
	array( 'image' => 'process-4.png', 'title' => 'Kiểm soát cữ bú', 'copy' => 'Từ cho ăn theo nhu cầu đến thiết lập cữ bú phù hợp với nhu cầu sinh lý riêng của từng bé.' ),
	array( 'image' => 'process-5.png', 'title' => 'Thiết lập cữ ngủ', 'copy' => 'Bé sẽ được rèn nề nếp ngủ đúng giờ, hạn chế thức đêm giúp mẹ và gia đình đỡ mệt mỏi.' ),
	array( 'image' => 'process-6.png', 'title' => 'Luyện tập kỹ năng cơ bản', 'copy' => 'Con được luyện tập các kỹ năng cơ bản đầu đời như: Lật, lẫy, ngồi, trườn, bò…. theo sự phát triển cá nhân của bé.' ),
);

$packages = array(
	array( 'name' => 'Gói Linh Hoạt', 'price' => '80.000 VNĐ/h', 'copy' => 'Phù hợp với gia đình cần hỗ trợ chăm sóc bé ban ngày.' ),
	array( 'name' => 'Gói Thảnh Thơi', 'price' => '90.000VNĐ/h', 'copy' => 'Phù hợp với gia đình cần hỗ trợ chăm sóc bé vào buổi tối và đêm muộn.' ),
	array( 'name' => 'Gói An Tâm', 'price' => '70.000 VNĐ/h', 'copy' => 'Phù hợp với gia đình bận rộn, cần giải pháp chăm sóc bé toàn thời gian.' ),
);

$package_benefits = array(
	'Đầy đủ quy trình chăm sóc bé',
	'Đồng hành giải đáp thắc mắc cho mẹ',
	'Quyền sử dụng sổ sức khỏe điện tử',
	'Kênh hỗ trợ khách hàng riêng',
);

$team = array(
	array( 'image' => 'team-1.png', 'name' => 'Cô Vương Thanh Thủy', 'role' => 'Điều dưỡng trưởng' ),
	array( 'image' => 'team-2.png', 'name' => 'Cô Trần Thị Trang', 'role' => 'Điều dưỡng chăm bé' ),
	array( 'image' => 'team-3.png', 'name' => 'Cô Đỗ Thị Duyên', 'role' => 'Điều dưỡng chăm bé' ),
	array( 'image' => 'team-4.png', 'name' => 'Cô Tống Thị Nguyệt', 'role' => 'Điều dưỡng chăm bé' ),
);

$feedback = array(
	array( 'image' => 'feedback-1.png', 'name' => 'Mẹ bé Kami', 'copy' => 'Mình thực sự thấy quyết định chọn ở cữ ở Vạn Phúc Care là sáng suốt nhất trong hành trình đi đẻ. Phòng hạng có view hồ Tây, rộng rãi, sang trọng và đầy đủ tiện nghi. Trọn vẹn 30 ngày ở cữ rất nhẹ nhàng, 2 mẹ con được chăm sóc sức khỏe chu đáo mỗi ngày và nhàn nhất là không bị áp lực đêm hôm chăm con. Bé Kami trộm vía về nhà vẫn ăn ngoan ngủ ngon.' ),
	array( 'image' => 'feedback-2.png', 'name' => 'Mẹ bé Mandu', 'copy' => 'Mình rất hài lòng với dịch vụ Bảo mẫu tại nhà của Vạn Phúc Care, đặc biệt cảm ơn cô Phương Anh rất nhiều. Cô chăm bé vô cùng cẩn thận và khéo léo. Bé nhà mình được cô rèn theo phương pháp EASY, trộm vía bé khỏe mạnh, ngủ ngoan hơn và có lịch trình sinh hoạt ổn định.' ),
	array( 'image' => 'feedback-3.png', 'name' => 'Mẹ Bé Cát', 'copy' => 'Mình rất hài lòng với dịch vụ chăm sóc bé tại nhà của Vạn Phúc Care. Đặc biệt là sự chăm sóc khách hàng rất tỉ mỉ, tận tình. Gia đình gửi lời cảm ơn đến cô Thủy với những tư vấn, hỗ trợ tuyệt vời. Kỹ năng truyền đạt phương pháp nuôi con EASY của cô dễ hiểu, làm mình yên tâm hơn.' ),
	array( 'image' => 'feedback-4.png', 'name' => 'Mẹ Trà My – Bé Nghé', 'copy' => 'Dành tặng 10 sao cho cô Linh, tận tình chăm sóc Mẹ và 2 bé. Cực kỳ hài lòng với dịch vụ mà chi phí lại hợp lý. Cô Linh chăm sóc bé rất kỹ và yêu trẻ, nhiệt tình tư vấn cho Mẹ các vấn đề về sữa, kỹ năng cho con bú và phương pháp rèn con ngủ đúng giờ.' ),
	array( 'image' => 'feedback-5.png', 'name' => 'Nguyễn Thị Ngọc Trân', 'copy' => 'Mình cảm thấy thật sự là may mắn khi được biết tới dịch vụ thông tắc tia sữa của Vạn Phúc Care. Nhờ các cô luôn tận tâm, nhiệt tình, có kinh nghiệm mà mình đã nhanh chóng trị dứt tình trạng tắc sữa để mau có sữa về cho bé Cafe nhà mình.' ),
	array( 'image' => 'feedback-6.png', 'name' => 'Mẹ Sấm Chớp', 'copy' => 'Sau sinh cơ thể mình rất mệt mỏi, muốn chăm con thật tốt nhưng sức khoẻ không cho phép. Lúc này mình được chị gái giới thiệu về Vạn Phúc Care và mình đã đăng ký Gói chăm sóc bé tại nhà trong 6 tháng. Cô Ánh điều dưỡng chăm sóc bé nhà mình rất tốt.' ),
	array( 'image' => 'feedback-7.png', 'name' => 'Mẹ Cafe', 'copy' => 'Cảm ơn cô Huyên, cảm ơn Vạn Phúc Care đã dành cho Dâu những trải nghiệm đầu đời thú vị. Cô chăm sóc bé nhẹ nhàng khéo léo, cẩn thận. Hướng dẫn tận tình gia đình cách vệ sinh cá nhân cho cháu.' ),
	array( 'image' => 'feedback-8.png', 'name' => 'Mẹ Nghé Ọ', 'copy' => 'Đội ngũ điều dưỡng tận tâm, tư vấn rõ ràng và đồng hành rất sát trong những ngày đầu chăm con. Gia đình mình hoàn toàn yên tâm khi có Vạn Phúc Care.' ),
);

$other_services = array(
	array( 'image' => 'service-1.jpg', 'title' => 'Trung tâm ở cữ', 'href' => home_url( '/o-cu/' ) ),
	array( 'image' => 'service-2.jpg', 'title' => 'Khóa học trực tuyến', 'href' => home_url( '/kien-thuc/' ) ),
	array( 'image' => 'service-3.jpg', 'title' => 'Lớp học tiền sản', 'href' => home_url( '/lop-hoc-tien-san/' ) ),
	array( 'image' => 'service-4.jpg', 'title' => 'Tư vấn nuôi con Easy', 'href' => home_url( '/tu-van-nuoi-con-easy/' ) ),
	array( 'image' => 'service-5.jpg', 'title' => 'Tắm bé sơ sinh', 'href' => home_url( '/tam-be-tai-nha/' ) ),
	array( 'image' => 'service-6.jpg', 'title' => 'Thông tắc tia sữa', 'href' => home_url( '/thong-tac-tia-sua/' ) ),
);

$button_attrs = 'data-open-modal="vpc-consultation-modal" data-service="bao-mau-tai-nha"';
?>

<div class="vpc-bao-mau" data-figma-node="3126:39925" data-figma-frame-node="3126:39926" data-figma-mobile-node="3126:40060">
	<section class="vpc-bao-mau__hero" aria-labelledby="bao-mau-title">
		<div class="vpc-bao-mau__container vpc-bao-mau__hero-grid">
			<div class="vpc-bao-mau__hero-copy">
				<div class="vpc-bao-mau__badge"><img src="<?php echo esc_url( $asset_uri . '/star.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true">HÀNH TRÌNH CÙNG MẸ, TRẢI ĐẦY YÊU THƯƠNG</div>
				<h1 id="bao-mau-title"><span>Dịch Vụ Bảo Mẫu</span><em>Chăm Sóc Bé Tại Nhà</em></h1>
				<p>Bé được chăm sóc tận tâm, mẹ có thêm thời gian nghỉ ngơi. Vạn Phúc Care đồng hành cùng gia đình bằng chuyên môn,sự thấu hiểu và yêu thương.</p>
				<div class="vpc-bao-mau__actions">
					<button type="button" class="vpc-bao-mau__button vpc-bao-mau__button--primary" <?php echo $button_attrs; ?>>Đăng ký tư vấn</button>
					<a class="vpc-bao-mau__button vpc-bao-mau__button--secondary" href="#bao-mau-packages">Xem gói dịch vụ</a>
				</div>
			</div>
			<img class="vpc-bao-mau__hero-image" src="<?php echo esc_url( $hero_uri ); ?>" width="650" height="366" alt="Điều dưỡng chăm sóc em bé tại nhà" fetchpriority="high">
		</div>
	</section>

	<section class="vpc-bao-mau__stats" aria-label="Điểm nổi bật">
		<div class="vpc-bao-mau__container vpc-bao-mau__stats-grid">
			<?php
			$stats = array(
				array( 'icon' => 'health-safety.svg', 'title' => 'An tâm', 'copy' => 'Ứng dụng công nghệ với sổ sức khoẻ điện tử, theo dõi tình trạng sức khỏe bé thường xuyên.' ),
				array( 'icon' => 'vector52.svg', 'title' => 'Chuyên môn', 'copy' => 'Các hoạt động chăm sóc được thực hiện hoặc giám sát từ xa bởi bộ phận điều dưỡng.' ),
				array( 'icon' => 'professional.svg', 'title' => 'Rèn nếp sinh hoạt', 'copy' => 'Hỗ trợ bé ăn, ngủ, thiết lập nếp sinh hoạt theo lịch trình EASY. Cá nhân hoá phù hợp với mỗi trẻ.' ),
				array( 'icon' => 'mother-companion.svg', 'title' => 'Đồng hành cùng mẹ', 'copy' => 'Chia sẻ kinh nghiệm, hỗ trợ giải đáp những băn khoăn, lo lắng để mẹ có thêm thời gian nghỉ ngơi.' ),
			);
			foreach ( $stats as $stat ) :
				?>
				<div class="vpc-bao-mau__stat">
					<div class="vpc-bao-mau__stat-heading"><img src="<?php echo esc_url( $asset_uri . '/' . $stat['icon'] ); ?>" width="24" height="24" alt="" aria-hidden="true"><h2><?php echo esc_html( $stat['title'] ); ?></h2></div>
					<p><?php echo esc_html( $stat['copy'] ); ?></p>
				</div>
				<?php
			endforeach;
			?>
		</div>
	</section>

	<section class="vpc-bao-mau__intro vpc-bao-mau__intro--challenges">
		<div class="vpc-bao-mau__container vpc-bao-mau__intro-grid">
			<img class="vpc-bao-mau__intro-image" src="<?php echo esc_url( $asset_uri . '/challenges.png' ); ?>" width="540" height="456" alt="Mẹ chăm sóc em bé sau sinh" loading="lazy">
			<div class="vpc-bao-mau__intro-copy">
				<div class="vpc-bao-mau__badge"><img src="<?php echo esc_url( $asset_uri . '/star.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true">KHÓ KHĂN</div>
				<h2><span>Những Điều Khó Khăn</span><em>Mẹ Thường Gặp</em></h2>
				<p>Hành trình nuôi con thiêng liêng và ý nghĩa biết bao, nhưng cũng đem đến cho cha mẹ nhiều thách thức, khó khăn:</p>
				<ul class="vpc-bao-mau__check-list">
					<li>Mẹ còn chưa biết xử lý sặc sữa, xử lý hóc, sơ cứu cơ bản cho con.</li>
					<li>Băn khoăn về cữ bú hoặc tư thế ti phù hợp.</li>
					<li>Bé gặp tình trạng khó vào giấc, không tự chuyển giấc, nối giấc được.</li>
					<li>Chưa có kinh nghiệm nhận biết những dấu hiệu bất thường của trẻ.</li>
				</ul>
			</div>
		</div>
	</section>

	<section class="vpc-bao-mau__intro vpc-bao-mau__intro--health">
		<div class="vpc-bao-mau__container vpc-bao-mau__intro-grid">
			<img class="vpc-bao-mau__intro-image" src="<?php echo esc_url( $health_book_uri ); ?>" width="540" height="456" alt="Sổ sức khỏe điện tử cho trẻ sơ sinh" loading="lazy">
			<div class="vpc-bao-mau__intro-copy">
				<div class="vpc-bao-mau__badge"><img src="<?php echo esc_url( $asset_uri . '/star.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true">SỔ SỨC KHỎE ĐIỆN TỬ</div>
				<h2><span>Sổ Sức Khỏe Điện Tử - Trợ Lý</span><em>Giúp Mẹ Nuôi Con Easy</em></h2>
				<p>Vạn Phúc Care là đơn vị tiên phong ứng dụng số hoá dữ liệu sức khoẻ, triển khai sổ sức khỏe điện tử dành cho trẻ sơ sinh:</p>
				<ul class="vpc-bao-mau__check-list">
					<li>Giúp mẹ dễ dàng truy vấn lịch sử sức khỏe của con mọi lúc, mọi nơi.</li>
					<li>Lưu trữ mọi thông tin về sức khỏe của bé.</li>
					<li>Dễ dàng tạo ticket yêu cầu hỗ trợ.</li>
					<li>Liên kết với hệ thống khóa học trực tuyến, tiếp nhận kiến thức nuôi con chuẩn xác một cách đơn giản nhất.</li>
				</ul>
			</div>
		</div>
	</section>

	<section class="vpc-bao-mau__process" aria-labelledby="bao-mau-process-title">
		<div class="vpc-bao-mau__container">
			<div class="vpc-bao-mau__section-heading">
				<div class="vpc-bao-mau__badge"><img src="<?php echo esc_url( $asset_uri . '/star.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true">QUY TRÌNH</div>
				<h2 id="bao-mau-process-title"><span>Quy Trình Dịch Vụ</span><em>Bảo Mẫu Tại Nhà</em></h2>
			</div>
			<div class="vpc-bao-mau__process-grid">
				<?php foreach ( $processes as $index => $process ) : ?>
					<article class="vpc-bao-mau__process-card">
						<div class="vpc-bao-mau__process-image"><img src="<?php echo esc_url( $asset_uri . '/' . $process['image'] ); ?>" width="293" height="176" alt="" loading="lazy"><span><?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></span></div>
						<h3><?php echo esc_html( $process['title'] ); ?></h3>
						<p><?php echo esc_html( $process['copy'] ); ?></p>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section id="bao-mau-packages" class="vpc-bao-mau__packages">
		<div class="vpc-bao-mau__container">
			<div class="vpc-bao-mau__section-heading vpc-bao-mau__section-heading--packages">
				<h2><span>Gói Dịch Vụ</span></h2>
				<p>Đa dạng thời gian giúp cha mẹ dễ dàng tìm kiếm giải pháp phù hợp với gia đình mình.<br>Chúng tôi cam kết đem đến niềm an tâm và chất lượng dịch vụ hoàn hảo.</p>
			</div>
			<div class="vpc-bao-mau__package-grid">
				<?php foreach ( $packages as $package_index => $package ) : ?>
					<article class="vpc-bao-mau__package-card">
						<div class="vpc-bao-mau__package-top"><h3><?php echo esc_html( $package['name'] ); ?></h3><strong><?php echo esc_html( $package['price'] ); ?></strong><p><?php echo esc_html( $package['copy'] ); ?></p></div>
						<h4>Quyền lợi:</h4>
						<ul class="vpc-bao-mau__package-benefits">
							<li><?php echo 2 === $package_index ? '24/24' : '10 - 12 tiếng/ ngày'; ?></li>
							<?php foreach ( $package_benefits as $benefit ) : ?><li><?php echo esc_html( $benefit ); ?></li><?php endforeach; ?>
						</ul>
						<button type="button" class="vpc-bao-mau__button vpc-bao-mau__button--primary" <?php echo $button_attrs; ?>>Tư vấn gói này</button>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="vpc-bao-mau__team" aria-labelledby="bao-mau-team-title">
		<div class="vpc-bao-mau__container">
			<div class="vpc-bao-mau__section-heading">
				<div class="vpc-bao-mau__badge"><img src="<?php echo esc_url( $asset_uri . '/star.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true">ĐỘI NGŨ</div>
				<h2 id="bao-mau-team-title"><span>Đội Ngũ Của Chúng Tôi</span></h2>
				<p>Đội ngũ điều dưỡng viên với nền tảng y tế, được đào tạo chuyên môn về chăm sóc sức khỏe Mẹ&amp;Bé, đảm bảo đem đến dịch vụ an toàn, chuyên nghiệp cho các gia đình.</p>
			</div>
			<div class="vpc-bao-mau__team-viewport"><div class="vpc-bao-mau__team-grid">
				<?php foreach ( $team as $member ) : ?>
					<article class="vpc-bao-mau__team-card"><div class="vpc-bao-mau__team-image"><img src="<?php echo esc_url( $asset_uri . '/' . $member['image'] ); ?>" width="223" height="292" alt="<?php echo esc_attr( $member['name'] ); ?>" loading="lazy"></div><div><h3><?php echo esc_html( $member['name'] ); ?></h3><p><?php echo esc_html( $member['role'] ); ?></p></div></article>
				<?php endforeach; ?>
			</div></div>
		</div>
	</section>

	<section class="vpc-bao-mau__faq" aria-labelledby="bao-mau-faq-title">
		<div class="vpc-bao-mau__container">
			<div class="vpc-bao-mau__section-heading"><div class="vpc-bao-mau__badge"><img src="<?php echo esc_url( $asset_uri . '/star.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true">HỎI ĐÁP</div><h2 id="bao-mau-faq-title"><span>Câu Hỏi Thường Gặp</span></h2><p>Chặng đường nuôi con trong lần đầu làm mẹ không tránh khỏi những nỗi niềm băn khoăn, lo lắng riêng của mẹ.<br>Với kênh hỗ trợ hoạt động 24/7, chúng tôi luôn sẵn sàng đồng hành cùng gia đình mọi lúc.</p></div>
			<div class="vpc-bao-mau__faq-list">
				<details class="is-open" open><summary>Vì sao nhiều cha mẹ lựa chọn sử dụng dịch vụ của Vạn Phúc Care?</summary><p>– Vạn Phúc Care là đơn vị đầu tiên hệ thống hóa thông tin sức khỏe của trẻ qua Sổ sức khỏe điện tử và phổ cập phương pháp chăm sóc sức khỏe trẻ sơ sinh từ 0 – 12 tháng tuổi khoa học nhất.<br><br>– Đội ngũ điều dưỡng viên tận tâm, tay nghề cao, cam kết 100% được đào tạo có bằng cấp chính quy với các chuyên ngành: Điều dưỡng, hộ sinh, giáo viên mầm non,….<br><br>– Các dịch vụ đa dạng phù hợp với từng đặc điểm và nhu cầu của mọi gia đình với các gói ca ngày, ca đêm hoặc ca 24/24 giúp cha mẹ giảm bớt gánh nặng công việc chăm sóc con, có thể dành thời gian nghỉ ngơi hoặc tập trung vào công việc khác.<br><br>Vạn Phúc Care mang lại sự yên tâm và tiện lợi cho cha mẹ bất kể thời gian nào, vì sức khỏe, hạnh phúc của mẹ và bé yêu!</p></details>
				<details><summary>Điều gì làm nên sự đặc biệt của Vạn Phúc Care so với các đơn vị khác cùng ngành?</summary><p>Đội ngũ điều dưỡng chuyên môn cao, quy trình chăm sóc chuẩn hóa và hệ thống hỗ trợ gia đình xuyên suốt hành trình nuôi con.</p></details>
				<details><summary>Sổ sức khỏe điện tử của Vạn Phúc Care là gì?</summary><p>Là nơi lưu trữ và theo dõi các thông tin sức khỏe, lịch chăm sóc và hỗ trợ của bé một cách thuận tiện.</p></details>
				<details><summary>Một ngày chăm bé của các bảo mẫu ở Vạn Phúc Care làm những công việc gì?</summary><p>Điều dưỡng vệ sinh, theo dõi sức khỏe, tắm massage, hỗ trợ cữ bú, giấc ngủ và các kỹ năng phát triển của bé.</p></details>
				<details><summary>Buổi trải nghiệm bảo mẫu tại nhà có được miễn phí không?</summary><p>Vui lòng để lại thông tin để đội ngũ tư vấn gói trải nghiệm phù hợp nhất với gia đình.</p></details>
			</div>
		</div>
	</section>

	<?php
	get_template_part(
		'template-parts/sections/feedback',
		null,
		array(
			'items'        => $feedback,
			'image_prefix' => 'bao-mau',
			'badge'        => 'KHÁCH HÀNG',
			'description'  => array(
				'Trong hành trình cùng mẹ trải đầy yêu thương, Vạn Phúc Care đã nhận được sự tin yêu của hàng ngàn mẹ bỉm.',
				'Chúng tôi cam kết đồng hành, mang đến giải pháp chăm sóc sức khoẻ phù hợp cho mọi gia đình.',
			),
		)
	); ?>

	<section class="vpc-bao-mau__lead" aria-labelledby="bao-mau-lead-title">
		<div class="vpc-bao-mau__container"><div class="vpc-bao-mau__section-heading"><h2 id="bao-mau-lead-title"><span>Sẵn Sàng Bắt Đầu</span><em>Hành Trình Làm Mẹ Hạnh Phúc</em></h2></div>
			<div class="vpc-bao-mau__lead-card">
				<div class="vpc-bao-mau__lead-row"><label><span class="vpc-bao-mau__label-text"><b>*</b>Họ và tên</span><input type="text" placeholder="Nguyễn Như Linh" aria-label="Họ và tên"></label><label><span class="vpc-bao-mau__label-text"><b>*</b>Số điện thoại</span><input type="tel" placeholder="0345678***" aria-label="Số điện thoại"></label></div>
				<label><span class="vpc-bao-mau__label-text"><b>*</b>Gói dịch vụ quan tâm</span><select aria-label="Gói dịch vụ quan tâm"><option>Gói Thảnh Thơi</option><option>Gói Linh Hoạt</option><option>Gói An Tâm</option></select></label>
				<label><span class="vpc-bao-mau__label-text">Ghi chú</span><input type="text" placeholder="Cho chúng tôi biết thêm về nhu cầu của bạn!" aria-label="Ghi chú"></label>
				<button type="button" class="vpc-bao-mau__button vpc-bao-mau__button--primary" <?php echo $button_attrs; ?>>Gửi yêu cầu tư vấn</button>
			</div>
		</div>
	</section>

	<section class="vpc-bao-mau__services" aria-labelledby="bao-mau-services-title"><div class="vpc-bao-mau__container"><div class="vpc-bao-mau__section-heading"><h2 id="bao-mau-services-title"><span>Các Dịch Vụ Khác</span></h2></div><div class="vpc-bao-mau__services-viewport"><div class="vpc-bao-mau__services-track">
		<?php foreach ( $other_services as $service ) : ?><a class="vpc-bao-mau__service-card" href="<?php echo esc_url( $service['href'] ); ?>"><img src="<?php echo esc_url( $asset_uri . '/' . $service['image'] ); ?>" width="300" height="240" alt="<?php echo esc_attr( $service['title'] ); ?>" loading="lazy"><h3><?php echo esc_html( $service['title'] ); ?></h3></a><?php endforeach; ?>
	</div></div></div></section>
</div>

<?php get_footer(); ?>
