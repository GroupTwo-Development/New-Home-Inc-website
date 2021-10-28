<?php
/**
 * @package g2builderdfields
 */

class plans
{
	public static function create_plans(){
		$labels = [
			'name' => __('Floorplans', 'texdomain'),
			'menu_name' => __('Floorplans', 'textdomain'),
			'singular_name' => 'Floorplan',
			'all_items' => 'All Floorplan',
			"add_new" => __( "Add New", "textdomains" ),
			"add_new_item" => __( "Add New Floorplan", "textdomains" ),
			"edit_item" => __( "Edit Floorplan", "textdomains" ),
			"new_item" => __( "New Floorplan", "textdomains" ),
			"view_item" => __( "View Floorplan", "textdomains" ),
			"view_items" => __( "View Floorplan", "textdomains" ),
			"search_items" => __( "Search Floorplan", "textdomains" ),
			"not_found" => __( "No community Floorplans", "textdomains" ),
			"not_found_in_trash" => __( "No Floorplans Found in Trash", "textdomains" ),
			"parent" => __( "Parent Floorplan", "textdomains" ),
			"featured_image" => __( "Featured Image for this Floorplan", "textdomains" ),
			"set_featured_image" => __( "Set Featured Image for this Floorplans", "textdomains" ),
			"remove_featured_image" => __( "Remove Featured Image for this Floorplan", "textdomains" ),
			"use_featured_image" => __( "Use Featured Image for this Floorplan", "textdomains" ),
			"parent_item_colon" => __( "Parent Floorplan", "textdomains" ),
		];
		$args = [
			"label" => __( "community", "textdomains" ),
			"labels" => $labels,
			"description" => "This component displays a list of community",
			"public" => true,
			"publicly_queryable" => true,
			"show_ui" => true,
			"show_in_rest" => true,
			"rest_base" => "",
			"rest_controller_class" => "WP_REST_Posts_Controller",
			"has_archive" => 'community',
			"show_in_menu" => true,
			"show_in_nav_menus" => true,
			"delete_with_user" => false,
			"exclude_from_search" => false,
			"capability_type" => "post",
			"map_meta_cap" => true,
			"hierarchical" => false,
			'rewrite' => array( 'slug' => 'floorplan-item', 'hierarchical' => true, 'with_front' => false ),
			"query_var" => true,
			"menu_position" => 11,
			"menu_icon" => "dashicons-text",
			"supports" => [ "title", "revisions" ],
			"taxonomies" => [ "floorplan-category" ],
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
//				'meta_box_cb'  => false,
				'show_admin_column' => true,
				'query_var' => true,
				'show_ui' => true,
				'rewrite' => array( 'slug' => 'floorplan-category', 'hierarchical' => true, 'with_front' => false ),
			)
		);
	}


}
$plans = new plans();
$plans->create_plans();




