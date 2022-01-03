<?php
     function get_post_communities_type($post_type, $post_per_page){
	     $args = array(
		     'post_type' => $post_type,
		     'post_status'   => 'publish',
		     'post_per_page' => $post_per_page,
		     'orderby'   => 'title',
		     'order'  => 'ASC',
	     );
		 return get_posts($args);
     }

	 function community_gallery($gallery_id, $featured_image){
		 $gallery = get_field($gallery_id);
		 $featured_image = get_field($featured_image);
		 ?>
	        <?php if($gallery) : ?>
				    <div id="community-gallery" class="community_img_slider">
                         <div class="splide__track">
                             <ul class="splide__list">
                                 <?php foreach ($gallery as $gallery_item) : ?>
                                     <li class="splide__slide">
                                         <img src="<?php echo $gallery_item['url']; ?>" alt="<?php echo $gallery_item['alt']; ?>" class="img-fluid">
                                     </li>
                                 <?php endforeach; ?>
                             </ul>
                         </div>
			        </div>
		        <?php else : ?>
			        <img src="<?php echo $featured_image['url']; ?>" class="card-img-top img-fluid" alt="<?php echo $featured_image['alt']; ?>">
		    <?php endif; ?>
		 <?php
	 }

    function communities_archive_per_page( $query ) {
        if( $query->is_main_query()  && is_post_type_archive( 'communities' ) ) {
            $query->set( 'posts_per_page', '6' );
            $query->set( 'orderby', 'title' );
            $query->set( 'order', 'DESC' );
        }
    }
    add_filter( 'pre_get_posts', 'communities_archive_per_page' );



