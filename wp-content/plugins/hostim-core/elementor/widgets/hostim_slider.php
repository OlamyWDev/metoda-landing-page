<?php
namespace Hostim\Widgets;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\{Controls_Manager,
	Group_Control_Background,
	Group_Control_Box_Shadow,
	Widget_Base,
	Group_Control_Typography,
	Repeater,
	Utils};

class Hostim_slider extends Widget_Base {

	public function get_name() {
		return 'hostim-slider';
	}

	public function get_title() {
		return esc_html__( 'Hostim Slider', 'hostim-core' );
	}

	public function get_icon() {
		return 'eicon-post-slider';
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

		//==================== Select Layout ==========================//
		$this->start_controls_section(
			'select_layout', [
				'label' => __( 'Layout', 'hostim-core' ),
			]
		);

		$this->add_control(
			'layout', [
				'label'   => esc_html__( 'Layout', 'hostim-core' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'1' => esc_html__( '01: Slider', 'hostim-core' ),
					'2' => esc_html__( '02: Slider', 'hostim-core' ),
				],
				'default' => '1',
			]
		);

		$this->end_controls_section(); //End Layout




		//=================== Slider =====================//
		$this->start_controls_section( 'slider_controls_section', [
			'label' => esc_html__( 'Slider', 'hostim-core' ),
		] );


		// ==== Slider 01
		$slider1 = new Repeater();
		$slider1->add_control( 'slide_title', [
			'label'       => __( 'Title', 'hostim-core' ),
			'type'        => Controls_Manager::TEXTAREA,
			'default'     => __( 'Virtual Private Servers', 'hostim-core' )
		] );
		$slider1->add_control('heading_tag', [
			'label'   => esc_html__('Title Tag', 'hostim-core'),
			'type'    => Controls_Manager::SELECT,
			'options' => hostim_el_get_title_tag(),
			'default' => 'h1',
		]);

		$slider1->add_control( 'slide_subtitle', [
			'label'       => __( 'Sub Title', 'hostim-core' ),
			'type'        => Controls_Manager::TEXTAREA,
			'default'     => __( 'Managed VPS Hosting', 'hostim-core' ),
		] );

		$slider1->add_control( 'slide_desc', [
			'label'       => __( 'Short Description', 'hostim-core' ),
			'type'        => Controls_Manager::TEXTAREA,
			'description' => esc_html__( 'Use <mark> tag for colored text', 'hostim-core' ),
			'default'     => __( 'VPS Starter plan - Starting <mark>at $10.00/mo</mark>', 'hostim-core' ),
		] );

		$slider1->add_control( 'feature_list', [
			'label'       => __( 'Features', 'hostim-core' ),
			'type'        => Controls_Manager::TEXTAREA,
			'description' => esc_html__( 'Every feature item should be a new line', 'hostim-core' ),
			'default'     => __( 'Managed Performance, Security, & Updates
                Unhindered performance with your own server resources
                Expandable RAM & storage', 'hostim-core' ),
		] );

		$slider1->add_control( 'btn_label', [
			'label'       => __( 'Button Label', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => __( 'Buy VPS Hosting', 'hostim-core' )
		] );

		$slider1->add_control( 'btn_url', [
			'label'       => __( 'Button URL', 'hostim-core' ),
			'type'        => Controls_Manager::URL,
			'default'     => [
				'url'   => '#'
			]
		] );

		$slider1->add_control( 'feature_image', [
			'label'   => __( 'Feature Image', 'hostim-core' ),
			'type'    => Controls_Manager::MEDIA,
			'default' => [
				'url' => plugin_dir_url(__DIR__) . '/assets/images/slider/feature-image.png',
			]
		] );
		$slider1->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'slider_background',
				'label' => __( 'Background', 'hostim-core' ),
				'types' => [ 'classic', 'gradient', 'video'],
				'selector' => '{{WRAPPER}} {{CURRENT_ITEM}}',
			]
		);

		$this->add_control( 'hostim_slides', [
			'label'       => __( 'Slider Items', 'hostim-core' ),
			'type'        => Controls_Manager::REPEATER,
			'fields'      => $slider1->get_controls(),
			'title_field' => '{{{ slide_title }}}',
			'condition' => [
				'layout' => '1'
			]
		] ); //End Layout 01


		// ==== Slider 02
		$slider2 = new Repeater();
		$slider2->add_control( 'upper_title', [
			'label'       => __( 'Upper Title', 'hostim-core' ),
			'type'        => Controls_Manager::TEXTAREA,
			'default'     => __( 'We’re Hosting Company', 'hostim-core' ),
		] );

		$slider2->add_control( 'title', [
			'label'       => __( 'Title', 'hostim-core' ),
			'type'        => Controls_Manager::TEXTAREA,
			'default'     => __( 'Fast & Secure Best Web Hosting.', 'hostim-core' )
		] );

		$slider2->add_control('heading_tag2', [
			'label'   => esc_html__('Title Tag', 'hostim-core'),
			'type'    => Controls_Manager::SELECT,
			'options' => hostim_el_get_title_tag(),
			'default' => 'h1',
		]);

		$slider2->add_control( 'subtitle', [
			'label'       => __( 'Subtitle', 'hostim-core' ),
			'type'        => Controls_Manager::TEXTAREA,
		] );

		$slider2->add_control( 'btn_label', [
			'label'       => __( 'Button Label', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => __( 'Get Started', 'hostim-core' )
		] );

		$slider2->add_control( 'btn_url', [
			'label'       => __( 'Button URL', 'hostim-core' ),
			'type'        => Controls_Manager::URL,
			'default'     => [
				'url'   => '#'
			]
		] );

		$slider2->add_control( 'btn_label2', [
			'label'       => __( 'Button Label 02', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => __( 'Buy VPS Hosting', 'hostim-core' )
		] );

		$slider2->add_control( 'btn_url2', [
			'label'       => __( 'Button URL 02', 'hostim-core' ),
			'type'        => Controls_Manager::URL,
			'default'     => [
				'url'   => '#'
			]
		] );

		$slider2->add_control( 'slider_bg_img', [
			'label'       => __( 'Background Image', 'hostim-core' ),
			'type'        => Controls_Manager::MEDIA,
		] );
		$slider2->add_control(
			'show_shadow_bg',
			[
				'label' => esc_html__('Show Shadow Background', 'hostim-core'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__('Show', 'hostim-core'),
				'label_off' => esc_html__('Hide', 'hostim-core'),
				'return_value' => 'yes',
				'default' => 'yes',
				
			]
		);
		$slider2->add_control(
			'bg_1',
			[
				'label' => esc_html__('Background Gradient Color 1', 'hostim-core'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'show_shadow_bg' => 'yes'
				]
			]
		);
		$slider2->add_control(
			'bg_2',
			[
				'label' => esc_html__('Background Gradient Color 1', 'hostim-core'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
						'{{WRAPPER}} {{CURRENT_ITEM}}:before' => 'background-image: linear-gradient(85.83deg, {{bg_1.VALUE}} 43.12%, {{VALUE}} 53.17%, rgba(0, 14, 80, 0) 83.05%)',
				],
				'condition' => [
					'show_shadow_bg' => 'yes'
				]
			]
		);
		

		$this->add_control( 'slides2', [
			'label'       => __( 'Slider Items', 'hostim-core' ),
			'type'        => Controls_Manager::REPEATER,
			'fields'      => $slider2->get_controls(),
			'title_field' => '{{{ title }}}',
			'condition' => [
				'layout' => '2'
			]
		] ); //End Layout 02

		$this->end_controls_section(); //End Slider


		//======================== Social Icons ====================//
		$this->start_controls_section(
			'sec_social_icons', [
				'label' => __( 'Social Icons', 'hostim-core' ),
				'condition' => [
					'layout' => '2'
				]
			]
		);

		$this->add_control( 'social_icon_title', [
			'label'       => __( 'Title', 'hostim-core' ),
			'type' => \Elementor\Controls_Manager::TEXT,
			'label_block' => true,
			'default' => 'Follow on'
		] );

		$social_icon = new Repeater();
		$social_icon->add_control( 'icon', [
			'label'       => __( 'Icon', 'hostim-core' ),
			'type' => \Elementor\Controls_Manager::ICONS,
			'default' => [
				'value' => 'fab fa-facebook-f',
				'library' => 'fa-solid'
			],
		] );

		$social_icon->add_control( 'icon_url', [
			'label'       => __( 'Icon URL', 'hostim-core' ),
			'type'        => Controls_Manager::URL,
			'default'     => [
				'url'     => '#'
			]
		] );

		$this->add_control( 'social_icons', [
			'label'       => __( 'Add Icon', 'hostim-core' ),
			'type'        => Controls_Manager::REPEATER,
			'fields'      => $social_icon->get_controls(),
			'title_field' => '{{{ icon.value }}}',
		] ); //End Layout 02


		$this->end_controls_section(); //End Social Icons


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

		//======================= Style Title Section ========================//
		$this->start_controls_section(
			'style_title_sec', [
				'label' => esc_html__( 'Title', 'hostim-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		// Upper Title
		$this->add_control(
			'upper_title_heading', [
				'label' => esc_html__( 'Upper Title Options', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::HEADING,
			]
		);

		$this->add_control(
			'upper_title_color', [
				'label' => esc_html__( 'Text Color', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slide_subtitle' => 'color: {{VALUE}}',
					'{{WRAPPER}} .hm7-hero-content .hm7-hero-subtitle span svg path' => 'fill: {{VALUE}};stroke: {{VALUE}}'
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(), [
				'name' => 'upper_title_typo',
				'selector' => '{{WRAPPER}} .slide_subtitle',
			]
		);

		// Upper Title
		$this->add_control(
			'title_heading', [
				'label' => esc_html__( 'Title Options', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_control(
			'title_color', [
				'label' => esc_html__( 'Text Color', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .swiper-slide .slide_title' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(), [
				'name' => 'title_typo',
				'selector' => '{{WRAPPER}} .swiper-slide .slide_title',
			]
		);

		$this->end_controls_section(); //End Style Title Section


		//======================= Style Subtitle Section ========================//
		$this->start_controls_section(
			'style_subtitle_sec', [
				'label' => esc_html__( 'Subtitle', 'hostim-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				'condition' => [
					'layout' => '2'
				]
			]
		);

		$this->add_control(
			'subtitle_color', [
				'label' => esc_html__( 'Text Color', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .__subtitle' => 'color: {{VALUE}}'
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(), [
				'name' => 'subtitle_typo',
				'selector' => '{{WRAPPER}} .__subtitle',
			]
		);

		$this->end_controls_section(); //End Style Subtitle Section



		// ==================== Style Section Background ============================= //
		$this->start_controls_section( 'slider_style_section', [
			'label' => __( 'Section Background', 'hostim-core' ),
			'tab'   => Controls_Manager::TAB_STYLE,
		] );

		$this->add_responsive_control(
			'slider_margin',
			[
				'label' => __( 'Margin', 'hostim-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .vps-hero' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .hostim_sec' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
		$this->add_responsive_control(
			'slider_padding', [
				'label' => __( 'Padding', 'hostim-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .vps-hero' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .hostim_sec' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(), [
				'name' => 'section_background',
				'label' => __( 'Background', 'hostim-core' ),
				'types' => [ 'classic', 'gradient'],
				'selector' => '{{WRAPPER}} .hostim_slider, {{WRAPPER}} .hostim_sec',
			]
		);

		$this->end_controls_section(); //End Section Background

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

		$settings     = $this->get_settings_for_display();
		extract( $settings );

		//=============== Template Parts ================//
		require __DIR__ . '/templates/hero-slider/layout-'.$layout.'.php';

	}


}