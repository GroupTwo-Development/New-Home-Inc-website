<?php
/**
 * @package g2builderdfields
 */

namespace Inc;

final class Init
{
	/**
	 * Store all the classes inside an array
	 * @return array Full list of classes
	 */
	public static function get_services()
	{
		return [
			Pages\Admin::class,
			Base\SettingLinks::class,
			Base\Enqueue::class,
			Base\CustomPostTypes::class,
			Base\CustomPostTypeController::class,
			Base\CptFields\CptFields::class,
			Base\CommunityAdminColumn::class,


			Base\plansRewriteRules::class,

			Base\filterfloorplanTaxonomies::class,
			Base\customAdminColumnsFloorplan::class,
			Base\customAdminColumnsHomeDesigns::class,

			Base\customAdminColumnsHomes::class,
			Base\CommunitiesRewritesRules::class,
			Base\homesRewriteRules::class,
			Base\ConvertCommunityPostToTaxonomies::class
		];
	}

	/**
	 * Loop through the classes, initialize them,
	 * and call the register() method if it exists
	 * @return
	 */
	public static function register_services()
	{
		foreach ( self::get_services() as $class ) {
			$service = self::instantiate( $class );
			if ( method_exists( $service, 'register' ) ) {
				$service->register();
			}
		}
		return;
	}

	/**
	 * Initialize the class
	 * @param  class $class    class from the services array
	 * @return class instance  new instance of the class
	 */
	private static function instantiate( $class )
	{
		$service = new $class();

		return $service;
	}

}
