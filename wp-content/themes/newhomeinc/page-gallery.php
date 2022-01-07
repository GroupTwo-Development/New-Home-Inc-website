<?php
/**
 * Template Name: Gallery
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package New_Home_Inc
 */

get_header();
?>

	<main id="primary" class="site-main">
		<?php  get_template_part( 'template-parts/components/global/banner/banner-dynamic-title');  ?>
		<?php get_template_part( 'template-parts/components/navigations/gallery');  ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<section id="gallery" class="gallery-component pt-5">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="gallery_content">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
		<?php endwhile; // End of the loop.?>
	</main><!-- #main -->
<?php
get_footer();
