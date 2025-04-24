 <section class="h5-services">
    <div class="container">
        
        <div class="h5-services-bottom">
            <div class="row g-4 justify-content-center">
                <?php
                $paged      = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                $current_language = class_exists('Polylang') ? pll_current_language() : get_locale();
                $args       = array(
                    'post_type'      => 'services',
                    'paged'          => $paged,
                    'order'          => $settings['order'],
                    'orderby'        => $settings['order_by'],
                    'posts_per_page' => $settings['posts_per_page'],
                    'lang'           => $current_language,
                );
                $hostim_service = new \WP_Query( $args );


                if ( $hostim_service->have_posts() ) {
                    while ( $hostim_service->have_posts() ) {
                        $hostim_service->the_post();
                        $meta = get_post_meta( get_the_ID(), 'hostim_service_options', true );
                        ?>
                        <div class="col-xl-4 col-lg-6">
                            <div class="h5-service-box text-center bg-white rounded-2">
                                <span class="icon-wrapper d-flex justify-content-center">
                                    <?php 
                                    if( $meta['service_feature_img']['id'] ){
                                        echo wp_get_attachment_image( $meta['service_feature_img']['id'], 'full' );
                                    }
                                    ?>
                                </span>
                                <a href="<?php the_permalink() ?>">
                                    <h4 class="mb-3 mt-4 service_title__"><?php echo substr(get_the_title(), 0, $title_length_) ?></h4>
                                </a>
                                <?php 
                                if( !empty( $meta['service_short_desc'] ) ){
                                    echo '<p class="mb-4 service_desc__">'. hostim_kses_post(substr($meta['service_short_desc'], 0, $excerpt_length_)) .'</p>';
                                }
                                if( !empty( $meta['service_monthly_price'] ) ){
                                    $pring_period = !empty($meta['service_pricing_period']) ? $meta['service_pricing_period'] : '';
                                    echo '<a href="'. get_the_permalink( get_the_ID() ) .'" class="fw-bold explore service_btn__">'. esc_html($service_btn_label. $currency. $meta['service_monthly_price'] . $pring_period ) .'<span class="ms-2"><i class="fa-solid fa-arrow-right"></i></span></a>';
                                }
                            ?>
                            </div>
                        </div>
                        <?php 
                    }
                    wp_reset_postdata();
                } ?>
            </div>
        </div>
    </div>
</section>