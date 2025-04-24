<section class="ds-feedback hostim_testimonials testimonial_bg_">
    <div class="row g-4 justify-content-center">
        <?php
        if( is_array( $testimonials7 ) ){
            foreach( $testimonials7 as $testimonial ) {
                ?>
                <div class="col-xl-4 col-lg-6">
                    <div class="ds-feedback-single bg-white rounded-10">
                        <div class="item-top d-flex align-items-center">
                            <?php
                            if ( !empty($testimonial['author_image']['id']) ) {
                                echo wp_get_attachment_image( $testimonial['author_image']['id'], 'full', '', array( 'class' => 'img-fluid flex-shrink-0' ) );
                            }
                            ?>
                            <div class="item-top-content ms-3">
                                <?php
                                if ( !empty($testimonial['name']) ) { ?>
                                    <h5 class="mb-1 name"><?php echo esc_html($testimonial['name']) ?></h5>
                                    <?php
                                }
                                if ( !empty($testimonial['designation']) ) { ?>
                                    <span class="designation"><?php echo esc_html($testimonial['designation']) ?></span>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div class="item-content mt-20">
                            <?php
                            if ( !empty($testimonial['review_content']) ) { ?>
                                <p class="mb-4 review_content"><?php echo esc_html($testimonial['review_content']) ?></p>
                                <?php
                            }
                            ?>
                            <div class="sh-feedback-rating rating-<?php echo esc_attr( $testimonial['rating'] ); ?>">
                                <?php
                                $rating_markup = '<img src="'. HOSTIM_PLUGIN_URL. 'elementor/assets/images/testimonial/star_shape.svg" alt="'. esc_attr__( 'star rating 1', 'hostim-core' ) .'">';
                                $rating_markup .= '<img src="'. HOSTIM_PLUGIN_URL. 'elementor/assets/images/testimonial/star_shape.svg" alt="'. esc_attr__( 'star rating 2', 'hostim-core' ) .'">';
                                $rating_markup .= '<img src="'. HOSTIM_PLUGIN_URL. 'elementor/assets/images/testimonial/star_shape.svg" alt="'. esc_attr__( 'star rating 3', 'hostim-core' ) .'">';
                                $rating_markup .= '<img src="'. HOSTIM_PLUGIN_URL. 'elementor/assets/images/testimonial/star_shape.svg" alt="'. esc_attr__( 'star rating 4', 'hostim-core' ) .'">';
                                $rating_markup .= '<img src="'. HOSTIM_PLUGIN_URL. 'elementor/assets/images/testimonial/star_shape.svg" alt="'. esc_attr__( 'star rating 5', 'hostim-core' ) .'">';

                                echo $rating_markup;
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
</section>