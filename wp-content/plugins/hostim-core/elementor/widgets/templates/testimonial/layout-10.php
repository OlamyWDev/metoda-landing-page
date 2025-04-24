<section class="dd-feedback overflow-hidden testimonial_bg_">
    <div class="dd-feedback-slider swiper" data-next=".swiper-next" data-prev=".swiper-prev" <?php echo hostim_swiper_attrebutes($desktop_items, $carousel_loop, $carousel_autoplay, $slide_delay, $slide_speed, $item_space['size'], $tablet_items, $show_items_mobile) ?>>
        <div class="swiper-wrapper">
            <?php
            if (!empty($testimonials10)) {
                foreach ($testimonials10 as $item) {
            ?>
                    <div class="dd-feedback-single bg-white rounded p-4 d-flex align-items-center gap-4 swiper-slide">
                        <div class="feedback-left text-center position-relative flex-shrink-0">
                            <?php
                            if (!empty($item['author_image']['id'])) {
                                echo wp_get_attachment_image($item['author_image']['id'], 'full', '', array('class' => 'img-fluid rounded-circle'));
                            }
                            if (!empty($item['name'])) {
                                echo '<h6 class="mt-4 mb-1">' . esc_html($item['name']) . '</h6>';
                            }
                            if (!empty($item['designation'])) {
                                echo '<span class="fs-sm">' . esc_html($item['designation']) . '</span>';
                            }
                            ?>
                        </div>
                        <div>
                            <?php
                            if (!empty($item['title'])) {
                                echo '<h5 class="mb-4">' . esc_html($item['title']) . '</h5>';
                            }
                            if (!empty($item['review_content'])) {
                                echo '<p class="mb-4">' . esc_html($item['review_content']) . '</p>';
                            }
                            ?>
                            <div class="d-flex align-items-center gap-2 ratting_img rating-<?php echo esc_attr($item['rating']); ?>">
                                <?php
                                $rating_markup = '<img src="' . HOSTIM_PLUGIN_URL . 'elementor/assets/images/testimonial/star_shape.svg" alt="' . esc_attr__('star rating 1', 'hostim-core') . '">';
                                $rating_markup .= '<img src="' . HOSTIM_PLUGIN_URL . 'elementor/assets/images/testimonial/star_shape.svg" alt="' . esc_attr__('star rating 2', 'hostim-core') . '">';
                                $rating_markup .= '<img src="' . HOSTIM_PLUGIN_URL . 'elementor/assets/images/testimonial/star_shape.svg" alt="' . esc_attr__('star rating 3', 'hostim-core') . '">';
                                $rating_markup .= '<img src="' . HOSTIM_PLUGIN_URL . 'elementor/assets/images/testimonial/star_shape.svg" alt="' . esc_attr__('star rating 4', 'hostim-core') . '">';
                                $rating_markup .= '<img src="' . HOSTIM_PLUGIN_URL . 'elementor/assets/images/testimonial/star_shape.svg" alt="' . esc_attr__('star rating 5', 'hostim-core') . '">';

                                echo $rating_markup;
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
</section>