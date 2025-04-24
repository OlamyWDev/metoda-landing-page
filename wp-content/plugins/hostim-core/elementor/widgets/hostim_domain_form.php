<?php
namespace Hostim\Widgets;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\{Widget_Base,
	Controls_Manager,
	Group_Control_Typography,
	Group_Control_Border,
	Group_Control_Box_Shadow,
	Group_Control_Background
};

class Hostim_domain_form extends Widget_Base {

	public function get_name() {
		return 'hostim-domain-form';
	}

	public function get_title() {
		return __( 'Hostim Domain Search Form', 'hostim-core' );
	}

	public function get_icon() {
		return 'eicon-form-horizontal';
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
		$this->elementor_content_control();
		$this->elementor_style_control();
	}


	/**
	 * Name: elementor_content_control()
	 * Desc: Register content
	 * Params: no params
	 * Return: @void
	 * Since: @1.0.0
	 * Package: @hostim
	 * Author: Themetags
	 */
	public function elementor_content_control() {

		$this->start_controls_section( 'sec_domain_search', [
			'label' => __( 'Select Layout', 'hostim-core' ),
		] );

		//======================== Layout =====================//
		$this->add_control( 'layout', [
			'label'   => esc_html__( 'Select Layout', 'hostim-core' ),
			'type'    => Controls_Manager::SELECT,
			'options' => [
				'1' => esc_html__( 'Layout 1', 'hostim-core' ),
				'2' => esc_html__( 'Layout 2', 'hostim-core' ),
				'3' => esc_html__( 'Layout 3', 'hostim-core' ),
				'4' => esc_html__( 'Layout 4', 'hostim-core' ),
				'5' => esc_html__( 'Layout 5', 'hostim-core' ),
				'6' => esc_html__( 'Layout 6', 'hostim-core' ),
			],
			'default' => '1',
		] );

		$this->end_controls_section(); //End Layout


		//================================= Content ==========================//
		$this->start_controls_section(
			'section_content', [
				'label' => __( 'Content', 'hostim-core' ),
			]
		);

		$this->add_control(
			'title', [
				'label'       => __( 'Title', 'hostim-core' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Search your Domain Name', 'hostim-core' ),
				'label_block' => true,
				'condition' => [
					'layout' => [ '1', '2', '4', '6' ]
				]
			]
		);

		$this->add_control(
			'placeholder_input', [
				'label'       => __( 'Placeholder Input Text', 'hostim-core' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Domain.com', 'hostim-core' ),
				'label_block' => true
			]
		);

		$this->add_control(
			'search_btn_label', [
				'label'       => __('Search Button label', 'hostim-core'),
				'type'        => Controls_Manager::TEXT,
				'default'     => __('Search', 'hostim-core'),
				'label_block' => true
			]
		);

		$this->add_control(
			'whmcs_url', [
				'label'         => __( 'Link', 'hostim-core' ),
				'type'          => \Elementor\Controls_Manager::URL,
				'placeholder'   => __( 'https://your-link.com', 'hostim-core' ),
				'description' => __('We added a WHMCS Integration option in the Theme Option, just add your <a href="admin.php?page=hostim-framework#tab=whmcs-integration">WHMCS URL here</a>', 'hostim-core'),
				'show_external' => true,
				'default'       => [
					'url'         => '#',
					'is_external' => true,
					'nofollow'    => true,
				],
			]
		);
		$this->add_control(
			'disable_ajax_search', [
				'label' => esc_html__('Enable Ajax Search', 'hostim-core'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__('Enable', 'hostim-core'),
				'label_off' => esc_html__('Disable', 'hostim-core'),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		$this->add_control(
			'domain_seggestion_on_off', [
				'label' => esc_html__('Domain Suggestion On/Off', 'hostim-core'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__('On', 'hostim-core'),
				'label_off' => esc_html__('Off', 'hostim-core'),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->end_controls_section(); //End Content


		//========================= Featured Image ======================//
		$this->start_controls_section(
			'section_feature_image', [
				'label' => __( 'Feature Image', 'hostim-core' ),
				'condition' => [
					'layout' => '2'
				]
			]
		);

		$this->add_control(
			'feature_img', [
				'label'       => __( 'Feature Image', 'hostim-core' ),
				'type'        => \Elementor\Controls_Manager::MEDIA,
				'label_block' => true,
			]
		);

		$this->end_controls_section();//End Featured Image


		//============================= Domain Extension and Price ==========================//
		$this->start_controls_section(
			'extension__section', [
				'label' => __( 'Domain Extension and Price', 'hostim-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'extension_dropdown_list_show', [
				'label'        => __( 'Extension Dropdown List Show/Hide', 'hostim-core' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => __( 'Show', 'hostim-core' ),
				'label_off'    => __( 'Hide', 'hostim-core' ),
				'return_value' => 'yes',
				'default'      => 'yes',
				'condition' => [
					'layout!' => ['4','5','6'],
				]
			]
		);

		$this->add_control(
			'extension_list_show', [
				'label'        => __( 'Extension List Show/Hide', 'hostim-core' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => __( 'Show', 'hostim-core' ),
				'label_off'    => __( 'Hide', 'hostim-core' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			]
		);

		$this->add_control(
			'select_currency',
			[
				'label'   => __('Select Currency', 'hostim-core'),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'currency_symbol_list' => __('Select From List', 'hostim-core'),
					'custom' => __('Custom', 'hostim-core'),

				],
				'default' => 'currency_symbol_list'
			]
		);

		$this->add_control(
			'currency_symbol',
			[
				'label'   => __('Select Currency', 'hostim-core'),
				'type'    => Controls_Manager::SELECT,
				'options' => array_flip(wdes_get_currency_symbol()),
				'default' => '&#36;',
				'condition' => [
					'select_currency' => 'currency_symbol_list'
				]
			]
		);

		$this->add_control(
			'currency_symbol_text',
			[
				'label'       => __('Currency Symbol', 'hostim-core'),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => '',
				'label_block' => true,
				'condition' => [
					'select_currency' => 'custom'
				]
			]
		);

		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'extension_domain', [
				'label'       => __( 'Extension', 'hostim-core' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => __( '.com', 'hostim-core' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'ext_color', [
				'label' => __( 'Extension Color', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}} strong' => 'color: {{VALUE}}',
					'{{WRAPPER}} {{CURRENT_ITEM}} h5' => 'color: {{VALUE}}',
				],
			]
		);

		$repeater->add_control(
			'price', [
				'label'   => __( 'Price', 'hostim-core' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'min'     => 0,
				'max'     => 2000,
				'step'    => 1,
				'default' => 10,
			]
		);

		$repeater->add_control(
				'mo_or_yr', [
				'label'       => __('Month/Year Label', 'hostim-core'),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => __('/Year', 'hostim-core'),
				'label_block' => true,
			]
		);

		$this->add_control(
			'extension_list', [
				'label'       => __( 'Extension List', 'hostim-core' ),
				'type'        => \Elementor\Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'prevent_empty'=> false,
				'default'     => [
					[
						'extension_domain' => __( '.com', 'hostim-core' ),
						'price'            => __( '12.95', 'hostim-core' ),
					],
					[
						'extension_domain' => __( '.net', 'hostim-core' ),
						'price'            => __( '8.75', 'hostim-core' ),
					],
					[
						'extension_domain' => __( '.org', 'hostim-core' ),
						'price'            => __( '2.32', 'hostim-core' ),
					],
					[
						'extension_domain' => __( '.online', 'hostim-core' ),
						'price'            => __( '7.57', 'hostim-core' ),
					],
				],
				'title_field' => '{{{ extension_domain }}}',
			]
		);

		$this->end_controls_section(); //End Domain Extension and Price


		/*======================= Shape Images ============================*/
		$shapes = new \Elementor\Repeater();
		$this->start_controls_section(
			'shape_image_sec', [
				'label' => __( 'Shape Image', 'hostim-core' ),
				'condition' => [
					'layout' => '2'
				]
			]
		);

		$shapes->add_control(
			'shape_img', [
				'label' => __( 'Choose Image', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,

			]
		);

		$shapes->add_responsive_control(
			'horizontal_position', [
				'label' => __( 'Horizontal Position', 'hostim-core' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1920,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 50,
				],
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}}' => 'left: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$shapes->add_responsive_control(
			'vertical_position',
			[
				'label' => __( 'Vertical Position', 'hostim-core' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1920,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 50,
				],
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}}' => 'top: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'shape_images',
			[
				'label' => __( 'Shape Image', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $shapes->get_controls(),
				'title_field' => '{{{ shape_img.alt }}}',
			]
		);

		$this->end_controls_section();

	}

	/**
	 * Name: elementor_style_control()
	 * Desc: Register style content
	 * Params: no params
	 * Return: @void
	 * Since: @1.0.0
	 * Package: @hostim
	 * Author: Themetags
	 */
	public function elementor_style_control() {

		# Heading Style
		/*======================*/

		$this->start_controls_section(
			'title_style_section', [
				'label' => __( 'Title', 'hostim-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_color', [
				'label'     => __( 'Color', 'hostim-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .domain-element .title' => 'color: {{VALUE}}',
					'{{WRAPPER}} .hm3-domain-left .sec_title' => 'color: {{VALUE}}',
					'{{WRAPPER}} .domain-search-box h2,h3' => 'color: {{VALUE}}',
					'{{WRAPPER}} .hm10-hero-search span' => 'color: {{VALUE}}'
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(), [
				'name'     => 'title_typography',
				'selector' => '
					{{WRAPPER}} .domain-element .title,
					{{WRAPPER}} .hm3-domain-left .sec_title,
					{{WRAPPER}} .domain-search-box h2,h3,
					{{WRAPPER}} .hm10-hero-search span
				',
			]
		);


		$this->end_controls_section();

		# Sub Title Style
		/*======================*/

		$this->start_controls_section(
			'subtitle_style_section', [
				'label' => __( 'Sub Title', 'hostim-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'subtitle_color', [
				'label'     => __( 'Color', 'hostim-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .domain-element .sub_title' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'subtitle_bg_color', [
				'label'     => __( 'Background Color', 'hostim-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .domain-element .sub_title' => 'background: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(), [
				'name'     => 'subtitle_typography',
				'selector' => '{{WRAPPER}} .domain-element .sub_title',
			]
		);

		$this->end_controls_section();


		# Description Style
		/*======================*/
		$this->start_controls_section(
			'des_style_section', [
				'label' => __( 'Description', 'hostim-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'des_color', [
				'label'     => __( 'Color', 'hostim-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .domain-element .description' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'des_bg_color', [
				'label'     => __( 'Background Color', 'hostim-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .domain-element .description' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(), [
				'name'     => 'des_typography',
				'selector' => '{{WRAPPER}} .domain-element .description',
			]
		);

		$this->end_controls_section();


		# Button Style
		/*======================*/
		$this->start_controls_section(
			'button_style_section', [
				'label' => __( 'Search Form', 'hostim-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs(
			'style_btn_form_tabs'
		);

		$this->start_controls_tab(
			'style_btn_form_normal', [
				'label' => esc_html__( 'Normal', 'hostim-core' ),
			]
		);

		$this->add_control(
			'btn_color', [
				'label'     => __( 'Button Color', 'hostim-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} #hostim-domain-search .hostim-input-inner .hostim-btn' => 'color: {{VALUE}}',
					'{{WRAPPER}} .__form_submit_btn input[type=submit]' => 'color: {{VALUE}}',
					'{{WRAPPER}} .__form_submit_btn .__btn' => 'color: {{VALUE}}',
					'{{WRAPPER}} .hostim-domain-search #hostim-search' => 'color: {{VALUE}}'
				],
			]
		);

		$this->add_control(
			'btn_bg_color', [
				'label'     => __( 'Button BG Color', 'hostim-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} #hostim-domain-search .hostim-input-inner .hostim-btn' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .__form_submit_btn input[type=submit]' => 'background: {{VALUE}}',
					'{{WRAPPER}} .__form_submit_btn .__btn::before' => 'background: {{VALUE}}; opacity: initial',
					'{{WRAPPER}} .__form_submit_btn .__btn' => 'background: {{VALUE}};',
					'{{WRAPPER}} .hostim-domain-search #hostim-search' => 'background: {{VALUE}};'
				],
			]
		);

		$this->end_controls_tab();//End Normal Tab

		//======== Hover Color
		$this->start_controls_tab(
			'style_btn_form_hover', [
				'label' => esc_html__( 'Hover', 'hostim-core' ),
			]
		);

		$this->add_control(
			'btn_color_hover', [
				'label'     => __( 'Color', 'hostim-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} #hostim-domain-search .hostim-input-inner .hostim-btn:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .__form_submit_btn input[type=submit]:hover' => 'color: {{VALUE}}'
				],
			]
		);

		$this->add_control(
			'btn_bg_color_hover', [
				'label'     => __( 'BG Color', 'hostim-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} #hostim-domain-search .hostim-input-inner .hostim-btn:hover' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .__form_submit_btn input[type=submit]:hover' => 'background: {{VALUE}}',
					'{{WRAPPER}} .__form_submit_btn .__btn:hover' => 'background: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();//End Button form tabs


		$this->add_control(
			'spinner_color', [
				'label'     => __( 'Spinner Color', 'hostim-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .spinner' => 'color: {{VALUE}}',
				],
				'separator' => 'before'
			]
		);

		//====================== Form Input
		$this->add_control(
			'domain_divider', [
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'form_bg_color', [
				'label'     => __( 'Form BG Color', 'hostim-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} #hostim-domain-search .hostim-input-inner' => 'background: {{VALUE}}',
					'{{WRAPPER}} .dm-hero-domain-form input[type=text]' => 'background: {{VALUE}}',
					'{{WRAPPER}} .hostim-domain-search input#hostim-domain' => 'background: {{VALUE}}',
					'{{WRAPPER}} .hm10-hero-search form input' => 'background: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(), [
				'name' => 'box_shadow',
				'label' => __( 'Form Shadow', 'hostim-core' ),
				'selector' => '
					{{WRAPPER}} .domain-wrapper .hostim-input-inner, 
					{{WRAPPER}} .domain-search-box .domain-search-form,
					{{WRAPPER}} .domain_search_section .hostim-domain-search
				',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(), [
				'name' => 'form_border',
				'label' => __( 'Border', 'hostim-core' ),
				'selector' => '
					{{WRAPPER}} .domain-wrapper .hostim-input-inner, 
					{{WRAPPER}} .__domain_form,
					{{WRAPPER}} .domain-search-box .domain-search-form,
					{{WRAPPER}} .domain_search_section .hostim-domain-search,
					{{WRAPPER}} .form.dd-search-form.bg-white.rounded-pill.p-1.ps-3.d-flex.align-items-center.gap-2.__form_submit_btn,
					{{WRAPPER}} .hm2-dm-search-form
				',
			]
		);

		$this->add_control(
			'form_field_border_radius', [
				'label' => esc_html__( 'Field Border Radius', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .dm-hero-domain-form input[type=text]' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .domain-search-box .domain-search-form' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .h5-domain-search-form input' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .hostim-domain-search input#hostim-domain' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .hm10-hero-search form input' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);

		//================= Button Divider
		$this->add_control(
			'form_btn_divider', [
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(), [
				'name'     => 'btn_typography',
				'label'    => __( 'Typography', 'hostim-core' ),
				'selector' => '
					{{WRAPPER}} .ext-name,
					{{WRAPPER}} .hostim-domain-search #hostim-search,
					{{WRAPPER}} .domain_search_section .hostim-search
				',
			]
		);

		$this->add_control(
			'form_btn_border_radius', [
				'label' => esc_html__( 'Button Border Radius', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .dm-hero-domain-form input[type=submit]' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .hostim-domain-search #hostim-search' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .domain_search_section .hostim-search' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .dd-domain-content .dd-search-form button#hostim-search' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .hm10-hero-search form .submit-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'search_form_placeholder_color',
			[
				'label' => esc_html__( 'Placeholder Color', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} input#hostim-domain' => 'color: {{VALUE}}',
				],
			]
		);



		$this->end_controls_section();


		$this->start_controls_section(
			'suggestion_heading_style',
			[
				'label' => __('Suggestion Heading', 'hostim-core'),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'suggestion_heading_typography',
				'label'    => __('Typography', 'hostim-core'),
				'selector' => '{{WRAPPER}} .suggestion-heading',
			]
		);
		$this->add_control(
			'suggestion_heading_color',
			[
				'label'     => __('Color', 'hostim-core'),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .suggestion-heading' => 'color: {{VALUE}}',
					'{{WRAPPER}} #hostim-domain-suggestions .spinner-border' => 'border-color: {{VALUE}}'
				],
			]
		);

		$this->end_controls_section();



		# Extension Style
		/*======================*/
		$this->start_controls_section(
			'extension_style_section',
			[
				'label' => __( 'Extension', 'hostim-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
				'condition' => [
					'layout' => [ '1', '2','4','5' ]
				]
			]
		);

		$this->add_control(
			'ext_color', [
				'label'     => __( 'Extension Color dddd', 'hostim-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ext-name' => 'color: {{VALUE}}',
					'{{WRAPPER}} .primary-text' => 'color: {{VALUE}}',
					'{{WRAPPER}} .domain-info.dd-domain-info .info-box h5' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'ext_typography',
				'label'    => __( 'Extension Typography', 'hostim-core' ),
				'selector' => '{{WRAPPER}} .ext-name,
					{{WRAPPER}} .primary-text,
					{{WRAPPER}} .domain-info.dd-domain-info .info-box h5
				',
			]
		);

		$this->add_control(
			'price_color', [
				'label'     => __( 'Price Color', 'hostim-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .price' => 'color: {{VALUE}}',
					'{{WRAPPER}} .domain-search-box .info-box span' => 'color: {{VALUE}}',
					'{{WRAPPER}} .domain-info.dd-domain-info .info-box span' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'price_typography',
				'label'    => __( 'Price Typography', 'hostim-core' ),
				'selector' => '
					{{WRAPPER}} .ext-name,
					{{WRAPPER}} .domain-search-box .info-box span,
					{{WRAPPER}} .domain-info.dd-domain-info .info-box span
				',
			]
		);

		$this->end_controls_section(); //End Extension Dropdown


		//============================= Extension List Color ==============================//
		$this->start_controls_section(
			'extension_style_3_section', [
				'label' => __( 'Extension', 'hostim-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
				'condition' => [
					'layout' => [ '3', '6' ]
				]
			]
		);

		$this->add_control(
			'exten_color', [
				'label'     => __( 'Extension Color', 'hostim-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .domain_price' => 'color: {{VALUE}}',
					'{{WRAPPER}} .__ext_domain' => 'color: {{VALUE}}',
					'{{WRAPPER}} span.domain_price.has_separator' => 'border-color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(), [
				'name'     => 'domain_exten_typo',
				'label'    => __( 'Domain Extension Typography', 'hostim-core' ),
				'selector' => '
					{{WRAPPER}} .domain_price > strong,
					{{WRAPPER}} .domain-info .info-box h5.primary-text.mb-0	
				',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(), [
				'name'     => 'exten_typography',
				'label'    => __( 'Price Typography', 'hostim-core' ),
				'selector' => '{{WRAPPER}} .domain_price .price_info, {{WRAPPER}} .__ext_domain',
			]
		);

		$this->add_responsive_control(
			'domain_price_margin', [
				'label' => esc_html__( 'Margin', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .domain_price' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .__domain_ext' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


		$this->add_control(
			'extension_alignment', [
				'label' => esc_html__( 'Alignment', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'flex-start' => [
						'title' => esc_html__( 'Left', 'hostim-core' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'hostim-core' ),
						'icon' => 'eicon-text-align-center',
					],
					'flex-end' => [
						'title' => esc_html__( 'Right', 'hostim-core' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'flex-start',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .__domain_ext' => 'justify-content: {{VALUE}};',
				],
				'separator' => 'before',
				'condition' => [
					'layout' => [ '3']
				]
			]
		);

		$this->add_control(
			'extention_separator',
			[
				'label' => esc_html__('Hide Separator', 'hostim-core'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__('Hide', 'hostim-core'),
				'label_off' => esc_html__('Show', 'hostim-core'),
				'return_value' => 'none',
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .__domain_ext span.domain_price.has_separator' => 'border-left: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'ext_spacing',
			[
				'label' => esc_html__('Spacing', 'hostim-core'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['px', '%'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .__domain_ext span.domain_price.has_separator + span.domain_price' => 'margin-left: {{SIZE}}{{UNIT}}; padding-left: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section(); //End Extension


		$this->start_controls_section('style_section', [
			'label' => __('Section Background', 'hostim-core'),
			'tab'   => Controls_Manager::TAB_STYLE,
			'condition' => [
				'layout!' => '1'
			]
		]);
		$this->add_responsive_control(
			'section_margin',
			[
				'label' => esc_html__('Margin', 'hostim-core'),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .domain_search_section' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} div#hostim-domain-search' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'section_padding',
			[
				'label' => esc_html__('Padding', 'hostim-core'),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .domain_search_section' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} div#hostim-domain-search' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'sec_background',
				'label' => esc_html__('Background', 'plugin-name'),
				'types' => ['classic', 'gradient', 'video'],
				'selector' => '
					{{WRAPPER}} .domain_search_section,
					{{WRAPPER}} div#hostim-domain-search,
					{{WRAPPER}} .hm10-hero-search div#hostim-domain-search
				',
			]
		);

		$this->end_controls_section();


		//Section background style added ---------------------------------------
		$this->start_controls_section(
			'sec_bg',
			[
				'label' => esc_html__( 'Section Background', 'hostim-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				'condition' => [
					'layout' => '1'
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'section_background',
				'types' => [ 'classic', 'gradient'],
				'selector' => '{{WRAPPER}} .section_background__',
			]
		);
		$this->add_control(
			'sec_margin',
			[
				'label' => esc_html__( 'Section Margin', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .section_background__' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'sec_padding',
			[
				'label' => esc_html__( 'Section Padding', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .section_background__ .domain-search-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'sec_border_radius',
			[
				'label' => esc_html__( 'Section BorderRadius', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .section_background__' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();



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
		$settings = $this->get_settings();
		extract( $settings );

		$disable_ajax = $disable_ajax_search == 'yes' ? '' : '-off';


		//====================== Template Parts ========================//
		include "templates/domain-search/domain_search-{$layout}.php";

	}


	/**
	 * The bridge Page Id.
	 */
	public function get_bridge_page_id( $type = 'string' ) {
		$bridge_page_id = get_option( 'cc_whmcs_bridge_pages' );

		if ( isset( $bridge_page_id ) ) {
			if ( $type === 'int' ) {
				return intval( $bridge_page_id );
			}

			return $bridge_page_id;

		} else {
			return false;
		}
	}

	/**
	 * Bridge page exists.
	 */
	public function wdes_bridge_page_exists() {
		if ( $this->get_bridge_page_id() ) {
			return true;
		}

		return false;
	}

	/**
	 * Bridge Checker.
	 */
	public function wdes_bridge_checker() {
		if ( $this->wdes_bridge_page_exists() ) {
			$output = get_permalink( $this->get_bridge_page_id() ) . '?ccce=domainchecker';

			return $output;
		}

		return false;
	}

	/**
	 * Domain Action Url.
	 */
	public function wdes_domain_action_url( $default ) {

		if ( $this->wdes_bridge_checker() ) {
			$output = $this->wdes_bridge_checker();
		} else {
			if ( ! empty( $default ) ) {
				$output = $default;
			} else {
				$output = '#';
			}
		}

		return $output;
	}
}
