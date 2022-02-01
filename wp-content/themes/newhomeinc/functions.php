<?php
/**
 * New Home Inc functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package New_Home_Inc
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Implement default core functions.
 */
require get_template_directory() . '/inc/functions/default-functions.php';

/**
 * Register Widgets.
 */
require get_template_directory() . '/inc/functions/register-widgets.php';

/**
 * Enqueue Scripts and Styles.
 */
require get_template_directory() . '/inc/functions/enqueue-script-style.php';

/**
 * Home page site data.
 */
require get_template_directory() . '/inc/functions/siteData/export_data.php';

/**
 * Home page site data.
 */
require get_template_directory() . '/inc/functions/siteData/global/siteglobaldata.php';

/**
 * Site CTA
 */
require get_template_directory() . '/inc/functions/customFunctions/AskAQuestionCTA.php';


/**
 * Site Custom Function.
 */
require get_template_directory() . '/inc/functions/customFunctions/siteCustomFunction.php';

/**
 * Custom Login  additions.
 */
require get_template_directory() . '/inc/functions/customLogin.php';

/**
 * Bootstrap Navwalker  additions.
 */
require get_template_directory() . '/inc/functions/class-wp-bootstrap-navwalker.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';


/**
 * Site Core custom Function.
 */
require get_template_directory() . '/inc/functions/customFunctions/Corefunction.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


//
//function cptui_register_my_cpts_home_design() {
//
//	/**
//	 * Post Type: Home Designs.
//	 */
//
//	$labels = [
//		"name" => __( "Home Designs", "newhomeinc" ),
//		"singular_name" => __( "Home Design", "newhomeinc" ),
//		"menu_name" => __( "Home Design", "newhomeinc" ),
//		"all_items" => __( "All Home Designs", "newhomeinc" ),
//		"add_new" => __( "Add new", "newhomeinc" ),
//		"add_new_item" => __( "Add new Home Design", "newhomeinc" ),
//		"edit_item" => __( "Edit Home Design", "newhomeinc" ),
//		"new_item" => __( "New Home Design", "newhomeinc" ),
//		"view_item" => __( "View Home Design", "newhomeinc" ),
//		"view_items" => __( "View Home Designs", "newhomeinc" ),
//		"search_items" => __( "Search Home Designs", "newhomeinc" ),
//		"not_found" => __( "No Home Designs found", "newhomeinc" ),
//		"not_found_in_trash" => __( "No Home Designs found in trash", "newhomeinc" ),
//		"parent" => __( "Parent Home Design:", "newhomeinc" ),
//		"featured_image" => __( "Featured image for this Home Design", "newhomeinc" ),
//		"set_featured_image" => __( "Set featured image for this Home Design", "newhomeinc" ),
//		"remove_featured_image" => __( "Remove featured image for this Home Design", "newhomeinc" ),
//		"use_featured_image" => __( "Use as featured image for this Home Design", "newhomeinc" ),
//		"archives" => __( "Home Design archives", "newhomeinc" ),
//		"insert_into_item" => __( "Insert into Home Design", "newhomeinc" ),
//		"uploaded_to_this_item" => __( "Upload to this Home Design", "newhomeinc" ),
//		"filter_items_list" => __( "Filter Home Designs list", "newhomeinc" ),
//		"items_list_navigation" => __( "Home Designs list navigation", "newhomeinc" ),
//		"items_list" => __( "Home Designs list", "newhomeinc" ),
//		"attributes" => __( "Home Designs attributes", "newhomeinc" ),
//		"name_admin_bar" => __( "Home Design", "newhomeinc" ),
//		"item_published" => __( "Home Design published", "newhomeinc" ),
//		"item_published_privately" => __( "Home Design published privately.", "newhomeinc" ),
//		"item_reverted_to_draft" => __( "Home Design reverted to draft.", "newhomeinc" ),
//		"item_scheduled" => __( "Home Design scheduled", "newhomeinc" ),
//		"item_updated" => __( "Home Design updated.", "newhomeinc" ),
//		"parent_item_colon" => __( "Parent Home Design:", "newhomeinc" ),
//	];
//
//	$args = [
//		"label" => __( "Home Designs", "newhomeinc" ),
//		"labels" => $labels,
//		"description" => "",
//		"public" => true,
//		"publicly_queryable" => true,
//		"show_ui" => true,
//		"show_in_rest" => true,
//		"rest_base" => "",
//		"rest_controller_class" => "WP_REST_Posts_Controller",
//		"has_archive" => true,
//		"show_in_menu" => true,
//		"show_in_nav_menus" => true,
//		"delete_with_user" => false,
//		"exclude_from_search" => false,
//		"capability_type" => "post",
//		"map_meta_cap" => true,
//		"hierarchical" => false,
//		"rewrite" => [ "slug" => "home-design", "with_front" => true ],
//		"query_var" => true,
//		"menu_position" => 13,
//		"menu_icon" => "dashicons-art",
//		"supports" => [ "title" ],
//		"taxonomies" => [ "features" ],
//		"show_in_graphql" => false,
//	];
//
//	register_post_type( "home-design", $args );
//}
//
//add_action( 'init', 'cptui_register_my_cpts_home_design' );



