<?php
/**
 * @package g2builderdfields
 */

namespace Inc\Base;

use Inc\Base\BaseController;

class customAdminColumnsHomes extends BaseController{

	public function register() {
		add_filter('manage_homes_posts_columns', array($this, 'g2_filter_homes_posts_columns'));
		add_action( 'manage_homes_posts_custom_column', array($this, 'g2Builder_homes_column'), 10, 2);

		add_filter( 'manage_edit-homes_sortable_columns', array($this, 'g2builders_homes_sortable_columns'));

		add_action( 'pre_get_posts', array($this, 'g2builders_posts_orderby') );

		add_action( 'restrict_manage_posts', array($this, 'filter_homes_by_taxonomies'), 10, 2);

	}

	public static function g2_filter_homes_posts_columns( $columns ) {

		$columns = array(
			'cb' => $columns['cb'],
			'image' => __( 'Image' ),
			'title' => __( 'Title' ),
			'community' => __( 'Community', 'g2Builder' ),
			'price' => __( 'Base Price', 'g2Builder' ),
			'base_sqft' => __( 'Base Sqft', 'g2Builder' ),
			'bedroom' => __( 'Bedrooms', 'g2Builder' ),
			'bathroom' => __( 'Bathrooms', 'g2Builder' ),
			'garage' => __( 'Garage', 'g2Builder' ),
			'model_home' => __( 'Model Home', 'g2Builder' ),
		);
		return $columns;
	}

	public function g2Builder_homes_column($column, $post_id ) {


	global $post;
	$featured_image = get_field('featured_image');
	$featured_image = $featured_image['url'];
	$base_price = get_field('spec_price');
	$default_thumbnail_url = $this->plugin_url . 'assets/images/default-thumbnail.png';

	$base_sqft = get_field('spec_sqft');

	$spec_bedrooms = get_field('spec_bedrooms');

	$spec_baths = get_field('spec_baths');

	$spec_garage = get_field('spec_garage');

	$is_this_a_model = get_field('is_this_a_model');



	switch ($column){
		case 'image' :
			$feature_img_list = (empty($featured_image)) ? '<img src="' . $default_thumbnail_url . '" width="50" "height="50" />' : '<img src="' . $featured_image . '" width="50" "height="50" />';
			echo $feature_img_list;
			break;

		case 'price' :
			$base_price_list = (empty($base_price)) ? ' - ' : '$' . number_format($base_price);
			echo $base_price_list;
			break;

		case 'community' :
			$community = get_the_term_list( $post_id, 'home-category', '', ',', '', true );
			$community_terms = strip_tags($community);
			$community_list = (empty($community)) ? 'Community Not Available' : $community_terms;
			echo $community_list;
			break;
		case 'base_sqft' :
			$base_sqft_list = (isset($base_sqft) && empty($base_sqft)) ? ' - ' : number_format($base_sqft);
			echo $base_sqft_list;
			break;

		case 'bedroom' :
			$bedrooms_list = (isset($spec_bedrooms) && empty($spec_bedrooms)) ? ' - ' : $spec_bedrooms;
			echo $bedrooms_list;
			break;

		case 'bathroom' :
			$baths_list = (isset($spec_baths) && empty($spec_baths)) ? ' - ' : $spec_baths;
			echo $baths_list;
			break;

		case 'garage' :
			$garage_list = (isset($spec_garage) && empty($spec_garage)) ? ' - ' : $spec_garage;
			echo $garage_list;
			break;

		case 'model_home' :
			$model_home_list = ($is_this_a_model != '1') ? ' - ' : 'Model Home';
			echo $model_home_list;
			break;
	}
}

	public static function g2builders_homes_sortable_columns( $columns ) {
		$columns['community'] = 'home-category';
		$columns['price'] = 'base_price';
		$columns['base_sqft'] = 'base_sqft';
		$columns['bedroom'] = 'bedroom';
		$columns['bathroom'] = 'bathroom';
		$columns['garage'] = 'garage';
		return $columns;
	}

	public static function g2builders_posts_orderby($query){
		if(!is_admin() || ! $query->is_main_query()){
			return;
		}

		if ( 'price' === $query->get( 'orderby') ) {
			$query->set( 'orderby', 'meta_value' );
			$query->set( 'meta_key', 'spec_price' );
			$query->set( 'meta_type', 'numeric' );
			$query->set( 'meta_order', 'DESC' );
		}
		if ( 'base_sqft' === $query->get( 'orderby') ) {
			$query->set( 'orderby', 'meta_value' );
			$query->set( 'meta_key', 'spec_sqft' );
			$query->set( 'meta_type', 'numeric' );
			$query->set( 'meta_order', 'DESC' );
		}

		if ( 'bedroom' === $query->get( 'orderby') ) {
			$query->set( 'orderby', 'meta_value' );
			$query->set( 'meta_key', 'spec_bedrooms' );
			$query->set( 'meta_type', 'numeric' );
			$query->set( 'meta_order', 'DESC' );
		}

		if ( 'bathroom' === $query->get( 'orderby') ) {
			$query->set( 'orderby', 'meta_value' );
			$query->set( 'meta_key', 'spec_baths' );
			$query->set( 'meta_type', 'numeric' );
			$query->set( 'meta_order', 'DESC' );
		}
		if ( 'garage' === $query->get( 'orderby') ) {
			$query->set( 'orderby', 'meta_value' );
			$query->set( 'meta_key', 'spec_garage' );
			$query->set( 'meta_type', 'numeric' );
			$query->set( 'meta_order', 'DESC' );
		}
	}

	public static function filter_homes_by_taxonomies( $post_type, $which ) {

		// Apply this only on a specific post type
		if ( 'homes' !== $post_type )
			return;

		// A list of taxonomy slugs to filter by
		$taxonomies = array( 'home-category' );

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
