<div class="newsletter" id="newsletter">
	<form action="<?php echo admin_url( 'admin-ajax.php' ); ?>" method="post" class="newsletter-form hm2-sb-form mt-3" data-hostim-form="newsletter-subscribe">
		<input type="hidden" name="action" value="hostim_mailchimp_subscribe">
		<div class="radio-btns text-center">
			<div class="btns-wrapper">
				<input type="radio" value="1" id="daily-news" name="duration" checked>
				<label for="daily-news"><span></span>Daily Newsletter</label>
			</div>
			<div class="btns-wrapper">
				<input type="radio" value="1" id="weekly-news" name="duration">
				<label for="weekly-news"><span></span>Weekly Newsletter</label>
			</div>
			<div class="btns-wrapper">
				<input type="radio" value="1" id="monthly-news" name="duration">
				<label for="monthly-news"><span></span>Monthly Newsletter</label>
			</div>
		</div>
		<div class="form-input mt-40 position-relative">
			<label for="elementor-newsletter-form-email_"><i class="fa-solid fa-envelope"></i></label>
			<input type="email" name="email" class="form-control" id="elementor-newsletter-form-email_" placeholder="<?php echo esc_attr( $settings['input_placeholder'] ); ?>" required>

			<button type="submit" class="template-btn primary-btn hostim-newsletter-btn"><?php echo $settings['subscribe_text']; ?></button>
		</div>

		<div class="form-result alert mt-3">
			<div class="content"></div>
		</div>
	</form>
</div>
