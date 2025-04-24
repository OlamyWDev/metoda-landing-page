<?php
$service_cat = array_column( $hostim_faqs4, 'select_service_cat' );
$getCats     = array_unique( $service_cat );
$tab_data    = return_tab_data( $getCats , $hostim_faqs4, 'select_service_cat' );
?>
<div class="hm10-faq-tab">
    <ul class="nav nav-tabs border-0 hm10-tab-control gap-4 justify-content-center">
        <?php
        if ( is_array( $getCats ) && count( $getCats ) > 0 ){
            $i      = 1;
            foreach ( $getCats as $cat ){
                $service_cat_name = get_term_by('id', $cat, 'services_cat');
                if (!empty($service_cat_name)) {
                    $meta = get_term_meta( $service_cat_name->term_id, '_hostim_taxonomy_options', true );
                    $catForFilter = sanitize_title_with_dashes( $cat );
                    $catForFilter = str_replace( '-', '', $catForFilter );
                    $active = $i==1 ? ' active' : '';
                    ?>
                    <li>
                        <a href="#hostim-<?php echo esc_attr($catForFilter) ?>" data-bs-toggle="tab" class="text-center bg-white rounded <?php echo esc_attr( $active ) ?>">
                            <?php echo !empty($meta['service_cat_img']['id']) ? wp_get_attachment_image($meta['service_cat_img']['id'], 'hostim_70x50', '', [ 'class' => 'img-fluid' ]) : '' ?>
                            <h6 class="mb-0 mt-3"><?php echo esc_html( $service_cat_name->name) ?></h6>
                        </a>
                    </li>
                    <?php
                    $i++;
                }
            }
        }
        ?>
    </ul>
    <div class="tab-content mt-40">
        <?php
        if ( !empty( $tab_data ) ) {
            $i = 0;
            foreach ($tab_data as $key => $val) {
                $tagforfilter = sanitize_title_with_dashes($key);
                $catForFilter = str_replace( '-', '', $tagforfilter );
                $i++;
                $active = $i == 1 ? ' show active' : '';
                $unique_id = wp_unique_id('accordion_');
                $feature_img = $val[0];
                ?>
                <div class="tab-pane fade bg-white rounded hm10-faq-box <?php echo esc_attr( $active ) ?>" id="hostim-<?php echo esc_attr( $catForFilter ) ?>">
                    <div class="row g-4">
                        <div class="col-xl-4">
                            <div class="img-wrapper">
                                <?php echo wp_get_attachment_image($feature_img['fimg']['id'], 'full', '', [ 'class' => 'rounded img-fluid' ]); ?>
                            </div>
                        </div>
                        <div class="col-xl-8">
                            <div class="accordion hm2-accordion rounded-2 p-0 bg-white" id="<?php echo esc_attr($unique_id) ?>">
                                <?php
                                $in = 1;
                                foreach ( $val as $data ) {
                                    $parent_id = str_replace( '-', '', $data['select_service_cat'] );
                                    $show = $in == 1 ? 'show' : '';
                                    $collapse = $in == 1 ? 'collapse' : 'collapsed';
                                    ?>
                                    <div class="accordion-item">
                                        <div class="accordion-header">
                                            <?php
                                            if( !empty( $data['tab_title'] ) ){
                                                echo '<a href="#faq_'. esc_attr( $data['_id'] ) . '" data-bs-toggle="collapse" class="__title ' . esc_attr($collapse) . '">'. esc_html( $data['tab_title'] ) .'</a>';
                                            }
                                            ?>
                                        </div>
                                        <div class="accordion-collapse collapse <?php echo esc_attr( $show ) ?>" id="faq_<?php echo esc_attr( $data['_id'] ) ?>" data-bs-parent="#<?php echo esc_attr($unique_id) ?>">
                                            <div class="accordion-body __content">
                                                <?php
                                                if ( !empty( $data['description'] ) ) {
                                                    echo wp_kses_post( wpautop( $data['description'] ) );
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    $in++;
                                }
                                ?>
                            </div>
                        </div>

                    </div>
                </div>
                <?php
            }
        }
        ?>
    </div>
</div>
