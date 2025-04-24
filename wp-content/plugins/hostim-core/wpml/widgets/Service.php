<?php
namespace HostimCore\WPML;

use WPML_Elementor_Module_With_Items;

/**
 * Class Service
 */

defined( 'ABSPATH' ) || die();

class Service extends WPML_Elementor_Module_With_Items {

    /**
     * @return string
     */
    public function get_items_field() {
        return 'hostim_service';
    }

    /**
     * @return array
     */
    public function get_fields() {
        return [ 'view_more' ];
    }

    /**
     * @param string $field
     *
     * @return string
     */
    protected function get_title( $field ) {
        switch( $field ) {
            case 'view_more':
                return esc_html__( 'View More Button Label', 'hostim-core' );
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
            case 'view_more':
                return 'LINE';
            default:
                return '';
        }
    }
}