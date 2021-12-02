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

/**
 * Implement default core functions.
 */
require get_template_directory() . '/inc/functions/default-functions.php';

/**
 * Register Widgets.
 */
require get_template_directory() . '/inc/functions/register-widgets.php';

/**
 * Enqueue Scripts and Styles.
 */
require get_template_directory() . '/inc/functions/enqueue-script-style.php';

/**
 * Home page site data.
 */
require get_template_directory() . '/inc/functions/siteData/export_data.php';

/**
 * Home page site data.
 */
require get_template_directory() . '/inc/functions/siteData/global/siteglobaldata.php';

/**
 * Site CTA
 */
require get_template_directory() . '/inc/functions/customFunctions/AskAQuestionCTA.php';


/**
 * Site Custom Function.
 */
require get_template_directory() . '/inc/functions/customFunctions/siteCustomFunction.php';

/**
 * Custom Login  additions.
 */
require get_template_directory() . '/inc/functions/customLogin.php';

/**
 * Bootstrap Navwalker  additions.
 */
require get_template_directory() . '/inc/functions/class-wp-bootstrap-navwalker.php';

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
 * Site Core custom Function.
 */
require get_template_directory() . '/inc/functions/customFunctions/Corefunction.php';

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

//if ( is_admin_bar_showing() ) {     echo '<style type="text/css"> nav {margin-top: 32px;} </style>'; }
//
//
//


