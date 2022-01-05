<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package New_Home_Inc
 */

get_header();
?>

	<main id="primary" class="site-main">
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
                    <span class="banner-title"><?php the_archive_title(); ?></span>
                </div>
            </div>
        </div>
		<?php get_template_part( 'template-parts/components/global/banner/blog-post-filter');  ?>


        <div class="post-archive-area">
	        <?php if ( have_posts() ) : ?>

                <div class="container">
	                <?php
	                /* Start the Loop */
	                while ( have_posts() ) :
		                the_post();

		                /*
						 * Include the Post-Type-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
						 */
		                get_template_part( 'template-parts/content', 'archive');

	                endwhile;

	                the_posts_navigation();

	                else :

		                get_template_part( 'template-parts/content', 'none' );

	                endif;
	                ?>
                </div>
        </div>
	</main><!-- #main -->

<?php
get_footer();
