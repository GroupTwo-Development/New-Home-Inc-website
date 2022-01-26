
<?php $elevation_image = get_field('elevation_image'); ?>
<div class="elevation-component">
    <div class="container">
        <div class="row">
            <div class="offset-lg-2 col-lg-8 offset-lg-2">
                <div class="elevation-gallery-area pt-2 pb-5 text-center">
                    <div class="flex flex-wrap gap-5 justify-center max-w-5xl mx-auto px-6 elevation-gallery-item">
					    <?php  foreach ($elevation_image as $single_image) : ?>
                            <a data-fancybox="gallery" href="<?php echo esc_url($single_image['url']); ?>">
                                <img class="img-fluid" src="<?php echo esc_url($single_image['sizes']['thumbnail']); ?>"  alt="<?php echo $single_image['alt']; ?>"/>
                            </a>
					    <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
