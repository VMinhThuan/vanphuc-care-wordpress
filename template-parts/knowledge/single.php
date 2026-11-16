<?php
/**
 * Universal reading layout for editorial posts (Knowledge, News, and standard posts).
 *
 * @package VanPhucCare
 */

$article_id = get_the_ID();
$section    = $args['section'] ?? '';
$category   = vanphuccare_get_primary_category();
$protected  = post_password_required();
$raw_body   = $protected ? '' : get_the_content();
$cover_id   = get_post_thumbnail_id();
$excerpt    = $protected ? '' : trim( (string) get_post_field( 'post_excerpt', $article_id ) );
$words      = preg_split( '/\s+/u', wp_strip_all_tags( strip_shortcodes( $raw_body ) ), -1, PREG_SPLIT_NO_EMPTY );

// Determine section context: Primary Category takes precedence over secondary categories
if ( function_exists( 'vpc_is_news_category' ) && vpc_is_news_category( $category ) ) {
	$is_news = true;
} elseif ( function_exists( 'vpc_is_knowledge_category' ) && vpc_is_knowledge_category( $category ) ) {
	$is_news = false;
} elseif ( ! empty( $section ) ) {
	$is_news = ( 'news' === $section );
} elseif ( function_exists( 'vpc_is_news_post' ) && vpc_is_news_post( $article_id ) ) {
	$is_news = true;
} else {
	$is_news = false;
}

if ( $is_news ) {
	$section_url   = home_url( '/tin-tuc/' );
	$section_label = __( 'Tin tức', 'vanphuccare' );
	$section_slug  = 'tin-tuc';
} elseif ( ! $category || ( function_exists( 'vpc_is_knowledge_category' ) && vpc_is_knowledge_category( $category ) ) ) {
	$section_url   = home_url( '/kien-thuc/' );
	$section_label = __( 'Kiến thức', 'vanphuccare' );
	$section_slug  = 'kien-thuc';
} else {
	if ( $category->parent ) {
		$top_term      = get_term( (int) $category->parent, 'category' );
		$section_url   = ( $top_term instanceof WP_Term ) ? get_category_link( $top_term ) : get_category_link( $category );
		$section_label = ( $top_term instanceof WP_Term ) ? $top_term->name : $category->name;
		$section_slug  = ( $top_term instanceof WP_Term ) ? $top_term->slug : $category->slug;
	} else {
		$section_url   = get_category_link( $category );
		$section_label = $category->name;
		$section_slug  = $category->slug;
	}
}

