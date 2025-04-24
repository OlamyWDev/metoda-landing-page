<div class="hm2-feedback-right position-relative testimonial_bg_">
	<div class="gradient-bg"></div>
	<?php
	$desktop_items = !empty($show_items_desktop) ? $show_items_desktop : '1';
	$tablet_items  = !empty($show_items_tablet) ? $show_items_tablet : '1';
	?>
	<div class="hm2-feedback-slider swiper" <?php echo hostim_swiper_attrebutes($desktop_items, $carousel_loop, $carousel_autoplay, $slide_delay, $slide_speed, $item_space['size'], $tablet_items, $show_items_mobile) ?>>
		<div class="swiper-wrapper">
			<?php
			if (is_array($testimonials)) {
				foreach ($testimonials as $testimonial) { ?>
					<div class="hm2-feedback-item bg-white position-relative swiper-slide">
						<?php $rating = $testimonial['rating']; ?>
						<div class="sh-feedback-rating rating-<?php echo esc_attr($rating); ?>">
							<?php
							$rating_markup = '<img src="' . HOSTIM_PLUGIN_URL . 'elementor/assets/images/testimonial/star_shape.svg" alt="' . esc_attr__('1 star rating', 'hostim-core') . '" class="img-fluid">';
							$rating_markup .= '<img src="' . HOSTIM_PLUGIN_URL . 'elementor/assets/images/testimonial/star_shape.svg" alt="' . esc_attr__('2 star rating', 'hostim-core') . '" class="img-fluid">';
							$rating_markup .= '<img src="' . HOSTIM_PLUGIN_URL . 'elementor/assets/images/testimonial/star_shape.svg" alt="' . esc_attr__('3 star rating', 'hostim-core') . '" class="img-fluid">';
							$rating_markup .= '<img src="' . HOSTIM_PLUGIN_URL . 'elementor/assets/images/testimonial/star_shape.svg" alt="' . esc_attr__('4 star rating', 'hostim-core') . '" class="img-fluid">';
							$rating_markup .= '<img src="' . HOSTIM_PLUGIN_URL . 'elementor/assets/images/testimonial/star_shape.svg" alt="' . esc_attr__('5 star rating', 'hostim-core') . '" class="img-fluid">';

							echo $rating_markup;
							?>
						</div>
						<?php
						if (!empty($testimonial['review_content'])) {
							echo '<p class="quote-text mb-30 mt-4">' . esc_html($testimonial['review_content']) . '</p>';
						}
						?>

						<div class="clients-info d-flex align-items-center">
							<?php
							if (!empty($testimonial['author_image']['url'])) {
								echo '<img src="' . esc_url($testimonial['author_image']['url']) . '" class="img-fluid flex-shrink-0 rounded-circle" alt="' . esc_attr($testimonial['name']) . '">';
							}
							?>
							<div class="clients-designation ms-3">
								<?php
								if (!empty($testimonial['name'])) {
									echo '<h6 class="mb-1">' . esc_html($testimonial['name']) . '</h6>';
								}

								if (!empty($testimonial['designation'])) {
									echo '<span>' . esc_html($testimonial['designation']) . '</span>';
								}
								?>

							</div>
						</div>
						<?php
						if (!empty($quote_image['id'])) { ?>
							<span class="quote-icon position-absolute text-center rounded-circle text-white">
								<?php echo wp_get_attachment_image($quote_image['id']) ?>
							</span>
						<?php
						}
						?>
					</div>
			<?php
				}
			}
			?>

		</div>
	</div>

</div>