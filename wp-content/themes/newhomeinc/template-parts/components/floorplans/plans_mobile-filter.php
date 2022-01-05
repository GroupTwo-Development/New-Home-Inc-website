<section class="mobile-filter">
    <div class="mobile-filter-element">
        <ul class="mobile-filter-elements qmi-filters">
            <li class="mobil-filter-item filter-item">

                <div class="dropdown">
                    <a class="dropdown-toggle"  id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        Location
                    </a>
                    <ul class="dropdown-menu qmi-filter-item" aria-labelledby="dropdownMenuButton1">
                        <li>
                            <span class="title">Community</span>
	                        <?php echo do_shortcode('[facetwp facet="plan_community"]');?>
                        </li>
                        <li>
                            <span class="title">Price</span>
	                        <?php echo do_shortcode('[facetwp facet="home_design_price"]');?>
                        </li>

                        <li>
                            <span class="title">SQ Ft</span>
	                        <?php echo do_shortcode('[facetwp facet="home_design_sqft"]');?>
                        </li>
                        <li>
                            <span class="title">Beds</span>
	                        <?php echo do_shortcode('[facetwp facet="home_design_beds"]');?>
                        </li>
                        <li>
                            <span class="title">Baths</span>
	                        <?php echo do_shortcode('[facetwp facet="home_design_baths"]');?>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="sorting-item filter-item">

                <div class="dropdown">
                    <a class="dropdown-toggle"  id="dropdownMenuSortButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        Sort Results
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuSortButton1">
	                    <?php echo facetwp_display( 'sort' ); ?>
                    </ul>
                </div>

            </li>
        </ul>
    </div>
</section>

