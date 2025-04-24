<?php
namespace HostimCore\WPML;

use WPML_Elementor_Module_With_Items;

/**
 * Class Pricing_Slider
 */

defined( 'ABSPATH' ) || die();

class Pricing_Slider extends WPML_Elementor_Module_With_Items {

    /**
     * @return string
     */
    public function get_items_field() {
        return 'hostim_pricing_slider';
    }

    /**
     * @return array
     */
    public function get_fields() {
        return [ 'section_title', 'btn_label' ];
    }

    /**
     * @param string $field
     *
     * @return string
     */
    protected function get_title( $field ) {
        switch( $field ) {
            case 'section_title':
                return esc_html__( 'Section Title', 'hostim-core' );
            case 'btn_label':
                return esc_html__( 'Button Label', 'hostim-core' );
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
            case 'section_title':
            case 'btn_label':
                return 'LINE';
            default:
                return '';
        }
    }
}