<div class="host-web-vps-wrapper price-slider-wrapper  p-4 pt-40 pb-40 rounded-3 pricing_slider__">
    <div class="row align-items-center gap-7 gap-lg-0">
        <div class="col-lg-8">
            
            <ul class="host-web-progress-items list-unstyled">
                <div class="vps_labels layout_4 mt-5">
                    <?php
                    if (is_array($price_slider)) {
                        $ii = 1;
                        foreach ($price_slider as $slide) {
                            $cup_[]       = $slide['cup'];
                            $ram_[]       = $slide['ram'];
                            $storage_[]   = $slide['storage'];
                            $bandwidth_[] = $slide['bandwidth'];
                            $price_[]     = array($slide['price'], $slide['price_period']);
                            $package_[]   = $slide['package_link'];

                            $in = $ii++;
                            echo '<span class="vps_label vps_label_' . esc_attr($in) . '">' . esc_html($slide['package']) . '</span>';
                        }
                    }
                    $dataSlide = count($price_slider);
                    ?>
                </div>
                <div class="range-slider-wrapper mb-4 mt-4" id="vps_range_slider" data-slide="<?php echo esc_attr($dataSlide) ?>">
                    <input type="number" class="range-slider">
                </div>
                <div class="row g-4 justify-content-center">

                    <div class="col-xxl-3 col-lg-4 col-md-6">
                        <div class="vps_pp_feature_item d-flex align-items-center rounded-2">

                            <span class="icon-wrapper d-flex align-items-center justify-content-center rounded-circle">
                                <?php
                                if (!empty($feature_img[0])) {
                                    echo '<img src="' . esc_url($feature_img[0]) . '" alt="not found">';
                                }
                                ?>

                            </span>
                            <div class="vps_pp_feature_item_content ms-3">
                                <?php
                                if (!empty($feature_title[0])) {
                                    echo '<h6 class="mb-0">' . hostim_kses_post($feature_title[0]) . '</h6>';
                                }

                                if (is_array($cup_)) {
                                    $i = 1;
                                    foreach ($cup_ as $processor) {
                                        echo '<span class="subtitle vps_value vps_' . $i++ . '_value">' . esc_html($processor) . '</span>';
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-md-6">
                        <div class="vps_pp_feature_item d-flex align-items-center rounded-2">
                            <span class="icon-wrapper d-flex align-items-center justify-content-center rounded-circle">
                                <?php
                                if (!empty($feature_img[1])) {
                                    echo '<img src="' . esc_url($feature_img[1]) . '" alt="not found">';
                                }
                                ?>
                            </span>
                            <div class="vps_pp_feature_item_content ms-3">
                                <?php
                                if (!empty($feature_title[1])) {
                                    echo '<h6 class="mb-0">' . hostim_kses_post($feature_title[1]) . '</h6>';
                                }

                                if (is_array($ram_)) {
                                    $i2 = 1;
                                    foreach ($ram_ as $ram__) {
                                        echo '<span class="subtitle vps_value vps_' . $i2++ . '_value">' . esc_html($ram__) . '</span>';
                                    }
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-md-6">
                        <div class="vps_pp_feature_item d-flex align-items-center rounded-2">
                            <span class="icon-wrapper d-flex align-items-center justify-content-center rounded-circle">
                                <?php
                                if (!empty($feature_img[2])) {
                                    echo '<img src="' . esc_url($feature_img[2]) . '" alt="not found">';
                                }
                                ?>
                            </span>
                            <div class="vps_pp_feature_item_content ms-3">
                                <?php
                                if (!empty($feature_title[2])) {
                                    echo '<h6 class="mb-0">' . hostim_kses_post($feature_title[2]) . '</h6>';
                                }

                                if (is_array($storage_)) {
                                    $i3 = 1;
                                    foreach ($storage_ as $storage__) {
                                        echo '<span class="subtitle vps_value vps_' . $i3++ . '_value">' . esc_html($storage__) . '</span>';
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-md-6">
                        <div class="vps_pp_feature_item d-flex align-items-center rounded-2">
                            <span class="icon-wrapper d-flex align-items-center justify-content-center rounded-circle">
                                <?php
                                if (!empty($feature_img[3])) {
                                    echo '<img src="' . esc_url($feature_img[3]) . '" alt="not found">';
                                }
                                ?>
                            </span>
                            <div class="vps_pp_feature_item_content ms-3">
                                <?php
                                if (!empty($feature_title[3])) {
                                    echo '<h6 class="mb-0">' . hostim_kses_post($feature_title[3]) . '</h6>';
                                }

                                if (is_array($bandwidth_)) {
                                    $i4 = 1;
                                    foreach ($bandwidth_ as $bandwidth__) {
                                        echo '<span class="subtitle vps_value vps_' . $i4++ . '_value">' . esc_html($bandwidth__) . '</span>';
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>


            </ul>
        </div>
        <div class="col-lg-3">
            <div class="host-web-op-bg text-center px-4 py-5 rounded-3">
                <?php 
                if( !empty($section_title) ){
                    echo '<h5 class="pricing_value_title">'. esc_html($section_title) .'</h5>';
                } ?>
                <div class="vps_pricing_bottom text-center mt-2 d-flex align-items-center justify-content-center flex-wrap">
                    <?php
                    if (is_array($price_)) {
                        $i5 = 1;
                        foreach ($price_ as $price__) {
                            echo '<h4 class="vps_value vps_price_value vps_' . $i5++ . '_value">' . esc_html($price__[0]) . esc_html($price__[1]) . '</h4>';
                        }
                    }
                    if (is_array($package_)) {
                        $i6 = 1;
                        foreach ($package_ as $item) {
                            echo '<a href="' . esc_url($item['url']) . '" class="template-btn primary-btn rounded-pill ms-4 vps_value vps_' . esc_attr($i6++) . '_value">' . esc_html($btn_label) . '</a>';
                        }
                    }

                    ?>
                </div>
            </div>
        </div>
    </div>
</div>