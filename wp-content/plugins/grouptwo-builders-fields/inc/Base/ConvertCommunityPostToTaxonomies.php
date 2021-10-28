<?php
/**
 * @package g2builderdfields
 */

namespace Inc\Base;

use Inc\Base\BaseController;

class ConvertCommunityPostToTaxonomies extends BaseController{
	public function register() {
		add_action('save_post', array($this, 'CopyCommunityToFloorplan'));
		add_action('save_post', array($this, 'update_qmi_custom_terms'));
	}

	public function CopyCommunityToFloorplan($post_id){

		// only update terms if it's a post-type-B post
		if ( 'communities' != get_post_type($post_id)) {
			return;
		}

		// don't create or update terms for system generated posts
		if (get_post_status($post_id) == 'auto-draft') {
			return;
		}

		/*
		* Grab the post title and slug to use as the new
		* or updated term name and slug
		*/
		$term_title = get_the_title($post_id);
		$term_slug = get_post( $post_id )->post_name;

		/*
		* Check if a corresponding term already exists by comparing
		* the post ID to all existing term descriptions.
		*/
		$existing_terms = get_terms('floorplan-category', array(
				'hide_empty' => false
			)
		);

		foreach($existing_terms as $term) {
			$related_post_id = get_term_meta($term->term_id, 'related_post_id', true);
			if ($related_post_id == $post_id) {
				//term already exists, so update it and we're done
				wp_update_term($term->term_id, 'floorplan-category', array(
						'name' => $term_title,
						'slug' => $term_slug
					)
				);
				return;
			}
		}

		wp_insert_term($term_title, 'floorplan-category', array(
			'slug' => $term_slug,
		) );

		$new_term = get_term_by('slug', $term_slug, 'floorplan-category');
		if ( $new_term ) {
			update_term_meta($new_term->term_id, 'related_post_id', $post_id);
		}
	}

	public function update_qmi_custom_terms($post_id) {

		// only update terms if it's a post-type-B post
		if ( 'communities' != get_post_type($post_id)) {
			return;
		}

		// don't create or update terms for system generated posts
		if (get_post_status($post_id) == 'auto-draft') {
			return;
		}

		/*
		* Grab the post title and slug to use as the new
		* or updated term name and slug
		*/
		$term_title = get_the_title($post_id);
		$term_slug = get_post( $post_id )->post_name;

		/*
		* Check if a corresponding term already exists by comparing
		* the post ID to all existing term descriptions.
		*/
		$existing_terms = get_terms('home-category', array(
				'hide_empty' => false
			)
		);

		foreach($existing_terms as $term) {
			$related_post_id = get_term_meta($term->term_id, 'related_post_id', true);
			if ($related_post_id == $post_id) {
				//term already exists, so update it and we're done
				wp_update_term($term->term_id, 'home-category', array(
						'name' => $term_title,
						'slug' => $term_slug
					)
				);
				return;
			}
		}
		/*
		* If we didn't find a match above, this is a new post,
		* so create a new term.
		*/
			wp_insert_term($term_title, 'home-category', array(
				'slug' => $term_slug,
			) );


		/*
        * Add term meta to new term
        */
		$new_term = get_term_by('slug', $term_slug, 'home-category');
		if ( $new_term ) {
			update_term_meta($new_term->term_id, 'related_post_id', $post_id);
		}

	}
}