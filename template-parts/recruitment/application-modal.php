<?php
/**
 * Recruitment application modal states from Figma nodes 3481:28503,
 * 3481:28580, 3481:28773, 3481:28806 and 3481:28860.
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$modal_assets = get_template_directory_uri() . '/assets/images/recruitment-form';
$privacy_url  = home_url( '/chinh-sach-bao-mat/' );
?>

<div
	id="vpc-recruitment-application-modal"
	class="vpc-recruitment-modal"
	role="dialog"
	aria-modal="true"
	aria-labelledby="vpc-recruitment-application-title"
	data-recruitment-modal
	hidden
>
	<div class="vpc-recruitment-modal__dialog" data-recruitment-dialog>
		<div class="vpc-recruitment-modal__state" data-recruitment-state="form" data-recruitment-form-panel="apply">
			<form class="vpc-recruitment-modal__form" method="post" enctype="multipart/form-data" data-recruitment-form="apply">
				<?php wp_nonce_field( 'vpc_consultation_nonce', 'nonce' ); ?>
				<input type="hidden" name="website" value="" tabindex="-1" autocomplete="off" aria-hidden="true">
				<input type="hidden" name="question" value="Ứng tuyển vị trí: Điều dưỡng - Hộ sinh làm việc tại trung tâm ở cữ">

				<div class="vpc-recruitment-modal__header">
					<div>
						<h2 id="vpc-recruitment-application-title">Ứng tuyển ngay</h2>
						<p>Bộ phận nhân sự sẽ liên hệ với bạn sau khi nhận hồ sơ.</p>
					</div>
					<button class="vpc-recruitment-modal__close" type="button" data-recruitment-close aria-label="Đóng cửa sổ"><img src="<?php echo esc_url( $modal_assets . '/xmark.svg' ); ?>" width="24" height="24" alt=""></button>
				</div>

				<div class="vpc-recruitment-modal__position">
					<span>Vị trí ứng tuyển</span>
					<strong>Điều dưỡng - Hộ sinh làm việc tại trung tâm ở cữ</strong>
				</div>

				<div class="vpc-recruitment-modal__fields">
					<div class="vpc-recruitment-modal__field">
						<label for="recruitment-apply-name"><em>*</em> Họ và tên</label>
						<input id="recruitment-apply-name" name="full_name" type="text" placeholder="Nguyễn Thị Lan" autocomplete="name" required>
					</div>
					<div class="vpc-recruitment-modal__field-row">
						<div class="vpc-recruitment-modal__field">
							<label for="recruitment-apply-phone"><em>*</em> Số điện thoại</label>
							<input id="recruitment-apply-phone" name="phone" type="tel" placeholder="0912 345 678" inputmode="numeric" maxlength="10" autocomplete="tel" required>
						</div>
						<div class="vpc-recruitment-modal__field">
							<label for="recruitment-apply-email">Email</label>
							<input id="recruitment-apply-email" name="email" type="email" placeholder="ten@email.com" autocomplete="email">
						</div>
					</div>
					<div class="vpc-recruitment-modal__upload-field">
						<label for="recruitment-apply-cv">Đính kèm CV <span>(không bắt buộc)</span></label>
						<label class="vpc-recruitment-modal__dropzone" for="recruitment-apply-cv">
							<span><strong data-recruitment-file-name>Chọn tệp CV từ thiết bị</strong><small>PDF, DOC, DOCX · tối đa 5 MB</small></span>
							<span class="vpc-recruitment-modal__file-button">Chọn tệp</span>
							<input id="recruitment-apply-cv" name="cv" type="file" accept=".pdf,.doc,.docx,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
						</label>
					</div>
					<label class="vpc-recruitment-modal__consent" for="recruitment-apply-consent">
						<input id="recruitment-apply-consent" name="recruitment_consent" type="checkbox" value="1" required>
						<span>Tôi đồng ý để Vạn Phúc Care lưu và sử dụng thông tin cho mục đích tuyển dụng theo <a href="<?php echo esc_url( $privacy_url ); ?>" target="_blank" rel="noopener">Chính sách bảo mật</a>.</span>
					</label>
				</div>

				<div class="vpc-recruitment-modal__actions">
					<button class="vpc-recruitment-modal__button vpc-recruitment-modal__button--secondary" type="button" data-recruitment-close>Hủy</button>
					<button class="vpc-recruitment-modal__button vpc-recruitment-modal__button--primary" type="submit">Gửi hồ sơ</button>
				</div>
				<p class="vpc-recruitment-modal__status" data-recruitment-status role="status" aria-live="polite" hidden></p>
			</form>
		</div>

		<div class="vpc-recruitment-modal__state" data-recruitment-state="form" data-recruitment-form-panel="general" hidden>
			<form class="vpc-recruitment-modal__form" method="post" enctype="multipart/form-data" data-recruitment-form="general">
				<?php wp_nonce_field( 'vpc_consultation_nonce', 'nonce' ); ?>
				<input type="hidden" name="website" value="" tabindex="-1" autocomplete="off" aria-hidden="true">
				<input type="hidden" name="question" value="Gửi CV chung cho Vạn Phúc Care">

				<div class="vpc-recruitment-modal__header">
					<div>
						<h2>Gửi CV cho chúng tôi</h2>
						<p>Chúng tôi sẽ liên hệ khi có vị trí phù hợp.</p>
					</div>
					<button class="vpc-recruitment-modal__close" type="button" data-recruitment-close aria-label="Đóng cửa sổ"><img src="<?php echo esc_url( $modal_assets . '/xmark.svg' ); ?>" width="24" height="24" alt=""></button>
				</div>

				<div class="vpc-recruitment-modal__fields">
					<div class="vpc-recruitment-modal__field">
						<label for="recruitment-general-role">Nhóm nghề quan tâm</label>
						<div class="vpc-recruitment-modal__select-wrap"><select id="recruitment-general-role" name="recruitment_role"><option value="">Chọn nhóm nghề</option><option value="dieu-duong-ho-sinh">Điều dưỡng / Hộ sinh</option><option value="cham-soc-me-be">Chăm sóc mẹ và bé</option><option value="khac">Khác</option></select><img src="<?php echo esc_url( $modal_assets . '/chevron-down.svg' ); ?>" width="24" height="24" alt="" aria-hidden="true"></div>
					</div>
					<div class="vpc-recruitment-modal__field">
						<label for="recruitment-general-name"><em>*</em> Họ và tên</label>
						<input id="recruitment-general-name" name="full_name" type="text" placeholder="Nguyễn Thị Lan" autocomplete="name" required>
					</div>
					<div class="vpc-recruitment-modal__field-row">
						<div class="vpc-recruitment-modal__field"><label for="recruitment-general-phone"><em>*</em> Số điện thoại</label><input id="recruitment-general-phone" name="phone" type="tel" placeholder="0912 345 678" inputmode="numeric" maxlength="10" autocomplete="tel" required></div>
						<div class="vpc-recruitment-modal__field"><label for="recruitment-general-email">Email</label><input id="recruitment-general-email" name="email" type="email" placeholder="ten@email.com" autocomplete="email"></div>
					</div>
					<div class="vpc-recruitment-modal__upload-field">
						<label for="recruitment-general-cv">Đính kèm CV <span>(không bắt buộc)</span></label>
						<label class="vpc-recruitment-modal__dropzone" for="recruitment-general-cv"><span><strong data-recruitment-file-name>Chọn tệp CV từ thiết bị</strong><small>PDF, DOC, DOCX · tối đa 5 MB</small></span><span class="vpc-recruitment-modal__file-button">Chọn tệp</span><input id="recruitment-general-cv" name="cv" type="file" accept=".pdf,.doc,.docx,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document"></label>
					</div>
					<label class="vpc-recruitment-modal__consent" for="recruitment-general-consent"><input id="recruitment-general-consent" name="recruitment_consent" type="checkbox" value="1" required><span>Tôi đồng ý để Vạn Phúc Care lưu và sử dụng thông tin cho mục đích tuyển dụng theo <a href="<?php echo esc_url( $privacy_url ); ?>" target="_blank" rel="noopener">Chính sách bảo mật</a>.</span></label>
				</div>
				<div class="vpc-recruitment-modal__actions"><button class="vpc-recruitment-modal__button vpc-recruitment-modal__button--secondary" type="button" data-recruitment-close>Hủy</button><button class="vpc-recruitment-modal__button vpc-recruitment-modal__button--primary" type="submit">Gửi hồ sơ</button></div>
				<p class="vpc-recruitment-modal__status" data-recruitment-status role="status" aria-live="polite" hidden></p>
			</form>
		</div>

		<div class="vpc-recruitment-modal__state vpc-recruitment-modal__success" data-recruitment-success hidden>
			<div class="vpc-recruitment-modal__success-top"><button class="vpc-recruitment-modal__close" type="button" data-recruitment-close aria-label="Đóng cửa sổ"><img src="<?php echo esc_url( $modal_assets . '/xmark.svg' ); ?>" width="24" height="24" alt=""></button></div>
			<div class="vpc-recruitment-modal__illustration" aria-hidden="true"><img class="vpc-recruitment-modal__success-ellipse" src="<?php echo esc_url( $modal_assets . '/success-ellipse.svg' ); ?>" width="132" height="12" alt=""><img class="vpc-recruitment-modal__success-dragon" src="<?php echo esc_url( $modal_assets . '/success-illustration.png' ); ?>" width="200" height="200" alt=""><img class="vpc-recruitment-modal__success-check" src="<?php echo esc_url( $modal_assets . '/success-check.svg' ); ?>" width="68" height="68" alt=""></div>
			<div class="vpc-recruitment-modal__success-content"><h2>Đã nhận hồ sơ của bạn</h2><p>Bộ phận nhân sự sẽ liên hệ qua số điện thoại bạn đã cung cấp. Cảm ơn bạn đã quan tâm đến Vạn Phúc Care.</p></div>
			<div class="vpc-recruitment-modal__success-actions"><button class="vpc-recruitment-modal__button vpc-recruitment-modal__button--secondary" type="button" data-recruitment-success-other data-recruitment-url="<?php echo esc_url( home_url( '/tuyen-dung/' ) ); ?>">Xem vị trí khác</button><a class="vpc-recruitment-modal__button vpc-recruitment-modal__button--primary" href="<?php echo esc_url( home_url( '/tuyen-dung/' ) ); ?>">Về trang tuyển dụng</a></div>
		</div>
	</div>
</div>
