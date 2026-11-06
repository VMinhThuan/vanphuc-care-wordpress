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
	});
}());
