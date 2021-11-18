<?php
/**
 * @package g2builderdfields
 */

class autoGenerateUniqueId{
	public function AutoGenerateId(){
		$this->community_setup_id_incr();
		$this->floorplan_setup_id_incr();
		$this->homes_setup_id_incr();
		$this->home_design_setup_id_incr();
	}

	public function community_setup_id_incr(){
		add_action('init', 'get_field');
		// Check if user has rights to set it up and ACF is enabled.
		if (function_exists( 'get_field' ) ):

			// Initial value
			// === YOU NEED TO UPDATE HERE ===
			// Replace <code>custom_invoice_id</code> with your desired id name.
			add_option( 'community_unique_id', '2292', '', 'yes' );

			/**
			 * Wrapper to get the id (if i would need to add something to it)
			 * @return mixed|void – stored next available id
			 */
			function community_get_current_unique_id() {
				return get_option( 'community_unique_id' );
			}

			/**
			 * Count up the id by one and update the globally stored id
			 */
			function community_increase_unique_id() {
				$curr_invoice_id = get_option( 'community_unique_id');
				$next_invoice_id = intval( $curr_invoice_id ) + 1;
				update_option( 'community_unique_id', $next_invoice_id );
			}

			/**
			 * Populate the acf field when loading it.
			 */
			function community_auto_get_current_unique_id( $value, $post_id, $field ) {
				// If the custom field already has a value in it, just return this one (we don't want to overwrite it every single time)
				if ( $value !== null && $value !== "" ) {
					return $value;
				}

				// If the field is empty, get the currently stored next available id and fill it in the field.
				$value = community_get_current_unique_id();
				return $value;
			}

			// Use ACF hooks to populate the field on load
			// ==== YOU NEED TO UPDATE HERE ====
			// Replace <code>invoice_id</code> with the name of your field.
			add_filter( 'acf/load_value/name=subdivisionnumber_id', 'community_auto_get_current_unique_id', 10, 3 );

			/**
			 * Registers function to check if the globally stored id needs to be updated after a post is saved.
			 */
			function community_acf_save_post( $post_id ) {
				// Check if the post had any ACF to begin with.
				if ( ! isset( $_POST['acf'] ) ) {
					return;
				}

				$fields = $_POST['acf'];

				// Only move to the next id when any ACF fields were added to that post, otherwise this might be an accident and would skip an id.
				if ( $_POST['_acf_changed'] == 0 ) {
					return;
				}

				// Next we need to find the field out id is stored in
				foreach ( $fields as $field_key => $value ) {
					$field_object = get_field_object( $field_key );

					/**
					 * If we found our field and the value of that field is the same as our currently "next available id" –
					 * we need to increase this id, so the next post doesn't use the same id.
					 */
					if ( $field_object['name'] == "subdivisionnumber_id"
					     && community_get_current_unique_id() == $value ) {
						community_increase_unique_id();

						return;
					}
				}
			}

			// Use a hook to run this function every time a post is saved.
			add_action( 'acf/save_post', 'community_acf_save_post', 20 );

			/**
			 * The code below just displays the currently stored next id on an acf-options-page,
			 * so it's easy to see which id you're on. The field is disabled to prevent easy tinkering with the id.
			 */
			function community_load_current_document_ids_settingspage( $value, $postid, $field ) {
				if ( $field['name'] == "subdivisionnumber_id" ) {
					return community_get_current_unique_id();
				}

				return $value;
			}

			function community_disable_acf_field( $field ) {
				$field['readonly'] = true;

				return $field;
			}


			add_filter( 'acf/load_value/name=community_unique_id', 'community_load_current_document_ids_settingspage', 10, 3 );
			add_filter( 'acf/load_field/name=subdivisionnumber_id', 'community_disable_acf_field', 10, 3 );



		endif;
	}

