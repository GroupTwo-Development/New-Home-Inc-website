<?php
/**
 * @package g2builderdfields
 */

namespace Inc\Base;

use Inc\Base\BaseController;

class CustomPostTypes extends BaseController{
	public function register() {

		add_action('init', array($this, 'create_subdivision'));
		add_action('init', array($this, 'create_floorplan'));
		add_action('init', array($this, 'create_designPlans'));
		add_action('init', array($this, 'create_homes'));
		add_action('init', array($this, 'create_agent'));
	}

	public static function create_subdivision(){
		$labels = [
			'name' => __('Communities', 'texdomain'),
			'menu_name' => __('Communities', 'textdomain'),
			'singular_name' => 'Community',
			'all_items' => 'All Communities',
			"add_new" => __( "Add New", "textdomains" ),
			"add_new_item" => __( "Add New Community", "textdomains" ),
			"edit_item" => __( "Edit Community", "textdomains" ),
			"new_item" => __( "New Community", "textdomains" ),
			"view_item" => __( "View Community", "textdomains" ),
			"view_items" => __( "View Communities", "textdomains" ),
			"archives" => __( "communities archives", "newhomeinc" ),
			"search_items" => __( "Search Community", "textdomains" ),
			"not_found" => __( "No Communities Found", "textdomains" ),
			"not_found_in_trash" => __( "No Communities Found in Trash", "textdomains" ),
			"parent" => __( "Parent Community", "textdomains" ),
			"featured_image" => __( "Featured Image for this Community", "textdomains" ),
			"set_featured_image" => __( "Set Featured Image for this Community", "textdomains" ),
			"remove_featured_image" => __( "Remove Featured Image for this Community", "textdomains" ),
			"use_featured_image" => __( "Use Featured Image for this Community", "textdomains" ),
			"parent_item_colon" => __( "Parent Community", "textdomains" ),
		];
		$args = [
			"label" => __( "Communities", "textdomains" ),
			"labels" => $labels,
			"description" => "This component displays a list of communities",
			"public" => true,
			"publicly_queryable" => true,
			"show_ui" => true,
			"show_in_rest" => true,
			"rest_base" => "",
			"rest_controller_class" => "WP_REST_Posts_Controller",
			"has_archive" => 'communities',
			"show_in_menu" => true,
			"show_in_nav_menus" => true,
			"delete_with_user" => false,
			"exclude_from_search" => false,
			"capability_type" => "post",
			"map_meta_cap" => true,
			"hierarchical" => false,
			'rewrite' => array( 'slug' => 'communities', 'hierarchical' => true, 'with_front' => false ),
			"query_var" => true,
			"menu_position" => 10,
			"menu_icon" => "dashicons-admin-multisite",
			"supports" => [ "title", "revisions" ],
			"taxonomies" => [ "metro-area" ],
		];

		register_post_type( "communities", $args );

		register_taxonomy( 'metro-area', array( 'communities' ),
			array(
				'labels' => array(
					'name' => 'Metro Areas',
					'menu_name' => 'Metro Areas',
					'singular_name' => 'Metro Category',
					'all_items' => 'All Metros'
				),
				'public' => true,
				'hierarchical' => true,
				'show_ui' => true,
				'rewrite' => array( 'slug' => 'metro-area', 'hierarchical' => true, 'with_front' => false ),
			)
		);

		register_taxonomy( 'schools', array( 'communities' ),
			array(
				'labels' => array(
					'name' => 'schools & districts',
					'menu_name' => 'Schools & Districts',
					'singular_name' => 'Schools',
					'all_items' => 'All Schools & Districts'
				),
				'public' => true,
				'hierarchical' => true,
				'show_in_menu'      => true, // Hides the term edit page.
				'show_ui' => true,
				'meta_box_cb'  => false,
				'rewrite' => array( 'slug' => 'schools', 'hierarchical' => true, 'with_front' => false ),
			)
		);

		register_taxonomy( 'features', array( 'communities' ),
			array(
				'labels' => array(
					'name' => 'features',
					'menu_name' => 'All Features',
					'singular_name' => 'Feature',
					'all_items' => 'All Features'
				),
				'public' => true,
				'hierarchical' => true,
				'show_in_menu'      => true, // Hides the term edit page.
				'meta_box_cb'  => false,
				'show_ui' => true,
				'rewrite' => array( 'slug' => 'features', 'hierarchical' => true, 'with_front' => false ),
			)
		);
	}

