<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-10">
            <?php
            $desktop_items = !empty($show_items_desktop) ? $show_items_desktop : '1';
            $tablet_items  = !empty($show_items_tablet) ? $show_items_tablet : '1';
            ?>
            <div class="swiper feedback-slider" paginationtype="bullets" data-pagination=".swiper-pagination" data-perpage="<?php echo esc_attr($desktop_items) ?>" data-next=".hm7-feedback-next" data-prev=".hm7-feedback-prev" <?php echo hostim_swiper_attrebutes($desktop_items, $carousel_loop, $carousel_autoplay, $slide_delay, $slide_speed, $item_space['size'], $tablet_items, $show_items_mobile) ?>>

                <div class="swiper-wrapper">
                    <?php
                    foreach ($testimonial13_section as $item) { ?>
                        <div class="swiper-slide">
                            <div class="row g-4 align-items-center">
                                <?php
                                if (!empty($item['testi_13_image']['id'])) { ?>
                                    <div class="col-md-4">
                                        <?php echo wp_get_attachment_image($item['testi_13_image']['id'], 'full', '', ["class" => "img-fluid", "alt" => "image"]); ?>
                                    </div>
                                <?php
                                }
                                ?>

                                <div class="col-md-8">
                                    <?php
                                    if (!empty($item['testi_13_quote_image']['id'])) { ?>
                                        <div class="feedback-slider__icon mb-4">
                                            <?php echo wp_get_attachment_image($item['testi_13_quote_image']['id'], 'full', '', ["class" => "img-fluid", "alt" => "image"]); ?>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    <?php
                                    if (!empty($item['test13_review_content'])) { ?>
                                        <p class="feedback-slider__desc mb-0 testimonial_content">
                                            <?php echo esc_html($item['test13_review_content']); ?>
                                        </p>
                                    <?php
                                    }
                                    ?>
                                    <hr class="feedback-slider__hr">
                                    <?php
                                    if (!empty($item['test13_name'])) { ?>
                                        <h6 class="mb-0 fw-bold author-name">
                                            <?php echo esc_html($item['test13_name']); ?>
                                        </h6>
                                    <?php
                                    }
                                    if (!empty($item['test13_designation'])) { ?>
                                        <small class="author-designation">
                                            <?php echo esc_html($item['test13_designation']); ?>
                                        </small>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
                <div class="swiper-pagination feedback-slider__pagination"></div>
            </div>
        </div>
    </div>
</div>