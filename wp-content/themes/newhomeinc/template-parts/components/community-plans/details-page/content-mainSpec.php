<?php require_once ('content-page-data.php'); ?>
<div id="detail-page-content">
	<section id="overview" class="overview">
        <div class="pt-4"></div>
		<div class="container">
			<?php require_once ('main-detail-content.php'); ?>
		</div>
	</section>

	<?php if($plan_description) : ?>
		<section id="about" class="about">
            <div class="pt-3"></div>
			<div class="container">
				<div class="accordion-content">
					<button class="accordion"><span class="title">About</span></button>
					<div class="accordion-panel">
						<header class="accord-header-area">
							<h1><?php echo esc_html('About'); ?> <?php the_title(); ?></h1>
						</header>
						<div class="content">
							<?php echo $plan_description; ?>
						</div>


						<?php
						$terms_smart = get_field('plan_smart_features');
						$terms_new = get_field('plan_smart_features');
						$terms_healthy = get_field('plan_healthy_features');
						?>
						<?php if($terms_smart && $terms_healthy && $terms_new) : ?>
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
														$terms = get_field('plan_smart_features');
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
						<?php endif; ?>

					</div>
				</div>
			</div>
		</section>
	<?php endif ?>


	<?php if($floorplan_url) : ?>
		<section id="floorplan" class="floorplan">
			<div class="container">
				<div class="accordion-content">
					<button class="accordion"><span class="title">Floorplans</span></button>
					<div class="accordion-panel">
						<header class="accord-header-area">
							<h2><?php echo esc_html('Floorplans'); ?></h2>
						</header>
						<?php require_once ('content-plans.php'); ?>
					</div>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<?php if($spec_virtual_tour_url) : ?>
		<section id="virtual-tour" class="section-virtual-tour">
			<div class="container">
				<div class="accordion-content">
					<button class="accordion"><span class="title">Virtual Tour</span></button>
					<div class="accordion-panel">
						<header class="accord-header-area">
							<h2><?php echo esc_html('Virtual Tour'); ?></h2>
						</header>
						<div class="virtual-tour-content pb-5">
							<?php require_once ('content-virtual-tour.php'); ?>
						</div>
					</div>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<?php
        $home_design_video = get_field('plan_video');
        if($home_design_video) :
    ?>
		<section id="video" class="video">
			<div class="container">
				<div class="accordion-content">
					<button class="accordion"><span class="title">Video</span></button>
					<div class="accordion-panel">
						<header class="accord-header-area">
							<h2><?php echo esc_html('Video'); ?></h2>
						</header>
						<?php

						preg_match('/src="(.+?)"/', $home_design_video, $matches_url );
						$src = $matches_url[1];

						preg_match('/embed(.*?)?feature/', $src, $matches_id );
						$id = $matches_id[1];
						$id = str_replace( str_split( '?/' ), '', $id );
						?>
						<section class="video-component pb-5">
							<div class="container">
								<div class="row">
									<div class="offset-lg-2 col-lg-8 offset-lg-2">
										<div id="community_video-component">
											<a
												href="#"
												data-lg-size="1280-720"
												data-src="//www.youtube.com/watch?v=<?php echo $id; ?>"
												data-poster="https://img.youtube.com/vi/<?php echo $id; ?>/maxresdefault.jpg"
												data-sub-html="<h4>New Home Inc. - Video Gallery  |  Welcome to New Home Inc.</p>"
											>
												<img
													class="img-fluid"
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
		</section>
	<?php endif; ?>

	<?php $elevation_image = get_field('elevation_image'); ?>
	<?php if($elevation_image) : ?>
		<section id="elevation" class="elevation">
			<div class="container">
				<div class="accordion-content">
					<button class="accordion"><span class="title">Elevation</span></button>
					<div class="accordion-panel">
						<header class="accord-header-area">
							<h2><?php echo esc_html('Elevation'); ?></h2>
						</header>
						<?php require_once ('content-elevation.php'); ?>
					</div>
				</div>
			</div>
		</section>
	<?php endif; ?>

<!--	--><?php //$home_design_community = get_field('home_designs_community'); ?>
<!--	--><?php //if($home_design_community) : ?>
<!--		<section id="communities" class="communities">-->
<!--			<div class="container">-->
<!--				<div class="accordion-content">-->
<!--					<button class="accordion"><span class="title">Communities</span></button>-->
<!--					<div class="accordion-panel">-->
<!--						<header class="accord-header-area text-center">-->
<!--							<h2>--><?php //echo esc_html('AVAILABLE IN THESE COMMUNITIES'); ?><!--</h2>-->
<!--						</header>-->
<!--						--><?php //require_once ('content-communities.php'); ?>
<!--					</div>-->
<!--				</div>-->
<!--			</div>-->
<!--		</section>-->
<!--	--><?php //endif; ?>

</div>