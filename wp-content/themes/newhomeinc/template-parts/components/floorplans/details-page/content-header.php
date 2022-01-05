<?php
    $plan_name = get_field('plan_name');


?>
<div class="detail-page-banner">
	<div class="container">
		<div class="interior-banner-inner">
			<?php
			if ( function_exists('yoast_breadcrumb') ) {
				yoast_breadcrumb( '<span id="breadcrumbs">','</span>' );
			}
			?>
			<div class="banner-inner-title-component pb-4">
				<span id="community_banner_title" class="banner-title"><?php echo $plan_name; ?></span>
				<div class="community-location-area">
<!--					<span class="detail-header-location">--><?php //echo $address; ?><!--</span>-->
				</div>
			</div>
		</div>
	</div>
</div>
