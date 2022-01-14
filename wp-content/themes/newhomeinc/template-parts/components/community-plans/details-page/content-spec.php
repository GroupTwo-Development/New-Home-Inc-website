<?php require_once ('content-page-data.php'); ?>

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
			<?php endif; ?>

			<?php
            if($floorplan_gallery) : ?>
				<?php require_once ('content-plans.php'); ?>
			<?php endif; ?>


			<?php if($spec_virtual_tour_url) : ?>
				<?php require_once ('content-virtual-tour.php'); ?>
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
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="elevation-gallery-area pt-2 pb-3 text-center">
                                            <div class="flex flex-wrap gap-5 justify-center max-w-5xl mx-auto px-6 elevation-gallery-item">
												<?php  foreach ($elevation_image as $single_image) : ?>
                                                    <a data-fancybox="gallery" href="<?php echo esc_url($single_image['url']); ?>">
                                                        <img class="img-fluid" src="<?php echo esc_url($single_image['sizes']['thumbnail']); ?>"  alt="<?php echo $single_image['alt']; ?>"/>
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
</div>


