<?php
/**
 * Milk - Consultation Lead Form Section.
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
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
				<?php
				get_template_part( 'template-parts/milk/form-fields', null, array(
					'prefix' => 'milk-section',
				) );
				?>
			</form>
		</div>
	</div>
</section>
