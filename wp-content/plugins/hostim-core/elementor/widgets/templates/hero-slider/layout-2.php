<section class="hm7-hero-section position-relative zindex-1 overflow-hidden">
    <div class="overflow-hidden hm7-hero-slider">
        <div class="swiper-wrapper">
	        <?php
	        if( is_array( $slides2 ) ){
		        foreach( $slides2 as $item ){ 
                    $gradient_bg = $item['show_shadow_bg'] != 'yes' ? 'gradient_off' : ''; ?>
                    <div class="slider-hero-single position-relative zindex-1 swiper-slide elementor-repeater-item-<?php echo esc_attr($item['_id']) .' '. esc_attr($gradient_bg) ?>" data-background="<?php echo esc_url($item['slider_bg_img']['url']) ?>">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-5">
                                    <div class="hm7-hero-content">
	                                    <?php
	                                    if( !empty( $item['upper_title'] ) ) { ?>
                                            <h4 class="hm7-hero-subtitle mb-3 fw-semibold __upper_title slide_subtitle">
	                                            <?php echo esc_html($item['upper_title']) ?>
                                                <span class="ms-2">
                                                <svg width="110" height="12" viewBox="0 0 110 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M0 6L101.5 6" stroke="#FF0766" stroke-width="2"/>
                                                    <path d="M109.5 6L100.5 11.1962L100.5 0.803847L109.5 6Z" fill="#FF0766"/>
                                                </svg>
                                            </span>
                                            </h4>
		                                    <?php
	                                    }
	                                    if ( !empty( $item['title'] ) ){
		                                    echo '<' . $item['heading_tag2'] . ' class="display-4 fw-bold mb-4 __title slide_title">'. hostim_kses_post( $item['title'] ) . '</' . $item['heading_tag2'] . '>';
	                                    }
	                                    if( !empty( $item['subtitle'] ) ){
		                                    echo '<p class="mb-5 text-white __subtitle">'. hostim_kses_post( $item['subtitle'] ) .'</p>';
	                                    }
	                                    ?>
                                        <div class="hm7-hero-btns d-flex align-items-center flex-wrap">
	                                        <?php
	                                        if( !empty( $item['btn_label'] ) ) { ?>
                                                <a <?php Hostimg_Core_Helper()->the_button($item['btn_url']) ?> class="template-btn primary-btn">
			                                        <?php echo esc_html( $item['btn_label'] ) ?>
                                                </a>
		                                        <?php
	                                        }
	                                        if( !empty( $item['btn_label2'] ) ) { ?>
                                                <a <?php Hostimg_Core_Helper()->the_button($item['btn_url2']) ?> class="template-btn outline-btn">
			                                        <?php echo esc_html( $item['btn_label2'] ) ?>
                                                </a>
		                                        <?php
	                                        }
	                                        ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
			        <?php
		        }
	        }
	        ?>
        </div>
        <div class="hm7-hero-slider-next hm7-hero-slide-control"><i class="fas fa-arrow-right"></i></div>
        <div class="hm7-hero-slider-prev hm7-hero-slide-control"><i class="fas fa-arrow-left"></i></div>
    </div>

    <div class="hero-social-2 at-header-social d-none d-sm-flex align-items-center position-absolute">
	    <?php
	    if ( !empty($social_icon_title) ) { ?>
            <span class="title"><?php echo esc_html($social_icon_title) ?></span>
		    <?php
	    }
	    if ( !empty($social_icons) ) { ?>
            <ul class="social-list ms-3">
			    <?php
			    foreach ( $social_icons as $item ) {
				    ?>
                    <li>
                        <a href="<?php echo esc_url($item['icon_url']['url']) ?>">
						    <?php \Elementor\Icons_Manager::render_icon( $item['icon'] ); ?>
                        </a>
                    </li>
				    <?php
			    }
			    ?>
            </ul>
		    <?php
	    }
	    ?>
    </div>
</section>
<!--hero section end-->
