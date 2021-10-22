<?php
/*
Plugin Name: Display PHP Version
Description: Displays the current PHP version in the "At a Glance" admin dashboard widget.
Version: 1.7
Author: David Gwyer
Author URI: http://www.wpgoplugins.com
*/

/*  Copyright 2009 David Gwyer (email : david@wpgoplugins.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

function dpv_enqueue_script( $hook ) {

	// only run on dashboard page
	if ( 'index.php' !== $hook ) {
		return;
	}

	// enqueue script to show PHP version
	wp_enqueue_script( 'dpv_script', plugin_dir_url( __FILE__ ) . 'dpv.js', array(), 1.7 );

  // Remove '5.5.5-' prefix on Windows OS.
  $fullver = mysqli_get_server_info( mysqli_connect( DB_HOST, DB_USER, DB_PASSWORD, DB_NAME ) );
  $pattern = '/^5.5.5-/i';
  $mysqlver = preg_replace($pattern, '', $fullver);

	// pass the PHP version to JavaScript
	wp_localize_script( 'dpv_script', 'dpvObj', array(
		'phpversion' => phpversion(),
    'mysqlversion' =>   $mysqlver
	) );
}
add_action( 'admin_enqueue_scripts', 'dpv_enqueue_script' );

// Add donation link.
add_filter( 'plugin_action_links_display-php-version/display-php-version.php', function ( $links ) {

	// Create the link.
	$settings_link = "<a title='Please help support our open source work!' href='https://www.paypal.com/biz/fund?id=6EW7V4MWJP8ZE' target='_blank'>Donate</a>";
	// Adds the link to the end of the array.
	array_push(
		$links,
		$settings_link
	);
	return $links;
} );
