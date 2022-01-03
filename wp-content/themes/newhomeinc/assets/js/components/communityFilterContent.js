const $ = window.jQuery;
const $window = window.$window || $( window );

const communityFilterContent = {
	init() {
		const getUrl = 'https://newhomeinc1dev.wpengine.com';

		$( document ).on( 'facetwp-loaded', function() {
			const communitySearchPage = app_script_vars.community_search_page;
			const searchPageFooterTitle = app_script_vars.community_search_page_title;
			// eslint-disable-next-line no-console
			// console.log( communitySearchPage );

			const displayCommunityBannerTitle = document.getElementById( 'community_banner_title' );
			const displayMainFooterContentTitle = document.getElementById( 'main-content-title' );
			const displayMainFooterContent = document.getElementById( 'main-footer-content' );

			( function( $ ) {
				const checkedBoxFunction = document.querySelector( '.facetwp-facet-location ' );
				const dropdownValue = $( this ).data( '.facetwp-facet-location .checked' );
				// const dropdownValue = document.querySelector( '.facetwp-facet-location .checked' );
				// console.log( dropdownValue );
				const selectedValue = $( '.facetwp-facet-location .checked' ).data( 'value' );
				// eslint-disable-next-line no-console
				// console.log( selectedValue );

				const loadedContent = `${ getUrl }/wp-json/wp/v2/metro-area?slug=${ selectedValue }`;

				function loadMainFootercontent() {
					if ( $( '.facetwp-facet-location ' ).has( '.checked' ) ) {
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
										displayCommunityBannerTitle.innerText = 'NEW HOME COMMUNITIES';
										displayMainFooterContentTitle.innerText = searchPageFooterTitle;
										displayMainFooterContent.innerHTML = communitySearchPage;
									} else {
										displayCommunityBannerTitle.innerText = 'NEW HOME COMMUNITIES IN ' + tax.name;
										displayMainFooterContentTitle.innerText = tax.name;
										displayMainFooterContent.innerHTML = tax.description;
									}
								} );
							},
						} );
					}
				}

				loadMainFootercontent();

				function filterCommunityContent() {
					// eslint-disable-next-line camelcase
					const data_value = $( this ).attr( 'data-value' );
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
								if ( data_value === '' ) {
									displayCommunityBannerTitle.innerText = 'NEW HOME COMMUNITIES';
									displayMainFooterContentTitle.innerText = searchPageFooterTitle;
									displayMainFooterContent.innerHTML = communitySearchPage;
								} else {
									displayCommunityBannerTitle.innerText = 'NEW HOME COMMUNITIES IN ' + tax.name;
									displayMainFooterContentTitle.innerText = tax.name;
									displayMainFooterContent.innerHTML = tax.description;
								}
							} );
						},
					} );
				}

				$( document ).on( 'click', '.facetwp-facet-location .checked', function() {
					filterCommunityContent();
				} );
			}( jQuery ) );
		} );
	},
};

export default communityFilterContent;
