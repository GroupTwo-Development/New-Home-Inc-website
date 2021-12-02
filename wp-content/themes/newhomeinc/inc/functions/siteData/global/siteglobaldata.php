<?php
// interior Hero Banner with background image

function interior_hero_bg_image($acf_field){
	$page_banner = get_field($acf_field);
	?>
	<div class="section-banner">
		<img class="img-fluid" src="<?php echo $page_banner['url']; ?>" alt="<?php echo $page_banner['alt']; ?>">
	</div>
	<?php
}

