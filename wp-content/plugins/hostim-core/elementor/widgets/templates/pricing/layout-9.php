<div class="row justify-content-center pricing_9">
    <div class="col-xl-10 col-lg-12 col-md-8 text-center">
        <?php
        if ($show_tab == 'yes') { ?>
            <div class="tab-switch-btn d-inline-flex align-items-center justify-content-center position-relative mt-20 mb-30">
                <span class="monthly period-style fw-bold"><?php echo esc_html($monthly_title) ?></span>
                <input type="checkbox" class="switch-input position-absolute ">
                <span class="toggle-switch-btn rounded-pill position-relative isb-gd-bg"></span>
                <span class="yearly period-style fw-bold"><?php echo esc_html($anual_title) ?></span>
            </div>
        <?php
        }
        ?>
        <div class="row g-lg-0 align-items-center justify-content-center">
            <?php
            if (is_array($tables)) {
                foreach ($tables as $table) {
                    $popular_badge = $table['is_popular'] == 'yes' ? 'popular_active' : '';
            ?>
                    <div class="col-lg-4">
                        <div class="isb-price-box isb-bg-color-2 text-center ptb-40 pl-45 pr-45 rounded-12 isb-border isb-border-color mt-20 position-relative  ">
                            <?php
                            if ($table['is_popular'] == 'yes') {
                                echo '<img class="isb-popular-badge position-absolute" src="' . HOSTIM_PLUGIN_ASSETS_URL . 'shapes/popular-img.png" alt="img">';
                            }

                            if (!empty($table['feature_img']['url'])) {
                                echo '<img src=" ' . esc_url($table['feature_img']['url']) . ' " alt="" class="ibs-price-image">';
                            }
                            if (!empty($table['plan_title'])) {
                                echo '<h5 class="fs-24 mt-30 title-color">' . hostim_kses_post(nl2br($table['plan_title'])) . '</h5>';
                            }
                            ?>
                            <?php
                            $table_contents = preg_split('/\r\n|[\r\n]/', $table['list_items']);
                            if (!empty($table_contents)) {
                                echo '<ul class="list-unstyled mt-20">';
                                foreach ($table_contents as $item) {
                                    echo '<li calss="text-white fs-14 mb-10">' . hostim_kses_post($item) . '</li>';
                                }
                                echo '</ul>';
                            }
                            ?>
                            <div class="isb-price monthly-price text-white mt-30 isb-min-price-after">
                                <?php
                                if (!empty($table['currency'])) {
                                    echo '<span class="ist-dollar position-relative">' . esc_html($table['currency']) . '</span>';
                                }
                                if (!empty($table['monthly_price'])) {
                                    $pricing_floating = str_replace('.', '</span><span class="isb-min-price-after position-relative ms-2">.', $table['monthly_price']);
                                    echo '<span class="isb-min-price">' . hostim_kses_post($pricing_floating) . '</span>';
                                }
                                ?>
                            </div>
                            <div class="isb-price yearly-price text-white mt-30 isb-min-price-after">
                                <?php
                                if (!empty($table['currency'])) {
                                    echo '<span class="ist-dollar position-relative">' . esc_html($table['currency']) . '</span>';
                                }
                                if (!empty($table['annual_price'])) {
                                    $price_txt = str_replace('.','</span><span class="position-relative">.</span>',$table['annual_price']);
                                    echo '<span class="isb-min-price">' . hostim_kses_post($price_txt) . '</span>';
                                }
                                ?>
                            </div>
                            <?php
                            if (!empty($table['purchase_btn_label'])) {
                                echo '<a href="' . esc_url($table['purchase_btn_url']['url']) . '" class="template-btn pricing_btn__ text-center w-100 rounded-pill mt-20">' . esc_html($table['purchase_btn_label']) . '</a>';
                            }
                            ?>
                        </div>
                    </div>
            <?php
                }
            }
            ?>


        </div>
    </div>
</div>