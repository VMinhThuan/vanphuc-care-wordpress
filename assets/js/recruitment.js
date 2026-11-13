( function () {
	'use strict';

	var page = document.querySelector( '.vpc-recruitment-page' );
	if ( ! page ) {
		return;
	}

	var searchForm = page.querySelector( '.vpc-recruitment-search' );
	var searchInput = page.querySelector( '#recruitment-search' );
	var cards = Array.prototype.slice.call( page.querySelectorAll( '[data-recruitment-card]' ) );
	var filterButtons = Array.prototype.slice.call( page.querySelectorAll( '[data-recruitment-filter]' ) );
	var activeFilter = 'all';

	function applyFilters() {
		var query = ( searchInput ? searchInput.value : '' ).trim().toLowerCase();

		cards.forEach( function ( card ) {
			var title = ( card.getAttribute( 'data-title' ) || '' ).toLowerCase();
			var status = card.getAttribute( 'data-status' ) || '';
			var matchesFilter = activeFilter === 'all' || status === activeFilter;
			var matchesSearch = ! query || title.indexOf( query ) !== -1;
			card.hidden = ! ( matchesFilter && matchesSearch );
		} );
	}

	filterButtons.forEach( function ( button ) {
		button.addEventListener( 'click', function () {
			activeFilter = button.getAttribute( 'data-recruitment-filter' ) || 'all';
			filterButtons.forEach( function ( item ) {
				var isActive = item === button;
				item.classList.toggle( 'is-active', isActive );
				item.setAttribute( 'aria-selected', isActive ? 'true' : 'false' );
			} );
			applyFilters();
		} );
	} );

	if ( searchInput ) {
		searchInput.addEventListener( 'input', applyFilters );
	}

	if ( searchForm ) {
		searchForm.addEventListener( 'submit', function ( event ) {
			event.preventDefault();
			applyFilters();
		} );
	}
}() );
