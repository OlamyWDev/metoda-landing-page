<?php
$desktop_items = !empty($show_items_desktop) ? $show_items_desktop : '1';
$tablet_items  = !empty($show_items_tablet) ? $show_items_tablet : '1'; ?>
<div class="mn-feedback-slider swiper pb-5 overflow-hidden testimonial_bg_" paginationtype="bullets" data-pagination=".swiper-pagination" <?php echo hostim_swiper_attrebutes($desktop_items, $carousel_loop, $carousel_autoplay, $slide_delay, $slide_speed, $item_space['size'], $tablet_items, $show_items_mobile) ?>>
	<div class="swiper-wrapper">
		<?php
		if (is_array($testimonials)) {
			foreach ($testimonials as $item) { ?>
				<div class="mn-feedback-single swiper-slide">
					<div class="mn-feedback-top d-flex align-items-center">
						<?php
						if (!empty($item['author_image']['url'])) {
							echo wp_get_attachment_image($item['author_image']['id'], 'full', '', ['class' => 'rounded-circle flex-shrink-0']);
						}
						if (!empty($item['name'])) { ?>
							<div class="author-info ms-3">
								<h5 class="mb-2"><?php echo esc_html($item['name']) ?></h5>
								<span><?php echo esc_html($item['designation']) ?></span>
							</div>
						<?php
						}
						?>
					</div>
					<div class="mn-feedback-content mt-30 sh-feedback-rating rating-<?php echo esc_attr($item['rating']); ?>">
						<?php
						$rating_markup = '<img src="' . HOSTIM_PLUGIN_URL . 'elementor/assets/images/testimonial/star_shape.svg" alt="' . esc_attr__('star rating 1', 'hostim-core') . '">';
						$rating_markup .= '<img src="' . HOSTIM_PLUGIN_URL . 'elementor/assets/images/testimonial/star_shape.svg" alt="' . esc_attr__('star rating 2', 'hostim-core') . '">';
						$rating_markup .= '<img src="' . HOSTIM_PLUGIN_URL . 'elementor/assets/images/testimonial/star_shape.svg" alt="' . esc_attr__('star rating 3', 'hostim-core') . '">';
						$rating_markup .= '<img src="' . HOSTIM_PLUGIN_URL . 'elementor/assets/images/testimonial/star_shape.svg" alt="' . esc_attr__('star rating 4', 'hostim-core') . '">';
						$rating_markup .= '<img src="' . HOSTIM_PLUGIN_URL . 'elementor/assets/images/testimonial/star_shape.svg" alt="' . esc_attr__('star rating 5', 'hostim-core') . '">';

						echo $rating_markup;
						?>
						<p class="mb-0 mt-3"><?php echo esc_html($item['review_content']) ?></p>
					</div>
				</div>
				<?php
			}
		}
		?>
	</div>
	<div class="swiper-pagination"></div>
</div>