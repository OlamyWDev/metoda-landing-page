<section class="vps-feature feature_section__">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="vps-feature-top text-center">                    
                    <ul class="nav nav-tabs vps-feature-btns justify-content-center border-0">
                        <?php
                        $features_cat   = array_column( $features_tabs, 'feature_cat' );
                        $getCats        = array_unique( $features_cat );
                        $tab_data       = return_tab_data( $getCats , $features_tabs, 'feature_cat' );

                        if ( is_array( $getCats ) && count( $getCats ) > 0 ){
                            $i      = 1;
                            foreach ( $getCats as $cat ){
                                $catForFilter = sanitize_title_with_dashes( $cat );
                                $catForFilter = str_replace( '-', '_', $catForFilter );
                                $active = $i==1 ? ' active' : '';
                                
                                echo '<li><a href="#hostim-'.esc_attr( $catForFilter ).'" class="template-btn rounded-pill'. esc_attr( $active ) .'" data-bs-toggle="tab">'. esc_html( $cat ) .'</a></li>';
                            
                                $i++;
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="tab-content mt-5">
            <?php
            if ( !empty( $tab_data ) ){
                $i = 0;
                foreach ($tab_data as $key => $val) {
                    $tagforfilter = sanitize_title_with_dashes($key);
                    $catForFilter = str_replace( '-', '_', $tagforfilter );
                    $i++;
                    $active = $i == 1 ? ' show active' : '';
                    ?>
                    <div class="tab-pane fade <?php echo esc_attr( $active )?>" id="hostim-<?php echo esc_attr( $catForFilter ) ?>">
                        <div class="row jusity-content-center g-4">
                            <?php
                            foreach ( $val as $data ) { ?>
                                <div class="col-lg-4 col-md-6">
                                    <div class="vps-feature-item item-features_box_shadow deep-shadow position-relative zindex-1 elementor-repeater-item-<?php echo esc_attr( $data['_id'] )?>">
                                        <div class="figure-icon position-relative zindex-1">
                                            <?php 
                                            if( !empty( $data['feature_img']['id'] ) ){
                                                echo wp_get_attachment_image( $data['feature_img']['id'], 'full' );
                                            }
                                            ?>
                                        </div>
                                        <div class="vps-ft-item-content mt-30">
                                            <?php 
                                            if( !empty( $data['tab_title'] ) ){
                                                echo '<h5 class="feature_title_">'. esc_html( $data['tab_title'] ) .'</h5>';
                                            }
                                            if( !empty( $data['description'] ) ){
                                                echo '<p class="feature_content_">'. esc_html($data['description']) .'</p>';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <?php 
                            } ?>

                        </div>
                    </div>
                    <?php
                }
            } ?>
        </div>
    </div>
</section>