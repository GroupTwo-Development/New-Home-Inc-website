<?php
$google_map = get_field( 'spec_google_map' );
if ( $google_map ) :

	$address = '';
	foreach ( array('street_number', 'street_name', 'city', 'state' ) as $i => $k ) {
		$state_name = $google_map['state'];

		if ( isset( $google_map[ $k ] ) ) {
			$address = $google_map['city'];
			$address .= ' '. convertState($state_name);
			$address .= ' ' . $state_name;
		}
	}
	$address = trim( $address, ', ' );
endif;

?>
<div class="detail-page-banner">
	<div class="container">
		<div class="interior-banner-inner">
			<?php
			if ( function_exists('yoast_breadcrumb') ) {
				yoast_breadcrumb( '<span id="breadcrumbs">','</span>' );
			}
			?>
			<div class="banner-inner-title-component">
				<span id="community_banner_title" class="banner-title"><?php the_title(); ?></span>
				<div class="community-location-area">
					<span class="detail-header-location"><?php echo $address; ?></span>
				</div>
			</div>
		</div>
	</div>
</div>
