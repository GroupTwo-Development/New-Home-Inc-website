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
                 <span class="banner-title">NEW HOME INC.  <?php echo esc_html('BLOG') ?></span>
            <?php else : ?>
                <span class="banner-title">NEW HOME INC.  <?php single_post_title(); ?></span>
            <?php endif; ?>
        </div>
	</div>
</div>