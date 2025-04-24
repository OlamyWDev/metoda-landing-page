<?php

namespace Hostim\Section;

use Elementor\{Widget_Base,
	Controls_Manager,
	Group_Control_Border,
	Group_Control_Typography,
	Group_Control_Text_Shadow,
	Group_Control_Background,
	Frontend,
	Repeater,
	Plugin,
	Shapes
};

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Elementor Section
 *
 * @class        Hostim_Section
 * @version      1.0
 * @category Class
 * @author       ThemeTags
 */
class Hostim_Section {


	public $sections = [];

	public function __construct() {

		add_action( 'elementor/init', [ $this, 'add_hooks' ] );
	}

	public function add_hooks() {

		add_action( 'elementor/element/section/section_typo/after_section_end', [ $this, 'extened_animation' ], 10, 2 );

		add_action( 'elementor/frontend/section/before_render', [ $this, 'extened_row_render' ], 10, 1 );
		
		add_action( 'elementor/frontend/column/before_render', [ $this, 'extened_column_render' ], 10, 1 );

		add_action( 'elementor/frontend/before_enqueue_scripts', [ $this, 'enqueue_scripts' ] );

		add_action( 'elementor/element/wp-post/document_settings/after_section_end', [ $this, 'post_metaboxes' ], 10, 1 );

		$dark_mode = get_option('hostim_cs_options', false);
		
		if ($dark_mode && $dark_mode['is_dark_mode'] == '1') {
			
			add_action('elementor/element/after_section_end', function( $section, $section_id ) {

				if ('section_layout' === $section_id ) {
					#Start Custom Settings Section
					$section->start_controls_section(
						'dark_light_color_section',
						[
							'label' => __( 'Dark Mode Color', 'hostim-core' ),
							'tab' => \Elementor\Controls_Manager::TAB_ADVANCED,
						]
					);
					$section->add_control(
						'dark__bg',
						[
							'label' => esc_html__('Background', 'hostim-core'),
							'type' => \Elementor\Controls_Manager::HEADING,
							'separator' => 'before',
						]
					);
					$section->start_controls_tabs('darkmode_style_tabs');
					$section->start_controls_tab(
						'dark_style_normal_tab',
						[
							'label' => esc_html__('Normal',	'hostim-core'),
						]
					);
					$section->add_group_control(
						\Elementor\Group_Control_Background::get_type(),
						[
							'name' => 'dark_background',
							'types' => ['classic', 'gradient'],
							'selector' => '
								[data-bs-theme=dark] {{WRAPPER}}.e-parent,
								[data-bs-theme=dark] {{WRAPPER}}.e-child
							',
						]
					);
					$section->end_controls_tab();

					$section->start_controls_tab(
						'dark_style_hover_tab',
						[
							'label' => esc_html__('Hover',	'hostim-core'),
						]
					);
					$section->add_group_control(
						\Elementor\Group_Control_Background::get_type(),
						[
							'name' => 'hover_dark_background',
							'types' => ['classic', 'gradient'],
							'selector' => '
								[data-bs-theme=dark] {{WRAPPER}}.e-parent:hover,
								[data-bs-theme=dark] {{WRAPPER}}.e-child:hover
							',
						]
					);
					$section->end_controls_tab();
					$section->end_controls_tabs();

					$section->add_control(
						'dark_overlay_bg',
						[
							'label' => esc_html__('Background Overlay', 'hostim-core'),
							'type' => \Elementor\Controls_Manager::HEADING,
							'separator' => 'before',
						]
					);
					$section->start_controls_tabs('darkmode_overlay_style_tabs');
					$section->start_controls_tab(
						'darkmode_overlay_style_normal_tab',
						[
							'label' => esc_html__('Normal',	'hostim-core'),
						]
					);
					$section->add_group_control(
						\Elementor\Group_Control_Background::get_type(),
						[
							'name' => 'dark_overlay_background',
							'types' => ['classic', 'gradient'],
							'selector' => '
								[data-bs-theme=dark] {{WRAPPER}}::before
							',
						]
					);
					$section->add_control(
						'dark_overlay_opacity',
						[
							'label' => esc_html__('Opacity', 'hostim-core'),
							'type' => \Elementor\Controls_Manager::SLIDER,
							'selectors' => [
								'[data-bs-theme=dark] {{WRAPPER}}::before' => '--overlay-opacity: {{SIZE}};',
							],
						]
					);
					$section->end_controls_tab();

					$section->start_controls_tab(
						'dark_overlay_style_hover_tab',
						[
							'label' => esc_html__('Hover',	'hostim-core'),
						]
					);
					$section->add_group_control(
						\Elementor\Group_Control_Background::get_type(),
						[
							'name' => 'dark_hover_overlay_background',
							'types' => ['classic', 'gradient'],
							'selector' => '
								[data-bs-theme=dark] {{WRAPPER}}:hover::before
							',
						]
					);
					
					$section->end_controls_tab();
					$section->end_controls_tabs();

					$section->add_control(
						'dark_box_shadow_heading',
						[
							'label' => esc_html__('Box Shadow', 'hostim-core'),
							'type' => \Elementor\Controls_Manager::HEADING,
							'separator' => 'before',
						]
					);
					$section->add_group_control(
						\Elementor\Group_Control_Box_Shadow::get_type(),
						[
							'name' => 'dark_box_shadow',
							'selector' => '[data-bs-theme=dark] {{WRAPPER}}::before',
						]
					);
					$section->add_group_control(
						\Elementor\Group_Control_Css_Filter::get_type(),
						[
							'name' => 'dark_bg_css_filters',
							'selector' => '[data-bs-theme=dark] {{WRAPPER}}::before'
						]
					);
					$section->end_controls_section();
				}

				// Dark Mode Button ========
				if ('_section_style' === $section_id) {
					$section->start_controls_section(
						'dark_light_color_button',
						[
							'label' => __('Dark Mode Color', 'hostim-core'),
							'tab' => \Elementor\Controls_Manager::TAB_ADVANCED,
						]
					);
					$section->add_group_control(
						\Elementor\Group_Control_Background::get_type(),
						[
							'name' => 'dark_button_background',
							'types' => ['classic', 'gradient'],
							'selector' => '
								[data-bs-theme=dark] {{WRAPPER}}.elementor-widget-hostim-button .hostim-button-link, 
								[data-bs-theme=dark] {{WRAPPER}} > .elementor-widget-container
						',
						]
					);
					$section->end_controls_section();
				}
				

			}, 10, 2 );

			// add_action('elementor/frontend/section/before_render', function ($element) {
			// 	$v = (object)$element->get_settings_for_display();

			// });
		}

	}


