<section class="h5-feedback overflow-hidden testimonial_bg_">
    
    <div class="h8-slider swiper" data-next=".swiper-next" data-prev=".swiper-prev" <?php echo hostim_swiper_attrebutes($desktop_items, $carousel_loop, $carousel_autoplay, $slide_delay, $slide_speed, $item_space['size'], $tablet_items, $show_items_mobile) ?>>
        <div class="swiper-wrapper">
            <?php
            if (is_array($testimonials)) {
                foreach ($testimonials as $testimonial) { ?>
                    <div class="h8-feedback-single bg-white rounded d-sm-flex align-items-center swiper-slide">
                        <div class="h8-feedback-single-left text-center">
                            <div class="client-thumb position-relative d-inline-block mb-4">
                                <?php
                                if (!empty($testimonial['author_image']['url'])) {
                                    echo '<img src="' . esc_url($testimonial['author_image']['url']) . '" alt="' . esc_attr($testimonial['name']) . '" class="rounded-circle">';
                                } ?>
                            </div>
                            <?php
                            if (!empty($testimonial['name'])) {
                                echo '<h6 class="mb-0">' . $testimonial['name'] . '</h6>';
                            }
                            if (!empty($testimonial['designation'])) {
                                echo '<span>' . $testimonial['designation'] . '</span>';
                            } ?>
                        </div>
                        <div class="h8-feedback-single-right">

                            <div class="sh-feedback-rating mt-2 mt-sm-0 mb-3 rating-<?php echo esc_attr($testimonial['rating']); ?>">
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
                            if (!empty($testimonial['review_content'])) {
                                echo '<p class="mb-4">' . $testimonial['review_content'] . '</p>';
                            }
                            ?>
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