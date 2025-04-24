<section class="gh-hero-section overflow-hidden gh-section-overlay hostim-hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 align-self-center order-2 order-lg-1">
                <div class="gh-hero-left">
                    <?php
                    if( !empty( $title ) ){
                        echo '<' . $heading_tag . ' class="display-3 fw-bold gh-heading mb-4 title hero_title">'. hostim_kses_post( nl2br( $title ) ) . '</' . $heading_tag . '>';
                    }
                    ?>
                    <ul class="gh-hero-list gh-heading">
                        <?php
                        if ( !empty($list_items)) {
                            foreach ($list_items as $item ) {
                                ?>
                                <li>
                                    <span class="me-3"><i class="fa-solid fa-check"></i></span>
                                    <?php echo esc_html($item['text']) ?>
                                </li>
                                <?php
                            }
                        }
                        ?>
                    </ul>
                    <?php
                    if( !empty( $btn_text || $btn_2_text ) ){ ?>
                        <div class="gh-hero-btns d-flex align-items-center flex-wrap mt-5">
                            <?php
                            if( !empty( $btn_text ) ){
                                echo '<a href="'. esc_url( $btn_link['url'] ) .'" class="template-btn gh-primary-btn banner-btn">'. esc_html( $btn_text ) .'</a>';
                            }
                            if( !empty( $btn_2_text ) ){
                                echo '<a href="'. esc_url( $btn_2_link['url'] ) .'" class="template-btn gh-outline-btn">'. esc_html( $btn_2_text ) .'</a>';
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2">
                <div class="gh-hero-right position-relative mb-60 mb-lg-0">
                    <?php echo wp_get_attachment_image($feature_image['id'], 'full', '', array( 'class' => 'img-fluid' )) ?>
                    <div class="gh-hero-box">
                        <?php
                        if ( !empty($icon_img['id']) ) {
                            echo wp_get_attachment_image($icon_img['id'], 'full', '', array( 'class' => 'img-fluid' ));
                        }
                        if ( !empty($box_contents) ) {
                            echo hostim_kses_post(wpautop($box_contents));
                        }
                        ?>
                        <div class="gh-hero-box-border"></div>
                    </div>
                    <span class="gh-hero-box-circle"></span>
                </div>
            </div>
        </div>
    </div>
</section>