<?php
/**
 * Giới Thiệu - Consultation Form Section.
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="dang-ky-tu-van" class="about-section about-consultation" data-figma-node="3207:38681" aria-labelledby="about-consultation-title">
	<div class="about-consultation__heading" data-node-id="3207:38682">
		<h2 id="about-consultation-title">
			<span class="about-consultation__heading-blue" data-node-id="3207:38683">Sẵn Sàng Bắt Đầu</span>
			<span class="about-consultation__heading-pink" data-node-id="3207:38684">Hành Trình Làm Mẹ <span class="vpc-lead-title-happiness">Hạnh Phúc</span></span>
		</h2>
	</div>

	<div class="about-consultation-card" data-node-id="3207:38685">
		<form id="about-consultation-form" class="about-consultation-form" novalidate>
			<div class="about-consultation-form__identity">
				<div class="about-consultation-field" data-node-id="2315:21360">
					<label for="about-consultation-name"><span aria-hidden="true">*</span> Họ và tên</label>
					<input id="about-consultation-name" type="text" placeholder="Nguyễn Như Linh" autocomplete="name">
				</div>
				<div class="about-consultation-field" data-node-id="2315:21361">
					<label for="about-consultation-phone"><span aria-hidden="true">*</span> Số điện thoại</label>
					<input id="about-consultation-phone" type="tel" placeholder="0345678***" autocomplete="tel">
				</div>
			</div>

			<div class="about-consultation-field" data-node-id="2351:6890">
				<?php
				get_template_part( 'template-parts/components/custom-select', null, array(
					'id'          => 'about-consultation-service',
					'name'        => 'service',
					'label'       => 'Gói dịch vụ quan tâm',
					'placeholder' => 'Chọn gói dịch vụ',
					'value'       => 'goi-20-buoi',
					'options'     => array(
						'goi-20-buoi'     => 'Gói 20 buổi',
						'trung-tam-o-cu'  => 'Trung tâm ở cữ',
						'bao-mau-tai-nha' => 'Bảo mẫu tại nhà',
						'tam-be-so-sinh'  => 'Tắm bé sau sinh',
					),
					'class'       => 'about-consultation-shared-select',
				) );
				?>
			</div>

			<div class="about-consultation-field" data-node-id="2315:21363">
				<label for="about-consultation-note">Ghi chú</label>
				<input id="about-consultation-note" type="text" placeholder="Cho chúng tôi biết thêm về nhu cầu của bạn!">
			</div>

			<button type="button" class="about-consultation-submit" data-open-modal="vpc-consultation-modal" data-service="trung-tam-o-cu" data-node-id="2315:21364">Gửi yêu cầu tư vấn</button>
		</form>
	</div>
</section>

