<div class="crm_pricing_feature_accordion accordion bg-white" id="crm_pricing_accordion-<?php echo esc_attr($unique_Id) ?>">
	<div class="accordion-item border-0">
		<?php if ( !empty($settings['tab_title'])) : 
			$title_collapse = $is_collapse == 'yes' ? 'collapse' : 'collapsed';
			?>
            <div class="accordion-header">
                <a href="#<?php echo esc_attr($unique_Id) ?>" data-bs-toggle="collapse" aria-expanded="false" class="<?php echo esc_attr($title_collapse) ?>">
                    <?php echo esc_html($settings['tab_title']) ?>
                </a>
            </div>
		<?php endif; ?>
		<div class="accordion-collapse <?php echo esc_attr($is_collapse == 'yes' ? 'collapse show' : 'collapse' ) ?> " id="<?php echo esc_attr($unique_Id) ?>" data-bs-parent="#crm_pricing_accordion-<?php echo esc_attr($unique_Id) ?>">
			<div class="accordion-body p-0">
				<div class="crm_pricing_feature_table table-responsive">
					<table class="table border-0">
						<tbody>
						<?php
						if ( !empty($table_features2) ) {
							foreach ( $table_features2 as $table ) {
								?>
                                <tr>
									<?php
									if ( !empty($table['feature_title']) ) {
										echo '<td class="crm_pricing_features_name fw-semibold">'.esc_html($table['feature_title']).'</td>';
									}

									//Content 01
									if ($table['content1_style'] == 'text' && !empty($table['feature_content1']) ) {
										echo '<td class="crm_pricing_feature_check text-center">'.hostim_kses_post($table['feature_content1']).'</td>';
									}
									if ($table['content1_style'] == 'icon' && !empty($table['feature_icon1']) ) { ?>
                                        <td class="crm_pricing_feature_check text-center">
											<?php \Elementor\Icons_Manager::render_icon( $table['feature_icon1'] ) ?>
                                        </td>
										<?php
									}

									//Content 02
									if ($table['content2_style'] == 'text' && !empty($table['feature_content2'] ) ) {
										echo '<td class="crm_pricing_feature_check text-center">'.hostim_kses_post($table['feature_content2']).'</td>';
									}
									if ($table['content2_style'] == 'icon' && !empty($table['feature_icon2']) ) { ?>
                                        <td class="crm_pricing_feature_check text-center">
											<?php \Elementor\Icons_Manager::render_icon( $table['feature_icon2'] ) ?>
                                        </td>
										<?php
									}

									//Content 03
									if ($table['content3_style'] == 'text' && !empty($table['feature_content3'] ) ) {
										echo '<td class="crm_pricing_feature_check text-center">'.hostim_kses_post($table['feature_content3']).'</td>';
									}
									if ($table['content3_style'] == 'icon' && !empty($table['feature_icon3']) ) { ?>
                                        <td class="crm_pricing_feature_check text-center">
											<?php \Elementor\Icons_Manager::render_icon( $table['feature_icon3'] ) ?>
                                        </td>
										<?php
									}

									//Content 04
									if ( $table['content4_style'] == 'text' && !empty($table['feature_content4']) ) {
										echo '<td class="crm_pricing_feature_check text-center">'.hostim_kses_post($table['feature_content4']).'</td>';
									}
									if ( $table['content4_style'] == 'icon' && !empty($table['feature_icon4'] ) ) { ?>
                                        <td class="crm_pricing_feature_check text-center">
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
						</tbody>
                    </table>
				</div>
			</div>
		</div>
	</div>
</div>