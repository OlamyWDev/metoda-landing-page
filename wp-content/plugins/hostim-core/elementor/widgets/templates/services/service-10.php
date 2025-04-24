<section class="bg-body-24">
    <div class="container">
        <div class="row g-3">
            <?php
            $paged      = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $current_language = class_exists('Polylang') ? pll_current_language() : get_locale();
            $args       = array(
                'post_type'      => 'services',
                'paged'          => $paged,
                'order'          => $settings['order'],
                'orderby'        => $settings['order_by'],
                'posts_per_page' => $settings['posts_per_page'],
                'lang'           => $current_language,
            );
            $hostim_service = new \WP_Query($args);
            if ($hostim_service->have_posts()) {
                while ($hostim_service->have_posts()) {
                    $hostim_service->the_post();
                    $meta = get_post_meta(get_the_ID(), 'hostim_service_options', true);
            ?>
                    <div class="col-md-6 col-xl-3">
                        <div class="service_card_item_24 bg-white px-4 py-5 rounded-3">
                            <?php
                            if ($meta['service_feature_img']['id']) {
                                echo wp_get_attachment_image($meta['service_feature_img']['id'], 'full', '', ["class" => "img-fluid mb-30"]);
                            }
                            ?>
                            <a href="<?php the_permalink() ?>">
                                <h5 class="text-black__ fs-20 mb-20 service_title__"><?php echo esc_html(substr(get_the_title(), 0, $title_length_)) ?></h5>
                            </a>
                            <?php
                            if (!empty($meta['service_short_desc'])) {
                                echo '<p class="mb-3 service_desc__">' . esc_html(substr($meta['service_short_desc'], 0, $excerpt_length_)) . '</p>';
                            }
                            if (!empty($meta['service_monthly_price'])) {
                                $pring_period = !empty($meta['service_pricing_period']) ? $meta['service_pricing_period'] : '';
                                echo '<a href="' . get_the_permalink(get_the_ID()) . '" class="text-black__ fw-semibold fs-16 service_btn__">' .
                                    esc_html($service_btn_label) .
                                    '<span class="text-danger currency_title__">' . esc_html($currency) . '</span>' .
                                    '<span class="text-danger price_title__">' . esc_html($meta['service_monthly_price']) . '</span>' .
                                    esc_html($pring_period) .
                                    '</a>';
                            }
                            ?>
                        </div>
                    </div>
            <?php
            wp_reset_postdata();
                }
            }
            ?>
        </div>
    </div>
</section>