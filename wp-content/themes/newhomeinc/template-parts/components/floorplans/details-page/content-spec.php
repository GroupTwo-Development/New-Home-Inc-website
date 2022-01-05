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

$interactive_floorplan_group = get_field('interactive_home_design_floorplan');

$floorplan_gallery = $interactive_floorplan_group['interactive_floorplan_covered_image'];
$floorplan_url = $interactive_floorplan_group['interactive_floorplan_url'];


$homes_floorplans = get_field('homes_floorplans');

$spec_data = get_featured_homes_spec();



?>

<?php require_once ('main-detail-content.php'); ?>


    <div id="main-detail-content-area" data-aos="fade-up" data-aos-duration="900" data-target="#info-links" data-offset="0">
        <div class="container">
            <div class="accordion accordion-flush" id="mainDetailAccordionComponent">
                <?php if($plan_description) : ?>
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
                                    <?php echo $plan_description; ?>
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
							                            $terms = get_field('plan_smart_features');
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
							                            $terms = get_field('plan_new_features');
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
							                            $terms = get_field('plan_healthy_features');
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

                <?php if($floorplan_gallery) : ?>
                    <?php require_once ('content-plans.php'); ?>
                <?php endif; ?>


                <?php
                    $spec_virtual_tour_group = get_field('virtual_tour');
                    $spec_virtual_tour_image = $spec_virtual_tour_group['virtual_tour_covered_image'];
                    $spec_virtual_tour_url = $spec_virtual_tour_group['virtualtour_url'];
                ?>
                <?php if($spec_virtual_tour_image && $spec_virtual_tour_url) : ?>
                    <div id="community-lot" class="accordion-item community-lot">
                        <h2 class="accordion-header" id="headingsix">
                            <button class="accordion-button collapsed btn-text" type="button" data-bs-toggle="collapse" data-bs-target="#collapsesix" aria-expanded="false" aria-controls="collapsesix">
                                <span class="accordion-title">Virtual Tour</span>
                            </button>
                        </h2>
                        <div id="collapsesix" class="accordion-collapse collapse" aria-labelledby="headingsix" data-bs-parent="#mainDetailAccordionComponent">
                            <div class="accordion-body">
                                <header class="accord-header-area">
                                    <h2>Virtual Tour</h2>
                                </header>
                                <div class="community_map-component">

                                    <a
                                        href="javascript:void(0)"
                                        data-iframe="true"
                                        id="virtual-tour-url"
                                        data-src="<?php echo $spec_virtual_tour_url?>"
                                    >
                                        <img
                                            class="img-fluid"
                                            src="<?php echo $spec_virtual_tour_image['url']; ?>"
                                            alt="<?php echo $spec_virtual_tour_image['alt']; ?>"
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
                $home_design_video = get_field('plan_video');
                if($home_design_video):?>
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

                                preg_match('/src="(.+?)"/', $home_design_video, $matches_url );
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

                <?php $elevation_image = get_field('elevation_image'); ?>
                <?php if($elevation_image) : ?>
                    <div id="elevation" class="accordion-item location elevation-gallery">
                        <h2 class="accordion-header" id="headingseven">
                            <button class="accordion-button collapsed btn-text" type="button" data-bs-toggle="collapse" data-bs-target="#collapseseven" aria-expanded="false" aria-controls="collapseseven">
                                <span class="accordion-title">Elevation</span>
                            </button>
                        </h2>
                        <div id="collapseseven" class="accordion-collapse collapse" aria-labelledby="headingseven" data-bs-parent="#mainDetailAccordionComponent">
                            <div class="accordion-body">
                                <header class="accord-header-area">
                                    <h2> Elevation</h2>
                                </header>
                                <div class="elevation-component">
                                    <div class="row g-0">
                                        <div class="col-lg-12">
                                            <div class="elevation-gallery-area pt-2 pb-3">
                                                <div class="flex flex-wrap gap-5 justify-center max-w-5xl mx-auto px-6 elevation-gallery-item">
                                                    <?php  foreach ($elevation_image as $single_image) : ?>
                                                        <a data-fancybox="gallery" href="<?php echo esc_url($single_image['url']); ?>">
                                                            <img class="rounded" src="<?php echo esc_url($single_image['sizes']['thumbnail']); ?>"  alt="<?php echo $single_image['alt']; ?>"/>
                                                        </a>
                                                    <?php endforeach; ?>
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
	    <?php require_once ('content-communities.php'); ?>
    </div>


