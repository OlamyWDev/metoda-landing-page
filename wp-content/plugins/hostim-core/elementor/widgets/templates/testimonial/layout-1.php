<?php
$section_class = !empty( $btn_label ) ? '' : '-full';
?>
<section class="testimonial_bg_ feedback-section<?php echo esc_attr( $section_class ) ?> bg-primary-gradient pt-120 position-relative overflow-hidden">
	<div class="container">
		<?php 
		if( !empty( $sec_heading || $sec_short_desc ) ){ ?>
			<div class="row justify-content-center">
				<div class="col-lg-8">
					<div class="feedbackt-top text-center">
						<?php 
						if( !empty( $sec_heading ) ){
							echo '<h2>'. hostim_kses_post( nl2br( $sec_heading ) ) .'</h2>';
						}
						if( !empty( $sec_short_desc ) ){
							echo '<p>'. hostim_kses_post( nl2br( $sec_short_desc ) ) .'</p>';
						}
						?>					
					</div>
				</div>
			</div>
			<?php 
		} ?>
		<div class="feedback-wrapper mt-30">
			<div class="row g-4 feedback-massonry">
				<?php
				if( is_array( $testimonials ) ){
					foreach( $testimonials as $testimonial ){ ?>
						<div class="col-lg-4 col-md-6">
							<div class="feedback-single bg-white rounded-5 position-relative">
								<?php 
								if( !empty( $quote_image['url'] ) ){
									echo '<img src="'. esc_url( $quote_image['url'] ) .'" class="position-absolute quote-icon" alt="'. esc_attr__( 'Quote Icon', 'hostim-core' ) .'">';
								}
								?>
								<div class="feedback-top d-flex align-items-center">
									<?php 
									if( !empty( $testimonial['author_image']['url'] ) ){
										echo '<img src="'. esc_url( $testimonial['author_image']['url'] ) .'" class="img-fluid rounded-circle flex-shrink-0" alt="'. esc_attr( $testimonial['name'] ) .'">';
									}
									?>
									<div class="feedback-top-content ms-3">
										<?php 
										if( !empty( $testimonial['name'] ) ){
											echo '<h5>'. esc_html( $testimonial['name'] ) .'</h5>';
										}
										
										$rating = $testimonial['rating']; ?>
										<div class="sh-feedback-rating rating-<?php echo esc_attr( $rating ); ?>">
											<?php
											$rating_markup = '<img src="'. HOSTIM_PLUGIN_URL. 'elementor/assets/images/testimonial/star_shape.svg" alt="'. esc_attr__( 'star rating 1', 'hostim-core' ) .'">';
											$rating_markup .= '<img src="'. HOSTIM_PLUGIN_URL. 'elementor/assets/images/testimonial/star_shape.svg" alt="'. esc_attr__( 'star rating 2', 'hostim-core' ) .'">';
											$rating_markup .= '<img src="'. HOSTIM_PLUGIN_URL. 'elementor/assets/images/testimonial/star_shape.svg" alt="'. esc_attr__( 'star rating 3', 'hostim-core' ) .'">';
											$rating_markup .= '<img src="'. HOSTIM_PLUGIN_URL. 'elementor/assets/images/testimonial/star_shape.svg" alt="'. esc_attr__( 'star rating 4', 'hostim-core' ) .'">';
											$rating_markup .= '<img src="'. HOSTIM_PLUGIN_URL. 'elementor/assets/images/testimonial/star_shape.svg" alt="'. esc_attr__( 'star rating 5', 'hostim-core' ) .'">';
											
											echo $rating_markup;
											?>
											
										</div>
									</div>
								</div>
								<?php 
								if( !empty( $testimonial['review_content'] ) ){
									echo '<p class="feedback-comment mt-30 mb-30">"'. esc_html( $testimonial['review_content'] ) .'"</p>';
								}

								if( !empty( $testimonial['stamp_image']['url'] ) ){
									echo '<img src="'. esc_url( $testimonial['stamp_image']['url'] ) .'" alt="Stamp Icon" class="img-fluid">';
								}
								?>
							</div>
						</div>
						<?php
					}
				}
				?>				
			</div>
		</div>
	</div>
	<?php 
	if( !empty( $btn_label ) ){ ?>
		<div class="explore-btn position-absolute">
			<a href="<?php echo esc_url( $btn_url ) ?>" class="template-btn hm2-primary-btn"><?php echo esc_html( $btn_label )?></a>
		</div>
	<?php }	?>
	
</section>
