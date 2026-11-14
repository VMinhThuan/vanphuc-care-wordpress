/* global wp */
(() => {
	const { createElement: h, useState, useEffect } = wp.element;
	const { useBlockProps, MediaUpload, MediaUploadCheck, InspectorControls } = wp.blockEditor;
	const { Button, Notice, PanelBody, TextControl, Spinner } = wp.components;

	function Edit({ attributes: { attachmentId, label }, setAttributes, isSelected }) {
		const [state, setState] = useState({ id: 0 });
		const [retry, setRetry] = useState(0);
		useEffect(() => {
			if (!attachmentId) return;
			const controller = new AbortController();
			setState({ id: attachmentId, loading: true });
			const timeout = setTimeout(() => {
				controller.abort();
				setState({ id: attachmentId, error: true });
			}, 15000);
			wp.apiFetch({ path: '/wp/v2/media/' + attachmentId + '?context=view&_fields=id,vpc_download', signal: controller.signal })
				.then(media => {
					if (controller.signal.aborted) return;
					setState({ id: attachmentId, data: media.vpc_download, error: !media.vpc_download });
				})
				.catch(() => {
					if (!controller.signal.aborted) setState({ id: attachmentId, error: true });
				})
				.finally(() => clearTimeout(timeout));
			return () => { clearTimeout(timeout); controller.abort(); };
		}, [attachmentId, retry]);
		const current = state.id === attachmentId ? state : {};
		const data = current.data;
		const icon = h('svg', { width: 18, height: 18, viewBox: '0 0 24 24', fill: 'none', stroke: 'currentColor', strokeWidth: 1.8,
			strokeLinecap: 'round', strokeLinejoin: 'round', 'aria-hidden': true, focusable: false },
			h('path', { d: 'M12 3v12m-5-5 5 5 5-5M5 17v4h14v-4' }));
		return h('div', useBlockProps(),
			h('div', { className: 'vpc-file-card' },
				h('span', { className: 'vpc-file-card__badge', 'aria-hidden': true }, data?.extension || 'PDF'),
				h('span', { className: 'vpc-file-card__copy' },
					h('span', { className: 'vpc-file-card__name' }, label || data?.name || (attachmentId ? 'Tệp tải xuống' : 'Chọn tài liệu tải xuống')),
					h('span', { className: 'vpc-file-card__meta' }, data ? [data.extension, data.size].filter(Boolean).join(' · ') :
						(current.error ? 'Chưa đọc được thông tin tệp' : attachmentId ? 'Đang lấy thông tin tệp…' : 'Tên và dung lượng sẽ lấy từ tệp đã chọn'))),
				h('span', { className: 'vpc-file-card__button', 'aria-hidden': true }, icon, 'Tải về')),
			current.loading && h(Spinner),
			current.error && h(Notice, { status: 'warning', isDismissible: false },
				'Không đọc được thông tin tệp. Hãy thử lại hoặc chọn tệp khác.',
				h(Button, { variant: 'link', onClick: () => setRetry(retry + 1) }, 'Thử lại')),
			(isSelected || !attachmentId || current.error) && h('div', { className: 'vpc-file-card__controls' },
				h(MediaUploadCheck, null, h(MediaUpload, {
					value: attachmentId, multiple: false,
					onSelect: media => setAttributes({ attachmentId: Number(media.id) || 0, label: '' }),
					render: ({ open }) => h(Button, { variant: 'secondary', onClick: open }, attachmentId ? 'Thay tệp' : 'Chọn / tải tệp lên')
				})),
				!!attachmentId && h(Button, { variant: 'tertiary', isDestructive: true, onClick: () => setAttributes({ attachmentId: 0, label: '' }) }, 'Bỏ chọn tệp')),
			h(InspectorControls, null, h(PanelBody, { title: 'Tệp tải xuống' },
				h(TextControl, { label: 'Tên hiển thị (tùy chọn)', help: 'Để trống để dùng tên tệp gốc.', value: label,
					onChange: label => setAttributes({ label }) })))
		);
	}

	wp.blocks.registerBlockType('vanphuccare/download', {
		apiVersion: 3, title: 'Tệp tải xuống', category: 'widgets', icon: 'download',
		attributes: { attachmentId: { type: 'integer', default: 0 }, label: { type: 'string', default: '' } },
		supports: { html: false, customClassName: false },
		transforms: { from: [{
			type: 'block', blocks: ['core/group'],
			isMatch: (attrs, block) => {
				const children = block?.innerBlocks;
				return (attrs.className || '').split(/\s+/).includes('vpc-download') && children?.length === 1 &&
					children[0].name === 'core/file' && !!children[0].attributes.id && children[0].attributes.showDownloadButton !== false;
			},
			transform: (attrs, children) => {
				const file = children[0].attributes;
				const node = document.createElement('div');
				node.innerHTML = file.fileName || '';
				return wp.blocks.createBlock('vanphuccare/download', { attachmentId: Number(file.id), label: node.textContent });
			}
		}] },
		edit: Edit, save: () => null
	});
})();
