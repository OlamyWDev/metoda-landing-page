<div class="host-fs-feedback-area testimonial_bg_">
    <div class="container">
        <div class="position-relative">
            <?php
            $nav_left = $nav_top == 'yes' ? 'nav-left' : '';
            $nav_right = $nav_top == 'yes' ? 'nav-right' : '';
            ?>
            <div class="host-fs-feedback-nav d-none d-sm-block">
                <button class="hm7-feedback-prev rounded-circle border-0 position-absolute text-black <?php echo esc_attr($nav_left); ?> button-bg-color"><i class="fas fa-arrow-left"></i></button>
                <button class="hm7-feedback-next rounded-circle border-0 position-absolute text-black <?php echo esc_attr($nav_right); ?> button-bg-color"><i class="fas fa-arrow-right"></i></button>
            </div>
            <?php
            $desktop_items = !empty($show_items_desktop) ? $show_items_desktop : '1';
            $tablet_items  = !empty($show_items_tablet) ? $show_items_tablet : '1';
            ?>
            <div class="host-fs-feedback swiper overflow-hidden" data-next=".hm7-feedback-next" data-prev=".hm7-feedback-prev" <?php echo hostim_swiper_attrebutes($desktop_items, $carousel_loop, $carousel_autoplay, $slide_delay, $slide_speed, $item_space['size'], $tablet_items, $show_items_mobile) ?>>
                <div class="swiper-wrapper">
                    <?php
                    if (is_array($testimonials12) && count($testimonials12) > 0) {
                        foreach ($testimonials12 as $testimonial) {
                            $col_class = !empty($testimonial['feature_img']['id']) ? '6' : '12' ?>
                            <div class="swiper-slide">
                                <div class="host-fs-feedback-item bg-white p-5 rounded-3">
                                    <div class="row align-items-center justify-content-between gap-5 gap-lg-0">
                                        <div class="col-lg-<?php echo esc_attr($col_class) ?>">
                                            <?php
                                            if (!empty($testimonial['testimonial_title'])) {
                                                echo '<h5 class="testimonial_title fs-28 fw-800 mb-20">' . esc_html($testimonial['testimonial_title']) . '</h5>';
                                            }
                                            if (!empty($testimonial['testimonial_content'])) {
                                                echo '<p class="mb-30 testimonial_content">' . esc_html($testimonial['testimonial_content']) . '</p>';
                                            }
                                            ?>
                                            <div class="d-flex align-items-center gap-3">
                                                <?php
                                                if (!empty($testimonial['author_thumn']['id'])) {
                                                    echo wp_get_attachment_image($testimonial['author_thumn']['id'], 'pricing_60x60', '', array('class' => 'img-fluid flex-shrink-0 rounded-circle'));
                                                }
                                                ?>
                                                <div class="author-info">
                                                    <?php
                                                    if (!empty($testimonial['author_name'])) {
                                                        echo '<h6 class="author-name mb-0">' . esc_html($testimonial['author_name']) . '</h6>';
                                                    }
                                                    if (!empty($testimonial['author_designation'])) {
                                                        echo '<p class="mb-0 author-designation">' . esc_html($testimonial['author_designation']) . '</p>';
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        if (!empty($testimonial['feature_img']['id'])) {
                                            echo '<div class="col-lg-5"><div class="text-center">';
                                            echo wp_get_attachment_image($testimonial['feature_img']['id'], 'full', '', array('class' => 'img-fluid'));
                                            echo '</div></div>';
                                        }
                                        ?>
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