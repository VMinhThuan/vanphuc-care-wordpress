(function () {
	'use strict';

	document.addEventListener('DOMContentLoaded', function () {
		var root = document.querySelector('.vpc-milk');
		if (!root) {
			return;
		}

		root.querySelectorAll('.vpc-milk__faq details').forEach(function (item) {
			item.addEventListener('toggle', function () {
				if (!item.open) {
					return;
				}
				root.querySelectorAll('.vpc-milk__faq details').forEach(function (other) {
					if (other !== item) {
						other.open = false;
					}
				});
			});
		});

		var viewport = root.querySelector('.vpc-milk__services-viewport');
		var step = 324;
		root.querySelector('.vpc-milk__services-arrow--prev')?.addEventListener('click', function () { viewport.scrollBy({ left: -step, behavior: 'smooth' }); });
		root.querySelector('.vpc-milk__services-arrow--next')?.addEventListener('click', function () { viewport.scrollBy({ left: step, behavior: 'smooth' }); });
	});
}());
