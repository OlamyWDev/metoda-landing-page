<div class="crm-pricing-table table-responsive bg-white">
    <table class="table">
        <tr>
			<?php
			if ( !empty($settings['features_title']) ) { ?>
                <th class="crm-pricing-switch-wrapper position-relative">
                    <span class="title"><?php echo esc_html($settings['features_title']) ?></span>
                    <span class="crm-offer-badge"><?php echo esc_html($settings['features_discount']) ?></span>
                    <div class="crm-pricing-switch mt-3">
                        <button class="crm-monthly"><?php echo esc_html($settings['tab_title_01']) ?></button>
                        <span class="crm-switch">
                                                  <input type="checkbox" class="crm-checkbox-switch" checked>
                                                  <span class="crm-switch-dot"></span>
                                                </span>
                        <button class="crm-yearly"><?php echo esc_html($settings['tab_title_02']) ?></button>
                    </div>
					<?php echo wp_get_attachment_image($settings['shape']['id'], 'full', '', [ 'class' => 'arrow-shape'] ) ?>
                </th>
				<?php
			}
			if ( !empty($table_features2) ) {
				foreach ( $table_features2 as $table ) {
					if ( !empty($table['title']) ) { ?>
                        <th class="text-center crm-package-wrapper">
                            <span class="title-sm"><?php echo esc_html($table['title']) ?></span>
                            <span class="crm-package-price crm_yearly_price"><?php echo esc_html($table['price_yearly']) ?></span>
                            <span class="crm-package-price crm_monthly_price"><?php echo esc_html($table['price_monthly']) ?></span>
                            <p class="mb-3 crm-package-subtitle"><?php echo esc_html($table['duration']) ?></p>
                            <a href="<?php echo esc_url($table['btn_url']['url']) ?>" class="btn btn-sm crm-package-btn">
								<?php echo esc_html($table['btn_title']) ?>
                            </a>
                        </th>
						<?php
					}
				}
			}
			?>
        </tr>
    </table>
</div>