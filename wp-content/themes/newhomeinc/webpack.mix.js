const { minify } = require('laravel-mix');
const mix = require( 'laravel-mix' );
require( 'laravel-mix-eslint' );
const local = require( './local' );
require( 'laravel-mix-versionhash' );

mix.setPublicPath('./build');

mix.webpackConfig( {
	externals: {
		"jquery":"jQuery",
	},
} );

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

if ( mix.inProduction() ) {
	mix.versionHash();
	mix.sourceMaps();
}
