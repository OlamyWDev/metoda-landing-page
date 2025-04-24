<div class="cmp-pricing-slider-groups position-relative elementor-element pricing_slider__" data-element_type="widget" data-widget_type="hostim_pricing_slider3">
    <div class="cmp-pricing-slider swiper overflow-hidden"
         data-next=".cmp-pricing-next"
         data-prev=".cmp-pricing-prev"
         data-perpage="<?php echo esc_attr( $show_items_desktop ) ?>"
         data-speed="800"
         data-space="24"
         data-breakpoints='{"1440": {"slidesPerView": <?php echo esc_attr( $show_items_desktop ) ?>},"1024": {"slidesPerView": <?php echo esc_attr( $show_items_desktop ) ?>}, "768": {"slidesPerView": <?php echo esc_attr( $show_items_tablet ) ?>}, "360": {"slidesPerView": <?php echo esc_attr( $show_items_mobile ) ?>}}'
    >
        <div class="swiper-wrapper">
            <?php
            if ( is_array($price_slider3) ) {
                foreach ( $price_slider3 as $item ) {
                    ?>
                    <div class="cmp-pricing-single pricing-column overflow-hidden position-relative bg-white rounded-10 deep-shadow swiper-slide">
                        <?php
                        if ( $item['package_name'] != '' ) { ?>
                            <h3 class="h5 __package_name"><?php echo esc_html($item['package_name']) ?></h3>
                            <?php
                        }
                        if ( $item['subtitle'] != '' ) { ?>
                            <span class="pricing-label d-block mt-4"><?php echo esc_html($item['subtitle']) ?></span>
                            <?php
                        }
                        if ( $item['price'] != '' ) { ?>
                            <h4 class="h2 mt-2 monthly-price __price"><?php echo esc_html($item['price']) ?><span><?php echo esc_html($item['duration']) ?></span></h4>
                            <?php
                        }
                        if ( $item['contents'] != '' ) { ?>
                            <p class="mt-4"><?php echo esc_html($item['contents']) ?></p>
                            <?php
                        }
                        $table_contents = preg_split( '/\r\n|[\r\n]/', $item['list_items'] );
                        if( !empty( $table_contents ) ){
	                        echo '<ul class="feature-list mt-4">';
	                        foreach ( $table_contents as $item_list ) {
		                        echo '<li><span class="me-2 __list_items"><i class="fa-solid fa-check"></i></span>'. esc_html( $item_list ) .'</li>';
	                        }
	                        echo '</ul>';
                        }
                        $arr_length = count($table_contents);
                        if ( $arr_length > 5 ) { ?>
                            <a href="javascript:void(0);" class="expand-btn d-inline-block mt-4"><i class="fa-solid fa-angle-down"></i><?php echo esc_html($item['expand_feature']) ?></a>
	                        <?php
                        }
                        if ( $item['btn_label'] != '' ) { ?>
                            <br>
                            <a <?php Hostimg_Core_Helper()->the_button($item['btn_url']) ?> class="template-btn secondary-btn mt-40 text-center __btn">
                                <?php echo esc_html($item['btn_label']) ?>
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
    </div>
    <button type="button" class="cmp-pricing-prev cmp-pricing-control"><i class="fa-solid fa-arrow-left"></i></button>
    <button type="button" class="cmp-pricing-next cmp-pricing-control"><i class="fa-solid fa-arrow-right"></i></button>
</div>
