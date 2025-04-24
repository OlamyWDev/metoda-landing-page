<?php
namespace HostimCore\WPML;

use WPML_Elementor_Module_With_Items;

/**
 * Class Upcoming_Match
 */

defined( 'ABSPATH' ) || die();

class Upcoming_Match extends WPML_Elementor_Module_With_Items {

    /**
     * @return string
     */
    public function get_items_field() {
        return 'hostim_upcoming_match';
    }

    /**
     * @return array
     */
    public function get_fields() {
        return [ 'sec_heading', 'sub_heading', 'btn_label' ];
    }

    /**
     * @param string $field
     *
     * @return string
     */
    protected function get_title( $field ) {
        switch( $field ) {
            case 'sec_heading':
                return esc_html__( 'Heading', 'hostim-core' );
            case 'sub_heading':
                return esc_html__( 'Sub Heading', 'hostim-core' );
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
            case 'sub_heading':
                return 'AREA';
            case 'btn_label':
                return 'LINE';
            default:
                return '';
        }
    }
}