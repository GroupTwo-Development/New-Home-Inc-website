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
               <?php echo facetwp_display( 'sort' ); ?>
            </li>
            <li class="map-view-item filter-item">
                <a href="#"><i class="fas fa-map-marker-alt"></i> Map View</a>
            </li>
        </ul>
    </div>
</section>

