<div class="operating-systems">
	<div class="d-flex align-items-center justify-content-between gap-3 flex-wrap">
		<?php if (!empty($title)) : ?>
			<h4 class="mb-0"><?php echo esc_html($title) ?></h4>
		<?php endif; ?>
		<div class="ops-slider-controls">
			<button type="button" class="ops-slider-btn btn-prev"><i class="fa-solid fa-arrow-left"></i></button>
			<button type="button" class="ops-slider-btn btn-next"><i class="fa-solid fa-arrow-right"></i></button>
		</div>
	</div>
	<div class="ops-slider swiper mt-4 overflow-hidden" <?php echo hostim_swiper_attrebutes($desktop_items, $carousel_loop, $carousel_autoplay, $slide_delay, $slide_speed, $item_space['size'], $tablet_items, $show_items_mobile) ?> data-next=".btn-next" data-prev=".btn-prev">
		<div class="swiper-wrapper">
			<?php
			if (is_array($logo_carousel2)) {
				foreach ($logo_carousel2 as $item) { ?>
					<div class="ops-slider-single bg-white py-3 px-4 rounded swiper-slide">
						<a <?php Hostimg_Core_Helper()->the_button($item['logo_url']); ?>>
							<?php echo wp_get_attachment_image($item['logo']['id'], 'full', '', ['class' => 'img-fluid']) ?>
						</a>
					</div>
			<?php
				}
			}
			?>
		</div>
	</div>

</div>