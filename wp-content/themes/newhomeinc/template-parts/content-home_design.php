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

    $coming_soon_community = get_field('coming_soon_community');
    $coming_soon_class = ($coming_soon_community == 'yes') ? ''.'coming_soon_community':'';
    $community_gallery = get_field('gallery');
    $featured_image = get_field('featured_image');
    $call_for_pricing_phone = get_field('phone_number', 'option');
    $comm_banner_announcement = get_field('banner_announcement');
    $google_map = get_field('subdivision_google_map');
      if($google_map) :
       $address = '';
            foreach( array('street_number', 'street_name') as $i => $k ) {
                if( isset( $google_map[ $k ] ) ) {
                    $address .= sprintf( '<span class="segment-%s">%s</span>, ', $k, $google_map[ $k ] );
                }
            }
	      $address = trim( $address, ', ' );
      endif;


   $base_price = get_field('base_price');
   if(isset($base_price)){
	   $display_average_price = ($base_price) ? '' . esc_html('$') . number_format($base_price)  :
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

?>

<div class="col-md-6 col-lg-6 col-xl-4">
    <div id="main-spec"  id="post-<?php the_ID(); ?> <?php echo $coming_soon_class; ?>" <?php post_class(); ?>>
            <div class="card <?php echo $coming_soon_class; ?>">
                <div class="card-inner">
                    <?php if($comm_banner_announcement) : ?>
                        <div class="card-banner-announcement">
                            <span class="announcement"><?php echo $comm_banner_announcement; ?></span>
                        </div>
                    <?php endif; ?>
                    <div class="card-img">
                        <?php community_gallery('gallery', 'featured_image') ?>
                    </div>
                    <div class="card-body">
                        <div class="inner-body">
                            <div class="card-body-top">
                                <div class="card-body-top-inner home_design">
                                    <div class="card-body-title-area">
                                        <h6><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
                                        <?php $home_design_community_floorplan = get_field('home_design_community_floorplan'); ?>
                                        <?php if($home_design_community_floorplan) :
                                                $total_community_count = count($home_design_community_floorplan)
                                        ?>

                                            <div class="card-body-location community-dropdown">
	                                            <?php if( have_rows('home_design_community_floorplan') ): ?>
                                                    <div class="dropdown">
                                                        <a class="dropdown-toggle"  id="home_design_communities" data-bs-toggle="dropdown" aria-expanded="false">
                                                            In <?php echo $total_community_count; ?> Communities
                                                        </a>
                                                        <ul class="dropdown-menu" aria-labelledby="home_design_communities">
	                                                        <?php while( have_rows('home_design_community_floorplan') ): the_row();

		                                                        $home_design_floorplan = get_sub_field('home_design_floorplan');
		                                                        $home_design_floorplan_name = get_sub_field('home_design_floorplan_name');
		                                                        $permalink = get_permalink( $home_design_floorplan->ID );
		                                                        $title = get_the_title( $home_design_floorplan->ID );
                                                            ?>
                                                                <li><a class="dropdown-item" href="<?php echo $permalink; ?>"><?php echo esc_html( $home_design_floorplan_name ); ?></a></li>
	                                                        <?php endwhile; wp_reset_postdata(); ?>
                                                        </ul>
                                                    </div>
	                                            <?php endif; ?>
                                            </div>
                                        <?php endif; ?>

                                    </div>
                                    <div class="card-body-price-area">
                                       <?php  if ($base_price) : ?>
                                           <span class="card-body-price-label">From</span>
                                           <span class="card-body-price"><?php echo $display_average_price; ?></span>
                                       <?php else : ?>
                                           <span class="card-body-price-label">Price</span>
                                           <span class="card-body-price"><?php echo $display_average_price; ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <hr class="listing-spec-hr">
                            <div class="card-body-bottom">
                                <div class="card-body-bottom-spec">
                                    <span class="card-body-bottom-label"><?php echo esc_html('BEDS') ?></span>
                                    <span class="card-body-bottom-data"><?php echo $display_min_beds; ?><?php echo $display_max_beds; ?></span>
                                </div>
                                <div class="card-body-bottom-spec">
                                    <span class="card-body-bottom-label"><?php echo esc_html('BATHS') ?></span>

                                    <span class="card-body-bottom-data"><?php echo $display_min_baths; ?><?php echo $display_max_baths; ?></span>

                                </div>
                                <div class="card-body-bottom-spec">
                                    <span class="card-body-bottom-label"><?php echo esc_html('SQ FT') ?></span>
                                    <span class="card-body-bottom-data"><?php echo $display_sqft; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    </div><!-- #post-<?php the_ID(); ?> -->
</div>


