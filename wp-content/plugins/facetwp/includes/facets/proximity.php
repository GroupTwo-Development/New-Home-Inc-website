<?php

class FacetWP_Facet_Proximity_Core extends FacetWP_Facet
{

    /* (array) Ordered array of post IDs */
    public $ordered_posts = [];

    /* (array) Associative array containing each post ID and its distance */
    public $distance = [];


    function __construct() {
        $this->label = __( 'Proximity', 'fwp' );
        $this->fields = [ 'longitude', 'unit', 'radius_ui', 'radius_options', 'radius_min', 'radius_max', 'radius_default' ];

        add_filter( 'facetwp_index_row', [ $this, 'index_latlng' ], 1, 2 );
        add_filter( 'facetwp_sort_options', [ $this, 'sort_options' ], 1, 2 );
        add_filter( 'facetwp_filtered_post_ids', [ $this, 'sort_by_distance' ], 10, 2 );
    }


    /**
     * Generate the facet HTML
     */
    function render( $params ) {

        $output = '';
        $facet = $params['facet'];
        $value = $params['selected_values'];
        $unit = empty( $facet['unit'] ) ? 'mi' : $facet['unit'];

        $lat = empty( $value[0] ) ? '' : $value[0];
        $lng = empty( $value[1] ) ? '' : $value[1];
        $chosen_radius = empty( $value[2] ) ? '' : (float) $value[2];
        $location_name = empty( $value[3] ) ? '' : urldecode( $value[3] );

        $radius_options = [ 10, 25, 50, 100, 250 ];

        // Grab the radius UI
        $radius_ui = empty( $facet['radius_ui'] ) ? 'dropdown' : $facet['radius_ui'];

        // Grab radius options from the UI
        if ( ! empty( $facet['radius_options'] ) ) {
            $radius_options = explode( ',', preg_replace( '/\s+/', '', $facet['radius_options'] ) );
        }

        // Grab default radius from the UI
        if ( empty( $chosen_radius ) && ! empty( $facet['radius_default'] ) ) {
            $chosen_radius = (float) $facet['radius_default'];
        }

        // Support dynamic radius
        if ( ! empty( $chosen_radius ) && 0 < $chosen_radius ) {
            if ( ! in_array( $chosen_radius, $radius_options ) ) {
                $radius_options[] = $chosen_radius;
            }
        }

        $radius_options = apply_filters( 'facetwp_proximity_radius_options', $radius_options );

        ob_start();
?>

        <span class="facetwp-input-wrap">
            <i class="facetwp-icon locate-me"></i>
            <input type="text" class="facetwp-location" value="<?php echo esc_attr( $location_name ); ?>" placeholder="<?php _e( 'Enter location', 'fwp-front' ); ?>" autocomplete="off" />
            <div class="location-results facetwp-hidden"></div>
        </span>

        <?php if ( 'dropdown' == $radius_ui ) : ?>

        <select class="facetwp-radius facetwp-radius-dropdown">
            <?php foreach ( $radius_options as $radius ) : ?>
            <?php $selected = ( $chosen_radius == $radius ) ? ' selected' : ''; ?>
            <option value="<?php echo $radius; ?>"<?php echo $selected; ?>><?php echo "$radius $unit"; ?></option>
            <?php endforeach; ?>
        </select>

        <?php elseif ( 'slider' == $radius_ui ) : ?>

        <div class="facetwp-radius-wrap">
            <input class="facetwp-radius facetwp-radius-slider" type="range"
                min="<?php echo $facet['radius_min']; ?>"
                max="<?php echo $facet['radius_max']; ?>"
                value="<?php echo $chosen_radius; ?>"
            />
            <div class="facetwp-radius-label">
                <span class="facetwp-radius-dist"><?php echo $chosen_radius; ?></span>
                <span class="facetwp-radius-unit"><?php echo $facet['unit']; ?></span>
            </div>
        </div>

        <?php elseif ( 'none' == $radius_ui ) : ?>

        <input class="facetwp-radius facetwp-hidden" value="<?php echo $chosen_radius; ?>" />

        <?php endif; ?>

        <input type="hidden" class="facetwp-lat" value="<?php echo esc_attr( $lat ); ?>" />
        <input type="hidden" class="facetwp-lng" value="<?php echo esc_attr( $lng ); ?>" />
<?php
        return ob_get_clean();
    }