	public function floorplan_setup_id_incr(){
		add_action('init', 'get_field');
		// Check if user has rights to set it up and ACF is enabled.
		if (function_exists( 'get_field' ) ):

			// Initial value
			// === YOU NEED TO UPDATE HERE ===
			// Replace <code>custom_invoice_id</code> with your desired id name.
			add_option( 'floorplan_unique_id', '40092', '', 'yes' );

			/**
			 * Wrapper to get the id (if i would need to add something to it)
			 * @return mixed|void – stored next available id
			 */
			function floorplan_get_current_unique_id() {
				return get_option( 'floorplan_unique_id' );
			}

			/**
			 * Count up the id by one and update the globally stored id
			 */
			function floorplan_increase_unique_id() {
				$curr_invoice_id = get_option( 'floorplan_unique_id');
				$next_invoice_id = intval( $curr_invoice_id ) + 1;
				update_option( 'floorplan_unique_id', $next_invoice_id );
			}

			/**
			 * Populate the acf field when loading it.
			 */
			function floorplan_auto_get_current_unique_id( $value, $post_id, $field ) {
				// If the custom field already has a value in it, just return this one (we don't want to overwrite it every single time)
				if ( $value !== null && $value !== "" ) {
					return $value;
				}

				// If the field is empty, get the currently stored next available id and fill it in the field.
				$value = floorplan_get_current_unique_id();
				return $value;
			}

			// Use ACF hooks to populate the field on load
			// ==== YOU NEED TO UPDATE HERE ====
			// Replace <code>invoice_id</code> with the name of your field.
			add_filter( 'acf/load_value/name=plan_number', 'floorplan_auto_get_current_unique_id', 10, 3 );

			/**
			 * Registers function to check if the globally stored id needs to be updated after a post is saved.
			 */
			function floorplan_acf_save_post( $post_id ) {
				// Check if the post had any ACF to begin with.
				if ( ! isset( $_POST['acf'] ) ) {
					return;
				}

				$fields = $_POST['acf'];

				// Only move to the next id when any ACF fields were added to that post, otherwise this might be an accident and would skip an id.
				if ( $_POST['_acf_changed'] == 0 ) {
					return;
				}

				// Next we need to find the field out id is stored in
				foreach ( $fields as $field_key => $value ) {
					$field_object = get_field_object( $field_key );

					/**
					 * If we found our field and the value of that field is the same as our currently "next available id" –
					 * we need to increase this id, so the next post doesn't use the same id.
					 */
					if ( $field_object['name'] == "plan_number"
					     && floorplan_get_current_unique_id() == $value ) {
						floorplan_increase_unique_id();

						return;
					}
				}
			}

			// Use a hook to run this function every time a post is saved.
			add_action( 'acf/save_post', 'floorplan_acf_save_post', 20 );

			/**
			 * The code below just displays the currently stored next id on an acf-options-page,
			 * so it's easy to see which id you're on. The field is disabled to prevent easy tinkering with the id.
			 */
			function floorplan_load_current_document_ids_settingspage( $value, $postid, $field ) {
				if ( $field['name'] == "plan_number" ) {
					return floorplan_get_current_unique_id();
				}
				return $value;
			}

			function floorplan_disable_acf_field( $field ) {
				$field['readonly'] = true;

				return $field;
			}
//
//		add_filter('acf/load_field/name=subdivisionnumber_id', 'wfp_disable_acf_field');
			add_filter( 'acf/load_value/name=floorplan_unique_id', 'floorplan_load_current_document_ids_settingspage', 10, 3 );
			add_filter( 'acf/load_field/name=plan_number', 'floorplan_disable_acf_field', 10, 3 );


		endif;
	}

	public function homes_setup_id_incr(){
		add_action('init', 'get_field');
		// Check if user has rights to set it up and ACF is enabled.
		if (function_exists( 'get_field' ) ):

			// Initial value
			// === YOU NEED TO UPDATE HERE ===
			// Replace <code>custom_invoice_id</code> with your desired id name.
			add_option( 'homes_unique_id', '50092', '', 'yes' );

			/**
			 * Wrapper to get the id (if i would need to add something to it)
			 * @return mixed|void – stored next available id
			 */
			function homes_get_current_unique_id() {
				return get_option( 'homes_unique_id' );
			}

			/**
			 * Count up the id by one and update the globally stored id
			 */
			function homes_increase_unique_id() {
				$curr_invoice_id = get_option( 'homes_unique_id');
				$next_invoice_id = intval( $curr_invoice_id ) + 1;
				update_option( 'homes_unique_id', $next_invoice_id );
			}

			/**
			 * Populate the acf field when loading it.
			 */
			function homes_auto_get_current_unique_id( $value, $post_id, $field ) {
				// If the custom field already has a value in it, just return this one (we don't want to overwrite it every single time)
				if ( $value !== null && $value !== "" ) {
					return $value;
				}

				// If the field is empty, get the currently stored next available id and fill it in the field.
				$value = homes_get_current_unique_id();
				return $value;
			}

			// Use ACF hooks to populate the field on load
			// ==== YOU NEED TO UPDATE HERE ====
			// Replace <code>invoice_id</code> with the name of your field.
			add_filter( 'acf/load_value/name=spec_number_id', 'homes_auto_get_current_unique_id', 10, 3 );

			/**
			 * Registers function to check if the globally stored id needs to be updated after a post is saved.
			 */
			function homes_acf_save_post( $post_id ) {
				// Check if the post had any ACF to begin with.
				if ( ! isset( $_POST['acf'] ) ) {
					return;
				}

				$fields = $_POST['acf'];

				// Only move to the next id when any ACF fields were added to that post, otherwise this might be an accident and would skip an id.
				if ( $_POST['_acf_changed'] == 0 ) {
					return;
				}

				// Next we need to find the field out id is stored in
				foreach ( $fields as $field_key => $value ) {
					$field_object = get_field_object( $field_key );

					/**
					 * If we found our field and the value of that field is the same as our currently "next available id" –
					 * we need to increase this id, so the next post doesn't use the same id.
					 */
					if ( $field_object['name'] == "spec_number_id"
					     && homes_get_current_unique_id() == $value ) {
						homes_increase_unique_id();

						return;
					}
				}
			}

			// Use a hook to run this function every time a post is saved.
			add_action( 'acf/save_post', 'homes_acf_save_post', 20 );

			/**
			 * The code below just displays the currently stored next id on an acf-options-page,
			 * so it's easy to see which id you're on. The field is disabled to prevent easy tinkering with the id.
			 */
			function homes_load_current_document_ids_settingspage( $value, $postid, $field ) {
				if ( $field['name'] == "spec_number_id" ) {
					return homes_get_current_unique_id();
				}
				return $value;
			}

			function homes_disable_acf_field( $field ) {
				$field['readonly'] = true;

				return $field;
			}

			add_filter( 'acf/load_value/name=spec_number_id', 'homes_load_current_document_ids_settingspage', 10, 3 );
			add_filter( 'acf/load_field/name=spec_number_id', 'homes_disable_acf_field', 10, 3 );
		endif;
	}

