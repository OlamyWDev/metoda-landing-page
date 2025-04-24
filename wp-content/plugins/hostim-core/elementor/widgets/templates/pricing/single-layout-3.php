<div class="host-web-price-item bg-white p-4 pt-30 rounded-3 position-relative z-1">
    <?php
    if ($settings['is_popular'] == 'yes') { ?>
        <div class="sale-badge text-center position-absolute z--1">
            <span class="text-white fw-bold"><?php echo esc_html($settings['popular_title']); ?></span>
        </div>
    <?php
    }
    ?>

    <div class="row align-items-center gap-4 gap-xl-0">
        <div class="col-xl-5">
            <div class="d-flex align-items-center flex-wrap flex-sm-nowrap gap-7">
                <div class="host-web-op-bg d-inline-block p-5 rounded-3">
                    <?php echo wp_get_attachment_image($settings['pricing_img']['id'], 'thumbnail', '', ["class" => "img-fluid"]); ?>
                </div>
                <div class="host-web-content">
                    <?php
                    if (!empty($plan_title)) {
                        echo '<h5 class="fs-24 mb-10 title_style">' . esc_html($plan_title) . '</h5>';
                    }
                    if (!empty($plan_desc)) {
                        echo '<p class="mb-0 des_style">' . hostim_kses_post($plan_desc) . '</p>';
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="col-xl-7">
            <div class="row align-items-center">
                <div class="col-md-7">
                    <?php
                    if (is_array($table_features)) {
                        echo '<ul class="host-web-price-list d-flex align-items-center justify-content-between flex-wrap ">';
                        foreach ($table_features as $feature) {
                            $strt_rep = str_replace('{', '<span class="text-black fw-800">', $feature['feature_title']);
                            $span_replaced = str_replace('}', '</span>', $strt_rep);

                            echo '<li class="fs-14 fw-500 list_style">';
                            \Elementor\Icons_Manager::render_icon($feature['selected_icon'], ['aria-hidden' => 'true']);
                            echo hostim_kses_post($span_replaced) . '</li>';
                        }
                        echo '</ul>';
                    }
                    ?>
                </div>
                <div class="col-md-5">
                    <div class="pl-40">
                        <?php
                        if (!empty($sub_title)) {
                            echo '<p class="text-success fw-bolder mb-10">' . esc_html($sub_title) . '</p>';
                        }
                        ?>
                        <h5 class="mb-20 pri_color_style"><?php echo esc_html($settings['currency']) . esc_html($settings['plan_price']); ?> <span class="text-black fs-16 fw-400"><?php echo esc_html($settings['period']); ?></span></h5>
                        <?php
                        if (!empty($purchase_btn_label)) {
                            echo '<a href="' . esc_url($purchase_btn_url['url']) . '" class="template-btn isb-small-btn rounded-4 btn-small btn_style">' . esc_html($purchase_btn_label) . '</a>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>