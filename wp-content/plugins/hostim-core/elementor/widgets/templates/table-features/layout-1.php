<section class="rs-plans">
    <div class="rs-table">
        <div class="accordion" id="rs_table_accordion">
            <div class="accordion-item">
                <?php if ( !empty($settings['tab_title'])) : ?>
                    <div class="accordion-header">
                        <a href="#<?php echo esc_attr($unique_Id) ?>" data-bs-toggle="collapse" class="accordion-button collapsed" aria-expanded="false"><?php echo esc_html($settings['tab_title']) ?></a>
                    </div>
                <?php endif; ?>
                <div class="accordion-collapse collapse" id="<?php echo esc_attr($unique_Id) ?>" data-bs-parent="#rs_table_accordion">
                    <div class="accordion-body table-responsive">
                        <table class="rs-info-table mb-0">
                            <tbody>
                            <?php
                            if ( !empty($table_features) ) {
                                foreach ( $table_features as $table ) {
                                    ?>
                                    <tr>
                                        <?php
                                        if ( !empty($table['feature_title']) ) {
                                            echo '<td>'.esc_html($table['feature_title']).'</td>';
                                        }

                                        //Content 01
                                        if ( !empty($table['content1_style'] == 'text' ) ) {
                                            echo '<td>'.hostim_kses_post($table['feature_content1']).'</td>';
                                        }
                                        if ( !empty($table['content1_style'] == 'icon' ) ) { ?>
                                            <td>
                                                <?php \Elementor\Icons_Manager::render_icon( $table['feature_icon1'] ) ?>
                                            </td>
                                            <?php
                                        }

                                        //Content 02
                                        if ( !empty($table['content2_style'] == 'text' ) ) {
                                            echo '<td>'.hostim_kses_post($table['feature_content2']).'</td>';
                                        }
                                        if ( !empty($table['content2_style'] == 'icon' ) ) { ?>
                                            <td>
                                                <?php \Elementor\Icons_Manager::render_icon( $table['feature_icon2'] ) ?>
                                            </td>
                                            <?php
                                        }

                                        //Content 03
                                        if ( !empty($table['content3_style'] == 'text' ) ) {
                                            echo '<td>'.hostim_kses_post($table['feature_content3']).'</td>';
                                        }
                                        if ( !empty($table['content2_style'] == 'icon' ) ) { ?>
                                            <td>
                                                <?php \Elementor\Icons_Manager::render_icon( $table['feature_icon3'] ) ?>
                                            </td>
                                            <?php
                                        }
                                        ?>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>