<div class="row justify-content-center g-4">
	<?php
	while ($hostim_query->have_posts() ) : $hostim_query->the_post();
		?>
		<div class="col-xl-4 col-md-6">
			<article class="mn-blog-card bg-white p-4 rounded">
				<div class="feature-img overflow-hidden rounded-top">
					<a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail('full', ['class' => 'img-fluid']); ?>
					</a>
				</div>
				<div class="mn-blog-meta d-flex align-items-center flex-wrap mt-30 mb-4">
					<span class="fs-sm fw-bold me-4"><i class="fa-solid fa-tags"></i><?php echo Hostimg_Core_Helper()->get_the_first_taxonomy() ?></span>
					<span class="fs-sm fw-bold"><i class="fa-regular fa-clock"></i><?php echo get_the_time(get_option('date_format')); ?></span>
				</div>
				<a href="<?php the_permalink(); ?>" class="mn-blog-title">
					<h4 class="mb-4"><?php echo Hostimg_Core_Helper()->get_the_title_length($settings, 'title_length') ?></h4>
				</a>
				<a href="<?php the_permalink(); ?>" class="mn-blog-explore fw-semibold">
					<?php echo esc_html($btn_label) ?>
					<span class="ms-1"><i class="fa-solid fa-arrow-right-long"></i></span>
				</a>
			</article>
		</div>
		<?php
	endwhile;
	wp_reset_postdata();
	?>
</div>
