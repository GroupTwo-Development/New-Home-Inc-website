<?php
/**
 * New Home Inc functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package New_Home_Inc
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'newhomeinc_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function newhomeinc_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on New Home Inc, use a find and replace
		 * to change 'newhomeinc' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'newhomeinc', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'newhomeinc' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'newhomeinc_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'newhomeinc_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function newhomeinc_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'newhomeinc_content_width', 640 );
}
add_action( 'after_setup_theme', 'newhomeinc_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function newhomeinc_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'newhomeinc' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'newhomeinc' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'newhomeinc_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function newhomeinc_scripts() {
	wp_enqueue_style( 'newhomeinc-style', get_template_directory_uri() . '/build/css/style.css', array(), _S_VERSION );
	// wp_style_add_data( 'newhomeinc-style', 'rtl', 'replace' );

	wp_enqueue_script( 'newhomeinc-app', get_template_directory_uri() . '/build/js/app.js', array(), _S_VERSION, true );

	wp_enqueue_script( 'newhomeinc-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'newhomeinc_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}



add_action( 'generate_rewrite_rules', 'register_homes_rewrite_rules' );
function register_homes_rewrite_rules( $wp_rewrite ) {
	$new_rules = array(
		'homes/([^/]+)/?$' => 'index.php?home-category=' . $wp_rewrite->preg_index( 1 ),
		'homes/([^/]+)/([^/]+)/?$' => 'index.php?post_type=homes&home-category=' . $wp_rewrite->preg_index( 1 ) . '&homes=' . $wp_rewrite->preg_index( 2 ),
		'homes/([^/]+)/([^/]+)/page/(\d{1,})/?$' => 'index.php?post_type=homes&home-category=' . $wp_rewrite->preg_index( 1 ) . '&paged=' . $wp_rewrite->preg_index( 3 ),
		'homes/([^/]+)/([^/]+)/([^/]+)/?$' => 'index.php?post_type=homes&home-category=' . $wp_rewrite->preg_index( 2 ) . '&homes=' . $wp_rewrite->preg_index( 3 ),
	);

	$wp_rewrite->rules = $new_rules + $wp_rewrite->rules;
}

function fix_homes_subcategory_query($query): array {
	if ( isset( $query['post_type'] ) && 'homes' == $query['post_type'] ) {
		if ( isset( $query['homes'] ) && $query['homes'] && isset( $query['home-category'] ) && $query['home-category'] ) {
			$query_old = $query;
			// Check if this is a paginated result(like search results)
			if ( 'page' == $query['home-category'] ) {
				$query['paged'] = $query['name'];
				unset( $query['home-category'], $query['name'], $query['homes'] );
			}
			// Make it easier on the DB
			$query['fields'] = 'ids';
			$query['posts_per_page'] = 1;

			// See if we have results or not
			$_query = new WP_Query( $query );
			if ( ! $_query->posts ) {
				$query = array( 'home-category' => $query['homes'] );
				if ( isset( $query_old['home-category'] ) && 'page' == $query_old['home-category'] ) {
					$query['paged'] = $query_old['name'];
				}
			}
		}
	}
	return $query;
}
add_filter( 'request', 'fix_homes_subcategory_query', 10 );


function homes_article_permalink( $article_id, $section_id = false, $leavename = false, $only_permalink = false ) {
	$taxonomy = 'home-category';
	$article = get_post( $article_id );

	$return = '<a href="';
	$permalink = ( $section_id ) ? trailingslashit( get_term_link( intval( $section_id ), 'home-category' ) ) : home_url( '/homes/' );
	$permalink .= trailingslashit( ( $leavename ? "%$article->post_type%" : $article->post_name ) );
	$return .= $permalink . '/" >' . get_the_title( $article->ID ) . '</a>';
	return ( $only_permalink ) ? $permalink : $return;
}

function filter_homes_post_link( $permalink, $post, $leavename ) {
	if ( get_post_type( $post->ID ) == 'homes' ) {
		$terms = wp_get_post_terms( $post->ID, 'home-category' );
		$term = ( $terms ) ? $terms[0]->term_id : false;
		$permalink = homes_article_permalink( $post->ID, $term, $leavename, true );
	}
	return $permalink;
}
add_filter( 'post_type_link', 'filter_homes_post_link', 100, 3 );

function filter_homes_section_terms_link( $termlink, $term, $taxonomy = false ) {
	if ( $taxonomy == 'home-category' ) {
		$section_ancestors = get_ancestors( $term->term_id, $taxonomy );
		krsort( $section_ancestors );
		$termlink =  home_url( '/homes/' );
		foreach ( $section_ancestors as $ancestor ) {
			$section_ancestor = get_term( $ancestor, $taxonomy );
			$termlink .= $section_ancestor->slug . '/';
		}
		$termlink .= trailingslashit( $term->slug );
//		var_dump($termlink);
	}

	return $termlink;
}
add_filter( 'term_link', 'filter_homes_section_terms_link', 100, 3 );



function update_custom_terms($post_id) {

	// only update terms if it's a post-type-B post
	if ( 'communities' != get_post_type($post_id)) {
		return;
	}

	// don't create or update terms for system generated posts
	if (get_post_status($post_id) == 'auto-draft') {
		return;
	}

	/*
	* Grab the post title and slug to use as the new
	* or updated term name and slug
	*/
	$term_title = get_the_title($post_id);
	$term_slug = get_post( $post_id )->post_name;

	/*
	* Check if a corresponding term already exists by comparing
	* the post ID to all existing term descriptions.
	*/
	$existing_terms = get_terms('floorplan-category', array(
			'hide_empty' => false
		)
	);

	foreach($existing_terms as $term) {
		if ($term->description == $post_id) {
			//term already exists, so update it and we're done
			wp_update_term($term->term_id, 'floorplan-category', array(
					'name' => $term_title,
					'slug' => $term_slug
				)
			);
			return;
		}
	}

	/*
	* If we didn't find a match above, this is a new post,
	* so create a new term.
	*/
	wp_insert_term($term_title, 'floorplan-category', array(
			'slug' => $term_slug,
			'description' => $post_id
		)
	);
}

