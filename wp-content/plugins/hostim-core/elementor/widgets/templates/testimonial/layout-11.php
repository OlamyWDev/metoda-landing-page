<?php
$desktop_items = !empty($show_items_desktop) ? $show_items_desktop : '1';
$tablet_items  = !empty($show_items_tablet) ? $show_items_tablet : '1';
?>
<div class="isb-testimonial-area">
    <div class="container">
        <div class="isb-feedback isb-bg-color-2 rounded-16 pt-120 position-relative">
            <div class="isb-testimonial-slider swiper overflow-hidden" data-next=".slide-control-next" data-prev=".slide-control-prev" <?php echo hostim_swiper_attrebutes($desktop_items, $carousel_loop, $carousel_autoplay, $slide_delay, $slide_speed, $item_space['size'], $tablet_items, $show_items_mobile) ?>>
                <div class="swiper-wrapper">
                    <?php
                    if (is_array($testimonials)) {
                        foreach ($testimonials as $testimonial) { ?>
                            <div class="isb-testimonial-item swiper-slide">
                                <?php
                                if (!empty($testimonial['review_content'])) {
                                    echo '<p class="isb-testimonial-content"> ' . esc_html($testimonial['review_content']) . ' </p>';
                                }
                                ?>
                                <div class="isb-authors d-flex align-items-center mt-30">
                                    <?php
                                    if (!empty($testimonial['author_image']['url'])) {
                                        echo '<img src="' . esc_url($testimonial['author_image']['url']) . '" alt="' . esc_html($testimonial['name']) . '" class="isb-author-image">';
                                    }
                                    ?>

                                    <div class="isb-author-info ml-20">
                                        <?php
                                        if (!empty($testimonial['name'])) {
                                            echo '<h6 class="mb-0">' . esc_html($testimonial['name']) . '</h6>';
                                        }
                                        if (!empty($testimonial['designation'])) {
                                            echo '<p class="mb-0"> ' . esc_html($testimonial['designation']) . ' </p>';
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    } ?>
                </div>
                <div class="slide-control-prev slide-control isb-slider-arrow prev"><i class="fa-solid fa-arrow-left"></i></div>
                <div class="slide-control-next slide-control isb-slider-arrow"><i class="fa-solid fa-arrow-right"></i></div>
            </div>
        </div>
    </div>
</div>