<section class="main-filter-components pb-3">
	<div class="container">
		<div class="inner-filter-components qmi-filter-components">
			<div class="main-inner-filter-component">
				<div class="location-filter price">
					<div class="dropdown">
						<a class=" dropdown-toggle"  id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
							Price
						</a>
						<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
							<?php echo do_shortcode('[facetwp facet="community_price"]');?>
						</ul>
					</div>
				</div>
				<div class="location-filter sqft">
					<div class="dropdown">
						<a class=" dropdown-toggle"  id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
							Sq Ft
						</a>
						<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
							<?php echo do_shortcode('[facetwp facet="community_sq_ft"]');?>
						</ul>
					</div>
				</div>
				<div class="location-filter beds">
					<div class="dropdown">
						<a class=" dropdown-toggle"  id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
							Beds
						</a>
						<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
							<?php echo do_shortcode('[facetwp facet="community_beds"]');?>
						</ul>
					</div>
				</div>
				<div class="location-filter baths">
					<div class="dropdown">
						<a class=" dropdown-toggle"  id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
							Baths
						</a>
						<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
							<?php echo do_shortcode('[facetwp facet="community_baths"]');?>
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
			<!--            <div class="main-map-view-component">-->
			<!--                <a href="#"><i class="fas fa-map-marker-alt"></i> Map View</a>-->
			<!--            </div>-->
		</div>
	</div>
</section>