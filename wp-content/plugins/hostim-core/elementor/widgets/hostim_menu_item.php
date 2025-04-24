<?php

namespace Hostim\Widgets;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\{Controls_Manager,
	Icons_Manager,
	Repeater,
	Widget_Base,
	Group_Control_Typography
};


if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Hostim_Menu_Item extends Widget_Base {

	public function get_name() {
		return 'hostim-menu-item';
	}

	public function get_title() {
		return esc_html__( 'Hostim Mega Menu Item', 'hostim-core' );
	}

	public function get_icon() {
		return 'eicon-icon-box';
	}

	public function get_categories() {
		return [ 'hostim-elements' ];
	}

	protected function register_controls() {
		$this->start_controls_section( 'section_tab', [
			'label' => esc_html__( 'Menu Item', 'hostim-core' ),
		] );

		$this->add_control(
			'select_icon_type',
			[
				'label' => __( 'Select Icon/Number', 'hostim-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'icon',
				'options' => [
					'icon'  => __( 'Icon', 'hostim-core' ),
					'image' => __( 'Image', 'hostim-core' ),
					'number' => __( 'Number', 'hostim-core' ),
				],
			]
		);

		$this->add_control( 
			'box_icon', [
				'label'       => esc_html__( 'Icon', 'hostim-core' ),
				'type'        => Controls_Manager::ICONS,
				'label_block' => true,
				'default'     => [
					'value'   => 'fas fa-star',
					'library' => 'solid',
				],
				'description' => esc_html__( 'Select icon from Fontawesome library.', 'hostim-core' ),
				'condition' => ['select_icon_type' => 'icon']
			] 
		);

		$this->add_control(
			'img_icon', [
				'label'       => esc_html__( 'Image Icon', 'hostim-core' ),
				'type'        => Controls_Manager::MEDIA,
				'condition' => ['select_icon_type' => 'image']
			] 
		);

		$this->add_control(
			'serial_number', [
				'label'       => esc_html__( 'Number', 'hostim-core' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Title', 'hostim-core' ),
				'default'     => '1',
				'condition' => ['select_icon_type' => 'number']
			] 
		);

		$this->add_control( 'box_title', [
			'label'       => esc_html__( 'Menu Title', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true,
			'placeholder' => esc_html__( 'Title', 'hostim-core' ),
			'default'     => esc_html__( 'Feature Heading', 'hostim-core' ),
		] );

		$this->add_control( 'description', [
			'label'       => esc_html__( 'Description', 'hostim-core' ),
			'type'        => Controls_Manager::TEXTAREA,
			'label_block' => true,
			'placeholder' => esc_html__( 'Description', 'hostim-core' ),
			'default'     => __( 'Product Landing Page Template', 'hostim-core' ),
			'separator'   => 'none',
			'rows' => '3'
		] );
		$this->add_control( 'menu_badge', [
			'label'       => esc_html__( 'Menu Badge', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true,
			'default'     => ''
		] );

		$this->add_control( 'menu_page_link', [
			'label'         => __( 'Link', 'hostim-core' ),
			'type'          => \Elementor\Controls_Manager::URL,
			'placeholder'   => __( 'https://your-link.com', 'hostim-core' ),
			'default'       => [
				'url'         => '#',
			],
		] );
		$this->end_controls_section();


		$this->start_controls_section( 'section_spacing_style', [
			'label' => esc_html__( 'Spacing', 'hostim-core' ),
			'tab'   => Controls_Manager::TAB_CONTENT,
		] );

		$this->add_control( 'box_padding', [
			'label'      => __( 'Padding', 'qhost-core' ),
			'type'       => Controls_Manager::DIMENSIONS,
			'size_units' => [ 'px', '%', 'em' ],
			'selectors'  => [
				'{{WRAPPER}} .hostim-mega-menu-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
		] );

		$this->add_control( 'box_margin', [
			'label'      => __( 'Margin', 'qhost-core' ),
			'type'       => Controls_Manager::DIMENSIONS,
			'size_units' => [ 'px', '%', 'em' ],
			'selectors'  => [
				'{{WRAPPER}} .hostim-mega-menu-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
		] );

		$this->end_controls_section();

		//Icon Style
		$this->start_controls_section( 'section_icon_style', [
			'label' => esc_html__( 'Icon', 'hostim-core' ),
			'tab'   => Controls_Manager::TAB_STYLE,
		] );

		$this->add_control( 'icon_color_one', [
			'label'     => esc_html__( 'Color', 'hostim-core' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .menu-list-wrapper .icon-wrapper' => 'color: {{VALUE}};'
			],
		] );

		$this->add_control( 'icon_border_color', [
			'label'     => esc_html__( 'Border Color', 'hostim-core' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .menu-list-wrapper .icon-wrapper' => 'border: 1px solid {{VALUE}};'
			],
		] );

		$this->add_control( 'icon_bg_color', [
			'label'     => esc_html__( 'Background', 'hostim-core' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .menu-list-wrapper .icon-wrapper' => 'background: {{VALUE}};'
			],
		] );

		$this->add_control(
			'icon_margin',
			[
				'label' => esc_html__( 'Margin', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .menu-list-wrapper .icon-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'icon_wrapper_width',
			[
				'label' => esc_html__( 'Width', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 300,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 40,
				],
				'selectors' => [
					"{{WRAPPER}} .icon-wrapper" => "width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};",
				],
			]
		);
		
		$this->add_control(
			'icon_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .icon-wrapper' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


		$this->end_controls_section();

		//Title Style Section
		$this->start_controls_section( 'section_title_style', [
			'label' => esc_html__( 'Title', 'hostim-core' ),
			'tab'   => Controls_Manager::TAB_STYLE,
		] );

		$this->add_control(
			'title_margin',
			[
				'label' => esc_html__( 'Margin', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .box-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
		$this->add_control( 'title_color_two', [
			'label'     => esc_html__( 'Color', 'hostim-core' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .box-title' => 'color: {{VALUE}};'
			],
		] );

		$this->add_group_control( Group_Control_Typography::get_type(), [
			'name'     => 'title_typography',
			'selector' => '{{WRAPPER}} .box-title',
		] );

		$this->end_controls_section();

		//Subtitle Style Section
		$this->start_controls_section( 'section_subtitle_style', [
			'label' => esc_html__( 'Description', 'hostim-core' ),
			'tab'   => Controls_Manager::TAB_STYLE,
		] );

		$this->add_control(
			'subtitle_margin',
			[
				'label' => esc_html__( 'Margin', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .menu-list-content-right .description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
				'default' => [
					'top' => '0',
					'right' => '0',
					'bottom' => '0',
					'left' => '0',
					'unit' => 'px',
					'isLinked' => false,
				]
			]
		);

		$this->add_control( 'subtitle_color', [
			'label'     => esc_html__( 'color', 'hostim-core' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .menu-list-content-right .description' => 'color: {{VALUE}};'
			],
		] );

		$this->add_group_control( Group_Control_Typography::get_type(), [
			'name'     => 'subtitle_typography',
			'selector' => '{{WRAPPER}} .menu-list-content-right .description',
		] );

		$this->end_controls_section();

		//Badge Style Section
		$this->start_controls_section( 
			'section_badge_style', 
			[
				'label' => esc_html__( 'Badge', 'hostim-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			] 
		);

		$this->add_group_control( 
			Group_Control_Typography::get_type(), 
			[
				'name'     => 'badge_typography',
				'selector' => '{{WRAPPER}} .menu-list-content-right .box-title .badge',
			] 
		);

		$this->add_control( 
			'badge_color', 
			[
				'label'     => __( 'Badge Color', 'hostim-core' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .menu-list-content-right .box-title .badge' => 'color: {{VALUE}};'
				]
			]
		);

		$this->add_control( 
			'badge_bg_color', 
			[
				'label'     => __( 'Badge Background Color', 'hostim-core' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .menu-list-content-right .box-title .badge' => 'background-color: {{VALUE}};'
				]
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		extract( $settings );
		$target   = $settings['menu_page_link']['is_external'] ? ' target="_blank"' : '';
		$nofollow = $settings['menu_page_link']['nofollow'] ? ' rel="nofollow"' : '';

		require __DIR__ . '/templates/menu-item/menu-item.php';
	}
}
