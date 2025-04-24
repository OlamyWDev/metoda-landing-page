<div class="row justify-content-center g-4">
	<?php
	$author_id = get_post_field ('post_author', get_the_ID());
	while ($hostim_query->have_posts() ) : $hostim_query->the_post();
		?>
        <div class="col-xl-4 col-md-6">
            <article class="hm9-blog-card rounded overflow-hidden">
                <div class="figure-image">
                    <a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail('hostim_560x330', ['class' => 'img-fluid']); ?>
                    </a>
                </div>
                <div class="hm9-blog-card-content">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <div class="d-inline-flex align-items-center gap-3">
                            <?php
                            if($author_img_switcher == 'yes') {
                                echo get_avatar( get_the_author_meta( 'ID' ), 40, '', '', array( 'class' => 'rounded-circle' ) ); 
                            }
                            if($author_name_switcher == 'yes') { ?>
                                <span class="fw-bold"><?php echo get_the_author_meta('display_name', $author_id) ?></span>
                            <?php
                            }
                            ?>
                        </div>
                        <span class="date"><i class="fa-regular fa-calendar me-2"></i><?php echo get_the_time(get_option('date_format')); ?></span>
                    </div>
                    <a href="<?php the_permalink(); ?>">
                        <h4 class="mb-20"><?php echo Hostimg_Core_Helper()->get_the_title_length($settings, 'title_length') ?></h4>
                    </a>
                    <p><?php echo Hostimg_Core_Helper()->get_the_excerpt_length($settings, 'excerpt_length') ?></p>
                </div>
            </article>
        </div>
	<?php
	endwhile;
	wp_reset_postdata();
	?>
</div>
