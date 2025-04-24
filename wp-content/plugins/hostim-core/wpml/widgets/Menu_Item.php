<?php
namespace HostimCore\WPML;

use WPML_Elementor_Module_With_Items;

/**
 * Class Menu_Item
 */

defined( 'ABSPATH' ) || die();

class Menu_Item extends WPML_Elementor_Module_With_Items {

    /**
     * @return string
     */
    public function get_items_field() {
        return 'hostim_menu_item';
    }

    /**
     * @return array
     */
    public function get_fields() {
        return [ 'serial_number', 'box_title', 'description' ];
    }

    /**
     * @param string $field
     *
     * @return string
     */
    protected function get_title( $field ) {
        switch( $field ) {
            case 'serial_number':
                return esc_html__( 'Number', 'hostim-core' );
            case 'box_title':
                return esc_html__( 'Menu Title', 'hostim-core' );
            case 'description':
                return esc_html__( 'Description', 'hostim-core' );
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
            case 'serial_number':
            case 'box_title':
                return 'LINE';
            case 'description':
                return 'AREA';
            default:
                return '';
        }
    }
}