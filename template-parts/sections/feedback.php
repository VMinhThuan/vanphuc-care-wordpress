<?php
/**
 * Reusable customer feedback marquee section.
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$args = isset( $args ) && is_array( $args ) ? $args : array();

$default_items = array(
	array(
		'name'  => 'Nguyễn Thị Ngọc Trân',
		'image' => 'avatars/customer_1.webp',
		'copy'  => 'Đánh giá 5 sao cho dịch vụ tại Vạn Phúc Care, đặc biệt là cô Hạnh, cô Nga. Đúng giờ, nhiệt tình và nhẹ nhàng. Trộm vía bé tắm, ngủ rất ngoan.',
	),
	array(
		'name'  => 'Phạm Thị Thanh Lý',
		'image' => 'avatars/customer_2.webp',
		'copy'  => 'Mình rất hài lòng với dịch vụ Bảo mẫu tại nhà của Vạn Phúc Care. Các cô chăm bé cẩn thận, khéo léo và luôn đồng hành cùng gia đình.',
	),
	array(
		'name'  => 'Nguyễn Như Ân',
		'image' => 'avatars/customer_3.webp',
		'copy'  => 'Đội ngũ Vạn Phúc Care nhiệt tình, nhẹ nhàng và chuyên nghiệp. Gia đình mình rất yên tâm khi sử dụng dịch vụ.',
	),
	array(
		'name'  => 'La Thanh Nhàn',
		'image' => 'avatars/customer_4.webp',
		'copy'  => 'Mình rất hài lòng với dịch vụ chăm sóc mẹ và bé tại Vạn Phúc Care. Sự tư vấn tận tình giúp gia đình yên tâm hơn mỗi ngày.',
	),
	array(
		'name'  => 'Nguyễn Thị Ngọc Trân',
		'image' => 'avatars/customer_5.webp',
		'copy'  => 'Dịch vụ chu đáo, các cô tận tâm và có chuyên môn. Mình sẽ tiếp tục giới thiệu Vạn Phúc Care tới bạn bè và người thân.',
	),
);

$items        = isset( $args['items'] ) && is_array( $args['items'] ) && ! empty( $args['items'] ) ? $args['items'] : $default_items;
$image_prefix = isset( $args['image_prefix'] ) ? trim( (string) $args['image_prefix'], '/' ) : '';
$badge        = isset( $args['badge'] ) ? (string) $args['badge'] : 'FEEDBACK';
$description  = isset( $args['description'] ) && is_array( $args['description'] ) ? $args['description'] : array(
	'Trong hành trình cùng mẹ trải đầy yêu thương, Vạn Phúc Care đã nhận được sự tin yêu của hàng ngàn mẹ bỉm.',
	'Chúng tôi cam kết đồng hành cùng Mẹ và Bé trong 2 năm đầu đời.',
);
$image_url    = static function ( $path ) use ( $image_prefix ) {
	$path = ( $image_prefix ? $image_prefix . '/' : '' ) . ltrim( (string) $path, '/' );
	return function_exists( 'vpc_image_url' ) ? vpc_image_url( $path, 'thumbnail' ) : '';
};

$row_one = array_merge( $items, $items );
$row_two = array_merge( array_reverse( $items ), array_reverse( $items ) );
?>

<section id="feedback" class="vpc-section bg-surface-background-default overflow-hidden relative" aria-labelledby="feedback-title">
	<div class="vpc-home-container text-center mb-10 sm:mb-14">
		<div class="inline-flex items-center justify-center gap-2 px-3.5 py-1 bg-surface-badge-secondary border border-border-secondary-default rounded-full mb-3 shadow-xs">
			<img src="<?php echo esc_url( vpc_theme_asset_url( 'icons/sparkle-pink.svg' ) ); ?>" width="24" height="24" class="w-4 h-4 shrink-0" alt="" aria-hidden="true">
			<span class="font-body font-medium text-xs sm:text-sm text-text-link-hover tracking-wider uppercase"><?php echo esc_html( $badge ); ?></span>
		</div>
		<h2 id="feedback-title" class="font-heading font-semibold text-h1-mobile xl:text-h1 text-center">
			<span class="text-text-heading-primary-default">Cảm Nhận </span><br class="sm:hidden">
			<span class="text-text-heading-secondary-default">Của Khách Hàng</span>
		</h2>
		<p class="vpc-feedback-description w-full max-w-4xl mx-auto mt-3 text-center font-body font-medium text-sm sm:text-base text-text-body-default leading-6">
			<?php foreach ( $description as $description_line ) : ?>
				<span class="block text-center"><?php echo esc_html( $description_line ); ?></span>
			<?php endforeach; ?>
		</p>
	</div>

	<div class="relative w-full space-y-5 xl:space-y-6">
		<div class="pointer-events-none absolute inset-y-0 left-0 w-8 sm:w-20 bg-gradient-to-r from-neutral-100 to-transparent z-10"></div>
		<div class="pointer-events-none absolute inset-y-0 right-0 w-8 sm:w-20 bg-gradient-to-l from-neutral-100 to-transparent z-10"></div>

		<?php foreach ( array( array( 'items' => $row_one, 'animation' => 'animate-marquee' ), array( 'items' => $row_two, 'animation' => 'animate-marquee-reverse' ) ) as $row ) : ?>
			<div class="overflow-hidden w-full py-2 xl:py-9">
				<div class="<?php echo esc_attr( $row['animation'] ); ?> flex gap-5 w-max">
					<?php foreach ( $row['items'] as $item ) : ?>
						<?php $avatar_url = $image_url( $item['image'] ); ?>
						<article class="w-[290px] sm:w-[349px] shrink-0 bg-surface-card-default rounded-xl p-6 sm:px-8 sm:py-6 sm:min-h-[269px] border border-neutral-100 flex flex-col justify-between">
							<div>
								<div class="flex items-start justify-between gap-3">
									<div class="flex items-center gap-3">
										<?php if ( $avatar_url ) : ?><img src="<?php echo esc_url( $avatar_url ); ?>" alt="<?php echo esc_attr( $item['name'] ); ?>" class="w-10 h-10 rounded-full object-cover shrink-0"><?php endif; ?>
										<div>
											<h3 class="font-body font-semibold text-sm text-text-body-default leading-tight"><?php echo esc_html( $item['name'] ); ?></h3>
											<div class="flex items-center gap-1 mt-1.5"><?php get_template_part( 'template-parts/components/rating-stars' ); ?></div>
										</div>
									</div>
									<img src="<?php echo esc_url( vpc_theme_asset_url( 'bao-mau/quotation.svg' ) ); ?>" width="23.5" height="15.5" class="shrink-0 opacity-80 mt-1" alt="" aria-hidden="true">
								</div>
								<div class="w-full h-[1px] bg-neutral-400/70 my-3.5"></div>
								<p class="font-body text-base leading-relaxed text-text-body-default font-normal"><?php echo esc_html( $item['copy'] ); ?></p>
							</div>
						</article>
					<?php endforeach; ?>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</section>
