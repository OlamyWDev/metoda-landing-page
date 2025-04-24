<div class="gh-game-server elementor-element" data-element_type="widget" data-widget_type="hostim_gaming_isotope">
    <div class="gh-filter-top mb-40 d-flex align-items-center justify-content-center justify-content-lg-between flex-wrap">
        <div class="gh-filter-controls button-group filter-button-group text-center text-lg-start">
            <?php
            $cats       = array_column( $games4, 'tab_title');
            $cat_title_and_count = array_count_values($cats);
            $getCats    = array_unique( $cats );
            $tab_data   = return_tab_data( $getCats , $games4, 'tab_title' );
            ?>
            <button data-filter="*" class="active">
                <?php esc_html_e('Latest Games', 'hostim-core'); ?><sup><?php echo esc_html( count($cats) ) ?></sup>
            </button>
            <?php
            if ( is_array( $cat_title_and_count ) && count( $cat_title_and_count ) > 0 ){
                $i      = 1;
                foreach ( $cat_title_and_count as $cat => $catCount ) {
                    $catForFilter = sanitize_title_with_dashes( $cat );
                    $catForFilter = str_replace( '-', '', $catForFilter );
                    ?>
                    <button data-filter=".<?php echo esc_attr($catForFilter) ?>">
                        <?php echo esc_html( $cat ) ?><sup><?php echo esc_html( $catCount ) ?></sup>
                    </button>
                    <?php
                    $i++;
                }
            }
            ?>
        </div>
    </div>

    <div class="row g-3 gh-filter-items">
        <?php
        $cats       = array_column( $games4, 'tab_title');
        $cat_title_and_count = array_count_values($cats);
        $getCats    = array_unique( $cats );
        $tab_data   = return_tab_data( $getCats , $games4, 'tab_title' );

        if ( is_array( $games4 ) ) {
            $i      = 1;
            foreach ( $tab_data as $key => $games ) {
                
                $catForFilter = sanitize_title_with_dashes( $key );
                $catForFilter = str_replace( '-', '', $catForFilter );
                foreach ( $games as $game ) {
                    ?>
                    <div class="col-xl-3 col-lg-4 col-md-6 <?php echo esc_attr($catForFilter) ?>">
                        <div class="gh-single-game position-relative overflow-hidden rounded-2">
                            <?php echo wp_get_attachment_image( $game['feature_img']['id'], 'full', '', array( 'class' => 'img-fluid rounded-2' ) );
                            if( !empty( $game['supported_platform'] ) ){
                                echo '<div class="supported-operators position-absolute">';
                                foreach(explode(',', $game['supported_platform']) as $icon ){
                                    echo '<a href="#"><i class="fa-brands '. esc_attr( $icon ) .'"></i></a>';
                                }
                                echo '</div>';
                            }
                            ?>                            
                            <div class="gh-single-game-content text-center position-absolute">
                                <?php
                                if ( !empty($game['title']) ) {
                                    echo '<h6 class="text-white mb-0">'.esc_html($game['title']).'</h6>';
                                }
                                if ( !empty($game['subtitle']) ) {
                                    echo '<span class="text-white d-block">'.esc_html($game['subtitle']).'</span>';
                                }
                                if ( !empty($game['btn_label']) ) {
                                    echo '<a href="'. esc_url( $game['btn_url']['url'] ) .'" class="template-btn gh-primary-btn mt-3 btn-small">'. esc_html( $game['btn_label'] ) .'</a>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                $i++;
            }
        }
        ?>
    </div>
</div>