<?php
namespace Hostim\Widgets;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\{Controls_Manager,
	Widget_Base,
	Group_Control_Typography,
	Repeater,
	Utils
};

class Hostim_team extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * @since 1.0.0
	 */
	public function get_name() {
		return 'hostim_team';
	}

	/**
	 * Get widget title.
	 *
	 * @since 1.0.0
	 */
	public function get_title() {
		return __( 'Hostim Team', 'hostim-core' );
	}

	/**
	 * Get widget icon.
	 *
	 * @since 1.0.0
	 */
	public function get_icon() {
		return 'eicon-person';
	}

	/**
	 * Get widget categories.
	 *
	 * @since 1.0.0
	 */
	public function get_categories() {
		return [ 'tt-elements' ];
	}

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the widget belongs to.
	 *
	 * @since 1.0.0
	 */
	public function get_keywords() {
		return [ 'Team', 'Member' ];
	}

	/**
	 * Register widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {

		//======================== Team Member =====================//
		$this->start_controls_section( 'team_content', [
			'label' => __( 'Team Member', 'hostim-core' ),
			'tab'   => Controls_Manager::TAB_CONTENT,
		] );

		$this->add_control( 'name', [
			'label'       => __( 'Name', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'placeholder' => __( 'Enter Name', 'hostim-core' ),
			'default'     => __( 'Mashil Nanchy', 'hostim-core' ),
		] );

		$this->add_control( 'position', [
			'label'       => __( 'Position', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'placeholder' => __( 'Enter Position', 'hostim-core' ),
			'default'     => __('CEO', 'hostim-core'),
		] );

		$this->add_control( 'phone_number', [
			'label'       => __( 'Phone Number', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'placeholder' => __( 'Phone number', 'hostim-core' ),
			'default'     => __('tel:+1556622234', 'hostim-core'),
			'condition'=> [
				'team_style' => 'style4'
			]
		] );

		$this->add_control( 'image', [
			'label'   => __( 'Choose Image', 'hostim-core' ),
			'type'    => Controls_Manager::MEDIA,
		] );

		$repeater = new Repeater();
		$repeater->add_control( 'icon', [
			'label' => __( 'Icon', 'hostim-core' ),
			'type'  => Controls_Manager::ICONS,
		] );

		$repeater->add_control(
			'link', [
				'label' => __( 'Link', 'hostim-core' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'hostim-core' ),
				'show_external' => true,
				'default' => [
					'url' => '',
				],
			]
		);

		$repeater->add_control( 'social_name', [
			'label'       => __( 'Social Link Name', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => 'Facebook',
		] );

		$this->add_control( 'social_icons', [
			'label'       => __( 'Add Social Icon', 'hostim-core' ),
			'type'        => Controls_Manager::REPEATER,
			'fields'      => $repeater->get_controls(),
			'default'     => [
				[
					'icon'        => [
						'value'   => 'fab fa-facebook-f',
						'library' => 'solid',
					],
					'link'        => [
						'url' => '#',
					],
					'social_name' => __('Facebook', 'hostim-core'),
				],
				[
					'icon'        => [
						'value'   => 'fab fa-twitter',
						'library' => 'solid',
					],
					'link'        => [
						'url' => '#',
					],
					'social_name' => __('Twitter', 'hostim-core'),
				],
				[
					'icon'        => [
						'value'   => 'fab fa-linkedin-in',
						'library' => 'solid',
					],
					'link'        => [
						'url' => '#',
					],
					'social_name' => __('Linkedin', 'hostim-core'),
				],
				[
					'icon'        => [
						'value'   => 'fab fa-github',
						'library' => 'solid',
					],
					'link'        => [
						'url' => '#',
					],
					'social_name' => __('Github', 'hostim-core'),
				],

			],
			'title_field' => '{{{ social_name }}}',
		] );

		$this->end_controls_section();// End Team Content

		//============================================
		// START TEAME STYLE
		//============================================

		// Start Name Style
		// =====================
		$this->start_controls_section( 'name_style', [
			'label' => __( 'Name', 'hostim-core' ),
			'tab'   => Controls_Manager::TAB_STYLE,
		] );

		$this->add_control( 'name_color', [
			'label'     => __( 'Text Color', 'hostim-core' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .tt-team__name' => 'color: {{VALUE}};',
			],
		] );


		$this->add_group_control( Group_Control_Typography::get_type(), [
			'name'     => 'name_typography',
			'label'    => __( 'Typography', 'hostim-core' ),
			'selector' => '{{WRAPPER}} .tt-team__name',
		] );


		$this->end_controls_section();
		// End Name Style
		// =====================

		// Start Position Style
		// =====================
		$this->start_controls_section( 'position_style', [
			'label' => __( 'Designation', 'hostim-core' ),
			'tab'   => Controls_Manager::TAB_STYLE,
		] );

		$this->add_control( 'position_color', [
			'label'     => __( 'Color', 'hostim-core' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .tt-team__designation' => 'color: {{VALUE}};',
			],
		] );

		$this->add_group_control( Group_Control_Typography::get_type(), [
			'name'     => 'position_typography',
			'label'    => __( 'Typography', 'hostim-core' ),
			'selector' => '{{WRAPPER}} .tt-team__designation',
		] );

		$this->end_controls_section();
		// End Position Style
		// =====================


		// Start Icon Style
		// =====================
		$this->start_controls_section( 'icon_style', [
			'label' => __( 'Social Icon', 'hostim-core' ),
			'tab'   => Controls_Manager::TAB_STYLE,
		] );

		$this->add_responsive_control( 'font_size', [
			'label'      => __( 'Font Size', 'hostim-core' ),
			'type'       => Controls_Manager::SLIDER,
			'size_units' => [ 'px', 'em' ],
			'default'    => [
				'unit' => 'px',
				'size' => '16',
			],
			'selectors'  => [
				'{{WRAPPER}} .tt-team__social li a' => 'font-size: {{SIZE}}{{UNIT}};'
			],
		] );

		$this->start_controls_tabs( 'team_icon_tabs' );

		$this->start_controls_tab( 'team_icon_normal', [
			'label' => __( 'Normal', 'hostim-core' ),
		] );

		$this->add_control( 'team_icon_color', [
			'label'     => __( 'Icon Color', 'hostim-core' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .tt-team__social li a' => 'color: {{VALUE}};',
			],
		] );
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'selector' => '{{WRAPPER}} .tt-team .tt-team__avater .tt-team__social li a',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab( 'team_icon_hover', [
			'label' => __( 'Hover', 'hostim-core' ),
		] );

		$this->add_control( 'team_icon_hover_color', [
			'label'     => __( 'Icon Color', 'hostim-core' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .tt-team__social li a:hover' => 'color: {{VALUE}};',
			],
		] );
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'border-hover',
				'selector' => '{{WRAPPER}} .tt-team .tt-team__avater .tt-team__social li a:hover',
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();
	}


	protected function render() {
		$settings = $this->get_settings_for_display();

        if ( $settings['image']['id'] != '' ) {
            ?>
            <div class="tt-team">
                <div class="tt-team__avater">
                    <?php echo wp_get_attachment_image($settings['image']['id'], 'hostim_545x545' ) ?>
                    <ul class="tt-team__social">
                        <?php
                        foreach ( $settings['social_icons'] as $index => $icon ) :
                            $target = $icon['link']['is_external'] ? ' target="_blank"' : '';
                            $nofollow = $icon['link']['nofollow'] ? ' rel="nofollow"' : '';
                            ?>
                            <li class="elementor-repeater-item-<?php echo esc_attr( $icon['_id'] ); ?>">
                                <a href="<?php echo esc_url( $icon['link']['url'] ); ?>" <?php echo esc_attr( $target . ' ' . $nofollow ); ?> >
                                    <?php \Elementor\Icons_Manager::render_icon( $icon['icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="tt-team__info">
                    <?php if ( $settings['name'] ): ?>
                        <h5 class="tt-team__name">
                            <?php printf( '%s', $settings['name'] ); ?>
                        </h5>
                    <?php endif; ?>

                    <?php if ( $settings['position'] ): ?>
                        <h6 class="tt-team__designation">
                            <?php printf( '%s', $settings['position'] ); ?>
                        </h6>
                    <?php endif; ?>
                </div>
            </div>
            <?php
        }

	}

}
