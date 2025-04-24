<?php

namespace Hostim\Widgets;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\{Group_Control_Background,
	Group_Control_Box_Shadow,
	Widget_Base,
	Controls_Manager,
	Group_Control_Typography,
	Group_Control_Border};


class Hostim_features extends Widget_Base {

	public function get_name() {
		return 'hostim-features';
	}

	public function get_title() {
		return __( 'Hostim Features', 'hostim-core' );
	}

	public function get_icon() {
		return 'eicon-gallery-grid';
	}

	public function get_categories() {
		return [ 'hostim-elements' ];
	}


	protected function register_controls() {

		// Layout =====================
		$this->start_controls_section( 'section_feature', [
			'label' => __( 'Features Style', 'hostim-core' ),
		] );

		$this->add_control( 'layout', [
			'label'   => esc_html__( 'Layout', 'hostim-core' ),
			'type'    => Controls_Manager::SELECT,
			'options' => [
				'1' => esc_html__( 'Layout 1', 'hostim-core' ),
				'2' => esc_html__( 'Layout 2', 'hostim-core' ),
				'3' => esc_html__( 'Layout 3', 'hostim-core' ),
				'4' => esc_html__( 'Layout 4', 'hostim-core' ),
			],
			'default' => '1',
		] );
		$this->end_controls_section();


		$this->start_controls_section( 'section_features', [
			'label' => __( 'Features', 'hostim-core' ),
			'condition' => [
				'layout' => '1'
			]
		] );		

		$repeater = new \Elementor\Repeater();

		$repeater->add_control( 'feature_title', [
			'label'       => __( 'Title', 'hostim-core' ),
			'type'        => Controls_Manager::TEXTAREA,
			'default'	  => __('Maximum <br> Security', 'hostim-core')
		] );

		$repeater->add_control( 'feature_desc', [
			'label'       => __( 'Description', 'hostim-core' ),
			'type'        => Controls_Manager::TEXTAREA,
			'default'	  => __('Choice for growing agencies and support that acts asyour ecommerce businesses.', 'hostim-core')
		] );

		$repeater->add_control( 'selected_icon', [
			'label'   => __( 'Icon', 'hostim-core' ),
			'type'    => Controls_Manager::ICONS,
			'default' => [
				'value'   => 'fas fa-check',
				'library' => 'solid',
			],
		] );

		$repeater->add_control( 'feature_link', [
			'label'       => __( 'URL', 'hostim-core' ),
			'type'        => Controls_Manager::URL,
			'default'	  => [
				'url'	=> '#'
			]
		] );

		$this->add_control( 'features_list', [
			'label'       => __( 'Features List', 'hostim-core' ),
			'type'        => \Elementor\Controls_Manager::REPEATER,
			'fields'      => $repeater->get_controls(),
			'default'     => [
				[
					'feature_title' => __( '15+ Years Web Hosting Company', 'hostim-core' ),
					'feature_desc'   => __( 'Traditional WordPress, you get all the features, tools, and guidance you need to build and launch.', 'hostim-core' ),
					'selected_icon' => [
						'value'   => 'fas fa-check',
						'library' => 'solid',
					]
				],
			],
			'title_field' => '{{{ feature_title }}}',
		] );
		$this->end_controls_section();

		// Start layout 3 ------------------------===========================
		$this->start_controls_section(
			'fea_3_section',
			[
				'label' => esc_html__( 'Feature Section', 'hostim-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'fea_3_image',
			[
				'label' => esc_html__( 'Choose Image', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'layout!' => '4',
				]
			]
		);
		$this->add_control(
			'feature_ly_04_sub_icon',
			[
				'label' => esc_html__( 'Currency Sub Icon', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::ICONS,
			]
		);
		$this->add_control(
			'feature_ly_04_currency_icon',
			[
				'label' => esc_html__( 'Currency Icon', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::ICONS,
			]
		);
		$this->add_control(
			'feature_ly_04',
			[
				'label' => esc_html__( 'More Btn Icon', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::ICONS,
			]
		);
		$this->add_control(
			'fea_3_title',
			[
				'label' => esc_html__( 'Feature Title', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Default title', 'hostim-core' ),
				'placeholder' => esc_html__( 'Type your title here', 'hostim-core' ),
			]
		);
		$this->add_control(
			'fea_3_description',
			[
				'label' => esc_html__( 'Feature Content', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 10,
				'default' => esc_html__( 'Default description', 'hostim-core' ),
				'placeholder' => esc_html__( 'Type your description here', 'hostim-core' ),
			]
		);
		$this->end_controls_section();
		// end layout 3 ------------------------===========================

		// STYLE ADDED LAYOUT-3 START --=========================================
		$this->start_controls_section(
			'layout_3_section',
			[
				'label' => esc_html__( 'Style', 'hostim-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				'condition' => [
					'layout' => '3',
				]
			]
		);

		//normal color start ---------------------------
		$this->start_controls_tabs(
			'style_tabs'
		);
		
		$this->start_controls_tab(
			'style_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'hostim-core' ),
			]
		);
		$this->add_control(
			'fea_title_color',
			[
				'label' => esc_html__( 'Title Color', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .host-web-card-item .feature_title_' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'fea_title_typography',
				'selector' => '{{WRAPPER}} .host-web-card-item .feature_title_',
			]
		);
		$this->add_control(
			'fea_content_color',
			[
				'label' => esc_html__( 'Content Color', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .host-web-card-item .feature_content_' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'fea_content_typography',
				'selector' => '{{WRAPPER}} .host-web-card-item .feature_content_',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'normal_background',
				'types' => [ 'classic', 'gradient'],
				'selector' => '{{WRAPPER}} .host-web-card-item',
			]
		);
		$this->end_controls_tab();
		//normal color style end ----------------
		//hover color style added --------------------
		$this->start_controls_tab(
			'style_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'hostim-core' ),
			]
		);
		$this->add_control(
			'fea_title_hover_color',
			[
				'label' => esc_html__( 'Title Color', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .host-web-card-item:hover .feature_title_' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'fea_content_hover_color',
			[
				'label' => esc_html__( 'Content Color', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .host-web-card-item:hover .feature_content_' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'hover_background',
				'types' => [ 'classic', 'gradient'],
				'selector' => '{{WRAPPER}} .host-web-card-item:hover',
			]
		);
		$this->end_controls_tab();
		
		$this->end_controls_tabs();
		//hover color style end --------------------------

		$this->end_controls_section();
		// STYLE ADDED LAYOUT-3 END--=========================================


		// Features Tab ===============================
		$this->start_controls_section( 'features_tab', [
			'label' => __( 'Features Tab', 'hostim-core' ),
			'condition' => [
				'layout' => '2'
			]
		] );

		$features = new \Elementor\Repeater();

		$features->add_control( 'feature_cat', [
			'label'       => __( 'Feature Category', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true,
			'default'	  => 'VPS Feature'
		] );
		
		$features->add_control( 'tab_title', [
			'label'       => __( 'Title', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true,
			'default'	  => 'Solid State Drives (SSD)'
		] );

		$features->add_control( 'description', [
			'label'       => __( 'Description', 'hostim-core' ),
			'type'        => Controls_Manager::TEXTAREA,
			'label_block' => true,
			'default'	  => 'Dynamically negotiate technologies after bricks-and-clicks portals. Competently deliver client-focused niche markets before parallel task pandemic.'
		] );

		$features->add_control( 'feature_img', [
			'label'       => __( 'Feature image', 'hostim-core' ),
			'type'        => Controls_Manager::MEDIA,

		] );

		$features->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'sec_background',
				'label' => esc_html__( 'Background', 'plugin-name' ),
				'types' => [ 'classic', 'gradient' ],
				'fields_options' => [
					'size' => ['default' => 'cover'],
					'position' => ['default' => 'bottom right'],
					'repeat' => ['default' => 'no-repeat'],
				],
				'selector' => '{{WRAPPER}} {{CURRENT_ITEM}}',
			]
		);


		$this->add_control( 'features_tabs', [
			'label'       => __( 'Feature Tabs', 'hostim-core' ),
			'type'        => Controls_Manager::REPEATER,
			'fields'      => $features->get_controls(),
			'default'     => [
				[				
					'feature_cat' => __( 'VPS Feature', 'hostim-core'),
					'tab_title'   => __( 'What is WordPress Hosting', 'hostim-core' ),
					'description' => __( 'We care about safety big time — and so do your site\'s visitors. With a Shared Hosting account, you get an SSL certificate for free to add to your site. In this day and age, having an SSL for your site is a no-brainer best practice. Not only does an SSL help your visitors feel safe interacting with your site — this is particularly important if you run an e-commerce site.', 'hostim-core' ),
				],
				
			],
			'title_field' => '{{{feature_cat}}} - {{{ tab_title }}}',
		] );

		$this->end_controls_section();
		
		
		
		$this->start_controls_section( 'section_features_shape', [
			'label' => __( 'Shapes', 'hostim-core' ),
			'condition' => [
				'layout' => ['1','2']
			]
		] );	

		$this->add_control( 'features_shape_left', [
			'label'   => __( 'Choose Shape Left Image', 'hostim-core' ),
			'type'    => Controls_Manager::MEDIA,
			'default' => [
				'url' => plugin_dir_url( __DIR__ ) . 'assets/images/hero/feature-triangle.svg'
			],
			
		] );
		
		$this->end_controls_section();
		
		// Features List item
		$this->start_controls_section( 'style_list_items', [
			'label' => __( 'Features', 'hostim-core' ),
			'tab'   => Controls_Manager::TAB_STYLE,
		] );
		$this->add_control(
			'item_title_heading',
			[
				'label' => __( 'Title', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_group_control( Group_Control_Typography::get_type(), [
			'name'     => 'item_title_typo',
			'label'    => __( 'Typography', 'hostim-core' ),
			'selector' => '{{WRAPPER}} .feature_title_, {{WRAPPER}} .card-title-color'			
		] );

		$this->add_control( 'item_title_color', [
			'label'     => __( 'Color', 'hostim-core' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => '',
			'selectors' => [
				'{{WRAPPER}} .feature_title_' => 'color: {{VALUE}};',
				'{{WRAPPER}} .card-title-color' => 'color: {{VALUE}};'
			],
		] );
		
		$this->add_control(
			'item_desc_heading',
			[
				'label' => __( 'Description', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_group_control( Group_Control_Typography::get_type(), [
			'name'     => 'item_desc_typo',
			'label'    => __( 'Typography', 'hostim-core' ),
			'selector' => '{{WRAPPER}} .feature_content_, {{WRAPPER}} .hds-body-color-three'
			
		] );

		$this->add_control( 'item_desc_color', [
			'label'     => __( 'Color', 'hostim-core' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => '',
			'selectors' => [
				'{{WRAPPER}} .feature_content_' => 'color: {{VALUE}};',
				'{{WRAPPER}} .hds-body-color-three' => 'color: {{VALUE}};'
			],
		] );
		
		$this->add_control(
			'item_currency_icon',
			[
				'label' => __( 'Icon', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'layout' => '1'
				]
			]
		);
		$this->start_controls_tabs(
			'icon_style_tabs', [
				'condition' => [
					'layout' => '1'
				]
			]
			
		);

		$this->start_controls_tab(
			'icon_style_normal',
			[
				'label' => esc_html__('Normal', 'hostim-core'),
			]
		);
		$this->add_control('item_icon_color',
			[
				'label'     => __('Icon Color', 'hostim-core'),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .hm2-feature-card .icon-wrapper' => 'color: {{VALUE}};',
					'{{WRAPPER}} .hm2-feature-card .icon-wrapper svg' => 'fill: {{VALUE}};'
				]
			]
		);
		$this->add_control('item_icon_btn_color',
			[
				'label'     => __('Btn Icon Color', 'hostim-core'),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .hm2-feature-card .icon-wrapper' => 'color: {{VALUE}};',
					'{{WRAPPER}} a.mt-2.d-inline-block.rounded-circle.text-center.position-relative.overflow-hidden i' => 'color: {{VALUE}};'
				]
			]
		);

		$this->add_control('item_line_color',
			[
				'label'     => __('Background Color', 'hostim-core'),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .hm2-feature-card .icon-wrapper' => 'background-color: {{VALUE}};'
				]
			]
		);

		$this->end_controls_tab();
		
		$this->start_controls_tab(
			'icon_style_hover',
			[
				'label' => esc_html__('Hover', 'hostim-core'),
			]
		);

		$this->add_control('item_icon_hover_color',
			[
				'label'     => __('Icon Color', 'hostim-core'),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .hm2-feature-card:hover .icon-wrapper' => 'color: {{VALUE}};',
					'{{WRAPPER}} .hm2-feature-card:hover .icon-wrapper svg' => 'fill: {{VALUE}};'
				]
			]
		);
		$this->add_control('item_hover_bg',
			[
				'label'     => __('Background Color', 'hostim-core'),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .hm2-feature-card:hover .icon-wrapper' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .hm2-feature-card:hover a' => 'background-color: {{VALUE}};'
				]
			]
		);


		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_control(
			'icon_size',
			[
				'label' => esc_html__('Icon Size', 'hostim-core'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
					
				],
				'default' => [
					'unit' => 'px',
					'size' => 25,
				],
				'selectors' => [
					'{{WRAPPER}} .hm2-feature-card .icon-wrapper i' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .hm2-feature-card .icon-wrapper svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}}'
				],
				'condition' => [
					'layout' => '1'
				]
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'feature_bg',
				'label' => esc_html__('Background', 'plugin-name'),
				'types' => ['classic', 'gradient'],
				'selector' => '{{WRAPPER}} .hm2-feature-card',
			]
		);
		// item box shadow ------------------------------------------------------
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'selector' => '{{WRAPPER}} .item-features_box_shadow',
			]
		);
		// item box shadow end ----------------------------------------------------
		$this->end_controls_section();
		
		$this->start_controls_section( 'style_section', [
			'label' => __( 'Section Background', 'hostim-core' ),
			'tab'   => Controls_Manager::TAB_STYLE,
		] );
		$this->add_responsive_control(
			'section_margin',
			[
				'label' => esc_html__( 'Margin', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .feature_section__' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'section_padding',
			[
				'label' => esc_html__( 'Padding', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .feature_section__' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'sec_background',
				'label' => esc_html__( 'Background', 'plugin-name' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .feature_section__'
			]
		);
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
				'selector' => '[data-bs-theme=dark] {{WRAPPER}} .feature_section__',
			]);
			$this->end_controls_section(); //End Section Background
		}
	}

	/**
	 * Render button widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		extract( $settings );

		require __DIR__ . '/templates/features/layout-' . $layout . '.php';

		
	}
}