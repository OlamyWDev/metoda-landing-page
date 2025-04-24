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


class Hostim_video extends Widget_Base {

	public function get_name() {
		return 'hostim-video';
	}

	public function get_title() {
		return __( 'Hostim Video', 'hostim-core' );
	}

	public function get_icon() {
		return 'eicon-play';
	}

	public function get_categories() {
		return [ 'hostim-elements' ];
	}


	protected function register_controls() {

		$this->start_controls_section( 'hostim_video_section', [
			'label' => __( 'Video', 'hostim-core' ),
		] );

		$this->add_control( 'video_url', [
			'label'       => __( 'Video URL', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'	  => ''
		] );

		$this->add_control( 'poster_img', [
			'label'       => __( 'Poster Image', 'hostim-core' ),
			'type'        => Controls_Manager::MEDIA,
		] );

		$this->add_control( 'video_play_icon', [
			'label'   => __( 'Icon', 'hostim-core' ),
			'type'    => Controls_Manager::ICONS,
			'default' => [
				'value'   => 'fa-solid fa-play',
				'library' => 'solid',
			],
		] );

		$this->end_controls_section();


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
					'{{WRAPPER}} .vps-video-box' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
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
					'{{WRAPPER}} .vps-video-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(), [
				'name' => 'sec_background',
				'label' => esc_html__( 'Background', 'plugin-name' ),
				'types' => [ 'classic', 'gradient'],
				'selector' => '
				    {{WRAPPER}} .vps-video-box,
				    {{WRAPPER}} .vps-video-box::before
                ',
			]
		);

		$this->end_controls_section();//Section Background

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

		<div class="vps-video-box position-relative overflow-hidden">
			<?php 
			if( !empty( $poster_img['id'] ) ){
				echo wp_get_attachment_image( $poster_img['id'], 'full' );
			}
			if( !empty( $video_url ) ){
				echo '<a href="'. esc_url( $video_url ) .'" class="vps-video-popup">';
				\Elementor\Icons_Manager::render_icon( $video_play_icon, [ 'aria-hidden' => 'true' ] );
				echo '</a>';
			}
			?>
			
		</div>

		<?php
	}
}