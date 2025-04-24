<?php

namespace Hostim\Widgets;

defined( 'ABSPATH' ) || exit; // Abort, if called directly.

use Elementor\{Group_Control_Border,
	Group_Control_Box_Shadow,
	Widget_Base,
	Controls_Manager,
	Group_Control_Typography,
	Group_Control_Background,
	Utils,
	Repeater
};

class Hostim_Hero extends Widget_Base {

	public function get_name() {
		return 'hostim-hero-static';
	}

	public function get_title() {
		return __( 'Hostim Hero', 'hostim-core' );
	}

	public function get_icon() {
		return 'eicon-banner';
	}

	public function get_categories() {
		return [ 'hostim-elements' ];
	}

	protected function register_controls() {

		$this->start_controls_section( 'section_hero', [
			'label' => __( 'Hostim Hero', 'hostim-core' ),
		] );

		// Layout
		// =====================
		$this->add_control( 'layout', [
			'label'   => esc_html__( 'Layout', 'hostim-core' ),
			'type'    => Controls_Manager::SELECT,
			'options' => [
				'1' => esc_html__( 'Layout 1', 'hostim-core' ),
				'2' => esc_html__( 'Layout 2', 'hostim-core' ),
				'3' => esc_html__( 'Layout 3', 'hostim-core' ),
				'4' => esc_html__( 'Layout 4', 'hostim-core' ),
				'5' => esc_html__( 'Layout 5 [Black Friday]', 'hostim-core' ),
			],
			'default' => '1',
		] );

		$this->end_controls_section();

		// Brand Logo Section ===========================
		$this->start_controls_section( 'brand_logo_sec', [
			'label' => esc_html__( 'Brand Logo', 'hostim-core' ),
			'condition' => [
				'layout' => '1'
			]
		] );
		$this->add_control( 'brand_logo', [
			'label'   => __( 'Choose Logo Image', 'hostim-core' ),
			'type'    => Controls_Manager::MEDIA,
			'default' => [
				'url' => plugin_dir_url( __DIR__ ) . 'assets/images/hero/trust-pilot.svg'
			],
			
		] );
		$this->add_control( 'rating_image', [
			'label'   => __( 'Choose Rating Image', 'hostim-core' ),
			'type'    => Controls_Manager::MEDIA,
			'default' => [
				'url' => plugin_dir_url( __DIR__ ) . 'assets/images/hero/star-5.svg'
			],
			
		] );
		$this->end_controls_section();

		// Content Section =====================================
		$this->start_controls_section( 'section_content', [
			'label' => esc_html__( 'Contents', 'hostim-core' ),
			'condition'   => [
                'layout!'  => '5'
            ]
		] );

		$this->add_control( 'title', [
			'label'       => __( 'Title', 'hostim-core' ),
			'type'        => Controls_Manager::TEXTAREA,
			'default'     => __( 'Fastest <mark>Performance</mark> Web Hosting.', 'hostim-core' ),
			'label_block' => true,
			'description' => esc_html__( "Use <mark>Marked Text</mark> for underline mark", 'hostim-core' ),

		] );

		$this->add_control('heading_tag', [
			'label'   => esc_html__('Title Tag', 'hostim-core'),
			'type'    => Controls_Manager::SELECT,
			'options' => hostim_el_get_title_tag(),
			'default' => 'h1',
		]);

		$this->add_control( 'description', [
			'label'       => __( 'Description', 'hostim-core' ),
			'type'        => Controls_Manager::TEXTAREA,
			'default'     => __( 'Proactively coordinate quality quality vectors vis-a-vis supply chains. Quickly engage client-centric web services.', 'hostim-core' ),
			'label_block' => true,
            'condition'   => [
                'layout'  => [ '1', '2', '3' ]
            ]
		] );

		$this->end_controls_section();

		// Buttons =====================
		$this->start_controls_section( 'button_section', [
			'label' => esc_html__( 'Button', 'hostim-core' ),
			'condition' => [
				'layout!' => '5'
			]
		] );

		$this->add_control( 'btn_text', [
			'label'       => __( 'Button Label', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'placeholder' => __( 'Type your button label here', 'hostim-core' ),
			'default'     => __( 'Request For Demo', 'hostim-core' ),
		] );

		$this->add_control( 'btn_link', [
			'label'       => __( 'Button Link', 'hostim-core' ),
			'type'        => Controls_Manager::URL,
			'placeholder' => __( 'https://your-link.com', 'hostim-core' ),
			'default'     => [
				'url' => '#',
			],
		] );

		$this->add_control( 'btn_2_text', [
			'label'       => __( 'Button Two Label', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'placeholder' => __( 'Type your button label here', 'hostim-core' ),
			'default'     => __( 'How It Works', 'hostim-core' ),
			'separator'   => 'before'
		] );

		$this->add_control( 'btn_2_link', [
			'label'       => __( 'Button Two Link', 'hostim-core' ),
			'type'        => Controls_Manager::URL,
			'placeholder' => __( 'https://your-link.com', 'hostim-core' ),
			'default'     => [
				'url' => '#',
			]
		] );

		$this->add_control(
			'secondary_button_options', [
				'label' => __( 'Secondary Button', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
                'condition'   => [
                    'layout' => '2'
                ],
			]
		);

		$this->add_control( 'sec_btn_text', [
			'label'       => __( 'Secondary Button Label', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'placeholder' => __( 'Type your button label here', 'hostim-core' ),
			'default'     => __( 'How It Works', 'hostim-core' ),
			'condition'   => [
				'layout' => '2'
			],
		] );

		$this->add_control( 'sec_btn_link', [
			'label'       => __( 'Secondary Button Link', 'hostim-core' ),
			'type'        => Controls_Manager::URL,
			'placeholder' => __( 'https://your-link.com', 'hostim-core' ),
			'default'     => [
				'url' => '#',
			],
			'condition'   => [
				'layout' => '2'
			],
		] );

		$this->end_controls_section();

		/* User Count */
		$this->start_controls_section(
		    'user_count_sec',
		    [
			    'label' => __( 'User Count ', 'hostim-core' ),
				'condition' => [
					'layout' => '3'
				]
		    ]
	    );
		$this->add_control( 
			'uc_title', 
			[
				'label'       => __( 'User Count Title', 'hostim-core' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => __( '120', 'hostim-core' ),
			] 
		);
		$this->add_control( 
			'uc_title_sufix', 
			[
				'label'       => __( 'Title Suffix', 'hostim-core' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'K', 'hostim-core' ),
			] 
		);
		$this->add_control( 
			'uc_subtitle', 
			[
				'label'       => __( 'User Count Subtitle', 'hostim-core' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Satisfaction User', 'hostim-core' ),
			] 
		);
		 $this->add_control(
		    'icon_image',
		    [
			    'label' => __( 'Choose Image', 'hostim-core' ),
			    'type' => \Elementor\Controls_Manager::MEDIA,

		    ]
	    );
		$this->end_controls_section();


        // List Item =====================
        $this->start_controls_section( 'list_item_sec', [
            'label' => esc_html__( 'List Item', 'hostim-core' ),
            'condition' => [
                'layout' => '4'
            ]
        ] );

        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'text', [
                'label' => esc_html__( 'Text', 'hostim-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'List Title' , 'hostim-core' ),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'list_items', [
                'label' => esc_html__( 'Repeater List', 'hostim-core' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ text }}}',
            ]
        );

        $this->end_controls_section(); // End List Item


        // Content Box =====================
        $this->start_controls_section( 'content_box_sec', [
            'label' => esc_html__( 'Content Box', 'hostim-core' ),
            'condition' => [
                'layout' => '4'
            ]
        ] );

        $this->add_control(
            'icon_img', [
                'label' => esc_html__( 'Icon Image', 'hostim-core' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'box_contents', [
                'label' => esc_html__( 'Text', 'hostim-core' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
            ]
        );

        $this->end_controls_section(); // End Content Box


		// Black Friday Content =====================
		$this->start_controls_section( 'black_friday_content_sec', [
            'label' => esc_html__( 'Contents', 'hostim-core' ),
            'condition' => [
                'layout' => '5'
            ]
        ] );
		
		$this->add_control(
            'black_friday_img', [
                'label' => esc_html__( 'Back Friday Image', 'hostim-core' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );

		$this->add_control(
			'bf_due_date',
			[
				'label' => esc_html__( 'Black Friday Due Date', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::DATE_TIME,
			]
		);
		
		$this->add_control( 
			'bf_btn_text', [
				'label'       => __( 'Button Label', 'hostim-core' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Type your button label here', 'hostim-core' ),
				'default'     => __( 'Request For Demo', 'hostim-core' ),
			] 
		);

		$this->add_control( 
			'bf_btn_link', [
				'label'       => __( 'Button Link', 'hostim-core' ),
				'type'        => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'hostim-core' ),
				'default'     => [
					'url' => '#',
				],
			] 
		);


		$this->end_controls_section();


		// Black Friday Feature item =====================
        $this->start_controls_section( 'black_friday_feature_sec', [
            'label' => esc_html__( 'Feature Item', 'hostim-core' ),
            'condition' => [
                'layout' => '5'
            ]
        ] );

        $feature_item = new \Elementor\Repeater();
        $feature_item->add_control(
            'feature_title', [
                'label' => esc_html__( 'Title', 'hostim-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Shared Hosting' , 'hostim-core' ),
                'label_block' => true,
            ]
        );
		$feature_item->add_control( 'currency', [
			'label'       => __( 'Currency', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => "$",
			'label_block' => true,
		] );

		$feature_item->add_control( 'ragular_price', [
			'label'       => __( 'Ragular Price', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true,
		] );
		
		$feature_item->add_control( 'sale_price', [
			'label'       => __( 'Sale Price', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true,
		] );

		$feature_item->add_control( 'period', [
			'label'       => __( 'Period', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true,
		] );

		$feature_item->add_control( 'purchase_btn_label', [
			'label'       => __( 'Purchase Button Monthly Label', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => __( 'Choose Plan', 'hostim-core' ),
			'label_block' => true,
		] );

		$feature_item->add_control( 'purchase_btn_url', [
			'label'         => __( 'Purchase Button Monthly URL', 'hostim-core' ),
			'type'          => Controls_Manager::URL,
			'placeholder'   => __( 'https://your-link.com', 'hostim-core' ),
			'show_external' => true,
			'default'       => [
				'url'         => '#',
				'is_external' => true,
				'nofollow'    => true,
			],
		] );

        $this->add_control(
            'features', [
                'label' => esc_html__( 'Feature Items', 'hostim-core' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $feature_item->get_controls(),
                'title_field' => '{{{ feature_title }}}',
            ]
        );

        $this->end_controls_section(); // End List Item


		/*======================= Shape Images ============================*/
	    $shapes = new \Elementor\Repeater();
	    $this->start_controls_section(
		    'shape_image_sec', [
			    'label' => __( 'Shape Image', 'hostim-core' ),
                'condition'   => [
                    'layout' => [ '1', '2', '3', '5' ]
                ],
		    ]
	    );
	    $shapes->add_control(
		    'shape_img', [
			    'label' => __( 'Choose Image', 'hostim-core' ),
			    'type' => \Elementor\Controls_Manager::MEDIA,
		    ]
	    );
	    $shapes->add_responsive_control(
		    'horizontal_position', [
			    'label' => __( 'Horizontal Position', 'hostim-core' ),
			    'type' => Controls_Manager::SLIDER,
			    'size_units' => [ 'px', '%' ],
			    'range' => [
				    'px' => [
					    'min' => 0,
					    'max' => 1920,
					    'step' => 1,
				    ],
				    '%' => [
					    'min' => 0,
					    'max' => 100,
				    ],
			    ],
			    'default' => [
				    'unit' => '%',
				    'size' => 50,
			    ],
			    'selectors' => [
				    '{{WRAPPER}} {{CURRENT_ITEM}}' => 'left: {{SIZE}}{{UNIT}};',
			    ],
		    ]
	    );
	    $shapes->add_responsive_control(
		    'vertical_position',
		    [
			    'label' => __( 'Vertical Position', 'hostim-core' ),
			    'type' => Controls_Manager::SLIDER,
			    'size_units' => [ 'px', '%' ],
			    'range' => [
				    'px' => [
					    'min' => 0,
					    'max' => 1920,
					    'step' => 1,
				    ],
				    '%' => [
					    'min' => 0,
					    'max' => 100,
				    ],
			    ],
			    'default' => [
				    'unit' => '%',
				    'size' => 50,
			    ],
			    'selectors' => [
				    '{{WRAPPER}} {{CURRENT_ITEM}}' => 'top: {{SIZE}}{{UNIT}};',
			    ],
		    ]
	    );
	    $this->add_control(
		    'shape_images',
		    [
			    'label' => __( 'Shape Image', 'hostim-core' ),
			    'type' => \Elementor\Controls_Manager::REPEATER,
			    'fields' => $shapes->get_controls(),
			    'title_field' => '{{{ shape_img.alt }}}',
		    ]
	    );
	    $this->end_controls_section();


		// Feature Image
		// =====================
		$this->start_controls_section( 'feature_image_section', [
			'label' => __( 'Feature Image', 'hostim-core' ),
		] );

		$this->add_control( 'feature_image', [
			'label'   => __( 'Choose Image', 'hostim-core' ),
			'type'    => Controls_Manager::MEDIA,
			'default' => [
				'url' => plugin_dir_url( __DIR__ ) . 'assets/images/hero/hero-img.png'
			],
			'condition' => [
				'layout' => [ '1', '3', '4', '5' ]
			]
		] );

		$this->add_control( 'feature_image_two', [
			'label'     => __( 'Choose Image', 'hostim-core' ),
			'type'      => Controls_Manager::MEDIA,
			'default'   => [
				'url' => plugin_dir_url( __DIR__ ) . 'assets/images/banner2.png'
			],
			'condition' => [
				'layout' => '2'
			]
		] );

		$this->add_responsive_control( 'image_margin', [
			'label'      => __( 'Margin', 'hostim-core' ),
			'type'       => Controls_Manager::DIMENSIONS,
			'size_units' => [ 'px', '%', 'em' ],
			'selectors'  => [
				'{{WRAPPER}} .banner__feature-image' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
		] );

		$this->end_controls_section();


		// ================================
		$this->start_controls_section( 'hero_shapes', [
			'label'     => esc_html__( 'Shape Images', 'hostim-core' ),
			'condition' => [
				'layout' => ['1']
			]
		] );
		$this->add_control( 'shape_img_1', [
			'label'     => __( 'Choose Image', 'hostim-core' ),
			'type'      => Controls_Manager::MEDIA,
			'default'   => [
				'url' => plugin_dir_url( __DIR__ ) . 'assets/images/hero/circle.svg'
			]
		] );
		
		$this->add_control( 'shape_img_2', [
			'label'     => __( 'Choose Image', 'hostim-core' ),
			'type'      => Controls_Manager::MEDIA,
			'default'   => [
				'url' => plugin_dir_url( __DIR__ ) . 'assets/images/hero/hero-circle-left.png'
			]
		] );
		
		$this->add_control( 'shape_img_3', [
			'label'     => __( 'Choose Image', 'hostim-core' ),
			'type'      => Controls_Manager::MEDIA,
			'default'   => [
				'url' => plugin_dir_url( __DIR__ ) . 'assets/images/hero/hero-right-top.png'
			]
		] );
		
		$this->add_control( 'shape_img_4', [
			'label'     => __( 'Choose Image', 'hostim-core' ),
			'type'      => Controls_Manager::MEDIA,
			'default'   => [
				'url' => plugin_dir_url( __DIR__ ) . 'assets/images/hero/hero-right-bottom.svg'
			]
		] );
		

		$this->end_controls_section();


		

		
		// Style Settings =====================

		$this->start_controls_section( 'title_style', [
			'label' => __( 'Title', 'hostim-core' ),
			'tab'   => Controls_Manager::TAB_STYLE,
		] );

		$this->add_group_control( Group_Control_Typography::get_type(), [
			'name'     => 'title_typography',
			'label'    => __( 'Typography', 'hostim-core' ),
			'selector' => '
				{{WRAPPER}} .banner__title,
				{{WRAPPER}} .hero2-content-wrapper .display-font,				
				{{WRAPPER}} .title,		
				{{WRAPPER}} .hero1-content-wrap h1.display-font.hero_title.mt-4		
			',
		] );


		$this->add_control( 'title_color', [
			'label'     => __( 'Color', 'hostim-core' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .banner__title' => 'color: {{VALUE}}',
				'{{WRAPPER}} .hero2-content-wrapper .display-font' => 'color: {{VALUE}}',
				'{{WRAPPER}} .title' => 'color: {{VALUE}}',
				'{{WRAPPER}} .hero1-content-wrap h1.display-font.hero_title.mt-4' => 'color: {{VALUE}}',
			],
		] );

		$this->add_control(
			'mark_text_style',
			[
				'label' => __('Mark Text Style', 'hostim-core'),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control( Group_Control_Typography::get_type(), [
			'name'     => 'mark_typography',
			'label'    => __( 'Mark Text Typography', 'hostim-core' ),
			'selector' => '{{WRAPPER}} .hero_title mark',
		] );


		$this->add_control( 'mark_text_color', [
			'label'     => __( 'Color', 'hostim-core' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .hero_title mark' => 'color: {{VALUE}}',
			],
		] );

		$this->add_group_control(Group_Control_Background::get_type(), [
			'name' => 'mark_underline_img',
			'label' => esc_html__('Mark Undeline Image', 'hostim-core'),
			'types' => ['classic'],
			'exclude' => ['color'],
			'selector' => '{{WRAPPER}} .hero_title mark::after',
		]);

		$this->end_controls_section();


		// Subtitle Style
		// =====================
		$this->start_controls_section( 'sub_title_style', [
			'label' => __( 'Sub Title', 'hostim-core' ),
			'tab'   => Controls_Manager::TAB_STYLE,
            'condition' => [
                'layout' => [ '1', '2', '3' ]
            ]
		] );

		$this->add_group_control( Group_Control_Typography::get_type(), [
			'name'     => 'title_sub_typography',
			'label'    => __( 'Typography', 'hostim-core' ),
			'selector' => '{{WRAPPER}} .banner__subtitle',
		] );

		$this->add_control( 'sub_title_color', [
			'label'     => __( 'Title Color', 'hostim-core' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .banner__subtitle' => 'color: {{VALUE}}'
			],

		] );

		$this->end_controls_section();

		// Description
		// =====================
		$this->start_controls_section( 'description_section', [
			'label' => __( 'Description', 'hostim-core' ),
			'tab'   => Controls_Manager::TAB_STYLE,
            'condition' => [
                'layout' => [ '1', '2', '3' ]
            ]
		] );

		$this->add_group_control( Group_Control_Typography::get_type(), [
			'name'     => 'desc_typography',
			'label'    => __( 'Typography', 'hostim-core' ),
			'selector' => '
				{{WRAPPER}} .banner__description,
				{{WRAPPER}} .hero2-content-wrapper p.lead
			',
		] );

		$this->add_control( 'des_color', [
			'label'     => __( 'Color', 'hostim-core' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .banner__description' => 'color: {{VALUE}}',
				'{{WRAPPER}} .hero2-content-wrapper p.lead' => 'color: {{VALUE}}'
			],

		] );

		$this->end_controls_section();


		

		// Button Style =====================
		$this->start_controls_section( 'style_button', [
			'label' => __( 'Button', 'hostim-core' ),
			'tab'   => Controls_Manager::TAB_STYLE,
		] );

		$this->start_controls_tabs( 'tabs_button_style' );

		$this->start_controls_tab( 'tab_button_normal', [
			'label' => __( 'Normal', 'hostim-core' ),
		] );

		$this->add_control( 'button_text_color', [
			'label'     => __( 'Text Color', 'hostim-core' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => '',
			'selectors' => [
				'{{WRAPPER}} .banner-btn' => 'color: {{VALUE}};',
			],
		] );

		$this->add_control( 'button_bg_color', [
			'label'     => __( 'Background Color', 'hostim-core' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .banner-btn' => 'background-color: {{VALUE}};',
			],
		] );

		$this->add_group_control( Group_Control_Border::get_type(), [
			'name'     => 'button_border',
			'label'    => __( 'Border', 'hostim-core' ),
			'selector' => '{{WRAPPER}} .banner-btn',
		] );

		$this->add_group_control( Group_Control_Box_Shadow::get_type(), [
			'name'     => 'button_box_shadow',
			'label'    => __( 'Box Shadow', 'hostim-core' ),
			'selector' => '{{WRAPPER}} .banner-btn',
		] );

		$this->end_controls_tab();

		$this->start_controls_tab( 'tab_button_hover', [
			'label' => __( 'Hover', 'hostim-core' ),
		] );

		$this->add_control( 'hover_color', [
			'label'     => __( 'Color', 'hostim-core' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .banner-btn:hover' => 'color: {{VALUE}};',
			],

		] );

		$this->add_control( 'button_hover_bg_color', [
			'label'     => __( 'Background Color', 'hostim-core' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .banner-btn:hover' => 'background-color: {{VALUE}};',
			]
		] );

		$this->add_group_control( Group_Control_Border::get_type(), [
			'name'     => 'button_hover_border',
			'label'    => __( 'Border', 'hostim-core' ),
			'selector' => '{{WRAPPER}} .banner-btn:hover',
		] );

		$this->add_group_control( Group_Control_Box_Shadow::get_type(), [
			'name'     => 'button_box_shadow_hover',
			'label'    => __( 'Box Shadow', 'hostim-core' ),
			'selector' => '{{WRAPPER}} .banner-btn',
		] );

		$this->end_controls_tab();
		$this->end_controls_tabs();

		$this->add_group_control( Group_Control_Typography::get_type(), [
			'name'      => 'button_typography',
			'label'     => __( 'Typography', 'hostim-core' ),
			'selector'  => '{{WRAPPER}} .banner-btn',
			'separator' => 'before'
		] );

		$this->add_control( 'padding', [
			'label'      => __( 'Padding', 'hostim-core' ),
			'type'       => Controls_Manager::DIMENSIONS,
			'size_units' => [ 'px', '%', 'em' ],
			'selectors'  => [
				'{{WRAPPER}} .banner-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
		] );

		$this->add_control( 'border-radius', [
			'label'      => __( 'Border Radius', 'hostim-core' ),
			'type'       => Controls_Manager::DIMENSIONS,
			'size_units' => [ 'px', '%', 'em' ],
			'selectors'  => [
				'{{WRAPPER}} .banner-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
		] );

		$this->end_controls_section();

		

		// Background Settings ==========================
		$this->start_controls_section( 'style_background', [
			'label' => __( 'Section Style', 'hostim-core' ),
			'tab'   => Controls_Manager::TAB_STYLE,
		] );

		$this->add_responsive_control(
			'section_margin',
			[
				'label' => esc_html__( 'Margin', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .hostim-hero' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .hostim-hero' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control( Group_Control_Background::get_type(), [
			'name' => 'background',
			'label' => esc_html__( 'Background', 'hostim-core' ),
			'types' => [ 'classic', 'gradient' ],
			'selector' => '{{WRAPPER}} .hostim-hero',
		] );

		$this->end_controls_section();

	}


	protected function render() {
		$settings = $this->get_settings_for_display();
		extract( $settings );
		$layout   = $settings['layout'];



		require __DIR__ . '/templates/hero/layout-' . $layout . '.php';

	}
}