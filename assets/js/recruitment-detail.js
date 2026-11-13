(function () {
	'use strict';

	document.querySelectorAll('[data-copy-link]').forEach(function (button) {
		button.addEventListener('click', function () {
			var url = button.getAttribute('data-copy-link') || window.location.href;
			var done = function () {
				button.setAttribute('aria-label', 'Đã sao chép liên kết');
				window.setTimeout(function () {
					button.setAttribute('aria-label', 'Sao chép liên kết');
				}, 1600);
			};

			if (navigator.clipboard && window.isSecureContext) {
				navigator.clipboard.writeText(url).then(done).catch(function () {});
			}
		});
	});
}());
