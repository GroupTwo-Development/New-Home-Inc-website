const $ = window.jQuery;
const $window = window.$window || $( window );

// eslint-disable-next-line no-unused-vars
const qmiSearchFooterContent = {
	init() {
		const getUrl = 'https://newhomeinc1dev.wpengine.com';
		$( document ).on( 'facetwp-loaded', function() {
			const homesSearchPage = app_script_vars.qmi_search_page_content;
			const homesSearchPageFooterTitle = app_script_vars.homes_search_page_title;
			// eslint-disable-next-line no-console
			// console.log( homesSearchPageFooterTitle );

			const displayHomesBannerTitle = document.getElementById( 'homes_banner_title' );
			const displayMainFooterContentTitle = document.getElementById( 'qmi_main_footer_content_title' );
			const displayMainFooterContent = document.getElementById( 'main-footer-content' );

			( function( $ ) {
				const checkedBoxFunction = document.querySelector( '.facetwp-facet-qmi_location ' );
				const dropdownValue = document.querySelector( '.facetwp-facet-qmi_location .checked' );
				// console.log( dropdownValue );
				const selectedValue = $( '.facetwp-facet-qmi_location .checked' ).data( 'value' );
				// const selectedValue = dropdownValue.getAttribute( 'data-value' );
				// eslint-disable-next-line no-console
				// console.log( selectedValue );

				const loadedContent = `${ getUrl }/wp-json/wp/v2/metro-area?slug=${ selectedValue }`;

				function loadMainFootercontent() {
					if ( $( '.facetwp-facet-qmi_location ' ).has( '.checked' ) ) {
						$.ajax( {
							url: loadedContent,
							dataType: 'json',
							success( res ) {
								$( '#main-taxonomy-area' ).html( res );
								$.each( res, function( i, tax ) {
									$( '#main-taxonomy-area' ).html( tax );
									// eslint-disable-next-line no-console
									// console.log( tax.name );
									// eslint-disable-next-line camelcase
									if ( selectedValue === '' ) {
										displayHomesBannerTitle.innerText = 'AVAILABLE HOMES';
										displayMainFooterContentTitle.innerText = homesSearchPageFooterTitle;
										displayMainFooterContent.innerHTML = homesSearchPage;
									} else {
										displayHomesBannerTitle.innerText = 'AVAILABLE HOMES IN ' + tax.name;
										displayMainFooterContentTitle.innerText = tax.name;
										displayMainFooterContent.innerHTML = tax.description;
									}
								} );
							},
						} );
					}
				}

				loadMainFootercontent();

				function filterQmiContent() {
					$( document ).on( 'click', '.facetwp-facet-qmi_location .checked', function() {
						// eslint-disable-next-line camelcase
						const data_value = $( this ).attr( 'data-value-tes' );
						const dataTexaonomies = `${ getUrl }/wp-json/wp/v2/metro-area?slug=${ data_value }`;

						$.ajax( {
							url: dataTexaonomies,
							dataType: 'json',
							success( res ) {
								$( '#main-taxonomy-area' ).html( res );
								$.each( res, function( i, tax ) {
									$( '#main-taxonomy-area' ).html( tax );
									// eslint-disable-next-line no-console
									console.log( tax.name );
									// eslint-disable-next-line camelcase
									if ( selectedValue === '' ) {
										displayHomesBannerTitle.innerText = 'AVAILABLE HOMES';
										displayMainFooterContentTitle.innerText = homesSearchPageFooterTitle;
										displayMainFooterContent.innerHTML = homesSearchPage;
									} else {
										displayHomesBannerTitle.innerText = 'AVAILABLE HOMES IN ' + tax.name;
										displayMainFooterContentTitle.innerText = tax.name;
										displayMainFooterContent.innerHTML = tax.description;
										// eslint-disable-next-line no-console
										console.log( tax.description );
									}
								} );
							},
						} );
					} );
				}

				document.addEventListener( 'facetwp-loaded', function() {
					filterQmiContent();
				} );
			}( jQuery ) );
		} );
	},
};

export default qmiSearchFooterContent;
