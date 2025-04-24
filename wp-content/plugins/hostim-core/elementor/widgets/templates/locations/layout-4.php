<section class="data-center-filter position-relative">
    <div class="row justify-content-center">
        <div class="col-xl-7">
            <div class="data-center-filter-btns text-center mb-2">
                <?php
                $locations_tabs       = array_column( $locations4, 'continents_name');
                $getLocations    = array_unique( $locations_tabs );
                $tab_data   = return_tab_data( $getLocations , $locations4, 'continents_name' );
                ?>
                <button type="button" class="active" data-filter="*">
                    <?php echo esc_html($all_label) ?>
                </button>
                <?php
                if ( is_array( $getLocations ) && count( $getLocations ) > 0 ) {
                    $i      = 1;
                    foreach ( $getLocations as $cat ) {
                        $catForFilter = sanitize_title_with_dashes( $cat );
                        $catForFilter = str_replace( '-', '', $catForFilter );
                        ?>
                        <button type="button" data-filter=".<?php echo esc_attr($catForFilter) ?>">
                            <?php echo esc_html($cat) ?>
                        </button>
                        <?php
                        $i++;
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <div class="row dtc-grid">
        <?php
        $locations_tabs       = array_column( $locations4, 'continents_name');
        $getLocations    = array_unique( $locations_tabs );
        $tab_data   = return_tab_data( $getLocations , $locations4, 'continents_name' );

        if ( is_array( $getLocations ) ) {
            $i      = 1;
            foreach ( $tab_data as $key => $location_tab_data ) {
                $catForFilter = sanitize_title_with_dashes( $key );
                $catForFilter = str_replace( '-', '', $catForFilter );
                foreach ( $location_tab_data as $item ) {
                    ?>
                    <div class="col-12 <?php echo esc_attr($catForFilter) ?>">
                        <div class="dc-location bg-white rounded mt-40">
                            <div class="row g-4 align-items-center">
                                <div class="col-xl-5">
                                    <div class="location-info">
                                        <div class="d-flex align-items-center">
                                            <?php echo wp_get_attachment_image($item['country_flag']['id'], 'full' ) ?>
                                            <div class="ms-3">
                                                <h4 class="mb-0 __country_name"><?php echo esc_html($item['country_name']) ?></h4>
                                                <span class="fs-sm __continents_name"><?php echo esc_html($item['continents_name']) ?></span>
                                            </div>
                                        </div>
                                        <p class="mb-40 mt-3 __contents"><?php echo esc_html($item['contents']) ?></p>
                                        <a <?php Hostimg_Core_Helper()->the_button($item['btn_url']) ?> class="template-btn rs-primary-btn btn-small __btn">
                                            <?php echo esc_html($item['btn_label']) ?>
                                        </a>
                                        <p class="ip-address fw-bold mt-4"><?php echo Hostimg_Core_Helper()->kses_post($item['ip_address']) ?></p>
                                    </div>
                                </div>
                                <div class="col-xl-7">
                                    <div class="map-info">
                                        <?php echo wp_get_attachment_image($item['map_img']['id'], 'full', '', [ 'class' => 'img-fluid' ] ) ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                $i++;
            }
        }
        ?>
    </div>
</section>
