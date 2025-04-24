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


class Hostim_logo_carousel extends Widget_Base {

	public function get_name() {
		return 'hostim-logo-carousel';
	}

	public function get_title() {
		return __( 'Hostim Logo Carousel', 'hostim-core' );
	}

	public function get_icon() {
		return 'eicon-carousel';
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


        //====================== Select Layout ===========================//
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
			],
			'default' => '1',
		] );

		$this->end_controls_section(); //End Layout


		//=============================== Section Title ============================//
		$this->start_controls_section(
			'sec_title', [
				'label' => esc_html__( 'Content', 'hostim-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
				'condition' => [
					'layout' => '2'
				]
			]
		);

		$this->add_control(
			'title', [
				'label' => esc_html__( 'Title', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Choice popular operating systems', 'hostim-core' ),
			]
		);

		$this->end_controls_section(); //End Section Title



		$this->start_controls_section( 'hostim_logo_carousel_sec', [
			'label' => __( 'Logo Carousel', 'hostim-core' ),
		] );


		//==========  Layout 01
		$repeater = new \Elementor\Repeater();
		$repeater->add_control( 'title', [
			'label'       => __( 'Title', 'hostim-core' ),
			'type'        => Controls_Manager::TEXTAREA,
			'default'	  => __('WordPress', 'hostim-core')
		] );

		$repeater->add_control( 'icon_img', [
			'label'   => __( 'Choose Image', 'hostim-core' ),
			'type'    => Controls_Manager::MEDIA,
			'default' => [
				'url' => plugin_dir_url( __DIR__ ) . 'assets/images/hero/star-5.svg'
			],

		] );

		$repeater->add_control('item_url', [
			'label'       => __('URL', 'hostim-core'),
			'type'        => Controls_Manager::URL,
		]);

		$this->add_control( 'logo_carousel', [
			'label'       => __( 'Carousel Item', 'hostim-core' ),
			'type'        => \Elementor\Controls_Manager::REPEATER,
			'fields'      => $repeater->get_controls(),
			'default'     => [
				[
					'title'		=> __( 'WordPress', 'hostim-core' ),
					'icon_img'	=> [
						'url' 	=> plugin_dir_url( __DIR__ ) . 'assets/images/hero/star-5.svg'
					]
				],
			],
			'title_field' => '{{{ title }}}',
			'condition' => [
				'layout' => ['1', '3']
			]
		] ); //End Layout 01


		//==========  Layout 02
		$client_logo2 = new \Elementor\Repeater();
		$client_logo2->add_control( 'align_items', [
			'type'        => Controls_Manager::HIDDEN,
		] );

		$client_logo2->add_control( 'logo', [
			'label'   => __( 'Choose Image', 'hostim-core' ),
			'type'    => Controls_Manager::MEDIA,
		] );
		$client_logo2->add_control('logo_url', [
			'label'       => __('URL', 'hostim-core'),
			'type'        => Controls_Manager::URL,
		]);

		$this->add_control( 'logo_carousel2', [
			'label'       => __( 'Add Item', 'hostim-core' ),
			'type'        => \Elementor\Controls_Manager::REPEATER,
			'fields'      => $client_logo2->get_controls(),
			'title_field' => '{{{ align_items }}}',
			'condition' => [
				'layout' => '2'
			]
		] ); //End Layout 01


		$this->end_controls_section();

		/* Carousel Settings =================== */
		$this->start_controls_section(
			'carousel_settings', [
				'label' => __( 'Carousel Settings', 'hostim-core' ),
			]
		);
		$this->add_control(
			'show_items_desktop', [
				'label'     => esc_html__( 'Display Items [Desktop]', 'hostim-core' ),
				'type'      => Controls_Manager::NUMBER,
				'default'   => 2
			]
		);
		$this->add_control(
			'show_items_tablet', [
				'label'     => esc_html__( 'Display Items [Tablet]', 'hostim-core' ),
				'type'      => Controls_Manager::NUMBER,
				'default'   => 2
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
			'item_space', [
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
			'slide_delay',
			[
				'label' => esc_html__('Slide Delay', 'hostim-core'),
				'type' => Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 10000,
				'step' => 1,
				'default' => 5000
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
		$this->add_control(
			'is_navigation', [
				'label' => esc_html__( 'Navigation', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'hostim-core' ),
				'label_off' => esc_html__( 'Hide', 'hostim-core' ),
				'return_value' => 'yes',
				'default' => 'yes',
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

		// Style Section ======================
		$this->start_controls_section( 'style_title', [
			'label' => __( 'Heading', 'hostim-core' ),
			'tab'   => Controls_Manager::TAB_STYLE,
		] );

		$this->add_control(
			'heading_margin',
			[
				'label' => esc_html__( 'Margin', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .vps-script-item h6' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);

		$this->add_group_control( Group_Control_Typography::get_type(), [
			'name'     => 'heading_typo',
			'label'    => __( 'Typography', 'hostim-core' ),
			'selector' => '{{WRAPPER}} .vps-script-item h6',
		] );

		$this->add_control( 'heading_color', [
			'label'     => __( 'Color', 'hostim-core' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => '',
			'selectors' => [
				'{{WRAPPER}} .vps-script-item h6' => 'color: {{VALUE}};'
			],
		] );

		$this->add_responsive_control(
			'item_padding',
			[
				'label' => esc_html__( 'Item Padding', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .vps-script-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
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
					'{{WRAPPER}} .vps_scripts_slider_wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
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
					'{{WRAPPER}} .vps_scripts_slider_wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'sec_background',
				'label' => esc_html__( 'Background', 'plugin-name' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .vps_scripts_slider_wrapper',
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
		$settings = $this->get_settings_for_display();
		extract( $settings );
		
		$desktop_items = !empty($show_items_desktop) ? $show_items_desktop : '3';
		$tablet_items  = !empty($show_items_tablet) ? $show_items_tablet : '2';

        //================ Template Parts ========================//
        include "templates/client-logos/client-logo-{$layout}.php";

	}
}
