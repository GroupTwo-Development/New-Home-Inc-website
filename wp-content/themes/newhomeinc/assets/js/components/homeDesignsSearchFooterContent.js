const $ = window.jQuery;
const $window = window.$window || $( window );

// eslint-disable-next-line no-unused-vars
const homeDesignsSearchFooterContent = {
	init() {
		const getUrl = 'https://newhomeinc.com';
		$( document ).on( 'facetwp-loaded', function() {
			const homesSearchPage = app_script_vars.floorplan_search_page_content;
			const homesSearchPageFooterTitle = app_script_vars.floorplan_search_page_content_title;
			// eslint-disable-next-line no-console
			// console.log( homesSearchPageFooterTitle );

			const displayHomesBannerTitle = document.getElementById( 'homes_banner_title' );
			const displayMainFooterContentTitle = document.getElementById( 'home_designs_main_footer_content_title' );
			const displayMainFooterContent = document.getElementById( 'main-footer-content' );

			( function( $ ) {
				const checkedBoxFunction = document.querySelector( '.facetwp-facet-plan_community ' );
				const dropdownValue = document.querySelector( '.facetwp-facet-plan_community .checked' );
				// console.log( dropdownValue );
				const selectedValue = $( '.facetwp-facet-plan_community .checked' ).data( 'value' );
				// const selectedValue = dropdownValue.getAttribute( 'data-value' );
				// eslint-disable-next-line no-console
				// console.log( selectedValue );

				const loadedContent = getUrl + '/wp-json/wp/v2/communities/' + selectedValue;

				function loadMainFootercontent() {
					if ( $( '.facetwp-facet-plan_community ' ).has( '.checked' ) ) {
						$.ajax( {
							url: loadedContent,
							dataType: 'json',
							success( res ) {
								$( '#main-taxonomy-area' ).html( res );
								// eslint-disable-next-line no-console
								console.log( res );
								$.each( res, function( i, community ) {
									$( '#main-taxonomy-area' ).html( community );
									// eslint-disable-next-line no-console
									console.log( community.title.rendered );
									// eslint-disable-next-line camelcase
									if ( selectedValue === '' ) {
										displayHomesBannerTitle.innerText = 'AVAILABLE HOMES';
										displayMainFooterContentTitle.innerText = homesSearchPageFooterTitle;
										displayMainFooterContent.innerHTML = homesSearchPage;
									} else {
										displayHomesBannerTitle.innerText = 'AVAILABLE HOMES IN ' + community.title.rendered;
										displayMainFooterContentTitle.innerText = community.title.rendered;
										displayMainFooterContent.innerHTML = community.acf.subdescription;
									}
								} );
							},
						} );
					}
				}

				loadMainFootercontent();

				function filterQmiContent() {
					$( document ).on( 'click', '.facetwp-facet-plan_community .checked', function() {
						// eslint-disable-next-line camelcase
						const data_value = $( this ).attr( 'data-value' );
						// eslint-disable-next-line no-console
						console.log( data_value );
						const dataTexaonomies = getUrl + '/wp-json/wp/v2/communities/' + selectedValue;

						// eslint-disable-next-line no-console
						console.log( dataTexaonomies );

						$.ajax( {
							url: dataTexaonomies,
							dataType: 'json',
							success( res ) {
								$( '#main-taxonomy-area' ).html( res );
								$.each( res, function( i, community ) {
									$( '#main-taxonomy-area' ).html( community );
									// eslint-disable-next-line no-console
									console.log( community.title.rendered );
									// eslint-disable-next-line camelcase
									if ( selectedValue === '' ) {
										displayHomesBannerTitle.innerText = 'AVAILABLE HOMES';
										displayMainFooterContentTitle.innerText = homesSearchPageFooterTitle;
										displayMainFooterContent.innerHTML = homesSearchPage;
									} else {
										displayHomesBannerTitle.innerText = 'AVAILABLE HOMES IN ' + community.title.rendered;
										displayMainFooterContentTitle.innerText = community.title.rendered;
										displayMainFooterContent.innerHTML = community.acf.subdescription;
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

export default homeDesignsSearchFooterContent;
