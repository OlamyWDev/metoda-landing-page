<?php
namespace HostimCore\WPML;

use WPML_Elementor_Module_With_Items;

/**
 * Class Domain_Price
 */

defined( 'ABSPATH' ) || die();

class Domain_Price extends WPML_Elementor_Module_With_Items {

    /**
     * @return string
     */
    public function get_items_field() {
        return 'hostim_domain_price';
    }

    /**
     * @return array
     */
    public function get_fields() {
        return [ 'extension_text', 'priod_text', 'btn_label' ];
    }

    /**
     * @param string $field
     *
     * @return string
     */
    protected function get_title( $field ) {
        switch( $field ) {
            case 'extension_text':
                return esc_html__( 'Extension Text', 'hostim-core' );
            case 'priod_text':
                return esc_html__( 'Duration Text', 'hostim-core' );
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
            case 'extension_text':
            case 'priod_text':
            case 'btn_label':
                return 'LINE';
            default:
                return '';
        }
    }
}