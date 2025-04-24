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


class Hostim_games extends Widget_Base {

	public function get_name() {
		return 'hostim-games';
	}

	public function get_title() {
		return __( 'Hostim Games', 'hostim-core' );
	}

	public function get_icon() {
		return 'eicon-archive';
	}

    public function get_script_depends() {
        return ['isotop', 'waypoints', 'swiper'];
    }
    
	public function get_style_depends() {
        return ['swiper'];
    }

    public function get_categories() {
		return [ 'hostim-elements' ];
	}


	protected function register_controls() {

		$this->start_controls_section( 'style_selection', [
			'label' => esc_html__( 'Game Block Style', 'hostim-core' ),
		] );

		$this->add_control( 'layout', [
			'label'   => esc_html__( 'Select Style', 'hostim-core' ),
			'type'    => Controls_Manager::SELECT,
			'default' => '1',
			'options' => [
				'1' => esc_html__( '01: Single Block', 'hostim-core' ),
				'2' => esc_html__( '02: Games Block Tab', 'hostim-core' ),
				'3' => esc_html__( '03: Gaming Product Carousel', 'hostim-core' ),
				'4' => esc_html__( '04: Gaming Block Tab', 'hostim-core' ),
			],
		] );
		$this->end_controls_section();

		$this->start_controls_section( 'section_games', [
			'label' => __( 'Games Block', 'hostim-core' ),
			'condition' => [
				'layout' => '1'
			]
		] );

		$this->add_control( 'games_feature_img', [
			'label'   => __( 'Choose Feature Image', 'hostim-core' ),
			'type'    => Controls_Manager::MEDIA,
			
		] );
		$this->add_control( 'games_logo', [
			'label'   => __( 'Choose Logo Image', 'hostim-core' ),
			'type'    => Controls_Manager::MEDIA,
			
		] );
		$this->add_control( 'game_title', [
			'label'       => __( 'Title', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'	  => __('CS GO', 'hostim-core')
		] );
		
		$this->add_control( 'game_desc', [
			'label'       => __( 'Description', 'hostim-core' ),
			'type'        => Controls_Manager::TEXTAREA,
			'default'	  => __('Conveniently re intermediate intuitive best practice with high standards in portals.', 'hostim-core')
		] );
		
		$repeater = new \Elementor\Repeater();

		$repeater->add_control( 'btn_label', [
			'label'       => __( 'Button label', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'	  => __('Helps', 'hostim-core')
		] );
		
		$repeater->add_control( 'btn_url', [
			'label'       => __( 'Button label', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'	  => __('Helps', 'hostim-core')
		] );

		$this->add_control( 'button_list', [
			'label'       => __( 'List Button', 'hostim-core' ),
			'type'        => \Elementor\Controls_Manager::REPEATER,
			'fields'      => $repeater->get_controls(),
			'default'     => [
				[
					'btn_label' => __( 'Helps', 'hostim-core' ),
					'btn_url'   => __( '#', 'hostim-core' )
				],
				[
					'btn_label' => __( 'Official Site', 'hostim-core' ),
					'btn_url'   => __( '#', 'hostim-core' )
				],
				[
					'btn_label' => __( 'Forums', 'hostim-core' ),
					'btn_url'   => __( '#', 'hostim-core' )
				],
			],
			'title_field' => '{{{ btn_label }}}',
		] );		

		$this->end_controls_section();

		// Game Block Tab ========================
		$this->start_controls_section( 'games_block_tab', [
			'label' => __( 'Games Block Tab', 'hostim-core' ),
			'condition' => [
				'layout' => ['2', '3', '4']
			]
		] );

		$repeater = new \Elementor\Repeater();
		$repeater->add_control( 'tab_title', [
			'label'       => __( 'Tab Title', 'hostim-core' ),
			'description' => __( 'Tab Title will work as a category, same tab title item will show under one tab item', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true,
			'default'	  => __('Star Wars', 'hostim-core')
		] );
		$repeater->add_control( 'feature_img', [
			'label'   => __( 'Choose Feature Image', 'hostim-core' ),
			'type'    => Controls_Manager::MEDIA,
			
		] );
		$repeater->add_control( 'title', [
			'label'       => __( 'Title', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true,
			'default'	  => __('Assassin\'s Creed Valhalla', 'hostim-core')
		] );
		
		$repeater->add_control( 'ragular_price', [
			'label'       => __( 'Ragular Price', 'hostim-core' ),
			'type'        => Controls_Manager::NUMBER
		] );
		$repeater->add_control( 'sale_price', [
			'label'       => __( 'Sale Price', 'hostim-core' ),
			'type'        => Controls_Manager::NUMBER
		] );
		$repeater->add_control( 'currency', [
			'label'       => __( 'Currency', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default' => '$'
		] );
		$repeater->add_control('active_key_label', [
			'label'       => __('Activation Key Label', 'hostim-core'),
			'type'        => Controls_Manager::TEXT,
			'default'	=> __('Activation', 'hostim-core')
		]);
		$repeater->add_control( 'active_key', [
			'label'       => __( 'Activation Key', 'hostim-core' ),
			'type'        => Controls_Manager::TEXTAREA,
			'default'	  => __( 'PS4, PS5, Xbox One, Xbox Series X', 'hostim-core' ),
		] );
		$repeater->add_control( 'btn_label', [
			'label'       => __( 'Button Label', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'	=> __( 'Order', 'hostim-core' )
		] );
		$repeater->add_control( 'btn_url', [
			'label'       => __( 'Button Link', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true,
		] );

		$this->add_control( 'games', [
			'label'       => __( 'Games', 'hostim-core' ),
			'type'        => \Elementor\Controls_Manager::REPEATER,
			'fields'      => $repeater->get_controls(),
			'default'     => [
				[
					'title'			=> __( 'Assassin\'s Creed Valhalla', 'hostim-core' ),
					'ragular_price' => 50,
					'sale_price'	=> 35,
					'active_key'	=> __( 'PS4, PS5, Xbox One, Xbox Series X', 'hostim-core' ),
					'btn_label'		=> __( 'Order', 'hostim-core' ),
					'btn_url'		=> '#'
				],
				[
					'title'			=> __( 'Assassin\'s Creed Valhalla', 'hostim-core' ),
					'ragular_price' => 50,
					'sale_price'	=> 35,
					'active_key'	=> __( 'PS4, PS5, Xbox One, Xbox Series X', 'hostim-core' ),
					'btn_label'		=> __( 'Order', 'hostim-core' ),
					'btn_url'		=> '#'
				],
				[
					'title'			=> __( 'Assassin\'s Creed Valhalla', 'hostim-core' ),
					'ragular_price' => 50,
					'sale_price'	=> 35,
					'active_key'	=> __( 'PS4, PS5, Xbox One, Xbox Series X', 'hostim-core' ),
					'btn_label'		=> __( 'Order', 'hostim-core' ),
					'btn_url'		=> '#'
				],
				[
					'title'			=> __( 'Assassin\'s Creed Valhalla', 'hostim-core' ),
					'ragular_price' => 50,
					'sale_price'	=> 35,
					'active_key'	=> __( 'PS4, PS5, Xbox One, Xbox Series X', 'hostim-core' ),
					'btn_label'		=> __( 'Order', 'hostim-core' ),
					'btn_url'		=> '#'
				],
			],
			'title_field' => '{{{ title }}}',
            'condition'   => [
                'layout'  => [ '2', '3' ],
                'layout!'  => '4'
            ]
		] );


        //================ Game Block Tab 04 =================//
        $games4 = new \Elementor\Repeater();
        $games4->add_control( 'tab_title', [
            'label'       => __( 'Tab Title', 'hostim-core' ),
            'description' => __( 'Tab Title will work as a category, same tab title item will show under one tab item', 'hostim-core' ),
            'type'        => Controls_Manager::TEXT,
            'label_block' => true,
            'default'	  => __('Star Wars', 'hostim-core')
        ] );

        $games4->add_control( 'feature_img', [
            'label'       => __( 'Featured Image', 'hostim-core' ),
            'type'        => Controls_Manager::MEDIA,
        ] );

        $games4->add_control( 'title', [
            'label'       => __( 'Title', 'hostim-core' ),
            'type'        => Controls_Manager::TEXT,
            'label_block' => true,
            'default'     => 'Assassin\'s Creed® Valhalla',
        ] );

        $games4->add_control( 'subtitle', [
            'label'       => __( 'Subtitle', 'hostim-core' ),
            'type'        => Controls_Manager::TEXT,
            'label_block' => true,
            'default'     => "From €2.59/slot",
        ] );

        $games4->add_control( 'btn_label', [
            'label'       => __( 'Button Label', 'hostim-core' ),
            'type'        => Controls_Manager::TEXT,
            'label_block' => true,
            'default'     => 'Explore More'
        ] );

        $games4->add_control( 'btn_url', [
            'label'       => __( 'Button Link', 'hostim-core' ),
            'type'        => Controls_Manager::URL,
            'default'     => [
                'url'     => '#'
            ]
        ] );
		$games4->add_control(
			'supported_platform',
			[
				'label' => esc_html__('Supported Platform', 'hostim-core'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'description' => __('Input fontawesome font class name use comma to separate.', 'hostim-core'),
				'default' => 'fa-windows, fa-playstation, fa-xbox',
			]
		);

        $this->add_control( 'games4', [
            'label'       => __( 'Games', 'hostim-core' ),
            'type'        => \Elementor\Controls_Manager::REPEATER,
            'fields'      => $games4->get_controls(),
            'title_field' => '{{{ tab_title }}}',
            'condition'   => [
                'layout'  => '4'
            ]
        ] ); //End Style 04


		$this->add_control(
			'after_dot_number',
			[
				'label' => esc_html__('Number after dot of Percentage', 'hostim-core'),
				'type'  => Controls_Manager::NUMBER,
				'default' => 2,
				'condition' => [
					'layout' => ['3']
				]
			]
		);
        $this->end_controls_section();

		/* Carousel Settings =================== */
		$this->start_controls_section(
		    'carousel_settings', [
			    'label' => __( 'Carousel Settings', 'hostim-core' ),
				'condition' => [
					'layout' => ['3']
				]
		    ]
	    );
	    $this->add_control(
		    'show_items_desktop', [
			    'label'     => esc_html__( 'Display Items [Desktop]', 'hostim-core' ),
			    'type'      => Controls_Manager::NUMBER,
                
		    ]
	    );
	    $this->add_control(
		    'show_items_tablet', [
			    'label'     => esc_html__( 'Display Items [Tablet]', 'hostim-core' ),
			    'type'      => Controls_Manager::NUMBER,
                
		    ]
	    );
	    $this->add_control(
		    'show_items_mobile', [
			    'label'     => esc_html__( 'Display Items [Mobile]', 'hostim-core' ),
			    'type'      => Controls_Manager::NUMBER,
                'default'	=> 1
		    ]
	    );
	    $this->add_control(
		    'item_space',
		    [
			    'label' => __( 'Item Space', 'hostim-core' ),
			    'type' => Controls_Manager::SLIDER,
			    'size_units' => [ 'px' ],
			    'range' => [
				    'px' => [
					    'min' => 0,
					    'max' => 200,
					    'step' => 1,
				    ]
			    ],
			    'default' => [
				    'size' => 24,
			    ]
		    ]
	    );
	    $this->add_control(
		    'carousel_autoplay',
		    [
			    'label' => __( 'Auto Play', 'hostim-core' ),
			    'type' => \Elementor\Controls_Manager::SWITCHER,
			    'label_on' => __( 'True', 'hostim-core' ),
			    'label_off' => __( 'False', 'hostim-core' ),
			    'return_value' => 'yes',
			    'default' => 'yes',
		    ]
	    );
	    $this->add_control(
		    'carousel_loop',
		    [
			    'label' => __( 'Loop', 'hostim-core' ),
			    'type' => \Elementor\Controls_Manager::SWITCHER,
			    'label_on' => __( 'True', 'hostim-core' ),
			    'label_off' => __( 'False', 'hostim-core' ),
			    'return_value' => 'yes',
			    'default' => 'yes',
		    ]
	    );
	    $this->add_control(
		    'slide_speed', [
			    'label' => esc_html__( 'Slide Speed', 'hostim-core' ),
			    'type' => Controls_Manager::NUMBER,
			    'min' => 0,
			    'max' => 5000,
			    'step' => 1,
                'default' => 500
		    ]
	    );
	    $this->end_controls_section();


		/*================= Buttons =================== */
		$this->start_controls_section(
			'sec_buttons', [
				'label' => __( 'Button', 'hostim-core' ),
				'condition' => [
					'layout' => [ '2' ]
				]
			]
		);

		$this->add_control(
			'btn_label', [
				'label' => esc_html__( 'Button Label', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => 'All Games'
			]
		);

		$this->add_control(
			'btn_url', [
				'label' => esc_html__( 'Button URL', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::URL,
				'default' => [
					'url' => '#'
 				]
			]
		);

		$this->end_controls_section(); //End Buttons



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
				'{{WRAPPER}} .consult-left .consult_heading' => 'color: {{VALUE}};'
			],
		] );
		$this->end_controls_section();
		
		
		// Games List item
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
			'selector' => '{{WRAPPER}} .games_list_item .list-content h4',
		] );

		$this->add_control( 'item_title_color', [
			'label'     => __( 'Color', 'hostim-core' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => '',
			'selectors' => [
				'{{WRAPPER}} .games_list_item .list-content h4' => 'color: {{VALUE}};'
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
			'selector' => '{{WRAPPER}} .games_list_item .list-content p',
		] );

		$this->add_control( 'item_desc_color', [
			'label'     => __( 'Color', 'hostim-core' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => '',
			'selectors' => [
				'{{WRAPPER}} .games_list_item .list-content p' => 'color: {{VALUE}};'
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
				'{{WRAPPER}} .consult-list .games_list_item .icon-box i' => 'color: {{VALUE}};',
			],
		] );

		$this->add_control( 'item_line_color', [
			'label'     => __( 'Border Line Color', 'hostim-core' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => '',
			'selectors' => [
				'{{WRAPPER}} .consult-list .games_list_item .icon-box' => 'border-color: {{VALUE}};',
				'{{WRAPPER}} .consult-list .games_list_item .icon-box::after' => 'background-color: {{VALUE}};',
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
					'{{WRAPPER}} .gm-feature' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .gm-product-corner' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
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
					'{{WRAPPER}} .gm-feature' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .gm-product-corner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'sec_background',
				'label' => esc_html__( 'Background', 'plugin-name' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '
					{{WRAPPER}} .consult-area,
					{{WRAPPER}} .gm-feature,
					{{WRAPPER}} .gm-product-corner.dark-bg
				',
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
		
		require __DIR__ . '/templates/game/layout-' . $layout . '.php';
		
	}
}