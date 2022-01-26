
<?php

//    $post_community_data = get_post_communities_type('communities', -1);
global  $count; //Hey WP, refer to that global var in functions!
$array_sqft = [];
$array_beds_min = [];
$array_beds_max= [];
$array_baths_min = [];
$array_baths_max = [];
$array_price = [];

$coming_soon_community = get_field('coming_soon_community');
$coming_soon_class = ($coming_soon_community == 'yes') ? ''.'coming_soon_community':'';
$community_gallery = get_field('gallery');
$featured_image = get_field('featured_image');
$call_for_pricing_phone = get_field('phone_number', 'option');
$comm_banner_announcement = get_field('banner_announcement');
$google_map = get_field('subdivision_google_map');
$google_map = get_field( 'spec_google_map' );
if ( $google_map ) :

	$address = '';
	foreach ( array('street_number', 'street_name', 'city', 'state', 'post_code' ) as $i => $k ) {
		$state_name = $google_map['state'];

		if ( isset( $google_map[ $k ] ) ) {
			$address = $google_map['street_number'];
			$address .= ' ' . $google_map['street_name'];
			$address .= ', ' . $google_map['city'];
			$address .= ', '. convertState($state_name);
			$address .= ' '. $google_map['post_code'];
		}
	}
	$address = trim( $address, ', ' );
endif;


$base_price = get_field('base_price');
if(isset($base_price)){
	$display_average_price = ($base_price) ? '' . esc_html('$') . number_format($base_price) . esc_html('s') :
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


//    $post_community_data = get_post_communities_type('communities', -1);
global  $count; //Hey WP, refer to that global var in functions!
$array_sqft = [];
$array_beds_min = [];
$array_beds_max= [];
$array_baths_min = [];
$array_baths_max = [];
$array_price = [];
$array_garage_min = [];
$array_garage_max = [];

$coming_soon_community = get_field('coming_soon_community');
$coming_soon_class = ($coming_soon_community == 'yes') ? ''.'coming_soon_community':'';
$community_gallery = get_field('gallery');
$featured_image = get_field('featured_image');
$call_for_pricing_phone = get_field('phone_number', 'option');
$comm_banner_announcement = get_field('comm_banner_announcement');

$community_floorplans = get_field('community_floorplans');
if($community_floorplans) :
	foreach ($community_floorplans as $plans) :
		$min_bedrooms = get_field('min_bedrooms', $plans->ID);
		array_push($array_beds_min, $min_bedrooms);

		$max_bedrooms = get_field('max_bedrooms', $plans->ID);
		array_push($array_beds_max, $max_bedrooms);

		$min_baths = get_field('min_baths', $plans->ID);
		array_push($array_baths_min, $min_baths);

		$max_baths = get_field('max_baths', $plans->ID);
		array_push($array_baths_max, $max_baths);

		$half_baths = get_field('half_baths', $plans->ID);

		$base_price = get_field('base_price', $plans->ID);
		array_push($array_price, $base_price);

		$base_sqft = get_field('base_sqft', $plans->ID);
		array_push($array_sqft, $base_sqft);


		$min_garage_data = get_field('min_garage', $plans->ID);
		array_push($array_garage_min, $min_garage_data);

		$max_garage_data = get_field('max_garage', $plans->ID);
		array_push($array_garage_max, $max_garage_data);
	endforeach;
endif;

//TODO Get the average price
$array_price = array_unique($array_price);
sort($array_price);
if(!empty(floatval($array_price))){
	$min_price = min($array_price);
	$average_price = $min_price;
	$max_price = max($array_price);
}

$display_average_price = ($min_price) ? '' . esc_html('$') . number_format($average_price) . esc_html('s') :
	'' . '<span class="call-for-pricing">Coming Soon</span>';

//TODO  Get the min bedrooms
$array_beds_min = array_unique($array_beds_min);
sort($array_beds_min);
if(!empty($array_beds_min)){
	$min_bed = min($array_beds_min);
}

$display_min_beds = ($min_bed) ? '' . $min_bed . esc_html('-') : '';



//TODO  Get the max bedrooms
$array_beds_max = array_unique($array_beds_max);
sort($array_beds_max);
if(!empty($array_beds_max)){
	$max_bed = max($array_beds_max);
}

$display_max_beds = ($max_bed) ? '' . $max_bed : '';


//TODO GET MIN BATHS
$array_baths_min = array_unique($array_baths_min);
sort($array_baths_min);
if(!empty($array_baths_min)){
	$min_baths = min($array_baths_min);
}
$display_min_baths = ($min_baths) ? '' . $min_baths . esc_html('-') : '';

//TODO GET MAX BATHS
$array_baths_max = array_unique($array_baths_max);
sort($array_baths_max);
if(!empty($array_baths_max)){
	$max_baths = max($array_baths_max);
}
$display_max_baths = ($max_baths && $half_baths == 1) ? '' . $max_baths . esc_html('.5') : '';



//TODO GET MIN and MAX sqft
$array_sqft = array_unique($array_sqft);
sort($array_sqft);
if(!empty(floatval($array_sqft))){
	$min_sqft = min($array_sqft);
	$max_sqft = max($array_sqft);
}
$display_sqft = ($array_sqft) ? number_format($min_sqft) . esc_html('-') . number_format($max_sqft) : '';

//TODO GET MIN Garage from array
$array_garage_min = array_unique($array_garage_min);
sort($array_garage_min);
if(!empty($array_garage_min)){
	$min_garage = min($array_garage_min);
}
$display_min_garage = ($min_garage) ? '' . $min_garage . esc_html('-') : '';

//TODO GET MAX Garage from array
$array_garage_max = array_unique($array_garage_max);
sort($array_garage_max);
if(!empty($array_garage_max)){
	$max_garage = max($array_garage_max);
}

$display_max_garage = ($max_garage) ? '' . $max_garage  : '';


$google_map = get_field( 'spec_google_map' );
if ( $google_map ) :

	$address = '';
	foreach ( array('street_number', 'street_name', 'city', 'state', 'post_code' ) as $i => $k ) {
		$state_name = $google_map['state'];

		if ( isset( $google_map[ $k ] ) ) {
			$address = $google_map['street_number'];
			$address .= ' '.$google_map['street_name'];
			$address .= ' '. $google_map['city'];
			$address .= ' '. convertState($state_name);
			$address .= ' '. $google_map['post_code'];
		}
	}
	$address = trim( $address, ', ' );
endif;

$subdescription = get_field('homes_description');

$community_qmi = get_field('community_homes');

$homes_floorplans = get_field('homes_floorplans');

$spec_data = get_featured_homes_spec();



?>