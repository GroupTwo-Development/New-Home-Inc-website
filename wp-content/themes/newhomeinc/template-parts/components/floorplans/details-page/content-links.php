<?php
$community_floorplans = get_field('community_floorplans');

$plan_description = get_field('plan_description');





$interactive_floorplan_group = get_field('interactive_home_design_floorplan');
$floorplan_gallery = $interactive_floorplan_group['interactive_floorplan_covered_image'];
$floorplan_url = $interactive_floorplan_group['interactive_floorplan_url'];




$spec_virtual_tour_group = get_field('virtual_tour');
$spec_virtual_tour_url = $spec_virtual_tour_group['virtualtour_url'];


$home_design_video = get_field('plan_video');


$location = get_field('spec_google_map');

$homes_get_directions_group = get_field('get_directions');

$get_direction_title = $homes_get_directions_group['get_directions_headline'];

$get_directions_content = $homes_get_directions_group['get_directions_content'];
$elevation_image = get_field('elevation_image');

$home_design_community = get_field('home_designs_community');

?>
<?php //if($plan_description || $floorplan_gallery || $spec_virtual_tour_image || $home_design_video || $elevation_image || $home_design_community) : ?>
<!--    <nav id="info-links" class="info-links">-->
<!--        <div class="container">-->
<!--            <div class="info-links-component">-->
<!--				--><?php //if($plan_description) :  ?>
<!--                    <a href="#about-content-area" class="overview nav-info-link">ABOUT</a>-->
<!--				--><?php //endif; ?>
<!--				--><?php //if($floorplan_gallery || $floorplan_url) :  ?>
<!--                    <a href="#available-floorplans" id="" class="homes nav-info-link">FLOORPLANS</a>-->
<!--				--><?php //endif; ?>
<!---->
<!--				--><?php //if($spec_virtual_tour_url) : ?>
<!--                    <a href="#community-lot" id="" class="community-map nav-info-link">Virtual Tour</a>-->
<!--				--><?php //endif; ?>
<!---->
<!--				--><?php //if($home_design_video) :  ?>
<!--                    <a href="#community_video" id="" class="videos nav-info-link">VIDEO</a>-->
<!--				--><?php //endif; ?>
<!---->
<!--				--><?php //if($elevation_image) : ?>
<!--                    <a href="#elevation" id="" class="community-map nav-info-link">ELEVATIONS</a>-->
<!--				--><?php //endif; ?>
<!---->
<!--                --><?php //if($home_design_community) : ?>
<!--                    <a href="#communities" id="" class="community-map nav-info-link">COMMUNITIES</a>-->
<!--                --><?php //endif; ?>
<!---->
<!--            </div>-->
<!--        </div>-->
<!--    </nav>-->
<?php //else : ?>
<!---->
<?php //endif; ?>


<nav id="info-links" class="info-links">
    <div class="container">
        <div class="info-links-component">
            <a  href="#overview" class="overview nav-info-link">overview</a>
            <a  href="#about" class="overview nav-info-link">About</a>
            <a  href="#floorplan" class="nav-info-link">Floorlan</a>
            <a  href="#virtual-tour" class="nav-info-link">Virtual Tour</a>
            <a  href="#video" class="nav-info-link">VIDEO</a>
            <a  href="#elevation" class="nav-info-link">Elevation</a>
            <a  href="#communities" class="nav-info-link">Communities</a>
        </div>
    </div>
</nav>


