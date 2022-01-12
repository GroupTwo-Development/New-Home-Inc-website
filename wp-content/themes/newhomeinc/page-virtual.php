<?php
/**
 * Template Name: Virtual
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
			<section id="gallery" class="gallery-component virtual-page pt-3">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="gallery_content virtual-content">
	                            <?php if( have_rows('virtual_tours') ):
		                            $i = 1;
		                            ?>
		                            <?php while( have_rows('virtual_tours') ) : the_row();
		                            $tour_name = get_sub_field('tour_name');
		                            $tour_code = get_sub_field('tour_code');
		                            ?>
                                    <header class=" virtual-tour-header pb-1">
                                        <h2><?php echo $tour_name; ?></h2>
                                    </header>
                                    <div class="embed-container">
			                            <?php echo $tour_code; ?>
                                    </div>

		                            <?php $i++; endwhile; ?>
	                            <?php endif; ?>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
		<?php endwhile; // End of the loop.?>
	</main><!-- #main -->
<?php
get_footer();
