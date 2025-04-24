<section class="hero-style-1 ">
	<div class="hero-area overflow-hidden position-relative zindex-1 bg-primary-gradient pt-110 hostim-hero">
		<?php 
		if( !empty( $shape_img_1['url'] ) ){
			echo '<img src="'. esc_url( $shape_img_1['url'] ) .'" alt="circle" class="circle-shape position-absolute">';
		}
		if( !empty( $shape_img_2['url'] ) ){
			echo '<img src="'. esc_url( $shape_img_2['url'] ) .'" alt="circle" class="left-bottom-circle position-absolute">';
		}
		?>
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6">
					<div class="hero1-content-wrap">
						<div class="review-area">
							<?php 
							if( !empty( $brand_logo['url'] ) ){
								echo '<img src="'. esc_url( $brand_logo['url'] ) .'" class="brand-logo" alt="trust pilot">';
							}
							if( !empty( $rating_image['url'] ) ){
								echo '<img src="'. esc_url( $rating_image['url'] ) .'" class="star-rating mt-3 d-block" alt="trust pilot">';
							}
							?>
						</div>
						<?php 
						if ( ! empty( $settings['title'] ) ) {
							echo '<'. $heading_tag .' class="display-font hero_title mt-4">'. wp_kses_post( $settings['title'] ) . '</'. $heading_tag .'>';
						}
						
						if( !empty( $settings['description'] ) ){
							echo '<p class="lead mt-4">'. wp_kses_post( nl2br( $settings['description'] ) ) .'</p>';
						}
						?>
						<div class="hero-btns mt-5">
							<?php if ( ! empty( $settings['btn_link']['url'] ) ) { ?>
								<a href="<?php echo esc_url( $settings['btn_link']['url'] ) ?>"  class="template-btn primary-btn me-4">
									<?php echo esc_html( $settings['btn_text'] ) ?>
								</a>
							<?php }
								if ( ! empty( $settings['btn_2_link']['url'] ) ) { ?>
								<a href="<?php echo esc_url( $settings['btn_2_link']['url'] ) ?>"  class="template-btn outline-btn">
									<?php echo esc_html( $settings['btn_2_text'] ) ?>
								</a>
							<?php } ?>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="hero-right">
						<?php 
						if( !empty( $feature_image['url'] ) ){
							echo '<img src="'. esc_url( $feature_image['url'] ) .'" alt="Feature image">';
						}
						?>
					</div>
				</div>
			</div>
		</div>
		<?php 
		if( !empty( $shape_img_3['url'] ) ){
			echo '<img src="'. esc_url( $shape_img_3['url'] ) .'" alt="circle" class="right-top position-absolute">';
		}
		if( !empty( $shape_img_4['url'] ) ){
			echo '<img src="'. esc_url( $shape_img_4['url'] ) .'" alt="rectangle shape" class="right-bottom position-absolute">';
		}
		?>
	</div>
</section>