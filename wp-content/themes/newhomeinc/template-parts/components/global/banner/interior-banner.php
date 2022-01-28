<div class="interior-page-banner">
	<div class="container">
        <div class="interior-banner-inner">
	       <div class="breadcrumb-area">
		       <?php
		       if ( function_exists('yoast_breadcrumb') ) {
			       yoast_breadcrumb( '<span id="breadcrumbs">','</span>' );
		       }
		       ?>
           </div>

            <?php if(is_singular('post')) : ?>
                 <h1 class="banner-title">NEW HOME INC.  <?php echo esc_html('BLOG') ?></h1>
            <?php else : ?>
                <h1 class="banner-title">NEW HOME INC.  <?php single_post_title(); ?></h1>
            <?php endif; ?>
        </div>
	</div>
</div>