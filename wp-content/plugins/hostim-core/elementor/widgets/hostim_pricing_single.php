<?php

namespace Hostim\Widgets;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\{Controls_Manager,
	Group_Control_Background,
	Group_Control_Border,
	Group_Control_Box_Shadow,
	Widget_Base,
	Group_Control_Typography,
	Repeater
	};

class 	Hostim_Pricing_Single extends Widget_Base {

	public function get_name() {
		return 'hostim-pricing-single';
	}

	public function get_title() {
		return esc_html__( 'Hostim Pricing Single', 'hostim-core' );
	}

	public function get_icon() {
		return 'eicon-price-table';
	}

	public function get_categories() {
		return [ 'hostim-elements' ];
	}

	protected function register_controls() {

		// Pricing single style selection ========================
		$this->start_controls_section( 'pricing_sec_style', [
			'label' => __( 'Pricing Style', 'hostim-core' ),
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

		// Pricing Features =================
		$this->start_controls_section( 'pricing_table', [
			'label' => __( 'Pricing Table', 'hostim-core' ),
		] );
		$this->add_control(
			'pricing_img',
			[
				'label' => esc_html__( 'Choose Image', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'layout' => '3'
				]
			]
		);
		$this->add_control( 'plan_title', [
			'label'       => __( 'Plan Title', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => __( 'Basic', 'hostim-core' ),
			'label_block' => true,
		] );
		
		$this->add_control( 'sub_title', [
			'label'       => __( 'Sub Title', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => __( 'Only From', 'hostim-core' ),
			'label_block' => true,
			'condition'	  => [
				'layout' => ['1','3','4']
			]
		] );

		$this->add_control( 'is_popular', [
			'label'        => __( 'Featured on/off', 'hostim-core' ),
			'type'         => Controls_Manager::SWITCHER,
			'label_on'     => __( 'Show', 'hostim-core' ),
			'label_off'    => __( 'Hide', 'hostim-core' ),
			'return_value' => 'yes',
			'default'      => 'no',
		] );
		$this->add_control( 'feature_popular_title', [
			'label'       => __( 'Most Popular', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => __( 'Most Popular', 'hostim-core' ),
			'label_block' => true,
			'condition' => [
				'is_popular' => 'yes',
				'layout' => '4',
			]
		] );
		$this->add_control(
			'popular_title',
			[
				'label' => esc_html__( 'Popular Title', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Default title', 'hostim-core' ),
				'placeholder' => esc_html__( 'Type your title here', 'hostim-core' ),
				'condition' => [
					'layout' => '3'
				]
			]
		);

		$this->add_control( 'saved_badge', [
			'label'       => __( 'Package Saved', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => __( 'Save 40%', 'hostim-core' ),
			'label_block' => true,
			'condition'	  => [
				'layout' => '1',
			]
		] );

		$this->add_control( 'sale_badge', [
			'label'       => __( 'Sale Badge', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => __( '30% Sale', 'hostim-core' ),
			'label_block' => true,
			'condition'	  => [
				'layout' => '4',
			]
		] );

		$this->add_control( 'currency', [
			'label'       => __( 'Currency', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => "$",
		] );

		$this->add_control( 'plan_price', [
			'label'       => __( 'Ragular Price', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'	  => 8
		] );
			
		$this->add_control( 'sale_price', [
			'label'       => __( 'Sale Price', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'condition'	  => [
				'layout' => '2'
			]
		] );
		$this->add_control(
			'after_dot_number',
			[
				'label' => esc_html__('Number after dot of Percentage', 'hostim-core'),
				'type'  => Controls_Manager::NUMBER,
				'default' => 2,
				'condition' => [
					'layout' => ['2']
				]
			]
		);

		$this->add_control( 'vat_price', [
			'label'       => __( 'Vat %', 'hostim-core' ),
			'type'        => Controls_Manager::NUMBER,
			'default'	  => 2,
			'condition'	  => [
				'layout' => '1'
			]
		] );

		$this->add_control( 'period', [
			'label'       => __( 'Period', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
		] );
		$this->add_control(
			'feature_img_pri',
			[
				'label' => esc_html__( 'Choose Image', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'layout' => '4',
				]
			]
		);
		$this->add_control( 'top_feature_title', [
			'label'       => __( 'Feature Title', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'	  => 'Top Featured',
			'label_block' => true,
		] );
		$this->add_control( 'list_items', [
			'label'       => __( 'Price Feature', 'hostim-core' ),
			'type'        => Controls_Manager::TEXTAREA,
			'default'     => 'Limited Acess Library
                              Single User
                              Hotline Support 24/7
                              No Updates',
			'label_block' => true,
		] );
		$this->add_control( 'plan_desc', [
			'label'       => __( 'Short Description', 'hostim-core' ),
			'type'        => Controls_Manager::TEXTAREA,
			'label_block' => true,
			'condition'	  => [
				'layout' => ['1','3']
			]
		] );
	
		$this->add_control( 'purchase_btn_label', [
			'label'       => __( 'Purchase Button Monthly Label', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => __( 'Purchase Plan', 'hostim-core' ),
			'label_block' => true,
		] );

		$this->add_control( 'purchase_btn_url', [
			'label'         => __( 'Purchase Button Monthly URL', 'hostim-core' ),
			'type'          => Controls_Manager::URL,
			'placeholder'   => __( 'https://your-link.com', 'hostim-core' ),
			'show_external' => true,
			'default'       => [
				'url'         => '#',
				'is_external' => true,
				'nofollow'    => true,
			],
		] );
		$this->add_control( 'renew_title', [
			'label'       => __( 'Renew Title', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => __( '$7.99/mo when you renew', 'hostim-core' ),
			'label_block' => true,
		] );



		$repeater = new Repeater();

		$repeater->add_control( 'feature_title', [
			'label'       => __( 'Feature Title', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true,
			'default'	  => __('10 GB SSD Storage', 'hostim-core')
		] );
		$repeater->add_control(
			'selected_icon',
			[
				'label' => esc_html__( 'Icon', 'hostim-core' ),
				'type' => Controls_Manager::ICONS,
				'fa4compatibility' => 'icon',
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'fa-solid',
				],
			]
		);
		$this->add_control( 'table_features', [
			'label'       => __( 'Pricing Features', 'hostim-core' ),
			'type'        => Controls_Manager::REPEATER,
			'fields'      => $repeater->get_controls(),
			'condition' => [
				'layout!' => '4',
			],
			'default'     => [
				[
					'feature_title'		=> __( '10 GB SSD Storage', 'hostim-core' ),
					'selected_icon'		=> [
						'value' => 'fa-solid fa-hard-drive',
					]
				],
				[
					'feature_title'		=> __( '10 MySQL Database', 'hostim-core' ),
					'selected_icon'		=> [
						'value' => 'fa-solid fa-database',
					]
				],
				[
					'feature_title'		=> __( 'Unlimited Website', 'hostim-core' ),
					'selected_icon'		=> [
						'value' => 'fas fa-star',
					]
				],
				[
					'feature_title'		=> __( 'cPanel Control Panel', 'hostim-core' ),
					'selected_icon'		=> [
						'value' => 'fa-solid fa-gears',
					]
				],
				[
					'feature_title'		=> __( 'Auto Backup & Cloud Storage', 'hostim-core' ),
					'selected_icon'		=> [
						'value' => 'fa-solid fa-briefcase',
					]
				],
			],
			'title_field' => '{{{ feature_title }}}',
		] );
		$this->end_controls_section(); // End Pricing Table
		


		// Tab Switch Style
		//======================
		$this->start_controls_section( 'tab_switcher_button', [
			'label' => __( 'Popular Badge Style', 'hostim-core' ),
			'tab'   => Controls_Manager::TAB_STYLE,			
		] );

		$this->add_control( 'popular_badge_color', [
			'label'     => __( 'Color', 'hostim-core' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .popular-badge' => 'color: {{VALUE}};',
			],

		] );
		
		$this->add_control( 'popular_badge_bgcolor', [
			'label'     => __( 'Background Color', 'hostim-core' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .popular-badge, {{WRAPPER}} .bf-pricing-column.popular .popular-badge::before' => 'background: {{VALUE}};'
			],

		] );

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'selector' => '{{WRAPPER}} .popular-badge',
			]
		);

		$this->end_controls_section();

		/**
		 * Style Tab
		 * ------------------------------ Style Title ------------------------------
		 *
		 */
		$this->start_controls_section( 'style_title', [
			'label' => __( 'Price', 'hostim-core' ),
			'tab'   => Controls_Manager::TAB_STYLE,
		] );
		$this->add_control( 'price_color', [
			'label'     => __( 'Text Color', 'hostim-core' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .pricing-table .pricing-header .price' => 'color: {{VALUE}};',
				'{{WRAPPER}} .bf-pricing-column .price-title' => 'color: {{VALUE}};',
				'{{WRAPPER}} .wp-pricing-column h4' => 'color: {{VALUE}};',
				'{{WRAPPER}} .pri_color_style' => 'color: {{VALUE}};'
			],

		] );
		$this->add_group_control( Group_Control_Typography::get_type(), [
			'name'     => 'typography_price',
			'selector' => '
				{{WRAPPER}} .pricing-table .pricing-header .price,
				{{WRAPPER}} .bf-pricing-column .price-title,
				{{WRAPPER}} .wp-pricing-column h4,
				{{WRAPPER}} .pri_color_style,
			',
		] );
		$this->end_controls_section();


		//------------------------------ Style subtitle ------------------------------
		$this->start_controls_section( 'style_subtitle', [
			'label' => __( 'Title', 'hostim-core' ),
			'tab'   => Controls_Manager::TAB_STYLE,
		] );
		$this->add_control( 'price_title', [
			'label'     => __( 'Color', 'hostim-core' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .bf-pricing-column .pricing_title' => 'color: {{VALUE}};',
				'{{WRAPPER}} .wp-pricing-column h3' => 'color: {{VALUE}};',
				'{{WRAPPER}} .title_style' => 'color: {{VALUE}};'
			],

		] );
		$this->add_group_control( Group_Control_Typography::get_type(), [
			'name'     => 'typography_price_title',
			'selector' => '
				{{WRAPPER}} .bf-pricing-column .pricing_title,
				{{WRAPPER}} .wp-pricing-column h3,	
				{{WRAPPER}} .title_style
			',
		] );
		$this->end_controls_section();

		//------------------------------ Style subtitle ------------------------------
		$this->start_controls_section( 'button_style', [
			'label' => __( 'Button', 'hostim-core' ),
			'tab'   => Controls_Manager::TAB_STYLE,
		] );
		$this->start_controls_tabs( 'style_tabs' );

		$this->start_controls_tab( 'style_normal_tab', [
			'label' => __( 'Normal', 'hostim-core' ),
		] );

		$this->add_control( 'text-color', [
			'label'     => __( 'Text Color', 'hostim-core' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .single_pricing_btn' => 'color: {{VALUE}};',
				'{{WRAPPER}} .btn_style' => 'color: {{VALUE}};'
			],
		] );

		

		$this->add_control(
			'hostim-pricing-margin',
			[
				'label' => esc_html__( 'Pricing Margin', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .single_pricing_btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);

		$this->add_control(
			'hostim-pricing-padding',
			[
				'label' => esc_html__( 'Pricing Padding', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .single_pricing_btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);


		$this->add_control(
			'single-pricing-btn-width',
			[
				'label' => esc_html__( 'Width', 'hostim-core' ),
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
				'default' => [
					'unit' => '%',
					'size' => 100,
				],
				'selectors' => [
					'{{WRAPPER}} .single_pricing_btn' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control( 'button_background', [
			'label'     => __( 'Background', 'hostim-core' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .single_pricing_btn' => 'background: {{VALUE}};',
				'{{WRAPPER}} .btn_style' => 'background: {{VALUE}};',
			]
		] );


		$this->add_group_control( Group_Control_Box_Shadow::get_type(), [
			'name'     => 'button_box_shadow',
			'label'    => __( 'Box Shadow', 'hostim-core' ),
			'selector' => '{{WRAPPER}} .single_pricing_btn',

		] );

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'single_pricing_border',
				'selector' => '{{WRAPPER}} .single_pricing_btn',
			]
		);

		$this->add_control(
			'btn-border-radius',
			[
				'label' => esc_html__( 'Border Radius', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .single_pricing_btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'default' => [
					'top' 	=> '4',
					'right' => '4',
					'bottom'=> '4',
					'left'	=> '4',
					'unit'	=> 'px'
				]
			]
		);

		$this->add_group_control( Group_Control_Typography::get_type(), [
			'name'     => 'button_typography',
			'selector' => '{{WRAPPER}} .single_pricing_btn',
		] );

		$this->end_controls_tab();

		$this->start_controls_tab( 'style_hover_tab', [
			'label' => __( 'Hover', 'hostim-core' ),
		] );

		$this->add_control( 'text-color_hover', [
			'label'     => __( 'Text Color', 'hostim-core' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .single_pricing_btn:hover' => 'color: {{VALUE}};',
				'{{WRAPPER}} .btn_style:hover' => 'color: {{VALUE}};',
			],
		] );

		$this->add_control( 'button_background_hover', [
			'label'     => __( 'Background', 'hostim-core' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .single_pricing_btn:hover' => 'background: {{VALUE}};',
				'{{WRAPPER}} .btn_style:hover' => 'background: {{VALUE}};',
			]
		] );


		$this->add_group_control( Group_Control_Box_Shadow::get_type(), [
			'name'     => 'button_box_shadow_hover',
			'label'    => __( 'Box Shadow', 'hostim-core' ),
			'selector' => '{{WRAPPER}} .single_pricing_btn:hover',
		] );

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'single_pricing_hover_border',
				'selector' => '{{WRAPPER}} .single_pricing_btn:hover',
			]
		);

		$this->add_control( 'border-color_hover', [
			'label'     => __( 'Border Color', 'hostim-core' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .single_pricing_btn:hover' => 'border-color: {{VALUE}};'
			],
		] );

		$this->add_control(
			'btn-hover-border-radius',
			[
				'label' => esc_html__( 'Border Radius', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .single_pricing_btn:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();


		//------------------------------ Style Section ------------------------------
		$this->start_controls_section( 'pricing_feature_list', [
			'label' => __( 'Feature list Style', 'hostim-core' ),
			'tab'   => Controls_Manager::TAB_STYLE,
		] );

		$this->add_group_control(Group_Control_Typography::get_type(),
			[
				'name'     => 'feature_list_typo',
				'label'    => __('Typography', 'hostim-core'),
				'selector' => '{{WRAPPER}} .feature-list li, {{WRAPPER}} .pricing-list li, {{WRAPPER}} .list_style',
			]
		);

		$this->add_control('feature_list_color', [
			'label'     => __( 'Color',	'hostim-core' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => '',
			'selectors' => [
				'{{WRAPPER}} .feature-list li' => 'color: {{VALUE}};',
				'{{WRAPPER}} .pricing-list li' => 'color: {{VALUE}};',
				'{{WRAPPER}} .list_style' => 'color: {{VALUE}};'
			],
		]);
		
		$this->add_control('feature_list_icon_color', [
			'label'     => __( 'Icon Color',	'hostim-core' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => '',
			'selectors' => [
				'{{WRAPPER}} .feature-list li i' => 'color: {{VALUE}};',
				'{{WRAPPER}} .pricing-list li i' => 'color: {{VALUE}};',
				'{{WRAPPER}} .host-web-price-list li::after' => 'color: {{VALUE}};'
			],
		]);

		$this->end_controls_section();


		//------------------------------ Style Section ------------------------------
		$this->start_controls_section( 'style_section', [
			'label' => __( 'Pricing Section', 'hostim-core' ),
			'tab'   => Controls_Manager::TAB_STYLE,
		] );

		$this->start_controls_tabs('item_tabs_controls');
		$this->start_controls_tab('item_tab_normal', [
			'label' => __('Normal', 'hostim-core')
		]);
		$this->add_control( 'table_bg', [
			'label'     => __( 'Background', 'hostim-core' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .bf-pricing-column' => 'background: {{VALUE}};',
				'{{WRAPPER}} .wp-pricing-column' => 'background: {{VALUE}};'
			],
			'default' => '#fff'
		] );
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'item_border',
				'selector' => '
					{{WRAPPER}} .bf-pricing-column,
					{{WRAPPER}} .wp-pricing-column	
				',
			]
		);

		$this->add_control(
			'item-border-radius',
			[
				'label' => esc_html__( 'Border Radius', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .bf-pricing-column' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .wp-pricing-column' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
				'default' => [
					'top' 	=> '4',
					'right' => '4',
					'bottom'=> '4',
					'left'	=> '4',
					'unit'	=> 'px'
				]
			]
		);
		$this->add_control( 'pricing_left_shape', [
			'label'   => __( 'Left Top Shape Image', 'hostim-core' ),
			'type'    => Controls_Manager::MEDIA,
			'default' => [
				'url' => plugin_dir_url( __DIR__ ) . 'assets/images/testimonial/frame.svg'
			],
			
		] );
		$this->end_controls_tab();
		
		$this->start_controls_tab('item_tab_hover', [
			'label' => __('Hover', 'hostim-core')
		]);
		$this->add_control( 'table_hover_bg', [
			'label'     => __( 'Background', 'hostim-core' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .bf-pricing-column:hover' => 'background: {{VALUE}};',
				'{{WRAPPER}} .wp-pricing-column' => 'background: {{VALUE}};'
			]
		] );
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'item_hover_border',
				'selector' => '
					{{WRAPPER}} .bf-pricing-column:hover,
					{{WRAPPER}} .wp-pricing-column
				',
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();

		

		$this->add_control( 'hr', [
			'type' => Controls_Manager::DIVIDER,
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
				'selector' => '[data-bs-theme=dark] {{WRAPPER}} .bf-pricing-column, [data-bs-theme=dark] {{WRAPPER}} .wp-pricing-column',
			]);
			$this->end_controls_section(); //End Section Background
		}
	}

	protected function render() {

		$settings = $this->get_settings_for_display();
		extract( $settings ); 

		require __DIR__ . '/templates/pricing/single-layout-' . $layout . '.php';
	}

}



