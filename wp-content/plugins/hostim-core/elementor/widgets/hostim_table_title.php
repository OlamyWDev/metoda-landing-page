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


class hostim_table_title extends Widget_Base {

	public function get_name() {
		return 'hostim_table_title';
	}

	public function get_title() {
		return __( 'Hostim Table Title', 'hostim-core' );
	}

	public function get_icon() {
		return 'eicon-table';
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
        $this-> hostim_elementor_content_control();
        $this-> hostim_elementor_style_control();
    }

    /**
     * Name: hostim_elementor_content_control
     * Desc: Register content
     * Params: no params
     * Return: @void
     * Since: @1.0.0
     * Package: @hostim
     * Author: Themetags
     */
    public function hostim_elementor_content_control() {


	    //======================= Select Layout ==========================//
	    $this->start_controls_section( 'sec_layout', [
		    'label' => __( 'Select Layout', 'hostim-core' ),
	    ] );

	    $this->add_control( 'layout', [
		    'label'   => esc_html__( 'Layout', 'hostim-core' ),
		    'type'    => Controls_Manager::SELECT,
		    'options' => [
			    '1' => esc_html__( 'Layout 1', 'hostim-core' ),
			    '2' => esc_html__( 'Layout 2 With Tab', 'hostim-core' ),
		    ],
		    'default' => '1',
	    ] );

	    $this->end_controls_section(); //End Layout


	    //====================== Table Title  ======================//
	    $this->start_controls_section( 'table_title_sec', [
		    'label' => __( 'Table Title', 'hostim-core' ),
	    ]);

	    $this->add_control( 'features_title', [
		    'label'       => __( 'Features Title', 'hostim-core' ),
		    'type'        => Controls_Manager::TEXT,
		    'label_block' => true,
		    'default'	  => __('All Plan Features', 'hostim-core')
	    ] );

	    $this->add_control( 'features_discount', [
		    'label'       => __( 'Features Discount', 'hostim-core' ),
		    'type'        => Controls_Manager::TEXT,
		    'label_block' => true,
		    'default'	  => __('Get 30% Off', 'hostim-core'),
		    'condition' => [
				'layout' => '2'
		    ]
	    ] );

	    $this->add_control( 'tab_title_01', [
		    'label'       => __( 'Tab Title 01', 'hostim-core' ),
		    'type'        => Controls_Manager::TEXT,
		    'default'	  => __('Monthly', 'hostim-core'),
		    'condition' => [
			    'layout' => '2'
		    ]
	    ] );

	    $this->add_control( 'tab_title_02', [
		    'label'       => __( 'Tab Title 02', 'hostim-core' ),
		    'type'        => Controls_Manager::TEXT,
		    'default'	  => __('Yearly', 'hostim-core'),
		    'condition' => [
			    'layout' => '2'
		    ]
	    ] );

	    $this->add_control( 'shape', [
		    'label'       => __( 'Shape Image', 'hostim-core' ),
		    'type'        => Controls_Manager::MEDIA,
		    'condition' => [
			    'layout' => '2'
		    ]
	    ] );

		$this->end_controls_section(); //Table Title


        //====================== Table Contents ======================//
        $this->start_controls_section( 'table_contents_sec', [
            'label' => __( 'Table Contents', 'hostim-core' ),
        ]);

		//============= Table Title 01
        $repeater = new \Elementor\Repeater();
        $repeater->add_control( 'title', [
            'label'       => __( 'Title', 'hostim-core' ),
            'type'        => Controls_Manager::TEXT,
            'default'	  => __('Windows Basic', 'hostim-core')
        ] );

        $repeater->add_control( 'price', [
            'label'       => __( 'Price', 'hostim-core' ),
            'type'        => Controls_Manager::TEXT,
            'default'	  => __('$12.50', 'hostim-core'),
        ] );

        $repeater->add_control( 'duration', [
            'label'       => __( 'Duration', 'hostim-core' ),
            'type'        => Controls_Manager::TEXT,
            'default'	  => __('/mo', 'hostim-core'),
        ] );

        $repeater->add_control( 'btn_title', [
            'label'       => __( 'Button Title', 'hostim-core' ),
            'type'        => Controls_Manager::TEXT,
            'default'	  => __('Order Now', 'hostim-core'),
            'separator'   => 'before'
        ] );

        $repeater->add_control( 'btn_url', [
            'label'       => __( 'Button URL', 'hostim-core' ),
            'type'        => Controls_Manager::URL,
            'default'	  => [
                'url'     => '#'
            ]
        ] );

        $this->add_control( 'table_features', [
            'label'       => __( 'Add Content', 'hostim-core' ),
            'type'        => \Elementor\Controls_Manager::REPEATER,
            'fields'      => $repeater->get_controls(),
            'title_field' => '{{{ title }}}',
	        'condition' => [
				'layout' => '1'
	        ]
        ] );

		//============= Table Title 01
	    $table2 = new \Elementor\Repeater();
	    $table2->add_control( 'title', [
		    'label'       => __( 'Title', 'hostim-core' ),
		    'type'        => Controls_Manager::TEXT,
		    'default'	  => __('Standard', 'hostim-core')
	    ] );

	    $table2->add_control( 'price_monthly', [
		    'label'       => __( 'Price Monthly', 'hostim-core' ),
		    'type'        => Controls_Manager::TEXT,
		    'default'	  => __('$12.50', 'hostim-core'),
	    ] );

	    $table2->add_control( 'price_yearly', [
		    'label'       => __( 'Price Yearly', 'hostim-core' ),
		    'type'        => Controls_Manager::TEXT,
		    'default'	  => __('$99.99', 'hostim-core'),
	    ] );

	    $table2->add_control( 'duration', [
		    'label'       => __( 'Duration', 'hostim-core' ),
		    'type'        => Controls_Manager::TEXT,
		    'default'	  => __('/user/month billed annually', 'hostim-core'),
	    ] );

	    $table2->add_control( 'btn_title', [
		    'label'       => __( 'Button Title', 'hostim-core' ),
		    'type'        => Controls_Manager::TEXT,
		    'default'	  => __('Try For Free', 'hostim-core'),
		    'separator'   => 'before'
	    ] );

	    $table2->add_control( 'btn_url', [
		    'label'       => __( 'Button URL', 'hostim-core' ),
		    'type'        => Controls_Manager::URL,
		    'default'	  => [
			    'url'     => '#'
		    ]
	    ] );

	    $this->add_control( 'table_features2', [
		    'label'       => __( 'Add Content', 'hostim-core' ),
		    'type'        => \Elementor\Controls_Manager::REPEATER,
		    'fields'      => $table2->get_controls(),
		    'title_field' => '{{{ title }}}',
		    'condition' => [
			    'layout' => '2'
		    ]
	    ] );

        $this->end_controls_section(); // Table Features Contents
    }


