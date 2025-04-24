<div class="mn-feature-slider swiper overflow-hidden"
     data-perpage="<?php echo esc_attr( $desktop_items ) ?>"
     data-loop="<?php echo $carousel_loop == 'yes' ? 'true' : 'false' ?>"
     data-autoplay="<?php echo $carousel_autoplay == 'yes' ? 'true' : 'false' ?>"
     data-speed="<?php echo esc_attr( $slide_speed ) ?>"
     data-space="<?php echo !empty( $item_space ) ? esc_attr( $item_space['size'] ) : '24' ?>"
     data-breakpoints='{"1399": {"slidesPerView": <?php echo esc_attr( $desktop_items ) ?>},"1024": {"slidesPerView": <?php echo esc_attr( $tablet_items ) ?>}, "768": {"slidesPerView": <?php echo esc_attr( $show_items_mobile ) ?>}, "360": {"slidesPerView": <?php echo esc_attr( $show_items_mobile ) ?>}}'
    >
    <div class="swiper-wrapper">
		<?php
		if ( $hostim_service->have_posts() ) {
			while ( $hostim_service->have_posts() ) {
				$hostim_service->the_post();
				$meta = get_post_meta( get_the_ID(), 'hostim_service_options', true );
				?>
                <div class="mn-about-feature-single d-flex align-items-center swiper-slide">
					<?php echo wp_get_attachment_image( $meta['service_feature_img']['id'], 'full', '', [ 'class' => 'flex-shrink-0 me-3' ] ); ?>
                    <div class="mn-about-ft-content">
                        <a href="<?php the_permalink(); ?>">
                            <h5 class="mb-3 service_title__"><?php echo substr(get_the_title(), 0, $title_length_) ?></h5>
                        </a>
                        <p class="mb-0 service_desc__"><?php echo hostim_kses_post(substr($meta['service_short_desc'], 0, $excerpt_length_)) ?></p>
                    </div>
                </div>
				<?php
			}
			wp_reset_postdata();
		}
		?>
    </div>
</div>