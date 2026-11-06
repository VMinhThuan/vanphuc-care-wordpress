( function () {
	'use strict';

	function initServicesCarousel( root ) {
		const viewport = root.querySelector( '.about-services__viewport' );
		const track = root.querySelector( '.about-services__track' );
		const cards = root.querySelectorAll( '.about-services-card' );

		if ( ! viewport || ! track || ! cards.length ) {
			return;
		}

		const getStep = function () {
			const cardWidth = cards[ 0 ].getBoundingClientRect().width;
			const styles = window.getComputedStyle( track );
			const gap = parseFloat( styles.columnGap || styles.gap ) || 24;

			return cardWidth + gap;
		};

		root.querySelectorAll( '.about-services__arrow' ).forEach( function ( button ) {
			button.addEventListener( 'click', function () {
				const direction = button.classList.contains( 'about-services__arrow--next' ) ? 1 : -1;

				viewport.scrollBy( {
					left: direction * getStep(),
					behavior: 'smooth',
				} );
			} );
		} );
	}

	document.querySelectorAll( '.about-services' ).forEach( initServicesCarousel );
}() );