    /**
     * Filter the query based on selected values
     */
    function filter_posts( $params ) {
        global $wpdb;

        $facet = $params['facet'];
        $selected_values = $params['selected_values'];
        $unit = empty( $facet['unit'] ) ? 'mi' : $facet['unit'];
        $earth_radius = ( 'mi' == $unit ) ? 3959 : 6371;

        if ( empty( $selected_values ) || empty( $selected_values[0] ) ) {
            return 'continue';
        }

        $lat = (float) $selected_values[0];
        $lng = (float) $selected_values[1];
        $radius = (float) $selected_values[2];

        $sql = "
        SELECT DISTINCT post_id, ( $earth_radius * acos(
            greatest( -1, least( 1, ( /* acos() must be between -1 and 1 */
                cos( radians( $lat ) ) *
                cos( radians( facet_value ) ) *
                cos( radians( facet_display_value ) - radians( $lng ) ) +
                sin( radians( $lat ) ) *
                sin( radians( facet_value ) )
            ) ) )
        ) ) AS distance
        FROM {$wpdb->prefix}facetwp_index
        WHERE facet_name = '{$facet['name']}'
        HAVING distance < $radius
        ORDER BY distance";

        $this->ordered_posts = [];
        $this->distance = [];

        if ( apply_filters( 'facetwp_proximity_store_distance', false ) ) {
            $results = $wpdb->get_results( $sql );
            foreach ( $results as $row ) {
                $this->ordered_posts[] = $row->post_id;
                $this->distance[ $row->post_id ] = $row->distance;
            }
        }
        else {
            $this->ordered_posts = $wpdb->get_col( $sql );
        }

        return $this->ordered_posts;
    }


    /**
     * Output front-end scripts
     */
    function front_scripts() {
        if ( apply_filters( 'facetwp_proximity_load_js', true ) ) {

            // hard-coded
            $api_key = defined( 'GMAPS_API_KEY' ) ? GMAPS_API_KEY : '';

            // admin ui
            $tmp_key = FWP()->helper->get_setting( 'gmaps_api_key' );
            $api_key = empty( $tmp_key ) ? $api_key : $tmp_key;

            // hook
            $api_key = apply_filters( 'facetwp_gmaps_api_key', $api_key );

            FWP()->display->assets['gmaps'] = '//maps.googleapis.com/maps/api/js?libraries=places&key=' . trim( $api_key );
        }

        // Pass extra options into Places Autocomplete
        $options = apply_filters( 'facetwp_proximity_autocomplete_options', [] );
        FWP()->display->json['proximity']['autocomplete_options'] = $options;
        FWP()->display->json['proximity']['clearText'] = __( 'Clear location', 'fwp-front' );
        FWP()->display->json['proximity']['queryDelay'] = 250;
        FWP()->display->json['proximity']['minLength'] = 3;
    }


