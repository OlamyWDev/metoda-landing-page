<section class="hm2-feature-area position-relative feature_section__">
    <div class="container position-relative">
        
        <div class="row g-4 justify-content-center">
            <?php 
            if( is_array( $features_list ) ){
                    
                    foreach( $features_list as $item ){ ?>
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="hm2-feature-card deep-shadow rounded-5 item-features_box_shadow">
                                <span class="icon-wrapper d-flex align-items-center justify-content-center rounded-circle">
                                    <?php 
                                    if ( ! empty( $item['selected_icon'] ) ) {
                                        \Elementor\Icons_Manager::render_icon( $item['selected_icon'], [ 'aria-hidden' => 'true' ] );
                                    } ?>
                                </span>
                            
                                <?php
                                if( !empty( $item['feature_title'] ) ){
                                    echo '<h3 class="h4 mt-4 feature_title_">'. hostim_kses_post( nl2br( $item['feature_title'] ) ) .'</h3>';
                                }
                                
                                if( !empty( $item['feature_desc'] ) ){
                                    echo '<p class="mt-3 feature_content_">'. esc_html( $item['feature_desc'] ) .'</p>';
                                }
                                
                                if( !empty( $item['feature_link']['url'] ) ){
                                    echo '<a href="'. esc_url( $item['feature_link']['url'] ) .'" class="mt-2 d-inline-block rounded-circle text-center position-relative overflow-hidden"><i class="fa-solid fa-arrow-right"></i></a>';
                                }
                                ?>
                                                                        
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        <?php 
        if( !empty( $features_shape_left['url'] ) ){
            echo '<img src="'. $features_shape_left['url'] .'" alt="triangle" class="position-absolute ft-triangle">';
        }
        ?>
    </div>
    
</section>