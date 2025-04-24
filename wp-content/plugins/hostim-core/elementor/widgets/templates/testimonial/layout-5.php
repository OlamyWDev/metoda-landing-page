<section class="h5-feedback overflow-hidden testimonial_bg_">
    <?php
    $desktop_items = !empty($show_items_desktop) ? $show_items_desktop : '1';
    $tablet_items  = !empty($show_items_tablet) ? $show_items_tablet : '1';
    ?>
    <div class="h5-feedback-slider swiper" data-next=".swiper-next" data-prev=".swiper-prev" <?php echo hostim_swiper_attrebutes($desktop_items, $carousel_loop, $carousel_autoplay, $slide_delay, $slide_speed, $item_space['size'], $tablet_items, $show_items_mobile) ?>>
        <div class="swiper-wrapper">
            <?php
            if (is_array($testimonials)) {
                foreach ($testimonials as $testimonial) { ?>
                    <div class="h5-feedback-single bg-white rounded d-sm-flex align-items-center swiper-slide">
                        <div class="h5-feedback-single-left text-center">
                            <div class="client-thumb position-relative d-inline-block mb-4">
                                <?php
                                if (!empty($testimonial['author_image']['url'])) {
                                    echo '<img src="' . esc_url($testimonial['author_image']['url']) . '" alt="' . esc_attr($testimonial['name']) . '" class="rounded-circle">';
                                }

                                if (!empty($quote_image['id'])) {
                                    echo '<span class="quote-icon">';
                                    echo wp_get_attachment_image($quote_image['id'], 'full');
                                    echo '</span>';
                                }
                                ?>
                            </div>
                            <?php
                            if (!empty($testimonial['name'])) {
                                echo '<h6 class="mb-0">' . $testimonial['name'] . '</h6>';
                            }
                            if (!empty($testimonial['designation'])) {
                                echo '<span>' . $testimonial['designation'] . '</span>';
                            } ?>
                        </div>
                        <div class="h5-feedback-single-right">
                            <?php
                            if (!empty($testimonial['title'])) {
                                echo '<h5 class="mb-4">' . $testimonial['title'] . '</h5>';
                            }
                            if (!empty($testimonial['review_content'])) {
                                echo '<p class="mb-4">' . $testimonial['review_content'] . '</p>';
                            }
                            ?>

                            <div class="d-flex align-items-center justify-content-between">
                                <div class="sh-feedback-rating rating-<?php echo esc_attr($testimonial['rating']); ?>">
                                    <?php
                                    $rating_markup = '<img src="' . HOSTIM_PLUGIN_URL . 'elementor/assets/images/testimonial/star_shape.svg" alt="' . esc_attr__('star rating 1', 'hostim-core') . '">';
                                    $rating_markup .= '<img src="' . HOSTIM_PLUGIN_URL . 'elementor/assets/images/testimonial/star_shape.svg" alt="' . esc_attr__('star rating 2', 'hostim-core') . '">';
                                    $rating_markup .= '<img src="' . HOSTIM_PLUGIN_URL . 'elementor/assets/images/testimonial/star_shape.svg" alt="' . esc_attr__('star rating 3', 'hostim-core') . '">';
                                    $rating_markup .= '<img src="' . HOSTIM_PLUGIN_URL . 'elementor/assets/images/testimonial/star_shape.svg" alt="' . esc_attr__('star rating 4', 'hostim-core') . '">';
                                    $rating_markup .= '<img src="' . HOSTIM_PLUGIN_URL . 'elementor/assets/images/testimonial/star_shape.svg" alt="' . esc_attr__('star rating 5', 'hostim-core') . '">';

                                    echo $rating_markup;
                                    ?>
                                </div>
                                <?php
                                if (!empty($testimonial['stamp_image']['id'])) {
                                    echo wp_get_attachment_image($testimonial['stamp_image']['id'], 'full');
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
        <div class="swiper-prev swiper-controls"><i class="fa-solid fa-arrow-left"></i></div>
        <div class="swiper-next swiper-controls"><i class="fa-solid fa-arrow-right"></i></div>
    </div>
</section>