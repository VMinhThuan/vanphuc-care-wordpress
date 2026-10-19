<?php
/**
 * Component: Accordion / FAQ
 * Conforms 100% to VPC Design System from Figma handoff.
 * 
 * Specs from Figma:
 * - Collapsed State: Border 1px #A5A5A5, Background #FAFAFA, Chevron DOWN (#1A77BA).
 * - Expanded State: Border 2px #F69B9C (secondary-300), Background #FAFAFA, Chevron UP (#1A77BA).
 * - Border Radius: 12px (rounded-xl).
 * - Typography: Question in Primary-600/700 (#1A77BA) font-semibold, Answer in Neutral-800 (#292929) leading-relaxed.
 *
 * @package VanPhucCare
 *
 * Usage:
 * get_template_part('template-parts/components/accordion', null, [
 *   'items' => [
 *     [
 *       'question' => 'Tôi có thể đăng ký dịch vụ chăm sóc mẹ và bé như thế nào?',
 *       'answer'   => 'Quý khách có thể liên hệ trực tiếp hotline 090 809 31 98 hoặc để lại thông tin tại biểu mẫu đăng ký trên website để được chuyên gia Vạn Phúc Care tư vấn phác đồ phù hợp nhất.',
 *       'open'     => true, // optional default open
 *     ],
 *     [
 *       'question' => 'Vạn Phúc Care có cung cấp dịch vụ tại nhà không?',
 *       'answer'   => 'Có, Vạn Phúc Care cung cấp dịch vụ bảo mẫu tại nhà, tắm bé sơ sinh, thông tắc tia sữa và chăm sóc mẹ sau sinh tận nhà theo tiêu chuẩn y khoa.',
 *     ]
 *   ],
 *   'class' => '',
 * ]);
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$items       = $args['items'] ?? array();
$extra_class = $args['class'] ?? '';

if ( empty( $items ) ) {
	return;
}
?>

<div class="vpc-accordion-group flex flex-col gap-4 sm:gap-5 w-full <?php echo esc_attr( $extra_class ); ?>" data-accordion-group>
	<?php foreach ( $items as $index => $item ) : ?>
		<?php
		$question   = $item['question'] ?? '';
		$answer     = $item['answer'] ?? '';
		$is_open    = ! empty( $item['open'] );
		$item_id    = 'accordion-item-' . wp_unique_id();
		$content_id = 'accordion-content-' . wp_unique_id();
		?>
		<details class="group vpc-accordion-item rounded-xl bg-surface-background-default transition-all duration-200 border border-neutral-300 open:border-2 open:border-secondary-300 open:shadow-xs" <?php echo $is_open ? 'open' : ''; ?>>
			<summary class="flex w-full cursor-pointer list-none items-center justify-between gap-4 px-6 py-5 sm:px-8 sm:py-6 select-none focus-visible:ring-2 focus-visible:ring-border-focus-default" id="<?php echo esc_attr( $item_id ); ?>" aria-controls="<?php echo esc_attr( $content_id ); ?>">
				<!-- Question Title -->
				<span class="font-heading text-base sm:text-lg font-semibold text-primary-700 transition-colors group-hover:text-primary-800">
					<?php echo esc_html( $question ); ?>
				</span>

				<!-- Expand / Collapse Arrow Icon (#1A77BA) -->
				<span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full text-primary-500 transition-transform duration-300 group-open:-rotate-180">
					<svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
						<path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
					</svg>
				</span>
			</summary>

			<!-- Answer Content -->
			<div id="<?php echo esc_attr( $content_id ); ?>" role="region" aria-labelledby="<?php echo esc_attr( $item_id ); ?>" class="border-t border-neutral-200/60 px-6 pt-4 pb-6 sm:px-8 sm:pt-5 sm:pb-7 text-base font-medium leading-relaxed text-text-body-default">
				<?php echo wp_kses_post( $answer ); ?>
			</div>
		</details>
	<?php endforeach; ?>
</div>
