<section class="overflow-hidden hostim_slider">
	<div class="swiper-wrapper">
		<?php
		if( is_array( $hostim_slides ) ){
			foreach( $hostim_slides as $slide ){ ?>
				<div class="swiper-slide vps-hero wp-hero bg-primary-gradient elementor-repeater-item-<?php echo esc_attr( $slide['_id'] ) ?>">
					<div class="container">
						<div class="row align-items-center">
							<div class="col-lg-6 order-2 order-lg-1">
								<div class="dm-hero-left mt-5 mt-lg-0">
									<?php
									if( !empty( $slide['slide_subtitle'] ) ){
										echo '<h4 class="slide_subtitle">'. hostim_kses_post( $slide['slide_subtitle'] ) .'</h4>';
									}
									if( !empty( $slide['slide_title'] ) ){
										echo '<'. $slide['heading_tag'] . ' class="display-font slide_title">'. hostim_kses_post( $slide['slide_title'] ) . '</' . $slide['heading_tag'] . '>';
									}
									if( !empty( $slide['slide_desc'] ) ){
										echo '<p class="lead mt-4 mb-4">'. hostim_kses_post( $slide['slide_desc'] ) .'</p>';
									}
									?>
									<div class="wp-hero-list mb-50">
										<?php
										$table_contents = preg_split( '/\r\n|[\r\n]/', $slide['feature_list'] );
										if( !empty( $table_contents ) ){
											echo '<ul>';
											foreach( $table_contents as $item ){
												echo '<li><span class="me-2"><svg width="16" height="13" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7.29784 12.9999C7.24944 12.9999 7.20157 12.9906 7.15723 12.9727C7.11289 12.9548 7.07304 12.9287 7.04019 12.8959L0.093221 5.96473C0.0469107 5.91852 0.0162099 5.86086 0.00487599 5.79881C-0.00645791 5.73676 0.00206669 5.673 0.0294066 5.61535C0.0567465 5.5577 0.101716 5.50865 0.15881 5.4742C0.215905 5.43976 0.282649 5.42141 0.350872 5.42141H3.69476C3.74497 5.42142 3.79459 5.43135 3.84028 5.45055C3.88596 5.46975 3.92665 5.49777 3.95961 5.53271L6.28131 7.99636C6.53222 7.50165 7.01795 6.67793 7.87031 5.6742C9.13039 4.19033 11.4742 2.00802 15.4842 0.0379785C15.5617 -9.01509e-05 15.6519 -0.00997048 15.7369 0.0102886C15.8219 0.0305477 15.8956 0.0794735 15.9434 0.147405C15.9912 0.215337 16.0097 0.297336 15.9952 0.377211C15.9806 0.457086 15.9341 0.529031 15.8649 0.578839C15.8496 0.589875 14.3035 1.71289 12.5241 3.76989C10.8865 5.66284 8.70954 8.7581 7.63834 12.754C7.61952 12.8242 7.57575 12.8866 7.51402 12.9312C7.45229 12.9758 7.37614 13 7.29774 13L7.29784 12.9999Z" fill="white"/></svg></span>'. esc_html( $item ) .'</li>';
											}
											echo '</ul>';
										} ?>
									</div>
									<?php
									if( !empty( $slide['btn_label'] ) ){
										echo '<a href="'. esc_url( $slide['btn_url']['url'] ) .'" class="template-btn primary-btn rounded-pill">'. esc_html( $slide['btn_label'] ) .'</a>';
									}
									?>
								</div>
							</div>
							<div class="col-lg-6 order-1 order-lg-2">
								<div class="wp-hero-right">
									<?php
									if( !empty( $slide['feature_image']['url'] ) ){
										echo '<img src="'. esc_url( $slide['feature_image']['url'] ) .'" alt="'. esc_attr( $slide['slide_title'] ) .'">';
									}
									?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php
			}
		}
		?>
	</div>
	<div class="swiper-pagination"></div>
</section>