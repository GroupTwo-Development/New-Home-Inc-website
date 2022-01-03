<?php
	// Create a custom function for generating banner bg image from image ID
	function get_image_src_from_id($field_name){
		$image_field_data = get_field($field_name);
		$image_src = wp_get_attachment_image_src($image_field_data, 'full');
		return $image_src[0];
	}

	// Create an array and store all home page data
	// check and validate before making function available to the template
	function homepage_banner_data(){
		$homeBanner = array(
			'bannerTitle' => get_field('home_page_banner_title'),
			'bannerSubtitle' => get_field('home_page_banner_subtitle'),
			'bannerCta' => get_field('home_banner_button'),
			'bannerLogoImage' => get_field('banner_logo_image'),
		);

		if(!empty($homeBanner)){
			return $homeBanner;
		}
	}

	function homepage_sectionOne_data(){
		$section_data = array(
			'title' => get_field('home_page_section_one_title'),
			'subtitle' => get_field('home_page_section_one_subtitle'),
			'content' => get_field('home_page_section_one_content'),
			'cta' => get_field('home_page_section_one_cta'),
			'image' => get_field('image_section_one'),
		);

		if(isset($section_data)){
			return$section_data;
		}
	}

	function homepage_get_featured_post_types($post_type, $meta_key, $post_per_page){
		$args = array(
			'post_type' => $post_type,
			'post_status'   => 'publish',
			'post_per_page' => $post_type,
			'orderby'   => 'title',
			'order'  => 'ASC',
			'meta_query' => array(
				array(
					'key'   => $meta_key,
					 'value'    => '1'
				)
			)
		);
		return get_posts($args);
	}


	function get_featured_homes_spec(){
		$homes_spec = array(
			'bedrooms' => get_field('spec_bedrooms'),
			'baths' => get_field('spec_baths'),
			'half_bath' => get_field('spec_half_baths'),
			'sqft' => get_field('spec_sqft'),
			'garage' => get_field('spec_garage'),
			'price' => get_field('spec_price'),
			'spec_city' => get_field('spec_city'),
			'spec_state' => get_field('spec_state'),
			'spec_zip' => get_field('spec_zip'),
			'announcement' => get_field('announcement'),
			'featured_image' => get_field('featured_image'),


		);
		return $homes_spec;
	}


function get_home_design_spec(): array {
	$home_design_spec = array(
		'min_bedroom' => get_field('min_bedrooms'),
		'max_bedrooms' => get_field('max_bedrooms'),
		'min_baths' => get_field('min_baths'),
		'max_baths' => get_field('max_baths'),
		'half_bath' => get_field('half_baths'),
		'sqft' => get_field('base_sqft'),
		'price' => get_field('base_price'),

		'spec_city' => get_field('spec_city'),
		'spec_state' => get_field('spec_state'),
		'spec_zip' => get_field('spec_zip'),
		'announcement' => get_field('announcement'),
		'featured_image' => get_field('featured_image'),

	);
	return $home_design_spec;
}

function get_floorplan_location_spec(){
	$floorplan_location_spec = array(
		'min_bedroom' => get_field('min_bedrooms'),
		'max_bedrooms' => get_field('max_bedrooms'),
		'min_baths' => get_field('min_baths'),
		'max_baths' => get_field('max_baths'),
		'half_bath' => get_field('half_baths'),
		'sqft' => get_field('base_sqft'),
		'price' => get_field('base_price'),

		'spec_city' => get_field('spec_city'),
		'spec_state' => get_field('spec_state'),
		'spec_zip' => get_field('spec_zip'),
		'announcement' => get_field('announcement'),
		'featured_image' => get_field('featured_image'),

	);
	return $floorplan_location_spec;
}
