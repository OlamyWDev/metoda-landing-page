<?php
namespace HostimCore\WPML;

use WPML_Elementor_Module_With_Items;

/**
 * Class Table_Features
 */

defined( 'ABSPATH' ) || die();

class Table_Features extends WPML_Elementor_Module_With_Items {

    /**
     * @return string
     */
    public function get_items_field() {
        return 'hostim_table_features';
    }

    /**
     * @return array
     */
    public function get_fields() {
        return [ 'features_title', 'tab_title' ];
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
            case 'tab_title':
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
            case 'features_title':
            case 'tab_title':
                return 'LINE';
            default:
                return '';
        }
    }
}