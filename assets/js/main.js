/**
 * Main JavaScript file for Vạn Phúc Care Theme.
 */
document.addEventListener('DOMContentLoaded', function () {
	// Mobile menu drawer toggle
	const menuToggle = document.getElementById('mobile-menu-toggle');
	const menuClose = document.getElementById('mobile-menu-close');
	const menuDrawer = document.getElementById('mobile-menu-drawer');

	function toggleMenu(show) {
		if (!menuDrawer) return;
		const isCurrentlyHidden = menuDrawer.classList.contains('hidden');
		const shouldShow = typeof show === 'boolean' ? show : isCurrentlyHidden;

		if (shouldShow) {
			menuDrawer.classList.remove('hidden');
			document.body.classList.add('overflow-hidden');
			if (menuToggle) menuToggle.setAttribute('aria-expanded', 'true');
		} else {
			menuDrawer.classList.add('hidden');
			document.body.classList.remove('overflow-hidden');
			if (menuToggle) menuToggle.setAttribute('aria-expanded', 'false');
		}
	}

	if (menuToggle) {
		menuToggle.addEventListener('click', function () {
			toggleMenu();
		});
	}

	if (menuClose) {
		menuClose.addEventListener('click', function () {
			toggleMenu(false);
		});
	}

	// Hide the mobile sticky CTA as soon as the footer reaches its fixed area.
	const mobileStickyCta = document.getElementById('mobile-sticky-cta');
	const siteFooter = document.querySelector('.site-footer');
	if (mobileStickyCta && siteFooter) {
		function updateMobileStickyCta() {
			const footerBounds = siteFooter.getBoundingClientRect();
			const ctaHeight = mobileStickyCta.offsetHeight;
			const footerOverlapsCta = footerBounds.top <= window.innerHeight - ctaHeight && footerBounds.bottom > 0;

			mobileStickyCta.classList.toggle('translate-y-full', footerOverlapsCta);
			mobileStickyCta.classList.toggle('opacity-0', footerOverlapsCta);
			mobileStickyCta.classList.toggle('pointer-events-none', footerOverlapsCta);
		}

		updateMobileStickyCta();
		window.addEventListener('scroll', updateMobileStickyCta, { passive: true });
		window.addEventListener('resize', updateMobileStickyCta);
	}

	// Close drawer when clicking any link inside it
	if (menuDrawer) {
		menuDrawer.querySelectorAll('a').forEach(function (link) {
			link.addEventListener('click', function () {
				toggleMenu(false);
			});
		});
	}

	// Custom Select Dropdowns
	const selectComponents = document.querySelectorAll('[data-custom-select]');
	selectComponents.forEach(function (container) {
		const trigger = container.querySelector('.vpc-select-trigger');
		const dropdown = container.querySelector('.vpc-select-dropdown');
		const hiddenInput = container.querySelector('[data-select-input]');
		const labelSpan = container.querySelector('[data-select-label]');
		const options = container.querySelectorAll('.vpc-select-option:not([aria-disabled="true"])');

		if (!trigger || !dropdown) return;

		function closeDropdown() {
			trigger.setAttribute('aria-expanded', 'false');
			dropdown.classList.add('hidden');
		}

		function openDropdown() {
			// Close all other dropdowns
			document.querySelectorAll('[data-custom-select] .vpc-select-trigger').forEach(function (otherTrigger) {
				if (otherTrigger !== trigger) {
					otherTrigger.setAttribute('aria-expanded', 'false');
					const otherDropdown = otherTrigger.closest('[data-custom-select]').querySelector('.vpc-select-dropdown');
					if (otherDropdown) otherDropdown.classList.add('hidden');
				}
			});

			trigger.setAttribute('aria-expanded', 'true');
			dropdown.classList.remove('hidden');
		}

		trigger.addEventListener('click', function (e) {
			e.stopPropagation();
			const isExpanded = trigger.getAttribute('aria-expanded') === 'true';
			if (isExpanded) {
				closeDropdown();
			} else {
				openDropdown();
			}
		});

		options.forEach(function (option) {
			option.addEventListener('click', function (e) {
				e.stopPropagation();
				const val = option.getAttribute('data-value') || '';
				const text = option.querySelector('span') ? option.querySelector('span').textContent.trim() : option.textContent.trim();

				if (hiddenInput) {
					hiddenInput.value = val;
					hiddenInput.dispatchEvent(new Event('change', { bubbles: true }));
				}

				if (labelSpan) {
					labelSpan.textContent = text;
					labelSpan.classList.remove('text-neutral-500');
					labelSpan.classList.add('text-text-body-default');
				}

				// Update active styles
				options.forEach(function (opt) {
					opt.setAttribute('aria-selected', 'false');
					opt.className = 'vpc-select-option flex items-center justify-between px-3.5 py-2.5 rounded-lg text-base font-medium transition-colors duration-150 text-text-body-default hover:bg-surface-field-hover cursor-pointer';
					const check = opt.querySelector('svg');
					if (check) check.remove();
				});

				option.setAttribute('aria-selected', 'true');
				option.className = 'vpc-select-option flex items-center justify-between px-3.5 py-2.5 rounded-lg text-base font-medium transition-colors duration-150 bg-primary-200 text-text-body-default cursor-pointer';

				const checkSvg = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
				checkSvg.setAttribute('class', 'w-4 h-4 text-primary-500 shrink-0 ml-2 stroke-current fill-none');
				checkSvg.setAttribute('viewBox', '0 0 16 16');
				checkSvg.setAttribute('stroke-width', '2');
				checkSvg.setAttribute('stroke-linecap', 'round');
				checkSvg.setAttribute('stroke-linejoin', 'round');
				checkSvg.innerHTML = '<polyline points=\"3 8.5 6.5 12 13 4\"></polyline>';
				option.appendChild(checkSvg);

				closeDropdown();
			});
		});
	});

	// Global click to close dropdowns
	document.addEventListener('click', function () {
		document.querySelectorAll('[data-custom-select] .vpc-select-trigger[aria-expanded="true"]').forEach(function (trigger) {
			trigger.setAttribute('aria-expanded', 'false');
			const dropdown = trigger.closest('[data-custom-select]').querySelector('.vpc-select-dropdown');
			if (dropdown) dropdown.classList.add('hidden');
		});
	});

	// Modal Dialog Handlers
	function openModal(modalId) {
		const modal = document.getElementById(modalId);
		if (!modal) return;

		modal.classList.remove('hidden');
		modal.classList.add('flex');
		// Trigger transition
		requestAnimationFrame(function () {
			modal.classList.remove('opacity-0');
			modal.classList.add('opacity-100');
			const card = modal.querySelector('[data-modal-card]');
			if (card) {
				card.classList.remove('scale-95');
				card.classList.add('scale-100');
			}
		});
		document.body.classList.add('overflow-hidden');
	}

	function closeModal(modal) {
		if (!modal) return;

		modal.classList.remove('opacity-100');
		modal.classList.add('opacity-0');
		const card = modal.querySelector('[data-modal-card]');
		if (card) {
			card.classList.remove('scale-100');
			card.classList.add('scale-95');
		}

		setTimeout(function () {
			modal.classList.remove('flex');
			modal.classList.add('hidden');
			document.body.classList.remove('overflow-hidden');
		}, 250);
	}

	// Trigger open buttons: [data-open-modal="modal-id"]
	document.querySelectorAll('[data-open-modal]').forEach(function (btn) {
		btn.addEventListener('click', function (e) {
			e.preventDefault();
			const targetId = btn.getAttribute('data-open-modal');
			openModal(targetId);
		});
	});

	// Modal close buttons: [data-modal-close]
	document.querySelectorAll('[data-modal-close]').forEach(function (btn) {
		btn.addEventListener('click', function (e) {
			e.preventDefault();
			const modal = btn.closest('[data-modal]');
			closeModal(modal);
		});
	});

	// Backdrop click to close
	document.querySelectorAll('[data-modal]').forEach(function (modal) {
		modal.addEventListener('click', function (e) {
			if (e.target === modal) {
				closeModal(modal);
			}
		});
	});

	// Escape key to close modal
	document.addEventListener('keydown', function (e) {
		if (e.key === 'Escape' || e.key === 'Esc') {
			const openModals = document.querySelectorAll('[data-modal]:not(.hidden)');
			openModals.forEach(function (modal) {
				closeModal(modal);
			});
		}
	});

	console.log('Vạn Phúc Care Theme initialized successfully.');
});
