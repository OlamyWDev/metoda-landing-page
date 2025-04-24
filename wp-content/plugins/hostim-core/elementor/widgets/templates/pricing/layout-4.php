    <section class="vps-plan ptb-120 pricing_sec">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="section-title text-center">
                        <?php
                        if( !empty( $pricing_heading ) ){
                            echo '<h2 class="mb-20 pricing_heading">'. esc_html( $pricing_heading ) .'</h2>';
                        }
                        if( !empty( $pricing_subtitle ) ){
                            echo '<p>'. esc_html( $pricing_subtitle ) .'</p>';
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="vps-pricing-table mt-5">
                <table class="w-100 bg-white">
                    <?php
                    if( is_array( $p4_tables ) ){
                        foreach( $p4_tables as $p4_table ){
                            if( $p4_table['table_content'] == 'header' ){ ?>
                                <thead>
                                    <tr>
                                        <?php
                                        if( !empty( $p4_table['features_title'] ) ){
                                            echo '<th class="h5">'. esc_html( $p4_table['features_title'] ) .'</th>';
                                        }

                                        if( !empty( $p4_table['package_title_1'] ) ){ ?>
                                            <th>
                                                <span class="h6"><?php echo esc_html( $p4_table['package_title_1'] )?></span>
                                                <span><?php echo esc_html( $p4_table['package_currency'] . $p4_table['package_monthly_price'] . $p4_table['package_period'] ) ?></span>
                                            </th>
                                            <?php
                                        }

                                        if( !empty( $p4_table['package_2_title'] ) ){ ?>
                                            <th>
                                                <span class="h6"><?php echo esc_html( $p4_table['package_2_title'] )?></span>
                                                <span><?php echo esc_html( $p4_table['package_2_currency'] . $p4_table['package_2_monthly_price'] . $p4_table['package_2_period'] ) ?></span>
                                            </th>
                                            <?php
                                        }

                                        if( !empty( $p4_table['package_3_title'] ) ){ ?>
                                            <th>
                                                <span class="h6"><?php echo esc_html( $p4_table['package_3_title'] )?></span>
                                                <span><?php echo esc_html( $p4_table['package_3_currency'] . $p4_table['package_3_monthly_price'] . $p4_table['package_3_period'] ) ?></span>
                                            </th>
                                            <?php
                                        }

                                        if( !empty( $p4_table['package_4_title'] ) ){ ?>
                                            <th>
                                                <span class="h6"><?php echo esc_html( $p4_table['package_4_title'] )?></span>
                                                <span><?php echo esc_html( $p4_table['package_4_currency'] . $p4_table['package_4_monthly_price'] . $p4_table['package_4_period'] ) ?></span>
                                            </th>
                                            <?php
                                        }

                                        if( !empty( $p4_table['package_5_title'] ) ){ ?>
                                            <th>
                                                <span class="h6"><?php echo esc_html( $p4_table['package_5_title'] )?></span>
                                                <span><?php echo esc_html( $p4_table['package_5_currency'] . $p4_table['package_5_monthly_price'] . $p4_table['package_5_period'] ) ?></span>
                                            </th>
                                            <?php
                                        }

                                        ?>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                            }
                            if( $p4_table['table_content'] == 'features' ){ ?>
                                <tr>
                                    <?php
                                    if( !empty( $p4_table['features_title'] ) ){
                                        echo '<td>'. esc_html( $p4_table['features_title'] ) .'</td>';
                                    }

                                    if( $p4_table['features_type'] == 'text' &&  !empty( $p4_table['feature_title'] ) ){
                                        echo '<td>'. esc_html( $p4_table['feature_title'] ) .'</td>';
                                    }
                                    elseif( $p4_table['features_type'] == 'icon' && !empty( $p4_table['selected_icon']['value'] ) ){
                                        
                                        echo '<td>';
                                        \Elementor\Icons_Manager::render_icon( $p4_table['selected_icon'], [ 'aria-hidden' => 'true' ] );
                                        echo '</td>';
                                    }

                                    if( $p4_table['p2_features_type'] == 'text' &&  !empty( $p4_table['p2_feature_title'] ) ){
                                        echo '<td>'. esc_html( $p4_table['p2_feature_title'] ) .'</td>';
                                    }
                                    elseif( $p4_table['p2_features_type'] == 'icon' && !empty( $p4_table['p2_selected_icon']['value'] ) ){
                                        echo '<td>';
                                        \Elementor\Icons_Manager::render_icon( $p4_table['p2_selected_icon'], [ 'aria-hidden' => 'true' ] );
                                        echo '</td>';
                                    }

                                    if( $p4_table['p3_features_type'] == 'text' &&  !empty( $p4_table['p3_feature_title'] ) ){
                                        echo '<td>'. esc_html( $p4_table['p3_feature_title'] ) .'</td>';
                                    }
                                    elseif( $p4_table['p3_features_type'] == 'icon' && !empty( $p4_table['p3_selected_icon']['value'] ) ){
                                        echo '<td>';
                                        \Elementor\Icons_Manager::render_icon( $p4_table['p3_selected_icon'], [ 'aria-hidden' => 'true' ] );
                                        echo '</td>';
                                    }

                                    if( $p4_table['p4_features_type'] == 'text' &&  !empty( $p4_table['p4_feature_title'] ) ){
                                        echo '<td>'. esc_html( $p4_table['p4_feature_title'] ) .'</td>';
                                    }
                                    elseif( $p4_table['p4_features_type'] == 'icon' && !empty( $p4_table['p4_selected_icon']['value'] ) ){
                                        echo '<td>';
                                        \Elementor\Icons_Manager::render_icon( $p4_table['p4_selected_icon'], [ 'aria-hidden' => 'true' ] );
                                        echo '</td>';
                                    }

                                    if( $p4_table['p5_features_type'] == 'text' &&  !empty( $p4_table['p5_feature_title'] ) ){
                                        echo '<td>'. esc_html( $p4_table['p5_feature_title'] ) .'</td>';
                                    }
                                    elseif( $p4_table['p5_features_type'] == 'icon' && !empty( $p4_table['p5_selected_icon']['value'] ) ){
                                        echo '<td>';
                                        \Elementor\Icons_Manager::render_icon( $p4_table['p5_selected_icon'], [ 'aria-hidden' => 'true' ] );
                                        echo '</td>';
                                    }
                                    ?>

                                </tr>
                                <?php
                            }
                            if( $p4_table['table_content'] == 'footer' ){
                                echo '<tr><td></td>';
                                if( !empty( $p4_table['btn_label_1'] ) ){
                                    echo '<td><a href="'. esc_url( $p4_table['btn_url_1']['url'] ) .'" class="pricing_btn__">'. esc_html( $p4_table['btn_label_1'] ) .'</a></td>';
                                }
                                if( !empty( $p4_table['btn_label_2'] ) ){
                                    echo '<td><a href="'. esc_url( $p4_table['btn_url_2']['url'] ) .'" class="pricing_btn__">'. esc_html( $p4_table['btn_label_2'] ) .'</a></td>';
                                }
                                if( !empty( $p4_table['btn_label_3'] ) ){
                                    echo '<td><a href="'. esc_url( $p4_table['btn_url_3']['url'] ) .'" class="pricing_btn__">'. esc_html( $p4_table['btn_label_3'] ) .'</a></td>';
                                }
                                if( !empty( $p4_table['btn_label_4'] ) ){
                                    echo '<td><a href="'. esc_url( $p4_table['btn_url_4']['url'] ) .'" class="pricing_btn__">'. esc_html( $p4_table['btn_label_4'] ) .'</a></td>';
                                }
                                if( !empty( $p4_table['btn_label_5'] ) ){
                                    echo '<td><a href="'. esc_url( $p4_table['btn_url_5']['url'] ) .'" class="pricing_btn__">'. esc_html( $p4_table['btn_label_5'] ) .'</a></td>';
                                }
                                echo '</tr>';
                            }
                        }
                    }
                    ?>
                    </tbody>
                </table>
            </div>

        </div>
    </section>
