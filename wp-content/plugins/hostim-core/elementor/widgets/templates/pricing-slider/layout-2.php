<div class="hero-slider-wrapper overflow-hidden pricing_slider__">
	<div class="mn-hero-pricing-slider pb-80">
		<div class="swiper-wrapper">
			<?php
			if ( is_array($price_slider2 )) {
				foreach ( $price_slider2 as $item ) {
					?>
					<div class="single-wrapper swiper-slide">
						<div class="hosting-signle-product text-center bg-white rounded">
							<?php echo wp_get_attachment_image($item['image']['id'], 'full', '', [ 'class' => 'img-fluid' ]) ?>
							<h6 class="mt-4 mb-3"><?php echo esc_html($item['package_name']) ?></h6>
							<div class="pricing-amount">
                                <?php
                                if(!empty($item['subtitle'])){?>
                                    <span><?php echo $item['subtitle']; ?></span>
                                <?php
                                }
                                ?>
								<h3 class="mb-0"><?php echo esc_html($item['price']);
                                    if(!empty($item['period'])){
                                        echo '<span>'. esc_html( $item['period'] ) .'</span>';
                                    }
                                ?>                                    
                                </h3>
							</div>
							<p class="mt-4 mb-30"><?php echo esc_html($item['contents']) ?></p>
							<a <?php Hostimg_Core_Helper()->the_button($item['btn_url']) ?> class="template-btn mn-secondary-btn w-100">
								<?php echo esc_html($item['btn_label']) ?>
							</a>
						</div>
					</div>
					<?php
				}
			}
			?>
		</div>
        <div class="slide-control-prev slide-control"><i class="fa-solid fa-arrow-left"></i></div>
        <div class="slide-control-next slide-control"><i class="fa-solid fa-arrow-right"></i></div>
	</div>
</div>



<script>
    ;(function($){
        "use strict";
        $(document).ready(function () {

            const mnHeroPricingSlider = new Swiper(".mn-hero-pricing-slider", {
                loop: true,
                autoplay: true,
                navigation: {
                    nextEl: '.slide-control-next',
                    prevEl: '.slide-control-prev'
                },
                breakpoints: {
                    0: {
                        slidesPerView: 1,
                        spaceBetween: 16,
                        centeredSlides: false
                    },
                    768: {
                        slidesPerView: 3,
                        spaceBetween: -150,
                        centeredSlides: true
                    }
                }
            });

        });
    })(jQuery)
</script>