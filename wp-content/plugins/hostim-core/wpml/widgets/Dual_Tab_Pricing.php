<?php
namespace HostimCore\WPML;

use WPML_Elementor_Module_With_Items;

/**
 * Class Dual_Tab_Pricing
 */

defined( 'ABSPATH' ) || die();

class Dual_Tab_Pricing extends WPML_Elementor_Module_With_Items {

    /**
     * @return string
     */
    public function get_items_field() {
        return 'hostim_dual_tab_pricing';
    }

    /**
     * @return array
     */
    public function get_fields() {
        return [ 'pricing_heading', 'pricing_subtitle' ];
    }

    /**
     * @param string $field
     *
     * @return string
     */
    protected function get_title( $field ) {
        switch( $field ) {
            case 'pricing_heading':
                return esc_html__( 'Heading Text', 'hostim-core' );
            case 'pricing_subtitle':
                return esc_html__( 'Heading Subtitle', 'hostim-core' );
            default:
                return '';
        }
    }

    /**
     * @param string $field
     *
     * @return string
     */
    protected function get_editor_type( $field ) {
        switch( $field ) {
            case 'pricing_heading':
            case 'pricing_subtitle':
                return 'AREA';
            default:
                return '';
        }
    }
}