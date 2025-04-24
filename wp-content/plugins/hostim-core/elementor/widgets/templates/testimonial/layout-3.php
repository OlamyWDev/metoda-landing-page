<?php
$desktop_items = !empty($show_items_desktop) ? $show_items_desktop : '3';
$tablet_items  = !empty($show_items_tablet) ? $show_items_tablet : '2';
?>
<div class="dm-feedback-slider swiper mt-5 overflow-hidden testimonial_bg_" <?php echo hostim_swiper_attrebutes($desktop_items, $carousel_loop, $carousel_autoplay, $slide_delay, $slide_speed, $item_space['size'], $tablet_items, $show_items_mobile) ?>>
	<div class="swiper-wrapper">
		<?php
		if (is_array($testimonials)) {
			foreach ($testimonials as $testimonial) { ?>
				<div class="dm-feedback-single bg-white swiper-slide">
					<div class="dm-feedback-top d-flex align-items-center">
						<?php
						if (!empty($testimonial['author_image']['url'])) {
							echo '<img src="' . esc_url($testimonial['author_image']['url']) . '" alt="' . esc_attr($testimonial['name']) . '" class="img-fluid rounded-circle flex-shrink-0">';
						} ?>
						<div class="dm-feedback-client-info ms-3">
							<?php
							if (!empty($testimonial['name'])) {
								echo '<h5>' . esc_html($testimonial['name']) . '</h5>';
							}
							?>
							<?php $rating = $testimonial['rating']; ?>
							<div class="sh-feedback-rating rating-<?php echo esc_attr($rating); ?>">
								<?php
								$rating_markup = '<img src="' . HOSTIM_PLUGIN_URL . 'elementor/assets/images/testimonial/star_shape.svg" alt="' . esc_attr__('star 1', 'hostim-core') . '" class="img-fluid">';
								$rating_markup .= '<img src="' . HOSTIM_PLUGIN_URL . 'elementor/assets/images/testimonial/star_shape.svg" alt="' . esc_attr__('star 2', 'hostim-core') . '" class="img-fluid">';
								$rating_markup .= '<img src="' . HOSTIM_PLUGIN_URL . 'elementor/assets/images/testimonial/star_shape.svg" alt="' . esc_attr__('star 3', 'hostim-core') . '" class="img-fluid">';
								$rating_markup .= '<img src="' . HOSTIM_PLUGIN_URL . 'elementor/assets/images/testimonial/star_shape.svg" alt="' . esc_attr__('star 4', 'hostim-core') . '" class="img-fluid">';
								$rating_markup .= '<img src="' . HOSTIM_PLUGIN_URL . 'elementor/assets/images/testimonial/star_shape.svg" alt="' . esc_attr__('star 5', 'hostim-core') . '" class="img-fluid">';

								echo $rating_markup;
								?>
							</div>
						</div>
					</div>
					<div class="dm-feedback-comment mt-40 mb-30">
						<?php
						if (!empty($testimonial['review_content'])) {
							echo '<p><i class="fa-solid fa-quote-left"></i>' . esc_html($testimonial['review_content']) . '</p>';
						}
						?>
					</div>
					<?php
					if (!empty($testimonial['stamp_image']['url'])) {
						echo '<img src="' . esc_url($testimonial['stamp_image']['url']) . '" alt="Stamp Icon" class="img-fluid">';
					} ?>
				</div>
				<?php
			}
		}
		?>
	</div>
</div>