<?php
/**
 * Search results template for Vạn Phúc Care.
 *
 * Fully unified with Sub-Category knowledge page design:
 * - Sub-Category Hero (identical gradient colors, typography, and visual mascot)
 * - Category navigation pills
 * - 2-column layout (Articles column + Knowledge sidebar)
 * - Horizontal article cards with numeric pagination
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$knowledge_uri = get_template_directory_uri() . '/assets/images/knowledge';
$asset = static function ( $name ) use ( $knowledge_uri ) {
	return esc_url( $knowledge_uri . '/' . $name );
};

// Category pills resolved dynamically from Single Source of Truth (DRY & 404 safe).
$categories = function_exists( 'vpc_get_knowledge_category_pills' )
	? vpc_get_knowledge_category_pills( '', 0 )
	: array();

global $wp_query;
$search_query  = get_search_query();
$total_results = (int) $wp_query->found_posts;
?>

<div class="vpc-knowledge vpc-knowledge--subcategory vpc-knowledge--search">
	<!-- 1. Sub-Category Hero Header (Identical colors, typography, and visual layout) -->
	<section class="vpc-knowledge-subcat-hero">
		<div class="vpc-knowledge-container vpc-knowledge-subcat-hero__inner">
			<div class="vpc-knowledge-subcat-hero__copy">
				<nav class="vpc-knowledge-breadcrumbs" aria-label="<?php esc_attr_e( 'Đường dẫn trang', 'vanphuccare' ); ?>">
					<div class="vpc-knowledge-breadcrumbs__desktop">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Trang chủ', 'vanphuccare' ); ?></a>
						<span class="vpc-knowledge-breadcrumbs__sep" aria-hidden="true"><img src="<?php echo $asset( 'chevron-right.svg' ); ?>" alt="" width="16" height="16"></span>
						<a href="<?php echo esc_url( home_url( '/kien-thuc/' ) ); ?>"><?php esc_html_e( 'Kiến thức', 'vanphuccare' ); ?></a>
						<span class="vpc-knowledge-breadcrumbs__sep" aria-hidden="true"><img src="<?php echo $asset( 'chevron-right.svg' ); ?>" alt="" width="16" height="16"></span>
						<span class="vpc-knowledge-breadcrumbs__current"><?php printf( esc_html__( 'Tìm kiếm: "%s"', 'vanphuccare' ), esc_html( $search_query ) ); ?></span>
					</div>
					<a class="vpc-knowledge-breadcrumbs__mobile" href="<?php echo esc_url( home_url( '/kien-thuc/' ) ); ?>"><span aria-hidden="true">‹</span> <?php esc_html_e( 'Kiến thức', 'vanphuccare' ); ?></a>
				</nav>

				<h1><?php printf( esc_html__( 'Tìm kiếm: "%s"', 'vanphuccare' ), esc_html( $search_query ) ); ?></h1>

				<div class="vpc-knowledge-subcat-hero__desc vpc-knowledge-subcat-hero__desc--desktop">
					<p>
						<?php
						if ( $total_results > 0 ) {
							printf(
								/* translators: %d: number of articles found. */
								esc_html( _n( 'Tìm thấy %d bài viết phù hợp với từ khóa tìm kiếm của bạn trong kho kiến thức.', 'Tìm thấy %d bài viết phù hợp với từ khóa tìm kiếm của bạn trong kho kiến thức.', $total_results, 'vanphuccare' ) ),
								$total_results
							);
						} else {
							esc_html_e( 'Không tìm thấy bài viết nào phù hợp với từ khóa của bạn. Vui lòng thử lại với từ khóa khác hoặc khám phá các chuyên mục bên dưới.', 'vanphuccare' );
						}
						?>
					</p>
				</div>

				<div class="vpc-knowledge-subcat-hero__desc vpc-knowledge-subcat-hero__desc--mobile">
					<p>
						<?php
						if ( $total_results > 0 ) {
							printf(
								/* translators: %d: number of articles found. */
								esc_html( _n( 'Tìm thấy %d bài viết phù hợp.', 'Tìm thấy %d bài viết phù hợp.', $total_results, 'vanphuccare' ) ),
								$total_results
							);
						} else {
							esc_html_e( 'Không tìm thấy bài viết phù hợp.', 'vanphuccare' );
						}
						?>
					</p>
				</div>
			</div>

			<!-- Sub-Category Visual (Mascot & Decorative elements matching sub-category hero) -->
			<div class="vpc-knowledge-subcat-hero__visual" aria-hidden="true">
				<img class="vpc-knowledge-subcat-hero__blob" src="<?php echo $asset( 'mang-thai-blob.svg' ); ?>" alt="" width="300" height="300">
				<div class="vpc-knowledge-subcat-hero__photo">
					<img src="<?php echo $asset( 'mang-thai-photo-2.png' ); ?>" alt="" width="230" height="301">
				</div>
				<img class="vpc-knowledge-subcat-hero__sticker" src="<?php echo $asset( 'mang-thai-sticker.svg' ); ?>" alt="" width="130" height="130">
				<img class="vpc-knowledge-subcat-hero__mascot" src="<?php echo $asset( 'hero-mascot.png' ); ?>" alt="" width="114" height="114">
				<span class="vpc-knowledge-subcat-hero__badge"><img src="<?php echo $asset( 'mang-thai-dot.svg' ); ?>" alt="" width="10" height="10"><span><?php esc_html_e( 'Tra cứu kiến thức', 'vanphuccare' ); ?></span></span>
				<img class="vpc-knowledge-subcat-hero__heart" src="<?php echo $asset( 'mang-thai-heart.svg' ); ?>" alt="" width="26" height="26">
				<img class="vpc-knowledge-subcat-hero__heart-small" src="<?php echo $asset( 'mang-thai-heart-small.svg' ); ?>" alt="" width="16" height="16">
				<img class="vpc-knowledge-subcat-hero__sparkle" src="<?php echo $asset( 'mang-thai-sparkle.svg' ); ?>" alt="" width="20" height="20">
				<img class="vpc-knowledge-subcat-hero__dot-blue" src="<?php echo $asset( 'mang-thai-dot-blue.svg' ); ?>" alt="" width="8" height="8">
				<img class="vpc-knowledge-subcat-hero__dot-pink" src="<?php echo $asset( 'mang-thai-dot-pink.svg' ); ?>" alt="" width="8" height="8">
			</div>
		</div>
	</section>

	<!-- 2. Category Pills Navigation -->
	<?php if ( ! empty( $categories ) ) : ?>
		<section class="vpc-knowledge-subcat-pills-wrap">
			<div class="vpc-knowledge-container">
				<div class="vpc-knowledge-category-list" role="list">
					<?php foreach ( $categories as $category ) : ?>
						<a class="vpc-knowledge-category<?php echo ! empty( $category['active'] ) ? ' is-active' : ''; ?>" href="<?php echo esc_url( $category['url'] ); ?>" role="listitem">
							<span class="vpc-knowledge-category__icon"><img src="<?php echo $asset( $category['icon'] ); ?>" alt="" width="24" height="24" aria-hidden="true"></span>
							<span><?php echo esc_html( $category['label'] ); ?></span>
							<small><?php echo esc_html( $category['description'] ); ?></small>
						</a>
					<?php endforeach; ?>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<!-- 3. Main 2-Column Content Layout (Articles + Sidebar) -->
	<section class="vpc-knowledge-content vpc-knowledge-content--subcat">
		<div class="vpc-knowledge-container vpc-knowledge-layout">
			<!-- Main Left Column -->
			<main class="vpc-knowledge-main" id="primary">
				<h2 class="vpc-knowledge-main__title">
					<?php printf( esc_html__( 'Kết quả tìm kiếm (%d)', 'vanphuccare' ), $total_results ); ?>
				</h2>

				<?php if ( have_posts() ) : ?>
					<div class="vpc-knowledge-article-stack">
						<?php
						while ( have_posts() ) : the_post();
							$article_data = function_exists( 'vpc_format_knowledge_card' )
								? vpc_format_knowledge_card( get_post(), $asset( 'mother-baby.jpeg' ), 32 )
								: array();

							if ( ! empty( $article_data ) ) {
								get_template_part( 'template-parts/knowledge/card-horizontal', null, array( 'article' => $article_data ) );
							}
						endwhile;
						?>
					</div>

					<!-- WordPress Numeric Pagination matching Sub-Category (identical HTML & CSS) -->
					<div class="vpc-knowledge-pagination-wrap">
						<?php
						global $wp_query;
						$current_page = max( 1, (int) get_query_var( 'paged' ) );
						$total_pages  = max( 1, (int) $wp_query->max_num_pages );
						$page_links   = paginate_links( array(
							'base'      => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
							'format'    => '?paged=%#%',
							'current'   => $current_page,
							'total'     => $total_pages,
							'mid_size'  => 2,
							'end_size'  => 1,
							'prev_next' => false,
							'type'      => 'array',
						) );
						?>
						<?php if ( $page_links ) : ?>
							<nav class="pagination" aria-label="<?php esc_attr_e( 'Phân trang kết quả tìm kiếm', 'vanphuccare' ); ?>">
								<div class="nav-links">
									<?php if ( $current_page > 1 ) : ?>
										<a class="page-numbers prev" href="<?php echo esc_url( get_pagenum_link( $current_page - 1 ) ); ?>" aria-label="<?php esc_attr_e( 'Trang trước', 'vanphuccare' ); ?>"><img src="<?php echo $asset( 'chevron-prev.svg' ); ?>" alt="" width="24" height="24" aria-hidden="true"></a>
									<?php else : ?>
										<span class="page-numbers prev is-disabled" aria-disabled="true"><img src="<?php echo $asset( 'chevron-prev.svg' ); ?>" alt="" width="24" height="24" aria-hidden="true"><span class="screen-reader-text"><?php esc_html_e( 'Trang trước', 'vanphuccare' ); ?></span></span>
									<?php endif; ?>

									<?php foreach ( $page_links as $page_link ) : ?>
										<?php echo wp_kses_post( $page_link ); ?>
									<?php endforeach; ?>

									<?php if ( $current_page < $total_pages ) : ?>
										<a class="page-numbers next" href="<?php echo esc_url( get_pagenum_link( $current_page + 1 ) ); ?>" aria-label="<?php esc_attr_e( 'Trang sau', 'vanphuccare' ); ?>"><img src="<?php echo $asset( 'chevron-next.svg' ); ?>" alt="" width="24" height="24" aria-hidden="true"></a>
									<?php else : ?>
										<span class="page-numbers next is-disabled" aria-disabled="true"><img src="<?php echo $asset( 'chevron-next.svg' ); ?>" alt="" width="24" height="24" aria-hidden="true"><span class="screen-reader-text"><?php esc_html_e( 'Trang sau', 'vanphuccare' ); ?></span></span>
									<?php endif; ?>
								</div>
							</nav>
						<?php endif; ?>
					</div>
				<?php else : ?>
					<!-- Empty State -->
					<div class="vpc-knowledge-empty py-16 px-6 text-center bg-white rounded-2xl border border-neutral-100 shadow-sm">
						<div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-primary-50 text-primary-500 mb-4">
							<svg class="w-8 h-8 stroke-current" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"/></svg>
						</div>
						<h3 class="text-xl font-bold text-neutral-800 mb-2 font-heading">
							<?php esc_html_e( 'Không tìm thấy kết quả phù hợp', 'vanphuccare' ); ?>
						</h3>
						<p class="text-base text-text-body-muted max-w-md mx-auto mb-6">
							<?php printf( esc_html__( 'Rất tiếc, chúng tôi không tìm thấy bài viết nào khớp với từ khóa "%s". Bạn hãy thử kiểm tra lại chính tả hoặc tìm kiếm từ khóa khác.', 'vanphuccare' ), esc_html( $search_query ) ); ?>
						</p>
						<a href="<?php echo esc_url( home_url( '/kien-thuc/' ) ); ?>" class="inline-flex items-center justify-center px-6 py-3 rounded-full bg-primary-600 text-white font-medium text-sm hover:bg-primary-700 transition-colors shadow-sm">
							<?php esc_html_e( 'Xem tất cả kiến thức', 'vanphuccare' ); ?>
						</a>
					</div>
				<?php endif; ?>
			</main>

			<!-- Right Sidebar Column -->
			<?php get_template_part( 'template-parts/knowledge/sidebar' ); ?>
		</div>
	</section>
</div>

<?php
get_footer();
