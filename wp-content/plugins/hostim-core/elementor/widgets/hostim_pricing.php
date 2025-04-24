<?php

namespace Hostim\Widgets;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\{Controls_Manager,
	Group_Control_Background,
	Group_Control_Border,
	Group_Control_Box_Shadow,
	Widget_Base,
	Group_Control_Typography,
	Repeater
	};

class 	Hostim_Pricing extends Widget_Base {

	public function get_name() {
		return 'hostim-pricing';
	}

	public function get_title() {
		return esc_html__( 'Hostim Pricing', 'hostim-core' );
	}

	public function get_icon() {
		return 'eicon-price-table';
	}

	public function get_categories() {
		return [ 'hostim-elements' ];
	}

	protected function register_controls() {

		// Pricing style selection
		$this->start_controls_section( 'pricing_sec_style', [
			'label' => __( 'Pricing Style', 'hostim-core' ),
		] );
		$this->add_control( 'layout', [
			'label'   => esc_html__( 'Layout', 'hostim-core' ),
			'type'    => Controls_Manager::SELECT,
			'options' => [
				'1' => esc_html__( 'Layout 1', 'hostim-core' ),
				'2' => esc_html__( 'Layout 2 [Tab]', 'hostim-core' ),
				'3' => esc_html__( 'Layout 3', 'hostim-core' ),
				'4' => esc_html__( 'Layout 4', 'hostim-core' ),
				'5' => esc_html__( 'Layout 5 [Tab]', 'hostim-core' ),
				'6' => esc_html__( 'Layout 6 [Carousel]', 'hostim-core' ),
				'7' => esc_html__( 'Layout 7 [Managed Server]', 'hostim-core' ),
				'8' => esc_html__( 'Layout 8 [Carousel 2]', 'hostim-core' ),
				'9' => esc_html__( 'Layout 9', 'hostim-core' ),
				'10' => esc_html__( 'Layout 10', 'hostim-core' ),
			],
			'default' => '1',
		] );
		$this->end_controls_section();

		// Pricing Heading ============================
		$this->start_controls_section( 'pricing_heading_sec', [
			'label' => __( 'Pricing Heading', 'hostim-core' ),
			'condition' => [
				'layout' => ['1','3', '4','9','10']
			]
		] );

		$this->add_control( 'pricing_heading', [
			'label'       => __( 'Heading Text', 'hostim-core' ),
			'type'        => Controls_Manager::TEXTAREA,
			'default'     => __( 'We Have Perfect Web Hosting Package for You', 'hostim-core' ),
			'condition' => [
				'layout!' => '10',
			]
		] );

		$this->add_control( 'pricing_subtitle', [
			'label'       => __( 'Heading Subtitle', 'hostim-core' ),
			'type'        => Controls_Manager::TEXTAREA,
			'default'     => __( 'Clear pricing backed by our unbeatable 97-Day Money-Back Guarantee.', 'hostim-core' ),
			'condition' => [
				'layout!' => '10',
			]
		] );

		$this->add_control( 'show_tab', [
			'label'        => __( 'Show tab', 'hostim-core' ),
			'type'         => Controls_Manager::SWITCHER,
			'label_on'     => __( 'Show', 'hostim-core' ),
			'label_off'    => __( 'Hide', 'hostim-core' ),
			'return_value' => 'yes',
			'default'      => 'yes',
			'condition' => [
				'layout!' => '4',
			],
			
		] );

		$this->add_control( 'more_options', [
			'label'     => __( 'Pricing Tab Text', 'hostim-core' ),
			'type'      => Controls_Manager::HEADING,
			'separator' => 'before',
			'condition' => [
				'show_tab' => 'yes',
				'layout!' => '4',
			]
		] );

		$this->add_control( 'monthly_title', [
			'label'       => __( 'Title Month', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => __( 'Monthly Plan', 'hostim-core' ),
			'condition'   => [
				'show_tab' => 'yes',
				'layout!' => '4'
			]
		] );

		$this->add_control( 'anual_title', [
			'label'       => __( 'Title Annual', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => __( 'Yearly Plan', 'hostim-core' ),
			'condition'   => [
				'show_tab' => 'yes',
				'layout!' => '4'
			]
		] );
		$this->end_controls_section(); // End Pricing Switcher


		// Pricing Features =================
		$this->start_controls_section( 'pricing_table', [
			'label' => __( 'Pricing Table', 'hostim-core' ),
			'condition' => [
				'layout' => [ '1', '3','9','10']
			]
		] );

		$repeater = new Repeater();
		$repeater->add_control( 'is_popular', [
			'label'        => __( 'Featured on/off', 'hostim-core' ),
			'type'         => Controls_Manager::SWITCHER,
			'label_on'     => __( 'Show', 'hostim-core' ),
			'label_off'    => __( 'Hide', 'hostim-core' ),
			'return_value' => 'yes',
			'default'      => 'no',
		] );

		$repeater->add_control( 'popular_text', [
			'label'       => __( 'Popular Text', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => __( 'Most Popular', 'hostim-core' ),
			'condition'  => [
				'is_popular' => 'yes'
			]
		] );

		$repeater->add_control( 'saved_badge', [
			'label'       => __( 'Package Saved', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => __( 'Save 40%', 'hostim-core' ),
			'separator'	 => 'before'
		] );

		$repeater->add_control( 'plan_title', [
			'label'       => __( 'Plan Title', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => __( 'Basic', 'hostim-core' ),
		] );
		$repeater->add_control(
			'feature_img',
			[
				'label' => esc_html__( 'Feature Image', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_control( 'plan_subtitle', [
			'label'       => __( 'Form Title', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => "From only"
		] );

		$repeater->add_control( 'currency', [
			'label'       => __( 'Currency', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => "$",
		] );

		$repeater->add_control( 'monthly_price', [
			'label'       => __( 'Monthly Price', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
		] );

		$repeater->add_control( 'annual_price', [
			'label'       => __( 'Yearly Price', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
		] );

		$repeater->add_control( 'period', [
			'label'       => __( 'Monthly Duration', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => '/month'
		] );

		$repeater->add_control( 'yearly_period', [
			'label'       => __( 'Yearly Duration', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => '/year'
		] );

		$repeater->add_control( 'plan_desc', [
			'label'       => __( 'Short Description', 'hostim-core' ),
			'type'        => Controls_Manager::TEXTAREA,
			'label_block' => true
		] );

		$repeater->add_control( 'list_items', [
			'label'       => __( 'Price Feature', 'hostim-core' ),
			'type'        => Controls_Manager::TEXTAREA,
		] );
		
		$repeater->add_control( 'expand_feature', [
			'label'       => __( 'Expand Feature', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => __( 'Expand Feature', 'hostim-core' ),
            'description' => 'This field label will work only for <b>Layout 01</b>',
			'label_block' => true,
		] );
		$repeater->add_control( 'expand_btn_url', [
			'label'         => __( 'Expand Button URL', 'hostim-core' ),
			'type'          => Controls_Manager::URL,
			'placeholder'   => __( 'https://your-link.com', 'hostim-core' ),
			'show_external' => true,
			'default'       => [
				'url'         => '#',
				'is_external' => true,
				'nofollow'    => true,
			],
		] );

		$repeater->add_control( 'purchase_btn_label', [
			'label'       => __( 'Purchase Button Monthly Label', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => __( 'Choose Plan', 'hostim-core' ),
			'label_block' => true,
			'separator' => 'before'
		] );

		$repeater->add_control( 'purchase_btn_url', [
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

		$repeater->add_control( 'purchase_btn_label_annual', [
			'label'       => __( 'Purchase Button Annual Label', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => __( 'Choose Plan', 'hostim-core' ),
			'label_block' => true
		] );

		$repeater->add_control( 'purchase_btn_url_annual', [
			'label'         => __( 'Purchase Button Annual URL', 'hostim-core' ),
			'type'          => Controls_Manager::URL,
			'placeholder'   => __( 'https://your-link.com', 'hostim-core' ),
			'show_external' => true,
			'default'       => [
				'url'         => '#',
				'is_external' => true,
				'nofollow'    => true,
			]
		] );

		$this->add_control( 'tables', [
			'label'       => __( 'Price Table Items', 'hostim-core' ),
			'type'        => Controls_Manager::REPEATER,
			'fields'      => $repeater->get_controls(),
			'title_field' => '{{{ plan_title }}}',
			'prevent_empty' => false
		] );

		$this->end_controls_section(); // End Pricing Table


		/** Pricing 4 Repeater =================================================== */
		$this->start_controls_section( 'pricing_table_4', [
			'label' => __( 'Pricing Table', 'hostim-core' ),
			'condition' => [
				'layout' => '4'
			]
		] );

		$pricing_4 = new Repeater();
		$pricing_4->add_control(
			'table_content', [
				'label' => esc_html__( 'Table Content', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'header' => [
						'title' => esc_html__( 'Table Head', 'plugin-name' ),
						'icon' => 'eicon-text-align-left',
					],
					'features' => [
						'title' => esc_html__( 'Table Features Content', 'plugin-name' ),
						'icon' => 'eicon-text-align-center',
					],
					'footer' => [
						'title' => esc_html__( 'Table Footer', 'plugin-name' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'features',
				'toggle' => true,
			]
		);

		$pricing_4->add_control( 'features_title', [
			'label'       => __( 'Features Title', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => __( 'Plan Features', 'hostim-core' ),
			'label_block' => true,
			'condition' => [
				'table_content!' => 'footer'
			]
		] );

		$pricing_4->add_control( 'package_header_1', [
			'label'     => __( 'Package 1 Header', 'hostim-core' ),
			'type'      => Controls_Manager::HEADING,
			'separator' => 'before',
			'condition' => [
				'table_content' => 'header'
			]
		] );
		$pricing_4->add_control( 'package_title_1', [
			'label'       => __( 'Package Title', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => __( 'VPS-01', 'hostim-core' ),
			'label_block' => true,
			'condition' => [
				'table_content' => 'header'
			]
		] );
		$pricing_4->add_control( 'package_currency', [
			'label'       => __( 'Currency', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => "$",
			'label_block' => true,
			'condition' => [
				'table_content' => 'header'
			]
		] );
		$pricing_4->add_control( 'package_monthly_price', [
			'label'       => __( 'Monthly Price', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true,
			'condition' => [
				'table_content' => 'header'
			]
		] );
		$pricing_4->add_control( 'package_period', [
			'label'       => __( 'Period', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true,
			'condition' => [
				'table_content' => 'header'
			]
		] );

		$pricing_4->add_control( 'package_header_2', [
			'label'     => __( 'Package 2 Header', 'hostim-core' ),
			'type'      => Controls_Manager::HEADING,
			'separator' => 'before',
			'condition' => [
				'table_content' => 'header'
			]
		] );
		$pricing_4->add_control( 'package_2_title', [
			'label'       => __( 'Package 2 Title', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => __( 'VPS-01', 'hostim-core' ),
			'label_block' => true,
			'condition' => [
				'table_content' => 'header'
			]
		] );
		$pricing_4->add_control( 'package_2_currency', [
			'label'       => __( 'Currency', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => "$",
			'label_block' => true,
			'condition' => [
				'table_content' => 'header'
			]
		] );
		$pricing_4->add_control( 'package_2_monthly_price', [
			'label'       => __( 'Monthly Price', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true,
			'condition' => [
				'table_content' => 'header'
			]
		] );
		$pricing_4->add_control( 'package_2_period', [
			'label'       => __( 'Period', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true,
			'condition' => [
				'table_content' => 'header'
			]
		] );

		$pricing_4->add_control( 'package_header_3', [
			'label'     => __( 'Package 3 Header', 'hostim-core' ),
			'type'      => Controls_Manager::HEADING,
			'separator' => 'before',
			'condition' => [
				'table_content' => 'header'
			]
		] );
		$pricing_4->add_control( 'package_3_title', [
			'label'       => __( 'Package 3 Title', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => __( 'VPS-01', 'hostim-core' ),
			'label_block' => true,
			'condition' => [
				'table_content' => 'header'
			]
		] );
		$pricing_4->add_control( 'package_3_currency', [
			'label'       => __( 'Currency', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => "$",
			'label_block' => true,
			'condition' => [
				'table_content' => 'header'
			]
		] );
		$pricing_4->add_control( 'package_3_monthly_price', [
			'label'       => __( 'Monthly Price', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true,
			'condition' => [
				'table_content' => 'header'
			]
		] );
		$pricing_4->add_control( 'package_3_period', [
			'label'       => __( 'Period', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true,
			'condition' => [
				'table_content' => 'header'
			]
		] );

		$pricing_4->add_control( 'package_header_4', [
			'label'     => __( 'Package 4 Header', 'hostim-core' ),
			'type'      => Controls_Manager::HEADING,
			'separator' => 'before',
			'condition' => [
				'table_content' => 'header'
			]
		] );
		$pricing_4->add_control( 'package_4_title', [
			'label'       => __( 'Package 4 Title', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => __( 'VPS-01', 'hostim-core' ),
			'label_block' => true,
			'condition' => [
				'table_content' => 'header'
			]
		] );
		$pricing_4->add_control( 'package_4_currency', [
			'label'       => __( 'Currency', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => "$",
			'label_block' => true,
			'condition' => [
				'table_content' => 'header'
			]
		] );
		$pricing_4->add_control( 'package_4_monthly_price', [
			'label'       => __( 'Monthly Price', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true,
			'condition' => [
				'table_content' => 'header'
			]
		] );
		$pricing_4->add_control( 'package_4_period', [
			'label'       => __( 'Period', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true,
			'condition' => [
				'table_content' => 'header'
			]
		] );

		$pricing_4->add_control( 'package_header_5', [
			'label'     => __( 'Package 5 Header', 'hostim-core' ),
			'type'      => Controls_Manager::HEADING,
			'separator' => 'before',
			'condition' => [
				'table_content' => 'header'
			]
		] );
		$pricing_4->add_control( 'package_5_title', [
			'label'       => __( 'Package 5 Title', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => __( 'VPS-01', 'hostim-core' ),
			'label_block' => true,
			'condition' => [
				'table_content' => 'header'
			]
		] );
		$pricing_4->add_control( 'package_5_currency', [
			'label'       => __( 'Currency', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => "$",
			'label_block' => true,
			'condition' => [
				'table_content' => 'header'
			]
		] );
		$pricing_4->add_control( 'package_5_monthly_price', [
			'label'       => __( 'Monthly Price', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true,
			'condition' => [
				'table_content' => 'header'
			]
		] );
		$pricing_4->add_control( 'package_5_period', [
			'label'       => __( 'Period', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true,
			'condition' => [
				'table_content' => 'header'
			]
		] );

		$pricing_4->add_control( 'feature_1', [
			'label'     => __( 'Package 1 Feature', 'hostim-core' ),
			'type'      => Controls_Manager::HEADING,
			'separator' => 'before',
			'condition' => [
				'table_content' => 'features'
			]
		] );
		$pricing_4->add_control( 'features_type', [
			'label'   => esc_html__( 'Select Features Type', 'hostim-core' ),
			'type'    => Controls_Manager::SELECT,
			'options' => [
				'text' => esc_html__( 'Text', 'hostim-core' ),
				'icon' => esc_html__( 'Icon', 'hostim-core' ),
			],
			'default' => 'text',
			'condition' => [
				'table_content' => 'features'
			]
		] );
		$pricing_4->add_control( 'feature_title', [
			'label'       => __( 'Feature Title', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true,
			'condition' => [
				'features_type' => 'text',
				'table_content' => 'features'
			]
		] );
		$pricing_4->add_control( 'selected_icon', [
			'label'   => __( 'Icon', 'hostim-core' ),
			'type'    => Controls_Manager::ICONS,
			'default' => [
				'value'   => 'fas fa-check',
				'library' => 'solid',
			],
			'condition' => [
				'features_type' => 'icon',
				'table_content' => 'features'
			]
		] );


		$pricing_4->add_control( 'feature_2', [
			'label'     => __( 'Package 2 Feature', 'hostim-core' ),
			'type'      => Controls_Manager::HEADING,
			'separator' => 'before',
			'condition' => [
				'table_content' => 'features'
			]
		] );
		$pricing_4->add_control( 'p2_features_type', [
			'label'   => esc_html__( 'Select Features Type', 'hostim-core' ),
			'type'    => Controls_Manager::SELECT,
			'options' => [
				'text' => esc_html__( 'Text', 'hostim-core' ),
				'icon' => esc_html__( 'Icon', 'hostim-core' ),
			],
			'default' => 'text',
			'condition' => [
				'table_content' => 'features'
			]
		] );
		$pricing_4->add_control( 'p2_feature_title', [
			'label'       => __( 'Feature Title', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true,
			'condition' => [
				'p2_features_type' => 'text',
				'table_content' => 'features'
			]
		] );
		$pricing_4->add_control( 'p2_selected_icon', [
			'label'   => __( 'Icon', 'hostim-core' ),
			'type'    => Controls_Manager::ICONS,
			'default' => [
				'value'   => 'fas fa-check',
				'library' => 'solid',
			],
			'condition' => [
				'p2_features_type' => 'icon',
				'table_content' => 'features'
			]
		] );

		$pricing_4->add_control( 'feature_3', [
			'label'     => __( 'Package 3 Feature', 'hostim-core' ),
			'type'      => Controls_Manager::HEADING,
			'separator' => 'before',
			'condition' => [
				'table_content' => 'features'
			]
		] );
		$pricing_4->add_control( 'p3_features_type', [
			'label'   => esc_html__( 'Select Features Type', 'hostim-core' ),
			'type'    => Controls_Manager::SELECT,
			'options' => [
				'text' => esc_html__( 'Text', 'hostim-core' ),
				'icon' => esc_html__( 'Icon', 'hostim-core' ),
			],
			'default' => 'text',
			'condition' => [
				'table_content' => 'features'
			]
		] );
		$pricing_4->add_control( 'p3_feature_title', [
			'label'       => __( 'Feature Title', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true,
			'condition' => [
				'p3_features_type' => 'text',
				'table_content' => 'features'
			]
		] );
		$pricing_4->add_control( 'p3_selected_icon', [
			'label'   => __( 'Icon', 'hostim-core' ),
			'type'    => Controls_Manager::ICONS,
			'default' => [
				'value'   => 'fas fa-check',
				'library' => 'solid',
			],
			'condition' => [
				'p3_features_type' => 'icon',
				'table_content' => 'features'
			]
		] );

		$pricing_4->add_control( 'feature_4', [
			'label'     => __( 'Package 4 Feature', 'hostim-core' ),
			'type'      => Controls_Manager::HEADING,
			'separator' => 'before',
			'condition' => [
				'table_content' => 'features'
			]
		] );
		$pricing_4->add_control( 'p4_features_type', [
			'label'   => esc_html__( 'Select Features Type', 'hostim-core' ),
			'type'    => Controls_Manager::SELECT,
			'options' => [
				'text' => esc_html__( 'Text', 'hostim-core' ),
				'icon' => esc_html__( 'Icon', 'hostim-core' ),
			],
			'default' => 'text',
			'condition' => [
				'table_content' => 'features'
			]
		] );
		$pricing_4->add_control( 'p4_feature_title', [
			'label'       => __( 'Feature Title', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true,
			'condition' => [
				'p4_features_type' => 'text',
				'table_content' => 'features'
			]
		] );
		$pricing_4->add_control( 'p4_selected_icon', [
			'label'   => __( 'Icon', 'hostim-core' ),
			'type'    => Controls_Manager::ICONS,
			'default' => [
				'value'   => 'fas fa-check',
				'library' => 'solid',
			],
			'condition' => [
				'p4_features_type' => 'icon',
				'table_content' => 'features'
			]
		] );

		$pricing_4->add_control( 'feature_5', [
			'label'     => __( 'Package 5 Feature', 'hostim-core' ),
			'type'      => Controls_Manager::HEADING,
			'separator' => 'before',
			'condition' => [
				'table_content' => 'features'
			]
		] );
		$pricing_4->add_control( 'p5_features_type', [
			'label'   => esc_html__( 'Select Features Type', 'hostim-core' ),
			'type'    => Controls_Manager::SELECT,
			'options' => [
				'text' => esc_html__( 'Text', 'hostim-core' ),
				'icon' => esc_html__( 'Icon', 'hostim-core' ),
			],
			'default' => 'text',
			'condition' => [
				'table_content' => 'features'
			]
		] );
		$pricing_4->add_control( 'p5_feature_title', [
			'label'       => __( 'Feature Title', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true,
			'condition' => [
				'p5_features_type' => 'text',
				'table_content' => 'features'
			]
		] );
		$pricing_4->add_control( 'p5_selected_icon', [
			'label'   => __( 'Icon', 'hostim-core' ),
			'type'    => Controls_Manager::ICONS,
			'default' => [
				'value'   => 'fas fa-check',
				'library' => 'solid',
			],
			'condition' => [
				'p5_features_type' => 'icon',
				'table_content' => 'features'
			]
		] );


		$pricing_4->add_control( 'button_1', [
			'label'     => __( 'Package 1 Purchase Button', 'hostim-core' ),
			'type'      => Controls_Manager::HEADING,
			'separator' => 'before',
			'condition' => [
				'table_content' => 'footer'
			]
		] );
		$pricing_4->add_control( 'btn_label_1', [
			'label'       => __( 'Package 1 Purchase Button', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => __( 'Select', 'hostim-core' ),
			'label_block' => true,
			'condition' => [
				'table_content' => 'footer'
			]
		] );

		$pricing_4->add_control( 'btn_url_1', [
			'label'         => __( 'Package 1 Purchase Button URL', 'hostim-core' ),
			'type'          => Controls_Manager::URL,
			'placeholder'   => __( 'https://your-link.com', 'hostim-core' ),
			'show_external' => true,
			'default'       => [
				'url'         => '#',
				'is_external' => true,
				'nofollow'    => true,
			],
			'condition' => [
				'table_content' => 'footer'
			]
		] );

		$pricing_4->add_control( 'button_2', [
			'label'     => __( 'Package 5 Purchase Button', 'hostim-core' ),
			'type'      => Controls_Manager::HEADING,
			'separator' => 'before',
			'condition' => [
				'table_content' => 'footer'
			]
		] );
		$pricing_4->add_control( 'btn_label_2', [
			'label'       => __( 'Package 2 Purchase Button', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => __( 'Select', 'hostim-core' ),
			'label_block' => true,
			'condition' => [
				'table_content' => 'footer'
			]
		] );
		$pricing_4->add_control( 'btn_url_2', [
			'label'         => __( 'Package 2 Purchase Button URL', 'hostim-core' ),
			'type'          => Controls_Manager::URL,
			'placeholder'   => __( 'https://your-link.com', 'hostim-core' ),
			'show_external' => true,
			'default'       => [
				'url'         => '#',
				'is_external' => true,
				'nofollow'    => true,
			],
			'condition' => [
				'table_content' => 'footer'
			]
		] );

		$pricing_4->add_control( 'button_3', [
			'label'     => __( 'Package 3 Purchase Button', 'hostim-core' ),
			'type'      => Controls_Manager::HEADING,
			'separator' => 'before',
			'condition' => [
				'table_content' => 'footer'
			]
		] );
		$pricing_4->add_control( 'btn_label_3', [
			'label'       => __( 'Package 3 Purchase Button', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => __( 'Select', 'hostim-core' ),
			'label_block' => true,
			'condition' => [
				'table_content' => 'footer'
			]
		] );
		$pricing_4->add_control( 'btn_url_3', [
			'label'         => __( 'Package 3 Purchase Button URL', 'hostim-core' ),
			'type'          => Controls_Manager::URL,
			'placeholder'   => __( 'https://your-link.com', 'hostim-core' ),
			'show_external' => true,
			'default'       => [
				'url'         => '#',
				'is_external' => true,
				'nofollow'    => true,
			],
			'condition' => [
				'table_content' => 'footer'
			]
		] );

		$pricing_4->add_control( 'button_4', [
			'label'     => __( 'Package 4 Purchase Button', 'hostim-core' ),
			'type'      => Controls_Manager::HEADING,
			'separator' => 'before',
			'condition' => [
				'table_content' => 'footer'
			]
		] );
		$pricing_4->add_control( 'btn_label_4', [
			'label'       => __( 'Package 4 Purchase Button', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => __( 'Select', 'hostim-core' ),
			'label_block' => true,
			'condition' => [
				'table_content' => 'footer'
			]
		] );
		$pricing_4->add_control( 'btn_url_4', [
			'label'         => __( 'Package 4 Purchase Button URL', 'hostim-core' ),
			'type'          => Controls_Manager::URL,
			'placeholder'   => __( 'https://your-link.com', 'hostim-core' ),
			'show_external' => true,
			'default'       => [
				'url'         => '#',
				'is_external' => true,
				'nofollow'    => true,
			],
			'condition' => [
				'table_content' => 'footer'
			]
		] );

		$pricing_4->add_control( 'button_5', [
			'label'     => __( 'Package 5 Purchase Button', 'hostim-core' ),
			'type'      => Controls_Manager::HEADING,
			'separator' => 'before',
			'condition' => [
				'table_content' => 'footer'
			]
		] );
		$pricing_4->add_control( 'btn_label_5', [
			'label'       => __( 'Package 5 Purchase Button', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => __( 'Select', 'hostim-core' ),
			'label_block' => true,
			'condition' => [
				'table_content' => 'footer'
			]
		] );
		$pricing_4->add_control( 'btn_url_5', [
			'label'         => __( 'Package 5 Purchase Button URL', 'hostim-core' ),
			'type'          => Controls_Manager::URL,
			'placeholder'   => __( 'https://your-link.com', 'hostim-core' ),
			'show_external' => true,
			'default'       => [
				'url'         => '#',
				'is_external' => true,
				'nofollow'    => true,
			],
			'condition' => [
				'table_content' => 'footer'
			]
		] );

		$this->add_control( 'p4_tables', [
			'label'       => __( 'Price Table Items', 'hostim-core' ),
			'type'        => Controls_Manager::REPEATER,
			'fields'      => $pricing_4->get_controls(),
			'default'     => [],
			'title_field' => '{{{ features_title }}}',
		] );
		$this->end_controls_section();
		/** End Pricing 4 Repeater =============================================== */



		$this->start_controls_section( 'pricing_item_column', [
			'label' => __( 'Pricing Table Column', 'hostim-core' ),
			'condition' => [
				'layout!' => ['4', '5', '6', '8']
			]
		] );
		$this->add_control( 'column_desktop', [
			'label'   => esc_html__( 'Column - Desktop View', 'hostim-core' ),
			'type'    => Controls_Manager::SELECT,
			'options' => [
				'6' => esc_html__( '2 Column', 'hostim-core' ),
				'4' => esc_html__( '3 Column', 'hostim-core' ),
				'3' => esc_html__( '4 Column', 'hostim-core' ),
			],
			'default' => '3',
		] );
		$this->add_control( 'column_tablet', [
			'label'   => esc_html__( 'Column - Tablet View', 'hostim-core' ),
			'type'    => Controls_Manager::SELECT,
			'options' => [
				'6' => esc_html__( '2 Column', 'hostim-core' ),
				'4' => esc_html__( '3 Column', 'hostim-core' ),
				'3' => esc_html__( '4 Column', 'hostim-core' ),
			],
			'default' => '4',
		] );
		$this->end_controls_section(); // End Pricing Table



		// Pricing Features =================
		$this->start_controls_section( 'pricing_table_tab', [
			'label' => __( 'Pricing Table With Tab', 'hostim-core' ),
			'condition' => [
				'layout' => [ '2', '5' ]
			]
		] );

		$repeater2 = new Repeater();
		$repeater2->add_control( 'tab_title', [
			'label'       => __( 'Tab Title', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'description' => __('Tab title will work as a category, same package title will show under one tab item.', 'hostim-core'),
			'default'     => __( 'Domain & Hosting', 'hostim-core' ),
			'label_block' => true,
		] );

		$repeater2->add_control( 'p2_is_popular', [
			'label'        => __( 'Featured on/off', 'hostim-core' ),
			'type'         => Controls_Manager::SWITCHER,
			'label_on'     => __( 'Show', 'hostim-core' ),
			'label_off'    => __( 'Hide', 'hostim-core' ),
			'return_value' => 'yes',
			'default'      => 'no',
		] );

		$repeater2->add_control( 'p2_popular_badge_text', [
			'label'       => __( 'Popular Badge Text', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => __( 'Most Popular', 'hostim-core' ),
			'label_block' => true,
			'condition' => [
				'p2_is_popular' => 'yes'
			]
		] );

		$repeater2->add_control( 'p2_saved_badge', [
			'label'       => __( 'Discount Badge', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => __( 'Save', 'hostim-core' ),
		] );


		$repeater2->add_control( 'p2_package_icon', [
			'label'       => __( 'Plan Feature Image', 'hostim-core' ),
			'type'        => Controls_Manager::MEDIA,
			'label_block' => true,
		] );

		$repeater2->add_control( 'p2_plan_title', [
			'label'       => __( 'Plan Title', 'hostim-core' ),
			'type'        => Controls_Manager::TEXTAREA,
			'default'     => __( 'Basic', 'hostim-core' ),
			'label_block' => true,
		] );

		$repeater2->add_control( 'p2_currency', [
			'label'       => __( 'Currency', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => "$",
		] );

		$repeater2->add_control( 'ragular_price', [
			'label'       => __( 'Ragular Price', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
		] );

		$repeater2->add_control( 'sale_price', [
			'label'       => __( 'Sale Price', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
		] );

		$repeater2->add_control( 'p2_period', [
			'label'       => __( 'Period', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
		] );
		$repeater2->add_control( 'p2_plan_desc', [
			'label'       => __( 'Short Description', 'hostim-core' ),
			'type'        => Controls_Manager::TEXTAREA,
			'label_block' => true,
		] );

		$repeater2->add_control( 'p2_list_items', [
			'label'       => __( 'Price Feature', 'hostim-core' ),
			'type'        => Controls_Manager::TEXTAREA,
			'default'     => 'Limited Acess Library
                              Single User
                              Hotline Support 24/7
                              No Updates',
		] );

		$repeater2->add_control( 'expand_feature', [
			'label'       => __( 'Expand Feature', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => __( 'Expand Feature', 'hostim-core' ),
		] );

		$repeater2->add_control( 'p2_purchase_btn_label', [
			'label'       => __( 'Purchase Button Monthly Label', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => __( 'Choose Plan', 'hostim-core' ),
			'label_block' => true,
            'separator' => 'before'
		] );

		$repeater2->add_control( 'p2_purchase_btn_url', [
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

		$this->add_control( 'p2_tables', [
			'label'       => __( 'Price Table Items', 'hostim-core' ),
			'type'        => Controls_Manager::REPEATER,
			'fields'      => $repeater2->get_controls(),
			'title_field' => '{{{ tab_title }}} - {{{ p2_plan_title }}}',
		] );

		$this->add_control(
			'after_dot_number',
			[
				'label' => esc_html__('Number after dot of Percentage', 'hostim-core'),
				'type'  => Controls_Manager::NUMBER,
				'default' => 2,
				'condition' => [
					'layout' => ['2']
				]
			]
		);
		$this->end_controls_section();
		// End Pricing Table


		// Pricing Features =================
		$this->start_controls_section( 'pricing_table_carousel', [
			'label' => __( 'Pricing Table Carousel', 'hostim-core' ),
			'condition' => [
				'layout' => [ '6', '8' ]
			]
		] );
		$pricing_carousel = new Repeater();

		$pricing_carousel->add_control( 'package_title', [
			'label'       => __( 'Package Title', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => __( 'Premium Web Hosting', 'hostim-core' ),
			'label_block' => true,
		] );

		$pricing_carousel->add_control( 's6_package_icon', [
			'label'       => __( 'Feature Image', 'hostim-core' ),
			'type'        => Controls_Manager::MEDIA,
			'label_block' => true,
		] );

		$pricing_carousel->add_control( 's6_currency', [
			'label'       => __( 'Currency', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => "$",
			'label_block' => true,
		] );

		$pricing_carousel->add_control( 's6_ragular_price', [
			'label'       => __( 'Ragular Price', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true,
		] );

		$pricing_carousel->add_control( 'vat_text', [
			'label'       => __( 'Vat Text', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => 'Ex VAT',
			'label_block' => true,
		] );

		$pricing_carousel->add_control( 's6_period', [
			'label'       => __( 'Period', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true,
		] );
		$pricing_carousel->add_control( 's6_plan_desc', [
			'label'       => __( 'Short Description', 'hostim-core' ),
			'type'        => Controls_Manager::TEXTAREA,
			'label_block' => true,
		] );

		$pricing_carousel->add_control( 's8_plan_features', [
			'label'       => __( 'Features List', 'hostim-core' ),
			'type'        => Controls_Manager::TEXTAREA,
			'label_block' => true,
		] );

		$pricing_carousel->add_control( 's6_purchase_btn_label', [
			'label'       => __( 'Purchase Button Label', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => __( 'Choose Plan', 'hostim-core' ),
			'label_block' => true,
		] );

		$pricing_carousel->add_control( 's6_purchase_btn_url', [
			'label'         => __( 'Purchase Button URL', 'hostim-core' ),
			'type'          => Controls_Manager::URL,
			'placeholder'   => __( 'https://your-link.com', 'hostim-core' ),
			'show_external' => true,
			'default'       => [
				'url'         => '#',
				'is_external' => true,
				'nofollow'    => true,
			],
		] );

		$this->add_control( 'pricing_carousel', [
			'label'       => __( 'Price Table Items', 'hostim-core' ),
			'type'        => Controls_Manager::REPEATER,
			'fields'      => $pricing_carousel->get_controls(),
			'default'     => [
				[
					'package_title'             => __( 'Free Plan', 'hostim-core' ),
					's6_currency'               => '$',
					's6_ragular_price'          => '25',
					's6_sale_price'          	=> '19',
					's6_period'                 => '/mon',
					's6_plan_desc'				=> '',
					's6_purchase_btn_label'     => __( 'Subscription', 'hostim-core' ),
					's6_purchase_btn_url' 		=> '#',
				],
			],
			'title_field' => '{{{ package_title }}}',
		] );
		$this->end_controls_section();
		// End Pricing Table


		// Server Pricing Features =================
		$this->start_controls_section( 'server_pricing', [
			'label' => __( 'Server Pricing', 'hostim-core' ),
			'condition' => [
				'layout' => [ '7' ]
			]
		] );
		$serverPricing = new Repeater();

		$serverPricing->add_control( 'processor_name', [
			'label'       => __( 'Processor', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => __( 'Premium Web Hosting', 'hostim-core' ),
			'label_block' => true,
		] );

		$serverPricing->add_control( 'processor_ghz', [
			'label'       => __( 'Processor GHZ', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => __( '4x3.06 GHZ + HT', 'hostim-core' ),
			'label_block' => true,
		] );

		$serverPricing->add_control( 'memory', [
			'label'       => __( 'Memory', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => __( '120GB(DDR4)', 'hostim-core' ),
			'label_block' => true,
		] );

		$serverPricing->add_control( 'storage', [
			'label'       => __( 'Storage', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => __( '500 GB SATA', 'hostim-core' ),
			'label_block' => true,
		] );

		$serverPricing->add_control( 'bandwidth', [
			'label'       => __( 'Bandwidth Price', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => __( '2 TB Included', 'hostim-core' ),
			'label_block' => true,
		] );

		$serverPricing->add_control( 'pricing', [
			'label'       => __( 'Price', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'	  => '12',
			'label_block' => true,
		] );

		$serverPricing->add_control( 's7_period', [
			'label'       => __( 'Period', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'	  => '/mon',
			'label_block' => true,
		] );

		$serverPricing->add_control( 's7_currency', [
			'label'       => __( 'Currency', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'	  => '$',
			'label_block' => true,
		] );

		$serverPricing->add_control( 's7_purchase_btn_label', [
			'label'       => __( 'Purchase Button Label', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => __( 'Order Now', 'hostim-core' ),
			'label_block' => true,
		] );

		$serverPricing->add_control( 's7_purchase_btn_url', [
			'label'         => __( 'Purchase Button URL', 'hostim-core' ),
			'type'          => Controls_Manager::URL,
			'placeholder'   => __( 'https://your-link.com', 'hostim-core' ),
			'show_external' => true,
			'default'       => [
				'url'         => '#',
				'is_external' => true,
				'nofollow'    => true,
			],
		] );

		$this->add_control( 'serverpricing', [
			'label'       => __( 'Server Pricing', 'hostim-core' ),
			'type'        => Controls_Manager::REPEATER,
			'fields'      => $serverPricing->get_controls(),
			'title_field' => '{{{ processor_name }}}',
		] );
		$this->end_controls_section();
		// End Pricing Table

		/* Carousel Settings ====================================== */
		$this->start_controls_section(
		    'carousel_settings', [
			    'label' => __( 'Carousel Settings', 'hostim-core' ),
				'condition' => [
					'layout' => ['6', '8']
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
		// End Carousel controls


		// Section Heading ==============================
		$this->start_controls_section( 'sec_heading_style', [
			'label' => __( 'Section Heading Style', 'hostim-core' ),
			'tab'   => Controls_Manager::TAB_STYLE,
			'condition' => [
				'layout' => ['1', '3', '4']
			]
		] );

		$this->add_control( 'heading_color', [
			'label'     => __( 'Color', 'hostim-core' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .pricing_heading' => 'color: {{VALUE}};',
			],

		] );

		$this->add_group_control( Group_Control_Typography::get_type(), [
			'name'     => 'heading_typography',
			'selector' => '{{WRAPPER}} .pricing_heading',
		] );

		$this->add_control( 'heading_subtitle', [
			'label'     => __( 'Sub Title', 'hostim-core' ),
			'type'      => Controls_Manager::HEADING,

		] );
		$this->add_control( 'subtitle_color', [
			'label'     => __( 'Color', 'hostim-core' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .pricing_subtitle' => 'color: {{VALUE}};',
				'{{WRAPPER}} .vps-plan .section-title p' => 'color: {{VALUE}};'
			],

		] );

		$this->add_group_control( Group_Control_Typography::get_type(), [
			'name'     => 'subtitle_typography',
			'selector' => '
				{{WRAPPER}} .pricing_subtitle,
				{{WRAPPER}} .vps-plan .section-title p	
			',
		] );

		$this->end_controls_section();

		// Tab Switch Style ===================================
		$this->start_controls_section( 'tab_switcher_button', [
			'label' => __( 'Switcher Tab Style', 'hostim-core' ),
			'tab'   => Controls_Manager::TAB_STYLE,
			'condition' => [
				'layout' => ['1', '2', '3', '5']
			]
		] );

		$this->add_control( 'color_btn_text', [
			'label'     => __( 'Color', 'hostim-core' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .form-switch span' => 'color: {{VALUE}};',
				'{{WRAPPER}} .tab-switch-btn span' => 'color: {{VALUE}};',
				'{{WRAPPER}} .tab-switch-btn .toggle-switch-btn' => 'border-color: {{VALUE}};',
				'{{WRAPPER}} .hm2-pricing-tab>ul li button' => 'color: {{VALUE}};',
				'{{WRAPPER}} .rs-pricing-filter .nav-tabs li a' => 'color: {{VALUE}};'
			],

		] );

		$this->add_control( 'active_color_btn_text', [
			'label'     => __( 'Active Color', 'hostim-core' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .hm2-pricing-tab>ul li button.active' => 'color: {{VALUE}};',
				'{{WRAPPER}} .rs-pricing-filter .nav-tabs li a.active' => 'color: {{VALUE}};',
				'{{WRAPPER}} .rs-pricing-filter .nav-tabs li a::before' => 'border-color: {{VALUE}};'
			],

		] );


		$this->add_group_control( Group_Control_Background::get_type(), [
			'name' => 'active_circle_bg',
			'label' => esc_html__( 'Active Background', 'hostim-core' ),
			'types' => [ 'classic', 'gradient' ],
			'selector' => '
				{{WRAPPER}} .form-switch .switch-icon:after,
				{{WRAPPER}} .tab-switch-btn .toggle-switch-btn::before,
				{{WRAPPER}} .hm2-pricing-tab>ul li button.active
			',
		] );

		$this->add_group_control( Group_Control_Box_Shadow::get_type(), [
			'name'     => 'switcher_shadow',
			'selector' => '
				{{WRAPPER}} .form-switch .switch-icon:after,
				{{WRAPPER}} .tab-switch-btn .toggle-switch-btn,
				{{WRAPPER}} .hm2-pricing-tab>ul
				',
		] );

		$this->end_controls_section();

		/**
		 * Style Tab
		 * ------------------------------ Style Title ------------------------------
		 *
		 */
		$this->start_controls_section( 'style_title', [
			'label' => __( 'Price', 'hostim-core' ),
			'tab'   => Controls_Manager::TAB_STYLE,
		] );
		$this->add_control( 'price_color', [
			'label'     => __( 'Text Color', 'hostim-core' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .pricing-table .pricing-header .price' => 'color: {{VALUE}};',
				'{{WRAPPER}} .pricing-column h4.price_title' => 'color: {{VALUE}};',
				'{{WRAPPER}} .sh-pricing-column.pricing-column h4' => 'color: {{VALUE}};',
				'{{WRAPPER}} .pricing-plan-single .pricing-amount h3' => 'color: {{VALUE}};',
				'{{WRAPPER}} .managed-plan table td.price-amount span' => 'color: {{VALUE}};',
				'{{WRAPPER}} span.isb-min-price' => 'color: {{VALUE}};'
			],

		] );
		$this->add_group_control( Group_Control_Typography::get_type(), [
			'name'     => 'typography_price',
			'selector' => '{{WRAPPER}} .pricing-table .pricing-header .price, {{WRAPPER}} .pricing-column h4.price_title, {{WRAPPER}} .price_style__',
		] );
		$this->end_controls_section();


		//------------------------------ Style subtitle ------------------------------
		$this->start_controls_section( 'style_subtitle', [
			'label' => __( 'Title', 'hostim-core' ),
			'tab'   => Controls_Manager::TAB_STYLE,
		] );
		$this->add_control( 'price_title', [
			'label'     => __( 'Color', 'hostim-core' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .pricing-table .pricing-header .price-title' => 'color: {{VALUE}};',
				'{{WRAPPER}} .plan_title' => 'color: {{VALUE}};',
				'{{WRAPPER}} .hm2-pricing-single h3' => 'color: {{VALUE}};',
				'{{WRAPPER}} .sh-pricing-column.pricing-column h3' => 'color: {{VALUE}};',
				'{{WRAPPER}} .rs-pricing-filter .tab-pane .rs-pricing-column h3' => 'color: {{VALUE}};',
				'{{WRAPPER}} .pricing-plan-slider .pricing-plan-single h5' => 'color: {{VALUE}};',
				'{{WRAPPER}} .em-pricing-slider-wrapper .em-pricing-single-item h4 ' => 'color: {{VALUE}};',
				'{{WRAPPER}} .isb-price-box h5 ' => 'color: {{VALUE}};'
			],

		] );
		$this->add_group_control( Group_Control_Typography::get_type(), [
			'name'     => 'typography_price_title',
			'selector' => '
				{{WRAPPER}} .pricing-table .pricing-header .price-title, {{WRAPPER}} .plan_title,
				{{WRAPPER}} .hm2-pricing-single h3, {{WRAPPER}} .plan_title,
				{{WRAPPER}} .sh-pricing-column.pricing-column h3, {{WRAPPER}} .plan_title,
				{{WRAPPER}} .rs-pricing-filter .tab-pane .rs-pricing-column h3, {{WRAPPER}} .plan_title,
				{{WRAPPER}} .pricing-plan-slider .pricing-plan-single h5, {{WRAPPER}} .plan_title,
				{{WRAPPER}} .em-pricing-slider-wrapper .em-pricing-single-item h4, {{WRAPPER}} .plan_title,
				{{WRAPPER}} .isb-price-box h5, {{WRAPPER}} .plan_title
			',
		] );
		$this->end_controls_section();


		//------------------------------ Style Table Heading ------------------------------
		$this->start_controls_section( 'style_table_heading', [
			'label' => __( 'Table Heading', 'hostim-core' ),
			'tab'   => Controls_Manager::TAB_STYLE,
			'condition' => [
				'layout!' => '1'
			]
		] );

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(), [
				'name' => 'table_heading_bg_color',
				'types' => [ 'classic', 'gradient' ],
				'exclude' => [ 'image' ],
				'selector' => '{{WRAPPER}} .vps-pricing-table table thead tr th',
			]
		);
		$this->add_control('table_heading_title_color', [
			'label'     => __('Table Heading Title Color', 'hostim-core'),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .managed-plan table td strong' => 'color: {{VALUE}};'
			],
			'condition' => [
				'layout' => '7',
			],

		]);
		$this->add_group_control(Group_Control_Typography::get_type(), [
			'name'     => 'table_heading_typography',
			'selector' => '{{WRAPPER}} .managed-plan table td strong',
			'condition' => [
				'layout' => '7',
			],
		]);

		$this->end_controls_section(); //End Table Heading


		// Description ===============================
		$this->start_controls_section('desc_style', [
			'label' => __('Description', 'hostim-core'),
			'tab'   => Controls_Manager::TAB_STYLE,
		]);
		$this->add_control('description_color', [
			'label'     => __('Color', 'hostim-core'),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .description__' => 'color: {{VALUE}};',
				'{{WRAPPER}} .sh-pricing-column.pricing-column p' => 'color: {{VALUE}};',
				'{{WRAPPER}} .em-pricing-single-item p' => 'color: {{VALUE}};'
			],

		]);
		$this->add_group_control(Group_Control_Typography::get_type(), [
			'name'     => 'description_typography',
			'selector' => '
				{{WRAPPER}} .description__,
				{{WRAPPER}} .em-pricing-single-item p	
			',
		]);
		$this->end_controls_section();
		
		// Features list ===============================
		$this->start_controls_section('feature_style', [
			'label' => __('Feature List', 'hostim-core'),
			'tab'   => Controls_Manager::TAB_STYLE,
		]);
		$this->add_control('list_icon_color', [
			'label'     => __('Icon Color', 'hostim-core'),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .feature-list li i' => 'color: {{VALUE}};',
				'{{WRAPPER}} .hm2-pricing-single .pricing-feature-list li::marker' => 'color: {{VALUE}};',
				'{{WRAPPER}} .vps-pricing-table table tbody tr td i' => 'color: {{VALUE}};',
				'{{WRAPPER}} .em-pricing-single-item .list-items li span' => 'color: {{VALUE}};'
			],

		]);
		$this->add_control('feature_list_color', [
			'label'     => __('Color', 'hostim-core'),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .feature-list li' => 'color: {{VALUE}};',
				'{{WRAPPER}} .pricing-column .expand-btn' => 'color: {{VALUE}};',
				'{{WRAPPER}} .hm2-pricing-single .pricing-feature-list li' => 'color: {{VALUE}};',
				'{{WRAPPER}} .vps-pricing-table table tbody tr td' => 'color: {{VALUE}};',
				'{{WRAPPER}} .swiper-slide.pricing-plan-single p' => 'color: {{VALUE}};',
				'{{WRAPPER}} .managed-plan table td' => 'color: {{VALUE}};',
				'{{WRAPPER}} .em-pricing-single-item .list-items li' => 'color: {{VALUE}};',
				'{{WRAPPER}} ul.list-unstyled.mt-20 li' => 'color: {{VALUE}};'
			],

		]);
		$this->add_group_control(Group_Control_Typography::get_type(), [
			'name'     => 'feature_list_typography',
			'selector' => '
				{{WRAPPER}} .feature-list li, {{WRAPPER}} .pricing-column .expand-btn,
				{{WRAPPER}} .feature-list li,
				{{WRAPPER}} .hm2-pricing-single .pricing-feature-list,
				{{WRAPPER}} .pricing-column .feature-list,
				{{WRAPPER}} .vps-pricing-table table tbody tr td,
				{{WRAPPER}} .swiper-slide.pricing-plan-single p,
				{{WRAPPER}} .managed-plan table td,
				{{WRAPPER}} .em-pricing-single-item .list-items li,
				{{WRAPPER}} ul.list-unstyled.mt-20 li,
			',
		]);

		$this->add_control(
			'enable_tooltip',
			[
				'label' => esc_html__('Enable Tooltip', 'hostim-core'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__('Show', 'hostim-core'),
				'label_off' => esc_html__('Hide', 'hostim-core'),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
		$this->add_control(
			'limit_char',
			[
				'label' => esc_html__('Limit Character of List', 'hostim-core'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 500,
				'step' => 1,
				'default' => 30,
				'condition' => [
					'enable_tooltip' => 'yes'
				]
			]
		);
		$this->add_control(
			'tooltip_alignment',
			[
				'label' => esc_html__('Alignment', 'hostim-core'),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'top' => [
						'title' => esc_html__('Top', 'hostim-core'),
						'icon' => 'eicon-v-align-top',
					],
					'right' => [
						'title' => esc_html__('Right', 'hostim-core'),
						'icon' => 'eicon-h-align-right',
					],
					'bottom' => [
						'title' => esc_html__('Bottom', 'hostim-core'),
						'icon' => 'eicon-v-align-bottom',
					],
					'left' => [
						'title' => esc_html__('Left', 'hostim-core'),
						'icon' => 'eicon-h-align-left',
					]
				],
				'default' => 'right',
				'toggle' => true,
				'condition' => [
					'enable_tooltip' => 'yes'
				]
			]
		);
		$this->end_controls_section();


		//------------------------------ Style Button  ------------------------------
		$this->start_controls_section( 'button_style', [
			'label' => __( 'Button', 'hostim-core' ),
			'tab'   => Controls_Manager::TAB_STYLE,
		] );

		$this->start_controls_tabs( 'style_tabs' );
		$this->start_controls_tab( 'style_normal_tab', [
			'label' => __( 'Normal', 'hostim-core' ),
		] );

		$this->add_control( 'text-color', [
			'label'     => __( 'Text Color', 'hostim-core' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .pricing_btn__' => 'color: {{VALUE}};',
				'{{WRAPPER}} .popular_active .pricing_btn__:hover' => 'color: {{VALUE}};',
				'{{WRAPPER}} .rs-pricing-column a' => 'color: {{VALUE}};'
			],
		] );


		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'button_background',
				'types' => [ 'classic', 'gradient'],
				'selector' => '{{WRAPPER}} .pricing_btn__, {{WRAPPER}} .popular_active .pricing_btn__:hover, {{WRAPPER}} .rs-pricing-column a'
			]
		);


		$this->add_group_control( Group_Control_Box_Shadow::get_type(), [
			'name'     => 'button_box_shadow',
			'label'    => __( 'Box Shadow', 'hostim-core' ),
			'selector' => '{{WRAPPER}} .pricing_btn__',

		] );

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'selector' => '{{WRAPPER}} .pricing_btn__',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab( 'style_hover_tab', [
			'label' => __( 'Hover', 'hostim-core' ),
		] );

		$this->add_control( 'text-color_hover', [
			'label'     => __( 'Text Color', 'hostim-core' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .pricing_btn__:hover' => 'color: {{VALUE}};',
				'{{WRAPPER}} .popular_active .pricing_btn__' => 'color: {{VALUE}};'
			],
		] );
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'button_background_hover',
				'types' => [ 'classic', 'gradient'],
				'selector' => '{{WRAPPER}} .pricing_btn__:hover,{{WRAPPER}} .popular_active .pricing_btn__,{{WRAPPER}} .pricing_btn__:hover',
			]
		);


		$this->add_group_control( Group_Control_Box_Shadow::get_type(), [
			'name'     => 'button_box_shadow_hover',
			'label'    => __( 'Box Shadow', 'hostim-core' ),
			'selector' => '
				{{WRAPPER}} .pricing_btn__:hover,
				{{WRAPPER}} .popular_active .pricing_btn__				
			',
		] );

		$this->add_control( 'border-color_hover', [
			'label'     => __( 'Border Color', 'hostim-core' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .pricing_btn__:hover' => 'border-color: {{VALUE}};',
				'{{WRAPPER}} .popular_active .pricing_btn__' => 'border-color: {{VALUE}};',
				'{{WRAPPER}} .primary-btn:hover' => 'border-color: {{VALUE}};',
			],
		] );
		// $this->add_group_control(
		// 	\Elementor\Group_Control_Background::get_type(),
		// 	[
		// 		'name' => 'border-color_hover',
		// 		'types' => [ 'classic', 'gradient'],
		// 		'selector' => '{{WRAPPER}} .pricing_btn__:hover',
		// 		'selector' => '{{WRAPPER}} .popular_active .pricing_btn__',
		// 		'selector' => '{{WRAPPER}} .primary-btn:hover',
		// 	]
		// );

		$this->end_controls_tab();
		$this->end_controls_tabs();

		$this->add_group_control(Group_Control_Typography::get_type(), [
			'name'     => 'button_typography',
			'selector' => '
				{{WRAPPER}} .pricing_btn__,{{WRAPPER}} .rs-pricing-column a,{{WRAPPER}} .swiper-slide.pricing-plan-single a,{{WRAPPER}} .managed-plan table td.price-amount .template-btn,{{WRAPPER}} a.pricing_btn__.em-pricing-btn.fw-semibold
			',
		]);
		$this->add_control(
			'button_class_extend', [
				'label' => __( 'Extend Button Class', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'layout' =>'1'
				]
			]
		);
		$this->end_controls_section();

		// Expand Button style add Start-----------------------------------------------
		$this->start_controls_section('expand_section', [
			'label' => __('Expand Button', 'hostim-core'),
			'tab'   => Controls_Manager::TAB_STYLE,
			'condition' => [
				'layout' => '5',
			],
		]);
		$this->add_control('expand_title', [
			'label'     => __('Expand Title Color', 'hostim-core'),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .pricing-column .expand-btn ' => 'color: {{VALUE}};'
			],
		]);
		$this->add_control('expand_icon', [
			'label'     => __('Expand Icon Color', 'hostim-core'),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .pricing-column .expand-btn i' => 'color: {{VALUE}};'
			],
		]);
		$this->add_control('expand_icon_bg', [
			'label'     => __('Expand Icon Bg Color', 'hostim-core'),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .pricing-column .expand-btn i' => 'background: {{VALUE}};'
			],
		]);
		$this->end_controls_section();

		// Expand Button style add End-----------------------------------------------


		//------------------------------ Style Background Section ------------------------------//
		$this->start_controls_section( 'style_section', [
			'label' => __( 'Background Section', 'hostim-core' ),
			'tab'   => Controls_Manager::TAB_STYLE,
		] );

		$this->add_responsive_control(
			'section_margin',
			[
				'label' => esc_html__( 'Margin', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .pricing_sec' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .isb-price-box' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
		$this->add_responsive_control(
			'section_padding', [
				'label' => esc_html__( 'Padding', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .pricing_sec' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .isb-price-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control( Group_Control_Background::get_type(), [
			'name' => 'table_bg',
			'label' => esc_html__( 'Background', 'hostim-core' ),
			'types' => [ 'classic', 'gradient' ],
			'selector' => '{{WRAPPER}} .pricing_sec, {{WRAPPER}} .isb-price-box',
		] );


		$this->add_control( 'pricing_left_shape', [
			'label'   => __( 'Left Top Shape Image', 'hostim-core' ),
			'type'    => Controls_Manager::MEDIA,
			'default' => [
				'url' => plugin_dir_url( __DIR__ ) . 'assets/images/testimonial/frame.svg'
			],
		] );

		$this->end_controls_section(); //End Section Background

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
				'selector' => '[data-bs-theme=dark] {{WRAPPER}} .pricing_sec',
			]);
			$this->end_controls_section(); //End Section Background
		}
		
	}

	protected function render() {

		$settings = $this->get_settings_for_display();
		extract( $settings );
		$tables = isset( $settings['tables'] ) ? $settings['tables'] : '';

		require __DIR__ . '/templates/pricing/layout-' . $layout . '.php';

	}

}
