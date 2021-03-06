
<?php
    $get_featured_community= homepage_get_featured_post_types('communities', 'featured_community', '1');
?>

<?php if($get_featured_community) : ?>

    <section id="sectionThree" class="sectionThree featuredCommunity">
        <div class="container">
            <header class="section-header">
                <h2>Featured Community</h2>
            </header>
            <?php foreach ($get_featured_community as $post) : setup_postdata($post) ?>

                <?php
	                $community_price_range = [];
                    $get_comm_floorplans = get_field('community_floorplans');

                    foreach ($get_comm_floorplans as $get_comm_floorplan) :
	                    $average_floorplan_price = get_field('base_price', $get_comm_floorplan->ID);

                         if(!empty($average_floorplan_price)){
	                         array_push($community_price_range, $average_floorplan_price);
                         }
                        endforeach;
                        $community_price_range = array_unique($community_price_range);
                        sort($community_price_range);
                        if(!empty($community_price_range)){
                            $min_price = min($community_price_range);
                            $average_price = number_format($min_price);
	                        $max_price = max($community_price_range);
                        }

                    $plan_type_name = get_field('community_type');
                    $plan_type_options = ($plan_type_name) ? '' . esc_html($plan_type_name['value']) : 'homes';
                    $get_featured_community_image = get_field('featured_image');
	                $comm_banner_announcement = get_field('comm_banner_announcement');
	                $call_for_pricing_phone = get_field('phone_number', 'option');

	                $display_average_price = ($min_price) ? '' . esc_html('Brand New '. $plan_type_options . ' from ') . '$' . $average_price :
                        esc_html('Brand New '. $plan_type_options . '. ')  . '<a class="featured-community_call-for-price" href="tel:'. $call_for_pricing_phone .'">Coming Soon</a>';

                ?>

                <div class="sectionThree-content">
                        <div class="card">
                            <?php if($comm_banner_announcement) : ?>
                                <div class="card-banner-announcement">
                                    <span class="announcement"><?php echo $comm_banner_announcement; ?></span>
                                </div>
                            <?php endif; ?>
                            <div class="card-image">
                                <?php if($get_featured_community_image) : ?>
                                    <img class="lozad img-fluid" data-src="<?php echo $get_featured_community_image['url']; ?>" alt="<?php echo $get_featured_community_image['alt']; ?>">
                                <?php endif; ?>
                            </div>

                            <div class="card-footer-area">
                                <div class="card-title-price">
                                    <span class="title"><?php the_title(); ?></span>
                                    <span class="price"><?php echo $display_average_price; ?></span>
                                </div>
                                <div class="card-cta-area">
                                    <a href="<?php the_permalink(); ?>" class="section-btn community-btn">Learn More</a>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php endforeach; wp_reset_postdata();?>

        </div>
    </section>

<?php endif; ?>