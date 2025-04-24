<?php
namespace HostimCore\WPML;

use WPML_Elementor_Module_With_Items;

/**
 * Class Table_Title
 */

defined( 'ABSPATH' ) || die();

class Table_Title extends WPML_Elementor_Module_With_Items {

    /**
     * @return string
     */
    public function get_items_field() {
        return 'hostim_table_title';
    }

    /**
     * @return array
     */
    public function get_fields() {
        return [ 'features_title' ];
    }

    /**
     * @param string $field
     *
     * @return string
     */
    protected function get_title( $field ) {
        switch( $field ) {
            case 'features_title':
                return esc_html__( 'Features Title', 'hostim-core' );
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
            case 'features_title':
                return 'LINE';
            default:
                return '';
        }
    }
}