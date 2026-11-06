(function () {
	'use strict';

	document.addEventListener('DOMContentLoaded', function () {
		var root = document.querySelector('.vpc-bath');
		if (!root) {
			return;
		}

		root.querySelectorAll('.vpc-bath__faq details').forEach(function (item) {
			item.addEventListener('toggle', function () {
				if (!item.open) {
					return;
				}

				root.querySelectorAll('.vpc-bath__faq details').forEach(function (other) {
					if (other !== item) {
						other.open = false;
					}
				});
			});
		});

		root.querySelectorAll('.vpc-bath__services').forEach(function (section) {
			var viewport = section.querySelector('.vpc-bath__services-viewport');
			var track = section.querySelector('.vpc-bath__services-track');

			if (!viewport || !track) {
				return;
			}

			var getStep = function () {
				var card = track.querySelector('.vpc-bath__service-card');
				if (!card) {
					return viewport.clientWidth;
				}

				var trackStyles = window.getComputedStyle(track);
				var gap = parseFloat(trackStyles.columnGap || trackStyles.gap) || 0;
				return card.getBoundingClientRect().width + gap;
			};

			section.querySelectorAll('.vpc-bath__services-arrow').forEach(function (button) {
				button.addEventListener('click', function () {
					var direction = button.classList.contains('vpc-bath__services-arrow--next') ? 1 : -1;
					viewport.scrollBy({ left: direction * getStep(), behavior: 'smooth' });
				});
			});
		});
	});
}());
