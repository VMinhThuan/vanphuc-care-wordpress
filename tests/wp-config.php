<?php
/**
 * Local WordPress configuration for Vạn Phúc Care acceptance testing.
 */

define( 'DB_NAME', 'vanphuccare_local' );
define( 'DB_USER', 'root' );
define( 'DB_PASSWORD', '123456' );
define( 'DB_HOST', '127.0.0.1' );
define( 'DB_CHARSET', 'utf8mb4' );
define( 'DB_COLLATE', '' );

define( 'AUTH_KEY',         'vpc_local_auth_key_1234567890abcdef' );
define( 'SECURE_AUTH_KEY',  'vpc_local_secure_auth_key_1234567890' );
define( 'LOGGED_IN_KEY',    'vpc_local_logged_in_key_1234567890' );
define( 'NONCE_KEY',        'vpc_local_nonce_key_1234567890' );
define( 'AUTH_SALT',        'vpc_local_auth_salt_1234567890' );
define( 'SECURE_AUTH_SALT', 'vpc_local_secure_auth_salt_1234567890' );
define( 'LOGGED_IN_SALT',   'vpc_local_logged_in_salt_1234567890' );
define( 'NONCE_SALT',       'vpc_local_nonce_salt_1234567890' );

$table_prefix = 'wp_';

define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', false );
define( 'WP_DEBUG_DISPLAY', false );

define( 'WP_HOME', 'http://127.0.0.1:8088' );
define( 'WP_SITEURL', 'http://127.0.0.1:8088' );

if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

require_once ABSPATH . 'wp-settings.php';
