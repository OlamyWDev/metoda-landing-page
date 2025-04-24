<section class="friday-hero position-relative overflow-hidden zindex-1 hostim-hero">
    <?php
    if( is_array( $settings['shape_images'] ) ){
        $i = 1;
        foreach ( $settings['shape_images'] as $image ) {
            echo '<img src="'. esc_url( $image['shape_img']['url'] ) .'" alt="'. esc_attr__( 'Shape image' ) .'" class="position-absolute shape_'.$i++.' elementor-repeater-item-'. esc_attr(  $image['_id'] ) .'">';
        }
    }
    ?>
    <div class="container">
        <div class="row align-items-center justify-content-center g-4">
            <div class="col-xl-4 col-md-6">
                <div class="super-sale-countdown">
                    <?php 
                    wp_enqueue_script('countdown');
                    if( !empty( $black_friday_img['id'] ) ){
                        echo wp_get_attachment_image( $black_friday_img['id'], 'full' );
                    }
                    if( !empty( $bf_due_date ) ){
                        $due_date = date_create($bf_due_date ); ?>
                        <ul class="countdown-timer sp-downcount-timer d-flex align-items-center mt-4 mb-5" data-date="<?php echo esc_attr( date_format( $due_date, 'm/j/Y h:i:s' ) )?>">
                            <li>
                                <span class="days box">24</span>
                                <span class="subtitle">Days</span>
                            </li>
                            <li>
                                <span class="hours box">10</span>
                                <span class="subtitle">Hour</span>
                            </li>
                            <li>
                                <span class="minutes box">45</span>
                                <span class="subtitle">Minutes</span>
                            </li>
                            <li>
                                <span class="seconds box">10</span>
                                <span class="subtitle">Sec</span>
                            </li>
                        </ul>
                        <?php 
                    }

                    if( !empty( $bf_btn_text ) ){
                        echo '<a href="'. esc_url( $bf_btn_link['url'] ) .'" class="template-btn primary-btn">'. esc_html( $bf_btn_text ) .'</a>';
                    }
                    ?>
                    
                </div>
            </div>
            <div class="col-xl-5 col-lg-6 col-md-6">
                <div class="offer-badge">
                    <?php 
                    if( !empty( $feature_image['id'] ) ){
                        echo wp_get_attachment_image( $feature_image['id'], 'full' );
                    }
                    ?>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-10">
                <div class="friday-offer-packages">
                    <?php 
                    if( is_array( $features ) ){
                        foreach( $features as $key => $feature ){ 
                            $mt_class = $key == 0 ? '' : 'mt-40';
                            ?>
                            <div class="friday-hosting-offer position-relative rounded <?php echo esc_attr( $mt_class ) ?>">
                                <?php 
                                if( !empty( $feature['feature_title'] ) ){
                                    echo '<span class="title-badge">'. esc_html( $feature['feature_title'] ) .'</span><span class="angle-shape"></span>';
                                }
                                
                                if( !empty( $feature['ragular_price'] ) ){
                                    echo '<span class="sale-price">From'. esc_html( $feature['currency'] ) . esc_html( $feature['ragular_price'] ) .'</span>';
                                }
                                
                                if( !empty( $feature['sale_price'] ) ){
                                    echo '<h3 class="price mt-2 mb-20">'. esc_html( $feature['currency'] ) . esc_html( $feature['sale_price'] ) .'<span>'. esc_html( $feature['period'] ) .'</span></h3>';
                                }

                                if( !empty( $feature['feature_title'] ) ){
                                    echo '<a href="'. esc_url( $feature['purchase_btn_url']['url'] ) .'" class="template-btn primary-btn py-2 text-uppercase">'. esc_html( $feature['purchase_btn_label'] ) .'</a>';
                                }
                                ?>
                            </div>
                            <?php 
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>