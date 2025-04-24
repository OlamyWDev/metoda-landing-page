<div class="managed-plan table-responsive rounded pricing_sec">
    <table class="table w-100">
        <tr>
            <th>Processor</th>
            <th>Memory</th>
            <th>Storage</th>
            <th>Bandwidth</th>
            <th>Pricing</th>
        </tr>
        <?php 
        if( is_array( $serverpricing ) ){
            foreach ( $serverpricing as $key => $value) { ?>
                <tr>
                    <td class="item-name">
                        <?php 
                        if( !empty( $value['processor_name'] ) ){
                            echo '<strong>'. esc_html( $value['processor_name'] ) .'</strong>';
                        }
                        if( !empty( $value['processor_ghz'] ) ){
                            echo '<span>'. esc_html( $value['processor_ghz'] ) .'</span>';
                        }
                        ?>
                    </td>

                    <?php 
                    if( !empty( $value['memory'] ) ){
                        echo '<td>'. esc_html( $value['memory'] ) .'</td>';
                    }
                    if( !empty( $value['storage'] ) ){
                        echo '<td>'. esc_html( $value['storage'] ) .'</td>';
                    }
                    if( !empty( $value['bandwidth'] ) ){
                        echo '<td>'. esc_html( $value['bandwidth'] ) .'</td>';
                    } ?>
                    
                    <td class="price-amount">
                        <?php 
                        if( !empty( $value['pricing'] ) ){
                            echo '<span>'. esc_html( $value['s7_currency'] ) . esc_html( $value['pricing'] ) .'<span class="sub-text">'. esc_html( $value['s7_period'] ) .'</span></span>';
                        }
                        if( $value['s7_purchase_btn_url']['url'] ){
                            $this->add_link_attributes('purchase_btn'.$key, $value['s7_purchase_btn_url']);
                            $this->add_render_attribute('purchase_btn'.$key, 'class', 'template-btn pricing_btn__ secondary-btn' ) ?>

                            <a <?php $this->print_render_attribute_string('purchase_btn'.$key) ?> >
                                <?php echo esc_html( $value['s7_purchase_btn_label'] ) ?>
                            </a>
                            <?php
                        } ?>
                    </td>
                </tr>
                <?php
            }
        }
        ?>
        
        
    </table>
</div>