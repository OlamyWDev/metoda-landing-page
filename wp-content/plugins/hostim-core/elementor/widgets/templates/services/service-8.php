<div class="row justify-content-center g-4">
	<?php
	if ( $hostim_service->have_posts() ) {
		while ( $hostim_service->have_posts() ) {
			$hostim_service->the_post();
			$meta = get_post_meta( get_the_ID(), 'hostim_service_options', true );
			?>
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="hm9-apps-card text-center">
					<?php echo wp_get_attachment_image( $meta['service_feature_img']['id'], 'full', '', [ 'class' => 'img-fluid' ] ); ?>
                    <a href="<?php the_permalink(); ?>">
                        <h6 class="mt-4 mb-3 service_title__"><?php echo substr(get_the_title(), 0, $title_length_) ?></h6>
                    </a>
                    <p class="mb-20 __content service_desc__"><?php echo hostim_kses_post(substr($meta['service_short_desc'], 0, $excerpt_length_)) ?></p>
                    <a href="<?php the_permalink(); ?>" class="fw-semibold link-btn service_btn__">
						<?php echo esc_html($settings['service_btn_label']); ?>
                    </a>
                </div>
            </div>
			<?php
		}
		wp_reset_postdata();
	}
	?>
</div>
