<?php
/**
 * Template part: Homepage Section 11 - Kiến thức nuôi con (Blog / Knowledge Section).
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$theme_uri = get_template_directory_uri();
?>

	<!-- =========================================================================
	     11. KIẾN THỨC NUÔI CON (Blog / Knowledge Section)
	     ========================================================================= -->
	<section id="kien-thuc-nuoi-con" class="vpc-section bg-surface-background-default relative overflow-hidden">
		<div class="vpc-home-container">
			<!-- Section Header -->
			<div class="text-center max-w-3xl mx-auto mb-6">
				<!-- Badge -->
				<div class="inline-flex items-center justify-center gap-2 px-3.5 py-1 bg-surface-badge-secondary border border-border-secondary-default rounded-full mb-3 shadow-xs">
					<img src="<?php echo esc_url( $theme_uri . '/assets/images/icons/sparkle-pink.svg' ); ?>" width="24" height="24" class="w-4 h-4 shrink-0" alt="" aria-hidden="true" />
					<span class="font-body font-medium text-xs sm:text-sm tracking-wider uppercase text-text-link-hover">BÀI VIẾT NỔI BẬT</span>
				</div>

				<!-- Title (Figma 48px) -->
				<h2 class="font-heading font-semibold text-h1-mobile xl:text-h1 text-center text-text-heading-primary-default">
					Kiến Thức Nuôi Con
				</h2>
			</div>

			<!-- Existing WordPress posts, preserving the Figma card layout. -->
			<div class="knowledge-cards-track flex flex-row overflow-x-auto scrollbar-none gap-4 px-0 mx-0 pb-2 snap-x snap-mandatory md:grid md:grid-cols-2 lg:grid-cols-3 md:mx-0 md:px-0 md:pb-0">
				<?php
				$featured_posts = new WP_Query( array(
					'post_type'           => 'post',
					'posts_per_page'      => 3,
					'ignore_sticky_posts' => true,
					'category_name'       => 'kien-thuc',
					'orderby'             => 'date',
					'order'               => 'DESC',
				) );
				if ( $featured_posts->have_posts() ) :
					while ( $featured_posts->have_posts() ) :
						$featured_posts->the_post();
						$categories = get_the_category();
						$category   = ! empty( $categories ) ? $categories[0]->name : __( 'Kiến thức', 'vanphuccare' );
						?>
						<article <?php post_class( 'knowledge-card min-w-[290px] w-[290px] md:min-w-0 md:w-auto snap-start bg-surface-card-default rounded-xl p-3 border border-neutral-100 shadow-[0px_4px_19px_rgba(0,0,0,0.08)] hover:shadow-md transition-all duration-300 flex flex-col group shrink-0 md:shrink' ); ?> data-post-id="<?php echo esc_attr( get_the_ID() ); ?>">
							<a href="<?php the_permalink(); ?>" class="relative w-full aspect-[380/219] rounded-lg overflow-hidden bg-neutral-100 mb-3 block">
								<?php if ( has_post_thumbnail() ) : ?>
									<?php the_post_thumbnail( 'medium_large', array( 'class' => 'w-full h-full object-cover transition-transform duration-500 group-hover:scale-105', 'loading' => 'lazy' ) ); ?>
								<?php else : ?>
									<?php $knowledge_fallback_image_url = vpc_image_url( 'blog_post_ultrasound.webp', 'medium_large' ); ?>
									<?php if ( $knowledge_fallback_image_url ) : ?>
										<img src="<?php echo esc_url( $knowledge_fallback_image_url ); ?>" alt="" class="w-full h-full object-cover" loading="lazy">
									<?php endif; ?>
								<?php endif; ?>
							</a>
							<div class="flex flex-col flex-grow">
								<span class="text-text-heading-primary-default font-semibold text-xs sm:text-sm mb-1.5 block"><?php echo esc_html( $category ); ?></span>
								<h3 class="font-body font-medium text-base sm:text-xl text-neutral-900 group-hover:text-text-heading-primary-default transition-colors leading-snug line-clamp-2 mb-2 font-bold"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								<p class="font-body text-sm sm:text-base text-text-body-muted leading-relaxed line-clamp-3 mb-4 flex-grow"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 28 ) ); ?></p>
								<div class="flex items-center justify-between pt-3 border-t border-neutral-100 mt-auto">
									<span class="text-xs font-medium text-neutral-700"><?php the_author(); ?></span>
									<time class="text-xs text-neutral-400 font-medium" datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
								</div>
							</div>
						</article>
					<?php endwhile; wp_reset_postdata(); ?>
				<?php endif; ?>
			</div>

			<!-- Bottom CTA Button -->
			<div class="text-center mt-6 sm:mt-10 flex justify-center">
				<?php
				$knowledge_category = get_category_by_slug( 'kien-thuc' );
				?>
				<?php if ( $knowledge_category ) : ?>
					<a href="<?php echo esc_url( get_category_link( $knowledge_category ) ); ?>" class="vpc-button w-full max-w-[350px] sm:w-auto h-10 xl:h-12 px-4 xl:px-6 inline-flex items-center justify-center rounded-full bg-transparent border border-border-secondary-default text-text-heading-secondary-default hover:bg-surface-badge-secondary/60 transition-colors">
						Xem tất cả
					</a>
				<?php endif; ?>
			</div>
		</div>
	</section>

