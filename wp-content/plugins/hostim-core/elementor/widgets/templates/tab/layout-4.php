<div class="container">
    <div class="row">
        <div class="col-12">
            <ul class="nav nav-pills mb-3 portfolio-nav-tab" id="pills-tab" role="tablist">
                <?php
                $tab_item_col = array_column($tab_list, 'tab_title');
                $getCats      = array_unique($tab_item_col);
                $tab_data     = return_tab_data($getCats, $tab_list, 'tab_title');

                if (!empty($getCats)) {
                    foreach ($getCats as $key => $item) {
                        $tab_id = str_replace(' ', '', strtolower($item));
                        $active = $key == 0 ? 'active' : '';
                ?>
                        <li class="nav-item">
                            <button class="nav-link <?php echo esc_attr($active) ?>" data-bs-toggle="pill" data-bs-target="#portfolioTab_<?php echo esc_attr($tab_id) ?>" type="button" aria-selected="true">
                                <?php echo esc_html($item) ?>
                            </button>
                        </li>
                <?php
                    }
                }
                ?>

            </ul>
            <div class="tab-content">
                <?php
                if (!empty($tab_data)) {
                    $inc = 1;
                    foreach ($tab_data as $key => $tab_item) {
                        $item_id = str_replace('_', '', strtolower($key));
                        $active_ = $inc == 1 ? 'show active' : '';
                ?>
                        <div class="tab-pane fade <?php echo esc_attr($active_) ?>" id="portfolioTab_<?php echo esc_attr($item_id) ?>">
                            <div class="row g-4">
                                <?php
                                if (!empty($tab_item)) {
                                    foreach ($tab_item as $key => $list) {
                                        $show = $key == 0 ? 'show' : '';
                                ?>
                                        <div class="col-md-6 col-lg-4">
                                            <?php
                                            if (!empty($list['tab_image']['id'])) { ?>
                                                <a href="#" class="d-block text-decoration-none">
                                                    <?php echo wp_get_attachment_image($list['tab_image']['id'], 'full', '', ["class" => "img-fluid w-100", "alt" => "image"]); ?>
                                                </a>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                <?php
                                    }
                                }
                                ?>

                            </div>
                        </div>
                <?php
                        $inc++;
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>