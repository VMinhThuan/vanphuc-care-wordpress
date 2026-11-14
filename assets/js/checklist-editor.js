/* global wp */
(() => {
	const { createElement: h, useState, useEffect } = wp.element;
	const { PlainText, useBlockProps } = wp.blockEditor;
	const { Button } = wp.components;

	function Edit({ attributes: { title, items }, setAttributes, isSelected }) {
		const [checked, setChecked] = useState([]);
		// Preview ticks belong to this editing session, never to the published post.
		useEffect(() => setChecked([]), [items.length]);
		function update(index, field, value) {
			setAttributes({ items: items.map((item, i) => i === index ? { ...item, [field]: value } : item) });
		}
		return h('section', useBlockProps({ className: 'vpc-checklist' }),
			h('div', { className: 'vpc-kit__header' },
				h(PlainText, { value: title, onChange: title => setAttributes({ title }), placeholder: 'Tên checklist',
					'aria-label': 'Tên checklist', className: 'vpc-pattern-title' }),
				h('span', { className: 'vpc-checklist__count' }, 'Đã chuẩn bị ' + checked.length + '/' + items.length)),
			h('ul', { className: 'vpc-kit__items' }, items.map((item, index) => h('li', { key: index },
				h('input', { type: 'checkbox', checked: checked.includes(index), 'aria-label': 'Đánh dấu ' + item.name,
					onChange: e => setChecked(e.target.checked ? [...checked, index] : checked.filter(i => i !== index)) }),
				h(PlainText, { className: 'vpc-kit__name', 'aria-label': 'Tên vật dụng', placeholder: 'Tên vật dụng',
					value: item.name, onChange: value => update(index, 'name', value) }),
				h('span', { className: 'vpc-kit__qty' }, '× ', h('input', { 'aria-label': 'Số lượng', size: Math.min(16, Math.max(2, item.quantity.length)),
					placeholder: 'SL', value: item.quantity, onChange: e => update(index, 'quantity', e.target.value) })),
				isSelected && h(Button, { icon: 'no-alt', size: 'small', label: 'Xóa vật dụng ' + (index + 1),
					onClick: () => setAttributes({ items: items.filter((_, i) => i !== index) }) })))),
			isSelected && h(Button, { variant: 'secondary', onClick: () => setAttributes({ items: [...items, { name: '', quantity: '' }] }) }, 'Thêm vật dụng')
		);
	}

	wp.blocks.registerBlockType('vanphuccare/checklist', {
		apiVersion: 3, title: 'Checklist chuẩn bị', category: 'widgets', icon: 'yes-alt',
		attributes: { title: { type: 'string', default: 'Danh sách chuẩn bị' }, items: { type: 'array', default: [] } },
		transforms: { from: [{
			type: 'block', blocks: ['core/group'],
			isMatch: attrs => (attrs.className || '').split(/\s+/).includes('vpc-checklist'),
			transform: (attrs, children) => {
				const root = document.createElement('div');
				root.innerHTML = wp.blocks.serialize(children);
				const items = Array.from(root.querySelectorAll('ul > li'), row => {
					const text = row.textContent.trim();
					const split = text.lastIndexOf(' · ');
					return split < 0 ? { name: text, quantity: '' } :
						{ name: text.slice(0, split), quantity: text.slice(split + 3) };
				});
				return wp.blocks.createBlock('vanphuccare/checklist', {
					title: root.querySelector('.vpc-pattern-title')?.textContent || 'Danh sách chuẩn bị', items
				});
			}
		}] },
		edit: Edit, save: () => null
	});
})();
