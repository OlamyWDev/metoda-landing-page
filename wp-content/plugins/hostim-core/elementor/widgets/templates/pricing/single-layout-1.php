<div class="wp-pricing-column bg-white deep-shadow pricing-column rounded position-relative">
    <?php
    if (!empty($plan_title)) {
        echo '<h3 class="h4">' . esc_html($plan_title) . '</h3>';
    }

    if (!empty($saved_badge)) {
        echo '<span class="pricing-badge position-absolute rounded fw-bold">' . esc_html($saved_badge) . '</span>';
    }

    if (!empty($sub_title)) {
        echo '<span class="pricing-label d-block mt-4 fw-bold">' . esc_html($sub_title) . '</span>';
    }

    if (!empty($plan_price)) {
        $period        = !empty($period) ? $period : '/mo';
        $currency    = !empty($currency) ? $currency : '$';
        echo '<h4 class="h2 mt-2 monthly-price">' . esc_html($currency . $plan_price) . '<span>' . esc_html($period) . '</span></h4>';
    }

    if (!empty($vat_price)) {
        $vat = $plan_price / 100 * $vat_price;
        $price_with_vat = $plan_price + $vat;
        echo '<h4 class="h2 mt-2 yearly-price">' . esc_html($currency . round($price_with_vat, 2)) . '<span>' . esc_html($period) . '</span></h4>';
    }

    if (!empty($plan_desc)) {
        echo '<p class="mt-4">' . hostim_kses_post($plan_desc) . '</p>';
    }

    if (!empty($purchase_btn_label)) {
        $btn_class = $is_popular == 'yes' ? 'primary-btn' : 'secondary-btn';
        echo '<a href="' . esc_url($purchase_btn_url['url']) . '" class="single_pricing_btn template-btn ' . esc_attr($btn_class) . ' w-100 rounded-pill text-center mt-3 mb-30">' . esc_html($purchase_btn_label) . '</a>';
    }

    if (is_array($table_features)) {
        echo '<ul class="feature-list">';
        foreach ($table_features as $feature) {
            echo '<li>';
            \Elementor\Icons_Manager::render_icon($feature['selected_icon'], ['aria-hidden' => 'true']);
            echo esc_html($feature['feature_title']) . '</li>';
        }
        echo '</ul>';
    }
    ?>
</div>