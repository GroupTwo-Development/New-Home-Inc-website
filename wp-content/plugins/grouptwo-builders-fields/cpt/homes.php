<?php
/**
 * @package g2builderdfields
 */

class homes
{
	public static function create_homes(){
		$labels = [
			'name' => __('Available Homes', 'texdomain'),
			'menu_name' => __('Available Homes', 'textdomain'),
			'singular_name' => 'Available home',
			'all_items' => 'All Available homes',
			"add_new" => __( "Add New", "textdomains" ),
			"add_new_item" => __( "Add New Available home", "textdomains" ),
			"edit_item" => __( "Edit Available home", "textdomains" ),
			"new_item" => __( "New Available home", "textdomains" ),
			"view_item" => __( "View Available home", "textdomains" ),
			"view_items" => __( "View Available home", "textdomains" ),
			"search_items" => __( "Search Available home", "textdomains" ),
			"not_found" => __( "No Available home", "textdomains" ),
			"not_found_in_trash" => __( "No Available home Found in Trash", "textdomains" ),
			"parent" => __( "Parent Available home", "textdomains" ),
			"featured_image" => __( "Featured Image for this Available home", "textdomains" ),
			"set_featured_image" => __( "Set Featured Image for this Available home", "textdomains" ),
			"remove_featured_image" => __( "Remove Featured Image for this Available home", "textdomains" ),
			"use_featured_image" => __( "Use Featured Image for this Available home", "textdomains" ),
			"parent_item_colon" => __( "Parent Available home", "textdomains" ),
		];
		$args = [
			"label" => __( "Available Home", "textdomains" ),
			"labels" => $labels,
			"description" => "This component displays a list of Available homs",
			"public" => true,
			"publicly_queryable" => true,
			"show_ui" => true,
			"show_in_rest" => true,
			"rest_base" => "",
			"rest_controller_class" => "WP_REST_Posts_Controller",
			"has_archive" => 'homes',
			"show_in_menu" => true,
			"show_in_nav_menus" => true,
			"delete_with_user" => false,
			"exclude_from_search" => false,
			"capability_type" => "post",
			"map_meta_cap" => true,
			"hierarchical" => false,
			'rewrite' => array( 'slug' => 'home-item', 'hierarchical' => true, 'with_front' => false ),
			"query_var" => true,
			"menu_position" => 11,
			"menu_icon" => "dashicons-admin-home",
			"supports" => [ "title", "revisions" ],
			"taxonomies" => [ "home-category" ],
		];
		register_post_type( "homes", $args );

		register_taxonomy( 'home-category', array( 'homes' ),
			array(
				'labels' => array(
					'name' => 'Home Location',
					'menu_name' => 'Home Location',
					'singular_name' => 'Home Location',
					'all_items' => 'All Home Locations'
				),
				'public' => true,
				'hierarchical' => true,
				'meta_box_cb'  => false,
				'show_ui' => true,
				'rewrite' => array( 'slug' => 'home-category', 'hierarchical' => true, 'with_front' => false ),
			)
		);
	}
}
$home = new homes();
$home->create_homes();