// An opening Gutenberg image can already serve as the cover, including its caption.
$blocks = parse_blocks( $raw_body );
foreach ( $blocks as $block ) {
	if ( empty( $block['blockName'] ) && '' === trim( $block['innerHTML'] ) ) {
		continue;
	}
	if ( $cover_id && 'core/image' === $block['blockName'] && (int) ( $block['attrs']['id'] ?? 0 ) === (int) $cover_id ) {
		$cover_id = 0;
		continue;
	}
	if ( 'core/paragraph' === $block['blockName'] && trim( wp_strip_all_tags( $block['innerHTML'] ) ) === $excerpt ) {
		$excerpt = '';
	}
	break;
}
?>
<main id="primary" class="vpc-reader">
	<div class="vpc-reader__wrap">
		<nav class="vpc-reader__crumbs" aria-label="Đường dẫn">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Trang chủ</a>
			<a href="<?php echo esc_url( $section_url ); ?>"><?php echo esc_html( $section_label ); ?></a>
			<?php if ( $category && $category->slug !== $section_slug ) : ?>
				<a href="<?php echo esc_url( get_category_link( $category ) ); ?>"><?php echo esc_html( $category->name ); ?></a>
			<?php endif; ?>
			<span aria-current="page"><?php the_title(); ?></span>
		</nav>
		<div class="vpc-reader__grid">
			<article class="vpc-reader__article">
				<header>
					<?php if ( $category ) : ?><span class="vpc-reader__tag"><?php echo esc_html( $category->name ); ?></span><?php endif; ?>
					<h1><?php the_title(); ?></h1>
					<p class="vpc-reader__meta">Tác giả: <?php the_author_posts_link(); ?> · Đăng: <?php echo esc_html( get_the_date( 'd/m/Y' ) ); ?>
						<?php if ( get_the_modified_date( 'Ymd' ) !== get_the_date( 'Ymd' ) ) : ?> · Cập nhật: <?php echo esc_html( get_the_modified_date( 'd/m/Y' ) ); ?><?php endif; ?>
						<?php if ( $words ) : ?> · <?php echo esc_html( (string) ceil( count( $words ) / 200 ) ); ?> phút đọc<?php endif; ?>
					</p>
				</header>
				<?php if ( $cover_id && ! $protected ) : ?>
					<?php echo wp_get_attachment_image( $cover_id, 'large', false, array( 'class' => 'vpc-reader__cover', 'loading' => 'eager' ) ); ?>
				<?php endif; ?>
				<?php if ( '' !== $excerpt ) : ?><p class="vpc-reader__lead"><?php echo esc_html( $excerpt ); ?></p><?php endif; ?>
				<div class="vpc-reader__body"><?php the_content(); ?></div>
				<?php wp_link_pages(); ?>
				<?php
				$post_tags = get_the_tags( $article_id );
				$has_tags  = ! empty( $post_tags ) && ! is_wp_error( $post_tags );
				$share_url = get_permalink( $article_id );
				?>
				<div class="vpc-reader__footer-bar">
					<?php if ( $has_tags ) : ?>
						<div class="vpc-reader__tags">
							<span class="vpc-reader__tags-label">Tags:</span>
							<div class="vpc-reader__tag-list">
								<?php foreach ( $post_tags as $tag ) : ?>
									<a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>" class="vpc-reader__tag-pill">
										<?php echo esc_html( $tag->name ); ?>
									</a>
								<?php endforeach; ?>
							</div>
						</div>
					<?php endif; ?>

					<div class="vpc-reader__share" aria-label="Chia sẻ bài viết">
						<span class="vpc-reader__share-label">Chia sẻ:</span>
						<div class="vpc-reader__share-buttons">
							<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo rawurlencode( $share_url ); ?>"
							   target="_blank"
							   rel="noopener noreferrer"
							   class="vpc-reader__share-btn vpc-reader__share-btn--facebook"
							   aria-label="Chia sẻ lên Facebook">
								<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/icons/facebook.svg' ); ?>" width="36" height="36" alt="" aria-hidden="true">
							</a>
							<a href="https://zalo.me/share?url=<?php echo rawurlencode( $share_url ); ?>"
							   target="_blank"
							   rel="noopener noreferrer"
							   class="vpc-reader__share-btn vpc-reader__share-btn--zalo"
							   aria-label="Chia sẻ qua Zalo">
								<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/icons/zalo.svg' ); ?>" width="22" height="22" alt="" aria-hidden="true">
							</a>
							<button type="button"
							        class="vpc-reader__share-btn vpc-reader__share-btn--copy"
							        data-copy-link="<?php echo esc_url( $share_url ); ?>"
							        aria-label="Sao chép liên kết">
								<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/icons/copy-link.svg' ); ?>" width="18" height="18" alt="" aria-hidden="true">
								<span class="vpc-reader__share-tooltip" role="status" aria-live="polite">Đã sao chép!</span>
							</button>
						</div>
					</div>
				</div>

				<?php
				// Author Card.
				$author_id    = (int) get_the_author_meta( 'ID' );
				$author_name  = get_the_author();
				$author_title = get_the_author_meta( 'vpc_job_title', $author_id );
				if ( empty( $author_title ) ) {
					$author_desc  = get_the_author_meta( 'description', $author_id );
					$author_title = ! empty( $author_desc ) ? wp_trim_words( $author_desc, 12 ) : __( 'Ban biên tập Vạn Phúc Care', 'vanphuccare' );
				}
				$author_url = get_author_posts_url( $author_id );
				?>
				<section class="vpc-reader__author-card" aria-label="<?php esc_attr_e( 'Thông tin tác giả', 'vanphuccare' ); ?>">
					<div class="vpc-reader__author-avatar">
						<?php echo vpc_get_author_avatar_html( $author_id, 80 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					</div>
					<div class="vpc-reader__author-info">
						<span class="vpc-reader__author-badge"><?php esc_html_e( 'Tác giả', 'vanphuccare' ); ?></span>
						<h3 class="vpc-reader__author-name"><?php echo esc_html( $author_name ); ?></h3>
						<p class="vpc-reader__author-title"><?php echo esc_html( $author_title ); ?></p>
						<a href="<?php echo esc_url( $author_url ); ?>" class="vpc-reader__author-link">
							<?php esc_html_e( 'Xem các bài viết của tác giả', 'vanphuccare' ); ?>
							<svg width="18" height="18" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
								<path d="M4.16675 10H15.8334M15.8334 10L10.8334 5M15.8334 10L10.8334 15" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
							</svg>
						</a>
					</div>
				</section>

				<?php
				// Reviewer Card (Người kiểm duyệt nội dung).
				$reviewer_name   = get_post_meta( $article_id, 'vpc_reviewer_name', true );
				$reviewer_title  = get_post_meta( $article_id, 'vpc_reviewer_title', true );
				$reviewer_avatar = get_post_meta( $article_id, 'vpc_reviewer_avatar', true );
				$reviewer_url    = get_post_meta( $article_id, 'vpc_reviewer_url', true ) ?: home_url( '/gioi-thieu/' );

				if ( ! empty( $reviewer_name ) ) :
				?>
				<section class="vpc-reader__reviewer-card" aria-label="<?php esc_attr_e( 'Thông tin người kiểm duyệt', 'vanphuccare' ); ?>">
					<div class="vpc-reader__reviewer-avatar">
						<?php if ( ! empty( $reviewer_avatar ) ) : ?>
							<img src="<?php echo esc_url( $reviewer_avatar ); ?>" alt="<?php echo esc_attr( $reviewer_name ); ?>" class="vpc-reader__reviewer-img" width="80" height="80" loading="lazy">
						<?php else : ?>
							<svg class="vpc-reader__reviewer-placeholder" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
								<circle cx="40" cy="40" r="40" fill="#BAE6FD"/>
								<path d="M40 40C45.5228 40 50 35.5228 50 30C50 24.4772 45.5228 20 40 20C34.4772 20 30 24.4772 30 30C30 35.5228 34.4772 40 40 40Z" stroke="#0284C7" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
								<path d="M22 62C22 52.0589 30.0589 44 40 44C49.9411 44 58 52.0589 58 62" stroke="#0284C7" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
							</svg>
						<?php endif; ?>
					</div>
					<div class="vpc-reader__reviewer-info">
						<span class="vpc-reader__reviewer-badge">
							<svg width="14" height="14" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
								<circle cx="8" cy="8" r="8" fill="currentColor" fill-opacity="0.2"/>
								<path d="M4.5 8L7 10.5L11.5 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
							</svg>
							<?php esc_html_e( 'Kiểm duyệt nội dung', 'vanphuccare' ); ?>
						</span>
						<h3 class="vpc-reader__reviewer-name"><?php echo esc_html( $reviewer_name ); ?></h3>
						<?php if ( ! empty( $reviewer_title ) ) : ?>
							<p class="vpc-reader__reviewer-title"><?php echo esc_html( $reviewer_title ); ?></p>
						<?php endif; ?>
						<a href="<?php echo esc_url( $reviewer_url ); ?>" class="vpc-reader__reviewer-link">
							<?php esc_html_e( 'Thông tin người kiểm duyệt', 'vanphuccare' ); ?>
							<svg width="18" height="18" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
								<path d="M4.16675 10H15.8334M15.8334 10L10.8334 5M15.8334 10L10.8334 15" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
							</svg>
						</a>
					</div>
				</section>
				<?php endif; ?>

				<?php
				$show_disclaimer = ! empty( $reviewer_name ) || ( function_exists( 'vpc_is_knowledge_category' ) && vpc_is_knowledge_category( $category ) );
				if ( $show_disclaimer ) :
				?>
				<div class="vpc-reader__disclaimer" role="note" aria-label="<?php esc_attr_e( 'Cảnh báo y khoa', 'vanphuccare' ); ?>">
					<span class="vpc-reader__disclaimer-icon" aria-hidden="true">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<circle cx="12" cy="12" r="10" stroke="#00B7FF" stroke-width="2"/>
							<path d="M12 16V11M12 8H12.01" stroke="#00B7FF" stroke-width="2" stroke-linecap="round"/>
						</svg>
					</span>
					<p class="vpc-reader__disclaimer-text">
						<?php esc_html_e( 'Thông tin trong bài không thay thế chẩn đoán y khoa, tư vấn hay điều trị của cơ sở khám chữa bệnh. Cha mẹ cần liên hệ cơ sở y tế khi có dấu hiệu bất thường.', 'vanphuccare' ); ?>
					</p>
				</div>
				<?php endif; ?>
			</article>
			<aside class="vpc-reader__rail" aria-label="Thông tin bài viết">
				<details class="vpc-reader__toc" hidden>
					<summary>Mục lục</summary>
					<nav aria-label="Mục lục bài viết"></nav>
				</details>
				<div class="vpc-reader__contacts"><?php get_template_part( 'template-parts/knowledge/contact-cards' ); ?></div>
			</aside>
		</div>
		<?php
		$related_cat_id = 0;
		if ( $category instanceof WP_Term ) {
			$related_cat_id = (int) $category->term_id;
		} elseif ( $is_news ) {
			$news_fallback  = get_category_by_slug( 'tin-tuc' );
			$related_cat_id = ( $news_fallback instanceof WP_Term ) ? (int) $news_fallback->term_id : 0;
		} else {
			$kt_fallback    = get_category_by_slug( 'kien-thuc' );
			$related_cat_id = ( $kt_fallback instanceof WP_Term ) ? (int) $kt_fallback->term_id : 0;
		}

		$related_args = array(
			'post__not_in'        => array( $article_id ),
			'posts_per_page'      => 3,
			'post_status'         => 'publish',
			'ignore_sticky_posts' => true,
		);
		if ( $related_cat_id > 0 ) {
			$related_args['cat'] = $related_cat_id;
		}

		$related = get_posts( $related_args );
		if ( $related ) :
			?>
			<section class="vpc-reader__related"><h2>Bài viết liên quan</h2><div>
				<?php foreach ( $related as $item ) : ?>
					<?php get_template_part( 'template-parts/knowledge/card', null, array( 'article' => vpc_format_knowledge_card( $item ) ) ); ?>
				<?php endforeach; ?>
			</div></section>
		<?php endif; ?>
	</div>
</main>
