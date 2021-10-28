<?php
/**
 * @package g2builderdfields
 */

namespace Inc\Base;

use Inc\Base\BaseController;

class customAdminColumnsHomeDesigns extends BaseController{

	public function register() {
		add_filter('manage_home-design_posts_columns', array($this, 'g2_filter_home_design_posts_columns'));
		add_action( 'manage_home-design_posts_custom_column', array($this, 'g2Builder_home_design_column'), 10, 2);

		add_filter( 'manage_edit-home-design_sortable_columns', array($this, 'g2builders_home_design_sortable_columns'));

		add_action( 'pre_get_posts', array($this, 'g2builders_posts_orderby') );
	}

	public static function g2_filter_home_design_posts_columns( $columns ) {

		$columns = array(
			'cb' => $columns['cb'],
			'image' => __( 'Image' ),
			'title' => __( 'Title' ),
			'price' => __( 'Base Price', 'g2Builder' ),
			'base_sqft' => __( 'Base Sqft', 'g2Builder' ),
			'min_max_bedroom' => __( 'Min - Max Beds', 'g2Builder' ),
			'min_max_baths' => __( 'Min - Max Baths', 'g2Builder' ),
			'min_max_garage' => __( 'Min - Max Garage', 'g2Builder' ),
		);
		return $columns;
	}

	function g2Builder_home_design_column($column, $post_id ) {


	global $post;
	$featured_image = get_field('featured_image');
	$featured_image = $featured_image['url'];
	$base_price = get_field('base_price');
	$default_thumbnail_url = $this->plugin_url . 'assets/images/default-thumbnail.png';

	$base_sqft = get_field('base_sqft');

	$min_bedrooms = get_field('min_bedrooms');
	$max_bedrooms = get_field('max_bedrooms');

	$min_baths = get_field('min_baths');
	$max_baths = get_field('max_baths');

	$min_garage = get_field('min_garage');
	$max_garage = get_field('max_garage');


	switch ($column){
		case 'image' :
			$feature_img_list = (empty($featured_image)) ? '<img src="' . $default_thumbnail_url . '" width="50" "height="50" />' : '<img src="' . $featured_image . '" width="50" "height="50" />';
			echo $feature_img_list;
			break;

		case 'price' :
			$base_price_list = (empty($base_price)) ? ' - ' : '$' . number_format($base_price);
			echo $base_price_list;
			break;
		case 'base_sqft' :
			$base_sqft_list = (isset($base_sqft) && empty($base_sqft)) ? ' - ' : number_format($base_sqft);
			echo $base_sqft_list;
			break;

		case 'min_max_bedroom' :
			$min_bedrooms_list = (!isset($min_bedrooms)) ? ' Not Listed ' : $min_bedrooms;
			$max_bedrooms_list = (!isset($max_bedrooms)) ? ' Not Listed ' : $max_bedrooms;
			echo $min_bedrooms_list . ' - ' . $max_bedrooms_list;
			break;

		case 'min_max_baths' :
			$min_baths_list = (isset($min_baths) && empty($min_baths)) ? ' - ' : $min_baths;
			$max_baths_list = (isset($max_baths) && empty($max_baths)) ? ' - ' : $max_baths;
			echo $min_baths_list . ' - ' . $max_baths_list;
			break;

		case 'min_max_garage' :
			$min_garage_list = (!isset($min_garage)) ? ' - ' : $min_garage;
			$max_garage_list = (!isset($max_garage)) ? ' - ' : $max_garage;
			echo $min_garage_list . ' - ' . $max_garage_list;
			break;
	}
}

	function g2builders_home_design_sortable_columns( $columns ) {
		$columns['community'] = 'floorplan-category';
		$columns['price'] = 'base_price';
		$columns['base_sqft'] = 'base_sqft';
		return $columns;
	}

	function g2builders_posts_orderby($query){
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
}
