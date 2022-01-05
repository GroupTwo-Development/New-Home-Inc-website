<?php
//    $post_community_data = get_post_communities_type('communities', -1);
global $post;
$post_id = $post->ID;
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

$get_min_garage = get_field('min_garage');
$get_max_garage = get_field('max_garage');
$display_min_garage = ($get_min_garage) ?  esc_html('-')  . ' ' .  $get_min_garage: '';
$display_max_garage = ($get_max_garage) ? '' . $get_max_garage : '';

$plan_location_plan_name = get_field('plan_location_plan_name');


?>


<section class="main-detail-spec-area mt-lg-3" id="overview pt-5 pb-5"  data-aos="fade-up" data-aos-duration="900">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="spec-detail-area">
                    <div class="spec-title-price-area">
                        <div class="spec-title-location">
                            <span class="title"><?php echo $plan_location_plan_name; ?></span>
                            <!--							<span class="location">--><?php //echo $address; ?><!--</span>-->
                            <hr class="spec-area-component-hr">
                        </div>
                        <div class="spec-area-price">
							<?php if($base_price) : ?>
                                <span class="spec-area-price-label">FROM</span>
                                <span class="spec-area-price"><?php echo $display_average_price; ?></span>
							<?php else : ?>
                                <span class="spec-area-price"><?php echo $display_average_price; ?></span>
							<?php endif; ?>
                        </div>
                    </div>
                </div>
                <hr class="spec-area-hr">
                <div class="spec-area-container-bottom">
                    <div class="spec-area-component">
                        <span class="spec-area-label"><?php echo esc_html('BEDS') ?></span>
                        <span class="spec-area-data"><?php echo $display_min_beds; ?><?php echo $display_max_beds; ?></span>
                    </div>
                    <div class="spec-area-component">
                        <span class="spec-area-label"><?php echo esc_html('BATHS') ?></span>
                        <span class="spec-area-data"><?php echo $display_min_baths; ?><?php echo $display_max_baths; ?></span>
                    </div>
                    <div class="spec-area-component">
                        <span class="spec-area-label"><?php echo esc_html('SQ FT') ?></span>
                        <span class="spec-area-data"><?php echo $display_sqft; ?></span>
                    </div>
					<?php if($get_min_garage && $get_max_garage) : ?>
                        <div class="spec-area-component">
                            <span class="spec-area-label"><?php echo esc_html('GARAGE') ?></span>
                            <span class="spec-area-data"><?php echo $display_max_garage; ?><?php echo $display_min_garage; ?> <?php echo esc_html('Car') ?></span>
                        </div>
					<?php endif; ?>
                </div>

                <hr class="spec-area-hr">
				<?php


				$interactive_floorplan_group = get_field('interactive_floorplan');
				$floorplan_url = $interactive_floorplan_group['interactive_floorplan_url'];
				?>
				<?php  if($floorplan_url) : ?>
                    <section class="create-dream-home-area">
                        <div class="create-dream-home-component">
                            <h6>Create your dream home</h6>
                            <div class="create-dream-home-btn">
                                <a href="<?php echo $floorplan_url; ?>?>"  target="_blank" class="personalize-btn">PERSONALIZE THIS FLOORPLAN</a>
                            </div>
                            <div class="create-home-model-component">
                                <ul class="model-home-el">
                                    <li>
                                        <img class="img-fluid" src="/wp-content/uploads/2021/12/house3.png" alt="">
                                    </li>
                                    <li>
                                        <img class="img-fluid" src="/wp-content/uploads/2021/12/house2.png" alt="">
                                    </li>
                                    <li>
                                        <img class="img-fluid" src="/wp-content/uploads/2021/12/house1.png" alt="">
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </section>
				<?php endif; ?>


				<?php $homes_floorplans = get_field('homes_floorplans'); ?>
				<?php if($homes_floorplans) :?>
                    <hr class="spec-area-hr">
                    <div class="spec-area-container-floorplans">
                        <div class="spec-area-component">
                            <span class="spec-area-label"><?php echo esc_html('PLAN') ?></span>
                            <ul class="floorplan-list" >
								<?php foreach( $homes_floorplans as $featured_post ):
									$permalink = get_permalink( $featured_post->ID );
									$title = get_the_title( $featured_post->ID );
									?>
                                    <li><?php echo esc_html( $title ); ?></li>
								<?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    <hr class="spec-area-hr">
				<?php endif; ?>

            </div>
            <div class="col-lg-6 col-md-6">
                <div class="detail-page-cta-area">
                    <div class="detail-page-cta-inner">
                        <h6>SCHEDULE A MEETING</h6>
                        <button type="button" class="detail-page-cta-options">
                            SCHEDULE OPTIONS
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php
global $post;
$post_id = $post->ID;
?>
<div id="detail-page-cta" class="detail-page-cta-slide-out slidemodal-hidden" data-postid="<?php echo get_the_id(); ?>">
    <div class="cta-container">
        <div class="cta-close"><span class="icon-close">X</span></div>
        <div class="section-content">

            <header class="cta-header">
                <span class="cta-sub-title">Schedule Options</span>
                <h6 id="cta-title"></h6>
                <p>
                    Interested in this beautiful community?
                    Connect with your NHI Sales Agent to get most details.
                </p>
            </header>
            <hr class="cta-hr">
            <div class="cta-body-area">
                <ul id ="cta-contact-form" class="cta-contact-option"></ul>
                <hr class="cta-hr">
                <div class="cta-location">
                    <span class="cta-location-area">Get Directions:</span>
                    <a  id="get_direction" href="https://www.google.com/maps?q=40.378580,-75.304110">Address</a></span>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
$home_design_contact_form = get_field('home_design_contact_form');
$site_modal_contact_form = get_field('site_modal_contact_form', 'option');
?>

<?php if($home_design_contact_form) : ?>
    <div id="dialog-content" style="display:none;max-width:500px;">
        <header>
            <h6><?php echo the_title(); ?></h6>
        </header>
        <hr>
		<?php echo $home_design_contact_form; ?>
        <hr>
    </div>
<?php else: ?>
    <div id="dialog-content" style="display:none;max-width:500px;">
        <header>
            <h6><?php echo the_title(); ?></h6>
        </header>
        <hr>
		<?php echo $site_modal_contact_form; ?>
        <hr>
    </div>
<?php endif; ?>