    function register_fields() {
        return [
            'longitude' => [
                'type' => 'alias',
                'items' => [
                    'source_other' => [
                        'label' => __( 'Longitude', 'fwp' ),
                        'notes' => '(Optional) use a separate longitude field',
                        'html' => '<data-sources :facet="facet" setting-name="source_other"></data-sources>'
                    ]
                ]
            ],
            'unit' => [
                'type' => 'select',
                'label' => __( 'Unit of measurement', 'fwp' ),
                'choices' => [
                    'mi' => __( 'Miles', 'fwp' ),
                    'km' => __( 'Kilometers', 'fwp' )
                ]
            ],
            'radius_ui' => [
                'type' => 'select',
                'label' => __( 'Radius UI', 'fwp' ),
                'choices' => [
                    'dropdown' => __( 'Dropdown', 'fwp' ),
                    'slider' => __( 'Slider', 'fwp' ),
                    'none' => __( 'None', 'fwp' )
                ]
            ],
            'radius_options' => [
                'label' => __( 'Radius options', 'fwp' ),
                'notes' => 'A comma-separated list of radius choices',
                'default' => '10, 25, 50, 100, 250',
                'show' => "facet.radius_ui == 'dropdown'"
            ],
            'radius_min' => [
                'label' => __( 'Range (min)', 'fwp' ),
                'default' => 1,
                'show' => "facet.radius_ui == 'slider'"
            ],
            'radius_max' => [
                'label' => __( 'Range (max)', 'fwp' ),
                'default' => 50,
                'show' => "facet.radius_ui == 'slider'"
            ],
            'radius_default' => [
                'label' => __( 'Default radius', 'fwp' ),
                'default' => 25
            ]
        ];
    }


    /**
     * Index the coordinates
     * We expect a comma-separated "latitude, longitude"
     */
    function index_latlng( $params, $class ) {

        $facet = FWP()->helper->get_facet_by_name( $params['facet_name'] );

        if ( false !== $facet && 'proximity' == $facet['type'] ) {
            $latlng = $params['facet_value'];

            // Only handle "lat, lng" strings
            if ( is_string( $latlng ) ) {
                $latlng = preg_replace( '/[^0-9.,-]/', '', $latlng );

                if ( ! empty( $facet['source_other'] ) ) {
                    $other_params = $params;
                    $other_params['facet_source'] = $facet['source_other'];
                    $rows = $class->get_row_data( $other_params );

                    if ( false === strpos( $latlng, ',' ) ) {
                        $lng = $rows[0]['facet_display_value'];
                        $lng = preg_replace( '/[^0-9.,-]/', '', $lng );
                        $latlng .= ',' . $lng;
                    }
                }

                if ( preg_match( "/^([\d.-]+),([\d.-]+)$/", $latlng ) ) {
                    $latlng = explode( ',', $latlng );
                    $params['facet_value'] = $latlng[0];
                    $params['facet_display_value'] = $latlng[1];
                }
            }
        }

        return $params;
    }


    /**
     * Add "Distance" to the sort box
     */
    function sort_options( $options, $params ) {

        if ( FWP()->helper->facet_setting_exists( 'type', 'proximity' ) ) {
            $options['distance'] = [
                'label' => __( 'Distance', 'fwp-front' ),
                'query_args' => [
                    'orderby' => 'post__in',
                    'order' => 'ASC',
                ],
            ];
        }

        return $options;
    }


    /**
     * After the final list of post IDs has been produced,
     * sort them by distance if needed
     */
    function sort_by_distance( $post_ids, $class ) {

        $ordered_posts = FWP()->helper->facet_types['proximity']->ordered_posts;

        if ( ! empty( $ordered_posts ) ) {

            // Sort the post IDs according to distance
            $intersected_ids = [ 0 ];

            foreach ( $ordered_posts as $p ) {
                if ( in_array( $p, $post_ids ) ) {
                    $intersected_ids[] = $p;
                }
            }

            $post_ids = $intersected_ids;
        }

        return $post_ids;
    }
}


/**
 * Get a post's distance
 * NOTE: SET facetwp_proximity_store_distance filter = TRUE
 */
function facetwp_get_distance( $post_id = false ) {
    global $post;

    // Get the post ID
    $post_id = ( false === $post_id ) ? $post->ID : $post_id;

    // Get the proximity class
    $facet_type = FWP()->helper->facet_types['proximity'];

    if ( isset( $facet_type->distance[ $post_id ] ) ) {
        $distance = $facet_type->distance[ $post_id ];
        return apply_filters( 'facetwp_proximity_distance_output', $distance );
    }

    return false;
}
