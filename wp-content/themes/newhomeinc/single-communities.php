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
		<?php get_template_part( 'template-parts/components/communities/details-page/content', 'header'); ?>
		<?php get_template_part( 'template-parts/components/communities/details-page/content', 'gallery'); ?>
		<?php get_template_part( 'template-parts/components/communities/details-page/content', 'links'); ?>
	        <?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'template-parts/components/communities/details-page/content', 'mainSpec'); ?>
	        <?php endwhile; // End of the loop.?>
	</main><!-- #main -->
<?php
get_footer();
