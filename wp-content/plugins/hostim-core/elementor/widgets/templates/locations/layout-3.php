<div class="mn-data-center position-relative">
	<?php
    echo !empty($map_img['id']) ? wp_get_attachment_image($map_img['id'], 'full', '', array( 'class' => 'img-fluid' )) : '';
	$i = 1;
	if ( !empty($locations)) {
		foreach ( $locations as $location ) {
			$active = $i == 1 ? 'active' : '';
			?>
			<a href="javascript:void(0)" class="data-center-<?php echo $i ?> data-center-pointer <?php echo $active ?> elementor-repeater-item-<?php echo esc_attr(  $location['_id'] ) ?>">
				<i class="fa-sharp fa-solid fa-location-dot"></i>
				<span class="__location_name"><?php echo esc_attr($location['location_name']) ?></span>
			</a>
			<?php
			++$i;
		}
	}
	?>
</div>
