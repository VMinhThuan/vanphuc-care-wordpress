/**
 * Main JavaScript file for Vạn Phúc Care Theme.
 */
document.addEventListener('DOMContentLoaded', function () {
	// Mobile menu drawer toggle
	const menuToggle = document.getElementById('mobile-menu-toggle');
	const menuClose = document.getElementById('mobile-menu-close');
	const menuDrawer = document.getElementById('mobile-menu-drawer');
	let lastMenuTrigger = null;

	const newsSearchInput = document.querySelector('.vpc-news-search input[data-mobile-placeholder]');
	if (newsSearchInput && window.matchMedia) {
		const mobileNewsQuery = window.matchMedia('(max-width: 767px)');
		const syncNewsPlaceholder = function () {
			newsSearchInput.placeholder = mobileNewsQuery.matches
				? newsSearchInput.dataset.mobilePlaceholder
				: 'Tìm tin tức, sự kiện...';
		};
		syncNewsPlaceholder();
		if (typeof mobileNewsQuery.addEventListener === 'function') {
			mobileNewsQuery.addEventListener('change', syncNewsPlaceholder);
		} else if (typeof mobileNewsQuery.addListener === 'function') {
			mobileNewsQuery.addListener(syncNewsPlaceholder);
		}
	}

	function toggleMenu(show) {
		if (!menuDrawer) return;
		const isCurrentlyHidden = menuDrawer.classList.contains('hidden');
		const shouldShow = typeof show === 'boolean' ? show : isCurrentlyHidden;

		if (shouldShow) {
			lastMenuTrigger = document.activeElement;
			menuDrawer.classList.remove('hidden');
			menuDrawer.setAttribute('aria-hidden', 'false');
			document.body.classList.add('overflow-hidden');
			if (menuToggle) menuToggle.setAttribute('aria-expanded', 'true');
			if (menuClose) menuClose.focus();
		} else {
			menuDrawer.classList.add('hidden');
			menuDrawer.setAttribute('aria-hidden', 'true');
			document.body.classList.remove('overflow-hidden');
			if (menuToggle) menuToggle.setAttribute('aria-expanded', 'false');
			if (lastMenuTrigger && typeof lastMenuTrigger.focus === 'function') {
				lastMenuTrigger.focus();
			} else if (menuToggle) {
				menuToggle.focus();
			}
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

	if (menuDrawer) {
		document.addEventListener('keydown', function (event) {
			if (event.key === 'Escape' && !menuDrawer.classList.contains('hidden')) {
				toggleMenu(false);
			}
		});
	}

	// Shared "Các Dịch Vụ Khác" carousel. Arrow controls stay outside the
	// linked cards so they never block the card anchors from receiving clicks.
	document.querySelectorAll('.vpc-bao-mau__services').forEach(function (section) {
		const viewport = section.querySelector('.vpc-bao-mau__services-viewport');
		const track = section.querySelector('.vpc-bao-mau__services-track');
		if (!viewport || !track) return;

		const getStep = function () {
			const card = track.querySelector('.vpc-bao-mau__service-card');
			if (!card) return viewport.clientWidth;
			const trackStyles = window.getComputedStyle(track);
			const gap = parseFloat(trackStyles.columnGap || trackStyles.gap) || 0;
			return card.getBoundingClientRect().width + gap;
		};

		section.querySelectorAll('.vpc-bao-mau__services-arrow').forEach(function (button) {
			button.addEventListener('click', function () {
				const direction = button.classList.contains('vpc-bao-mau__services-arrow--next') ? 1 : -1;
				viewport.scrollBy({ left: direction * getStep(), behavior: 'smooth' });
			});
		});
	});

	// Hide the mobile sticky CTA while any part of the footer is visible so it
	// cannot cover the footer links or certification badges on small screens.
	const mobileStickyCta = document.getElementById('mobile-sticky-cta');
	const siteFooter = document.querySelector('.site-footer');
	if (mobileStickyCta && siteFooter) {
		function updateMobileStickyCta() {
			const footerBounds = siteFooter.getBoundingClientRect();
			const footerIsVisible = footerBounds.top < window.innerHeight && footerBounds.bottom > 0;

			mobileStickyCta.classList.toggle('translate-y-full', footerIsVisible);
			mobileStickyCta.classList.toggle('opacity-0', footerIsVisible);
			mobileStickyCta.classList.toggle('invisible', footerIsVisible);
			mobileStickyCta.classList.toggle('pointer-events-none', footerIsVisible);
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

	// Service navigation: the label links to the overview, while the adjacent
	// chevron is the only control that opens the related-services dropdown.
	const serviceMenuItems = document.querySelectorAll('.vpc-service-menu-item');
	serviceMenuItems.forEach(function (item) {
		const toggle = item.querySelector(':scope > .vpc-service-menu-control > .vpc-service-menu-toggle');
		const dropdown = item.querySelector(':scope > .vpc-service-dropdown');

		if (!toggle || !dropdown) return;

		function closeServiceDropdown(restoreFocus) {
			dropdown.hidden = true;
			toggle.setAttribute('aria-expanded', 'false');
			if (restoreFocus) toggle.focus();
		}

		function closeOtherServiceDropdowns() {
			document.querySelectorAll('.vpc-service-menu-toggle[aria-expanded="true"]').forEach(function (otherToggle) {
				if (otherToggle === toggle) return;
				otherToggle.setAttribute('aria-expanded', 'false');
				const otherDropdown = document.getElementById(otherToggle.getAttribute('aria-controls'));
				if (otherDropdown) otherDropdown.hidden = true;
			});
		}

		toggle.addEventListener('click', function (event) {
			event.preventDefault();
			event.stopPropagation();
			const shouldOpen = toggle.getAttribute('aria-expanded') !== 'true';

			closeOtherServiceDropdowns();
			toggle.setAttribute('aria-expanded', shouldOpen ? 'true' : 'false');
			dropdown.hidden = !shouldOpen;
		});

		item.addEventListener('keydown', function (event) {
			if (event.key === 'Escape' && toggle.getAttribute('aria-expanded') === 'true') {
				event.preventDefault();
				closeServiceDropdown(true);
			}
		});

		document.addEventListener('click', function (event) {
			if (!item.contains(event.target)) closeServiceDropdown(false);
		});
	});

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

	// Homepage consultation selects use the dedicated Figma select-item component.
	const consultationSelectComponents = document.querySelectorAll('[data-vpc-consultation-select]');
	consultationSelectComponents.forEach(function (container) {
		const nativeSelect = container.querySelector('.vpc-consultation-select-native');
		const trigger = container.querySelector('.vpc-consultation-select-trigger');
		const menu = container.querySelector('.vpc-consultation-select-menu');
		const label = container.querySelector('[data-vpc-consultation-select-label]');
		const options = Array.from(container.querySelectorAll('.vpc-consultation-select-option'));

		if (!nativeSelect || !trigger || !menu || !label || !options.length) return;

		options.forEach(function (option) {
			option.tabIndex = -1;
		});

		function getSelectedOption() {
			return options.find(function (option) {
				return option.getAttribute('data-value') === nativeSelect.value;
			});
		}

		function closeDropdown(restoreFocus) {
			container.classList.remove('is-open');
			trigger.setAttribute('aria-expanded', 'false');
			if (restoreFocus) trigger.focus();
		}

		function openDropdown() {
			document.querySelectorAll('[data-vpc-consultation-select].is-open').forEach(function (other) {
				if (other !== container) {
					other.classList.remove('is-open');
					const otherTrigger = other.querySelector('.vpc-consultation-select-trigger');
					if (otherTrigger) otherTrigger.setAttribute('aria-expanded', 'false');
				}
			});

			container.classList.add('is-open');
			trigger.setAttribute('aria-expanded', 'true');
			const selectedOption = getSelectedOption() || options[0];
			if (selectedOption) selectedOption.focus();
		}

		function updateSelection(option, closeAfterSelect) {
			const value = option.getAttribute('data-value') || '';
			const text = option.textContent.trim();
			nativeSelect.value = value;
			nativeSelect.dispatchEvent(new Event('change', { bubbles: true }));
			label.textContent = text;
			trigger.classList.toggle('is-placeholder', !value);
			options.forEach(function (item) {
				item.setAttribute('aria-selected', item === option ? 'true' : 'false');
			});
			if (closeAfterSelect) closeDropdown(true);
		}

		trigger.addEventListener('click', function (event) {
			event.stopPropagation();
			if (trigger.getAttribute('aria-expanded') === 'true') {
				closeDropdown(false);
			} else {
				openDropdown();
			}
		});

		trigger.addEventListener('keydown', function (event) {
			if (event.key === 'ArrowDown' || event.key === 'Enter' || event.key === ' ') {
				event.preventDefault();
				openDropdown();
			} else if (event.key === 'Escape') {
				closeDropdown(false);
			}
		});

		options.forEach(function (option, index) {
			option.addEventListener('click', function (event) {
				event.stopPropagation();
				updateSelection(option, true);
			});

			option.addEventListener('keydown', function (event) {
				let nextIndex = index;
				if (event.key === 'ArrowDown') nextIndex = (index + 1) % options.length;
				if (event.key === 'ArrowUp') nextIndex = (index - 1 + options.length) % options.length;
				if (event.key === 'Home') nextIndex = 0;
				if (event.key === 'End') nextIndex = options.length - 1;
				if (nextIndex !== index) {
					event.preventDefault();
					options[nextIndex].focus();
				} else if (event.key === 'Enter' || event.key === ' ') {
					event.preventDefault();
					updateSelection(option, true);
				} else if (event.key === 'Escape') {
					event.preventDefault();
					closeDropdown(true);
				}
			});
		});

		nativeSelect.addEventListener('change', function () {
			const selectedOption = getSelectedOption();
			if (!selectedOption) return;
			label.textContent = selectedOption.textContent.trim();
			trigger.classList.toggle('is-placeholder', !nativeSelect.value);
			options.forEach(function (option) {
				option.setAttribute('aria-selected', option === selectedOption ? 'true' : 'false');
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
		document.querySelectorAll('[data-vpc-consultation-select].is-open').forEach(function (container) {
			container.classList.remove('is-open');
			const trigger = container.querySelector('.vpc-consultation-select-trigger');
			if (trigger) trigger.setAttribute('aria-expanded', 'false');
		});
	});

	// Modal Dialog Handlers
	// Modal Dialog Handlers
	function getFocusableElements(container) {
		return Array.from(container.querySelectorAll('button:not([disabled]), [href], input:not([disabled]), select:not([disabled]), textarea:not([disabled]), [tabindex]:not([tabindex="-1"])'))
			.filter(function (element) { return !element.closest('.hidden'); });
	}

	function openModal(modalId, serviceValue, triggerBtn) {
		const modal = document.getElementById(modalId);
		if (!modal) return;
		if (!modal.contains(document.activeElement)) {
			modal.vpcTrigger = document.activeElement;
		}

		// Auto copy data from source form / teaser card if present
		let sourceContainer = null;
		if (triggerBtn) {
			sourceContainer = triggerBtn.closest('form, .vpc-bath__lead-card, .about-consultation-card, .vpc-consultation-card');
		}
		if (!sourceContainer) {
			// Find any active teaser or consultation card on page that has user-entered inputs
			const candidateForms = document.querySelectorAll('.vpc-bath__lead-card, .about-consultation-card, #about-consultation-form, .vpc-consultation-form');
			for (let i = 0; i < candidateForms.length; i++) {
				const candidate = candidateForms[i];
				if (candidate.closest('[data-modal]')) continue; // skip inputs inside modals
				const nameVal = candidate.querySelector('input[name="customer_name"], input[name="full_name"]')?.value?.trim();
				const phoneVal = candidate.querySelector('input[name="customer_phone"], input[name="phone"]')?.value?.trim();
				if (nameVal || phoneVal) {
					sourceContainer = candidate;
					break;
				}
			}
		}

		if (sourceContainer) {
			const srcName = (sourceContainer.querySelector('input[name="customer_name"], input[name="full_name"], input[aria-label="Họ và tên"], input[placeholder*="Linh"]') || {}).value?.trim();
			const srcPhone = (sourceContainer.querySelector('input[name="customer_phone"], input[name="phone"], input[type="tel"], input[aria-label="Số điện thoại"], input[placeholder*="03"]') || {}).value?.trim();
			const srcEmail = (sourceContainer.querySelector('input[name="email"], input[type="email"]') || {}).value?.trim();
			const srcNote = (sourceContainer.querySelector('input[name="customer_note"], input[name="question"], textarea[name="question"], input[aria-label="Ghi chú"], input[placeholder*="nhu cầu"]') || {}).value?.trim();
			const packageTrigger = sourceContainer.querySelector('.vpc-bath__lead-select [data-select-label], .about-consultation-shared-select [data-select-label], [data-select-trigger] [data-select-label]');
			const srcPackage = (packageTrigger ? packageTrigger.textContent?.trim() : '') || (sourceContainer.querySelector('select[name="service_package"], input[name="service_package"]') || {}).value?.trim();
			const srcService = (sourceContainer.querySelector('select[name="service"], input[name="service"]') || {}).value?.trim();

			if (!serviceValue && srcService) {
				serviceValue = srcService;
			}

			const modalName = modal.querySelector('input[name="full_name"], input[name="customer_name"]');
			if (modalName && srcName && !modalName.value) {
				modalName.value = srcName;
			}

			const modalPhone = modal.querySelector('input[name="phone"], input[name="customer_phone"]');
			if (modalPhone && srcPhone && !modalPhone.value) {
				modalPhone.value = srcPhone;
			}

			const modalEmail = modal.querySelector('input[name="email"]');
			if (modalEmail && srcEmail && !modalEmail.value) {
				modalEmail.value = srcEmail;
			}

			const modalNote = modal.querySelector('input[name="question"], textarea[name="question"], input[name="customer_note"]');
			if (modalNote && !modalNote.value) {
				let combinedNote = srcNote || '';
				if (srcPackage && srcPackage !== 'Chọn gói dịch vụ') {
					const pkgText = 'Gói quan tâm: ' + srcPackage;
					combinedNote = combinedNote ? pkgText + ' - ' + combinedNote : pkgText;
				}
				if (combinedNote) {
					modalNote.value = combinedNote;
				}
			}
		}

		// Pre-select service in modal if provided
		if (serviceValue) {
			const targetOption = modal.querySelector(`.vpc-select-option[data-value="${serviceValue}"]`);
			if (targetOption) {
				targetOption.click();
			} else {
				const selectEl = modal.querySelector('select[name="service"]');
				if (selectEl) {
					selectEl.value = serviceValue;
					selectEl.dispatchEvent(new Event('change', { bubbles: true }));
				}
			}
		}

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
				card.classList.remove('opacity-0');
				card.classList.add('opacity-100');
			}
			const focusable = getFocusableElements(modal);
			if (focusable[0]) focusable[0].focus();
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
			card.classList.remove('opacity-100');
			card.classList.add('opacity-0');
		}

		setTimeout(function () {
			modal.classList.remove('flex');
			modal.classList.add('hidden');
			document.body.classList.remove('overflow-hidden');
			if (modal.vpcTrigger && document.contains(modal.vpcTrigger)) {
				modal.vpcTrigger.focus();
			}
		}, 250);
	}

	// Trigger open buttons: [data-open-modal="modal-id"]
	document.querySelectorAll('[data-open-modal]').forEach(function (btn) {
		btn.addEventListener('click', function (e) {
			e.preventDefault();
			const targetId = btn.getAttribute('data-open-modal');
			const targetService = btn.getAttribute('data-service') || '';
			openModal(targetId, targetService, btn);
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

	// Success modal: return to the services section when the visitor wants another service.
	document.querySelectorAll('[data-success-other]').forEach(function (btn) {
		btn.addEventListener('click', function () {
			closeModal(document.getElementById('vpc-success-modal'));
			setTimeout(function () {
				document.getElementById('trung-tam-o-cu')?.scrollIntoView({ behavior: 'smooth' });
			}, 250);
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
		if (e.key === 'Tab') {
			const openModalElement = Array.from(document.querySelectorAll('[data-modal]:not(.hidden)')).pop();
			if (openModalElement) {
				const focusable = getFocusableElements(openModalElement);
				if (focusable.length) {
					const first = focusable[0];
					const last = focusable[focusable.length - 1];
					if (e.shiftKey && document.activeElement === first) {
						last.focus();
						e.preventDefault();
					} else if (!e.shiftKey && document.activeElement === last) {
						first.focus();
						e.preventDefault();
					}
				}
			}
		}
		if (e.key === 'Escape' || e.key === 'Esc') {
			const openModals = document.querySelectorAll('[data-modal]:not(.hidden)');
			openModals.forEach(function (modal) {
				closeModal(modal);
			});
		}
	});

	function generateUUIDv4() {
		if (typeof crypto !== 'undefined' && typeof crypto.randomUUID === 'function') {
			return crypto.randomUUID();
		}
		return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function (c) {
			const r = (Math.random() * 16) | 0;
			const v = c === 'x' ? r : (r & 0x3) | 0x8;
			return v.toString(16);
		});
	}

	// Consultation Form AJAX Submission
	function handleFormSubmission(form) {
		if (!form.dataset.vpcSubmissionId) {
			form.dataset.vpcSubmissionId = generateUUIDv4();
		}

		const status = document.createElement('p');
		status.className = 'hidden mt-3 text-sm font-medium';
		status.setAttribute('role', 'status');
		status.setAttribute('aria-live', 'polite');
		form.appendChild(status);

		function showStatus(message, isError) {
			status.textContent = message;
			status.classList.remove('hidden', 'text-text-success-default', 'text-text-error-default');
			status.classList.add(isError ? 'text-text-error-default' : 'text-text-success-default');
			if (isError && typeof window !== 'undefined' && window.turnstile && typeof window.turnstile.reset === 'function') {
				try { window.turnstile.reset(); } catch (ignore) {}
			}
		}

		form.addEventListener('submit', function (e) {
			e.preventDefault();
			const phoneField = form.querySelector('input[name="phone"], input[name="customer_phone"]');
			if (phoneField) {
				const normalizedPhone = phoneField.value.replace(/[\s().-]/g, '').replace(/^\+84/, '0').replace(/^84(?=\d{9}$)/, '0');
				if (!/^0[35789]\d{8}$/.test(normalizedPhone)) {
					phoneField.setCustomValidity('Vui lòng nhập số điện thoại di động Việt Nam gồm 10 chữ số.');
					phoneField.reportValidity();
					return;
				}
				phoneField.setCustomValidity('');
			}

			const submitBtn = form.querySelector('button[type="submit"]');
			const originalBtnHtml = submitBtn ? submitBtn.innerHTML : '';
			if (submitBtn) {
				submitBtn.disabled = true;
				submitBtn.innerHTML = '<span class="inline-flex items-center gap-2"><svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-neutral-white" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>Đang gửi...</span>';
			}
			showStatus('Đang gửi thông tin…', false);

			const formData = new FormData(form);
			formData.append('action', 'vpc_submit_consultation');
			if (window.vpcData && window.vpcData.nonce) {
				formData.set('nonce', window.vpcData.nonce);
			}
			if (!form.dataset.vpcSubmissionId) {
				form.dataset.vpcSubmissionId = generateUUIDv4();
			}
			formData.append('submission_id', form.dataset.vpcSubmissionId);

			function onSubmissionSuccess(msg, leadData) {
				try { sessionStorage.removeItem('vpcConsultationRetry'); } catch (ignore) {}
				form.reset();
				// Renew submissionId for any future separate submission from this form
				form.dataset.vpcSubmissionId = generateUUIDv4();
				// Reset Turnstile captcha widget if active
				if (typeof window !== 'undefined' && window.turnstile && typeof window.turnstile.reset === 'function') {
					try { window.turnstile.reset(); } catch (ignore) {}
				}
				// Reset custom select label if exists
				const labelSpan = form.querySelector('[data-select-label]');
				if (labelSpan) {
					labelSpan.textContent = 'Chọn dịch vụ';
					labelSpan.classList.add('text-neutral-500');
					labelSpan.classList.remove('text-text-body-default');
				}
				const successMessage = document.getElementById('vpc-success-modal-message');
				if (successMessage && msg) {
					successMessage.textContent = msg;
				}
				showStatus(msg || 'Thông tin đã được gửi thành công.', false);

				// Meta Pixel CAPI Deduplication Event Trigger
				if (typeof window !== 'undefined' && window.fbq && leadData?.eventId) {
					try {
						window.fbq('track', 'Lead', {
							content_name: form.querySelector('[name="service"]')?.value || 'Tu van website',
						}, { eventID: leadData.eventId });
					} catch (e) {
						console.warn('Meta Pixel tracking error:', e);
					}
				}

				// Close consultation modal if open
				const parentModal = form.closest('[data-modal]');
				if (parentModal) {
					closeModal(parentModal);
				}
				// Open success modal
				setTimeout(function () {
					openModal('vpc-success-modal');
				}, parentModal ? 250 : 0);
			}

			function onSubmissionDone() {
				if (submitBtn) {
					submitBtn.disabled = false;
					submitBtn.innerHTML = originalBtnHtml;
				}
			}

			if (window.vpcData && window.vpcData.ajaxUrl) {
				fetch(window.vpcData.ajaxUrl, {
					method: 'POST',
					body: formData
				})
				.then(function (res) { return res.json(); })
				.then(function (data) {
					if (data.success) {
						onSubmissionSuccess(data.data?.message, data.data);
					} else {
						showStatus(data.data?.message || 'Có lỗi xảy ra khi gửi thông tin. Vui lòng thử lại!', true);
					}
				})
				.catch(function (err) {
					console.error('Submission error:', err);
					// Never store lead fields in browser storage. This only retains a short-lived
					// retry indicator so the visitor can resubmit the form themselves.
					try { sessionStorage.setItem('vpcConsultationRetry', JSON.stringify({ formId: form.id || '', at: Date.now() })); } catch (ignore) {}
					showStatus('Không thể kết nối đến máy chủ. Vui lòng thử lại sau ít phút!', true);
				})
				.finally(function () {
					onSubmissionDone();
				});
			} else {
				showStatus('Không thể kết nối đến hệ thống tiếp nhận. Vui lòng thử lại sau ít phút!', true);
				onSubmissionDone();
			}
		});
	}

	const formSelectors = [
		'.vpc-consultation-modal form',
		'#vpc-section-consultation-form',
		'.vpc-consultation-form',
		'#vpc-contact-page-form',
		'#vpc-prenatal-form',
		'#about-consultation-form',
	].join(', ');

	document.querySelectorAll(formSelectors).forEach(function (f) {
		if (f && !f.dataset.vpcBound) {
			f.dataset.vpcBound = 'true';
			handleFormSubmission(f);
		}
	});

	// Hero Banner Slider
	const heroSlider = document.getElementById('vpc-hero-slider');
	if (heroSlider) {
		const slidesContainer = document.getElementById('vpc-hero-slides');
		const slides = heroSlider.querySelectorAll('.vpc-hero-slide');
		const dots = heroSlider.querySelectorAll('[data-hero-dot]');
		const prevBtn = document.getElementById('vpc-hero-prev');
		const nextBtn = document.getElementById('vpc-hero-next');
		let currentIndex = 0;
		let autoplayTimer = null;
		const totalSlides = slides.length;
		const reducedMotionQuery = window.matchMedia('(prefers-reduced-motion: reduce)');

		function goToSlide(index) {
			if (index < 0) {
				currentIndex = totalSlides - 1;
			} else if (index >= totalSlides) {
				currentIndex = 0;
			} else {
				currentIndex = index;
			}

			if (slidesContainer) {
				slidesContainer.style.transform = `translateX(-${currentIndex * 100}%)`;
				slidesContainer.style.transitionDuration = reducedMotionQuery.matches ? '0ms' : '';
			}

			dots.forEach((dot, i) => {
				if (i === currentIndex) {
					dot.classList.remove('w-2.5', 'bg-[rgb(255_255_255_/_0.7)]');
					dot.classList.add('w-8', 'bg-surface-button-primary-default');
				} else {
					dot.classList.remove('w-8', 'bg-surface-button-primary-default');
					dot.classList.add('w-2.5', 'bg-[rgb(255_255_255_/_0.7)]');
				}
			});
		}

		function startAutoplay() {
			stopAutoplay();
			if (reducedMotionQuery.matches || totalSlides < 2) return;
			autoplayTimer = setInterval(() => {
				goToSlide(currentIndex + 1);
			}, 5000);
		}

		function stopAutoplay() {
			if (autoplayTimer) {
				clearInterval(autoplayTimer);
				autoplayTimer = null;
			}
		}

		if (prevBtn) {
			prevBtn.addEventListener('click', (e) => {
				e.preventDefault();
				goToSlide(currentIndex - 1);
				startAutoplay();
			});
		}

		if (nextBtn) {
			nextBtn.addEventListener('click', (e) => {
				e.preventDefault();
				goToSlide(currentIndex + 1);
				startAutoplay();
			});
		}

		dots.forEach((dot) => {
			dot.addEventListener('click', (e) => {
				e.preventDefault();
				const idx = parseInt(dot.getAttribute('data-hero-dot'), 10);
				goToSlide(idx);
				startAutoplay();
			});
		});

		heroSlider.addEventListener('mouseenter', stopAutoplay);
		heroSlider.addEventListener('mouseleave', startAutoplay);

		const handleReducedMotionChange = () => {
			if (reducedMotionQuery.matches) {
				stopAutoplay();
			} else {
				startAutoplay();
			}
			goToSlide(currentIndex);
		};
		if (typeof reducedMotionQuery.addEventListener === 'function') {
			reducedMotionQuery.addEventListener('change', handleReducedMotionChange);
		} else if (typeof reducedMotionQuery.addListener === 'function') {
			reducedMotionQuery.addListener(handleReducedMotionChange);
		}

		// Touch swipe support
		let touchStartX = 0;
		let touchEndX = 0;
		heroSlider.addEventListener('touchstart', (e) => {
			touchStartX = e.changedTouches[0].screenX;
			stopAutoplay();
		}, { passive: true });

		heroSlider.addEventListener('touchend', (e) => {
			touchEndX = e.changedTouches[0].screenX;
			if (touchStartX - touchEndX > 50) {
				goToSlide(currentIndex + 1);
			} else if (touchEndX - touchStartX > 50) {
				goToSlide(currentIndex - 1);
			}
			startAutoplay();
		}, { passive: true });

		startAutoplay();
	}

	console.log('Vạn Phúc Care Theme initialized successfully.');
});
