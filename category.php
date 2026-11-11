<?php
/**
 * Category archive template (Sub-Category knowledge page).
 *
 * Follows Figma Sub-Category reference layout.
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$current_cat  = get_queried_object();
$current_id   = $current_cat instanceof WP_Term ? $current_cat->term_id : 0;
$current_slug = $current_cat instanceof WP_Term ? $current_cat->slug : '';
$current_name = single_cat_title( '', false );
$current_desc = category_description();

if ( empty( $current_desc ) ) {
	$current_desc = sprintf(
		/* translators: %s: category name */
		__( 'Thông tin bổ ích và hướng dẫn chăm sóc %s an toàn, khoa học, được biên tập bởi đội ngũ điều dưỡng và chuyên gia Vạn Phúc Care.', 'vanphuccare' ),
		mb_strtolower( $current_name )
	);
}

$knowledge_uri = get_template_directory_uri() . '/assets/images/knowledge';
$asset = static function ( $name ) use ( $knowledge_uri ) {
	return esc_url( $knowledge_uri . '/' . $name );
};

// Category pills definition.
$categories_defs = array(
	array( 'slug' => '', 'label' => __( 'Tất cả', 'vanphuccare' ), 'icon' => 'category-1.svg' ),
	array( 'slug' => 'mang-thai', 'label' => __( 'Mang thai', 'vanphuccare' ), 'icon' => 'category-2.svg' ),
	array( 'slug' => 'phuong-phap-easy', 'label' => __( 'Phương pháp EASY', 'vanphuccare' ), 'icon' => 'category-3.svg' ),
	array( 'slug' => 'an-dam', 'label' => __( 'Ăn dặm', 'vanphuccare' ), 'icon' => 'category-4.svg' ),
	array( 'slug' => 'hoi-chung-bieng-an', 'label' => __( 'Hội chứng biếng ăn', 'vanphuccare' ), 'icon' => 'category-5.svg' ),
	array( 'slug' => 'cam-nang-cho-me', 'label' => __( 'Cẩm nang cho mẹ', 'vanphuccare' ), 'icon' => 'category-6.svg' ),
);

$categories = array();
foreach ( $categories_defs as $cat_def ) {
	$is_all = empty( $cat_def['slug'] );
	$url    = home_url( '/kien-thuc/' );
	$active = false;

	if ( ! $is_all ) {
		$cat_obj = get_category_by_slug( $cat_def['slug'] );
		if ( ! $cat_obj && 'phuong-phap-easy' === $cat_def['slug'] ) {
			$cat_obj = get_category_by_slug( 'easy' );
		} elseif ( ! $cat_obj && 'hoi-chung-bieng-an' === $cat_def['slug'] ) {
			$cat_obj = get_category_by_slug( 'tre-so-sinh-bieng-an-toan-tap' ) ?: get_category_by_slug( 'bieng-an' );
		} elseif ( ! $cat_obj && 'cam-nang-cho-me' === $cat_def['slug'] ) {
			$cat_obj = get_category_by_slug( 'cam-nang' );
		}

		if ( $cat_obj ) {
			$url    = get_category_link( $cat_obj->term_id );
			$active = ( (int) $cat_obj->term_id === (int) $current_id ) || ( $cat_def['slug'] === $current_slug ) || ( 'hoi-chung-bieng-an' === $cat_def['slug'] && 'tre-so-sinh-bieng-an-toan-tap' === $current_slug );
		} else {
			$url    = home_url( '/category/' . $cat_def['slug'] . '/' );
			$active = ( $cat_def['slug'] === $current_slug );
		}
	} else {
		$url    = home_url( '/kien-thuc/tat-ca/' );
		$active = ( 'kien-thuc' === $current_slug || ! empty( get_query_var( 'vpc_is_all' ) ) );
	}

	$categories[] = array(
		'slug'   => $cat_def['slug'],
		'label'  => $cat_def['label'],
		'icon'   => $cat_def['icon'],
		'url'    => $url,
		'active' => $active,
	);
}

$is_all_archive = ( 'kien-thuc' === $current_slug || ! empty( get_query_var( 'vpc_is_all' ) ) );
$hero_title     = $is_all_archive ? __( 'Tất Cả Kiến Thức', 'vanphuccare' ) : $current_name;
$main_title     = $is_all_archive ? __( 'Tất cả bài viết', 'vanphuccare' ) : sprintf( __( 'Bài viết %s', 'vanphuccare' ), $current_name );
?>

