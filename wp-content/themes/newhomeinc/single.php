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
	    <?php  get_template_part( 'template-parts/components/global/banner/interior-banner');  ?>
	    <?php get_template_part( 'template-parts/components/global/banner/blog-post-filter');  ?>

        <div class="single_post-area">
            <div class="container">
	            <?php while ( have_posts() ) : the_post();

		            get_template_part( 'template-parts/content', get_post_type() );

		            the_post_navigation(
			            array(
				            'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'newhomeinc' ) . '</span> <span class="nav-title">%title</span>',
				            'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'newhomeinc' ) . '</span> <span class="nav-title">%title</span>',
			            )
		            );
	            endwhile; // End of the loop.
	            ?>
            </div>
        </div>
    </main><!-- #main -->
<?php
get_footer();