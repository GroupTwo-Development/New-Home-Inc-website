<?php
    $smart_data = smart_home_tech();
    $video_area_content = $smart_data['video_area_content'];


?>
<section id="intro-content" class="intro-content pt-4 pb-5">
    <div class="container">
        <header class="intro-content-header">
            <div class="intro-content-header-icon">
                <img class="img-fluid" src="<?php  echo $smart_data['intro_content_logo']['url'];?>" alt="<?php  echo $smart_data['intro_content_logo']['alt'];?>">
            </div>
            <div class="content">
		        <?php  echo $smart_data['header_intro_content'];?>
            </div>
        </header>
    </div>
</section>

<section class="main-content-area pt-3 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="main-content">
	                <?php  echo $smart_data['main_content'];?>
                </div>
            </div>


            <div class="col-lg-6">
                <div class="main-content-img">
                    <img src="<?php  echo $smart_data['main_content_image']['url']; ?>" alt="<?php  echo $smart_data['main_content_image']['alt']; ?>">
                </div>
            </div>
        </div>
    </div>
</section>

<section id="main-content-area" class="main-content-area">
    <div class="container">
            <?php
                $generate_classes = 0;
            ?>
            <?php while( have_rows('smart_home_main_content') ): the_row();
	            $images = get_sub_field('main_section_image');
                $main_content = get_sub_field('main_section_content');
                $main_section_content_title = get_sub_field('main_section_content_title');
	            $generate_classes++

            ?>

	            <?php if( get_row_index() % 2 == 0 ) : ?>
                    <div class="row evens d-flex justify-content-center mobile-order-<?php echo $generate_classes++; ?>">

                        <div class="col-lg-6 first-order-<?php echo $generate_classes++; ?>">
                            <header class="main-content--content">
                                <h5><?php echo $main_section_content_title; ?></h5>
                               <div class="content">
                                   <p><?php echo $main_content; ?></p>
                               </div>
                            </header>
                        </div>

                        <div class="col-lg-6 first-order-<?php echo $generate_classes++; ?>">
                            <div class="main-content-img">
                                <img class="img-fluid lozad" data-src="<?php echo $images['url']; ?>" alt="<?php echo $images['alt']; ?>">
                            </div>
                        </div>
                    </div>

	            <?php else : ?>

                   <div class="row odds d-flex justify-content-center mobile-order-two-<?php echo $generate_classes++; ?>">
                       <div class="col-lg-6 first-order-<?php echo $generate_classes++; ?>">
                           <div class="main-content-img">
                               <img class="img-fluid lozad" data-src="<?php echo $images['url']; ?>" alt="<?php echo $images['alt']; ?>">
                           </div>
                       </div>

                       <div class="col-lg-6 first-order-<?php echo $generate_classes++; ?>">
                           <header class="main-content--content">
                               <h5><?php echo $main_section_content_title; ?></h5>
                               <div class="content">
                                   <p><?php echo $main_content; ?></p>
                               </div>
                           </header>
                       </div>

                   </div>
	            <?php endif; ?>
           <?php endwhile; ?>
    </div>
</section>

<?php if($video_area_content):  ?>
	<?php

        preg_match('/src="(.+?)"/', $video_area_content, $matches_url );
        $src = $matches_url[1];

        preg_match('/embed(.*?)?feature/', $src, $matches_id );
        $id = $matches_id[1];
        $id = str_replace( str_split( '?/' ), '', $id );
	?>
    <section class="smart-tech-video">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                  <div id="smart-tech-youtube-video" class="smart-tech-youtube-video">
                      <a
                          href="#"
                          data-lg-size="1280-720"
                          data-src="//www.youtube.com/watch?v=<?php echo $id; ?>"
                          data-poster="https://img.youtube.com/vi/<?php echo $id; ?>/maxresdefault.jpg"
                          data-sub-html="<h4>New Home Inc. - Video Gallery  |  Welcome to New Home Inc.</p>"
                      >
                          <img
                              class="img-responsive"
                              src="https://img.youtube.com/vi/<?php echo $id; ?>/maxresdefault.jpg"
                              alt=""
                          />
                          <div class="overlay-area">
                              <span class="overlay-title"><i class="far fa-play-circle"></i></span>
                          </div>
                      </a>
                  </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>