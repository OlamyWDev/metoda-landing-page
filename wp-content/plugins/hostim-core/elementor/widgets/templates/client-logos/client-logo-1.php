<div class="vps_scripts_slider_wrapper ">
	<div class="swiper vps-scripts-slider overflow-visible" <?php echo hostim_swiper_attrebutes($desktop_items, $carousel_loop, $carousel_autoplay, $slide_delay, $slide_speed, $item_space['size'], $tablet_items, $show_items_mobile) ?> data-next=".swiper-next" data-prev=".swiper-prev">
		<div class="swiper-wrapper">
			<?php
			if (is_array($logo_carousel)) {
				foreach ($logo_carousel as $item) { ?>
					<div class="vps-script-item text-center swiper-slide">
						<a <?php Hostimg_Core_Helper()->the_button($item['item_url']); ?>>
							<?php
							if (!empty($item['icon_img']['url'])) {
								echo '<img src="' . esc_url($item['icon_img']['url']) . '" alt="' . esc_attr($item['title']) . '" class="img-fluid rounded-circle">';
							}

							if (!empty($item['title'])) {
								echo '<h6 class="mb-0 mt-3">' . esc_html($item['title']) . '</h6>';
							}
							?>
						</a>
					</div>
			<?php
				}
			}
			?>
		</div>
		<?php
		if ($is_navigation == 'yes') { ?>
			<div class="swiper-prev swiper-control-btn"><i class="fa-solid fa-arrow-left"></i></div>
			<div class="swiper-next swiper-control-btn"><i class="fa-solid fa-arrow-right"></i></div>
		<?php
		}
		?>
	</div>
</div>