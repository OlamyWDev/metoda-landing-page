<section class="hm7-application">
    <div class="container">
        <div class="hm7-application-box">
            <div class="row">
                <?php 
                if( !empty($title) ){ ?>
                    <div class="col-xxl-4 col-xl-5">
                        <div class="section-title pt-xl-5 text-center text-xl-start">
                            <h2 class="text-white mb-0"><?php echo esc_html($title) ?></h2>
                        </div>
                    </div>
                    <?php
                } ?>
                
                <div class="col-xxl-8 col-xl-7">
                    <div class="hm7-application-slider overflow-hidden mt-5 mt-xl-0 pb-4">
                        <div class="swiper-wrapper">
	                        <?php
	                        if ( $hostim_service->have_posts() ) {
		                        while ( $hostim_service->have_posts() ) {
			                        $hostim_service->the_post();
			                        $meta = get_post_meta( get_the_ID(), 'hostim_service_options', true );
			                        ?>
                                    <div class="hm2-app-item hm7-app-item text-center bg-white rounded-2 swiper-slide">
                                        <div class="feagure-img">
                                            <?php echo wp_get_attachment_image( $meta['service_feature_img']['id'], 'full', '', ['class' => 'img-fluid'] ); ?>
                                        </div>
                                        <div class="app-content mt-4">
                                            <a href="<?php the_permalink(); ?>">
                                                <h3 class="h6 mb-3 service_title__"><?php echo substr(get_the_title(), 0, $title_length_) ?></h3>
                                            </a>
                                            <p class="mb-20 service_desc__"><?php echo hostim_kses_post(substr($meta['service_short_desc'], 0, $excerpt_length_)) ?></p>
                                            <a href="<?php the_permalink(); ?>" class="explore-btn service_btn__">
	                                            <?php esc_html_e( 'Read More', 'hostim-core' ); ?>
                                                <i class="fa-solid fa-plus"></i>
                                            </a>
                                        </div>
                                    </div>
			                        <?php
		                        }
		                        wp_reset_postdata();
	                        }
	                        ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hm7-app-slide-prev hm7-app-slide-control"><i class="fa-solid fa-arrow-left"></i></div>
            <div class="hm7-app-slide-next hm7-app-slide-control"><i class="fa-solid fa-arrow-right"></i></div>
        </div>
    </div>
</section>


<script>

    ;(function ($) {
        'use strict';

        $(document).ready(function () {

            const hm7ApplicationSlider = new Swiper(".hm7-application-slider", {
                slidesPerView: 3,
                spaceBetween: 24,
                autoplay: true,
                loop: true,
                speed: 700,
                navigation: {
                    nextEl: '.hm7-app-slide-next',
                    prevEl: '.hm7-app-slide-prev'
                },
                breakpoints: {
                    0: {
                        slidesPerView: 1
                    },
                    768: {
                        slidesPerView: 2
                    },
                    992: {
                        slidesPerView: 3
                    },
                    1200: {
                        slidesPerView: 2
                    },
                    1400: {
                        slidesPerView: 3
                    }
                }
            });

        })
    })(jQuery)

</script>