<section class="hm2-applications overflow-hidden">
    <div class="container position-relative zindex-1">
        <?php 
        if( !empty( $shape_img['url'] ) ){
            echo '<img src="'. esc_url( $shape_img['url'] ) .'" alt="not found" class="position-absolute app-shape">';
        }
        ?>
        <div class="app-wrapper mt-40">
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

                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-10">
                            <div class="hm2-app-item text-center bg-white deep-shadow rounded-5">
                                <div class="feagure-img">
                                    <?php 
                                    if( !empty( $meta['service_feature_img']['id'] ) ){
                                        echo wp_get_attachment_image( $meta['service_feature_img']['id'], 'full' );
                                    }
                                    ?>
                                </div>
                                <div class="app-content mt-4">
                                    <a href="<?php the_permalink() ?>">
                                        <h3 class="h6 mb-3 service_title__"><?php echo substr(get_the_title(), 0, $title_length_) ?></h3>
                                    </a>
                                    <?php 
                                    if( !empty( $meta['service_short_desc'] ) ){
                                        echo '<p class="mb-20 service_desc__">'. hostim_kses_post(substr($meta['service_short_desc'], 0, $excerpt_length_)) .'</p>';
                                    }
                                    ?>
                                    <a href="<?php the_permalink() ?>" class="explore-btn service_btn__"><?php echo esc_html__( 'Read More', 'hostim-core' ) ?><i class="fa-solid fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                                
                    <?php }
                    wp_reset_postdata();
                } ?>   

            </div>
        </div>
    </div>
    <?php 
    if( $is_thumb_list == 'yes' ){ ?>
        <div class="container">
            <div class="app-explore d-flex align-items-center justify-content-center mt-5">
                <div class="app-thumbs">
                    <?php 
                    $service_post = get_posts( array(
                        'post_type' => 'services',
                        'numberposts'=> '4',
                        'order'     => 'DESC'
                    ) );
                    if( is_array( $service_post ) ){
                        
                        foreach( $service_post as $service ){
                            setup_postdata( $service );
                            $meta = get_post_meta( $service->ID, 'hostim_service_options', true );
                            if( !empty( $meta['service_feature_img']['id'] ) ){
                                $img_url = wp_get_attachment_image_url( $meta['service_feature_img']['id'], 'hostim_40x40' );
                                echo '<img src="'. esc_url( $img_url ) .'" class="img-fluid rounded-circle img-transparent" data-bs-toggle="tooltip" data-bs-placement="top" title="'. esc_attr( $service->post_title ) .'">';
                            }
                            
                        }
                        wp_reset_postdata();
                    }
                    ?>
                </div>
                <?php 
                if( !empty( $view_more ) ){ ?>
                    <div class="app-info ms-3">
                        <a href="<?php echo esc_url( $view_more_link ) ?>">
                            <h6 class="text-decoration-underline"><?php echo esc_html( $view_more )?></h6>
                        </a>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
        <?php 
    } ?>
</section>