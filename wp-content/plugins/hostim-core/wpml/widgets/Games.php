<?php
namespace HostimCore\WPML;

use WPML_Elementor_Module_With_Items;

/**
 * Class Games
 */

defined( 'ABSPATH' ) || die();

class Games extends WPML_Elementor_Module_With_Items {

    /**
     * @return string
     */
    public function get_items_field() {
        return 'hostim_games';
    }

    /**
     * @return array
     */
    public function get_fields() {
        return [ 'game_title', 'game_desc' ];
    }

    /**
     * @param string $field
     *
     * @return string
     */
    protected function get_title( $field ) {
        switch( $field ) {
            case 'game_title':
                return esc_html__( 'Title', 'hostim-core' );
            case 'game_desc':
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
            case 'game_title':
                return 'LINE';
            case 'game_desc':
                return 'AREA';
            default:
                return '';
        }
    }
}