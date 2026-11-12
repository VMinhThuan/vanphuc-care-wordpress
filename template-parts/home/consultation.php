<?php
/**
 * Template part: Homepage Section 10 - Đăng ký tư vấn (Sẵn sàng bắt đầu - Hành trình làm mẹ hạnh phúc).
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$consultation_services   = vpc_get_consultation_services();
$gestational_age_options = vpc_get_gestational_age_options();
?>

	<!-- =========================================================================
	     10. ĐĂNG KÝ TƯ VẤN (SẴN SÀNG BẮT ĐẦU - HÀNH TRÌNH LÀM MẸ HẠNH PHÚC)
	     ========================================================================= -->
	<section id="dang-ky-tu-van" class="vpc-section vpc-gradient-consultation relative overflow-hidden">
		<div class="consultation-section-inner vpc-home-container">

			<div class="vpc-consultation-heading">
				<h2>
					<span class="vpc-consultation-heading__blue">Sẵn Sàng Bắt Đầu</span>
					<span class="vpc-consultation-heading__pink">Hành Trình Làm Mẹ <span class="vpc-lead-title-happiness">Hạnh Phúc</span></span>
				</h2>
			</div>

			<div class="vpc-consultation-card">
				<form id="vpc-section-consultation-form" class="vpc-consultation-form">
					<?php wp_nonce_field( 'vpc_consultation_nonce', 'vpc_consultation_nonce' ); ?>
					<input type="text" name="website" value="" tabindex="-1" autocomplete="off" aria-hidden="true" class="hidden">

					<div class="vpc-consultation-form__identity">
						<div class="vpc-consultation-field">
							<label>
								<span class="text-text-error-default">*</span> Họ và tên
							</label>
							<input type="text" name="customer_name" required placeholder="Nguyễn Như Linh"
							       class="vpc-consultation-control">
						</div>

						<div class="vpc-consultation-field">
							<label>
								<span class="text-text-error-default">*</span> Số điện thoại
							</label>
							<input type="tel" name="customer_phone" required placeholder="0345678***"
							       class="vpc-consultation-control">
						</div>
					</div>

					<div class="vpc-consultation-field">
						<?php
						get_template_part( 'template-parts/components/custom-select', null, [
							'id'          => 'home-section-service',
							'name'        => 'service',
							'label'       => 'Dịch vụ quan tâm',
							'placeholder' => 'Trung tâm ở cữ',
							'required'    => true,
							'value'       => 'trung-tam-o-cu',
							'options'     => $consultation_services,
						] );
						?>
					</div>

					<fieldset class="vpc-consultation-field vpc-consultation-stage">
						<legend><span class="text-text-error-default">*</span> Giai đoạn thai kỳ</legend>
						<div class="vpc-consultation-stage__options" role="radiogroup" aria-label="Giai đoạn thai kỳ">
							<label><input type="radio" name="pregnancy_stage" value="dang-mang-thai" checked required><span>Đang mang thai</span></label>
							<label><input type="radio" name="pregnancy_stage" value="chuan-bi-mang-thai" required><span>Chuẩn bị mang thai</span></label>
							<label><input type="radio" name="pregnancy_stage" value="da-sinh-be" required><span>Đã sinh bé</span></label>
						</div>
					</fieldset>

					<div class="vpc-consultation-field">
						<?php
						get_template_part( 'template-parts/components/custom-select', null, [
							'id'          => 'home-section-gestational-age',
							'name'        => 'gestational_age',
							'label'       => 'Tuần thai',
							'placeholder' => 'Chọn giai đoạn',
							'required'    => true,
							'options'     => $gestational_age_options,
						] );
						?>
					</div>

					<div class="vpc-consultation-field">
						<label>Ghi chú</label>
						<input type="text" name="customer_note" placeholder="Cho chúng tôi biết thêm về nhu cầu của bạn!"
						       class="vpc-consultation-control">
					</div>

					<?php get_template_part( 'template-parts/components/turnstile' ); ?>

					<div class="vpc-consultation-submit">
						<button type="submit" class="vpc-button">
							Gửi yêu cầu tư vấn
						</button>
					</div>
				</form>
			</div>

		</div>
	</section>

