<?php
/**
 * @package g2builderdfields
 */

class designPlans
{
	public static function create_designPlans(){
		$labels = [
			'name' => __('Home Designs', 'texdomain'),
			'menu_name' => __('Home Designs', 'textdomain'),
			'singular_name' => 'Home Design',
			'all_items' => 'All Home Designs',
			"add_new" => __( "Add New", "textdomains" ),
			"add_new_item" => __( "Add New Home Design", "textdomains" ),
			"edit_item" => __( "Edit Home Design", "textdomains" ),
			"new_item" => __( "New Home Design", "textdomains" ),
			"view_item" => __( "View Home Design", "textdomains" ),
			"view_items" => __( "View Home Design", "textdomains" ),
			"search_items" => __( "Search Home Design", "textdomains" ),
			"not_found" => __( "No Home Design Found", "textdomains" ),
			"not_found_in_trash" => __( "No Home Design Found in Trash", "textdomains" ),
			"parent" => __( "Parent Home Design", "textdomains" ),
			"featured_image" => __( "Featured Image for this Home Design", "textdomains" ),
			"set_featured_image" => __( "Set Featured Image for this Home Design", "textdomains" ),
			"remove_featured_image" => __( "Remove Featured Image for this Home Design", "textdomains" ),
			"use_featured_image" => __( "Use Featured Image for this Home Design", "textdomains" ),
			"parent_item_colon" => __( "Parent Home Design", "textdomains" ),
		];
		$args = [
			"label" => __( "Home Designs", "textdomains" ),
			"labels" => $labels,
			"description" => "This component displays a list of communities",
			"public" => true,
			"publicly_queryable" => true,
			"show_ui" => true,
			"show_in_rest" => true,
			"rest_base" => "",
			"rest_controller_class" => "WP_REST_Posts_Controller",
			"has_archive" => false,
			"show_in_menu" => true,
			"show_in_nav_menus" => true,
			"delete_with_user" => false,
			"exclude_from_search" => false,
			"capability_type" => "post",
			"map_meta_cap" => true,
			"hierarchical" => false,
			'rewrite' => array( 'slug' => 'home-designs', 'hierarchical' => false, 'with_front' => false ),
			"query_var" => true,
			"menu_position" => 13,
			"menu_icon" => "dashicons-art",
			"supports" => [ "title", "revisions" ],
//			"taxonomies" => [ "metro-area" ],
		];
		register_post_type( "home-design", $args );
	}
}

$community = new designPlans();
$community->create_designPlans();






