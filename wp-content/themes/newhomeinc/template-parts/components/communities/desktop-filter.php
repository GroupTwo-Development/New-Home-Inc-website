<section class="main-filter-components pb-3">
	<div class="container">
		<div class="inner-filter-components">
            <div class="main-inner-filter-component">
                <div class="location-filter">
                    <div class="dropdown">
                        <a class=" dropdown-toggle"  id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Filter
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
	                        <?php echo do_shortcode('[facetwp facet="location"]');?>
                        </ul>
                    </div>
                </div>
                <div class="sorting-filter">
					<?php echo facetwp_display( 'sort' ); ?>
                </div>
            </div>
            <div class="main-map-view-component">
                <a href="#"><i class="fas fa-map-marker-alt"></i> Map View</a>
            </div>
        </div>
	</div>
</section>
