<?php
// interior Hero Banner with background image

function interior_hero_bg_image($acf_field){
	$page_banner = get_field($acf_field);
	?>
	<div class="section-banner">
		<img class="img-fluid" src="<?php echo $page_banner['url']; ?>" alt="<?php echo $page_banner['alt']; ?>">
	</div>
	<?php
}


//add_filter( 'facetwp_sort_html', function( $html, $params ) {
//	$html = '<div class="dropdown-toggle click-dropdown">DropDown Menu</div>';
//
//	$html = '<select class="facetwp-sort-select testing">';
//	foreach ( $params['sort_options'] as $key => $atts ) {
//		$html .= '<option value="' . $key . '">' . $atts['label'] . '</option>';
//	}
//	$html .= '</select>';
//	return $html;
//}, 10, 2 );

