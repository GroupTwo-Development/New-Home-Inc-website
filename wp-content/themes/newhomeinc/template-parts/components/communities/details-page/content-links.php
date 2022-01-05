<?php
$community_floorplans = get_field('community_floorplans');
$subdescription = get_field('subdescription');

$community_qmi = get_field('community_homes');
$video_community = get_field('video_community');

$community_lot_map_group = get_field('community_lot_map');
$community_lot_map_image = $community_lot_map_group['community_lot_map_image'];
$community_lot_map_url = $community_lot_map_group['community_lot_map_url'];

$location = get_field('subdivision_google_map');
$community_get_directions_group = get_field('get_directions');
$get_direction_title = $community_get_directions_group['get_direction_title'];

$get_directions_content = $community_get_directions_group['get_directions_content'];
$coming_soon_community = get_field( 'coming_soon_community' );
?>
<?php if($coming_soon_community == 'yes') :  ?>

<?php else : ?>
    <nav id="info-links" class="info-links">
        <div class="container">
            <div class="info-links-component">
				<?php if($subdescription) :  ?>
                    <a href="#about-content-area" class="overview nav-info-link">OVERVIEW</a>
				<?php endif; ?>
				<?php if($community_qmi) :  ?>
                    <a href="#available-homes" id="" class="homes nav-info-link">AVAILABLE HOMES</a>
				<?php endif; ?>

				<?php if($community_floorplans) :  ?>
                    <a href="#available-floorplans" id="" class="plans nav-info-link">FLOORPLANS</a>
				<?php endif; ?>


				<?php if($video_community) :  ?>
                    <a href="#community_video" id="" class="videos nav-info-link">VIDEO</a>
				<?php endif; ?>


				<?php if($community_lot_map_image && $community_lot_map_url) : ?>
                    <a href="#community-lot" id="" class="community-map nav-info-link">COMMUNITY MAP</a>
				<?php endif; ?>

				<?php if($location && $get_direction_title && $get_directions_content) : ?>
                    <a href="#location" id="" class="community-map nav-info-link">Location</a>
				<?php endif; ?>
            </div>
        </div>
    </nav>
<?php endif; ?>