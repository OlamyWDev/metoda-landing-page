<div class="gm-game-item position-relative overflow-hidden rounded-2">
    <span class="overlay-bg position-absolute"></span>
    <?php 
    if( !empty( $games_feature_img['id'] ) ){
        echo wp_get_attachment_image( $games_feature_img['id'], 'full', '', array( 'class' => 'img-fluid' ) );
    }
    ?>
    <div class="game-wrapper-content text-center">
        <?php 
        if( !empty( $games_logo['id'] ) ){
            echo wp_get_attachment_image( $games_logo['id'], 'full', '', array( 'class' => 'img-fluid' ) );
        }

        if( !empty( $game_desc ) ){
            echo '<p class="mt-3">'. esc_html( $game_desc ) .'</p>';
        }

        if( is_array( $button_list ) ){
            echo '<div class="btns-wrapper">';
            foreach( $button_list as $button ){
                echo '<a href="'. esc_url( $button['btn_url'] ) .'">'. esc_html( $button['btn_label'] ) .'</a>';
            }
            echo '</div>';
        }
        ?>
    </div>
</div>