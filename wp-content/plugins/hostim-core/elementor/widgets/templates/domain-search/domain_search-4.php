<div class="box-left domain_search_section">
    <?php if ( ! empty( $settings['title'] ) ) { ?>
        <h3 class="mb-30"><?php echo esc_html( $settings['title'] ); ?></h3>
    <?php }
    $disable_ajax = $disable_ajax_search == 'yes' ? '' : '-off';
    $domain_suggestion = $domain_seggestion_on_off == 'yes' ? 'true' : 'false';
    ?>
    <div id="hostim-domain-search<?php echo esc_attr( $disable_ajax ) ?>" class="hostim-domain-search" data-suggestion="<?php echo esc_attr($domain_suggestion) ?>">
        <form action="#" id="hostim_domain_search_form" class="h5-domain-search-form position-relative __form_submit_btn">
            <input type="hidden" class="whmcs_url_hidden" name="whmcs_url" value="">
            <?php do_action( 'wdes_domain_verify_code' );
            ?>
            <input id="hostim-domain" type="text" placeholder="<?php echo esc_attr( $placeholder_input ) ?>">
            <?php
            if( $disable_ajax_search == 'yes' ){ ?>
                <button id="hostim-search" class="template-btn primary-btn border-0 __btn" type="submit">
                    <span class="me-2"><i class="fa-solid fa-magnifying-glass"></i></span>
                    <?php echo esc_attr( ! empty( $settings['search_btn_label'] ) ? $settings['search_btn_label'] : __('Search Now', 'hostim-core') ) ?>
                </button>
                <?php
            }
            else{
                echo '<a ' . esc_attr(Hostimg_Core_Helper()->the_button($whmcs_url, false))  . ' class="template-btn primary-btn border-0"><span class="me-2"><i class="fa-solid fa-magnifying-glass"></i></span>'. esc_attr(!empty($settings['search_btn_label']) ? $settings['search_btn_label'] : __('Search Now', 'hostim-core') ) .'</a>';
            }

            wp_nonce_field( 'check-domain-nonce', 'security', true, false ); ?>
        </form>
        <div id="hostim-domain-results" class="domain-results-box"></div>
        <?php 
        if($domain_seggestion_on_off == 'yes' ){
            echo '<div id="hostim-domain-suggestions" class="domain-results-suggestions"></div>';
        }
        
        if ( $settings['extension_list_show'] == 'yes' ) : ?>
            <div class="h5-domain-info domain-info mt-4 d-flex align-items-center justify-content-center justify-content-lg-start">
                <?php
                if( is_array( $extension_list ) ){
                    foreach( $extension_list as $list ){ ?>
                        <div class="info-box border-0 elementor-repeater-item-<?php echo esc_attr( $list['_id'] ) ?>">
                            <?php
                            if( !empty( $list['extension_domain'] ) ){
                                echo '<h5 class="primary-text mb-0">'. esc_html( $list['extension_domain'] ) .'</h5>';
                            }
                            if ($select_currency == 'currency_symbol_list') {
                                $currency = $currency_symbol;
                            } else {
                                $currency = $currency_symbol_text;
                            }
                            if( !empty( $list['price'] ) ){
                                echo '<span>'. $currency . esc_html( $list['price'] ) . esc_html($list['mo_or_yr']) .'</span>';
                            }
                            ?>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
            <?php 
        endif; ?>
    </div>
</div>
