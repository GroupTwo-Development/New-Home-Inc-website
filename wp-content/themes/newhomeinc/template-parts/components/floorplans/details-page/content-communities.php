<?php $home_design_community = get_field('home_designs_community'); ?>
<?php if( $home_design_community ): ?>
	<section id="communities" class="available-community-in-floorplan pb-3">
		<div class="container">
			<div class="available-community-in-floorplan-component">
				<span class="available-community-in-floorplan-component-title">Available in These Communities</span>
				<div class="dropdown">
					<button class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
						COMMUNITIES
					</button>
					<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
						<?php foreach( $home_design_community as $featured_post ):
							$permalink = get_permalink( $featured_post->ID );
							$title = get_the_title( $featured_post->ID );
							$community_floorplans = get_field( 'community_floorplans', $featured_post->ID );


							$array_sqft = [];
							$array_beds_min = [];
							$array_beds_max= [];
							$array_baths_min = [];
							$array_baths_max = [];
							$array_price = [];


							$google_map = get_field('subdivision_google_map', $featured_post->ID );
							if($google_map) :

								$address = '';
								foreach( array('city', 'state') as $i => $k ) {
									$state_name = $google_map['state'];

									if( isset( $google_map[ $k ] ) ) {
										$address = $google_map['city'];
										$address .= ', '. convertState($state_name);
									}
								}
								$address = trim( $address, ', ' );
							endif;

							?>
							<?php  if($community_floorplans) : ?>
							<?php foreach ($community_floorplans as $plans) :
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
							$display_average_price = ($min_price) ? '' .  esc_html('From the ') . esc_html('$') . number_format($average_price) . esc_html('s') :
								'' . '<span class="call-for-pricing">Coming Soon</span>';
							?>
							<li>
                                <a class="dropdown-item" href="<?php echo $permalink; ?>">
                                    <span class="title"><?php echo $title; ?></span>
                                    <span class="address-price"><?php echo $address; ?> <?php echo esc_html('/'); ?> <?php echo $display_average_price; ?></span>
                                </a>
                            </li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>