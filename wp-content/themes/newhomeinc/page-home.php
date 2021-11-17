<?php
/**
 * Template Name: Home Page
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
		<?php get_template_part('template-parts/components/homepage/content/banner'); ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part('template-parts/components/homepage/homepageIndex'); ?>
		<?php endwhile; // End of the loop. ?>
	</main><!-- #main -->
<?php
get_footer();
