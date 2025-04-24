<?php

namespace Hostim\Widgets;

defined( 'ABSPATH' ) || exit; // Abort, if called directly.

use Elementor\{Group_Control_Background,
	Group_Control_Border,
	Group_Control_Box_Shadow,
	Widget_Base,
	Controls_Manager,
	Group_Control_Typography,
	Repeater};


class Hostim_Pricing_Switcher extends Widget_Base {

	public function get_name() {
		return 'hostim-pricing-switcher';
	}

	public function get_title() {
		return __( 'Hostim Pricing Switcher', 'hostim-core' );
	}

	public function get_icon() {
		return 'eicon-post-navigation';
	}

	public function get_categories() {
		return [ 'hostim-elements' ];
	}

	/**
     * Name: register_controls
     * Desc: Register controls for these widgets
     * Params: no params
     * Return: @void
     * Since: @1.0.0
     * Package: @hostim
     * Author: Themetags
     */
    protected function register_controls() {
        $this-> hostim_elementor_content_control();
        $this-> hostim_elementor_style_control();
    }

	/**
     * Name: hostim_elementor_content_control
     * Desc: Register content
     * Params: no params
     * Return: @void
     * Since: @1.0.0
     * Package: @hostim
     * Author: Themetags
     */
    public function hostim_elementor_content_control() {

		//==================== Price Switcher Label ======================//
		$this->start_controls_section( 'sec_price_switcher_label', [
			'label' => __( 'Price Switcher Label', 'hostim-core' ),
		] );


		$this->add_control(
		'text_label',[
				'label'       => esc_html__( 'Text', 'Text-domain' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'Price to include VAT?', 'Text-domain' ),
				'label_block' => true
			]
		);
			
		$this->end_controls_section(); //End Price Switcher Label

	}


	/**
     * Name: hostim_elementor_style_control
     * Desc: Register style content
     * Params: no params
     * Return: @void
     * Since: @1.0.0
     * Package: @hostim
     * Author: Themetags
     */
    public function hostim_elementor_style_control() {


		//===================== Style Price Switcher Label ======================//
		$this->start_controls_section( 'style_price_switcher_label', [
			'label' => __( 'Price Switcher Label', 'hostim-core' ),
			'tab'	=> Controls_Manager::TAB_STYLE
		] );

		$this->add_control(
		'text_label_color',[
				'label'       => esc_html__( 'Text Color', 'Text-domain' ),
				'type'     => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .__text' => 'color: {{VALUE}}'
				],
			]
		);

		$this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),[
				'name' => 'text_label_typo',
				'selector' => '{{WRAPPER}} .__text',
			]
		);

		$this->end_controls_section(); //End Price Switcher Label


		//===================== Style Switcher Icon ======================//
		$this->start_controls_section( 'style_switcher_icon', [
			'label' => __( 'Switcher Box', 'hostim-core' ),
			'tab'	=> Controls_Manager::TAB_STYLE
		] );

		$this->add_control(
		'switcher_border_icon_color',[
				'label'       => esc_html__( 'Border Color', 'Text-domain' ),
				'type'     => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .__icon' => 'border-color: {{VALUE}}'
				],
			]
		);

		$this->end_controls_section(); //End Price Switcher Label

	}


	/**
     * Name: render
     * Desc: Widgets Render
     * Params: no params
     * Return: @void
     * Since: @1.0.0
     * Package: @hostim
     * Author: Themetags
     */
	protected function render() {

		$settings  = $this->get_settings_for_display();
		extract( $settings ); 
		?>

		<div class="right-content mt-3 mt-lg-0">
			<div class="wp-pricing-meta-item d-flex align-items-center">
				<p class="mb-0 __text"><?php echo esc_html($text_label) ?></p>
				<div class="tab-switch-btn d-inline-flex align-items-center justify-content-center position-relative">
					<input type="checkbox" class="switch-input position-absolute">
					<span class="toggle-switch-btn rounded-pill position-relative __icon"></span>
				</div>
			</div>
		</div>
	
		<?php

	}
}