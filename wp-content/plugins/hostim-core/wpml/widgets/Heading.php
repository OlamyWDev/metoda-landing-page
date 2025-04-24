<?php
namespace HostimCore\WPML;

use WPML_Elementor_Module_With_Items;

/**
 * Class Heading
 */

defined( 'ABSPATH' ) || die();

class Heading extends WPML_Elementor_Module_With_Items {

    /**
     * @return string
     */
    public function get_items_field() {
        return 'hostim_heading';
    }

    /**
     * @return array
     */
    public function get_fields() {
        return [ 'heading' ];
    }

    /**
     * @param string $field
     *
     * @return string
     */
    protected function get_title( $field ) {
        switch( $field ) {
            case 'heading':
                return esc_html__( 'Heading Text', 'hostim-core' );
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
            case 'heading':
                return 'AREA';
            default:
                return '';
        }
    }
}