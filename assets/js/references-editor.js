/* global wp */
(() => {
	const { createElement: h, useState } = wp.element;
	const { useBlockProps, PlainText } = wp.blockEditor;
	const { Button, TextControl } = wp.components;
	const validUrl = url => { try { return /^https?:$/.test(new URL(url).protocol); } catch { return false; } };
	function Edit({ attributes: { title, sources }, setAttributes, isSelected }) {
		const [expanded, setExpanded] = useState(false);
		const update = (index, field, value) => setAttributes({ sources: sources.map((source, i) => i === index ? { ...source, [field]: value } : source) });
		return h('section', useBlockProps({ className: 'vpc-references' }),
			h('h2', null, h(PlainText, { value: title, onChange: title => setAttributes({ title }), 'aria-label': 'Tiêu đề tài liệu tham khảo' })),
			h('ol', { className: 'vpc-references__list', role: 'list' }, sources.map((source, index) =>
				h('li', { key: index, hidden: !isSelected && !expanded && index >= 4 },
					h('div', { className: 'vpc-references__row' + (validUrl(source.url) ? ' vpc-references__row--linked' : '') },
						h('span', { className: 'vpc-references__number' }, '[' + (index + 1) + ']'),
						h(PlainText, { className: 'vpc-references__text', value: source.text, placeholder: 'Tác giả. Tên tài liệu – Năm.',
							'aria-label': 'Mô tả nguồn ' + (index + 1), onChange: value => update(index, 'text', value) }),
						h('span', { className: 'vpc-references__external' + (validUrl(source.url) ? '' : ' is-unlinked'), 'aria-hidden': true })),
					isSelected && h('div', { className: 'vpc-references__edit' },
						h(TextControl, { label: 'URL nguồn ' + (index + 1), type: 'url', value: source.url, placeholder: 'https://…',
							help: source.url && !validUrl(source.url) ? 'Nhập URL đầy đủ bắt đầu bằng https:// hoặc http://.' : '', onChange: value => update(index, 'url', value) }),
						h(Button, { variant: 'tertiary', isDestructive: true, onClick: () => setAttributes({ sources: sources.filter((_, i) => i !== index) }) }, 'Xóa nguồn ' + (index + 1)))))),
			!isSelected && sources.length > 4 && h('button', { type: 'button', className: 'vpc-references__toggle', 'aria-expanded': expanded, onClick: () => setExpanded(!expanded) },
				expanded ? 'Thu gọn' : 'Xem thêm ' + (sources.length - 4) + ' nguồn', h('span', { 'aria-hidden': true })),
			isSelected && h(Button, { variant: 'secondary', onClick: () => setAttributes({ sources: [...sources, { text: '', url: '' }] }) }, 'Thêm nguồn')
		);
	}
	wp.blocks.registerBlockType('vanphuccare/references', {
		apiVersion: 3, title: 'Tài liệu tham khảo', category: 'widgets', icon: 'external',
		attributes: { title: { type: 'string', default: 'Tài liệu tham khảo' }, sources: { type: 'array', default: [] } },
		supports: { html: false, customClassName: false },
		transforms: { from: [{
			type: 'block', blocks: ['core/group'],
			isMatch: (attrs, block) => {
				const children = block?.innerBlocks;
				if (!(attrs.className || '').split(/\s+/).includes('vpc-references') || children?.length !== 2 ||
					children[0].name !== 'core/heading' || children[1].name !== 'core/list') return false;
				// The new block stores one plain citation and one URL per source. Do not
				// offer a lossy conversion for nested lists, rich formatting or multiple links.
				const root = document.createElement('div');
				root.innerHTML = wp.blocks.serialize(children);
				return !root.querySelector('li li, strong, em, code, img, br') &&
					Array.from(root.querySelectorAll('li')).every(row => row.querySelectorAll('a').length <= 1);
			},
			transform: (attrs, children) => {
				const root = document.createElement('div');
				root.innerHTML = wp.blocks.serialize(children);
				return wp.blocks.createBlock('vanphuccare/references', {
					title: root.querySelector('h2,h3')?.textContent || 'Tài liệu tham khảo',
					sources: Array.from(root.querySelectorAll('li'), row => ({ text: row.textContent, url: row.querySelector('a')?.getAttribute('href') || '' }))
				});
			}
		}] },
		edit: Edit, save: () => null
	});
})();
