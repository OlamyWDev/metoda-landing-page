<div class="container-fluid container-xmax p-0">
    <div class="row g-0 justify-content-center">
        <div class="col-12">
            <div class="qty-brand-slider swiper overflow-hidden" <?php echo hostim_swiper_attrebutes($desktop_items, $carousel_loop, $carousel_autoplay, $slide_delay, $slide_speed, $item_space['size'], $tablet_items, $show_items_mobile) ?>>
                <div class="swiper-wrapper">
                    <?php
                    foreach ($logo_carousel as $item) { ?>
                        <div class="swiper-slide">
                            <div class="qty-brand">
                                <a <?php Hostimg_Core_Helper()->the_button($item['item_url']); ?>>
                                    <div class="qty-brand__img">
                                        <img src="<?php echo $item['icon_img']['url']; ?>" alt="image" class="img-fluid">
                                    </div>
                                    <div class="qty-brand__text">
                                        <?php echo esc_html($item['title']); ?>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>