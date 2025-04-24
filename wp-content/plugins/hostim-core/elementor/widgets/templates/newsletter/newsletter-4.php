<form action="<?php echo admin_url( 'admin-ajax.php' ); ?>" method="post" class="newsletter-form" data-hostim-form="newsletter-subscribe">
	<input type="hidden" name="action" value="hostim_mailchimp_subscribe">

    <div class="form_wraper">
        <input class="form-control" type="email" name="email" id="elementor-newsletter-form-email" placeholder="<?php echo esc_attr( $settings['input_placeholder'] ); ?>" required>
        <button type="submit" class="hostim-newsletter-btn template-btn primary-btn"><?php echo $settings['subscribe_text']; ?></button>
    </div>
</form>