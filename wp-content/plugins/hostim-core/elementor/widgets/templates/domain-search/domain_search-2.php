<section class="domain_search_section hm2-domain-search bg-primary-gradient pt-30 position-relative zindex-1 overflow-hidden">
    <?php
	if( is_array( $settings['shape_images'] ) ){
		$i = 1;
		foreach ( $settings['shape_images'] as $image ) {
			echo '<img src="'. esc_url( $image['shape_img']['url'] ) .'" alt="'. esc_attr__( 'Shape image' ) .'" class="position-absolute shape_'.$i++.' elementor-repeater-item-'. esc_attr(  $image['_id'] ) .'">';
		}
	}
    $justify_content = !empty( $feature_img['id'] ) ? 'justify-content-between' : 'justify-content-center';
	?>
    <div class="container">
        <div class="row <?php echo esc_attr($justify_content ) ?> align-items-center">
            <div class="col-lg-6 order-2 order-lg-1">
                <div class="hm3-domain-left text-center text-lg-start">
                    <?php if ( ! empty( $settings['title'] ) ) { ?>
                        <h2 class="sec_title"><?php echo esc_html( $settings['title'] ); ?></h2>
                    <?php }
                    $disable_ajax = $disable_ajax_search == 'yes' ? '' : '-off';
                    $domain_suggestion = $domain_seggestion_on_off == 'yes' ? 'true' : 'false';
                    ?>
                    <div id="hostim-domain-search<?php echo esc_attr( $disable_ajax ) ?>" class="hostim-domain-search" data-suggestion="<?php echo esc_attr($domain_suggestion) ?>">
                        <form id="hostim_domain_search_form" class="mt-4 hm2-dm-search-form position-relative d-flex align-items-center justify-content-between">
                            <input type="hidden" class="whmcs_url_hidden" name="whmcs_url" value="">
                            <?php
                            do_action( 'wdes_domain_verify_code' ); ?>
                            
                            <input id="hostim-domain" type="text" placeholder="<?php echo esc_attr( $placeholder_input ) ?>">

	                        <?php
                            if ( $settings['extension_dropdown_list_show'] == 'yes' ) {
                                
                                $i = 1;
                                if ( is_array( $extension_list ) && !empty( $extension_list ) ) {
                                    echo '<select id="domainext" class="form-select flex-shrink-0">';
                                    foreach ( $extension_list as $list ) {
                                        $select_class = $i == 1 ? ' selected' : '';
                                        $extension_domain = $list['extension_domain'];
                                        $replace_ext_dot = ltrim( $extension_domain, '.' );
                                        ?>
                                        <option value="<?php echo esc_attr($replace_ext_dot) ?>"<?php echo esc_attr($select_class) ?>>
                                            <?php echo esc_html($extension_domain) ?>
                                        </option>
                                        <?php
                                        ++$i;
                                    }
                                    echo '</select>';
                                }
                            }

                            if( $disable_ajax_search == 'yes' ){ ?>
                                <button id="hostim-search" class="template-btn hm2-primary-btn border-0 flex-shrink-0" type="submit">
                                    <?php echo esc_attr( ! empty( $settings['search_btn_label'] ) ? $settings['search_btn_label'] : __('Search Now', 'hostim-core') ) ?>
                                </button>
                                <?php
                            }
                            else{
                                echo '<a '. esc_attr( Hostimg_Core_Helper()->the_button( $whmcs_url, false ))  . ' class="template-btn hm2-primary-btn border-0 flex-shrink-0">'. esc_attr(!empty($settings['search_btn_label']) ? $settings['search_btn_label'] : __('Search Now', 'hostim-core') ) .'</a>';
                            }
                            
                            wp_nonce_field( 'check-domain-nonce', 'security', true, false ); ?>
                        </form>
                        <div id="hostim-domain-results" class="domain-results-box"></div>
                        <?php 
                        if($domain_seggestion_on_off == 'yes' ){
                            echo '<div id="hostim-domain-suggestions" class="domain-results-suggestions"></div>';
                        }
                        ?>
                        
                    </div>

	                <?php if ( $settings['extension_list_show'] == 'yes' ) : ?>
                        <div class="domain-info mt-4 d-flex align-items-center justify-content-center justify-content-lg-start">
                            <?php
                            if( is_array( $extension_list ) ){
                                foreach( $extension_list as $list ){ ?>
                                    <div class="info-box border-0 elementor-repeater-item-<?php echo esc_attr( $list['_id'] ) ?>">
                                        <?php
                                        if( !empty( $list['extension_domain'] ) ){
                                            echo '<h5 class="primary-text mb-0">'. esc_html( $list['extension_domain'] ) .'</h5>';
                                        }

                                        if( !empty( $list['price'] ) ){
                                            if ($select_currency == 'currency_symbol_list') {
                                                $currency = $currency_symbol;
                                            } else {
                                                $currency = $currency_symbol_text;
                                            } 
                                            echo '<span class="text-white">'. $currency . esc_html( $list['price'] ) . esc_html($list['mo_or_yr']) .'</span>';
                                        }
                                        ?>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php 
            if( !empty( $feature_img['id'] ) ){ ?>
                <div class="col-lg-4 order-1 order-lg-2">
                    <div class="feature-img text-center">
                        <?php 
                        if( !empty( $feature_img['id'] ) ){
                            echo wp_get_attachment_image( $feature_img['id'], 'full', '', array('class'=>'img-fluid') );
                        }
                        ?>
                    </div>
                </div>
                <?php 
            } ?>
        </div>
    </div>
</section>