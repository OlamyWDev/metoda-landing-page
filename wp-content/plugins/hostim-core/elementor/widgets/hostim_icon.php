<?php

namespace Hostim\Widgets;

defined( 'ABSPATH' ) || exit; // Abort, if called directly.

use Elementor\{Group_Control_Border,
	Group_Control_Box_Shadow,
	Widget_Base,
	Controls_Manager,
	Group_Control_Typography,
	Group_Control_Background,
	Utils,
};
use Elementor\Core\Kits\Documents\Tabs\Global_Colors;

class Hostim_icon extends Widget_Base {

	public function get_name() {
		return 'hostim-icon';
	}

	public function get_title() {
		return __( 'Hostim Icon', 'hostim-core' );
	}

	public function get_icon() {
		return 'eicon-favorite';
	}

	public function get_categories() {
		return [ 'hostim-elements' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'section_icon',
			[
				'label' => esc_html__( 'Icon', 'hostim-core' ),
			]
		);

		$this->add_control( 'layout', [
			'label'   => esc_html__( 'Icon Style', 'hostim-core' ),
			'type'    => Controls_Manager::SELECT,
			'default' => 1,
			'options' => [
				'1' => esc_html__( 'Style One', 'hostim-core' ),
				'2' => esc_html__( 'Style Two', 'hostim-core' ),
			],
		] );

		$this->add_control(
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

		$this->add_control(
			'link',
			[
				'label' => esc_html__( 'Link', 'hostim-core' ),
				'type' => Controls_Manager::URL,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => esc_html__( 'https://your-link.com', 'hostim-core' ),
			]
		);

		$this->add_responsive_control(
			'align',
			[
				'label' => esc_html__( 'Alignment', 'hostim-core' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'hostim-core' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'hostim-core' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'hostim-core' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .elementor-icon-wrapper' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_icon',
			[
				'label' => esc_html__( 'Icon', 'hostim-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs( 'icon_colors' );

		$this->start_controls_tab(
			'icon_colors_normal',
			[
				'label' => esc_html__( 'Normal', 'hostim-core' ),
			]
		);

		$this->add_control(
			'icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'hostim-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .elementor-icon-wrapper .elementor-icon i' => 'color: {{VALUE}};',
					'{{WRAPPER}} .elementor-icon-wrapper .elementor-icon svg' => 'fill: {{VALUE}};',
					'{{WRAPPER}} .wp_about_item .icon-wrapper i' => 'color: {{VALUE}};',
					'{{WRAPPER}} .wp_about_item .icon-wrapper svg' => 'fill: {{VALUE}};',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				],
			]
		);

		$this->add_control(
			'bg_color',
			[
				'label' => esc_html__( 'Background Color', 'hostim-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-icon-wrapper .elementor-icon' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .wp_about_item .icon-wrapper' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'gradient_color',
			[
				'label' => esc_html__( 'Background Gradient Color', 'hostim-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .elementor-icon-wrapper .elementor-icon' => 'background: linear-gradient(95.45deg, {{bg_color.VALUE}}, {{VALUE}} );',
					'{{WRAPPER}} .wp_about_item .icon-wrapper' => 'background: linear-gradient(95.45deg, {{bg_color.VALUE}}, {{VALUE}} );',
				],
			]
		);		

		$this->end_controls_tab();

		$this->start_controls_tab(
			'icon_colors_hover',
			[
				'label' => esc_html__( 'Hover', 'hostim-core' ),
			]
		);

		$this->add_control(
			'hover_primary_color',
			[
				'label' => esc_html__( 'Icon Color', 'hostim-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .elementor-icon-wrapper .elementor-icon:hover i' => 'color: {{VALUE}};',
					'{{WRAPPER}} .elementor-icon-wrapper .elementor-icon:hover svg' => 'fill: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'hover_secondary_color',
			[
				'label' => esc_html__( 'Background Color', 'hostim-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .elementor-icon-wrapper .elementor-icon:hover' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'hover_gradient_color',
			[
				'label' => esc_html__( 'Background Gradient Color', 'hostim-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .elementor-icon-wrapper .elementor-icon:hover' => 'background: linear-gradient(95.45deg, {{hover_secondary_color.VALUE}}, {{VALUE}} );',
				],
			]
		);		

		$this->add_control(
			'hover_animation',
			[
				'label' => esc_html__( 'Hover Animation', 'hostim-core' ),
				'type' => Controls_Manager::HOVER_ANIMATION,
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_responsive_control(
			'icon_size',
			[
				'label' => esc_html__( 'Size', 'hostim-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 6,
						'max' => 300,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->add_control(
			'icon_wrapper_area',
			[
				'label' => esc_html__( 'Wrapper Height Width', 'hostim-core' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 50,
				],
				'range' => [
					'px' => [
						'max' => 250,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-icon' => 'width: {{SIZE}}{{UNIT}}; height:{{SIZE}}{{UNIT}}',
				]
			]
		);

		$this->add_responsive_control(
			'rotate',
			[
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
					'{{WRAPPER}} .elementor-icon i, {{WRAPPER}} .elementor-icon svg' => 'transform: rotate({{SIZE}}{{UNIT}});',
				],
			]
		);

		$this->add_control(
			'icon_border_type',
			[
				'label' => _x( 'Border Type', 'Border Control', 'hostim-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'' => esc_html__( 'None', 'hostim-core' ),
					'solid' => _x( 'Solid', 'Border Control', 'hostim-core' ),
					'double' => _x( 'Double', 'Border Control', 'hostim-core' ),
					'dotted' => _x( 'Dotted', 'Border Control', 'hostim-core' ),
					'dashed' => _x( 'Dashed', 'Border Control', 'hostim-core' ),
					'groove' => _x( 'Groove', 'Border Control', 'hostim-core' ),
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-icon-wrapper .elementor-icon' => 'border-style: {{VALUE}};',
				],
				'condition' => [
					'layout' => '1'
				]
			]
		);

		$this->add_control(
			'border_width',
			[
				'label' => esc_html__( 'Border Width', 'hostim-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .elementor-icon-wrapper .elementor-icon' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',					
				],
				'condition' => [
					'layout' => '1'
				]
			]
		);

		$this->add_control(
			'second_layer_bg',
			[
				'label' => esc_html__( 'Second Layour Height Width', 'hostim-core' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 50,
				],
				'range' => [
					'px' => [
						'max' => 250,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .wp_about_item .icon-wrapper:before' => 'width: {{SIZE}}{{UNIT}}; height:{{SIZE}}{{UNIT}}',
				],
				'condition' => [
					'layout' => '2'
				]
			]
		);

		$this->add_control(
			'bg_2nd_layer',
			[
				'label' => esc_html__( 'Background Color', 'hostim-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .wp_about_item .icon-wrapper:before' => 'background: {{VALUE}};',
				],
				'condition' => [
					'layout' => '2'
				]
			]
		);
		$this->add_control(
			'icon_opacity',
			[
				'label' => esc_html__( 'Opacity', 'hostim-core' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => .5,
				],
				'range' => [
					'px' => [
						'max' => 1,
						'step' => 0.01,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .wp_about_item .icon-wrapper:before' => 'opacity: {{SIZE}};',
				],
				'condition' => [
					'layout' => '2'
				]
			]
		);

		$this->add_control(
			'border_color',
			[
				'label' => esc_html__( 'Border Color', 'hostim-core' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .elementor-icon-wrapper .elementor-icon' => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .elementor-icon-wrapper .elementor-icon, {{WRAPPER}}.elementor-view-default .elementor-icon' => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .elementor-icon-wrapper .elementor-icon, {{WRAPPER}}.elementor-view-default .elementor-icon svg' => 'border-color: {{VALUE}};',
				]
			]
		);

		$this->add_control(
			'border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'hostim-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .elementor-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'icon_box_shadow',
				'label' => esc_html__( 'Box Shadow', 'hostim-core' ),
				'selector' => '{{WRAPPER}} .elementor-icon-wrapper .elementor-icon',
			]
		);

		
		$this->end_controls_section();
	}

	/**
	 * Render icon widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		extract( $settings );

		$wrapper_class = $layout == '2' ? 'wp_about_item' : 'elementor-icon-wrapper';
		$inner_class = $layout == '2' ? 'icon-wrapper' : 'elementor-icon';
		

		$this->add_render_attribute( 'wrapper', 'class', $wrapper_class );
		
		$this->add_render_attribute( 'icon-wrapper', 'class', 'd-inline-flex align-items-center justify-content-center '. $inner_class );

		if ( ! empty( $settings['hover_animation'] ) ) {
			$this->add_render_attribute( 'icon-wrapper', 'class', 'elementor-animation-' . $settings['hover_animation'] );
		}

		$icon_tag = 'div';

		if ( ! empty( $settings['link']['url'] ) ) {
			$this->add_link_attributes( 'icon-wrapper', $settings['link'] );

			$icon_tag = 'a';
		}

		if ( empty( $settings['icon'] ) && ! \Elementor\Icons_Manager::is_migration_allowed() ) {
			// add old default
			$settings['icon'] = 'fa fa-star';
		}

		if ( ! empty( $settings['icon'] ) ) {
			$this->add_render_attribute( 'icon', 'class', $settings['icon'] );
			$this->add_render_attribute( 'icon', 'aria-hidden', 'true' );
		}

		$migrated = isset( $settings['__fa4_migrated']['selected_icon'] );
		$is_new = empty( $settings['icon'] ) && \Elementor\Icons_Manager::is_migration_allowed();

		?>
		<div <?php $this->print_render_attribute_string( 'wrapper' ); ?>>
			<<?php Utils::print_unescaped_internal_string( $icon_tag . ' ' . $this->get_render_attribute_string( 'icon-wrapper' ) ); ?>>
			<?php if ( $is_new || $migrated ) :
				\Elementor\Icons_Manager::render_icon( $settings['selected_icon'], [ 'aria-hidden' => 'true' ] );
			else : ?>
				<i <?php $this->print_render_attribute_string( 'icon' ); ?>></i>
			<?php endif; ?>
			</<?php Utils::print_unescaped_internal_string( $icon_tag ); ?>>
		</div>
		<?php
	}

	/**
	 * Render icon widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 2.9.0
	 * @access protected
	 */
	protected function content_template() {
		?>
		<# var link = settings.link.url ? 'href="' + settings.link.url + '"' : '',
				iconHTML = elementor.helpers.renderIcon( view, settings.selected_icon, { 'aria-hidden': true }, 'i' , 'object' ),
				migrated = elementor.helpers.isIconMigrated( settings, 'selected_icon' ),
				iconTag = link ? 'a' : 'div';
		#>
		<div class="elementor-icon-wrapper">
			<{{{ iconTag }}} class="elementor-icon elementor-animation-{{ settings.hover_animation }}" {{{ link }}}>
				<# if ( iconHTML && iconHTML.rendered && ( ! settings.icon || migrated ) ) { #>
					{{{ iconHTML.value }}}
				<# } else { #>
					<i class="{{ settings.icon }}" aria-hidden="true"></i>
				<# } #>
			</{{{ iconTag }}}>
		</div>
		<?php
	}
}