	function post_metaboxes( $page ) {

		$page->start_controls_section( 'header_options', [
			'label' => esc_html__( 'Hostim Header Options', 'hostim-core' ),
			'tab'   => Controls_Manager::TAB_SETTINGS,
		] );

		$page->add_control( 'mobile_breakpoint', [
			'label'   => esc_html__( 'Mobile Header resolution breakpoint', 'hostim-core' ),
			'type'    => Controls_Manager::NUMBER,
			'step'    => 1,
			'min'     => 5,
			'max'     => 4000,
			'default' => 1200,
		] );

		$page->add_control( 'header_on_bg', [
			'label'        => esc_html__( 'Over content?', 'hostim-core' ),
			'description'  => esc_html__( 'Set Header to display over content.', 'hostim-core' ),
			'type'         => Controls_Manager::SWITCHER,
			'label_on'     => esc_html__( 'On', 'hostim-core' ),
			'label_off'    => esc_html__( 'Off', 'hostim-core' ),
			'return_value' => 'yes',
		] );

		$page->end_controls_section();


	}

	public function extened_row_render(\Elementor\Element_Base $element) {
		// $sec_settings = $element->get_settings_for_display();
		// if( $sec_settings['add_background_animation'] == 'yes' ){
		// 	echo '<div class="border_line border_line_container_' . $element->get_id() . '">';
		// 		foreach( $sec_settings['items_parallax'] as $parallax_item ){
		// 			echo '<div data-item-id="'. $parallax_item['_id'] . '" class="extended-parallax position-absolute elementor-repeater-item-' . $parallax_item['_id']. '">';
		// 			echo '<img src="'. $parallax_item['image_bg']['url'].'">';
		// 			echo '</div>';
		// 		}
		// 	echo '</div>';
		// }

	}

	public function extened_column_render(\Elementor\Element_Base $element) {
		echo '<div class="border_line border_line_column_' . $element->get_id() . '"></div>';		
	}

