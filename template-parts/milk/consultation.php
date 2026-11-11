<?php
/**
 * Milk - Consultation Lead Form Section.
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$milk_packages = array(
	'Gói 3 buổi'   => 'Gói 3 buổi',
	'Gói buổi lẻ'  => 'Gói buổi lẻ',
	'Gói 5 buổi'   => 'Gói 5 buổi',
);
?>
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
				<input type="hidden" name="service" value="thong-tac-tia-sua">

				<div class="vpc-consultation-form__identity">
					<div class="vpc-consultation-field">
						<label><span class="text-text-error-default">*</span> Họ và tên</label>
						<input type="text" name="customer_name" required placeholder="Nguyễn Như Linh" class="vpc-consultation-control">
					</div>
					<div class="vpc-consultation-field">
						<label><span class="text-text-error-default">*</span> Số điện thoại</label>
						<input type="tel" name="customer_phone" required placeholder="0345678***" class="vpc-consultation-control">
					</div>
				</div>

				<div class="vpc-consultation-field">
					<?php
					get_template_part( 'template-parts/components/custom-select', null, array(
						'id'          => 'milk-section-service-package',
						'name'        => 'service_package',
						'label'       => 'Gói dịch vụ quan tâm',
						'placeholder' => 'Gói 3 buổi',
						'value'       => 'Gói 3 buổi',
						'required'    => true,
						'options'     => $milk_packages,
					) );
					?>
				</div>

				<div class="vpc-consultation-field">
					<label>Ghi chú</label>
					<input type="text" name="customer_note" placeholder="Cho chúng tôi biết thêm về nhu cầu của bạn!" class="vpc-consultation-control">
				</div>

				<div class="vpc-consultation-submit"><button type="submit" class="vpc-button">Gửi yêu cầu tư vấn</button></div>
			</form>
		</div>
	</div>
</section>
