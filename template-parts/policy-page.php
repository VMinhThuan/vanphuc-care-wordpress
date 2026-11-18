<?php
/**
 * Policy Documentation Hub Template Part.
 *
 * Implements the 3-column Figma documentation spec:
 * - Desktop: Left navigation hub with search, Center article with meta & reading time, Right sticky TOC.
 * - Mobile: Top policy dropdown trigger, Bottom sheet navigation modal, and Collapsible TOC accordion.
 *
 * Automatically displays published policy pages assigned via the "Cài đặt Chính sách" meta box,
 * or the default established policy pages. Pages not published or not yet created are excluded.
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$policy_key        = isset( $args['policy_key'] ) ? sanitize_key( $args['policy_key'] ) : '';
$current_page_slug = is_page() ? get_post_field( 'post_name', get_queried_object_id() ) : '';

$known_defaults = array(
	'dieu-khoan-su-dung'                          => array( 'group' => 'phap-ly',  'order' => 1 ),
	'chinh-sach-bao-mat'                          => array( 'group' => 'phap-ly',  'order' => 2 ),
	'chinh-sach-bien-tap-va-chinh-sua'            => array( 'group' => 'noi-dung', 'order' => 1 ),
	'quy-trinh-tiep-nhan-va-giai-quyet-khieu-nai' => array( 'group' => 'dich-vu',  'order' => 1 ),
);

$group_meta_labels = array(
	'phap-ly'  => 'Pháp lý',
	'noi-dung' => 'Nội dung',
	'dich-vu'  => 'Dịch vụ',
);

$policy_groups = array(
	'phap-ly'  => array(
		'label' => 'PHÁP LÝ',
		'items' => array(),
	),
	'noi-dung' => array(
		'label' => 'NỘI DUNG',
		'items' => array(),
	),
	'dich-vu'  => array(
		'label' => 'DỊCH VỤ',
		'items' => array(),
	),
);

// Query ONLY published pages from WordPress database.
// Pages that do not exist or are draft/trash will NOT be displayed.
$published_pages = get_posts( array(
	'post_type'      => 'page',
	'post_status'    => 'publish',
	'posts_per_page' => -1,
	'orderby'        => 'menu_order title',
	'order'          => 'ASC',
) );

foreach ( $published_pages as $p ) {
	$slug  = $p->post_name;
	$group = get_post_meta( $p->ID, 'vpc_policy_group', true );
	$order = get_post_meta( $p->ID, 'vpc_policy_order', true );

	if ( empty( $group ) && isset( $known_defaults[ $slug ] ) ) {
		$group = $known_defaults[ $slug ]['group'];
		if ( '' === $order ) {
			$order = $known_defaults[ $slug ]['order'];
		}
	}

	if ( ! empty( $group ) && isset( $policy_groups[ $group ] ) ) {
		$policy_groups[ $group ]['items'][ $slug ] = array(
			'key'      => $slug,
			'slug'     => $slug,
			'title'    => $p->post_title,
			'url'      => get_permalink( $p->ID ),
			'category' => isset( $group_meta_labels[ $group ] ) ? $group_meta_labels[ $group ] : 'Chính sách',
			'order'    => '' !== $order ? intval( $order ) : 99,
			'node'     => '3388:50961',
		);
	}
}

// Sort items within each group by order ASC
foreach ( $policy_groups as $g_key => &$g_val ) {
	if ( ! empty( $g_val['items'] ) ) {
		uasort( $g_val['items'], function ( $a, $b ) {
			if ( $a['order'] === $b['order'] ) {
				return strcmp( $a['title'], $b['title'] );
			}
			return ( $a['order'] < $b['order'] ) ? -1 : 1;
		} );
	}
}
unset( $g_val );

// Remove groups that have zero published items
$policy_groups = array_filter( $policy_groups, function ( $g ) {
	return ! empty( $g['items'] );
} );

// Map slug and key to find current active policy.
$all_policies = array();
foreach ( $policy_groups as $group ) {
	foreach ( $group['items'] as $item_key => $item ) {
		$all_policies[ $item_key ]     = $item;
		$all_policies[ $item['slug'] ] = $item;
	}
}

$current_policy = null;
if ( $policy_key && isset( $all_policies[ $policy_key ] ) ) {
	$current_policy = $all_policies[ $policy_key ];
} elseif ( $current_page_slug && isset( $all_policies[ $current_page_slug ] ) ) {
	$current_policy = $all_policies[ $current_page_slug ];
} elseif ( ! empty( $all_policies ) ) {
	$current_policy = reset( $all_policies );
} else {
	$current_policy = array(
		'key'      => 'terms',
		'slug'     => 'dieu-khoan-su-dung',
		'title'    => 'Điều khoản sử dụng',
		'category' => 'Pháp lý',
		'node'     => '3388:50961',
	);
}

// Extract post content and calculate reading time.
$stored_content   = (string) get_post_field( 'post_content', get_the_ID() );
$rendered_content = apply_filters( 'the_content', $stored_content );

// Ensure all <h2> have unique anchor IDs for TOC navigation.
$headings      = array();
$heading_index = 0;
$rendered_content = preg_replace_callback( '/<h2([^>]*)>(.*?)<\/h2>/is', function ( $matches ) use ( &$headings, &$heading_index ) {
	$attrs = $matches[1];
	$inner = $matches[2];
	$title = trim( wp_strip_all_tags( $inner ) );
	$id    = '';
	if ( preg_match( '/id=[\'"]([^\'"]+)[\'"]/i', $attrs, $id_match ) ) {
		$id = $id_match[1];
	} else {
		$heading_index++;
		$slug = sanitize_title( $title );
		$id   = $slug ? $slug : 'section-' . $heading_index;
		$attrs .= ' id="' . esc_attr( $id ) . '"';
	}
	if ( ! empty( $title ) ) {
		$headings[] = array(
			'id'    => $id,
			'title' => $title,
		);
	}
	return '<h2' . $attrs . '>' . $inner . '</h2>';
}, $rendered_content );

$plain_text    = wp_strip_all_tags( $stored_content );
$words         = preg_split( '/\s+/u', trim( $plain_text ) );
$word_count    = ( ! empty( $words ) && '' !== $words[0] ) ? count( $words ) : 0;
$read_time     = max( 1, (int) ceil( $word_count / 220 ) );
$modified_date = get_the_modified_date( 'd/m/Y' ) ?: '09/11/2023';
$page_title    = get_the_title() ?: $current_policy['title'];

get_header();
?>

<main class="vpc-policy-page" data-figma-node="<?php echo esc_attr( $current_policy['node'] ); ?>">
	<!-- Breadcrumbs Bar -->
	<nav class="vpc-policy-breadcrumbs" aria-label="Đường dẫn trang">
		<div class="vpc-policy-container">
			<ol class="vpc-policy-breadcrumbs__list">
				<li class="vpc-policy-breadcrumbs__item">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="vpc-policy-breadcrumbs__link">Trang chủ</a>
				</li>
				<li class="vpc-policy-breadcrumbs__sep" aria-hidden="true">/</li>
				<li class="vpc-policy-breadcrumbs__item">
					<span class="vpc-policy-breadcrumbs__text">Chính sách</span>
				</li>
				<li class="vpc-policy-breadcrumbs__sep" aria-hidden="true">/</li>
				<li class="vpc-policy-breadcrumbs__item vpc-policy-breadcrumbs__item--current" aria-current="page">
					<span><?php echo esc_html( $page_title ); ?></span>
				</li>
			</ol>
		</div>
	</nav>

	<!-- Mobile Policy Selector Bar (Visible only on mobile < 1024px) -->
	<div class="vpc-policy-mobile-bar lg:hidden">
		<div class="vpc-policy-container">
			<div class="vpc-policy-mobile-bar__label">CHÍNH SÁCH</div>
			<button type="button" class="vpc-policy-mobile-bar__btn" id="vpc-policy-sheet-trigger" aria-haspopup="dialog" aria-expanded="false" aria-controls="vpc-policy-sheet">
				<span class="vpc-policy-mobile-bar__btn-text"><?php echo esc_html( $page_title ); ?></span>
				<svg class="vpc-policy-mobile-bar__btn-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
					<polyline points="6 9 12 15 18 9"></polyline>
				</svg>
			</button>
		</div>
	</div>

	<!-- Main 3-Column Container -->
	<div class="vpc-policy-container">
		<div class="vpc-policy-grid">
			
			<!-- Column 1: Left Navigation Sidebar (Desktop) -->
			<aside class="vpc-policy-sidebar" aria-label="Mục lục chính sách">
				<div class="vpc-policy-sidebar__sticky">
					<!-- Search Input -->
					<div class="vpc-policy-search">
						<svg class="vpc-policy-search__icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
							<circle cx="11" cy="11" r="8"></circle>
							<line x1="21" y1="21" x2="16.65" y2="16.65"></line>
						</svg>
						<input type="search" class="vpc-policy-search__input" placeholder="Tìm chính sách..." aria-label="Tìm kiếm chính sách" autocomplete="off">
					</div>

					<!-- Grouped Nav Links -->
					<nav class="vpc-policy-nav" aria-label="Danh sách chính sách">
						<?php foreach ( $policy_groups as $group_id => $group ) : ?>
							<div class="vpc-policy-nav__group" data-group="<?php echo esc_attr( $group_id ); ?>">
								<div class="vpc-policy-nav__heading"><?php echo esc_html( $group['label'] ); ?></div>
								<ul class="vpc-policy-nav__list">
									<?php foreach ( $group['items'] as $item_key => $item ) : ?>
										<?php $is_active = ( $current_policy['key'] === $item_key || $current_page_slug === $item['slug'] ); ?>
										<li class="vpc-policy-nav__item" data-title="<?php echo esc_attr( mb_strtolower( $item['title'], 'UTF-8' ) ); ?>">
											<a href="<?php echo esc_url( home_url( '/' . $item['slug'] . '/' ) ); ?>"
											   class="vpc-policy-nav__link<?php echo $is_active ? ' is-active' : ''; ?>"
											   <?php echo $is_active ? ' aria-current="page"' : ''; ?>>
												<span class="vpc-policy-nav__link-text"><?php echo esc_html( $item['title'] ); ?></span>
											</a>
										</li>
									<?php endforeach; ?>
								</ul>
							</div>
						<?php endforeach; ?>
						<div class="vpc-policy-nav__empty hidden" aria-live="polite">
							Không tìm thấy chính sách phù hợp.
						</div>
					</nav>
				</div>
			</aside>

			<!-- Column 2: Center Article Content -->
			<article class="vpc-policy-article" aria-labelledby="vpc-policy-h1">
				<header class="vpc-policy-header">
					<h1 id="vpc-policy-h1" class="vpc-policy-title"><?php echo esc_html( $page_title ); ?></h1>
					
					<div class="vpc-policy-meta">
						<div class="vpc-policy-meta__info">
							<span class="vpc-policy-meta__category"><?php echo esc_html( $current_policy['category'] ); ?></span>
							<span class="vpc-policy-meta__sep" aria-hidden="true">·</span>
							<span class="vpc-policy-meta__updated">Cập nhật: <?php echo esc_html( $modified_date ); ?></span>
							<span class="vpc-policy-meta__sep" aria-hidden="true">·</span>
							<span class="vpc-policy-meta__read-time"><?php echo esc_html( $read_time ); ?> phút đọc</span>
						</div>
					</div>
				</header>

				<!-- Mobile TOC Accordion (Visible on Mobile only) -->
				<?php if ( ! empty( $headings ) ) : ?>
					<div class="vpc-policy-mobile-toc lg:hidden">
						<button type="button" class="vpc-policy-mobile-toc__trigger" aria-expanded="false" aria-controls="vpc-policy-mobile-toc-list">
							<span class="vpc-policy-mobile-toc__title">Mục lục bài viết</span>
							<svg class="vpc-policy-mobile-toc__arrow" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
								<polyline points="6 9 12 15 18 9"></polyline>
							</svg>
						</button>
						<div id="vpc-policy-mobile-toc-list" class="vpc-policy-mobile-toc__panel" hidden>
							<ol class="vpc-policy-mobile-toc__list">
								<?php foreach ( $headings as $h ) : ?>
									<li class="vpc-policy-mobile-toc__item">
										<a href="#<?php echo esc_attr( $h['id'] ); ?>" class="vpc-policy-mobile-toc__link">
											<?php echo esc_html( $h['title'] ); ?>
										</a>
									</li>
								<?php endforeach; ?>
							</ol>
						</div>
					</div>
				<?php endif; ?>

				<!-- Body Content -->
				<div class="vpc-policy-body entry-content">
					<?php echo $rendered_content; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				</div>
			</article>

			<!-- Column 3: Right TOC Rail (Desktop) -->
			<aside class="vpc-policy-toc-rail" aria-label="Trong trang này">
				<?php if ( ! empty( $headings ) ) : ?>
					<div class="vpc-policy-toc-rail__sticky">
						<div class="vpc-policy-toc-rail__heading">TRONG TRANG NÀY</div>
						<nav class="vpc-policy-toc" aria-label="Mục lục nội dung">
							<ul class="vpc-policy-toc__list">
								<?php foreach ( $headings as $idx => $h ) : ?>
									<li class="vpc-policy-toc__item">
										<a href="#<?php echo esc_attr( $h['id'] ); ?>"
										   class="vpc-policy-toc__link<?php echo 0 === $idx ? ' is-active' : ''; ?>"
										   data-target="<?php echo esc_attr( $h['id'] ); ?>">
											<?php echo esc_html( $h['title'] ); ?>
										</a>
									</li>
								<?php endforeach; ?>
							</ul>
						</nav>
					</div>
				<?php endif; ?>
			</aside>

		</div>
	</div>

	<!-- Mobile Bottom Sheet Dialog -->
	<div id="vpc-policy-sheet" class="vpc-policy-sheet" aria-hidden="true" role="dialog" aria-modal="true" aria-labelledby="vpc-sheet-title">
		<div class="vpc-policy-sheet__backdrop" data-sheet-close tabindex="-1"></div>
		<div class="vpc-policy-sheet__dialog">
			<div class="vpc-policy-sheet__handle" aria-hidden="true"></div>
			<div class="vpc-policy-sheet__header">
				<h2 id="vpc-sheet-title" class="vpc-policy-sheet__title">Chính sách</h2>
				<button type="button" class="vpc-policy-sheet__close" data-sheet-close aria-label="Đóng bảng chính sách">
					<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
						<line x1="18" y1="6" x2="6" y2="18"></line>
						<line x1="6" y1="6" x2="18" y2="18"></line>
					</svg>
				</button>
			</div>
			
			<div class="vpc-policy-sheet__search">
				<div class="vpc-policy-search">
					<svg class="vpc-policy-search__icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
						<circle cx="11" cy="11" r="8"></circle>
						<line x1="21" y1="21" x2="16.65" y2="16.65"></line>
					</svg>
					<input type="search" class="vpc-policy-search__input vpc-policy-search__input--sheet" placeholder="Tìm chính sách..." aria-label="Tìm kiếm chính sách trong bảng chọn" autocomplete="off">
				</div>
			</div>

			<div class="vpc-policy-sheet__body">
				<nav class="vpc-policy-nav vpc-policy-nav--sheet" aria-label="Danh mục chính sách mobile">
					<?php foreach ( $policy_groups as $group_id => $group ) : ?>
						<div class="vpc-policy-nav__group" data-group="<?php echo esc_attr( $group_id ); ?>">
							<div class="vpc-policy-nav__heading"><?php echo esc_html( $group['label'] ); ?></div>
							<ul class="vpc-policy-nav__list">
								<?php foreach ( $group['items'] as $item_key => $item ) : ?>
									<?php $is_active = ( $current_policy['key'] === $item_key || $current_page_slug === $item['slug'] ); ?>
									<li class="vpc-policy-nav__item" data-title="<?php echo esc_attr( mb_strtolower( $item['title'], 'UTF-8' ) ); ?>">
										<a href="<?php echo esc_url( home_url( '/' . $item['slug'] . '/' ) ); ?>"
										   class="vpc-policy-nav__link<?php echo $is_active ? ' is-active' : ''; ?>"
										   <?php echo $is_active ? ' aria-current="page"' : ''; ?>>
											<span class="vpc-policy-nav__link-text"><?php echo esc_html( $item['title'] ); ?></span>
											<?php if ( $is_active ) : ?>
												<svg class="vpc-policy-nav__check" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
													<polyline points="20 6 9 17 4 12"></polyline>
												</svg>
											<?php endif; ?>
										</a>
									</li>
								<?php endforeach; ?>
							</ul>
						</div>
					<?php endforeach; ?>
					<div class="vpc-policy-nav__empty hidden" aria-live="polite">
						Không tìm thấy chính sách phù hợp.
					</div>
				</nav>
			</div>
		</div>
	</div>
</main>

<?php get_footer(); ?>
