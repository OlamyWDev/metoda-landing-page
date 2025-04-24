<?php
$disable_ajax = $disable_ajax_search == 'yes' ? '' : '-off';
$domain_suggestion = $domain_seggestion_on_off == 'yes' ? 'true' : 'false';
?>
<div id="hostim-domain-search<?php echo esc_attr( $disable_ajax ) ?>" class="hostim-domain-search domain_search_section" data-suggestion="<?php echo esc_attr($domain_suggestion) ?>">
    <form action="#" id="hostim_domain_search_form" class="dm-hero-domain-form d-flex align-items-center __form_submit_btn">
        <div class="__domain_form d-flex domain_search">
            <input type="hidden" class="whmcs_url_hidden" name="whmcs_url" value="">
	        <?php do_action( 'wdes_domain_verify_code' ); ?>

            <input type="text" id="hostim-domain" placeholder="<?php echo esc_attr( $placeholder_input ) ?>">

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
	        ?>
        </div>
        <div class="d-inline">
            <?php
            if($disable_ajax_search == 'yes' ){ ?>
                <input id="hostim-search" class="template-btn primary-btn border-0 flex-shrink-0" type="submit"
                   value="<?php echo esc_attr(!empty($settings['search_btn_label']) ? $settings['search_btn_label'] : __('Search Now', 'hostim-core')) ?>">
                <?php
            }
            else{
                echo '<a ' . esc_attr(Hostimg_Core_Helper()->the_button($whmcs_url, false))  . ' class="domain_redirect_link template-btn primary-btn border-0 flex-shrink-0">'. esc_attr(!empty($settings['search_btn_label']) ? $settings['search_btn_label'] : __('Search Now', 'hostim-core') ) .'</a>';
            }
            ?>

        </div>
        <?php wp_nonce_field( 'check-domain-nonce', 'security', true, false ); ?>

    </form>

    <div id="hostim-domain-results" class="domain-results-box"></div>
    <?php 
    if($domain_seggestion_on_off == 'yes' ){
        echo '<div id="hostim-domain-suggestions" class="domain-results-suggestions"></div>';
    }
    
    if ( $settings['extension_list_show'] == 'yes' ) : ?>
        <div class="dm-hero-label mt-30 __domain_ext">
            <?php
            $separator = $extention_separator == 'none' ? '' : 'has_separator';
            if( is_array( $extension_list ) ){
                foreach( $extension_list as $list ){
                    $extension = !empty( $list['extension_domain'] ) ? $list['extension_domain'] : '';
                    $price     = !empty( $list['price'] ) ? $list['price'] : '';
                    if ($select_currency == 'currency_symbol_list') {
                        $currency = $currency_symbol;
                    } else {
                        $currency = $currency_symbol_text;
                    }
                    ?>
                    <span class="domain_price elementor-repeater-item-<?php echo esc_attr( $list['_id'] ) .' '. esc_attr($separator) ?>">
                        <?php echo '<strong>'. esc_html( $extension ) .'</strong><span class="price_info">'. esc_html($list['mo_or_yr']) .' '. $currency.$price; ?></span>
                    </span>
                    <?php
                }
            }
            ?>
        </div>
        <?php 
    endif; ?>
</div>
