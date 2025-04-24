<section class="sh-pricing pb-120 pricing_sec">
    <div class="container position-relative zindex-1">
        <span class="sh-pricing-circle position-absolute d-none d-lg-block"></span>
        <span class="sh-pricing-circle-red position-absolute d-none d-lg-block"></span>
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="sh-pricing-top text-center">
                    <div class="sh-section-title text-center">
                        <?php 
                        if( !empty( $pricing_heading ) ){
                            echo '<h2 class="pricing_heading mb-20">'. hostim_kses_post( nl2br( $pricing_heading ) ) .'</h2>';
                        }
                        
                        if( !empty( $pricing_subtitle ) ){
                            echo '<p class="pricing_subtitle">'. hostim_kses_post( nl2br( $pricing_subtitle ) ) .'</p>';
                        } ?>
                    </div>
                    <?php 
                    if( $show_tab == 'yes' ){ ?>
                        <div class="tab-switch-btn d-inline-flex align-items-center justify-content-center position-relative mt-4">
                            <span class="monthly fw-bold"><?php echo esc_html( $monthly_title ) ?></span>
                            <div class="btn_wrapper rounded-pill position-relative">
                                <input type="checkbox" class="switch-input position-absolute">
                                <span class="toggle-switch-btn "></span>
                            </div>
                            <span class="yearly fw-bold"><?php echo esc_html( $anual_title ) ?></span>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="row mt-5 justify-content-center g-4">
            <?php 
                if( is_array( $tables ) ){
                    foreach( $tables as $key => $table ){ ?>
                        <div class="col-xxl-<?php echo esc_attr( $column_desktop ) ?> col-lg-<?php echo esc_attr( $column_tablet ) ?> col-md-6 col-sm-10">
                            <div class="sh-pricing-column pricing-column overflow-hidden position-relative bg-white rounded-10 deep-shadow">
                                <?php 
                                 if( $table['is_popular'] == 'yes' ){
                                    echo '<span class="popular-badge text-center d-inline-block position-absolute">Popular</span>';
                                }

                                if( !empty( $table['plan_title'] ) ){
                                    echo '<h3 class="h5">'. hostim_kses_post( nl2br( $table['plan_title'] ) ) .'</h3>';
                                }
                                
                                if( !empty( $table['plan_desc'] ) ){
                                    echo '<p>'. hostim_kses_post( $table['plan_desc'] ) .'</p>';
                                }

                                if( !empty( $table['saved_badge'] ) ){
                                    echo '<span class="saving-badge">'. esc_html( $table['saved_badge'] ) .'</span>';
                                } 

                                if( !empty( $table['plan_subtitle'] ) ){
                                    echo '<span class="pricing-label d-block">'. esc_html( $table['plan_subtitle'] ) .'</span>';
                                }

                                if( !empty( $table['monthly_price'] ) ){
                                    echo '<h4 class="h2 mt-2 monthly-price">'. esc_html( $table['currency'] ) . esc_html( $table['monthly_price'] ) .'<span>'. esc_html( $table['period'] ) .'</span></h4>';
                                }
                                if( !empty( $table['annual_price'] ) ){
                                    echo '<h4 class="h2 mt-2 yearly-price">'. esc_html( $table['currency'] ) . esc_html( $table['annual_price'] ) .'<span>'. esc_html( $table['yearly_period'] ) .'</span></h4>';
                                }

                                $table_contents = preg_split( '/\r\n|[\r\n]/', $table['list_items'] );
                                if( !empty( $table_contents ) ){
                                    echo '<ul class="feature-list mt-4">';
                                    foreach( $table_contents as $item ){
                                        $tooltip_attr = '';
                                        $info_icon    = '';
                                        $limit_text   = !empty($limit_char) ? mb_strimwidth($item, 0, $limit_char, '') : $item;

                                        if ($enable_tooltip == 'yes') {
                                            $tooltip_attr = strlen($item) > $limit_char ? 'data-bs-toggle="tooltip" data-bs-placement="' . esc_attr($tooltip_alignment) . '" title=" ' . esc_html($item) . ' "' : '';
                                            $info_icon    = strlen($item) > $limit_char ? ' <i class="fa-regular fa-circle-question"></i>' : '';
                                        }
                                        echo '<li><span ' . $tooltip_attr . '><i class="fa-solid fa-check"></i>' . hostim_kses_post($limit_text) . $info_icon . '</span></li>';
                                    }
                                    echo '</ul>';
                                }
                                
                                $btn_class = $table['is_popular'] == 'yes' ? 'primary-btn' : 'secondary-btn';
                                if( $table['purchase_btn_url']['url'] ){
                                    $this->add_link_attributes('purchase_btn'.$key, $table['purchase_btn_url']);
                                    $this->add_render_attribute('purchase_btn'.$key, 'class', 'template-btn pricing_btn__ rounded-pill btn-small w-100 text-center mt-40 monthly-price '.$btn_class ); ?>

                                    <a <?php $this->print_render_attribute_string('purchase_btn'.$key) ?> >
                                        <?php echo esc_html( $table['purchase_btn_label'] ) ?>
                                    </a>
                                    <?php
                                }
                                if( $table['purchase_btn_url_annual']['url'] ){
                                    $this->add_link_attributes('purchase_btn_annual'.$key, $table['purchase_btn_url_annual']);
                                    $this->add_render_attribute('purchase_btn_annual'.$key, 'class', 'template-btn pricing_btn__ rounded-pill btn-small w-100 text-center mt-40 yearly-price '.$btn_class ); ?>

                                    <a <?php $this->print_render_attribute_string('purchase_btn_annual'.$key) ?> >
                                        <?php echo esc_html( $table['purchase_btn_label_annual'] ) ?>
                                    </a>
                                    <?php
                                }
                                ?>
                            
                            </div>
                        </div>
                        <?php 
                    }
                }
                ?>
        </div>
    </div>
</section>