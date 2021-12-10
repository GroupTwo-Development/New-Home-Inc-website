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

        document.addEventListener( 'DOMContentLoaded', function() {
            document.addEventListener('facetwp-loaded', function() {
                var elms = document.getElementsByClassName( 'community_img_slider' );
                for ( var i = 0; i < elms.length; i++ ) {
                    var splideElement = elms[i];
                    var splideDefaultOptions =
                        {
                            type: 'loop',
                            rewind: true,
                            perPage: 1,
                            autoplay: false,
                            arrows:true,
                            pagination: false,
                            drag:true,
                            keyboard:true,
                            // heightRatio: 0.5,
                            // cover: true,
                        }
                    var splide = new Splide( splideElement, splideDefaultOptions );
                    // 3. mount/initialize this slider
                    splide.mount();
                }
            })

        } );
    }

};

export default featuredHome
