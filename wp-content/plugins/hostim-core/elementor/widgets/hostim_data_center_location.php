<?php

namespace Hostim\Widgets;

defined( 'ABSPATH' ) || exit; // Abort, if called directly.

use Elementor\{Group_Control_Box_Shadow,
	Utils,
	Widget_Base,
	Controls_Manager,
	Group_Control_Typography,
	Group_Control_Background};

class Hostim_Data_Center_Location extends Widget_Base {

	public function get_name() {
		return 'hostim-data-center-location';
	}

	public function get_title() {
		return esc_html__( 'Hostim Data Center Location', 'hostim-core' );
	}

	public function get_icon() {
		return 'eicon-map-pin';
	}

	public function get_script_depends() {
		return [ 'isotop' ];
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
		//====================== Layout  =====================//
		$this->start_controls_section( 'section_hero', [
			'label' => __( 'Select Layout', 'hostim-core' ),
		] );

		// =====================
		$this->add_control( 'layout', [
			'label'   => esc_html__( 'Layout', 'hostim-core' ),
			'type'    => Controls_Manager::SELECT,
			'options' => [
				'1' => esc_html__( '01: Text Location', 'hostim-core' ),
				'2' => esc_html__( '02: Icon Location', 'hostim-core' ),
				'3' => esc_html__( '03: Text Hover', 'hostim-core' ),
				'4' => esc_html__( '04: Tab Location', 'hostim-core' ),
			],
			'default' => '1',
		] );

		$this->end_controls_section(); //End Layout


		//====================== Map Location ====================//
		$this->start_controls_section( 'data_center_location', [
			'label' => esc_html__( 'Map Location', 'hostim-core' ),
			'condition' => [
				'layout' => [ '1', '2', '3' ]
			]
		] );

		$this->add_control( 'map_img', [
			'label'       => esc_html__( 'Map Image', 'hostim-core' ),
			'type'        => Controls_Manager::MEDIA,
			'label_block' => true,
			'default'     => [
				'url' => plugin_dir_url( __DIR__ ) . 'assets/images/map.png'
			]
		] );

		$this->add_control(
			'map_locations_heading', [
				'label' => __( 'Map Locations', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		/*======================= Shape Images ============================*/
		$shapes = new \Elementor\Repeater();
		$shapes->add_control(
			'location_name', [
				'label' => __( 'Location Name', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'New York', 'hostim-core' )
			]
		);
		$shapes->add_responsive_control(
			'horizontal_position', [
				'label' => __( 'Horizontal Position', 'hostim-core' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1920,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 50,
				],
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}}' => 'left: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$shapes->add_responsive_control(
			'vertical_position', [
				'label' => __( 'Vertical Position', 'hostim-core' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1920,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 50,
				],
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}}' => 'top: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'locations', [
				'label' => __( 'Locations', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $shapes->get_controls(),
				'title_field' => '{{{ location_name }}}',
			]
		);

		$this->end_controls_section(); //End Map Location


		//====================== Map Location ====================//
		$this->start_controls_section( 'tab_locations', [
			'label' => esc_html__( 'Tab Location', 'hostim-core' ),
			'condition' => [
				'layout' => [ '4' ]
			]
		] );

		$this->add_control(
			'all_label', [
				'label' => __( 'Continents Name', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'All Location', 'hostim-core' ),
				'separator' => 'after'
			]
		);

		$tab_data = new \Elementor\Repeater();
		$tab_data->add_control(
			'country_flag', [
				'label' => __( 'Country Flag', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);

		$tab_data->add_control(
			'map_img', [
				'label' => __( 'Map Image', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);

		$tab_data->add_control(
			'continents_name', [
				'label' => __( 'Continents Name', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Australia', 'hostim-core' )
			]
		);

		$tab_data->add_control(
			'country_name', [
				'label' => __( 'Country Name', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'San Francisco', 'hostim-core' )
			]
		);

		$tab_data->add_control(
			'contents', [
				'label' => __( 'Contents', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
			]
		);

		$tab_data->add_control(
			'btn_label', [
				'label' => __( 'Button Label', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Download Test', 'hostim-core' )
			]
		);

		$tab_data->add_control(
			'btn_url', [
				'label' => __( 'Button URL', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::URL,
				'default' => [
					'url' => '#'
				]
			]
		);

		$tab_data->add_control(
			'ip_address', [
				'label' => __( 'IP Address', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => '<span>IP Address:</span> 173.230.149.42'
			]
		);

		$this->add_control(
			'locations4', [
				'label' => __( 'Locations', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $tab_data->get_controls(),
				'title_field' => '{{{ continents_name }}}',
			]
		);

		$this->end_controls_section(); //End Map Locations
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


		//=========================== Style Location Tab =========================//
		$this->start_controls_section(
			'style_tab_location', [
				'label' => esc_html__( 'Tab Locations', 'hostim-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				'condition' => [
					'layout' => '4'
				]
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(), [
				'name' => 'tab_location_type',
				'selector' => '{{WRAPPER}} .data-center-filter-btns button',
			]
		);

		$this->add_control(
			'tab_location_color', [
				'label' => esc_html__( 'Text Color', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .data-center-filter-btns button' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'tab_location_border_color', [
				'label' => esc_html__( 'Active Border Bottom Color', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .data-center-filter-btns button::before' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section(); //End Locations Tabs n


		//=========================== Style Locations =========================//
		$this->start_controls_section(
			'style_locations', [
				'label' => esc_html__( 'Locations', 'hostim-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				'condition' => [
					'layout' => '3'
				]
			]
		);

		//======== Name Options
		$this->add_control(
			'location_name_options', [
				'label' => esc_html__( 'Name Options', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(), [
				'name' => 'location_name_type',
				'selector' => '{{WRAPPER}} .__location_name',
			]
		);

		$this->add_control(
			'location_name_color', [
				'label' => esc_html__( 'Text Color', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .__location_name' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'location_name_bg_color', [
				'label' => esc_html__( 'Background Color', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .__location_name' => 'background: {{VALUE}}',
					'{{WRAPPER}} .__location_name::after' => 'background: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'location_pointer_color', [
				'label' => esc_html__( 'Pointer Color', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .data-center-pointer i' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'location_pointer_size',
			[
				'label' => esc_html__( 'Pointer Size', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 50,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .data-center-pointer i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section(); //End Locations


		//=========================== Style Locations =========================//
		$this->start_controls_section(
			'style_locations4', [
				'label' => esc_html__( 'Locations', 'hostim-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				'condition' => [
					'layout' => '4'
				]
			]
		);

		//======== Continents Name Options
		$this->add_control(
			'continents_name_options', [
				'label' => esc_html__( 'Continents Name Options', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(), [
				'name' => 'continents_name_type',
				'selector' => '{{WRAPPER}} .__continents_name',
			]
		);

		$this->add_control(
			'continents_name_color', [
				'label' => esc_html__( 'Text Color', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .__continents_name' => 'color: {{VALUE}}',
				],
			]
		);

		//======== Country Name Options
		$this->add_control(
			'country_name_options', [
				'label' => esc_html__( 'Country Name Options', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(), [
				'name' => 'country_name_type',
				'selector' => '{{WRAPPER}} .__country_name',
			]
		);

		$this->add_control(
			'country_name_color', [
				'label' => esc_html__( 'Text Color', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .__country_name' => 'color: {{VALUE}}',
				],
			]
		);

		//======== Contents Options
		$this->add_control(
			'contents_options', [
				'label' => esc_html__( 'Contents Options', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(), [
				'name' => 'contents_type',
				'selector' => '{{WRAPPER}} .__contents',
			]
		);

		$this->add_control(
			'contents_color', [
				'label' => esc_html__( 'Text Color', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .__contents' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section(); // End Locations



		//=========================== Style Button =========================//
		$this->start_controls_section(
			'style_button', [
				'label' => esc_html__( 'Button', 'hostim-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				'condition' => [
					'layout' => '4'
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
				],
			]
		);

		$this->add_control(
			'normal_btn_border_color', [
				'label' => esc_html__( 'Border Color', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .__btn' => 'border-color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(), [
				'name' => 'normal_btn_bg_color',
				'label' => __( 'Background', 'hostim-core' ),
				'types' => [ 'classic', 'gradient' ],
				'exclude' => [ 'image' ],
				'selector' => '{{WRAPPER}} .__btn',
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
				],
			]
		);

		$this->add_control(
			'hover_btn_border_color', [
				'label' => esc_html__( 'Border Color', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .__btn:hover' => 'border-color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(), [
				'name' => 'hover_btn_bg_color',
				'label' => __( 'Background', 'hostim-core' ),
				'types' => [ 'classic', 'gradient' ],
				'exclude' => [ 'image' ],
				'selector' => '{{WRAPPER}} .__btn:hover',
			]
		);

		$this->end_controls_tab(); //Normal Color

		$this->end_controls_tab();
		$this->end_controls_tabs();

		$this->end_controls_section();//End Button

		//======================== Section Background ======================//
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
					'{{WRAPPER}} .data-center' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .data-center' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(), [
				'name' => 'sec_background',
				'label' => esc_html__( 'Background', 'plugin-name' ),
				'types' => [ 'classic', 'gradient'],
				'selector' => '{{WRAPPER}} .data-center',
			]
		);

		$this->end_controls_section();//Section Background
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


        //================== Template Parts ================//
        include "templates/locations/layout-{$settings['layout']}.php";

	}


}
