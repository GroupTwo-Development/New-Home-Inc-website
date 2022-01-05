<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package New_Home_Inc
 */

?>
<div class="col-md-6 col-lg-4">
    <div class="card" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="card-img">
            <?php newhomeinc_post_thumbnail(); ?>
        </div>
        <div class="card-body">
            <header class="entry-header">
                <?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
                <div class="entry-meta">
                    <?php
                    newhomeinc_posted_on();
                    //		        newhomeinc_posted_by();
                    $categories_list = get_the_category_list( esc_html__( ', ', 'newhomeinc' ) );
                    if ( $categories_list ) {
                        /* translators: 1: list of categories. */
                        printf( '<span class="cat-links">' . esc_html__( ' in %1$s', 'newhomeinc' ) . '</span>', $categories_list );
                    }
                    ?>
                </div><!-- .entry-meta -->
            </header><!-- .entry-header -->



            <div class="entry-content">
                <?php
                $excerpt = get_the_excerpt();

                $excerpt = substr($excerpt, 0, 205);
                $result = substr($excerpt, 0, strrpos($excerpt, ' '));
                echo $result;
                //			the_content(
                //				sprintf(
                //					wp_kses(
                //					/* translators: %s: Name of current post. Only visible to screen readers */
                //						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'newhomeinc' ),
                //						array(
                //							'span' => array(
                //								'class' => array(),
                //							),
                //						)
                //					),
                //					wp_kses_post( get_the_title() )
                //				)
                //			);

                wp_link_pages(
                    array(
                        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'newhomeinc' ),
                        'after'  => '</div>',
                    )
                );
                ?>
            </div><!-- .entry-content -->
            <div class="entry-content-footer">
                <a href="<?php the_permalink(); ?>" class="section-btn blog-post-btn"><?php echo esc_html('Read More')?></a>
            </div>
        </div>
    </div>
</div>