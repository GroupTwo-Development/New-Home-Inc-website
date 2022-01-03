<?php

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


    $google_map = get_field( 'subdivision_google_map' );
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

    $subdescription = get_field('subdescription');

    $community_qmi = get_field('community_homes');

    $community_floorplans = get_field('community_floorplans');

?>
<?php require_once ('content-coming-soon.php'); ?>
<?php require_once ('main-detail-content.php'); ?>


<div id="main-detail-content-area"  data-aos="fade-up" data-aos-duration="900" data-spy="scroll" data-target="#info-links" data-offset="0">
    <div class="container">
        <div class="accordion accordion-flush" id="mainDetailAccordionComponent">
            <?php if($subdescription) : ?>
                <div class="accordion-item about-content-area" id="about-content-area">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button btn-text" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                           <span class="accordion-title">About</span>
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#mainDetailAccordionComponent">
                        <div class="accordion-body">
                              <section class="about-inner-content">
                                  <header class="accord-header-area">
                                      <h1><?php echo esc_html('About'); ?> <?php the_title(); ?></h1>
                                  </header>
                                  <?php echo $subdescription; ?>
                              </section>
                        </div>
                        <div class="smart-features-accordion pt-4 pb-5">
                            <div class="accordion-body">
                                <header class="accord-header-area-smart">
                                    <h2>Smart. Healthy. New.</h2>
                                </header>
                                <section class="smart-healthy-new-component">
                                    <div class="smart-healthy-new-component-content">
                                        <div class="smart-healthy-new-component-left">
                                            <img src="/wp-content/uploads/2021/11/banner-logo.png" alt="" class="mart-healthy-new-component-logo img-fluid">
                                        </div>
                                        <div class="smart-healthy-new-component-right">
                                            <div class="smart-healthy-new-component-right-content-left">
                                                <div class="smart-healthy-new-component-right-content-top smart-features-items">
                                                    <h6>Smart Features</h6>
								                    <?php
								                    $terms = get_field('smart_features');
								                    if( $terms ): ?>
                                                        <ul>
										                    <?php foreach( $terms as $term ): ?>
                                                                <li><?php echo esc_html( $term->name ); ?></li>
										                    <?php endforeach; ?>
                                                        </ul>
								                    <?php endif; ?>
                                                </div>
                                                <div class="smart-healthy-new-component-right-content-bottom smart-features-items">
                                                    <h6>New Features</h6>
								                    <?php
								                    $terms = get_field('new_features');
								                    if( $terms ): ?>
                                                        <ul>
										                    <?php foreach( $terms as $term ): ?>
                                                                <li><?php echo esc_html( $term->name ); ?></li>
										                    <?php endforeach; ?>
                                                        </ul>
								                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="smart-healthy-new-component-right-content-right">
                                                <div class="smart-healthy-new-component-right-content smart-features-items">
                                                    <h6>Healthy Features</h6>
								                    <?php
								                    $terms = get_field('healthy_features');
								                    if( $terms ): ?>
                                                        <ul>
										                    <?php foreach( $terms as $term ): ?>
                                                                <li><?php echo esc_html( $term->name ); ?></li>
										                    <?php endforeach; ?>
                                                        </ul>
								                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="learn-more-cta">
                                        <a href="/smart-home-tech/">Learn More</a>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <div class="accordion-item smart-features-accordion" id="smart-features-accordion">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed btn-text" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <span class="accordion-title">Smart. Healthy. New.</span>
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#mainDetailAccordionComponent">
                    <div class="accordion-body">
                        <header class="accord-header-area">
                            <h2>Smart. Healthy. New.</h2>
                        </header>
                        <section class="smart-healthy-new-component">
                            <div class="smart-healthy-new-component-content">
                                <div class="smart-healthy-new-component-left">
                                    <img src="/wp-content/uploads/2021/11/banner-logo.png" alt="" class="mart-healthy-new-component-logo img-fluid">
                                </div>
                                <div class="smart-healthy-new-component-right">
                                    <div class="smart-healthy-new-component-right-content-left">
                                        <div class="smart-healthy-new-component-right-content-top smart-features-items">
                                            <h6>Smart Features</h6>
	                                        <?php
	                                        $terms = get_field('smart_features');
	                                        if( $terms ): ?>
                                                <ul>
			                                        <?php foreach( $terms as $term ): ?>
                                                        <li><?php echo esc_html( $term->name ); ?></li>
			                                        <?php endforeach; ?>
                                                </ul>
	                                        <?php endif; ?>
                                        </div>
                                        <div class="smart-healthy-new-component-right-content-bottom smart-features-items">
                                            <h6>New Features</h6>
	                                        <?php
	                                        $terms = get_field('new_features');
	                                        if( $terms ): ?>
                                                <ul>
			                                        <?php foreach( $terms as $term ): ?>
                                                        <li><?php echo esc_html( $term->name ); ?></li>
			                                        <?php endforeach; ?>
                                                </ul>
	                                        <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="smart-healthy-new-component-right-content-right">
                                        <div class="smart-healthy-new-component-right-content smart-features-items">
                                            <h6>Healthy Features</h6>
	                                        <?php
	                                        $terms = get_field('healthy_features');
	                                        if( $terms ): ?>
                                                <ul>
			                                        <?php foreach( $terms as $term ): ?>
                                                        <li><?php echo esc_html( $term->name ); ?></li>
			                                        <?php endforeach; ?>
                                                </ul>
	                                        <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="learn-more-cta">
                                <a href="#">Learn More</a>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
            <?php if($community_qmi) : ?>
                <div class="accordion-item available-homes" id="available-homes">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed btn-text" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <span class="accordion-title">Available Homes</span>
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse " aria-labelledby="headingThree" data-bs-parent="#mainDetailAccordionComponent">
                    <div class="accordion-body">
                        <header class="accord-header-area">
                            <h2> Available Homes</h2>
                        </header>
	                    <?php

	                    if( $community_qmi ): ?>
                            <div id="card-slider-qmi" class="splide">
                                <div class="splide__track">
                                    <ul class="splide__list">
	                                    <?php foreach ($community_qmi as $post) :  setup_postdata($post); ?>
						                    <?php $spec_data = get_featured_homes_spec();
                                            ?>
                                            <li class="splide__slide">
                                                <div class="card">
                                                    <a href="<?php the_permalink(); ?>">
		                                                <?php if($spec_data['announcement']) : ?>
                                                            <div class="featured-home-announcement-card-banner">
                                                                <span class="banner-announcement"><?php echo $spec_data['announcement'] ?></span>
                                                            </div>
		                                                <?php endif; ?>
                                                        <div class="card-container">
                                                            <div class="featured-home-card-header">
                                                                <div class="card-img">
                                                                    <img  class="img-fluid" src="<?php echo $spec_data['featured_image']['url']; ?>" alt="<?php echo $spec_data['featured_image']['alt']; ?>">
                                                                </div>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="card-body-title-price-area">
                                                                    <div class="card-title-area">
                                                                        <h6><?php the_title(); ?></h6>
                                                                        <span class="featured-home-address">
                                                                        <?php echo ($spec_data['spec_city']) ? '' . $spec_data['spec_city'] : '' ?>
                                                                        <?php echo ($spec_data['spec_state']['SubState'] ) ? '' . $spec_data['spec_state']['SubState'] . esc_html(', ') : '' ?>
                                                                        <?php echo ($spec_data['spec_zip']) ? '' . $spec_data['spec_zip'] : '' ?>
                                                                    </span>
                                                                    </div>
                                                                    <div class="featured-home-price">
						                                                <?php
						                                                $price = $spec_data['price'];
						                                                if(empty($price)) :
							                                                $price_empty = 'call-for-pricing';
						                                                endif;
						                                                ?>
                                                                        <span class="price <?php echo $price_empty; ?>"><?php echo (!empty($spec_data['price'])) ? '' . esc_html('$').number_format($spec_data['price'] ) : ' Coming Soon'?></span>

                                                                    </div>
                                                                </div>
                                                                <hr class="featured-homes-hr">
                                                                <div class="card-body-homes-spec">
                                                                    <ul class="card-body-homes-spec-elements">
                                                                        <li>
                                                                            <span class="spec-name">BEDS</span>
                                                                            <span class="spec-data"><?php echo $spec_data['bedrooms'] ?></span>
                                                                        </li>
                                                                        <li>
                                                                            <span class="spec-name">BATHS</span>
							                                                <?php $half_bath = $spec_data['half_bath']; ?>
                                                                            <span class="spec-data"><?php echo $spec_data['baths'] ?><?php echo ($half_bath == 1) ? ''.esc_html('.5') : '' ?></span>
                                                                        </li>
                                                                        <li>
                                                                            <span class="spec-name">SQ FT</span>
                                                                            <span class="spec-data"><?php echo number_format($spec_data['sqft']) ?></span>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </li>
					                    <?php endforeach; wp_reset_postdata(); ?>
                                    </ul>
                                </div>
                            </div>
	                    <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>

	        <?php if($community_floorplans) : ?>
                <div class="accordion-item available-floorplans" id="available-floorplans">
                    <h2 class="accordion-header" id="headingfour">
                        <button class="accordion-button collapsed btn-text" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefour" aria-expanded="false" aria-controls="collapsefour">
                            <span class="accordion-title">Floorplans</span>
                        </button>
                    </h2>
                    <div id="collapsefour" class="accordion-collapse collapse" aria-labelledby="headingfour" data-bs-parent="#mainDetailAccordionComponent">
                        <div class="accordion-body">
                            <?php require_once ('content-plans.php'); ?>
                        </div>
                    </div>
                </div>
	        <?php endif; ?>

	        <?php
                $video_community = get_field('video_community');
                if($video_community):
            ?>
                <div id="community_video" class="accordion-item community-video">
                    <h2 class="accordion-header" id="headingfive">
                        <button class="accordion-button collapsed btn-text" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefive" aria-expanded="false" aria-controls="collapsefive">
                            <span class="accordion-title">Video</span>
                        </button>
                    </h2>
                    <div id="collapsefive" class="accordion-collapse collapse" aria-labelledby="headingfive" data-bs-parent="#mainDetailAccordionComponent">
                        <div class="accordion-body">
                            <header class="accord-header-area">
                                <h2> Video</h2>
                            </header>
	                        <?php

                                preg_match('/src="(.+?)"/', $video_community, $matches_url );
                                $src = $matches_url[1];

                                preg_match('/embed(.*?)?feature/', $src, $matches_id );
                                $id = $matches_id[1];
                                $id = str_replace( str_split( '?/' ), '', $id );
	                        ?>
                            <section class="video-component">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div id="community_video-component">
                                                <a
                                                        href="#"
                                                        data-lg-size="1280-720"
                                                        data-src="//www.youtube.com/watch?v=<?php echo $id; ?>"
                                                        data-poster="https://img.youtube.com/vi/<?php echo $id; ?>/maxresdefault.jpg"
                                                        data-sub-html="<h4>New Home Inc. - Video Gallery  |  Welcome to New Home Inc.</p>"
                                                >
                                                    <img
                                                            class="img-responsive"
                                                            src="https://img.youtube.com/vi/<?php echo $id; ?>/maxresdefault.jpg"
                                                            alt=""
                                                    />
                                                    <div class="overlay-area">
                                                        <span class="overlay-title"><i class="far fa-play-circle"></i></span>
                                                    </div>
                                                </a>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
	        <?php endif; ?>


            <?php
                $community_lot_map_group = get_field('community_lot_map');
                $community_lot_map_image = $community_lot_map_group['community_lot_map_image'];
                $community_lot_map_url = $community_lot_map_group['community_lot_map_url'];
            ?>
            <?php if($community_lot_map_image && $community_lot_map_url) : ?>
                <div id="community-lot" class="accordion-item community-lot">
                    <h2 class="accordion-header" id="headingsix">
                        <button class="accordion-button collapsed btn-text" type="button" data-bs-toggle="collapse" data-bs-target="#collapsesix" aria-expanded="false" aria-controls="collapsesix">
                            <span class="accordion-title">Community Map</span>
                        </button>
                    </h2>
                    <div id="collapsesix" class="accordion-collapse collapse" aria-labelledby="headingsix" data-bs-parent="#mainDetailAccordionComponent">
                        <div class="accordion-body">
                            <header class="accord-header-area">
                                <h2> Community Map</h2>
                            </header>
                            <div class="community_map-component">

                                <a
                                    href="<?php echo $community_lot_map_url?>"
                                    target="_blank"
                                >
                                    <img
                                            class="img-fluid"
                                            src="<?php echo $community_lot_map_image['url']; ?>"
                                            alt="<?php echo $community_lot_map_image['alt']; ?>"
                                    />
                                    <div class="overlay-area">
                                        <span class="overlay-title">Click to view current site availability.</span>
                                    </div>
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>


	        <?php
	        $location = get_field('subdivision_google_map');
	        $community_get_directions_group = get_field('get_directions');
	        $get_direction_title = $community_get_directions_group['get_direction_title'];

	        $get_directions_content = $community_get_directions_group['get_directions_content'];
	        ?>
	        <?php if($location && $get_direction_title && $get_directions_content) : ?>
                <div id="location" class="accordion-item location">
                    <h2 class="accordion-header" id="headingseven">
                        <button class="accordion-button collapsed btn-text" type="button" data-bs-toggle="collapse" data-bs-target="#collapseseven" aria-expanded="false" aria-controls="collapseseven">
                            <span class="accordion-title">Location</span>
                        </button>
                    </h2>
                    <div id="collapseseven" class="accordion-collapse collapse" aria-labelledby="headingseven" data-bs-parent="#mainDetailAccordionComponent">
                        <div class="accordion-body">
                            <header class="accord-header-area">
                                <h2> Location</h2>
                            </header>
                            <div class="location-component">
                                <div class="row g-0">
                                    <div class="col-lg-6">
                                        <div class="location-component-map">
                                            <?php

                                            if( $location ): ?>
                                                <div class="acf-map" data-zoom="10">
                                                    <div class="marker" data-lat="<?php echo esc_attr($location['lat']); ?>" data-lng="<?php echo esc_attr($location['lng']); ?>">
                                                        <a href="https://www.google.com/maps?q=<?php echo esc_attr($location['lat']); ?>,<?php echo esc_attr($location['lng']); ?>" target="_blank">
                                                            <span class="title">Get Direction to <?php the_title(); ?></span>
                                                        </a>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="get-direction-content">
                                            <header class="section-header">
                                                <div class="inner-header-area">
                                                    <span class="location-icon"><i class="fas fa-map-marker-alt"></i></span>
                                                    <span class="location-subtitle">GET DIRECTIONS</span>
                                                </div>
                                            </header>
                                            <div class="main-content">
                                                <h6><?php echo $get_direction_title; ?></h6>
                                                <?php echo $get_directions_content; ?>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
	        <?php endif; ?>
        </div>
    </div>
</div>

