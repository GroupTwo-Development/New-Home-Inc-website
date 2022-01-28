
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

?>


<section class="main-detail-spec-area mt-lg-3" id="overview pt-5 pb-5"  data-aos="fade-up" data-aos-duration="900">
	<div class="container">
		<div class="row d-flex align-content-center align-items-center pt-5">
			<div class="col-lg-6 col-md-6">
				<div class="spec-detail-area">
					<div class="spec-title-price-area">
						<div class="spec-title-location">
							<h5><?php the_title(); ?></h5>
							<span class="location"><?php echo $address; ?></span>
							<hr class="spec-area-component-hr">
						</div>
						<div class="spec-area-price">
							<?php
							$price = $spec_data['price'];
							if(empty($price)) :
								$price_empty = 'call-for-pricing';
							endif;
							?>
							<?php if($price) : ?>
								<span class="spec-area-price-label">price</span>
								<span class="spec-area-price"><?php echo (!empty($spec_data['price'])) ? '' . esc_html('$').number_format($spec_data['price'] ) : ' Coming Soon'?></span>
							<?php else : ?>
								<span class="spec-area-price"><?php echo (!empty($spec_data['price'])) ? '' . esc_html('$').number_format($spec_data['price'] ) : ' Coming Soon'?></span>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<hr class="spec-area-hr">
				<div class="spec-area-container-bottom">
					<div class="spec-area-component">
						<span class="spec-area-label"><?php echo esc_html('BEDS') ?></span>
						<span class="spec-area-data"><?php echo $spec_data['bedrooms'] ?></span>
					</div>
					<div class="spec-area-component">
						<?php $half_bath = $spec_data['half_bath']; ?>
						<span class="spec-area-label"><?php echo esc_html('BATHS') ?></span>
						<span class="spec-area-data"><?php echo $spec_data['baths'] ?><?php echo ($half_bath == 1) ? ''.esc_html('.5') : '' ?></span>
					</div>
					<div class="spec-area-component">
						<span class="spec-area-label"><?php echo esc_html('SQ FT') ?></span>
						<span class="spec-area-data"><?php echo number_format($spec_data['sqft']) ?></span>
					</div>
					<?php $garage = $spec_data['garage']; ?>
					<?php if($garage) : ?>
						<div class="spec-area-component">
							<span class="spec-area-label"><?php echo esc_html('GARAGE') ?></span>
							<span class="spec-area-data"><?php echo $garage; ?> <?php echo esc_html('Car') ?></span>
						</div>
					<?php endif; ?>
				</div>

				<?php $homes_community = get_field('spec_community'); ?>
				<?php if($homes_community) : ?>
					<hr class="spec-area-hr">
					<div class="spec-area-container-community">
						<div class="spec-area-component">
							<span class="spec-area-label"><?php echo esc_html('COMMUNITY') ?></span>
							<span class="spec-area-data"><?php echo esc_html( $homes_community->name ); ?></span>
						</div>
					</div>
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
		<div class="flyout-title">
			<span class="title">Schedule A Meeting</span>
			<div class="cta-close"><span class="icon-close">X</span></div>
		</div>
		<div class="flyout-intro-content">
			<p>Interested in this beautiful home?
				Connect with your NHI Sales Agent to get most details.</p>
		</div>

		<div class="section-content">
			<div class="cta-body-area">
				<div id ="cta-contact-form" class="cta-contact-option"></div>
				<h6 id="cta-title"></h6>
				<div class="cta-location">
					<a  id="get_direction" href="https://www.google.com/maps?q=40.378580,-75.304110"></a>
					<div id="get_direction_text"></div>
				</div>
			</div>
		</div>
	</div>
</div>


<?php
$home_design_contact_form = get_field('home_design_contact_form');
$site_modal_contact_form = get_field('site_modal_contact_form', 'option');
$default_contact_form = do_shortcode('[hubspot type="form" portal="19648772" id="5c6fddc8-a542-455c-b224-640a3a2fa27b"]');
if($home_design_contact_form){
	$display_contact_form = $home_design_contact_form;
}else{
	$display_contact_form = $default_contact_form;
}

?>


<div id="dialog-content" style="display:none;max-width:500px;">
	<header>
		<h6><?php echo the_title(); ?></h6>
	</header>
	<hr>
	<?php echo $display_contact_form; ?>
	<hr>
</div>


