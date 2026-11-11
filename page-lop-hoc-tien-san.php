<?php
/**
 * Template Name: Dịch vụ - Lớp học tiền sản
 * Template Post Type: page
 *
 * Page template — Lớp học tiền sản.
 *
 * @package VanPhucCare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

// Visible again after PO review.
$show_prenatal_video = true;

get_template_part( 'template-parts/prenatal/hero' );
get_template_part( 'template-parts/prenatal/intro' );

if ( $show_prenatal_video ) {
	get_template_part( 'template-parts/prenatal/video' );
}

get_template_part( 'template-parts/prenatal/benefits' );
get_template_part( 'template-parts/prenatal/program' );
get_template_part( 'template-parts/prenatal/teacher' );
get_template_part( 'template-parts/prenatal/registration' );
get_template_part( 'template-parts/prenatal/faq' );
get_template_part( 'template-parts/prenatal/services' );
?>

<script>
document.addEventListener('DOMContentLoaded', function () {
	// Tabs switching for prenatal program
	const tabs = document.querySelectorAll('.prenatal-tabs button');
	const panels = document.querySelectorAll('.prenatal-step-grid');
	if (tabs.length && panels.length) {
		tabs.forEach(tab => {
			tab.addEventListener('click', function () {
				const targetId = this.getAttribute('data-target');
				tabs.forEach(t => {
					t.classList.remove('is-active');
					t.setAttribute('aria-selected', 'false');
				});
				this.classList.add('is-active');
				this.setAttribute('aria-selected', 'true');

				panels.forEach(panel => {
					if (panel.id === targetId) {
						panel.classList.add('is-active');
						panel.removeAttribute('hidden');
					} else {
						panel.classList.remove('is-active');
						panel.setAttribute('hidden', '');
					}
				});
			});
		});
	}

	// Radio chips selection for gestational age
	const chips = document.querySelectorAll('.prenatal-chip');
	if (chips.length) {
		chips.forEach(chip => {
			chip.addEventListener('click', function () {
				chips.forEach(c => c.classList.remove('is-active'));
				this.classList.add('is-active');
				const radio = this.querySelector('input[type="radio"]');
				if (radio) radio.checked = true;
			});
		});
	}
});
</script>

<?php get_footer(); ?>
