/**
 * Policy Hub Interactive Functionality:
 * 1. Live search filtering for navigation sidebar and mobile bottom sheet.
 * 2. Mobile bottom sheet dialog toggle and accessibility (focus, ESC, scroll lock).
 * 3. Mobile TOC accordion collapse/expand.
 * 4. Desktop TOC ScrollSpy & smooth scrolling with sticky header offset.
 *
 * @package VanPhucCare
 */

(function () {
	'use strict';

	/**
	 * Smooth scroll to element with sticky header offset (110px).
	 *
	 * @param {HTMLElement} target
	 */
	function scrollToTarget(target) {
		if (!target) return;
		var header = document.getElementById('site-header');
		var headerHeight = header ? header.offsetHeight : 96;
		var offset = headerHeight + 24;
		var elementPosition = target.getBoundingClientRect().top;
		var offsetPosition = elementPosition + window.pageYOffset - offset;

		window.scrollTo({
			top: Math.max(0, offsetPosition),
			behavior: 'smooth'
		});
	}

	/**
	 * Initialize Live Search Filtering for Policy Links.
	 */
	function initSearch() {
		var searchInputs = document.querySelectorAll('.vpc-policy-search__input');
		if (!searchInputs.length) return;

		searchInputs.forEach(function (input) {
			input.addEventListener('input', function () {
				var query = (this.value || '').trim().toLowerCase();
				var container = this.closest('.vpc-policy-sidebar, .vpc-policy-sheet__dialog');
				if (!container) return;

				var nav = container.querySelector('.vpc-policy-nav');
				if (!nav) return;

				var groups = nav.querySelectorAll('.vpc-policy-nav__group');
				var emptyMsg = nav.querySelector('.vpc-policy-nav__empty');
				var totalVisible = 0;

				groups.forEach(function (group) {
					var items = group.querySelectorAll('.vpc-policy-nav__item');
					var groupVisible = 0;

					items.forEach(function (item) {
						var title = item.getAttribute('data-title') || item.textContent.toLowerCase();
						var match = !query || title.indexOf(query) !== -1;
						if (match) {
							item.classList.remove('hidden');
							groupVisible++;
							totalVisible++;
						} else {
							item.classList.add('hidden');
						}
					});

					if (groupVisible === 0) {
						group.classList.add('hidden');
					} else {
						group.classList.remove('hidden');
					}
				});

				if (emptyMsg) {
					if (totalVisible === 0) {
						emptyMsg.classList.remove('hidden');
					} else {
						emptyMsg.classList.add('hidden');
					}
				}
			});
		});
	}

	/**
	 * Initialize Mobile Bottom Sheet Modal.
	 */
	function initBottomSheet() {
		var trigger = document.getElementById('vpc-policy-sheet-trigger');
		var sheet = document.getElementById('vpc-policy-sheet');
		if (!trigger || !sheet) return;

		var closeButtons = sheet.querySelectorAll('[data-sheet-close]');
		var searchInput = sheet.querySelector('.vpc-policy-search__input');

		function openSheet() {
			sheet.classList.add('is-open');
			sheet.setAttribute('aria-hidden', 'false');
			trigger.setAttribute('aria-expanded', 'true');
			document.body.style.overflow = 'hidden';

			if (searchInput) {
				setTimeout(function () {
					searchInput.focus();
				}, 150);
			}
		}

		function closeSheet() {
			sheet.classList.remove('is-open');
			sheet.setAttribute('aria-hidden', 'true');
			trigger.setAttribute('aria-expanded', 'false');
			document.body.style.overflow = '';
			trigger.focus();
		}

		trigger.addEventListener('click', function (e) {
			e.preventDefault();
			openSheet();
		});

		closeButtons.forEach(function (btn) {
			btn.addEventListener('click', function (e) {
				e.preventDefault();
				closeSheet();
			});
		});

		document.addEventListener('keydown', function (e) {
			if (e.key === 'Escape' && sheet.classList.contains('is-open')) {
				closeSheet();
			}
		});
	}

	/**
	 * Initialize Mobile Collapsible TOC Accordion.
	 */
	function initMobileToc() {
		var trigger = document.querySelector('.vpc-policy-mobile-toc__trigger');
		var panel = document.getElementById('vpc-policy-mobile-toc-list');
		if (!trigger || !panel) return;

		trigger.addEventListener('click', function () {
			var isExpanded = trigger.getAttribute('aria-expanded') === 'true';
			trigger.setAttribute('aria-expanded', !isExpanded);
			trigger.classList.toggle('is-open', !isExpanded);
			if (isExpanded) {
				panel.setAttribute('hidden', '');
			} else {
				panel.removeAttribute('hidden');
			}
		});

		// Clicking anchor inside mobile TOC scrolls and collapses panel
		var links = panel.querySelectorAll('a[href^="#"]');
		links.forEach(function (link) {
			link.addEventListener('click', function (e) {
				var targetId = this.getAttribute('href').substring(1);
				var target = document.getElementById(targetId);
				if (target) {
					e.preventDefault();
					trigger.setAttribute('aria-expanded', 'false');
					trigger.classList.remove('is-open');
					panel.setAttribute('hidden', '');
					scrollToTarget(target);
					if (history.pushState) {
						history.pushState(null, '', '#' + targetId);
					}
				}
			});
		});
	}

	/**
	 * Initialize Desktop TOC ScrollSpy & Smooth Anchor Scrolling.
	 */
	function initDesktopToc() {
		var tocLinks = document.querySelectorAll('.vpc-policy-toc__link');
		var headings = document.querySelectorAll('.vpc-policy-body h2[id]');
		if (!tocLinks.length || !headings.length) return;

		// Smooth scrolling on click
		tocLinks.forEach(function (link) {
			link.addEventListener('click', function (e) {
				var targetId = this.getAttribute('data-target') || this.getAttribute('href').replace('#', '');
				var target = document.getElementById(targetId);
				if (target) {
					e.preventDefault();
					scrollToTarget(target);
					if (history.pushState) {
						history.pushState(null, '', '#' + targetId);
					}
				}
			});
		});

		// ScrollSpy via IntersectionObserver if supported
		if ('IntersectionObserver' in window) {
			var observerOptions = {
				root: null,
				rootMargin: '-110px 0px -60% 0px',
				threshold: 0
			};

			var activeId = '';

			var observer = new IntersectionObserver(function (entries) {
				entries.forEach(function (entry) {
					if (entry.isIntersecting) {
						activeId = entry.target.id;
					}
				});

				if (activeId) {
					tocLinks.forEach(function (link) {
						var target = link.getAttribute('data-target') || link.getAttribute('href').replace('#', '');
						if (target === activeId) {
							link.classList.add('is-active');
							link.setAttribute('aria-current', 'true');
						} else {
							link.classList.remove('is-active');
							link.removeAttribute('aria-current');
						}
					});
				}
			}, observerOptions);

			headings.forEach(function (heading) {
				observer.observe(heading);
			});
		}
	}

	// Initialize all components on DOMContentLoaded
	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', function () {
			initSearch();
			initBottomSheet();
			initMobileToc();
			initDesktopToc();
		});
	} else {
		initSearch();
		initBottomSheet();
		initMobileToc();
		initDesktopToc();
	}
})();
