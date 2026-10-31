<?php
/**
 * Template Name: Chính sách biên tập & chỉnh sửa
 * Template Post Type: page
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		$page_title = get_the_title();
		if ( empty( $page_title ) || strtolower( trim( $page_title ) ) === 'auto draft' ) {
			$page_title = 'Chính sách biên tập & chỉnh sửa';
		}
		?>

		<!-- Hero Banner Section -->
		<section class="policy-hero-banner" style="background-image: linear-gradient(90.7deg, rgba(243, 128, 131, 0.81) -2.2%, rgba(26, 119, 186, 0.81) 99.39%), url('<?php echo esc_url( get_template_directory_uri() . '/assets/images/hero_bg.jpg' ); ?>');">
			<div class="vpc-container">
				<h1 class="policy-hero-title"><?php echo esc_html( $page_title ); ?></h1>
				<p class="policy-hero-desc">
					Vạn Phúc Care được xây dựng với mục tiêu mang đến cho người đọc những thông tin về sức khỏe của mẹ và trẻ sơ sinh một cách khách quan, đáng tin cậy và chính xác. Sứ mệnh của chúng tôi là đảm bảo Vạn Phúc Care sẽ là địa chỉ đáng tin cậy, giúp khách hàng giải đáp mọi thắc mắc liên quan đến sức khỏe và y tế.
				</p>
			</div>
		</section>

		<!-- Policy Content Section -->
		<section class="policy-content-section">
			<div class="vpc-container">
				<div class="policy-main-content">

					<?php
					$has_custom_content = trim( get_the_content() );
					if ( ! empty( $has_custom_content ) ) :
						the_content();
					else :
					?>

					<!-- Nội dung chuẩn theo tiêu chuẩn Vạn Phúc Care -->
					<p class="policy-lead-text">
						<strong>Chúng tôi cam kết sẽ cung cấp thông tin y khoa một cách khoa học, có chọn lọc, kiểm chứng.</strong> Tuy nhiên, đó chỉ là những nguồn thông tin hữu ích, bổ trợ và nâng cao sự hiểu biết của người đọc về một vấn đề sức khỏe. Do đó, khách hàng cần hiểu rằng những thông tin trên website của chúng tôi hoặc bất kỳ website nào khác không nên được sử dụng để thay thế cho chẩn đoán từ bác sĩ. Chúng tôi khuyên khách hàng luôn ưu tiên tham vấn ý kiến bác sĩ khi gặp phải vấn đề liên quan đến sức khỏe.
					</p>

					<div class="policy-block">
						<h2 class="policy-section-title">Nội dung biên tập</h2>
						<p>Vạn Phúc Care tạo ra các nội dung có tính giá trị dựa trên các tiêu chí sau:</p>
					</div>

					<div class="policy-block">
						<h3 class="policy-subsection-title">Mẹ và trẻ sơ sinh</h3>
						<p>
							<strong>Là trang web chuyên về chăm sóc sức khỏe mẹ và trẻ sơ sinh,</strong> nội dung của chúng tôi tập trung và xoay quanh đến đối tượng mẹ và bé. Các chủ đề sẽ bao gồm những tin tức bao quát về toàn bộ vấn đề liên quan đến sức khỏe của mẹ và bé, những tư vấn về cách chăm sóc mẹ, nuôi dạy và chăm sóc trẻ sơ sinh, chế độ dinh dưỡng thai kỳ, dinh dưỡng dành cho trẻ từ 0 đến 12 tháng tuổi.
						</p>
					</div>

					<div class="policy-block">
						<h3 class="policy-subsection-title">Giá trị</h3>
						<p>
							Các thông tin, bài viết trên website phải mang lại giá trị thực sự cho người đọc. Không chỉ đơn thuần là bài viết phản ánh, khái quát mà cần cung cấp đầy đủ thông tin một cách chi tiết, <strong>có dẫn chứng từ các nguồn thông tin uy tín của Việt Nam cũng như các tổ chức y tế thế giới,</strong> có giá trị hữu ích nhất cho người đọc, giúp người đọc nắm vững và giải quyết được vấn đề mình quan tâm, thắc mắc liên quan đến sức khỏe mẹ bé và cách nuôi dạy trẻ sơ sinh.
						</p>
					</div>

					<div class="policy-block">
						<h3 class="policy-subsection-title">Tính xác thực</h3>
						<p>
							Các bài viết được xuất bản phải có <strong>tính chính xác, dựa trên những nguồn và tài liệu tham khảo y tế được chứng thực, thẩm định.</strong> Dựa trên các nguồn đáng tin cậy trong nước và quốc tế về thông tin y tế và sức khỏe, bao gồm các trang web cộng tác với bác sĩ, các tạp chí y khoa và những nguồn khác.
						</p>
					</div>

					<div class="policy-block">
						<h3 class="policy-subsection-title">Quá trình đánh giá nghiêm ngặt</h3>
						<p>
							Trước khi xuất bản, nội dung kiến thức của Vạn Phúc Care đều <strong>được xem xét về mặt y khoa</strong> bởi nhóm chuyên gia cố vấn, điều dưỡng viên có chuyên môn, giàu kinh nghiệm để bảo đảm tính chính xác, phù hợp với các tiêu chí y khoa. Đồng thời, mỗi bài viết sẽ được rà soát ngôn từ, văn phong, chính tả, tính đọc hiểu, dấu câu… bởi các biên tập viên có chuyên môn để mang đến những thông tin hữu ích nhất cho người đọc.
						</p>
					</div>

					<div class="policy-block">
						<h3 class="policy-subsection-title">Đội ngũ biên tập viên</h3>
						<p>
							Đội ngũ biên tập viên được đào tạo bài bản, có nhiều năm kinh nghiệm và nền tảng kiến thức vững vàng trong mảng sức khỏe mẹ bé. Đồng thời họ không ngừng cập nhật kiến thức mới trong lĩnh vực chăm sóc sức khỏe trẻ sơ sinh và phụ nữ sau sinh.
						</p>
						<p>
							Đội ngũ biên tập của Vạn Phúc Care cũng là những người chịu trách nhiệm chính cho việc cung cấp những chủ đề, sự kiện và vấn đề khách quan, chính xác và công bằng về mặt nội dung của website. Ngoài ra, đội ngũ biên tập của chúng tôi luôn cố gắng cung cấp thông tin chi tiết và trung thực, cũng như cam kết hành vi đạo đức và những tiêu chuẩn nghề nghiệp cao nhất.
						</p>
					</div>

					<div class="policy-block">
						<h3 class="policy-subsection-title">Chính sách chỉnh sửa</h3>
						<p>
							Chúng tôi luôn mong muốn mang đến giá trị và những trải nghiệm thông tin tốt nhất. Vì thế, <strong>Vạn Phúc Care cam kết chỉnh sửa và làm sáng tỏ những nội dung gốc khi cần thiết.</strong> Chúng tôi sẽ nhanh chóng chỉnh sửa dù là những sai sót nhỏ nhất về phiên âm, ngữ pháp hay thay đổi về văn phong. Và sự thay đổi này sẽ được cập nhật trên trang web của chúng tôi mà không cần thông báo.
						</p>
						<p>
							Nếu lỗi được xác định nằm trong nội dung, chúng tôi sẽ cập nhật nội dung sớm nhất có thể và tái bản bài viết đã được cập nhật.
						</p>
						<p>
							Do đó, Vạn Phúc Care khuyến khích khách hàng góp ý và trân trọng ý kiến của mọi người khi chia sẻ câu chuyện cá nhân. <strong>Nếu khách hàng có bất kỳ câu hỏi hoặc nhận xét nào về tính chính xác</strong> hoặc cảm thấy bài viết chưa được cập nhật hay phát hiện sai sót nào của chúng tôi, <strong>hãy liên hệ ngay</strong> bằng cách sử dụng các thông tin liên hệ ở cuối trang hoặc gửi email tới hòm thư <strong><a href="mailto:banbientap@vanphuccare.vn">banbientap@vanphuccare.vn</a></strong> để chúng tôi có thể cải thiện tốt hơn.
						</p>
					</div>

					<div class="policy-block">
						<h3 class="policy-subsection-title">Cập nhật bài viết liên tục</h3>
						<p>
							<strong>Chúng tôi liên tục cập nhật thông tin trong các bài viết cũ và bổ sung các bài viết mới mỗi tuần</strong> để phục vụ, đáp ứng được nhu cầu và mang lại giá trị thông tin cao nhất cho độc giả.
						</p>
						<p class="policy-date-update">
							<strong>Cập nhật ngày: 09/11/2023.</strong>
						</p>
					</div>

					<?php endif; ?>

					<!-- Related Terms & Policies Callout Box (Group 1000005850) -->
					<div class="related-policies-box">
						<h3 class="related-box-title">Điều khoản &amp; Chính sách liên quan</h3>
						<div class="related-box-line"></div>
						<ul class="related-box-links">
							<li><a href="<?php echo esc_url( home_url( '/dieu-khoan-su-dung' ) ); ?>">&bull; Điều khoản sử dụng</a></li>
							<li><a href="<?php echo esc_url( home_url( '/chinh-sach-bao-mat' ) ); ?>">&bull; Chính sách bảo mật</a></li>
							<li><a href="<?php echo esc_url( home_url( '/chinh-sach-bien-tap-va-chinh-sua' ) ); ?>">&bull; Chính sách biên tập &amp; chỉnh sửa</a></li>
							<li><a href="<?php echo esc_url( home_url( '/quy-trinh-tiep-nhan-va-giai-quyet-khieu-nai' ) ); ?>">&bull; Quy trình tiếp nhận &amp; giải quyết khiếu nại</a></li>
						</ul>
					</div>

				</div>
			</div>
		</section>

		<?php
	endwhile;
endif;

get_footer();
