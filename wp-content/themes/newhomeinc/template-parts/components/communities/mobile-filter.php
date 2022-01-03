<section class="mobile-filter">
    <div class="mobile-filter-element">
        <ul class="mobile-filter-elements">
            <li class="mobil-filter-item filter-item">

                <div class="dropdown">
                    <a class="dropdown-toggle"  id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        Filter
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <?php echo do_shortcode('[facetwp facet="location"]');?>
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
            <li class="map-view-item filter-item main-map-view-component">
                <a href="/<?php echo esc_html('community-map'); ?>"><i class="fas fa-map-marker-alt"></i> <span class="map-view-title">Map View</span></a>
            </li>
        </ul>
    </div>
</section>

