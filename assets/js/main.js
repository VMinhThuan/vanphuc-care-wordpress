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
	// Modal Dialog Handlers
	function getFocusableElements(container) {
		return Array.from(container.querySelectorAll('button:not([disabled]), [href], input:not([disabled]), select:not([disabled]), textarea:not([disabled]), [tabindex]:not([tabindex="-1"])'))
			.filter(function (element) { return !element.closest('.hidden'); });
	}

	function openModal(modalId, serviceValue) {
		const modal = document.getElementById(modalId);
		if (!modal) return;
		if (!modal.contains(document.activeElement)) {
			modal.vpcTrigger = document.activeElement;
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
			openModal(targetId, targetService);
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

	// Consultation Form AJAX Submission
	function handleFormSubmission(form) {
		const status = document.createElement('p');
		status.className = 'hidden mt-3 text-sm font-medium';
		status.setAttribute('role', 'status');
		status.setAttribute('aria-live', 'polite');
		form.appendChild(status);

		function showStatus(message, isError) {
			status.textContent = message;
			status.classList.remove('hidden', 'text-text-success-default', 'text-text-error-default');
			status.classList.add(isError ? 'text-text-error-default' : 'text-text-success-default');
		}

		form.addEventListener('submit', function (e) {
			e.preventDefault();

			const submitBtn = form.querySelector('button[type="submit"]');
			const originalBtnHtml = submitBtn ? submitBtn.innerHTML : '';
			if (submitBtn) {
				submitBtn.disabled = true;
				submitBtn.innerHTML = '<span class="inline-flex items-center gap-2"><svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>Đang gửi...</span>';
			}
			showStatus('Đang gửi thông tin…', false);

			const formData = new FormData(form);
			formData.append('action', 'vpc_submit_consultation');
			if (window.vpcData && window.vpcData.nonce) {
				formData.set('nonce', window.vpcData.nonce);
			}

			function onSubmissionSuccess(msg) {
				form.reset();
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
						onSubmissionSuccess(data.data?.message);
					} else {
						showStatus(data.data?.message || 'Có lỗi xảy ra khi gửi thông tin. Vui lòng thử lại!', true);
					}
				})
				.catch(function (err) {
					console.error('Submission error:', err);
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

	const modalForm = document.querySelector('.vpc-consultation-modal form');
	if (modalForm) handleFormSubmission(modalForm);

	const sectionForm = document.getElementById('vpc-section-consultation-form');
	if (sectionForm) handleFormSubmission(sectionForm);

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
			}

			dots.forEach((dot, i) => {
				if (i === currentIndex) {
					dot.classList.remove('w-2.5', 'bg-white/70');
					dot.classList.add('w-8', 'bg-surface-button-primary-default');
				} else {
					dot.classList.remove('w-8', 'bg-surface-button-primary-default');
					dot.classList.add('w-2.5', 'bg-white/70');
				}
			});
		}

		function startAutoplay() {
			stopAutoplay();
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
