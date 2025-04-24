<section class="cd-plan-table">
    <div class="cd-table">
        <table class="mb-0">
            <tr>
                <?php
                if ( !empty($settings['features_title']) ) { ?>
                    <th class="title"><?php echo esc_html($settings['features_title']) ?></th>
                    <?php
                }
                if ( !empty($table_features_head) ) {
                    foreach ( $table_features_head as $table ) {
                        if ( !empty($table['title']) ) { ?>
                            <th class="text-center">
                                <span class="plan-title"><?php echo esc_html($table['title']) ?></span>
                                <p class="price h4"><?php echo esc_html($table['price']) ?> <span><?php echo esc_html($table['duration']) ?></span></p>
                                <a href="<?php echo esc_url($table['btn_url']['url']) ?>" class="template-btn primary-btn btn-small">
                                    <?php echo esc_html($table['btn_title']) ?>
                                </a>
                            </th>
                            <?php
                        }
                    }
                }
                ?>
            </tr>
            <?php
            if ( !empty($table_features) ) {
                foreach ( $table_features as $table ) { ?>
                    <tr>
                        <?php
                        if ( !empty($table['feature_title']) ) {
                            echo '<td>'.esc_html($table['feature_title']).'</td>';
                        }

                        //Content 01
                        if ( !empty($table['content1_style'] == 'text' && !empty($table['feature_content1']) ) ) {
                            echo '<td>'.hostim_kses_post($table['feature_content1']).'</td>';
                        }
                        if ($table['content1_style'] == 'icon' && !empty($table['feature_icon1']['value'] ) ) { ?>
                            <td>
                                <?php \Elementor\Icons_Manager::render_icon( $table['feature_icon1'] ) ?>
                            </td>
                            <?php
                        }

                        //Content 02
                        if ( !empty($table['content2_style'] == 'text' && !empty($table['feature_content2']) ) ) {
                            echo '<td>'.hostim_kses_post($table['feature_content2']).'</td>';
                        }
                        if ($table['content2_style'] == 'icon' && !empty($table['feature_icon2']['value'] ) ) { ?>
                            <td>
                                <?php \Elementor\Icons_Manager::render_icon( $table['feature_icon2'] ) ?>
                            </td>
                            <?php
                        }

                        //Content 03
                        if ( !empty($table['content3_style'] == 'text' && !empty($table['feature_content3']) ) ) {
                            echo '<td>'.hostim_kses_post($table['feature_content3']).'</td>';
                        }
                        if ($table['content3_style'] == 'icon' && !empty($table['feature_icon3']['value'] ) ) { ?>
                            <td>
                                <?php \Elementor\Icons_Manager::render_icon( $table['feature_icon3'] ) ?>
                            </td>
                            <?php
                        }
                        
                        //Content 04
                        if ( !empty($table['content4_style'] == 'text' && !empty($table['feature_content4']) ) ) {
                            echo '<td>'.hostim_kses_post($table['feature_content4']).'</td>';
                        }
                        if ($table['content4_style'] == 'icon' && !empty($table['feature_icon4']['value'] ) ) { ?>
                            <td>
                                <?php \Elementor\Icons_Manager::render_icon( $table['feature_icon4'] ) ?>
                            </td>
                            <?php
                        }
                        ?>
                    </tr>
                    <?php
                }
            }
            ?>
        </table>
    </div>
</section>