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

		<?php while ( have_posts() ) : the_post(); ?>
			<section>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem ea magni necessitatibus perspiciatis! At culpa dicta enim est hic in, iste mollitia nisi nobis porro reiciendis repellat repellendus sed sint voluptate voluptatem voluptatibus! Accusamus atque culpa dignissimos dolorum fugit quos sapiente sint voluptatem. Ab dolore doloremque eaque ex iste molestias officia quia. Consectetur, cumque doloribus eveniet excepturi fuga, nemo nisi perspiciatis quis recusandae reiciendis sunt tempora? Aliquid blanditiis et eveniet exercitationem itaque nam nesciunt provident ratione voluptatem! Aliquam dolor error fugiat nemo non obcaecati voluptate! Aliquid, at beatae debitis deleniti dolorem doloribus ducimus, eos maxime nemo quibusdam recusandae sequi ullam?</p>
            </section>
            <section>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem ea magni necessitatibus perspiciatis! At culpa dicta enim est hic in, iste mollitia nisi nobis porro reiciendis repellat repellendus sed sint voluptate voluptatem voluptatibus! Accusamus atque culpa dignissimos dolorum fugit quos sapiente sint voluptatem. Ab dolore doloremque eaque ex iste molestias officia quia. Consectetur, cumque doloribus eveniet excepturi fuga, nemo nisi perspiciatis quis recusandae reiciendis sunt tempora? Aliquid blanditiis et eveniet exercitationem itaque nam nesciunt provident ratione voluptatem! Aliquam dolor error fugiat nemo non obcaecati voluptate! Aliquid, at beatae debitis deleniti dolorem doloribus ducimus, eos maxime nemo quibusdam recusandae sequi ullam?</p>
            </section>
            <section>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem ea magni necessitatibus perspiciatis! At culpa dicta enim est hic in, iste mollitia nisi nobis porro reiciendis repellat repellendus sed sint voluptate voluptatem voluptatibus! Accusamus atque culpa dignissimos dolorum fugit quos sapiente sint voluptatem. Ab dolore doloremque eaque ex iste molestias officia quia. Consectetur, cumque doloribus eveniet excepturi fuga, nemo nisi perspiciatis quis recusandae reiciendis sunt tempora? Aliquid blanditiis et eveniet exercitationem itaque nam nesciunt provident ratione voluptatem! Aliquam dolor error fugiat nemo non obcaecati voluptate! Aliquid, at beatae debitis deleniti dolorem doloribus ducimus, eos maxime nemo quibusdam recusandae sequi ullam?</p>
            </section>
            <section>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem ea magni necessitatibus perspiciatis! At culpa dicta enim est hic in, iste mollitia nisi nobis porro reiciendis repellat repellendus sed sint voluptate voluptatem voluptatibus! Accusamus atque culpa dignissimos dolorum fugit quos sapiente sint voluptatem. Ab dolore doloremque eaque ex iste molestias officia quia. Consectetur, cumque doloribus eveniet excepturi fuga, nemo nisi perspiciatis quis recusandae reiciendis sunt tempora? Aliquid blanditiis et eveniet exercitationem itaque nam nesciunt provident ratione voluptatem! Aliquam dolor error fugiat nemo non obcaecati voluptate! Aliquid, at beatae debitis deleniti dolorem doloribus ducimus, eos maxime nemo quibusdam recusandae sequi ullam?</p>
            </section>
            <section>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem ea magni necessitatibus perspiciatis! At culpa dicta enim est hic in, iste mollitia nisi nobis porro reiciendis repellat repellendus sed sint voluptate voluptatem voluptatibus! Accusamus atque culpa dignissimos dolorum fugit quos sapiente sint voluptatem. Ab dolore doloremque eaque ex iste molestias officia quia. Consectetur, cumque doloribus eveniet excepturi fuga, nemo nisi perspiciatis quis recusandae reiciendis sunt tempora? Aliquid blanditiis et eveniet exercitationem itaque nam nesciunt provident ratione voluptatem! Aliquam dolor error fugiat nemo non obcaecati voluptate! Aliquid, at beatae debitis deleniti dolorem doloribus ducimus, eos maxime nemo quibusdam recusandae sequi ullam?</p>
            </section>


		<?php endwhile; // End of the loop. ?>
		?>
	</main><!-- #main -->
<?php
get_footer();
