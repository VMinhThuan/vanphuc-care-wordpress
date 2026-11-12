<?php
/**
 * Shared Figma policy page shell and policy content.
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$policy_key = isset( $args['policy_key'] ) ? sanitize_key( $args['policy_key'] ) : 'terms';
$policies   = array(
	'terms' => array(
		'slug'  => 'dieu-khoan-su-dung',
		'title' => 'Điều khoản sử dụng',
		'node'  => '3388:50961',
	),
	'privacy' => array(
		'slug'  => 'chinh-sach-bao-mat',
		'title' => 'Chính sách bảo mật',
		'node'  => '3388:51005',
	),
	'editorial' => array(
		'slug'  => 'chinh-sach-bien-tap-va-chinh-sua',
		'title' => 'Chính sách biên tập và chỉnh sửa',
		'node'  => '3388:50920',
	),
	'complaints' => array(
		'slug'  => 'quy-trinh-tiep-nhan-va-giai-quyet-khieu-nai',
		'title' => 'Quy trình tiếp nhận và giải quyết khiếu nại',
		'node'  => '3388:51055',
	),
);
$policy      = isset( $policies[ $policy_key ] ) ? $policies[ $policy_key ] : $policies['terms'];
$policy_tabs = array(
	array( 'slug' => 'terms', 'label' => 'ĐIỀU KHOẢN SỬ DỤNG' ),
	array( 'slug' => 'privacy', 'label' => 'CHÍNH SÁCH BẢO MẬT' ),
	array( 'slug' => 'editorial', 'label' => 'CHÍNH SÁCH BIÊN TẬP' ),
	array( 'slug' => 'complaints', 'label' => 'QUY TRÌNH TIẾP NHẬN VÀ GIẢI QUYẾT KHIẾU NẠI' ),
);

get_header();
?>

<main class="vpc-policy-page" data-figma-node="<?php echo esc_attr( $policy['node'] ); ?>">
	<nav class="vpc-policy-tabs" aria-label="Điều hướng chính sách">
		<div class="vpc-policy-tabs__inner">
			<?php foreach ( $policy_tabs as $tab ) : ?>
				<?php $is_active = $policy_key === $tab['slug']; ?>
				<a class="vpc-policy-tab<?php echo $is_active ? ' is-active' : ''; ?>" href="<?php echo esc_url( home_url( '/' . $policies[ $tab['slug'] ]['slug'] . '/' ) ); ?>"<?php echo $is_active ? ' aria-current="page"' : ''; ?>>
					<span><?php echo esc_html( $tab['label'] ); ?></span>
				</a>
			<?php endforeach; ?>
		</div>
	</nav>

	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php
			$stored_content = (string) get_post_field( 'post_content', get_the_ID() );
			$rendered_content = apply_filters( 'the_content', $stored_content );
			$page_title           = get_the_title();
			if ( '' === $page_title ) {
				$page_title = $policy['title'];
			}
			?>
			<section class="vpc-policy-content" aria-labelledby="vpc-policy-title" data-content-source="wordpress-page" data-page-id="<?php echo esc_attr( get_the_ID() ); ?>">
				<div class="vpc-policy-content__inner">
					<h1 id="vpc-policy-title" class="vpc-policy-title"><?php echo esc_html( $page_title ); ?></h1>
					<div class="vpc-policy-body">
						<?php echo $rendered_content; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					</div>
					<p class="vpc-policy-updated">Cập nhật ngày: 09/11/2023.</p>
				</div>
			</section>
		<?php endwhile; ?>
	<?php endif; ?>
</main>

<?php get_footer(); ?>
