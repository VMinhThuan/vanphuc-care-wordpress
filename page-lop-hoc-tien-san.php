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

// Hidden by default until official video is produced.
$show_prenatal_video = (bool) apply_filters( 'vpc_show_prenatal_video', get_theme_mod( 'vpc_prenatal_video_enable', false ) );

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

	// Interactive video player for prenatal class section
	const videoPlayer = document.querySelector('.js-prenatal-video-player');
	if (videoPlayer) {
		videoPlayer.addEventListener('click', function () {
			if (this.classList.contains('is-playing')) {
				return;
			}
			const src = this.getAttribute('data-video-src');
			const type = this.getAttribute('data-video-type');
			if (!src) {
				return;
			}

			this.classList.add('is-playing');
			if (type === 'video') {
				const video = document.createElement('video');
				video.className = 'prenatal-video__media';
				video.src = src;
				video.controls = true;
				video.autoplay = true;
				video.playsInline = true;
				video.setAttribute('preload', 'auto');
				this.appendChild(video);
				video.focus();
				const playPromise = video.play();
				if (playPromise && typeof playPromise.catch === 'function') {
					playPromise.catch(function () {});
				}
			} else {
				const iframe = document.createElement('iframe');
				iframe.className = 'prenatal-video__media';
				iframe.src = src;
				iframe.setAttribute('title', 'Video lớp học tiền sản Vạn Phúc Care');
				iframe.setAttribute('allow', 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; fullscreen');
				iframe.setAttribute('allowfullscreen', 'true');
				iframe.setAttribute('referrerpolicy', 'strict-origin-when-cross-origin');
				this.appendChild(iframe);
				iframe.focus();
			}
		});
	}
});
</script>

<?php get_footer(); ?>
