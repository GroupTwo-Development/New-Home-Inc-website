import Splide from '@splidejs/splide';

const featuredHome = {
    init(){
        const mainFeaturedHomesContent = new Splide( '#homepage-qmi-image-slider', {
            perPage: 3,
            type: 'loop',
            arrows: true,
            gap: '1.2rem',
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
        });


        document.addEventListener( 'DOMContentLoaded', function () {
			mainFeaturedHomesContent.mount();
        } );
    }
};


export default featuredHome