<section class="bg-body-24 overflow-hidden">
    <div class="row g-3">
        <div class="col-lg-12">
            <div class="h24-feedback-slider swiper h-100">
                <div class="swiper feedback-slider" data-next=".host-web-swiper-button-next" data-prev=".host-web-swiper-button-prev" paginationtype="bullets" data-pagination=".swiper-pagination" data-perpage="<?php echo esc_attr($desktop_items) ?>" data-next=".hm7-feedback-next" data-prev=".hm7-feedback-prev" <?php echo hostim_swiper_attrebutes($desktop_items, $carousel_loop, $carousel_autoplay, $slide_delay, $slide_speed, $item_space['size'], $tablet_items, $show_items_mobile) ?>>
                    <div class="swiper-wrapper">
                        <?php
                        if (is_array($testimonials)) {
                            foreach ($testimonials as $testimonial) { ?>
                                <div class="swiper-slide">
                                    <div class="feedback_24_item bg-white p-4 rounded-3 overflow-hidden h-100 position-relative">
                                        <div class="d-flex flex-column justify-content-between h-100">
                                            <?php
                                            if (!empty($testimonial['review_content'])) {
                                                echo '<p class="ff-sg mb-0 review_content_style__">' . esc_html($testimonial['review_content']) . '</p>';
                                            }
                                            ?>
                                            <div class="d-flex align-items-center gap-3 author_information__">
                                                <?php
                                                if (!empty($testimonial['author_image']['url'])) {
                                                    echo wp_get_attachment_image($testimonial['author_image']['id'], 'full', '', ['class' => 'img-fluid flex-shrink-0 rounded-circle']);
                                                }
                                                ?>
                                                <div class="author-info">
                                                    <?php
                                                    if (!empty($testimonial['name'])) {
                                                        echo '<h6 class="ff-sg mb-0 author_name_style__">' . esc_html($testimonial['name']) . '</h6>';
                                                    }
                                                    if (!empty($testimonial['designation'])) {
                                                        echo '<p class="ff-sg mb-0 author_desig_style__">' . esc_html($testimonial['designation']) . '</p>';
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="img_wrapper position-absolute h-100">
                                            <?php
                                            if (!empty($testimonial['section_hover_image']['url'])) {
                                                echo wp_get_attachment_image($testimonial['section_hover_image']['id'], 'full', '', ['class' => 'img-fluid h-100 w-100']);
                                            }
                                            ?>
                                            <a href="<?php echo esc_url($testimonial['popup_vdo_link']['url']) ?>" class="vps-video-popup bg-white popup_style_24 text-danger position-absolute"><i class="fa-solid fa-play"></i></a>
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
    <div class="d-flex align-items-center justify-content-end gap-3 mt-4">
        <div class="host-web-swiper-button-prev host-web-slider-arrow" tabindex="0" role="button" aria-label="Previous slide" aria-controls="swiper-wrapper-bca92bb40455febc">
            <span class="text-white"><i class="fa-solid fa-arrow-left"></i></span>
        </div>
        <div class="host-web-swiper-button-next host-web-slider-arrow" tabindex="0" role="button" aria-label="Next slide" aria-controls="swiper-wrapper-bca92bb40455febc">
            <span class="text-white"><i class="fa-solid fa-arrow-right"></i></span>
        </div>
    </div>
</section>