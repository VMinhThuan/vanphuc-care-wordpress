(function () {
	'use strict';

	function setRoomPanel(selector, room) {
		selector.querySelectorAll('[data-room-tab]').forEach(function (tab) {
			var active = tab.getAttribute('data-room-tab') === room;
			tab.classList.toggle('is-active', active);
			tab.setAttribute('aria-selected', active ? 'true' : 'false');
		});

		selector.querySelectorAll('[data-room-panel]').forEach(function (panel) {
			var active = panel.getAttribute('data-room-panel') === room;
			panel.classList.toggle('is-active', active);
			panel.setAttribute('aria-hidden', active ? 'false' : 'true');
		});
	}

	function initPanelGallery(panel) {
		var gallery = panel.querySelector('[data-room-gallery]');
		if (!gallery) return;

		var mainImage = gallery.querySelector('[data-room-gallery-main]');
		var counter = gallery.querySelector('[data-room-gallery-counter]');
		var thumbsContainer = gallery.querySelector('[data-room-gallery-thumbs]');
		var images = [];

		try {
			images = JSON.parse(gallery.getAttribute('data-gallery-images') || '[]');
		} catch (error) {
			images = [];
		}

		function renderGallery(nextImages, index) {
			images = Array.isArray(nextImages) ? nextImages.filter(Boolean) : [];
			if (!images.length || !mainImage || !counter || !thumbsContainer) return;

			var activeIndex = Math.max(0, Math.min(index || 0, images.length - 1));
			gallery.setAttribute('data-gallery-images', JSON.stringify(images));
			mainImage.src = images[activeIndex];
			counter.textContent = (activeIndex + 1) + ' / ' + images.length;
			thumbsContainer.innerHTML = '';

			images.forEach(function (image, imageIndex) {
				var thumb = document.createElement('button');
				var thumbImage = document.createElement('img');
				thumb.type = 'button';
				thumb.className = imageIndex === activeIndex ? 'is-active' : '';
				thumb.setAttribute('data-room-gallery-thumb', imageIndex);
				thumb.setAttribute('aria-label', 'Xem ảnh ' + (imageIndex + 1));
				thumbImage.src = image;
				thumbImage.width = 96;
				thumbImage.height = 60;
				thumbImage.alt = '';
				thumb.appendChild(thumbImage);
				thumbsContainer.appendChild(thumb);

				thumb.addEventListener('click', function () {
					renderGallery(images, imageIndex);
				});
			});
		}

		renderGallery(images, 0);

		panel.querySelectorAll('[data-room-panel-variant]').forEach(function (variant) {
			variant.addEventListener('click', function () {
				var variantImages = [];
				try {
					variantImages = JSON.parse(variant.getAttribute('data-room-panel-images') || '[]');
				} catch (error) {
					variantImages = [];
				}

				panel.querySelectorAll('[data-room-panel-variant]').forEach(function (item) {
					item.classList.toggle('is-active', item === variant);
				});
				renderGallery(variantImages, 0);
			});
		});
	}

	function initAccordions(scope) {
		scope.querySelectorAll('[data-room-accordion-toggle]').forEach(function (toggle) {
			toggle.addEventListener('click', function () {
				var accordion = toggle.closest('[data-room-accordion]');
				var content = accordion.querySelector('.ocu-room-accordion__content');
				var isOpen = accordion.classList.toggle('is-open');
				toggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
				content.hidden = !isOpen;
			});
		});
	}

	document.querySelectorAll('[data-room-selector]').forEach(function (selector) {
		selector.querySelectorAll('[data-room-tab]').forEach(function (tab) {
			tab.addEventListener('click', function () {
				setRoomPanel(selector, tab.getAttribute('data-room-tab'));
			});
		});
		selector.querySelectorAll('[data-room-panel]').forEach(function (panel) {
			initPanelGallery(panel);
			initAccordions(panel);
		});
	});

	var modal = document.querySelector('[data-room-modal]');
	if (!modal) return;

	var roomData = {};
	try {
		roomData = JSON.parse(modal.getAttribute('data-room-data') || '{}');
	} catch (error) {
		return;
	}

	var mainImage = modal.querySelector('[data-room-main-image]');
	var title = modal.querySelector('[data-room-title]');
	var level = modal.querySelector('[data-room-level]');
	var description = modal.querySelector('[data-room-description]');
	var counter = modal.querySelector('[data-room-counter]');
	var thumbs = modal.querySelector('[data-room-thumbs]');
	var mother = modal.querySelector('[data-room-mother]');
	var baby = modal.querySelector('[data-room-baby]');
	var amenities = modal.querySelector('[data-room-amenities]');
	var variantContainer = modal.querySelector('.ocu-room-modal__variants');
	var variants = modal.querySelectorAll('[data-room-variant]');
	var currentRoomData = null;
	var currentImages = [];
	var currentIndex = 0;

	function renderList(target, values) {
		target.innerHTML = (values || []).map(function (value) {
			return '<li>' + value + '</li>';
		}).join('');
	}

	function renderGallery() {
		if (!currentImages.length) return;
		currentIndex = Math.max(0, Math.min(currentIndex, currentImages.length - 1));
		mainImage.src = currentImages[currentIndex];
		counter.textContent = (currentIndex + 1) + ' / ' + currentImages.length;
		thumbs.innerHTML = currentImages.map(function (image, index) {
			return '<button type="button" class="' + (index === currentIndex ? 'is-active' : '') + '" data-room-thumb="' + index + '" aria-label="Xem ảnh ' + (index + 1) + '"><img src="' + image + '" alt=""></button>';
		}).join('');
		thumbs.querySelectorAll('[data-room-thumb]').forEach(function (thumb) {
			thumb.addEventListener('click', function () {
				currentIndex = Number(thumb.getAttribute('data-room-thumb')) || 0;
				renderGallery();
			});
		});
	}

	function setModalVariant(index) {
		if (!currentRoomData) return;

		var variantImages = currentRoomData.variant_images && currentRoomData.variant_images[index];
		currentImages = variantImages && variantImages.length ? variantImages : (currentRoomData.images || []);
		currentIndex = 0;
		variants.forEach(function (item, itemIndex) {
			item.classList.toggle('is-active', itemIndex === index);
		});
		renderGallery();
	}

	function openRoom(room) {
		var data = roomData[room];
		if (!data) return;
		currentRoomData = data;
		level.textContent = data.level;
		title.textContent = data.title;
		description.textContent = data.description;
		var tabLabels = data.tabs || [];
		variantContainer.hidden = !tabLabels.length;
		variants.forEach(function (variant, index) {
			variant.textContent = tabLabels[index] || '';
			variant.hidden = !tabLabels[index];
			variant.classList.toggle('is-active', index === 0);
		});
		renderList(mother, data.mother);
		renderList(baby, data.baby);
		renderList(amenities, data.amenities);
		setModalVariant(0);
		modal.hidden = false;
		modal.setAttribute('aria-hidden', 'false');
		document.body.classList.add('ocu-room-modal-open');
	}

	function closeRoom() {
		modal.hidden = true;
		modal.setAttribute('aria-hidden', 'true');
		document.body.classList.remove('ocu-room-modal-open');
	}

	document.querySelectorAll('[data-room-open]').forEach(function (card) {
		card.addEventListener('click', function (event) {
			if (event.target.closest('a')) event.preventDefault();
			openRoom(card.getAttribute('data-room-open'));
		});
		card.addEventListener('keydown', function (event) {
			if (event.key === 'Enter' || event.key === ' ') {
				event.preventDefault();
				openRoom(card.getAttribute('data-room-open'));
			}
		});
	});

	variants.forEach(function (variant) {
		variant.addEventListener('click', function () {
			setModalVariant(Number(variant.getAttribute('data-room-variant')) || 0);
		});
	});

	modal.querySelectorAll('[data-room-close]').forEach(function (control) {
		control.addEventListener('click', closeRoom);
	});
	modal.querySelector('[data-room-prev]').addEventListener('click', function () {
		currentIndex = (currentIndex - 1 + currentImages.length) % currentImages.length;
		renderGallery();
	});
	modal.querySelector('[data-room-next]').addEventListener('click', function () {
		currentIndex = (currentIndex + 1) % currentImages.length;
		renderGallery();
	});
	modal.querySelector('[data-open-modal]').addEventListener('click', closeRoom);
	document.addEventListener('keydown', function (event) {
		if (event.key === 'Escape' && !modal.hidden) closeRoom();
	});
}());
