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

		var images = [];
		try {
			images = JSON.parse(gallery.getAttribute('data-gallery-images') || '[]');
		} catch (error) {
			images = [];
		}

		var mainImage = gallery.querySelector('[data-room-gallery-main]');
		var counter = gallery.querySelector('[data-room-gallery-counter]');
		var thumbs = gallery.querySelectorAll('[data-room-gallery-thumb]');

		thumbs.forEach(function (thumb) {
			thumb.addEventListener('click', function () {
				var index = Number(thumb.getAttribute('data-room-gallery-thumb')) || 0;
				if (!images[index]) return;
				mainImage.src = images[index];
				counter.textContent = (index + 1) + ' / ' + images.length;
				thumbs.forEach(function (item) {
					item.classList.toggle('is-active', item === thumb);
				});
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
	var currentImages = [];
	var currentIndex = 0;

	function renderList(target, values) {
		target.innerHTML = (values || []).map(function (value) {
			return '<li>' + value + '</li>';
		}).join('');
	}

	function renderGallery() {
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

	function openRoom(room) {
		var data = roomData[room];
		if (!data) return;
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
		currentImages = data.images || [];
		currentIndex = 0;
		renderList(mother, data.mother);
		renderList(baby, data.baby);
		renderList(amenities, data.amenities);
		renderGallery();
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
			variants.forEach(function (item) { item.classList.toggle('is-active', item === variant); });
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
