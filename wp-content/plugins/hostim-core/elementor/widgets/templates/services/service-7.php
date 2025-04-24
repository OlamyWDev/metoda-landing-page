<section class="dd-application">
	<div class="row g-4">
		<?php
		if ( $hostim_service->have_posts() ) {
			while ( $hostim_service->have_posts() ) {
				$hostim_service->the_post();
				$meta = get_post_meta( get_the_ID(), 'hostim_service_options', true );
				?>
                <div class="col-sm-6 item_spacing">
                    <div class="hm2-app-item text-center bg-white deep-shadow rounded-2">
                        <div class="feagure-img">
	                        <?php echo wp_get_attachment_image( $meta['service_feature_img']['id'], 'full', '', [ 'class' => 'img-fluid' ] ); ?>
                        </div>
                        <div class="app-content mt-4">
                            <a href="<?php the_permalink(); ?>">
                                <h3 class="h6 mb-3 service_title__"><?php echo substr(get_the_title(), 0, $title_length_) ?></h3>
                            </a>
                        </div>
                    </div>
                </div>
				<?php
			}
			wp_reset_postdata();
		}
		?>
	</div>
</section>
