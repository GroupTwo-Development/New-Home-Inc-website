
// Toggle Mobile
const hamburger = document.querySelector( '.hamburger' );
hamburger.addEventListener( 'click', function() {
	//Toggle class "is-active
	hamburger.classList.toggle( 'is-active' );
} );

window.addEventListener( 'DOMContentLoaded', ( event ) => {
	// Navbar shrink function
	const navbarShrink = function() {
		const navbarCollapsible = document.body.querySelector( '#mainNav' );
		if ( ! navbarCollapsible ) {
			return;
		}
		if ( window.scrollY === 0 ) {
			navbarCollapsible.classList.remove( 'navbar-shrink' );
		} else {
			navbarCollapsible.classList.add( 'navbar-shrink' );
		}
	};

	// Shrink the navbar
	navbarShrink();

	// Shrink the navbar when page is scrolled
	document.addEventListener( 'scroll', navbarShrink );

	function truncateCommunityFloorplanBreadcrumb() {
		const communityFloorplanBreadcrumb = document.querySelector( '#community-floorplan .breadcrumb_last' );
		const communityFloorplanBreadcrumbText = communityFloorplanBreadcrumb.innerText;

		const displayCommunityFloorplanBreadcrumbText = communityFloorplanBreadcrumbText.substring( 0, communityFloorplanBreadcrumbText.indexOf( ' ' ) );
		// eslint-disable-next-line no-console
		console.log( displayCommunityFloorplanBreadcrumbText );
		communityFloorplanBreadcrumb.innerText = displayCommunityFloorplanBreadcrumbText;
	}

	truncateCommunityFloorplanBreadcrumb();
} );