	public static function create_floorplan(){
			/**
			 * Post Type: Floorplans.
			 */

			$labels = [
				"name" => __( "Floorplans", "newhomeinc" ),
				"singular_name" => __( "Floorplan", "newhomeinc" ),
				"menu_name" => __( "Floorplans", "newhomeinc" ),
				"all_items" => __( "All Floorplans", "newhomeinc" ),
				"add_new" => __( "Add new", "newhomeinc" ),
				"add_new_item" => __( "Add new Floorplan", "newhomeinc" ),
				"edit_item" => __( "Edit Floorplan", "newhomeinc" ),
				"new_item" => __( "New Floorplan", "newhomeinc" ),
				"view_item" => __( "View Floorplan", "newhomeinc" ),
				"view_items" => __( "View Floorplans", "newhomeinc" ),
				"search_items" => __( "Search Floorplans", "newhomeinc" ),
				"not_found" => __( "No Floorplans found", "newhomeinc" ),
				"not_found_in_trash" => __( "No Floorplans found in trash", "newhomeinc" ),
				"parent" => __( "Parent Floorplan:", "newhomeinc" ),
				"featured_image" => __( "Featured image for this Floorplan", "newhomeinc" ),
				"set_featured_image" => __( "Set featured image for this Floorplan", "newhomeinc" ),
				"remove_featured_image" => __( "Remove featured image for this Floorplan", "newhomeinc" ),
				"use_featured_image" => __( "Use as featured image for this Floorplan", "newhomeinc" ),
				"archives" => __( "Floorplan archives", "newhomeinc" ),
				"insert_into_item" => __( "Insert into Floorplan", "newhomeinc" ),
				"uploaded_to_this_item" => __( "Upload to this Floorplan", "newhomeinc" ),
				"filter_items_list" => __( "Filter Floorplans list", "newhomeinc" ),
				"items_list_navigation" => __( "Floorplans list navigation", "newhomeinc" ),
				"items_list" => __( "Floorplans list", "newhomeinc" ),
				"attributes" => __( "Floorplans attributes", "newhomeinc" ),
				"name_admin_bar" => __( "Floorplan", "newhomeinc" ),
				"item_published" => __( "Floorplan published", "newhomeinc" ),
				"item_published_privately" => __( "Floorplan published privately.", "newhomeinc" ),
				"item_reverted_to_draft" => __( "Floorplan reverted to draft.", "newhomeinc" ),
				"item_scheduled" => __( "Floorplan scheduled", "newhomeinc" ),
				"item_updated" => __( "Floorplan updated.", "newhomeinc" ),
				"parent_item_colon" => __( "Parent Floorplan:", "newhomeinc" ),
			];

			$args = [
				"label" => __( "Floorplans", "newhomeinc" ),
				"labels" => $labels,
				"description" => "",
				"public" => true,
				"publicly_queryable" => true,
				"show_ui" => true,
				"show_in_rest" => true,
				"rest_base" => "",
				"rest_controller_class" => "WP_REST_Posts_Controller",
				"has_archive" => true,
				"show_in_menu" => true,
				"show_in_nav_menus" => true,
				"delete_with_user" => false,
				"exclude_from_search" => false,
				"capability_type" => "post",
				"map_meta_cap" => true,
				"hierarchical" => false,
				"rewrite" => [ "slug" => "floorplan", "with_front" => false ],
				"query_var" => true,
				"menu_position" => 11,
				"menu_icon" => "dashicons-text",
				"supports" => [ "title", "revisions", "author" ],
				"taxonomies" => [ "features", "floorplan-category" ],
				"show_in_graphql" => false,
			];

			register_post_type( "floorplan", $args );

		register_taxonomy( 'floorplan-category', array( 'floorplan' ),
			array(
				'labels' => array(
					'name' => 'Floorplan Location',
					'menu_name' => 'Floorplan Location',
					'singular_name' => 'Floorplan Location',
					'all_items' => 'All Floorplan Locations'
				),
				'public' => true,
				'hierarchical' => true,
				'meta_box_cb'  => false,
				'show_admin_column' => true,
				'query_var' => true,
				'show_ui' => true,
				'rewrite' => array( 'slug' => 'floorplan-category', 'hierarchical' => true, 'with_front' => false ),
			)
		);
	}

