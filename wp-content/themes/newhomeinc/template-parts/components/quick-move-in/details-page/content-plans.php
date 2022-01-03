<div class="accordion-item available-floorplans" id="available-floorplans">
    <h2 class="accordion-header" id="headingfour">
        <button class="accordion-button collapsed btn-text" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefour" aria-expanded="false" aria-controls="collapsefour">
            <span class="accordion-title">Floorplan</span>
        </button>
    </h2>
    <div id="collapsefour" class="accordion-collapse collapse" aria-labelledby="headingfour" data-bs-parent="#mainDetailAccordionComponent">
        <div class="accordion-body">
            <header class="accord-header-area">
                <h2>Floorplan</h2>
            </header>
            <div class="community-floorplans-component">
		        <?php
		        $homes_floorplans = get_field('spec_floorplan_image');
		        if( $homes_floorplans ): ?>
                    <div id="homes-floorplan-gallery" class="homes-floorplan-gallery">
                        <ul class="homes_floorplan_gallery_ele">
					        <?php foreach( $homes_floorplans as $image ): ?>
                                <li class="homes_single_ele">
                                    <figure class="homes_floorplan-img" data-src="<?php echo $image['url']; ?>" data-lg-size="1600-1126">
                                        <img class="img-fluid" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                                    </figure>
                                </li>
					        <?php endforeach; ?>
                        </ul>
                    </div>
		        <?php endif; ?>
            </div>
        </div>
    </div>
</div>
