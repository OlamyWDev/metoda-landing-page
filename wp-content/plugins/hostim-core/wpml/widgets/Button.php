<?php
namespace HostimCore\WPML;

use WPML_Elementor_Module_With_Items;

/**
 * Class Button
 */

defined( 'ABSPATH' ) || die();

class Button extends WPML_Elementor_Module_With_Items {

    /**
     * @return string
     */
    public function get_items_field() {
        return 'hostim_button';
    }

    /**
     * @return array
     */
    public function get_fields() {
        return [ 'btn_label' ];
    }

    /**
     * @param string $field
     *
     * @return string
     */
    protected function get_title( $field ) {
        switch( $field ) {
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
            case 'btn_label':
                return 'LINE';
            default:
                return '';
        }
    }
}