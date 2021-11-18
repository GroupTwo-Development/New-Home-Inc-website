import Splide from '@splidejs/splide';

const footerCtaListing = {
    init(){
        const footerListingSlider = new Splide( '#image-slider', {
            perPage: 3,
            type: 'slide',
            arrows: false,
            gap: '1rem',
            breakpoints: {
                992: {
                    perPage: 2,
                },
                768: {
                    perPage: 2,
                },
                640: {
                    perPage: 1,
                    type: 'loop',
                    arrows: true,
                },
            },
        });

        document.addEventListener( 'DOMContentLoaded', function () {
            footerListingSlider.mount();
        } );
    }
};


export default footerCtaListing