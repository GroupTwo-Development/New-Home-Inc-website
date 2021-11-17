<?php  $banner_data = homepage_banner_data(); ?>
<section id="homepage-banner" class="homepage-banner" style="background-image: url('<?php echo get_image_src_from_id('home_page_banner_image'); ?>')">
    <div class="container">
        <!-- homepage-banner-title component -->
        <div class="homepage-banner-content">
            <span class="banner-title"><?php echo $banner_data['bannerTitle'] ?></span>
            <span class="banner-subtitle"><?php echo $banner_data['bannerSubtitle'] ?></span>
            <a href="<?php echo esc_html($banner_data['bannerCta']['url']); ?>" class="homepage-banner-btn"><?php echo esc_html($banner_data['bannerCta']['title']); ?></a>
        </div>
    </div>

    <div class="homepage-banner-logo">
        <img class="lozad" data-src="<?php echo $banner_data['bannerLogoImage']['url']; ?>" alt="<?php echo $banner_data['bannerLogoImage']['alt']; ?>">
    </div>
</section>