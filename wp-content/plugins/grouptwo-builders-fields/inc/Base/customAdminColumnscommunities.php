<?php
/**
 * @package g2builderdfields
 */

namespace Inc\Base;

use Inc\Base\BaseController;

class customAdminColumnsCommunities extends BaseController{

	public function register() {
		add_filter('manage_communities_posts_columns', array($this, 'g2_filter_communities_posts_columns'));
		add_action( 'manage_communities_posts_custom_column', array($this, 'g2Builder_communities_column'), 10, 2);
		add_action( 'restrict_manage_posts', array($this, 'filter_communities_by_taxonomies'), 10, 2);
	}

	public static function g2_filter_communities_posts_columns( $columns ) {

		$columns = array(
			'cb' => $columns['cb'],
			'image' => __( 'Image' ),
			'title' => __( 'Title' ),
			'metro_area' => __( 'Metro Areas', 'g2Builder' ),
			'floorplan' => __( 'FloorPlans', 'g2Builder' ),
			'qmi' => __( 'Available Homes', 'g2Builder' ),
		);
		return $columns;
	}

	public function g2Builder_communities_column($column, $post_id ) {

		$featured_image_community = get_field('featured_image');
		$featured_image_community = $featured_image_community['url'];
		$base_price = get_field('base_price');
		$default_thumbnail_url = $this->plugin_url . 'assets/images/default-thumbnail.png';

		$community_floorplans = get_field('community_floorplans');

		$community_homes = get_field('community_homes');



		switch ($column){
			case 'image' :
				$feature_img_list = (empty($featured_image_community)) ? '<img src="' . $default_thumbnail_url . '" width="50" "height="50" />' : '<img src="' . $featured_image_community . '" width="50" "height="50" />';
				echo $feature_img_list;
				break;

			case 'price' :
				$base_price_list = (empty($base_price)) ? ' - ' : '$' . number_format($base_price);
				echo $base_price_list;
				break;

			case 'metro_area' :
				$community = get_the_term_list( $post_id, 'metro-area', '', '->', '', true );
				$community_terms = strip_tags($community);
				$community_list = (empty($community)) ? 'Community Not Available' : $community_terms;
				echo $community_list;
				break;

			case 'floorplan' :
				if($community_floorplans) :
					foreach ($community_floorplans as $single_floorplan) :

						$permalink = get_permalink( $single_floorplan->ID );
						$link = get_edit_post_link($single_floorplan->ID, $context='display');
						$title = get_the_title($single_floorplan->ID);
						$single_floorplan_list = esc_attr($title. ', ');
						echo '<strong><a href="'.$link.'">'. $single_floorplan_list .'</a></strong>';
					endforeach;
				endif;
				break;

			case 'qmi' :
				if($community_homes) :
					foreach ($community_homes as $single_homes) :
						$permalink = get_permalink( $single_homes->ID );
						$link = get_edit_post_link($single_homes->ID, $context='display');
						$title = get_the_title($single_homes->ID);
						$single_homes_list = esc_attr($title. ', ');
						echo '<strong><a href="'.$link.'">'. $single_homes_list .'</a></strong>';
					endforeach;
				endif;
				break;

		}
}

	public function g2builders_floorplan_sortable_columns( $columns ) {
		$columns['community'] = 'floorplan-category';
		$columns['price'] = 'base_price';
		$columns['base_sqft'] = 'base_sqft';
		return $columns;
	}

	public static function g2builders_posts_orderby($query){
		if(!is_admin() || ! $query->is_main_query()){
			return;
		}

		if ( 'price' === $query->get( 'orderby') ) {
			$query->set( 'orderby', 'meta_value' );
			$query->set( 'meta_key', 'base_price' );
			$query->set( 'meta_type', 'numeric' );
			$query->set( 'meta_order', 'DESC' );
		}
		if ( 'base_sqft' === $query->get( 'orderby') ) {
			$query->set( 'orderby', 'meta_value' );
			$query->set( 'meta_key', 'base_sqft' );
			$query->set( 'meta_type', 'numeric' );
			$query->set( 'meta_order', 'DESC' );
		}
	}

	public static function filter_communities_by_taxonomies( $post_type, $which ) {

		// Apply this only on a specific post type
		if ( 'communities' !== $post_type )
			return;

		// A list of taxonomy slugs to filter by
		$taxonomies = array( 'metro-area' );

		foreach ( $taxonomies as $taxonomy_slug ) {

			// Retrieve taxonomy data
			$taxonomy_obj = get_taxonomy( $taxonomy_slug );
			$taxonomy_name = $taxonomy_obj->labels->name;

			// Retrieve taxonomy terms
			$terms = get_terms( $taxonomy_slug );

			// Display filter HTML
			echo "<select name='{$taxonomy_slug}' id='{$taxonomy_slug}' class='postform'>";
			echo '<option value="">' . sprintf( esc_html__( 'Show All %s', 'text_domain' ), $taxonomy_name ) . '</option>';
			foreach ( $terms as $term ) {
				printf(
					'<option value="%1$s" %2$s>%3$s (%4$s)</option>',
					$term->slug,
					( ( isset( $_GET[$taxonomy_slug] ) && ( $_GET[$taxonomy_slug] == $term->slug ) ) ? ' selected="selected"' : '' ),
					$term->name,
					$term->count
				);
			}
			echo '</select>';
		}
	}
}
