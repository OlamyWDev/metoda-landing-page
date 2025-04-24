<?php
	$desktop_items = !empty( $show_items_desktop ) ? $show_items_desktop : '4';
	$tablet_items  = !empty( $show_items_tablet ) ? $show_items_tablet : '3';
	?>
<div class="pricing-plan-slider swiper overflow-hidden pricing_sec"
    data-pagination=".swiper-pagination"
    data-paginationtype="bullets"
    data-perpage="<?php echo esc_attr( $desktop_items ) ?>"
    data-loop="<?php echo $carousel_loop == 'yes' ? 'true' : 'false' ?>"
    data-autoplay="<?php echo $carousel_autoplay == 'yes' ? 'true' : 'false' ?>"
    data-speed="<?php echo esc_attr( $slide_speed ) ?>"
    data-space="<?php echo !empty( $item_space ) ? esc_attr( $item_space['size'] ) : '24' ?>"
    data-breakpoints='{"1440": {"slidesPerView": <?php echo esc_attr( $desktop_items ) ?>},"1024": {"slidesPerView": <?php echo esc_attr( $desktop_items ) ?>}, "768": {"slidesPerView": <?php echo esc_attr( $tablet_items ) ?>}, "360": {"slidesPerView": <?php echo esc_attr( $show_items_mobile ) ?>}}' >

    <div class="swiper-wrapper pb-50">
        <?php
        if( is_array( $pricing_carousel ) ){
            foreach( $pricing_carousel as $key => $pricing_item ){ ?>
                <div class="swiper-slide pricing-plan-single rounded bg-white pt-40 pb-40 px-4 text-center">
                    <?php
                    if( !empty( $pricing_item['s6_package_icon']['id'] ) ){
                        echo wp_get_attachment_image( $pricing_item['s6_package_icon']['id'], 'full', '', array('class'=>'img-fluid') );
                    }

                    if( !empty( $pricing_item['package_title'] ) ){
                        echo '<h5 class="mt-4 mb-3">'. esc_html( $pricing_item['package_title'] ) .'</h5>';
                    } ?>
                    <div class="pricing-amount mb-4">
                        <span class="fw-semibold fs-sm text-dark">From only</span>
                        <?php
                        if( !empty( $pricing_item['s6_ragular_price'] ) ){
                            echo '<h3 class=mb-0 lh-0 ">'. esc_html( $pricing_item['s6_currency'] ) . esc_html( $pricing_item['s6_ragular_price'] ) .'<span class="fs-md fw-normal">'. esc_html( $pricing_item['s6_period'] ) .'</span></h3>';
                        }

                        if( !empty( $pricing_item['vat_text'] ) ){
                            echo '<span class="fs-sm fw-semibold text-dark">'. esc_html( $pricing_item['vat_text'] ) .'</span>';
                        }
                        ?>

                    </div>
                    <?php
                    if( !empty( $pricing_item['s6_plan_desc'] ) ){
                        echo '<p class="mb-30">'. hostim_kses_post( $pricing_item['s6_plan_desc'] ) .'</p>';
                    }

                    if( $pricing_item['s6_purchase_btn_url']['url'] ){
                        $this->add_link_attributes('s6_purchase_btn'.$key, $pricing_item['s6_purchase_btn_url']);
                        $this->add_render_attribute('s6_purchase_btn'.$key, 'class', 'template-btn pricing_btn__ cd-secondary-btn w-100' ); ?>

                        <a <?php $this->print_render_attribute_string('s6_purchase_btn'.$key) ?> >
                            <?php echo esc_html( $pricing_item['s6_purchase_btn_label'] ) ?>
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
    <div class="swiper-pagination"></div>
</div>
