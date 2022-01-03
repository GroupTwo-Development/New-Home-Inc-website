import { Fancybox } from '@fancyapps/ui/src/Fancybox/Fancybox.js';

const elevationGallery = {
	init() {
		// Initialise Carousel
		// eslint-disable-next-line no-undef
		const mainCarousel = new Carousel( document.querySelector( '#mainCarousel' ), {
			Dots: false,
		} );

		// Thumbnails
		// eslint-disable-next-line no-undef
		const thumbCarousel = new Carousel( document.querySelector( '#thumbCarousel' ), {
			// Sync: {
			// 	target: mainCarousel,
			// 	friction: 0,
			// },
			Dots: false,
			Navigation: false,
			center: true,
			slidesPerPage: 1,
			infinite: false,
		} );

		// Customize Fancybox
		Fancybox.bind( '[data-fancybox="gallery"]', {
			Carousel: {
				on: {
					change: ( that ) => {
						mainCarousel.slideTo( mainCarousel.findPageForSlide( that.page ), {
							friction: 0,
						} );
					},
				},
			},
		} );
	},
};

export default elevationGallery;
