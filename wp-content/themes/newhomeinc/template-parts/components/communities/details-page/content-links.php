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


<?php if($subdescription || $community_floorplans || $community_qmi || $video_community) : ?>

    <nav id="info-links" class="info-links">
        <div class="container">
            <div class="info-links-component">
                <a  href="#overview" class="overview nav-info-link">overview</a>
	            <?php if($subdescription) :  ?>
                    <a  href="#about" class="overview nav-info-link">About</a>
	            <?php endif; ?>
	            <?php if($community_qmi) :  ?>
                    <a  href="#available-homes" class="nav-info-link">AVAILABLE HOMES</a>
	            <?php endif; ?>
	            <?php if($community_floorplans) :  ?>
                    <a  href="#floorplans" class="nav-info-link">FLOORPLANS</a>
	            <?php endif; ?>
	            <?php if($video_community) :  ?>
                    <a  href="#video" class="nav-info-link">VIDEO</a>
	            <?php endif; ?>

	            <?php if($community_lot_map_image && $community_lot_map_url) : ?>
                    <a  href="#community-map" class="nav-info-link">COMMUNITY MAP</a>
	            <?php endif; ?>

	            <?php if($location && $get_directions_content) : ?>
                    <a  href="#location" class="nav-info-link">Location</a>
	            <?php endif; ?>
            </div>
        </div>
    </nav>
<?php endif; ?>



