<section class="hm2-pricing-section pricing_sec" id="pricing">
	<div class="container position-relative zindex-1">
		<div class="hm2-pricing-tab text-center mt-4">
			<?php 
			$cats       = array_column( $p2_tables, 'tab_title' );
			$getCats    = array_unique( $cats );
			$tab_data   = return_tab_data( $getCats , $p2_tables, 'tab_title' );
			?>
			<ul class="nav nav-tabs justify-content-center bg-white deep-shadow">
				 <?php
				if ( is_array( $p2_tables ) && count( $p2_tables ) > 0 ){
					$tabs   = '';
					$i      = 1;
					foreach ( $getCats as $cat ){
						$active = $i==1 ? ' active' : '';
						echo '<li><button class="tab_btn'. esc_attr( $active ) .'" data-bs-toggle="tab" data-bs-target="#tab_'.esc_attr(hostim_text_sanitizer($cat) ).'">'. esc_html( $cat ) .'</button></li>';
						$i++;
					}
				} ?>
			</ul>
			<div class="tab-content text-start mt-50">
				<?php
				if ( !empty( $tab_data ) ){
					$col_lg = !empty($column_desktop) ? $column_desktop : '4';
					$col_md = !empty($column_tablet) ? $column_tablet : '4';
					$i = 0;
					foreach ($tab_data as $key => $val) {
						$i++;
						$active = $i == 1 ? ' show active' : '';
						$key = str_replace('_&_', '_', $key);
						?>
						<div class="tab-pane fade <?php echo esc_attr( $active ) ?>" id="tab_<?php echo esc_attr(hostim_text_sanitizer($key)); ?>">
							<div class="row g-4 justify-content-center">
								<?php
								foreach ( $val as $key2 => $data ) { 
									$is_popular = $data['p2_is_popular'] == 'yes' ? 'popular_baged' : '';
									?>
									<div class="col-lg-<?php echo esc_attr($col_lg) ?> col-md-<?php echo esc_attr($col_md) ?> col-sm-12">
										<div class="hm2-pricing-single position-relative bg-white deep-shadow rounded-5 <?php echo esc_attr($is_popular) ?>">
											<?php 
											if( !empty( $data['ragular_price'] && $data['sale_price'] ) ){
												$saved_badge = !empty($data['p2_saved_badge']) ? $data['p2_saved_badge'] : __('Save', 'hostim-core');
												echo '<div class="pricing-badge position-absolute rounded"><span>'. esc_html($saved_badge) .' '. esc_html(hostim_get_percentage($data['ragular_price'], $data['sale_price'], (int) $after_dot_number) ) .'</span></div>';
											}

											if( $data['p2_is_popular'] == 'yes' ){
												echo '<div class="popular-badge position-absolute"><span>'. esc_html( $data['p2_popular_badge_text'] ) .'</span></div>';
											}
											
											if( !empty( $data['p2_package_icon']['url'] ) ){
												echo '<span class="icon-wrapper"><img src="'. esc_url( $data['p2_package_icon']['url'] ) .'" alt="Package image" class="img-fluid"></span>';
											}

											if( !empty( $data['p2_plan_title'] ) ) {
												echo '<h3 class="h5 mt-3">'. esc_html( $data['p2_plan_title'] ) .'</h3>';
											}

											if( !empty( $data['ragular_price'] || $data['sale_price'] ) ){ ?>
												<div class="pricing-amount d-flex justify-content-between mt-3 mb-4">
													<?php
													if( !empty( $data['sale_price'] ) ){
														echo '<h4 class="h2 price-title mb-0 price_style__">'. $data['p2_currency']. $data['sale_price'] .'<span>'. $data['p2_period'] .'</span></h4>';
													} 
													if( !empty( $data['ragular_price'] ) ){
														if( empty( $data['sale_price'] ) ){
															echo '<h4 class="h2 price-title mb-0 price_style__">'. $data['p2_currency']. $data['ragular_price'] . '<span>' . $data['p2_period'] . '</span></h4>';
														}
														else{
															echo '<h6 class="pricing-deleted align-self-end position-relative price_style__">'. $data['p2_currency']. $data['ragular_price'] .'</h6>';
														}
													} 
													
													?>
												</div>
												<?php
											}

											if( !empty( $data['p2_plan_desc'] ) ){
												echo '<p>'. hostim_kses_post( $data['p2_plan_desc'] ) .'</p>';
											}

											$table_contents = preg_split( '/\r\n|[\r\n]/', $data['p2_list_items'] );
											if( !empty( $table_contents ) ){
												echo '<ul class="pricing-feature-list mt-4 mb-40">';
												foreach( $table_contents as $item ){
													$tooltip_attr = '';
													$info_icon    = '';
													$limit_text   = !empty($limit_char) ? mb_strimwidth($item, 0, $limit_char, '') : $item;

													if ($enable_tooltip == 'yes') {
														$tooltip_attr = strlen($item) > $limit_char ? 'data-bs-toggle="tooltip" data-bs-placement="' . esc_attr($tooltip_alignment) . '" title=" ' . esc_html($item) . ' "' : '';
														$info_icon    = strlen($item) > $limit_char ? ' <i class="fa-regular fa-circle-question"></i>' : '';
													}
													echo '<li><span ' . $tooltip_attr . '>' . hostim_kses_post($limit_text) . $info_icon . '</span></li>';
												}
												echo '</ul>';
											}

											$btn_class = $data['p2_is_popular'] == 'yes' ? 'primary-btn' : 'outline-primary';
											if( $data['p2_purchase_btn_url']['url'] ){
												$this->add_link_attributes('p2_purchase_btn_'. $key . $key2, $data['p2_purchase_btn_url']);
												$this->add_render_attribute('p2_purchase_btn_'. $key . $key2, 'class', 'template-btn pricing_btn__ text-center w-100 rounded-pill '.$btn_class ); ?>

												<a <?php $this->print_render_attribute_string('p2_purchase_btn_'. $key . $key2) ?> >
													<?php echo esc_html($data['p2_purchase_btn_label'] ) ?>
												</a>
												<?php
											}
											?>
										</div>
									</div>
									<?php 
								} ?>
							</div>
						</div>

						<?php
					}
				} ?>

			</div>
		</div>
	</div>
</section>