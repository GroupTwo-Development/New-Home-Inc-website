<?php
    $featured_image = get_field('featured_image');

    $img_src = wp_get_attachment_image_url( $featured_image['id'], 'Large' );
    $img_srcset = wp_get_attachment_image_srcset( $featured_image['id'], 'Large' );
?>
<?php if($featured_image) : ?>
    <div class="main-gallery_area"  data-aos="zoom-in-up" data-aos-duration="800">
        <div id="detail-page-gallery" class="detail-page-gallery">
            <img src="<?php echo esc_url( $img_src ); ?>"
                 class="img-fluid"
                 srcset="<?php echo esc_attr( $img_srcset ); ?>"
                 alt="">
<!--            <img class="img-fluid" src="--><?php //echo $featured_image['url']; ?><!--"  alt="--><?php //echo $featured_image['alt']; ?><!--"/>-->
            <div id="gallery_zoom-icon" class="gallery-icon">
                <img src="https://newhomeinc1dev.wpengine.com/wp-content/uploads/2022/01/icon-camera.png" class="img-fluid" alt="gallery icon" role="img">
            </div>
        </div>
    </div>
<?php endif; ?>