//run the update function whenever a post is created or edited
add_action('save_post', 'update_custom_terms');



function update_qmi_custom_terms($post_id) {

	// only update terms if it's a post-type-B post
	if ( 'communities' != get_post_type($post_id)) {
		return;
	}

	// don't create or update terms for system generated posts
	if (get_post_status($post_id) == 'auto-draft') {
		return;
	}

	/*
	* Grab the post title and slug to use as the new
	* or updated term name and slug
	*/
	$term_title = get_the_title($post_id);
	$term_slug = get_post( $post_id )->post_name;

	/*
	* Check if a corresponding term already exists by comparing
	* the post ID to all existing term descriptions.
	*/
	$existing_terms = get_terms('home-category', array(
			'hide_empty' => false
		)
	);

	foreach($existing_terms as $term) {
		if ($term->description == $post_id) {
			//term already exists, so update it and we're done
			wp_update_term($term->term_id, 'home-category', array(
					'name' => $term_title,
					'slug' => $term_slug
				)
			);
			return;
		}
	}

	/*
	* If we didn't find a match above, this is a new post,
	* so create a new term.
	*/
	wp_insert_term($term_title, 'home-category', array(
			'slug' => $term_slug,
			'description' => $post_id
		)
	);
}

//run the update function whenever a post is created or edited
add_action('save_post', 'update_qmi_custom_terms');




function wfp_documents_setup_id_incr() {

	// Check if user has rights to set it up and ACF is enabled.
	if (function_exists( 'get_field' ) ):

		// Initial value
		// === YOU NEED TO UPDATE HERE ===
		// Replace <code>custom_invoice_id</code> with your desired id name.
		add_option( 'custom_invoice_id', '2252', '', 'yes' );

		/**
		 * Wrapper to get the id (if i would need to add something to it)
		 * @return mixed|void – stored next available id
		 */
		function wfp_get_current_invoice_id() {
			return get_option( 'custom_invoice_id' );
		}

		/**
		 * Count up the id by one and update the globally stored id
		 */
		function wfp_increase_invoice_id() {
			$curr_invoice_id = get_option( 'custom_invoice_id');
			$next_invoice_id = intval( $curr_invoice_id ) + 1;
			update_option( 'custom_invoice_id', $next_invoice_id );
		}

		/**
		 * Populate the acf field when loading it.
		 */
		function wfp_auto_get_current_document_id( $value, $post_id, $field ) {
			// If the custom field already has a value in it, just return this one (we don't want to overwrite it every single time)
			if ( $value !== null && $value !== "" ) {
				return $value;
			}

			// If the field is empty, get the currently stored next available id and fill it in the field.
			$value = wfp_get_current_invoice_id();

			return $value;
		}

		// Use ACF hooks to populate the field on load
		// ==== YOU NEED TO UPDATE HERE ====
		// Replace <code>invoice_id</code> with the name of your field.
		add_filter( 'acf/load_value/name=subdivisionnumber_id', 'wfp_auto_get_current_document_id', 10, 3 );

		/**
		 * Registers function to check if the globally stored id needs to be updated after a post is saved.
		 */
		function wfp_acf_save_post( $post_id ) {
			// Check if the post had any ACF to begin with.
			if ( ! isset( $_POST['acf'] ) ) {
				return;
			}

			$fields = $_POST['acf'];

			// Only move to the next id when any ACF fields were added to that post, otherwise this might be an accident and would skip an id.
			if ( $_POST['_acf_changed'] == 0 ) {
				return;
			}

			// Next we need to find the field out id is stored in
			foreach ( $fields as $field_key => $value ) {
				$field_object = get_field_object( $field_key );

				/**
				 * If we found our field and the value of that field is the same as our currently "next available id" –
				 * we need to increase this id, so the next post doesn't use the same id.
				 */
				if ( $field_object['name'] == "subdivisionnumber_id"
				     && wfp_get_current_invoice_id() == $value ) {
					wfp_increase_invoice_id();

					return;
				}
			}
		}

		// Use a hook to run this function every time a post is saved.
		add_action( 'acf/save_post', 'wfp_acf_save_post', 20 );

		/**
		 * The code below just displays the currently stored next id on an acf-options-page,
		 * so it's easy to see which id you're on. The field is disabled to prevent easy tinkering with the id.
		 */
		function wfp_load_current_document_ids_settingspage( $value, $postid, $field ) {
			if ( $field['name'] == "document_ids-group_current_invoice_id" ) {
				return wfp_get_current_invoice_id();
			}

			return $value;
		}

		function wfp_disable_acf_field( $field ) {
			$field['disabled'] = true;

			return $field;
		}
//
//		add_filter('acf/load_field/name=subdivisionnumber_id', 'wfp_disable_acf_field');

		add_filter( 'acf/load_field/name=current_invoice_id', 'wfp_disable_acf_field', 10, 3 );
		add_filter( 'acf/load_value/name=current_invoice_id', 'wfp_load_current_document_ids_settingspage', 10, 3 );

	endif;
}

