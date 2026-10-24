<?php
/**
 * Setup WordPress local database and activate vanphuccare-theme.
 */

define( 'WP_INSTALLING', true );

$wp_dir = '/Users/vuthuan/Downloads/wordpress';
require_once $wp_dir . '/wp-load.php';
require_once $wp_dir . '/wp-admin/includes/upgrade.php';

echo "WordPress version: " . $wp_version . "\n";

// Check if tables already exist
global $wpdb;
$installed = (bool) $wpdb->get_var( "SHOW TABLES LIKE '{$wpdb->prefix}options'" );

if ( ! $installed ) {
	echo "Installing WordPress tables...\n";
	$result = wp_install(
		'Vạn Phúc Care - Trung Tâm Chăm Sóc Mẹ & Bé',
		'admin',
		'admin@vanphuccare.vn',
		true,
		'',
		'admin123'
	);
	print_r( $result );
} else {
	echo "WordPress tables already exist.\n";
}

// Set site options
update_option( 'siteurl', 'http://127.0.0.1:8088' );
update_option( 'home', 'http://127.0.0.1:8088' );
update_option( 'blogname', 'Vạn Phúc Care' );
update_option( 'blogdescription', 'Hành Trình Cùng Mẹ, Trải Đầy Yêu Thương' );

// Switch theme to vanphuccare-theme
require_once $wp_dir . '/wp-admin/includes/theme.php';
switch_theme( 'vanphuccare-theme' );

echo "Current active theme: " . get_stylesheet() . "\n";

// Verify front-page rendering
$current_theme = wp_get_theme();
echo "Theme Name: " . $current_theme->get( 'Name' ) . "\n";
echo "Theme Version: " . $current_theme->get( 'Version' ) . "\n";
echo "Theme Directory: " . get_template_directory() . "\n";
echo "Front Page Template Exists: " . ( file_exists( get_template_directory() . '/front-page.php' ) ? 'YES' : 'NO' ) . "\n";
