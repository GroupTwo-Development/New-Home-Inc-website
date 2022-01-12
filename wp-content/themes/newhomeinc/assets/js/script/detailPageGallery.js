import lightGallery from 'lightgallery';
import lgMediumZoom from 'lightgallery/plugins/zoom';
import lgThumbnail from 'lightgallery/plugins/thumbnail';
// eslint-disable-next-line no-duplicate-imports
import lgZoom from 'lightgallery/plugins/zoom';
import lgFullscreen from 'lightgallery/plugins/fullscreen';
import lgShare from 'lightgallery/plugins/share';

const detailPageGallery = {
	init() {
		const detailPageGalleryData = app_script_vars.detail_page_gallery;
		// console.log( detailPageGalleryData );

		const dynamicEl = [];

		detailPageGalleryData.forEach( ( item ) => {
			// eslint-disable-next-line no-console
			console.log( item );
			dynamicEl.push( {
				src: `${ item.sizes.large }`,
				thumb: `${ item.sizes.large }`,
			} );
		} );

		const $dynamicGallery = document.getElementById( 'detail-page-gallery' );

		const dynamicGallery = lightGallery( $dynamicGallery, {
			cssEasing: 'cubic-bezier(0.680, -0.550, 0.265, 1.550)',
			speed: 1000,
			plugins: [ lgFullscreen, lgShare, lgFullscreen, lgThumbnail, lgZoom ],
			dynamic: true,
			thumbnail: true,
			dynamicEl,
		} );

		$dynamicGallery.addEventListener( 'click', function() {
			// Starts with third item.(Optional).
			// This is useful if you want use dynamic mode with
			// custom thumbnails (thumbnails outside gallery),
			dynamicGallery.openGallery( 0 );
		} );

		lightGallery( document.getElementById( 'virtual-tour-url' ), {
			selector: 'this',
		} );

		lightGallery( document.getElementById( 'homes-floorplan-gallery' ), {
			// Target all images
			selector: '.homes_floorplan-img',
			// Add medium zoom plugin
			plugins: [ lgMediumZoom ],
		} );

		// eslint-disable-next-line no-undef
		const $lightgallery = $( '#dynamic-gallery-demo' );
		$lightgallery.lightGallery();
		const data = $lightgallery.data( 'lightGallery' );

		$lightgallery.on( 'onBeforeSlide.lg', function( event, prevIndex, index ) {
			const img = data.$items.eq( index ).attr( 'data-src' );
			// eslint-disable-next-line no-undef
			$( '.lg-backdrop' ).css( 'background-image', 'url(' + img + ')' );
		} );
	},
};

export default detailPageGallery;
