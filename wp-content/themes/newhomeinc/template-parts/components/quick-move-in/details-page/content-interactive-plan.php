<div class="community-floorplans-component">
	<?php
	$interactive_floorplan_group = get_field('interactive_floorplan');
    $floorplan_url = $interactive_floorplan_group['interactive_floorplan_url'];
	?>
	<?php if(  $floorplan_url ): ?>
		<div id="homes-floorplan-gallery" class="homes-floorplan-gallery pt-5">
			<iframe src="<?php echo $floorplan_url; ?>" frameborder="0" style="width: 100%; min-height: 756px"></iframe>
		</div>
	<?php endif; ?>


	<?php  if( $floorplan_url) : ?>
		<div class="component-btn-area pt-4 pb-5">
			<a href="<?php echo  $floorplan_url; ?>" target="_blank" class="personalize-btn">PERSONALIZE THIS FLOORPLAN</a>
		</div>
	<?php endif; ?>
</div>
