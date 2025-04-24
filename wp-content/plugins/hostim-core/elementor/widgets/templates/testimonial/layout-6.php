<?php
$desktop_items = !empty($show_items_desktop) ? $show_items_desktop : '1';
$tablet_items  = !empty($show_items_tablet) ? $show_items_tablet : '1';
?>
<section class="home4-feedback ds-bg testimonial_bg_">
    <div class="container">
        <div class="swiper h4-feedback-slider mt-5 pb-40 overflow-hidden" <?php echo hostim_swiper_attrebutes($desktop_items, $carousel_loop, $carousel_autoplay, $slide_delay, $slide_speed, $item_space['size'], $tablet_items, $show_items_mobile) ?>>
            <div class="swiper-wrapper">
                <?php
                if (is_array($testimonials)) {
                    foreach ($testimonials as $testimonial) { ?>
                        <div class="swiper-slide">
                            <div class="h4-feedback-single bg-white rounded">
                                <div class="h4-feedback-top d-flex align-items-center">
                                    <?php
                                    if (!empty($testimonial['author_image']['url'])) {
                                        echo '<img src="' . esc_url($testimonial['author_image']['url']) . '" alt="' . esc_attr($testimonial['name']) . '" class="rounded-circle flex-shrink-0">';
                                    } ?>
                                    <div class="h4-clients-info ms-3">
                                        <?php
                                        if (!empty($testimonial['name'])) {
                                            echo '<h6 class="mb-0">' . $testimonial['name'] . '</h6>';
                                        } ?>
                                        <span class="rating-star">
                                            <svg width="99" height="16" viewBox="0 0 99 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8.45283 12.2013L12.1258 11.2704L13.6604 16L8.45283 12.2013ZM16.9057 6.08805H10.4403L8.45283 0L6.46541 6.08805H0L5.2327 9.86163L3.24528 15.9497L8.47799 12.1761L11.6981 9.86163L16.9057 6.08805Z" fill="#F8B800" />
                                                <path d="M28.9138 12.2013L32.5867 11.2704L34.1213 16L28.9138 12.2013ZM37.3666 6.08805H30.9012L28.9138 0L26.9263 6.08805H20.4609L25.6936 9.86164L23.7062 15.9497L28.9389 12.1761L32.1591 9.86164L37.3666 6.08805Z" fill="#F8B800" />
                                                <path d="M49.3757 12.2013L53.0486 11.2704L54.5832 16L49.3757 12.2013ZM57.8285 6.08805H51.3631L49.3757 0L47.3883 6.08805H40.9229L46.1556 9.86164L44.1681 15.9497L49.4008 12.1761L52.621 9.86164L57.8285 6.08805Z" fill="#F8B800" />
                                                <path d="M69.8366 12.2013L73.5096 11.2704L75.0442 16L69.8366 12.2013ZM78.2895 6.08805H71.824L69.8366 0L67.8492 6.08805H61.3838L66.6165 9.86164L64.6291 15.9497L69.8618 12.1761L73.0819 9.86164L78.2895 6.08805Z" fill="#F8B800" />
                                                <path d="M90.2976 12.2013L93.9705 11.2704L95.5051 16L90.2976 12.2013ZM98.7504 6.08805H92.285L90.2976 0L88.3101 6.08805H81.8447L87.0774 9.86164L85.09 15.9497L90.3227 12.1761L93.5428 9.86164L98.7504 6.08805Z" fill="#F8B800" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                                <?php
                                if (!empty($testimonial['review_content'])) {
                                    echo '<p class="mt-30 mb-0">' . $testimonial['review_content'] . '</p>';
                                }
                                ?>

                                <div class="h4-feedback-bottom mt-30 d-flex align-items-center justify-content-between">
                                    <?php
                                    if (!empty($testimonial['stamp_image']['id'])) {
                                        echo wp_get_attachment_image($testimonial['stamp_image']['id'], 'full');
                                    }

                                    if (!empty($quote_image['url'])) {
                                        echo '<span class="quote-icon">';
                                        echo '<img src="' . esc_url($quote_image['url']) . '" alt="' . esc_attr__('Quote image', 'hostim-core') . '">';
                                        echo '</span>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                } ?>
            </div>
        </div>
    </div>
</section>