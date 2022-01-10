// import { value } from 'lodash/seq';
// import contains from '@popperjs/core/lib/dom-utils/contains';
// import { style } from '@splidejs/splide/dist/types/utils';

const $ = window.jQuery;
const $window = window.$window || $( window );

const SelectButton = {
	init() {
		const getUrl = 'https://newhomeinc1dev.wpengine.com';
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
											displayMainFooterContent.innerText = communitySearchPage;
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
										displayMainFooterContent.innerHTML = tax.description;
									}
								} );
							},
						} );
					} );
				}( jQuery ) );
			} );

			function communitySliderout() {
				const communityElement = document.getElementById( 'detail-page-cta' );
				const postId = communityElement.getAttribute( 'data-postid' );
				const postTilte = document.getElementById( 'cta-title' );
				const ulEle = document.getElementById( 'cta-contact-form' );
				const getDirection = document.getElementById( 'get_direction' );
				// const selfGuidedTourLink = document.getElementById( 'elf-guided_tour' );
				// eslint-disable-next-line no-console

				const communitiesData = getUrl + '/wp-json/wp/v2/communities/' + postId;

				$.ajax( {
					url: communitiesData,
					dataType: 'json',
					// data: {
					// 	/postId,
					// },
					success( res ) {
						$( '#detail-page-contact-slideout' ).html( res );
						postTilte.innerText = res.title.rendered;

						let CommunityFlyoutLinks = `<ul>`;
						if ( res.acf.self_guided_tour !== '' ) {
							// const selfGuidedTourLi = document.createElement( 'li' );
							// selfGuidedTourLi.setAttribute( 'class', 'self-guided_tour' );
							// const selfGuidedTourLink = document.createElement( 'a' );
							// selfGuidedTourLink.setAttribute( 'href', `${ res.acf.self_guided_tour }` );
							// selfGuidedTourLink.setAttribute( 'target', '_blank' );
							// const selfGuidedTourText = document.createTextNode( 'Self Guided Tour' );
							// selfGuidedTourLink.append( selfGuidedTourText );
							// selfGuidedTourLi.append( selfGuidedTourLink );
							// ulEle.appendChild( selfGuidedTourLi );
							CommunityFlyoutLinks += `<li class="self-guided-tour"><a href="${ res.acf.self_guided_tour }" target="_blank"><i class="fas fa-key"></i> <span class="link-title">Self Guided Tour</span></a></li>`;
						}

						if ( res.acf.nhi_tour !== '' ) {
							// const NhiTourLi = document.createElement( 'li' );
							// NhiTourLi.setAttribute( 'class', 'nhi-tour' );
							// const NhiTourLink = document.createElement( 'a' );
							// NhiTourLink.setAttribute( 'href', `${ res.acf.nhi_tour }` );
							// NhiTourLink.setAttribute( 'target', '_blank' );
							// const nhiTourText = document.createTextNode( 'NHI Tour' );
							// NhiTourLink.append( nhiTourText );
							// NhiTourLi.append( NhiTourLink );
							// ulEle.appendChild( NhiTourLi );
							CommunityFlyoutLinks += `<li class="nhi-tour"><a href="${ res.acf.nhi_tour }" target="_blank"><i class="fas fa-user"></i> <span class="link-title">NHI Tour</span></a></li>`;
						}

						if ( typeof res.acf.community_contact_form !== 'undefined' ) {
							// const AskLi = document.createElement( 'li' );
							// AskLi.setAttribute( 'class', 'ask-question' );
							// const askLink = document.createElement( 'a' );
							// askLink.setAttribute( 'href', '#' );
							// askLink.setAttribute( 'target', '_blank' );
							// askLink.setAttribute( 'data-fancybox', 'dialog' );
							// askLink.setAttribute( 'data-src', '#dialog-content' );
							// const askText = document.createTextNode( 'Ask a Question' );
							// askLink.append( askText );
							// AskLi.append( askLink );
							// ulEle.appendChild( AskLi );
							CommunityFlyoutLinks += `<li class="ask-a-question-flyout"><a href="#" data-fancybox="dialog" data-src="#dialog-content"><i class="fas fa-question"></i> <span class="link-title">Ask a Question</span></a></li>`;
						}

						// eslint-disable-next-line no-unused-vars
						CommunityFlyoutLinks += `</ul>`;

						ulEle.innerHTML = CommunityFlyoutLinks;

						// eslint-disable-next-line valid-typeof
						if ( ! res.acf.subdivision_google_map === null ) {
							// eslint-disable-next-line no-console

							const getDirectionDiv = document.getElementById( 'get_direction_text' );
							getDirection.setAttribute( 'href', `https://www.google.com/maps?q=${ res.acf.subdivision_google_map.lat }, ${ res.acf.subdivision_google_map.lng }` );
							getDirection.innerText = `${ res.acf.subdivision_google_map.street_number } ${ res.acf.subdivision_google_map.street_name }, ${ res.acf.subdivision_google_map.city }, ${ res.acf.subdivision_google_map.state }, ${ res.acf.subdivision_google_map.post_code }`;

							const getFirectionText = `<span class="cta-location-area">Get Directions</span>`;
							getDirectionDiv.innerHTML = getFirectionText;
						}
					},
				} );
			}

			function homesSlideOut() {
				const element = document.getElementById( 'detail-page-cta' );
				const homesPostId = element.getAttribute( 'data-postid' );
				const postTilte = document.getElementById( 'cta-title' );
				const ulEle = document.getElementById( 'cta-contact-form' );
				const getDirection = document.getElementById( 'get_direction' );
				// const selfGuidedTourLink = document.getElementById( 'elf-guided_tour' );
				// eslint-disable-next-line no-console

				const qmiHomes = getUrl + '/wp-json/wp/v2/homes/' + homesPostId;

				$.ajax( {
					url: qmiHomes,
					dataType: 'json',
					data: {
						homesPostId,
					},
					success( res ) {
						$( '#detail-page-contact-slideout' ).html( res );
						postTilte.innerText = res.title.rendered;

						if ( typeof res.acf.self_guided_tour !== 'undefined' ) {
							const selfGuidedTourLi = document.createElement( 'li' );
							selfGuidedTourLi.setAttribute( 'class', 'self-guided_tour' );
							const selfGuidedTourLink = document.createElement( 'a' );
							selfGuidedTourLink.setAttribute( 'href', `${ res.acf.self_guided_tour }` );
							selfGuidedTourLink.setAttribute( 'target', '_blank' );
							const selfGuidedTourText = document.createTextNode( 'Self Guided Tour' );
							selfGuidedTourLink.append( selfGuidedTourText );
							selfGuidedTourLi.append( selfGuidedTourLink );
							ulEle.appendChild( selfGuidedTourLi );
						}

						if ( typeof res.acf.nhi_tour !== 'undefined' ) {
							const NhiTourLi = document.createElement( 'li' );
							NhiTourLi.setAttribute( 'class', 'nhi-tour' );
							const NhiTourLink = document.createElement( 'a' );
							NhiTourLink.setAttribute( 'href', `${ res.acf.nhi_tour }` );
							NhiTourLink.setAttribute( 'target', '_blank' );
							const nhiTourText = document.createTextNode( 'NHI Tour' );
							NhiTourLink.append( nhiTourText );
							NhiTourLi.append( NhiTourLink );
							ulEle.appendChild( NhiTourLi );
						}

						const AskLi = document.createElement( 'li' );
						AskLi.setAttribute( 'class', 'ask-question' );
						const askLink = document.createElement( 'a' );
						askLink.setAttribute( 'href', '#' );
						askLink.setAttribute( 'target', '_blank' );
						askLink.setAttribute( 'data-fancybox', 'dialog' );
						askLink.setAttribute( 'data-src', '#dialog-content' );
						const askText = document.createTextNode( 'Ask a Question' );
						askLink.append( askText );
						AskLi.append( askLink );
						ulEle.appendChild( AskLi );

						if ( res.acf.spec_google_map ) {
							getDirection.setAttribute( 'href', `https://www.google.com/maps?q=${ res.acf.spec_google_map.lat }, ${ res.acf.spec_google_map.lng }` );
							getDirection.innerText = `${ res.acf.spec_google_map.name }, ${ res.acf.spec_google_map.city }, ${ res.acf.spec_google_map.state }, ${ res.acf.spec_google_map.post_code }`;
						}
					},
				} );
			}

			function homeDesignSlideout() {
				const element = document.getElementById( 'detail-page-cta' );
				const homeDesignPostId = element.getAttribute( 'data-postid' );
				const postTilte = document.getElementById( 'cta-title' );
				const ulEle = document.getElementById( 'cta-contact-form' );
				const getDirection = document.getElementById( 'get_direction' );
				// const selfGuidedTourLink = document.getElementById( 'elf-guided_tour' );
				// eslint-disable-next-line no-console

				const homeDesign = getUrl + '/wp-json/wp/v2/home-design/' + homeDesignPostId;

				$.ajax( {
					url: homeDesign,
					dataType: 'json',
					data: {
						homeDesignPostId,
					},
					success( res ) {
						$( '#detail-page-contact-slideout' ).html( res );
						postTilte.innerText = res.title.rendered;
						console.log( res );

						if ( typeof res.acf.self_guided_tour !== 'undefined' && typeof res.acf.self_guided_tour !== '' ) {
							const selfGuidedTourLi = document.createElement( 'li' );
							selfGuidedTourLi.setAttribute( 'class', 'self-guided_tour' );
							const selfGuidedTourLink = document.createElement( 'a' );
							selfGuidedTourLink.setAttribute( 'href', `${ res.acf.self_guided_tour }` );
							selfGuidedTourLink.setAttribute( 'target', '_blank' );
							const selfGuidedTourText = document.createTextNode( 'Self Guided Tour' );
							selfGuidedTourLink.append( selfGuidedTourText );
							selfGuidedTourLi.append( selfGuidedTourLink );
							ulEle.appendChild( selfGuidedTourLi );
						}

						if ( typeof res.acf.nhi_tour !== 'undefined' ) {
							const NhiTourLi = document.createElement( 'li' );
							NhiTourLi.setAttribute( 'class', 'nhi-tour' );
							const NhiTourLink = document.createElement( 'a' );
							NhiTourLink.setAttribute( 'href', `${ res.acf.nhi_tour }` );
							NhiTourLink.setAttribute( 'target', '_blank' );
							const nhiTourText = document.createTextNode( 'NHI Tour' );
							NhiTourLink.append( nhiTourText );
							NhiTourLi.append( NhiTourLink );
							ulEle.appendChild( NhiTourLi );
						}

						const AskLi = document.createElement( 'li' );
						AskLi.setAttribute( 'class', 'ask-question' );
						const askLink = document.createElement( 'a' );
						askLink.setAttribute( 'href', '#' );
						askLink.setAttribute( 'target', '_blank' );
						askLink.setAttribute( 'data-fancybox', 'dialog' );
						askLink.setAttribute( 'data-src', '#dialog-content' );
						const askText = document.createTextNode( 'Ask a Question' );
						askLink.append( askText );
						AskLi.append( askLink );
						ulEle.appendChild( AskLi );

						if ( res.acf.spec_google_map ) {
							getDirection.setAttribute( 'href', `https://www.google.com/maps?q=${ res.acf.spec_google_map.lat }, ${ res.acf.spec_google_map.lng }` );
							getDirection.innerText = `${ res.acf.spec_google_map.name }, ${ res.acf.spec_google_map.city }, ${ res.acf.spec_google_map.state }, ${ res.acf.spec_google_map.post_code }`;
						}
					},
				} );
			}

			window.addEventListener( 'load', ( event ) => {
				communitySliderout();
				homesSlideOut();
				homeDesignSlideout();
			} );

			window.addEventListener( 'load', ( event ) => {
				collapse_init();
				$( '#cta-contact-form' ).on( 'click', function() {
					// eslint-disable-next-line no-console
					// console.log( this.innerHTML );
					$( '.detail-page-cta-slide-out' ).toggleClass( 'slidemodal-hidden' );
					$( '.desktop-cta' ).toggleClass( 'global-cta' );
					$( '.ask-a-question-component' ).toggleClass( 'global-cta' );
				} );
			} );

			$( '.page-template-page-communities-map .main-map-view-component a' ).attr( 'href', 'communities' );
			$( '.page-template-page-communities-map .main-map-view-component a .map-view-title' ).text( 'Grid View' );

			$( '.page-template-page-homes-map .main-map-view-component a' ).attr( 'href', '/homes' );
			$( '.page-template-page-homes-map .main-map-view-component a .map-view-title' ).text( 'Grid View' );

			// eslint-disable-next-line no-console
		}( jQuery ) );
	},
};

export default SelectButton;
