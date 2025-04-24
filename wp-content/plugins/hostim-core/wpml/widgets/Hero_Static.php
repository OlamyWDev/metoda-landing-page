<?php
namespace HostimCore\WPML;

use WPML_Elementor_Module_With_Items;

/**
 * Class Hero_Static
 */

defined( 'ABSPATH' ) || die();

class Hero_Static extends WPML_Elementor_Module_With_Items {

    /**
     * @return string
     */
    public function get_items_field() {
        return 'hostim_hero_static';
    }

    /**
     * @return array
     */
    public function get_fields() {
        return [ 'title', 'description', 'btn_text', 'btn_2_text', 'sec_btn_text', 'uc_title', 'uc_title_sufix', 'uc_subtitle', 'bf_btn_text' ];
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
            case 'description':
                return esc_html__( 'Description', 'hostim-core' );
            case 'btn_text':
                return esc_html__( 'Button Label', 'hostim-core' );
            case 'btn_2_text':
                return esc_html__( 'Button Two Label', 'hostim-core' );
            case 'sec_btn_text':
                return esc_html__( 'Secondary Button Label', 'hostim-core' );
            case 'uc_title':
                return esc_html__( 'User Count Title', 'hostim-core' );
            case 'uc_title_sufix':
                return esc_html__( 'Title Suffix', 'hostim-core' );
            case 'uc_subtitle':
                return esc_html__( 'User Count Subtitle', 'hostim-core' );
            case 'bf_btn_text':
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
            case 'title':
            case 'description':
                return 'AREA';
            case 'btn_text':
            case 'btn_2_text':
            case 'sec_btn_text':
            case 'uc_title':
            case 'uc_title_sufix':
            case 'uc_subtitle':
            case 'bf_btn_text':
                return 'LINE';
            default:
                return '';
        }
    }
}