<?php
    $community_floorplans = get_field('community_floorplans');
    $subdescription = get_field('homes_description');



    $homes_floorplans = get_field('homes_floorplans');


    $spec_video = get_field('spec_video');

    $spec_virtual_tour_group = get_field('spec_virtual_tour');
    $spec_virtual_tour_image = $spec_virtual_tour_group['spec_virtual_tour_covered_image'];
    $spec_virtual_tour_url = $spec_virtual_tour_group['spec_virtual_tour_url'];

    $location = get_field('spec_google_map');

    $homes_get_directions_group = get_field('get_directions');

    $get_direction_title = $homes_get_directions_group['get_directions_headline'];

    $get_directions_content = $homes_get_directions_group['get_directions_content'];


?>
<?php //if($subdescription || $homes_floorplans || $spec_virtual_tour_image || $spec_video || $location) : ?>
<!--<nav id="info-links" class="info-links">-->
<!--	<div class="container">-->
<!--		<div class="info-links-component">-->
<!--			--><?php //if($subdescription) :  ?>
<!--				<a  href="#about-content-area" class="overview nav-info-link">OVERVIEW</a>-->
<!--			--><?php //endif; ?>
<!--			--><?php //if($homes_floorplans) :  ?>
<!--				<a href="#available-floorplans" id="" class="homes nav-info-link">FLOORPLANS</a>-->
<!--			--><?php //endif; ?>
<!---->
<!--			--><?php //if($spec_virtual_tour_image && $spec_virtual_tour_url) : ?>
<!--                <a href="#community-lot" id="" class="community-map nav-info-link">Virtual Tour</a>-->
<!--			--><?php //endif; ?>
<!---->
<!--			--><?php //if($spec_video) :  ?>
<!--				<a href="#community_video" id="" class="videos nav-info-link">VIDEO</a>-->
<!--			--><?php //endif; ?>
<!---->
<!--			--><?php //if($location) : ?>
<!--				<a href="#location" id="" class="community-map nav-info-link">Location</a>-->
<!--			--><?php //endif; ?>
<!--		</div>-->
<!--	</div>-->
<!--</nav>-->
<?php //endif; ?>

<nav id="info-links" class="info-links">
    <div class="container">
        <div class="info-links-component">
            <a  href="#overview" class="overview nav-info-link">overview</a>
            <a  href="#about" class="overview nav-info-link">About</a>
            <a  href="#virtual-tour" class="nav-info-link">Virtual Tour</a>
<!--            <a  href="#available-homes" class="nav-info-link">AVAILABLE HOMES</a>-->
            <a  href="#video" class="nav-info-link">VIDEO</a>
<!--            <a  href="#community-map" class="nav-info-link">COMMUNITY MAP</a>-->
            <a  href="#location" class="nav-info-link">Location</a>
        </div>
    </div>
</nav>
