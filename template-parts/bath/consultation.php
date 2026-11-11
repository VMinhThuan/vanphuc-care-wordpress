<?php
/**
 * Bath - Consultation Lead Form Section.
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$button_attrs = 'data-open-modal="vpc-consultation-modal" data-service="tam-be-tai-nha"';
?>
<section class="vpc-bath__lead" aria-labelledby="bath-lead-title">
	<div class="vpc-bath__container">
		<div class="vpc-bath__section-heading">
			<h2 id="bath-lead-title"><span>Sẵn Sàng Bắt Đầu</span><em>Hành Trình Làm Mẹ <span class="vpc-bath__lead-title-break vpc-lead-title-happiness">Hạnh Phúc</span></em></h2>
		</div>
		<div class="vpc-bath__lead-card">
			<div class="vpc-bath__lead-row">
				<label><span><b>*</b>Họ và tên</span><input type="text" placeholder="Nguyễn Như Linh" aria-label="Họ và tên"></label>
				<label><span><b>*</b>Số điện thoại</span><input type="tel" placeholder="0345678***" aria-label="Số điện thoại"></label>
			</div>
			<?php
			get_template_part( 'template-parts/components/custom-select', null, array(
				'id'          => 'bath-lead-package',
				'name'        => 'service_package',
				'label'       => 'Gói dịch vụ quan tâm',
				'placeholder' => 'Chọn gói dịch vụ',
				'value'       => 'goi-20-buoi',
				'options'     => array(
					'goi-20-buoi' => 'Gói 20 buổi',
					'goi-10-buoi' => 'Gói 10 buổi',
					'goi-30-buoi' => 'Gói 30 buổi',
				),
				'class'       => 'vpc-bath__lead-select',
			) );
			?>
			<label><span>Ghi chú</span><input type="text" placeholder="Cho chúng tôi biết thêm về nhu cầu của bạn!" aria-label="Ghi chú"></label>
			<button type="button" class="vpc-bath__button vpc-bath__button--primary" <?php echo $button_attrs; ?>>Gửi yêu cầu tư vấn</button>
		</div>
	</div>
</section>

