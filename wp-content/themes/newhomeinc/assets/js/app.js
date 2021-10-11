// you can import modules from the theme lib or even from
// NPM packages if they support it.
import { createApp } from 'vue';

window.Popper = require( '@popperjs/core' );
require( 'bootstrap' );

//Some convenient tools to get you started…
import HelloWorld from './components/HelloWorld';
// import AnimateOnPageLinks from './components/AnimateOnPageLinks';


// Initialise our components on jQuery.ready…
// jQuery(function ($) {
//     AnimateOnPageLinks.init();
// });

const homeApp = createApp({
    components: {
        HelloWorld,
    }
})

homeApp.mount('#home-app');