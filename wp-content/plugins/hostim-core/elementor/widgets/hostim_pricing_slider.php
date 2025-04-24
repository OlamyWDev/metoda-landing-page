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


class Hostim_pricing_slider extends Widget_Base {

	public function get_name() {
		return 'hostim-pricing-slider';
	}

	public function get_title() {
		return __( 'Hostim Pricing Slider', 'hostim-core' );
	}

	public function get_style_depends() {
		return [ 'swiper' ];
	}

	public function get_script_depends() {
		return [ 'swiper' ];
	}

	public function get_icon() {
		return 'eicon-grow';
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
		$this-> elementor_content_control();
		$this-> elementor_style_control();
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

		//======================= Select Layout ==========================//
		$this->start_controls_section( 'section_testimonial', [
			'label' => __( 'Pricing Slider Layout', 'hostim-core' ),
		] );

		$this->add_control( 'layout', [
			'label'   => esc_html__( 'Layout', 'hostim-core' ),
			'type'    => Controls_Manager::SELECT,
			'options' => [
				'1' => esc_html__( '01: VPS Tab Slider', 'hostim-core' ),
				'2' => esc_html__( '02: Pricing Table Slider', 'hostim-core' ),
				'3' => esc_html__( '03: Pricing Table Slider', 'hostim-core' ),
				'4' => esc_html__( '04: VPS Tab Slider (2)', 'hostim-core' ),
			],
			'default' => '1',
		] );

		$this->end_controls_section(); //End Layout


        //============================ Section Title =============================//
		$this->start_controls_section( 'pricing_slider_heading', [
			'label' => __( 'Section Title', 'hostim-core' ),
            'condition' => [
                'layout' => ['1','4']
            ]
		] );

		$this->add_control( 'section_title', [
			'label'       => __( 'Section Title', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true,
			'default'	  => __('Your High Speed VPS Plan.', 'hostim-core')
		] );
		$this->end_controls_section(); // End Section Title


		//========================= Feature Column 01 =========================//
		$this->start_controls_section( 'section_pricing_slider_feature', [
			'label' => __( 'Feature Column', 'hostim-core' ),
			'condition' => [
				'layout' => ['1','4']
			]
		] );

		$feature = new \Elementor\Repeater();
		$feature->add_control( 'feature_title', [
			'label'       => __( 'Feature Title', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true,
			'default'	  => __('Dedicated <span>cup</span>', 'hostim-core')
		] );

		$feature->add_control( 'feature_img', [
			'label'       => __( 'Feature Image', 'hostim-core' ),
			'type'        => Controls_Manager::MEDIA,
			'default'   => [
				'url' => plugin_dir_url( __DIR__ ) . 'assets/images/processor.png'
			]
		] );

		$this->add_control( 'feature_column', [
			'label'       => __( 'Feature Column', 'hostim-core' ),
			'type'        => \Elementor\Controls_Manager::REPEATER,
			'fields'      => $feature->get_controls(),
			'default'     => [
				[
					'feature_title' =>  __('Dedicated <span>cup</span>', 'hostim-core'),
					'feature_img'	=> [
						'url' => plugin_dir_url( __DIR__ ) . 'assets/images/processor.png'
					]
				],
				[
					'feature_title' =>  __('Dedicated <span>RAM</span>', 'hostim-core'),
					'feature_img'	=> [
						'url' => plugin_dir_url( __DIR__ ) . 'assets/images/processor.png'
					]
				],
				[
					'feature_title' =>  __('SSD Storage', 'hostim-core'),
					'feature_img'	=> [
						'url' => plugin_dir_url( __DIR__ ) . 'assets/images/processor.png'
					]
				],
				[
					'feature_title' =>  __('Bandwidth', 'hostim-core'),
					'feature_img'	=> [
						'url' => plugin_dir_url( __DIR__ ) . 'assets/images/processor.png'
					]
				],
			],
			'title_field' => '{{{ feature_title }}}',
		] );

		$this->end_controls_section(); //End Pricing Table 01


		//================================= Pricing Slider 01, 02 ============================//
		$this->start_controls_section( 'section_pricing_slider', [
			'label' => __( 'Pricing Slider', 'hostim-core' ),
			'condition' => [
				'layout' => [ '1', '2', '3','4' ]
			]
		] );

		$repeater = new \Elementor\Repeater();
		$repeater->add_control( 'package', [
			'label'       => __( 'Package Name', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'	  => __('VPS-1', 'hostim-core')
		] );

		$repeater->add_control( 'cup', [
			'label'       => __( 'cup', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'	  => __('2GHZ Core', 'hostim-core')
		] );

		$repeater->add_control( 'ram', [
			'label'       => __( 'Ram', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'	  => __('16GB', 'hostim-core')
		] );

		$repeater->add_control( 'storage', [
			'label'       => __( 'Storage', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'	  => __('100GB', 'hostim-core')
		] );

		$repeater->add_control( 'bandwidth', [
			'label'       => __( 'Bandwidth', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => __('250GB', 'hostim-core')
		] );

		$repeater->add_control( 'price', [
			'label'       => __( 'Price', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => __('$20.99', 'hostim-core')
		] );
		$repeater->add_control( 'price_period', [
			'label'       => __( 'Price Period', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => __('/mo', 'hostim-core')
		] );

		$repeater->add_control(
			'package_link',
			[
				'label'         => __('Package Link', 'hostim-core'),
				'type'          => \Elementor\Controls_Manager::URL,
				'placeholder'   => __('https://your-link.com', 'hostim-core'),
				'show_external' => true,
				'default'       => [
					'url'         => '#',
					'is_external' => true,
					'nofollow'    => true,
				],
			]
		);

		$this->add_control( 'price_slider', [
			'label'       => __( 'Price Slider', 'hostim-core' ),
			'type'        => \Elementor\Controls_Manager::REPEATER,
			'fields'      => $repeater->get_controls(),
			'default'     => [
				[
					'cup'		=> __( '2GHZ Core', 'hostim-core' ),
					'ram' 		=> __( '4GB', 'hostim-core' ),
					'storage' 	=> __( '100GB', 'hostim-core' ),
					'bandwidth'	=> __( '200GB', 'hostim-core' ),
					'price'		=> __( '$20', 'hostim-core' ),
				],
				[
					'cup'		=> __( '3GHZ Core', 'hostim-core' ),
					'ram' 		=> __( '8GB', 'hostim-core' ),
					'storage' 	=> __( '200GB', 'hostim-core' ),
					'bandwidth'	=> __( '250GB', 'hostim-core' ),
					'price'		=> __( '$30', 'hostim-core' ),
				],
				[
					'cup'		=> __( '4GHZ Core', 'hostim-core' ),
					'ram' 		=> __( '16GB', 'hostim-core' ),
					'storage' 	=> __( '300GB', 'hostim-core' ),
					'bandwidth'	=> __( '500GB', 'hostim-core' ),
					'price'		=> __( '$40', 'hostim-core' ),
				],
				[
					'cup'		=> __( '5GHZ Core', 'hostim-core' ),
					'ram' 		=> __( '32GB', 'hostim-core' ),
					'storage' 	=> __( '500GB', 'hostim-core' ),
					'bandwidth'	=> __( '750GB', 'hostim-core' ),
					'price'		=> __( '$50', 'hostim-core' ),
				],
				[
					'cup'		=> __( '6GHZ Core', 'hostim-core' ),
					'ram' 		=> __( '64GB', 'hostim-core' ),
					'storage' 	=> __( '1000GB', 'hostim-core' ),
					'bandwidth'	=> __( '2TB', 'hostim-core' ),
					'price'		=> __( '$60', 'hostim-core' ),
				],
			],
			'title_field' => '{{{ package }}}',
			'condition' => [
				'layout' => ['1','4']
			]
		] ); //End Slider 02


        // Slider 02
		$slider2 = new \Elementor\Repeater();
		$slider2->add_control( 'package_name', [
			'label'       => __( 'Package Name', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'	  => 'Enterprise Cloud Servers'
		] );
		
		$slider2->add_control( 'subtitle', [
			'label'       => __( 'Package Subtitle', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'	  => 'From Only'
		] );

		$slider2->add_control( 'image', [
			'label'       => __( 'Image', 'hostim-core' ),
			'type'        => Controls_Manager::MEDIA,
		] );
		$slider2->add_control( 'price', [
			'label'       => __( 'Price', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'	  => '$45.05'
		] );
		$slider2->add_control( 'period', [
			'label'       => __( 'Period', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'	  => '/mo'
		] );

		$slider2->add_control( 'contents', [
			'label'       => __( 'Contents', 'hostim-core' ),
			'type'        => Controls_Manager::TEXTAREA,
		] );

		$slider2->add_control( 'btn_label', [
			'label'       => __( 'Button Label', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'	  => 'View All Plans'
		] );

		$slider2->add_control( 'btn_url', [
			'label'       => __( 'Button URL', 'hostim-core' ),
			'type'        => Controls_Manager::URL,
			'default'	  => [
				'url'   => '#'
			]
		] );

		$this->add_control( 'price_slider2', [
			'label'       => __( 'Add Item', 'hostim-core' ),
			'type'        => \Elementor\Controls_Manager::REPEATER,
			'fields'      => $slider2->get_controls(),
			'title_field' => '{{{ package_name }}}',
			'condition' => [
				'layout' => '2'
			]
		] ); //End Slider 02


		// Slider 03
		$slider3 = new \Elementor\Repeater();
		$slider3->add_control( 'package_name', [
			'label'       => __( 'Package Name', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'	  => 'VPS Hosting-1'
		] );

		$slider3->add_control( 'subtitle', [
			'label'       => __( 'Subtitle', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'	  => 'Form only'
		] );

		$slider3->add_control( 'price', [
			'label'       => __( 'Price', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'	  => '$45.05'
		] );

		$slider3->add_control( 'duration', [
			'label'       => __( 'Price', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'	  => '/mo'
		] );

		$slider3->add_control( 'contents', [
			'label'       => __( 'Contents', 'hostim-core' ),
			'type'        => Controls_Manager::TEXTAREA,
		] );

		$slider3->add_control( 'list_items', [
			'label'       => __( 'List Items', 'hostim-core' ),
			'type'        => Controls_Manager::TEXTAREA,
		] );

		$slider3->add_control( 'expand_feature', [
			'label'       => __( 'Expand Feature', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'	  => 'Expand Feature'
		] );

		$slider3->add_control( 'btn_label', [
			'label'       => __( 'Button Label', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'	  => 'Purchase Plan'
		] );

		$slider3->add_control( 'btn_url', [
			'label'       => __( 'Button URL', 'hostim-core' ),
			'type'        => Controls_Manager::URL,
			'default'	  => [
				'url'   => '#'
			]
		] );

		$this->add_control( 'price_slider3', [
			'label'       => __( 'Add Item', 'hostim-core' ),
			'type'        => \Elementor\Controls_Manager::REPEATER,
			'fields'      => $slider3->get_controls(),
			'title_field' => '{{{ package_name }}}',
			'condition' => [
				'layout' => '3'
			]
		] ); //End Slider 03


		$this->end_controls_section(); // End Pricing Slider


		$this->start_controls_section( 'pricing_purchase_sec', [
			'label' => __( 'Purchase Button', 'hostim-core' ),
			'condition' => [
				'layout' => ['1','4']
			]
		] );

		$this->add_control( 'btn_label', [
			'label'       => __( 'Button Label', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'	  => __('Purchase Plan', 'hostim-core')
		] );

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


		//=========================== Style Pricing Slider Table =========================//
		$this->start_controls_section(
			'style_pricing_table', [
				'label' => esc_html__( 'Pricing Table', 'hostim-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				'condition' => [
					'layout' => ['2','3'],
				],
			]
		);

		//======== Title Options
		$this->add_control(
			'package_name_options', [
				'label' => esc_html__( 'Package Name Options', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(), [
				'name' => 'package_name_typo',
				'selector' => '
					{{WRAPPER}} .__package_name,
					{{WRAPPER}} .cmp-pricing-single h3	
				',
			]
		);

		$this->add_control(
			'package_name_color', [
				'label' => esc_html__( 'Text Color', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .__package_name' => 'color: {{VALUE}}',
					'{{WRAPPER}} .hosting-signle-product h6' => 'color: {{VALUE}}'
				],
			]
		);

		//======== Price Options
		$this->add_control(
			'item_price_options', [
				'label' => esc_html__( 'Price Options', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(), [
				'name' => 'price_typo',
				'selector' => '
					{{WRAPPER}} .__price,
					{{WRAPPER}} .hosting-signle-product .pricing-amount h3,
					{{WRAPPER}} .cmp-pricing-single h4
				',
			]
		);

		$this->add_control(
			'price_color', [
				'label' => esc_html__( 'Text Color', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hosting-signle-product .pricing-amount h3' => 'color: {{VALUE}}',
					'{{WRAPPER}} .cmp-pricing-single h4' => 'color: {{VALUE}}'
				],
			]
		);
		//======== description style option

		

		//======== List Items Options
		$this->add_control(
			'list_items_options', [
				'label' => esc_html__( 'Item List Options', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(), [
				'name' => 'list_items_typo',
				'selector' => '
					{{WRAPPER}} .pricing-column .feature-list li,
					{{WRAPPER}} .hosting-signle-product p,
					{{WRAPPER}} .cmp-pricing-single p
				',
			]
		);

		$this->add_control(
			'list_items_color', [
				'label' => esc_html__( 'Text Color', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hosting-signle-product p' => 'color: {{VALUE}}',
					'{{WRAPPER}} .cmp-pricing-single p' => 'color: {{VALUE}}'
				],
			]
		);
		
		$this->add_control(
			'list_icon_color', [
				'label' => esc_html__( 'Icon Color', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pricing-column .feature-list li i' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section(); // End Pricing Slider

		// ======================== heading style start============================
		$this->start_controls_section(
			'style_heading_slider',
			[
				'label' => esc_html__( 'Heading', 'hostim-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				'condition' => [
					'layout' => ['1','4'],
				]
			]
		);

		$this->add_control(
			'slider_heading_style',
			[
				'label' => esc_html__( 'Text Color', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .price-slider-wrapper .section-title h2' => 'color: {{VALUE}}',
					'{{WRAPPER}} .section-title h2.vsp_slider_title' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'selector' => '{{WRAPPER}} .price-slider-wrapper .section-title h2',
				'selector' => '{{WRAPPER}} .section-title h2.vsp_slider_title',
			]
		);

		$this->add_control(
			'pricing_heading_style',
			[
				'label' => esc_html__( 'Text Color', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .host-web-op-bg h5.pricing_value_title' => 'color: {{VALUE}}',
				],
				'condition' => [
					'layout' => '4'
				]
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'pri_heading_typography',
				'selector' => '{{WRAPPER}} .host-web-op-bg h5.pricing_value_title',
				'condition' => [
					'layout' => '4'
				]
			]
			
		);

		$this->end_controls_section();
		// ======================== heading style end============================



		//=========================== Style Button =========================//
		$this->start_controls_section(
			'style_button', [
				'label' => esc_html__( 'Button', 'hostim-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				'condition' => [
					'layout' => ['1','2','3','4'],
				]
			]
		);

		// Style Buttons
		$this->start_controls_tabs(
			'style_btn_tabs'
		);

		$this->start_controls_tab(
			'style_normal_tab', [
				'label' => esc_html__( 'Normal', 'hostim-core' ),
			]
		);

		$this->add_control(
			'normal_btn_text_color', [
				'label' => esc_html__( 'Text Color', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .__btn' => 'color: {{VALUE}}',
					'{{WRAPPER}} .hosting-signle-product a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .vps_pricing_bottom a' => 'color: {{VALUE}}'
				],
			]
		);

		$this->add_control(
			'normal_btn_border_color', [
				'label' => esc_html__( 'Border Color', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .__btn' => 'border-color: {{VALUE}}',
					'{{WRAPPER}} .hosting-signle-product a' => 'border-color: {{VALUE}}',
					'{{WRAPPER}} .vps_pricing_bottom a' => 'border-color: {{VALUE}}'
				],
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(), [
				'name' => 'normal_btn_bg_color',
				'label' => __( 'Background', 'hostim-core' ),
				'types' => [ 'classic', 'gradient' ],
				'exclude' => [ 'image' ],
				'selector' => '
					{{WRAPPER}} .__btn,
					{{WRAPPER}} .hosting-signle-product a,
					{{WRAPPER}} a.template-btn.primary-btn.rounded-pill.ms-4.vps_value.vps_3_value,
					{{WRAPPER}} .mn-secondary-btn,
					{{WRAPPER}} .cmp-pricing-single .template-btn
				',
			]
		);

		$this->end_controls_tab(); //Normal Color

		$this->start_controls_tab(
			'style_hover_tab', [
				'label' => esc_html__( 'Hover', 'hostim-core' ),
			]
		);

		$this->add_control(
			'hover_btn_text_color', [
				'label' => esc_html__( 'Text Color', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .__btn:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .hosting-signle-product a:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .vps_pricing_bottom a:hover' => 'color: {{VALUE}}'
				],
			]
		);

		$this->add_control(
			'hover_btn_border_color', [
				'label' => esc_html__( 'Border Color', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .__btn:hover' => 'border-color: {{VALUE}}',
					'{{WRAPPER}} .hosting-signle-product a:hover' => 'border-color: {{VALUE}}',
					'{{WRAPPER}} .vps_pricing_bottom a:hover' => 'border-color: {{VALUE}}'
				],
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(), [
				'name' => 'hover_btn_bg_color',
				'label' => __( 'Background', 'hostim-core' ),
				'types' => [ 'classic', 'gradient' ],
				'exclude' => [ 'image' ],
				'selector' => '
					{{WRAPPER}} .__btn:hover,
					{{WRAPPER}} .hosting-signle-product a:hover,
					{{WRAPPER}} .vps_pricing_bottom a:hover,
					{{WRAPPER}} .mn-secondary-btn:hover,
					{{WRAPPER}} .cmp-pricing-single .template-btn:hover
				',
			]
		);

		$this->end_controls_tab(); //Normal Color

		$this->end_controls_tab();
		$this->end_controls_tabs();

		$this->end_controls_section();//End Button


		// vps value start ---------------------------------------
		$this->start_controls_section(
			'vps_price_color', [
				'label' => __( 'VPS Color', 'hostim-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition' => [
					'layout' => ['1','4'],
				],
			]
		);
		$this->add_control(
			'vps_color', [
				'label' => esc_html__( 'VPS Price Color', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vps_pricing_bottom h4' => 'color: {{VALUE}}'
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'VPS_Price_typ',
				'selector' => '{{WRAPPER}} .vps_pricing_bottom h4',
			]
		);
		$this->end_controls_section();
		// vps value end ---------------------------------------


		//==================== Control Settings ===================//
		$this->start_controls_section(
			'sec_control_settings', [
				'label' => __( 'Control Settings', 'hostim-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition' => [
					'layout' => [ '2', '3' ]
				]
			]
		);
		$this->add_control(
			'show_items_desktop', [
				'label'     => esc_html__( 'Display Items [Desktop]', 'hostim-core' ),
				'type'      => Controls_Manager::NUMBER,
				'default'	=> 1
			]
		);
		$this->add_control(
			'show_items_tablet', [
				'label'     => esc_html__( 'Display Items [Tablet]', 'hostim-core' ),
				'type'      => Controls_Manager::NUMBER,
				'default'	=> 1
			]
		);
		$this->add_control(
			'show_items_mobile', [
				'label'     => esc_html__( 'Display Items [Mobile]', 'hostim-core' ),
				'type'      => Controls_Manager::NUMBER,
				'default'	=> 1
			]
		);

		$this->end_controls_section(); //End Control Settings


		//======================== Section Background =============================//
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
					'{{WRAPPER}} .pricing_slider__' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
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
					'{{WRAPPER}} .pricing_slider__' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'sec_background',
				'label' => esc_html__( 'Background', 'plugin-name' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .pricing_slider__',
			]
		);

		$this->add_control( 'background_shape_1', [
			'label'       => __( 'Shape Left', 'hostim-core' ),
			'type'        => Controls_Manager::MEDIA,
		] );

		$this->add_control( 'background_shape_2', [
			'label'       => __( 'Shape Right', 'hostim-core' ),
			'type'        => Controls_Manager::MEDIA,
		] );

		$this->end_controls_section();

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
				'selector' => '[data-bs-theme=dark] {{WRAPPER}} .pricing_slider__',
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

		$feature_title = [];
		$feature_img   = [];
		if( is_array( $feature_column ) ){
			foreach( $feature_column as $item ){
				$feature_img[]	= $item['feature_img']['url'];
				$feature_title[]= $item['feature_title'];
			}
		}

		$cup_ 		= [];
		$ram_ 		= [];
		$price_ 	= [];
		$storage_ 	= [];
		$bandwidth_	= [];


        //======================= Template Parts =======================//
		include "templates/pricing-slider/layout-{$layout}.php";

	}
}
