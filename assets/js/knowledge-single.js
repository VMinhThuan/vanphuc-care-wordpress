(() => {
	const reader = document.querySelector('.vpc-reader');
	if (!reader) return;

	const body = reader.querySelector('.vpc-reader__body');
	const rail = reader.querySelector('.vpc-reader__rail');
	const toc = rail.querySelector('details');
	const original = body.querySelector('.yoast-table-of-contents, .wp-block-yoast-seo-table-of-contents');
	const headings = Array.from(body.querySelectorAll('h2, h3')).filter(
		heading => !original?.contains(heading) && heading.textContent.trim()
	);
	const first = body.firstElementChild;
	const intro = first?.matches('.wp-block-image') ? first.nextElementSibling : first;
	const excerpt = reader.querySelector('.vpc-reader__lead');
	if (excerpt && reader.querySelector('.vpc-reader__cover') === null && first?.matches('.wp-block-image')) {
		first.after(excerpt);
	}
	if (!excerpt && intro?.matches('p')) intro.classList.add('vpc-reader__lead');

	if (!headings.length) return;
	const labels = new Map();
	for (const link of original?.querySelectorAll('a[href^="#"]') || []) {
		try {
			labels.set(decodeURIComponent(link.hash.slice(1)), link.textContent.trim());
		} catch {
			// An invalid legacy fragment can fall back to the heading text.
		}
	}
	const list = document.createElement('ol');
	const links = [];
	let children;
	for (const heading of headings) {
		if (!heading.id) {
			const base = heading.textContent.trim().toLowerCase().replace(/[^\p{L}\p{N}]+/gu, '-').replace(/^-|-$/g, '') || 'muc';
			let id = base;
			let index = 2;
			while (document.getElementById(id)) id = base + '-' + index++;
			heading.id = id;
		}
		const li = document.createElement('li');
		const link = document.createElement('a');
		link.href = '#' + encodeURIComponent(heading.id);
		link.textContent = labels.get(heading.id) || heading.textContent.trim();
		li.append(link);
		links.push(link);
		if (heading.tagName === 'H3' && children) {
			children.append(li);
		} else {
			list.append(li);
			children = document.createElement('ul');
			li.append(children);
		}
	}
	toc.querySelector('nav').append(list);
	original?.remove();
	toc.hidden = false;
	const mobile = matchMedia('(max-width: 900px)');
	function positionToc() {
		if (mobile.matches) {
			const lead = reader.querySelector('.vpc-reader__lead');
			if (lead) lead.after(toc);
			else if (first?.isConnected && first.matches('.wp-block-image')) first.after(toc);
			else body.prepend(toc);
		} else {
			rail.prepend(toc);
		}
		toc.open = !mobile.matches;
	}
	positionToc();
	mobile.addEventListener('change', positionToc);
	toc.addEventListener('click', event => {
		if (mobile.matches && event.target.closest('a')) toc.open = false;
	});
	let selected;
	function highlight() {
		let current = 0;
		for (let i = 0; i < headings.length; i++) {
			if (headings[i].getBoundingClientRect().top > 135) break;
			current = i;
		}
		selected?.removeAttribute('aria-current');
		selected = links[current];
		selected.setAttribute('aria-current', 'location');
	}
	const observer = new IntersectionObserver(highlight, { rootMargin: '-125px 0px 0px' });
	headings.forEach(heading => observer.observe(heading));
	highlight();
})();
