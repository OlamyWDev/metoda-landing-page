<?php
namespace HostimCore\WPML;

use WPML_Elementor_Module_With_Items;

/**
 * Class Pricing_Single
 */

defined( 'ABSPATH' ) || die();

class Pricing_Single extends WPML_Elementor_Module_With_Items {

    /**
     * @return string
     */
    public function get_items_field() {
        return 'hostim_pricing_single';
    }

    /**
     * @return array
     */
    public function get_fields() {
        return [ 'plan_title', 'sub_title', 'saved_badge', 'currency', 'period', 'plan_desc', 'purchase_btn_label' ];
    }

    /**
     * @param string $field
     *
     * @return string
     */
    protected function get_title( $field ) {
        switch( $field ) {
            case 'plan_title':
                return esc_html__( 'Plan Title', 'hostim-core' );
            case 'sub_title':
                return esc_html__( 'Sub Title', 'hostim-core' );
            case 'saved_badge':
                return esc_html__( 'Package Saved', 'hostim-core' );
            case 'currency':
                return esc_html__( 'Currency', 'hostim-core' );
            case 'period':
                return esc_html__( 'Period', 'hostim-core' );
            case 'plan_desc':
                return esc_html__( 'Short Description', 'hostim-core' );
            case 'purchase_btn_label':
                return esc_html__( 'Purchase Button Monthly Label', 'hostim-core' );
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
            case 'plan_title':
            case 'sub_title':
            case 'saved_badge':
            case 'currency':
            case 'period':
            case 'purchase_btn_label':
                return 'LINE';
            case 'plan_desc':
                return 'AREA';
            default:
                return '';
        }
    }
}