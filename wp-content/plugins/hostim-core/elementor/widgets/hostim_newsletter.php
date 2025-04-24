<?php

namespace Hostim\Widgets;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\{Group_Control_Box_Shadow,
	Widget_Base,
	Controls_Manager,
	Group_Control_Typography,
	Group_Control_Border,
	Group_Control_Background};


class Hostim_Newsletter extends Widget_Base {

	public function get_name() {
		return 'hostim-newsletter';
	}


	public function get_title() {
		return __( 'Hostim Newsletter', 'hostim-core' );
	}

	public function get_icon() {
		return 'eicon-mail';
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


        //===================== Select Layout =======================//
		$this->start_controls_section( 'newsletter_section', [
			'label' => esc_html__( 'Layout', 'hostim-core' ),
		] );

		$this->add_control( 'layout', [
			'label'   => esc_html__( 'Select Layout', 'hostim-core' ),
			'type'    => Controls_Manager::SELECT,
			'default' => 1,
			'options' => [
				'1' => esc_html__( 'Style One', 'hostim-core' ),
				'2' => esc_html__( 'Style Two', 'hostim-core' ),
				'3' => esc_html__( 'Style Three', 'hostim-core' ),
				'4' => esc_html__( 'Style Four', 'hostim-core' )
			],
		] );

		$this->end_controls_section(); //End Layout


        //===================== Newsletter ========================//
		$this->start_controls_section( 'section_content', [
			'label' => __( 'Newsletter', 'hostim-core' ),
		] );

		$this->add_control(
			'text_align',
			[
				'label' => esc_html__( 'Alignment', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'horizontal' => [
						'title' => esc_html__( 'Horizontal', 'hostim-core' ),
						'icon' => 'eicon-form-horizontal',
					],
					'flex' => [
						'title' => esc_html__( 'Vertical', 'hostim-core' ),
						'icon' => 'eicon-form-vertical',
					],
				],
				'default' => 'center',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .form_wraper' => 'display: {{VALUE}};',
				],
				'condition' => [
					'layout' => '4'
				]
			]
		);

