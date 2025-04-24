<section class="gm-hero pb-100 position-relative zindex-1 overflow-hidden hostim-hero">
    <?php
	if( is_array( $settings['shape_images'] ) ){
		$i = 1;
		foreach ( $settings['shape_images'] as $image ) {
			echo '<img src="'. esc_url( $image['shape_img']['url'] ) .'" alt="'. esc_attr__( 'Shape image' ) .'" class="position-absolute shape_'.$i++.' elementor-repeater-item-'. esc_attr(  $image['_id'] ) .'">';
		}
	}
	?>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 order-2 order-lg-1">
                <div class="gm-hero-left mt-4 mt-lg-0">
                    <?php 
					if( !empty( $title ) ){
						echo '<' . $heading_tag . ' class="display-font hero_title">'. hostim_kses_post( nl2br( $title ) ) . '</' . $heading_tag . '>';
					}
					if( !empty( $description ) ){
						echo '<p class="mt-3 lead mb-50">'. hostim_kses_post( nl2br( $description ) ) .'</p>';
					} 
                    
                    if( !empty( $btn_text ) ){ ?>
                        <a href="<?php echo esc_url( $btn_link['url'] ) ?>" class="template-btn gm-primary-btn"><?php echo esc_html( $btn_text ) ?>
                            <span>
                                <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 1L1 9" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M2.33594 1H9.0026V7.66667" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </span>
                        </a>
                        <?php
                    }
                    ?>
                    
                    
                </div>
            </div>
            <div class="col-lg-7 order-1 order-lg-2">
                <div class="hero-right position-relative">
                    <?php 
                    if( !empty( $uc_title || $uc_subtitle ) ){ ?>
                        <div class="gm-header-users-info d-none d-sm-flex align-items-center position-absolute">
                            <span class="icon-wrapper rounded-circle d-inline-flex align-items-center justify-content-center">
                                <?php 
                                if( !empty( $icon_image['id'] ) ){
                                    echo wp_get_attachment_image( $icon_image['id'], 'full' );
                                }
                                ?>
                            </span> 
                            <div class="users-right ms-3">
                                <?php 
                                if( !empty( $uc_title ) ){
                                    echo '<h3 class="mb-0"><span class="counter">'. esc_html( $uc_title ) .'</span><span>'. esc_html( $uc_title_sufix ) .'</span></h3>';
                                }
                                if( !empty( $uc_subtitle ) ){
                                    echo '<span class="subtitle">'. esc_html( $uc_subtitle ) .'</span>';
                                }
                                ?>
                            </div>
                        </div>
                        <?php
                    }
                    
                    if( !empty( $feature_image['id'] ) ){
                        echo wp_get_attachment_image( $feature_image['id'], 'full', '', array('class' => 'img-fluid') );
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>