<div class="h5-feature-tab">
    <ul class="nav nav-tabs h5-tab-controls">
        <?php
            $i = 0;
            foreach( $s2_hostim_tabs as $tab ){
                $active = $i == 0 ? 'active' : '';
                echo '<li><a href="#tab_id_'. $tab['_id'] .'" class="tab_btn '.esc_attr( $active ).'" data-bs-toggle="tab">'. esc_html( $tab['s2_tab_title'] ) .'</a></li>';
                $i++;
            }
            ?>
    </ul>

    <div class="tab-content mt-30">

        <?php
            $ti = 0;
            foreach( $s2_hostim_tabs as $tab ){
                $active = $ti == 0 ? 'show active' : ''; ?>
            
                <div class="tab-pane fade<?php echo esc_attr( $active ) ?>" id="tab_id_<?php echo esc_attr( $tab['_id'] ) ?>">
                    <p class="mb-4"><?php echo wp_kses_post( $tab['s2_description'] ) ?></p>
                    <?php
                    if( !empty( $tab['feature_list'] ) ){
                        echo '<ul class="h5-feature-list mb-5">';
                        $feature_list = preg_split( '/\r\n|[\r\n]/', $tab['feature_list'] );
                        foreach( $feature_list as $item ){ ?>
                            <li class="d-flex align-items-center">
                                <span class="icon-wrapper d-inline-flex align-items-center justify-content-center flex-shrink-0"><i class="fa-solid fa-check"></i></span>
                                <p class="mb-0 ms-3"><?php echo esc_html( $item )?></p>
                            </li>                            
                            <?php
                        } 
                        echo '</ul>';
                    }
                    
                    if( !empty( $tab['btn_label'] ) ){
                        echo '<a href="'. esc_url( $tab['btn_url'] ) .'" class="template-btn primary-btn btn-small">'. esc_html( $tab['btn_label'] ) .'</a>';
                    }
                    ?>
                </div>

                <?php
                $ti++;
            }
            ?>
        
    </div>
</div>