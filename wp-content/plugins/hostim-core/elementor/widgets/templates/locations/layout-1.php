<section class="data-center">
    <div class="data-center-location">
        <div class="map-location position-relative">
            <?php
            if (!empty($map_img['url'])) {
                echo '<img src="' . esc_url($map_img['url']) . '" alt="map" class="img-fluid">';
            } ?>

            <ul class="ct-location">
                <?php
                if (is_array($locations)) {
                    foreach ($locations as $location) { ?>
                        <li class="elementor-repeater-item-<?php echo esc_attr($location['_id']) ?>">
                            <?php
                            if ($location['location_name']) {
                                echo '<span class="d-none d-md-block">' . esc_html($location['location_name']) . '</span>';
                            } ?>
                            <button class="d-block d-md-none" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo esc_attr($location['location_name']) ?>"></button>
                        </li>
                <?php
                    }
                }
                ?>
            </ul>
        </div>
    </div>
</section>