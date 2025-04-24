<?php
namespace HostimCore\WPML;

use WPML_Elementor_Module_With_Items;

/**
 * Class About
 */

defined( 'ABSPATH' ) || die();

class About extends WPML_Elementor_Module_With_Items {

    /**
     * @return string
     */
    public function get_items_field() {
        return 'hostim_about';
    }

    /**
     * @return array
     */
    public function get_fields() {
        return [ 'title_text' ];
    }

    /**
     * @param string $field
     *
     * @return string
     */
    protected function get_title( $field ) {
        switch( $field ) {
            case 'title_text':
                return esc_html__( 'Title', 'hostim-core' );
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
            case 'title_text':
                return 'LINE';
            default:
                return '';
        }
    }
}