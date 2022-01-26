const $ = window.jQuery;
const $window = window.$window || $( window );

const homeDesignFlyoutSlider = {
	init() {
		const getUrl = 'https://newhomeinc.com';
		// eslint-disable-next-line no-shadow
		( function( $ ) {
			function homeDesignSliderout() {
				const homeDesignElement = document.getElementById( 'detail-page-cta' );
				const homeDesignPostId = homeDesignElement.getAttribute( 'data-postid' );
				const postTilte = document.getElementById( 'cta-title' );
				const ulEle = document.getElementById( 'cta-contact-form' );
				const getDirection = document.getElementById( 'get_direction' );
				// const selfGuidedTourLink = document.getElementById( 'elf-guided_tour' );
				// eslint-disable-next-line no-console

				const homeDesignData = getUrl + '/wp-json/wp/v2/home-design/' + homeDesignPostId;

				$.ajax( {
					url: homeDesignData,
					dataType: 'json',
					// data: {
					// 	/postId,
					// },
					success( res ) {
						$( '#detail-page-contact-slideout' ).html( res );
						postTilte.innerText = res.title.rendered;
						// eslint-disable-next-line no-console
						console.log( res );

						let homesFlyoutLinks = `<ul>`;
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
							homesFlyoutLinks += `<li class="self-guided-tour"><a href="${ res.acf.self_guided_tour }" target="_blank"><i class="fas fa-key"></i> <span class="link-title">Self Guided Tour</span></a></li>`;
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
							homesFlyoutLinks += `<li class="nhi-tour"><a href="${ res.acf.nhi_tour }" target="_blank"><i class="fas fa-user"></i> <span class="link-title">NHI Tour</span></a></li>`;
						}

						homesFlyoutLinks += `<li class="ask-a-question-flyout"><a href="#" data-fancybox="dialog" data-src="#dialog-content"><i class="fas fa-question"></i> <span class="link-title">Ask a Question</span></a></li>`;

						// eslint-disable-next-line no-unused-vars
						homesFlyoutLinks += `</ul>`;

						ulEle.innerHTML = homesFlyoutLinks;

						// eslint-disable-next-line valid-typeof
						// if ( res.acf.subdivision_google_map !== undefined ) {
						// 	// eslint-disable-next-line no-console
						//
						// 	const getDirectionDiv = document.getElementById( 'get_direction_text' );
						// 	getDirection.setAttribute( 'href', `https://www.google.com/maps?q=${ res.acf.subdivision_google_map.lat }, ${ res.acf.subdivision_google_map.lng }` );
						// 	getDirection.innerText = `${ res.acf.subdivision_google_map.street_number } ${ res.acf.subdivision_google_map.street_name }, ${ res.acf.subdivision_google_map.city }, ${ res.acf.subdivision_google_map.state }, ${ res.acf.subdivision_google_map.post_code }`;
						//
						// 	const getFirectionText = `<span class="cta-location-area">Get Directions</span>`;
						// 	getDirectionDiv.innerHTML = getFirectionText;
						// }

						const getDirectionDiv = document.getElementById( 'get_direction_text' );
						getDirection.setAttribute( 'href', `https://www.google.com/maps?q=${ res.acf.spec_google_map.lat }, ${ res.acf.spec_google_map.lng }` );
						getDirection.innerText = `${ res.acf.spec_google_map.street_number } ${ res.acf.spec_google_map.street_name }, ${ res.acf.spec_google_map.city }, ${ res.acf.spec_google_map.state }, ${ res.acf.spec_google_map.post_code }`;

						const getFirectionText = `<span class="cta-location-area">Get Directions</span>`;
						getDirectionDiv.innerHTML = getFirectionText;
					},
				} );
			}

			window.addEventListener( 'load', ( event ) => {
				homeDesignSliderout();
			} );
			// eslint-disable-next-line no-undef
		}( jQuery ) );
	},
};

export default homeDesignFlyoutSlider;
