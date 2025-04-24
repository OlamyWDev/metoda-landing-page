<section class="hm2-blog-section">
	<div class="container">
		<?php
		$desktop_items = !empty( $show_items_desktop ) ? $show_items_desktop : '3';
		$tablet_items  = !empty( $show_items_tablet ) ? $show_items_tablet : '2'; ?>
		<div class="hm2-blog-wrapper hm2-blog-slider swiper swiper-container overflow-hidden" <?php echo hostim_swiper_attrebutes($desktop_items, $carousel_loop, $carousel_autoplay, $slide_delay, $slide_speed, $item_space['size'], $tablet_items, $show_items_mobile ) ?> >
			<div class="swiper-wrapper">
				<?php
				while ( $hostim_query->have_posts() ) {
					$hostim_query->the_post(); ?>

					<div class="swiper-slide hm2-blog-card bg-white">
						<div class="feature-img rounded-top overflow-hidden">
							<a href="<?php the_permalink() ?>">
							<?php the_post_thumbnail('blog_420x250') ?>
							</a>
						</div>
						<div class="hm2-blog-card-content position-relative">
							<?php \Hostim_Theme_Helper::hostim_entry_cat('category', 'tag-btn rounded-pill position-absolute'); ?>
							<a href="<?php the_permalink() ?>">
								<h3 class="h5 mb-3"><?php echo Hostimg_Core_Helper()->get_the_title_length($settings, 'title_length') ?></h3>
							</a>
                            <p><?php echo Hostimg_Core_Helper()->get_the_excerpt_length($settings, 'excerpt_length') ?></p>
							<hr class="spacer mt-20 mb-20">
							<div class="bog-author d-flex align-items-center justify-content-between">
								<div class="d-inline-flex align-items-center">
									<?php
									if($author_img_switcher == 'yes') {
										echo get_avatar( get_the_author_meta( 'ID' ), 52, '', '', array('class'=>'img-fluid rounded-circle') );
									}
									if($author_name_switcher == 'yes') { ?>
										<h6 class="ms-2 mb-0"><?php echo \Hostim_Theme_Helper::hostim_get_posted_by(); ?></h6>
									<?php
									}
									?>									
								</div>
								<span class="date"><?php echo hostim_get_post_time_ago(); ?></span>
							</div>

						</div>
					</div>

					<?php
				}
				wp_reset_postdata();
				?>

			</div>
			<div class="swiper-pagination slider-pagination"></div>
		</div>
	</div>
</section>
