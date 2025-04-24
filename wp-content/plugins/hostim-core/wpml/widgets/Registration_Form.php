<?php
namespace HostimCore\WPML;

use WPML_Elementor_Module_With_Items;

/**
 * Class About
 */

defined( 'ABSPATH' ) || die();

class Registration_Form extends WPML_Elementor_Module_With_Items {

    /**
     * @return string
     */
    public function get_items_field() {
        return 'hostim_registration_Form';
    }

    /**
     * @return array
     */
    public function get_fields() {
        return [ 'email_placeholder', 'email_name', 'password_placeholder', 'pass_name', 'submit_label' ];
    }

    /**
     * @param string $field
     *
     * @return string
     */
    protected function get_title( $field ) {
        switch( $field ) {
            case 'email_placeholder':
                return esc_html__( 'Email Placeholder', 'hostim-core' );
            case 'email_name':
                return esc_html__( 'Email Name', 'hostim-core' );
            case 'password_placeholder':
                return esc_html__( 'Password Placeholder', 'hostim-core' );
            case 'pass_name':
                return esc_html__( 'Password Name', 'hostim-core' );
            case 'submit_label':
                return esc_html__( 'Submit Button Label', 'hostim-core' );
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
            case 'email_placeholder':
            case 'email_name':
            case 'password_placeholder':
            case 'pass_name':
            case 'submit_label':
                return 'LINE';
            default:
                return '';
        }
    }
}