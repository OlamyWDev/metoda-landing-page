<div class="gh-map-bottom position-relative zindex-1">
    <?php echo !empty($map_img['id']) ? wp_get_attachment_image($map_img['id'], 'full', '', array( 'class' => 'img-fluid' )) : ''; ?>
    <?php
    if ( !empty($locations)) {
        foreach ( $locations as $location ) {
            ?>
            <button type="button" class="gh-location-indicator position-absolute elementor-repeater-item-<?php echo esc_attr(  $location['_id'] ) ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo esc_attr($location['location_name']) ?>">
                <i class="fa-solid fa-location-dot"></i>
            </button>
            <?php
        }
    }
    ?>
</div>