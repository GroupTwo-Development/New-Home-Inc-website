<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package New_Home_Inc
 */

get_header();
?>
	<main id="primary" class="site-main blog-index">
	        <?php if ( have_posts() ) : ?>
		        <?php  get_template_part( 'template-parts/components/global/banner/interior-banner');  ?>
		        <?php get_template_part( 'template-parts/components/global/banner/post-filter');  ?>
		        <?php while ( have_posts() ) : the_post(); ?>
                     <div id="blog-post-list">
                        <div class="container">
                            <div class="row align-items-center">
                                <?php get_template_part( 'template-parts/content', 'blog' ); ?>
                            </div>
                        </div>
                     </div>
		        <?php endwhile; ?>
                <div class="container">
                    <?php echo do_shortcode('[facetwp pager="true"]'); ?>
                </div>
            <?php
	        else :
		        get_template_part( 'template-parts/content', 'none' );
	        endif;
	        ?>
	</main><!-- #main -->
<?php
get_footer();
