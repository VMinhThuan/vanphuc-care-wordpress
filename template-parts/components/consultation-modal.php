<?php
/**
 * Component: Consultation Modal Dialog (Popup Đăng ký nhận tư vấn)
 * Fully conforms to VPC Design System (Figma Board 9: Consultation Modal).
 *
 * Quy chuẩn thiết kế VPC Consultation Modal:
 * - Backdrop:
 *   + Nền tối mờ: rgba(41, 41, 41, 0.6) / bg-[#292929]/60 với backdrop-blur-sm
 *   + Animation fade in/out mượt mà
 * - Dialog Container (Modal Card):
 *   + Kích thước: max-w-[560px] (chiều rộng ~560px trên desktop, full-width trừ lề trên mobile)
 *   + Bo góc: 24px (rounded-[24px])
 *   + Nền: #FAFAFA, padding: p-6 sm:p-8 md:p-9 (32-36px)
 *   + Shadow: shadow-2xl / shadow-xl
 *   + Viền: không viền hoặc viền 1px #EBEBEB
 * - Header:
 *   + Nút Close (X): kích thước 15x15px stroke 1.5, màu #292929, hover xoay nhẹ / đổi màu primary-500
 *   + Tiêu đề: Font Fraunces, text-2xl sm:text-[28px], font-bold, màu #155F95 (Primary 700 / Brand Blue)
 *   + Mô tả phụ: Font Manrope, text-sm, màu #525252 (Neutral 700), "Để lại thông tin, Vạn Phúc Care sẽ liên hệ tư vấn cho Ba/Mẹ trong thời gian sớm nhất."
 * - Form Fields (Kế thừa trọn vẹn quy chuẩn Input/Select VPC):
 *   + Hàng 1 (2 cột): Họ và tên (*), Số điện thoại (*) -> placeholder "Nguyễn Như Linh", "0345678***"
 *   + Hàng 2: Dịch vụ quan tâm (*) -> Select dropdown trigger 50px, bo góc 12px, placeholder "Chọn dịch vụ"
 *   + Hàng 3: Câu hỏi -> Input/Textarea placeholder "Cho chúng tôi biết thêm về nhu cầu của bạn!"
 *   + Hàng 4: Nút Submit "Gửi tư vấn ngay" -> chiều cao 48px, bo góc 24px (rounded-full/rounded-2xl), bg #1A77BA (Primary 500), text trắng
 * - Trợ năng & Phím tắt:
 *   + Hỗ trợ phím Escape để đóng modal
 *   + Click backdrop ngoài modal để đóng
 *   + Trap focus cơ bản, aria-modal="true", role="dialog"
 *
 * @package VanPhucCare
 *
 * Usage:
 * get_template_part('template-parts/components/consultation-modal', null, [
 *   'modal_id'    => 'consultation-modal',
 *   'title'       => 'Đăng ký tư vấn',
 *   'subtitle'    => 'Để lại thông tin, Vạn Phúc Care sẽ liên hệ tư vấn cho Ba/Mẹ trong thời gian sớm nhất.',
 *   'action_url'  => '',
 * ]);
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$modal_id    = $args['modal_id'] ?? 'vpc-consultation-modal';
$title       = $args['title'] ?? 'Đăng ký tư vấn';
$subtitle    = $args['subtitle'] ?? 'Để lại thông tin, Vạn Phúc Care sẽ liên hệ tư vấn cho Ba/Mẹ trong thời gian sớm nhất.';
$action_url  = $args['action_url'] ?? '';
$extra_class = $args['class'] ?? '';
?>

<!-- Consultation Modal Backdrop & Container -->
<div
	id="<?php echo esc_attr( $modal_id ); ?>"
	class="vpc-consultation-modal fixed inset-0 z-50 hidden items-center justify-center p-4 sm:p-6 bg-surface-overlay backdrop-blur-sm transition-opacity duration-300 opacity-0 select-none <?php echo esc_attr( $extra_class ); ?>"
	role="dialog"
	aria-modal="true"
	aria-labelledby="<?php echo esc_attr( $modal_id ); ?>-title"
	data-modal
>
	<!-- Modal Card (Max-width 560px, Radius 24px, BG bg-surface-background-default, Figma 1:1) -->
	<div
		class="vpc-modal-card relative w-full max-w-[560px] bg-surface-background-default rounded-[24px] shadow-2xl p-6 sm:p-8 md:p-9 transition-transform duration-300 transform scale-95 select-text"
		data-modal-card
	>
		<!-- Close Button (X icon 1:1 Figma) -->
		<button
			type="button"
			class="vpc-modal-close absolute top-6 right-6 p-2 rounded-full text-text-body-default hover:text-primary-500 hover:bg-neutral-300 transition-colors duration-150 focus-visible:ring-2 focus-visible:ring-border-focus-default"
			aria-label="Đóng cửa sổ"
			data-modal-close
		>
			<svg class="w-4 h-4" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M2.5 13.5L13.5 2.5M13.5 13.5L2.5 2.5" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"/>
			</svg>
		</button>

		<!-- Header -->
		<div class="mb-6 pr-8">
			<h3
				id="<?php echo esc_attr( $modal_id ); ?>-title"
				class="font-heading text-2xl sm:text-[28px] leading-tight font-bold text-text-heading-primary-default mb-2"
			>
				<?php echo esc_html( $title ); ?>
			</h3>
			<?php if ( ! empty( $subtitle ) ) : ?>
				<p class="font-body text-sm text-text-body-muted leading-relaxed">
					<?php echo esc_html( $subtitle ); ?>
				</p>
			<?php endif; ?>
		</div>

		<!-- Form Content -->
		<form method="post" action="<?php echo esc_url( $action_url ); ?>" class="space-y-4">
			<?php wp_nonce_field( 'vpc_consultation_modal_submit', 'vpc_consultation_modal_nonce' ); ?>

			<!-- Row 1: Họ tên + Số điện thoại (2 columns) -->
			<div class="grid grid-cols-1 sm:grid-cols-2 gap-3.5 sm:gap-4">
				<?php
				get_template_part( 'template-parts/components/form-input', null, [
					'id'          => $modal_id . '-fullname',
					'name'        => 'full_name',
					'label'       => 'Họ và tên',
					'type'        => 'text',
					'placeholder' => 'Nguyễn Như Linh',
					'required'    => true,
				] );
				?>

				<?php
				get_template_part( 'template-parts/components/form-input', null, [
					'id'          => $modal_id . '-phone',
					'name'        => 'phone',
					'label'       => 'Số điện thoại',
					'type'        => 'tel',
					'placeholder' => '0345678***',
					'required'    => true,
				] );
				?>
			</div>

			<!-- Row 2: Dịch vụ quan tâm (Custom Select Dropdown Figma Board 8/9) -->
			<div>
				<?php
				get_template_part( 'template-parts/components/custom-select', null, [
					'id'          => $modal_id . '-service',
					'name'        => 'service',
					'label'       => 'Dịch vụ quan tâm',
					'placeholder' => 'Chọn dịch vụ',
					'required'    => true,
					'options'     => [
						[ 'value' => 'trung-tam-o-cu', 'label' => 'Trung tâm ở cữ' ],
						[ 'value' => 'cham-soc-me-sau-sinh', 'label' => 'Chăm sóc mẹ sau sinh tại nhà' ],
						[ 'value' => 'tam-be-so-sinh', 'label' => 'Tắm bé & massage sơ sinh' ],
						[ 'value' => 'thong-tac-tia-sua', 'label' => 'Thông tắc tia sữa chuyên sâu' ],
						[ 'value' => 'dieu-duong-tai-nha', 'label' => 'Điều dưỡng y tế tại nhà' ],
					],
				] );
				?>
			</div>

			<!-- Row 3: Câu hỏi (Input/Textarea) -->
			<div>
				<?php
				get_template_part( 'template-parts/components/form-input', null, [
					'id'          => $modal_id . '-question',
					'name'        => 'question',
					'label'       => 'Câu hỏi',
					'type'        => 'text',
					'placeholder' => 'Cho chúng tôi biết thêm về nhu cầu của bạn!',
					'required'    => false,
				] );
				?>
			</div>

			<!-- Row 4: Submit Button (Full width, Primary 500, Height 48px, Radius 24px) -->
			<div class="pt-2">
				<?php
				get_template_part( 'template-parts/components/button', null, [
					'text'    => 'Gửi tư vấn ngay',
					'variant' => 'primary',
					'size'    => 'md',
					'type'    => 'submit',
					'class'   => 'w-full justify-center rounded-2xl h-[48px]',
				] );
				?>
			</div>
		</form>
	</div>
</div>
