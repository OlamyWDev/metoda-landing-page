<?php

namespace Hostim\Widgets;

defined('ABSPATH') || exit; // Abort, if called directly.

use Elementor\{
	Group_Control_Box_Shadow,
	Utils,
	Widget_Base,
	Controls_Manager,
	Group_Control_Typography,
	Group_Control_Background
};

class Hostim_Countdown extends Widget_Base
{

	public function get_name()
	{
		return 'hostim-countdown';
	}

	public function get_title()
	{
		return esc_html__('Hostim Countdown', 'hostim-core');
	}

	public function get_icon()
	{
		return 'eicon-countdown';
	}

	public function get_script_depends()
	{
		return ['countdown'];
	}

	public function get_categories()
	{
		return ['hostim-elements'];
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
	protected function register_controls()
	{
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
	public function elementor_content_control()
	{


		$this->start_controls_section('countdown_section', [
			'label' => esc_html__('Countdown', 'hostim-core'),
		]);

		$this->add_control(
			'countdown_date',
			[
				'label' => esc_html__('Countdown Date', 'hostim-core'),
				'type' => Controls_Manager::DATE_TIME,
			]
		);

		$this->add_control('count_days', [
			'label'       => esc_html__('Day label', 'hostim-core'),
			'type'        => Controls_Manager::TEXT,
			'default'     => __('Day', 'hostim-core')
		]);
		$this->add_control('count_hours', [
			'label'       => esc_html__('Hour label', 'hostim-core'),
			'type'        => Controls_Manager::TEXT,
			'default'     => __('Hour', 'hostim-core')
		]);
		$this->add_control('count_min', [
			'label'       => esc_html__('Minutes label', 'hostim-core'),
			'type'        => Controls_Manager::TEXT,
			'default'     => __('Minutes', 'hostim-core')
		]);
		$this->add_control('count_sec', [
			'label'       => esc_html__('Second label', 'hostim-core'),
			'type'        => Controls_Manager::TEXT,
			'default'     => __('Sec', 'hostim-core')
		]);
		$this->add_responsive_control(
			'countdown_align',
			[
				'label' => __('Alignment', 'hostim-core'),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'start' => [
						'title' => __('Left', 'hostim-core'),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __('Center', 'hostim-core'),
						'icon' => 'eicon-text-align-center',
					],
					'end' => [
						'title' => __('Right', 'hostim-core'),
						'icon' => 'eicon-text-align-right',
					],
					'space-between' => [
						'title' => __('Space Between', 'hostim-core'),
						'icon' => 'eicon-text-align-justify',
					],
				],
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .sp-downcount-timer' => 'justify-content: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();


		$this->start_controls_section('countdown_sec_style', [
			'label' => __('Countdown Style', 'hostim-core'),
			'tab'   => Controls_Manager::TAB_STYLE,
		]);

		$this->add_responsive_control(
			'item_border_radius',
			[
				'label' => esc_html__('Border Radius', 'hostim-core'),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em', 'rem', 'custom'],
				'selectors' => [
					'{{WRAPPER}} .sp-downcount-timer li .box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control('countdown_item_color', [
			'label'     => __('Item Color', 'hostim-core'),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .sp-downcount-timer li .box' => 'color: {{VALUE}}',
			],
		]);
		$this->add_group_control(Group_Control_Typography::get_type(), [
			'name'     => 'countdown_item_typography',
			'label'    => __('Typography', 'hostim-core'),
			'selector' => '{{WRAPPER}} .sp-downcount-timer li .box, {{WRAPPER}} .sp-downcount-timer li.item_separator',
		]);
		$this->add_group_control(Group_Control_Background::get_type(), [
			'name' => 'cd_item_background',
			'label' => esc_html__('Background', 'hostim-core'),
			'types' => ['classic', 'gradient'],
			'selector' => '{{WRAPPER}} .sp-downcount-timer li .box',
		]);


		$this->add_control(
			'label_options',
			[
				'label' => esc_html__('Label Options', 'hostim-core'),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control('countdown_label_color', [
			'label'     => __('Label Color', 'hostim-core'),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .sp-downcount-timer li .subtitle, {{WRAPPER}} .sp-downcount-timer li.item_separator' => 'color: {{VALUE}}',
			],
		]);
		$this->add_group_control(Group_Control_Typography::get_type(), [
			'name'     => 'countdown_label_typography',
			'label'    => __('Typography', 'hostim-core'),
			'selector' => '{{WRAPPER}} .sp-downcount-timer li .subtitle',
		]);

		$this->add_responsive_control(
			'item_gap',
			[
				'label' => esc_html__('Item Gap', 'hostim-core'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['px', '%', 'em', 'rem', 'custom'],
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
					'unit' => 'px',
					'size' => 16,
				],
				'selectors' => [
					'{{WRAPPER}} .sp-downcount-timer' => 'gap: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'separator',
			[
				'label' => __('Time Separator', 'hostim-core'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __('True', 'hostim-core'),
				'label_off' => __('False', 'hostim-core'),
				'return_value' => 'yes',
				'default' => 'no',
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
	public function elementor_style_control()
	{
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
	protected function render()
	{
		$settings = $this->get_settings_for_display();
		extract($settings);

		if (!empty($countdown_date)) {
			$separator = $separator == 'yes' ? '<li class="item_separator">:</li>' : '';
			$due_date = date_create($countdown_date); ?>
			<ul class="countdown-timer sp-downcount-timer d-flex align-items-center " data-date="<?php echo esc_attr(date_format($due_date, 'm/j/Y h:i:s')) ?>">
				<li>
					<span class="days box">24</span>
					<span class="subtitle"><?php echo esc_html($count_days) ?></span>
				</li>
				<?php echo hostim_kses_post($separator) ?>
				<li>
					<span class="hours box">10</span>
					<span class="subtitle"><?php echo esc_html($count_hours) ?></span>
				</li>
				<?php echo hostim_kses_post($separator) ?>
				<li>
					<span class="minutes box">45</span>
					<span class="subtitle"><?php echo esc_html($count_min) ?></span>
				</li>
				<?php echo hostim_kses_post($separator) ?>
				<li>
					<span class="seconds box">10</span>
					<span class="subtitle"><?php echo esc_html($count_sec) ?></span>
				</li>
			</ul>
<?php
		}
	}
}
