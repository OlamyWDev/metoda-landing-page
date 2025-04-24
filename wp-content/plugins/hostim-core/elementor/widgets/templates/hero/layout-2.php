<section class="hero-style-2 overflow-hidden position-relative zindex-2 hostim-hero">
	<?php
	if( is_array( $settings['shape_images'] ) ){
		$i = 1;
		foreach ( $settings['shape_images'] as $image ) {
			echo '<img src="'. esc_url( $image['shape_img']['url'] ) .'" alt="'. esc_attr__( 'Shape image' ) .'" class="position-absolute shape_'.$i++.' elementor-repeater-item-'. esc_attr(  $image['_id'] ) .'">';
		}
	}
	?>
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-6">
				<div class="hero2-content-wrapper">
					<?php 
					if( !empty( $title ) ){
						echo '<' . $heading_tag . ' class="display-font hero_title">'. hostim_kses_post( nl2br( $title ) ) . '</' . $heading_tag . '>';
					}
					if( !empty( $description ) ){
						echo '<p class="lead mt-4">'. hostim_kses_post( nl2br( $description ) ) .'</p>';
					}
					if( !empty( $btn_text || $btn_2_text ) ){ ?>
						<div class="hero-btns mt-5">
							<?php
							if( !empty( $btn_text ) ){
								echo '<a '.  Hostimg_Core_Helper::the_button($btn_link, false) .' class="template-btn hm2-primary-btn rounded-pill me-4">'. esc_html( $btn_text ) .'</a>';
							}
							if( !empty( $btn_2_text ) ){
								echo '<a ' .  Hostimg_Core_Helper::the_button($btn_2_link, false) . ' class="template-btn outline-btn rounded-pill">'. esc_html( $btn_2_text ) .'</a>';
							}
							?>
						</div>
						<?php
					}
					?>					
					
				</div>
			</div>
			<div class="col-lg-6">
				<div class="hero-right">
					<?php 
					if( !empty( $feature_image_two['url'] ) ){
						echo '<img src="'. esc_url( $feature_image_two['url'] ) .'" alt="hostim hero" class="hero-right-img">';
					}
					?>
				</div>
			</div>
		</div>
	</div>
</section>