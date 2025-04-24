<div class="services-bottom mt-40">
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
                <div class="col-lg-4 col-md-6">
                    <div class="service-card deep-shadow rounded-5">
                        <div class="icon-wrapper">
                            <?php 
                            if( $meta['service_feature_img']['id'] ){
                                echo wp_get_attachment_image( $meta['service_feature_img']['id'], 'full' );
                            }
                            ?>
                        </div>
                        <div class="card-content">
                            <a href="<?php the_permalink() ?>">
                                <h3 class="h4 mb-4 service_title__"><?php echo substr(get_the_title(), 0, $title_length_) ?></h3>
                            </a>
                            <?php
                            if( !empty( $meta['service_short_desc'] ) ){
                                echo '<p class="mb-4 service_desc__">'. hostim_kses_post(substr($meta['service_short_desc'], 0, $excerpt_length_) ) .'</p>';
                            }
                            if( !empty( $meta['service_monthly_price'] ) ){
                                $pring_period = !empty($meta['service_pricing_period']) ? $meta['service_pricing_period'] : '';
                                echo '<a href="'. get_the_permalink( get_the_ID() ) .'" class="service_btn__">'.esc_html($service_btn_label . $currency . $meta['service_monthly_price'] . $pring_period ) .'<i class="fa-solid fa-arrow-right"></i></a>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <?php
            }
            wp_reset_postdata();
        }
        ?>
    </div>
</div>