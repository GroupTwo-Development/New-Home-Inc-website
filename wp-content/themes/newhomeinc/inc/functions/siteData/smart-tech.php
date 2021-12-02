<?php
	function smart_tech_data(){
		$smart_tech = array(
			'intro_content_logo' => get_field('page_logo'),
			'header_intro_content' => get_field('header_intro_content'),
			'smart_home_main_content' => get_field('smart_home_main_content'),
			'video_area_content' => get_field('video_area_content')
		);
		if(!empty($smart_tech)){
			return $smart_tech;
		}
	};

function smart_home_tech(){
	$smart_home = array(
		'intro_content_logo' => get_field('intro_icon'),
		'header_intro_content' => get_field('intro_content'),

		'main_content' => get_field('main_content'),
		'main_content_image' => get_field('main_content_image'),

		'video_area_content' => get_field('new_home_features_video')
	);
	if(!empty($smart_home)){
		return $smart_home;
	}
};