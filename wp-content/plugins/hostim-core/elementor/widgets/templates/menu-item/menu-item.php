<div class="hostim-mega-menu-item">
	<div class="wrapper">
		<?php
		global $post;
		$post_slug = $post->post_name;
		$current_slug = '/'.$post_slug.'/';
		$active_class = $current_slug == $menu_page_link['url'] ? 'active' : '';
		
		if( !empty( $menu_page_link['url'] ) ){
			echo '<a href="'. esc_url( $menu_page_link['url'] ) .'" class="menu_page_link">';
		} ?>

		<div class="menu-list-wrapper d-flex align-items-center <?php echo esc_attr($active_class) ?>">
			<span class="icon-wrapper d-flex align-items-center justify-content-center">
				<?php 
			
				if ( $select_icon_type == 'icon' && ! empty( $settings['box_icon'] ) ) {
					\Elementor\Icons_Manager::render_icon( $settings['box_icon'], [ 'aria-hidden' => 'true' ] ); 
				}
				elseif( $select_icon_type == 'image' && !empty( $img_icon['id'] ) ){
					echo wp_get_attachment_image( $img_icon['id'], 'full' );
				}
				elseif( $select_icon_type == 'number' && !empty( $serial_number ) ) {
					echo esc_html( $serial_number );
				} 
			 	?>
		
			</span>
			<div class="menu-list-content-right ms-3">
				<?php 
				$menu_badge = !empty( $menu_badge ) ? '<span class="badge ms-3">'. esc_html( $menu_badge ) .'</span>' : '';
				if ( ! empty( $box_title ) ) {
					echo '<h6 class="box-title">'. esc_html( $box_title ) . hostim_kses_post( $menu_badge ) .'</h6>';
				}
				if ( ! empty( $description ) ){
					echo '<p class="description">'. esc_html( $description ).'</p>';
				} ?>
			</div>
		</div>

		<?php 
		if( !empty( $menu_page_link['url'] ) ){
			echo '</a>';
		} ?>
	</div>
</div>