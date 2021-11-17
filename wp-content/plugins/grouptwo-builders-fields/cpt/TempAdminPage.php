<?php
/**
 * @package g2builderdfields
 */

class TempAdminPage{
	public function register_options_page(){
		$this->builder_option_page();
	}

	public function builder_option_page(){
		add_action('act\init', array($this, 'builder_option_page'));
		if( function_exists('acf_add_options_page') ) {

			// add Parent

			$parent = acf_add_options_page(array(
				'page_title' 	=> __('G2 Builder Fields', 'text-domain'),
				'menu_title'	=> __('G2 Builder Fields', 'text-domain'),
				'menu_slug' 	=> __('builder-field-settings', 'text-domain'),
				'capability'	=> 'edit_posts',
				'icon_url' => 'dashicons-store',
				'post_id' => 'options',
				'autoload' => true,
				'redirect'		=> false
			) );


			$child = acf_add_options_sub_page(array(
				'page_title'  => __('Site Header'),
				'menu_title'  => __('Header'),
				'parent_slug' => $parent['menu_slug'],
			));

			$child = acf_add_options_sub_page(array(
				'page_title'  => __('Site Footer'),
				'menu_title'  => __('Footer'),
				'parent_slug' => $parent['menu_slug'],
			));

			$child = acf_add_options_sub_page(array(
				'page_title'  => __('Zillow Manager'),
				'menu_title'  => __('Zillow'),
				'parent_slug' => $parent['menu_slug'],
			));

		}
	}
}

$optionPage = new TempAdminPage();
$optionPage->register_options_page();