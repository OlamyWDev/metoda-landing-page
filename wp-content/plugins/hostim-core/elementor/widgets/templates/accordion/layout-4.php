<div class="accordion hm2-accordion host-fs-faq p-4 rounded-3" id="<?php echo esc_attr($faq_o) ?>">
    <?php
    if (is_array($hostim_accordion) && count($hostim_accordion) > 0) {
        foreach ($hostim_accordion as $key => $accordion) {
            $show = $key == 0 ? "show" : "";
            $collapsed = $key == 0 ? "collapse" : "collapsed"; ?>
            <div class="accordion-item">
                <div class="accordion-header">
                    <a href="#<?php echo esc_attr($faq_o . $key) ?>" class="<?php echo esc_attr($collapsed) ?>" data-bs-toggle="collapse"><?php echo esc_html($accordion['accordion_title']) ?></a>
                </div>
                <div class="accordion-collapse collapse <?php echo esc_attr($show) ?>" id="<?php echo esc_attr($faq_o . $key) ?>" data-bs-parent="#<?php echo esc_attr($faq_o) ?>">
                    <div class="accordion-body">
                        <?php
                        if (!empty($accordion['accordion_content'])) {
                            echo '<p class="mb-0">' . esc_html($accordion['accordion_content']) . '</p>';
                        }
                        ?>

                    </div>
                </div>
            </div>
    <?php
        }
    }
    ?>
</div>