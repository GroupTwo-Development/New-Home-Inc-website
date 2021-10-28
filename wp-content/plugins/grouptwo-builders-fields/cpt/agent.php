<?php
/**
 * @package g2builderdfields
 */

class agent {
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
			'rewrite' => array( 'slug' => 'agent', 'hierarchical' => false, 'with_front' => false ),
			"query_var" => true,
			"menu_position" => 14,
			"menu_icon" => "dashicons-admin-users",
			"supports" => [ "title", "revisions" ],
//			"taxonomies" => [ "metro-area" ],
		];
		register_post_type( "agents", $args );
	}
}

$updateAgent = new agent();
$updateAgent->create_agent();