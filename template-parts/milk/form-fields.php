<?php
/**
 * Milk - Reusable Consultation Form Fields.
 * Shared between on-page section consultation and popup modal.
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$prefix   = $args['prefix'] ?? 'milk-section';
$packages = array(
	'Gói 3 buổi'  => 'Gói 3 buổi',
	'Gói buổi lẻ' => 'Gói buổi lẻ',
	'Gói 5 buổi'  => 'Gói 5 buổi',
);
$default_package = $args['default_package'] ?? 'Gói 3 buổi';
?>
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
		<input type="tel" name="customer_phone" required placeholder="0345678***" inputmode="numeric" maxlength="10" autocomplete="tel" class="vpc-consultation-control">
	</div>
</div>

<div class="vpc-consultation-field">
	<?php
	get_template_part( 'template-parts/components/custom-select', null, array(
		'id'          => $prefix . '-service-package',
		'name'        => 'service_package',
		'label'       => 'Gói dịch vụ quan tâm',
		'placeholder' => $default_package,
		'value'       => $default_package,
		'required'    => true,
		'options'     => $packages,
	) );
	?>
</div>

<div class="vpc-consultation-field">
	<label>Ghi chú</label>
	<input type="text" name="customer_note" placeholder="Cho chúng tôi biết thêm về nhu cầu của bạn!" class="vpc-consultation-control">
</div>

<?php get_template_part( 'template-parts/components/turnstile' ); ?>

<div class="vpc-consultation-submit">
	<button type="submit" class="vpc-button">Gửi yêu cầu tư vấn</button>
</div>
