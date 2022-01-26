<?php require_once ('community_logic.php'); ?>
<?php require_once ('content-coming-soon.php'); ?>
<div id="detail-page-content">
	<section id="overview" class="overview">
		<?php require_once ('main-detail-content.php'); ?>
    </section>

	<?php if($subdescription) : ?>
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
                            $smart_features = get_field('comm_smart_features');
                            $new_features = get_field('comm_new_features');
                            $healthy_features = get_field('comm_healthy_features');
                        if($smart_features && $new_features && $healthy_features )   :
                            ?>
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

                                                        if( $smart_features ): ?>
                                                            <ul>
                                                                <?php foreach( $smart_features as $term ): ?>
                                                                    <li><?php echo esc_html( $term->name ); ?></li>
                                                                <?php endforeach; ?>
                                                            </ul>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="smart-healthy-new-component-right-content-bottom smart-features-items">
                                                        <h5>New Features</h5>
                                                        <?php

                                                        if( $new_features ): ?>
                                                            <ul>
                                                                <?php foreach( $new_features as $term ): ?>
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

                                                        if( $healthy_features ): ?>
                                                            <ul>
                                                                <?php foreach( $healthy_features as $term ): ?>
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

	<?php if($community_qmi) : ?>
        <section id="available-homes" class="available-homes">
            <div class="container">
                <div class="accordion-content">
                    <button class="accordion"><span class="title">Available Homes</span></button>
                    <div class="accordion-panel">
                            <header class="accord-header-area">
                                <h2><?php echo esc_html('Available Homes'); ?></h2>
                            </header>
                            <?php if( $community_qmi ): ?>
                               <div class="available-homes-area">
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
                               </div>
                            <?php endif; ?>

                    </div>
                </div>
            </div>
        </section>
	<?php endif; ?>

	<?php if($community_floorplans) : ?>
        <section id="floorplans" class="floorplans">
            <div class="container">
                <div class="accordion-content">
                    <button class="accordion"><span class="title">Floorplans</span></button>
                    <div class="accordion-panel">
                        <header class="accord-header-area">
                            <h2><?php echo esc_html('Floorplan'); ?></h2>
                        </header>
                        <div class="floorplans-content">
	                        <?php require_once ('content-plans.php'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
	<?php endif; ?>

	<?php
        $video_community = get_field('video_community');
        if($video_community):
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

	<?php
        $community_lot_map_group = get_field('community_lot_map');
        $community_lot_map_image = $community_lot_map_group['community_lot_map_image'];
        $community_lot_map_url = $community_lot_map_group['community_lot_map_url'];
	?>
	<?php if($community_lot_map_image && $community_lot_map_url) : ?>
        <section id="community-map" class="community-map">
            <div class="container">
                <div class="accordion-content">
                    <button class="accordion"><span class="title">Community Map</span></button>
                    <div class="accordion-panel">
                        <header class="accord-header-area">
                            <h2><?php echo esc_html('community-map'); ?></h2>
                        </header>
                        <div class="row">
                            <div class="offset-lg-3 col-lg-6 col-offset-3">
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
                </div>
            </div>
        </section>
	<?php endif; ?>


	<?php $location = get_field('subdivision_google_map'); ?>
	<?php if($location) : ?>
        <section id="location" class="location">
            <div class="container">
                <div class="accordion-content">
                    <button class="accordion"><span class="title">Location</span></button>
                    <div class="accordion-panel">
                        <header class="accord-header-area">
                            <h2><?php echo esc_html('location'); ?></h2>
                        </header>
	                    <?php require_once ('content-map.php'); ?>
                    </div>
                </div>
            </div>
        </section>
	<?php endif; ?>


</div>