<?php
/**
 * Plugin Name:      G2 Builder Fields
 * Plugin URI:        https://grouptwo.com
 * Description:       Custom plugin for auto generating Community, Plan, and QMI globally.
 * Version:           1.10.3
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author URI:        https://grouptwo.com
 * License:           GPL v2 or later
 * Author:            GroupTwo
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * @package g2builderdfields
 *
 */

/*
{Plugin Name} is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

{Plugin Name} is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with {Plugin Name}. If not, see {URI to Plugin License}.
*/

use Inc\Base\Activate;
use Inc\Base\Deactivate;

// If this file is called directly, Abort!
if(! defined('ABSPATH')){
	die;
}

// Require once the composer Autoload
if(file_exists(dirname(__FILE__) . '/vendor/autoload.php')){
	require_once dirname(__FILE__) . '/vendor/autoload.php';
}

//Define CONSTANTS
define('PLUGIN', plugin_basename(__FILE__) );

/*
 * This code runs during the plugin activation
 */
function activate_grouptwo_builder_fields(){
	Activate::activate();
}

/*
 * This code runs during the plugin deactivation
 */
function deactivate_grouptwo_builder_fields(){
	Deactivate::deactivate();
}

register_activation_hook(__FILE__, 'activate_grouptwo_builder_fields');
register_activation_hook(__FILE__, 'deactivate_grouptwo_builder_fields');

/*
 * Initialize all the core classes of the plugin
 */
if( class_exists('Inc\\Init')){
	Inc\Init::register_services();
}


if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/** Start: Detect ACF Pro plugin. Include if not present. */
if ( !class_exists('acf') ) { // if ACF Pro plugin does not currently exist
	/** Start: Customize ACF path */
	add_filter('acf/settings/path', 'cysp_acf_settings_path');
	function cysp_acf_settings_path( $path ) {
		$path = plugin_dir_path( __FILE__ ) . 'includes/acf/';
		return $path;
	}
	/** End: Customize ACF path */
	/** Start: Customize ACF dir */
	add_filter('acf/settings/dir', 'cysp_acf_settings_dir');
	function cysp_acf_settings_dir( $path ) {
		$dir = plugin_dir_url( __FILE__ ) . 'includes/acf/';
		return $dir;
	}
	/** End: Customize ACF path */
	/** Start: Hide ACF field group menu item */
//	add_filter('acf/settings/show_admin', '__return_false');
	/** End: Hide ACF field group menu item */
	/** Start: Include ACF */
	include_once( plugin_dir_path( __FILE__ ) . 'includes/acf/acf.php' );
	/** End: Include ACF */
	/** Start: Create JSON save point */
	add_filter('acf/settings/save_json', 'cysp_acf_json_save_point');
	function cysp_acf_json_save_point( $path ) {
		$path = plugin_dir_path( __FILE__ ) . 'acf-json/';
		return $path;
	}
	/** End: Create JSON save point */
	/** Start: Create JSON load point */
	add_filter('acf/settings/load_json', 'cysp_acf_json_load_point');
	/** End: Create JSON load point */
	/** Start: Stop ACF upgrade notifications */
	add_filter( 'site_transient_update_plugins', 'cysp_stop_acf_update_notifications', 11 );
	function cysp_stop_acf_update_notifications( $value ) {
		unset( $value->response[ plugin_dir_path( __FILE__ ) . 'includes/acf/acf.php' ] );
		return $value;
	}
	/** End: Stop ACF upgrade notifications */
} else { // else ACF Pro plugin does exist
	/** Start: Create JSON load point */
	add_filter('acf/settings/load_json', 'cysp_acf_json_load_point');
	/** End: Create JSON load point */
} // end-if ACF Pro plugin does not currently exist
/** End: Detect ACF Pro plugin. Include if not present. */
/** Start: Function to create JSON load point */
function cysp_acf_json_load_point( $paths ) {
	$paths[] = plugin_dir_path( __FILE__ ) . 'acf-json-load';
	return $paths;
}
/** End: Function to create JSON load point */