<?php
/**
 * @package g2builderdfields
 */

class subdivision
{
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
}

$community = new subdivision();
$community->create_subdivision();






