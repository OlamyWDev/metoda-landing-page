<?php
$disable_ajax = $disable_ajax_search == 'yes' ? '' : '-off';
$domain_suggestion = $domain_seggestion_on_off == 'yes' ? 'true' : 'false';
?>
<div class="dd-domain-content hostim-domain-search" id="hostim-domain-search<?php echo esc_attr( $disable_ajax ) ?>" data-suggestion="<?php echo esc_attr($domain_suggestion) ?>">
    <form action="#" class="dd-search-form bg-white rounded-pill p-1 ps-3 d-flex align-items-center gap-2 __form_submit_btn">
        <input type="hidden" class="whmcs_url_hidden" name="whmcs_url" value="">
        <?php do_action( 'wdes_domain_verify_code' );
        ?>
        <span class="icon"><i class="fas fa-search"></i></span>
        <input id="hostim-domain" type="text" placeholder="<?php echo esc_attr( $placeholder_input ) ?>">
        <?php
        if( $disable_ajax_search == 'yes' ) { ?>
            <button id="hostim-search" type="submit" class="dd-submit-btn __btn"><?php echo esc_html($settings['search_btn_label']) ?></button>
            <?php
        }
        else{
            echo '<a ' . esc_attr(Hostimg_Core_Helper()->the_button($whmcs_url, false))  . ' class="dd-submit-btn __btn">'. esc_attr(!empty($settings['search_btn_label']) ? $settings['search_btn_label'] : __('Search Now', 'hostim-core') ) .'</a>';
        }

        wp_nonce_field( 'check-domain-nonce', 'security', true, false );
        ?>
    </form>
    <div id="hostim-domain-results" class="domain-results-box"></div>
    <?php 
    if($domain_seggestion_on_off == 'yes' ){
        echo '<div id="hostim-domain-suggestions" class="domain-results-suggestions"></div>';
    }
    
    if ( $settings['extension_list_show'] == 'yes' ) : ?>
        <div class="domain-info dd-domain-info mt-40 d-flex flex-wrap align-items-center">
            <?php
            if( is_array( $extension_list ) ){
                foreach( $extension_list as $list ){ ?>
                    <div class="info-box shadow-none pl-0 border-0 elementor-repeater-item-<?php echo esc_attr( $list['_id'] ) ?>">
                        <?php
                        if( !empty( $list['extension_domain'] ) ){
                            echo '<h5 class="text-primary mb-0">'. esc_html( $list['extension_domain'] ) .'</h5>';
                        }
                        if ($select_currency == 'currency_symbol_list') {
                            $currency = $currency_symbol;
                        } else {
                            $currency = $currency_symbol_text;
                        }
                        if( !empty( $list['price'] ) ){
                            echo '<span>'. $currency . esc_html( $list['price'] ) . $list['mo_or_yr'] .'</span>';
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
