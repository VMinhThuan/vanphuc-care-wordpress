<?php
/**
 * O Cu - Consultation Form Section.
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$room_options = array(
	'Standard Balcony' => 'Standard Balcony',
	'Standard Cozy'    => 'Standard Cozy',
	'Deluxe Premium'   => 'Deluxe Premium',
	'Deluxe Classic'   => 'Deluxe Classic',
	'Suite'            => 'Suite',
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
				<input type="hidden" name="service" value="trung-tam-o-cu">

				<div class="vpc-consultation-form__identity">
					<div class="vpc-consultation-field">
						<label><span class="text-text-error-default">*</span> Họ và tên</label>
						<input type="text" name="customer_name" required placeholder="Nguyễn Như Linh" class="vpc-consultation-control">
					</div>
					<div class="vpc-consultation-field">
						<label><span class="text-text-error-default">*</span> Số điện thoại</label>
						<input type="tel" name="customer_phone" required placeholder="0345678***" inputmode="numeric" maxlength="10" autocomplete="tel" class="vpc-consultation-control">
					</div>
				</div>

				<div class="vpc-consultation-field">
					<?php
					get_template_part( 'template-parts/components/custom-select', null, array(
						'id'          => 'ocu-section-room-tier',
						'name'        => 'room_tier',
						'label'       => 'Hạng phòng',
						'placeholder' => 'Standard Balcony',
						'value'       => 'Standard Balcony',
						'required'    => true,
						'options'     => $room_options,
					) );
					?>
				</div>

				<div class="vpc-consultation-field">
					<label for="ocu-expected-due-date"><span class="text-text-error-default">*</span> Ngày dự sinh</label>
					<div class="relative">
						<input
							id="ocu-expected-due-date"
							type="date"
							name="expected_due_date"
							required
							min="<?php echo esc_attr( gmdate( 'Y-m-d' ) ); ?>"
							onclick="this.showPicker &amp;&amp; this.showPicker()"
							class="vpc-consultation-control pr-10 cursor-pointer"
						>
						<span class="pointer-events-none absolute inset-y-0 right-4 flex items-center text-neutral-500">
							<svg class="w-5 h-5 text-neutral-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
								<path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
							</svg>
						</span>
					</div>
				</div>

				<div class="vpc-consultation-field">
					<label>Ghi chú</label>
					<input type="text" name="customer_note" placeholder="Cho chúng tôi biết thêm về nhu cầu của bạn!" class="vpc-consultation-control">
				</div>

				<?php get_template_part( 'template-parts/components/turnstile' ); ?>

				<div class="vpc-consultation-submit"><button type="submit" class="vpc-button">Gửi yêu cầu tư vấn</button></div>
			</form>
		</div>
	</div>
</section>

