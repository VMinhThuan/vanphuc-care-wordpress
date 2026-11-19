<?php
/**
 * Search results template for Vạn Phúc Care.
 *
 * Follows Figma Search Results reference layout:
 * - Streamlined Search Hero (breadcrumbs, H1, centered/left search pill input)
 * - Heading: "Kết quả cho \"{keyword}\""
 * - Main articles stack with search term highlighting and numeric pagination
 * - Empty state with icon badge, maternal copy, suggested topics, and CTA button
 * - Clean sidebar with "Từ khóa gợi ý" and "Hotline tư vấn"
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

global $wp_query;
$search_query  = get_search_query();
$total_results = (int) $wp_query->found_posts;
?>

<div class="vpc-knowledge vpc-knowledge--subcategory vpc-knowledge--search">
	<!-- 1. Dedicated Search Hero Header (Figma specification) -->
	<section class="vpc-knowledge-search-hero">
		<div class="vpc-knowledge-container vpc-knowledge-search-hero__inner">
			<nav class="vpc-knowledge-breadcrumbs" aria-label="<?php esc_attr_e( 'Đường dẫn trang', 'vanphuccare' ); ?>">
				<div class="vpc-knowledge-breadcrumbs__desktop">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Trang chủ', 'vanphuccare' ); ?></a>
					<span class="vpc-knowledge-breadcrumbs__sep" aria-hidden="true"><img src="<?php echo $asset( 'chevron-right.svg' ); ?>" alt="" width="16" height="16"></span>
					<a href="<?php echo esc_url( home_url( '/kien-thuc/' ) ); ?>"><?php esc_html_e( 'Kiến thức', 'vanphuccare' ); ?></a>
					<span class="vpc-knowledge-breadcrumbs__sep" aria-hidden="true"><img src="<?php echo $asset( 'chevron-right.svg' ); ?>" alt="" width="16" height="16"></span>
					<span class="vpc-knowledge-breadcrumbs__current"><?php esc_html_e( 'Kết quả tìm kiếm', 'vanphuccare' ); ?></span>
				</div>
				<a class="vpc-knowledge-breadcrumbs__mobile" href="<?php echo esc_url( home_url( '/kien-thuc/' ) ); ?>"><span aria-hidden="true">‹</span> <?php esc_html_e( 'Kiến thức', 'vanphuccare' ); ?></a>
			</nav>

			<h1 class="vpc-knowledge-search-hero__title"><?php esc_html_e( 'Kết quả tìm kiếm', 'vanphuccare' ); ?></h1>

			<div class="vpc-knowledge-search-hero__form-wrap">
				<form class="vpc-knowledge-sidebar-search vpc-knowledge-search-hero__form" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
					<img src="<?php echo $asset( 'search.svg' ); ?>" alt="" width="20" height="20" aria-hidden="true">
					<label class="screen-reader-text" for="hero-search-input"><?php esc_html_e( 'Tìm bài viết', 'vanphuccare' ); ?></label>
					<input id="hero-search-input" type="search" name="s" placeholder="<?php esc_attr_e( 'Tìm bài viết...', 'vanphuccare' ); ?>" value="<?php echo esc_attr( $search_query ); ?>">
					<button type="submit"><?php esc_html_e( 'Tìm', 'vanphuccare' ); ?></button>
				</form>
			</div>
		</div>
	</section>

	<!-- 2. Main 2-Column Content Layout (Articles + Search Sidebar) -->
	<section class="vpc-knowledge-content vpc-knowledge-content--subcat vpc-knowledge-content--search">
		<div class="vpc-knowledge-container vpc-knowledge-layout">
			<!-- Main Left Column -->
			<main class="vpc-knowledge-main" id="primary">
				<h2 class="vpc-knowledge-main__title vpc-knowledge-search__results-title">
					<?php printf( esc_html__( 'Kết quả cho "%s"', 'vanphuccare' ), esc_html( $search_query ) ); ?>
				</h2>

				<?php if ( have_posts() ) : ?>
					<div class="vpc-knowledge-article-stack">
						<?php
						while ( have_posts() ) : the_post();
							$article_data = function_exists( 'vpc_format_knowledge_card' )
								? vpc_format_knowledge_card( get_post(), $asset( 'mother-baby.webp' ), 32 )
								: array();

							if ( ! empty( $article_data ) ) {
								if ( function_exists( 'vpc_highlight_search_keyword' ) && '' !== $search_query ) {
									$article_data['title_html']   = vpc_highlight_search_keyword( $article_data['title'], $search_query );
									$article_data['excerpt_html'] = vpc_highlight_search_keyword( $article_data['excerpt'], $search_query );
								}
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
					<!-- Empty State (Matching Figma: Icon Circle + Title + Gentle message + Category Pills + CTA) -->
					<div class="vpc-knowledge-search-empty">
						<div class="vpc-knowledge-search-empty__icon-wrap" aria-hidden="true">
							<img src="<?php echo $asset( 'search.svg' ); ?>" alt="" width="24" height="24">
						</div>
						<h3 class="vpc-knowledge-search-empty__title">
							<?php esc_html_e( 'Không tìm thấy bài viết phù hợp', 'vanphuccare' ); ?>
						</h3>
						<p class="vpc-knowledge-search-empty__desc">
							<?php esc_html_e( 'Mẹ thử kiểm tra lại chính tả, dùng từ khóa ngắn hơn hoặc chọn một chủ đề phổ biến bên dưới nhé.', 'vanphuccare' ); ?>
						</p>
						<div class="vpc-knowledge-search-empty__tags" role="list">
							<?php
							$empty_topics = array(
								array( 'label' => 'Ăn dặm', 'url' => home_url( '/category/an-dam/' ) ),
								array( 'label' => 'Phương pháp EASY', 'url' => home_url( '/category/phuong-phap-easy/' ) ),
								array( 'label' => 'Thai giáo', 'url' => home_url( '/category/mang-thai/' ) ),
								array( 'label' => 'Biếng ăn', 'url' => home_url( '/category/hoi-chung-bieng-an/' ) ),
							);
							foreach ( $empty_topics as $topic ) : ?>
								<a class="vpc-knowledge-search-empty__tag" href="<?php echo esc_url( $topic['url'] ); ?>" role="listitem">
									<?php echo esc_html( $topic['label'] ); ?>
								</a>
							<?php endforeach; ?>
						</div>
						<a class="vpc-knowledge-search-empty__cta" href="<?php echo esc_url( home_url( '/kien-thuc/' ) ); ?>">
							<?php esc_html_e( 'Xem tất cả bài viết', 'vanphuccare' ); ?>
						</a>
					</div>
				<?php endif; ?>
			</main>

			<!-- Right Sidebar Column (Automatically optimized for search: Suggested Keywords + Hotline) -->
			<?php get_template_part( 'template-parts/knowledge/sidebar', null, array( 'context' => 'search' ) ); ?>
		</div>
	</section>
</div>

<?php
get_footer();
