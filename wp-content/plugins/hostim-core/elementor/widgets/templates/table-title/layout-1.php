<section class="rs-plans">
	<div class="rs-table">
		<div class="table-responsive">
			<table class="mb-0">
				<tbody>
				<tr>
					<?php
					if ( !empty($settings['features_title']) ) { ?>
						<th>
							<span class="h4 title"><?php echo esc_html($settings['features_title']) ?></span>
						</th>
						<?php
					}
					if ( !empty($table_features) ) {
						foreach ( $table_features as $table ) {
							if ( !empty($table['title']) ) { ?>
								<th class="text-center">
									<span class="plan-title"><?php echo esc_html($table['title']) ?></span>
									<p class="price h4"><?php echo esc_html($table['price']) ?> <span><?php echo esc_html($table['duration']) ?></span></p>
									<a href="<?php echo esc_url($table['btn_url']['url']) ?>" class="template-btn rs-primary-btn btn-small">
										<?php echo esc_html($table['btn_title']) ?>
									</a>
								</th>
								<?php
							}
						}
					}
					?>
				</tr>
				</tbody>
			</table>
		</div>
	</div>
</section>