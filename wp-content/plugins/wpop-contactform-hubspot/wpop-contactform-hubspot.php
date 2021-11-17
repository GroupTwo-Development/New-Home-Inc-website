<?php
/**
 * Plugin Name: WPOP Contact Form 7 to Hubspot
 * Description: Add Contact Form 7 Data to HubSpot Contact lists easily.
 * Author: WPoperation
 * Plugin URI: https://wpoperation.com/plugins/hubspot-contactform7/
 * Author URI: https://wpoperation.com
 * Version: 1.0.8
 * Tested up to: 5.8.1
 * Text Domain: wpop-contactform-hubspot
 * Domain Path: /languages/
 **/
// Exit if accessed directly
if (!defined('ABSPATH'))
    exit;
if (!class_exists('HBCF7_Integration')) {
    class HBCF7_Integration
    {
        public function __construct(){
        
            /**
             * check for contact form 7
             */
            add_action('init', array($this,'hbcf7_plugin_dependencies'));
            add_action( 'admin_enqueue_scripts',array($this,'hbcf7_register_backend_assets') );
            add_action('init', array(&$this,'init'));

            add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), array($this,'hbcf7_pro_plugin_action_links') );
        }
        public function init(){
            load_plugin_textdomain('wpop-contactform-hubspot', false, dirname(plugin_basename(__FILE__)) . '/languages/');
        }
        public function hbcf7_plugin_dependencies() {
            define("HBCF7_PATH", plugin_dir_path(__FILE__));
            define("HBCF7_URL", plugin_dir_url(__FILE__));
            if (!class_exists('WPCF7')) {
                add_action('admin_notices',  array($this, 'cf7s_admin_notices'));
            } else {
                /**
                 * include settings
                 */
                require_once( HBCF7_PATH . 'includes/hbcf7-settings.php' );

                /**
                 * contact form 7 Subscribe class
                 */
                require_once( HBCF7_PATH . 'includes/hbcf7-subscribe.php' );                
            }
        }
        //Registering of backend js and css
        public function hbcf7_register_backend_assets() {
            wp_enqueue_script( 'hbcf7-admin-js', HBCF7_URL.'assets/admin.js', array( 'jquery' ), '1.0', true );
            wp_enqueue_style( 'hbcf7-admin-css', HBCF7_URL.'assets/admin.css');   
        }

        public function cf7s_admin_notices() {
            $class = 'notice notice-error';
            $message = __('Hubspot & Contact Form 7  requires Contact form 7 to be installed and active.', 'wpop-contactform-hubspot');
            printf('<div class="%1$s"><p>%2$s</p></div>', $class, $message);
        }

        function hbcf7_pro_plugin_action_links( $links ) {
         
            $links[] = '<a href="https://wpoperation.com/plugins/hubspot-contactform7-pro/" target="_blank" style="color:#05c305; font-weight:bold;">'.esc_html__('Go Pro','wpop-contactform-hubspot').'</a>';
            return $links;
        }
    }
    new HBCF7_Integration();
}
