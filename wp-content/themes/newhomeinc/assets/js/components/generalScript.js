const $ = window.jQuery;
const $window = window.$window || $( window );

const generalScript = {
	init() {
		window.onscroll = function() {
			myFunction();
		};

		// Get the header
		const header = document.getElementById( 'info-links' );

		// Get the offset position of the navbar
		const sticky = header.offsetTop;

		function myFunction() {
			if ( window.pageYOffset > sticky ) {
				header.classList.add( 'sticky' );
			} else {
				header.classList.remove( 'sticky' );
			}
		}

		window.addEventListener( 'DOMContentLoaded', ( ) => {
			const acc = document.getElementsByClassName( 'accordion' );
			let i;

			for ( i = 0; i < acc.length; i++ ) {
				acc[ i ].addEventListener( 'click', function() {
					this.classList.toggle( 'active' );
					const panel = this.nextElementSibling;
					if ( panel.style.maxHeight ) {
						panel.style.maxHeight = null;
					} else {
						panel.style.maxHeight = panel.scrollHeight + 'px';
					}
				} );
			}
		} );
	},
};

export default generalScript;
