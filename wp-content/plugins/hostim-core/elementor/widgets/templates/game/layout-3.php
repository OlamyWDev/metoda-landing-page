<section class="gm-product-corner position-relative overflow-hidden zindex-1">
    <div class="container">
        <?php
        $desktop_items = !empty( $show_items_desktop ) ? $show_items_desktop : '1';
        $tablet_items  = !empty( $show_items_tablet ) ? $show_items_tablet : '1';
        ?>
        <div class="swiper gm-product-slider mt-5 overflow-hidden"
            data-perpage="<?php echo esc_attr( $desktop_items ) ?>"
            data-loop="<?php echo $carousel_loop == 'yes' ? 'true' : 'false' ?>"
            data-autoplay="<?php echo $carousel_autoplay == 'yes' ? 'true' : 'false' ?>"
            data-speed="<?php echo esc_attr( $slide_speed ) ?>"
            data-space="<?php echo !empty( $item_space ) ? esc_attr( $item_space['size'] ) : '24' ?>"
            data-breakpoints='{"1399": {"slidesPerView": <?php echo esc_attr( $desktop_items ) ?>},"1024": {"slidesPerView": <?php echo esc_attr( $tablet_items ) ?>}, "768": {"slidesPerView": <?php echo esc_attr( $show_items_mobile ) ?>}, "360": {"slidesPerView": <?php echo esc_attr( $show_items_mobile ) ?>}}' >
            <div class="swiper-wrapper">
                <?php 
                if( is_array( $games ) ){
                    foreach( $games as $game ){ ?>
                        <div class="gm-product-item text-center position-relative swiper-slide">
                            <?php 
                            if( !empty( $game['ragular_price'] && $game['sale_price'] ) ){
                                echo '<span class="discount rounded-2 position-absolute">'. esc_html(hostim_get_percentage($game['ragular_price'], $game['sale_price'], (int) $after_dot_number) ) . esc_html__(' Off ', 'hostim-core') .'</span>';
                            } ?>
                            <div class="feature-image rounded-top position-relative">
                                <?php 
                                if( !empty( $game['feature_img']['id'] ) ){
                                    echo '<a href="#">'. wp_get_attachment_image( $game['feature_img']['id'], 'gproduct_210x160', '', array( 'class' => 'img-fluid' ) ) .'</a>';
                                }
                                ?>                                
                            </div>
                            <div class="product-info">
                                <?php 
                                if( !empty( $game['title'] ) ){
                                    echo '<a href="'. esc_url( $game['btn_url'] ) .'"><h3 class="h5 mb-2">'. esc_html( $game['title'] ) .'</h3></a>';
                                }
                                $ragular_price_ = !empty( $game['ragular_price'] ) ? '<span>'. $game['currency'] . $game['ragular_price'] .'</span>' : '';
                                if( !empty( $game['sale_price'] || $ragular_price_ ) ){
                                    echo '<p class="pricing mb-3">'. esc_html( $game['currency'] . $game['sale_price'] ) . hostim_kses_post( $ragular_price_ ) .'</p>';
                                }
                                
                                if( !empty( $game['btn_label'] ) ){
                                    echo '<a href="'. esc_url( $game['btn_url'] ) .'" class="template-btn outline-btn btn-small">'. esc_html( $game['btn_label'] ) .'</a>';
                                }

                                ?>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>