<section class="gm-blog-section pb-120 dark-bg position-relative zindex-1 overflow-hidden">
    <?php
	if( is_array( $settings['shape_images'] ) ){
		$i = 1;
		foreach ( $settings['shape_images'] as $image ) {
			echo '<img src="'. esc_url( $image['shape_img']['url'] ) .'" alt="'. esc_attr__( 'Shape image' ) .'" class="position-absolute shape_'.$i++.' elementor-repeater-item-'. esc_attr(  $image['_id'] ) .'">';
		}
	}
	?>
    <div class="container position-relative zindex-1">
        <div class="gm-blog-bottom mt-5">
            <div class="row g-4">
                <?php
				while ( $hostim_query->have_posts() ) {
					$hostim_query->the_post(); ?>
                    <div class="col-lg-4">
                        <article class="gm-blog-card position-relative rounded">
                            <?php \Hostim_Theme_Helper::hostim_entry_cat('category', 'category-btn position-absolute rounded-2'); ?>
                            <div class="feature-image overflow-hidden">
                                <a href="<?php the_permalink() ?>">
                                    <?php the_post_thumbnail( 'blog_425x300' ) ?>
                                </a>
                            </div>
                            <div class="gm-blog-card-content">
                                <div class="blog-meta">
                                    <?php
                                    if($author_name_switcher == 'yes') { ?>
                                        <span class="author"><?php echo \Hostim_Theme_Helper::hostim_get_posted_by(); ?></span>
                                    <?php
                                    }
                                    ?>
                                    <span class="date"><?php echo get_the_date(); ?></span>
                                </div>
                                <a href="<?php the_permalink() ?>">
                                    <h3 class="h4 mt-3 mb-3"><?php echo Hostimg_Core_Helper()->get_the_title_length($settings, 'title_length') ?></h3>
                                </a>
                                <p><?php echo Hostimg_Core_Helper()->get_the_excerpt_length($settings, 'excerpt_length') ?></p>
                            </div>
                        </article>
                    </div>
                    <?php
				}
				wp_reset_postdata();
				?>
            </div>
        </div>
    </div>
</section>
