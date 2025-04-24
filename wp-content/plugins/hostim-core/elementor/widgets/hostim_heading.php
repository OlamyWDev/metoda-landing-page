<?php

namespace Hostim\Widgets;

defined( 'ABSPATH' ) || exit; // Abort, if called directly.

use Elementor\{Group_Control_Box_Shadow,
	Utils,
	Widget_Base,
	Controls_Manager,
	Group_Control_Typography,
	Group_Control_Background};

class Hostim_Heading extends Widget_Base {

	public function get_name() {
		return 'hostim-heading';
	}

	public function get_title() {
		return esc_html__( 'Hostim Heading', 'hostim-core' );
	}

	public function get_icon() {
		return 'eicon-heading';
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


        $this->start_controls_section( 'heading_section', [
			'label' => esc_html__( 'Heading', 'hostim-core' ),
		] );

		$this->add_control( 'heading', [
			'label'       => esc_html__( 'Heading Text', 'hostim-core' ),
			'type'        => Controls_Manager::TEXTAREA,
			'description' => esc_html__( 'Use <mark>tag</mark> for text gradient color ', 'hostim-core' ),
			'label_block' => true,
			'default'     => '<mark>Discover</mark> all Our Web Hosting Features',

		] );

		$this->add_control(
			'heading_tag', [
				'label' => __( 'HTML Tag', 'hostim-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => hostim_el_get_title_tag(),
				'default' => 'h2',
			]
		);

		$this->add_responsive_control(
			'heading_align', [
				'label' => __( 'Alignment', 'hostim-core' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'hostim-core' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'hostim-core' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'hostim-core' ),
						'icon' => 'eicon-text-align-right',
					],
					'justify' => [
						'title' => __( 'Justified', 'hostim-core' ),
						'icon' => 'eicon-text-align-justify',
					],
				],
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .hm2-section-title' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

    }


	/**
	 * Name: elementor_style_control()
	 * Desc: Register style content
	 * Params: no params
	 * Return: @void
	 * Since: @1.6.0
	 * Package: @hostim
	 * Author: Themetags
	 */
	public function elementor_style_control() {


		$this->start_controls_section( 'section_title_style', [
			'label' => esc_html__( 'Title', 'hostim-core' ),
			'tab'   => Controls_Manager::TAB_STYLE,
		] );

		$this->add_control( 'title_color_one', [
			'label'     => esc_html__( 'Title color', 'hostim-core' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .hm2-section-title .hostim_heading' => 'color: {{VALUE}};'
			],
		] );

		$this->add_group_control( Group_Control_Typography::get_type(), [
			'name'     => 'title_typography',
			'selector' => '{{WRAPPER}} .hm2-section-title .hostim_heading',
		] );

		$this->add_control(
			'text_writing_mod', [
				'label' => esc_html__( 'Writing Mode', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'horizontal-tb',
				'options' => [
					'horizontal-tb' => esc_html__( 'Horizontal', 'hostim-core' ),
					'vertical-lr' => esc_html__( 'Vertical', 'hostim-core' ),
				],
				'selectors' => [
					'{{WRAPPER}} .hostim_heading' => 'writing-mode: {{VALUE}};',
				],
                'separator' => 'before'
			]
		);

		$this->add_responsive_control(
			'text_rotate', [
				'label' => esc_html__( 'Rotate', 'hostim-core' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'deg' ],
				'default' => [
					'size' => 0,
					'unit' => 'deg',
				],
				'tablet_default' => [
					'unit' => 'deg',
				],
				'mobile_default' => [
					'unit' => 'deg',
				],
				'selectors' => [
					'{{WRAPPER}} .hostim_heading' => 'transform: rotate({{SIZE}}{{UNIT}});',
				],
			]
		);

		$this->end_controls_section(); //End Title

		// Marked text Style
		$this->start_controls_section( 'mark_text_sec', [
			'label' => esc_html__( 'Highlighted Text', 'hostim-core' ),
			'tab'   => Controls_Manager::TAB_STYLE,
		] );

		$this->add_group_control( Group_Control_Typography::get_type(), [
			'name'     => 'marked_text_typography',
			'selector' => '{{WRAPPER}} .hm2-section-title .hostim_heading mark',
		] );

		$this->add_group_control(
			\Elementor\Group_Control_Text_Stroke::get_type(),
			[
				'name' => 'highlighted_text_stroke',
				'selector' => '{{WRAPPER}} .hostim_heading mark',
			]
		);

		$this->add_control( 'marked_color', [
			'label'     => esc_html__( 'Color', 'hostim-core' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .hostim_heading mark' => 'color: {{VALUE}};',
			],
		] );
		$this->add_control(
			'heading_text_gradient',
			[
				'label' => esc_html__( 'Enable Gradient Color', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'hostim-core' ),
				'label_off' => esc_html__( 'Hide', 'hostim-core' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background',
				'types' => [ 'classic', 'gradient'],
				'selector' => '{{WRAPPER}} .hostim_heading mark',
				'condition' => [
					'heading_text_gradient' => 'yes',
				]
			]
		);

		$this->add_group_control( Group_Control_Background::get_type(), array(
			'name'           => 'heading_color_gradient',
			'types'          => [ 'classic' ],
            'exclude'        => ['color'],
			'selector'       => '{{WRAPPER}} .hostim_heading mark, {{WRAPPER}} .hostim_heading mark::after',
		) );

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
		?>
		<div class="hm2-section-title">
			<?php 
			echo '<'. $heading_tag .' class="hm2-title hostim_heading">'. hostim_kses_post( nl2br( $heading ) ) .'</'. $heading_tag .'>';
			?>
		</div>

		<?php
	}


}



