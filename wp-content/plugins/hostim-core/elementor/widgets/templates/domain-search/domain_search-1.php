<section class="domain-area bg-white__ primary-shadow rounded-10 section_background__">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="domain-search-box  position-relative zindex-2  ">
                    <div class="row justify-content-center">
                        <div class="col-xl-7 col-lg-10">
                            <?php if ( ! empty( $settings['title'] ) ) { ?>
                                <h2 class="h3 text-center"><?php echo esc_html( $settings['title'] ); ?></h2>
                            <?php } 
                            $disable_ajax = $disable_ajax_search == 'yes' ? '' : '-off';
                            $domain_suggestion = $domain_seggestion_on_off == 'yes' ? 'true' : 'false'; ?>

                            <div id="hostim-domain-search<?php echo esc_attr( $disable_ajax ) ?>" class="hostim-domain-search" data-suggestion="<?php echo esc_attr($domain_suggestion) ?>">
                                <form action="#" id="hostim_domain_search_form" class="mt-4 domain-search-form position-relative d-flex align-items-center justify-content-between">
                                    <input type="hidden" class="whmcs_url_hidden" name="whmcs_url" value="">
                                    <?php do_action( 'wdes_domain_verify_code' ); ?>

                                    <input id="hostim-domain" type="text" placeholder="<?php echo esc_attr( $placeholder_input ) ?>">
                                
                                    <?php
                                    if ( $settings['extension_dropdown_list_show'] == 'yes' ) {
                                        $i = 1;
                                        if ( is_array( $extension_list ) && !empty( $extension_list ) ) {
                                            echo '<select id="domainext" class="form-select flex-shrink-0">';
                                            foreach ( $extension_list as $list ) {
                                                $select_class = $i == 1 ? ' selected' : '';
                                                $extension_domain = $list['extension_domain'];
                                                $replace_ext_dot = ltrim( $extension_domain, '.');
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
                                    ?>
                                    <?php 
                                    if( $disable_ajax_search == 'yes' ){ ?>
                                        <button id="hostim-search" class="template-btn primary-btn btn-small flex-shrink-0 border-0" type="submit">
                                            <?php echo esc_attr( ! empty( $settings['search_btn_label'] ) ? $settings['search_btn_label'] : __('Search Now', 'hostim-core') ) ?>
                                        </button>
                                        <?php
                                    }
                                    else{
                                        echo '<a ' . esc_attr(Hostimg_Core_Helper()->the_button($whmcs_url, false))  . ' class="template-btn primary-btn btn-small flex-shrink-0 border-0">'. esc_attr(!empty($settings['search_btn_label']) ? $settings['search_btn_label'] : __('Search Now', 'hostim-core') ) .'</a>';
                                    }
                                    wp_nonce_field( 'check-domain-nonce', 'security', true, false ); ?>
                                </form>
                                <div id="hostim-domain-results" class="domain-results-box"></div>
                                <?php 
                                if($domain_seggestion_on_off == 'yes' ){
                                    echo '<div id="hostim-domain-suggestions" class="domain-results-suggestions"></div>';
                                } ?>
                            </div>

	                        <?php if ( $settings['extension_list_show'] == 'yes' ) { ?>
                                <div class="domain-info mt-4 d-flex justify-content-center align-items-center">
                                    <?php
                                    if( is_array( $extension_list ) ){
                                        foreach( $extension_list as $list ){ ?>
                                            <div class="info-box rounded-3 text-center elementor-repeater-item-<?php echo esc_attr( $list['_id'] ) ?>">
                                                <?php
                                                if ( !empty( $list['extension_domain'] ) ) {
                                                    echo '<h5 class="primary-text mb-0">'. esc_html( $list['extension_domain'] ) .'</h5>';
                                                }
                                                if( !empty( $list['price'] ) ){
                                                    if ($select_currency == 'currency_symbol_list') {
                                                        $currency = $currency_symbol;
                                                    } else {
                                                        $currency = $currency_symbol_text;
                                                    }
                                                    echo '<span>'. $currency . esc_html( $list['price'] ) . esc_html( $list['mo_or_yr'] ) .'</span>';
                                                }
                                                ?>
                                            </div>
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>
	                        <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>