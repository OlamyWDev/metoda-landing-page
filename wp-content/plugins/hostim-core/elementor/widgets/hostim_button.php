<?php

namespace Hostim\Widgets;

if (!defined('ABSPATH')) {
	exit;
}

use Elementor\{Group_Control_Box_Shadow, Widget_Base, Controls_Manager, Group_Control_Typography, Group_Control_Border};


class Hostim_Button extends Widget_Base
{

	/**
	 * Get widget name.
	 *
	 * Retrieve button widget name.
	 *
	 * @return string Widget name.
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function get_name()
	{
		return 'hostim-button';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve button widget title.
	 *
	 * @return string Widget title.
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function get_title()
	{
		return __('Hostim Button', 'hostim-core');
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve button widget icon.
	 *
	 * @return string Widget icon.
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function get_icon()
	{
		return 'eicon-button';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the icon box widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * @return array Widget categories.
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function get_categories()
	{
		return ['hostim-elements'];
	}

	/**
	 * Register button widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls()
	{
		$this->start_controls_section(
			'section_button',
			[
				'label' => __('Button', 'hostim-core'),
			]
		);
		$this->add_control(
			'button_style',
			[
				'label' => __('Button Style', 'hostim-core'),
				'type' => Controls_Manager::SELECT,
				'default' => 'primary',
				'options' => [
					'primary'	=> __('Primary', 'hostim-core'),
					'secondary' => __('Secondary', 'hostim-core'),
					'success' 	=> __('Success', 'hostim-core'),
					'danger' 	=> __('Danger', 'hostim-core'),
					'warning' 	=> __('Warning', 'hostim-core'),
					'info' 		=> __('Info', 'hostim-core'),
					'light' 	=> __('Light', 'hostim-core'),
					'dark' 		=> __('Dark', 'hostim-core'),
					'theme_primary' => __('Theme Primary', 'hostim-core'),
					'multi_color' => __('Multi Color', 'hostim-core'),
					'custom'	=> __('Custom', 'hostim-core'),
				],
			]
		);

		$this->add_control(
			'button_size',
			[
				'label'   => __('Size', 'hostim-core'),
				'type'	  => Controls_Manager::SELECT,
				'default' => 'btn-md',
				'options' => [
					'btn-xs' => __('Extra Small', 'hostim-core'),
					'btn-sm' => __('Small', 'hostim-core'),
					'btn-md' => __('Medium', 'hostim-core'),
					'btn-lg' => __('Large', 'hostim-core'),
					'btn-xl' => __('Extra Large', 'hostim-core')
				],
				'condition' => [
					'button_style!' => 'custom'
				]
			]
		);

		$this->add_control(
			'button_shape',
			[
				'label' => __('Shape', 'hostim-core'),
				'type' => Controls_Manager::SELECT,
				'default' => 'btn-round',
				'options' => [
					'btn-square' => __('Square', 'hostim-core'),
					'btn-round' => __('Round', 'hostim-core'),
					'btn-circle' => __('Circle', 'hostim-core')
				],
				'condition' => [
					'button_style!' => 'custom'
				]
			]
		);
		$this->add_control(
			'btn_outline',
			[
				'label' => __('Outline', 'hostim-core'),
				'type' => Controls_Manager::SELECT,
				'default' => 'default',
				'options' => [
					'default' => __('default', 'hostim-core'),
					'outline' => __('Ooutline', 'hostim-core'),
				],
				'condition' => [
					'button_style!' => 'custom'
				]
			]
		);

		$this->add_control(
			'btn_label',
			[
				'label' => __('Text', 'hostim-core'),
				'type' => Controls_Manager::TEXT,
				'default' => __('Learn More', 'hostim-core'),
				'placeholder' => __('Button Text', 'hostim-core'),
			]
		);

		$this->add_control(
			'btn_link',
			[
				'label' => __('Link', 'hostim-core'),
				'type' => Controls_Manager::URL,
				'placeholder' => 'http://your-link.com',
				'default' => [
					'url' => '#',
				],
			]
		);

		$this->add_control('selected_icon', [
			'label'     => __('Icon', 'hostim-core'),
			'type'      => Controls_Manager::ICONS,
			'default'   => [
				'value'   => 'fas fa-arrow-right',
				'library' => 'solid',
			],
		]);

		$this->add_control(
			'icon_align',
			[
				'label' => __('Icon Position', 'hostim-core'),
				'type' => Controls_Manager::SELECT,
				'default' => 'right',
				'options' => [
					'left' => __('Before', 'hostim-core'),
					'right' => __('After', 'hostim-core'),
				],
				'condition' => [
					'selected_icon!' => '',
				],
			]
		);

		$this->add_control(
			'icon_indent',
			[
				'label' => __('Icon Spacing', 'hostim-core'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 50,
					],
				],
				'condition' => [
					'selected_icon!' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .hostim-btn .elementor-align-icon-right' => 'margin-left: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .hostim-btn .elementor-align-icon-left' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'align',
			[
				'label' => __('Alignment', 'hostim-core'),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __('Left', 'hostim-core'),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __('Center', 'hostim-core'),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __('Right', 'hostim-core'),
						'icon' => 'fa fa-align-right',
					],
					'justify' => [
						'title' => __('Justified', 'hostim-core'),
						'icon' => 'fa fa-align-justify',
					],
				],
				'prefix_class' => 'elementor%s-align-',
				'default' => '',
			]
		);

		$this->add_control(
			'view',
			[
				'label' => __('View', 'hostim-core'),
				'type' => Controls_Manager::HIDDEN,
				'default' => 'traditional',
			]
		);

		$this->end_controls_section();

		// Style Section ==========================
		$this->start_controls_section(
			'section_style',
			[
				'label' => __('Button', 'hostim-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'typography',
				'label' => __('Typography', 'hostim-core'),
				'selector' => '{{WRAPPER}} .hostim-btn',
			]
		);

		$this->add_control(
			'border_radius',
			[
				'label' => __('Border Radius', 'hostim-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} a.hostim-btn, {{WRAPPER}} .hostim-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


		$this->add_control(
			'btn_padding',
			[
				'label' => __('Padding', 'hostim-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em', '%'],
				'selectors' => [
					'{{WRAPPER}} a.hostim-btn, {{WRAPPER}} .hostim-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


		$this->start_controls_tabs('tabs_button_style');

		$this->start_controls_tab(
			'tab_button_normal',
			[
				'label' => __('Normal', 'hostim-core'),
			]
		);

		$this->add_control(
			'button_text_color',
			[
				'label' => __('Color', 'hostim-core'),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} a.hostim-btn, {{WRAPPER}} .hostim-btn' => 'color: {{VALUE}};',
				],
			]
		);


		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background',
				'label' => esc_html__('Background', 'hostim-core'),
				'types' => ['classic', 'gradient'],
				'selector' => '{{WRAPPER}} .hostim-btn',
			]
		);

		$this->add_control(
			'3rd_gradient_heading',
			[
				'label' => __('3rd Gradient Background', 'hostim-core'),
				'type' => Controls_Manager::HEADING,
				'condition' => [
					'button_style' => 'multi_color'
				]
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background_gradient_3rd',
				'label' => esc_html__('3rd Gradient Background', 'hostim-core'),
				'types' => ['classic', 'gradient'],
				'selector' => '{{WRAPPER}} .hostim-btn:after',
				'condition' => [
					'button_style' => 'multi_color'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'label' => __('Border', 'hostim-core'),
				'selector' => '{{WRAPPER}} .hostim-btn',
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'label' => __('Box Shadow', 'hostim-core'),
				'selector' => '{{WRAPPER}} .hostim-btn',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_button_hover',
			[
				'label' => __('Hover', 'hostim-core'),
			]
		);

		$this->add_control(
			'hover_color',
			[
				'label' => __('Color', 'hostim-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hostim-btn:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'btn_hover_background',
				'label' => esc_html__('Background', 'hostim-core'),
				'types' => ['classic', 'gradient'],
				'selector' => '{{WRAPPER}} .hostim-btn:hover',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border_hover',
				'label' => __('Border', 'hostim-core'),
				'selector' => '{{WRAPPER}} .hostim-btn:hover'
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow_hover',
				'label' => __('Box Shadow', 'hostim-core'),
				'selector' => '{{WRAPPER}} .hostim-btn:hover',
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();
	}

	/**
	 * Render button widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render()
	{
		$settings = $this->get_settings_for_display();
		extract($settings);
		$btn_class = '';
		if ($button_style != 'custom') {
			$btn_outline_ = $btn_outline == 'outline' ? 'outline-' : '';
			$btn_class .= 'btn-' . $btn_outline_ . $button_style;
		}
		if ($button_style == 'theme_primary') {
			$btn_class .= 'template-btn primary-btn';
		}
		if ($button_style == 'multi_color') {
			$btn_class .= 'template-btn gm-primary-btn';
		}
		$btn_class .= !empty($button_size) ? ' ' . $button_size : '';

		if (!empty($settings['btn_link']['url'])) {
			$this->add_link_attributes('hostim_button', $settings['btn_link']);
			$this->add_render_attribute('hostim_button', 'class', 'hostim-button-link');
		}
		$this->add_render_attribute('hostim_button', 'class', 'btn hostim-btn '. esc_attr($btn_class)  );
?>
		<div class="hostim-btn-wrapper">
			<a <?php $this->print_render_attribute_string('hostim_button'); ?> >
				<?php $this->render_text(); ?>
			</a>
		</div>
	<?php
	}


	/**
	 * Render button text.
	 *
	 * Render button widget text.
	 *
	 * @since 1.5.0
	 * @access protected
	 */
	protected function render_text()
	{
		$settings = $this->get_settings();

		if (!empty($settings['selected_icon']) && $settings['icon_align'] == 'left') {
			if (!empty($settings['selected_icon'])) {
				\Elementor\Icons_Manager::render_icon($settings['selected_icon'], ['aria-hidden' => 'true']);
			}
		} ?>
		<span <?php echo $this->get_render_attribute_string('btn_label'); ?>><?php echo $settings['btn_label']; ?></span>
<?php
		if (!empty($settings['selected_icon']) && $settings['icon_align'] == 'right') {
			if (!empty($settings['selected_icon'])) {
				\Elementor\Icons_Manager::render_icon($settings['selected_icon'], ['aria-hidden' => 'true']);
			}
		}
	}
}