		$this->add_control( 'input_placeholder', [
			'label'       => esc_html__( 'Input Placeholder', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => __( 'Enter your email', 'hostim-core' ),
			'label_block' => true,
		] );

		$this->add_control( 'subscribe_text', [
			'label'       => esc_html__( 'Button Text', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true,
			'default'     => __( 'SUBSCRIBE', 'hostim-core' ),
			'separator'   => 'before',
		] );

		$this->add_control( 'form_description_text', [
			'label'       => esc_html__( 'Description Text', 'hostim-core' ),
			'type'        => Controls_Manager::TEXTAREA,
			'label_block' => true,
			'default'     => __( '*Try Hostim Today And Get The First Month With 90% OFF', 'hostim-core' ),
			'separator'   => 'before',
			'condition'   => [
				'layout'  => '3'
			]
		] );

		$this->end_controls_section(); //End Newsletter

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

		// Style Section
		//======================

		$this->start_controls_section( 'section_style_field', [
			'label' => __( 'Email Field', 'hostim-core' ),
			'tab' => Controls_Manager::TAB_STYLE,
		] );
		$this->add_control(
			'form_width',
			[
				'label' => esc_html__( 'Form Width', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .newsletter-form input.form-control' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'form_height',
			[
				'label' => esc_html__( 'Form Height', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .newsletter-form input.form-control' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'field_color',
			[
				'label' => __('Color', 'hostim-core'),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .newsletter-form input:not([type=checkbox]):not([type=submit])' => 'color: {{VALUE}};',
					'{{WRAPPER}} .footer-widget .footer-sb-form input[type=email]' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'field_bg_color',
			[
				'label' => __('Background', 'hostim-core'),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .newsletter-form input:not([type=checkbox]):not([type=submit])' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .footer-widget .footer-sb-form input[type=email]' => 'background-color: {{VALUE}};'
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'field_typography',
				'label' => __('Typography', 'hostim-core'),
				'selector' => '
					{{WRAPPER}} .newsletter-form input:not([type=checkbox]):not([type=submit]),
					{{WRAPPER}} .footer-widget .footer-sb-form input[type=email]
				',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border_field',
				'label' => __('Border', 'hostim-core'),
				'selector' => '
					{{WRAPPER}} .newsletter-form input:not([type=checkbox]):not([type=submit]),
					{{WRAPPER}} .footer-widget .footer-sb-form input[type=email]
				'
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_field_shadow',
				'label' => __( 'Box Shadow', 'hostim-core' ),
				'selector' => '
					{{WRAPPER}} .newsletter-form input:not([type=checkbox]):not([type=submit]),
					{{WRAPPER}} .footer-widget .footer-sb-form input[type=email]
				',
			]
		);

		$this->add_control(
			'border_radius_field',
			[
				'label' => __('Border Radius', 'hostim-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} .newsletter-form input:not([type=checkbox]):not([type=submit])' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .footer-widget .footer-sb-form input[type=email]' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);

		$this->add_control(
			'field_bg_color_focus',
			[
				'label' => __('Focus Background', 'hostim-core'),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .newsletter-form input:not([type=checkbox]):not([type=submit]):focus' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .footer-widget .footer-sb-form input[type=email]:focus' => 'background-color: {{VALUE}};'
				],
				'separator' => 'before'
			]
		);


		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border_field_focus',
				'label' => __('Focus Border', 'hostim-core'),
				'selector' => '
					{{WRAPPER}} .newsletter-form input:not([type=checkbox]):not([type=submit]):focus,
					{{WRAPPER}} .footer-widget .footer-sb-form input[type=email]:focus
				'
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_field_shadow_focus',
				'label' => __( 'Focus Box Shadow', 'hostim-core' ),
				'selector' => '
					{{WRAPPER}} .newsletter-form input:not([type=checkbox]):not([type=submit]):focus,
					{{WRAPPER}} .footer-widget .footer-sb-form input[type=email]:focus
				',
			]
		);
		$this->end_controls_section();

		// Button Style =============================
		$this->start_controls_section(
			'section_style',
			[
				'label' => __('Button', 'hostim-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'btn_margin',
			[
				'label' => esc_html__( 'Margin', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .hostim-newsletter-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'text_padding',
			[
				'label' => __('Padding', 'hostim-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em', '%'],
				'selectors' => [
					'{{WRAPPER}} .hostim-newsletter-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'typography',
				'label' => __('Typography', 'hostim-core'),
				'selector' => '{{WRAPPER}} .hostim-newsletter-btn',
			]
		);

		$this->add_control(
			'border_radius',
			[
				'label' => __('Border Radius', 'hostim-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} .hostim-newsletter-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);


		


		$this->start_controls_tabs('tabs_button_style');

		$this->start_controls_tab(
			'tab_button_normal',
			[
				'label' => __('Normal', 'hostim-core'),
			]
		);

		$this->add_control(
			'button_text_color',
			[
				'label' => __('Color', 'hostim-core'),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .hostim-newsletter-btn' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'background_color',
			[
				'label' => __('Background Color', 'hostim-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hostim-newsletter-btn' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'background_gradient_color',
			[
				'label' => __('Background Gradient Color', 'hostim-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hostim-newsletter-btn' => 'background: linear-gradient(96.49deg, {{background_color.value}} 0%, {{VALUE}} 102.71%);'
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'label' => __('Border', 'hostim-core'),
				'selector' => '{{WRAPPER}} .hostim-newsletter-btn',
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'label' => __( 'Box Shadow', 'hostim-core' ),
				'selector' => '{{WRAPPER}} .hostim-newsletter-btn',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_button_hover',
			[
				'label' => __('Hover', 'hostim-core'),
			]
		);

		$this->add_control(
			'hover_color',
			[
				'label' => __('Color', 'hostim-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hostim-newsletter-btn:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'background_color_hover',
			[
				'label' => __('Background Color', 'hostim-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hostim-newsletter-btn:hover' => 'background-color: {{VALUE}};'
				],
			]
		);
		$this->add_control(
			'background_hover_gradient_color',
			[
				'label' => __('Background Gradient Color', 'hostim-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hostim-newsletter-btn:hover' => 'background: linear-gradient(96deg, {{background_color_hover.value}} 0%, {{VALUE}} 102.71%);'
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border_hover',
				'label' => __('Border', 'hostim-core'),
				'selector' => '{{WRAPPER}} .hostim-newsletter-btn:hover'
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow_hover',
				'label' => __( 'Box Shadow', 'hostim-core' ),
				'selector' => '{{WRAPPER}} .hostim-newsletter-btn:hover',
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();
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
		$settings  = $this->get_settings_for_display();
		extract( $settings );

        //========================== Template Parts =======================//
        include "templates/newsletter/newsletter-{$layout}.php";

	}
}
