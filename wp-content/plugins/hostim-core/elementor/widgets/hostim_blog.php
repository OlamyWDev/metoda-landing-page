<?php

namespace Hostim\Widgets;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\{Widget_Base,
	Controls_Manager,
	Group_Control_Typography,
	Group_Control_Border,
	Group_Control_Box_Shadow,
	Group_Control_Background
};

/**
 * Get Post.
 *
 * Retrieve Hostim Post.
 *
 * @return string Hostim Post.
 * @since 1.0.0
 * @access public
 *
 */
class Hostim_Blog extends Widget_Base {

	public $base;

	public function get_name() {
		return 'hostim-blog';
	}

	public function get_title() {
		return esc_html__( 'Hostim Blog Posts', 'hostim-core' );
	}

	public function get_icon() {
		return 'eicon-posts-grid';
	}

	public function get_categories() {
		return [ 'hostim-elements' ];
	}

	protected function register_controls() {

		$this->start_controls_section( 'section_tab', [
			'label' => esc_html__( 'Blog Post', 'hostim-core' ),
		] );

		$this->add_control( 'layout', [
			'label'   => esc_html__( 'Blog Style', 'hostim-core' ),
			'type'    => Controls_Manager::SELECT,
			'default' => 1,
			'options' => [
				'1' => esc_html__( '01: Two Column Blog', 'hostim-core' ),
				'2' => esc_html__( '02: Blog [Carousel]', 'hostim-core' ),
				'3' => esc_html__( '03: Blog Grid', 'hostim-core' ),
				'4' => esc_html__( '04: Blog List', 'hostim-core' ),
				'5' => esc_html__( '05: Blog [Gaming Style]', 'hostim-core' ),
				'6' => esc_html__( '06: Blog Grid', 'hostim-core' ),
				'7' => esc_html__( '07: Blog Grid', 'hostim-core' ),
			],
		] );

		$this->end_controls_section();//End Blog Layout


		//=========================== Query Filter =====================//
		$this->start_controls_section( 'sec_filter', [
			'label' => esc_html__( 'Query Filter', 'hostim-core' ),
		] );
		
		$this->add_control(
			'author_img_switcher',
			[
				'label' => esc_html__( 'Author Image', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'hostim-core' ),
				'label_off' => esc_html__( 'Hide', 'hostim-core' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		$this->add_control(
			'author_name_switcher',
			[
				'label' => esc_html__( 'Author Name', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'hostim-core' ),
				'label_off' => esc_html__( 'Hide', 'hostim-core' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		$this->add_control(
			'like_button_hide_on',
			[
				'label' => esc_html__( 'Like Button', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'hostim-core' ),
				'label_off' => esc_html__( 'Hide', 'hostim-core' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control( 'post_count', [
			'label'   => esc_html__( 'Post count', 'hostim-core' ),
			'type'    => Controls_Manager::NUMBER,
			'default' => esc_html__( '3', 'hostim-core' ),

		] );

		$this->add_control( 'order', [
			'label'       => __( 'Sort Order', 'hostim-core' ),
			'type'        => Controls_Manager::SELECT,
			'options'     => [
				'ASC'  => esc_html__( 'Ascending', 'hostim-core' ),
				'DESC' => esc_html__( 'Descending', 'hostim-core' ),
			],
			'default'     => 'DESC',
			'separator'   => 'before',
			'description' => esc_html__( "Select Ascending or Descending order. More at", 'hostim-core' ) . '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex</a>.',
		] );

		$this->add_control( 'post_cat', [
			'label'       => esc_html__( 'Select category', 'hostim-core' ),
			'type'        => Controls_Manager::SELECT2,
			'multiple'    => true,
			'label_block' => true,
			'options'     => \Hostim_Helper::categories_suggester(),
			'default'     => '0'
		] );

		$this->add_control(
			'title_length', [
				'label' => esc_html__('Title Length', 'hostim-core'),
				'type' => \Elementor\Controls_Manager::NUMBER,
			]
		);

		$this->add_control(
			'excerpt_length', [
				'label' => esc_html__('Excerpt Word Length', 'hostim-core'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'condition' => [
					'layout' => [ '1', '2', '3', '5', '7' ],
				]
			]
		);

		$this->end_controls_section();//End Query Filter


		//========================== Button =========================//
		$this->start_controls_section( 'sec_buttons', [
			'label' => esc_html__( 'Buttons', 'hostim-core' ),
			'condition' => [
				'layout' => '6'
			]
		] );

		$this->add_control( 'btn_label', [
			'label'   => esc_html__( 'Read More Button', 'hostim-core' ),
			'type'    => Controls_Manager::TEXT,
			'default' => 'Explore More'
		] );


		$this->end_controls_section(); //End Button


		/*======================= Shape Images ============================*/
	    $shapes = new \Elementor\Repeater();
	    $this->start_controls_section(
		    'shape_image_sec',
		    [
			    'label' => __( 'Shape Image', 'hostim-core' ),
				'condition' => [
					'layout' => '5'
				]
		    ]
	    );
	    $shapes->add_control(
		    'shape_img',
		    [
			    'label' => __( 'Choose Image', 'hostim-core' ),
			    'type' => \Elementor\Controls_Manager::MEDIA,

		    ]
	    );
	    $shapes->add_responsive_control(
		    'horizontal_position',
		    [
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
		$shapes->add_control(
		    'shape_z_index',
		    [
			    'label' => __( 'Z-index', 'hostim-core' ),
			    'type' => \Elementor\Controls_Manager::NUMBER,
				'step' => 1,
				'selectors' => [
				    '{{WRAPPER}} {{CURRENT_ITEM}}' => 'z-index: {{VALUE}};',
			    ],
		    ]
	    );
		$shapes->add_control( 'bland_mode', [
			'label'   => esc_html__( 'Bland Mode', 'hostim-core' ),
			'type'    => Controls_Manager::SELECT,
			'options' => [
				'normal' 	=> esc_html__( 'Normal', 'hostim-core' ),
				'multiply'	=> esc_html__( 'Multiply', 'hostim-core' ),
				'screen'	=> esc_html__( 'Screen', 'hostim-core' ),
				'overlay'	=> esc_html__( 'Overlay', 'hostim-core' ),
				'darken'	=> esc_html__( 'Darken', 'hostim-core' ),
				'lighten'	=> esc_html__( 'Lighten', 'hostim-core' ),
				'color-dodge'=> esc_html__( 'Color-dodge', 'hostim-core' ),
				'color-burn'=> esc_html__( 'Color-burn', 'hostim-core' ),
				'difference'=> esc_html__( 'Difference', 'hostim-core' ),
				'exclusion' => esc_html__( 'Exclusion', 'hostim-core' ),
				'hue'		=> esc_html__( 'Hue', 'hostim-core' ),
				'saturation'=> esc_html__( 'Saturation', 'hostim-core' ),
				'color'		=> esc_html__( 'Color', 'hostim-core' ),
				'luminosity'=> esc_html__( 'Luminosity', 'hostim-core' ),
			],
			'default' => '',
			'selectors' => [
				'{{WRAPPER}} {{CURRENT_ITEM}}' => 'mix-blend-mode: {{VALUE}};',
			],
		] );
		$shapes->add_control(
			'shape_blur',
			[
				'label' => esc_html__( 'Blur', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					]
				],
				'default' => [
					'unit' => 'px',
					'size' => 50,
				],
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}}' => 'filter: blur( {{SIZE}}{{UNIT}} );',
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

		/* Carousel Settings =================== */
		$this->start_controls_section(
		    'carousel_settings', [
			    'label' => __( 'Carousel Settings', 'hostim-core' ),
				'condition' => [
					'layout' => ['2']
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
			    'label'        => __( 'Auto Play', 'hostim-core' ),
			    'type'         => \Elementor\Controls_Manager::SWITCHER,
			    'label_on'     => __( 'True', 'hostim-core' ),
			    'label_off'    => __( 'False', 'hostim-core' ),
			    'return_value' => 'yes',
			    'default'      => 'yes',
		    ]
	    );
		$this->add_control(
			'slide_delay',
			[
				'label'     => esc_html__('Slide Delay', 'hostim-core'),
				'type'      => Controls_Manager::NUMBER,
				'min'       => 0,
				'max'       => 5000,
				'step'      => 1,
				'default'   => 5000,
				'condition' => [
					'carousel_autoplay' => 'yes'
				]
			]
		);
		$this->add_control(
			'slide_speed',
			[
				'label' => esc_html__('Slide Speed', 'hostim-core'),
				'type' => Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 5000,
				'step' => 1,
				'default' => 500
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
	    
	    $this->end_controls_section();


		$this->start_controls_section( 'section_subtitle_style', [
			'label' => esc_html__( 'Title', 'hostim-core' ),
			'tab'   => Controls_Manager::TAB_STYLE,
		] );

		$this->add_control( 'blog_title_color', [
			'label'     => __( 'Color', 'hostim-core' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .post-grid .blog-content .entry-title a, 
                    {{WRAPPER}}  .single_blog_post .post_content h4 a' => 'color: {{VALUE}}',
			],
		] );

		$this->add_control( 'blog_title_color_hover', [
			'label'     => __( 'Hover Color', 'hostim-core' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .post-grid .blog-content .entry-title a:hover, 
                    {{WRAPPER}}  .single_blog_post .post_content h4 a:hover' => 'color: {{VALUE}}',
			],
		] );

		$this->add_group_control( Group_Control_Typography::get_type(), [
			'name'     => 'title_typography',
			'label'    => __( 'Typography', 'hostim-core' ),
			'selector' => '{{WRAPPER}} .entry-title',
		] );

		$this->end_controls_section();

		// Section background ==============================
		$this->start_controls_section( 'background_section', [
			'label' => __( 'Section Basckground', 'hostim-core' ),
			'tab'   => Controls_Manager::TAB_STYLE,
		] );

		$this->add_responsive_control( 'sec_margin', [
			'label'      => __( 'Margin', 'hostim-core' ),
			'type'       => Controls_Manager::DIMENSIONS,
			'size_units' => [ 'px', '%', 'em' ],
			'selectors'  => [
				'{{WRAPPER}} .blog-section' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
		] );

		$this->add_responsive_control( 'sec_padding', [
			'label'      => __( 'Padding', 'hostim-core' ),
			'type'       => Controls_Manager::DIMENSIONS,
			'size_units' => [ 'px', '%', 'em' ],
			'selectors'  => [
				'{{WRAPPER}} .blog-section' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
		] );
		$this->add_group_control( Group_Control_Background::get_type(), [
			'name' => 'background',
			'label' => esc_html__( 'Background', 'hostim-core' ),
			'types' => [ 'classic', 'gradient' ],
			'selector' => '{{WRAPPER}} .blog-section',
		] );

		$this->add_control( 'bg_shape_left', [
			'label'   => __( 'Choose Left Shape Image', 'hostim-core' ),
			'type'    => Controls_Manager::MEDIA,
			'default' => [
				'url' => plugin_dir_url( __DIR__ ) . 'assets/images/blog/circle-with-frame.png'
			],

		] );
		$this->add_control( 'bg_shape_right', [
			'label'   => __( 'Choose RIght Shape Image', 'hostim-core' ),
			'type'    => Controls_Manager::MEDIA,
			'default' => [
				'url' => plugin_dir_url( __DIR__ ) . 'assets/images/blog/circle-blue.png'
			],

		] );

		$this->end_controls_section();
	}

	protected function render() {
		$settings   = $this->get_settings_for_display();
		extract( $settings );
		$style      = $settings['layout'];
		$post_cat   = $settings['post_cat'];
		$post_count = $settings['post_count'];


		$paged = 1;
		if ( get_query_var( 'paged' ) ) {
			$paged = get_query_var( 'paged' );
		}
		if ( get_query_var( 'page' ) ) {
			$paged = get_query_var( 'page' );
		}

		$query['post_type'] 	= 'post';
		$query['order'] 		= $order;
		$query['post_status'] 	= 'publish';
		$query['posts_per_page']= $post_count;
		if( !empty( $post_cat ) ){
			$query['tax_query'] = array(
				array(
					'taxonomy' => 'category',
					'field'    => 'slug',
					'terms'    => $post_cat,
				)
			);
		}
		$query['paged'] = $paged;

		$hostim_query = new \WP_Query( $query );


		//====================== Template Parts ======================//
		require __DIR__ . '/templates/blog/blog-' . $layout . '.php';


	}
}
