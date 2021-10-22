<?php
/**
 * @package g2builderdfields
 */

namespace Inc\Base;



class SettingLinks {

	protected $plugin;

	public function __construct(){
		$this->plugin = PLUGIN;
	}

	public function register() {
		add_filter('plugin_action_links_' . $this->plugin, array($this, 'settings_link'));
	}

	public function settings_link($links){
		$settings_link = '<a href="admin.php?page=grouptwo_builder_fields_setting">G2 Global Site Setting</a>';
		array_push($links, $settings_link);
		return $links;
	}
}