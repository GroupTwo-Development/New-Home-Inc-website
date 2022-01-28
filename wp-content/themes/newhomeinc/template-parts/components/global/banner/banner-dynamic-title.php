<div class="interior-page-banner">
	<div class="container">
        <div class="interior-banner-inner">
	        <?php
	        if ( function_exists('yoast_breadcrumb') ) {
		        yoast_breadcrumb( '<span id="breadcrumbs">','</span>' );
	        }
	        ?>
            <h1 class="banner-title"><?php single_post_title(); ?></h1>
        </div>
	</div>
</div>