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


class Hostim_dual_tab_pricing extends Widget_Base {

	public function get_name() {
		return 'hostim-dual-tab-pricing';
	}

	public function get_title() {
		return __( 'Hostim Dual Tab Pricing', 'hostim-core' );
	}

	public function get_icon() {
		return 'eicon-price-table';
	}

	public function get_categories() {
		return [ 'hostim-elements' ];
	}


	protected function register_controls() {

		// Pricing Heading ============================
		$this->start_controls_section( 'pricing_heading_sec', [
			'label' => __( 'Pricing Heading', 'hostim-core' ),
		] );

		$this->add_control( 'pricing_heading', [
			'label'       => __( 'Heading Text', 'hostim-core' ),
			'type'        => Controls_Manager::TEXTAREA,
			'default'     => __( 'Hosting Reasonable Pricing', 'hostim-core' ),
		] );
		
		$this->add_control( 'pricing_subtitle', [
			'label'       => __( 'Heading Subtitle', 'hostim-core' ),
			'type'        => Controls_Manager::TEXTAREA,
			'default'     => __( 'Build your website around your favorite app. Our 1-click installer makes it easy.', 'hostim-core' ),
		] );

		$this->end_controls_section();

		$this->start_controls_section( 'section_dual_tab_pricing', [
			'label' => __( 'Dual Tab Pricing', 'hostim-core' ),
		] );

		$repeater = new \Elementor\Repeater();
		
		$repeater->add_control('package_duration', [
			'label'       => __('Package Duration', 'hostim-core'),
			'type'        => Controls_Manager::TEXT,
			'default'     => __('Monthly', 'hostim-core'),
			'label_block' => true,
		]);
		
		$repeater->add_control( 'hosting_type', [
			'label'       => __( 'Hosting Type', 'hostim-core' ),
			'description' => __('Hosting type will work as a sub category, same hosting type will show under Package Duration tab item.', 'hostim-core'),
			'type'        => Controls_Manager::TEXT,
			'default'     => '',
			'label_block' => true,
		] );

		$repeater->add_control( 'package_title', [
			'label'       => __( 'Package Title', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => __( 'VPS Hosting', 'hostim-core' ),
			'label_block' => true,
		] );

		$repeater->add_control( 'is_popular', [
			'label'        => __( 'Featured on/off', 'hostim-core' ),
			'type'         => Controls_Manager::SWITCHER,
			'label_on'     => __( 'Show', 'hostim-core' ),
			'label_off'    => __( 'Hide', 'hostim-core' ),
			'return_value' => 'yes',
			'default'      => 'no',
		] );

		$repeater->add_control( 'package_icon', [
			'label'       => __( 'Plan Feature Image', 'hostim-core' ),
			'type'        => Controls_Manager::MEDIA,
			'label_block' => true,
		] );


		$repeater->add_control( 'currency', [
			'label'       => __( 'Currency', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => "$",
			'label_block' => true,
		] );

		$repeater->add_control( 'ragular_price', [
			'label'       => __( 'Ragular Price', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true,
		] );
		
		$repeater->add_control( 'pricing_period', [
			'label'       => __( 'Pricing Period', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'placeholder' => __( 'Monthly', 'hostim-core' ),
			'label_block' => true,
		] );
		
		$repeater->add_control( 'plan_desc', [
			'label'       => __( 'Short Description', 'hostim-core' ),
			'type'        => Controls_Manager::TEXTAREA,
			'label_block' => true,
		] );

		$repeater->add_control( 'list_items', [
			'label'       => __( 'Price Feature', 'hostim-core' ),
			'type'        => Controls_Manager::TEXTAREA,
			'default'     => 'Limited Acess Library
                              Single User
                              Hotline Support 24/7
                              No Updates',
			'label_block' => true,
		] );

		$repeater->add_control( 'purchase_btn_label', [
			'label'       => __( 'Purchase Button Monthly Label', 'hostim-core' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => __( 'Choose Plan', 'hostim-core' ),
			'label_block' => true,
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

		$this->add_control( 'dual_tab_package', [
			'label'       => __( 'Packages', 'hostim-core' ),
			'type'        => \Elementor\Controls_Manager::REPEATER,
			'fields'      => $repeater->get_controls(),

			'title_field' => '{{{ package_duration }}} - {{{ hosting_type }}} - {{{ package_title }}}',
		] );

		$this->end_controls_section();

		// ========================heading color ==================
		$this->start_controls_section(
			'heading_color',
			[
				'label' => esc_html__( 'Heading', 'hostim-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'heading',
			[
				'label' => esc_html__( 'Heading Color', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .h5-pricing-section .h5-pricing-left h2' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'head_typography',
				'selector' => '{{WRAPPER}} .h5-pricing-section .h5-pricing-left h2',
			]
		);
		$this->add_control(
			'dest_color',
			[
				'label' => esc_html__( 'Description Color', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .h5-pricing-section .h5-pricing-left p' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'dest_typography',
				'selector' => '{{WRAPPER}} .h5-pricing-section .h5-pricing-left p',
			]
		);

		$this->end_controls_section();
		// ========================heading color end==================


		// ========================right btn color ==================
		$this->start_controls_section(
			'right_btn',
			[
				'label' => esc_html__( 'Monthly Btn', 'hostim-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'month_btn',
			[
				'label' => esc_html__( 'Button Color', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .h5-pricing-right .h5-pricing-controls li a' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'button_typography',
				'selector' => '{{WRAPPER}} .h5-pricing-right .h5-pricing-controls li a',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'right_btn_background',
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .h5-pricing-right .h5-pricing-controls li a',
			]
		);
		$this->end_controls_section();
		//====================================right btn style end====================




		//====================================title style ====================
		$this->start_controls_section(
			'title_color',
			[
				'label' => esc_html__( 'title color', 'hostim-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_price_color',
			[
				'label' => esc_html__( 'Title Color', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .h5-pricing-single .h5-pricing-single-top .h5-pricing-title h3' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .h5-pricing-single .h5-pricing-single-top .h5-pricing-title h3',
			]
		);

		$this->end_controls_section();
		//====================================title style end====================


		//====================================price style===================
		$this->start_controls_section(
			'dual_tab_price_color',
			[
				'label' => esc_html__( 'price color', 'hostim-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'tab_price_color',
			[
				'label' => esc_html__( 'Price Color', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .h5-pricing-single .h5-pricing-single-top .pricing-amount h4' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'price_typography',
				'selector' => '{{WRAPPER}} .h5-pricing-single .h5-pricing-single-top .pricing-amount h4',
			]
		);

		$this->end_controls_section();
		//====================================price style end====================



		//====================================description style====================
		$this->start_controls_section(
			'dual_tab_description_color',
			[
				'label' => esc_html__( 'Description Color', 'hostim-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'tab_description_color',
			[
				'label' => esc_html__( 'Description Color', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .h5-pricing-single p' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'des_typography',
				'selector' => '{{WRAPPER}} .h5-pricing-single p',
			]
		);

		$this->end_controls_section();
		//====================================description style end====================


		//====================================lsit icon style====================
		$this->start_controls_section(
			'dual_tab_list_icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'hostim-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'tab_list_icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .h5-pricing-single .pricing-feature-list li span i' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background',
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .h5-pricing-single .pricing-feature-list li span',
			]
		);
		$this->add_control(
			'list_margin',
			[
				'label' => esc_html__( 'Margin', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .h5-pricing-single .pricing-feature-list li span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'list_padding',
			[
				'label' => esc_html__( 'Padding', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .h5-pricing-single .pricing-feature-list li span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'icon_typography',
				'selector' => '{{WRAPPER}} .h5-pricing-single .pricing-feature-list li span i',
			]
		);

		$this->end_controls_section();
		//====================================list icon style end====================


		//====================================lsit style====================
		$this->start_controls_section(
			'dual_tab_list_color',
			[
				'label' => esc_html__( 'List Color', 'hostim-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'tab_list_color',
			[
				'label' => esc_html__( 'List Color', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .h5-pricing-single .pricing-feature-list li' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'list_typography',
				'selector' => '{{WRAPPER}} .h5-pricing-single .pricing-feature-list li',
			]
		);

		$this->end_controls_section();
		//====================================list style end====================


		//====================================button style====================
		$this->start_controls_section(
			'dual_tab_button_color',
			[
				'label' => esc_html__( 'Button Color', 'hostim-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'tab_button_color',
			[
				'label' => esc_html__( 'Button Color', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .h5-pricing-single .cd-secondary-btn' => 'color: {{VALUE}}',
				],
			]
		);		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'btn_typography',
				'selector' => '{{WRAPPER}} .h5-pricing-single .cd-secondary-btn',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'btn_background',
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .h5-pricing-single .cd-secondary-btn',
			]
		);
		$this->add_control(
			'btn_margin',
			[
				'label' => esc_html__( 'Margin', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .h5-pricing-single .cd-secondary-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'btn_padding',
			[
				'label' => esc_html__( 'Padding', 'hostim-core' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .h5-pricing-single .cd-secondary-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		//====================================button style end====================


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
					'{{WRAPPER}} .h5-pricing-section' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .h5-pricing-section' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'sec_background',
				'label' => esc_html__( 'Background', 'plugin-name' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .h5-pricing-section',
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
		extract( $settings ); ?>

		 <section class="h5-pricing-section ds-bg overflow-hidden">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-lg-6">
                        <div class="h5-pricing-left text-center text-lg-start">
							<?php 
							if( !empty( $pricing_heading ) ){
								echo '<h2 class="mb-3">'. esc_html( $pricing_heading ) .'</h2>';
							}
							if( !empty( $pricing_subtitle ) ){
								echo '<p>'. esc_html( $pricing_subtitle ) .'</p>';
							}
							?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="h5-pricing-right text-center text-lg-end mt-4 mt-lg-0">
                            <ul class="h5-pricing-controls nav nav-tabs d-inline-flex">
								<?php  
								$duration_tab = array_column( $dual_tab_package, 'package_duration' );
								$getCats    = array_unique( $duration_tab );
								$tab_data   = return_tab_data( $getCats , $dual_tab_package, 'package_duration' ); 
			
								if ( is_array( $getCats ) && count( $getCats ) > 0 ){
									$i = 1;
									foreach ( $getCats as $cat ){
										
										$catForFilter = sanitize_title_with_dashes( $cat );
										
										$catForFilter = str_replace( '-', '_', $catForFilter );
										$active = $i==1 ? ' active' : '';
										echo '<li><a href="#tab_'.esc_attr( $catForFilter ).'" class="duration_tab '. esc_attr( $active ) .'" data-bs-toggle="tab">'. esc_html($cat ) .'</a></li>';
										$i++;
									}
								} ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="h5-pricing-tab mt-5">
                    <div class="tab-content">
						<?php
						if ( !empty( $tab_data ) ){
							$i = 0;
							foreach ($tab_data as $key => $val) {

								$tagforfilter = sanitize_title_with_dashes($key);
								$catForFilter = str_replace( '-', '', $tagforfilter );
								$i++;
								$active = $i == 1 ? ' show active' : ''; ?>

								<div class="tab-pane fade <?php echo esc_attr( $active ) ?>" id="tab_<?php echo esc_attr( $catForFilter ) ?>">
									<div class="h5-pricing-filter">
										<ul class="h5-pricing-filter-controls nav nav-tabs mb-60">
											<?php 
											$hosting_types = array_column( $val, 'hosting_type' );
											$get_hosting_type = array_unique( $hosting_types );
											$item_data   = return_tab_data( $get_hosting_type , $val, 'hosting_type' ); 
											
						
											if ( is_array( $get_hosting_type ) && count( $get_hosting_type ) > 0 ){
												$ai      = 1;
												foreach ( $get_hosting_type as $type ){										
													
													$typeForFilter = sanitize_title_with_dashes( $type );
													$typeForFilter = str_replace( '-', '_', $typeForFilter );
													$active_type = $ai == 1 ? ' active' : '';
													echo '<li><a href="#inner_t_'.esc_attr( $catForFilter .'_'. $typeForFilter ).'" class="types_tab '. esc_attr( $active_type ) .'" data-bs-toggle="tab">'. esc_html( $type ) .'</a></li>';
													$ai++;
												}
											} ?>
										</ul>
										<div class="tab-content">
											<?php
											if ( !empty( $item_data ) ){
												$ii = 1;
												foreach ($item_data as $key => $val_) {
													
													$i_typeforfilter = sanitize_title_with_dashes($key);
													$i_typeforfilter = str_replace( '-', '', $i_typeforfilter );
													
													$i_active = $ii == 1 ? ' show active' : ''; ?>
													
													<div class="tab-pane <?php echo esc_attr( $i_active )?>" id="inner_t_<?php echo esc_attr( $catForFilter .'_'. $i_typeforfilter ) ?>">
														<div class="row g-4 g-xl-0 align-items-center justify-content-center">
															<?php 
															foreach( $val_ as $key => $item ){ ?>
																<div class="col-xxl-3 col-xl-4 col-lg-6">
																	<div class="h5-pricing-single position-relative bg-white deep-shadow rounded-2">
																		<div class="h5-pricing-single-top d-flex align-items-start mb-4">
																			<?php
																			if( $item['is_popular'] == 'yes' ){ ?>
																				<div class="popular-badge position-absolute">
																					<span><?php echo __('Most Popular', 'hostim-core') ?></span>
																				</div>
																				<?php
																			}
																			?>
																			<span class="icon-wrapper">
																				<?php
																				if( !empty( $item['package_icon']['id'] ) ){
																					echo wp_get_attachment_image( $item['package_icon']['id'], 'pricing_60x60', '', array('class'=>'img-fluid') );
																				}
																				?>
																			</span>
																			<div class="h5-pricing-title ms-3">
																				<?php 
																				if( !empty( $item['package_title'] ) ){
																					echo '<h3 class="h5">'. esc_html( $item['package_title'] ) .'</h3>';
																				}
																				?>
																				
																				<div class="pricing-amount mt-1">
																					<?php 
																					if( !empty( $item['ragular_price'] ) ){
																						echo '<h4 class="h3 price-title mb-0">'. esc_html( $item['currency'] ) . esc_html( $item['ragular_price'] ) .'<span>'. esc_html( $item['pricing_period'] ) .'</span></h4>';
																					}
																					?>
																				</div>
																			</div>
																		</div>
																		
																		<?php 
																		if( !empty( $item['plan_desc'] ) ){
																			echo '<p>'. esc_html( $item['plan_desc'] ) .'</p>';
																		}

																		$table_contents = preg_split( '/\r\n|[\r\n]/', $item['list_items'] );
																		if( !empty( $table_contents ) ){
																			echo '<ul class="pricing-feature-list mt-4 mb-40">';
																			foreach( $table_contents as $list ){
																				echo '<li><span class="me-2"><i class="fa-solid fa-check"></i></span>'. esc_html( $list ) .'</li>';
																			}
																			echo '</ul>';
																		}

																		$btn_class = $item['is_popular'] == 'yes' ? 'primary-btn' : 'cd-secondary-btn';
																		if( $item['purchase_btn_label'] ){
																			echo '<a href="'. esc_url( $item['purchase_btn_url']['url'] ) .'" class="template-btn text-center w-100 rounded-2 '. esc_attr( $btn_class ) .'">'. esc_html( $item['purchase_btn_label'] ) .'</a>';
																		}
																		?>
																		
																	</div>
																</div>
																<?php
															}
															
															?>
														</div>
													</div>
													<?php 
													$ii++;
												}
											}
											?>
										</div>
									</div>
								</div>
								<?php
							}
						} ?>

                    </div>
                </div>
            </div>
        </section>

		<?php
	}
}