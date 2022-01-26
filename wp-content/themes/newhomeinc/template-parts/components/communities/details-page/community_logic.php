<?php

	//    $post_community_data = get_post_communities_type('communities', -1);
	global  $count; //Hey WP, refer to that global var in functions!
	$min_array_sqft = [];
	$max_array_sqft = [];
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

			$bathroom_group = get_field('bathrooms', $plans->ID);

			$min_baths = $bathroom_group['min_baths'];
			array_push($array_baths_min, $min_baths);

			$max_baths = $bathroom_group['max_baths'];
			array_push($array_baths_max, $max_baths);


			$min_half_baths = $bathroom_group['min_half_baths'];
			$max_half_baths = $bathroom_group['max_half_baths'];

			$base_price = get_field('base_price', $plans->ID);
			array_push($array_price, $base_price);


			$base_sqft_group = get_field('base_sqft_group', $plans->ID);

			$min_base_sqft = $base_sqft_group['min_sqft'];
			array_push($min_array_sqft, $min_base_sqft);

			$max_base_sqft = $base_sqft_group['max_sqft'];
			array_push($max_array_sqft, $max_base_sqft);


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

	$display_average_price = ($min_price) ? '' . esc_html('$') . number_format($average_price):
		'' . '<span class="call-for-pricing">Coming Soon</span>';

	//TODO  Get the min bedrooms
	$array_beds_min = array_unique($array_beds_min);
	sort($array_beds_min);
	if(!empty($array_beds_min)){
		$min_bed = min($array_beds_min);
	}

	$display_min_beds = ($min_bed) ? '' . $min_bed . esc_html('-') : esc_html('-');



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

	$display_min_baths = (!empty($min_half_baths)) ? '' . $min_baths . esc_html('.5') . esc_html('-') :  $min_baths . esc_html('-');
	$display_only_min_full_half_baths = (!empty($min_half_baths)) ? '' . $min_baths . esc_html('.5') :  $min_baths;


	//TODO GET MAX BATHS
	$array_baths_max = array_unique($array_baths_max);
	sort($array_baths_max);
	if(!empty($array_baths_max)){
		$max_baths = max($array_baths_max);
	}
	$display_max_baths = (!empty($max_half_baths)) ? '' . $max_baths . esc_html('.5') : $max_baths;

	if($min_baths && $max_baths){
		$display_bath = $min_baths . esc_html('-') . $max_baths;
		if($min_half_baths && $max_half_baths){
			$display_bath = $min_baths .  esc_html('.5') . esc_html('-') . $max_baths . esc_html('.5');
		} elseif ($min_half_baths && empty($max_half_baths)){
			$display_bath = $min_baths .  esc_html('.5') . esc_html('-') . $max_baths;
		} elseif ($max_half_baths && empty($min_half_baths)){
			$display_bath = $min_baths . esc_html('-') . $max_baths . esc_html('.5');
		}
	}elseif ($min_baths && empty($max_baths)){
		$display_bath = $min_baths;
		if($min_half_baths){
			$display_bath = $min_baths . esc_html('.5');
		}
	} elseif ($max_baths && empty($min_baths)){
		$display_bath = $max_baths;
		if($max_half_baths) {
			$display_bath = $max_baths . esc_html('.5');
		}
	} else{
		$display_bath = esc_html('-');
	}


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

	$display_max_garage = ($max_garage) ? '' . $max_garage  : esc_html('-');


	$google_map = get_field( 'subdivision_google_map' );
	if ( $google_map ) :

		$address = '';
		foreach ( array('street_number', 'street_name', 'city', 'state', 'post_code' ) as $i => $k ) {
			$state_name = $google_map['state'];

			if ( isset( $google_map[ $k ] ) ) {
				$address = $google_map['street_number'];
				$address .= ' '.$google_map['street_name'];
				$address .= ', '. $google_map['city'];
				$address .= ', '. convertState($state_name);
				$address .= ' '. $google_map['post_code'];
			}
		}
		$address = trim( $address, ', ' );
	endif;

	$subdescription = get_field('subdescription');

	$community_qmi = get_field('community_homes');

	$community_floorplans = get_field('community_floorplans');


	//TODO GET MIN  sqft
	$min_array_sqft = array_unique($min_array_sqft);
	sort($min_array_sqft);
	if(!empty($min_array_sqft)){
		$min_sqft = min($min_array_sqft);
	}


	//TODO GET MAX  sqft
	$max_array_sqft = array_unique($max_array_sqft);
	sort($max_array_sqft);
	if(!empty($max_array_sqft)){
		$max_sqft = max($max_array_sqft);
	}

	if($min_sqft && $max_sqft){
		$display_sqft = number_format($min_sqft) . esc_html('-') . number_format($max_sqft);
	}elseif (!empty($min_sqft) && empty($max_sqft)){
		$display_sqft = number_format(floatval($min_sqft));
	} elseif ($max_sqft && empty($min_sqft)){
		$display_sqft = number_format($max_sqft);
	} else {
		$display_sqft = esc_html('-');
	}

	$sub_city = get_field('SubCity');
	$sub_state = get_field('SubState');
	$sub_zip = get_field('subzip');

	if($sub_city && $sub_state || $sub_zip){
		$display_city_state = $sub_city;
		$display_city_state .= ' ' . $sub_state;
		if($sub_zip){
			$display_city_state .= esc_html(', ')  . $sub_zip;
		}

	}



?>