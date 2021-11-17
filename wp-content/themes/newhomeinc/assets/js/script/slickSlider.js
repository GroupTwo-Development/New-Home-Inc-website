const $ = window.jQuery;
const $window = window.$window || $(window);


const featuredHomesGallery = {
    init(){
        $('.card-img').slick({
            dots: true,
            infinite: true,
            speed: 300,
            slidesToShow: 1,
            adaptiveHeight: true
        });

    }
}

export default featuredHomesGallery