<section class="hosting-server position-relative zindex-1">
    <div class="container">
        <div class="server-tab">
            <div class="row">
                <div class="col-lg-4">
                    <div class="tab-left">
                        <ul class="hm2-server-tab-control nav nav-tabs border-0">
                            <?php
                            $current_language = class_exists('Polylang') ? pll_current_language() : get_locale();
                            $service_post = get_posts( array(
                                'post_type'   => 'services',
                                'numberposts' => $posts_per_page,
                                'order'       => $order,
                                'lang'        => $current_language,
                            ) );
                            
                            if( is_array( $service_post ) ){
                                $i = 1;
                                foreach( $service_post as $service ){
                                    $active = $i == 1 ? 'active' : '';

                                    $meta = get_post_meta( $service->ID, 'hostim_service_options', true );                                   

                                    echo '<li><button class="tab_title_btn '.esc_attr( $active ).'" data-bs-toggle="tab" data-bs-target="#tab_'. esc_attr( $service->ID ) .'">';
                                    
                                    if( $meta['service_feature_img']['id'] ){
                                        echo wp_get_attachment_image( $meta['service_feature_img']['id'], 'hostim_60x60' );
                                    }
                                    echo esc_html( $service->post_title ) .'</button></li>';
                                    $i++;
                                }
                            }
                            ?>
                            
                        </ul>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="tab-content mt-5 mt-lg-0">
                        <?php 
                        if( is_array( $service_post ) ){
                            $in = 1;
                            foreach( $service_post as $service ){
                                setup_postdata( $service );
                                $meta = get_post_meta( $service->ID, 'hostim_service_options', true );
                                $active = $in == 1 ? ' show active' : ''; ?>

                                    <div class="tab-pane fade <?php echo esc_attr( $active )?>" id="tab_<?php echo esc_attr( $service->ID )?>">
                                        <div class="hm2-server-content">
                                            <?php 
                                            if( has_post_thumbnail( $service->ID ) ){
                                                echo get_the_post_thumbnail( $service->ID, 'full', array('class'=>'img-fluid rounded-5') );
                                            }
                                            ?>
                                            <div class="server-info rounded-5 bg-white deep-shadow position-relative">
                                                <?php 
                                                if( !empty( $meta['service_title'] ) ){
                                                    echo '<h3 class="service_title__">'. hostim_kses_post(substr($meta['service_title'], 0, $title_length_) ) .'</h3>';
                                                }
                                                if( !empty( $meta['service_short_desc'] ) ){
                                                    echo '<p class="mb-0 mt-3 service_desc__">'. hostim_kses_post(substr( $meta['service_short_desc'], 0, $excerpt_length_ ) ) .'</p>';
                                                }
                                                ?>
                                                
                                                <a href="<?php the_permalink( $service->ID ) ?>" class="explore-btn position-absolute rounded-circle text-center text-white service_btn__"><i class="fa-solid fa-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>

                                <?php
                                $in++;
                            }
                        }
                        wp_reset_postdata();
                        ?>

                    </div>
                </div>
            </div>
        </div>
        
    </div>
</section>