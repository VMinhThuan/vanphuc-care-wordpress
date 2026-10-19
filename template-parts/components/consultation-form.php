<?php
/**
 * Component: Consultation Form Card (Form Đăng ký tư vấn)
 * Matches Figma Form Board 1:1.
 *
 * @package VanPhucCare
 *
 * Usage:
 * get_template_part('template-parts/components/consultation-form', null, [
 *   'title'       => 'Đăng ký nhận tư vấn',
 *   'subtitle'    => 'Để lại thông tin để chuyên gia y tế liên hệ ngay',
 *   'action_url'  => '', // Form submit endpoint
 *   'class'       => '',
 * ]);
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$title       = $args['title'] ?? '';
$subtitle    = $args['subtitle'] ?? '';
$action_url  = $args['action_url'] ?? '';
$extra_class = $args['class'] ?? '';
?>

<div class="vpc-consultation-card bg-surface-background-default rounded-[24px] p-6 sm:p-8 md:p-9 border border-neutral-300 shadow-sm max-w-2xl mx-auto <?php echo esc_attr( $extra_class ); ?>">
	<?php if ( ! empty( $title ) ) : ?>
		<div class="mb-6 text-center">
			<h3 class="font-heading text-xl sm:text-2xl text-neutral-900 font-bold mb-2">
				<?php echo esc_html( $title ); ?>
			</h3>
			<?php if ( ! empty( $subtitle ) ) : ?>
				<p class="text-sm text-neutral-700">
					<?php echo esc_html( $subtitle ); ?>
				</p>
			<?php endif; ?>
		</div>
	<?php endif; ?>

	<form method="post" action="<?php echo esc_url( $action_url ); ?>" class="space-y-4 sm:space-y-5">
		<?php wp_nonce_field( 'vpc_consultation_form_submit', 'vpc_consultation_nonce' ); ?>

		<!-- Row 1: Họ tên + Số điện thoại -->
		<div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-5">
			<?php
			get_template_part( 'template-parts/components/form-input', null, [
				'id'          => 'vpc_full_name',
				'name'        => 'full_name',
				'label'       => 'Họ và tên',
				'type'        => 'text',
				'placeholder' => 'Nguyễn Như Linh',
				'required'    => true,
			] );
			?>

			<?php
			get_template_part( 'template-parts/components/form-input', null, [
				'id'          => 'vpc_phone',
				'name'        => 'phone',
				'label'       => 'Số điện thoại',
				'type'        => 'tel',
				'placeholder' => '0345678***',
				'required'    => true,
			] );
			?>
		</div>

		<!-- Row 2: Dịch vụ quan tâm -->
		<div>
			<?php
			get_template_part( 'template-parts/components/form-input', null, [
				'id'          => 'vpc_service',
				'name'        => 'service',
				'label'       => 'Dịch vụ quan tâm',
				'type'        => 'select',
				'placeholder' => 'Chọn dịch vụ bạn quan tâm',
				'required'    => true,
				'options'     => [
					'trung-tam-o-cu'      => 'Trung tâm ở cữ',
					'cham-soc-me-sau-sinh' => 'Chăm sóc mẹ sau sinh tại nhà',
					'tam-be-so-sinh'       => 'Tắm bé & massage sơ sinh',
					'thong-tac-tia-sua'   => 'Thông tắc tia sữa chuyên sâu',
					'dieu-duong-tai-nha'   => 'Điều dưỡng y tế tại nhà',
				],
			] );
			?>
		</div>

		<!-- Row 3: Tuần thai -->
		<div>
			<?php
			get_template_part( 'template-parts/components/form-input', null, [
				'id'          => 'vpc_gestational_age',
				'name'        => 'gestational_age',
				'label'       => 'Tuần thai',
				'type'        => 'select',
				'placeholder' => 'Chọn tuần thai hiện tại',
				'required'    => true,
				'options'     => [
					'chua-mang-thai' => 'Chưa mang thai / Đang chuẩn bị',
					'1-12-tuan'      => 'Mang thai 1 - 12 tuần (Tam cá nguyệt 1)',
					'13-27-tuan'     => 'Mang thai 13 - 27 tuần (Tam cá nguyệt 2)',
					'28-40-tuan'     => 'Mang thai 28 - 40 tuần (Tam cá nguyệt 3)',
					'da-sinh-be'     => 'Đã sinh bé',
				],
			] );
			?>
		</div>

		<!-- Row 4: Câu hỏi -->
		<div>
			<?php
			get_template_part( 'template-parts/components/form-input', null, [
				'id'          => 'vpc_question',
				'name'        => 'question',
				'label'       => 'Câu hỏi',
				'type'        => 'textarea',
				'placeholder' => 'Nhập câu hỏi hoặc yêu cầu cần tư vấn thêm...',
				'required'    => false,
				'rows'        => 3,
			] );
			?>
		</div>

		<!-- Row 5: Điều khoản sử dụng (Figma Board 8) -->
		<div>
			<?php
			get_template_part( 'template-parts/components/checkbox', null, [
				'id'       => 'vpc_terms_agree',
				'name'     => 'terms_agree',
				'label'    => 'Tôi đồng ý với <a href="' . esc_url( home_url( '/chinh-sach-bao-mat/' ) ) . '" target="_blank">điều khoản sử dụng</a>',
				'checked'  => true,
				'required' => true,
			] );
			?>
		</div>

		<!-- Submit Button -->
		<div class="pt-2">
			<?php
			get_template_part( 'template-parts/components/button', null, [
				'text'    => 'Đăng ký tư vấn ngay',
				'variant' => 'primary',
				'size'    => 'md',
				'type'    => 'submit',
				'class'   => 'w-full justify-center',
			] );
			?>
		</div>
	</form>
</div>