	public function enqueue_scripts() {

		wp_enqueue_script( 'tt-parallax', esc_url( TT_ELEMENTOR_ADDONS_URL . 'assets/js/tt_elementor_sections.js' ), [ 'jquery' ], false, true );

		wp_localize_script( 'tt-parallax', 'tt_parallax_settings', [
			$this->sections,
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
		] );


	}

	public function extened_animation( $widget, $args ) {

		$widget->start_controls_section( 'extened_shape', [
			'label' => esc_html__( 'Hostim Shape', 'hostim-core' ),
			'tab'   => Controls_Manager::TAB_STYLE,
		] );
		$widget->add_control( 'add_background_animation', [
			'label'        => esc_html__( 'Add Extended Background Animation?', 'hostim-core' ),
			'type'         => Controls_Manager::SWITCHER,
			'label_on'     => esc_html__( 'On', 'hostim-core' ),
			'label_off'    => esc_html__( 'Off', 'hostim-core' ),
			'return_value' => 'yes',
		] );

		$repeater = new Repeater();
		
		$repeater->add_control( 'image_bg', [
			'label'       => esc_html__( 'Parallax Image', 'hostim-core' ),
			'type'        => Controls_Manager::MEDIA,
			'label_block' => true,
			'default'     => [
				'url' => '',
			],
		] );

		$repeater->add_responsive_control( 'position_top', [
			'label'       => esc_html__( 'Top Offset', 'hostim-core' ),
			'type'        => Controls_Manager::SLIDER,
			'size_units'  => [ '%', 'px' ],
			'range'       => [
				'%'  => [ 'min' => - 100, 'max' => 100 ],
				'px' => [ 'min' => - 200, 'max' => 1000, 'step' => 5 ],
			],
			'default'     => [ 'size' => 0, 'unit' => '%' ],
			'description' => esc_html__( 'Set figure vertical offset from top border.', 'hostim-core' ),
			'selectors'   => [
				"{{WRAPPER}} {{CURRENT_ITEM}}" => 'top: {{SIZE}}{{UNIT}}',
			],
		] );

		$repeater->add_responsive_control( 'position_left', [
			'label'       => esc_html__( 'Left Offset', 'hostim-core' ),
			'type'        => Controls_Manager::SLIDER,
			'size_units'  => [ '%', 'px' ],
			'range'       => [
				'%'  => [
					'min' => - 100,
					'max' => 100,
				],
				'px' => [
					'min'  => - 200,
					'max'  => 1000,
					'step' => 5,
				],
			],
			'default'     => [
				'unit' => '%',
				'size' => 0,
			],
			'description' => esc_html__( 'Set figure horizontal offset from left border.', 'hostim-core' ),
			'selectors'   => [
				"{{WRAPPER}} {{CURRENT_ITEM}}" => 'left: {{SIZE}}{{UNIT}}',
			],
		] );

		$repeater->add_control( 'image_index', [
			'label'     => esc_html__( 'Image z-index', 'hostim-core' ),
			'type'      => Controls_Manager::NUMBER,
			'step'      => 1,
			'default'   => 0,
			'selectors' => [
				"{{WRAPPER}} {{CURRENT_ITEM}}" => 'z-index: {{UNIT}}',
			],
		] );

		$repeater->add_control( 'hide_on_mobile', [
			'label'        => esc_html__( 'Hide On Mobile?', 'hostim-core' ),
			'type'         => Controls_Manager::SWITCHER,
			'label_on'     => esc_html__( 'On', 'hostim-core' ),
			'label_off'    => esc_html__( 'Off', 'hostim-core' ),
			'return_value' => 'yes',
		] );
		$repeater->add_control( 'hide_mobile_resolution', [
			'label'     => esc_html__( 'Screen Resolution', 'hostim-core' ),
			'type'      => Controls_Manager::NUMBER,
			'step'      => 1,
			'default'   => 768,
			'condition' => [
				'hide_on_mobile' => 'yes',
			],
		] );

		$widget->add_control( 'items_parallax', [
			'label'     => esc_html__( 'Layers', 'hostim-core' ),
			'type'      => Controls_Manager::REPEATER,
			'fields'    => $repeater->get_controls(),
			'condition' => [
				'add_background_animation' => 'yes',
			],
		] );

		$widget->end_controls_section();


	}


}