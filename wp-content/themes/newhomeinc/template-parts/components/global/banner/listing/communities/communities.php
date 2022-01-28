<?php if(is_post_type_archive('communities')) : ?>
        <div class="interior-page-banner">
            <div class="container">
                <div class="interior-banner-inner">
                    <?php
                    if ( function_exists('yoast_breadcrumb') ) {
                        yoast_breadcrumb( '<span id="breadcrumbs">','</span>' );
                    }
                    ?>
                    <h1 id="community_banner_title" class="banner-title">NEW HOME COMMUNITIES</h1>
                </div>
            </div>
        </div>
<?php elseif (is_page_template( 'page-communities-map.php' )) : ?>
    <div class="interior-page-banner">
        <div class="container">
            <div class="interior-banner-inner">
				<?php
				if ( function_exists('yoast_breadcrumb') ) {
					yoast_breadcrumb( '<span id="breadcrumbs">','</span>' );
				}
				?>
                <h1 id="community_banner_title" class="banner-title">NEW HOME COMMUNITIES</h1>
            </div>
        </div>
    </div>
<?php elseif (is_post_type_archive('homes')) : ?>
    <div class="interior-page-banner">
        <div class="container">
            <div class="interior-banner-inner">
				<?php
				if ( function_exists('yoast_breadcrumb') ) {
					yoast_breadcrumb( '<span id="breadcrumbs">','</span>' );
				}
				?>
                <h1 id="homes_banner_title" class="banner-title">NEW AVAILABLE HOMES</h1>
            </div>
        </div>
    </div>
<?php elseif (is_page_template( 'page-homes-map.php' )) : ?>
    <div class="interior-page-banner">
        <div class="container">
            <div class="interior-banner-inner">
				<?php
				if ( function_exists('yoast_breadcrumb') ) {
					yoast_breadcrumb( '<span id="breadcrumbs">','</span>' );
				}
				?>
                <h1 id="homes_banner_title" class="banner-title">NEW AVAILABLE HOMES</h1>
            </div>
        </div>
    </div>
<?php elseif (is_post_type_archive('home-design')) : ?>
    <div class="interior-page-banner">
        <div class="container">
            <div class="interior-banner-inner">
				<?php
				if ( function_exists('yoast_breadcrumb') ) {
					yoast_breadcrumb( '<span id="breadcrumbs">','</span>' );
				}
				?>
                <span id="floorplan_banner_title" class="banner-title">NEW HOME FLOORPLANS</span>
            </div>
        </div>
    </div>
<?php endif; ?>




