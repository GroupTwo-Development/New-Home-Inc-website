<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package New_Home_Inc
 */

get_header();
?>

	<main id="primary" class="site-main pt-5">
        <div class="container justify-content-center">
            <section class="error-404 not-found pt-5">
                <div class="page-content justify-content-center pt-5">
                    <header class="page-header justify-content-center">
                        <h1 class="page-title"><?php esc_html_e( 'Oops! Page Not Found', 'newhomeinc' ); ?></h1>
                    </header><!-- .page-header -->
                    <p><?php esc_html_e( "We can't find the page you are looking for.", 'newhomeinc' ); ?></p>
                    <a class="section-btn sectionOne-btn" href="/communities">Back to Communities</a>

                </div><!-- .page-content -->
            </section><!-- .error-404 -->
        </div>
	</main><!-- #main -->

<?php
get_footer();
