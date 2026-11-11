<?php
/**
 * Shared article copy block.
 *
 * @package VanPhucCare
 */

$article = $args['article'] ?? array();
?>
<span class="vpc-knowledge-card__category"><?php echo esc_html( $article['category'] ?? 'Cẩm nang cho mẹ' ); ?></span>
<h3><a href="<?php echo esc_url( $article['url'] ?? home_url( '/kien-thuc/' ) ); ?>"><?php echo esc_html( $article['title'] ?? '' ); ?></a></h3>
<p><?php echo esc_html( $article['excerpt'] ?? '' ); ?></p>
<div class="vpc-knowledge-card__footer">
	<span class="vpc-knowledge-author"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/knowledge/author.jpeg' ); ?>" alt="" width="20" height="20"><span><?php echo esc_html( $article['author'] ?? 'Tên tác giả' ); ?></span></span>
	<time datetime="<?php echo esc_attr( $article['date'] ?? '2024-09-12' ); ?>"><?php echo esc_html( $article['date'] ?? '12/09/2024' ); ?></time>
</div>