    /**
     * Name: hostim_elementor_style_control
     * Desc: Register style content
     * Params: no params
     * Return: @void
     * Since: @1.0.0
     * Package: @hostim
     * Author: Themetags
     */
    public function hostim_elementor_style_control() {

        //===================== Table Title =====================//
        $this->start_controls_section( 'style_features_title', [
            'label' => __( 'Tab Title', 'hostim-core' ),
            'tab'   => Controls_Manager::TAB_STYLE,
        ] );

        $this->add_control( 'features_title_color', [
            'label'     => __( 'Color', 'hostim-core' ),
            'type'      => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .title' => 'color: {{VALUE}};'
            ],
        ] );

        $this->add_group_control( Group_Control_Typography::get_type(), [
            'name'     => 'features_title_typo',
            'label'    => __( 'Typography', 'hostim-core' ),
            'selector' => '{{WRAPPER}} .title',
        ] );

        $this->end_controls_section(); //End Table Tab Title

        //===================== Table Title =====================//
        $this->start_controls_section( 'style_table_features', [
            'label' => __( 'Table Features', 'hostim-core' ),
            'tab'   => Controls_Manager::TAB_STYLE,
        ] );

        // Plan Title Options
        $this->add_control( 'item_title_color_opation', [
            'label'     => __( 'Title', 'hostim-core' ),
            'type'      => Controls_Manager::HEADING,
        ] );

