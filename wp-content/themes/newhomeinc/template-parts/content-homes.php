<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package New_Home_Inc
 */

?>

<?php

    //    $post_community_data = get_post_communities_type('communities', -1);
    global  $count; //Hey WP, refer to that global var in functions!
    $array_sqft = [];
    $array_beds_min = [];
    $array_beds_max= [];
    $array_baths_min = [];
    $array_baths_max = [];
    $array_price = [];

$spec_data = get_featured_homes_spec();

    $coming_soon_community = get_field('coming_soon_community');
    $coming_soon_class = ($coming_soon_community == 'yes') ? ''.'coming_soon_community':'';
    $community_gallery = get_field('gallery');
    $featured_image = get_field('featured_image');
    $call_for_pricing_phone = get_field('phone_number', 'option');

    $google_map = get_field('spec_google_map');
      if($google_map) :

       $address = '';
            foreach( array('city', 'state', 'post_code') as $i => $k ) {
	            $state_name = $google_map['state'];

                if( isset( $google_map[ $k ] ) ) {
	                $address = $google_map['city'];
	                $address .= ', '. convertState($state_name);
	                $address .= ' '. $google_map['post_code'];
                }
            }
	      $address = trim( $address, ', ' );
      endif;

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
        '' . '<span class="call-for-price">Call For Pricing</span>';

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

    $comm_banner_announcement = get_field('announcement');
    $home_statu = get_field('spec_status');
    if($home_statu){
        $display_banner_status  = '<div class="card-banner-announcement"><span class="announcement">' . $home_statu . '</span></div>';
    }elseif ($comm_banner_announcement && empty($home_statu)){
	    $display_banner_status  = '<div class="card-banner-announcement"><span class="announcement">' . $comm_banner_announcement . '</span></div>';
    }
?>

<div class="col-md-6 col-lg-6 col-xl-4">
    <div id="main-spec"  id="post-<?php the_ID(); ?> <?php echo $coming_soon_class; ?>" <?php post_class(); ?>>
            <div class="card <?php echo $coming_soon_class; ?>">
                <div class="card-inner">
                        <?php echo $display_banner_status;  ?>
                    <div class="card-img">
                        <?php community_gallery('gallery', 'featured_image') ?>
                    </div>
                    <div class="card-body">
                        <a href="<?php the_permalink(); ?>" class="inner-body">
                            <div class="card-body-top">
                                <div class="card-body-top-inner">
                                    <div class="card-body-title-area">
                                        <h6><?php the_title(); ?></h6>
                                        <span class="card-body-location"><?php echo $address; ?></span>
                                    </div>
                                    <div class="card-body-price-area">
	                                    <?php
                                            $price = $spec_data['price'];
                                            if(empty($price)) :
                                                $price_empty = 'call-for-pricing';
                                            endif;
	                                    ?>
                                        <?php if($price) : ?>
                                            <span class="card-body-price-label">Price</span>
                                            <span class="card-body-price <?php echo $price_empty; ?>"><?php echo (!empty($spec_data['price'])) ? '' . esc_html('$').number_format($spec_data['price'] ) : ' Coming Soon'?></span>
                                        <?php else : ?>
                                            <span class="card-body-price-label">Price</span>
                                            <span class="card-body-price <?php echo $price_empty; ?>"><?php echo (!empty($spec_data['price'])) ? '' . esc_html('$').number_format($spec_data['price'] ) : ' Coming Soon'?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <hr class="listing-spec-hr">
                            <div class="card-body-bottom">
                                <div class="card-body-bottom-spec">
                                    <span class="card-body-bottom-label"><?php echo esc_html('BEDS') ?></span>
                                    <span class="card-body-bottom-data"><?php echo $spec_data['bedrooms'] ?></span>
                                </div>
                                <div class="card-body-bottom-spec">
	                                <?php $half_bath = $spec_data['half_bath']; ?>
                                    <span class="card-body-bottom-label"><?php echo esc_html('BATHS') ?></span>
                                    <span class="card-body-bottom-data"><?php echo $spec_data['baths'] ?><?php echo ($half_bath == 1) ? ''.esc_html('.5') : '' ?></span>
                                </div>
                                <div class="card-body-bottom-spec">
                                    <span class="card-body-bottom-label"><?php echo esc_html('SQ FT') ?></span>
                                    <span class="card-body-bottom-data"><?php echo number_format($spec_data['sqft']) ?></span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

    </div><!-- #post-<?php the_ID(); ?> -->
</div>


