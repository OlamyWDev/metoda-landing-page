<?php

namespace Hostim\Widgets;

defined( 'ABSPATH' ) || exit; // Abort, if called directly.

use Elementor\{Group_Control_Image_Size,
	Utils,
	Widget_Base,
	Controls_Manager,
	Group_Control_Background,
	Repeater

};

class Hostim_Services extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve alert widget name.
	 *
	 * @return string Widget name.
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function get_name() {
		return 'hostim-services';
	}

	public function get_title() {
		return __( 'Hostim Services', 'hostim-core' );
	}

	public function get_icon() {
		return 'eicon-photo-library';
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


		//======================== Layout ==========================//
		$this->start_controls_section( 'sec_service', [
			'label' => __( 'Services Layout', 'hostim-core' ),
		] );

		$this->add_control( 'layout', [
			'label'   => esc_html__( 'Select Layout', 'hostim-core' ),
			'type'    => Controls_Manager::SELECT,
			'options' => [
				'1' => esc_html__( '01: Layout', 'hostim-core' ),
				'2' => esc_html__( '02: Layout', 'hostim-core' ),
				'3' => esc_html__( '03: Layout', 'hostim-core' ),
				'4' => esc_html__( '04: Layout', 'hostim-core' ),
				'5' => esc_html__( '05: Service Carousel', 'hostim-core' ),
				'6' => esc_html__( '06: Service Carousel', 'hostim-core' ),
				'7' => esc_html__( '07: Service', 'hostim-core' ),
				'8' => esc_html__( '08: Service', 'hostim-core' ),
				'9' => esc_html__( '09: Category Tab', 'hostim-core' ),
				'10' => esc_html__( '10: Category Tab', 'hostim-core' ),
			],
			'default' => '1',
		] );

		$this->end_controls_section(); //End Layout


		//======================== Section Title ==========================//
		$this->start_controls_section( 'sec_title', [
			'label' => __( 'Title', 'hostim-core' ),
			'condition' => [
				'layout' => '5'
			]
		] );

		$this->add_control( 'title', [
			'label'       => __( 'Title', 'hostim-core' ),
			'type'        => Controls_Manager::TEXTAREA,
			'default'     => 'Install Applications Easy With cPanel',
		] );

		$this->end_controls_section(); //End Section Title


		//========================= Query Filter ===========================//
		$this->start_controls_section( 'section_query', [
			'label' => __( 'Services', 'hostim-core' ),
		] );

		$this->add_control( 'posts_per_page', [
			'label'       => __( 'Post Per Page', 'hostim-core' ),
			'type'        => Controls_Manager::NUMBER,
			'description' => esc_html__( "Number of Service to show (-1 for all).", 'hostim-core' ),
			'min'         => -1,
			'default'     => 3,
		] );
		$this->add_control( 'order_by', [
			'label'       => __( 'Order by', 'hostim-core' ),
			'type'        => Controls_Manager::SELECT,
			'options'     => [
				'date'          => esc_html__( 'Date', 'hostim-core' ),
				'ID'            => esc_html__( 'ID', 'hostim-core' ),
				'author'        => esc_html__( 'Author', 'hostim-core' ),
				'title'         => esc_html__( 'Title', 'hostim-core' ),
				'modified'      => esc_html__( 'Modified', 'hostim-core' ),
				'rand'          => esc_html__( 'Random', 'hostim-core' ),
				'comment_count' => esc_html__( 'Comment Count', 'hostim-core' ),
				'menu_order'    => esc_html__( 'Menu Order', 'hostim-core' ),
			],
			'default'     => 'date',
			'separator'   => 'before',
			'description' => esc_html__( "Select how to sort retrieved posts. More at ", 'hostim-core' ) . '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex</a>.',
		] );

		$this->add_control( 'order', [
			'label'       => __( 'Sort Order', 'hostim-core' ),
			'type'        => Controls_Manager::SELECT,
			'options'     => [
				'ASC'  => esc_html__( 'Ascending', 'hostim-core' ),
				'DESC' => esc_html__( 'Descending', 'hostim-core' ),
			],
			'default'     => 'ASC',
			'separator'   => 'before',
			'description' => esc_html__( "Select Ascending or Descending order. More at", 'hostim-core' ) . '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex</a>.',
		] );

		$this->add_control(
			'title_length_', [
				'label'   => esc_html__('Title Length', 'hostim-core'),
				'type'    => \Elementor\Controls_Manager::NUMBER,
				'default' => 30,
			]
		);

		$this->add_control(
			'excerpt_length_', [
				'label'   => esc_html__('Excerpt Word Length', 'hostim-core'),
				'type'    => \Elementor\Controls_Manager::NUMBER,
				'default' => 120,
			]
		);

		$this->add_control(
			'is_thumb_list', [
				'label' => __( 'Show Thumbnail List', 'hostim-core' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => __( 'Show', 'hostim-core' ),
				'label_off'    => __( 'Hide', 'hostim-core' ),
				'return_value' => 'yes',
				'default'      => 'yes',
				'condition' => [
					'layout' => '3'
				]
			]
		);

		$this->add_control(
			'currency', [
				'label' => __( '$', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( '$', 'hostim-core' ),
				'condition' => [
					'layout' => [ '1', '4' ]
				]
			]
		);

		$this->add_control(
			'service_btn_label', [
				'label' => __( 'Service Button Label', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Starting at: ', 'hostim-core' ),
				'condition' => [
					'layout' => [ '1', '4', '8','10' ]
				]
			]
		);

		$this->add_control(
			'view_more', [
				'label' => __( 'View More Button Label', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'More Application', 'hostim-core' ),
				'condition' => [
					'layout' => [ '3', '4', '6' ]
				]
			]
		);
		$this->add_control(
			'view_more_link', [
				'label' => __( 'View More Button Link', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '#',
				'condition' => [
					'layout' => [ '3', '4', '6' ]
				]
			]
		);

		$this->end_controls_section(); //End Query Filter


		// Service categories tabs ==============
		$this->start_controls_section(
			'services_cat_tabs_control',
			[
				'label' => __('Services Category Tabs', 'hostim-core'),
				'condition' => [
					'layout' => ['9']
				]
			]
		);
		$repeater = new Repeater();
		$repeater->add_control('select_cat', [
			'label'   => esc_html__('Select Category', 'hostim-core'),
			'type'    => Controls_Manager::SELECT,
			'options' => hostim_cat_array('services_cat'),
		]);
		$repeater->add_control('posts_per_page', [
			'label'       => __('Posts Per Page', 'hostim-core'),
			'type'        => Controls_Manager::NUMBER,
			'default'     => '4',
		]);
		$repeater->add_control('block_heading', [
			'label'       => __('Block Content', 'hostim-core'),
			'type'        => Controls_Manager::HEADING,
			'separator'	  => 'before',
		]);
		$repeater->add_control('block_title', [
			'label'       => __('Title', 'hostim-core'),
			'type'        => Controls_Manager::TEXTAREA,
			'default'     => 'Install Applications Easy With cPanel',
		]);
		$repeater->add_control('block_desc', [
			'label'       => __('Description', 'hostim-core'),
			'type'        => Controls_Manager::TEXTAREA,
			'default'     => 'Install Applications Easy With cPanel',
		]);
		$repeater->add_control('btn_label', [
			'label'       => __('Button Label', 'hostim-core'),
			'type'        => Controls_Manager::TEXT,
			'default'     => 'Chat With Expert',
		]);
		$repeater->add_control('btn_url', [
			'label'       => __('Button URL', 'hostim-core'),
			'type'        => Controls_Manager::URL
		]);
		$repeater->add_control('block_image', [
			'label'       => __('Image', 'hostim-core'),
			'type'        => Controls_Manager::MEDIA,
		]);
		$repeater->add_control(
			'block_align',
			[
				'label' => esc_html__('Block Alignment', 'hostim-core'),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__('Left', 'hostim-core'),
						'icon' => 'eicon-text-align-left',
					],
					'right' => [
						'title' => esc_html__('Right', 'hostim-core'),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'left',
				'toggle' => true,
				
			]
		);
		$this->add_control('service_categories', [
			'label'       => __('Services Categories', 'hostim-core'),
			'type'        => Controls_Manager::REPEATER,
			'fields'      => $repeater->get_controls(),
			'title_field' => '{{{ select_cat }}}',
			
		]);
		$this->end_controls_section(); //End Query Filter


		/*=================== Carousel Settings =================== */
		$this->start_controls_section(
			'carousel_settings', [
				'label' => __( 'Carousel Settings', 'hostim-core' ),
				'condition' => [
					'layout' => [ '5', '6' ]
				]
			]
		);

		$this->add_control(
			'show_items_desktop', [
				'label'     => esc_html__( 'Display Items [Desktop]', 'hostim-core' ),
				'type'      => Controls_Manager::NUMBER,
				'default'	=> 3
			]
		);

		$this->add_control(
			'show_items_tablet', [
				'label'     => esc_html__( 'Display Items [Tablet]', 'hostim-core' ),
				'type'      => Controls_Manager::NUMBER,
				'default'	=> 2
			]
		);

		$this->add_control(
			'show_items_mobile', [
				'label'     => esc_html__( 'Display Items [Mobile]', 'hostim-core' ),
				'type'      => Controls_Manager::NUMBER,
				'default'	=> 1
			]
		);

		$this->add_control(
			'item_space',
			[
				'label' => __( 'Item Space', 'hostim-core' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
						'step' => 1,
					]
				],
				'default' => [
					'size' => 24,
				]
			]
		);

		$this->add_control(
			'carousel_autoplay', [
				'label' => __( 'Auto Play', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'True', 'hostim-core' ),
				'label_off' => __( 'False', 'hostim-core' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'carousel_loop', [
				'label' => __( 'Loop', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'True', 'hostim-core' ),
				'label_off' => __( 'False', 'hostim-core' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'slide_speed', [
				'label' => esc_html__( 'Slide Speed', 'hostim-core' ),
				'type' => Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 5000,
				'step' => 1,
				'default' => 500
			]
		);

		$this->end_controls_section(); //End Control Slider

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
				'separator' => 'after'
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(), [
				'name' => 'item_title_typo',
				'selector' => '{{WRAPPER}} .service_title__',
			]
		);

		$this->add_control(
			'item_title_color', [
				'label' => esc_html__( 'Text Color', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .service_title__' => 'color: {{VALUE}}'
				],
			]
		); //End Item Title

		//================ Description Options
		$this->add_control(
			'item_desc_options', [
				'label' => esc_html__( 'Description Options', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'after'
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(), [
				'name' => 'item_desc_typo',
				'selector' => '{{WRAPPER}} .service_desc__',
			]
		);

		$this->add_control(
			'item_desc_color', [
				'label' => esc_html__( 'Text Color', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .service_desc__' => 'color: {{VALUE}}'
				],
			]
		); //End Item Title

		//button style-----------------
		$this->add_control(
			'item_btn_options', [
				'label' => esc_html__( 'Button Options', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'after'
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(), [
				'name' => 'item_btn_typo',
				'selector' => '{{WRAPPER}} .service_btn__ '
			]
		);

		$this->add_control(
			'item_btn_color', [
				'label' => esc_html__( 'Text Color', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hm2-server-content .server-info .service_btn__ i.fa-solid.fa-plus' => 'color: {{VALUE}}',
					'{{WRAPPER}} .app-content .service_btn__' => 'color: {{VALUE}}',
					'{{WRAPPER}} a.fw-bold.explore.service_btn__' => 'color: {{VALUE}}',
					'{{WRAPPER}} a.fw-semibold.link-btn.service_btn__' => 'color: {{VALUE}}',
					'{{WRAPPER}} .service_btn__' => 'color: {{VALUE}}'
				],
			]
		); 
		$this->add_control(
			'item_btn_hover_color', [
				'label' => esc_html__( 'Text Hover Color', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hm2-server-content .server-info .service_btn__ i.fa-solid.fa-plus' => 'color: {{VALUE}}',
					'{{WRAPPER}} .app-content .service_btn__:hover' => 'color: {{VALUE}}'
				],
				'condition' => [
					'layout' => '3'
				],
			]
		);
		$this->add_control(
			'carusol_item_btn_hover_color', [
				'label' => esc_html__( 'Text Hover Color', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hm2-server-content .server-info .service_btn__ i.fa-solid.fa-plus' => 'color: {{VALUE}}',
					'{{WRAPPER}} .service_btn__:hover' => 'color: {{VALUE}}'
				],
				'condition' => [
					'layout' => '5'
				],
			]
		);
		//End Item Title

		

		

		$this->end_controls_section(); //End Service Section

		//Service Item
		$this->start_controls_section(
			'service_item_style',
			[
				'label' => esc_html__('item Style', 'hostim-core'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs(
			'service_item_tabs'
		);

		$this->start_controls_tab(
			'service_normal_tab',
			[
				'label' => esc_html__('Normal', 'hostim-core'),
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'label' => esc_html__('Border', 'hostim-core'),
				'selector' => '
					{{WRAPPER}} .hm2-server-tab-control li .tab_title_btn,
					{{WRAPPER}} .hm2-app-item,
					{{WRAPPER}} .h5-service-box,
					{{WRAPPER}} .hm9-apps-card
				',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'label' => esc_html__('Box Shadow', 'hostim-core'),
				'selector' => '
					{{WRAPPER}} .service-card,
					{{WRAPPER}} .hm2-app-item,
					{{WRAPPER}} .h5-service-box,
					{{WRAPPER}} .hm9-apps-card
				',
			]
		);

		$this->add_group_control(Group_Control_Background::get_type(), [
			'name' => 'item_bg',
			'label' => esc_html__('Background', 'hostim-core'),
			'types' => ['classic', 'gradient'],
			'selector' => '
				{{WRAPPER}} .service-card,
				{{WRAPPER}} .hm2-app-item,
				{{WRAPPER}} .h5-service-box,
				{{WRAPPER}} .hm9-apps-card
			',
		]);
		$this->end_controls_tab();
		
		$this->start_controls_tab(
			'service_hover_tab',
			[
				'label' => esc_html__('Hover', 'hostim-core'),
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'service_hover_border',
				'label' => esc_html__('Border', 'hostim-core'),
				'selector' => '
					{{WRAPPER}} .service-card:hover,
					{{WRAPPER}} .hm2-app-item:hover,
					{{WRAPPER}} .h5-service-box:hover,
					{{WRAPPER}} .hm9-apps-card
				',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'service_hover_box_shadow',
				'label' => esc_html__('Box Shadow', 'hostim-core'),
				'selector' => '
					{{WRAPPER}} .service-card:hover,
					{{WRAPPER}} .hm2-app-item:hover,
					{{WRAPPER}} .h5-service-box:hover,
					{{WRAPPER}} .hm9-apps-card
				',
			]
		);
		$this->add_group_control(Group_Control_Background::get_type(), [
			'name' => 'service_hover_item_bg',
			'label' => esc_html__('Background', 'hostim-core'),
			'types' => ['classic', 'gradient'],
			'selector' => '
				{{WRAPPER}} .service-card:hover,
				{{WRAPPER}} .hm2-app-item:hover,
				{{WRAPPER}} .h5-service-box:hover,
				{{WRAPPER}} .mn-about-feature-single:hover,
				{{WRAPPER}} .hm9-apps-card
			',
		]);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		
		$this->end_controls_section(); //End Service Item


		$this->start_controls_section( 'section_shape', [
			'label' => esc_html__( 'Shape Image', 'hostim-core' ),
			'tab'   => Controls_Manager::TAB_STYLE,
			'condition' => [
				'layout' => '3'
			]
		] );
		$this->add_control(
			'shape_img',
			[
				'label' => __( 'Shape Image', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,

			]
		);
		$this->end_controls_section();

		// Section background ==============================
		$this->start_controls_section( 'background_section', [
			'label' => __( 'Section Basckground', 'hostim-core' ),
			'tab'   => Controls_Manager::TAB_STYLE,
		] );

		$this->add_responsive_control( 'sec_margin', [
			'label'      => __( 'Margin', 'hostim-core' ),
			'type'       => Controls_Manager::DIMENSIONS,
			'size_units' => [ 'px', '%', 'em' ],
			'selectors'  => [
				'{{WRAPPER}} .hm2-applications' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				'{{WRAPPER}} .services-bottom' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				'{{WRAPPER}} .hosting-server' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				'{{WRAPPER}} .h5-services' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				'{{WRAPPER}} .hm9-apps-card' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
			],
		] );

		$this->add_responsive_control( 'sec_padding', [
			'label'      => __( 'Padding', 'hostim-core' ),
			'type'       => Controls_Manager::DIMENSIONS,
			'size_units' => [ 'px', '%', 'em' ],
			'selectors'  => [
				'{{WRAPPER}} .hm2-applications' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				'{{WRAPPER}} .services-bottom' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				'{{WRAPPER}} .hosting-server' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				'{{WRAPPER}} .h5-services' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				'{{WRAPPER}} .hm9-apps-card' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
			],
		] );
		$this->add_group_control( Group_Control_Background::get_type(), [
			'name' => 'background',
			'label' => esc_html__( 'Background', 'hostim-core' ),
			'types' => [ 'classic', 'gradient' ],
			'selector' => '
				{{WRAPPER}} .hm2-applications,
				{{WRAPPER}} .services-bottom,
				{{WRAPPER}} .hosting-server,
				{{WRAPPER}} .h5-services
			',
		] );

		$this->end_controls_section();

		// Dark Mode Background Control =================================
		$dark_mode = hostim_option('is_dark_mode', false);
		if ($dark_mode) {
			$this->start_controls_section('dark_bg_style', [
				'label' => __('Dark Mode Background', 'hostim-core'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]);

			$this->add_control(
				'service_item_dark_bg',
				[
					'label' => esc_html__('Service Item Background', 'hostim-core'),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);
			$this->add_group_control(Group_Control_Background::get_type(), [
				'name' => 'dark_mode_item_bg',
				'label' => esc_html__('Background', 'hostim-core'),
				'types' => ['classic', 'gradient'],
				'selector' => '
					[data-bs-theme=dark] {{WRAPPER}} .service-card,
					[data-bs-theme=dark] {{WRAPPER}} .hm2-app-item,
					[data-bs-theme=dark] {{WRAPPER}} .h5-service-box,
					[data-bs-theme=dark] {{WRAPPER}} .hm9-apps-card
				',
			]);

			$this->add_control(
				'service_dark_mode_bg',
				[
					'label' => esc_html__('Service Section Background', 'hostim-core'),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);
			$this->add_group_control(Group_Control_Background::get_type(), [
				'name' => 'dark_mode_background',
				'label' => esc_html__('Dark Mode Background', 'hostim-core'),
				'types' => ['classic', 'gradient'],
				'selector' => '
					[data-bs-theme=dark] {{WRAPPER}} .hm2-applications,
					[data-bs-theme=dark] {{WRAPPER}} .services-bottom,
					[data-bs-theme=dark] {{WRAPPER}} .hosting-server,
					[data-bs-theme=dark] {{WRAPPER}} .h5-services
				',
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

		$settings = $this->get_settings();
		extract( $settings );

		$desktop_items = !empty( $show_items_desktop ) ? $show_items_desktop : '1';
		$tablet_items  = !empty( $show_items_tablet ) ? $show_items_tablet : '1';

		$paged      = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
		$current_language = class_exists('Polylang') ? pll_current_language() : get_locale();
		$args       = array(
			'post_type'      => 'services',
			'paged'          => $paged,
			'order'          => !empty($settings['order']) ? $settings['order'] : '',
			'orderby'        => !empty($settings['order_by']) ? $settings['order_by'] : '',
			'posts_per_page' => !empty($settings['posts_per_page']) ? $settings['posts_per_page'] : '',
			'lang'           => $current_language,
		);

		$hostim_service = new \WP_Query( $args );


		require __DIR__ . '/templates/services/service-' . $layout . '.php';

	}

}
