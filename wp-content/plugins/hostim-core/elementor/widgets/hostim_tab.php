<?php

namespace Hostim\Widgets;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\{Controls_Manager,
	Group_Control_Background,
	Group_Control_Border,
	Group_Control_Box_Shadow,
	Group_Control_Typography,
	Repeater,
	Widget_Base};

/**
 * Hostim Tab
 *
 * Hostim widget.
 *
 * @since 2.0.0
 */
class Hostim_Tab extends Widget_Base {

	public function get_name() {
		return 'hostim-tab';
	}

	public function get_title() {
		return __( 'Hostim Tab', 'hostim-core' );
	}

	public function get_icon() {
		return 'eicon-tabs';
	}

	public function get_categories() {
		return [ 'hostim-elements' ];
	}

	protected function register_controls() {

		$this->start_controls_section( 'section_tab_layout', [
			'label' => __( 'Tab Style', 'hostim-core' ),
		] );

		// Layout=====================
		$this->add_control( 'layout', [
			'label'   => esc_html__( 'Layout', 'hostim-core' ),
			'type'    => Controls_Manager::SELECT,
			'options' => [
				'1' => esc_html__( 'Layout 1', 'hostim-core' ),
				'2' => esc_html__( 'Layout 2', 'hostim-core' ),
				'3' => esc_html__( 'Layout 3', 'hostim-core' ),
				'4' => esc_html__( 'Layout 4', 'hostim-core' ),
			],
			'default' => '1',
		] );

		$this->end_controls_section();

		// ------------------------------ Feature list ------------------------------
		$this->start_controls_section( 'section_tab', [
			'label' => __( 'Tabs', 'hostim-core' ),
			'condition' => [
				'layout' => '1'
			]
		] );
		$repeater = new Repeater();

		$repeater->add_control( 'tab_title', [
			'label'       => __( 'Title', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true,
		] );

		$repeater->add_control( 'description', [
			'label'       => __( 'Description', 'hostim-core' ),
			'type' 		  => Controls_Manager::WYSIWYG,
			'label_block' => true,
		] );

		$repeater->add_control( 'selected_icon', [
			'label'   => __( 'Icon', 'hostim-core' ),
			'type'    => Controls_Manager::ICONS,
			'default' => [
				'value'   => 'fa-solid fa-globe',
				'library' => 'solid',
			],
		] );


		$this->add_control( 'hostim_tabs', [
			'label'       => __( 'Tabs', 'hostim-core' ),
			'type'        => Controls_Manager::REPEATER,
			'fields'      => $repeater->get_controls(),
			'default'     => [
				[				
					'tab_title'       => __( 'Domain Services', 'hostim-core' ),
					'selected_icon'   => [
						'default' => [
							'value'   => 'fa-solid fa-globe',
							'library' => 'solid',
						],
					],
					'description' => __( 'Focus on your business and avoid all the web hosting managed hosting guarantees unmatched performance, reliability and choice with 24/7 support that acts as your extended team guarantees unmatched performance.', 'hostim-core' ),
				],
				[				
					'tab_title'       => __( 'Web Hosting Services', 'hostim-core' ),
					'selected_icon'   => [
						'default' => [
							'value'   => 'fa-solid fa-earth-asia',
							'library' => 'solid',
						],
					],
					'description' => __( 'Focus on your business and avoid all the web hosting managed hosting guarantees unmatched performance, reliability and choice with 24/7 support that acts as your extended team guarantees unmatched performance.', 'hostim-core' ),
				],
				
			],
			'title_field' => '{{{ tab_title }}}',
		] );

		$this->end_controls_section();

		

		// Tab Style 02
		$this->start_controls_section( 'section_tab_2', [
			'label' => __( 'Tabs', 'hostim-core' ),
			'condition' => [
				'layout' => '2'
			]
		] );
		$repeater2 = new Repeater();

		$repeater2->add_control( 's2_tab_title', [
			'label'       => __( 'Title', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true,
		] );

		$repeater2->add_control( 's2_description', [
			'label'       => __( 'Description', 'hostim-core' ),
			'type'        => Controls_Manager::WYSIWYG,
			'label_block' => true,
		] );
		
		$repeater2->add_control( 'feature_list', [
			'label'       => __( 'Feature List', 'hostim-core' ),
			'description' => __( 'Every new line will show as a list item', 'hostim-core' ),
			'type'        => Controls_Manager::TEXTAREA,
			'label_block' => true,
		] );

		$repeater2->add_control( 'btn_label', [
			'label'       => __( 'Button Label', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true,
			'default'	  => __('Explore More', 'hostim-core')
		] );
		
		$repeater2->add_control( 'btn_url', [
			'label'       => __( 'Button URL', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true,
			'default'	  => '#'
		] );

		$this->add_control( 's2_hostim_tabs', [
			'label'       => __( 'Tabs', 'hostim-core' ),
			'type'        => Controls_Manager::REPEATER,
			'fields'      => $repeater2->get_controls(),
			'default'     => [
				[				
					's2_tab_title'   => __( 'Domain Services', 'hostim-core' ),
					's2_description' => __( 'Focus on your business and avoid all the web hosting managed hosting guarantees unmatched performance, reliability and choice with 24/7 support that acts as your extended team guarantees unmatched performance.', 'hostim-core' ),
					'feature_list'	=> 'Dramatically productive web-enabled method.'
				],
				
				
			],
			'title_field' => '{{{ s2_tab_title }}}',
		] );

		$this->end_controls_section();

		// Tab Style 03 ---------------------
		$this->start_controls_section(
			'section_tab_3',
			[
				'label' => esc_html__( 'Tabs', 'hostim-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
				'condition' => [
					'layout' => '3',
				]
			],
		);
		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'aut_img',
			[
				'label' => esc_html__( 'Author Image', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$repeater->add_control(
			'aut_name',
			[
				'label' => esc_html__( 'Author name', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'aut_designation',
			[
				'label' => esc_html__( 'Designation', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'aut_img_2',
			[
				'label' => esc_html__( 'Author Image', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$repeater->add_control(
			'rating_img',
			[
				'label' => esc_html__( 'Ratting Image', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$repeater->add_control(
			'ratting_text',
			[
				'label' => esc_html__( 'Ratting title', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'List Title' , 'hostim-core' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'saving_percent',
			[
				'label' => esc_html__( 'Saving Percent', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'List Title' , 'hostim-core' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'saving_percent_icon',
			[
				'label' => esc_html__( 'Saving Percent Icon', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '%' , 'hostim-core' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'saving_title',
			[
				'label' => esc_html__( 'Saving title', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'List Title' , 'hostim-core' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'using_gb',
			[
				'label' => esc_html__( 'Using Data', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'List Title' , 'hostim-core' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'using_gb_icon',
			[
				'label' => esc_html__( 'Using Data Icon', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'GB' , 'hostim-core' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'hosting_use_title',
			[
				'label' => esc_html__( 'Uses title', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'List Title' , 'hostim-core' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'content_img',
			[
				'label' => esc_html__( 'Image', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$repeater->add_control(
			'tab_3_title',
			[
				'label' => esc_html__( 'Title', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'List Title' , 'hostim-core' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'tab_3_content',
			[
				'label' => esc_html__( 'Content', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'List Title' , 'hostim-core' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'content_img_2',
			[
				'label' => esc_html__( 'Image', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->add_control(
			'tabs_3',
			[
				'label' => esc_html__( 'Tabs 3', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'aut_name' => esc_html__( 'Jerome Bell', 'hostim-core' ),
					],
				],
				'condition' => [
					'layout' => '3',
				],
				'title_field' => '{{{ aut_name }}}',
			]
		);
		$this->end_controls_section();
		//// Tab Style 03 End  --------------------------

		// Tab style 04 Start ------------------------------------------------
		$this->start_controls_section(
			'tab_section',
			[
				'label' => esc_html__( 'Tab Section', 'hostim-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
				'condition' => [
					'layout' => '4',
				]
			]
		);
		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'tab_title',
			[
				'label' => esc_html__( 'Title', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Business Showcase' , 'hostim-core' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'tab_image',
			[
				'label' => esc_html__( 'Choose Image', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->add_control(
			'tab_list',
			[
				'label' => esc_html__( 'Repeater Item', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'tab_title' => esc_html__( 'Business Showcase', 'hostim-core' ),
					],
				],
				'title_field' => '{{{ tab_title }}}',
			]
		);
		$this->end_controls_section();
		// Tab style 04 End ---------------------------------------------


		$this->start_controls_section(
			'tab_style_section',
			[
				'label' => __( 'Tab Style', 'hostim-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'tab_title_typo',
				'label'    => __( 'Title Color', 'hostim-core' ),				
				'selector' => '{{WRAPPER}} .hm2-service-tab ul li .tab_btn',
			]
		);	

		

		// tab title normal and hover color start ---------------------------------------------------
		$this->start_controls_tabs(
			'style_tabs'
		);
		
		$this->start_controls_tab(
			'style_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'hostim-core' ),
			]
		);
		$this->add_control(
			'tab_title_color',
			[
				'label'     => __( 'Tab Title Color', 'hostim-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hm2-service-tab ul li .tab_btn' => 'color: {{VALUE}}',
					'{{WRAPPER}} .h5-feature-tab ul li a' => 'color: {{VALUE}}'
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'tab_title_typography',
				'selector' => '{{WRAPPER}} .hm2-service-tab ul li .tab_btn',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'style_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'hostim-core' ),
			]
		);
		$this->add_control(
			'tab_title_hover_color',
			[
				'label'     => __( 'Tab Title hover Color', 'hostim-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hm2-service-tab ul li .tab_btn:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .h5-feature-tab ul li a:hover' => 'color: {{VALUE}}'
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'tab_title_hover_typography',
				'selector' => '{{WRAPPER}} .hm2-service-tab ul li .tab_btn:hover',
			]
		);
		$this->end_controls_tab();
		
		$this->end_controls_tabs();
		// tab title normal and hover color end ---------------------------------------------------
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'tab_desc_typo',
				'label'    => __( 'Description Color', 'hostim-core' ),				
				'selector' => '{{WRAPPER}} .hm2-service-tab .tab-content p',
			]
		);	

		$this->add_control(
			'tab_desc_color',
			[
				'label'     => __( 'Tab Description Color', 'hostim-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hm2-service-tab .tab-content p' => 'color: {{VALUE}}'
				],
			]
		);
		$this->add_control(
			'border_color_',
			[
				'label'     => __( 'Tab Title Border Color', 'hostim-core' ),
				'type'      => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);
		$this->add_control(
			'border_normal_color',
			[
				'label'     => __( 'Border Normal Color', 'hostim-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hm2-service-tab ul' => 'border-color: {{VALUE}}',
					'{{WRAPPER}} .h5-feature-tab ul:before' => 'background: {{VALUE}}'
				],
			]
		);
		$this->add_control(
			'border_active_color',
			[
				'label'     => __( 'Border Active Color', 'hostim-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hm2-service-tab ul li button::after' => 'background: {{VALUE}}',
					'{{WRAPPER}} .h5-feature-tab ul li a::after' => 'background: {{VALUE}}'
				],
			]
		);
		$this->end_controls_section();


		

	}

	protected function render() {

		$settings    = $this->get_settings();
		extract( $settings );

		require __DIR__ . '/templates/tab/layout-' . $layout . '.php';
		
	}
}


