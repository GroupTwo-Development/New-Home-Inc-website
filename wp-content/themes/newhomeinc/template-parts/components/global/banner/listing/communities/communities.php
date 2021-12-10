<?php if(is_post_type_archive('communities')) : ?>
        <div class="interior-page-banner">
            <div class="container">
                <div class="interior-banner-inner">
                    <?php
                    if ( function_exists('yoast_breadcrumb') ) {
                        yoast_breadcrumb( '<span id="breadcrumbs">','</span>' );
                    }
                    ?>
                    <span class="banner-title">NEW HOME COMMUNITIES</span>
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
                <span class="banner-title">NEW AVAILABLE HOMES</span>
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
                <span class="banner-title">NEW HOME FLOORPLANS</span>
            </div>
        </div>
    </div>
<?php endif; ?>




