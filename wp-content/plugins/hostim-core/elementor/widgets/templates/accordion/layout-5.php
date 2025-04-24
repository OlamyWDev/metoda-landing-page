<div class="row align-items-center g-4">
    <div class="col-xl-12">
        <div class="accordion hm2-accordion faq_24 border border-2 border-white rounded-2" id="accordion_1">
            <?php
            foreach ($hostim_accordion as $index => $value) {
                $show = $index == 0 ? 'show' : '';
                $expanded = $index == 0 ? 'true' : 'false';
            ?>
                <div class="accordion-item bg-transparent">
                    <div class="accordion-header">
                        <a href="#<?php echo $faq_o . '-' . $index; ?>" data-bs-toggle="collapse" aria-expanded="<?php echo $expanded; ?>"><?php echo esc_html($value['accordion_title']); ?></a>
                    </div>
                    <div class="accordion-collapse collapse <?php echo esc_attr($show) ?>" id="<?php echo $faq_o . '-' . $index; ?>" data-bs-parent="#accordion_1">
                        <div class="accordion-body">
                            <p class="ff-sg mb-0"><?php echo wpautop(hostim_kses_post($value['accordion_content'])) ?></p>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>