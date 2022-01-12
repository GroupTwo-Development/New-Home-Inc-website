<?php
	$location = get_field('subdivision_google_map');
	$community_get_directions_group = get_field('get_directions');
	$get_direction_title = $community_get_directions_group['get_direction_title'];

	$get_directions_content = $community_get_directions_group['get_directions_content'];

	// Loop over segments and construct HTML.
	$address = '';
	foreach( array('street_number', 'street_name', 'city', 'state', 'post_code', 'country') as $i => $k ) {
		$state_name = $location['state'];

		if ( isset( $location[ $k ] ) ) {
			$address = $location['street_number'];
			$address .= ' '.$location['street_name'] . ',' . '<br />';
			$address .= ' '. $location['city'];
			$address .= ', '. convertState($state_name);
			$address .= ' '. $location['post_code'];
		}

	}
	// Trim trailing comma.
	$address = trim( $address, ', ' );

	$spec_data = get_featured_homes_spec();
?>
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
										<div class="card">
											<div class="card-img">
												<img  class="img-fluid" src="<?php echo $spec_data['featured_image']['url']; ?>" alt="<?php echo $spec_data['featured_image']['alt']; ?>">
											</div>
											<div class="card-body">
												<p><em><?php echo esc_html( $location['address'] ); ?></em></p>
											</div>
										</div>
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
									<h5><a href="https://www.google.com/maps?q=<?php echo esc_attr($location['lat']); ?>,<?php echo esc_attr($location['lng']); ?>" target="_blank">GET DIRECTIONS</a></h5>
								</div>
								<address>
									<?php echo $address; ?>
								</address>

							</header>
							<div class="main-content">
								<?php echo $get_directions_content; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>