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





/**
 * filter html for sort to output radio buttons
 */
add_filter( 'facetwp_sort_html', function( $output, $params ) {
	$output = '<div class="facetwp-sort-radio">';
	foreach ( $params['sort_options'] as $key => $atts ) {
		$output .= '<input type="radio" name="sort" value="' . $key . '"> ' . $atts['label'] . '<br>';
	}
	$output .= '</div>';
	return $output;
}, 10, 2 );

/**
 * js to handle:
 * selecting the correct radio button on load
 * updating the sort when a new button is selected
 */
add_action( 'wp_head', function() {
	?>
    <script>
        (function($) {
            $(document).on('facetwp-loaded', function() {
                if ('undefined' !== typeof FWP.extras.sort ) {
                    $( '.facetwp-sort-radio input:radio[name="sort"]').filter('[value="'+FWP.extras.sort+'"]').prop("checked", true);
                }
            });
            // Sorting
            $(document).on('change', '.facetwp-sort-radio input', function() {
                FWP.extras.sort = $(this).val();
                FWP.soft_refresh = true;
                FWP.autoload();
            });
        })(jQuery);
    </script>
	<?php
}, 100 );


// query all quick Move_ins

function homes_archive_per_page( $query ) {
	if( $query->is_main_query()  && is_post_type_archive( 'homes' ) ) {
		$query->set( 'posts_per_page', '-1' );
		$query->set( 'orderby', 'title' );
		$query->set( 'order', 'DESC' );
	}
}
add_filter( 'pre_get_posts', 'homes_archive_per_page' );

function home_design_archive_per_page( $query ) {
	if( $query->is_main_query()  && is_post_type_archive( 'home-design' ) ) {
		$query->set( 'posts_per_page', '-1' );
		$query->set( 'orderby', 'title' );
		$query->set( 'order', 'DESC' );
	}
}
add_filter( 'pre_get_posts', 'home_design_archive_per_page' );


function convertState($name) {
	$states = array(
		array('name'=>'Alabama', 'abbr'=>'AL'),
		array('name'=>'Alaska', 'abbr'=>'AK'),
		array('name'=>'Arizona', 'abbr'=>'AZ'),
		array('name'=>'Arkansas', 'abbr'=>'AR'),
		array('name'=>'California', 'abbr'=>'CA'),
		array('name'=>'Colorado', 'abbr'=>'CO'),
		array('name'=>'Connecticut', 'abbr'=>'CT'),
		array('name'=>'Delaware', 'abbr'=>'DE'),
		array('name'=>'Florida', 'abbr'=>'FL'),
		array('name'=>'Georgia', 'abbr'=>'GA'),
		array('name'=>'Hawaii', 'abbr'=>'HI'),
		array('name'=>'Idaho', 'abbr'=>'ID'),
		array('name'=>'Illinois', 'abbr'=>'IL'),
		array('name'=>'Indiana', 'abbr'=>'IN'),
		array('name'=>'Iowa', 'abbr'=>'IA'),
		array('name'=>'Kansas', 'abbr'=>'KS'),
		array('name'=>'Kentucky', 'abbr'=>'KY'),
		array('name'=>'Louisiana', 'abbr'=>'LA'),
		array('name'=>'Maine', 'abbr'=>'ME'),
		array('name'=>'Maryland', 'abbr'=>'MD'),
		array('name'=>'Massachusetts', 'abbr'=>'MA'),
		array('name'=>'Michigan', 'abbr'=>'MI'),
		array('name'=>'Minnesota', 'abbr'=>'MN'),
		array('name'=>'Mississippi', 'abbr'=>'MS'),
		array('name'=>'Missouri', 'abbr'=>'MO'),
		array('name'=>'Montana', 'abbr'=>'MT'),
		array('name'=>'Nebraska', 'abbr'=>'NE'),
		array('name'=>'Nevada', 'abbr'=>'NV'),
		array('name'=>'New Hampshire', 'abbr'=>'NH'),
		array('name'=>'New Jersey', 'abbr'=>'NJ'),
		array('name'=>'New Mexico', 'abbr'=>'NM'),
		array('name'=>'New York', 'abbr'=>'NY'),
		array('name'=>'North Carolina', 'abbr'=>'NC'),
		array('name'=>'North Dakota', 'abbr'=>'ND'),
		array('name'=>'Ohio', 'abbr'=>'OH'),
		array('name'=>'Oklahoma', 'abbr'=>'OK'),
		array('name'=>'Oregon', 'abbr'=>'OR'),
		array('name'=>'Pennsylvania', 'abbr'=>'PA'),
		array('name'=>'Rhode Island', 'abbr'=>'RI'),
		array('name'=>'South Carolina', 'abbr'=>'SC'),
		array('name'=>'South Dakota', 'abbr'=>'SD'),
		array('name'=>'Tennessee', 'abbr'=>'TN'),
		array('name'=>'Texas', 'abbr'=>'TX'),
		array('name'=>'Utah', 'abbr'=>'UT'),
		array('name'=>'Vermont', 'abbr'=>'VT'),
		array('name'=>'Virginia', 'abbr'=>'VA'),
		array('name'=>'Washington', 'abbr'=>'WA'),
		array('name'=>'West Virginia', 'abbr'=>'WV'),
		array('name'=>'Wisconsin', 'abbr'=>'WI'),
		array('name'=>'Wyoming', 'abbr'=>'WY'),
		array('name'=>'Virgin Islands', 'abbr'=>'V.I.'),
		array('name'=>'Guam', 'abbr'=>'GU'),
		array('name'=>'Puerto Rico', 'abbr'=>'PR')
	);

	$return = false;
	$strlen = strlen($name);

	foreach ($states as $state) :
		if ($strlen < 2) {
			return false;
		} else if ($strlen == 2) {
			if (strtolower($state['abbr']) == strtolower($name)) {
				$return = $state['name'];
				break;
			}
		} else {
			if (strtolower($state['name']) == strtolower($name)) {
				$return = strtoupper($state['abbr']);
				break;
			}
		}
	endforeach;

	return $return;
} // end function convertState()


