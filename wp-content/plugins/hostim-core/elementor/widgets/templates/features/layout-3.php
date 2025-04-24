<div class="host-web-card-item p-4 host-web-shadow rounded-3 feature_section__">
    <?php echo wp_get_attachment_image($settings['fea_3_image']['id'], 'full', '', ['class' => 'img-fluid mb-20']) ?>
    <?php
    if (!empty($settings['fea_3_title'])) {
        echo '<h4 class="feature_title_ fs-22 mb-20">' . hostim_kses_post(nl2br($settings['fea_3_title'])) . '</h4>';
    }
    if (!empty($settings['fea_3_description'])) {
        echo '<p class="feature_content_ mb-0">' . esc_html($settings['fea_3_description']) . '</p>';
    }
    ?>
</div>