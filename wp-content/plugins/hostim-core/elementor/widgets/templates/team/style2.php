<?php
if ( $settings['image']['url'] ):
	?>
	<div class="hostim-team style--two">
		<div class="hostim-team__avater">
			<img src="<?php echo esc_url( $settings['image']['url'] ); ?>" alt="<?php echo esc_attr( $settings['name'] ); ?>">
		</div>
		<!-- /.member-avater -->

		<div class="hostim-team__info">
			<?php if ( $settings['name'] ): ?>
				<h5 class="hostim-team__name">
					<?php printf( '%s', $settings['name'] ); ?>
				</h5>
			<?php endif; ?>

			<?php if ( $settings['position'] ): ?>
				<h6 class="hostim-team__designation">
					<?php printf( '%s', $settings['position'] ); ?>
				</h6>
			<?php endif; ?>

			<ul class="hostim-team__social-two">
				<?php
				foreach ( $settings['social_icons'] as $index => $icon ) :
					$target = $icon['link']['is_external'] ? ' target="_blank"' : '';
					$nofollow = $icon['link']['nofollow'] ? ' rel="nofollow"' : '';
					?>
					<li class="elementor-repeater-item-<?php echo esc_attr( $icon['_id'] ); ?>">
						<a href="<?php echo esc_url( $icon['link']['url'] ); ?>" <?php echo esc_attr( $target . ' ' . $nofollow ); ?> >
							<?php echo esc_html($icon['social_name']); ?>
						</a>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>

	</div><!-- .hostim-team -->
<?php
endif;