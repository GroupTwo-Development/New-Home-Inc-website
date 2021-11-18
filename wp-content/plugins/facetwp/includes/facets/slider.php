<?php

class FacetWP_Facet_Slider extends FacetWP_Facet
{

    function __construct() {
        $this->label = __( 'Slider', 'fwp' );
        $this->fields = [ 'source_other', 'compare_type', 'prefix', 'suffix', 'slider_format', 'step' ];

        add_filter( 'facetwp_render_output', [ $this, 'maybe_prevent_facet_html' ], 10, 2 );
    }


    /**
     * Generate the facet HTML
     */
    function render( $params ) {

        $output = '<div class="facetwp-slider-wrap">';
        $output .= '<div class="facetwp-slider"></div>';
        $output .= '</div>';
        $output .= '<span class="facetwp-slider-label"></span>';
        $output .= '<div><input type="button" class="facetwp-slider-reset" value="' . __( 'Reset', 'fwp-front' ) . '" /></div>';
        return $output;
    }


    /**
     * Filter the query based on selected values
     */
    function filter_posts( $params ) {
        global $wpdb;

        $facet = $params['facet'];
        $values = $params['selected_values'];
        $where = '';

        $start = ( '' == $values[0] ) ? false : $values[0];
        $end = ( '' == $values[1] ) ? false : $values[1];

        $is_intersect = FWP()->helper->facet_is( $facet, 'compare_type', 'intersect' );

        /**
         * Intersect compare
         * @link http://stackoverflow.com/a/325964
         */
        if ( $is_intersect ) {
            $start = ( false !== $start ) ? $start : '-999999999999';
            $end = ( false !== $end ) ? $end : '999999999999';

            $where .= " AND (facet_value + 0) <= '$end'";
            $where .= " AND (facet_display_value + 0) >= '$start'";
        }
        else {
            if ( false !== $start ) {
                $where .= " AND (facet_value + 0) >= '$start'";
            }
            if ( false !== $end ) {
                $where .= " AND (facet_display_value + 0) <= '$end'";
            }
        }

        $sql = "
        SELECT DISTINCT post_id FROM {$wpdb->prefix}facetwp_index
        WHERE facet_name = '{$facet['name']}' $where";
        return facetwp_sql( $sql, $facet );
    }


    /**
     * (Front-end) Attach settings to the AJAX response
     */
    function settings_js( $params ) {
        global $wpdb;

        $facet = $params['facet'];
        $where_clause = $this->get_where_clause( $facet );
        $selected_values = $params['selected_values'];

        // Set default slider values
        $defaults = [
            'format' => '',
            'prefix' => '',
            'suffix' => '',
            'step' => 1,
        ];
        $facet = array_merge( $defaults, $facet );

        $sql = "
        SELECT MIN(facet_value + 0) AS `min`, MAX(facet_display_value + 0) AS `max` FROM {$wpdb->prefix}facetwp_index
        WHERE facet_name = '{$facet['name']}' AND facet_display_value != '' $where_clause";
        $row = $wpdb->get_row( $sql );

        $range_min = (float) $row->min;
        $range_max = (float) $row->max;

        $selected_min = (float) ( isset( $selected_values[0] ) ? $selected_values[0] : $range_min );
        $selected_max = (float) ( isset( $selected_values[1] ) ? $selected_values[1] : $range_max );

        return [
            'range' => [ // outer (bar)
                'min' => min( $range_min, $selected_min ),
                'max' => max( $range_max, $selected_max )
            ],
            'decimal_separator' => FWP()->helper->get_setting( 'decimal_separator' ),
            'thousands_separator' => FWP()->helper->get_setting( 'thousands_separator' ),
            'start' => [ $selected_min, $selected_max ], // inner (handles) 
            'format' => $facet['format'],
            'prefix' => $facet['prefix'],
            'suffix' => $facet['suffix'],
            'step' => $facet['step']
        ];
    }


    /**
     * Prevent the slider HTML from refreshing when active
     * @since 3.8.11
     */
    function maybe_prevent_facet_html( $output, $params ) {
        if ( ! empty( $output['facets'] && 0 === $params['first_load' ] ) ) {
            foreach ( FWP()->facet->facets as $name => $facet ) {
                if ( 'slider' == $facet['type'] && ! empty( $facet['selected_values'] ) ) {
                    unset( $output['facets'][ $name ] );
                }
            }
        }
        return $output;
    }


    /**
     * Output any front-end scripts
     */
    function front_scripts() {
        FWP()->display->assets['nouislider.css'] = FACETWP_URL . '/assets/vendor/noUiSlider/nouislider.css';
        FWP()->display->assets['nouislider.js'] = FACETWP_URL . '/assets/vendor/noUiSlider/nouislider.min.js';
        FWP()->display->assets['nummy.js'] = FACETWP_URL . '/assets/vendor/nummy/nummy.min.js';
    }


    function register_fields() {
        $thousands = FWP()->helper->get_setting( 'thousands_separator' );
        $decimal = FWP()->helper->get_setting( 'decimal_separator' );
        $choices = [];

        if ( '' != $thousands ) {
            $choices['0,0'] = "5{$thousands}280";
            $choices['0,0.0'] = "5{$thousands}280{$decimal}4";
            $choices['0,0.00'] = "5{$thousands}280{$decimal}42";
        }

        $choices['0'] = '5280';
        $choices['0.0'] = "5280{$decimal}4";
        $choices['0.00'] = "5280{$decimal}42";
        $choices['0a'] = '5k';
        $choices['0.0a'] = "5{$decimal}3k";
        $choices['0.00a'] = "5{$decimal}28k";

        return [
            'prefix' => [
                'label' => __( 'Prefix', 'fwp' ),
                'notes' => 'Text that appears before each slider value',
            ],
            'suffix' => [
                'label' => __( 'Suffix', 'fwp' ),
                'notes' => 'Text that appears after each slider value',
            ],
            'slider_format' => [
                'type' => 'alias',
                'items' => [
                    'format' => [
                        'type' => 'select',
                        'label' => __( 'Format', 'fwp' ),
                        'choices' => $choices
                    ]
                ]
            ],
            'step' => [
                'label' => __( 'Step', 'fwp' ),
                'notes' => 'The amount of increase between intervals',
                'default' => 1
            ]
        ];
    }
}
