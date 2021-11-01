<?php

function wpdev_filter_login_head() {

	if ( has_custom_logo() ) :

		$image = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' );
		?>
        <style type="text/css">
            .login h1 a {
                background-image: url(<?php echo esc_url( $image[0] ); ?>);
                -webkit-background-size: <?php echo absint( $image[1] )?>px;
                background-size: <?php echo absint( $image[1] ) ?>px;
                height: <?php echo absint( $image[2] ) ?>px;
                width: <?php echo absint( $image[1] ) ?>px;
            }
        </style>
	<?php
	endif;
}

add_action( 'login_head', 'wpdev_filter_login_head', 100 );

function my_login_logo_url() {
	return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
	return get_bloginfo();
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );

//	function redirect_login_page() {
//		$login_page  = home_url( '/login/' );
//		$page_viewed = basename($_SERVER['REQUEST_URI']);
//
//		if( $page_viewed == "wp-login.php" && $_SERVER['REQUEST_METHOD'] == 'GET') {
//			wp_redirect($login_page);
//			exit;
//		}
//	}
//	add_action('init','redirect_login_page');