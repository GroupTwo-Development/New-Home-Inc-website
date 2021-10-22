<?php
/**
 * @package g2builderdfields
 */

namespace Inc\Api\Callbacks;

use Inc\Base\BaseController;

class AdminCallbacks  extends  BaseController {
	public function adminDashboard()
	{
		return require_once( "$this->plugin_path/templates/admin.php" );
	}

	public function adminCpt()
	{
		return require_once( "$this->plugin_path/templates/cpt.php" );
	}

	public function zillowCpt()
	{
		return require_once( "$this->plugin_path/templates/zillow.php" );
	}

	public function grouptwoOptionGroup($input){
		return $input;
	}

	public function grouptwoAdminSection(){
		echo 'Checkout this section';
	}
	public function grouptwoTextExample(){

		$value = esc_attr(get_option('text_example'));
		echo '<input type="text" class="control-form" name="text_example" value="'. $value .'" placeholder="text info">';
	}

}