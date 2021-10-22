<?php
/**
 * @package g2builderdfields
 */
namespace Inc\Base;

class BaseController
{
	public $plugin_path;

	public function __construct(){
		$this->plugin_url = plugin_dir_url( dirname( __FILE__, 2 ) );
		$this->plugin_path = plugin_dir_path( dirname(__FILE__, 2) );
	}
}

