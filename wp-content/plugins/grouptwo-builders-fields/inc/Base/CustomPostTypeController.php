<?php
/**
 * @package g2builderdfields
 */
namespace Inc\Base;

use Inc\Base\BaseController;


class CustomPostTypeController extends BaseController
{
	public function register(){
		add_action('init', array($this, 'activate'));
	}

	public function activate(){
		require_once $this->plugin_path . 'cpt/TempAdminPage.php';
		require_once $this->plugin_path . 'cpt/Rewrites/autoGenerateUniqueId.php';
		require_once $this->plugin_path . 'cpt/fields/options_page_fields.php';
//		require_once $this->plugin_path . 'cpt/fields/floorplans_fields.php';
	}
}