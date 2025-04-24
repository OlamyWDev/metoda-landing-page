<div class="home4-about-accordion accordion" id="h4_about_accordion">
    <?php
    foreach ( $hostim_accordion as $index => $item ) {
        $show = $index == 0 ? 'show' : ''; ?>
        <div class="accordion-item border-0 bg-transparent">
            <div class="accordion-header">
                <a href="#<?php echo $faq_o . '-' . $index; ?>" data-bs-toggle="collapse" class="h6 __icon"><?php echo esc_html( $item['accordion_title'] ); ?></a>
            </div>
            <div class="accordion-collapse collapse <?php echo esc_attr( $show ) ?>" id="<?php echo $faq_o . '-' . $index; ?>" data-bs-parent="#h4_about_accordion">
                <div class="accordion-body">
                    <?php echo wpautop( hostim_kses_post( $item['accordion_content'] ) )?>
                </div>
            </div>
        </div>
        <?php
    } ?>
</div>
