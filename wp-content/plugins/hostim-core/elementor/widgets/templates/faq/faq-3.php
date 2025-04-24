<?php
$service_cat= array_column( $hostim_faqs, 'select_service_cat' );
$getCats    = array_unique( $service_cat );
$tab_data   = return_tab_data( $getCats , $hostim_faqs, 'select_service_cat' );
?>
<section class="rs-faq">
    <ul class="hm9-faq-controls nav nav-tabs border-0 justify-content-center">
	    <?php
	    if ( is_array( $getCats ) && count( $getCats ) > 0 ){
		    $i      = 1;
		    foreach ( $getCats as $cat ){
			    $service_cat_name = get_term_by('id', $cat, 'services_cat');
			    if (!empty($service_cat_name)) {
				    $meta = get_term_meta( $service_cat_name->term_id, '_hostim_taxonomy_options', true );
					$service_cat_icon = isset($meta['service_cat_icon']) ? $meta['service_cat_icon'] : '';

				    $catForFilter = sanitize_title_with_dashes( $cat );
				    $catForFilter = str_replace( '-', '', $catForFilter );
				    $active = $i == 1 ? ' active' : '';

				    echo '<li><button class="'. esc_attr( $active ) .'" data-bs-toggle="tab" data-bs-target="#hostim-'.esc_attr( $catForFilter ).'"><span><i class="'. esc_attr($service_cat_icon ) .'"></i></span>'. esc_html( $service_cat_name->name ) .'</button></li>';

				    $i++;
			    }
		    }
	    }
        ?>
    </ul>
    <div class="tab-content mt-30 position-relative zindex-1">
	    <?php
	    if ( !empty( $tab_data ) ){
		    $i = 0;
		    foreach ($tab_data as $key => $val) {
			    $tagforfilter = sanitize_title_with_dashes($key);
			    $catForFilter = str_replace( '-', '', $tagforfilter );
			    $i++;
			    $active = $i == 1 ? ' show active' : '';
                $unique_id = wp_unique_id('accordion_');
			    ?>
                <div class="tab-pane fade <?php echo esc_attr( $active ) ?>" id="hostim-<?php echo esc_attr( $catForFilter ) ?>">
                    <div class="accordion hm2-accordion rounded-2 deep-shadow bg-white" id="<?php echo esc_attr($unique_id) ?>">
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
	                                    if( !empty( $data['description'] ) ){
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
			    <?php
		    }
	    }
        ?>
    </div>
</section>
