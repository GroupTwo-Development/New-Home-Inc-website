// import { value } from 'lodash/seq';
// import contains from '@popperjs/core/lib/dom-utils/contains';
// import { style } from '@splidejs/splide/dist/types/utils';

const $ = window.jQuery;
const $window = window.$window || $( window );

const SelectButton = {
	init() {
		const getUrl = 'https://newhomeinc.com';
		( function( $ ) {
			$( '.detail-page-cta-options' ).on( 'click', function() {
				$( '.detail-page-cta-slide-out' ).toggleClass( 'slidemodal-hidden' );
				$( '.desktop-cta' ).toggleClass( 'global-cta' );
				$( '.ask-a-question-component' ).toggleClass( 'global-cta' );
			} );

			$( '.cta-close' ).on( 'click', function() {
				$( '.detail-page-cta-slide-out' ).toggleClass( 'slidemodal-hidden' );
				$( '.desktop-cta' ).toggleClass( 'global-cta' );
				$( '.ask-a-question-component' ).toggleClass( 'global-cta' );
			} );

			$( '.ask-question a' ).on( 'click', function() {
				// console.log( this.innerHTML );
				$( '.detail-page-cta-slide-out' ).toggleClass( 'slidemodal-hidden' );
				$( '.desktop-cta' ).toggleClass( 'global-cta' );
				$( '.ask-a-question-component' ).toggleClass( 'global-cta' );
			} );

			$( document ).on( 'facetwp-loaded', function() {
				collapse_init();
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
										console.log( tax );
										// eslint-disable-next-line no-console
										// console.log( tax.name );
										// eslint-disable-next-line camelcase
										if ( selectedValue === '' ) {
											displayCommunityBannerTitle.innerText = 'NEW HOME COMMUNITIES';
											displayMainFooterContentTitle.innerText = searchPageFooterTitle;
											displayMainFooterContent.innerText = communitySearchPage;
										} else {
											displayCommunityBannerTitle.innerText = 'NEW HOME COMMUNITIES IN ' + tax.name;
											displayMainFooterContentTitle.innerText = tax.name;
											displayMainFooterContent.innerText = tax.description;
										}
									} );
								},
							} );
						}
					}

					loadMainFootercontent();

					$( document ).on( 'click', '.facetwp-facet-location .checked', function() {
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
									// console.log( tax.name );
									// eslint-disable-next-line camelcase
									if ( data_value === '' ) {
										displayCommunityBannerTitle.innerText = 'NEW HOME COMMUNITIES';
										displayMainFooterContentTitle.innerText = searchPageFooterTitle;
										displayMainFooterContent.innerHTML = communitySearchPage;
									} else {
										displayCommunityBannerTitle.innerText = 'NEW HOME COMMUNITIES IN ' + tax.name;
										displayMainFooterContentTitle.innerText = tax.name;
										displayMainFooterContent.innerText = tax.description;
									}
								} );
							},
						} );
					} );
				}( jQuery ) );
			} );

			window.addEventListener( 'load', ( event ) => {
				collapse_init();
			} );

			window.addEventListener( 'load', ( event ) => {
				$( '#cta-contact-form' ).on( 'click', function() {
					// eslint-disable-next-line no-console
					// console.log( this.innerHTML );
					$( '.detail-page-cta-slide-out' ).toggleClass( 'slidemodal-hidden' );
					$( '.desktop-cta' ).toggleClass( 'global-cta' );
					$( '.ask-a-question-component' ).toggleClass( 'global-cta' );
				} );
			} );

			$( '.page-template-page-communities-map .main-map-view-component a' ).attr( 'href', '/communities' );
			$( '.page-template-page-communities-map .main-map-view-component a .map-view-title' ).text( 'Grid View' );

			$( '.page-template-page-homes-map .main-map-view-component a' ).attr( 'href', '/homes' );
			$( '.page-template-page-homes-map .main-map-view-component a .map-view-title' ).text( 'Grid View' );
			//
			// $( '.js-scroll' ).click( function() {
			// 	const headerHeight = 400;
			//
			// 	$( 'html, body' ).animate( {
			// 		scrollTop: $( $.attr( this, 'href' ) ).offset().top - headerHeight,
			// 	}, 500 );
			// 	return false;
			// } );

			// eslint-disable-next-line no-console

			// const scrollSpy = new bootstrap.ScrollSpy( document.body, {
			// 	target: '#quicklink-nav"',
			// } );
		}( jQuery ) );
	},
};

export default SelectButton;
