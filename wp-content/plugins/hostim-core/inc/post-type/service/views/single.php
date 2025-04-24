<?php

/**
 * Service single.
 *
 * @package Hostim_Core
 * @since   1.0.0
 */

get_header(); ?>

<section class="hm-blog-grids pt-120 pb-120 overflow-hidden">
	<div class="container">
		<div class="row g-5">
			<div class="col-lg-12">

				<?php
				while (have_posts()) {
					the_post();
					the_content();
				}
				?>
			</div>
		</div>
	</div>
</section>

<?php get_footer();