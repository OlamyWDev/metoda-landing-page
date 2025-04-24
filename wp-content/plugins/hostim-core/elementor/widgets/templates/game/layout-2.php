<section class="gm-feature position-relative zindex-1">
    <div class="container">
        <div class="feature-games-tab mt-5">
            <div class="tab-navigation position-relative">
                <ul class="nav nav-tabs border-0">
                    <?php 
                    $cats       = array_column( $games, 'tab_title');
                    $cat_title_and_count = array_count_values($cats);
                    $getCats    = array_unique( $cats );
                    $tab_data   = return_tab_data( $getCats , $games, 'tab_title' );
                    
                    if ( is_array( $cat_title_and_count ) && count( $cat_title_and_count ) > 0 ){
                        $tabs   = '';
                        $i      = 1;
                        foreach ( $cat_title_and_count as $cat => $catCount ){
                            
                            $catForFilter = sanitize_title_with_dashes( $cat );
                            $catForFilter = str_replace( '-', '', $catForFilter );
                            $active = $i==1 ? ' active' : '';
                            echo '<li><a href="#'.esc_attr( $catForFilter ).'" data-bs-toggle="tab" class="game_tab '. esc_attr( $active ) .'">'. esc_html( $cat ) .'<sup>'. esc_html( $catCount ) .'</sup></a></li>';
                            $i++;
                        }
                    } ?>
                </ul>
                <?php if ( !empty($btn_label )) : ?>
                    <a <?php Hostimg_Core_Helper()->the_button($btn_url) ?> class="d-none d-md-block">
                        <?php echo esc_html($btn_label) ?>
                        <span>
                            <svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15 6H1M9.55556 1L15 6L9.55556 1ZM15 6L9.55556 11L15 6Z" stroke="url(#paint0_linear_1979_224)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <defs>
                                    <linearGradient id="paint0_linear_1979_224" x1="1" y1="1" x2="16.619" y2="3.48672" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#F16262"/>
                                        <stop offset="1" stop-color="#3200FF"/>
                                    </linearGradient>
                                </defs>
                            </svg>
                        </span>
                    </a>
                <?php endif ?>
            </div>
            <div class="tab-content mt-5">
                <?php
                if ( !empty( $tab_data ) ){
                    $i = 0;
                    foreach ( $tab_data as $key => $val ) {
                        $tagforfilter = sanitize_title_with_dashes($key);
                        $catForFilter = str_replace( '-', '', $tagforfilter );
                        $i++;
                        $active = $i == 1 ? ' show active' : '';
                        ?>
                        <div class="tab-pane fade <?php echo esc_attr( $active ) ?>" id="<?php echo esc_attr($catForFilter) ?>">
                            <div class="row g-4 justify-content-center">
                                <div class="col-lg-6 col-sm-11">
                                    <?php
								    foreach ( $val as $key => $data ) { 
                                        if( $key == 0 ){ ?>
                                            <div class="gm-feature-item position-relative rounded-2 overflow-hidden hover-active">
                                                <?php 
                                                if ( !empty( $data['feature_img']['id'] ) ) {
                                                    echo wp_get_attachment_image( $data['feature_img']['id'], 'full' );
                                                } ?>
                                                <div class="gm-feature-info">
                                                    <?php 
                                                    if( !empty( $data['title'] ) ){
                                                        echo '<a href="'. esc_url( $data['btn_url'] ) .'"><h3>'. esc_html( $data['title'] ) .'</h3></a>';
                                                    }
                                                    ?>
                                                    
                                                    <div class="item-pricing mb-20">
                                                        <?php
                                                        if( !empty( $data['sale_price'] ) ){
                                                            echo '<span class="offer-price">'. esc_html($data['currency']. $data['sale_price'] ) .'</span>';
                                                        }
                                                        if( !empty( $data['ragular_price'] ) ){
                                                            echo '<span class="real-price">'. esc_html( $data['currency']. $data['ragular_price'] ) .'</span>';
                                                        }
                                                        ?>
                                                    </div>
                                                    <div class="info-bottom d-flex align-items-start align-items-xl-center justify-content-between flex-column flex-xl-row">
                                                        <div class="gm-device-info mb-3 mb-xl-0">
                                                            <?php
                                                            if(!empty( $data['active_key_label'] ) ){
                                                                echo '<span class="d-block">'. esc_html( $data['active_key_label'] ) .'</span>';
                                                            }
                                                            if( !empty( $data['active_key'] ) ){
                                                                echo '<span>'. esc_html( $data['active_key'] ) .'</span>';
                                                            } ?>
                                                            
                                                        </div>
                                                        <?php
                                                        if( !empty( $data['btn_label'] ) ){
                                                            echo '<a href="'. esc_url( $data['btn_url'] ) .'" class="template-btn gm-primary-btn btn-small">'. esc_html( $data['btn_label'] ) .'</a>';
                                                        } ?>
                                                    </div>
                                                </div>
                                            </div>
                                            </div><div class="col-lg-6 col-sm-11"><div class="row g-4">
                                            <?php 
                                        }
                                        elseif( $key == 1 ){ ?>
                                            <div class="col-lg-12">
                                                <div class="gm-feature-item position-relative rounded-2 overflow-hidden">
                                                    <?php 
                                                    if ( !empty( $data['feature_img']['id'] ) ) {
                                                        echo wp_get_attachment_image( $data['feature_img']['id'], 'full' );
                                                    } ?>
                                                    <div class="gm-feature-info">
                                                        <?php 
                                                        if( !empty( $data['title'] ) ){
                                                            echo '<a href="'. esc_url( $data['btn_url'] ) .'"><h3 class="h4">'. esc_html( $data['title'] ) .'</h3></a>';
                                                        } ?>
                                                        <div class="item-pricing mb-20">
                                                            <?php
                                                            if( !empty( $data['sale_price'] ) ){
                                                                echo '<span class="offer-price">'. esc_html( $data['currency'] . $data['sale_price'] ) .'</span>';
                                                            }
                                                            if( !empty( $data['ragular_price'] ) ){
                                                                echo '<span class="real-price">'. esc_html( $data['currency'] . $data['ragular_price'] ) .'</span>';
                                                            }
                                                            ?>
                                                        </div>
                                                        <div class="info-bottom d-flex align-items-start align-items-xl-center justify-content-between flex-column flex-xl-row">
                                                            <div class="gm-device-info mb-3 mb-xl-0 d-none d-xl-block">                                                                
                                                                <?php
                                                                if (!empty($data['active_key_label'])) {
                                                                    echo '<span class="d-block">' . esc_html($data['active_key_label']) . '</span>';
                                                                }
                                                                if( !empty( $data['active_key'] ) ){
                                                                    echo '<span>'. esc_html( $data['active_key'] ) .'</span>';
                                                                } ?>
                                                            </div>
                                                            <?php
                                                            if( !empty( $data['btn_label'] ) ){
                                                                echo '<a href="'. esc_url( $data['btn_url'] ) .'" class="template-btn gm-primary-btn btn-small">'. esc_html( $data['btn_label'] ) .'</a>';
                                                            } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        else { ?>
                                            <div class="col-md-6">
                                                <div class="gm-feature-item position-relative rounded-2 overflow-hidden">
                                                    <?php 
                                                    if ( !empty( $data['feature_img']['id'] ) ) {
                                                        echo wp_get_attachment_image( $data['feature_img']['id'], 'full' );
                                                    } ?>
                                                    
                                                    <div class="gm-feature-info">
                                                        <?php 
                                                        if( !empty( $data['title'] ) ){
                                                            echo '<a href="'. esc_url( $data['btn_url'] ) .'"><h3 class="h5">'. esc_html( $data['title'] ) .'</h3></a>';
                                                        } ?>
                                                        <div class="item-pricing mb-20">
                                                            <?php
                                                            if( !empty( $data['sale_price'] ) ){
                                                                echo '<span class="offer-price">'. esc_html($data['currency'] . $data['sale_price'] ) .'</span>';
                                                            }
                                                            if( !empty( $data['ragular_price'] ) ){
                                                                echo '<span class="real-price">'. esc_html( $data['currency'] . $data['ragular_price'] ) .'</span>';
                                                            }
                                                            ?>
                                                        </div>
                                                        <div class="info-bottom">
                                                            <div class="gm-device-info mb-3 d-none d-xxl-block">
                                                                <?php
                                                                if (!empty($data['active_key_label'])) {
                                                                    echo '<span class="d-block">' . esc_html($data['active_key_label']) . '</span>';
                                                                }
                                                                if( !empty( $data['active_key'] ) ){
                                                                    echo '<span>'. esc_html( $data['active_key'] ) .'</span>';
                                                                } ?>
                                                            </div>
                                                            <?php
                                                            if( !empty( $data['btn_label'] ) ){
                                                                echo '<a href="'. esc_url( $data['btn_url'] ) .'" class="template-btn gm-primary-btn btn-small">'. esc_html( $data['btn_label'] ) .'</a>';
                                                            } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        
                                        
                                    } ?>  
                                
                                    </div>
                                </div>
                            </div>
                        </div>
                 <?php
                    }
                }
                ?>
            </div>
            <?php 
            if ( !empty( $btn_label ) ){ ?>
                <div class="explore-btn text-center mt-50 d-block d-md-none">
                    <a <?php Hostimg_Core_Helper()->the_button( $btn_url ) ?> class="text-white fw-bold"><?php echo esc_html( $btn_label ) ?><span>
                        <svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15 6H1M9.55556 1L15 6L9.55556 1ZM15 6L9.55556 11L15 6Z" stroke="url(#paint0_linear_1979_2245)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <defs>
                                <linearGradient id="paint0_linear_1979_2245" x1="1" y1="1" x2="16.619" y2="3.48672" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#F16262"/>
                                    <stop offset="1" stop-color="#3200FF"/>
                                </linearGradient>
                            </defs>
                        </svg>
                    </span></a>
                </div>
                <?php
            } ?>
        </div>
    </div>
</section>