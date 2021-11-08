// eslint-disable-next-line no-undef
const { minify } = require( 'laravel-mix');
const mix = require( 'laravel-mix' );
const local = require( './local' );
require( 'laravel-mix-eslint' );
require( 'laravel-mix-versionhash' );
require('laravel-mix-purgecss');



mix.setPublicPath('./build');

mix.webpackConfig( {
	externals: {
		"jquery":"jQuery",
	},
} );

mix.options({
	legacyNodePolyfills: true,
});


// mix.purgeCss({
// 	enabled: true,
// });

if ( mix.inProduction() ) {
	mix.versionHash();
	mix.sourceMaps();
}

if ( local.proxy ) {
	mix.browserSync( {
		proxy: 'http://newhomeinc.test/',
		injectChanges: true,
		open: true,
		files: [
			'build/**/*.{css,js}',
			'/**/*.php',
		],
	} );
}

mix.js( 'assets/js/app.js', 'js' ).vue();
mix.sass( 'assets/sass/style.scss', 'css' );
mix.copy('node_modules/@fortawesome/fontawesome-free/webfonts', 'build/fonts/webfonts');