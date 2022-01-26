
<div class="community-floorplans-component">
	<?php
	$community_floorplans = get_field('community_floorplans');
	if( $community_floorplans ): ?>
        <div id="community_floorplan" class="splide">
            <div class="splide__track">
                <ul class="splide__list">
					<?php foreach( $community_floorplans as $featured_post ):
						$permalink = get_permalink( $featured_post->ID );
						$custom_field = get_field( 'field_name', $featured_post->ID );
						$spec_data = get_floorplan_location_spec();

						$coming_soon_community = get_field('coming_soon_community', $featured_post->ID);
						$coming_soon_class = ($coming_soon_community == 'yes') ? ''.'coming_soon_community':'';
						$community_gallery = get_field('gallery', $featured_post->ID);
						$featured_image = get_field('featured_image', $featured_post->ID);
						$call_for_pricing_phone = get_field('phone_number', 'option', $featured_post->ID);
						$comm_banner_announcement = get_field('banner_announcement', $featured_post->ID);
						$title = get_field('plan_location_plan_name', $featured_post->ID);

						$google_map = get_field('subdivision_google_map', $featured_post->ID);
						if($google_map) :
							$address = '';
							foreach( array('street_number', 'street_name') as $i => $k ) {
								if( isset( $google_map[ $k ] ) ) {
									$address .= sprintf( '<span class="segment-%s">%s</span>, ', $k, $google_map[ $k ] );
								}
							}
							$address = trim( $address, ', ' );
						endif;


						$base_price = get_field('base_price', $featured_post->ID);
						if(isset($base_price)){
							$display_average_price = ($base_price) ? '' . esc_html('$') . number_format($base_price) :
								'' . '<span class="call-for-pricing">Coming Soon</span>';
						}


						$min_bedrooms = get_field('min_bedrooms', $featured_post->ID);
						$max_bedrooms = get_field('max_bedrooms', $featured_post->ID);
						if($min_bedrooms && $max_bedrooms){
							$display_min_beds = ($min_bedrooms) ? '' . $min_bedrooms . esc_html('-') : '';
							$display_max_beds = ($max_bedrooms) ? '' . $max_bedrooms : '';
						}

						$min_baths = get_field('min_baths', $featured_post->ID);
						$max_baths = get_field('max_baths', $featured_post->ID);
						$half_baths = get_field('half_baths', $featured_post->ID);
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

						$base_sqft = get_field('base_sqft', $featured_post->ID);
						if(!empty($base_sqft)){
							$display_sqft = number_format($base_sqft);

						}



						?>
                        <li class="splide__slide">
                            <div class="card">
                                <a href="<?php echo $permalink; ?>">
                                    <div class="card-inner">
		                                <?php if($comm_banner_announcement) : ?>
                                            <div class="card-banner-announcement">
                                                <span class="announcement"><?php echo $comm_banner_announcement; ?></span>
                                            </div>
		                                <?php endif; ?>
                                        <div class="card-img">
                                            <div class="card-img">
                                                <img  class="img-fluid" src="<?php echo $featured_image['url'] ?>" alt="<?php echo $featured_image['alt']; ?>">
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="inner-body">
                                                <div class="card-body-top">
                                                    <div class="card-body-top-inner home_design">
                                                        <div class="card-body-title-area">
                                                            <h6><?php echo esc_html( $title ); ?></h6>

                                                        </div>
                                                        <div class="card-body-price-area">
							                                <?php  if ($base_price) : ?>
                                                                <span class="card-body-price-label">From</span>
                                                                <span class="card-body-price"><?php echo $display_average_price; ?></span>
							                                <?php else : ?>
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
                                </a>
                            </div>
                        </li>
					<?php endforeach; ?>
                </ul>
            </div>
        </div>
	<?php endif; ?>
</div>