	public function home_design_setup_id_incr(){
		add_action('init', 'get_field');
		// Check if user has rights to set it up and ACF is enabled.
		if (function_exists( 'get_field' ) ):

			// Initial value
			// === YOU NEED TO UPDATE HERE ===
			// Replace <code>custom_invoice_id</code> with your desired id name.
			add_option( 'home_design_unique_id', '60092', '', 'yes' );

			/**
			 * Wrapper to get the id (if i would need to add something to it)
			 * @return mixed|void – stored next available id
			 */
			function home_design_get_current_unique_id() {
				return get_option( 'home_design_unique_id' );
			}

			/**
			 * Count up the id by one and update the globally stored id
			 */
			function home_design_increase_unique_id() {
				$curr_invoice_id = get_option( 'home_design_unique_id');
				$next_invoice_id = intval( $curr_invoice_id ) + 1;
				update_option( 'home_design_unique_id', $next_invoice_id );
			}

			/**
			 * Populate the acf field when loading it.
			 */
			function home_design_auto_get_current_unique_id( $value, $post_id, $field ) {
				// If the custom field already has a value in it, just return this one (we don't want to overwrite it every single time)
				if ( $value !== null && $value !== "" ) {
					return $value;
				}

				// If the field is empty, get the currently stored next available id and fill it in the field.
				$value = home_design_get_current_unique_id();
				return $value;
			}

			// Use ACF hooks to populate the field on load
			// ==== YOU NEED TO UPDATE HERE ====
			// Replace <code>invoice_id</code> with the name of your field.
			add_filter( 'acf/load_value/name=home_design_number_id', 'home_design_auto_get_current_unique_id', 10, 3 );

			/**
			 * Registers function to check if the globally stored id needs to be updated after a post is saved.
			 */
			function home_design_acf_save_post( $post_id ) {
				// Check if the post had any ACF to begin with.
				if ( ! isset( $_POST['acf'] ) ) {
					return;
				}

				$fields = $_POST['acf'];

				// Only move to the next id when any ACF fields were added to that post, otherwise this might be an accident and would skip an id.
				if ( $_POST['_acf_changed'] == 0 ) {
					return;
				}

				// Next we need to find the field out id is stored in
				foreach ( $fields as $field_key => $value ) {
					$field_object = get_field_object( $field_key );

					/**
					 * If we found our field and the value of that field is the same as our currently "next available id" –
					 * we need to increase this id, so the next post doesn't us  e the same id.
					 */
					if ( $field_object['name'] == "home_design_number_id"
					     && home_design_get_current_unique_id() == $value ) {
						home_design_increase_unique_id();

						return;
					}
				}
			}

			// Use a hook to run this function every time a post is saved.
			add_action( 'acf/save_post', 'home_design_acf_save_post', 20 );

			/**
			 * The code below just displays the currently stored next id on an acf-options-page,
			 * so it's easy to see which id you're on. The field is disabled to prevent easy tinkering with the id.
			 */
			function home_design_load_current_document_ids_settingspage( $value, $postid, $field ) {
				if ( $field['name'] == "document_ids-group_current_invoice_id" ) {
					return home_design_get_current_unique_id();
				}
				return $value;
			}

			function home_design_disable_acf_field( $field ) {
				$field['readonly'] = true;

				return $field;
			}

			add_filter( 'acf/load_value/name=home_design_unique_id', 'home_design_load_current_document_ids_settingspage', 10, 3 );
			add_filter( 'acf/load_field/name=home_design_number_id', 'home_design_disable_acf_field', 10, 3 );


		endif;
	}


}

$community_generate_new_incremented_id = new autoGenerateUniqueId();
$community_generate_new_incremented_id->AutoGenerateId();