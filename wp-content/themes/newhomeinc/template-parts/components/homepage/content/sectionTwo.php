<?php $get_featured_homes = homepage_get_featured_post_types('homes', 'featured_home', '-1');?>
<?php if($get_featured_homes) : ?>
    <section id="sectionTwo" class="sectionTwo  pb-5">
        <div class="container">
            <header class="section-header">
                <h2><?php echo esc_html('Featured Showcase Homes'); ?></h2>
            </header>

            <div id="homepage-qmi-image-slider" class="splide">
                <div class="splide__track">
                    <ul class="splide__list">
	                    <?php foreach ($get_featured_homes as $post) :  setup_postdata($post); ?>
		                    <?php $spec_data = get_featured_homes_spec(); ?>
                            <li class="splide__slide card">
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
                                                    <h6><?php the_title() ?></h6>
                                                    <span class="featured-home-address">
                                                        <?php echo ($spec_data['spec_city']) ? '' . $spec_data['spec_city'] . esc_html(', ') : '' ?>
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
                                                        <span class="price <?php echo $price_empty; ?>"><?php echo (!empty($spec_data['price'])) ? '' . esc_html('$').number_format($spec_data['price'] ) : ' call for Pricing'?></span>

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
                            </li>
	                    <?php endforeach; wp_reset_postdata(); ?>
                    </ul>
                </div>

            </div>

            <div class="section-btn-area">
                <a href="/homes" class="section-btn section-two-btn">Shop For Homes</a>
            </div>

            <hr class="section_bottom-hr">
        </div>
    </section>
<?php endif; ?>
