<?php
namespace HostimCore\WPML;

use WPML_Elementor_Module_With_Items;

/**
 * Class About
 */

defined( 'ABSPATH' ) || die();

class Domain_Form extends WPML_Elementor_Module_With_Items {

    /**
     * @return string
     */
    public function get_items_field() {
        return 'hostim_domain_form';
    }

    /**
     * @return array
     */
    public function get_fields() {
        return [ 'title', 'placeholder_input' ];
    }

    /**
     * @param string $field
     *
     * @return string
     */
    protected function get_title( $field ) {
        switch( $field ) {
            case 'title':
                return esc_html__( 'Title', 'hostim-core' );
            case 'placeholder_input':
                return esc_html__( 'Placeholder Input Text', 'hostim-core' );
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
            case 'title':
            case 'placeholder_input':
                return 'LINE';
            default:
                return '';
        }
    }
}