function posts_archive_per_page( $query ) {
	if( is_home() && $query->is_main_query()) {
        $query->set('post_type', ['post']);
		$query->set( 'posts_per_page', '6' );
		$query->set( 'orderby', 'date' );
		$query->set( 'order', 'DESC' );
	}
}
add_filter( 'pre_get_posts', 'posts_archive_per_page' );




add_filter( 'facetwp_sort_options', function( $options, $params ) {
    if(is_post_type_archive('homes')){

	    $options['homes_price_DESC'] = [
		    'label' => 'Price (High to Low)',
		    'query_args' => [
			    'post_type' => 'homes',
			    'orderby' => 'meta_value_num',
			    'meta_key' => 'spec_price',
			    'order' => 'DESC',
		    ]
	    ];
	    $options['homes_price'] = [
		    'label' => 'Price (Low to High)',
		    'query_args' => [
			    'post_type' => 'homes',
			    'orderby' => 'meta_value_num',
			    'meta_key' => 'spec_price',
			    'order' => 'ASC',
		    ]
	    ];

	    $options['homes_sqft'] = [
		    'label' => 'Square Feet',
		    'query_args' => [
			    'post_type' => 'homes',
			    'orderby' => 'meta_value_num',
			    'meta_key' => 'spec_sqft',
			    'order' => 'DESC',
		    ]
	    ];
	    unset( $options['title_desc'] );
	    unset( $options['date_desc'] );
	    unset( $options['date_asc'] );
    } else if(is_post_type_archive('home-design')){
	    $options['title_asc'] = [
		    'label' => __( 'Plan Name (A-Z)', 'fwp' ),
		    'query_args' => [
			    'orderby' => 'title',
			    'order' => 'ASC',
		    ]
	    ];
	    $options['base_price'] = [
		    'label' => 'Price (High to Low)',
		    'query_args' => [
			    'post_type' => 'home-design',
			    'orderby' => 'meta_value_num',
			    'meta_key' => 'base_price',
			    'order' => 'DESC',
		    ]
	    ];
	    $options['base_price_ASC'] = [
		    'label' => 'Price (Low to High)',
		    'query_args' => [
			    'post_type' => 'home-design',
			    'orderby' => 'meta_value_num',
			    'meta_key' => 'base_price',
			    'order' => 'ASC',
		    ]
	    ];

	    $options['plans_base_sqft'] = [
		    'label' => 'Square Feet',
		    'query_args' => [
			    'post_type' => 'home-design',
			    'orderby' => 'meta_value_num',
			    'meta_key' => 'base_sqft',
			    'order' => 'DESC',
		    ]
	    ];
	    unset( $options['title_desc'] );
        unset( $options['default'] );
	    unset( $options['date_desc'] );
	    unset( $options['date_asc'] );

    } else if(is_post_type_archive('communities')){
//	    $options['community_base_price'] = [
//		    'label' => 'Price (High to Low)',
//		    'query_args' => [
//			    'post_type' => 'floorplan',
//			    'orderby' => 'meta_value_num',
//			    'meta_key' => 'base_price',
//			    'order' => 'DESC',
//		    ]
//	    ];
    }
//	unset( $options['title_desc'] );
//	unset( $options['date_desc'] );
//	unset( $options['date_asc'] );
	return $options;
}, 10, 2 );


remove_filter( 'pre_term_description', 'wp_filter_kses' );
remove_filter( 'pre_link_description', 'wp_filter_kses' );
remove_filter( 'pre_link_notes', 'wp_filter_kses' );
remove_filter( 'term_description', 'wp_kses_data' );

