<?php

if (is_array($tabs_3)) { ?>
    <div class="hds-tab hm2-service-tab">
        <ul class="nav nav-tabs d-flex gap-5 hds-border-bottom hds-border-color-two">
            <?php
            $i = 0;
            foreach ($tabs_3 as $value) {
                $active = $i == 0 ? 'active' : '' ?>
                <li>
                    <button class="d-flex align-items-center gap-3 <?php echo esc_attr($active); ?>" data-bs-toggle="tab" data-bs-target="#<?php echo esc_attr($value['_id']); ?>" type="button">
                        <?php
                        if ($value['aut_img']['id']) {
                            echo wp_get_attachment_image($value['aut_img']['id'], 'thumbnail', '', ['class' => 'hds-author-image', 'alt' => '']);
                        }
                        ?>
                        <span class="hds-author-info d-flex flex-column">
                            <?php
                            if ($value['aut_name']) {
                                echo '<span class="fs-20 fw-bold">' . esc_html($value['aut_name']) . '</span>';
                            }
                            if ($value['aut_designation']) {
                                echo '<span class="hds-body-color-five ff-inter fw-500 fs-12 mb-0">' . esc_html($value['aut_designation']) . '</span>';
                            }
                            ?>
                        </span>
                    </button>
                </li>
            <?php
                $i++;
            }
            ?>
        </ul>
        <div class="tab-content mt-4">
            <?php
            $ti = 0;
            foreach ($tabs_3 as $value) {
                $active = $ti == 0 ? 'show active' : '' ?>
                <div class="tab-pane fade <?php echo esc_attr($active) ?>" id="<?php echo esc_attr($value['_id']); ?>">
                    <div class="bg-white hds-feedbck-tab-content pt-60 pb-50 pl-50 pr-50 rounded-16">
                        <div class="row align-items-center">
                            <div class="col-lg-5">
                                <div class="position-relative">
                                    <div class="hds-author-review d-flex align-items-center gap-7">
                                        <?php
                                        if ($value['aut_img_2']['id']) {
                                            echo wp_get_attachment_image($value['aut_img_2']['id'], 'thumbnail', '', ['class' => 'hds-review-image', 'alt' => '']);
                                        }
                                        ?>
                                        <div class="hds-review-reating">
                                            <?php
                                            if ($value['rating_img']['id']) {
                                                echo wp_get_attachment_image($value['rating_img']['id'], 'thumbnail', '', ['class' => 'star-rating d-block', 'alt' => '']);
                                            }
                                            ?>
                                            <p class="hds-body-color-nine ff-inter fw-500 fs-14 mb-0 mt-10">
                                                <?php echo esc_html($value['ratting_text']);?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="hds-review-counter d-flex align-items-center gap-15 mt-30">
                                        <div class="hds-singe-counter">
                                            <?php
                                            if(!empty($value['saving_percent'])) {
                                                echo '<h4 class="hds-body-color-two fs-36"><span class="counter"> '.esc_html($value['saving_percent']).' </span> '.esc_html($value['saving_percent_icon']).' </h4>';
                                            }
                                            if(!empty($value['saving_title'])) {
                                                echo '<p class="hds-body-color-three ff-inter fw-500 fs-16 mb-0"> '. esc_html($value['saving_title']) .' </p>';
                                            }
                                            ?>
                                        </div>
                                        <div class="hds-singe-counter">
                                            <?php
                                            if(!empty($value['using_gb'])){
                                                echo '<h4 class="hds-body-color-two fs-36"><span class="counter"> '.esc_html($value['using_gb']).' </span> '.esc_html($value['using_gb_icon']).' </h4>';
                                            }
                                            if(!empty($value['hosting_use_title'])) {
                                                echo '<p class="hds-body-color-three ff-inter fw-500 fs-16 mb-0"> '.esc_html($value['hosting_use_title']).' </p>';
                                            }
                                            ?>                                            
                                        </div>
                                    </div>
                                    <?php
                                    if(!empty($value['content_img']['id'])){
                                        echo wp_get_attachment_image( $value['content_img']['id'], 'thumbnail', '', ['class'=> 'hds-feedback-shape-two position-absolute', 'alt' => 'img'] );
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="hds-review-content pl-50 pr-25 position-relative">
                                    <?php
                                    if(!empty($value['tab_3_title'])){
                                        echo '<h4 class="hds-body-color-two fs-20"> '.esc_html($value['tab_3_title']).' </h4>';
                                    }
                                    if(!empty($value['tab_3_content'])){
                                        echo '<p class="hds-body-color-three ff-inter fs-16 fw-500 lh-24 mt-30 mb-0"> '.esc_html($value['tab_3_content']).' </p>';
                                    }
                                    if(!empty($value['content_img_2']['id'])){
                                        echo wp_get_attachment_image( $value['content_img_2']['id'], 'full', '', ['class' => 'one position-absolute', 'alt' => 'img'] );
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                $ti++;
            }
            ?>
        </div>
    </div>
<?php
}