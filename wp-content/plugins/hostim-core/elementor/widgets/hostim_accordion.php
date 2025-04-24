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


class Hostim_Accordion extends Widget_Base {

	public function get_name() {
		return 'hostim-accordion';
	}

	public function get_title() {
		return __( 'Hostim Accordion', 'hostim-core' );
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

		//====================== Select layout =============================//
		$this->start_controls_section( 'accordion_sec_layout', [
			'label' => __( 'Accordion Style', 'hostim-core' ),
		] );
		$this->add_control( 'layout', [
			'label'   => esc_html__( 'Select Layout', 'hostim-core' ),
			'type'    => Controls_Manager::SELECT,
			'options' => [
				'1' => esc_html__( 'Layout 1', 'hostim-core' ),
				'2' => esc_html__( 'Layout 2', 'hostim-core' ),
				'3' => esc_html__( 'Layout 3', 'hostim-core' ),
				'4' => esc_html__( 'Layout 4', 'hostim-core' ),
				'5' => esc_html__( 'Layout 5', 'hostim-core' ),
			],
			'default' => '1',
		] );

		$this->end_controls_section(); //End layout


		//========================= Content ============================//
		$this->start_controls_section( 'section_content', [
			'label' => __( 'Content', 'hostim-core' ),
		] );

		$repeater = new Repeater();

		$repeater->add_control( 'accordion_title', [
			'label'       => __( 'Title', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => __( 'List Title', 'hostim-core' ),
			'label_block' => true,
		] );

		$repeater->add_control( 'accordion_content', [
			'label'      => __( 'Content', 'hostim-core' ),
			'type'       => Controls_Manager::WYSIWYG,
			'default'    => __( 'List Content', 'hostim-core' ),
			'show_label' => false,
		] );

		$repeater->add_control(
			'show_icon', [
				'label' => __( 'Show Icon', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'hostim-core' ),
				'label_off' => __( 'Hide', 'hostim-core' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);

		$repeater->add_control( 'accordion_icon', [
			'label'     => __( 'Icon', 'hostim-core' ),
			'type'      => Controls_Manager::ICONS,
			'default'   => [
				'value'   => 'fas fa-star',
				'library' => 'solid',
			],
			'condition' => ['show_icon' => 'yes']
		] );
		$repeater->add_control( 'btn_label', [
			'label'       => __( 'Button Label', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true,
		] );
		$repeater->add_control( 'btn_url', [
			'label'       => __( 'Button URL', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true,
		] );

		$this->add_control( 'hostim_accordion', [
			'label'       => __( 'Accordion List', 'hostim-core' ),
			'type'        => Controls_Manager::REPEATER,
			'fields'      => $repeater->get_controls(),
			'default'     => [
				[
					'accordion_title'   => __( 'Is SEO a risky and time consuming proposition?', 'hostim-core' ),
					'accordion_content' => __( 'There are many variations of passages of Lorem Ipsum available but the majority suffered is alteration in that  words which don\'t look even slightly believable. If you are Lorem Ipsum you need to be sure there isn\'t anything ready too much embarrassing.', 'hostim-core' ),
				],
				[
					'accordion_title'   => __( 'How to choose a perfect digital marketing plan?', 'hostim-core' ),
					'accordion_content' => __( 'There are many variations of passages of Lorem Ipsum available but the majority suffered is alteration in that  words which don\'t look even slightly believable. If you are Lorem Ipsum you need to be sure there isn\'t anything ready too much embarrassing.', 'hostim-core' ),
				],
				[
					'accordion_title'   => __( 'Is it feasible to go for a complete website audit?', 'hostim-core' ),
					'accordion_content' => __( 'There are many variations of passages of Lorem Ipsum available but the majority suffered is alteration in that  words which don\'t look even slightly believable. If you are Lorem Ipsum you need to be sure there isn\'t anything ready too much embarrassing.', 'hostim-core' ),
				],
				[
					'accordion_title'   => __( 'How to go about with a bespoke SMO strategy?', 'hostim-core' ),
					'accordion_content' => __( 'There are many variations of passages of Lorem Ipsum available but the majority suffered is alteration in that  words which don\'t look even slightly believable. If you are Lorem Ipsum you need to be sure there isn\'t anything ready too much embarrassing.', 'hostim-core' ),
				],
				[
					'accordion_title'   => __( 'Is internet marketing expensive?', 'hostim-core' ),
					'accordion_content' => __( 'There are many variations of passages of Lorem Ipsum available but the majority suffered is alteration in that  words which don\'t look even slightly believable. If you are Lorem Ipsum you need to be sure there isn\'t anything ready too much embarrassing.', 'hostim-core' ),
				],
			],
			'title_field' => '{{{ accordion_title }}}',
		] );

		$this->end_controls_section(); //End Content

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

		//===================== Accordion Style Controls =======================//
		$this->start_controls_section( 'title_style__section', [
			'label' => __( 'Title', 'hostim-core' ),
			'tab'   => Controls_Manager::TAB_STYLE,
		] );

		$this->add_group_control( Group_Control_Typography::get_type(), [
			'name'     => 'title_typography',
			'label'    => __( 'Typography', 'hostim-core' ),
			'selector' => '
			    {{WRAPPER}} .hostim-accordion .accordion-button,
			    {{WRAPPER}} .accordion-item .accordion-header a,
			    {{WRAPPER}} .cp-accordion .accordion-single .accordion-header h6,
			    {{WRAPPER}} .accordion-item .accordion-header a
            ',
		] );

		$this->add_control( 'faq_title_color', [
			'label'     => __( 'Color', 'hostim-core' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .hostim-accordion .accordion-button.collapsed' => 'color: {{VALUE}}',
				'{{WRAPPER}} .accordion-item .accordion-header a' => 'color: {{VALUE}}',
				'{{WRAPPER}} .cp-accordion .accordion-single .accordion-header h6' => 'color: {{VALUE}}'
			],
		] );

		$this->add_control( 'faq_title_active_color', [
			'label'     => __( 'Active Color', 'hostim-core' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .hostim-accordion .accordion-button:not(.collapsed)' => 'color: {{VALUE}}',
				'{{WRAPPER}} .home4-about-accordion .accordion-item .accordion-header a' => 'color: {{VALUE}}' 
			],
		] );

		$this->add_control('accordion_active_title_bg', [
			'label'     => __('Title Background', 'hostim-core'),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .hostim-accordion .accordion-item.active .accordion-header' => 'background: {{VALUE}}',
				'{{WRAPPER}} .cp-accordion .accordion-single .accordion-header h6' => 'background: {{VALUE}}'
			],
		]);

		$this->add_control(
			'title_padding',
			[
				'label' => esc_html__( 'Padding', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .hostim-accordion .accordion-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .dm-accordion .accordion-item .accordion-header a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .cp-accordion .accordion-single .accordion-header h6' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .home4-about-accordion .accordion-item .accordion-header a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);

		$this->end_controls_section(); //End Accordion Style Controls


		//============================== Style Content ==========================//
		$this->start_controls_section( 'content_style_section', [
			'label' => __( 'Content', 'hostim-core' ),
			'tab'   => Controls_Manager::TAB_STYLE,
		] );

		$this->add_group_control( Group_Control_Typography::get_type(), [
			'name'     => 'faq_ontent_typography',
			'label'    => __( 'Typography', 'hostim-core' ),
			'selector' => '{{WRAPPER}} .accordion-body',
		] );

		$this->add_control( 'faq_content_color', [
			'label'     => __( 'Color', 'hostim-core' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .accordion-body' => 'color: {{VALUE}}',
				'{{WRAPPER}} .cp-accordion .accordion-single .accordion-body p' => 'color: {{VALUE}}'
			],
		] );
		$this->add_control(
			'content_padding',
			[
				'label' => esc_html__('Padding', 'hostim-core'),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .accordion-collapse.collapse.show .accordion-body' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};transition:0.4s;',
				],
			]
		);
		$this->end_controls_section(); //End Style Content


		// Accordion Icon Style ==============================
		$this->start_controls_section( 'icon_style_section', [
			'label' => __( 'Icon', 'hostim-core' ),
			'tab'   => Controls_Manager::TAB_STYLE,
		] );

		$this->add_control(
			'icon_align', [
				'label' => esc_html__( 'Icon Alignment', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'hostim-core' ),
						'icon' => 'eicon-text-align-left',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'hostim-core' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'right',
				'toggle' => true,
			]
		);


		$this->start_controls_tabs(
			'style_icon_tabs'
		);

		$this->start_controls_tab(
			'accordion_normal_icon', [
				'label' => esc_html__('Normal ', 'hostim-core'),
			]
		);

		$this->add_control( 'accordion_icon_color', [
			'label'     => __( 'Icon Color', 'hostim-core' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .hostim-accordion .accordion-button.collapsed:after' => 'color: {{VALUE}}',
				'{{WRAPPER}} .__icon::before' => 'color: {{VALUE}}',
				'{{WRAPPER}} .dm-accordion .accordion-item .accordion-header a:after' => 'color: {{VALUE}}',
				'{{WRAPPER}} .home4-about-accordion .accordion-item .accordion-header a:not(.collapsed)::before' => 'color: {{VALUE}}',
			],
		] );

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(), [
				'name' => 'accordion_icon_bg',
				'label' => esc_html__('Background', 'hostim-core'),
				'types' => ['classic', 'gradient'],
				'exclude' => ['image'],
				'selector' => '
					{{WRAPPER}} .hostim-accordion .accordion-button.collapsed:after,
					{{WRAPPER}} .__icon::before,
					{{WRAPPER}} .dm-accordion .accordion-item .accordion-header a:after,
					{{WRAPPER}} .home4-about-accordion .accordion-item .accordion-header a:not(.collapsed)::before
				',
			]
		);

		$this->end_controls_tab(); //End normal Control Tab

		$this->start_controls_tab(
			'accordion_active_icon', [
				'label' => esc_html__('Active ', 'hostim-core'),
			]
		);

		$this->add_control( 'accordion_active_icon_color', [
			'label'     => __( 'Icon Color', 'hostim-core' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .hostim-accordion .accordion-button:not(.collapsed):after' => 'color: {{VALUE}}',
				'{{WRAPPER}} .home4-about-accordion .accordion-item .accordion-header a:not(.collapsed)::before' => 'color: {{VALUE}}',
			],
		] );

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(), [
				'name' => 'accordion_active_icon_bg',
				'label' => esc_html__('Background', 'hostim-core'),
				'types' => ['classic', 'gradient'],
				'exclude' => ['image'],
				'selector' => '
					{{WRAPPER}} .hostim-accordion .accordion-button:not(.collapsed):after,
					{{WRAPPER}} .home4-about-accordion .accordion-item .accordion-header a:not(.collapsed)::before
				',
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();//End Accordion Icon Style


		$this->start_controls_section( 'box_style_section', [
			'label' => __( 'Box Wrapper', 'hostim-core' ),
			'tab'   => Controls_Manager::TAB_STYLE,
		] );

		$this->add_control(
			'box_border_radius',
			[
				'label' => __( 'Border Radius', 'hostim-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .accordion-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .cp-accordion .accordion-single' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'faq_margin_bottom',
			[
				'label' => esc_html__( 'Space Between', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 50,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .hostim-accordion .accordion-item:not(:last-child)' => 'margin-bottom: {{SIZE}}{{UNIT}} !important;',
				],
			]
		);


		$this->start_controls_tabs(
			'style_tabs'
		);

		$this->start_controls_tab(
			'style_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'hostim-core' ),
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'acc_background',
				'label' => __( 'Background', 'hostim-core' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '
					{{WRAPPER}} .accordion-item,
					{{WRAPPER}} .cp-accordion .accordion-single
				',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'acc_border',
				'label' => __( 'Border', 'hostim-core' ),
				'selector' => '
					{{WRAPPER}} .accordion-item,
					{{WRAPPER}} .cp-accordion .accordion-single
				',
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_box_shadow',
				'label' => __( 'Box Shadow', 'hostim-core' ),
				'selector' => '
					{{WRAPPER}} .accordion-item,
					{{WRAPPER}} .cp-accordion .accordion-single	
				',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'style_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'hostim-core' ),
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'acc_background_active',
				'label' => __( 'Background', 'hostim-core' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '
					{{WRAPPER}} .accordion-item.active,
					{{WRAPPER}} .cp-accordion .accordion-single	
				',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'acc_border_active',
				'label' => __( 'Border', 'hostim-core' ),
				'selector' => '
					{{WRAPPER}} .accordion-item.active,
					{{WRAPPER}} .cp-accordion .accordion-single	
				',
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_box_shadow_active',
				'label' => __( 'Box Shadow', 'hostim-core' ),
				'selector' => '{{WRAPPER}} .cp-accordion .accordion-single',
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();

		$this->end_controls_section();

		// Dark Mode Background -------------------------------------
		$dark_mode = hostim_option('is_dark_mode', false);
		if ($dark_mode) {
			$this->start_controls_section('dark_bg_style', [
				'label' => __('Dark Mode Background', 'hostim-core'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]);
			$this->add_group_control(Group_Control_Background::get_type(), [
				'name' => 'table_bg_dark_mode',
				'label' => esc_html__('Dark Mode Background', 'hostim-core'),
				'types' => ['classic', 'gradient'],
				'selector' => '[data-bs-theme=dark] {{WRAPPER}} .accordion-item',
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

		$settings  = $this->get_settings_for_display();
		extract( $settings );


		$faq_o  = 'hostim-acco-' . $this->get_id();
		require __DIR__ . '/templates/accordion/layout-' . $layout . '.php';

	}
}
