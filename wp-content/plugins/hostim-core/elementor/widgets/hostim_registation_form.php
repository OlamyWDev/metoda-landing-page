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


class Hostim_registation_form extends Widget_Base {

	public function get_name() {
		return 'hostim-registation-form';
	}

	public function get_title() {
		return __( 'Hostim Registation Form', 'hostim-core' );
	}

	public function get_icon() {
		return 'eicon-form-horizontal';
	}

	public function get_categories() {
		return [ 'hostim-elements' ];
	}


	protected function register_controls() {
		$this->start_controls_section( 'section_registation', [
			'label' => __( 'Registation Form', 'hostim-core' ),
		] );
		
		$this->add_control( 'email_placeholder', [
			'label'       => __( 'Email Placeholder', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'	  => __('Email Address', 'hostim-core')
		] );
		$this->add_control( 'email_name', [
			'label'       => __( 'Email Name', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'	  => __('email', 'hostim-core')
		] );
		
		$this->add_control( 'password_placeholder', [
			'label'       => __( 'Password Placeholder', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'	  => __('Password', 'hostim-core')
		] );
		$this->add_control( 'pass_name', [
			'label'       => __( 'Password Name', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'	  => __('password', 'hostim-core')
		] );
		
		$this->add_control( 'submit_label', [
			'label'       => __( 'Submit Button Label', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'	  => __('Register Now', 'hostim-core')
		] );
		
		$this->add_control( 'action_url', [
			'label'       => __( 'Action URL', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'	  => '#'
		] );

		$this->end_controls_section();

		
		// Section Style ===============================
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
					'{{WRAPPER}} .h4-hero-form' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .h4-hero-form' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'sec_background',
				'label' => esc_html__( 'Background', 'plugin-name' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .h4-hero-form',
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
		extract( $settings ); 
		$actionurl = !empty( $action_url ) ? $action_url : '#';
		$emailname = !empty( $email_name ) ? $email_name : 'email';
		$eplaceholder = !empty( $email_placeholder ) ? $email_placeholder : 'Email Address';
		$passname  = !empty( $pass_name ) ? $pass_name : 'password';
		$pplaceholder = !empty( $password_placeholder ) ? $password_placeholder : 'Password';
		$submitlabel = !empty( $submit_label ) ? $submit_label : 'Register Now';
		?>

		<div class="h4-hero-form bg-white rounded-2">
			<form method="post" action="<?php echo esc_attr( $actionurl ) ?>">
				<input type="email" name="<?php echo esc_attr( $emailname ) ?>" placeholder="<?php echo esc_attr( $eplaceholder ) ?>">
				<input type="password" name="<?php echo esc_attr( $passname ) ?>" placeholder="<?php echo esc_attr( $pplaceholder ) ?>">
				<input type="submit" value="<?php echo esc_attr( $submitlabel ) ?>">						
			</form>
			
		</div>
			
		<?php
	}
}