<?php
/**
 * Vertical article card.
 *
 * @package VanPhucCare
 */

$article = $args['article'] ?? array();
?>
<article class="vpc-knowledge-card">
	<a class="vpc-knowledge-card__image" href="<?php echo esc_url( $article['url'] ?? home_url( '/kien-thuc/' ) ); ?>">
		<img src="<?php echo esc_url( $article['image'] ?? '' ); ?>" alt="" loading="lazy">
	</a>
	<div class="vpc-knowledge-card__body">
		<?php get_template_part( 'template-parts/knowledge/card-meta', null, array( 'article' => $article ) ); ?>
	</div>
</article>
