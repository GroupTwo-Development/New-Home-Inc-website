<?php

$base_price = get_field('base_price');
if(isset($base_price)){
	$display_average_price = ($base_price) ? '' . esc_html('$') . number_format($base_price):
		'' . '<span class="call-for-pricing">Coming Soon</span>';
}


$min_bedrooms = get_field('min_bedrooms');
$max_bedrooms = get_field('max_bedrooms');
if($min_bedrooms && $max_bedrooms){
	$display_min_beds = ($min_bedrooms) ? '' . $min_bedrooms . esc_html('-') : '';
	$display_max_beds = ($max_bedrooms) ? '' . $max_bedrooms : '';
}

$min_baths = get_field('min_baths');
$max_baths = get_field('max_baths');
$half_baths = get_field('half_baths');
if(!empty($min_baths) && !empty($max_baths) && !empty($half_baths)){
	$display_min_bathrooms = $min_baths;
	$display_max_bathrooms = $max_baths;
	$display_min_baths = ($min_baths) ? '' . $min_baths . esc_html('-') : '';
	$display_max_baths = ($max_baths && $half_baths == 1) ? '' . $max_baths . esc_html('.5') : '';
} elseif (empty($min_baths) && !empty($max_baths) && !empty($half_baths)){
	$display_max_baths = ($max_baths && $half_baths == 1) ? '' . $max_baths . esc_html('.5') : '';
} elseif (!empty($min_baths) && !empty($max_baths) && empty($half_baths)){
	$display_min_baths = ($min_baths) ? '' . $min_baths . esc_html('-') : '';
	$display_max_baths = ($max_baths) ? '' . $max_baths : '';
}

$base_sqft = get_field('base_sqft');
if(!empty($base_sqft)){
	$display_sqft = number_format($base_sqft);

}

$plan_description = get_field('plan_description');

$community_qmi = get_field('community_homes');

$interactive_floorplan_group = get_field('interactive_floorplan');

$floorplan_gallery = $interactive_floorplan_group['interactive_floorplan_gallery'];
$floorplan_url = $interactive_floorplan_group['interactive_floorplan_url'];


$homes_floorplans = get_field('homes_floorplans');

$spec_data = get_featured_homes_spec();

$spec_virtual_tour_group = get_field('virtual_tour');
$spec_virtual_tour_url = $spec_virtual_tour_group['virtualtour_url'];

$plan_location_plan_name = get_field('plan_location_plan_name');

?>