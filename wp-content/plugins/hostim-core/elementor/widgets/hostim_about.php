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


class Hostim_about extends Widget_Base {

	public function get_name() {
		return 'hostim-about';
	}

	public function get_title() {
		return __( 'Hostim About', 'hostim-core' );
	}

	public function get_icon() {
		return 'eicon-download-button';
	}

	public function get_categories() {
		return [ 'hostim-elements' ];
	}

	protected function register_controls() {
		$this->start_controls_section( 'section_about', [
			'label' => __( 'About Service', 'hostim-core' ),
		] );
		$this->add_control( 'title_text', [
			'label'       => __( 'Title', 'hostim-core' ),
			'type'        => Controls_Manager::TEXTAREA,
			'default'	  => __('Reason For Choosing Our Strike Hosting Consultancy.', 'hostim-core')
		] );

		$repeater = new \Elementor\Repeater();

		$repeater->add_control( 'feature_title', [
			'label'       => __( 'Title', 'hostim-core' ),
			'type'        => Controls_Manager::TEXTAREA,
			'default'	  => __('15+ Years Web Hosting Company', 'hostim-core')
		] );

		$repeater->add_control( 'feature_desc', [
			'label'       => __( 'Description', 'hostim-core' ),
			'type'        => Controls_Manager::TEXTAREA,
			'default'	  => __('Traditional WordPress, you get all the features, tools, and guidance you need to build and launch.', 'hostim-core')
		] );

		$repeater->add_control( 'selected_icon', [
			'label'   => __( 'Icon', 'hostim-core' ),
			'type'    => Controls_Manager::ICONS,
			'default' => [
				'value'   => 'fas fa-check',
				'library' => 'solid',
			],
		] );

		$this->add_control( 'about_list', [
			'label'       => __( 'About List', 'hostim-core' ),
			'type'        => \Elementor\Controls_Manager::REPEATER,
			'fields'      => $repeater->get_controls(),
			'default'     => [
				[
					'feature_title' => __( '15+ Years Web Hosting Company', 'hostim-core' ),
					'feature_desc'   => __( 'Traditional WordPress, you get all the features, tools, and guidance you need to build and launch.', 'hostim-core' ),
					'selected_icon' => [
						'value'   => 'fas fa-check',
						'library' => 'solid',
					]
				],
			],
			'title_field' => '{{{ feature_title }}}',
		] );

		$this->add_control(
			'feature_image_heading',
			[
				'label' => __( 'Feature Image', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control( 'about_feature_img', [
			'label'   => __( 'Choose Image', 'hostim-core' ),
			'type'    => Controls_Manager::MEDIA,
			'default' => [
				'url' => plugin_dir_url( __DIR__ ) . 'assets/images/hero/star-5.svg'
			],

		] );

		$this->end_controls_section();

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
					'{{WRAPPER}} .consult-left .consult_heading' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control( Group_Control_Typography::get_type(), [
			'name'     => 'heading_typo',
			'label'    => __( 'Typography', 'hostim-core' ),
			'selector' => '{{WRAPPER}} .consult-left .consult_heading',
		] );

		$this->add_control( 'heading_color', [
			'label'     => __( 'Color', 'hostim-core' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => '',
			'selectors' => [
				'{{WRAPPER}} .consult-left .consult_heading' => 'color: {{VALUE}};',
			],
		] );
		$this->end_controls_section();


		// About List item
		$this->start_controls_section( 'style_list_items', [
			'label' => __( 'Features', 'hostim-core' ),
			'tab'   => Controls_Manager::TAB_STYLE,
		] );
		$this->add_control(
			'item_title_heading',
			[
				'label' => __( 'Title', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_group_control( Group_Control_Typography::get_type(), [
			'name'     => 'item_title_typo',
			'label'    => __( 'Typography', 'hostim-core' ),
			'selector' => '{{WRAPPER}} .about_list_item .list-content h4',
		] );

		$this->add_control( 'item_title_color', [
			'label'     => __( 'Color', 'hostim-core' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => '',
			'selectors' => [
				'{{WRAPPER}} .about_list_item .list-content h4' => 'color: {{VALUE}};',
			],
		] );

		$this->add_control(
			'item_desc_heading',
			[
				'label' => __( 'Description', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_group_control( Group_Control_Typography::get_type(), [
			'name'     => 'item_desc_typo',
			'label'    => __( 'Typography', 'hostim-core' ),
			'selector' => '{{WRAPPER}} .about_list_item .list-content p',
		] );

		$this->add_control( 'item_desc_color', [
			'label'     => __( 'Color', 'hostim-core' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => '',
			'selectors' => [
				'{{WRAPPER}} .about_list_item .list-content p' => 'color: {{VALUE}};',
			],
		] );

		$this->add_control(
			'item_icon_heading',
			[
				'label' => __( 'Icon', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control( 'item_icon_color', [
			'label'     => __( 'Icon Color', 'hostim-core' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => '',
			'selectors' => [
				'{{WRAPPER}} .consult-list .about_list_item .icon-box i' => 'color: {{VALUE}};',
			],
		] );

		$this->add_control( 'item_line_color', [
			'label'     => __( 'Border Line Color', 'hostim-core' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => '',
			'selectors' => [
				'{{WRAPPER}} .consult-list .about_list_item .icon-box' => 'border-color: {{VALUE}};',
				'{{WRAPPER}} .consult-list .about_list_item .icon-box::after' => 'background-color: {{VALUE}};',
			],
		] );
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
					'{{WRAPPER}} .consult-area' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .consult-area' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'sec_background',
				'label' => esc_html__( 'Background', 'plugin-name' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .consult-area',
			]
		);
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
	protected function render() {
		$settings = $this->get_settings_for_display();
		extract( $settings ); ?>

		<section class="consult-area position-relative zindex-1 overflow-hidden">
            <div class="consult-overlay bg-secondary-gradient pt-120">
                <div class="container">
                    <div class="row justify-content-between">
                        <div class="col-lg-7 col-xl-6">
                            <div class="consult-left">
								<?php
								if( !empty( $title_text ) ){
									echo '<h2 class="consult_heading">'. hostim_kses_post( nl2br( $title_text ) ) .'</h2>';
								}
								if( is_array( $about_list ) ){
									echo '<ul class="consult-list mt-5">';
									foreach( $about_list as $item ){ ?>
										<li class="d-flex about_list_item">
											<span class="icon-box position-relative d-inline-flex align-items-center justify-content-center rounded-circle">
												<?php
												if ( ! empty( $item['selected_icon'] ) ) {
													 \Elementor\Icons_Manager::render_icon( $item['selected_icon'], [ 'aria-hidden' => 'true' ] );
												} ?>
											</span>
											<div class="list-content ms-4">
												<?php
												if( !empty( $item['feature_title'] ) ){
													echo '<h4 class="mb-3 mt-1">'. esc_html( $item['feature_title'] ) .'</h4>';
												}

												if( !empty( $item['feature_desc'] ) ){
													echo '<p>'. esc_html( $item['feature_desc'] ) .'</p>';
												}
												?>
											</div>
										</li>
										<?php
									}
									echo '</ul>';
								}
								?>
                            </div>
                        </div>
                        <div class="col-lg-5 align-self-end">
                            <div class="consult-right">
								<?php
								if( !empty( $about_feature_img['url'] ) ){
									echo '<img src="'. esc_url( $about_feature_img['url'] ) .'" alt="man" class="img-fluid">';
								}
								?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
		<?php
	}
}
