<?php
$subdescription = get_field('homes_description');
$homes_floorplans = get_field('homes_floorplans');
require_once ('qmi_data.php'); ?>

<div id="detail-page-content">
	<section id="overview" class="overview">
		<?php require_once ('content-overview.php'); ?>
	</section>

    <?php if ($subdescription) : ?>
        <section id="about" class="about">
            <div class="container">
                <div class="accordion-content">
                    <button class="accordion"><span class="title">About</span></button>
                    <div class="accordion-panel">
                        <header class="accord-header-area">
                            <h1><?php echo esc_html('About'); ?> <?php the_title(); ?></h1>
                        </header>
                        <div class="content">
							<?php echo $subdescription; ?>
                        </div>

						<?php
                            $terms_smart = get_field('spec_smart_features');
                            $terms_new = get_field('spec_new_features');
                            $terms_healthy = get_field('spec_healthy_features');
						?>
	                    <?php if($terms_smart && $terms_healthy && $terms_new )   : ?>
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
                                                        <h5>Smart Features</h5>
														<?php

														if( $terms_smart ): ?>
                                                            <ul>
																<?php foreach( $terms_smart as $term ): ?>
                                                                    <li><?php echo esc_html( $term->name ); ?></li>
																<?php endforeach; ?>
                                                            </ul>
														<?php endif; ?>
                                                    </div>
                                                    <div class="smart-healthy-new-component-right-content-bottom smart-features-items">
                                                        <h5>New Features</h5>
														<?php

														if( $terms_new ): ?>
                                                            <ul>
																<?php foreach( $terms_new as $term ): ?>
                                                                    <li><?php echo esc_html( $term->name ); ?></li>
																<?php endforeach; ?>
                                                            </ul>
														<?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="smart-healthy-new-component-right-content-right">
                                                    <div class="smart-healthy-new-component-right-content smart-features-items">
                                                        <h5>Healthy Features</h5>
														<?php

														if( $terms_healthy ): ?>
                                                            <ul>
																<?php foreach( $terms_healthy as $term ): ?>
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
    <?php endif; ?>

	<?php if($floorplan_url) : ?>
        <section id="floorplan" class="floorplan">
            <div class="container">
                <div class="accordion-content">
                    <button class="accordion"><span class="title">Floorplans</span></button>
                    <div class="accordion-panel">
                        <header class="accord-header-area">
                            <h2><?php echo esc_html('Floorplans'); ?></h2>
                        </header>
						<?php require_once ('content-interactive-plan.php'); ?>
                    </div>
                </div>
            </div>
        </section>
	<?php endif; ?>

	<?php
	$spec_virtual_tour_group = get_field('spec_virtual_tour');
	$spec_virtual_tour_url = $spec_virtual_tour_group['spec_virtual_tour_url'];
	?>
    <?php if($spec_virtual_tour_url) : ?>
        <section id="virtual-tour" class="section-virtual-tour">
            <div class="container">
                <div class="accordion-content">
                    <button class="accordion"><span class="title">Virtual Tour</span></button>
                    <div class="accordion-panel">
                        <header class="accord-header-area">
                            <h2><?php echo esc_html('Virtual Tour'); ?></h2>
                        </header>
                        <?php require_once ('content-virtual-tour.php'); ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

	<?php
	$video_community = get_field('spec_video');
	if($video_community): ?>
        <section id="video" class="video">
            <div class="container">
                <div class="accordion-content">
                    <button class="accordion"><span class="title">Video</span></button>
                    <div class="accordion-panel">
                        <header class="accord-header-area">
                            <h2><?php echo esc_html('Video'); ?></h2>
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

	<?php $location = get_field('spec_google_map'); ?>
	<?php if($location) : ?>
        <section id="location" class="location">
            <div class="container">
                <div class="accordion-content">
                    <button class="accordion"><span class="title">Location</span></button>
                    <div class="accordion-panel">
                        <header class="accord-header-area">
                            <h2><?php echo esc_html('Location'); ?></h2>
                        </header>
						<?php require_once ('content-map.php'); ?>
                    </div>
                </div>
            </div>
        </section>
	<?php endif; ?>


</div>