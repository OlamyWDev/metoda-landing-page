<form action="<?php echo admin_url( 'admin-ajax.php' ); ?>" method="post" class="ex-signup-form" data-hostim-form="newsletter-subscribe">
	<input type="hidden" name="action" value="hostim_mailchimp_subscribe">

	<input type="email" name="email" id="elementor-newsletter-form-email" placeholder="<?php echo esc_attr( $settings['input_placeholder'] ); ?>" required>
	<p class="fs-sm mt-4 mb-40"><?php echo esc_html($form_description_text) ?></p>
	<button type="submit" class="hm10-secondary-btn"><?php echo $settings['subscribe_text']; ?></button>

    <div class="form-result alert mt-3">
        <div class="content"></div>
    </div>

</form>
