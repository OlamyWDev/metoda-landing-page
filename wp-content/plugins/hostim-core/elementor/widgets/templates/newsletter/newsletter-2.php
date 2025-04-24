<div class="footer-widget">
	<form action="<?php echo admin_url( 'admin-ajax.php' ); ?>" method="post" class="footer-sb-form position-relative" data-hostim-form="newsletter-subscribe">
		<input type="hidden" name="action" value="hostim_mailchimp_subscribe">

		<input type="email" name="email" class="form-control" id="elementor-newsletter-form-email" placeholder="<?php echo esc_attr( $settings['input_placeholder'] ); ?>" required>
		<button type="submit" class="template-btn primary-btn btn-small hostim-newsletter-btn"><?php echo $settings['subscribe_text']; ?></button>

		<div class="form-result alert mt-3">
			<div class="content"></div>
		</div>
	</form>
</div>
