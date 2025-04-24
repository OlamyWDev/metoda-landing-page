<?php

namespace Hostim\Widgets;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\{Controls_Manager,
	Group_Control_Background,
	Group_Control_Border,
	Group_Control_Box_Shadow,
	Group_Control_Typography,
	Repeater,
	Icons_Manager,
	Widget_Base};

/**
 * Hostim Tab
 *
 * Hostim widget.
 *
 * @since 2.0.0
 */
class Hostim_Services_Faq extends Widget_Base {

	public function get_name() {
		return 'hostim-services-faq';
	}

	public function get_title() {
		return __( 'Hostim Services Faq', 'hostim-core' );
	}

	public function get_icon() {
		return 'eicon-accordion';
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
		$this->start_controls_section( 'section_tab', [
			'label' => esc_html__( 'FAQ\'s Style', 'hostim-core' ),
		] );

		$this->add_control( 'layout', [
			'label'   => esc_html__( 'Select Style', 'hostim-core' ),
			'type'    => Controls_Manager::SELECT,
			'label_block' => true,
			'default' => '1',
			'options' => [
				'1' => esc_html__( 'Style One', 'hostim-core' ),
				'2' => esc_html__( 'Style Two', 'hostim-core' ),
				'3' => esc_html__( '03: Horizontal Tab', 'hostim-core' ),
				'4' => esc_html__( '04: Horizontal Tab', 'hostim-core' ),
			],
		] );

		$this->end_controls_section();

		// ------------------------------ Feature list ------------------------------
		$this->start_controls_section( 'services_faq_tab', [
			'label' => __( 'FAQ\'s Tabs', 'hostim-core' ),
		] );

		//===== FAQs - Layout 01, 02, 03
		$repeater = new Repeater();
		$repeater->add_control( 'select_service_cat', [
			'label'   => esc_html__( 'Select Category', 'hostim-core' ),
			'type'    => Controls_Manager::SELECT,
			'options' => hostim_cat_array( 'services_cat' ),
			'default' => ''
		] );

		$repeater->add_control( 'tab_title', [
			'label'       => __( 'Accordion Title', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true,
			'separator' => 'before'
		] );

		$repeater->add_control( 'description', [
			'label'       => __( 'Description', 'hostim-core' ),
			'type'        => Controls_Manager::WYSIWYG,
			'label_block' => true,
		] );

		$this->add_control( 'hostim_faqs', [
			'label'       => __( 'FAQ\'s', 'hostim-core' ),
			'type'        => Controls_Manager::REPEATER,
			'fields'      => $repeater->get_controls(),
			'default'     => [
				[
					'tab_title'   => __( 'What is WordPress Hosting', 'hostim-core' ),
					'description' => __( 'We care about safety big time — and so do your site\'s visitors. With a Shared Hosting account, you get an SSL certificate for free to add to your site. In this day and age, having an SSL for your site is a no-brainer best practice. Not only does an SSL help your visitors feel safe interacting with your site — this is particularly important if you run an e-commerce site.', 'hostim-core' ),
				],

			],
			'title_field' => '{{{select_service_cat}}} - {{{ tab_title }}}',
			'condition' => [
				'layout' => [ '1', '2', '3' ]
			]
		] ); //End Layout 01, 02, 03

		//===== FAQs - Layout 04
		$faq4 = new Repeater();
		$faq4->add_control( 'select_service_cat', [
			'label'   => esc_html__( 'Select Category', 'hostim-core' ),
			'type'    => Controls_Manager::SELECT,
			'options' => hostim_cat_array( 'services_cat' ),
			'default' => ''
		] );

		$faq4->add_control( 'fimg', [
			'label'       => __( 'Image', 'hostim-core' ),
			'type'        => Controls_Manager::MEDIA,
		] );

		$faq4->add_control( 'tab_title', [
			'label'       => __( 'Accordion Title', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true,
			'separator' => 'before'
		] );

		$faq4->add_control( 'description', [
			'label'       => __( 'Description', 'hostim-core' ),
			'type'        => Controls_Manager::WYSIWYG,
			'label_block' => true,
		] );

		$this->add_control( 'hostim_faqs4', [
			'label'       => __( 'FAQ\'s', 'hostim-core' ),
			'type'        => Controls_Manager::REPEATER,
			'fields'      => $faq4->get_controls(),
			'default'     => [
				[
					'tab_title'   => __( 'What is WordPress Hosting', 'hostim-core' ),
					'description' => __( 'We care about safety big time — and so do your site\'s visitors. With a Shared Hosting account, you get an SSL certificate for free to add to your site. In this day and age, having an SSL for your site is a no-brainer best practice. Not only does an SSL help your visitors feel safe interacting with your site — this is particularly important if you run an e-commerce site.', 'hostim-core' ),
				],

			],
			'title_field' => '{{{select_service_cat}}} - {{{ tab_title }}}',
			'condition' => [
				'layout' => '4'
			]
		] ); //End Layout 04

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

		$this->start_controls_section(
			'style_contents', [
				'label' => esc_html__( 'Contents', 'hostim-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		//================ Title Options
		$this->add_control(
			'item_title_options', [
				'label' => esc_html__( 'Title Options', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(), [
				'name' => 'item_title_typo',
				'selector' => '{{WRAPPER}} .__title',
			]
		);

		$this->add_control(
			'item_title_color', [
				'label' => esc_html__( 'Text Color', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .__title' => 'color: {{VALUE}}',
					'{{WRAPPER}} .hm2-accordion .accordion-item .accordion-header a::after' => 'border-color: {{VALUE}}'
				],
			]
		); //End Item Title

		//================ Content Options
		$this->add_control(
			'item_content_options', [
				'label' => esc_html__( 'Content Options', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(), [
				'name' => 'item_content_typo',
				'selector' => '{{WRAPPER}} .__content',
			]
		);

		$this->add_control(
			'item_content_color', [
				'label' => esc_html__( 'Text Color', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .__content' => 'color: {{VALUE}}'
				]
			]
		); //End Content Options

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'content_background',
				'label' => esc_html__('Background', 'hostim-core'),
				'types' => ['classic', 'gradient'],
				'selector' => '
					{{WRAPPER}} .faq-section .hm2-accordion,
					{{WRAPPER}} .faq-section .tab-pane .accordion-item
				'
			]
		);

		$this->end_controls_section(); //End Service Section


		$this->start_controls_section(
			'style_tab_item',
			[
				'label' => esc_html__('Tabs', 'hostim-core'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs(
			'faq_tabs'
		);

		$this->start_controls_tab(
			'faq_normal_tab',
			[
				'label' => esc_html__('Normal', 'hostim-core'),
			]
		);
		$this->add_control(
			'tab_item_color',
			[
				'label' => esc_html__('Text Color', 'hostim-core'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hm2-server-tab-control li button' => 'color: {{VALUE}}',
					'{{WRAPPER}} .ds-faq-controls li button' => 'color: {{VALUE}}',
					'{{WRAPPER}} .hm9-faq-controls li button' => 'color: {{VALUE}}',
					'{{WRAPPER}} .hm10-faq-tab ul li a h6' => 'color: {{VALUE}}'
				]
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'tab_background',
				'label' => esc_html__('Background', 'hostim-core'),
				'types' => ['classic', 'gradient'],
				'selector' => '
					{{WRAPPER}} .hm2-server-tab-control li button,
					{{WRAPPER}} .ds-faq-controls li button,
					{{WRAPPER}} .hm9-faq-controls li button,
					{{WRAPPER}} .hm10-faq-tab ul li a,
					{{WRAPPER}} .ds-faq-controls li button.active
				',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'tab_border',
				'selector' => '
					{{WRAPPER}} .hm2-server-tab-control li button
					{{WRAPPER}} .ds-faq-controls li button,
					{{WRAPPER}} .hm9-faq-controls li button,
					{{WRAPPER}} .hm10-faq-tab ul li a
				',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'faq_hover_tab',
			[
				'label' => esc_html__('Hover', 'hostim-core'),
			]
		);
		$this->add_control(
			'item_hover_color',
			[
				'label' => esc_html__('Text Color', 'hostim-core'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hm2-server-tab-control li button:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .hm2-server-tab-control li button:hover i' => 'color: {{VALUE}}',
					'{{WRAPPER}} .hm2-server-tab-control li button.active' => 'color: {{VALUE}}',
					'{{WRAPPER}} .hm2-server-tab-control li button.active i' => 'color: {{VALUE}}',
					'{{WRAPPER}} .ds-faq-controls li button:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .hm9-faq-controls li button:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .hm10-faq-tab ul li a h6:hover' => 'color: {{VALUE}}'
				]
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'tab_hover_background',
				'label' => esc_html__('Background', 'hostim-core'),
				'types' => ['classic', 'gradient'],
				'selector' => '
					{{WRAPPER}} .hm2-server-tab-control li button::before,
					{{WRAPPER}} .ds-faq-controls li button:hover,
					{{WRAPPER}} .hm9-faq-controls li button:hover,
					{{WRAPPER}} .hm10-faq-tab ul li a:hover,
					{{WRAPPER}} .ds-faq-controls li button.active
				',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'item_hover_border',
				'selector' => '
					{{WRAPPER}} .hm2-server-tab-control li button:hover,
					{{WRAPPER}} .ds-faq-controls li button:hover,
					{{WRAPPER}} .hm9-faq-controls li button:hover,
					{{WRAPPER}} .hm10-faq-tab ul li a:hover					
				',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'item_box_shadow_color',
				'types' => [ 'gradient' ],
				'selector' => '{{WRAPPER}} .ds-faq-controls li button::before',
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();


		$this->end_controls_section(); //End Service Section


		//====================== Section background ==================//
		$this->start_controls_section( 'background_section', [
			'label' => __( 'Section Basckground', 'hostim-core' ),
			'tab'   => Controls_Manager::TAB_STYLE,
		] );

		$this->add_responsive_control( 'sec_margin', [
			'label'      => __( 'Margin', 'hostim-core' ),
			'type'       => Controls_Manager::DIMENSIONS,
			'size_units' => [ 'px', '%', 'em' ],
			'selectors'  => [
				'{{WRAPPER}} .faq-section' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				'{{WRAPPER}} .rs-faq' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
			],
		] );

		$this->add_responsive_control( 'sec_padding', [
			'label'      => __( 'Padding', 'hostim-core' ),
			'type'       => Controls_Manager::DIMENSIONS,
			'size_units' => [ 'px', '%', 'em' ],
			'selectors'  => [
				'{{WRAPPER}} .faq-section' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				'{{WRAPPER}} .rs-faq' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
			],
		] );
		$this->add_group_control( Group_Control_Background::get_type(), [
			'name' => 'background',
			'label' => esc_html__( 'Background', 'hostim-core' ),
			'types' => [ 'classic', 'gradient' ],
			'selector' => '
				{{WRAPPER}} .faq-section,
				{{WRAPPER}} .rs-faq
			',
		] );

		$this->end_controls_section();

		$dark_mode = hostim_option('is_dark_mode', false);
		if ($dark_mode) {
			$this->start_controls_section('dark_bg_style', [
				'label' => __('Dark Mode Background', 'hostim-core'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]);
			$this->add_group_control(Group_Control_Background::get_type(), [
				'name' => 'section_dark_mode',
				'label' => esc_html__('Dark Mode Background', 'hostim-core'),
				'types' => ['classic', 'gradient'],
				'selector' => '[data-bs-theme=dark] {{WRAPPER}} .faq-section, [data-bs-theme=dark] {{WRAPPER}} .rs-faq',
			]);
			$this->end_controls_section(); //End Section Background
		}
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

		$settings    = $this->get_settings();
		extract( $settings );

		require __DIR__ . '/templates/faq/faq-' . $layout . '.php';

	}
}
