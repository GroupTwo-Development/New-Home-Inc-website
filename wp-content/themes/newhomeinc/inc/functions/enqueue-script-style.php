<?php
/**
 * Enqueue scripts and styles.
 */

$get_api_key = get_field('google_maps_api_key', 'option');
function newhomeinc_scripts() {
	wp_enqueue_style('newhomeinc-fonts', 'https://use.typekit.net/tce6fww.css' );

	wp_enqueue_style('newhomeinc-unicon', 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/1462889/unicons.css' );

	wp_enqueue_style('newhomeinc-lightGalleryCss', 'https://cdn.jsdelivr.net/npm/lightgallery@2.3.0/css/lightgallery-bundle.min.css' );

	wp_enqueue_style('newhomeinc-fancyboxCsss', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css' );

	wp_enqueue_style('newhomeinc-select2', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css' );

	wp_enqueue_style( 'newhomeinc-style', get_template_directory_uri() . '/build/css/style.css', array(), _S_VERSION );
	// wp_style_add_data( 'newhomeinc-style', 'rtl', 'replace' );

	wp_enqueue_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js', array(), _S_VERSION, true );

	wp_enqueue_script('newhomeinc-fontawesome', 'https://kit.fontawesome.com/dd6b57cb78.js', array(), '5.5', false);

	wp_enqueue_script('newhomeinc-fancyappJs', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js', array(), '5.5', true);

	wp_enqueue_script('newhomeinc-select2', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js', array(), '5.5', true);


	wp_enqueue_script( 'newhomeinc-app', get_template_directory_uri() . '/build/js/app.js', array(), _S_VERSION, true );
	$variable_to_js = [
		'ajax_url' => admin_url('admin-ajax.php')
	];
	wp_localize_script('newhomeinc-app', 'Theme_Variables', $variable_to_js);


	wp_localize_script('newhomeinc-app', 'app_script_vars', array(
			'community_search_page' => get_field("community_search_page_content",'option'),
			'community_search_page_title' => get_field("community_search_page_content_title",'option'),
			'homes_search_page_title' => get_field("qmi_search_page_content_title_copy2",'option'),
			'qmi_search_page_content' => get_field("qmi_search_page_content",'option'),
			'floorplan_search_page_content_title' => get_field("floorplan_search_page_content_title_copy",'option'),
			'floorplan_search_page_content' => get_field("floorplan_search_page_content",'option'),
			'detail_page_gallery' => get_field("gallery"),
			'elevation_image' => get_field("elevation_image"),
		)
	);

	wp_register_script('google-map', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyBXu99Chr6rm7G5cgyA2upf7Vj0JTKfjL4&callback', array('jquery'), '', false);
	wp_enqueue_script('google-map');

	wp_register_script('gmaps-init', get_template_directory_uri() . '/build/js/RenderGooglemaps.js', array('jquery'), '', false);
	wp_enqueue_script('gmaps-init');

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



// Method 2: Setting.
function site_acf_init() {
	$get_api_key = get_field('google_maps_api_key', 'option');
	acf_update_setting('google_api_key', $get_api_key);
}
add_action('acf/init', 'site_acf_init');


add_filter( 'facetwp_map_init_args', 'prefix_prevent_scroll_zoom_on_facet_map' );
/**
 * Filter the Google Map options to prevent scrollwheel zoom.
 * @link https://craigsimpson.scot/filter-facetwp-google-map-options
 *
 * @param array $args Array of init settings for Google map.
 *
 * @return array $args Modified array.
 */
function prefix_prevent_scroll_zoom_on_facet_map( $args ) {
	$args['init']['scrollwheel'] = false;
	return $args;
}

function tn_custom_excerpt_length( $length ) {
	return 19;
}
add_filter( 'excerpt_length', 'tn_custom_excerpt_length', 999 );