<div class="sh-cp-left position-relative zindex-1 mb-5 mb-lg-0">
    <div class="accordion cp-accordion" id="cp_accordion">
        <?php 
        foreach ( $hostim_accordion as $index => $item ) { 
            $show = $index == 1 ? 'show' : '';
            ?>
            <div class="accordion-single">
                <div class="accordion-header">
                    <a href="#<?php echo $faq_o . '-' . $index; ?>" data-bs-toggle="collapse">
                        <h6><?php echo esc_html( $item['accordion_title'] ); ?></h6>
                    </a>
                </div>
                <div class="accordion-collapse collapse <?php echo esc_attr( $show ) ?>" id="<?php echo $faq_o . '-' . $index; ?>" data-bs-parent="#cp_accordion">
                    <div class="accordion-body">
                        <?php echo hostim_kses_post( wpautop( $item['accordion_content'] ) ) ?>
                        <?php 
                        if( !empty( $itemp['btn_label'] ) ){
                            echo '<a href="'. esc_url( $item['btn_url'] ) .'"><i class="fa-solid fa-circle-arrow-right"></i>'. esc_html( $item['btn_label'] ) .'</a>';
                        }
                        ?>
                    </div>
                </div>
            </div>
            <?php 
        } ?>
    </div>
</div>