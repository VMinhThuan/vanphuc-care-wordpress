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
	let selected;
	let anchorLink;
	let frame = 0;

	function selectLink(link) {
		if (link === selected) return;
		selected?.removeAttribute('aria-current');
		selected = link;
		selected.setAttribute('aria-current', 'location');
	}

	function highlight() {
		frame = 0;
		if (anchorLink) {
			selectLink(anchorLink);
			return;
		}
		const scrollMargin = parseFloat(getComputedStyle(headings[0]).scrollMarginTop) || 0;
		const scrollPadding = parseFloat(getComputedStyle(document.documentElement).scrollPaddingTop) || 0;
		const readingLine = scrollMargin + scrollPadding + 1;
		let current = 0;
		for (let i = 0; i < headings.length; i++) {
			if (headings[i].getBoundingClientRect().top > readingLine) break;
			current = i;
		}
		selectLink(links[current]);
	}

	function queueHighlight() {
		if (!frame) frame = requestAnimationFrame(highlight);
	}

	function syncFragment() {
		let target;
		try {
			target = document.getElementById(decodeURIComponent(location.hash.slice(1)));
		} catch {
			// Malformed external fragment: use the current reading position.
		}
		const index = headings.indexOf(target);
		anchorLink = links[index];
		queueHighlight();
	}

	toc.addEventListener('click', event => {
		const link = event.target.closest('a');
		if (!link || event.ctrlKey || event.metaKey || event.shiftKey || event.altKey) return;
		anchorLink = link;
		selectLink(link);
		if (mobile.matches) toc.open = false;
	});

	// Native fragment scrolling and lazy-loaded images may settle over several frames.
	// Keep the requested section selected until the reader scrolls the document.
	function resumeTracking(event) {
		if (!anchorLink || toc.contains(event.target)) return;
		anchorLink = undefined;
		queueHighlight();
	}
	window.addEventListener('wheel', resumeTracking, { passive: true });
	window.addEventListener('touchmove', resumeTracking, { passive: true });
	document.addEventListener('pointerdown', event => {
		if (event.target === document.documentElement || event.button === 1) resumeTracking(event);
	});
	document.addEventListener('keydown', event => {
		if (['ArrowDown', 'ArrowUp', 'PageDown', 'PageUp', 'Home', 'End', ' '].includes(event.key)) {
			resumeTracking(event);
		}
	});
	window.addEventListener('scroll', queueHighlight, { passive: true });
	window.addEventListener('resize', queueHighlight);
	window.addEventListener('hashchange', syncFragment);
	syncFragment();
})();

// Enhance optional blocks independently of the presence of article headings.
(() => {
	const body = document.querySelector('.vpc-reader__body');
	if (!body) return;

	body.querySelectorAll('.vpc-checklist').forEach(block => {
		const list = block.querySelector('ul');
		if (!list || !list.children.length) return;
		const count = document.createElement('p');
		count.className = 'vpc-checklist__count';
		count.setAttribute('aria-live', 'polite');
		list.before(count);
		list.classList.add('vpc-checklist__items');
		const boxes = Array.from(list.children, item => {
			const label = document.createElement('label');
			const box = document.createElement('input');
			box.type = 'checkbox';
			label.append(box, ...Array.from(item.childNodes));
			item.append(label);
			return box;
		});
		function updateCount() {
			const checked = boxes.filter(box => box.checked).length;
			count.textContent = 'Đã chuẩn bị ' + checked + '/' + boxes.length;
		}
		list.addEventListener('change', updateCount);
		updateCount();
	});

	// Preserve Yoast's section IDs, formatted answers and structured data.
	body.querySelectorAll('.schema-faq-section').forEach(section => {
		const question = section.querySelector(':scope > .schema-faq-question');
		const answer = section.querySelector(':scope > .schema-faq-answer');
		if (!question || !answer) return;
		const details = document.createElement('details');
		const summary = document.createElement('summary');
		question.before(details);
		summary.append(question);
		details.append(summary, answer);
		section.classList.add('vpc-yoast-faq');
		if (section.closest(':target') || section.querySelector(':target')) details.open = true;
	});
})();
