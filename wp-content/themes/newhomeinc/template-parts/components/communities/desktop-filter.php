<section class="main-filter-components pb-3">
	<div class="container">
		<div class="inner-filter-components">
            <div class="main-inner-filter-component">
                <div class="location-filter">
                    <div class="dropdown">
                        <a class=" dropdown-toggle"  id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Location
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
	                        <?php echo do_shortcode('[facetwp facet="location"]');?>
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
            <div id="community-map-view" class="main-map-view-component">
                <a href="/<?php echo esc_html('community-map'); ?>"><i class="fas fa-map-marker-alt"></i> <span class="map-view-title">Map View</span></a>
            </div>
        </div>
	</div>
</section>
