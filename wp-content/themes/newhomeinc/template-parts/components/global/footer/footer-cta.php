
<?php if(!is_front_page()) : ?>
	<?php if( have_rows('communities_available_homes_floorplans', 'option') ): ?>
                <section id="footer-cta-area" class="pt-5 pb-5">
                    <div class="container">
                        <div id="image-slider" class="splide">
                            <div class="splide__track">
                                <ul class="splide__list">
                                <?php while( have_rows('communities_available_homes_floorplans', 'option') ) : the_row(); ?>
                                    <?php
                                    $global_spec_title = get_sub_field('global_spec_title');
                                    $global_spec_link = get_sub_field('global_spec_link');
                                    $global_spec_image = get_sub_field('global_spec_image');
                                    ?>
                                        <li class="splide__slide">
                                            <a href="<?php echo $global_spec_link['url']; ?>">
                                                <div class="card" style="background-image: url(<?php echo $global_spec_image['url']; ?>)">
                                                    <div class="footer-cta-meta">
                                                        <span><?php echo $global_spec_title; ?></span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                <?php endwhile; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
            </section>
    <?php endif; ?>
<?php endif; ?>