add_action( 'init', 'wfp_documents_setup_id_incr' );


function wfp_floorplan_documents_setup_id_incr() {

	// Check if user has rights to set it up and ACF is enabled.
	if (function_exists( 'get_field' ) ):

		// Initial value
		// === YOU NEED TO UPDATE HERE ===
		// Replace <code>custom_invoice_id</code> with your desired id name.
		add_option( 'floorplan_unique_identifier', '1152', '', 'yes' );

		/**
		 * Wrapper to get the id (if i would need to add something to it)
		 * @return mixed|void – stored next available id
		 */
		function floorplan_p_get_current_invoice_id() {
			return get_option( 'floorplan_unique_identifier' );
		}

		/**
		 * Count up the id by one and update the globally stored id
		 */
		function floor_wfp_increase_invoice_id() {
			$curr_invoice_id = get_option( 'floorplan_unique_identifier');
			$next_invoice_id = intval( $curr_invoice_id ) + 1;
			update_option( 'floorplan_unique_identifier', $next_invoice_id );
		}

		/**
		 * Populate the acf field when loading it.
		 */
		function floorplan_wfp_auto_get_current_document_id( $value, $post_id, $field ) {
			// If the custom field already has a value in it, just return this one (we don't want to overwrite it every single time)
			if ( $value !== null && $value !== "" ) {
				return $value;
			}

			// If the field is empty, get the currently stored next available id and fill it in the field.
			$value = floorplan_p_get_current_invoice_id();

			return $value;
		}

		// Use ACF hooks to populate the field on load
		// ==== YOU NEED TO UPDATE HERE ====
		// Replace <code>invoice_id</code> with the name of your field.
		add_filter( 'acf/load_value/name=plan_number_id', 'wfp_auto_get_current_document_id', 10, 3 );

		/**
		 * Registers function to check if the globally stored id needs to be updated after a post is saved.
		 */
		function floorplan_wfp_acf_save_post( $post_id ) {
			// Check if the post had any ACF to begin with.
			if ( ! isset( $_POST['acf'] ) ) {
				return;
			}

			$fields = $_POST['acf'];

			// Only move to the next id when any ACF fields were added to that post, otherwise this might be an accident and would skip an id.
			if ( $_POST['_acf_changed'] == 0 ) {
				return;
			}

			// Next we need to find the field out id is stored in
			foreach ( $fields as $field_key => $value ) {
				$field_object = get_field_object( $field_key );

				/**
				 * If we found our field and the value of that field is the same as our currently "next available id" –
				 * we need to increase this id, so the next post doesn't use the same id.
				 */
				if ( $field_object['name'] == "plan_number_id"
				     && floorplan_p_get_current_invoice_id() == $value ) {
					floorplan_wfp_increase_invoice_id();

					return;
				}
			}
		}

		// Use a hook to run this function every time a post is saved.
		add_action( 'acf/save_post', 'wfp_acf_save_post', 20 );

		/**
		 * The code below just displays the currently stored next id on an acf-options-page,
		 * so it's easy to see which id you're on. The field is disabled to prevent easy tinkering with the id.
		 */
		function floorplan_wfp_load_current_document_ids_settingspage( $value, $postid, $field ) {
			if ( $field['name'] == "document_ids-group_current_invoice_id" ) {
				return floorplan_p_get_current_invoice_id();
			}

			return $value;
		}

		function floorlan_wfp_disable_acf_field( $field ) {
			$field['disabled'] = true;

			return $field;
		}
//
//		add_filter('acf/load_field/name=subdivisionnumber_id', 'wfp_disable_acf_field');

		add_filter( 'acf/load_field/name=current_invoice_id', 'floorlan_wfp_disable_acf_field', 10, 3 );
		add_filter( 'acf/load_value/name=current_invoice_id', 'floorplan_wfp_load_current_document_ids_settingspage', 10, 3 );

	endif;
}

add_action( 'init', 'wfp_floorplan_documents_setup_id_incr' );



