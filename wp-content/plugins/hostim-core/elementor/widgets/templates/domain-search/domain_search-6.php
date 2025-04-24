<div class="hm10-hero-search">
    <?php
    echo !empty($title) ? '<span class="label">' . esc_html($title) . '</span>' : '';
    $domain_suggestion = $domain_seggestion_on_off == 'yes' ? 'true' : 'false';
    ?>
    <div class="bg-white form-wrapper hostim-domain-search" id="hostim-domain-search<?php echo esc_attr($disable_ajax) ?>" data-suggestion="<?php echo esc_attr($domain_suggestion) ?>">
        <form action="#" class="hm10-hero-search-form __form_submit_btn">
            <input type="hidden" class="whmcs_url_hidden" name="whmcs_url" value="">
            <?php do_action('wdes_domain_verify_code'); ?>
            <input type="text" id="hostim-domain" placeholder="<?php echo esc_attr($placeholder_input) ?>">

            <?php
            if ($disable_ajax_search == 'yes') { ?>
                <button type="submit" id="hostim-search" class="submit-btn __btn"><span class="me-2"><i class="fa-solid fa-magnifying-glass"></i></span><?php echo esc_html($settings['search_btn_label']) ?></button>
            <?php
            } else {
                echo '<a ' . esc_attr(Hostimg_Core_Helper()->the_button($whmcs_url, false))  . ' class="submit-btn __btn"><span class="me-2"><i class="fa-solid fa-magnifying-glass"></i></span>' . esc_attr(!empty($settings['search_btn_label']) ? $settings['search_btn_label'] : __('Search Now', 'hostim-core')) . '</a>';
            }

            wp_nonce_field('check-domain-nonce', 'security', true, false);
            ?>
        </form>
        <div id="hostim-domain-results" class="domain-results-box"></div>
        <?php
        if ($domain_seggestion_on_off == 'yes') {
            echo '<div id="hostim-domain-suggestions" class="domain-results-suggestions"></div>';
        }

        if ($settings['extension_list_show'] == 'yes') : ?>
            <div class="domain-info mt-4 d-flex align-items-center justify-content-center justify-content-lg-start">
                <?php
                if (is_array($extension_list)) {
                    foreach ($extension_list as $list) { ?>
                        <div class="info-box border-0 shadow-none ps-0 elementor-repeater-item-<?php echo esc_attr($list['_id']) ?>">
                            <?php
                            if (!empty($list['extension_domain'])) {
                                echo '<h5 class="primary-text mb-0">' . esc_html($list['extension_domain']) . '</h5>';
                            }
                            if ($select_currency == 'currency_symbol_list') {
                                $currency = $currency_symbol;
                            } else {
                                $currency = $currency_symbol_text;
                            }
                            if (!empty($list['price'])) {
                                echo '<span class="__ext_domain">' . $currency . esc_html($list['price']) . $list['mo_or_yr'] . '</span>';
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