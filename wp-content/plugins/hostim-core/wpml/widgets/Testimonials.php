<?php
namespace HostimCore\WPML;

use WPML_Elementor_Module_With_Items;

/**
 * Class Testimonials
 */

defined( 'ABSPATH' ) || die();

class Testimonials extends WPML_Elementor_Module_With_Items {

    /**
     * @return string
     */
    public function get_items_field() {
        return 'hostim_testimonials';
    }

    /**
     * @return array
     */
    public function get_fields() {
        return [ 'sec_heading', 'sec_short_desc', 'btn_label' ];
    }

    /**
     * @param string $field
     *
     * @return string
     */
    protected function get_title( $field ) {
        switch( $field ) {
            case 'sec_heading':
                return esc_html__( 'Heading Text', 'hostim-core' );
            case 'sec_short_desc':
                return esc_html__( 'Short Description', 'hostim-core' );
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
            case 'sec_heading':
            case 'sec_short_desc':
                return 'AREA';
            case 'btn_label':
                return 'LINE';
            default:
                return '';
        }
    }
}