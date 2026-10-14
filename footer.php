<?php
/**
 * Site footer template for Vạn Phúc Care.
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
</main><!-- #primary -->

<footer class="site-footer">
	<!-- Decorative soft gradient waterdrop vectors -->
	<div class="footer-bg-decor">
		<svg class="decor-shape shape-1" viewBox="0 0 300 300" fill="none" xmlns="http://www.w3.org/2000/svg">
			<circle cx="150" cy="150" r="150" fill="rgba(255, 255, 255, 0.3)"/>
		</svg>
		<svg class="decor-shape shape-2" viewBox="0 0 400 400" fill="none" xmlns="http://www.w3.org/2000/svg">
			<circle cx="200" cy="200" r="200" fill="rgba(255, 255, 255, 0.25)"/>
		</svg>
	</div>

	<div class="vpc-container footer-inner">
		<div class="footer-grid">
			<!-- Column 1: Company Info -->
			<div class="footer-col footer-col-company">
				<div class="footer-logo">
					<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/logo.png' ); ?>" alt="Vạn Phúc Care Logo" class="footer-logo-img">
				</div>
				<p class="footer-slogan">Hành Trình Cùng Mẹ, Trải Đầy Yêu Thương</p>
				<h3 class="company-name">CÔNG TY TNHH VẠN PHÚC CARE</h3>
				<ul class="company-info-list">
					<li><strong>Trung tâm ở cữ:</strong> 35B/399 Âu Cơ, phường Tây Hồ, TP. Hà Nội</li>
					<li><strong>Hotline:</strong> (024) 6329 6698</li>
					<li><strong>Số điện thoại:</strong> 037 624 6673</li>
					<li><strong>Email:</strong> cskh@vanphuccare.vn</li>
				</ul>
			</div>

			<!-- Column 2: Services -->
			<div class="footer-col footer-col-services">
				<h3 class="footer-col-title">DỊCH VỤ CỦA CHÚNG TÔI</h3>
				<ul class="footer-link-list">
					<li><a href="#">Trung tâm ở cữ</a></li>
					<li><a href="#">Khóa học chăm bé</a></li>
					<li><a href="#">Bảo mẫu tại nhà</a></li>
					<li><a href="#">Hướng dẫn nuôi con EASY trực tuyến 1:1</a></li>
					<li><a href="#">Hướng dẫn nuôi con EASY</a></li>
					<li><a href="#">Tắm trẻ sơ sinh</a></li>
					<li><a href="#">Thông tắc tia sữa</a></li>
					<li><a href="#">Chăm sóc mẹ sau sinh</a></li>
				</ul>
			</div>

			<!-- Column 3: News & Knowledge -->
			<div class="footer-col footer-col-news">
				<h3 class="footer-col-title">KIẾN THỨC & TIN TÚC</h3>
				<ul class="footer-link-list">
					<li><a href="#">Phương pháp EASY</a></li>
					<li><a href="#">Cẩm nang làm mẹ</a></li>
					<li><a href="#">Hội chứng biếng ăn</a></li>
					<li><a href="#">Ăn dặm toàn tập</a></li>
					<li><a href="#">Mang thai</a></li>
					<li><a href="#">Mẹ và bé</a></li>
					<li><a href="#">Tin tức & sự kiện</a></li>
				</ul>
			</div>
		</div>

		<!-- Footer Bottom Legal Links -->
		<div class="footer-bottom">
			<div class="footer-divider"></div>
			<div class="legal-links">
				<a href="<?php echo esc_url( home_url( '/dieu-khoan-su-dung' ) ); ?>">Điều khoản sử dụng</a>
				<span class="sep">|</span>
				<a href="#">Chính sách bảo mật</a>
				<span class="sep">|</span>
				<a href="#">Tuyển dụng</a>
			</div>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
