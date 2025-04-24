<?php
$icon_alignment = $icon_align == 'left' ? 'left' : 'right';
?>
<div class="accordion dm-accordion icon-align-<?php echo esc_attr($icon_align) ?>" id="dm_accordion">
    <?php foreach ($hostim_accordion as $index => $item) {
        $show = $index == 0 ? 'show' : '';
    ?>
        <div class="accordion-item">
            <div class="accordion-header">
                <a href="#<?php echo $faq_o . '-' . $index; ?>" data-bs-toggle="collapse"><?php echo esc_html($item['accordion_title']); ?></a>
            </div>
            <div class="accordion-collapse collapse <?php echo esc_attr($show) ?>" id="<?php echo $faq_o . '-' . $index; ?>" data-bs-parent="#dm_accordion">
                <div class="accordion-body">
                    <?php echo wpautop(hostim_kses_post($item['accordion_content'])) ?>
                    <?php
                    if (!empty($item['btn_label'])) {
                        echo '<a href="' . esc_url($item['btn_url']) . '" class="read-more-btn mt-3">' . esc_html($item['btn_label']) . '<i class="fa fa-arrow-right-long"></i></a>';
                    }
                    ?>
                </div>
            </div>
        </div>

    <?php
    } ?>
</div>