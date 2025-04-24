<section class="em-pricing-slider-area pricing_sec">
    <div class="container">
        <div class="em-pricing-slider-wrapper overflow-hidden">
            <?php 
            $desktop_items = !empty( $show_items_desktop ) ? $show_items_desktop : '3';
            $tablet_items  = !empty( $show_items_tablet ) ? $show_items_tablet : '1';
            ?>
            <div class="em-pricing-slider swiper overflow-visible" 
                data-pagination=".swiper-pagination"
                data-paginationtype="bullets"
                data-center="true"
                data-space="<?php echo esc_attr( $item_space['size'] ) ?>"
                data-perpage="<?php echo esc_attr( $desktop_items ) ?>"
                data-loop="<?php echo $carousel_loop == 'yes' ? 'true' : 'false' ?>"
                data-autoplay="<?php echo $carousel_autoplay == 'yes' ? 'true' : 'false' ?>"
                data-speed="<?php echo esc_attr( $slide_speed ) ?>"                
                data-breakpoints='{"1440": {"slidesPerView": <?php echo esc_attr( $desktop_items ) ?>},"1024": {"slidesPerView": <?php echo esc_attr( $desktop_items ) ?>}, "992":{"centeredSlides": "true" }, "768": {"slidesPerView": <?php echo esc_attr( $tablet_items ) ?>, "centeredSlides": "false" }, "360": {"slidesPerView": <?php echo esc_attr( $show_items_mobile ) ?>}}' >
                <div class="swiper-wrapper">
                    <?php 
                    if( is_array( $pricing_carousel ) ){
                        foreach( $pricing_carousel as $key => $pricing_plan ){ ?>
                            <div class="em-pricing-single-item swiper-slide bg-white rounded">
                                <?php 
                                if( !empty( $pricing_plan['s6_package_icon']['id'] ) ){
                                    echo wp_get_attachment_image( $pricing_plan['s6_package_icon']['id'], 'full' );
                                }
                                if( !empty( $pricing_plan['package_title'] ) ){
                                    echo '<h4 class="mt-4">'. esc_html( $pricing_plan['package_title'] ) .'</h4>';
                                }
                                if( !empty( $pricing_plan['s6_plan_desc'] ) ){
                                    echo '<p>'. hostim_kses_post( $pricing_plan['s6_plan_desc'] ) .'</p>';
                                }

                                $table_contents = preg_split( '/\r\n|[\r\n]/', $pricing_plan['s8_plan_features'] );
                                if( !empty( $table_contents ) ){
                                    echo '<ul class="list-items mb-4">';
                                    foreach( $table_contents as $item ){
                                        $tooltip_attr = '';
                                        $info_icon    = '';
                                        $limit_text   = !empty($limit_char) ? mb_strimwidth($item, 0, $limit_char, '') : $item;

                                        if ($enable_tooltip == 'yes') {
                                            $tooltip_attr = strlen($item) > $limit_char ? 'data-bs-toggle="tooltip" data-bs-placement="' . esc_attr($tooltip_alignment) . '" title=" ' . esc_html($item) . ' "' : '';
                                            $info_icon    = strlen($item) > $limit_char ? ' <i class="fa-regular fa-circle-question"></i>' : '';
                                        }
                                        echo '<li><span class="me-2" '. $tooltip_attr .'><i class="fa-regular fa-circle-check"></i> ' . hostim_kses_post($limit_text) . $info_icon . '</span></li>';
                                    }
                                    echo '</ul>';
                                }
                                if($pricing_plan['s6_purchase_btn_url']['url'] ){
                                    $this->add_link_attributes('s6_purchase_btn'.$key, $pricing_plan['s6_purchase_btn_url']);
                                    $this->add_render_attribute('s6_purchase_btn'.$key, 'class', 'pricing_btn__ em-pricing-btn fw-semibold') ?>

                                    <a <?php $this->print_render_attribute_string('s6_purchase_btn'.$key) ?> >
                                        <?php echo esc_html( $pricing_plan['s6_purchase_btn_label'] ) . esc_html( $pricing_plan['s6_currency'] ) . esc_html( $pricing_plan['s6_ragular_price'] ) .'<span class="me-2">'. esc_html( $pricing_plan['s6_period'] ) .'</span><i class="fas fa-arrow-right"></i>' ?>
                                    </a>
                                    <?php
                                }
                                ?>
                            </div>
                            <?php
                        }
                    }
                    ?>                    
                </div>
                <div class="swiper-pagination mt-30 position-relative"></div>
            </div>
        </div>
    </div>
</section>