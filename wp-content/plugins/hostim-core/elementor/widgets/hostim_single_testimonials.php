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

class Hostim_Single_Testimonials extends Widget_Base {

	public function get_name() {
		return 'hostim_single_testimonials';
	}

	public function get_title() {
		return esc_html__( 'Hostim Single Testimonial', 'hostim-core' );
	}

	public function get_icon() {
		return 'eicon-testimonial';
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

		//======================== Section Testimonials ==========================//
		$this->start_controls_section(
			'testimonial_sec', [
				'label' => esc_html__( 'Testimonials', 'hostim-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'author_img', [
				'label' => esc_html__( 'Author Image', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);

		$this->add_control(
			'author_name', [
				'label' => esc_html__( 'Name', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Milton G. George', 'hostim-core' ),
			]
		);

		$this->add_control(
			'review_content', [
				'label' => esc_html__( 'Review Content', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
			]
		);

		$this->add_control(
			'ratting', [
				'label' => esc_html__( 'Rating Number', 'hostim-core' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => '5',
				'options' => [
					'1' => __( '1 Star', 'hostim-core' ),
					'2' => __( '2 Star', 'hostim-core' ),
					'3' => __( '3 Star', 'hostim-core' ),
					'4' => __( '4 Star', 'hostim-core' ),
					'5' => __( '5 Star', 'hostim-core' ),
				],
			]
		);

		$this->end_controls_section(); //End Testimonials

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


		$this->start_controls_section(
			'style_testimonials', [
				'label' => esc_html__( 'Testimonials', 'hostim-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		//================ Author Name
		$this->add_control(
			'author_name_options', [
				'label' => esc_html__( 'Author Name Options', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(), [
				'name' => 'author_name_typo',
				'selector' => '{{WRAPPER}} .__name',
			]
		);

		$this->add_control(
			'author_name_color', [
				'label' => esc_html__( 'Text Color', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .__name' => 'color: {{VALUE}}',
				],
			]
		); //End Author Name


		//================ Content Options
		$this->add_control(
			'review_content_options', [
				'label' => esc_html__( 'Review Content Options', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(), [
				'name' => 'review_content_typo',
				'selector' => '{{WRAPPER}} .__review_content',
			]
		);

		$this->add_control(
			'review_content_color', [
				'label' => esc_html__( 'Text Color', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .__review_content' => 'color: {{VALUE}}',
				],
			]
		); //End Content Options

		$this->end_controls_section(); //End Content Options

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

		$settings = $this->get_settings();
		extract( $settings );


		//===================== Template Parts ===================//
		include "templates/single-testimonial/testimonial-1.php";

	}

}
