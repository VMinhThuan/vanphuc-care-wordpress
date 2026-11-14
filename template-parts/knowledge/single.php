<?php
/**
 * Reading layout for articles in the Knowledge category tree.
 *
 * @package VanPhucCare
 */

$article_id = get_the_ID();
$category   = vanphuccare_get_primary_category();
$protected  = post_password_required();
$raw_body   = $protected ? '' : get_the_content();
$cover_id   = get_post_thumbnail_id();
$excerpt    = $protected ? '' : trim( (string) get_post_field( 'post_excerpt', $article_id ) );
$words      = preg_split( '/\s+/u', wp_strip_all_tags( strip_shortcodes( $raw_body ) ), -1, PREG_SPLIT_NO_EMPTY );

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
			<a href="<?php echo esc_url( home_url( '/kien-thuc/' ) ); ?>">Kiến thức</a>
			<?php if ( $category && 'kien-thuc' !== $category->slug ) : ?>
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
		if ( $category instanceof WP_Term && vpc_is_knowledge_category( $category ) ) {
			$related_cat_id = (int) $category->term_id;
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
