<?php
	// convert phone number to localize US number
function localize_us_number($phone){
	$phone_number = get_field($phone, 'option');
	$formatted_phone_number = preg_replace("/^(\d{3})(\d{3})(\d{4})$/", "$1-$2-$3", $phone_number);
}

/**
 * Use Lozad (lazy loading) for attachments/featured images
 */
//add_filter('wp_get_attachment_image_attributes', function($attr, $attachment){
//	// Bail on admin
//	if (is_admin()) {
//		return $attr;
//	}
//
//	$attr['data-src'] = $attr['src'];
//	$attr['class'] .= ' lozad';
//	unset($attr['src']);
//	return $attr;
//}, 10, 2);