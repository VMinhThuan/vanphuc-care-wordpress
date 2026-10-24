<?php
/**
 * Render WordPress front page and verify output.
 */

define( 'WP_USE_THEMES', true );

$_SERVER['HTTP_HOST'] = '127.0.0.1:8088';
$_SERVER['REQUEST_URI'] = '/';
$_SERVER['REQUEST_METHOD'] = 'GET';

ob_start();
require_once '/Users/vuthuan/Downloads/wordpress/index.php';
$html = ob_get_clean();

echo "Rendered HTML length: " . strlen( $html ) . " bytes.\n";

// Check key elements
$checks = array(
	'DOCTYPE html' => stripos( $html, '<!DOCTYPE html>' ) !== false,
	'Title: Vạn Phúc Care' => strpos( $html, 'Vạn Phúc Care' ) !== false,
	'CSS: theme.css' => strpos( $html, 'assets/css/theme.css' ) !== false,
	'JS: main.js' => strpos( $html, 'assets/js/main.js' ) !== false,
	'Localize: vpcData' => strpos( $html, 'vpcData' ) !== false,
	'Section 1: Hero' => strpos( $html, 'hero-banner-section' ) !== false,
	'Section 2: Gioi thieu' => strpos( $html, 'id="gioi-thieu"' ) !== false,
	'Section 3: Trung tam o cu' => strpos( $html, 'id="trung-tam-o-cu"' ) !== false,
	'Section 4: Bao mau tai nha' => strpos( $html, 'id="bao-mau-tai-nha"' ) !== false,
	'Section 5: Lop hoc tien san' => strpos( $html, 'id="lop-hoc-tien-san"' ) !== false,
	'Section 6: Khoa hoc truc tuyen' => strpos( $html, 'id="khoa-hoc-truc-tuyen"' ) !== false,
	'Section 7: Vi sao chon VPC' => strpos( $html, 'id="vi-sao-chon-van-phuc"' ) !== false,
	'Section 8: Feedback' => strpos( $html, 'id="feedback"' ) !== false,
	'Section 9: Bao chi' => strpos( $html, 'id="bao-chi"' ) !== false,
	'Section 10: Dang ky tu van' => strpos( $html, 'id="dang-ky-tu-van"' ) !== false,
	'Section 11: Kien thuc' => strpos( $html, 'id="kien-thuc-nuoi-con"' ) !== false,
	'Modal: Consultation' => strpos( $html, 'id="vpc-consultation-modal"' ) !== false,
	'Modal: Success' => strpos( $html, 'id="vpc-success-modal"' ) !== false,
	'Floating Contact' => strpos( $html, 'aria-label="Kênh liên hệ nhanh"' ) !== false,
	'Footer' => strpos( $html, 'class="site-footer' ) !== false,
);

foreach ( $checks as $label => $pass ) {
	echo ( $pass ? "[PASS] " : "[FAIL] " ) . $label . "\n";
}
