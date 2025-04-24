<div class="hds-bg-style-two hds-section-bg position-relative z-1">
    <!-- Price -->
    <div class="hds-price-area">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-5">
                    <div class="position-relative">
                        <?php
                        if (!empty($settings['show_tab'])) { ?>
                            <div class="isb-price-btn-area d-flex align-items-center mb-50">
                                <?php
                                if (!empty($settings['monthly_title'])) {
                                    echo '<div class="hds-body-color-two fs-16 fw-700 mr-20"> ' . esc_html($settings['monthly_title']) . ' </div>';
                                }
                                ?>
                                <div class="isb-price-btn bg-transparent isb-border hds-border-color d-flex align-items-center">
                                    <div class="isb-price-btn-sm hds-bg-color-two"></div>
                                </div>
                                <?php
                                if (!empty($settings['anual_title'])) {
                                    echo '<div class="hds-body-color-two fs-16 fw-700 ml-20"> ' . esc_html($settings['anual_title']) . ' </div>';
                                }
                                ?>
                            </div>
                        <?php
                        }
                        ?>

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hds-price-items">
                        <div class="row align-items-center g-0">
                            <?php
                            if (is_array($tables)) {
                                foreach ($tables as $key => $value) { 
                                    $popular_class = $value['is_popular'] == 'yes' ? 'hds-price-populer' : '';
                                    ?>
                                    <div class="col-sm-6">
                                        <div class="hds-price-item <?php echo esc_attr($popular_class) ?> bg-white isb-border hds-border-color ptb-40 text-center rounded-12 position-relative">
                                            <?php
                                            if (!empty($value['is_popular'])) { ?>
                                                <div class="populer-bridge hds-bg-color fs-14 d-inline-flex align-items-center justify-content-center position-absolute">
                                                    <?php
                                                    if (!empty($value['popular_text'])) {
                                                        echo '<h6 class="text-white mb-0"> ' . esc_html($value['popular_text']) . ' </h6>';
                                                    }
                                                    ?>
                                                </div>
                                            <?php
                                            }
                                            ?>
                                            <?php
                                            if (!empty($value['plan_title'])) {
                                                echo '<h5 class="hds-body-color-two ff-inter fs-20 fw-700"> ' . esc_html($value['plan_title']) . ' </h5>';
                                            }
                                            ?>
                                            <div class="hds-price-top d-flex align-items-center justify-content-center gap-4 mt-20">
                                                <?php
                                                if (!empty($value['plan_subtitle'])) {
                                                    echo '<span class="line-mark hds-body-color-eight ff-urb fs-14 fw-700"> ' . esc_html($value['plan_subtitle']) . ' </span>';
                                                }
                                                if (!empty($value['saved_badge'])) {
                                                    echo '<span class="hds-save-text hds-body-color-two ff-urb fs-14 fw-700 hds-bg-color-six"> ' . esc_html($value['saved_badge']) . ' </span>';
                                                }
                                                ?>
                                            </div>
                                            <div class="hds-price-month">
                                                <div class="hds-price-bottom hds-body-color-two d-flex align-items-center justify-content-center gap-3">
                                                    <div class="hds-price-left">
                                                        <?php
                                                        if (!empty($value['currency'])) {
                                                            echo '<span class="hds-dollar fs-30 fw-700 ff-inter position-relative"> ' . esc_html($value['currency']) . ' </span>';
                                                        }
                                                        if (!empty($value['monthly_price'])) {
                                                            echo '<span class="hds-dollar-price ff-inter fw-700"> ' . esc_html($value['monthly_price']) . ' </span>';
                                                        }
                                                        ?>
                                                    </div>
                                                    <div class="hds-price-right">
                                                        <span class="hds-price-group d-flex flex-column">
                                                            <span class="fw-500 ff-inter fs-20">46</span>
                                                            <?php
                                                            if (!empty($value['period'])) {
                                                                echo '<span class="hds-body-color-eight fw-500 ff-inter fs-20"> ' . esc_html($value['period']) . ' </span>';
                                                            }
                                                            ?>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="hds-price-year">
                                                <div class="hds-price-bottom hds-body-color-two d-flex align-items-center justify-content-center gap-3">
                                                    <div class="hds-price-left">
                                                        <?php
                                                        if (!empty($value['currency'])) {
                                                            echo '<span class="hds-dollar fs-30 fw-700 ff-inter position-relative"> ' . esc_html($value['currency']) . ' </span>';
                                                        }
                                                        if (!empty($value['annual_price'])) {
                                                            echo '<span class="hds-dollar-price ff-inter fw-700"> ' . esc_html($value['annual_price']) . ' </span>';
                                                        }
                                                        ?>
                                                    </div>
                                                    <div class="hds-price-right">
                                                        <span class="hds-price-group d-flex flex-column">
                                                            <span class="fw-500 ff-inter fs-20">46</span>
                                                            <?php
                                                            if (!empty($value['yearly_period'])) {
                                                                echo '<span class="hds-body-color-eight fw-500 ff-inter fs-20"> ' . esc_html($value['yearly_period']) . ' </span>';
                                                            }
                                                            ?>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>

                                            <?php
                                           
                                            $btn_class = $value['is_popular'] == 'yes' ? 'hds-bg-color-two' : 'hds-bg-color-seven';
                                            if( $value['purchase_btn_url']['url'] ){
                                                $this->add_link_attributes('purchase_btn' . $key, $value['purchase_btn_url']);
                                                $this->add_render_attribute('purchase_btn' . $key, 'class', 'btn hds-btn hds-body-color-two hds-large-btn hds-hover-bg hds-hover-color hds-btn-bg-overlay monthly_btn '.$btn_class ); ?>
            
                                                <a <?php $this->print_render_attribute_string('purchase_btn' . $key) ?> >
                                                    <?php echo esc_html( $value['purchase_btn_label'] ) ?>
                                                </a>
                                                <?php
                                            }
                                            if( $value['purchase_btn_url_annual']['url'] ){
                                                $this->add_link_attributes('purchase_btn_annual' . $key, $value['purchase_btn_url_annual']);
                                                $this->add_render_attribute('purchase_btn_annual' . $key, 'class', 'btn hds-btn hds-body-color-two hds-large-btn hds-hover-bg hds-hover-color hds-btn-bg-overlay yearly_btn '.$btn_class ); ?>
            
                                                <a <?php $this->print_render_attribute_string('purchase_btn_annual' . $key) ?> >
                                                    <?php echo esc_html( $value['purchase_btn_label_annual'] ) ?>
                                                </a>
                                                <?php
                                            }
                                            ?>
                                            

                                            <?php
                                            $table_contents = preg_split('/\r\n|[\r\n]/', $value['list_items']);
                                            if (!empty($table_contents)) {
                                                echo '<ul class="hds-price-list list-unstyled mb-30 mt-30">';
                                                foreach ($table_contents as $list) {
                                                    echo '<li class="fs-14 hds-body-color-three lh-28">' . hostim_kses_post($list) . '</li>';
                                                }
                                                echo '</ul>';
                                            }
                                            ?>
                                            <?php
                                            if (!empty($value['expand_feature'])) { ?>
                                                <a href="<?php echo esc_url($value['expand_btn_url']['url'])?>" class="hds-price-offer-bottom">
                                                    <p class="hds-body-color-two hds-hover-color-three fs-16 ff-inter fw-500 mb-0">
                                                        <?php echo esc_html($value['expand_feature']); ?>
                                                    </p>
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
                </div>
            </div>
        </div>
    </div>
    <!-- Price -->
</div>