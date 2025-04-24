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

class Hostim_Testimonial extends Widget_Base {

	public function get_name() {
		return 'hostim-testimonial';
	}

	public function get_title() {
		return esc_html__( 'Hostim Testimonial', 'hostim-core' );
	}

	public function get_icon() {
		return 'eicon-testimonial';
	}

	public function get_categories() {
		return [ 'hostim-elements' ];
	}

	protected function register_controls() {

		//======================= Select Layout ==========================//
		$this->start_controls_section( 'section_testimonial', [
			'label' => __( 'Testimonial Style', 'hostim-core' ),
		] );

		$this->add_control( 'layout', [
			'label'   => esc_html__( 'Layout', 'hostim-core' ),
			'type'    => Controls_Manager::SELECT,
			'options' => [
				'1' => esc_html__( 'Layout 1', 'hostim-core' ),
				'2' => esc_html__( 'Layout 2 [Carousel]', 'hostim-core' ),
				'3' => esc_html__( 'Layout 3 [Carousel]', 'hostim-core' ),
				'4' => esc_html__( 'Layout 4', 'hostim-core' ),
				'5' => esc_html__( 'Layout 5 [Carousel]', 'hostim-core' ),
				'6' => esc_html__( 'Layout 6 [Carousel]', 'hostim-core' ),
				'7' => esc_html__( 'Layout 7', 'hostim-core' ),
				'8' => esc_html__( 'Layout 8', 'hostim-core' ),
				'9' => esc_html__( 'Layout 9', 'hostim-core' ),
				'10' => esc_html__( 'Layout 10', 'hostim-core' ),
				'11' => esc_html__( 'Layout 11', 'hostim-core' ),
				'12' => esc_html__( 'Layout 12', 'hostim-core' ),
				'13' => esc_html__( 'Layout 13', 'hostim-core' ),
				'14' => esc_html__( 'Layout 14', 'hostim-core' ),
			],
			'default' => '1',
		] );

		$this->end_controls_section(); //End Layout


		//======================== Testimonial Heading ========================//
		$this->start_controls_section( 'testimonial_sec_heading', [
			'label' => esc_html__( 'Testimonial Heading', 'hostim-core' ),
			'condition' => [
				'layout' => [ '1', '4' ]
			]
		] );

		$this->add_control( 'sec_heading', [
			'label'       => __( 'Heading Text', 'hostim-core' ),
			'type'        => Controls_Manager::TEXTAREA,
			'default'     => __( 'Hundreds of five-star Ratings. Every day!', 'hostim-core' ),
			'label_block' => true,
		] );

		$this->add_control( 'sec_short_desc', [
			'label'       => __( 'Short Description', 'hostim-core' ),
			'type'        => Controls_Manager::TEXTAREA,
			'default'     => __( 'We truly cannot say enough about the level of customer service that Kinsta provides - it\'s always a great experience, with very personable and helpful support.', 'hostim-core' ),
			'label_block' => true,
		] );

		$this->end_controls_section(); // End Testimonial Heading


		//=========================== Testimonial =========================//
		$this->start_controls_section( 'section_tab_style', [
			'label' => esc_html__( 'Testimonial', 'hostim-core' ),
		] );

		$this->add_control( 'enable_quote', [
			'label'        => esc_html__( 'Show Quote Icon', 'hostim-core' ),
			'type'         => Controls_Manager::SWITCHER,
			'label_on'     => esc_html__( 'Show', 'hostim-core' ),
			'label_off'    => esc_html__( 'Hide', 'hostim-core' ),
			'return_value' => 'yes',
			'default'      => 'yes',
            'condition'    => [
                'layout'   => [ '1', '2', '3', '4', '5', '6' ],
            ]
		] );


		$this->add_control( 'quote_image', [
			'label'   => __( 'Quote Image', 'hostim-core' ),
			'type'    => Controls_Manager::MEDIA,
			'default' => [
				'url' => plugin_dir_url(__DIR__) . '/assets/images/testimonial/quote-icon.svg',
			],
			'condition' => [
				'enable_quote' => 'yes',
				'layout'   => [ '1', '2', '3', '4', '5', '6' ],
			]
		] );

		$repeater = new Repeater();
		$repeater->add_control( 'section_hover_image', [
			'label'   => __( 'Hover Image', 'hostim-core' ),
			'type'    => Controls_Manager::MEDIA,
			'default' => [
				'url' => plugin_dir_url(__DIR__) . '/assets/images/testimonial/client-1.png',
			]
		] );
		$repeater->add_control( 'author_image', [
			'label'   => __( 'Author Image', 'hostim-core' ),
			'type'    => Controls_Manager::MEDIA,
			'default' => [
				'url' => plugin_dir_url(__DIR__) . '/assets/images/testimonial/client-1.png',
			]
		] );

		$repeater->add_control( 'name', [
			'label'       => __( 'Name', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => __( 'Carrie Roberts', 'hostim-core' ),
			'label_block' => true,
		] );

		$repeater->add_control( 'designation', [
			'label'       => __( 'Designation', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => __( 'Co-Founder', 'hostim-core' ),
			'label_block' => true,
		] );

		$repeater->add_control( 'rating', [
			'label'   => __( 'Rating Number', 'hostim-core' ),
			'type'    => \Elementor\Controls_Manager::SELECT,
			'default' => '50',
			'options' => [
				'10' => __( '1 Star', 'hostim-core' ),
				'20' => __( '2 Star', 'hostim-core' ),
				'30' => __( '3 Star', 'hostim-core' ),
				'40' => __( '4 Star', 'hostim-core' ),
				'50' => __( '5 Star', 'hostim-core' ),
			],
			
		] );

		$repeater->add_control( 'title', [
			'label'       => __( 'Title', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => __( 'Needles to say we are extremely satisfied', 'hostim-core' ),
			'label_block' => true,
			
		] );

		$repeater->add_control( 'review_content', [
			'label'      => __( 'Review Content', 'hostim-core' ),
			'type'       => Controls_Manager::TEXTAREA,
			'default'    => __( '“If you need any help or assistance we\'d be happy to help. Just reply to this email. Trusted by Agency proud to work many well known brands”', 'hostim-core' ),
			'show_label' => false,
		] );

		$repeater->add_control( 'stamp_image', [
			'label'   => __( 'Stamp Image', 'hostim-core' ),
			'type'    => Controls_Manager::MEDIA,
			'default' => [
				'url' => plugin_dir_url(__DIR__) . '/assets/images/testimonial/stamps.png',
			],
			
		] );
		$repeater->add_control(
			'popup_vdo_link',
			[
				'label' => esc_html__( 'Link', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::URL,
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'label_block' => true,
			]
		);

		$this->add_control( 'testimonials', [
			'label'       => __( 'Testimonial Items', 'hostim-core' ),
			'type'        => Controls_Manager::REPEATER,
			'fields'      => $repeater->get_controls(),
			'title_field' => '{{{ name }}}',
            'condition' => [
                'layout' => [ '1', '2', '3', '4', '5', '6', '8', '9', '11','14']
            ]
		] );
		
		// Testimonial 13 Start ==========================
		$testimonial13 = new \Elementor\Repeater();
		$testimonial13->add_control(
			'testi_13_image',
			[
				'label' => esc_html__( 'Choose Image', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$testimonial13->add_control(
			'testi_13_quote_image',
			[
				'label' => esc_html__( 'Quote Image', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$testimonial13->add_control(
			'test13_review_content',
			[
				'label' => esc_html__( 'Review Content', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'List Title' , 'hostim-core' ),
				'label_block' => true,
			]
		);
		$testimonial13->add_control(
			'test13_name',
			[
				'label' => esc_html__( 'Name', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Jackson', 'hostim-core' ),
				'placeholder' => esc_html__( 'Type your title here', 'hostim-core' ),
				'label_block' => true,
			]
		);
		$testimonial13->add_control(
			'test13_designation',
			[
				'label' => esc_html__( 'Designation', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'WordPress Developper', 'hostim-core' ),
				'placeholder' => esc_html__( 'Type your title here', 'hostim-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'testimonial13_section',
			[
				'label' => esc_html__( 'Item List', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $testimonial13->get_controls(),
				'default' => [
					[
						'test13_name' => esc_html__( 'Jackson', 'hostim-core' ),
						'test13_designation' => esc_html__( 'WordPress Developper', 'hostim-core' ),
					],
				],
				'title_field' => '{{{ test13_name }}}',
				'condition' => [
					'layout' => '13',
				]
			]
		);
		// Testimonial 13 End ===============================


        //=================== Testimonials 07 ====================//
        $testimonials7 = new Repeater();
        $testimonials7->add_control( 'author_image', [
            'label'   => __( 'Author Image', 'hostim-core' ),
            'type'    => Controls_Manager::MEDIA,
            'default' => [
                'url' => plugin_dir_url(__DIR__) . '/assets/images/testimonial/client-1.png',
            ]
        ] );

        $testimonials7->add_control( 'name', [
            'label'   => __( 'Name', 'hostim-core' ),
            'type'    => Controls_Manager::TEXT,
            'default' => 'Elias M. Jessen'
        ] );

        $testimonials7->add_control( 'designation', [
            'label'   => __( 'Designation', 'hostim-core' ),
            'type'    => Controls_Manager::TEXT,
            'default' => 'Co-Founder'
        ] );

        $testimonials7->add_control( 'review_content', [
            'label'   => __( 'Review Content', 'hostim-core' ),
            'type'    => Controls_Manager::TEXTAREA,
        ] );

        $testimonials7->add_control( 'rating', [
            'label'   => __( 'Rating Number', 'hostim-core' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'default' => '50',
            'options' => [
                '10' => __( '1 Star', 'hostim-core' ),
                '20' => __( '2 Star', 'hostim-core' ),
                '30' => __( '3 Star', 'hostim-core' ),
                '40' => __( '4 Star', 'hostim-core' ),
                '50' => __( '5 Star', 'hostim-core' ),
            ],
        ] );

        $this->add_control( 'testimonials7', [
            'label'       => __( 'Testimonial Items', 'hostim-core' ),
            'type'        => Controls_Manager::REPEATER,
            'fields'      => $testimonials7->get_controls(),
            'title_field' => '{{{ name }}}',
            'condition' => [
                'layout' => '7'
            ]
        ] ); //End Testimonials


		//=================== Testimonials 010 ====================//
		$testimonials10 = new Repeater();
		$testimonials10->add_control( 'author_image', [
			'label'   => __( 'Author Image', 'hostim-core' ),
			'type'    => Controls_Manager::MEDIA,
			'default' => [
				'url' => plugin_dir_url(__DIR__) . '/assets/images/testimonial/client-1.png',
			]
		] );

		$testimonials10->add_control( 'title', [
			'label'   => __( 'Title', 'hostim-core' ),
			'type'    => Controls_Manager::TEXT,
			'label_block' => true,
			'default' => 'Needless to say we are extremely satisfied'
		] );


		$testimonials10->add_control( 'name', [
			'label'   => __( 'Name', 'hostim-core' ),
			'type'    => Controls_Manager::TEXT,
			'default' => 'Elias M. Jessen'
		] );

		$testimonials10->add_control( 'designation', [
			'label'   => __( 'Designation', 'hostim-core' ),
			'type'    => Controls_Manager::TEXT,
			'default' => 'Co-Founder'
		] );

		$testimonials10->add_control( 'review_content', [
			'label'   => __( 'Review Content', 'hostim-core' ),
			'type'    => Controls_Manager::TEXTAREA,
		] );

		$testimonials10->add_control( 'rating', [
			'label'   => __( 'Rating Number', 'hostim-core' ),
			'type'    => \Elementor\Controls_Manager::SELECT,
			'default' => '50',
			'options' => [
				'10' => __( '1 Star', 'hostim-core' ),
				'20' => __( '2 Star', 'hostim-core' ),
				'30' => __( '3 Star', 'hostim-core' ),
				'40' => __( '4 Star', 'hostim-core' ),
				'50' => __( '5 Star', 'hostim-core' ),
			],
		] );

		$this->add_control( 'testimonials10', [
			'label'       => __( 'Testimonial Items', 'hostim-core' ),
			'type'        => Controls_Manager::REPEATER,
			'fields'      => $testimonials10->get_controls(),
			'title_field' => '{{{ name }}}',
			'condition' => [
				'layout' => '10'
			]
		] );

		//=================== Testimonials 12 ====================//
		$testimonials12 = new Repeater();
		$testimonials12->add_control('author_name', [
			'label'   => __('Name', 'hostim-core'),
			'type'    => Controls_Manager::TEXT,
			'default' => 'Elias M. Jessen'
		]);

		$testimonials12->add_control(
			'author_designation',
			[
				'label'   => __('Designation', 'hostim-core'),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Co-Founder'
			]
		);
		$testimonials12->add_control('author_thumn', [
			'label'   => __('Author Image', 'hostim-core'),
			'type'    => Controls_Manager::MEDIA,
			'default' => [
				'url' => plugin_dir_url(__DIR__) . '/assets/images/testimonial/client-1.png',
			]
		]);
		$testimonials12->add_control('testimonial_title', [
			'label'   => __('Title', 'hostim-core'),
			'type'    => Controls_Manager::TEXT,
			'label_block' => true,
			'default' => 'Needless to say we are extremely satisfied'
		]);
		$testimonials12->add_control('testimonial_content', [
			'label'   => __('Review Content', 'hostim-core'),
			'type'    => Controls_Manager::TEXTAREA,
		]);
		$testimonials12->add_control('feature_img', [
			'label'   => __('Author Feature Image', 'hostim-core'),
			'type'    => Controls_Manager::MEDIA,
		]);
		$this->add_control('testimonials12', [
			'label'       => __('Testimonial Items', 'hostim-core' ),
			'type'        => Controls_Manager::REPEATER,
			'fields'      => $testimonials12->get_controls(),
			'title_field' => '{{{ author_name }}}',
			'condition' => [
				'layout' => '12'
			]
		]);
		$this->end_controls_section();


		//==================== Carousel Settings ===================//
		$this->start_controls_section(
		    'carousel_settings', [
			    'label' => __( 'Carousel Settings', 'hostim-core' ),
				'condition' => [
					'layout' => [ '2', '3', '5', '6', '8', '9', '10', '11', '12','13','14' ]
				]
		    ]
	    );
	    $this->add_control(
		    'show_items_desktop', [
			    'label'     => esc_html__( 'Display Items [Desktop]', 'hostim-core' ),
			    'type'      => Controls_Manager::NUMBER,
				'default' => 1
		    ]
	    );
	    $this->add_control(
		    'show_items_tablet', [
			    'label'     => esc_html__( 'Display Items [Tablet]', 'hostim-core' ),
			    'type'      => Controls_Manager::NUMBER,
			    'default' => 1
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
			'slide_delay',
			[
				'label' => esc_html__('Slide Delay', 'hostim-core'),
				'type' => Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 10000,
				'step' => 1,
				'default' => 5000
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

		// Button Setting =====================
		$this->start_controls_section( 'button_section', [
			'label' => esc_html__( 'Button', 'hostim-core' ),
			'condition' => [
				'layout' => ['1', '4']
			]
		] );

		$this->add_control( 'btn_label', [
			'label'       => __( 'Button Label', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => __( 'More Feedback', 'hostim-core' ),
			'label_block' => true,
		] );

		$this->add_control( 'btn_url', [
			'label'       => __( 'Button URL', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => __( '#', 'hostim-core' ),
			'label_block' => true,
		] );

		$this->add_control( 'btn_before_image', [
			'label'   => __( 'Button Before Image', 'hostim-core' ),
			'type'    => Controls_Manager::MEDIA,
			'default' => [
				'url' => plugin_dir_url(__DIR__) . '/assets/images/testimonial/arrow-dark.png',
			],
			'condition' => [
				'layout' => '4'
			]
		] );

		$this->end_controls_section();


		// Section heading =================
		$this->start_controls_section( 'title_style_section', [
			'label' => __( 'Section Heading', 'hostim-core' ),
			'tab'   => Controls_Manager::TAB_STYLE,
			'condition'	=> [
				'layout' => ['1', '4']
			]
		] );

		$this->add_group_control( Group_Control_Typography::get_type(), [
			'name'     => 'title_typography',
			'label'    => __( 'Typography', 'hostim-core' ),
			'selector' => '
				{{WRAPPER}} .feedbackt-top h2,
				{{WRAPPER}} .testimonial-title,
				{{WRAPPER}} .section-title .testimonial_heading
			',
		] );

		$this->add_control( 'title_color', [
			'label'     => __( 'Color', 'hostim-core' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .testimonial-title' => 'color: {{VALUE}}',
				'{{WRAPPER}} .section-title .testimonial_heading' => 'color: {{VALUE}}',
				'{{WRAPPER}} .feedbackt-top h2' => 'color: {{VALUE}}',
			],
		] );

		$this->add_group_control( Group_Control_Typography::get_type(), [
			'name'     => 'subtitle_typography',
			'label'    => __( 'Typography', 'hostim-core' ),
			'selector' => '
				{{WRAPPER}} .feedbackt-top p,
			',
		] );

		$this->add_control( 'subtitle_color', [
			'label'     => __( 'Color', 'hostim-core' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .feedbackt-top p' => 'color: {{VALUE}}',
			],
		] );

		$this->end_controls_section();



		// =========Style Sections=====================
		$this->start_controls_section( 'name_section', [
			'label' => __( 'Name', 'hostim-core' ),
			'tab'   => Controls_Manager::TAB_STYLE,
		] );

		$this->add_group_control( Group_Control_Typography::get_type(), [	
			'name'     => 'name_typography',
			'label'    => __( 'Typography', 'hostim-core' ),
			'selector' => '
				{{WRAPPER}} .name,
				{{WRAPPER}} .sh-feedback-client .t_author_name,				
				{{WRAPPER}} .clients-info .clients-designation h6,				
				{{WRAPPER}} .dm-feedback-top .dm-feedback-client-info h5,				
				{{WRAPPER}} .sh-feedback-client h6,				
				{{WRAPPER}} .h5-feedback-single-right h5,				
				{{WRAPPER}} .h4-feedback-top .h4-clients-info h6,				
				{{WRAPPER}} .item-top-content h5,				
				{{WRAPPER}} .h8-feedback-single-left h6,				
				{{WRAPPER}} .mn-feedback-top .author-info h5,				
				{{WRAPPER}} .dd-feedback-single .feedback-left h6,				
				{{WRAPPER}} .isb-author-info h6,		
				{{WRAPPER}} .author-name,		
				{{WRAPPER}} .author_name_style__		
				',
		] );

		$this->add_control( 'name_color', [
			'label'     => __( 'Color', 'hostim-core' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .name' => 'color: {{VALUE}}',
				'{{WRAPPER}} .sh-feedback-client .t_author_name' => 'color: {{VALUE}}',
				'{{WRAPPER}} .clients-info .clients-designation h6' => 'color: {{VALUE}}',
				'{{WRAPPER}} .dm-feedback-top .dm-feedback-client-info h5' => 'color: {{VALUE}}',
				'{{WRAPPER}} .sh-feedback-client h6' => 'color: {{VALUE}}',
				'{{WRAPPER}} .h5-feedback-single-right h5' => 'color: {{VALUE}}',
				'{{WRAPPER}} .h4-feedback-top .h4-clients-info h6' => 'color: {{VALUE}}',
				'{{WRAPPER}} .item-top-content h5' => 'color: {{VALUE}}',
				'{{WRAPPER}} .h8-feedback-single-left h6' => 'color: {{VALUE}}',
				'{{WRAPPER}} .mn-feedback-top .author-info h5' => 'color: {{VALUE}}',
				'{{WRAPPER}} .dd-feedback-single .feedback-left h6' => 'color: {{VALUE}}',
				'{{WRAPPER}} .isb-author-info h6' => 'color: {{VALUE}}',
				'{{WRAPPER}} .author-name' => 'color: {{VALUE}}',
				'{{WRAPPER}} .author_name_style__' => 'color: {{VALUE}}'
			],
		] );

		$this->end_controls_section();


        //==================== Designation =====================//
		$this->start_controls_section( 'designation_section', [
			'label' => __( 'Designation', 'hostim-core' ),
			'tab'   => Controls_Manager::TAB_STYLE,
		] );

		$this->add_group_control( Group_Control_Typography::get_type(), [
			'name'     => 'desi_typography',
			'label'    => __( 'Typography', 'hostim-core' ),
			'selector' => '
			    {{WRAPPER}} .sh-feedback-client .designation,
			    {{WRAPPER}} .designation,
			    {{WRAPPER}} .clients-info .clients-designation span,
			    {{WRAPPER}} .sh-feedback-client span,
			    {{WRAPPER}} .item-top-content span,
			    {{WRAPPER}} .h8-feedback-single-left span,
			    {{WRAPPER}} .mn-feedback-top .author-info span,
			    {{WRAPPER}} .dd-feedback-single .feedback-left span,
			    {{WRAPPER}} .isb-author-info p,
			    {{WRAPPER}} .author-designation,
			    {{WRAPPER}} .author_desig_style__
            ',
		] );

		$this->add_control( 'desi_color', [
			'label'     => __( 'Color', 'hostim-core' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .sh-feedback-client .designation' => 'color: {{VALUE}}',
				'{{WRAPPER}} .designation' => 'color: {{VALUE}}',
				'{{WRAPPER}} .clients-info .clients-designation span' => 'color: {{VALUE}}',
				'{{WRAPPER}} .sh-feedback-client span' => 'color: {{VALUE}}',
				'{{WRAPPER}} .item-top-content span' => 'color: {{VALUE}}',
				'{{WRAPPER}} .h8-feedback-single-left span' => 'color: {{VALUE}}',
				'{{WRAPPER}} .mn-feedback-top .author-info span' => 'color: {{VALUE}}',
				'{{WRAPPER}} .dd-feedback-single .feedback-left span' => 'color: {{VALUE}}',
				'{{WRAPPER}} .isb-author-info p' => 'color: {{VALUE}}',
				'{{WRAPPER}} .author-designation' => 'color: {{VALUE}}',
				'{{WRAPPER}} .author_desig_style__' => 'color: {{VALUE}}',
			],
		] );

		$this->end_controls_section(); //End Designation

		//==================== testimonial title stye start =====================//
		$this->start_controls_section( 'title_section', [
			'label' => __( 'Testimonial Title', 'hostim-core' ),
			'tab'   => Controls_Manager::TAB_STYLE,
		] );

		$this->add_group_control( Group_Control_Typography::get_type(), [
			'name'     => 'tes_title_typography',
			'label'    => __( 'Typography', 'hostim-core' ),
			'selector' => '
			    {{WRAPPER}} .testimonial_title,
            ',
		] );

		$this->add_control( 'tes_title_color', [
			'label'     => __( 'Color', 'hostim-core' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .testimonial_title' => 'color: {{VALUE}}',
			],
		] );

		$this->end_controls_section(); //testimonial title stye end


		// Style Review Content
		//=========================
		$this->start_controls_section( 'review_section', [
			'label' => __( 'Review Content', 'hostim-core' ),
			'tab'   => Controls_Manager::TAB_STYLE,
		] );

		$this->add_group_control( Group_Control_Typography::get_type(), [
			'name'     => 'review_typography',
			'label'    => __( 'Typography', 'hostim-core' ),
			'selector' => '
				{{WRAPPER}} .testimonial p,
				{{WRAPPER}} .sh-feedback-wrapper .review_content,
				{{WRAPPER}} .review_content,
				{{WRAPPER}} .hm2-feedback-item .quote-text,
				{{WRAPPER}} .sh-feedback-wrapper p,
				{{WRAPPER}} .h5-feedback-single-right p,
				{{WRAPPER}} .h4-feedback-single p,
				{{WRAPPER}} .item-top-content .item-content p,
				{{WRAPPER}} .h8-feedback-single-right p,
				{{WRAPPER}} .mn-feedback-single .mn-feedback-content p,
				{{WRAPPER}} .dd-feedback-single p,
				{{WRAPPER}} .isb-testimonial-content,
				{{WRAPPER}} .testimonial_content,
				{{WRAPPER}} .review_content_style__
				'
		] );

		$this->add_control( 'review_color', [
			'label'     => __( 'Color', 'hostim-core' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .testimonial p' => 'color: {{VALUE}}',
				'{{WRAPPER}} .sh-feedback-wrapper .review_content' => 'color: {{VALUE}}',
				'{{WRAPPER}} .review_content' => 'color: {{VALUE}}',
				'{{WRAPPER}} .hm2-feedback-item .quote-text' => 'color: {{VALUE}}',
				'{{WRAPPER}} .dm-feedback-single .dm-feedback-comment p' => 'color: {{VALUE}}',
				'{{WRAPPER}} .sh-feedback-wrapper p' => 'color: {{VALUE}}',
				'{{WRAPPER}} .h5-feedback-single-right p' => 'color: {{VALUE}}',
				'{{WRAPPER}} .h4-feedback-single p' => 'color: {{VALUE}}',
				'{{WRAPPER}} .h8-feedback-single-right p' => 'color: {{VALUE}}',
				'{{WRAPPER}} .mn-feedback-single .mn-feedback-content p' => 'color: {{VALUE}}',
				'{{WRAPPER}} .dd-feedback-single p' => 'color: {{VALUE}}',
				'{{WRAPPER}} .isb-testimonial-content' => 'color: {{VALUE}}',
				'{{WRAPPER}} .testimonial_content' => 'color: {{VALUE}}',
				'{{WRAPPER}} .review_content_style__' => 'color: {{VALUE}}'
			],
		] );

		$this->add_control(
			'rating_space',
			[
				'label' => esc_html__( 'Ratting Bottom Space', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .star-rating' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .hm2-feedback-item .quote-text' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
				'condition' => ['layout' => '2']
			]
		);

		$this->end_controls_section();

		// Style Slider Control Section
		//================================
		$this->start_controls_section( 'control_section', [
			'label' => __( 'Slide Navigation', 'hostim-core' ),
			'tab'   => Controls_Manager::TAB_STYLE,
			'condition' => [
				'layout' => '5'
			]
		] );

		$this->start_controls_tabs('tabs_nav_style');

		$this->start_controls_tab(
			'tab_nav_normal',
			[
				'label' => __('Normal', 'hostim-core'),
			]
		);

		$this->add_control( 'slider_nav_color', [
			'label'     => __( 'Color', 'hostim-core' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .hostim-testimonial-wrapper .slider-control > div' => 'color: {{VALUE}}',
				'{{WRAPPER}} .h5-feedback .h5-feedback-slider .swiper-controls' => 'color: {{VALUE}}',
			],
		] );

		$this->add_control( 'nav_bg_color', [
			'label'     => __( 'Background Color', 'hostim-core' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .hostim-testimonial-wrapper .slider-control > div' => 'background-color: {{VALUE}}',
				'{{WRAPPER}} .h5-feedback .h5-feedback-slider .swiper-controls' => 'background-color: {{VALUE}}',
			],
		] );

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'nav_box_shadow',
				'label' => __( 'Box Shadow', 'hostim-core' ),
				'selector' => '{{WRAPPER}} .hostim-testimonial-wrapper .slider-control > div',
				'selector' => '{{WRAPPER}} .h5-feedback .h5-feedback-slider .swiper-controls',
			]
		);

		$this->end_controls_tab();


		$this->start_controls_tab(
			'tab_nav_hover',
			[
				'label' => __('Hover', 'hostim-core'),
			]
		);

		$this->add_control( 'nav_color_hover', [
			'label'     => __( 'Color', 'hostim-core' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .hostim-testimonial-wrapper .slider-control > div:hover' => 'color: {{VALUE}}',
				'{{WRAPPER}} .h5-feedback .h5-feedback-slider .swiper-controls:hover' => 'color: {{VALUE}}',
			],
		] );

		$this->add_control( 'nav_color_bg_hover', [
			'label'     => __( 'Background Color', 'hostim-core' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .h5-feedback .h5-feedback-slider .swiper-controls:hover' => 'background-color: {{VALUE}}',
			],
		] );

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'nav_box_shadow_hover',
				'label' => __( 'Box Shadow', 'hostim-core' ),
				'selector' => '{{WRAPPER}} .hostim-testimonial-wrapper .slider-control > div:hover',
				'selector' => '{{WRAPPER}} .hostim-testimonial-wrapper .slider-control > div:hover',
				'selector' => '{{WRAPPER}} .h5-feedback .h5-feedback-slider .swiper-controls:hover',
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();


        //===================== Box Container ===========================
        $this->start_controls_section( 'item_box_container_style', [
            'label' => __( 'Box Container', 'hostim-core' ),
            'tab'   => Controls_Manager::TAB_STYLE,
            'condition' => [
                'layout' => '7'
            ]
        ] );

        $this->add_control( 'item_box_container', [
            'label'     => __( 'Background Color', 'hostim-core' ),
            'type'      => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .hostim_testimonials .ds-feedback-single' => 'background-color: {{VALUE}} !important',
            ],
        ] );

        $this->end_controls_section(); //Box Container

		// Button Style =================================================
		$this->start_controls_section(
			'button_style_section',
			[
				'label' => __('Button', 'hostim-core'),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs(	'style_btn_tabs' );
		$this->start_controls_tab(
			'style_btn_normal',
			[
				'label' => esc_html__('Normal', 'hostim-core'),
			]
		);

		$this->add_control(
			'btn_color',
			[
				'label'     => __('Button Color', 'hostim-core'),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hm2-primary-btn' => 'color: {{VALUE}}'
				],
			]
		);

		$this->add_control(
			'bg_type_normal',
			[
				'label' => esc_html__('Background Type', 'hostim-core'),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'bg_classic' => [
						'title' => esc_html__('Classic Background', 'hostim-core'),
						'icon' => 'eicon-paint-brush',
					],
					'bg_gradient' => [
						'title' => esc_html__('Gradient Background', 'hostim-core'),
						'icon' => 'eicon-barcode',
					]
				],
				'default' => 'bg_classic',
				'toggle' => true,
			]
		);
		$this->add_control(
			'btn_bg_color',
			[
				'label'     => __('background Color', 'hostim-core'),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hm2-primary-btn' => 'background: linear-gradient(287.85deg, {{VALUE}} 0%, {{VALUE}} 95.32%)'
				],
				'condition' => [
					'bg_type_normal' => 'bg_classic'
				]
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'btn_bg_color_gradient',
				'label' => __('Background', 'hostim-core'),
				'types' => ['gradient'],
				'selector' => '{{WRAPPER}} .hm2-primary-btn',
				'condition' => [
					'bg_type_normal' => 'bg_gradient'
				]
			]
		);

		$this->end_controls_tab(); //End Normal Tab

		//======== Hover Color
		$this->start_controls_tab(
			'style_btn_hover',
			[
				'label' => esc_html__('Hover', 'hostim-core'),
			]
		);

		$this->add_control(
			'btn_color_hover',
			[
				'label'     => __('Color', 'hostim-core'),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hm2-primary-btn:hover' => 'color: {{VALUE}}'
				],
			]
		);

		$this->add_control(
			'bg_type_hover',
			[
				'label' => esc_html__('Background Type', 'hostim-core'),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'bg_classic' => [
						'title' => esc_html__('Classic Background', 'hostim-core'),
						'icon' => 'eicon-paint-brush',
					],
					'bg_gradient' => [
						'title' => esc_html__('Gradient Background', 'hostim-core'),
						'icon' => 'eicon-barcode',
					]
				],
				'default' => 'bg_classic',
				'toggle' => true,
			]
		);
		$this->add_control(
			'btn_hover_bg_color',
			[
				'label'     => __('background Color', 'hostim-core'),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hm2-primary-btn:hover::before' => 'background: linear-gradient(287.85deg, {{VALUE}} 0%, {{VALUE}} 95.32%)'
				],
				'condition' => [
					'bg_type_hover' => 'bg_classic'
				]
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'btn_hover_bg_color_gradient',
				'label' => __('Background',	'hostim-core'),
				'types' => ['gradient'],
				'selector' => '{{WRAPPER}} .hm2-primary-btn:hover::before',
				'condition' => [
					'bg_type_hover' => 'bg_gradient'
				]
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs(); //End Button form tabs
		$this->end_controls_section(); //End Button Style section

		//Layout-12 Nav Icon Customization Start---------------------------------------
		$this->start_controls_section(
			'nav_position_section',
			[
				'label' => esc_html__( 'Nav Position', 'hostim-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				'condition' => [
					'layout' => '12'
				]
			]
		);
		$this->add_control(
			'nav_top',
			[
				'label' => esc_html__( 'Nav Top', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Top', 'hostim-core' ),
				'label_off' => esc_html__( 'Center', 'hostim-core' ),
				'return_value' => 'yes',
				'default' => '',
			]
		);
		$this->add_control(
			'icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .host-fs-feedback-nav button i' => 'color: {{VALUE}}',
				],
			]
		);

		$this->start_controls_tabs(
			'style_tabs'
		);
		//normal section
		$this->start_controls_tab(
			'style_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'hostim-core' ),
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background',
				'types' => [ 'classic', 'gradient'],
				'selector' => '{{WRAPPER}} .button-bg-color',
			]
		);
		$this->end_controls_tab();
		//hover section
		$this->start_controls_tab(
			'style_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'hostim-core' ),
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background_hover',
				'types' => [ 'classic', 'gradient'],
				'selector' => '{{WRAPPER}} .host-fs-feedback-nav button:hover',
			]
		);
		$this->end_controls_tab();
		
		$this->end_controls_tabs();

		$this->end_controls_section();
		//Layout-12 Nav Icon Customization End---------------------------------------

		// Style Section Background ================================
		$this->start_controls_section( 'testimonial_section', [
			'label' => __( 'Section Background', 'hostim-core' ),
			'tab'   => Controls_Manager::TAB_STYLE,
		] );

		$this->add_control(
			'testimonial_margin',
			[
				'label' => __( 'Margin', 'hostim-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .testimonial_bg_' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .isb-feedback' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'testimonial_padding',
			[
				'label' => __( 'Padding', 'hostim-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .testimonial_bg_' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .isb-feedback' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'testimonial_background',
				'label' => __( 'Background', 'hostim-core' ),
				'types' => [ 'classic', 'gradient'],
				'exclude' => ['image'],
				'selector' => '{{WRAPPER}} .testimonial_bg_',
				'selector' => '{{WRAPPER}} .isb-feedback',
			]
		);

		$this->add_control(
			'testimonial_background_heading',
			[
				'label' => esc_html__('Background Overlay', 'hostim-core'),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'layout' => '1'
				]
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'testimonial_background_overlay',
				'label' => __('Background', 'hostim-core'),
				'types' => ['classic', 'gradient'],
				'exclude' => ['image'],
				'selector' => '{{WRAPPER}} .hm2-feedback-right .gradient-bg',
				'selector' => '{{WRAPPER}} .isb-feedback'
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		extract( $settings );
		
		$desktop_items = !empty($show_items_desktop) ? $show_items_desktop : '1';
		$tablet_items  = !empty($show_items_tablet) ? $show_items_tablet : '1';

		require __DIR__ . '/templates/testimonial/layout-'.$layout.'.php';

	}


}
