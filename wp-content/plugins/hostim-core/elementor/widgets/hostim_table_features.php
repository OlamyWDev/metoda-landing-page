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


class hostim_table_features extends Widget_Base {

	public function get_name() {
		return 'hostim_table_features';
	}

	public function get_title() {
		return __( 'Hostim Table Features', 'hostim-core' );
	}

	public function get_icon() {
		return 'eicon-download-button';
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


        //========================= Select Layout ======================//
        $this->start_controls_section( 'select_layout', [
            'label' => __( 'Style', 'hostim-core' ),
        ] );

        $this->add_control( 'layout', [
            'label'   => esc_html__( 'Layout', 'hostim-core' ),
            'type'    => Controls_Manager::SELECT,
            'options' => [
                '1' => esc_html__( 'Layout 1', 'hostim-core' ),
                '2' => esc_html__( 'Layout 2 [Carousel]', 'hostim-core' ),
                '3' => esc_html__( 'Layout 3', 'hostim-core' ),
            ],
            'default' => '1',
        ] );

        $this->end_controls_section(); // End Select Layout


        //====================== Table Head ======================//
        $this->start_controls_section( 'table_head_sec', [
            'label' => __( 'Table Heading', 'hostim-core' ),
            'condition' => [
                'layout' => '2'
            ]
        ]);

        $this->add_control( 'features_title', [
            'label'       => __( 'Features Title', 'hostim-core' ),
            'type'        => Controls_Manager::TEXT,
            'label_block' => true,
            'default'	  => __('All Plan Features', 'hostim-core')
        ] );

        $repeater = new \Elementor\Repeater();
        $repeater->add_control( 'title', [
            'label'       => __( 'Title', 'hostim-core' ),
            'type'        => Controls_Manager::TEXT,
            'default'	  => __('Windows Basic', 'hostim-core')
        ]);

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

        $this->add_control( 'table_features_head', [
            'label'       => __( 'Add Content', 'hostim-core' ),
            'type'        => \Elementor\Controls_Manager::REPEATER,
            'fields'      => $repeater->get_controls(),
            'title_field' => '{{{ title }}}',
        ] );

        $this->end_controls_section(); // Table Features Title


        //====================== Table Features ======================//
        $this->start_controls_section( 'table_features_sec', [
            'label' => __( 'Table Features', 'hostim-core' ),
        ]);

        $this->add_control( 'tab_title', [
            'label'       => __( 'Title', 'hostim-core' ),
            'type'        => Controls_Manager::TEXT,
            'label_block' => true,
            'default'	  => __('Web Hosting Features', 'hostim-core')
        ] );

	    $this->add_control(
		    'is_collapse', [
			    'label' => esc_html__( 'Collapse Show/Hide', 'hostim-core' ),
			    'type' => \Elementor\Controls_Manager::SWITCHER,
			    'label_on' => esc_html__( 'Show', 'hostim-core' ),
			    'label_off' => esc_html__( 'Hide', 'hostim-core' ),
			    'return_value' => 'yes',
			    'default' => 'no',
			    'condition' => [
					'layout' => [ '3' ]
			    ],
			    'separator' => 'after'
		    ]
	    );


        //=== Table Item Repeater 01
        $repeater = new \Elementor\Repeater();
        $repeater->add_control( 'feature_title', [
            'label'       => __( 'Title', 'hostim-core' ),
            'type'        => Controls_Manager::TEXT,
            'default'	  => __('Disk Space', 'hostim-core')
        ] );

        // Content 01
        $repeater->add_control(
            'content1_style', [
                'label' => esc_html__( 'Content 01 Style', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'text',
                'options' => [
                    'text'  => esc_html__( 'Text', 'plugin-name' ),
                    'icon' => esc_html__( 'Icon', 'plugin-name' ),
                ],
                'separator' => 'before'
            ]
        );

        $repeater->add_control( 'feature_content1', [
            'label'       => __( 'Content', 'hostim-core' ),
            'type'        => Controls_Manager::TEXT,
            'default'	  => __('30GB', 'hostim-core'),
            'condition'   => [
                'content1_style' => 'text'
            ],
        ] );

        $repeater->add_control( 'feature_icon1', [
            'label'   => __( 'Icon', 'hostim-core' ),
            'type'    => Controls_Manager::ICONS,
            'default' => [
                'value'   => 'fas fa-check',
                'library' => 'solid',
            ],
            'condition'   => [
                'content1_style' => 'icon'
            ]
        ] );

        // Content 02
        $repeater->add_control(
            'content2_style', [
                'label' => esc_html__( 'Content 02 Style', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'text',
                'options' => [
                    'text'  => esc_html__( 'Text', 'plugin-name' ),
                    'icon' => esc_html__( 'Icon', 'plugin-name' ),
                ],
                'separator' => 'before'
            ]
        );

        $repeater->add_control( 'feature_content2', [
            'label'       => __( 'Content', 'hostim-core' ),
            'type'        => Controls_Manager::TEXT,
            'default'	  => __('90GB', 'hostim-core'),
            'condition'   => [
                'content2_style' => 'text'
            ],
        ] );

        $repeater->add_control( 'feature_icon2', [
            'label'   => __( 'Icon', 'hostim-core' ),
            'type'    => Controls_Manager::ICONS,
            'default' => [
                'value'   => 'fas fa-check',
                'library' => 'solid',
            ],
            'condition'   => [
                'content2_style' => 'icon'
            ]
        ] );

        // Content 03
        $repeater->add_control(
            'content3_style', [
                'label' => esc_html__( 'Content 03 Style', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'text',
                'options' => [
                    'text'  => esc_html__( 'Text', 'plugin-name' ),
                    'icon' => esc_html__( 'Icon', 'plugin-name' ),
                ],
                'separator' => 'before'
            ]
        );

        $repeater->add_control( 'feature_content3', [
            'label'       => __('Content', 'hostim-core' ),
            'type'        => Controls_Manager::TEXT,
            'default'	  => __('30GB', 'hostim-core'),
            'condition'   => [
                'content3_style' => 'text'
            ],
        ] );

        $repeater->add_control( 'feature_icon3', [
            'label'   => __( 'Icon', 'hostim-core' ),
            'type'    => Controls_Manager::ICONS,
            'default' => [
                'value'   => 'fas fa-check',
                'library' => 'solid',
            ],
            'condition'   => [
                'content3_style' => 'icon'
            ]
        ] );
        
        // Content 04
        $repeater->add_control(
            'content4_style', [
                'label' => esc_html__( 'Content 04 Style', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'text',
                'options' => [
                    'text'  => esc_html__( 'Text', 'plugin-name' ),
                    'icon' => esc_html__( 'Icon', 'plugin-name' ),
                ],
                'separator' => 'before'
            ]
        );

        $repeater->add_control( 'feature_content4', [
            'label'       => __('Content', 'hostim-core' ),
            'type'        => Controls_Manager::TEXT,
            'condition'   => [
                'content4_style' => 'text'
            ],
        ] );

        $repeater->add_control( 'feature_icon4', [
            'label'   => __( 'Icon', 'hostim-core' ),
            'type'    => Controls_Manager::ICONS,
            'default' => [
                'value'   => 'fas fa-check',
                'library' => 'solid',
            ],
            'condition'   => [
                'content4_style' => 'icon'
            ]
        ] );

        $this->add_control( 'table_features', [
            'label'       => __( 'Add Features Content', 'hostim-core' ),
            'type'        => \Elementor\Controls_Manager::REPEATER,
            'fields'      => $repeater->get_controls(),
            'title_field' => '{{{ feature_title }}}',
	        'condition' => [
				'layout' => [ '1', '2' ]
	        ]
        ] ); //End Table Title 01


	    //=== Table Item Repeater 02
	    $table2 = new \Elementor\Repeater();
	    $table2->add_control( 'feature_title', [
		    'label'       => __( 'Title', 'hostim-core' ),
		    'type'        => Controls_Manager::TEXT,
		    'default'	  => __('Disk Space', 'hostim-core')
	    ] );

	    // Content 01
	    $table2->add_control(
		    'content1_style', [
			    'label' => esc_html__( 'Content 01 Style', 'plugin-name' ),
			    'type' => \Elementor\Controls_Manager::SELECT,
			    'default' => 'text',
			    'options' => [
				    'text'  => esc_html__( 'Text', 'plugin-name' ),
				    'icon' => esc_html__( 'Icon', 'plugin-name' ),
			    ],
			    'separator' => 'before'
		    ]
	    );

	    $table2->add_control( 'feature_content1', [
		    'label'       => __( 'Content', 'hostim-core' ),
		    'type'        => Controls_Manager::TEXT,
		    'default'	  => __('30GB', 'hostim-core'),
		    'condition'   => [
			    'content1_style' => 'text'
		    ],
	    ] );

	    $table2->add_control( 'feature_icon1', [
		    'label'   => __( 'Icon', 'hostim-core' ),
		    'type'    => Controls_Manager::ICONS,
		    'default' => [
			    'value'   => 'fas fa-check',
			    'library' => 'solid',
		    ],
		    'condition'   => [
			    'content1_style' => 'icon'
		    ]
	    ] );

	    // Content 02
	    $table2->add_control(
		    'content2_style', [
			    'label' => esc_html__( 'Content 02 Style', 'plugin-name' ),
			    'type' => \Elementor\Controls_Manager::SELECT,
			    'default' => 'text',
			    'options' => [
				    'text'  => esc_html__( 'Text', 'plugin-name' ),
				    'icon' => esc_html__( 'Icon', 'plugin-name' ),
			    ],
			    'separator' => 'before'
		    ]
	    );

	    $table2->add_control( 'feature_content2', [
		    'label'       => __( 'Content', 'hostim-core' ),
		    'type'        => Controls_Manager::TEXT,
		    'default'	  => __('90GB', 'hostim-core'),
		    'condition'   => [
			    'content2_style' => 'text'
		    ],
	    ] );

	    $table2->add_control( 'feature_icon2', [
		    'label'   => __( 'Icon', 'hostim-core' ),
		    'type'    => Controls_Manager::ICONS,
		    'default' => [
			    'value'   => 'fas fa-check',
			    'library' => 'solid',
		    ],
		    'condition'   => [
			    'content2_style' => 'icon'
		    ]
	    ] );

	    // Content 03
	    $table2->add_control(
		    'content3_style', [
			    'label' => esc_html__( 'Content 03 Style', 'plugin-name' ),
			    'type' => \Elementor\Controls_Manager::SELECT,
			    'default' => 'text',
			    'options' => [
				    'text'  => esc_html__( 'Text', 'plugin-name' ),
				    'icon' => esc_html__( 'Icon', 'plugin-name' ),
			    ],
			    'separator' => 'before'
		    ]
	    );

	    $table2->add_control( 'feature_content3', [
		    'label'       => __( '150GB', 'hostim-core' ),
		    'type'        => Controls_Manager::TEXT,
		    'default'	  => __('30GB', 'hostim-core'),
		    'condition'   => [
			    'content3_style' => 'text'
		    ],
	    ] );

	    $table2->add_control( 'feature_icon3', [
		    'label'   => __( 'Icon', 'hostim-core' ),
		    'type'    => Controls_Manager::ICONS,
		    'default' => [
			    'value'   => 'fas fa-check',
			    'library' => 'solid',
		    ],
		    'condition'   => [
			    'content3_style' => 'icon'
		    ]
	    ] );

	    // Content 04
	    $table2->add_control(
		    'content4_style', [
			    'label' => esc_html__( 'Content 04 Style', 'plugin-name' ),
			    'type' => \Elementor\Controls_Manager::SELECT,
			    'default' => 'text',
			    'options' => [
				    'text'  => esc_html__( 'Text', 'plugin-name' ),
				    'icon' => esc_html__( 'Icon', 'plugin-name' ),
			    ],
			    'separator' => 'before'
		    ]
	    );

	    $table2->add_control( 'feature_content4', [
		    'label'       => __( '150GB', 'hostim-core' ),
		    'type'        => Controls_Manager::TEXT,
		    'default'	  => __('30GB', 'hostim-core'),
		    'condition'   => [
			    'content4_style' => 'text'
		    ],
	    ] );

	    $table2->add_control( 'feature_icon4', [
		    'label'   => __( 'Icon', 'hostim-core' ),
		    'type'    => Controls_Manager::ICONS,
		    'default' => [
			    'value'   => 'fas fa-check',
			    'library' => 'solid',
		    ],
		    'condition'   => [
			    'content4_style' => 'icon'
		    ]
	    ] );

	    $this->add_control( 'table_features2', [
		    'label'       => __( 'Add Features Content', 'hostim-core' ),
		    'type'        => \Elementor\Controls_Manager::REPEATER,
		    'fields'      => $table2->get_controls(),
		    'title_field' => '{{{ feature_title }}}',
		    'condition' => [
				'layout' => '3'
		    ]
	    ] );

        $this->end_controls_section(); // Table Features
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
        $this->start_controls_section( 'style_tab_title', [
            'label' => __( 'Tab Title', 'hostim-core' ),
            'tab'   => Controls_Manager::TAB_STYLE,
            'condition' => [
                'layout' => '1'
            ]
        ] );

        $this->add_control( 'tab_title_color', [
            'label'     => __( 'Color', 'hostim-core' ),
            'type'      => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .accordion-button' => 'color: {{VALUE}};',
            ],
        ] );

        $this->add_group_control( Group_Control_Typography::get_type(), [
            'name'     => 'tab_title_typo',
            'label'    => __( 'Typography', 'hostim-core' ),
            'selector' => '{{WRAPPER}} .accordion-button',
        ] );

        $this->end_controls_section(); //End Table Tab Title


        //===================== Table Features Content =====================//
        $this->start_controls_section( 'style_table_features', [
            'label' => __( 'Table Features', 'hostim-core' ),
            'tab'   => Controls_Manager::TAB_STYLE,
        ] );

        $this->add_control( 'feature_content_color', [
            'label'     => __( 'Text Color', 'hostim-core' ),
            'type'      => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .rs-info-table td' => 'color: {{VALUE}};',
                '{{WRAPPER}} .cd-table td' => 'color: {{VALUE}};',
                '{{WRAPPER}} .crm_pricing_feature_table table tbody tr td' => 'color: {{VALUE}};'
            ],
        ] );

        $this->add_group_control( Group_Control_Typography::get_type(), [
            'name'     => 'feature_content_typo',
            'selector' => '
                {{WRAPPER}} .rs-info-table td,
                {{WRAPPER}} .cd-table td,
                {{WRAPPER}} .crm_pricing_feature_table table tbody tr td
            ',
        ] );

        $this->end_controls_section(); //End Table Features Content


        //===================== Table Features Content =====================//
        $this->start_controls_section( 'style_bg_sec', [
            'label' => __( 'Background', 'hostim-core' ),
            'tab'   => Controls_Manager::TAB_STYLE,
        ] );

        $this->add_control( 'box_bg_color', [
            'label'     => __( 'Box Background Color', 'hostim-core' ),
            'type'      => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .rs-table .accordion-item .accordion-header a' => 'background-color: {{VALUE}};',
                '{{WRAPPER}} .cd-table table th' => 'background-color: {{VALUE}};',
                '{{WRAPPER}} .crm_pricing_feature_accordion .accordion-item .accordion-header a' => 'background-color: {{VALUE}};'
            ],
        ] );
        $this->add_control( 'table_bg_color', [
            'label'     => __( 'Table Background Color', 'hostim-core' ),
            'type'      => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .rs-info-table td' => 'background-color: {{VALUE}};',
                '{{WRAPPER}} .cd-table table td' => 'background-color: {{VALUE}};',
                '{{WRAPPER}} .crm_pricing_feature_table table tbody tr td' => 'background-color: {{VALUE}};'
            ],
        ] );

        $this->end_controls_section(); //End Table Features Content


        // Dark Mode Background -------------------------------------
        $dark_mode = hostim_option('is_dark_mode', false);
        if ($dark_mode) {
            $this->start_controls_section('dark_bg_style', [
                'label' => __('Dark Mode Background', 'hostim-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]);
            $this->add_group_control(Group_Control_Background::get_type(), [
                'name' => 'table_bg_dark_mode',
                'label' => esc_html__('Dark Mode Background', 'hostim-core'),
                'types' => ['classic', 'gradient'],
                'selector' => '[data-bs-theme=dark] {{WRAPPER}} .feature_section__',
            ]);
            $this->end_controls_section(); //End Section Background
        }
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
        $unique_Id = wp_unique_id('hostim-');

		$is_collapse = $settings['is_collapse'];


        //================== Template Parts
        include "templates/table-features/layout-$layout.php";

	}
}