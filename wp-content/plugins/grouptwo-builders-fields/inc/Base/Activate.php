<?php
/**
 * @package g2builderdfields
 */
namespace Inc\Base;

class Activate
{
	public static function activate(){
		flush_rewrite_rules();
	}
};