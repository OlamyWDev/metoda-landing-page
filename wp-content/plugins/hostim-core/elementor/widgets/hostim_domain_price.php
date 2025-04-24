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

class Hostim_domain_price extends Widget_Base {

	public function get_name() {
		return 'hostim-domain-price';
	}

	public function get_title() {
		return __( 'Hostim Domain Price', 'hostim-core' );
	}

	public function get_icon() {
		return 'eicon-global-settings';
	}

	public function get_categories() {
		return [ 'hostim-elements' ];
	}

	protected function register_controls() {


		$this->start_controls_section(
			'extension__section',
			[
				'label' => __( 'Domain Extension and Price', 'hostim-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);		

		$this->add_control(
			'extension',
			[
				'label' => esc_html__( 'Extension Text/Image', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'text' => [
						'title' => esc_html__( 'Text', 'hostim-core' ),
						'icon' => 'eicon-text-area',
					],
					'image' => [
						'title' => esc_html__( 'Image', 'hostim-core' ),
						'icon' => 'eicon-image',
					],
				],
				'default' => 'image',
				'toggle' => true,
			]
		);
		$this->add_control(
			'extension_text', [
				'label'       => __( 'Extension Text', 'hostim-core' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => __( '.com', 'hostim-core' ),
				'label_block' => true,
				'condition' => [
					'extension' => 'text'
				]
			]
		);
		$this->add_control(
			'extension_image', [
				'label'       => __( 'Extension Image', 'hostim-core' ),
				'type'        => \Elementor\Controls_Manager::MEDIA,
				'label_block' => true,
				'condition' => [
					'extension' => 'image'
				]
			]
		);
		
		$this->add_control(
			'extension_hover_image', [
				'label'       => __( 'Extension Hover Image', 'hostim-core' ),
				'type'        => \Elementor\Controls_Manager::MEDIA,
				'label_block' => true,
				'condition' => [
					'extension' => 'image'
				]
			]
		);

		$this->add_control(
			'priod_text', [
				'label'       => __( 'Duration Text', 'hostim-core' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => __( '/yr', 'hostim-core' ),
				'label_block' => true,
				
			]
		);

		$this->add_control(
			'sale_price', [
				'label'   => __('Sale Price', 'hostim-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 8,
			]
		);

		$this->add_control(
			'ragular_price', [
				'label'   => __( 'Ragular Price', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 10,
			]
		);
		$this->add_control(
			'after_dot_number',
			[
				'label' => esc_html__('Number after dot of Percentage', 'hostim-core'),
				'type'  => Controls_Manager::NUMBER,
				'default' => 2,
			]
		);
		$this->add_control(
			'instead_of', [
				'label'   => __( 'Instead Of text', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('Instead of', 'hostim-core' )
			]
		);
		
		$this->add_control(
			'discount_text', [
				'label'   => __( 'Discount text', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('off', 'hostim-core' )
			]
		);
		

		$this->add_control(
			'select_currency',
			[
				'label'   => __( 'Select Currency', 'hostim-core' ),
				'type'    => Controls_Manager::SELECT,
                'options' => [
					'currency_symbol_list' => __('Select From List', 'hostim-core'),
					'custom' => __('Custom', 'hostim-core'),
					
				],
				'default' => 'currency_symbol_list'
			]
		);

		$this->add_control(
			'currency_symbol', [
				'label'   => __( 'Select Currency', 'hostim-core' ),
				'type'    => Controls_Manager::SELECT,
                'options' => array_flip( wdes_get_currency_symbol() ),
				'default' => '',
				'condition' => [
					'select_currency' => 'currency_symbol_list'
				]
			]
		);

		$this->add_control(
			'currency_symbol_text',
			[
				'label'       => __('Currency Symbol', 'hostim-core'),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => '',
				'label_block' => true,
				'condition' => [
					'select_currency' => 'custom'
				]
			]
		);

		$this->add_control(
			'btn_label', [
				'label'       => __( 'Button Label', 'hostim-core' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => __( 'Get Offer', 'hostim-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'btn_url', [
				'label'       => __( 'Button URL', 'hostim-core' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => '#',
				'label_block' => true,
			]
		);
		$this->end_controls_section();


		

		/* Heading Style ======================*/

		$this->start_controls_section(
			'sale_price_section',
			[
				'label' => __( 'Sale Price', 'hostim-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'sale_price_color',
			[
				'label'     => __( 'Color', 'hostim-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sale_price__' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'sale_price_typography',
				'label'    => __( 'Extension Typography', 'hostim-core' ),
				'selector' => '{{WRAPPER}} .sale_price__',
			]
		);

		$this->end_controls_section();
		
		// Ragular Price
		$this->start_controls_section(
			'ragular_price_section',
			[
				'label' => __( 'Ragular Price', 'hostim-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'ragular_price_color',
			[
				'label'     => __( 'Color', 'hostim-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .regular_price__' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'ragular_price_typography',
				'label'    => __( 'Extension Typography', 'hostim-core' ),
				'selector' => '{{WRAPPER}} .regular_price__',
			]
		);

		$this->end_controls_section();

		
		/* Button Style ======================*/
		$this->start_controls_section(
			'button_style_section',
			[
				'label' => __( 'Button Style', 'hostim-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'link_typography',
				'label'    => __( 'Button Typography', 'hostim-core' ),
				'selector' => '{{WRAPPER}} .domain_price_btn__',
			]
		);

		$this->add_control(
			'btn_color',
			[
				'label'     => __( 'Button Color', 'hostim-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .domain_price_btn__' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'more_options',
			[
				'label'     => __( 'Hover Style', 'hostim-core' ),
				'type'      => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'btn_color_hover',
			[
				'label'     => __( 'Color', 'hostim-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .domain_price_btn__:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();

		
	}

	protected function render() {
		$settings = $this->get_settings();
		extract( $settings );

        $regular_price = !empty($settings['ragular_price']) ? $settings['ragular_price'] : '';
		$sale_price = !empty($settings['sale_price']) ? $settings['sale_price'] : '';
        ?>
		<div class="dm-pp-domain-item position-relative overflow-hidden zindex-1">
			<?php
			if ( $extension == 'image' && !empty( $extension_image['url'] ) ){
				echo '<img src="'. esc_url( $extension_image['url'] ) .'" alt="online" class="img-fluid original">';
			}

			if ( $extension == 'image' && !empty( $extension_hover_image['url'] ) ){
				echo '<img src="'. esc_url( $extension_hover_image['url'] ) .'" alt="online" class="img-fluid on-hover">';
			}

			if ( $extension == 'text' && !empty( $extension_text ) ){
				echo '<h3>'. esc_html( $extension_text ) .'</h3>';
			}

			if (!empty($regular_price) || !empty($sale_price)) {				
				echo '<span class="dm-offer-badge fw-bold text-white position-absolute">' . esc_html(hostim_get_percentage($regular_price, $sale_price, (int) $after_dot_number )) . esc_html( $discount_text ) . '</span>';
			}

			
			if( $select_currency == 'currency_symbol_list' ){
				$currency_symbol_ = $currency_symbol;
			}
			else{
				$currency_symbol_ = $currency_symbol_text;
			}

			if( !empty( $sale_price ) && empty( $ragular_price ) ){
				echo '<h6 class="mt-4 sale_price__">'. $currency_symbol_ .esc_html( $sale_price ). $priod_text .'</h6>';
			}
			
			if( !empty( $ragular_price ) ){
				if (empty($sale_price) && !empty($ragular_price)) {
					echo '<h6 class="mt-4 sale_price__">' . $currency_symbol_ . esc_html($ragular_price) . $priod_text . '</h6>';
				}
				if ( !empty( $sale_price ) ){
					echo '<h6 class="mt-4 sale_price__">'. $currency_symbol_ .esc_html( $sale_price ). $priod_text .'</h6>';
				}
				
				if ( !empty( $sale_price ) ){
					echo '<span class="subtitle regular_price__">'. esc_html( $instead_of ) .$currency_symbol_ .esc_html( $ragular_price ) . esc_html( $priod_text ) .'</span>';
				}

			}
				if ( !empty( $btn_label ) ){
					echo '<a href="'. esc_url( $btn_url ) .'" class="domain_price_btn__">'. esc_html( $btn_label ) .'<i class="fa-solid fa-arrow-right-long"></i></a>';
				}
				?>
				<span class="circle-small position-absolute"></span>
				<span class="circle-shape shape-1 position-absolute"></span>
				<span class="circle-shape shape-2 position-absolute"></span>
			</div>

			<?php
		

	}

}
