<section class="sh-feedback pt-120 pb-120 testimonial_bg_">
	<div class="container">
		<?php 
		if( !empty( $sec_heading ) ){ ?>
			<div class="row justify-content-center">
				<div class="col-lg-5">
					<div class="section-title text-center">
						<h2 class="testimonial_heading"><?php echo hostim_kses_post( nl2br( $sec_heading ) ) ?></h2>
					</div>
				</div>
			</div>
			<?php 
		} ?>
		<div class="row mt-5 g-4 justify-content-center">
			<?php 
			if( is_array( $testimonials ) ){
				foreach( $testimonials as $testimonial ){ ?>
					<div class="col-lg-4 col-md-6">
						<div class="sh-feedback-wrapper bg-white rounded-10">
							<?php 
							if( !empty( $testimonial['author_image']['url'] ) ){
								echo '<img src="'. esc_url( $testimonial['author_image']['url'] ) .'" class="clients-thumb img-fluid rounded-circle" alt="'. esc_attr__( 'Quote Icon', 'hostim-core' ) .'">';
							}
							?>
							<span class="quote-icon float-end mt-3">
								<?php 
								if( !empty( $quote_image['url'] ) ){
									echo '<img src="'. esc_url( $quote_image['url'] ) .'" alt="'. esc_attr__( 'Quote Icon', 'hostim-core' ) .'">';
								}
								?>
							</span>
							<?php 
							if( !empty( $testimonial['review_content'] ) ){
								echo '<p class="mt-20">"'. esc_html( $testimonial['review_content'] ) .'"</p>';
							} ?>
							<hr class="spacer">
							<div class="sh-feedback-bottom d-flex align-items-center justify-content-between">
								<div class="sh-feedback-client">
									<?php 
									if( !empty( $testimonial['name'] ) ){
										echo '<h6 class="mb-0">'. esc_html( $testimonial['name'] ) .'</h6>';
									} 
									if( !empty( $testimonial['designation'] ) ){
										echo '<span>'. esc_html( $testimonial['designation'] ) .'</span>';
									} ?>
									
								</div>
								<?php $rating = $testimonial['rating']; ?>
								<div class="sh-feedback-rating rating-<?php echo esc_attr( $rating ); ?>">
									<?php
									$rating_markup = '<img src="'. HOSTIM_PLUGIN_URL. 'elementor/assets/images/testimonial/star_shape.svg" alt="'. esc_attr__( '1star rating', 'hostim-core' ) .'">';
									$rating_markup .= '<img src="'. HOSTIM_PLUGIN_URL. 'elementor/assets/images/testimonial/star_shape.svg" alt="'. esc_attr__( '2star rating', 'hostim-core' ) .'">';
									$rating_markup .= '<img src="'. HOSTIM_PLUGIN_URL. 'elementor/assets/images/testimonial/star_shape.svg" alt="'. esc_attr__( '3star rating', 'hostim-core' ) .'">';
									$rating_markup .= '<img src="'. HOSTIM_PLUGIN_URL. 'elementor/assets/images/testimonial/star_shape.svg" alt="'. esc_attr__( '4star rating', 'hostim-core' ) .'">';
									$rating_markup .= '<img src="'. HOSTIM_PLUGIN_URL. 'elementor/assets/images/testimonial/star_shape.svg" alt="'. esc_attr__( '5star rating', 'hostim-core' ) .'">';
									
									echo $rating_markup;
									?>
								</div>
							</div>
						</div>
					</div>
					<?php
				}
			}
			?>
			
		</div>
		<div class="clients-explore d-flex app-explore align-items-center justify-content-center mt-10">
			<?php 
			if( is_array( $testimonials ) ){
				echo '<div class="app-thumbs">';
				foreach( $testimonials as $testimonial ){ 
					echo '<img src="'. esc_url( $testimonial['author_image']['url'] ) .'" alt="not found" class="img-fluid rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="'. esc_attr( $testimonial['name'] ) .'" aria-label="Darrel">';
				}
				echo '</div>';
			} 
			
			if( !empty( $btn_before_image['url'] ) ){
				echo '<img src="'. esc_url( $btn_before_image['url'] ) .'" alt="arrow dark" class="img-fluid ms-2">';
			}

			if( !empty( $btn_label ) ){ ?>
				<div class="app-info ms-2">
					<?php echo '<a href="'. esc_url( $btn_url ) .'"><h6 class="text-decoration-underline">'. esc_html( $btn_label ) .'</h6></a>' ?>					
				</div>
				<?php
			} ?>
			
		</div>
	</div>
</section>