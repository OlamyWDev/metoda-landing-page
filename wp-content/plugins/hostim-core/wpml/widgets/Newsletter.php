<?php
namespace HostimCore\WPML;

use WPML_Elementor_Module_With_Items;

/**
 * Class Newsletter
 */

defined( 'ABSPATH' ) || die();

class Newsletter extends WPML_Elementor_Module_With_Items {

    /**
     * @return string
     */
    public function get_items_field() {
        return 'hostim_newsletter';
    }

    /**
     * @return array
     */
    public function get_fields() {
        return [ 'input_placeholder', 'subscribe_text' ];
    }

    /**
     * @param string $field
     *
     * @return string
     */
    protected function get_title( $field ) {
        switch( $field ) {
            case 'input_placeholder':
                return esc_html__( 'Input Placeholder', 'hostim-core' );
            case 'subscribe_text':
                return esc_html__( 'Button Text', 'hostim-core' );
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
            case 'input_placeholder':
            case 'subscribe_text':
                return 'LINE';
            default:
                return '';
        }
    }
}