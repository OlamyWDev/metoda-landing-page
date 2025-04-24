<?php
if( is_array( $hostim_tabs ) ){ ?>
    <div class="hm2-service-tab">
        <ul class="nav nav-tabs">
            <?php
            $i = 0;
            foreach( $hostim_tabs as $tab ){
                $active = $i == 0 ? 'active' : '';
                echo '<li><button class="tab_btn '.esc_attr( $active ).'" data-bs-toggle="tab" data-bs-target="#tab_id_'. $tab['_id'] .'" type="button">';
                    if ( ! empty( $tab['selected_icon'] ) ) {
                        \Elementor\Icons_Manager::render_icon( $tab['selected_icon'], [ 'aria-hidden' => 'true' ] );
                    }
                echo esc_html( $tab['tab_title'] ) .'</button></li>';
                $i++;
            }
            ?>
        </ul>
        <div class="tab-content mt-4">
            <?php
            $ti = 0;
            foreach( $hostim_tabs as $tab ){
                $active = $ti == 0 ? 'show active' : '';
                echo '<div class="tab-pane fade '.esc_attr( $active ).'" id="tab_id_'. $tab['_id'] .'"><p>'. wp_kses_post( $tab['description'] ) .'</p></div>';
                $ti++;
            }
            ?>
        </div>
    </div>
    <?php
}