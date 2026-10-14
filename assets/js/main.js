/**
 * Main JavaScript file for Vạn Phúc Care Theme.
 */
document.addEventListener('DOMContentLoaded', function () {
	// Mobile menu drawer toggle
	const menuToggle = document.getElementById('mobile-menu-toggle');
	const menuDrawer = document.getElementById('mobile-menu-drawer');

	if (menuToggle && menuDrawer) {
		menuToggle.addEventListener('click', function () {
			const isExpanded = menuToggle.getAttribute('aria-expanded') === 'true';
			menuToggle.setAttribute('aria-expanded', String(!isExpanded));
			menuDrawer.classList.toggle('hidden');

			const openIcon = menuToggle.querySelector('.open-icon');
			const closeIcon = menuToggle.querySelector('.close-icon');

			if (openIcon && closeIcon) {
				openIcon.classList.toggle('hidden');
				closeIcon.classList.toggle('hidden');
			}
		});
	}

	console.log('Vạn Phúc Care Theme initialized successfully.');
});
