<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package New_Home_Inc
 */

get_header();
?>

	<main id="primary" class="site-main">
		<?php  get_template_part( 'template-parts/components/global/banner/banner-blog');  ?>
		<?php get_template_part( 'template-parts/components/global/banner/blog-post-filter');  ?>
        <div class="single_post-area">
	        <?php while ( have_posts() ) : the_post(); ?>
                <div class="container">
			        <?php get_template_part( 'template-parts/content', get_post_type() ); ?>
                   <div class="post-navigation-area">
	                   <?php
	                   $chevron_icon = '<i class="fas fa-chevron-left"></i><i class="fas fa-chevron-left"></i>';
	                   $back_to_blog = esc_html('/blog');
	                   $blog_url = '<a href="'.$back_to_blog.'">'.$chevron_icon.' '.esc_html('Back To Blog').'</a>';
	                   echo $blog_url;
	                   ?>
                   </div>
                </div>
	        <?php endwhile; // End of the loop.?>
        </div>
	</main><!-- #main -->
<?php
get_footer();
