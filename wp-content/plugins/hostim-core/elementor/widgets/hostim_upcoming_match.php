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


class Hostim_upcoming_match extends Widget_Base {

	public function get_name() {
		return 'hostim-upcoming-match';
	}

	public function get_title() {
		return __( 'Hostim Upcoming Match', 'hostim-core' );
	}

	public function get_icon() {
		return 'eicon-archive';
	}

	public function get_categories() {
		return [ 'hostim-elements' ];
	}


	protected function register_controls() {

		// Section Heading ============================
		$this->start_controls_section( 'section_heading', [
			'label' => __( 'Section Heading', 'hostim-core' ),
		] );
		$this->add_control( 
			'sec_heading',
			[
				'label'       => __( 'Heading', 'hostim-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'default'	  => __('Upcoming Latest Match', 'hostim-core')
			]
		);
		$this->add_control( 
			'sub_heading',
			[
				'label'       => __( 'Sub Heading', 'hostim-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'default'	  => __('Compete with 100 players on a remote island for winner takes showdown known feels at home on the skin strategic.', 'hostim-core')
			]
		);
		$this->end_controls_section();

		// Section Feature ============================
		$this->start_controls_section( 'section_upcoming_match', [
			'label' => __( 'Upcoming Match Schedule', 'hostim-core' ),
		] );		

		$repeater = new \Elementor\Repeater();
		$repeater->add_control( 'stream_logo', [
			'label'   => __( 'Choose Stream Logo', 'hostim-core' ),
			'type'    => Controls_Manager::MEDIA,
			
		] );

		$repeater->add_control( 'title', [
			'label'       => __( 'Match Title', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'	  => __('Skrit Tournament - 2022', 'hostim-core')
		] );

		$repeater->add_control(
			'due_date',
			[
				'label' => esc_html__( 'Due Date', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::DATE_TIME,
				'picker_options' => array( 'dateFormat' )
			]
		);
		$repeater->add_control( 'feature_img', [
			'label'   => __( 'Choose Feature Image', 'hostim-core' ),
			'type'    => Controls_Manager::MEDIA,
		] );

		$this->add_control( 'upcoming_matches', [
			'label'       => __( 'Upcoming Matches', 'hostim-core' ),
			'type'        => \Elementor\Controls_Manager::REPEATER,
			'fields'      => $repeater->get_controls(),
			'default'     => [
				[
					'stream_logo'=> '',
					'btn_label' => __( 'title', 'hostim-core' ),
					'due_date'   => '',
					'feature_img'=> ''
				]
			],
			'title_field' => '{{{ title }}}',
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
					'{{WRAPPER}} .section-title h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);

		$this->add_group_control( Group_Control_Typography::get_type(), [
			'name'     => 'heading_typo',
			'label'    => __( 'Typography', 'hostim-core' ),
			'selector' => '{{WRAPPER}} .section-title h2',
		] );

		$this->add_control( 'heading_color', [
			'label'     => __( 'Color', 'hostim-core' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => '',
			'selectors' => [
				'{{WRAPPER}} .section-title h2' => 'color: {{VALUE}};'
			],
		] );
		
		$this->add_group_control( Group_Control_Typography::get_type(), [
			'name'     => 'subheading_typo',
			'label'    => __( 'Sub Heading Typography', 'hostim-core' ),
			'selector' => '{{WRAPPER}} .section-title p',
		] );

		$this->add_control( 'suybheading_color', [
			'label'     => __( 'Sub Heading Color', 'hostim-core' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => '',
			'selectors' => [
				'{{WRAPPER}} .section-title p' => 'color: {{VALUE}};'
			],
		] );
		$this->end_controls_section();
		
		
	
		// Section Style ===================================
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
					'{{WRAPPER}} .gm-upcoming' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
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
					'{{WRAPPER}} .gm-upcoming' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'sec_background',
				'label' => esc_html__( 'Background', 'plugin-name' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .gm-upcoming.dark-bg',
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
		
		<section class="gm-upcoming">
            <div class="container">
				<?php 
				if( !empty( $sec_heading || $sub_heading ) ){ ?>
					<div class="row justify-content-center">
						<div class="col-xxl-5 col-xl-6 col-md-8">
							<div class="section-title text-center">
								<?php
								if( !empty( $sec_heading ) ){
									echo '<h2>'. esc_html( $sec_heading ) .'</h2>';
								}
								
								if( !empty( $sub_heading ) ){
									echo '<p>'. esc_html( $sub_heading ) .'</p>';
								}
								?>
							</div>
						</div>
					</div>
					<?php 
				} ?>
                <div class="live-match-list">
					<?php 
					if( is_array( $upcoming_matches ) ){
						foreach( $upcoming_matches as $match ){ ?>
							<div class="gm-live-match-wrapper position-relative mt-5">
								<div class="gm-lv-shape-left"></div>
								<div class="gm-lv-shape-right"></div>
								<div class="gm-live-match-box">
									<div class="gm-live-match-content d-flex align-items-center justify-content-between">
										<div class="gm-live-match-left">
											<?php 
											if( !empty( $match['stream_logo']['id'] ) ){
												echo wp_get_attachment_image( $match['stream_logo']['id'], 'full', '', array('class'=>'img-fluid') );
											}

											if( !empty( $match['title'] ) ){
												echo '<h3>'. esc_html( $match['title'] ) .'</h3>';
											}
											
											if( !empty( $match['due_date'] ) ){
												$date_ = date_create($match['due_date']);
												echo '<span>'. date_format( $date_, 'j F Y - h:i' ) .'</span>';
											} ?>
										</div>
										<div class="gm-live-match-right">
											<?php
											if( !empty( $match['feature_img']['id'] ) ){
												echo wp_get_attachment_image( $match['feature_img']['id'], 'full', '', array('class'=>'img-fluid') );
											} ?>
											
										</div>
									</div>
								</div>
							</div>
							<?php
						}
					}
					?>
                </div>
            </div>
        </section>

		<?php
	}
}