/* Small page-only enhancements for the Bảo mẫu landing page. */
document.addEventListener('DOMContentLoaded', function () {
	const faqItems = document.querySelectorAll('.vpc-bao-mau__faq details');
	faqItems.forEach(function (item) {
		item.addEventListener('toggle', function () {
			if (!item.open) return;
			faqItems.forEach(function (other) {
				if (other !== item) other.removeAttribute('open');
			});
		});
	});
});
