<div class="isb-tab-area position-relative">
    <div class="container">
        <div class="position-relative">
            <div class="row">
                <div class="col-lg-12">
                    <div class="isb-tab hm2-service-tab mt-60">
                        <ul class="nav nav-tabs crs-line-border">
                            <?php
                            if (!empty($service_categories)) {
                                foreach ($service_categories as $key => $category_) {
                                    $active_class = $key == 0 ? ' active' : '';
                                    $category = get_term($category_['select_cat'], 'services_cat');
                                    echo '<li><button class="text-white ' . esc_attr($active_class) . '" data-bs-toggle="tab" data-bs-target="#' . esc_attr($category->slug) . '" type="button">' . esc_html($category->name) . '</button></li>';
                                }
                            } ?>
                        </ul>
                        <div class="tab-content mt-4">
                            <?php
                            if (!empty($service_categories)) {
                                foreach ($service_categories as $key => $cat_item) {
                                    $category = get_term($cat_item['select_cat'], 'services_cat');
                                    $activeClass = $key == 0 ? ' active' : ''; ?>
                                    <div class="tab-pane fade show <?php echo esc_attr($activeClass) ?>" id="<?php echo esc_attr($category->slug) ?>">
                                        <div class="row">
                                            <?php
                                            $args = array(
                                                'post_type' => 'services',
                                                'posts_per_page' => 4,
                                                'tax_query' => array([
                                                    'taxonomy' => 'services_cat',
                                                    'field' => 'slug',
                                                    'terms' => $category->slug,
                                                ])
                                            );

                                            $cat_posts = get_posts($args); ?>

                                            <div class="col-xl-6">
                                                <div class="ibs-project-box isb-bg-color-2 ptb-50 ps-5 pe-5 isb-border isb-border-color rounded-8 mt-20">
                                                    <?php
                                                    if (!empty($cat_item['block_title'])) {
                                                        echo '<h3 class="isb-section-title text-white fs-36 mb-20">' . esc_html($cat_item['block_title']) . '</h3>';
                                                    }
                                                    if (!empty($cat_item['block_desc'])) {
                                                        echo '<p class="isb-body-2 isb-color-two mb-50">' . esc_html($cat_item['block_desc']) . '</p>';
                                                    }
                                                    if (!empty($cat_item['btn_label'])) {
                                                        echo '<a href="' . esc_url($cat_item['btn_url']['url']) . '" class="btn isb-gd-btn text-white isb-btn-typo border-0 position-relative z-1">' . esc_html($cat_item['btn_label']) . '</a>';
                                                    }
                                                    if (!empty($cat_item['block_image']['id'])) {
                                                        echo '<div class="text-end">' . wp_get_attachment_image($cat_item['block_image']['id'], 'full') . '</div>';
                                                    } ?>
                                                </div>
                                            </div>

                                            <div class="col-xl-6">
                                                <div class="row ibs-project-info-boxs">
                                                    <?php
                                                    foreach ($cat_posts as $cat_post) {
                                                        setup_postdata($cat_post);
                                                        $meta = get_post_meta($cat_post->ID, 'hostim_service_options', true); ?>
                                                        <div class="col-md-6">
                                                            <div class="ibs-project-info-item text-center isb-bg-color-3 isb-border isb-border-color-2 rounded-1 ptb-40 ps-4 pe-4 mt-20">
                                                                <?php
                                                                if ($meta['service_feature_img']['id']) {
                                                                    echo wp_get_attachment_image($meta['service_feature_img']['id'], 'full');
                                                                } ?>
                                                                <h4 class="text-white isb-body mt-30"><?php echo substr(get_the_title($cat_post->ID), 0, $title_length_) ?></h4>
                                                                <p class="isb-body-2 isb-color-two mt-20"><?php echo hostim_kses_post(substr($meta['service_short_desc'], 0, $excerpt_length_)) ?></p>
                                                            </div>
                                                        </div>
                                                    <?php
                                                    }
                                                    wp_reset_postdata();
                                                    ?>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                            <?php
                                }
                            }
                            ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>