<div class="vpc-knowledge vpc-knowledge--subcategory">
	<!-- 1. Breadcrumbs -->
	<nav class="vpc-knowledge-breadcrumbs" aria-label="<?php esc_attr_e( 'Đường dẫn trang', 'vanphuccare' ); ?>">
		<div class="vpc-knowledge-container">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Trang chủ', 'vanphuccare' ); ?></a>
			<span class="vpc-knowledge-breadcrumbs__sep">&gt;</span>
			<a href="<?php echo esc_url( home_url( '/kien-thuc/' ) ); ?>"><?php esc_html_e( 'Kiến thức', 'vanphuccare' ); ?></a>
			<span class="vpc-knowledge-breadcrumbs__sep">&gt;</span>
			<span class="vpc-knowledge-breadcrumbs__current"><?php echo esc_html( $is_all_archive ? __( 'Tất cả bài viết', 'vanphuccare' ) : $current_name ); ?></span>
		</div>
	</nav>

	<!-- 2. Sub-Category Hero -->
	<section class="vpc-knowledge-subcat-hero">
		<div class="vpc-knowledge-container vpc-knowledge-subcat-hero__inner">
			<div class="vpc-knowledge-subcat-hero__copy">
				<h1><?php echo esc_html( $hero_title ); ?></h1>
				<div class="vpc-knowledge-subcat-hero__desc">
					<?php echo wp_kses_post( $current_desc ); ?>
				</div>
			</div>

			<div class="vpc-knowledge-subcat-hero__visual" aria-hidden="true">
				<div class="vpc-knowledge-subcat-hero__circle">
					<img src="<?php echo $asset( 'ultrasound.png' ); ?>" alt="" width="260" height="260">
				</div>
				<div class="vpc-knowledge-subcat-hero__mascot-wrap">
					<img class="vpc-knowledge-subcat-hero__mascot" src="<?php echo $asset( 'hero-mascot.png' ); ?>" alt="" width="120" height="120">
					<span class="vpc-knowledge-subcat-hero__badge">
						<img src="<?php echo $asset( 'star-light.svg' ); ?>" alt="" width="16" height="16">
						<span><?php echo esc_html( $hero_title ); ?></span>
					</span>
				</div>
			</div>
		</div>
	</section>

	<!-- 3. Category Pills Bar -->
	<section class="vpc-knowledge-subcat-pills-wrap">
		<div class="vpc-knowledge-container">
			<div class="vpc-knowledge-category-list" role="list">
				<?php foreach ( $categories as $category ) : ?>
					<a class="vpc-knowledge-category<?php echo ! empty( $category['active'] ) ? ' is-active' : ''; ?>" href="<?php echo esc_url( $category['url'] ); ?>" role="listitem">
						<span class="vpc-knowledge-category__icon"><img src="<?php echo $asset( $category['icon'] ); ?>" alt="" width="24" height="24" aria-hidden="true"></span>
						<span><?php echo esc_html( $category['label'] ); ?></span>
					</a>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<!-- 4. Main 2-Column Content Layout (Articles + Sidebar) -->
	<section class="vpc-knowledge-content vpc-knowledge-content--subcat">
		<div class="vpc-knowledge-container vpc-knowledge-layout">
			<!-- Main Left Column -->
			<main class="vpc-knowledge-main" id="primary">
				<h2 class="vpc-knowledge-main__title">
					<?php echo esc_html( $main_title ); ?>
				</h2>

				<?php if ( have_posts() ) : ?>
					<div class="vpc-knowledge-article-stack">
						<?php
						while ( have_posts() ) : the_post();
							$categories_list = get_the_category();

							// If browsing a specific sub-category (e.g. Mang thai), the card label matches the active category context (matching Production behavior).
							// If browsing 'Tất cả', pick the most specific child category (excluding the parent 'Kiến thức').
							if ( ! $is_all_archive && ! empty( $current_name ) ) {
								$cat_display = $current_name;
							} else {
								$primary_term = function_exists( 'vanphuccare_get_primary_category' )
									? vanphuccare_get_primary_category( get_the_ID() )
									: null;
								$cat_display  = $primary_term ? $primary_term->name : __( 'Cẩm nang cho mẹ', 'vanphuccare' );
							}

							$thumb_url = has_post_thumbnail()
								? get_the_post_thumbnail_url( get_the_ID(), 'large' )
								: $asset( 'mother-baby.jpeg' );

							$article_data = array(
								'id'       => get_the_ID(),
								'title'    => get_the_title(),
								'excerpt'  => wp_trim_words( get_the_excerpt(), 28, '...' ),
								'url'      => get_permalink(),
								'image'    => $thumb_url,
								'category' => $cat_display,
								'author'   => get_the_author_meta( 'display_name', (int) get_post()->post_author ) ?: 'Vạn Phúc Care',
								'date'     => get_the_date( 'd/m/Y' ),
							);

							get_template_part( 'template-parts/knowledge/card-horizontal', null, array( 'article' => $article_data ) );
						endwhile;
						?>
					</div>

					<!-- WordPress Numeric Pagination matching Figma < 1 2 3 4 5 > -->
					<div class="vpc-knowledge-pagination-wrap">
						<?php
						the_posts_pagination( array(
							'mid_size'  => 2,
							'prev_text' => '<span aria-hidden="true">&lsaquo;</span><span class="screen-reader-text">' . __( 'Trang trước', 'vanphuccare' ) . '</span>',
							'next_text' => '<span aria-hidden="true">&rsaquo;</span><span class="screen-reader-text">' . __( 'Trang sau', 'vanphuccare' ) . '</span>',
							'type'      => 'list',
						) );
						?>
					</div>
				<?php else : ?>
					<div class="vpc-knowledge-empty">
						<p><?php esc_html_e( 'Hiện chưa có bài viết nào trong chuyên mục này. Mời bạn quay lại sau!', 'vanphuccare' ); ?></p>
						<a class="vpc-knowledge-empty__btn" href="<?php echo esc_url( home_url( '/kien-thuc/' ) ); ?>"><?php esc_html_e( 'Về trang Kiến Thức', 'vanphuccare' ); ?></a>
					</div>
				<?php endif; ?>
			</main>

			<!-- Right Sidebar Column -->
			<?php get_template_part( 'template-parts/knowledge/sidebar' ); ?>
		</div>
	</section>
</div>

<?php get_footer(); ?>
