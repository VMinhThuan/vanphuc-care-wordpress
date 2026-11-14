/* global wp */
(() => {
	const { createElement: h, useState, useEffect } = wp.element;
	const { useBlockProps } = wp.blockEditor;
	const { ComboboxControl } = wp.components;
	const { decodeEntities } = wp.htmlEntities;

	function Edit({ attributes, setAttributes, isSelected }) {
		const id = attributes.postId;
		const [input, setInput] = useState('');
		const [search, setSearch] = useState('');
		useEffect(() => {
			const timer = setTimeout(() => setSearch(input.trim()), 250);
			return () => clearTimeout(timer);
		}, [input]);
		const { post, image, posts } = wp.data.useSelect(select => {
			const core = select('core');
			const post = id ? core.getEntityRecord('postType', 'post', id, { context: 'view' }) : null;
			const image = post?.featured_media ? core.getMedia(post.featured_media) : null;
			const posts = isSelected ? core.getEntityRecords('postType', 'post', {
				context: 'view', status: 'publish', search, per_page: 20, orderby: search ? 'relevance' : 'date'
			}) : null;
			return { post, posts, image };
		}, [id, search, isSelected]);
		const choices = (posts || []).slice();
		if (post && !choices.some(choice => choice.id === id)) choices.unshift(post);
		const selector = h(ComboboxControl, {
			label: 'Chọn bài viết', value: id ? String(id) : null, onFilterValueChange: value => setInput(value || ''),
			options: choices.map(choice => ({ value: String(choice.id), label: decodeEntities(choice.title.rendered) })),
			onChange: value => setAttributes({ postId: Number(value) || 0 })
		});
		const src = image?.media_details?.sizes?.medium?.source_url || image?.source_url;
		return h('div', useBlockProps(),
				h('div', { className: 'vpc-related-link' },
					h('span', { className: 'vpc-related-link__thumb' }, src && h('img', { src, alt: '' })),
					h('span', { className: 'vpc-related-link__copy' },
						h('span', { className: 'vpc-related-link__label' }, 'Đọc thêm'),
						h('span', null, post ? decodeEntities(post.title.rendered) : 'Chọn bài viết liên quan')),
					h('span', { className: 'vpc-related-link__arrow', 'aria-hidden': true }, '→')),
				isSelected && selector
		);
	}
	wp.blocks.registerBlockType('vanphuccare/read-more', {
		apiVersion: 3, title: 'Đọc thêm', category: 'widgets', icon: 'admin-links',
		attributes: { postId: { type: 'integer', default: 0 } },
		edit: Edit, save: () => null
	});
})();
