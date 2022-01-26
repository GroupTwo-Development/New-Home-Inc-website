<?php
$spec_virtual_tour_group = get_field('spec_virtual_tour');
$spec_virtual_tour_url = $spec_virtual_tour_group['spec_virtual_tour_url'];
?>



<div class="virtual-tour-component">
    <iframe src="<?php echo $spec_virtual_tour_url; ?>" width="100%" height="100%"  class="img-fluid" frameborder="0"></iframe>
</div>
