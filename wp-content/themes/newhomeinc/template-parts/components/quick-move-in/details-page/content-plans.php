<div class="container">
    <div class="row">
        <div class="offset-lg-2 col-lg-8 offset-lg-2">
            <div class="virtual-tour-component">
		        <?php
                    $interactive_floorplan_group = get_field('spec_virtual_tour');
                    $floorplan_url = $interactive_floorplan_group['spec_virtual_tour_url'];
		        ?>
		        <?php if(  $floorplan_url ): ?>
                    <div id="homes-floorplan-gallery" class="homes-floorplan-gallery">
                        <iframe src="<?php echo $floorplan_url; ?>" frameborder="0" style="height: 100%; width: 100%;"></iframe>
                    </div>
		        <?php endif; ?>

<!---->
<!--		        --><?php // if( $floorplan_url) : ?>
<!--                    <div class="component-btn-area pt-4">-->
<!--                        <a href="--><?php //echo  $floorplan_url; ?><!--" target="_blank" class="img-fluid personalize-btn">PERSONALIZE THIS FLOORPLAN</a>-->
<!--                    </div>-->
<!--		        --><?php //endif; ?>
            </div>
        </div>
    </div>
</div>