	public static function create_designPlans(){
		/**
		 * Post Type: Home Designs.
		 */
		$labels = [
			"name" => __( "Home Designs", "newhomeinc" ),
			"singular_name" => __( "Home Design", "newhomeinc" ),
			"menu_name" => __( "Home Designs", "newhomeinc" ),
			"all_items" => __( "All Home Designs", "newhomeinc" ),
			"add_new" => __( "Add new", "newhomeinc" ),
			"add_new_item" => __( "Add new Home Design", "newhomeinc" ),
			"edit_item" => __( "Edit Home Design", "newhomeinc" ),
			"new_item" => __( "New Home Design", "newhomeinc" ),
			"view_item" => __( "View Home Design", "newhomeinc" ),
			"view_items" => __( "View Home Designs", "newhomeinc" ),
			"search_items" => __( "Search Home Designs", "newhomeinc" ),
			"not_found" => __( "No Home Designs found", "newhomeinc" ),
			"not_found_in_trash" => __( "No Home Designs found in trash", "newhomeinc" ),
			"parent" => __( "Parent Home Design:", "newhomeinc" ),
			"featured_image" => __( "Featured image for this Home Design", "newhomeinc" ),
			"set_featured_image" => __( "Set featured image for this Home Design", "newhomeinc" ),
			"remove_featured_image" => __( "Remove featured image for this Home Design", "newhomeinc" ),
			"use_featured_image" => __( "Use as featured image for this Home Design", "newhomeinc" ),
			"archives" => __( "Home Design archives", "newhomeinc" ),
			"insert_into_item" => __( "Insert into home design", "newhomeinc" ),
			"uploaded_to_this_item" => __( "Upload to this Home Design", "newhomeinc" ),
			"filter_items_list" => __( "Filter Home Designs list", "newhomeinc" ),
			"items_list_navigation" => __( "Home Designs list navigation", "newhomeinc" ),
			"items_list" => __( "Home Designs list", "newhomeinc" ),
			"attributes" => __( "Home Designs attributes", "newhomeinc" ),
			"name_admin_bar" => __( "Home Design", "newhomeinc" ),
			"item_published" => __( "Home Design published", "newhomeinc" ),
			"item_published_privately" => __( "Home Design published privately.", "newhomeinc" ),
			"item_reverted_to_draft" => __( "Home Design reverted to draft.", "newhomeinc" ),
			"item_scheduled" => __( "Home Design scheduled", "newhomeinc" ),
			"item_updated" => __( "Home Design updated.", "newhomeinc" ),
			"parent_item_colon" => __( "Parent Home Design:", "newhomeinc" ),
		];

		$args = [
			"label" => __( "Home Designs", "newhomeinc" ),
			"labels" => $labels,
			"description" => "",
			"public" => true,
			"publicly_queryable" => true,
			"show_ui" => true,
			"show_in_rest" => true,
			"rest_base" => "",
			"rest_controller_class" => "WP_REST_Posts_Controller",
			"has_archive" => true,
			"show_in_menu" => true,
			"show_in_nav_menus" => true,
			"delete_with_user" => false,
			"exclude_from_search" => false,
			"capability_type" => "post",
			"map_meta_cap" => true,
			"hierarchical" => false,
			"rewrite" => [ "slug" => "home-design", "with_front" => true ],
			"query_var" => true,
			"menu_position" => 13,
			"menu_icon" => "dashicons-art",
			"supports" => [ "title", "revisions", "author" ],
			"taxonomies" => [ "features" ],
			"show_in_graphql" => false,
		];
		register_post_type( "home-design", $args );
	}

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
			"archives" => __( "homes archives", "newhomeinc" ),
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

	public static function create_agent(){
		$labels = [
			'name' => __('Agents', 'texdomain'),
			'menu_name' => __('Sales Agent', 'textdomain'),
			'singular_name' => 'Agent',
			'all_items' => 'All Agents',
			"add_new" => __( "Add New", "textdomains" ),
			"add_new_item" => __( "Add New Agent", "textdomains" ),
			"edit_item" => __( "Edit Agent", "textdomains" ),
			"new_item" => __( "New Agent", "textdomains" ),
			"view_item" => __( "View Agent", "textdomains" ),
			"view_items" => __( "View Agent", "textdomains" ),
			"search_items" => __( "Search Agent", "textdomains" ),
			"not_found" => __( "No Agent Found", "textdomains" ),
			"not_found_in_trash" => __( "No Agent Found in Trash", "textdomains" ),
			"parent" => __( "Parent Agent", "textdomains" ),
			"featured_image" => __( "Featured Image for this Agent", "textdomains" ),
			"set_featured_image" => __( "Set Featured Image for this Agent", "textdomains" ),
			"remove_featured_image" => __( "Remove Featured Image for this Agent", "textdomains" ),
			"use_featured_image" => __( "Use Featured Image for this Agent", "textdomains" ),
			"parent_item_colon" => __( "Parent Agent", "textdomains" ),
		];
		$args = [
			"label" => __( "Agents", "textdomains" ),
			"labels" => $labels,
			"description" => "This component displays a list of communities",
			"public" => false,
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
			'rewrite' => array( 'slug' => 'agent', 'hierarchical' => false, 'with_front' => false ),
			"query_var" => true,
			"menu_position" => 14,
			"menu_icon" => "dashicons-admin-users",
			"supports" => [ "title", "revisions" ],
		];
		register_post_type( "agents", $args );
	}

}