const accordion = {
	init() {
		const btns = document.getElementsByClassName( 'accordion-button' );

		for ( let i = 0; i < btns.length; i++ ) {
			btns[ i ].addEventListener( 'click', function() {
				const btnText = document.querySelector( '.accordion-title' );
				//Add function here
				// eslint-disable-next-line no-console
				// console.log( this.innerHTML );
				// if ( this.getAttribute( 'aria-expanded' ) === 'true' ) {
				// 	btnText.style.display = 'none';
				// } else {
				// 	btnText.style.display = 'block';
				// }
			} );
		}
	},
};

export default accordion;