        $this->add_control( 'item_title_color', [
            'label'     => __( 'Text Color', 'hostim-core' ),
            'type'      => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .plan-title' => 'color: {{VALUE}};'
            ],
        ] );

        $this->add_group_control( Group_Control_Typography::get_type(), [
            'name'     => 'item_title_typo',
            'selector' => '{{WRAPPER}} .plan-title',
        ] );

        $this->end_controls_section();


        //=====================price title start==================================
        $this->start_controls_section(
			'price_title_color',
			[
				'label' => esc_html__( 'Price Title Color', 'hostim-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'layout' => '2',
                ]
			]
		);

		$this->add_control(
			'price_color_title',
			[
				'label' => esc_html__( 'Title Color', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .crm-pricing-table table .title-sm' => 'color: {{VALUE}}'
				],
			]
		);
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'price_title_typography',
                'selector' => '{{WRAPPER}} .crm-pricing-table table .title-sm',
			]
		);

		$this->end_controls_section();

        //=====================price title end==================================



        // =================== price color start ==============================
        $this->start_controls_section(
			'price_color',
			[
				'label' => esc_html__( 'Price Color', 'hostim-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'color_price',
			[
				'label' => esc_html__( 'Price Color', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .rs-table table th .h4.price' => 'color: {{VALUE}}',
					'{{WRAPPER}} .crm-pricing-table table .crm-package-price' => 'color: {{VALUE}}'
				],
			]
		);
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'selector' => '{{WRAPPER}} .rs-table table th .h4.price',
				'selector' => '{{WRAPPER}} .crm-pricing-table table .crm-package-price',
			]
		);

		$this->end_controls_section();
        // =================== price color end ==============================

        //===================== month/year =====================//
        $this->start_controls_section(
			'month-year',
			[
				'label' => esc_html__( 'Month Year', 'hostim-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'layout' => '2',
                ]
			]
		);

		$this->add_control(
			'month-year-color',
			[
				'label' => esc_html__( 'Month/Year Color', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .crm-pricing-switch button' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'period_typography',
				'selector' => '{{WRAPPER}} .crm-pricing-switch button',
			]
		);

		$this->end_controls_section();
        //===================== month/year =====================//

        //===================== Button =====================//
        $this->start_controls_section( 'style_btn_sec', [
            'label' => __( 'Button', 'hostim-core' ),
            'tab'   => Controls_Manager::TAB_STYLE,
        ] );

        $this->add_control( 'item_btn_normal_color', [
            'label'     => __( 'Text Color', 'hostim-core' ),
            'type'      => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .template-btn' => 'color: {{VALUE}};',
                '{{WRAPPER}} .crm-pricing-table table .crm-package-btn' => 'color: {{VALUE}};'
            ],
        ] );

        $this->add_control( 'item_btn_hover_color', [
            'label'     => __( 'Text Hover Color', 'hostim-core' ),
            'type'      => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .template-btn:hover' => 'color: {{VALUE}};',
                '{{WRAPPER}} .rs-plans .rs-table .rs-primary-btn:hover' => 'color: {{VALUE}};',
                '{{WRAPPER}} .crm-pricing-table table .crm-package-btn:hover' => 'color: {{VALUE}};'
            ],
        ] );

        $this->end_controls_section(); // End

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
		$settings = $this->get_settings_for_display();
		extract( $settings );


        //====================== Template Parts =======================//
		require __DIR__ . '/templates/table-title/layout-'.$layout.'.php';

	}
}