
	// Toggle Mobile
	const hamburger = document.querySelector( '.hamburger' );
	hamburger.addEventListener( 'click', function() {
		//Toggle class "is-active
		hamburger.classList.toggle( 'is-active' );
	} );

	window.addEventListener('DOMContentLoaded', event => {

		// Navbar shrink function
		const navbarShrink = function() {
			const navbarCollapsible = document.body.querySelector('#mainNav');
			if ( ! navbarCollapsible ) {
				return;
			}
			if ( window.scrollY === 0) {
				navbarCollapsible.classList.remove('navbar-shrink');
			} else {
				navbarCollapsible.classList.add( 'navbar-shrink' );
			}
		};

		// Shrink the navbar
		navbarShrink();

		// Shrink the navbar when page is scrolled
		document.addEventListener( 'scroll', navbarShrink );



		// Activate Bootstrap scrollspy on the main nav element
		// const mainNav = document.body.querySelector('#mainNav');
		// if (mainNav) {
		// 	new bootstrap.ScrollSpy(document.body, {
		// 		target: '#mainNav',
		// 		offset: 72,
		// 	});
		// };

		// Collapse responsive navbar when toggler is visible
		// const navbarToggler = document.body.querySelector('.navbar-toggler');
		// const responsiveNavItems = [].slice.call(
		// 	document.querySelectorAll('#navbarResponsive .nav-link')
		// );
		// responsiveNavItems.map(function (responsiveNavItem) {
		// 	responsiveNavItem.addEventListener('click', () => {
		// 		if (window.getComputedStyle(navbarToggler).display !== 'none') {
		// 			navbarToggler.click();
		// 		}
		// 	});
		// });

	} );

	// window.onscroll = function() {
	// 	interFilter();
	// };
	//
	// const postFilter = document.getElementById( 'post-filter');
	// const sticky = postFilter.offsetTop;
	//
	// function interFilter() {
	// 	if ( window.pageYOffset >= sticky ) {
	// 		postFilter.classList.add( 'sticky' );
	// 	} else {
	// 		postFilter.classList.remove( 'sticky' );
	// 	}
	// }
