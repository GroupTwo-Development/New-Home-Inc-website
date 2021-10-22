<?php
/**
 * @package g2builderdfields
 */

namespace Inc\Pages;

use \Inc\Api\SettingsApi;
use \Inc\Base\BaseController;
use \Inc\Api\Callbacks\AdminCallbacks;

class Admin extends BaseController
{
	public $settings;

	public $callbacks;

	public $pages = array();

	public $subpages = array();

	public function register()
	{
//		$this->settings = new SettingsApi();
//
//		$this->callbacks = new AdminCallbacks();
//
//		$this->setPages();
//
//		$this->setSubpages();
//
//		$this->setSettings();
//		$this->setSections();
//		$this->setFields();
//
//		$this->settings->addPages( $this->pages )->withSubPage( 'Dashboard' )->addSubPages( $this->subpages )->register();


	}

	public function setPages() {
		$this->pages = array(
			array(
				'page_title' => 'GroupTeo Builder Fields',
				'menu_title'   => 'G2 Builder Fields',
				'capability'    => 'manage_options',
				'menu_slug' => 'grouptwo_builder_fields_setting',
				'callback' => array( $this->callbacks, 'adminDashboard' ),
				'icon_url'  => 'dashicons-store',
				'position'  => 110,
			)
		);
	}

	public function setSubpages()
	{
		$this->subpages = array(
			array(
				'parent_slug' => 'grouptwo_builder_fields_setting',
				'page_title' => 'Custom Post Types',
				'menu_title' => 'CPT',
				'capability' => 'manage_options',
				'menu_slug' => 'builder_fields_cpt',
				'callback' => array( $this->callbacks, 'adminCpt' )
			),
			array(
				'page_title' 	=> 'Theme General Settings',
				'menu_title'	=> 'Theme Settings',
				'menu_slug' 	=> 'theme-general-settings',
				'capability'	=> 'edit_posts',
				'redirect'		=> false
			),
			array(
				'parent_slug' => 'grouptwo_builder_fields_setting',
				'page_title' => 'Custom Widgets',
				'menu_title' => 'Zillow',
				'capability' => 'manage_options',
				'menu_slug' => 'alecaddd_zillow',
				'callback' => array( $this->callbacks, 'zillowCpt' )
			)
		);
	}

	public function SetSettings(){
		$args = array(
			array(
				'option_group' => 'grouptwo_options_group',
				'option_name'   => 'text_example',
				'callback'      => array($this->callbacks, 'grouptwoOptionGroup')
			),
			array(
				'option_group' => 'grouptwo_builder_fields_setting',
				'option_name' => 'first_name'
			)

		);
		$this->settings->setSettings($args);
	}

	public function SetSections(){
		$args = array(
			array(
				'id' => 'grouptwo_admin_index',
				'title'   => 'Settings',
				'callback'      => array($this->callbacks, 'grouptwoAdminSection'),
				'page'  => 'grouptwo_builder_fields_setting',
			)
		);
		$this->settings->setSections($args);
	}

	public function SetFields(){
		$args = array(
			array(
				'id' => 'text_example',
				'title'   => 'Text Example',
				'callback'      => array($this->callbacks, 'grouptwoTextExample'),
				'page'  => 'grouptwo_builder_fields_setting',
				'section'   => 'grouptwo_admin_index',
				'args' => array(
					'label_for' => 'text_example',
					'class' => 'example-class',
				)
			)
		);
		$this->settings->SetFields($args);
	}
}
