import Splide from '@splidejs/splide';

const featuredHome = {
	init() {
		document.addEventListener( 'DOMContentLoaded', function() {
			new Splide( '#card-slider', {
				perPage: 3,
				type: 'loop',
				arrows: true,
				gap: '6px',
				breakpoints: {
					992: {
						perPage: 2,
					},
					768: {
						perPage: 2,
					},
					640: {
						perPage: 1,
					},
				},
			} ).mount();
		} );

		document.addEventListener( 'DOMContentLoaded', function() {
			new Splide( '#card-slider-qmi', {
				perPage: 3,
				type: 'loop',
				arrows: true,
				// gap: '0.3rem',
				breakpoints: {
					992: {
						perPage: 2,
						gap: '0.5rem',
					},
					768: {
						perPage: 2,
						gap: '0.5rem',
					},
					640: {
						perPage: 1,
						gap: '0.5rem',
					},
				},
			} ).mount();
		} );

		document.addEventListener( 'DOMContentLoaded', function() {
			new Splide( '#community_floorplan', {
				perPage: 3,
				type: 'slide',
				focus: 'center',
				trimSpace: true,
				arrows: true,
				// gap: '0.3rem',
				breakpoints: {
					992: {
						perPage: 2,
						gap: '0.5rem',
					},
					768: {
						perPage: 2,
						gap: '0.5rem',
					},
					640: {
						perPage: 1,
						gap: '0.5rem',
					},
				},
			} ).mount();
		} );

		document.addEventListener( 'DOMContentLoaded', function() {
			new Splide( '#homes_floorplan', {
				perPage: 3,
				type: 'loop',
				arrows: true,
				gap: '0.3rem',
				breakpoints: {
					992: {
						perPage: 2,
						gap: '0.5rem',
					},
					768: {
						perPage: 2,
						gap: '0.5rem',
					},
					640: {
						perPage: 1,
						gap: '0.5rem',
					},
				},
			} ).mount();
		} );

		document.addEventListener( 'DOMContentLoaded', function() {
			new Splide( '#card-slider-2', {
				perPage: 3,
				type: 'loop',
				arrows: true,
				gap: '2rem',
				breakpoints: {
					992: {
						perPage: 2,
					},
					768: {
						perPage: 2,
					},
					640: {
						perPage: 1,
					},
				},
			} ).mount();
		} );

		document.addEventListener( 'DOMContentLoaded', function() {
			document.addEventListener( 'facetwp-loaded', function() {
				const elms = document.getElementsByClassName( 'community_img_slider' );
				for ( let i = 0; i < elms.length; i++ ) {
					const splideElement = elms[ i ];
					const splideDefaultOptions =
                        {
                        	type: 'loop',
                        	rewind: true,
                        	perPage: 1,
                        	autoplay: false,
                        	arrows: true,
                        	pagination: false,
                        	drag: true,
                        	keyboard: true,
                        	// heightRatio: 0.5,
                        	// cover: true,
                        };
					const splide = new Splide( splideElement, splideDefaultOptions );
					// 3. mount/initialize this slider
					splide.mount();
				}
			} );
		} );

		document.addEventListener( 'DOMContentLoaded', function() {
			document.addEventListener( 'facetwp-loaded', function() {
				const elms = document.getElementsByClassName( 'community_img_slider' );
				for ( let i = 0; i < elms.length; i++ ) {
					const splideElement = elms[ i ];
					const splideDefaultOptions =
                        {
                        	type: 'loop',
                        	rewind: true,
                        	perPage: 1,
                        	autoplay: false,
                        	arrows: true,
                        	pagination: false,
                        	drag: true,
                        	keyboard: true,
                        	// heightRatio: 0.5,
                        	// cover: true,
                        };
					const splide = new Splide( splideElement, splideDefaultOptions );
					// 3. mount/initialize this slider
					splide.mount();
				}
			} );
		} );
	},

};

export default featuredHome;
