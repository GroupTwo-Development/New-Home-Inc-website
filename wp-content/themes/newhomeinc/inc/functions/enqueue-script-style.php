<?php
/**
 * Enqueue scripts and styles.
 */
function newhomeinc_scripts() {
	wp_enqueue_style( 'newhomeinc-style', get_template_directory_uri() . '/build/css/style.css', array(), _S_VERSION );
	// wp_style_add_data( 'newhomeinc-style', 'rtl', 'replace' );

	wp_enqueue_script( 'newhomeinc-app', get_template_directory_uri() . '/build/js/app.js', array(), _S_VERSION, true );

	wp_enqueue_script( 'newhomeinc-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'newhomeinc_scripts' );



function my_login_stylesheet() {
	wp_enqueue_style( 'custom-login', get_stylesheet_directory_uri() . '/style-login.css' );
	wp_enqueue_script( 'custom-login', get_stylesheet_directory_uri() . '/style-login.js' );
}
add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );