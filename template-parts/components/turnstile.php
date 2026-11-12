<?php
/**
 * Component: Cloudflare Turnstile CAPTCHA Widget.
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$site_key = defined( 'VPC_TURNSTILE_SITE_KEY' ) ? VPC_TURNSTILE_SITE_KEY : get_theme_mod( 'vpc_turnstile_site_key', '0x4AAAAAAFfV0g-yO07UT7yb' );
$action   = $args['action'] ?? 'lead_submit';
$class    = $args['class'] ?? 'cf-turnstile my-2 flex justify-center';
?>
<div class="<?php echo esc_attr( $class ); ?>" data-sitekey="<?php echo esc_attr( $site_key ); ?>" data-action="<?php echo esc_attr( $action ); ?>"></div>