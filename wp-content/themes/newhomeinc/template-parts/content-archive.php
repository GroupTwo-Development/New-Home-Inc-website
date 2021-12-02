<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package New_Home_Inc
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
                    newhomeinc_posted_on();
                    $categories_list = get_the_category_list( esc_html__( ', ', 'newhomeinc' ) );
                    if ( $categories_list ) {
                        /* translators: 1: list of categories. */
                        printf( '<span class="cat-links">' . esc_html__( ' in %1$s', 'newhomeinc' ) . '</span>', $categories_list );
                    }
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php newhomeinc_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
            $excerpt = get_the_excerpt();

            $excerpt = substr($excerpt, 0, 205);
            $result = substr($excerpt, 0, strrpos($excerpt, ' '));
            echo $result;


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

</article><!-- #post-<?php the_ID(); ?> -->
<hr class="blog-post-hr section_bottom-hr">
