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
							<?php echo facetwp_display('facet','home_design_beds');?>
                        </li>
                        <li>
                            <span class="title">Baths</span>
							<?php echo facetwp_display('facet','home_design_baths');?>
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



<section class="main-filter-components pb-3">
	<div class="container">
		<div class="inner-filter-components qmi-filter-components">
            <div class="main-inner-filter-component">
                <div class="location-filter community">
                    <div class="dropdown">
                        <a class=" dropdown-toggle"  id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Community
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
	                        <?php echo do_shortcode('[facetwp facet="plan_community"]');?>
                        </ul>
                    </div>
                </div>
                <div class="location-filter price">
                    <div class="dropdown">
                        <a class=" dropdown-toggle"  id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Price
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
	                        <?php echo do_shortcode('[facetwp facet="home_design_price"]');?>
                        </ul>
                    </div>
                </div>
                <div class="location-filter sqft">
                    <div class="dropdown">
                        <a class=" dropdown-toggle"  id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Sq Ft
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
	                        <?php echo do_shortcode('[facetwp facet="home_design_sqft"]');?>
                        </ul>
                    </div>
                </div>
                <div class="location-filter beds">
                    <div class="dropdown">
                        <a class=" dropdown-toggle"  id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Beds
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
	                        <?php echo do_shortcode('[facetwp facet="home_design_beds"]');?>
                        </ul>
                    </div>
                </div>
                <div class="location-filter baths">
                    <div class="dropdown">
                        <a class=" dropdown-toggle"  id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Baths
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
	                        <?php echo do_shortcode('[facetwp facet="home_design_baths"]');?>
                        </ul>
                    </div>
                </div>
                <div class="sorting-filter">
                    <div class="dropdown">
                        <a class=" dropdown-toggle"  id="dropdownMenuSortButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Sort Results
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuSortButton1">
				            <?php echo facetwp_display( 'sort' ); ?>
                        </ul>
                    </div>
                </div>
            </div>
<!--            <div class="main-map-view-component">-->
<!--                <a href="#"><i class="fas fa-map-marker-alt"></i> Map View</a>-->
<!--            </div>-->
        </div>
	</div>
</section>
