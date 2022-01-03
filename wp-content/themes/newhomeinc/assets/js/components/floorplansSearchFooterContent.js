const $ = window.jQuery;
const $window = window.$window || $( window );

// eslint-disable-next-line no-unused-vars
const floorplansSearchFooterContent = {
	init() {
		// const homesSearchPage = app_script_vars.qmi_search_page_content;
		// const homesSearchPageFooterTitle = app_script_vars.homes_search_page_title;
		// // eslint-disable-next-line no-console
		// console.log( homesSearchPageFooterTitle );
		//
		// const displayHomesBannerTitle = document.getElementById( 'homes_banner_title' );
		// const displayMainFooterContentTitle = document.getElementById( 'qmi_main_footer_content_title' );
		// const displayMainFooterContent = document.getElementById( 'main-footer-content' );
		//
		// ( function( $ ) {
		// 	document.addEventListener( 'facetwp-loaded', function() {
		// 		const checkedBoxFunction = document.querySelector( '.facetwp-facet-qmi_location ' );
		// 		const dropdownValue = document.querySelector( '.facetwp-facet-qmi_location .checked' );
		// 		console.log( dropdownValue );
		// 		const selectedValue = dropdownValue.getAttribute( 'data-value' );
		// 		// eslint-disable-next-line no-console
		// 		console.log( selectedValue );
		//
		// 		const loadedContent = `http://newhomeinc.test/wp-json/wp/v2/metro-area?slug=${ selectedValue }`;
		//
		// 		function loadMainFootercontent() {
		// 			if ( $( '.facetwp-facet-qmi_location ' ).has( '.checked' ) ) {
		// 				$.ajax( {
		// 					url: loadedContent,
		// 					dataType: 'json',
		// 					success( res ) {
		// 						$( '#main-taxonomy-area' ).html( res );
		// 						$.each( res, function( i, tax ) {
		// 							$( '#main-taxonomy-area' ).html( tax );
		// 							// eslint-disable-next-line no-console
		// 							console.log( tax.name );
		// 							// eslint-disable-next-line camelcase
		// 							if ( selectedValue === '' ) {
		// 								displayHomesBannerTitle.innerText = 'NEW AVAILABLE HOMES';
		// 								displayMainFooterContentTitle.innerText = homesSearchPageFooterTitle;
		// 								displayMainFooterContent.innerHTML = homesSearchPage;
		// 							} else {
		// 								displayHomesBannerTitle.innerText = 'AVAILABLE HOMES IN ' + tax.name;
		// 								displayMainFooterContentTitle.innerText = tax.name;
		// 								displayMainFooterContent.innerHTML = tax.description;
		// 							}
		// 						} );
		// 					},
		// 				} );
		// 			}
		// 		}
		//
		// 		loadMainFootercontent();
		//
		// 		$( document ).on( 'click', '.facetwp-facet-qmi_location .checked', function() {
		// 			// eslint-disable-next-line camelcase
		// 			const data_value = $( this ).attr( 'data-value' );
		// 			const dataTexaonomies = `http://newhomeinc.test/wp-json/wp/v2/metro-area?slug=${ data_value }`;
		//
		// 			$.ajax( {
		// 				url: dataTexaonomies,
		// 				dataType: 'json',
		// 				success( res ) {
		// 					$( '#main-taxonomy-area' ).html( res );
		// 					$.each( res, function( i, tax ) {
		// 						$( '#main-taxonomy-area' ).html( tax );
		// 						// eslint-disable-next-line no-console
		// 						console.log( tax.name );
		// 						// eslint-disable-next-line camelcase
		// 						if ( data_value === '' ) {
		// 							displayHomesBannerTitle.innerText = 'NEW HOME COMMUNITIES';
		// 							displayMainFooterContentTitle.innerText = homesSearchPageFooterTitle;
		// 							displayMainFooterContent.innerText = homesSearchPage;
		// 						} else {
		// 							displayHomesBannerTitle.innerText = 'NEW HOME COMMUNITIES IN ' + tax.name;
		// 							displayMainFooterContentTitle.innerText = tax.name;
		// 							displayMainFooterContent.innerHTML = tax.description;
		// 						}
		// 					} );
		// 				},
		// 			} );
		// 		} );
		// 	} );
		// }( jQuery ) );
	},
};

export default floorplansSearchFooterContent;
