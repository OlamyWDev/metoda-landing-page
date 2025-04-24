<?php 
$popular_class = $is_popular == 'yes' ? 'popular mt-30 mt-md-0' : ''; ?>
<div class="bf-pricing-column text-center position-relative <?php echo esc_attr( $popular_class )?>">
    <?php 
    if( $is_popular == 'yes' ){
        echo '<span class="popular-badge">Most Popular</span>';
    }

    if( !empty( $plan_title ) ){
        echo '<h5 class="mb-2 pricing_title">'. esc_html( $plan_title ) .'</h5>';
    } 


    ?>
    <div class="pricing-meta mb-30">
        <?php 
        if( !empty( $plan_price && $sale_price ) ){
            echo '<del class="fw-semibold">From '. esc_html( $currency ) . esc_html( $plan_price ) .'</del>';
        }
        if( !empty( $plan_price && $sale_price ) ){
            $percentage = round(100 - ( $sale_price  / $plan_price * 100)) . '%';
            echo '<span class="bf-pricing-btn-meta ms-3 py-1 px-3 fw-bold rounded-pill">Save '. esc_html(hostim_get_percentage($plan_price, $sale_price, (int) $after_dot_number ) ) .'</span>';
        } ?>
        
    </div>
    <div class="bf-pricing-amount d-flex justify-content-center">
        <?php 
        if( !empty( $currency ) ){
            echo '<span class="currency-sign">'. esc_html( $currency ) .'</span>';
        }
        
        if( !empty( $sale_price ) ){
            $dolar_cent_ = is_float( $sale_price ) ? explode('.', $sale_price) : '';
            $dolar_cent  = is_array( $dolar_cent_ ) && count( $dolar_cent_ ) > 1 ?  '<sup>'.$dolar_cent_[1].'</sup>' : '';
            $period		 = !empty( $period ) ? '<sub>'.$period .'</sub>' : '';
            $price_dollar= number_format( $sale_price );
            echo '<span class="price-title">'. esc_html( $price_dollar ) . hostim_kses_post( $dolar_cent ) . hostim_kses_post( $period ) .'</span>';
        }

        
        ?>    
    </div>
    <?php
    if( !empty( $purchase_btn_label ) ){
        $btn_class = $is_popular == 'yes' ? 'primary-btn' : 'secondary-btn';
        echo '<a href="'. esc_url( $purchase_btn_url['url'] ) .'" class="single_pricing_btn template-btn mt-4 '. esc_attr( $btn_class ) .' text-center mt-3 mb-30">'. esc_html( $purchase_btn_label ) .'</a>';
    }
    if( is_array( $table_features ) ){
        echo '<ul class="pricing-list mt-4">';
        foreach( $table_features as $feature ){
            echo '<li>';
            if( !empty( $feature['selected_icon'] ) ){
                \Elementor\Icons_Manager::render_icon( $feature['selected_icon'], [ 'aria-hidden' => 'true' ] );
            }
            echo esc_html( $feature['feature_title'] ) .'</li>';
        }
        echo '</ul>';
    }
    ?>
</div>
