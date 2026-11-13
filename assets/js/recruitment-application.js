/**
 * Recruitment application modal interactions.
 */
(function () {
	'use strict';

	function getFocusable(container) {
		return Array.from(container.querySelectorAll('button:not([disabled]), a[href], input:not([disabled]), select:not([disabled]), [tabindex]:not([tabindex="-1"])')).filter(function (element) {
			return !element.closest('[hidden]');
		});
	}

	document.addEventListener('DOMContentLoaded', function () {
		const modal = document.querySelector('[data-recruitment-modal]');
		if (!modal) return;

		const panels = modal.querySelectorAll('[data-recruitment-form-panel]');
		const success = modal.querySelector('[data-recruitment-success]');
		let lastTrigger = null;

		function setState(state) {
			panels.forEach(function (panel) {
				panel.hidden = state !== panel.getAttribute('data-recruitment-form-panel');
			});
			if (success) success.hidden = state !== 'success';
		}

		function openModal(mode, trigger) {
			lastTrigger = trigger || document.activeElement;
			setState(mode === 'general' ? 'general' : 'apply');
			modal.hidden = false;
			document.body.classList.add('overflow-hidden');
			const first = getFocusable(modal)[0];
			if (first) window.setTimeout(function () { first.focus(); }, 0);
		}

		function closeModal() {
			modal.hidden = true;
			document.body.classList.remove('overflow-hidden');
			if (lastTrigger && document.contains(lastTrigger) && typeof lastTrigger.focus === 'function') lastTrigger.focus();
		}

		document.querySelectorAll('[data-recruitment-open]').forEach(function (trigger) {
			trigger.addEventListener('click', function () {
				openModal(trigger.getAttribute('data-recruitment-open'), trigger);
			});
		});

		modal.querySelectorAll('[data-recruitment-close]').forEach(function (button) {
			button.addEventListener('click', closeModal);
		});

		modal.addEventListener('click', function (event) {
			if (event.target === modal) closeModal();
		});

		modal.querySelectorAll('input[type="file"]').forEach(function (input) {
			input.addEventListener('change', function () {
				const file = input.files && input.files[0];
				const name = input.closest('[data-recruitment-form]').querySelector('[data-recruitment-file-name]');
				if (!name || !file) return;
				name.textContent = file.name;
			});
		});

		modal.querySelectorAll('[data-recruitment-form]').forEach(function (form) {
			form.addEventListener('submit', function (event) {
				event.preventDefault();
				if (!form.reportValidity()) return;

				const phone = form.querySelector('input[name="phone"]');
				if (phone) {
					const normalized = phone.value.replace(/[\s().-]/g, '').replace(/^\+84/, '0').replace(/^84(?=\d{9}$)/, '0');
					if (!/^0[35789]\d{8}$/.test(normalized)) {
						phone.setCustomValidity('Vui lòng nhập số điện thoại di động Việt Nam gồm 10 chữ số.');
						phone.reportValidity();
						return;
					}
					phone.setCustomValidity('');
				}

				const submit = form.querySelector('button[type="submit"]');
				const status = form.querySelector('[data-recruitment-status]');
				const originalText = submit ? submit.textContent : '';
				if (submit) {
					submit.disabled = true;
					submit.textContent = 'Đang gửi...';
				}
				if (status) {
					status.hidden = false;
					status.textContent = 'Đang gửi hồ sơ…';
				}

				const data = new FormData(form);
				data.set('action', 'vpc_submit_consultation');
				if (window.vpcData && window.vpcData.nonce) data.set('nonce', window.vpcData.nonce);
				data.set('submission_id', (window.crypto && window.crypto.randomUUID) ? window.crypto.randomUUID() : String(Date.now()));

				if (!window.vpcData || !window.vpcData.ajaxUrl) {
					if (status) status.textContent = 'Không thể kết nối đến hệ thống tiếp nhận. Vui lòng thử lại sau ít phút.';
					if (submit) { submit.disabled = false; submit.textContent = originalText; }
					return;
				}

				fetch(window.vpcData.ajaxUrl, { method: 'POST', body: data })
					.then(function (response) { return response.json(); })
					.then(function (result) {
						if (!result.success) throw new Error(result.data && result.data.message ? result.data.message : 'Chưa thể gửi hồ sơ.');
						form.reset();
						const fileName = form.querySelector('[data-recruitment-file-name]');
						if (fileName) fileName.textContent = 'Chọn tệp CV từ thiết bị';
						setState('success');
					})
					.catch(function (error) {
						if (status) status.textContent = error.message || 'Chưa thể gửi hồ sơ. Vui lòng thử lại.';
					})
					.finally(function () {
						if (submit) { submit.disabled = false; submit.textContent = originalText; }
					});
			});
		});

		const otherButton = modal.querySelector('[data-recruitment-success-other]');
		if (otherButton) otherButton.addEventListener('click', function () {
			closeModal();
			const jobs = document.querySelector('.vpc-recruitment-detail__related, [data-recruitment-list]');
			if (jobs) jobs.scrollIntoView({ behavior: 'smooth', block: 'start' });
			else if (otherButton.dataset.recruitmentUrl) window.location.href = otherButton.dataset.recruitmentUrl;
		});

		document.addEventListener('keydown', function (event) {
			if (modal.hidden) return;
			if (event.key === 'Escape') {
				event.preventDefault();
				closeModal();
				return;
			}
			if (event.key === 'Tab') {
				const focusable = getFocusable(modal);
				if (!focusable.length) return;
				const first = focusable[0];
				const last = focusable[focusable.length - 1];
				if (event.shiftKey && document.activeElement === first) { event.preventDefault(); last.focus(); }
				else if (!event.shiftKey && document.activeElement === last) { event.preventDefault(); first.focus(); }
			}
		});
	});
})();
