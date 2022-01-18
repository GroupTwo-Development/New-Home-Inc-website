// you can import modules from the theme lib or even from
// NPM packages if they support it.
import { createApp } from 'vue';
import lozad from 'lozad';
import AOS from 'aos';
import { Fancybox } from '@fancyapps/ui';

window.Popper = require( '@popperjs/core' );
require( 'bootstrap' );

//Some convenient tools to get you started…
// import FlyoutBtn from './components/FlyoutBtn';
// import CommunityFlyout from './components/CommunityFlyout';
import AnimateOnPageLinks from './components/AnimateOnPageLinks';
import SelectButton from './components/SelectButtton';
import globalScript from './script/globalScript';
import progressBar from './script/progressBar';
import videosPlayer from './script/videosPlayer';
import DropdownButtons from './script/DropdownButtons';
import qmiSearchFooterContent from './components/qmiSearchFooterContent';
import detailPageGallery from './script/detailPageGallery';
import generalScript from './components/generalScript';
import featuredHome from './script/featuredHome';
import accordion from './script/accordion';
import communityFilterContent from './components/communityFilterContent';
import communityFlyoutSlider from './components/communityFlyoutSlider';
import homesFlyoutSlider from './components/homesFlyoutSlider';
import homeDesignFlyoutSlider from './components/homeDesignFlyoutSlider';
import communityFloorplanFlyoutSlider from './components/communityFloorplanFlyoutSlider';
// import homeDesignsSearchFooterContent from './components/homeDesignsSearchFooterContent';
import elevationGallery from './script/elevationGallery';

// Initialise our components on jQuery.ready…
jQuery( function( $ ) {
	AnimateOnPageLinks.init();
	SelectButton.init();
	communityFilterContent.init();
	qmiSearchFooterContent.init();
	communityFlyoutSlider.init();
	homesFlyoutSlider.init();
	homeDesignFlyoutSlider.init();
	communityFloorplanFlyoutSlider.init();
	// homeDesignsSearchFooterContent.init();
	globalScript.init();
} );

// const homeApp = createApp( CommunityFlyout );
// homeApp.mount( '#community-flyout-app' );

const observer = lozad(); // lazy loads elements with default selector as ".lozad"
observer.observe();
AOS.init();
accordion.init();
generalScript.init();
featuredHome.init();
videosPlayer.init();
DropdownButtons.init();

detailPageGallery.init();
elevationGallery.init();

// footerCtaListing.init();

