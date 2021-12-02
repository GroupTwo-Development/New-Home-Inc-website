// you can import modules from the theme lib or even from
// NPM packages if they support it.
import { createApp } from 'vue';
import lozad from 'lozad';
import {Fancybox} from "@fancyapps/ui";

window.Popper = require( '@popperjs/core' );
require( 'bootstrap' );


//Some convenient tools to get you started…
import HelloWorld from './components/HelloWorld';
import globalScript from './script/globalScript';
import progressBar from './script/progressBar';
import videosPlayer from "./script/videosPlayer";
// import footerCtaListing from './script/footerCtaListing';
import featuredHome from './script/featuredHome';


// Initialise our components on jQuery.ready…
// jQuery(function ($) {
//     AnimateOnPageLinks.init();
// });
featuredHome.init();
videosPlayer.init();
const observer = lozad(); // lazy loads elements with default selector as ".lozad"
observer.observe();
// footerCtaListing.init();




const homeApp = createApp({
    components: {
        HelloWorld,
    }
})

homeApp.mount('#home-app');