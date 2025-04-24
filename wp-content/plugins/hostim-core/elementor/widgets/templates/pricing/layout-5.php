<section class="rs-pricing pricing_sec">
    <div class="container">
        <div class="rs-pricing-filter">
            <?php 
			$cats       = array_column( $p2_tables, 'tab_title' );
			$getCats    = array_unique( $cats );
			$tab_data   = return_tab_data( $getCats , $p2_tables, 'tab_title' );
			?>
			<ul class="nav nav-tabs border-0 justify-content-center justify-content-md-start">
				 <?php
				if ( is_array( $p2_tables ) && count( $p2_tables ) > 0 ){
					$tabs   = '';
					$i      = 1;
					foreach ( $getCats as $cat ){
						$catForFilter = sanitize_title_with_dashes( $cat );
						$catForFilter = str_replace( '-', '', $catForFilter );
						$active = $i==1 ? ' active' : '';
						echo '<li><a href="#'.esc_attr( $catForFilter ).'" class="tab_btn'. esc_attr( $active ) .'" data-bs-toggle="tab" >'. esc_html( $cat ) .'</a></li>';
						$i++;
					}
				} ?>
			</ul>
            <div class="tab-content mt-5">
                <?php
				if ( !empty( $tab_data ) ){
					$i = 0;
					foreach ($tab_data as $key => $val) {
						$tagforfilter = sanitize_title_with_dashes($key);
						$catForFilter = str_replace( '-', '', $tagforfilter );
						$catForFilter = str_replace( '_', '', $catForFilter );
						$i++;
						$active = $i == 1 ? ' show active' : '';
						?>
                        <div class="tab-pane fade <?php echo esc_attr( $active ) ?>" id="<?php echo esc_attr( $catForFilter ); ?>">
                            <div class="row g-4 justify-content-center">
                                <?php
								foreach ( $val as $key2 => $data ) { ?>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="rs-pricing-column bg-white deep-shadow pricing-column rounded position-relative">
                                            <?php 
                                            if( !empty( $data['p2_plan_title'] ) ) {
												echo '<h3 class="h4">'. hostim_kses_post( nl2br( $data['p2_plan_title'] ) ) .'</h3>';
											}

                                            if( !empty( $data['ragular_price'] ) ){
                                                echo '<h4 class="h2 mt-2 monthly-price">'. $data['p2_currency']. $data['ragular_price'] .'<span>'. esc_html( $data['p2_period'] ) .'</span></h4>';
                                            }

                                            if( !empty( $data['p2_plan_desc'] ) ){
                                                echo '<p class="mt-4">'. hostim_kses_post( $data['p2_plan_desc'] ) .'</p>';
                                            }
                                            
											if($data['p2_purchase_btn_url']['url'] ){
												$this->add_link_attributes('p2_purchase_btn' . $key.$key2, $data['p2_purchase_btn_url']);
												$this->add_render_attribute('p2_purchase_btn' . $key.$key2, 'class', 'template-btn secondary-btn w-100 text-center mt-3 mb-30 rounded-1' ); ?>

												<a <?php $this->print_render_attribute_string('p2_purchase_btn' . $key.$key2) ?> >
													<?php echo esc_html($data['p2_purchase_btn_label'] ) ?>
												</a>
												<?php
											}

                                            $table_contents = preg_split( '/\r\n|[\r\n]/', $data['p2_list_items'] );
											if( !empty( $table_contents ) ){
												echo '<ul class="feature-list">';
												foreach( $table_contents as $item ){
													$tooltip_attr = '';
													$info_icon    = '';
													$limit_text   = !empty($limit_char) ? mb_strimwidth($item, 0, $limit_char, '') : $item;

													if ($enable_tooltip == 'yes') {
														$tooltip_attr = strlen($item) > $limit_char ? 'data-bs-toggle="tooltip" data-bs-placement="' . esc_attr($tooltip_alignment) . '" title=" ' . esc_html($item) . ' "' : '';
														$info_icon    = strlen($item) > $limit_char ? ' <i class="fa-regular fa-circle-question"></i>' : '';
													}
													echo '<li><span ' . $tooltip_attr . '><i class="fa-regular fa-circle-check"></i>' . hostim_kses_post($limit_text) . $info_icon . '</span></li>';
												}
												echo '</ul>';
											}
                                            ?>
                                    
                                            <button class="expand-btn pricing_btn__ mt-4"><i class="fa-solid fa-angle-down"></i><?php echo esc_html($data['expand_feature']) ?></button>
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