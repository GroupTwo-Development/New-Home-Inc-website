import Splide from '@splidejs/splide';

const featuredHome = {
    init() {
        document.addEventListener('DOMContentLoaded', function () {
            new Splide('#card-slider', {
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
            }).mount();
        });

        document.addEventListener('DOMContentLoaded', function () {
            new Splide('#card-slider-2', {
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
            }).mount();
        });
    }

};

export default featuredHome